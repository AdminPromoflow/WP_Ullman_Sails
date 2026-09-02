(() => {
  const STORAGE_KEY = 'ullman-dashboard-news-v2';
  const sourceArticles = Array.isArray(window.ullmanDashboardNews)
    ? window.ullmanDashboardNews
    : [];

  const clone = (value) => JSON.parse(JSON.stringify(value));
  const makeId = (prefix) => `${prefix}-${Date.now()}-${Math.random().toString(36).slice(2, 8)}`;

  function normalizeBlock(block = {}) {
    return {
      id: String(block.id || makeId('block')),
      block_type: ['heading', 'paragraph', 'image', 'quote', 'list'].includes(block.block_type)
        ? block.block_type
        : 'paragraph',
      tag: String(block.tag || ''),
      content: String(block.content || ''),
    };
  }

  function normalizeSection(section = {}) {
    const blocks = Array.isArray(section.blocks) ? section.blocks.map(normalizeBlock) : [];
    return {
      id: String(section.id || makeId('section')),
      blocks,
    };
  }

  function normalizeArticle(article = {}, index = 0) {
    let sections = Array.isArray(article.sections)
      ? article.sections.map(normalizeSection)
      : [];

    if (sections.length === 0) {
      const legacyBlocks = [];

      if (article.image) {
        legacyBlocks.push(normalizeBlock({
          id: `${article.id || index}-image`,
          block_type: 'image',
          tag: 'hero',
          content: article.image,
        }));
      }

      if (article.summary) {
        legacyBlocks.push(normalizeBlock({
          id: `${article.id || index}-summary`,
          block_type: 'paragraph',
          tag: 'summary',
          content: article.summary,
        }));
      }

      if (article.content) {
        legacyBlocks.push(normalizeBlock({
          id: `${article.id || index}-body`,
          block_type: 'paragraph',
          tag: 'body',
          content: article.content,
        }));
      }

      sections = [normalizeSection({
        id: `${article.id || index}-section-1`,
        blocks: legacyBlocks,
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

      if (Array.isArray(parsed)) {
        return parsed.map(normalizeArticle);
      }
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
  const titleInput = document.querySelector('#news-title');
  const categoryInput = document.querySelector('#news-category');
  const statusInput = document.querySelector('#news-status');
  const dateInput = document.querySelector('#news-date');
  const sectionsContainer = document.querySelector('#news-sections');
  const addSectionButton = document.querySelector('#add-section');
  const previewStorySelect = document.querySelector('#preview-story-select');
  const previewPrevious = document.querySelector('#preview-previous');
  const previewNext = document.querySelector('#preview-next');
  const previewStoryStatus = document.querySelector('#preview-story-status');
  const previewCategory = document.querySelector('#preview-category');
  const previewTitle = document.querySelector('#preview-card-title');
  const previewDate = document.querySelector('#preview-date');
  const previewStatus = document.querySelector('#preview-status');
  const previewSummary = document.querySelector('#preview-summary');
  const previewPageContent = document.querySelector('#preview-page-content');
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
  const logoutDashboard = document.getElementById('logout-dashboard');

  let activeId = articles[0]?.id || '';
  let activeFilter = 'All';
  let toastTimer;

  const metadataFields = [titleInput, categoryInput, statusInput, dateInput];

  function getActiveArticle() {
    return articles.find((article) => article.id === activeId);
  }

  function getOriginalArticle() {
    return originals.find((article) => article.id === activeId);
  }

  function getAllBlocks(article) {
    return article?.sections.flatMap((section) => section.blocks) || [];
  }

  function getArticleImage(article) {
    return getAllBlocks(article).find((block) => block.block_type === 'image' && block.content.trim())?.content.trim()
      || sourceArticles[0]?.image
      || '';
  }

  function getArticleSummary(article) {
    const blocks = getAllBlocks(article);
    const summary = blocks.find((block) => block.tag.trim().toLowerCase() === 'summary' && block.content.trim())
      || blocks.find((block) => block.block_type === 'paragraph' && block.content.trim());
    return summary?.content.trim().slice(0, 180) || '';
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

  function renderPreview() {
    const article = getActiveArticle();
    const activeIndex = articles.findIndex((item) => item.id === activeId);

    if (previewStorySelect instanceof HTMLSelectElement) {
      previewStorySelect.replaceChildren();
      articles.forEach((item) => {
        const option = document.createElement('option');
        option.value = item.id;
        option.textContent = item.title || 'Untitled story';
        option.selected = item.id === activeId;
        previewStorySelect.append(option);
      });
    }

    if (previewPrevious instanceof HTMLButtonElement) previewPrevious.disabled = activeIndex <= 0;
    if (previewNext instanceof HTMLButtonElement) previewNext.disabled = activeIndex < 0 || activeIndex >= articles.length - 1;
    if (previewStoryStatus) {
      previewStoryStatus.textContent = activeIndex >= 0
        ? `Story ${activeIndex + 1} of ${articles.length}`
        : 'No stories';
    }

    if (!article) {
      if (previewCategory) previewCategory.textContent = 'No story';
      if (previewTitle) previewTitle.textContent = 'Create a story to begin';
      if (previewDate) previewDate.textContent = '';
      if (previewStatus) previewStatus.textContent = '';
      if (previewSummary) previewSummary.textContent = 'Your News page preview will appear here.';
      if (previewPageContent instanceof HTMLElement) previewPageContent.replaceChildren();
      return;
    }

    if (previewCategory) previewCategory.textContent = article.category || 'Uncategorised';
    if (previewTitle) previewTitle.textContent = article.title || 'Untitled story';
    if (previewDate) previewDate.textContent = formatDate(article.date);
    if (previewStatus) previewStatus.textContent = article.status;
    if (previewSummary) previewSummary.textContent = getArticleSummary(article) || 'Add a paragraph and tag it as summary.';

    if (previewPageContent instanceof HTMLElement) {
      previewPageContent.replaceChildren();
      article.sections.forEach((section, sectionIndex) => {
        const sectionElement = document.createElement('section');
        sectionElement.setAttribute('aria-label', `Preview section ${sectionIndex + 1}`);
        section.blocks.forEach((block) => appendReaderBlock(sectionElement, block));
        if (sectionElement.childElementCount > 0) previewPageContent.append(sectionElement);
      });
    }
  }

  function setFormDisabled(disabled) {
    form?.querySelectorAll('input, select, textarea, button').forEach((control) => {
      control.disabled = disabled;
    });
  }

  function setDirty(isDirty) {
    if (!editorState) return;
    editorState.textContent = isDirty ? 'Unsaved changes' : 'No unsaved changes';
    editorState.classList.toggle('is-dirty', isDirty);
  }

  function blockTypeLabel(type) {
    return {
      heading: 'Heading',
      paragraph: 'Paragraph',
      image: 'Image URL',
      quote: 'Quote',
      list: 'List',
    }[type] || 'Paragraph';
  }

  function renderBlockEditor(section, block, blockIndex) {
    const editor = document.createElement('article');
    const header = document.createElement('header');
    const title = document.createElement('strong');
    const actions = document.createElement('div');
    const fields = document.createElement('div');
    const typeField = document.createElement('label');
    const typeLabel = document.createElement('span');
    const typeSelect = document.createElement('select');
    const tagField = document.createElement('label');
    const tagLabel = document.createElement('span');
    const tagInput = document.createElement('input');
    const contentField = document.createElement('label');
    const contentLabel = document.createElement('span');
    const contentInput = document.createElement('textarea');

    editor.className = 'news-block-editor';
    editor.dataset.sectionId = section.id;
    editor.dataset.blockId = block.id;
    header.className = 'news-block-editor__header';
    title.textContent = `Block ${blockIndex + 1} · ${blockTypeLabel(block.block_type)}`;
    actions.className = 'news-structure-actions';

    [
      ['move-block-up', '↑', 'Move block up', blockIndex === 0],
      ['move-block-down', '↓', 'Move block down', blockIndex === section.blocks.length - 1],
      ['remove-block', '×', 'Delete block', false],
    ].forEach(([action, text, label, disabled]) => {
      const button = document.createElement('button');
      button.type = 'button';
      button.dataset.sectionAction = action;
      button.textContent = text;
      button.setAttribute('aria-label', label);
      button.disabled = disabled;
      actions.append(button);
    });

    fields.className = 'news-block-editor__fields';
    typeField.className = 'news-compact-field';
    typeLabel.textContent = 'Type';
    typeSelect.dataset.blockField = 'block_type';
    ['heading', 'paragraph', 'image', 'quote', 'list'].forEach((type) => {
      const option = document.createElement('option');
      option.value = type;
      option.textContent = blockTypeLabel(type);
      option.selected = block.block_type === type;
      typeSelect.append(option);
    });
    typeField.append(typeLabel, typeSelect);

    tagField.className = 'news-compact-field';
    tagLabel.textContent = 'Tag';
    tagInput.type = 'text';
    tagInput.maxLength = 50;
    tagInput.placeholder = 'summary, hero, body…';
    tagInput.value = block.tag;
    tagInput.dataset.blockField = 'tag';
    tagField.append(tagLabel, tagInput);

    contentField.className = 'news-compact-field news-compact-field--content';
    contentLabel.textContent = block.block_type === 'image' ? 'Image URL' : 'Content';
    contentInput.rows = block.block_type === 'paragraph' ? 5 : 3;
    contentInput.placeholder = block.block_type === 'list'
      ? 'One item per line'
      : block.block_type === 'image'
        ? 'https://… or a site-relative image path'
        : 'Write this content block…';
    contentInput.value = block.content;
    contentInput.dataset.blockField = 'content';
    contentField.append(contentLabel, contentInput);

    fields.append(typeField, tagField, contentField);
    header.append(title, actions);
    editor.append(header, fields);
    return editor;
  }

  function renderSections() {
    if (!(sectionsContainer instanceof HTMLElement)) return;
    const article = getActiveArticle();
    sectionsContainer.replaceChildren();

    if (!article) return;

    if (article.sections.length === 0) {
      const empty = document.createElement('p');
      empty.className = 'news-sections__empty';
      empty.textContent = 'This story has no sections. Add one to start building its content.';
      sectionsContainer.append(empty);
      return;
    }

    article.sections.forEach((section, sectionIndex) => {
      const card = document.createElement('section');
      const header = document.createElement('header');
      const headingWrap = document.createElement('div');
      const eyebrow = document.createElement('span');
      const heading = document.createElement('h4');
      const actions = document.createElement('div');
      const blocks = document.createElement('div');
      const footer = document.createElement('footer');
      const addBlock = document.createElement('button');

      card.className = 'news-section-card';
      card.dataset.sectionId = section.id;
      header.className = 'news-section-card__header';
      eyebrow.textContent = `Section ${sectionIndex + 1}`;
      heading.textContent = `${section.blocks.length} ${section.blocks.length === 1 ? 'block' : 'blocks'}`;
      headingWrap.append(eyebrow, heading);
      actions.className = 'news-structure-actions';

      [
        ['move-section-up', '↑', 'Move section up', sectionIndex === 0],
        ['move-section-down', '↓', 'Move section down', sectionIndex === article.sections.length - 1],
        ['remove-section', '×', 'Delete section', false],
      ].forEach(([action, text, label, disabled]) => {
        const button = document.createElement('button');
        button.type = 'button';
        button.dataset.sectionAction = action;
        button.textContent = text;
        button.setAttribute('aria-label', label);
        button.disabled = disabled;
        actions.append(button);
      });

      blocks.className = 'news-blocks';
      section.blocks.forEach((block, blockIndex) => {
        blocks.append(renderBlockEditor(section, block, blockIndex));
      });

      if (section.blocks.length === 0) {
        const empty = document.createElement('p');
        empty.className = 'news-blocks__empty';
        empty.textContent = 'No blocks in this section.';
        blocks.append(empty);
      }

      footer.className = 'news-section-card__footer';
      addBlock.type = 'button';
      addBlock.className = 'dashboard-button dashboard-button--secondary';
      addBlock.dataset.sectionAction = 'add-block';
      addBlock.textContent = '+ Add content block';
      footer.append(addBlock);
      header.append(headingWrap, actions);
      card.append(header, blocks, footer);
      sectionsContainer.append(card);
    });
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
      renderSections();
      renderPreview();
      return;
    }

    setFormDisabled(false);
    if (titleInput instanceof HTMLInputElement) titleInput.value = article.title;
    if (categoryInput instanceof HTMLInputElement) categoryInput.value = article.category;
    if (statusInput instanceof HTMLSelectElement) statusInput.value = article.status;
    if (dateInput instanceof HTMLInputElement) dateInput.value = article.date;
    if (editorModeLabel) editorModeLabel.textContent = article.isNew ? 'New story' : 'Selected story';
    setDirty(article.isNew);
    renderSections();
    renderPreview();
  }

  function selectArticle(id) {
    activeId = id;
    populateForm();
    renderList();
  }

  function syncMetadataFromForm() {
    const article = getActiveArticle();
    if (!article) return;

    if (titleInput instanceof HTMLInputElement) article.title = titleInput.value;
    if (categoryInput instanceof HTMLInputElement) article.category = categoryInput.value;
    if (statusInput instanceof HTMLSelectElement) article.status = statusInput.value;
    if (dateInput instanceof HTMLInputElement) article.date = dateInput.value;
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
    setActiveFilter('All');
    if (searchInput instanceof HTMLInputElement) searchInput.value = '';
    populateForm();
    renderList();
    titleInput?.focus();
    showToast('New draft created', 'Add sections and content blocks, then save the story.');
  }

  function addSection() {
    const article = getActiveArticle();
    if (!article) return;
    article.sections.push(normalizeSection({
      blocks: [
        { block_type: 'heading', tag: 'heading', content: 'Section heading' },
        { block_type: 'paragraph', tag: 'body', content: '' },
      ],
    }));
    setDirty(true);
    renderSections();
    renderPreview();
  }

  function moveItem(items, fromIndex, direction) {
    const toIndex = fromIndex + direction;
    if (fromIndex < 0 || toIndex < 0 || toIndex >= items.length) return false;
    [items[fromIndex], items[toIndex]] = [items[toIndex], items[fromIndex]];
    return true;
  }

  function handleStructureAction(button) {
    const article = getActiveArticle();
    const sectionCard = button.closest('[data-section-id]');
    const sectionId = sectionCard?.dataset.sectionId || '';
    const sectionIndex = article?.sections.findIndex((section) => section.id === sectionId) ?? -1;
    const section = sectionIndex >= 0 ? article.sections[sectionIndex] : null;
    const action = button.dataset.sectionAction;
    if (!article || !section || !action) return;

    const blockEditor = button.closest('[data-block-id]');
    const blockId = blockEditor?.dataset.blockId || '';
    const blockIndex = section.blocks.findIndex((block) => block.id === blockId);

    if (action === 'add-block') {
      section.blocks.push(normalizeBlock());
    } else if (action === 'remove-section') {
      article.sections.splice(sectionIndex, 1);
    } else if (action === 'move-section-up') {
      moveItem(article.sections, sectionIndex, -1);
    } else if (action === 'move-section-down') {
      moveItem(article.sections, sectionIndex, 1);
    } else if (action === 'remove-block' && blockIndex >= 0) {
      section.blocks.splice(blockIndex, 1);
    } else if (action === 'move-block-up' && blockIndex >= 0) {
      moveItem(section.blocks, blockIndex, -1);
    } else if (action === 'move-block-down' && blockIndex >= 0) {
      moveItem(section.blocks, blockIndex, 1);
    } else {
      return;
    }

    setDirty(true);
    renderSections();
    renderPreview();
    renderList();
  }

  function handleBlockField(event) {
    const input = event.target.closest('[data-block-field]');
    const editor = input?.closest('[data-block-id]');
    const sectionCard = input?.closest('[data-section-id]');
    const article = getActiveArticle();
    const section = article?.sections.find((item) => item.id === sectionCard?.dataset.sectionId);
    const block = section?.blocks.find((item) => item.id === editor?.dataset.blockId);
    const field = input?.dataset.blockField;
    if (!block || !field || !['block_type', 'tag', 'content'].includes(field)) return;

    block[field] = input.value;
    setDirty(true);
    renderPreview();
    renderList();

    if (field === 'block_type' && event.type === 'change') {
      renderSections();
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

  function appendReaderBlock(container, block) {
    const content = block.content.trim();
    if (!content || block.tag.trim().toLowerCase() === 'summary') return;

    if (block.block_type === 'image') {
      const figure = document.createElement('figure');
      const image = document.createElement('img');
      image.src = content;
      image.alt = block.tag && block.tag !== 'hero' ? block.tag : '';
      figure.append(image);
      container.append(figure);
      return;
    }

    if (block.block_type === 'list') {
      const listElement = document.createElement('ul');
      content.split(/\r?\n/).map((item) => item.trim()).filter(Boolean).forEach((item) => {
        const listItem = document.createElement('li');
        listItem.textContent = item;
        listElement.append(listItem);
      });
      container.append(listElement);
      return;
    }

    const element = document.createElement(
      block.block_type === 'heading' ? 'h3' : block.block_type === 'quote' ? 'blockquote' : 'p'
    );
    element.textContent = content;
    container.append(element);
  }

  function readStory() {
    const article = getActiveArticle();
    if (!article) return;

    if (readerImage instanceof HTMLImageElement) readerImage.src = getArticleImage(article);
    if (readerCategory) readerCategory.textContent = article.category;
    if (readerDate) readerDate.textContent = formatDate(article.date);
    if (readerStatus) readerStatus.textContent = article.status;
    if (readerTitle) readerTitle.textContent = article.title || 'Untitled story';
    if (readerSummary) readerSummary.textContent = getArticleSummary(article) || 'No summary has been added.';

    if (readerContent instanceof HTMLElement) {
      readerContent.replaceChildren();
      article.sections.forEach((section, sectionIndex) => {
        const sectionElement = document.createElement('section');
        sectionElement.setAttribute('aria-label', `Section ${sectionIndex + 1}`);
        section.blocks.forEach((block) => appendReaderBlock(sectionElement, block));
        if (sectionElement.childElementCount > 0) readerContent.append(sectionElement);
      });
    }

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
    persistArticles();
    closeDialog(deleteDialog);
    populateForm();
    renderList();
    showToast('Story deleted', `${deletedArticle.title || 'Untitled story'} and its sections were removed.`);
  }

  metadataFields.forEach((field) => field?.addEventListener('input', syncMetadataFromForm));
  metadataFields.forEach((field) => field?.addEventListener('change', syncMetadataFromForm));
  searchInput?.addEventListener('input', renderList);

  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      setActiveFilter(button.dataset.filter || 'All');
      renderList();
    });
  });

  sectionsContainer?.addEventListener('click', (event) => {
    const button = event.target.closest('[data-section-action]');
    if (button instanceof HTMLButtonElement) handleStructureAction(button);
  });
  sectionsContainer?.addEventListener('input', handleBlockField);
  sectionsContainer?.addEventListener('change', handleBlockField);

  discardButton?.addEventListener('click', () => {
    const article = getActiveArticle();
    const original = getOriginalArticle();
    if (!article || !original) return;
    Object.assign(article, clone(original));
    populateForm();
    renderList();
    showToast('Changes discarded', 'The story returned to its last saved state.');
  });

  createButton?.addEventListener('click', createStory);
  addSectionButton?.addEventListener('click', addSection);
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
  readButton?.addEventListener('click', readStory);
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
    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    const article = getActiveArticle();
    if (!article) return;
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
    showToast(wasNew ? 'Story created' : 'Story updated', 'The News page and all its sections were saved.');
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
