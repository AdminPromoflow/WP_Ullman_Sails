<?php
$contactUsCss = __DIR__ . '/contact_us.css';
$contactUsCssTime = is_file($contactUsCss) ? filemtime($contactUsCss) : time();
$contactUsUrl = get_template_directory_uri() . '/pages/ContactUs/Contactus';
?>
<link rel="stylesheet" href="<?php echo esc_url($contactUsUrl . '/contact_us.css?v=' . $contactUsCssTime); ?>">
<section class="contactUs">
  <div class="img-title">
    <img
      src="../cruising_navigator/1_introduction/img/ullman_sails.png"
      alt="Ullman Sails"
      decoding="async"
      width="240"
      height="72"
    >
  </div>
  <h1 id="services-title" class="covers-title">Contact us</h1>

  <div class="contactUsContainer">
    <div class="contactUsBox">
      <form id="contactUsForm" class="contactUsForm" novalidate>
        <h3>Your contact info</h3>
        <input id="contactName" type="text" name="contactName" placeholder="Name" required autocomplete="name">
        <input id="contactNumber" type="tel" name="contactNumber" placeholder="Contact number" required autocomplete="tel">
        <input id="contactLocation" type="text" name="contactLocation" placeholder="Location of vessel" required>
        <input id="contactEmail" type="email" name="contactEmail" placeholder="Email address" required autocomplete="email">
        <label for="pdf_file">Select a PDF file:</label>
        <input type="file" id="pdf_file" name="file" accept=".pdf">
        <textarea id="contactMessage" name="contactMessage" placeholder="Please share your requirements" rows="3"></textarea>
        <button id="btnContactUs" class="buttonTitle" type="submit">
        <span class="openContactUs">Submit</span>
        </button>
      </form>
    </div>
    <div class="contactUsBox">
      <div id="map"></div>
    </div>
  </div>


  <div class="containerTable">
    <table>
        <thead>
          <tr>
            <th>Site</th>
            <th>Plymouth</th>
            <th>Hamble</th>
            <th>ADMIN OFFICE</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="whiter">Telephone</td>
            <td class="whiter">01752 337 131</td>
            <td class="whiter">02380 457 711</td>
            <td class="whiter">02780 456 611</td>

          </tr>
          <tr>
            <td>Address</td>
            <td>Unit 23a, 10 Bell Close
              Plymouth
              Devon
              PL7 4FD</td>
            <td>15 Compass Point
              Ensign Way, Hamble
              Southampton S031 4RA</td>
            <td></td>

          </tr>
          <tr>
            <td class="whiter">Email</td>
            <td class="whiter">sales@ullmansails.co.uk</td>
            <td class="whiter">sales@ullmansails.co.uk</td>
            <td class="whiter">catrina@ullmansails.co.uk</td>

          </tr>
          <tr>
            <td>Out of Hours</td>
            <td>07979 591 999</td>
            <td>07753 131 903</td>
            <td></td>

          </tr>
          <tr>
            <td class="whiter">Head of Loft</td>
            <td class="whiter">Jon Pegg</td>
            <td class="whiter">Rob Larke</td>
            <td class="whiter">Catrina Southworth</td>

          </tr>
          <tr>
            <td>Opening Hours</td>
            <td>08:00 - 17:00</td>
            <td>08:30 - 17:30</td>
            <td></td>
          </tr>
        </tbody>
      </table>
  </div>

</section>
<?php
$contactUsJs = __DIR__ . '/contact_us.js';
$contactUsJsTime = file_exists($contactUsJs) ? filemtime($contactUsJs) : time();
ullman_ajax_config();
?>
<script src="<?php echo esc_url(get_template_directory_uri() . '/pages/ContactUs/Contactus/contact_us.js?v=' . $contactUsJsTime); ?>" type="text/javascript"></script>
