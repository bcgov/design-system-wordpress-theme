# Changelog

## 1.1.0 July 10, 2024

-   [DESCW-2473](https://citz-gdx.atlassian.net/browse/DESCW-2473)
-   Set up package.json for theme, including scripts for building and testing.
-   installed dev dependencies for wordpress scripts, fonts, eslint, and stylelint.
-   Set up composer.json test, coverage, production, and checklist scripts.
-   Tested each composer.json and package.json script to ensure they work properly.
-   Added Folders and absolute minimum boilerplate files needed by these scripts.
-   DEVELOPER NOTE: The `lint:md:docs` script does not have the capability to fix Markdown errors.
-   got the `lint:md:docs` script to ignore the `checklist.md` file, vendor, and node_module directories.
-   added .prettierrc (taken from bcgov-block-theme)
