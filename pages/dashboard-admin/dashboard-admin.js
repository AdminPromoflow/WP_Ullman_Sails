(() => {
  const sourceArticles = Array.isArray(window.ullmanDashboardNews)
    ? window.ullmanDashboardNews
    : [];
  const articles = sourceArticles.map((article) => ({ ...article }));
  const originals = sourceArticles.map((article) => ({ ...article }));

  const list = document.querySelector('#news-list');
  const searchInput = document.querySelector('#news-search-input');
  const filterButtons = [...document.querySelectorAll('[data-filter]')];
  const form = document.querySelector('#news-editor-form');
  const titleInput = document.querySelector('#news-title');
  const categoryInput = document.querySelector('#news-category');
  const statusInput = document.querySelector('#news-status');
  const dateInput = document.querySelector('#news-date');
  const summaryInput = document.querySelector('#news-summary');
  const contentInput = document.querySelector('#news-content');
  const imageInput = document.querySelector('#news-image-input');
  const previewImage = document.querySelector('#preview-image');
  const previewCategory = document.querySelector('#preview-category');
  const previewTitle = document.querySelector('#preview-card-title');
  const previewSummary = document.querySelector('#preview-summary');
  const summaryCount = document.querySelector('#summary-count');
  const editorState = document.querySelector('#editor-state');
  const discardButton = document.querySelector('#discard-changes');
  const toast = document.querySelector('#dashboard-toast');
  const menuToggle = document.querySelector('.dashboard-menu-toggle');
  const overlay = document.querySelector('.dashboard-overlay');

  let activeId = articles[0]?.id || '';
  let activeFilter = 'All';
  let toastTimer;

  const fields = [titleInput, categoryInput, statusInput, dateInput, summaryInput, contentInput];

  function getActiveArticle() {
    return articles.find((article) => article.id === activeId);
  }

  function getOriginalArticle() {
    return originals.find((article) => article.id === activeId);
  }

  function renderList() {
    if (!(list instanceof HTMLElement)) return;

    const query = searchInput instanceof HTMLInputElement
      ? searchInput.value.trim().toLowerCase()
      : '';
    const visibleArticles = articles.filter((article) => {
      const matchesFilter = activeFilter === 'All' || article.status === activeFilter;
      const matchesQuery = `${article.title} ${article.category}`.toLowerCase().includes(query);
      return matchesFilter && matchesQuery;
    });

    list.replaceChildren();

    if (visibleArticles.length === 0) {
      const empty = document.createElement('p');
      empty.className = 'news-list__empty';
      empty.textContent = 'No stories match this view.';
      list.append(empty);
      return;
    }

    visibleArticles.forEach((article) => {
      const button = document.createElement('button');
      const image = document.createElement('img');
      const body = document.createElement('span');
      const title = document.createElement('strong');
      const meta = document.createElement('span');
      const category = document.createElement('span');
      const status = document.createElement('span');

      button.type = 'button';
      button.className = `news-list-item${article.id === activeId ? ' is-active' : ''}`;
      button.dataset.articleId = article.id;
      button.setAttribute('aria-pressed', String(article.id === activeId));
      image.src = article.image;
      image.alt = '';
      body.className = 'news-list-item__body';
      title.textContent = article.title;
      meta.className = 'news-list-item__meta';
      category.textContent = article.category;
      status.className = `news-status${article.status === 'Draft' ? ' is-draft' : ''}`;
      status.title = article.status;
      meta.append(category, status);
      body.append(title, meta);
      button.append(image, body);
      button.addEventListener('click', () => selectArticle(article.id));
      list.append(button);
    });
  }

  function renderPreview() {
    const article = getActiveArticle();
    if (!article) return;

    if (previewImage instanceof HTMLImageElement) previewImage.src = article.image;
    if (previewCategory) previewCategory.textContent = article.category;
    if (previewTitle) previewTitle.textContent = article.title || 'Untitled story';
    if (previewSummary) previewSummary.textContent = article.summary || 'Add a summary to preview this story.';
    if (summaryCount) summaryCount.textContent = `${article.summary.length} / 180`;
  }

  function populateForm() {
    const article = getActiveArticle();
    if (!article) return;

    if (titleInput instanceof HTMLInputElement) titleInput.value = article.title;
    if (categoryInput instanceof HTMLSelectElement) categoryInput.value = article.category;
    if (statusInput instanceof HTMLSelectElement) statusInput.value = article.status;
    if (dateInput instanceof HTMLInputElement) dateInput.value = article.date;
    if (summaryInput instanceof HTMLTextAreaElement) summaryInput.value = article.summary;
    if (contentInput instanceof HTMLTextAreaElement) contentInput.value = article.content;
    setDirty(false);
    renderPreview();
  }

  function selectArticle(id) {
    activeId = id;
    populateForm();
    renderList();
  }

  function setDirty(isDirty) {
    if (!editorState) return;
    editorState.textContent = isDirty ? 'Unsaved changes' : 'No unsaved changes';
    editorState.classList.toggle('is-dirty', isDirty);
  }

  function syncFromForm() {
    const article = getActiveArticle();
    if (!article) return;

    if (titleInput instanceof HTMLInputElement) article.title = titleInput.value;
    if (categoryInput instanceof HTMLSelectElement) article.category = categoryInput.value;
    if (statusInput instanceof HTMLSelectElement) article.status = statusInput.value;
    if (dateInput instanceof HTMLInputElement) article.date = dateInput.value;
    if (summaryInput instanceof HTMLTextAreaElement) article.summary = summaryInput.value;
    if (contentInput instanceof HTMLTextAreaElement) article.content = contentInput.value;
    setDirty(true);
    renderPreview();
    renderList();
  }

  function showToast() {
    if (!toast) return;
    window.clearTimeout(toastTimer);
    toast.classList.add('is-visible');
    toastTimer = window.setTimeout(() => toast.classList.remove('is-visible'), 3200);
  }

  fields.forEach((field) => field?.addEventListener('input', syncFromForm));
  fields.forEach((field) => field?.addEventListener('change', syncFromForm));

  searchInput?.addEventListener('input', renderList);

  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      activeFilter = button.dataset.filter || 'All';
      filterButtons.forEach((candidate) => candidate.classList.toggle('is-active', candidate === button));
      renderList();
    });
  });

  imageInput?.addEventListener('change', () => {
    const article = getActiveArticle();
    const file = imageInput instanceof HTMLInputElement ? imageInput.files?.[0] : null;
    if (!article || !file) return;
    article.image = URL.createObjectURL(file);
    setDirty(true);
    renderPreview();
    renderList();
  });

  discardButton?.addEventListener('click', () => {
    const article = getActiveArticle();
    const original = getOriginalArticle();
    if (!article || !original) return;
    Object.assign(article, original);
    populateForm();
    renderList();
  });

  form?.addEventListener('submit', (event) => {
    event.preventDefault();
    setDirty(false);
    showToast();
  });

  function setNavigation(open) {
    document.body.classList.toggle('is-dashboard-nav-open', open);
    menuToggle?.setAttribute('aria-expanded', String(open));
  }

  menuToggle?.addEventListener('click', () => {
    setNavigation(!document.body.classList.contains('is-dashboard-nav-open'));
  });
  overlay?.addEventListener('click', () => setNavigation(false));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') setNavigation(false);
  });

  renderList();
  populateForm();
})();
