<?php
$css_file = __DIR__ . '/Repair_Quote.css';
$js_file  = __DIR__ . '/Repair_Quote.js';

$css_time = is_file($css_file) ? filemtime($css_file) : time();
$js_time  = is_file($js_file) ? filemtime($js_file) : time();
?>

<link rel="stylesheet" href="../New_Repair_Quote/seccion/Repair_Quote.css?v=<?= $css_time ?>">

<section class="seccion-form">
  <div class="st-header">
    <div class="img-title-sailing-content">
      <img
        src="../cruising_navigator/1_introduction/img/ullman_sails.png"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <h1 id="sail_types_title" class="sail_types_title">Request a New Repair Quote</h1>
  </div>

  <form id="repair_quote_form">
    <h2>Request a Sail Repair Quote</h2>
    <p>
      To request a sail repair, service or laundry quote, please fill in the form below. <br>
      We will not use this information to send you marketing information unless you give us permission to.<br>
      We may need to contact you to get some more information to make sure you get the service you are looking for.
    </p>

    <fieldset>
      <legend>Basic Information</legend>

      <div class="form_input">
        <label>First Name
          <input id="first_name" type="text" placeholder="Required">
        </label>
      </div>

      <div class="form_input">
        <label>Last Name
          <input id="last_name" type="text" placeholder="Required">
        </label>
      </div>

      <div class="form_input">
        <label>Your Email (required)
          <input id="email" type="email" placeholder="Example@gmail.com">
        </label>
      </div>
    </fieldset>

    <fieldset>
      <legend>Data</legend>

      <div class="form_input">
        <label>Phone Number
          <input id="phone" type="text" placeholder="443123456789">
        </label>
      </div>

      <div class="form_input">
        <label>Address
          <input id="address_1" type="text" placeholder="10 Bell Close, Plympton">
        </label>
      </div>

      <div class="form_input">
        <label>Address line 2
          <input id="address_2" type="text" placeholder="10 Bell Close, Plympton, Devon PL7 4FD">
        </label>
      </div>

      <div class="form_input">
        <label>City
          <input id="city" type="text" placeholder="Hamble">
        </label>
      </div>

      <div class="form_input">
        <label>Postcode
          <input id="postcode" type="text" placeholder="Hamble">
        </label>
      </div>

      <div class="form_input">
        <label>Contact me by
          <input id="contact_by_phone" type="checkbox" class="checkbox"> Phone
          <input id="contact_by_email" type="checkbox" class="checkbox"> Email
        </label>
      </div>
    </fieldset>

    <fieldset>
      <legend>Other data</legend>

      <div class="form_input">
        <label>Type of Boat
          <input id="boat_type" type="text" placeholder="">
        </label>
      </div>

      <div class="form_input">
        <label>Name of Boat
          <input id="boat_name" type="text" placeholder="">
        </label>
      </div>

      <div class="form_input">
        <label>Type of Sail
          <input id="sail_type" type="text" placeholder="">
        </label>
      </div>

      <div class="form_input">
        <label>Work Required
          <input id="work_laundry" type="checkbox" class="checkbox"> Laundry
          <input id="work_service" type="checkbox" class="checkbox"> Service
          <input id="work_repair" type="checkbox" class="checkbox"> Repair
        </label>
      </div>

      <div class="form_input">
        <label>Details of Work Required
          <textarea id="work_details" placeholder="Message"></textarea>
        </label>
      </div>

      <div class="form_input">
        <label>Boat Location
          <input id="boat_location" type="text" placeholder="Hamble">
        </label>
      </div>

      <div class="form_input">
        <label for="collection_delivery">Sail Collection & Delivery
          <select id="collection_delivery" name="type_of_user">
            <option value="None">None</option>
            <option value="Collection & Delivery">Collection & Delivery</option>
            <option value="Collection Only">Collection Only</option>
            <option value="Delivery Only">Delivery Only</option>
          </select>
        </label>
      </div>
    </fieldset>

    <div class="form_input">
      <label>Please send me the Ullman Sails newsletter.
        <input id="newsletter" type="checkbox" class="checkbox">
      </label>
    </div>

    <p>
      If you would like to receive our monthly newsletter, including news, tips
      and special offers, please check the box above. You can stop receiving
      emails at any time by clicking the unsubscribe link in the email.
    </p>

    <div class="form_input">
      <input id="btnRepairQuote" class="submit" type="submit" value="Send Quote">
    </div>
  </form>
</section>

<?php ullman_ajax_config(); ?>
<script defer src="<?php echo esc_url(get_template_directory_uri() . '/pages/New_Repair_Quote/seccion/Repair_Quote.js?v=' . $js_time); ?>"></script>
