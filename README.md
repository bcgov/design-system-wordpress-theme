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

## End-to-End (E2E) Testing

This project uses Playwright for end-to-end testing, which includes theme functionality and configuration validation.

### Run all E2E tests

```bash
npm run wp-env start # Unless already running
npm run test:e2e
```

### Available E2E tests

#### CSS Custom Properties Tests (`tests/e2e/css-props.spec.ts`)

Validates that theme CSS custom properties are properly defined in both standalone built CSS and WordPress runtime contexts, plus validates layout sizing properties.

**Checks:**

1. **Standalone built CSS**: Verifies that theme-level custom properties (e.g., `--dswp-*` and `--bcds-*`) are present in the compiled CSS output from your build.
2. **WordPress runtime**: Verifies that WordPress-generated custom properties (e.g., `--wp--custom--dswp--*` from `theme.json`) are available when the site editor is loaded.
3. **Layout wide size**: Verifies that the `--dswp-layout-wide-size` custom property is set to `1200px` in the site editor runtime.

**Run individually:**

```bash
npm run wp-env start # Unless already running
npx playwright test tests/e2e/css-props.spec.ts
```

If a check fails, the test output will list the missing properties or incorrect values, indicating a potential mismatch between `theme.json` definitions and the compiled CSS or WordPress runtime state.

#### Hero Image Block Tests (`tests/e2e/hero-variation.spec.ts`)

Validates that the Hero Image block (cover block with inner content) renders correctly with various field combinations, including all-fields-filled and title-only variations, with visual regression snapshots for desktop and mobile viewports.

**Run individually:**

```bash
npm run wp-env start # Unless already running
npx playwright test tests/e2e/hero-variation.spec.ts
```

## Child Themes

### Template Part Override Guidelines

To ensure child themes can properly override template parts, parent theme template-part blocks **must not** include a `theme` attribute. Including the `theme` attribute prevents child themes from overwriting the template part.

**Incorrect (prevents child theme overrides):**

```html
<!-- wp:template-part {"slug":"breadcrumb","align":"full","theme":"design-system-wordpress-theme"} /-->
```

**Correct (allows child theme overrides):**

```html
<!-- wp:template-part {"slug":"breadcrumb","align":"full"} /-->
```

Run `npm run lint:template-parts` to validate locally. This check also runs automatically on pull requests as part of the linting workflow.

