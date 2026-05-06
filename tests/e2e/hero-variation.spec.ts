import { test, expect } from '@wordpress/e2e-test-utils-playwright';
import type { Page } from '@playwright/test';

const BLOCK_NAME = 'core/cover';
const BLOCK_CLASS = 'wp-block-cover__inner-container';
const HERO_VARIATION_NAME = 'hero-image';

async function insertHeroImageVariation(
    page: Page,
    baseBlockName: string
): Promise<void> {
    await page.evaluate(
        ({ blockName, variationName }) => {
            const { blocks, data } = window.wp;

            // Read inserter-visible variations for the base block, then pick Hero Image.
            const variation = blocks
                .getBlockVariations(blockName, 'inserter')
                .find((item: { name: string }) => item.name === variationName);

            // Fail fast if theme/plugin registration changed.
            if (!variation) {
                throw new Error(
                    `Could not find ${blockName} variation: ${variationName}`
                );
            }

            type InnerBlockTuple = [
                string,
                Record<string, unknown>,
                InnerBlockTuple[]?,
            ];

            // Convert variation tuple format into real block objects recursively.
            const createInnerBlocks = (
                innerBlocks: InnerBlockTuple[] = []
            ): unknown[] =>
                innerBlocks.map(([name, attributes = {}, nested = []]) =>
                    blocks.createBlock(
                        name,
                        attributes,
                        createInnerBlocks(nested)
                    )
                );

            const block = blocks.createBlock(
                blockName,
                variation.attributes || {},
                createInnerBlocks(variation.innerBlocks || [])
            );

            // Insert hydrated variation block into editor canvas.
            data.dispatch('core/block-editor').insertBlock(block);
        },
        { blockName: baseBlockName, variationName: HERO_VARIATION_NAME }
    );
}

test('test that we can create a Hero Image block with all fields filled', async ({
    admin,
    editor,
    page,
}) => {
    await admin.createNewPost();

    await insertHeroImageVariation(page, BLOCK_NAME);

    const block = editor.canvas.locator(`[data-type="${BLOCK_NAME}"]`).first();

    await expect(block).toBeVisible();
    await expect(
        editor.canvas.locator(`.${BLOCK_CLASS}`).first()
    ).toBeVisible();

    // Fill heading field.
    const headingBlock = editor.canvas
        .getByRole('document', { name: 'Block: Heading' })
        .first();
    await expect(headingBlock).toBeVisible();
    await headingBlock.fill('Home Page Title');

    // Fill paragraph field.
    const paragraphBlock = editor.canvas
        .getByLabel('Empty block; start writing or')
        .first();
    await expect(paragraphBlock).toBeVisible();
    await paragraphBlock.fill('Description, under 200 characters');

    // Fill CTA button text field.
    const buttonBlock = editor.canvas
        .getByRole('textbox', { name: 'Button text' })
        .first();
    await expect(buttonBlock).toBeVisible();
    await buttonBlock.fill('Learn More');

    await page.getByRole('button', { name: 'Link' }).first().click();
    await page
        .getByRole('combobox', { name: 'Link' })
        .first()
        .fill('www.test.com');
    await page
        .getByLabel('Editor content')
        .getByRole('button', { name: 'Submit' })
        .click();

    // Assert nested block content.
    await expect(headingBlock).toContainText('Home Page Title');
    await expect(
        editor.canvas.getByLabel('Block: Paragraph').first()
    ).toContainText(
        'Description, under 200 characters'
    );
    await expect(
        editor.canvas.getByRole('textbox', { name: 'Button text' }).first()
    ).toContainText('Learn More');
});

test('test that we can create a Hero Image block with only a title', async ({
    admin,
    editor,
    page,
}) => {
    await admin.createNewPost();

    await insertHeroImageVariation(page, BLOCK_NAME);

    const block = editor.canvas.locator(`[data-type="${BLOCK_NAME}"]`).first();

    await expect(block).toBeVisible();
    await expect(
        editor.canvas.locator(`.${BLOCK_CLASS}`).first()
    ).toBeVisible();

    // Fill heading field.
    const headingBlock = editor.canvas
        .getByRole('document', { name: 'Block: Heading' })
        .first();
    await expect(headingBlock).toBeVisible();
    await headingBlock.fill('Home Page Title');

    // Assert title-only state.
    await expect(headingBlock).toContainText('Home Page Title');
    await expect(editor.canvas.locator('.wp-block-cover p').first()).toBeEmpty();
    await expect(editor.canvas.locator('.wp-block-buttons').first()).toBeEmpty();
});
