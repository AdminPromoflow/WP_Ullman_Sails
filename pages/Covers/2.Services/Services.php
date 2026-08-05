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
    <h1 id="services-title" class="covers-title">Bespoke Boat Covers, Made to Fit</h1>

    <header class="services__intro sr-item">


      <p class="services__lead">
        Whether you're protecting your sails, cockpit, or comfort on board, we make covers to suit your boat and how you use it.
        From stack packs and sprayhoods to hatch covers and helm leathering, each item is made to fit using materials selected for its intended use.
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
          <span class="service-card__desc">Use a made-to-measure stack pack with lazyjacks to receive the lowered mainsail and cover it once the zip is closed.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising1" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-2.BoomCover')); ?>" role="listitem" aria-label="Boom cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Boom cover</span>
          <span class="service-card__desc">A tailored cover that reduces the mainsail’s exposure to UV, rain, salt and dirt while it is stowed on the boom.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising2" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-3.BlanketCover')); ?>" role="listitem" aria-label="Blanket cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Blanket cover</span>
          <span class="service-card__desc">A quick-to-fit cover for a mainsail stowed on the boom, made to suit the sail, mast and fastening arrangement.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising3" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-4.Sprayhood')); ?>" role="listitem" aria-label="Sprayhood — See more">
        <span class="service-card__info">
          <span class="service-card__title">Sprayhood</span>
          <span class="service-card__desc">A fitted sprayhood provides shelter around the companionway and forward cockpit, with clear panels for visibility.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising4" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-5.CockpitCover')); ?>" role="listitem" aria-label="Cockpit cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Cockpit cover</span>
          <span class="service-card__desc">A custom cockpit cover helps limit direct exposure to rain, UV and dirt while the boat is not in use.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising5" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-6.CockpitEnclosure')); ?>" role="listitem" aria-label="Cockpit enclosure — See more">
        <span class="service-card__info">
          <span class="service-card__title">Cockpit enclosure</span>
          <span class="service-card__desc">Add removable shelter around the cockpit with an enclosure designed for the existing sprayhood or a custom frame.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising6" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-7.CockpitCushions')); ?>" role="listitem" aria-label="Cockpit cushions — See more">
        <span class="service-card__info">
          <span class="service-card__title">Cockpit cushions</span>
          <span class="service-card__desc">Cockpit cushions cut to fit, with foam and cover materials selected for outdoor marine use and the owner’s priorities.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising7" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-9.WheelLeathering')); ?>" role="listitem" aria-label="Wheel leathering — See more">
        <span class="service-card__info">
          <span class="service-card__title">Wheel leathering</span>
          <span class="service-card__desc">Add a warmer, more comfortable contact surface at the helm with leather tailored to the wheel.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising9" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-10.WheelBinnacleCover')); ?>" role="listitem" aria-label="Wheel binnacle cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Wheel binnacle cover</span>
          <span class="service-card__desc">Reduce direct UV, rain and dirt exposure with a fitted cover shaped around the wheel, binnacle and instruments.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising10" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-11.WinchCovers')); ?>" role="listitem" aria-label="Winch covers — See more">
        <span class="service-card__info">
          <span class="service-card__title">Winch covers</span>
          <span class="service-card__desc">Fitted covers help keep direct sun, salt spray and dirt off winches while they are not being operated.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising11" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-12.WindowandHatchCovers')); ?>" role="listitem" aria-label="Window and hatch covers — See more">
        <span class="service-card__info">
          <span class="service-card__title">Window and hatch covers</span>
          <span class="service-card__desc">Manage light, privacy and direct UV exposure with mesh or canvas covers made for the boat’s windows and hatches.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising12" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-13.RIBCover')); ?>" role="listitem" aria-label="RIB cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">RIB cover</span>
          <span class="service-card__desc">Cover the console, seating or complete RIB for storage; towing requires a cover specifically designed and secured for transport.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising13" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-16.Bimini')); ?>" role="listitem" aria-label="Bimini sunshade — See more">
        <span class="service-card__info">
          <span class="service-card__title">Bimini sunshade</span>
          <span class="service-card__desc">Create shade above the cockpit with a bimini designed around the boat’s layout, frame and sailing controls.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising16" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-17.Jib_Sock')); ?>" role="listitem" aria-label="Jib sock — See more">
        <span class="service-card__info">
          <span class="service-card__title">Jib sock</span>
          <span class="service-card__desc">Hoist a fitted jib sock over a furled headsail to reduce direct UV exposure while the sail is stowed.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising17" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-18.Wind_Scoop')); ?>" role="listitem" aria-label="Wind scoop — See more">
        <span class="service-card__info">
          <span class="service-card__title">Wind scoop</span>
          <span class="service-card__desc">Direct available breeze through an open hatch with a wind scoop sized and rigged for the boat.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising18" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-19.Dinghy_Cover')); ?>" role="listitem" aria-label="Dinghy cover — See more">
        <span class="service-card__info">
          <span class="service-card__title">Dinghy cover</span>
          <span class="service-card__desc">Reduce direct weather and dirt exposure with a dinghy cover designed for storage, or separately specified for towing.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising19" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-20.Guardrail_and_Lifeline_Covers')); ?>" role="listitem" aria-label="Guardrail and lifeline covers — See more">
        <span class="service-card__info">
          <span class="service-card__title">Guardrail &amp; lifeline covers</span>
          <span class="service-card__desc">Add a padded contact surface to selected guardrails or lifelines for comfort and to reduce local rubbing.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising20" aria-hidden="true"></span>
      </a>

      <a class="service-card sr-item" href="<?php echo esc_url(ullman_page_url('Covers-21.Dodgers')); ?>" role="listitem" aria-label="Dodgers — See more">
        <span class="service-card__info">
          <span class="service-card__title">Dodgers</span>
          <span class="service-card__desc">Side dodgers fitted to guardrails and stanchions can reduce wind and spray around the cockpit and carry custom graphics.</span>
          <span class="service-card__cta">See more</span>
        </span>
        <span class="service-card__media pictureCruising21" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section>

<script defer src="<?php echo esc_url($servicesUrl . '/Services.js' . ($jsVer ? '?v=' . $jsVer : '')); ?>"></script>
