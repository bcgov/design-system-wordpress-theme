import {
    test,
    expect,
    type Editor,
} from '@wordpress/e2e-test-utils-playwright';

const SLUG = 'hero-image';
const SELECTORS = {
    heading: '.wp-block-heading[contenteditable="true"]',
    description: '.wp-block-paragraph[contenteditable="true"]',
    button: '.wp-block-button__link[contenteditable="true"]',
    coverParagraph: '.wp-block-cover p',
    buttons: '.wp-block-buttons',
};

const UI_LABELS = {
    blockInserter: /Block Inserter/i,
    linkButton: 'Link',
    editorContentLabel: 'Editor content',
};

function isNotFoundError(error: unknown): boolean {
    return error instanceof Error && /404|not found/i.test(error.message);
}

async function configureHeroImage(
    editor: Editor,
    opts: {
        title: string;
        description?: string;
        buttonText?: string;
        link?: string;
    }
) {
    const [heading, descriptionField, buttonTextField] = [
        SELECTORS.heading,
        SELECTORS.description,
        SELECTORS.button,
    ].map((s) => editor.canvas.locator(s).first());

    await editor.page
        .getByRole('button', { name: UI_LABELS.blockInserter })
        .click();
    await editor.page.getByRole('option', { name: /Hero Image/i }).click();
    await editor.page.keyboard.press('Escape');

    await heading.fill(opts.title);
    if (opts.description !== undefined) {
        await descriptionField.fill(opts.description);
    }
    if (opts.buttonText !== undefined) {
        await buttonTextField.fill(opts.buttonText);
    }

    if (opts.link) {
        await editor.page
            .getByRole('button', { name: UI_LABELS.linkButton })
            .first()
            .click();
        await editor.page
            .getByRole('combobox', { name: UI_LABELS.linkButton })
            .first()
            .fill(opts.link);
        await editor.page
            .getByLabel(UI_LABELS.editorContentLabel)
            .getByRole('button', { name: 'Submit' })
            .click();
    }

    return editor.canvas;
}

test.describe('Hero Image block variation', () => {
    test.beforeEach(async ({ admin, requestUtils, editor }) => {
        let templateParts: { id: number; slug: string }[] = [];

        try {
            templateParts = await requestUtils.rest<
                { id: number; slug: string }[]
            >({
                path: `/wp/v2/template-parts?slug=${SLUG}&context=edit&_fields=id,slug,content`,
            });
        } catch (error) {
            if (!isNotFoundError(error)) {
                throw error;
            }

            // Fallback for environments where wp_template_part uses its CPT rest base.
            templateParts = await requestUtils.rest<
                { id: number; slug: string }[]
            >({
                path: `/wp/v2/wp_template_part?slug=${SLUG}&context=edit&_fields=id,slug,content`,
            });
        }

        const heroImageTemplatePart = templateParts.find(
            (t) => t.slug === SLUG
        );

        if (!heroImageTemplatePart) {
            throw new Error(
                `Template part "${SLUG}" not found. Ensure the theme is active and the template part exists.`
            );
        }

        await admin.visitSiteEditor({
            postId: heroImageTemplatePart.id,
            postType: 'wp_template_part',
            canvas: 'edit',
        });

        await editor.setContent('');
    });

    test('renders heading, description, and button with link when all fields are filled', async ({
        admin,
    }) => {
        const editor = admin.editor;
        const frame = await configureHeroImage(editor, {
            title: 'Home Page Title',
            description: 'Description, under 200 characters',
            buttonText: 'Learn More',
            link: 'www.test.com',
        });

        await expect(frame.getByText('Home Page Title')).toBeVisible();
        await expect(
            frame.getByText('Description, under 200 characters')
        ).toBeVisible();

        const edited = await editor.getEditedPostContent();
        await expect(edited).toContain('>Learn More<');
        await expect(edited).toContain('href="http://www.test.com"');
    });

    test('renders only the title when description and button are empty', async ({
        admin,
    }) => {
        const editor = admin.editor;
        const frame = await configureHeroImage(editor, {
            title: 'No Description or Action Button',
            description: '',
            buttonText: '',
        });

        await expect(
            frame.getByText('No Description or Action Button')
        ).toBeVisible();
        await expect(
            frame.locator(SELECTORS.coverParagraph).first()
        ).toBeEmpty();
        await expect(frame.locator(SELECTORS.buttons).first()).toBeEmpty();
        await expect(frame.locator(SELECTORS.button).first()).toBeEmpty();
    });
});
