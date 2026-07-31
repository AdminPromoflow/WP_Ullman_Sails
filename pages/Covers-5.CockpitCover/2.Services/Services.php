<?php
$cssFile = __DIR__ . '/../Covers/2.Services/Services.css';
$jsFile  = __DIR__ . '/../Covers/2.Services/Services.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../Covers/2.Services/Services.css<?= $cssVer ? '?v='.$cssVer : '' ?>">

<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>

<section class="services services--single" aria-labelledby="services-title" data-sr-reveal>
  <div class="services__inner">

    <div class="services__layout">
      <div class="services__copy">


        <h1 id="services-title" class="services__title sr-item">Cockpit Cover</h1>

        <p class="services__lead sr-item">
          A cockpit cover (or tonneau cover) helps keep your cockpit clean and dry,
          and protects your wheel, instruments, floor, and winches while you’re away.
          It can attach to your sprayhood fittings or to the back edge of the sprayhood.
          Available in a range of colours—if you’ll be using it often or leaving it in
          place over winter, chat with the team about options that pack small and go
          the distance.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--cockpitcover sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
