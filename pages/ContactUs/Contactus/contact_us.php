<link rel="stylesheet" href="../ContactUs/Contactus/contact_us.css?v=<?= filemtime('../ContactUs/Contactus/contact_us.css') ?>">
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
      <h3>Your contact info</h3>
      <input id="contactName" type="text" name="" placeholder="Name" value="">
      <input id="contactNumber" type="text" name="" placeholder="Contact number" value="">
      <input id="contactLocation" type="text" name="" placeholder="Location of Vessel (?)" value="">
      <input id="contactEmail" type="email" name="" placeholder="Email address" value="">
      <label for="pdf_file">Select a PDF file:</label>
      <input type="file" id="pdf_file" name="pdf_file" accept=".pdf">
      <textarea id="contactMessage" name="name" placeholder="Please share your experiences" rows="3" cols="80"></textarea>
      <div id="btnContactUs" class="buttonTitle">
        <h3 class="openContactUs">Submit</h3>
      </div>
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
