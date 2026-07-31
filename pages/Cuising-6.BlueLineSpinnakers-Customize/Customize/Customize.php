<?php
$customizeCssFs = __DIR__ . '/customize.css';
$customizeJsFs  = __DIR__ . '/customize.js';
$customizeUrl   = get_template_directory_uri() . '/pages/Cuising-6.BlueLineSpinnakers-Customize/Customize';
$svgPath        = __DIR__ . '/svg/';
?>

<link
  rel="stylesheet"
  href="<?php echo esc_url($customizeUrl . '/customize.css?v=' . ullman_file_version($customizeCssFs)); ?>"
>

<section class="customize" id="customize">

  <div class="customize-selects">

    <div class="select-group">
      <label for="sailType">Sail Type</label>

      <select id="sailType">
        <option value="asymetric">Cruise: Axia Asym</option>
        <option value="symetric">Cruise: Axia Code 50</option>
        <option value="design3">Cruise: Axia Code 60</option>
        <option value="design4">Cruise: Axia Code 70</option>
        <option value="design5">Cruise: Axia Symm</option>
      </select>
    </div>

    <div class="select-group">
      <label for="clothWeight">Cloth Weight</label>

      <select id="clothWeight"></select>
    </div>

  </div>

  <div class="colours" id="availableColours"></div>

  <div id="contentDownload">

    <div class="sail-option active" id="asymetric">
      <?php include $svgPath . 'Axia_Asym.php'; ?>
    </div>

    <div class="sail-option" id="symetric">
      <?php include $svgPath . 'Axia_Code_50.php'; ?>
    </div>

    <div class="sail-option" id="design3">
      <?php include $svgPath . 'Axia_Code_60.php'; ?>
    </div>

    <div class="sail-option" id="design4">
      <?php include $svgPath . 'Axia_Code_70.php'; ?>
    </div>

    <div class="sail-option" id="design5">
      <?php include $svgPath . 'Axia_symm.php'; ?>
    </div>

  </div>

  <div class="buttonTitle" id="downloadPDF">
    <h3 class="openContactUs">Download PDF</h3>
  </div>

  <form class="customize-form" id="customizeForm">

    <h2>Request this sail design</h2>

    <div class="customize-form-grid">

      <div class="form-group">
        <label for="customerName">Name</label>
        <input type="text" id="customerName" name="name" placeholder="Enter your name" required>
      </div>

      <div class="form-group">
        <label for="customerEmail">Email</label>
        <input type="email" id="customerEmail" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="salespersonEmail">Salesperson Email</label>
        <input type="email" id="salespersonEmail" name="salesperson_email" placeholder="Enter salesperson email" required>
      </div>

      <div class="form-group">
        <label for="boatName">Boat Name</label>
        <input type="text" id="boatName" name="boat_name" placeholder="Enter boat name" required>
      </div>

      <div class="form-group form-group-full">
        <label for="boatDesignLength">Boat Design / Length</label>
        <input type="text" id="boatDesignLength" name="boat_design_length" placeholder="Example: Beneteau 40 / 40ft" required>
      </div>

    </div>

    <button type="submit" class="customize-submit">
      Submit
    </button>

  </form>

</section>

<?php ullman_ajax_config(); ?>
<script src="<?php echo esc_url($customizeUrl . '/customize.js?v=' . ullman_file_version($customizeJsFs)); ?>"></script>
