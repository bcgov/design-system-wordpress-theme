import {defineConfig} from '@playwright/test';
import baseConfig from '@wordpress/scripts/config/playwright.config.js';

const config = defineConfig({
    ...baseConfig,
    // Run Playwright tests under `tests/` but ignore unit tests
    // so Jest-style files in `tests/unit` are not executed by Playwright.
    testDir: 'tests',
    testIgnore: ['**/unit/**'],
});

export default config;