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
 require_once __DIR__ . '/includes/emails-config.php';
class ApiHandlerSendForms
{
    private $promoflowWebhookUrl = 'https://www.promoflow.net/controller/controller.php';
    private $maxAttachmentBytes = 10485760; // 10 MB before base64 encoding.
    private $requestData = array();
    private $promoflowResponseStatusCode = 200;

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

        $this->requestData = $this->getRequestData();
        $action = isset($this->requestData['action'])
            ? (string) $this->requestData['action']
            : '';

        // Keep compatibility with submissions previously prepared for WP AJAX.
        if (
            $action === 'ullman_send_forms'
            && !empty($this->requestData['form_action'])
        ) {
            $action = (string) $this->requestData['form_action'];
        }

        switch ($action) {
            case 'login':
                $response = $this->login();
                $this->sendJson($response, $this->promoflowResponseStatusCode);
                break;

            case 'send_emal_contact_us':
            case 'send_new_sail_quote':
            case 'send_new_cover_quote':
            case 'send_new_repair_quote':
            case 'submit_customize_form':
                $this->forwardFormRequest($action);
                break;

            default:
                $this->sendJson(array(
                    'success' => false,
                    'message' => $action === '' ? 'Missing action.' : 'Unknown action.'
                ), 400);
                break;
        }
    }

    private function login()
    {
        $email = isset($this->requestData['email'])
            ? trim((string) $this->requestData['email'])
            : '';
        $password = isset($this->requestData['password'])
            ? (string) $this->requestData['password']
            : '';

        if ($email === '' || $password === '') {
            $this->promoflowResponseStatusCode = 400;

            return array(
                'success' => false,
                'message' => 'Invalid credentials'
            );
        }

        return $this->makePromoflowRequest(array(
            'action' => 'login',
            'email' => $email,
            'password' => $password,
            'source' => 'ullman_sails'
        ));
    }

    private function forwardFormRequest($action)
    {
        $payload = $this->requestData;
        $payload['action'] = $action;
        $payload['source'] = 'ullman_sails';

        unset($payload['form_action'], $payload['nonce']);

        if ($action === 'send_emal_contact_us' && isset($_FILES['file'])) {
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

    private function sendToPromoflow($payload)
    {
        $response = $this->makePromoflowRequest($payload);
        $this->sendJson($response, $this->promoflowResponseStatusCode);
    }

    private function makePromoflowRequest($payload)
    {
        if (!function_exists('curl_init')) {
            $this->promoflowResponseStatusCode = 500;

            return array(
                'success' => false,
                'message' => 'The server cannot forward the form request.'
            );
        }

        $webhookToken = $this->getWebhookToken();

        if (strlen($webhookToken) < 32) {
            error_log('ULLMAN_PROMOFLOW_WEBHOOK_TOKEN is missing or too short.');
            $this->promoflowResponseStatusCode = 500;

            return array(
                'success' => false,
                'message' => 'The form service is not configured.'
            );
        }

        $jsonPayload = json_encode(
            $payload,
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );

        if ($jsonPayload === false) {
            $this->promoflowResponseStatusCode = 500;

            return array(
                'success' => false,
                'message' => 'The form request could not be prepared.'
            );
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
            $this->promoflowResponseStatusCode = 502;

            return array(
                'success' => false,
                'message' => 'Could not connect to the form service.'
            );
        }

        $decodedResponse = json_decode($response, true);

        if (!is_array($decodedResponse)) {
            error_log('Promoflow webhook returned a non-JSON response.');
            $this->promoflowResponseStatusCode = 502;

            return array(
                'success' => false,
                'message' => 'The form service returned an invalid response.'
            );
        }

        $this->promoflowResponseStatusCode = $httpCode >= 200 && $httpCode < 600
            ? $httpCode
            : 502;

        return $decodedResponse;
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
        $apiHandlerSendForms = new ApiHandlerSendForms();
        $apiHandlerSendForms->handleRequest();
    } catch (Throwable $error) {
        error_log('Ullman form proxy error: ' . $error->getMessage());
        http_response_code(500);
        header('Content-Type: application/json; charset=UTF-8');
        echo '{"success":false,"message":"An internal server error occurred."}';
    }
}
