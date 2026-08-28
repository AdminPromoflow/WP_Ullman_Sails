(() => {
  const sourceArticles = Array.isArray(window.ullmanDashboardNews)
    ? window.ullmanDashboardNews
    : [];
  const articles = sourceArticles.map((article) => ({ ...article, isNew: false }));
  const originals = sourceArticles.map((article) => ({ ...article, isNew: false }));

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
  const editorModeLabel = document.querySelector('#editor-mode-label');
  const discardButton = document.querySelector('#discard-changes');
  const createButton = document.querySelector('#create-story');
  const readButton = document.querySelector('#read-story');
  const deleteButton = document.querySelector('#delete-story');
  const confirmDeleteButton = document.querySelector('#confirm-delete-story');
  const readDialog = document.querySelector('#read-story-dialog');
  const deleteDialog = document.querySelector('#delete-story-dialog');
  const deleteStoryName = document.querySelector('#delete-story-name');
  const readerImage = document.querySelector('#reader-image');
  const readerCategory = document.querySelector('#reader-category');
  const readerDate = document.querySelector('#reader-date');
  const readerStatus = document.querySelector('#reader-status');
  const readerTitle = document.querySelector('#reader-story-title');
  const readerSummary = document.querySelector('#reader-summary');
  const readerContent = document.querySelector('#reader-content');
  const publishedCount = document.querySelector('#published-count');
  const draftCount = document.querySelector('#draft-count');
  const categoryCount = document.querySelector('#category-count');
  const libraryTotal = document.querySelector('#news-library-total');
  const navigationCount = document.querySelector('#navigation-news-count');
  const toast = document.querySelector('#dashboard-toast');
  const toastTitle = document.querySelector('#dashboard-toast-title');
  const toastMessage = document.querySelector('#dashboard-toast-message');
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

  function setActiveFilter(filter) {
    activeFilter = filter;
    filterButtons.forEach((button) => {
      button.classList.toggle('is-active', button.dataset.filter === filter);
    });
  }

  function updateCounts() {
    const published = articles.filter((article) => article.status === 'Published').length;
    const drafts = articles.filter((article) => article.status === 'Draft').length;
    const categories = new Set(articles.map((article) => article.category).filter(Boolean)).size;
    const itemLabel = `${articles.length} ${articles.length === 1 ? 'item' : 'items'}`;

    if (publishedCount) publishedCount.textContent = String(published);
    if (draftCount) draftCount.textContent = String(drafts);
    if (categoryCount) categoryCount.textContent = String(categories);
    if (libraryTotal) libraryTotal.textContent = itemLabel;
    if (navigationCount) navigationCount.textContent = String(articles.length);
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
      empty.textContent = articles.length === 0
        ? 'No stories yet. Create your first story.'
        : 'No stories match this view.';
      list.append(empty);
      updateCounts();
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
      title.textContent = article.title || 'Untitled story';
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

    updateCounts();
  }

  function renderPreview() {
    const article = getActiveArticle();
    if (!article) {
      if (previewCategory) previewCategory.textContent = 'No story';
      if (previewTitle) previewTitle.textContent = 'Create a story to begin';
      if (previewSummary) previewSummary.textContent = 'Your news card preview will appear here.';
      if (summaryCount) summaryCount.textContent = '0 / 180';
      return;
    }

    if (previewImage instanceof HTMLImageElement) previewImage.src = article.image;
    if (previewCategory) previewCategory.textContent = article.category;
    if (previewTitle) previewTitle.textContent = article.title || 'Untitled story';
    if (previewSummary) previewSummary.textContent = article.summary || 'Add a summary to preview this story.';
    if (summaryCount) summaryCount.textContent = `${article.summary.length} / 180`;
  }

  function setFormDisabled(disabled) {
    form?.querySelectorAll('input, select, textarea, button').forEach((control) => {
      control.disabled = disabled;
    });
  }

  function populateForm() {
    const article = getActiveArticle();

    if (!article) {
      fields.forEach((field) => {
        if (field) field.value = '';
      });
      setFormDisabled(true);
      if (editorState) editorState.textContent = 'No story selected';
      if (editorModeLabel) editorModeLabel.textContent = 'News workspace';
      renderPreview();
      return;
    }

    setFormDisabled(false);
    if (titleInput instanceof HTMLInputElement) titleInput.value = article.title;
    if (categoryInput instanceof HTMLSelectElement) categoryInput.value = article.category;
    if (statusInput instanceof HTMLSelectElement) statusInput.value = article.status;
    if (dateInput instanceof HTMLInputElement) dateInput.value = article.date;
    if (summaryInput instanceof HTMLTextAreaElement) summaryInput.value = article.summary;
    if (contentInput instanceof HTMLTextAreaElement) contentInput.value = article.content;
    if (imageInput instanceof HTMLInputElement) imageInput.value = '';
    if (editorModeLabel) editorModeLabel.textContent = article.isNew ? 'New story' : 'Selected story';
    setDirty(article.isNew);
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

  function showToast(title, message) {
    if (!toast) return;
    window.clearTimeout(toastTimer);
    if (toastTitle) toastTitle.textContent = title;
    if (toastMessage) toastMessage.textContent = message;
    toast.classList.add('is-visible');
    toastTimer = window.setTimeout(() => toast.classList.remove('is-visible'), 3200);
  }

  function createStory() {
    const id = `news-new-${Date.now()}`;
    const today = new Date();
    const localDate = new Date(today.getTime() - today.getTimezoneOffset() * 60000)
      .toISOString()
      .slice(0, 10);
    const article = {
      id,
      title: 'Untitled story',
      category: 'Events',
      status: 'Draft',
      date: localDate,
      summary: '',
      content: '',
      image: sourceArticles[0]?.image || '',
      isNew: true,
    };

    articles.unshift(article);
    originals.unshift({ ...article });
    activeId = id;
    setActiveFilter('All');
    if (searchInput instanceof HTMLInputElement) searchInput.value = '';
    populateForm();
    renderList();
    titleInput?.focus();
    showToast('New draft created', 'Add the story information, then choose Save changes.');
  }

  function formatDate(value) {
    if (!value) return 'No date';
    const date = new Date(`${value}T12:00:00`);
    return new Intl.DateTimeFormat('en-GB', {
      day: 'numeric',
      month: 'long',
      year: 'numeric',
    }).format(date);
  }

  function openDialog(dialog) {
    if (!(dialog instanceof HTMLDialogElement)) return;
    if (typeof dialog.showModal === 'function') dialog.showModal();
    else dialog.setAttribute('open', '');
  }

  function closeDialog(dialog) {
    if (!(dialog instanceof HTMLDialogElement)) return;
    if (typeof dialog.close === 'function') dialog.close();
    else dialog.removeAttribute('open');
  }

  function readStory() {
    const article = getActiveArticle();
    if (!article) return;

    if (readerImage instanceof HTMLImageElement) readerImage.src = article.image;
    if (readerCategory) readerCategory.textContent = article.category;
    if (readerDate) readerDate.textContent = formatDate(article.date);
    if (readerStatus) readerStatus.textContent = article.status;
    if (readerTitle) readerTitle.textContent = article.title || 'Untitled story';
    if (readerSummary) readerSummary.textContent = article.summary || 'No summary has been added.';
    if (readerContent) readerContent.textContent = article.content || 'No story content has been added.';
    openDialog(readDialog);
  }

  function requestDelete() {
    const article = getActiveArticle();
    if (!article) return;
    if (deleteStoryName) deleteStoryName.textContent = article.title || 'Untitled story';
    openDialog(deleteDialog);
  }

  function deleteStory() {
    const articleIndex = articles.findIndex((article) => article.id === activeId);
    if (articleIndex < 0) return;

    const [deletedArticle] = articles.splice(articleIndex, 1);
    const originalIndex = originals.findIndex((article) => article.id === activeId);
    if (originalIndex >= 0) originals.splice(originalIndex, 1);
    activeId = articles[Math.min(articleIndex, articles.length - 1)]?.id || '';
    closeDialog(deleteDialog);
    populateForm();
    renderList();
    showToast('Story deleted', `${deletedArticle.title || 'Untitled story'} was removed from this interface.`);
  }

  fields.forEach((field) => field?.addEventListener('input', syncFromForm));
  fields.forEach((field) => field?.addEventListener('change', syncFromForm));
  searchInput?.addEventListener('input', renderList);

  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      setActiveFilter(button.dataset.filter || 'All');
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
    showToast('Changes discarded', 'The story has returned to its last saved state.');
  });

  createButton?.addEventListener('click', createStory);
  readButton?.addEventListener('click', readStory);
  deleteButton?.addEventListener('click', requestDelete);
  confirmDeleteButton?.addEventListener('click', deleteStory);

  form?.addEventListener('submit', (event) => {
    event.preventDefault();
    const article = getActiveArticle();
    const original = getOriginalArticle();
    if (!article || !original) return;
    const wasNew = article.isNew;
    article.isNew = false;
    Object.assign(original, article);
    if (editorModeLabel) editorModeLabel.textContent = 'Selected story';
    setDirty(false);
    renderList();
    showToast(wasNew ? 'Story created' : 'Story updated', 'Saved in this interface. Backend connection is still pending.');
  });

  document.querySelectorAll('[data-close-dialog]').forEach((button) => {
    button.addEventListener('click', () => {
      closeDialog(document.querySelector(`#${button.dataset.closeDialog}`));
    });
  });

  [readDialog, deleteDialog].forEach((dialog) => {
    dialog?.addEventListener('click', (event) => {
      if (event.target === dialog) closeDialog(dialog);
    });
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
