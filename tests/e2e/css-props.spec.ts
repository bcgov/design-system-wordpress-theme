import { test } from '@wordpress/e2e-test-utils-playwright';
import { expect } from '@playwright/test';
import path from 'path';
import fs from 'fs';

test('theme CSS custom properties are defined in built CSS', async ({
    page,
}) => {
    const cssCandidates = [
        path.resolve(__dirname, '../../dist/index.css'),
        path.resolve(__dirname, '../../dist/style.css'),
        path.resolve(__dirname, '../../style.css'),
    ];

    const cssPath = cssCandidates.find((candidatePath) =>
        fs.existsSync(candidatePath)
    );

    // Read the CSS file and inject its contents. Using a file URL with addStyleTag
    // can fail in some environments; injecting content is more reliable.
    if (!cssPath) {
        throw new Error(
            `Built CSS not found. Checked: ${cssCandidates.join(', ')}. Run your build and re-run tests.`
        );
    }

    const cssContent = await fs.promises.readFile(cssPath, 'utf8');
    await page.goto('about:blank');
    await page.addStyleTag({ content: cssContent });

    const propsRequiredInBuiltCss = [
        '--dswp-typography-color-primary',
        '--dswp-surface-color-background-white',
        '--dswp-typography-font-families-bc-sans',
        '--dswp-typography-font-size-body',
        '--dswp-layout-padding-none',
        '--dswp-layout-margin-xlarge',
        '--dswp-typography-color-link',
        '--bcds-surface-color-primary-button-default',
        '--bcds-typography-color-primary',
    ];

    const propsExpectedInWordPressRuntime = [
        '--wp--custom--dswp--typography-color-button-secondary-default',
        '--wp--custom--dswp--surface-color-secondary-button-default',
        '--wp--custom--dswp--typography-color-button-secondary-hover',
        '--wp--custom--dswp--surface-color-secondary-button-hover',
        '--wp--custom--dswp--surface-color-border-dark',
        '--wp--custom--dswp--surface-color-primary-button-hover',
        '--wp--custom--dswp--typography-color-button-primary-default',
        '--wp--custom--dswp--surface-color-primary-button-default',
    ];

    const missingRequired = await page.evaluate((propsList) => {
        const rootStyles = getComputedStyle(document.documentElement);
        return propsList.filter((p) => !rootStyles.getPropertyValue(p).trim());
    }, propsRequiredInBuiltCss);

    const missingWordPressRuntime = await page.evaluate((propsList) => {
        const rootStyles = getComputedStyle(document.documentElement);
        return propsList.filter((p) => !rootStyles.getPropertyValue(p).trim());
    }, propsExpectedInWordPressRuntime);

    if (missingRequired.length) {
        // Print missing to test output for easier debugging
        /* eslint-disable no-console */
        console.warn(
            'Missing required CSS custom properties:',
            missingRequired
        );
    }

    if (
        missingWordPressRuntime.length ===
        propsExpectedInWordPressRuntime.length
    ) {
        // In standalone built CSS checks, WordPress runtime vars are usually absent.
        // They are generated when theme.json is processed by WordPress.
        /* eslint-disable no-console */
        console.info(
            'WordPress runtime custom properties are not present in standalone CSS check (expected).'
        );
    }

    expect(
        missingRequired,
        `Missing required CSS custom properties: ${missingRequired.join(', ')}`
    ).toHaveLength(0);
});

test('WordPress runtime CSS custom properties are defined', async ({
    admin,
}) => {
    await admin.visitAdminPage('site-editor.php');

    const wpRuntimeProperties = [
        '--wp--custom--dswp--typography-color-button-secondary-default',
        '--wp--custom--dswp--surface-color-secondary-button-default',
        '--wp--custom--dswp--typography-color-button-secondary-hover',
        '--wp--custom--dswp--surface-color-secondary-button-hover',
        '--wp--custom--dswp--surface-color-border-dark',
        '--wp--custom--dswp--surface-color-primary-button-hover',
        '--wp--custom--dswp--typography-color-button-primary-default',
        '--wp--custom--dswp--surface-color-primary-button-default',
    ];

    const missingProperties = await admin.page.evaluate((propertyList) => {
        const rootStyles = getComputedStyle(document.documentElement);
        return propertyList.filter(
            (propertyName) => !rootStyles.getPropertyValue(propertyName).trim()
        );
    }, wpRuntimeProperties);

    expect(
        missingProperties,
        `Missing WordPress runtime CSS custom properties: ${missingProperties.join(', ')}`
    ).toHaveLength(0);
});

test('layout wideSize equals 1200px', async ({ admin }) => {
    await admin.visitAdminPage('site-editor.php');
    const value = await admin.page.evaluate(() =>
        getComputedStyle(document.documentElement)
            .getPropertyValue('--dswp-layout-wide-size')
            .trim()
    );
    expect(value).toBe('1200px');
});
