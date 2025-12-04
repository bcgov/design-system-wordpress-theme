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
Screenshots should be updated when intentional changes are made to patterns so the above tests can run against the latest versions of the patterns.

```bash
npm run wp-env start # Unless already running
npm run test:screenshot:update
```

## Child Themes 

### Super Intendent's Office <https://github.com/bcgov/design-system-wordpress-child-theme-superintendent>
