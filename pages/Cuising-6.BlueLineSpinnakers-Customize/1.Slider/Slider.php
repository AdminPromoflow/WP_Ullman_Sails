<style media="screen">
.slideHome{
  position: relative;
  height: 80vh;
  min-height: 500px;
  width: 100vw;
  background-image: url("../Cuising-6.BlueLineSpinnakers-Customize/1.Slider/SlideHome2.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.gradientSlideHome{
  position: relative;
  height: 100%;
  width: 100%;

}

@media  (orientation: landscape) {
  .slideHome{
    height: 100vh;
  }
}
:root{
  --ull-blue: #005598;

  --nav-h: 86px;
  --slider-h: 100dvh;
  --cap-top-safe: calc(var(--nav-h) + 1.25rem);

  --hs-title: clamp(34px, 9.8vw, 36px);
  --hs-sub: clamp(16px, 4.4vw, 17px);
  --hs-logo: clamp(95px, 28vw, 105px);

  --cap-pad: 1.15rem;
  --cap-side-w: clamp(280px, 96vw, 520px);
  --sub-max: 34ch;

  --btn-size: clamp(1.05rem, 4.2vw, 1.3rem);

  --kicker-shadow: 0 2px 12px rgba(0, 0, 0, 0.55);
  --title-shadow: 1px 1px 0 #000;
  --line-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
}

/* Responsive variables */
@media (min-width: 376px) and (max-width: 430px){
  :root{
    --hs-title: clamp(36px, 9.3vw, 40px);
    --hs-sub: clamp(17px, 4.2vw, 18px);
    --hs-logo: clamp(105px, 26.8vw, 115px);
    --cap-pad: 1.2rem;
    --cap-side-w: clamp(290px, 95vw, 560px);
    --sub-max: 32ch;
    --btn-size: clamp(1.08rem, 4vw, 1.34rem);
  }
}

@media (min-width: 431px) and (max-width: 599px){
  :root{
    --hs-title: clamp(40px, 7.4vw, 44px);
    --hs-sub: clamp(18px, 3.2vw, 19px);
    --hs-logo: clamp(115px, 21vw, 125px);
    --cap-pad: 1.35rem;
    --cap-side-w: clamp(300px, 92vw, 620px);
    --sub-max: 30ch;
    --btn-size: clamp(1.1rem, 3.4vw, 1.4rem);
  }
}

@media (min-width: 600px) and (max-width: 767px){
  :root{
    --hs-title: clamp(44px, 6.3vw, 48px);
    --hs-sub: clamp(19px, 2.7vw, 20px);
    --hs-logo: clamp(125px, 17.7vw, 135px);
    --cap-pad: 1.6rem;
    --cap-side-w: clamp(320px, 84vw, 720px);
    --sub-max: 28ch;
    --btn-size: clamp(1.12rem, 2.6vw, 1.48rem);
  }
}

@media (min-width: 768px) and (max-width: 834px){
  :root{
    --hs-title: clamp(48px, 6.2vw, 52px);
    --hs-sub: clamp(20px, 2.6vw, 22px);
    --hs-logo: clamp(135px, 17.4vw, 145px);
    --cap-pad: 1.9rem;
    --cap-side-w: clamp(340px, 78vw, 760px);
    --sub-max: 26ch;
    --btn-size: clamp(1.14rem, 2.2vw, 1.56rem);
  }
}

@media (min-width: 835px) and (max-width: 1024px){
  :root{
    --hs-title: clamp(52px, 5.5vw, 56px);
    --hs-sub: clamp(22px, 2.35vw, 24px);
    --hs-logo: clamp(145px, 15.2vw, 155px);
    --cap-pad: 2rem;
    --cap-side-w: clamp(360px, 72vw, 860px);
    --sub-max: 24ch;
    --btn-size: clamp(1.16rem, 1.9vw, 1.72rem);
  }
}

@media (min-width: 1025px){
  :root{
    --hs-title: clamp(56px, calc(16.5px + 3.4vw), 86px);
    --hs-sub: clamp(24px, calc(13.5px + 0.9vw), 32px);
    --hs-logo: clamp(150px, calc(58px + 7.9vw), 220px);
    --cap-pad: 3rem;
    --cap-side-w: clamp(420px, 62vw, 1100px);
    --sub-max: 22ch;
    --btn-size: clamp(1.15rem, 1.8vw, 2.05rem);
  }
}

/* Article principal */
.home-slider__slide{
  --slide-bg: none;
  position: relative;
  flex: 0 0 100%;
  width: 100%;
  height: 100%;
  display: grid;
  place-items: center;
  background-image: var(--slide-bg);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Fondo específico de este slide */
.home-slider__slide.bg-services{
  --slide-bg: url("img/services.jpg");
}

/* Overlay */
.home-slider__slide::before{
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  background:
    radial-gradient(1200px 600px at 20% 40%, rgba(0, 0, 0, 0.28), transparent 55%),
    radial-gradient(900px 520px at 80% 30%, rgba(0, 0, 0, 0.18), transparent 58%);
}

/* Caption */
.home-slider__caption{
  position: absolute;
  inset-block: 0;
  inset-inline-start: 0;
  z-index: 2;
  width: var(--cap-side-w);
  height: 100%;
  padding: var(--cap-pad);
  padding-top: max(var(--cap-pad), var(--cap-top-safe));
  padding-left: calc(50px + 1rem);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  gap: 1rem;
  text-align: left;
}

/* Logo wrapper */
.home-slider__kicker{
  margin: 0;
  text-shadow: var(--kicker-shadow);
}

/* img */
.home-slider__kicker img{
  display: block;
  width: var(--hs-logo);
  height: auto;
  filter: drop-shadow(1.2px 1.2px 0 rgba(0, 0, 0, .6));
}

/* h1 */
.home-slider__title{
  margin: 0;
  font-size: var(--hs-title);
  font-weight: 700;
  line-height: 1.05;
  letter-spacing: .01em;
  color: var(--ull-blue);
  text-shadow:
    .1px .1px 0 rgba(0, 0, 0, .6),
    -.1px -.1px 0 rgba(0, 0, 0, .6);
}

/* h2 */
.home-slider__subtitle{
  margin: 0;
  max-width: var(--sub-max);
  font-size: var(--hs-sub);
  font-weight: 500;
  line-height: 1.15;
  color: rgba(255, 255, 255, 0.92);
  text-shadow: var(--title-shadow);
}

/* Línea decorativa */
.home-slider__line{
  width: min(620px, 90%);
  height: 3px;
  margin-top: .9rem;
  background: rgba(255, 255, 255, 0.92);
  box-shadow: var(--line-shadow);
}

/* a */
.home-slider__btn{
  display: inline-block;
  width: max-content;
  min-width: clamp(170px, 26vw, 220px);
  margin-top: 1.2rem;
  padding: 12px 22px;
  background: rgba(0, 85, 152, .92);
  color: #fafafa;
  border: 1px solid rgba(255, 255, 255, .18);
  box-shadow: 0 12px 30px rgba(0, 0, 0, .28);
  font-size: var(--btn-size);
  font-weight: 600;
  text-decoration: none;
  text-align: center;
  cursor: pointer;
  transition: transform .18s ease, filter .18s ease;
}

.home-slider__btn:hover{
  transform: translateY(-1px);
  filter: brightness(1.06);
}

.home-slider__btn:focus-visible{
  outline: 2px solid #fff;
  outline-offset: 3px;
}


</style>

<section id="slideHome" class="slideHome">
  <div class="gradientSlideHome">
    <article class="home-slider__slide bg-racing-1 is-caption-left">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../home/1_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">Custom Spinnaker Graphics</h1>
        <h2 class="home-slider__subtitle">Want to customise your sails?</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="#customize">Click here</a>
      </div>
    </article>

  </div>
</section>
