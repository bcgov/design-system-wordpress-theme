import {defineConfig} from '@playwright/test';
import baseConfig from '@wordpress/scripts/config/playwright.config.js';

const config = defineConfig({
    ...baseConfig,
    testDir: 'tests',
    testIgnore: ['unit/**'],
});

export default config;