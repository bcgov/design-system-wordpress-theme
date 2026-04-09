const EXTERNAL_LINK_CLASS = 'dswp-external-link-icon';
const BUTTON_EDITABLE_SELECTOR =
    '.wp-block-button__link.block-editor-rich-text__editable';
const EDITOR_CANVAS_SELECTOR =
    'iframe[name="editor-canvas"], iframe.editor-canvas, iframe[title*="Editor"]';
const UPDATE_EVENTS = ['input', 'change'];
/**
 * Check whether a URL is external to the current site.
 *
 * @param {string} href   Link href value.
 * @param {string} origin Current document origin.
 * @return {boolean} True when link is external.
 */
function isExternalHref(href, origin) {
    if (!href) {
        return false;
    }

    const normalizedHref = href.trim();
    const normalizedScheme = normalizedHref.toLowerCase();
    if (
        normalizedHref.startsWith('#') ||
        normalizedScheme.startsWith('mailto:') ||
        normalizedScheme.startsWith('tel:') ||
        normalizedScheme.startsWith('sms:') ||
        normalizedScheme.startsWith('javascript:') ||
        normalizedScheme.startsWith('data:') ||
        normalizedScheme.startsWith('vbscript:')
    ) {
        return false;
    }

    let parsedUrl;
    try {
        parsedUrl = new URL(normalizedHref, origin);
    } catch (error) {
        return false;
    }

    if (!['http:', 'https:'].includes(parsedUrl.protocol)) {
        return false;
    }

    return parsedUrl.origin !== origin;
}

/**
 * Add class to external links inside the provided document.
 *
 * @param {Document} doc Document to update.
 */
function markExternalLinks(doc) {
    const docWindow = doc?.defaultView;
    if (!doc || !docWindow?.location?.origin) {
        return;
    }

    const anchorsToCheck = doc.querySelectorAll('a[href]');

    anchorsToCheck.forEach((anchor) => {
        anchor.classList.toggle(
            EXTERNAL_LINK_CLASS,
            isExternalHref(
                anchor.getAttribute('href'),
                docWindow.location.origin
            )
        );
    });

    markExternalButtonEditors(doc);
}

/**
 * In Gutenberg, selected button text is often a RichText editable element
 * instead of an anchor. Read block URL from editor state and mirror icon class.
 *
 * @param {Document} doc Document to update.
 */
function markExternalButtonEditors(doc) {
    const docWindow = doc?.defaultView;
    if (!docWindow?.location?.origin) {
        return;
    }

    const blockEditorSelect = [docWindow, window, window.parent]
        .map((contextWindow) =>
            contextWindow?.wp?.data?.select?.('core/block-editor')
        )
        .find((selector) => selector?.getBlock);

    if (!blockEditorSelect?.getBlock) {
        return;
    }

    doc.querySelectorAll(BUTTON_EDITABLE_SELECTOR).forEach((editable) => {
        const clientId = editable
            .closest('[data-block]')
            ?.getAttribute('data-block');
        if (!clientId) {
            editable.classList.remove(EXTERNAL_LINK_CLASS);
            return;
        }

        const block = blockEditorSelect.getBlock(clientId);
        const href = block?.attributes?.url || '';
        editable.classList.toggle(
            EXTERNAL_LINK_CLASS,
            isExternalHref(href, docWindow.location.origin)
        );
    });
}

/**
 * Editor needs reactive updates while links are edited.
 *
 * @param {Document} doc Document to observe.
 */
function observeEditorDocument(doc) {
    const docWindow = doc?.defaultView;
    if (!doc?.body || !docWindow?.MutationObserver) {
        markExternalLinks(doc);
        return;
    }

    let scheduled = false;
    const schedule = () => {
        if (scheduled) {
            return;
        }
        scheduled = true;
        docWindow.requestAnimationFrame(() => {
            scheduled = false;
            markExternalLinks(doc);
        });
    };

    markExternalLinks(doc);

    const observer = new docWindow.MutationObserver((mutations) => {
        for (const mutation of mutations) {
            if (
                mutation.type === 'childList' ||
                mutation.type === 'attributes'
            ) {
                schedule();
                break;
            }
        }
    });

    observer.observe(doc.body, {
        subtree: true,
        childList: true,
        attributes: true,
    });

    // Some editor updates happen via React state and controls; listen to common
    // UI events so we re-check links even when href mutations are indirect.
    UPDATE_EVENTS.forEach((eventName) => {
        doc.addEventListener(eventName, schedule, true);
    });
}

/**
 * Do one immediate pass, then keep watching for editor canvas mounts.
 */
function initExternalLinkIcons() {
    // Frontend and top-level editor document.
    observeEditorDocument(document);

    let lastCanvasDocument;
    const attachEditorCanvas = () => {
        const canvas = document.querySelector(EDITOR_CANVAS_SELECTOR);
        const canvasDocument = canvas?.contentDocument;
        if (!canvasDocument || canvasDocument === lastCanvasDocument) {
            return;
        }
        lastCanvasDocument = canvasDocument;
        observeEditorDocument(canvasDocument);
    };

    attachEditorCanvas();

    if (!window.MutationObserver || !document.body) {
        return;
    }

    const rootObserver = new window.MutationObserver(attachEditorCanvas);
    rootObserver.observe(document.body, { subtree: true, childList: true });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initExternalLinkIcons);
} else {
    initExternalLinkIcons();
}
