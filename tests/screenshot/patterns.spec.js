import { test, expect } from '@wordpress/e2e-test-utils-playwright';

test.describe('pattern', () => {
    // TODO: Run e2e tests in Playwright Docker container for consistency.
    const SCREENSHOT_OPTIONS = {maxDiffPixelRatio: 0.02};

    test.beforeEach(async ({ admin }) => {
        // Create a new post before each test
        await admin.createNewPost();
    });

    [
        { name: 'bc-gov-logo-light' },
        { name: 'dswp-bullet-list' },
        { name: 'dswp-call-to-action' },
        { name: 'dswp-card-with-hyperlinks-list' },
        { name: 'dswp-default-heading' },
        { name: 'dswp-footer-with-territorial-acknowledgement' },
        { name: 'dswp-h1-with-divider' },
        { name: 'dswp-heading-with-paragraphs' },
        { name: 'dswp-hero-image-with-title' },
        { name: 'dswp-horizontal-card' },
        { name: 'dswp-horizontal-card-large-img-left' },
        { name: 'dswp-horizontal-card-large-img-no-shadow' },
        { name: 'dswp-horizontal-card-large-img-right' },
        { name: 'dswp-horizontal-card-reversed' },
        { name: 'dswp-icon-with-excerpt' },
        { name: 'dswp-image-text-flipped' },
        { name: 'dswp-image-text' },
        { name: 'dswp-information-contact-socials' },
        { name: 'dswp-link-with-arrow' },
        { name: 'dswp-post-pattern-horizontal-card-large-img-right' },
        { name: 'dswp-secondary-hero-image-with-title' },
        { name: 'dswp-team-pattern' },
        { name: 'dswp-vertical-cards-with-icon' },
        { name: 'dswp-vertical-cards' },
    ].forEach(({ name }) => {
        test(name, async ({ editor }) => {
            // TODO: There's probably a faster way to add a pattern than this.
            await editor.page.getByRole('button', { name: 'Options', exact: true }).click();
            await editor.page.getByRole('menuitemradio', { name: /Code editor/ }).click();
            await editor.page.getByRole('textbox', { name: 'Type text or HTML' }).fill(`<!-- wp:pattern {"slug":"design-system-wordpress-theme/${name}"} /-->`);
            await editor.page.getByRole('button', { name: 'Exit code editor' }).click();
            const preview = (await editor.openPreviewPage()).locator('.entry-content').first();
            await expect(preview).toHaveScreenshot(SCREENSHOT_OPTIONS);
        });
    });

});