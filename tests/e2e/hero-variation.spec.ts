import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
  await page.goto('http://localhost:8889/');
  await page.getByRole('menuitem', { name: ' Edit Page' }).click();
  await page.getByRole('button', { name: 'Block Inserter' }).click();
  await page.getByRole('option', { name: ' Hero Image (16:9)' }).click();
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('document', { name: 'Block: Heading' }).first().click();
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('document', { name: 'Block: Heading' }).first().fill('Home Page Title');
  await page.locator('iframe[name="editor-canvas"]').contentFrame().getByRole('document', { name: 'Block: Cover' }).getByLabel('Empty block; start writing or').click();
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