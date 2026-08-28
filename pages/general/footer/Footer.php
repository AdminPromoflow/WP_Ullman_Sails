<style>
  /* Keep the footer itself as a vertical wrapper; only its inner content is a grid. */
  body footer#footer_container {
    --footer-navy: #111c42;
    --footer-navy-light: #202e52;
    --footer-red: #c5234a;
    --footer-text: rgba(255, 255, 255, .76);
    position: relative;
    z-index: 20;
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
    grid-template-columns: minmax(13rem, 1.35fr) repeat(2, minmax(8rem, .78fr)) minmax(13rem, 1.1fr) minmax(10rem, .85fr);
    gap: clamp(1.5rem, 3.5vw, 5.5rem);
    align-items: start;
    width: min(100%, 90rem);
    margin: 0 auto;
  }

  .footer__brand {
    max-width: 24rem;
    text-align: left;
  }

  .footer__grid > nav {
    min-width: 0;
    padding-top: .15rem;
    text-align: left;
  }

  .footer__contact-section {
    min-width: 0;
    padding-left: clamp(1.5rem, 3vw, 3rem);
    border-left: 1px solid rgba(255, 255, 255, .18);
    text-align: left;
  }

  .footer__social-section { min-width: 0; }

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

  .footer__brand-logo {
    display: block;
    width: clamp(11rem, 17vw, 17rem);
    max-width: 100%;
    height: auto;
    margin: .7rem 0 1rem;
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

  .footer__social-section .footer__social-label { color: #ffffff !important; }

  .footer__heading {
    margin-bottom: 1rem;
    font-size: .76rem !important;
    font-weight: 600;
    letter-spacing: .12em;
    line-height: 1.3;
    text-transform: uppercase;
  }

  body footer#footer_container .footer__list {
    align-items: flex-start;
    display: flex;
    flex-direction: column;
    gap: .62rem;
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .footer__list li { margin: 0; }

  body footer#footer_container .footer__list li { text-align: left; }

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
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: .55rem;
  }

  #footer_container .footer__socials a {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 2.7rem;
    padding: .45rem .25rem;
    border: 1px solid rgba(255, 255, 255, .24);
    color: #ffffff !important;
    font-size: .67rem;
    font-weight: 500;
    letter-spacing: .04em;
    text-align: center;
    text-transform: uppercase;
  }

  #footer_container .footer__socials a:hover,
  #footer_container .footer__socials a:focus-visible {
    padding-left: .25rem;
    border-color: var(--footer-red);
    background: var(--footer-red);
  }

  body footer#footer_container .footer__bottom {
    position: relative;
    z-index: 10;
    display: flex !important;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    width: min(100%, 90rem) !important;
    margin: clamp(3.25rem, 6vw, 5rem) auto 0;
    padding: 1.15rem 0;
    border-top: 1px solid rgba(255, 255, 255, .16);
  }

  .footer__bottom p,
  #footer_container .footer__terms,
  #footer_container .footer__admin-login {
    margin: 0;
    color: rgba(255, 255, 255, .58) !important;
    font-size: .72rem;
    letter-spacing: .04em;
  }

  .footer__legal-links {
    display: inline-flex;
    align-items: center;
    gap: 1rem;
  }

  #footer_container .footer__admin-login {
    color: rgba(255, 255, 255, .38) !important;
    font-size: .64rem;
    text-transform: uppercase;
  }

  #footer_container .footer__terms:hover,
  #footer_container .footer__terms:focus-visible,
  #footer_container .footer__admin-login:hover,
  #footer_container .footer__admin-login:focus-visible {
    padding-left: 0;
    color: #ffffff !important;
  }

  @media (max-width: 900px) {
    body footer#footer_container .footer__grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
      row-gap: 3rem;
    }

    .footer__brand { grid-column: 1 / -1; }

    .footer__contact-section,
    .footer__social-section {
      padding: 2rem 0 0;
      border-top: 1px solid rgba(255, 255, 255, .18);
      border-left: 0;
    }
  }

  @media (max-width: 560px) {
    #footer_container { padding-inline: 1.5rem; }
    body footer#footer_container .footer__grid { grid-template-columns: 1fr; }
    .footer__brand { grid-column: auto; }
    .footer__contact-section,
    .footer__social-section { padding-top: 1.75rem; }
    .footer__bottom { align-items: flex-start; flex-direction: column; }
    .footer__legal-links { flex-wrap: wrap; }
  }
</style>

<footer id="footer_container">
  <div class="footer__grid">
    <section class="footer__brand" aria-label="Ullman Sails">
      <p class="footer__eyebrow">United Kingdom</p>
      <img class="footer__brand-logo" src="<?php echo esc_url(get_template_directory_uri() . '/pages/general/menu/img/logo.png'); ?>" alt="Ullman Sails">
      <p class="footer__brand-copy">Purpose-built sails, canvas and care for every mile on the water.</p>
    </section>

    <nav aria-label="Ullman Sails navigation">
      <!-- <h2 class="footer__heading">Explore</h2> -->
      <ul class="footer__list">
        <li><a href="<?php echo esc_url(ullman_page_url('home')); ?>">Home</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('sail_care')); ?>">Sail Care</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('about_us')); ?>">About Us</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('contact_us')); ?>">Contact us</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('news')); ?>">News</a></li>
      </ul>
    </nav>

    <nav aria-label="Services and covers navigation">
      <!-- <h2 class="footer__heading">Services &amp; Covers</h2> -->
      <ul class="footer__list">
        <li><a href="<?php echo esc_url(ullman_page_url('services')); ?>">Services</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('covers')); ?>">Boat Covers</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('racing')); ?>">Racing</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('cruising')); ?>">Cruising</a></li>
        <li><a href="<?php echo esc_url(ullman_page_url('the_axia_series')); ?>">The Axia Series</a></li>
      </ul>
    </nav>

    <section class="footer__contact-section" aria-label="Contact details">
      <h2 class="footer__heading">Contact</h2>
      <br>
      <div class="footer__contact">
        <strong>Talk to our sailmakers</strong>
        <a href="tel:+441752337131">Plymouth · 01752 337 131</a>
        <a href="tel:+442380457711">Hamble · 02380 457711</a>
      </div>
    </section>

    <section class="footer__social-section" aria-label="Social media">
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
    <div class="footer__legal-links">
      <a class="footer__terms" href="<?php echo esc_url(ullman_page_url('terms_and_conditions')); ?>">Terms &amp; Conditions</a>
      <a class="footer__admin-login" href="<?php echo esc_url(ullman_page_url('login-admin')); ?>">Admin login</a>
    </div>
  </div>
</footer>
