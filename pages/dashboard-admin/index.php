<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_name('ULLMAN_ADMIN_SESSION');
    session_start();
}

if (empty($_SESSION['ullman_admin_authenticated']) || empty($_SESSION['ullman_admin_email'])) {
    wp_safe_redirect(ullman_page_url('dashboard-login-admin'));
    exit;
}

$adminEmail = (string) $_SESSION['ullman_admin_email'];

$dashboardDirectory = __DIR__;
$dashboardUrl = get_template_directory_uri() . '/pages/dashboard-admin';
$dashboardCssVersion = ullman_file_version($dashboardDirectory . '/dashboard-admin.css');
$dashboardJsVersion = ullman_file_version($dashboardDirectory . '/dashboard-admin.js');
$newsImageUrl = get_template_directory_uri() . '/pages/Home/4.News/Images';
$logoUrl = get_template_directory_uri() . '/pages/general/menu/img/logo.png';

$newsArticles = [
    [
        'id' => 'news-rc1000',
        'title' => 'Ullman Sails support RC1000',
        'category' => 'Race Series',
        'status' => 'Published',
        'date' => '2020-02-28',
        'summary' => 'RC1000 is a new racing class based in Plymouth and the South West, created to deliver close performance across the whole fleet.',
        'content' => 'The organisers are bringing together close racing, training, technical support and a strong social scene. Ullman Sails is proud to support the series and the sailors taking part.',
        'image' => $newsImageUrl . '/1.jpg',
    ],
    [
        'id' => 'news-inshore-offshore',
        'title' => 'Ullman Sails Inshore & Offshore Race Series',
        'category' => 'Events',
        'status' => 'Published',
        'date' => '2020-02-14',
        'summary' => 'Dates for the Ullman Sails inshore and offshore points race series, with events planned across the sailing season.',
        'content' => 'The Ullman race series welcomes racers, cruisers and everyone in between. Events are supported by clubs across the region and combine competitive sailing with an active social programme.',
        'image' => $newsImageUrl . '/2.jpg',
    ],
    [
        'id' => 'news-quarter-ton-cup',
        'title' => 'Victory in the Quarter Ton Cup',
        'category' => 'Race Result',
        'status' => 'Published',
        'date' => '2019-07-18',
        'summary' => 'Ullman Sails customer John Santy cruised to victory at the Quarter Ton Cup after a memorable and hard-fought campaign.',
        'content' => 'A long winter programme, detailed preparation and a new sail wardrobe came together on the water. The team turned years of determination into a standout Quarter Ton Cup result.',
        'image' => $newsImageUrl . '/3.jpg',
    ],
    [
        'id' => 'news-loft-updates',
        'title' => 'Loft Updates',
        'category' => 'Loft',
        'status' => 'Draft',
        'date' => '2020-01-24',
        'summary' => 'The Plymouth loft continues to grow with additional floor space and improved equipment for sail building, service and repairs.',
        'content' => 'The updated workspace gives our sailmakers more room for detailed production and servicing work while supporting a faster, more consistent customer experience.',
        'image' => $newsImageUrl . '/4.jpg',
    ],
    [
        'id' => 'news-customer-updates',
        'title' => 'Customer Updates',
        'category' => 'Customers',
        'status' => 'Published',
        'date' => '2019-12-12',
        'summary' => 'Great results from Ullman Sails customers across different events, classes and locations with new race and cruising sail inventories.',
        'content' => 'Our customers have been putting their sail inventories to work across a broad range of fleets. These results reflect careful preparation, close collaboration and committed sailing teams.',
        'image' => $newsImageUrl . '/5.jpg',
    ],
    [
        'id' => 'news-quarter-tonner-developments',
        'title' => 'Quarter Tonner Developments',
        'category' => 'Development',
        'status' => 'Published',
        'date' => '2019-11-22',
        'summary' => 'We have been working hard in the competitive Quarter Tonner fleet, refining sails and helping customers achieve strong results.',
        'content' => 'Ongoing development in the Quarter Tonner fleet gives our designers valuable performance data. Each project helps refine shape, balance and handling for the next campaign.',
        'image' => $newsImageUrl . '/6.jpg',
    ],
    [
        'id' => 'news-london-boat-show',
        'title' => 'London Boat Show',
        'category' => 'Boat Show',
        'status' => 'Published',
        'date' => '2019-10-04',
        'summary' => 'A look back at the London Boat Show and the opportunity it offered to reconnect with customers and prepare for the season ahead.',
        'content' => 'The show brought together sailors, marine businesses and familiar faces from across the industry. It was a welcome opportunity to discuss new projects and the coming season.',
        'image' => $newsImageUrl . '/7.jpg',
    ],
    [
        'id' => 'news-newest-team-member',
        'title' => 'Welcome The Newest Member Of Our Team',
        'category' => 'Team',
        'status' => 'Published',
        'date' => '2019-08-30',
        'summary' => 'Meet the newest team member and learn more about the sailing experience and repair work now happening within the loft team.',
        'content' => 'Our newest team member brings practical sailing knowledge and valuable loft experience. That perspective strengthens the service and repair support available to every customer.',
        'image' => $newsImageUrl . '/8.jpg',
    ],
    [
        'id' => 'news-penarth-code-zero',
        'title' => 'Penarth – Cruising Code Zero',
        'category' => 'Cruising',
        'status' => 'Published',
        'date' => '2019-08-09',
        'summary' => 'South Wales dealers delivered a new cruising Code Zero, helping owners enjoy lighter airs and spend more time sailing.',
        'content' => 'The new cruising Code Zero expands the useful wind range and gives the owners a simple, rewarding option for lighter conditions and relaxed miles on the water.',
        'image' => $newsImageUrl . '/9.jpg',
    ],
    [
        'id' => 'news-once-in-a-lifetime-storm',
        'title' => 'Hit By a Once in a Life Time Storm',
        'category' => 'Endurance',
        'status' => 'Published',
        'date' => '2019-06-21',
        'summary' => 'A dramatic offshore story that led to a new yacht, new sails and a focus on strength, finishing details and durability.',
        'content' => 'After an extraordinary offshore experience, the project centred on dependable materials, careful finishing and a sail inventory designed to inspire confidence in demanding conditions.',
        'image' => $newsImageUrl . '/10.jpg',
    ],
];
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>News Dashboard | Ullman Sails</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo esc_url($dashboardUrl . '/dashboard-admin.css?v=' . $dashboardCssVersion); ?>">
</head>
<body class="dashboard-admin-page">
  <div class="dashboard-admin">
    <aside class="dashboard-sidebar" id="dashboard-sidebar" aria-label="Dashboard navigation">
      <div class="dashboard-sidebar__top">
        <a class="dashboard-sidebar__brand" href="<?php echo esc_url(ullman_page_url('home')); ?>" aria-label="Ullman Sails home">
          <img src="<?php echo esc_url($logoUrl); ?>" alt="Ullman Sails">
        </a>
        <p class="dashboard-sidebar__caption">Content manager</p>
      </div>

      <nav class="dashboard-nav" aria-label="Admin sections">
        <p class="dashboard-nav__label">Workspace</p>
        <a class="dashboard-nav__item is-active" href="#news-editor" aria-current="page">
          <span class="dashboard-nav__number" aria-hidden="true">01</span>
          <span>News</span>
          <span class="dashboard-nav__count" id="navigation-news-count">10</span>
        </a>
      </nav>

      <div class="dashboard-sidebar__footer">
        <a href="<?php echo esc_url(ullman_page_url('news')); ?>" target="_blank" rel="noopener noreferrer">View News page <span aria-hidden="true">&#8599;</span></a>
        <a href="<?php echo esc_url(ullman_page_url('dashboard-login-admin')); ?>">Return to login</a>
      </div>
    </aside>

    <button class="dashboard-overlay" type="button" aria-label="Close navigation" tabindex="-1"></button>

    <main class="dashboard-main" id="news-editor">
      <header class="dashboard-topbar">
        <div class="dashboard-topbar__left">
          <button class="dashboard-menu-toggle" type="button" aria-controls="dashboard-sidebar" aria-expanded="false">
            <span></span><span></span><span></span>
            <span class="dashboard-sr-only">Open navigation</span>
          </button>
          <p><span>Dashboard</span><span aria-hidden="true">/</span><strong>News</strong></p>
        </div>
        <div class="dashboard-topbar__right">
          <div class="dashboard-profile" aria-label="Current administrator">
            <span class="dashboard-profile__status" aria-hidden="true"></span>
            <span class="dashboard-profile__name"><?php echo esc_html($adminEmail); ?></span>
            <span class="dashboard-profile__avatar" aria-hidden="true">AD</span>
          </div>
          <button id="logout-dashboard" class="dashboard-logout" type="button">Logout</button>
        </div>
      </header>

      <div class="dashboard-content">
        <section class="dashboard-heading" aria-labelledby="dashboard-title">
          <div>
            <p class="dashboard-heading__eyebrow">Content management</p>
            <h1 id="dashboard-title">News</h1>
            <p>Manage every News page and organise its content into reusable sections and blocks.</p>
          </div>
          <div class="dashboard-heading__actions">
            <a class="dashboard-preview-link" href="<?php echo esc_url(ullman_page_url('news')); ?>" target="_blank" rel="noopener noreferrer">
              Preview public page <span aria-hidden="true">&#8599;</span>
            </a>
            <button class="dashboard-create-button" id="create-story" type="button"><span aria-hidden="true">+</span> New story</button>
          </div>
        </section>

        <section class="dashboard-stats" aria-label="News overview">
          <article>
            <p>Published stories</p>
            <strong id="published-count">9</strong>
            <span>Visible on the website</span>
          </article>
          <article>
            <p>Drafts</p>
            <strong id="draft-count">1</strong>
            <span>Waiting for review</span>
          </article>
          <article>
            <p>Active categories</p>
            <strong id="category-count">10</strong>
            <span>Across all stories</span>
          </article>
        </section>

        <section class="news-workspace" aria-label="News editor">
          <aside class="news-library" aria-labelledby="news-library-title">
            <header class="news-library__header">
              <div>
                <p class="dashboard-kicker">All stories</p>
                <h2 id="news-library-title">News library</h2>
              </div>
              <span class="news-library__total" id="news-library-total">10 items</span>
            </header>

            <label class="news-search" for="news-search-input">
              <span class="dashboard-sr-only">Search news</span>
              <input id="news-search-input" type="search" placeholder="Search stories..." autocomplete="off">
              <span aria-hidden="true">&#8981;</span>
            </label>

            <div class="news-filters" role="group" aria-label="Filter stories">
              <button class="is-active" type="button" data-filter="All">All</button>
              <button type="button" data-filter="Published">Published</button>
              <button type="button" data-filter="Draft">Drafts</button>
            </div>

            <div class="news-list" id="news-list" aria-live="polite"></div>
          </aside>

          <section class="news-editor" aria-labelledby="news-editor-title">
            <header class="news-editor__header">
              <div>
                <p class="dashboard-kicker" id="editor-mode-label">Selected story</p>
                <h2 id="news-editor-title">Edit news information</h2>
              </div>
              <span class="news-editor__state" id="editor-state">No unsaved changes</span>
            </header>

            <form class="news-editor__form" id="news-editor-form" action="" method="post">
              <div class="news-editor__columns">
                <div class="news-fields">
                  <div class="news-field">
                    <label for="news-title">Story title</label>
                    <input id="news-title" name="title" type="text" required>
                  </div>

                  <div class="news-fields__row">
                    <div class="news-field">
                      <label for="news-category">Category</label>
                      <input id="news-category" name="category" type="text" list="news-categories" required>
                      <datalist id="news-categories">
                        <option value="Race Series">
                        <option value="Events">
                        <option value="Race Result">
                        <option value="Loft">
                        <option value="Customers">
                        <option value="Development">
                        <option value="Boat Show">
                        <option value="Team">
                        <option value="Cruising">
                        <option value="Endurance">
                      </datalist>
                    </div>
                    <div class="news-field">
                      <label for="news-status">Status</label>
                      <select id="news-status" name="status">
                        <option>Published</option>
                        <option>Draft</option>
                      </select>
                    </div>
                  </div>

                  <div class="news-field">
                    <label for="news-date">Publish date</label>
                    <input id="news-date" name="date" type="date">
                  </div>

                  <section class="news-sections-editor" aria-labelledby="news-sections-title">
                    <header class="news-sections-editor__header">
                      <div>
                        <p class="dashboard-kicker">Page structure</p>
                        <h3 id="news-sections-title">Content sections</h3>
                      </div>
                      <button class="dashboard-button dashboard-button--ghost" id="add-section" type="button">+ Add section</button>
                    </header>
                    <p class="news-sections-editor__help">Build the story with headings, paragraphs, images, quotes or lists. Use the tag <code>summary</code> on one paragraph to use it on News cards.</p>
                    <div class="news-sections" id="news-sections" aria-live="polite"></div>
                  </section>
                </div>

                <aside class="news-live-preview" aria-labelledby="preview-title">
                  <div class="news-live-preview__heading">
                    <div>
                      <p class="dashboard-kicker">Live preview</p>
                      <h3 id="preview-title">News page</h3>
                    </div>
                    <span>Desktop</span>
                  </div>

                  <div class="news-page-preview">
                    <header class="news-page-preview__masthead">
                      <p>Ullman Sails GBR</p>
                      <h3>News &amp; Updates</h3>
                      <span>Race results, loft developments, customer stories and life on the water.</span>
                    </header>

                    <div class="news-page-preview__controls">
                      <label for="preview-story-select">
                        <span>Choose a story</span>
                        <select id="preview-story-select" aria-label="Choose a story in the live preview"></select>
                      </label>
                      <nav aria-label="Preview story navigation">
                        <button id="preview-previous" type="button" aria-label="Previous story">&#8592;</button>
                        <span id="preview-story-status">Story 1 of 10</span>
                        <button id="preview-next" type="button" aria-label="Next story">&#8594;</button>
                      </nav>
                    </div>

                    <article class="news-page-preview__story">
                      <header>
                        <span id="preview-category">Category</span>
                        <h3 id="preview-card-title">Story title</h3>
                        <div><time id="preview-date"></time><span id="preview-status"></span></div>
                      </header>
                      <p class="news-page-preview__summary" id="preview-summary">Story summary</p>
                      <div class="news-page-preview__content" id="preview-page-content"></div>
                    </article>
                  </div>

                  <p class="news-live-preview__note">This reproduces the selected story inside the public News page layout and updates from the section blocks.</p>
                </aside>
              </div>

              <footer class="news-editor__actions">
                <p><span aria-hidden="true">&#9432;</span> Saved changes persist in this dashboard browser.</p>
                <div>
                  <button class="dashboard-button dashboard-button--ghost" id="read-story" type="button">Read preview</button>
                  <button class="dashboard-button dashboard-button--secondary" id="discard-changes" type="button">Discard changes</button>
                  <button class="dashboard-button dashboard-button--danger" id="delete-story" type="button">Delete</button>
                  <button class="dashboard-button dashboard-button--primary" type="submit">Save changes</button>
                </div>
              </footer>
            </form>
          </section>
        </section>
      </div>
    </main>
  </div>

  <dialog class="dashboard-dialog dashboard-dialog--reader" id="read-story-dialog" aria-labelledby="reader-title">
    <div class="dashboard-dialog__surface">
      <header class="dashboard-dialog__header">
        <div>
          <p class="dashboard-kicker">Read story</p>
          <h2 id="reader-title">News preview</h2>
        </div>
        <button class="dashboard-dialog__close" type="button" data-close-dialog="read-story-dialog" aria-label="Close story preview">&#10005;</button>
      </header>
      <article class="news-reader">
        <img id="reader-image" src="" alt="Selected news story">
        <div class="news-reader__body">
          <div class="news-reader__meta">
            <span id="reader-category">Category</span>
            <span aria-hidden="true">&bull;</span>
            <time id="reader-date"></time>
            <span aria-hidden="true">&bull;</span>
            <span id="reader-status">Status</span>
          </div>
          <h2 id="reader-story-title">Story title</h2>
          <p class="news-reader__summary" id="reader-summary"></p>
          <div class="news-reader__content" id="reader-content"></div>
        </div>
      </article>
      <footer class="dashboard-dialog__footer">
        <button class="dashboard-button dashboard-button--secondary" type="button" data-close-dialog="read-story-dialog">Close preview</button>
      </footer>
    </div>
  </dialog>

  <dialog class="dashboard-dialog dashboard-dialog--confirm" id="delete-story-dialog" aria-labelledby="delete-dialog-title">
    <div class="dashboard-dialog__surface">
      <header class="dashboard-dialog__header">
        <div>
          <p class="dashboard-kicker">Delete news</p>
          <h2 id="delete-dialog-title">Delete this story?</h2>
        </div>
        <button class="dashboard-dialog__close" type="button" data-close-dialog="delete-story-dialog" aria-label="Close delete confirmation">&#10005;</button>
      </header>
      <div class="dashboard-confirmation">
        <span aria-hidden="true">!</span>
        <p>The story <strong id="delete-story-name"></strong> and all its sections will be removed from this dashboard.</p>
      </div>
      <footer class="dashboard-dialog__footer">
        <button class="dashboard-button dashboard-button--secondary" type="button" data-close-dialog="delete-story-dialog">Cancel</button>
        <button class="dashboard-button dashboard-button--danger" id="confirm-delete-story" type="button">Delete story</button>
      </footer>
    </div>
  </dialog>

  <div class="dashboard-toast" id="dashboard-toast" role="status" aria-live="polite">
    <span aria-hidden="true">&#10003;</span>
    <div><strong id="dashboard-toast-title">Dashboard updated</strong><small id="dashboard-toast-message">Your changes were saved.</small></div>
  </div>

  <script>
    window.ullmanDashboardNews = <?php echo wp_json_encode($newsArticles); ?>;
  </script>
  <?php ullman_ajax_config(); ?>
  <script src="<?php echo esc_url($dashboardUrl . '/dashboard-admin.js?v=' . $dashboardJsVersion); ?>" defer></script>
</body>
</html>
