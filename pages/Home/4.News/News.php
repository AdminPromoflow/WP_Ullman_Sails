<?php
declare(strict_types=1);

/* News assets — cache busting */
$newsCssFs = __DIR__ . '/News.css';
$newsJsFs  = __DIR__ . '/News.js';

$newsUrl = get_template_directory_uri() . '/pages/Home/4.News';
$newsCssPublic = $newsUrl . '/News.css';
$newsJsPublic  = $newsUrl . '/News.js';

$newsCssV = is_file($newsCssFs) ? filemtime($newsCssFs) : time();
$newsJsV  = is_file($newsJsFs) ? filemtime($newsJsFs) : time();
?>

<link rel="stylesheet" href="<?php echo esc_url($newsCssPublic . '?v=' . $newsCssV); ?>">

<section class="news-home" aria-labelledby="news-home-title">
  <div class="news-home__shell">
    <div class="news-home__main">

      <!-- News heading -->
      <header class="news-home__header">
        <div class="img-title-sailing-content">
          <img
            src="<?php echo esc_url(get_template_directory_uri() . '/pages/Home/1_slider/img/ullman_sails.png'); ?>"
            alt="Ullman Sails"
            decoding="async"
            width="240"
            height="72"
          >
        </div>

        <h2 id="news-home-title" class="contactus-side-title">News</h2>

        <div class="news-tabs" role="tablist" aria-label="News groups">
          <button
            class="news-tabs__button is-active"
            type="button"
            role="tab"
            aria-selected="true"
            aria-controls="news-group-0"
            id="news-tab-0"
            tabindex="0"
          >
            1
          </button>

          <button
            class="news-tabs__button"
            type="button"
            role="tab"
            aria-selected="false"
            aria-controls="news-group-1"
            id="news-tab-1"
            tabindex="-1"
          >
            2
          </button>

          <button
            class="news-tabs__button"
            type="button"
            role="tab"
            aria-selected="false"
            aria-controls="news-group-2"
            id="news-tab-2"
            tabindex="-1"
          >
            3
          </button>

          <button
            class="news-tabs__button"
            type="button"
            role="tab"
            aria-selected="false"
            aria-controls="news-group-3"
            id="news-tab-3"
            tabindex="-1"
          >
            4
          </button>
        </div>
      </header>

      <div class="news-groups">

        <!-- Group 1 -->
        <div
          class="news-group is-active"
          id="news-group-0"
          role="tabpanel"
          aria-labelledby="news-tab-0"
        >
          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/1.jpg'); ?>"
                alt="Ullman Sails support RC1000"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-rc1000'); ?>">Ullman Sails support RC1000</a></h3>
              <p class="news-card__text">
                RC1000 race series is a brand new racing class based in Plymouth and the south west, aiming for close performance across the fleet.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-rc1000'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>

          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/2.jpg'); ?>"
                alt="Ullman Sails Inshore and Offshore Race Series"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-inshore-offshore'); ?>">Ullman Sails Inshore &amp; Offshore Race Series</a></h3>
              <p class="news-card__text">
                Ullman Sails are pleased to announce the dates for our inshore and offshore points race series, with events planned across the season.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-inshore-offshore'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>

          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/3.jpg'); ?>"
                alt="Victory in the Quarter Ton Cup"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-quarter-ton-cup'); ?>">Victory in the Quarter Ton Cup</a></h3>
              <p class="news-card__text">
                Ullman Sails customer John Santy recently cruised to victory at the Quarter Ton Cup with a memorable and hard-fought campaign.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-quarter-ton-cup'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>
        </div>

        <!-- Group 2 -->
        <div
          class="news-group"
          id="news-group-1"
          role="tabpanel"
          aria-labelledby="news-tab-1"
          hidden
        >
          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/4.jpg'); ?>"
                alt="Loft Updates"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-loft-updates'); ?>">Loft Updates</a></h3>
              <p class="news-card__text">
                The Plymouth loft has continued to grow, adding more floor space and improved equipment for sail building, servicing and repairs.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-loft-updates'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>

          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/5.jpg'); ?>"
                alt="Customer Updates"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-customer-updates'); ?>">Customer Updates</a></h3>
              <p class="news-card__text">
                Great results from Ullman Sails customers across different events, classes and locations with new race and cruising sail inventories.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-customer-updates'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>

          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/6.jpg'); ?>"
                alt="Quarter Tonner Developments"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-quarter-tonner-developments'); ?>">Quarter Tonner Developments</a></h3>
              <p class="news-card__text">
                We have been working hard in the competitive Quarter Tonner fleet, refining sails and helping customers achieve strong results.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-quarter-tonner-developments'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>
        </div>

        <!-- Group 3 -->
        <div
          class="news-group"
          id="news-group-2"
          role="tabpanel"
          aria-labelledby="news-tab-2"
          hidden
        >
          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/7.jpg'); ?>"
                alt="London Boat Show"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-london-boat-show'); ?>">London Boat Show</a></h3>
              <p class="news-card__text">
                A look back at the London Boat Show and the opportunity it offered to reconnect with customers and prepare for the season ahead.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-london-boat-show'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>

          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/8.jpg'); ?>"
                alt="Welcome The Newest Member Of Our Team"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-newest-team-member'); ?>">Welcome The Newest Member Of Our Team</a></h3>
              <p class="news-card__text">
                Meet the newest team member and learn more about the sailing experience and repair work now happening within the loft team.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-newest-team-member'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>

          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/9.jpg'); ?>"
                alt="Penarth Cruising Code Zero"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-penarth-code-zero'); ?>">Penarth – Cruising Code Zero</a></h3>
              <p class="news-card__text">
                South Wales dealers delivered a new cruising Code Zero, helping owners enjoy lighter airs and spend more time sailing.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-penarth-code-zero'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>
        </div>

        <!-- Group 4 -->
        <div
          class="news-group"
          id="news-group-3"
          role="tabpanel"
          aria-labelledby="news-tab-3"
          hidden
        >
          <article class="news-card sr-item">
            <figure class="news-card__media">
              <img
                src="<?php echo esc_url($newsUrl . '/Images/10.jpg'); ?>"
                alt="Hit By a Once in a Life Time Storm"
                loading="lazy"
                decoding="async"
              >
            </figure>

            <div class="news-card__body">
              <h3 class="news-card__title"><a class="news-card__title-link" href="<?php echo esc_url(ullman_page_url('news') . '#news-once-in-a-lifetime-storm'); ?>">Hit By a Once in a Life Time Storm</a></h3>
              <p class="news-card__text">
                A dramatic offshore story that led to a new yacht, new sails and a focus on strength, finishing details and durability.
              </p>

              <div class="news-card__cta-wrap">
                <button
                  class="news-card__cta news-card__cta--primary"
                  type="button"
                  data-url="<?php echo esc_url(ullman_page_url('news') . '#news-once-in-a-lifetime-storm'); ?>"
                >
                  See more
                </button>
              </div>
            </div>
          </article>
        </div>

      </div>
    </div>
  </div>
</section>

<script defer src="<?php echo esc_url($newsJsPublic . '?v=' . $newsJsV); ?>" type="text/javascript"></script>
