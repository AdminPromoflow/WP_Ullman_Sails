<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$navCssFs = __DIR__ . '/News/Content/Content.css';
$navJsFs  = __DIR__ . '/News/Content/Content.js';

/* Public paths (as used in HTML) */
$navCssPublic = '../News/Content/Content.css';
$navJsPublic  = '../News/Content/Content.js';

/* Version values (cache-busting) */
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV  = is_file($navJsFs)  ? filemtime($navJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $navCssPublic ?>?v=<?= $navCssV ?>">
<section class="newsroom" aria-labelledby="newsroom-title">
  <div class="newsroom__shell">

    <header class="newsroom__hero reveal">
      <p class="newsroom__eyebrow">Ullman Sails GBR</p>
      <!-- <h1 id="newsroom-title" class="newsroom__title">News & Updates</h1> -->
      <p class="newsroom__lead">
        Race results, loft developments, customer stories and sailing news presented in a cleaner,
        more polished and fully responsive layout.
      </p>
    </header>

    <!-- <nav class="newsroom__index reveal" id="newsIndex" aria-label="Article quick links"></nav> -->

    <div class="newsroom__list">

      <!-- 1 -->
      <article class="news-card reveal" id="news-rc1000" data-title="Ullman Sails support RC1000">
        <header class="news-card__header">
          <span class="news-card__tag">Race Series</span>
          <h2 class="news-card__title">Ullman Sails support RC1000</h2>
        </header>

        <div class="news-card__content">
          <figure class="news-media">
            <img src="../News/Content/1.UllmanSailssupportRC1000/1.RC1000-Sunfast-3200-Sun-Fire-beating-to-windward-in-Plymouth-Sound-during-the-Port-of-Plymouth-Sailing-Association-Yacht-Regatta.jpg" alt="RC1000 yacht racing in Plymouth Sound" loading="lazy" decoding="async">
            <figcaption>PGC Photography</figcaption>
          </figure>

          <p>
            RC1000 race series is a brand new racing class based in Plymouth and the south west,
            aiming for close performance across the whole fleet. The organisers are hoping to
            arrange close racing, training, support and of course a great social scene too.
          </p>

          <p>
            The overall competition will take place across 4 weekends, with 3 to count towards
            the Mayflower 400 trophy. There are 10 boats already committed to racing and more are
            always welcome. Get in touch with our own Jon Pegg for advice on whether your boat can be
            accommodated in the RC1000 banding.
          </p>

          <figure class="news-media">
            <img src="../News/Content/1.UllmanSailssupportRC1000/2.RC1000-J105-Jamala-upwind-beating-hard-in-Plymouth-Sound-during-the-Port-of-Plymouth-Sailing-Association-Yacht-Regatta.jpg" alt="RC1000 boat racing upwind" loading="lazy" decoding="async">
            <figcaption>PGC Photography</figcaption>
          </figure>

          <p>
            Each race weekend will take place across two days, with several races on each day.
            Both days will be rounded off with a social event and, of course, prizes on the Sunday.
            Ullman Sails are happy to be lending their support to this new race series.
            <a href="https://rc1000.org" target="_blank" rel="noopener noreferrer">
              Visit the RC1000 race series website for more information.
            </a>
          </p>
        </div>
      </article>

      <!-- 2 -->
      <article class="news-card reveal" id="news-inshore-offshore" data-title="Ullman Sails Inshore & Offshore Race Series">
        <header class="news-card__header">
          <span class="news-card__tag">Events</span>
          <h2 class="news-card__title">Ullman Sails Inshore &amp; Offshore Race Series</h2>
        </header>

        <div class="news-card__content">
          <p>
            Ullman Sails are pleased to announce the dates for our inshore and offshore points race series for 2020.
          </p>

          <figure class="news-media">
            <img src="../News/Content/2.UllmanSailsInshore/1.J105upwind2.jpg" alt="J105 racing upwind" loading="lazy" decoding="async">
            <figcaption>PGC Photography</figcaption>
          </figure>

          <p>
            We are getting ourselves organised for a whole new year of getting out on the
            water and having fun. The Ullman race series are open to racers, cruisers and
            everyone in between. We also like to get a little more social when the sailing is done,
            with after-race drinks at many of the events.
          </p>

          <p>
            Both of the Ullman race series are held with the help of many different clubs.
            Entries to the races will be via the club hosting each event.
          </p>

          <h3 class="news-subtitle">Ullman Sails Inshore Series</h3>
          <p>This year, the inshore series will be held over 7 events from May to September.</p>

          <ul class="news-listing">
            <li>PYC Long Distance Race – 16/05/20</li>
            <li>SSC Plymouth to Fowey – 06/06/20</li>
            <li>PYC Fowey to Plymouth – 07/06/20</li>
            <li>TMSC Wreck Race – 18/07/20</li>
            <li>TMSC Ranneys Buoy Race – 19/07/20</li>
            <li>PYC Plymouth to Salcombe – 05/09/20</li>
            <li>PYC Salcombe to Plymouth – 06/09/20</li>
          </ul>

          <figure class="news-media">
            <img src="../News/Content/2.UllmanSailsInshore/2.34.7fiberpathLarge.jpg" alt="FiberPath sailing yacht" loading="lazy" decoding="async">
            <figcaption>PGC Photography</figcaption>
          </figure>

          <h3 class="news-subtitle">Ullman Sails Offshore Series</h3>
          <p>Our offshore series will be held across 4 events from May to August.</p>

          <ul class="news-listing">
            <li>RNSA Plymouth to St. Peter Port – 22/05/20</li>
            <li>YYC Plymouth to Trebeurden – 18/06/20</li>
            <li>RNSA Plymouth to Roscoff – 24/07/20</li>
            <li>RNSA Plymouth to Dartmouth – 22/08/20</li>
          </ul>

          <p>We look forward to seeing as many of you getting involved as possible.</p>
        </div>
      </article>

      <!-- 3 -->
      <article class="news-card reveal" id="news-quarter-ton-cup" data-title="Victory in the Quarter Ton Cup">
        <header class="news-card__header">
          <span class="news-card__tag">Race Result</span>
          <h2 class="news-card__title">Victory in the Quarter Ton Cup</h2>
        </header>

        <div class="news-card__content">
          <figure class="news-media">
            <img src="../News/Content/3.VictoryintheQuarterTonCup/1.quarterton1107x594.jpg" alt="Quarter Ton Cup racing" loading="lazy" decoding="async">
          </figure>

          <p>
            Ullman Sails customer John Santy recently cruised to victory at the Quarter
            Ton Cup. Read his amusing account of how he and the team got there.
          </p>

          <p>
            After the 2018 Quarter Ton Cup came and went, and after 9 years of trying
            to win this crazy little event, words were uttered on the dockside.
            “We are done with this little ship, if we are to keep doing this thing,
            we need a thoroughbred with history to take on the Cowes Mafia.”
          </p>

          <p>
            Due diligence was done on a range of steeds. As fate would have it, our
            stead of choice happened to be in Hamble, not Timbuktu. Lacydon Protis, the
            1981 Marseille Quarter Ton Cup winner, was in town. Visits were made to view,
            discussions had, and offers suggested.
          </p>

          <p>
            We were reminded that Quarter Ton sailing was all about bringing old friends
            together and having fun. But fun is winning when it comes to this group of
            diehards. “We can’t have our heads kicked in anymore,” and “We need to bring
            a knife to the knife fight,” were the phrases that rang true and loud.
          </p>

          <p>After one big boozy Thursday steak night, “OK, let’s do it!” went the roar.</p>

          <figure class="news-media">
            <img src="../News/Content/3.VictoryintheQuarterTonCup/2.quartertoncup.jpg" alt="Quarter Ton Cup team" loading="lazy" decoding="async">
          </figure>

          <h3 class="news-subtitle">New Hope for the Quarter Ton Cup</h3>

          <p>
            The deed was done on the 4th September, and Lacydon Protis had a new stable.
            Then, like a speeding white Ford Sierra on its way back from Twin Town,
            we took the reins of Protis, as she will now be called.
          </p>

          <p>
            We went sailing for the first time on the 6th of October 2018, after a huge bit of
            rig jiggery-pokery, kit swapping and cradle making. A few racing days with old ill-fitting
            headsails and chutes at the Hamble Winter Series 2018 resulted in 3 bullets and a lot of grins.
            The last racing being the 9th of December in 30kts with no falling over.
          </p>

          <p>Is it, will it be, could it be the one? Our minds dared to dream as winter was upon us.</p>

          <p>
            A master plan was hatched, and the big year ahead starts, with design debates,
            sail debates, rating debates, boat-to-go-undercover debates, remove-pink debates and more.
            The list got ever bigger, but how do we stop the deadly leading duo? “You can’t,” was the reply.
          </p>

          <p>
            And so came the winter boat work phase. The removal of anything and everything
            was the order of the day, and the midnight oil was burnt. Bodies, minds and relationships
            were pushed to the limit in honourable pursuit of this most Holy of sailing grails.
          </p>

          <p>
            A change of venue arrived and a trip to the Dark Side found us sheltered
            with new friends willing to do honest toil on the east shore. February and
            March passed in a flash.
          </p>

          <p>
            High altitude training had commenced for some members of the team with
            limited success. The major job list almost complete, we ventured back home
            to Hamble and got ready to launch. This ended up being delayed due to rudder
            issues and real paying work.
          </p>

          <h3 class="news-subtitle">The Quarter Ton Sailing Story for 2019</h3>

          <p>
            The start of the 2019 Warsash Spring Series arrived and went. We finally
            splashed the boat for the first time on Saturday the 27th of April, with
            some dock test fitting of the newly arrived Ullman fruit.
          </p>

          <p>
            Yes, we had new sails earlier than the first race of the Quarter Ton Cup.
            What could possibly go wrong?
          </p>

          <p>
            A massive thank you to Jon Pegg and Bruce Hollis from Ullman Sails for
            designing and manufacturing some great sails. We finally went sailboat
            racing for the first time in the new ship on April the 28th, for races 8
            and 9 of the series.
          </p>

          <p>
            Our old foes were waiting for us and had been practising hard for the battles ahead.
            We locked horns for the first two races of our season and started as we hoped we would go on,
            with a score of a 3rd and a 1st. The games had commenced.
          </p>

          <p>
            Then quickly arrived the Vice Admirals Cup which resulted in a 2nd overall
            by 1.5 pts with a score of 1, 2, 4, 3, 2, 1.5, 2, 2.
          </p>

          <p>
            Is it, will it be, could it be the one? Our minds dared to dream as the
            Quarter Ton Cup was almost upon us.
          </p>

          <figure class="news-media">
            <img src="../News/Content/3.VictoryintheQuarterTonCup/3.quartertonboatullmansails.jpg" alt="Quarter Ton boat with Ullman Sails" loading="lazy" decoding="async">
          </figure>

          <h3 class="news-subtitle">The Quarter Ton Cup Dawns</h3>

          <p>
            A few sailing days and sail testing continued. One race also got fitted
            in during the first Royal Southern May Regatta which again resulted in a
            light-air bullet. Much rum and Marty dancing was done.
          </p>

          <p>
            Some team members then went off to sail in other events and take a much
            needed holiday, in readiness for the big one to come.
          </p>

          <p>
            Then the Holy Grail event had arrived, with a very high-quality top 10
            turnout and all the usual faces. The nerves had started. The rest, as they say,
            is now folklore and written large in history forevermore.
          </p>

          <figure class="news-media">
            <img src="../News/Content/3.VictoryintheQuarterTonCup/4.quartertonullmansails.jpg" alt="Quarter Ton Cup action shot" loading="lazy" decoding="async">
          </figure>

          <p>
            Team Hamble, after 10 years, had finally delivered that which was long overdue.
            Protis wins the
            <a href="https://www.quartertoncup.org" target="_blank" rel="noopener noreferrer">2019 Quarter Ton Cup</a>
            with a score of 13.5 pts against second place on 31 pts and third on 41.5.
            The biggest winning margin since the Quarter Ton Cup was relaunched.
          </p>

          <p>
            It was pure joy to sit and watch our great leader head off across the
            horizon to the unbeatable position of a Quarter Ton Cup win with a race to spare.
          </p>

          <figure class="news-media">
            <img src="../News/Content/3.VictoryintheQuarterTonCup/5.quartertonboat.jpg" alt="Protis racing yacht" loading="lazy" decoding="async">
          </figure>

          <h3 class="news-subtitle">What’s Next For The Boat?</h3>

          <p>“What next?” I hear you shout.</p>

          <p>
            The sailing year is not yet over. Other friends arrived to assist us with
            the continued lower-key events of the Protis season.
          </p>

          <p>
            July 5th to 7th, the IRC Nationals arrived with all manner of vessels
            large and small from 26′ to 47′ coming to take on the mighty Protis.
            Once we had understood that we were not level racing and we were the smallest
            boat in our fleet, we came up with a plan and much fun was had with a 2nd overall in class 4.
          </p>

          <p>
            The lower-key summer then continued. The Tattinger Regatta in Yarmouth
            was booked in for 27th to 28th July 2019, a three-race schedule in Class 4 over two days.
            All of this played out to give us a score of 3 x 1sts in a fleet of 27 and an overall regatta win
            for Protis against 213 other boats.
          </p>

          <p>
            The Hamble Winter Series then brought us full circle to where the Protis sailing year
            had started back in October of 2018. Team Protis had so far delivered 8 firsts with hopefully more to come.
          </p>

          <p>
            So just to recap the year in race numbers: Protis competed in 40 races, won 23,
            and failed to make the podium on only 5 outings, with a worst result of 5th.
            An unbelievable record.
          </p>

          <p>
            So to answer the recurring question of the earlier season:
            Is it, will it be, could it be the one?
            Yes, it is. Yes, it will be. Yes, it’s the one.
          </p>

          <figure class="news-media">
            <img src="../News/Content/3.VictoryintheQuarterTonCup/6.quartertoncupullmansails.jpg" alt="Quarter Ton Cup celebration" loading="lazy" decoding="async">
          </figure>
        </div>
      </article>

      <!-- 4 -->
      <article class="news-card reveal" id="news-loft-updates" data-title="Loft Updates">
        <header class="news-card__header">
          <span class="news-card__tag">Loft</span>
          <h2 class="news-card__title">Loft Updates</h2>
        </header>

        <div class="news-card__content">
          <figure class="news-media">
            <img src="../News/Content/4.LoftUpdates/1.LoftDevelopments2.jpg" alt="Loft developments and new workspace" loading="lazy" decoding="async">
          </figure>

          <p>
            2018 has seen the loft in Plymouth grow in all aspects – we are now sporting
            over 115 square metres of floor space to build, service and repair sails.
          </p>

          <p>
            In August, we had a visit from Solent Sewing and Welding Solutions when
            they came to install our new Long Arm sewing machine. Having this machine
            means we can now build and service bigger sails. Not only that, but the work
            we do is quicker, more efficient and the machine is much more eco-friendly than the last one.
          </p>
        </div>
      </article>

      <!-- 5 -->
      <article class="news-card reveal" id="news-customer-updates" data-title="Customer Updates">
        <header class="news-card__header">
          <span class="news-card__tag">Customers</span>
          <h2 class="news-card__title">Customer Updates</h2>
        </header>

        <div class="news-card__content">
          <figure class="news-media">
            <img src="../News/Content/5.CustomerUpdates/1.Customer-Updates.jpg" alt="Customer updates from Ullman Sails" loading="lazy" decoding="async">
          </figure>

          <p>
            This year loft regular Mike Nuttall managed a series win in the Plym Yacht
            Club Friday night series and an overall class win at Fowey Regatta with a
            full suit of Ullman Sails including a brand new FiberPath GP Race main and genoa.
          </p>

          <p>
            In Cardiff, customer Chris Watler and his J92s are “absolutely loving” their
            new FiberPath GP Race Code 2. We worked closely with our Wales dealer Penarth
            Covers to ensure Chris got exactly the right sail for his needs and it seems
            the work paid off.
          </p>

          <p>
            We provided a full suit of sails for Lady Ex, an Extrovert based in
            Scotland through our Scotland and Northern Ireland dealer Andy Malcolm.
            The owner and crew are extremely pleased with their new sails and achieved
            a 4th place in the Scottish Series 2018.
          </p>
        </div>
      </article>

      <!-- 6 -->
      <article class="news-card reveal" id="news-quarter-tonner-developments" data-title="Quarter Tonner Developments">
        <header class="news-card__header">
          <span class="news-card__tag">Development</span>
          <h2 class="news-card__title">Quarter Tonner Developments</h2>
        </header>

        <div class="news-card__content">
          <figure class="news-media">
            <img src="../News/Content/6.QuarterTonnerDevelopments/1.Developments.jpg" alt="Quarter Tonner developments" loading="lazy" decoding="async">
          </figure>

          <p>
            We’ve been working particularly hard this season in the highly competitive
            Quarter Tonner fleet. At the start of the year we provided a full suit of
            sails to Louise Morton’s Bullet and have been following the ladies’ progress,
            helping to develop the sails as we go.
          </p>

          <p>
            Ullman powered boats have achieved some fantastic results in 2018, with a
            2nd and 3rd in the Vice Admirals Cup (tied on points with 1st) for Bullet and
            Whiskers, and a 2nd in Cowes Week for Bullet.
          </p>

          <p>
            Our upwind sails boast full carbon load-bearing fibres, our newest generation
            Dyneema® hank technology and carbon fibre battens thanks to our close working
            relationship with Customised Carbon. We’ve had nothing but praise from our
            customers and their results speak for themselves.
          </p>

          <p>
            We’re looking forward to providing two more boats with our sails for the 2019 season.
          </p>
        </div>
      </article>

      <!-- 7 -->
      <article class="news-card reveal" id="news-london-boat-show" data-title="London Boat Show">
        <header class="news-card__header">
          <span class="news-card__tag">Boat Show</span>
          <h2 class="news-card__title">London Boat Show</h2>
        </header>

        <div class="news-card__content">
          <figure class="news-media">
            <img src="../News/Content/7.LondonBoatShow/1.Boatshow-2.jpg" alt="London Boat Show" loading="lazy" decoding="async">
          </figure>

          <p>
            Here at Ullman Sails GBR we used to love the London Boat Show. It was a
            fantastic opportunity to catch up with our customers in the New Year,
            and help them plan ahead for the coming season.
          </p>

          <p>
            We’re really sad to see that there won’t be a London Boat Show in 2019,
            but we’d still like to offer our customers the best deals possible, even if
            we can’t have a chat with them at the stand.
          </p>

          <p>
            So please get in touch if you need anything – we’d be more than happy
            to see what we can offer you.
          </p>
        </div>
      </article>

      <!-- 8 -->
      <article class="news-card reveal" id="news-newest-team-member" data-title="Welcome The Newest Member Of Our Team">
        <header class="news-card__header">
          <span class="news-card__tag">Team</span>
          <h2 class="news-card__title">Welcome The Newest Member Of Our Team</h2>
        </header>

        <div class="news-card__content">
          <p>
            Charlie has been sailing for over ten years and has completed a range of RYA courses,
            including Yachtmaster. Two years racing and cruising on superyachts around
            the world as a first mate, along with his love and passion for sailing,
            made him a great candidate to join the Plymouth team.
          </p>

          <figure class="news-media">
            <img src="../News/Content/8.WelcomeTheNewestMemberOfOurTeam/1.Charlie.jpg" alt="Charlie, newest member of the Ullman Sails team" loading="lazy" decoding="async">
          </figure>

          <p>
            Charlie has been working with Nathan and Vicky on sail repairs.
            They are both more than happy to pass on their years of experience.
          </p>

          <p>
            Dan has also been helping Charlie understand how the sails are first built,
            which gives an insight into how repairs on older sails work.
          </p>

          <p>
            Charlie, like the rest of us, is looking forward to a season of sailing
            back in local waters.
          </p>
        </div>
      </article>

      <!-- 9 -->
      <article class="news-card reveal" id="news-penarth-code-zero" data-title="Penarth – Cruising Code Zero">
        <header class="news-card__header">
          <span class="news-card__tag">Cruising</span>
          <h2 class="news-card__title">Penarth – Cruising Code Zero</h2>
        </header>

        <div class="news-card__content">
          <p>
            Our newest dealers in South Wales have had a very busy winter.
            We have just delivered their first cruising Code Zero. The owner of the boat is
            delighted with the service and product they have received from both Penarth
            Covers and Ullman Sails.
          </p>

          <figure class="news-media">
            <img src="../News/Content/9.PenarthCruisingCodeZero/CodeZero.jpg" alt="Cruising Code Zero sail" loading="lazy" decoding="async">
          </figure>

          <p>
            This sail allows the owner to use his boat in lighter airs and keep the
            engine off for longer. The Code Zero has previously been viewed as a
            racing product, but now it’s very common for the cruising community to use
            it as a sail for lighter winds.
          </p>

          <p>
            If you want to know how a Code Zero works, and whether you could benefit,
            just get in touch with us or your local distributor via our Contact Page.
          </p>

          <p>
            Our Scotland dealer will be getting his sails in the next couple of weeks
            and is very much looking forward to trying them out.
          </p>
        </div>
      </article>

      <!-- 10 -->
      <article class="news-card reveal" id="news-once-in-a-lifetime-storm" data-title="Hit By a Once in a Life Time Storm">
        <header class="news-card__header">
          <span class="news-card__tag">Endurance</span>
          <h2 class="news-card__title">Hit By a Once in a Life Time Storm</h2>
        </header>

        <div class="news-card__content">
          <p>
            In the OSTAR Race in 2017, Mervyn Wheatley was hit by a once in a lifetime storm.
          </p>

          <figure class="news-media">
            <img src="../News/Content/10.HitByaOnceinaLifeTimeStorm/1.Finishing1.jpg" alt="Boat after storm conditions" loading="lazy" decoding="async">
          </figure>

          <p>
            His boat was hit by a huge wave which knocked her down. The boat took on
            a lot of water and Mervyn activated his EPIRB. Luckily, he was picked up by
            the Queen Mary 2, leaving his beloved boat to sink in the Atlantic.
          </p>

          <figure class="news-media">
            <img src="../News/Content/10.HitByaOnceinaLifeTimeStorm/2.Finishing2e1522749846804.jpg" alt="Mervyn Wheatley sailing recovery story" loading="lazy" decoding="async">
          </figure>

          <p>
            He has since got himself a very nice Bowman 40, and this year he wanted
            to replace the yankee and staysail. For a customer like this we know that
            the finishing on the sail is key, which is why we used our Endurance series.
          </p>

          <figure class="news-media">
            <img src="../News/Content/10.HitByaOnceinaLifeTimeStorm/3.Finishing3e1522749797955.jpg" alt="Endurance series sail details" loading="lazy" decoding="async">
          </figure>

          <p>
            Our Endurance series (or “Mervyn spec” as we now call it) is perfect for
            demanding uses like this. Dyneema webbing is used, which is covered with
            Sunbrella UV where it is visible.
          </p>

          <p>
            We design radial patching into all our corners and the leech lines have
            aluminium cleats with pockets to help keep them protected.
          </p>

          <figure class="news-media">
            <img src="../News/Content/10.HitByaOnceinaLifeTimeStorm/4.Finishing4e1522749895833.jpg" alt="Strong finishing details on endurance sail" loading="lazy" decoding="async">
          </figure>

          <p>
            These enhancements make the sail stronger and add more miles and years to the
            life of the sails. We are very proud of our finishing and, of course,
            pleased that Mervyn is too.
          </p>
        </div>
      </article>

    </div>
  </div>
</section>
<script defer src="<?= $navJsPublic ?>?v=<?= $navJsV ?>" type="text/javascript"></script>
