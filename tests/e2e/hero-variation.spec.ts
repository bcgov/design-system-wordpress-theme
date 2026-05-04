import { test, expect } from '@playwright/test';

// 'Happy Path' test for the Hero Image (16:9) block variation.
test('test that we can create a Hero Image block with all fields filled', async ({ page }) => {
  await page.goto('http://localhost:8889/');
  await page.getByRole('menuitem', { name: ' Edit Page' }).click();
  await page.getByRole('button', { name: 'Block Inserter' }).click();
  await page.getByRole('option', { name: ' Hero Image (16:9)' }).click();
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('document', { name: 'Block: Heading' }).first().click();
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('document', { name: 'Block: Heading' }).first().fill('Home Page Title');
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('document', { name: 'Block: Cover' }).getByLabel('Empty block; start writing or').first().click();
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('document', { name: 'Block: Cover' }).getByLabel('Empty block; start writing or').fill('Description, under 200 characters');
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('textbox', { name: 'Button text' }).first().click();
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('textbox', { name: 'Button text' }).first().fill('Learn More');
  await page.getByRole('button', { name: 'Link' }).first().click();
  await page.getByRole('combobox', { name: 'Link' }).first().fill('www.test.com');
  await page.getByLabel('Editor content').getByRole('button', { name: 'Submit' }).click();
  await page.getByRole('button', { name: 'Save', exact: true }).click();
  await page.getByTestId('snackbar').getByRole('link', { name: 'View Page' }).click();
  await page.getByRole('heading', { name: 'Home Page Title' }).click();
  await expect(page.getByRole('heading', { name: 'Home Page Title' })).toBeVisible();
  await expect(page.getByText('Description, under 200').first()).toBeVisible();
  await expect(page.getByRole('link', { name: 'Learn More' })).toBeVisible();
  await expect(page.locator('#main-content')).toMatchAriaSnapshot(`
    - heading "Home Page Title" [level=1]
    - paragraph: /Description, under \\d+ characters/
    - link "Learn More":
      - /url: http://www.test.com
    `);
});

// This test verifies that the Hero Image block can be created with only a title, and that the description and action button are optional.
test('test that we can create a Hero Image block with only a title', async ({ page }) => {
  await page.goto('http://localhost:8889/');
  await page.getByRole('menuitem', { name: ' Edit Page' }).click();
  await page.getByRole('button', { name: 'Block Inserter' }).click();
  await page.getByRole('option', { name: ' Hero Image (16:9)' }).click();
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('document', { name: 'Block: Heading' }).first().click();
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('document', { name: 'Block: Heading' }).first().fill('No Description or Action Button');
  await page.getByRole('button', { name: 'Save', exact: true }).click();
  await page.getByTestId('snackbar').getByRole('link', { name: 'View Page' }).click();
  await page.getByRole('heading', { name: 'No Description or Action Button' }).click();
  await expect(page.getByRole('heading', { name: 'No Description or Action Button' })).toBeVisible();
  await expect(page.locator('.wp-block-cover p').first()).toBeEmpty();
  await expect(page.locator('.wp-block-buttons').first()).toBeEmpty();
  await expect(page.locator('#main-content')).toMatchAriaSnapshot(`
    - heading "No Description or Action Button" [level=1]
    `);
});


