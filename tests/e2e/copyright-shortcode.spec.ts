import { test, expect } from '@wordpress/e2e-test-utils-playwright';

/**
 * Verifies that the [current_year] shortcode in parts/copyright.html is
 * expanded to the actual year when rendered on the frontend.
 *
 * The copyright template part contains:
 *   © [current_year] Government of British Columbia.
 *
 * Without the render_block filter (or equivalent), [current_year] would
 * appear as a literal string instead of the resolved year.
 */
test('copyright template part renders current year on frontend', async ({
    admin,
    editor,
}) => {
    const currentYear = new Date().getFullYear().toString();

    // Create a post that embeds the copyright template part so we can
    // preview it on the frontend without needing the full footer layout.
    await admin.createNewPost();

    // Insert the copyright template part block via the code editor.
    await editor.page
        .getByRole('button', { name: 'Options', exact: true })
        .click();
    await editor.page
        .getByRole('menuitemradio', { name: /Code editor/ })
        .click();
    await editor.page
        .getByRole('textbox', { name: 'Type text or HTML' })
        .fill(
            '<!-- wp:template-part {"slug":"copyright","theme":"design-system-wordpress-theme"} /-->'
        );
    await editor.page.getByRole('button', { name: 'Exit code editor' }).click();

    // Open the frontend preview.
    const previewPage = await editor.openPreviewPage();

    // The shortcode must be expanded — not the literal placeholder.
    await expect(previewPage.locator('body')).not.toContainText(
        '[current_year]'
    );

    // The resolved year must appear in the copyright notice.
    await expect(previewPage.locator('body')).toContainText(
        `© ${currentYear} Government of British Columbia.`
    );

    await previewPage.close();
});
