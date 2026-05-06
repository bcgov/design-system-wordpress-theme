import { test, expect } from '@wordpress/e2e-test-utils-playwright';
import type { Page } from '@playwright/test';

const BLOCK_NAME = 'core/cover';
const BLOCK_CLASS = 'wp-block-cover__inner-container';

async function insertHeroImageVariation(page: Page): Promise<void> {
    // Open the block inserter and select Hero Image by its UI label.
    await page.getByRole('button', { name: 'Block Inserter' }).click();
    await page.getByRole('option', { name: 'Hero Image' }).click();
    // Close the inserter so its popover doesn't intercept subsequent clicks.
    await page.getByRole('button', { name: 'Close Block Inserter' }).click();
}

test('test that we can create a Hero Image block with all fields filled', async ({
    admin,
    editor,
    page,
}) => {
    await admin.createNewPost();

    await insertHeroImageVariation(page);

    const block = editor.canvas.locator(`[data-type="${BLOCK_NAME}"]`).first();

    await expect(block).toBeVisible();
    await expect(
        editor.canvas.locator(`.${BLOCK_CLASS}`).first()
    ).toBeVisible();

    // Fill heading field.
    const headingBlock = editor.canvas
        .getByRole('document', { name: 'Block: Heading' })
        .first();
    await expect(headingBlock).toBeVisible();
    await headingBlock.fill('Home Page Title');

    // Fill paragraph field.
    const paragraphBlock = editor.canvas
        .getByLabel('Empty block; start writing or')
        .first();
    await expect(paragraphBlock).toBeVisible();
    await paragraphBlock.fill('Description, under 200 characters');

    // Fill CTA button text field.
    const buttonBlock = editor.canvas
        .getByRole('textbox', { name: 'Button text' })
        .first();
    await expect(buttonBlock).toBeVisible();
    await buttonBlock.fill('Learn More');

    await page.getByRole('button', { name: 'Link' }).first().click();
    await page
        .getByRole('combobox', { name: 'Link' })
        .first()
        .fill('www.test.com');
    await page
        .getByLabel('Editor content')
        .getByRole('button', { name: 'Submit' })
        .click();

    // Assert nested block content.
    await expect(headingBlock).toContainText('Home Page Title');
    await expect(
        editor.canvas.getByLabel('Block: Paragraph').first()
    ).toContainText('Description, under 200 characters');
    await expect(
        editor.canvas.getByRole('textbox', { name: 'Button text' }).first()
    ).toContainText('Learn More');

    // Screenshot: editor canvas (desktop).
    const editorContent = editor.page
        .frameLocator('iframe[name="editor-canvas"]')
        .locator('.editor-styles-wrapper');
    await editorContent.waitFor();
    await editorContent.screenshot({
        animations: 'disabled',
        path: 'tests/screenshot/__snapshots__/hero-image-all-fields-editor.png',
    });

    // Screenshot: frontend (desktop + mobile).
    const previewPageAllFields = await editor.openPreviewPage();
    const frontendAllFields = previewPageAllFields
        .locator('.entry-content')
        .first();
    await frontendAllFields.screenshot({
        animations: 'disabled',
        path: 'tests/screenshot/__snapshots__/hero-image-all-fields-frontend.png',
    });
    await previewPageAllFields.setViewportSize({ width: 390, height: 844 });
    await frontendAllFields.screenshot({
        animations: 'disabled',
        path: 'tests/screenshot/__snapshots__/hero-image-all-fields-frontend-mobile.png',
    });
    await previewPageAllFields.close();
});

test('test that we can create a Hero Image block with only a title', async ({
    admin,
    editor,
    page,
}) => {
    await admin.createNewPost();

    await insertHeroImageVariation(page);

    const block = editor.canvas.locator(`[data-type="${BLOCK_NAME}"]`).first();

    await expect(block).toBeVisible();
    await expect(
        editor.canvas.locator(`.${BLOCK_CLASS}`).first()
    ).toBeVisible();

    // Fill heading field.
    const headingBlock = editor.canvas
        .getByRole('document', { name: 'Block: Heading' })
        .first();
    await expect(headingBlock).toBeVisible();
    await headingBlock.fill('Home Page Title');

    // Assert title-only state.
    await expect(headingBlock).toContainText('Home Page Title');
    await expect(
        editor.canvas.locator('.wp-block-cover p').first()
    ).toBeEmpty();
    await expect(
        editor.canvas.locator('.wp-block-buttons').first()
    ).toBeEmpty();

    // Screenshot: editor canvas (desktop).
    const editorContentTitleOnly = editor.page
        .frameLocator('iframe[name="editor-canvas"]')
        .locator('.editor-styles-wrapper');
    await editorContentTitleOnly.waitFor();
    await editorContentTitleOnly.screenshot({
        animations: 'disabled',
        path: 'tests/screenshot/__snapshots__/hero-image-title-only-editor.png',
    });

    // Screenshot: frontend (desktop + mobile).
    const previewPageTitleOnly = await editor.openPreviewPage();
    const frontendTitleOnly = previewPageTitleOnly
        .locator('.entry-content')
        .first();
    await frontendTitleOnly.screenshot({
        animations: 'disabled',
        path: 'tests/screenshot/__snapshots__/hero-image-title-only-frontend.png',
    });
    await previewPageTitleOnly.setViewportSize({ width: 390, height: 844 });
    await frontendTitleOnly.screenshot({
        animations: 'disabled',
        path: 'tests/screenshot/__snapshots__/hero-image-title-only-frontend-mobile.png',
    });
    await previewPageTitleOnly.close();
});
