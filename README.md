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

### Local Development with wp-env

This project uses wp-env to provide a local WordPress development environment.

```bash
npm run wp-env start
```

This will start a local WordPress site at <http://localhost:8888> with the theme activated and a static homepage configured.

On startup, wp-env also bootstraps both the `cli` and `tests-cli` environments so local development and screenshot tests use the same deterministic WordPress settings.

You can access the WordPress admin at <http://localhost:8888/wp-admin>.

To stop the environment:

```bash
npm run wp-env stop
```

Make changes to theme files and see them reflected in the local site. The bootstrap step applies consistent rewrite rules, timezone settings, and a static home page across both wp-env CLI environments.

## Build

```bash
npm run build:production
composer checklist
```

## Visual Regression Testing

This project uses Playwright to perform visual regression testing of patterns and templates to help catch unintended changes.

```bash
npm run wp-env start # Unless already running
npm run test:screenshot
```

**Note**: When creating a new pattern it must be added to `tests/screenshot/patterns.spec.js` in order to be included in regression tests. Template tests are in `tests/screenshot/templates.spec.js`.

### Updating Screenshots

The `visual-regression` workflow runs the `update` script and commits changes automatically on pull requests, so it's not necessary to commit any updates made locally to the screenshots, but it can still be useful for local development to see what effects your changes will have.

```bash
npm run wp-env start # Unless already running
npm run test:screenshot:update
```

## Child Themes

