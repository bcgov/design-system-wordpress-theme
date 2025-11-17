# Block Pattern Snapshot Testing

This document explains how to run visual regression tests for block patterns using Playwright.

## Overview

Block pattern snapshot tests ensure that the visual appearance of block patterns remains consistent across changes. These tests take screenshots of each pattern when inserted into the WordPress editor and compare them against baseline snapshots.

## Setup

1. **WordPress Test Environment**: You need a WordPress site with the Design System theme activated and the Gutenberg editor available.

2. **Update Test URL**: Modify the URL in `e2e/block-patterns-snapshot.spec.ts` to point to your WordPress admin area:

   ```typescript
   await page.goto('https://your-wordpress-site.com/wp-admin/post-new.php');
   ```

3. **Authentication Setup**:
   - Copy `.env.example` to `.env`
   - Fill in your WordPress admin credentials:

     ```bash
     WP_USERNAME=your-admin-username
     WP_PASSWORD=your-admin-password
     WP_BASE_URL=http://localhost:8000
     ```

   - The test will automatically log in using these credentials

4. **Environment Variables** (Optional): You can also set credentials via environment variables:

   ```bash
   export WP_USERNAME=your-username
   export WP_PASSWORD=your-password
   export WP_BASE_URL=http://localhost:8000
   ```

## Running Tests

### Run all block pattern snapshot tests

```bash
npm run test:e2e:block-patterns
```

### Update baseline snapshots (after intentional visual changes)

```bash
npm run test:e2e:block-patterns:update
```

### Run specific pattern tests

```bash
npx playwright test e2e/block-patterns-snapshot.spec.ts --grep "call to action"
```

### Run in headed mode for debugging

```bash
npm run test:e2e:block-patterns -- --headed
```

## How It Works

1. **Pattern Insertion**: The test navigates to the WordPress editor and inserts each pattern using the block inserter or slash commands.

2. **Screenshot Capture**: After insertion, the test waits for the pattern to render and captures a screenshot.

3. **Visual Comparison**: Playwright compares the new screenshot against the baseline snapshot stored in `e2e/screenshots/`.

4. **Failure Handling**: If visual differences exceed the threshold (10%), the test fails and shows a diff.

## Snapshot Management

- **Baseline snapshots** are stored in `e2e/screenshots/`
- **Failed test screenshots** are saved in `test-results/` for comparison
- Use `--update-snapshots` when you've intentionally changed the visual appearance

## Configuration

The snapshot comparison is configured in `playwright.config.ts`:

```typescript
expect: {
  toHaveScreenshot: {
    threshold: 0.1,        // Allow 10% difference
    maxDiffPixelRatio: 0.01, // Maximum 1% of pixels can differ
  },
},
```

## Troubleshooting

### Pattern Not Found

- Ensure the pattern slug matches exactly what's registered in WordPress
- Check that the theme is activated and patterns are loaded
- Verify the WordPress version supports the patterns

### Authentication Issues

- Verify your credentials in the `.env` file are correct
- Ensure the WordPress user has admin privileges
- Check that the login page URL is accessible
- Confirm the `WP_BASE_URL` points to the correct WordPress installation
- Look for console messages about login success/failure
- Check for CAPTCHAs, two-factor authentication, or custom login plugins
- **Debug login**: Run with `--headed` to see the browser: `npm run test:e2e:block-patterns -- --headed`

### Visual Differences

- Small differences in fonts, spacing, or colors may cause failures
- Adjust the `threshold` value if needed
- Use `--update-snapshots` for intentional changes

### Pattern Insertion Issues

- Check console logs for pattern insertion success/failure
- Look for `debug-pattern-*.png` screenshots for failed patterns
- Verify patterns are registered in WordPress
- Ensure the theme's pattern files are properly loaded
- Check that pattern names match exactly (case-sensitive search)

## Security Notes

- Never commit `.env` files with real credentials to version control
- Use test-specific WordPress accounts with limited privileges
- Consider using a dedicated test WordPress installation
- Rotate credentials regularly for security
