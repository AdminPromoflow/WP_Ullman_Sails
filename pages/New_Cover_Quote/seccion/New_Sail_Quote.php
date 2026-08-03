<?php
$css_file = __DIR__ . '/New_Sail_Quote.css';
$js_file  = __DIR__ . '/New_Sail_Quote.js';

$css_time = is_file($css_file) ? filemtime($css_file) : time();
$js_time  = is_file($js_file) ? filemtime($js_file) : time();
?>

<link rel="stylesheet" href="../New_Cover_Quote/seccion/New_Sail_Quote.css?v=<?= $css_time ?>">


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

    <h1 id="sail_types_title" class="sail_types_title">Request a New Covers Quote</h1>
  </div>

  <form action="#" method="post">
    <p>
      To request a new sail quote, please fill in the form below.<br>
      We will not use this information to send you marketing information unless you give us permission to.<br>
      We may need to contact you to get some more information to make sure your sails are perfectly suited to your needs.
    </p>

    <fieldset>
      <legend>Basic Information</legend>

      <div class="form_input">
        <label for="first_name">First Name</label>
        <input id="first_name" type="text" placeholder="Required">
      </div>

      <div class="form_input">
        <label for="last_name">Last Name</label>
        <input id="last_name" type="text" placeholder="Required">
      </div>

      <div class="form_input">
        <label for="email">Your Email (required)</label>
        <input id="email" type="email" placeholder="example@gmail.com">
      </div>
    </fieldset>

    <fieldset>
      <legend>Data</legend>

      <div class="form_input">
        <label for="phone">Phone Number</label>
        <input id="phone" type="text" placeholder="443123456789">
      </div>

      <div class="form_input">
        <label for="address_1">Address</label>
        <input id="address_1" type="text" placeholder="10 Bell Close, Plympton">
      </div>

      <div class="form_input">
        <label for="address_2">Address line 2</label>
        <input id="address_2" type="text" placeholder="10 Bell Close, Plympton, Devon PL7 4FD">
      </div>

      <div class="form_input">
        <label for="city">City</label>
        <input id="city" type="text" placeholder="Hamble">
      </div>

      <div class="form_input">
        <label for="postcode">Postcode</label>
        <input id="postcode" type="text" placeholder="SO31 4NB">
      </div>

      <div class="form_input">
        <span class="field_label">Contact me by</span>
        <div class="checkbox-group">
          <label class="checkbox-label">
            <input type="checkbox" class="checkbox"> Phone
          </label>
          <label class="checkbox-label">
            <input type="checkbox" class="checkbox"> Email
          </label>
        </div>
      </div>
    </fieldset>

    <fieldset>
      <legend>Other Data</legend>

      <div class="form_input">
        <label for="boat_type">Type of Boat</label>
        <input id="boat_type" type="text" placeholder="">
      </div>

      <div class="form_input">
        <label for="sail_type">Type of Sail</label>
        <input id="sail_type" type="text" placeholder="">
      </div>
<!-- 
      <div class="form_input">
        <span class="field_label">Sail Use</span>
        <div class="checkbox-group">
          <label class="checkbox-label">
            <input id="checkbox_racing" type="checkbox" class="checkbox"> Racing
          </label>
          <label class="checkbox-label">
            <input id="checkbox_cruising" type="checkbox" class="checkbox"> Cruising
          </label>
        </div>
      </div> -->

      <div class="form_input">
        <label for="boat_location">Boat Location</label>
        <input id="boat_location" type="text" placeholder="Hamble">
      </div>

      <div class="form_input">
        <label for="additional_info">Additional Info</label>
        <textarea id="additional_info" placeholder="Message"></textarea>
      </div>
    </fieldset>

    <div class="form_input newsletter-field">
      <label class="checkbox-label">
        <input type="checkbox" class="checkbox">
        Please send me the Ullman Sails newsletter.
      </label>
    </div>

    <p>
      If you would like to receive our monthly newsletter, including news, tips
      and special offers, please check the box above. You can stop receiving emails
      at any time by clicking the unsubscribe link in the email.
    </p>

    <div class="form_input form_submit">
      <input class="submit" type="submit" value="Send Quote">
    </div>
  </form>
</section>
<?php ullman_ajax_config(); ?>
<script src="<?php echo esc_url(get_template_directory_uri() . '/pages/New_Cover_Quote/seccion/New_Sail_Quote.js?v=' . $js_time); ?>"></script>
