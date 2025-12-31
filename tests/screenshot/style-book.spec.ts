import { test } from '@wordpress/e2e-test-utils-playwright';

test.describe('style book', () => {

    test('all blocks', async ({ admin }) => {
        await admin.visitAdminPage(
            'site-editor.php',
            'p=%2Fstyles&preview=stylebook&section=%2Fblocks'
        );
        const blocks = await admin.page.getByRole('region', { name: 'Styles' })
            .getByRole('listitem');
        const blocksLength = (await blocks.all()).length;
        for (let i = 0; i < blocksLength; i++) {
            const blockItem = await admin.page.getByRole('region', { name: 'Styles' })
                .getByRole('listitem')
                .nth(i);
            const name = await blockItem.textContent() ?? 'unknown';
            await blockItem.click();
            await admin.page.locator('iframe[name="style-book-canvas"]')
                .contentFrame()
                .locator('body')
                .getByRole('gridcell')
                .first()
                .screenshot({
                    path: 'tests/screenshot/__snapshots__/style-book-' + name.trim().replace(/[ /]/g, '-').toLowerCase() + '.png'
                });
            await admin.page.getByRole('button', { name: 'Back', exact: true }).click();
        }
    });

});