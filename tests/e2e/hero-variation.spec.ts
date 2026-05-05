import { test, expect } from '@wordpress/e2e-test-utils-playwright';

test.describe('Hero Image block variation', () => {
    // Use the admin fixture to create a new post before each test
    test.beforeEach(async ({ admin }) => {
        await admin.createNewPost();
    });

    test('test that we can create a Hero Image block with all fields filled', async ({
        page,
    }) => {
        // The editor is already open on a new post!
        await page.getByRole('button', { name: 'Block Inserter' }).click();
        await page.getByRole('option', { name: ' Hero Image' }).click();
        const frame = await page.frameLocator('iframe[name="editor-canvas"]');
        await frame
            .getByRole('document', { name: 'Block: Heading' })
            .first()
            .click();
        await frame
            .getByRole('document', { name: 'Block: Heading' })
            .first()
            .fill('Home Page Title');
        await frame
            .getByRole('document', { name: 'Block: Cover' })
            .getByLabel('Empty block; start writing or')
            .first()
            .click();
        await frame
            .getByRole('document', { name: 'Block: Cover' })
            .getByLabel('Empty block; start writing or')
            .first()
            .fill('Description, under 200 characters');
        await frame
            .getByRole('textbox', { name: 'Button text' })
            .first()
            .click();
        await frame
            .getByRole('textbox', { name: 'Button text' })
            .first()
            .fill('Learn More');
        await page.getByRole('button', { name: 'Link' }).first().click();
        await page
            .getByRole('combobox', { name: 'Link' })
            .first()
            .fill('www.test.com');
        await page
            .getByLabel('Editor content')
            .getByRole('button', { name: 'Submit' })
            .click();

        // Open the publish panel
        await page
            .getByRole('button', { name: 'Publish', exact: true })
            .first()
            .click();

        // Wait for the confirmation button to appear and click it
        await page
            .getByRole('button', { name: 'Publish', exact: true })
            .nth(1)
            .waitFor();
        await page
            .getByRole('button', { name: 'Publish', exact: true })
            .nth(1)
            .click();

        // Get the "View Post" link (appears after publishing)
        const snackbar = page.getByTestId('snackbar');
        const viewPostLink = snackbar.getByRole('link', { name: /View Post/ });
        const postUrl = await viewPostLink.getAttribute('href');

        // Visit the front-end
        await page.goto(postUrl!);

        // Assert that the title, description, and button are visible and that the link is correct
        await expect(
            page.getByRole('heading', { name: 'Home Page Title' })
        ).toBeVisible();
        await expect(
            page.getByText('Description, under 200').first()
        ).toBeVisible();
        await expect(
            page.getByRole('link', { name: 'Learn More' })
        ).toBeVisible();
    });

    test('test that we can create a Hero Image block with only a title', async ({
        page,
    }) => {
        await page.getByRole('button', { name: 'Block Inserter' }).click();
        await page.getByRole('option', { name: ' Hero Image' }).click();
        const frame = await page.frameLocator('iframe[name="editor-canvas"]');
        await frame
            .getByRole('document', { name: 'Block: Heading' })
            .first()
            .click();
        await frame
            .getByRole('document', { name: 'Block: Heading' })
            .first()
            .fill('No Description or Action Button');

        // Open the publish panel
        await page
            .getByRole('button', { name: 'Publish', exact: true })
            .first()
            .click();

        // Wait for the confirmation button to appear and click it
        await page
            .getByRole('button', { name: 'Publish', exact: true })
            .nth(1)
            .waitFor();
        await page
            .getByRole('button', { name: 'Publish', exact: true })
            .nth(1)
            .click();

        // Get the "View Post" link (appears after publishing)
        const snackbar = page.getByTestId('snackbar');
        const viewPostLink = snackbar.getByRole('link', { name: /View Post/ });
        const postUrl = await viewPostLink.getAttribute('href');

        // Visit the front-end
        await page.goto(postUrl!);

        // Assert that the title is visible and that the description and button are not rendered
        await expect(
            page.getByRole('heading', {
                name: 'No Description or Action Button',
            })
        ).toBeVisible();
        await expect(page.locator('.wp-block-cover p').first()).toBeEmpty();
        await expect(page.locator('.wp-block-buttons').first()).toBeEmpty();
    });
});
