<style>
  footer#footer_container {
    --footer-navy: #111c42;
    --footer-navy-light: #202e52;
    --footer-red: #c5234a;
    --footer-text: rgba(255, 255, 255, .76);
    position: relative;
    overflow: hidden;
    margin: 0;
    padding: clamp(3.5rem, 7vw, 6rem) clamp(1.25rem, 5vw, 5rem) 0 !important;
    color: var(--footer-text);
    background: linear-gradient(135deg, #111c42 0%, #202e52 58%, #162449 100%) !important;
    display: block !important;
    font-family: "Poppins", sans-serif;
  }

  footer#footer_container::before {
    position: absolute;
    top: 0;
    left: 0 !important;
    width: 100% !important;
    height: 4px;
    content: "";
    background: var(--footer-red);
    transform: none !important;
  }

  #footer_container::after {
    position: absolute;
    top: -17rem;
    right: -12rem;
    width: 36rem;
    height: 36rem;
    border: 1px solid rgba(255, 255, 255, .08);
    border-radius: 50%;
    content: "";
    pointer-events: none;
  }

  .footer__grid {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: repeat(12, minmax(0, 1fr));
    gap: clamp(1.75rem, 3vw, 3.5rem);
    align-items: start;
    width: min(100%, 76rem);
    margin: 0 auto;
  }

  .footer__brand {
    grid-column: span 4;
    max-width: 24rem;
    text-align: left;
  }

  .footer__grid > nav:nth-child(2) { grid-column: span 2; }
  .footer__grid > nav:nth-child(3) { grid-column: span 2; }

  .footer__grid > section:last-child {
    grid-column: span 4;
    justify-self: end;
    min-width: min(100%, 13rem);
    text-align: left;
  }

  .footer__eyebrow,
  #footer_container .footer__heading {
    margin: 0;
    color: #ffffff !important;
  }

  .footer__eyebrow {
    color: #f05a7d !important;
    font-size: .7rem;
    font-weight: 600;
    letter-spacing: .16em;
    line-height: 1.3;
    text-transform: uppercase;
  }

  .footer__brand-name {
    margin: .65rem 0 1rem;
    color: #ffffff !important;
    font-size: clamp(1.8rem, 3vw, 2.5rem) !important;
    font-weight: 600;
    letter-spacing: -.04em;
    line-height: 1;
  }

  .footer__brand-copy {
    margin: 0;
    color: var(--footer-text) !important;
    font-size: .95rem;
    line-height: 1.65;
  }

  .footer__contact {
    display: flex;
    flex-direction: column;
    gap: .25rem;
    margin: 0 0 1.5rem;
    padding: 0 0 1.25rem;
    border-bottom: 1px solid rgba(255, 255, 255, .18);
  }

  .footer__contact strong,
  .footer__contact a {
    color: #ffffff !important;
    font-size: .82rem;
    line-height: 1.4;
  }

  #footer_container .footer__contact a {
    color: var(--footer-text) !important;
    font-size: .85rem;
  }

  .footer__social-label {
    margin: 0 0 .75rem;
    color: #f05a7d !important;
    font-size: .68rem;
    font-weight: 600;
    letter-spacing: .14em;
    text-transform: uppercase;
  }

  .footer__heading {
    margin-bottom: 1rem;
    font-size: .76rem !important;
    font-weight: 600;
    letter-spacing: .12em;
    line-height: 1.3;
    text-transform: uppercase;
  }

  .footer__grid > nav .footer__heading,
  .footer__grid > nav .footer__list {
    text-align: center;
  }

  .footer__grid > nav .footer__list { align-items: center; }

  .footer__list {
    display: flex;
    flex-direction: column;
    gap: .62rem;
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .footer__list li { margin: 0; }

  #footer_container a {
    color: var(--footer-text) !important;
    font-size: .9rem;
    line-height: 1.35;
    text-decoration: none;
    transition: color .2s ease, padding-left .2s ease;
  }

  #footer_container a:hover,
  #footer_container a:focus-visible {
    padding-left: .35rem;
    color: #ffffff !important;
  }

  .footer__socials {
    display: flex;
    flex-wrap: wrap;
    gap: .55rem;
  }

  #footer_container .footer__socials a {
    padding: .48rem .7rem;
    border: 1px solid rgba(255, 255, 255, .24);
    color: #ffffff !important;
    font-size: .75rem;
    font-weight: 500;
    letter-spacing: .04em;
    text-transform: uppercase;
  }

  #footer_container .footer__socials a:hover,
  #footer_container .footer__socials a:focus-visible {
    padding-left: .7rem;
    border-color: var(--footer-red);
    background: var(--footer-red);
  }

  .footer__bottom {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    width: min(100%, 76rem);
    margin: clamp(3rem, 6vw, 5rem) auto 0;
    padding: 1.15rem 0;
    border-top: 1px solid rgba(255, 255, 255, .16);
  }

  .footer__bottom p,
  #footer_container .footer__terms {
    margin: 0;
    color: rgba(255, 255, 255, .58) !important;
    font-size: .72rem;
    letter-spacing: .04em;
  }

  #footer_container .footer__terms:hover,
  #footer_container .footer__terms:focus-visible {
    padding-left: 0;
    color: #ffffff !important;
  }

  @media (max-width: 900px) {
    .footer__grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .footer__brand,
    .footer__grid > nav:nth-child(2),
    .footer__grid > nav:nth-child(3),
    .footer__grid > section:last-child { grid-column: auto; }
    .footer__grid > section:last-child { justify-self: start; }
  }

  @media (max-width: 560px) {
    #footer_container { padding-inline: 1.5rem; }
    .footer__grid { grid-template-columns: 1fr; }
    .footer__grid > nav .footer__heading,
    .footer__grid > nav .footer__list { text-align: left; }
    .footer__grid > nav .footer__list { align-items: flex-start; }
    .footer__bottom { align-items: flex-start; flex-direction: column; }
  }
</style>

<footer id="footer_container">
  <div class="footer__grid">
    <section class="footer__brand" aria-label="Ullman Sails">
      <p class="footer__eyebrow">United Kingdom</p>
      <p class="footer__brand-name">Ullman Sails</p>
      <p class="footer__brand-copy">Purpose-built sails, canvas and care for every mile on the water.</p>
    </section>

    <nav aria-label="Ullman Sails navigation">
      <h2 class="footer__heading">Explore</h2>
      <ul class="footer__list">
        <li><a href="<?php echo esc_url(ullman_page_url('home')); ?>">Home</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('services')); ?>">Services</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('sail_care')); ?>">Sail Care</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('about_us')); ?>">About Us</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('news')); ?>">News</a></li>
      </ul>
    </nav>

    <nav aria-label="Sail types navigation">
      <h2 class="footer__heading">Sails &amp; care</h2>
      <ul class="footer__list">
        <li><a href="<?php echo esc_url(ullman_page_url('racing')); ?>">Racing</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('cruising')); ?>">Cruising</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('sail_care')); ?>">Sail Care</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('sail_care')); ?>">Canvas</a></li>
      </ul>
    </nav>

    <section aria-label="Contact and social media">
      <h2 class="footer__heading">Contact</h2>
      <div class="footer__contact">
        <strong>Talk to our sailmakers</strong>
        <a href="tel:+441752337131">Plymouth · 01752 337 131</a>
        <a href="tel:+442380457711">Hamble · 02380 457711</a>
      </div>
      <p class="footer__social-label">Follow Ullman</p>
      <div class="footer__socials">
        <a href="https://www.facebook.com/ullmansails.co.uk/" target="_blank" rel="noopener noreferrer">Facebook</a>
        <a href="https://www.instagram.com/ullmansailsuk/" target="_blank" rel="noopener noreferrer">Instagram</a>
        <a href="https://twitter.com/ullmansailsuk" target="_blank" rel="noopener noreferrer">X</a>
        <a href="https://www.youtube.com/user/UllmanSailsTV" target="_blank" rel="noopener noreferrer">YouTube</a>
      </div>
    </section>
  </div>

  <div class="footer__bottom">
    <p>© <?php echo esc_html(wp_date('Y')); ?> Ullman Sails United Kingdom</p>
    <a class="footer__terms" href="<?php echo esc_url(ullman_page_url('terms_and_conditions')); ?>">Terms &amp; Conditions</a>
  </div>
</footer>
