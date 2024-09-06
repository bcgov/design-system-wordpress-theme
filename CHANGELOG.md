# Changelog

## 1.6.1 September 5, 2024

-  [DSWP-26](https://citz-gdx.atlassian.net/browse/DSWP-26) Added page template for "pages"
   [DSWP-17](https://citz-gdx.atlassian.net/browse/DSWP-17) Added cover image for theme(screenshot)

## 1.5.1 September 5, 2024

-  [DSWP-21](https://citz-gdx.atlassian.net/browse/DSWP-19)Fixed bug related to header and footer template parts

## 1.5.0 August 30, 2024

-  [DSWP-19](https://citz-gdx.atlassian.net/browse/DSWP-19)Added mapped design token as defaults for global site styles through theme.json

## 1.4.0 August 29, 2024

-   Implemented new design system into global site editor
-   Added mapped design token options to typography size options

## 1.3.0 August 28, 2024

-   Added design tokens from BC design system for use as variables in sass

## 1.2.0 July 17, 2024

-   Added Header Template Part
-   Added VuePress Site.

## 1.1.0 July 11, 2024

-   [DESCW-2473](https://citz-gdx.atlassian.net/browse/DESCW-2473)
-   Set up package.json for theme, including scripts for building and testing.
-   installed dev dependencies for wordpress scripts, fonts, eslint, and stylelint.
-   Set up composer.json test, coverage, production, and checklist scripts.
-   Tested each composer.json and package.json script to ensure they work properly.
-   Added Folders and absolute minimum boilerplate files needed by these scripts.
-   DEVELOPER NOTE: The `lint:md:docs` script does not have the capability to fix Markdown errors.
-   got the `lint:md:docs` script to ignore the `checklist.md` file, vendor, and node_module directories.
-   added .prettierrc (taken from bcgov-block-theme)
-   made some suggested changes to fix build errors
