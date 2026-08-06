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
        The Performance Series is intended for demanding programs including
        offshore, high-latitude and superyacht cruising. Each sail is a custom
        project: shape, structure, cloth and reinforcement are selected for the
        yacht’s expected loads, operating area and handling systems.
      </p>
    </div>

    <!-- 4) Step 02 -->
    <div class="step sr-item">
      <div class="num">02</div>
      <p class="txt">
        A custom sail cannot remove the risks of extreme-weather sailing.
        Reefing plans, furling systems, crew procedures, inspection intervals
        and conservative operating limits remain essential and should be agreed
        with the yacht’s professional advisers and the local Ullman loft.
      </p>
    </div>
  </div>
</section>

<script src="<?= with_v($jsPath, $jsTime) ?>" defer></script>
