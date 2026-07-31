<?php
$cssFile = __DIR__ . '/Services.css';
$jsFile  = __DIR__ . '/Services.js';
$servicesUrl = get_template_directory_uri() . '/pages/Covers/2.Services';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="<?php echo esc_url($servicesUrl . '/Services.css' . ($cssVer ? '?v=' . $cssVer : '')); ?>">

<section class="services" aria-labelledby="services-title">

  <div class="services__inner">
    <div class="img-title">
      <img
        src="../cruising_navigator/1_introduction/img/ullman_sails.png"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>
    <h1 id="services-title" class="covers-title">Bespoke Boat Covers, Built to Last</h1>

    <header class="services__intro sr-item">


      <p class="services__lead">
        Whether you're protecting your sails, cockpit, or comfort on board, we make covers to suit your boat and how you use it.
        From stack packs and sprayhoods to hatch covers and helm leathering, everything is made to fit and made to last.
      </p>

      <p class="services__lead">
        We’re a small, experienced team who care about the details—and we’re always happy to chat through what you need.
        Give us a call or drop us a message, and we’ll help you get sorted.
      </p>
    </header>

    <div class="services__grid" role="list">

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-1.Stackpack')); ?>" role="listitem" aria-label="Stack pack — See more">
        <span class="service-card__info">
          <span class="service-card__title">Stack pack</span>
          <span class="service-card__desc">Keep your mainsail neatly flaked and protected with a made-to-measure stack pack designed for quick, tidy stowage.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising1" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-2.BoomCover')); ?>" role="listitem" aria-label="Boom cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Boom cover</span>
          <span class="service-card__desc">A tailored boom cover that shields your mainsail from UV, salt and grime—ideal for day sailing and longer spells at mooring.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising2" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-3.BlanketCover')); ?>" role="listitem" aria-label="Blanket cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Blanket cover</span>
          <span class="service-card__desc">A practical protective blanket cover that helps reduce chafe and weathering where you need it most, built to suit your setup.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising3" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-4.Sprayhood')); ?>" role="listitem" aria-label="Sprayhood — See more">
        <span class="service-card__info">
          <span class="service-card__title">Sprayhood</span>
          <span class="service-card__desc">Stay drier and more comfortable with a well-fitting sprayhood—clear visibility, smart detailing, and strong weather protection.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising4" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-5.CockpitCover')); ?>" role="listitem" aria-label="Cockpit cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Cockpit cover</span>
          <span class="service-card__desc">Keep the cockpit clean, dry and ready to go—custom cockpit covers that protect cushions, instruments and teak from the elements.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising5" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-6.CockpitEnclosure')); ?>" role="listitem" aria-label="Cockpit enclosure — See more">
        <span class="service-card__info">
          <span class="service-card__title">Cockpit enclosure</span>
          <span class="service-card__desc">Extend your season with a cockpit enclosure—more shelter, more warmth, and more usable space when the weather turns.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising6" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-7.CockpitCushions')); ?>" role="listitem" aria-label="Cockpit cushions — See more">
        <span class="service-card__info">
          <span class="service-card__title">Cockpit cushions</span>
          <span class="service-card__desc">Comfort that lasts—cockpit cushions cut to fit, finished neatly, and made in marine-grade materials for life on the water.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising7" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-9.WheelLeathering')); ?>" role="listitem" aria-label="Wheel leathering — See more">
        <span class="service-card__info">
          <span class="service-card__title">Wheel leathering</span>
          <span class="service-card__desc">Upgrade grip and feel at the helm with professional wheel leathering—clean stitching, smart finish, and a premium touch.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising9" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-10.WheelBinnacleCover')); ?>" role="listitem" aria-label="Wheel binnacle cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Wheel binnacle cover</span>
          <span class="service-card__desc">Protect your wheel and helm station from UV and rain with a snug binnacle cover designed around your instruments.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising10" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-11.WinchCovers')); ?>" role="listitem" aria-label="Winch covers — See more">
        <span class="service-card__info">
          <span class="service-card__title">Winch covers</span>
          <span class="service-card__desc">Keep winches cleaner and running smoother—durable winch covers that reduce corrosion and protect from sun and spray.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising11" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-12.WindowandHatchCovers')); ?>" role="listitem" aria-label="Window and hatch covers — See more">
        <span class="service-card__info">
          <span class="service-card__title">Window and hatch covers</span>
          <span class="service-card__desc">Reduce heat and UV below deck with smart window and hatch covers—made to fit and easy to use day-to-day.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising12" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-13.RIBCover')); ?>" role="listitem" aria-label="RIB cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">RIB cover</span>
          <span class="service-card__desc">A robust RIB cover to protect tubes, console and seating from UV and weather—built for towing, storage and regular use.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising13" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-16.Bimini')); ?>" role="listitem" aria-label="Bimini sunshade — See more">
        <span class="service-card__info">
          <span class="service-card__title">Bimini sunshade</span>
          <span class="service-card__desc">Shade where it matters—custom biminis designed for your cockpit layout, with strong frames and tidy, marine-grade finishing.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising16" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-17.Jib_Sock')); ?>" role="listitem" aria-label="Jib sock — See more">
        <span class="service-card__info">
          <span class="service-card__title">Jib sock</span>
          <span class="service-card__desc">Protect your headsail from UV with an easy-to-hoist jib sock—simple handling and a neat finish built to last.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising17" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-18.Wind_Scoop')); ?>" role="listitem" aria-label="Wind scoop — See more">
        <span class="service-card__info">
          <span class="service-card__title">Wind scoop</span>
          <span class="service-card__desc">Improve airflow at anchor with a wind scoop tailored to your hatch—more comfort below deck, especially in warmer climates.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising18" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-19.Dinghy_Cover')); ?>" role="listitem" aria-label="Dinghy cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Dinghy cover</span>
          <span class="service-card__desc">Keep your dinghy protected in storage or on deck—hard-wearing covers that help prevent UV damage and water pooling.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising19" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-20.Guardrail_and_Lifeline_Covers')); ?>" role="listitem" aria-label="Guardrail and lifeline covers — See more">
        <span class="service-card__info">
          <span class="service-card__title">Guardrail &amp; lifeline covers</span>
          <span class="service-card__desc">Smart protection against chafe—guardrail and lifeline covers that help preserve sails, covers and clothing around the deck.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising20" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-21.Dodgers')); ?>" role="listitem" aria-label="Dodgers — See more">
        <span class="service-card__info">
          <span class="service-card__title">Dodgers</span>
          <span class="service-card__desc">Extra shelter with a clean look—dodgers built to suit your deck layout, improving protection without compromising visibility.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising21" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section>

<script defer src="<?php echo esc_url($servicesUrl . '/Services.js' . ($jsVer ? '?v=' . $jsVer : '')); ?>"></script>
