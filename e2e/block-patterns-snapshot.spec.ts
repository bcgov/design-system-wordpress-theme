import { test, expect } from '@playwright/test';
import * as fs from 'fs';
import * as path from 'path';
import * as dotenv from 'dotenv';

// Load environment variables from .env file (optional)
dotenv.config();

// Define the patterns to test - these correspond to the PHP files in patterns/
const BLOCK_PATTERNS = [
  'design-system-wordpress-theme/dswp-call-to-action',
  'design-system-wordpress-theme/dswp-hero-image-with-title',
  'design-system-wordpress-theme/dswp-horizontal-card',
  'design-system-wordpress-theme/dswp-vertical-cards',
  'design-system-wordpress-theme/dswp-bullet-list',
  'design-system-wordpress-theme/dswp-card-with-hyperlink-list',
  'design-system-wordpress-theme/dswp-default-heading',
  'design-system-wordpress-theme/dswp-footer-with-territorial-acknowledgement',
  'design-system-wordpress-theme/dswp-h1-with-divider',
  'design-system-wordpress-theme/dswp-heading-with-paragraphs',
  'design-system-wordpress-theme/dswp-horizontal-card-large-img-left',
  'design-system-wordpress-theme/dswp-horizontal-card-large-img-no-shadow',
  'design-system-wordpress-theme/dswp-horizontal-card-large-img-right',
  'design-system-wordpress-theme/dswp-horizontal-card-reverse',
  'design-system-wordpress-theme/dswp-icon-with-excerpt',
  'design-system-wordpress-theme/dswp-image-text-flipped',
  'design-system-wordpress-theme/dswp-image-text',
  'design-system-wordpress-theme/dswp-information-contact-socials',
  'design-system-wordpress-theme/dswp-link-with-arrow',
  'design-system-wordpress-theme/dswp-post-pattern-horizontal-card-large-img-right',
  'design-system-wordpress-theme/dswp-secondary-hero-image-with-title',
  'design-system-wordpress-theme/dswp-team-pattern',
  'design-system-wordpress-theme/dswp-vertical-cards-with-icon',
  // Note: bc-gov-logo-light is likely a media pattern and may not render well in isolation
];

// Helper function to get pattern display name from slug
function getPatternDisplayName(slug: string): string {
  const patternTitles: { [key: string]: string } = {
    'design-system-wordpress-theme/dswp-bullet-list': 'DSWP Bullet List',
    'design-system-wordpress-theme/dswp-call-to-action': 'DSWP Call to Action',
    'design-system-wordpress-theme/dswp-hero-image-with-title': 'DSWP Hero Image With Title',
    'design-system-wordpress-theme/dswp-horizontal-card': 'DSWP Horizontal Card',
    'design-system-wordpress-theme/dswp-vertical-cards': 'DSWP Vertical Cards',
    'design-system-wordpress-theme/dswp-card-with-hyperlink-list': 'DSWP Card with Hyperlink List',
    'design-system-wordpress-theme/dswp-default-heading': 'DSWP Default Heading',
    'design-system-wordpress-theme/dswp-footer-with-territorial-acknowledgement': 'DSWP Footer With Territorial Acknowledgement',
    'design-system-wordpress-theme/dswp-h1-with-divider': 'DSWP H1 with Divider',
    'design-system-wordpress-theme/dswp-heading-with-paragraphs': 'DSWP Heading with Paragraph(s)',
    'design-system-wordpress-theme/dswp-horizontal-card-large-img-left': 'DSWP Horizontal Card Large Img - Left',
    'design-system-wordpress-theme/dswp-horizontal-card-large-img-no-shadow': 'DSWP Horizontal Card No Shadow',
    'design-system-wordpress-theme/dswp-horizontal-card-large-img-right': 'DSWP Horizontal Card Large Img - Right',
    'design-system-wordpress-theme/dswp-horizontal-card-reverse': 'DSWP Horizontal Card Reversed',
    'design-system-wordpress-theme/dswp-icon-with-excerpt': 'DSWP Icon with Excerpt',
    'design-system-wordpress-theme/dswp-image-text-flipped': 'DSWP Image & Text Flipped',
    'design-system-wordpress-theme/dswp-image-text': 'DSWP Image & Text',
    'design-system-wordpress-theme/dswp-information-contact-socials': 'DSWP Information Contact Socials',
    'design-system-wordpress-theme/dswp-link-with-arrow': 'DSWP Link With Arrow',
    'design-system-wordpress-theme/dswp-post-pattern-horizontal-card-large-img-right': 'dswp-post-pattern-horizontal-card-large-img-right',
    'design-system-wordpress-theme/dswp-secondary-hero-image-with-title': 'DSWP Secondary Hero Image With Title',
    'design-system-wordpress-theme/dswp-team-pattern': 'DSWP Team Pattern',
    'design-system-wordpress-theme/dswp-vertical-cards-with-icon': 'DSWP Vertical Cards With Icon',
  };

  return patternTitles[slug] || slug.replace('design-system-wordpress-theme/', '').replace(/-/g, ' ');
}

// Helper function to sanitize filename
function sanitizeFilename(name: string): string {
  return name.replace(/[^a-z0-9]/gi, '_').toLowerCase();
}

test.describe('Block Pattern Snapshots', () => {
  test.beforeEach(async ({ page }) => {
    const baseUrl = process.env.WP_BASE_URL || 'https://localhost/e2edesignsystemtheme';

    // First, try to access admin directly to check if already logged in
    await page.goto(`${baseUrl}/wp-admin/`);

    // Check if we're already logged in (look for admin bar or dashboard elements)
    const isLoggedIn = await page.locator('#wpadminbar, #dashboard-widgets').isVisible().catch(() => false);

    if (!isLoggedIn) {
      console.log('🔐 Not logged in, redirecting to login page...');

      // Go to login page if not logged in
      await page.goto(`${baseUrl}/wp-login.php`);

      console.log('🔐 Attempting to log in...');

      // Fill in login credentials
      await page.fill('#user_login', process.env.WP_USERNAME || 'admin');
      await page.fill('#user_pass', process.env.WP_PASSWORD || 'password');

      // Submit the login form
      await page.click('#wp-submit');

      // Wait for either successful login or error
      try {
        await page.waitForURL('**/wp-admin/**', { timeout: 15000 });
        console.log('✅ Login successful');
      } catch (error) {
        // Check if we're still on login page (login failed)
        if (page.url().includes('wp-login.php')) {
          // Look for error messages
          const errorMsg = await page.locator('#login_error').textContent();
          if (errorMsg) {
            throw new Error(`Login failed: ${errorMsg}`);
          } else {
            throw new Error('Login failed: No error message found. Check credentials.');
          }
        } else {
          // We redirected somewhere else, check if it's admin
          if (!page.url().includes('wp-admin')) {
            console.log(`⚠️  Redirected to: ${page.url()}`);
            throw new Error(`Login redirect failed. Current URL: ${page.url()}`);
          }
        }
      }
    } else {
      console.log('✅ Already logged in');
    }

    // Ensure we're on the post editor page
    if (!page.url().includes('post-new.php')) {
      await page.goto(`${baseUrl}/wp-admin/post-new.php`);
    }

    // Wait for the network to be idle (ensures React has finished loading)
    //await page.waitForLoadState('networkidle');

    // Wait for Gutenberg editor to be ready - try multiple selectors
    console.log('⏳ Waiting for editor to load...');

    // Check for common Gutenberg editor selectors
    const editorSelectors = [
      '.editor-editor-interface', // Current Gutenberg editor interface
      '.edit-post-layout',         // Gutenberg layout container
      '.interface-interface-skeleton', // Interface skeleton
      '.block-editor-block-list__layout', // Block list layout (older)
      '.wp-block-post-content', // Classic content area
      '.editor-post-content',   // Gutenberg content area
      '.wp-block',              // Any block
      '[data-type="core/paragraph"]' // Default paragraph block
    ];

    let editorReady = false;
    for (const selector of editorSelectors) {
      try {
        await page.waitForSelector(selector, { timeout: 5000 });
        console.log(`✅ Found editor element: ${selector}`);
        editorReady = true;
        break;
      } catch (error) {
        console.log(`❌ Editor selector not found: ${selector}`);
      }
    }

    if (!editorReady) {
      // Take a screenshot for debugging
      await page.screenshot({ path: 'debug-editor-load.png' });
      console.log('📸 Screenshot saved as debug-editor-load.png for debugging');

      // Log some page info
      const title = await page.title();
      const url = page.url();
      console.log(`📄 Page title: ${title}`);
      console.log(`🔗 Current URL: ${url}`);

      // Check for JavaScript errors
      const errors = [];
      page.on('pageerror', error => errors.push(error.message));

      // Log page content for debugging
      const bodyText = await page.locator('body').textContent();
      console.log(`📝 Page body text (first 500 chars): ${bodyText?.substring(0, 500)}...`);

      // Check for specific editor-related elements
      const hasEditorContainer = await page.locator('#editor').isVisible().catch(() => false);
      console.log(`🗂️  Has #editor: ${hasEditorContainer}`);

      if (hasEditorContainer) {
        const editorHTML = await page.locator('#editor').innerHTML();
        console.log(`📄 #editor content (first 200 chars): ${editorHTML?.substring(0, 200)}...`);
      }

      const hasWpContent = await page.locator('#wp-content-editor-container').isVisible().catch(() => false);
      console.log(`📝 Has #wp-content-editor-container: ${hasWpContent}`);

      const hasClassicEditor = await page.locator('#wp-content-wrap').isVisible().catch(() => false);
      console.log(`📝 Has #wp-content-wrap (classic): ${hasClassicEditor}`);

      // Check if we're in classic editor mode
      const classicEditorLink = await page.locator('a[href*="classic-editor"]').isVisible().catch(() => false);
      console.log(`🔗 Has classic editor link: ${classicEditorLink}`);

      // Check for Gutenberg-specific elements
      const hasBlockEditor = await page.locator('.block-editor').isVisible().catch(() => false);
      console.log(`🧱 Has .block-editor: ${hasBlockEditor}`);

      const hasEditPost = await page.locator('.edit-post-layout').isVisible().catch(() => false);
      console.log(`📝 Has .edit-post-layout: ${hasEditPost}`);

      throw new Error(`Editor failed to load. Check debug-editor-load.png. Page: ${title} at ${url}`);
    }

    // Clear any default content
    await page.keyboard.press('Control+a');
    await page.keyboard.press('Delete');

    console.log('✅ Editor ready for testing');

  });


  for (const patternSlug of BLOCK_PATTERNS) {
    test(`snapshot - ${getPatternDisplayName(patternSlug)}`, async ({ page }) => {
      const patternName = getPatternDisplayName(patternSlug);
      console.log(`🎨 Testing pattern: ${patternName}`);

      // Clear any existing content first
      await page.keyboard.press('Control+a');
      await page.keyboard.press('Delete');

      // Use block inserter with search approach
      console.log(`� Using block inserter search for: ${patternName}`);

      // Try to find and click the block inserter toggle button
      const inserterButtons = [
        'button[aria-label*="Block Inserter"]',
        'button[aria-label*="Add block"]',
        'button[aria-label*="Toggle block inserter"]',
        '.edit-post-header-toolbar__inserter-toggle',
        '.block-editor-inserter__toggle',
        'button:has-text("Add")',
        '.editor-editor-interface .block-editor-inserter__toggle',
        '.edit-post-layout .block-editor-inserter__toggle',
        'button[data-testid*="inserter"]'
      ];

      let inserterOpened = false;
      for (const buttonSelector of inserterButtons) {
        try {
          console.log(`🔍 Trying inserter button: ${buttonSelector}`);
          await page.waitForSelector(buttonSelector, { timeout: 2000 });
          await page.click(buttonSelector);
          console.log(`✅ Clicked inserter button: ${buttonSelector}`);
          inserterOpened = true;
          break;
        } catch (error) {
          console.log(`❌ Inserter button not found: ${buttonSelector}`);
        }
      }

      if (!inserterOpened) {
        throw new Error(`Could not find or click any inserter button for pattern: ${patternName}`);
      }

      // Wait for the inserter panel to open
      await page.waitForTimeout(1000);

      // Search for "DSWP" to show all design system patterns
      console.log('🔍 Searching for DSWP patterns...');
      const searchInputs = [
        'input[placeholder*="Search"]',
        'input[aria-label*="Search"]',
        '.block-editor-inserter__search input',
        'input[type="search"]'
      ];

      let searchFound = false;
      for (const searchSelector of searchInputs) {
        try {
          await page.waitForSelector(searchSelector, { timeout: 2000 });
          await page.fill(searchSelector, 'DSWP');
          console.log(`✅ Found and filled search field: ${searchSelector}`);
          searchFound = true;
          break;
        } catch (error) {
          console.log(`❌ Search field not found: ${searchSelector}`);
        }
      }

      if (!searchFound) {
        throw new Error('Could not find search field in block inserter');
      }

      // Wait for search results to appear
      await page.waitForTimeout(2000);

      // Try to find and click the specific pattern
      console.log(`🔍 Looking for pattern: ${patternName}`);
      const patternSelectors = [
        `button:has-text("${patternName}")`,
        `[aria-label*="${patternName}"]`,
        `.block-editor-block-types-list__item:has-text("${patternName}")`,
        `.block-editor-inserter__patterns-list button:has-text("${patternName}")`,
        `.components-panel__body button:has-text("${patternName}")`
      ];

      let patternInserted = false;
      for (const patternSelector of patternSelectors) {
        try {
          const patternElement = page.locator(patternSelector).first();

          // Check if element exists
          const count = await patternElement.count();
          if (count > 0) {
            // Scroll into view if needed
            await patternElement.scrollIntoViewIfNeeded();
            await page.waitForTimeout(500);

            // Click the pattern
            await patternElement.click();
            console.log(`✅ Inserted pattern: ${patternName}`);
            patternInserted = true;
            break;
          } else {
            console.log(`❌ Pattern not found with selector: ${patternSelector}`);
          }
        } catch (error) {
          console.log(`❌ Pattern not found with selector: ${patternSelector}`);
        }
      }

      if (!patternInserted) {
        throw new Error(`Could not insert pattern: ${patternName}`);
      }

      // Wait for the pattern to render completely
      await page.waitForTimeout(3000);

      // Ensure the pattern is visible in the editor
      const editorContent = page.locator('.editor-editor-interface, .edit-post-layout, .wp-block-post-content, .editor-post-content, .block-editor-block-list__layout').first();
      await expect(editorContent).toBeVisible();

      // Take a screenshot of the pattern
      const patternContainer = page.locator('.editor-editor-interface, .edit-post-layout, .wp-block-post-content, .editor-post-content, .block-editor-block-list__layout').first();
      await expect(patternContainer).toHaveScreenshot(
        `block-pattern-${sanitizeFilename(getPatternDisplayName(patternSlug))}.png`,
        {
          threshold: 0.1, // Allow for small visual differences
        }
      );

      console.log(`📸 Screenshot captured for: ${patternName}`);
    });
  }
});