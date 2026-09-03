<?php

/**
 * Ullman Sails form proxy.
 *
 * Browser forms post to this same-origin endpoint. The proxy normalizes the
 * request, converts an uploaded attachment to JSON-safe base64, and forwards
 * the payload to the protected Promoflow webhook.
 *
 * Define ULLMAN_PROMOFLOW_WEBHOOK_TOKEN in wp-config.php (minimum 32 random
 * characters) and use the identical value on the Promoflow webhook.
 */
if (is_file(__DIR__ . '/includes/token.php')) {
    require_once __DIR__ . '/includes/token.php';
}

class ApiController
{
    private $promoflowWebhookUrl = 'https://www.promoflow.net/controller/ullman_sails/controller.php';
    private $maxAttachmentBytes = 10485760; // 10 MB before base64 encoding.

    public function handleRequest()
    {
        header('Content-Type: application/json; charset=UTF-8');

        $requestMethod = isset($_SERVER['REQUEST_METHOD'])
            ? strtoupper($_SERVER['REQUEST_METHOD'])
            : '';

        if ($requestMethod !== 'POST') {
            $this->sendJson(array(
                'success' => false,
                'message' => 'Method not allowed.'
            ), 405);
            return;
        }

        $data = $this->getRequestData();

        if (!is_array($data) || !isset($data['action']) || (string) $data['action'] === '') {
            $this->sendJson(array(
                'success' => false,
                'message' => 'Missing action.'
            ), 400);
            return;
        }

        $action = (string) $data['action'];

        // Keep compatibility with submissions previously prepared for WP AJAX.
        if ($action === 'ullman_send_forms' && !empty($data['form_action'])) {
            $action = (string) $data['form_action'];
        }

        switch ($action) {
            case 'login':
                $this->login($data);
                break;

            case 'logout':
                $this->logout();
                break;

            case 'read_users':
            case 'create_user':
            case 'update_user':
            case 'delete_user':
                $this->handleUserManagerRequest($data, $action);
                break;

            case 'send_emal_contact_us':
                $this->sendEmailContactUs($data);
                break;

            case 'send_new_sail_quote':
                $this->sendNewSailQuote($data);
                break;

            case 'send_new_cover_quote':
                $this->sendNewCoverQuote($data);
                break;

            case 'send_new_repair_quote':
                $this->sendNewRepairQuote($data);
                break;

            case 'submit_customize_form':
                $this->submitCustomizeForm($data);
                break;

            default:
                echo json_encode(array(
                    'success' => false
                ));
                break;
        }
    }

    private function login($data)
    {
        $payload = $this->preparePromoflowPayload($data, 'login');
        $this->sendToPromoflow($payload, true);
    }

    private function logout()
    {
        $this->startAdminSession();

        $_SESSION = array();

        if (ini_get('session.use_cookies')) {
            $cookieParameters = session_get_cookie_params();

            setcookie(session_name(), '', array(
                'expires' => time() - 42000,
                'path' => $cookieParameters['path'],
                'domain' => $cookieParameters['domain'],
                'secure' => $cookieParameters['secure'],
                'httponly' => $cookieParameters['httponly'],
                'samesite' => isset($cookieParameters['samesite'])
                    ? $cookieParameters['samesite']
                    : 'Lax'
            ));
        }

        session_destroy();

        $this->sendJson(array(
            'success' => true
        ), 200);
    }

    private function handleUserManagerRequest($data, $action)
    {
        $contentType = isset($_SERVER['CONTENT_TYPE'])
            ? (string) $_SERVER['CONTENT_TYPE']
            : '';

        if (stripos($contentType, 'application/json') === false) {
            $this->sendJson(array(
                'success' => false,
                'message' => 'Content-Type must be application/json.'
            ), 415);
            return;
        }

        $this->startAdminSession();

        $isAuthenticated = !empty($_SESSION['ullman_admin_authenticated']);
        $adminEmail = isset($_SESSION['ullman_admin_email'])
            ? trim((string) $_SESSION['ullman_admin_email'])
            : '';
        $adminRole = isset($_SESSION['ullman_admin_role'])
            ? strtolower(trim((string) $_SESSION['ullman_admin_role']))
            : '';

        if (!$isAuthenticated || $adminEmail === '') {
            $this->sendJson(array(
                'success' => false,
                'message' => 'Your administrator session has expired.',
                'requires_login' => true
            ), 401);
            return;
        }

        if ($adminRole !== 'admin') {
            $this->sendJson(array(
                'success' => false,
                'message' => 'Administrator access is required.'
            ), 403);
            return;
        }

        $payload = $this->preparePromoflowPayload($data, $action);
        $payload['requester_email'] = $adminEmail;

        $this->sendToPromoflow($payload);
    }

    private function sendEmailContactUs($data)
    {
        $payload = $this->preparePromoflowPayload($data, 'send_emal_contact_us');

        if (isset($_FILES['file'])) {
            $attachment = $this->encodeUploadedFile($_FILES['file']);

            if (isset($attachment['error'])) {
                $this->sendJson(array(
                    'success' => false,
                    'message' => $attachment['error']
                ), 400);
                return;
            }

            if (!empty($attachment)) {
                $payload['file'] = $attachment;
            }
        }

        $this->sendToPromoflow($payload);
    }

    private function sendNewSailQuote($data)
    {
        $payload = $this->preparePromoflowPayload($data, 'send_new_sail_quote');
        $this->sendToPromoflow($payload);
    }

    private function sendNewCoverQuote($data)
    {
        $payload = $this->preparePromoflowPayload($data, 'send_new_cover_quote');
        $this->sendToPromoflow($payload);
    }

    private function sendNewRepairQuote($data)
    {
        $payload = $this->preparePromoflowPayload($data, 'send_new_repair_quote');
        $this->sendToPromoflow($payload);
    }

    private function submitCustomizeForm($data)
    {
        $payload = $this->preparePromoflowPayload($data, 'submit_customize_form');
        $this->sendToPromoflow($payload);
    }

    private function preparePromoflowPayload($data, $action)
    {
        $payload = $data;
        $payload['action'] = $action;
        $payload['source'] = 'ullman_sails';

        unset($payload['form_action'], $payload['nonce']);

        return $payload;
    }

    private function getRequestData()
    {
        $contentType = isset($_SERVER['CONTENT_TYPE'])
            ? (string) $_SERVER['CONTENT_TYPE']
            : '';

        if (stripos($contentType, 'application/json') !== false) {
            $input = file_get_contents('php://input');
            $jsonData = json_decode($input, true);

            return is_array($jsonData) ? $jsonData : array();
        }

        return $_POST;
    }

    private function encodeUploadedFile($file)
    {
        if (!is_array($file)) {
            return array();
        }

        $uploadError = isset($file['error']) ? (int) $file['error'] : UPLOAD_ERR_NO_FILE;

        if ($uploadError === UPLOAD_ERR_NO_FILE) {
            return array();
        }

        if ($uploadError !== UPLOAD_ERR_OK) {
            return array('error' => 'The attachment could not be uploaded.');
        }

        $tmpName = isset($file['tmp_name']) ? (string) $file['tmp_name'] : '';
        $size = isset($file['size']) ? (int) $file['size'] : 0;

        if ($tmpName === '' || !is_file($tmpName)) {
            return array('error' => 'The uploaded attachment is unavailable.');
        }

        if ($size <= 0 || $size > $this->maxAttachmentBytes) {
            return array('error' => 'The attachment must be smaller than 10 MB.');
        }

        $contents = file_get_contents($tmpName);

        if ($contents === false) {
            return array('error' => 'The attachment could not be read.');
        }

        $mimeType = 'application/octet-stream';

        if (function_exists('finfo_open')) {
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);

            if ($fileInfo !== false) {
                $detectedType = finfo_file($fileInfo, $tmpName);
                finfo_close($fileInfo);

                if (is_string($detectedType) && $detectedType !== '') {
                    $mimeType = $detectedType;
                }
            }
        }

        return array(
            'name' => isset($file['name']) ? basename((string) $file['name']) : 'attachment',
            'type' => $mimeType,
            'size' => strlen($contents),
            'content_base64' => base64_encode($contents)
        );
    }

    private function getWebhookToken()
    {
        if (defined('ULLMAN_PROMOFLOW_WEBHOOK_TOKEN')) {
            return (string) constant('ULLMAN_PROMOFLOW_WEBHOOK_TOKEN');
        }

        $environmentToken = getenv('ULLMAN_PROMOFLOW_WEBHOOK_TOKEN');

        return is_string($environmentToken) ? $environmentToken : '';
    }

    private function sendToPromoflow($payload, $createAdminSession = false)
    {
        if (!function_exists('curl_init')) {
            $this->sendJson(array(
                'success' => false,
                'message' => 'The server cannot forward the form request.'
            ), 500);
            return;
        }

        $webhookToken = $this->getWebhookToken();

        if (strlen($webhookToken) < 32) {
            error_log('ULLMAN_PROMOFLOW_WEBHOOK_TOKEN is missing or too short.');
            $this->sendJson(array(
                'success' => false,
                'message' => 'The form service is not configured.'
            ), 500);
            return;
        }

        $jsonPayload = json_encode(
            $payload,
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );

        if ($jsonPayload === false) {
            $this->sendJson(array(
                'success' => false,
                'message' => 'The form request could not be prepared.'
            ), 500);
            return;
        }

        $curl = curl_init($this->promoflowWebhookUrl);

        curl_setopt_array($curl, array(
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json; charset=UTF-8',
                'Accept: application/json',
                'X-Ullman-Webhook-Token: ' . $webhookToken
            ),
            CURLOPT_POSTFIELDS => $jsonPayload,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 60
        ));

        $response = curl_exec($curl);
        $curlError = curl_error($curl);
        $httpCode = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($response === false || $curlError !== '') {
            error_log('Promoflow webhook connection error: ' . $curlError);
            $this->sendJson(array(
                'success' => false,
                'message' => 'Could not connect to the form service.'
            ), 502);
            return;
        }

        $decodedResponse = json_decode($response, true);

        if (!is_array($decodedResponse)) {
            error_log('Promoflow webhook returned a non-JSON response.');
            $this->sendJson(array(
                'success' => false,
                'message' => 'The form service returned an invalid response.'
            ), 502);
            return;
        }

        if ($createAdminSession && !empty($decodedResponse['success'])) {
            if (!isset($decodedResponse['user']) || !is_array($decodedResponse['user'])) {
                $this->sendJson(array(
                    'success' => false,
                    'message' => 'The authentication service returned an invalid user.'
                ), 502);
                return;
            }

            $this->createAdminSession($decodedResponse['user']);
        }

        $statusCode = $httpCode >= 200 && $httpCode < 600 ? $httpCode : 502;
        $this->sendJson($decodedResponse, $statusCode);
    }

    private function createAdminSession($user)
    {
        $email = isset($user['email']) ? trim((string) $user['email']) : '';
        $role = isset($user['role']) ? strtolower(trim((string) $user['role'])) : '';

        if ($email === '') {
            throw new RuntimeException('The authenticated email is unavailable.');
        }

        if ($role !== 'admin') {
            throw new RuntimeException('The authenticated account is not an administrator.');
        }

        $this->startAdminSession();
        session_regenerate_id(true);
        $_SESSION['ullman_admin_email'] = $email;
        $_SESSION['ullman_admin_role'] = $role;
        $_SESSION['ullman_admin_authenticated'] = true;
    }

    private function startAdminSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_name('ULLMAN_ADMIN_SESSION');
            session_set_cookie_params(array(
                'lifetime' => 0,
                'path' => '/',
                'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
                'httponly' => true,
                'samesite' => 'Lax'
            ));

            if (!session_start()) {
                throw new RuntimeException('The admin session could not be started.');
            }
        }
    }

    private function sendJson($payload, $statusCode)
    {
        http_response_code((int) $statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $json = json_encode(
            $payload,
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );

        echo $json !== false
            ? $json
            : '{"success":false,"message":"Unable to create the server response."}';
    }
}

if (!defined('ABSPATH')) {
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
    error_reporting(E_ALL);

    try {
        $apiController = new ApiController();
        $apiController->handleRequest();
    } catch (Throwable $error) {
        error_log('Ullman form proxy error: ' . $error->getMessage());
        http_response_code(500);
        header('Content-Type: application/json; charset=UTF-8');
        echo '{"success":false,"message":"An internal server error occurred."}';
    }
}
