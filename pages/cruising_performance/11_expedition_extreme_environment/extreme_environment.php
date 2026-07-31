<?php
declare(strict_types=1);

$cssPath = '11_expedition_extreme_environment/extreme_environment.css';
$jsPath  = '11_expedition_extreme_environment/extreme_environment_reveal.js';

$cssTime = is_file($cssPath) ? filemtime($cssPath) : null;
$jsTime  = is_file($jsPath)  ? filemtime($jsPath)  : null;

function with_v(string $url, ?int $v): string {
  return $v ? ($url . '?v=' . $v) : $url;
}
?>

<link rel="stylesheet" href="<?= with_v($cssPath, $cssTime) ?>">

<section class="section" data-sr-reveal aria-labelledby="eee-title">
  <!-- 1) Title -->
  <h2 id="eee-title" class="sr-item">Engineering for Extreme Environments</h2>

  <!-- 2) Rule -->
  <div class="rule sr-item"></div>

  <div class="row row--top">
    <!-- 3) Step 01 -->
    <div class="step sr-item">
      <div class="num">01</div>
      <p class="txt">
        All Performance Series sails are custom projects—meticulously designed
        and constructed for maximum durability and safety. In extreme cold,
        high winds, and rough seas, crews need complete trust in their equipment.
        These sails help manage high winds and sub-zero conditions where mistakes
        compound quickly and physical responsiveness may be reduced.
      </p>
    </div>

    <!-- 4) Step 02 -->
    <div class="step sr-item">
      <div class="num">02</div>
      <p class="txt">
        High winds can produce significant heel, increasing the risk of the
        mainsail being dragged into the water. Sail changes in these conditions
        are inherently risky. The Performance Series is designed to reduce or
        eliminate many of the challenges posed by extreme environments—preparing
        you for the unknown.
      </p>
    </div>
  </div>
</section>

<script src="<?= with_v($jsPath, $jsTime) ?>" defer></script>
