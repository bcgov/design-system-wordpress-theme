# Design System WordPress Theme

![Lifecycle:Experimental](https://img.shields.io/badge/Lifecycle-Experimental-339999)

## Development Setup

```bash
git clone https://github.com/bcgov/design-system-wordpress-theme.git
cd design-system-wordpress-theme
composer install
npm i
npm run start
```

## Build

```bash
npm run build:production
composer checklist
```

## E2E Testing

This project uses Playwright with `@wordpress/e2e-test-utils-playwright` for end-to-end tests that run against a live WordPress environment. Tests are located in `tests/e2e/`.

```bash
npm run wp-env start # Unless already running
npm run test:e2e
```

To run a single test file:

```bash
npm run wp-env start # Unless already running
npx playwright test tests/e2e/copyright-shortcode.spec.ts
```

To step through each test in headed mode for debugging:

```bash
npx playwright test tests/e2e/ --debug
```

## Visual Regression Testing

This project uses Playwright to perform visual regression testing of patterns to help catch unintended changes.

```bash
npm run wp-env start # Unless already running
npm run test:screenshot
```

**Note**: When creating a new pattern it must be added to `tests/screenshot/patterns.spec.js` in order to be included in regression tests.

### Updating Screenshots

The `visual-regression` workflow runs the `update` script and commits changes automatically on pull requests, so it's not necessary to commit any updates made locally to the screenshots, but it can still be useful for local development to see what effects your changes will have.

```bash
npm run wp-env start # Unless already running
npm run test:screenshot:update
```

## Child Themes

