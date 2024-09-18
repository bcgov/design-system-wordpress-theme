# Changelog

## 1.0.0 September 17, 2024

-  Launch of version 1.0.0
-  [DWSP-35](https://citz-gdx.atlassian.net/browse/DSWP-35) Make page templates and template parts more reusable.

## 0.7.2 September 17, 2024

-  [DWSP-34](https://citz-gdx.atlassian.net/browse/DSWP-34) Fix block gap and navigation overrides. Fixed template layout and structure.

## 0.7.1 September 13, 2024

-  [DWSP-32](https://citz-gdx.atlassian.net/browse/DSWP-32) Added new patterns for image and text - image and text flipped

## 0.6.1 September 5, 2024

-  [DSWP-26](https://citz-gdx.atlassian.net/browse/DSWP-26) Added page template for "pages"
   [DSWP-17](https://citz-gdx.atlassian.net/browse/DSWP-17) Added cover image for theme(screenshot)

## 0.5.1 September 5, 2024

-  [DSWP-21](https://citz-gdx.atlassian.net/browse/DSWP-19)Fixed bug related to header and footer template parts

## 0.5.0 August 30, 2024

-  [DSWP-19](https://citz-gdx.atlassian.net/browse/DSWP-19)Added mapped design token as defaults for global site styles through theme.json

## 0.4.0 August 29, 2024

-   Implemented new design system into global site editor
-   Added mapped design token options to typography size options

## 0.3.0 August 28, 2024

-   Added design tokens from BC design system for use as variables in sass

## 0.2.0 July 17, 2024

-   Added Header Template Part
-   Added VuePress Site.

## 0.1.0 July 11, 2024

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
