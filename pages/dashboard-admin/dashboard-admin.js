(() => {
  const STORAGE_KEY = 'ullman-dashboard-news-v2';
  const sourceArticles = Array.isArray(window.ullmanDashboardNews)
    ? window.ullmanDashboardNews
    : [];

  const clone = (value) => JSON.parse(JSON.stringify(value));
  const makeId = (prefix) => `${prefix}-${Date.now()}-${Math.random().toString(36).slice(2, 8)}`;

  function normalizeBlock(block = {}) {
    return {
      id: String(block.id || makeId('content')),
      block_type: ['heading', 'paragraph', 'image', 'quote', 'list'].includes(block.block_type)
        ? block.block_type
        : 'paragraph',
      tag: String(block.tag || ''),
      content: String(block.content || ''),
    };
  }

  function normalizeSection(section = {}) {
    return {
      id: String(section.id || makeId('section')),
      blocks: Array.isArray(section.blocks) ? section.blocks.map(normalizeBlock) : [],
    };
  }

  function normalizeArticle(article = {}, index = 0) {
    let sections = Array.isArray(article.sections)
      ? article.sections.map(normalizeSection)
      : [];

    if (sections.length === 0) {
      const legacyContent = [];

      if (article.image) {
        legacyContent.push(normalizeBlock({
          id: `${article.id || index}-image`,
          block_type: 'image',
          tag: 'hero',
          content: article.image,
        }));
      }

      if (article.summary) {
        legacyContent.push(normalizeBlock({
          id: `${article.id || index}-summary`,
          block_type: 'paragraph',
          tag: 'summary',
          content: article.summary,
        }));
      }

      if (article.content) {
        legacyContent.push(normalizeBlock({
          id: `${article.id || index}-body`,
          block_type: 'paragraph',
          tag: 'body',
          content: article.content,
        }));
      }

      sections = [normalizeSection({
        id: `${article.id || index}-section-1`,
        blocks: legacyContent,
      })];
    }

    return {
      id: String(article.id || makeId('news')),
      title: String(article.title || 'Untitled story'),
      category: String(article.category || 'Events'),
      status: article.status === 'Published' ? 'Published' : 'Draft',
      date: String(article.date || '').slice(0, 10),
      sections,
      isNew: Boolean(article.isNew),
    };
  }

  function loadArticles() {
    try {
      const stored = window.localStorage.getItem(STORAGE_KEY);
      const parsed = stored ? JSON.parse(stored) : null;

      if (Array.isArray(parsed)) return parsed.map(normalizeArticle);
    } catch (error) {
      console.warn('Unable to read saved News dashboard data.', error);
    }

    return sourceArticles.map(normalizeArticle);
  }

  const articles = loadArticles();
  let originals = clone(articles);

  const list = document.querySelector('#news-list');
  const searchInput = document.querySelector('#news-search-input');
  const filterButtons = [...document.querySelectorAll('[data-filter]')];
  const form = document.querySelector('#news-editor-form');
  const categoryInput = document.querySelector('#news-category');
  const statusInput = document.querySelector('#news-status');
  const dateInput = document.querySelector('#news-date');
  const previewStorySelect = document.querySelector('#preview-story-select');
  const previewPrevious = document.querySelector('#preview-previous');
  const previewNext = document.querySelector('#preview-next');
  const previewStoryStatus = document.querySelector('#preview-story-status');
  const previewCategory = document.querySelector('#preview-category');
  const previewTitle = document.querySelector('#preview-card-title');
  const previewDate = document.querySelector('#preview-date');
  const previewStatus = document.querySelector('#preview-status');
  const previewSummary = document.querySelector('#preview-summary');
  const previewCover = document.querySelector('#preview-cover');
  const previewCoverImage = document.querySelector('#preview-cover-image');
  const editCoverButton = document.querySelector('#edit-cover-image');
  const coverEditor = document.querySelector('#cover-image-editor');
  const coverUrlInput = document.querySelector('#news-cover-url');
  const closeCoverEditor = document.querySelector('#close-cover-editor');
  const previewPageContent = document.querySelector('#preview-page-content');
  const selectionToolbar = document.querySelector('#live-selection-toolbar');
  const contentTypeSelect = document.querySelector('#live-content-type');
  const contentUrlLabel = document.querySelector('#live-content-url-label');
  const contentUrlInput = document.querySelector('#live-content-url');
  const moveContentUp = document.querySelector('#move-live-content-up');
  const moveContentDown = document.querySelector('#move-live-content-down');
  const deleteContentButton = document.querySelector('#delete-live-content');
  const editorState = document.querySelector('#editor-state');
  const editorModeLabel = document.querySelector('#editor-mode-label');
  const discardButton = document.querySelector('#discard-changes');
  const createButton = document.querySelector('#create-story');
  const deleteButton = document.querySelector('#delete-story');
  const confirmDeleteButton = document.querySelector('#confirm-delete-story');
  const deleteDialog = document.querySelector('#delete-story-dialog');
  const deleteStoryName = document.querySelector('#delete-story-name');
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
  const logoutDashboard = document.getElementById('logout-dashboard');

  const metadataFields = [categoryInput, statusInput, dateInput];
  let activeId = articles[0]?.id || '';
  let activeFilter = 'All';
  let selectedContentId = '';
  let selectedSectionId = '';
  let toastTimer;

  function getActiveArticle() {
    return articles.find((article) => article.id === activeId);
  }

  function getOriginalArticle() {
    return originals.find((article) => article.id === activeId);
  }

  function getAllBlockRefs(article) {
    if (!article) return [];
    return article.sections.flatMap((section) => section.blocks.map((block, index) => ({
      section,
      block,
      index,
    })));
  }

  function getHeroRef(article) {
    const refs = getAllBlockRefs(article);
    return refs.find(({ block }) => block.block_type === 'image' && block.tag.trim().toLowerCase() === 'hero')
      || refs.find(({ block }) => block.block_type === 'image')
      || null;
  }

  function getSummaryRef(article) {
    const refs = getAllBlockRefs(article);
    return refs.find(({ block }) => block.tag.trim().toLowerCase() === 'summary') || null;
  }

  function ensurePrimarySection(article) {
    if (article.sections.length === 0) article.sections.push(normalizeSection());
    return article.sections[0];
  }

  function ensureHeroRef(article) {
    const existing = getHeroRef(article);
    if (existing) return existing;
    const section = ensurePrimarySection(article);
    const block = normalizeBlock({ block_type: 'image', tag: 'hero', content: '' });
    section.blocks.unshift(block);
    return { section, block, index: 0 };
  }

  function ensureSummaryRef(article) {
    const existing = getSummaryRef(article);
    if (existing) return existing;
    const section = ensurePrimarySection(article);
    const block = normalizeBlock({ block_type: 'paragraph', tag: 'summary', content: '' });
    const heroRef = getHeroRef(article);
    const insertAt = heroRef?.section.id === section.id ? heroRef.index + 1 : 0;
    section.blocks.splice(insertAt, 0, block);
    return { section, block, index: insertAt };
  }

  function getEditableContentRefs(article) {
    const heroId = getHeroRef(article)?.block.id;
    const summaryId = getSummaryRef(article)?.block.id;
    return getAllBlockRefs(article).filter(({ block }) => block.id !== heroId && block.id !== summaryId);
  }

  function getSelectedContentRef() {
    const article = getActiveArticle();
    return getAllBlockRefs(article).find(({ section, block }) => (
      section.id === selectedSectionId && block.id === selectedContentId
    )) || null;
  }

  function getArticleImage(article) {
    return getHeroRef(article)?.block.content.trim()
      || sourceArticles[0]?.image
      || '';
  }

  function getArticleSummary(article) {
    const summaryRef = getSummaryRef(article);
    if (summaryRef?.block.content.trim()) return summaryRef.block.content.trim().slice(0, 180);
    const paragraph = getEditableContentRefs(article)
      .find(({ block }) => block.block_type === 'paragraph' && block.content.trim());
    return paragraph?.block.content.trim().slice(0, 180) || '';
  }

  function setActiveFilter(filter) {
    activeFilter = filter;
    filterButtons.forEach((button) => {
      button.classList.toggle('is-active', button.dataset.filter === filter);
    });
  }

  function persistArticles() {
    try {
      const saved = articles.map((article) => ({ ...article, isNew: false }));
      window.localStorage.setItem(STORAGE_KEY, JSON.stringify(saved));
      return true;
    } catch (error) {
      console.error('Unable to save News dashboard data.', error);
      showToast('Save failed', 'The browser could not store these changes.');
      return false;
    }
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
      image.src = getArticleImage(article);
      image.alt = '';
      image.addEventListener('error', () => image.classList.add('is-missing'));
      body.className = 'news-list-item__body';
      title.textContent = article.title || 'Untitled story';
      meta.className = 'news-list-item__meta';
      category.textContent = article.category;
      status.className = `news-status${article.status === 'Draft' ? ' is-draft' : ''}`;
      status.setAttribute('aria-label', article.status);
      meta.append(category, status);
      body.append(title, meta);
      button.append(image, body);
      button.addEventListener('click', () => selectArticle(article.id));
      list.append(button);
    });

    updateCounts();
  }

  function renderStoryControls() {
    const activeIndex = articles.findIndex((article) => article.id === activeId);

    if (previewStorySelect instanceof HTMLSelectElement) {
      previewStorySelect.replaceChildren();
      articles.forEach((article) => {
        const option = document.createElement('option');
        option.value = article.id;
        option.textContent = article.title || 'Untitled story';
        option.selected = article.id === activeId;
        previewStorySelect.append(option);
      });
    }

    if (previewPrevious instanceof HTMLButtonElement) previewPrevious.disabled = activeIndex <= 0;
    if (previewNext instanceof HTMLButtonElement) {
      previewNext.disabled = activeIndex < 0 || activeIndex >= articles.length - 1;
    }
    if (previewStoryStatus) {
      previewStoryStatus.textContent = activeIndex >= 0
        ? `Story ${activeIndex + 1} of ${articles.length}`
        : 'No stories';
    }
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

  function createLiveTextElement(ref) {
    const { section, block } = ref;
    let element;

    if (block.block_type === 'list') {
      element = document.createElement('ul');
      const items = block.content.split(/\r?\n/).map((item) => item.trim()).filter(Boolean);
      (items.length ? items : ['']).forEach((item) => {
        const listItem = document.createElement('li');
        listItem.textContent = item;
        element.append(listItem);
      });
    } else {
      element = document.createElement(
        block.block_type === 'heading' ? 'h3' : block.block_type === 'quote' ? 'blockquote' : 'p'
      );
      element.textContent = block.content;
    }

    element.className = 'news-live-content__item';
    element.dataset.sectionId = section.id;
    element.dataset.blockId = block.id;
    element.dataset.liveContentEditable = '';
    element.dataset.placeholder = block.block_type === 'heading'
      ? 'Write a heading'
      : block.block_type === 'quote'
        ? 'Write a quote'
        : block.block_type === 'list'
          ? 'Write one item per line'
          : 'Start writing your story';
    element.contentEditable = 'true';
    element.spellcheck = true;
    element.setAttribute('role', 'textbox');
    element.setAttribute('aria-multiline', 'true');
    return element;
  }

  function createLiveImageElement(ref) {
    const { section, block } = ref;
    const figure = document.createElement('figure');
    const image = document.createElement('img');
    const button = document.createElement('button');

    figure.className = 'news-live-content__image';
    figure.dataset.sectionId = section.id;
    figure.dataset.blockId = block.id;
    image.src = block.content;
    image.alt = block.tag && block.tag !== 'image' ? block.tag : '';
    button.type = 'button';
    button.dataset.selectLiveContent = '';
    button.textContent = 'Edit image';
    figure.append(image, button);
    return figure;
  }

  function renderLiveContent() {
    if (!(previewPageContent instanceof HTMLElement)) return;
    const article = getActiveArticle();
    previewPageContent.replaceChildren();

    if (!article) return;
    const refs = getEditableContentRefs(article);

    if (refs.length === 0) {
      const empty = document.createElement('p');
      empty.className = 'news-live-content__empty';
      empty.textContent = 'This story is empty. Add text, a heading, an image, a quote or a list above.';
      previewPageContent.append(empty);
      updateSelectionToolbar();
      return;
    }

    refs.forEach((ref) => {
      previewPageContent.append(
        ref.block.block_type === 'image'
          ? createLiveImageElement(ref)
          : createLiveTextElement(ref)
      );
    });
    updateSelectionToolbar();
  }

  function renderLiveEditor() {
    const article = getActiveArticle();
    renderStoryControls();

    if (!article) {
      if (previewCategory) previewCategory.textContent = 'No story';
      if (previewTitle) previewTitle.textContent = 'Create a story to begin';
      if (previewDate) previewDate.textContent = '';
      if (previewStatus) previewStatus.textContent = '';
      if (previewSummary) previewSummary.textContent = '';
      if (previewCoverImage instanceof HTMLImageElement) previewCoverImage.removeAttribute('src');
      if (previewCover) previewCover.hidden = true;
      if (selectionToolbar) selectionToolbar.hidden = true;
      renderLiveContent();
      return;
    }

    if (previewCategory) previewCategory.textContent = article.category || 'Uncategorised';
    if (previewTitle) previewTitle.textContent = article.title;
    if (previewDate) previewDate.textContent = formatDate(article.date);
    if (previewStatus) previewStatus.textContent = article.status;
    if (previewSummary) previewSummary.textContent = getSummaryRef(article)?.block.content || '';

    const imageUrl = getArticleImage(article);
    if (previewCover) previewCover.hidden = false;
    if (previewCoverImage instanceof HTMLImageElement) {
      previewCoverImage.src = imageUrl;
      previewCoverImage.alt = article.title ? `${article.title} cover` : 'News story cover';
    }
    if (coverUrlInput instanceof HTMLInputElement) coverUrlInput.value = getHeroRef(article)?.block.content || '';
    if (coverEditor) coverEditor.hidden = true;
    renderLiveContent();
  }

  function setFormDisabled(disabled) {
    form?.querySelectorAll('input, select, textarea, button').forEach((control) => {
      control.disabled = disabled;
    });
    form?.querySelectorAll('[contenteditable]').forEach((editable) => {
      editable.contentEditable = disabled ? 'false' : 'true';
    });
  }

  function setDirty(isDirty) {
    if (!editorState) return;
    editorState.textContent = isDirty ? 'Unsaved changes' : 'No unsaved changes';
    editorState.classList.toggle('is-dirty', isDirty);
  }

  function populateForm() {
    const article = getActiveArticle();

    if (!article) {
      metadataFields.forEach((field) => {
        if (field) field.value = '';
      });
      setFormDisabled(true);
      if (editorState) editorState.textContent = 'No story selected';
      if (editorModeLabel) editorModeLabel.textContent = 'News workspace';
      renderLiveEditor();
      return;
    }

    setFormDisabled(false);
    if (categoryInput instanceof HTMLInputElement) categoryInput.value = article.category;
    if (statusInput instanceof HTMLSelectElement) statusInput.value = article.status;
    if (dateInput instanceof HTMLInputElement) dateInput.value = article.date;
    if (editorModeLabel) editorModeLabel.textContent = article.isNew ? 'New story' : 'Selected story';
    setDirty(article.isNew);
    renderLiveEditor();
  }

  function selectArticle(id) {
    activeId = id;
    selectedContentId = '';
    selectedSectionId = '';
    populateForm();
    renderList();
  }

  function syncMetadataFromForm() {
    const article = getActiveArticle();
    if (!article) return;

    if (categoryInput instanceof HTMLInputElement) article.category = categoryInput.value;
    if (statusInput instanceof HTMLSelectElement) article.status = statusInput.value;
    if (dateInput instanceof HTMLInputElement) article.date = dateInput.value;
    if (previewCategory) previewCategory.textContent = article.category || 'Uncategorised';
    if (previewDate) previewDate.textContent = formatDate(article.date);
    if (previewStatus) previewStatus.textContent = article.status;
    setDirty(true);
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
    const today = new Date();
    const localDate = new Date(today.getTime() - today.getTimezoneOffset() * 60000)
      .toISOString()
      .slice(0, 10);
    const article = normalizeArticle({
      id: makeId('news'),
      title: 'Untitled story',
      category: 'Events',
      status: 'Draft',
      date: localDate,
      isNew: true,
      sections: [{
        blocks: [
          { block_type: 'image', tag: 'hero', content: sourceArticles[0]?.image || '' },
          { block_type: 'paragraph', tag: 'summary', content: '' },
          { block_type: 'paragraph', tag: 'body', content: '' },
        ],
      }],
    });

    articles.unshift(article);
    originals.unshift(clone(article));
    activeId = article.id;
    selectedContentId = '';
    selectedSectionId = '';
    setActiveFilter('All');
    if (searchInput instanceof HTMLInputElement) searchInput.value = '';
    populateForm();
    renderList();
    previewTitle?.focus();
    selectAllEditableText(previewTitle);
    showToast('New draft created', 'Edit the title and content directly in the live page.');
  }

  function editableText(element) {
    if (!(element instanceof HTMLElement)) return '';
    return element.innerText.replace(/\u00a0/g, ' ').replace(/\r/g, '');
  }

  function handleLiveFieldInput(event) {
    const target = event.target.closest('[data-live-field]');
    const article = getActiveArticle();
    if (!(target instanceof HTMLElement) || !article) return;

    const value = editableText(target);
    if (target.dataset.liveField === 'title') {
      article.title = value.replace(/\n+/g, ' ');
      renderStoryControls();
      renderList();
    } else if (target.dataset.liveField === 'summary') {
      ensureSummaryRef(article).block.content = value;
    }
    setDirty(true);
  }

  function blockTextFromElement(element, blockType) {
    if (blockType !== 'list') return editableText(element);
    return [...element.querySelectorAll('li')]
      .map((item) => editableText(item).trim())
      .filter(Boolean)
      .join('\n');
  }

  function handleLiveContentInput(event) {
    const editable = event.target.closest('[data-live-content-editable]');
    if (!(editable instanceof HTMLElement)) return;
    const ref = getAllBlockRefs(getActiveArticle()).find(({ section, block }) => (
      section.id === editable.dataset.sectionId && block.id === editable.dataset.blockId
    ));
    if (!ref) return;
    ref.block.content = blockTextFromElement(editable, ref.block.block_type);
    setDirty(true);
  }

  function selectLiveContent(sectionId, blockId, { focus = false } = {}) {
    selectedSectionId = sectionId || '';
    selectedContentId = blockId || '';
    updateSelectionToolbar();

    if (focus) {
      const selected = previewPageContent?.querySelector(
        `[data-section-id="${CSS.escape(selectedSectionId)}"][data-block-id="${CSS.escape(selectedContentId)}"]`
      );
      if (selected instanceof HTMLElement && selected.matches('[contenteditable]')) selected.focus();
    }
  }

  function updateSelectionToolbar() {
    if (!selectionToolbar) return;
    const ref = getSelectedContentRef();
    const editableRefs = getEditableContentRefs(getActiveArticle());

    previewPageContent?.querySelectorAll('[data-block-id]').forEach((element) => {
      element.classList.toggle(
        'is-selected',
        element.dataset.blockId === selectedContentId && element.dataset.sectionId === selectedSectionId
      );
    });

    if (!ref || !editableRefs.some(({ block }) => block.id === ref.block.id)) {
      selectionToolbar.hidden = true;
      return;
    }

    selectionToolbar.hidden = false;
    if (contentTypeSelect instanceof HTMLSelectElement) contentTypeSelect.value = ref.block.block_type;
    const isImage = ref.block.block_type === 'image';
    if (contentUrlLabel) contentUrlLabel.hidden = !isImage;
    if (contentUrlInput instanceof HTMLInputElement) {
      contentUrlInput.hidden = !isImage;
      contentUrlInput.value = isImage ? ref.block.content : '';
    }

    const selectedIndex = editableRefs.findIndex(({ block }) => block.id === ref.block.id);
    if (moveContentUp instanceof HTMLButtonElement) moveContentUp.disabled = selectedIndex <= 0;
    if (moveContentDown instanceof HTMLButtonElement) {
      moveContentDown.disabled = selectedIndex < 0 || selectedIndex >= editableRefs.length - 1;
    }
  }

  function addLiveContent(type) {
    const article = getActiveArticle();
    if (!article || !['heading', 'paragraph', 'image', 'quote', 'list'].includes(type)) return;
    const section = article.sections.at(-1) || ensurePrimarySection(article);
    const defaults = {
      heading: 'New section heading',
      paragraph: 'Start writing here…',
      image: '',
      quote: 'Add a memorable quote…',
      list: 'First item\nSecond item',
    };
    const tags = {
      heading: 'heading',
      paragraph: 'body',
      image: 'image',
      quote: 'quote',
      list: 'list',
    };
    const block = normalizeBlock({ block_type: type, tag: tags[type], content: defaults[type] });
    section.blocks.push(block);
    selectedSectionId = section.id;
    selectedContentId = block.id;
    setDirty(true);
    renderLiveContent();

    if (type === 'image') {
      contentUrlInput?.focus();
    } else {
      selectLiveContent(section.id, block.id, { focus: true });
      const selected = previewPageContent?.querySelector(`[data-block-id="${CSS.escape(block.id)}"]`);
      selectAllEditableText(selected);
    }
  }

  function moveSelectedContent(direction) {
    const article = getActiveArticle();
    const refs = getEditableContentRefs(article);
    const selectedIndex = refs.findIndex(({ section, block }) => (
      section.id === selectedSectionId && block.id === selectedContentId
    ));
    const targetIndex = selectedIndex + direction;
    if (selectedIndex < 0 || targetIndex < 0 || targetIndex >= refs.length) return;

    const current = refs[selectedIndex];
    const target = refs[targetIndex];
    current.section.blocks[current.index] = target.block;
    target.section.blocks[target.index] = current.block;
    setDirty(true);
    renderLiveContent();
  }

  function deleteSelectedContent() {
    const ref = getSelectedContentRef();
    if (!ref) return;
    ref.section.blocks.splice(ref.index, 1);
    selectedSectionId = '';
    selectedContentId = '';
    setDirty(true);
    renderLiveContent();
    renderList();
  }

  function changeSelectedContentType() {
    const ref = getSelectedContentRef();
    if (!ref || !(contentTypeSelect instanceof HTMLSelectElement)) return;
    ref.block.block_type = contentTypeSelect.value;
    if (ref.block.block_type === 'image' && !/^https?:|^\//.test(ref.block.content.trim())) {
      ref.block.content = '';
    }
    setDirty(true);
    renderLiveContent();
  }

  function changeSelectedImageUrl() {
    const ref = getSelectedContentRef();
    if (!ref || ref.block.block_type !== 'image' || !(contentUrlInput instanceof HTMLInputElement)) return;
    ref.block.content = contentUrlInput.value;
    const image = previewPageContent?.querySelector(
      `[data-block-id="${CSS.escape(ref.block.id)}"] img`
    );
    if (image instanceof HTMLImageElement) image.src = ref.block.content;
    setDirty(true);
  }

  function changeCoverImage() {
    const article = getActiveArticle();
    if (!article || !(coverUrlInput instanceof HTMLInputElement)) return;
    ensureHeroRef(article).block.content = coverUrlInput.value;
    if (previewCoverImage instanceof HTMLImageElement) previewCoverImage.src = coverUrlInput.value;
    setDirty(true);
    renderList();
  }

  function selectAllEditableText(element) {
    if (!(element instanceof HTMLElement)) return;
    const selection = window.getSelection();
    const range = document.createRange();
    range.selectNodeContents(element);
    selection?.removeAllRanges();
    selection?.addRange(range);
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
    selectedSectionId = '';
    selectedContentId = '';
    persistArticles();
    closeDialog(deleteDialog);
    populateForm();
    renderList();
    showToast('Story deleted', `${deletedArticle.title || 'Untitled story'} was removed.`);
  }

  metadataFields.forEach((field) => field?.addEventListener('input', syncMetadataFromForm));
  searchInput?.addEventListener('input', renderList);

  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      setActiveFilter(button.dataset.filter || 'All');
      renderList();
    });
  });

  form?.addEventListener('input', (event) => {
    handleLiveFieldInput(event);
    handleLiveContentInput(event);
  });

  form?.addEventListener('keydown', (event) => {
    const editableTitle = event.target.closest('[data-live-field="title"]');
    if (editableTitle && event.key === 'Enter') event.preventDefault();
  });

  previewPageContent?.addEventListener('focusin', (event) => {
    const item = event.target.closest('[data-block-id]');
    if (item instanceof HTMLElement) selectLiveContent(item.dataset.sectionId, item.dataset.blockId);
  });

  previewPageContent?.addEventListener('click', (event) => {
    const item = event.target.closest('[data-block-id]');
    if (item instanceof HTMLElement) selectLiveContent(item.dataset.sectionId, item.dataset.blockId);
  });

  document.querySelectorAll('[data-add-live-content]').forEach((button) => {
    button.addEventListener('click', () => addLiveContent(button.dataset.addLiveContent));
  });

  contentTypeSelect?.addEventListener('change', changeSelectedContentType);
  contentUrlInput?.addEventListener('input', changeSelectedImageUrl);
  moveContentUp?.addEventListener('click', () => moveSelectedContent(-1));
  moveContentDown?.addEventListener('click', () => moveSelectedContent(1));
  deleteContentButton?.addEventListener('click', deleteSelectedContent);

  editCoverButton?.addEventListener('click', () => {
    if (!coverEditor) return;
    coverEditor.hidden = false;
    coverUrlInput?.focus();
    coverUrlInput?.select();
  });
  closeCoverEditor?.addEventListener('click', () => {
    if (coverEditor) coverEditor.hidden = true;
    editCoverButton?.focus();
  });
  coverUrlInput?.addEventListener('input', changeCoverImage);

  discardButton?.addEventListener('click', () => {
    const article = getActiveArticle();
    const original = getOriginalArticle();
    if (!article || !original) return;
    Object.assign(article, clone(original));
    selectedContentId = '';
    selectedSectionId = '';
    populateForm();
    renderList();
    showToast('Changes discarded', 'The story returned to its last saved state.');
  });

  createButton?.addEventListener('click', createStory);
  previewStorySelect?.addEventListener('change', () => {
    if (previewStorySelect instanceof HTMLSelectElement) selectArticle(previewStorySelect.value);
  });
  previewPrevious?.addEventListener('click', () => {
    const activeIndex = articles.findIndex((article) => article.id === activeId);
    if (activeIndex > 0) selectArticle(articles[activeIndex - 1].id);
  });
  previewNext?.addEventListener('click', () => {
    const activeIndex = articles.findIndex((article) => article.id === activeId);
    if (activeIndex >= 0 && activeIndex < articles.length - 1) selectArticle(articles[activeIndex + 1].id);
  });
  deleteButton?.addEventListener('click', requestDelete);
  confirmDeleteButton?.addEventListener('click', deleteStory);

  if (logoutDashboard instanceof HTMLButtonElement) {
    logoutDashboard.addEventListener('click', async () => {
      logoutDashboard.disabled = true;

      try {
        const response = await fetch(window.ullmanAjax.controllerUrl, {
          method: 'POST',
          credentials: 'same-origin',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'logout' }),
        });
        const data = await response.json();

        if (!response.ok || data.success !== true) {
          throw new Error(data.message || 'Unable to log out.');
        }

        window.location.replace(window.ullmanAjax.loginUrl);
      } catch (error) {
        console.error('Logout error:', error);
        alert(error.message || 'Unable to log out.');
        logoutDashboard.disabled = false;
      }
    });
  }

  form?.addEventListener('submit', (event) => {
    event.preventDefault();
    const article = getActiveArticle();
    if (!article) return;

    if (!article.title.trim()) {
      showToast('Title required', 'Add a story title in the live editor before saving.');
      previewTitle?.focus();
      return;
    }

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    syncMetadataFromForm();
    const wasNew = article.isNew;
    article.isNew = false;
    const originalIndex = originals.findIndex((item) => item.id === article.id);
    if (originalIndex >= 0) originals[originalIndex] = clone(article);
    else originals.unshift(clone(article));

    if (!persistArticles()) return;
    if (editorModeLabel) editorModeLabel.textContent = 'Selected story';
    setDirty(false);
    renderList();
    showToast(wasNew ? 'Story created' : 'Story updated', 'The live News page changes were saved.');
  });

  document.querySelectorAll('[data-close-dialog]').forEach((button) => {
    button.addEventListener('click', () => {
      closeDialog(document.querySelector(`#${button.dataset.closeDialog}`));
    });
  });

  deleteDialog?.addEventListener('click', (event) => {
    if (event.target === deleteDialog) closeDialog(deleteDialog);
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
    if (event.key === 'Escape') {
      setNavigation(false);
      if (coverEditor) coverEditor.hidden = true;
    }
  });

  renderList();
  populateForm();
})();
