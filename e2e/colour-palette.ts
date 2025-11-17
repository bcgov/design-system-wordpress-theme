import { test, expect } from '@playwright/test';

test('has title', async ({ page }) => {
  await page.goto('https://test.vanity.blog.gov.bc.ca/design-system-e2e-test/colour-palettes/');

  // Expect a title "to contain" a substring.
  await expect(page).toHaveTitle(/Colour palettes/);
});


test('has correct colour Palettes', async ({ page }) => {
  await page.goto('https://test.vanity.blog.gov.bc.ca/design-system-e2e-test/colour-palettes/');

  const colorTests = [
    { text: 'dswp-theme-primary-blue', color: 'rgb(1, 51, 102)' },
    { text: 'dswp-theme-primary-gold', color: 'rgb(252, 186, 25)' },
    { text: 'dswp-typography-color-primary', color: 'rgb(45, 45, 45)' },
    { text: 'dswp-typography-color-secondary', color: 'rgb(71, 69, 67)' },
    { text: 'dswp-surface-color-background-light-gray', color: 'rgb(250, 249, 248)' },
    { text: 'dswp-surface-color-border-default', color: 'rgb(216, 216, 216)' },
  ];

  for (const { text, color } of colorTests) {
    await expect(page.getByText(text)).toBeVisible();
    await expect(page.getByText(text)).toHaveCSS('background-color', color);
  }
});