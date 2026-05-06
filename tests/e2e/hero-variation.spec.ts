import {
    test,
    expect,
    type Editor,
} from '@wordpress/e2e-test-utils-playwright';

const SLUG = 'hero-image';

async function configureHeroImage(
    editor: Editor,
    opts: {
        title: string;
        description?: string;
        buttonText?: string;
    }
) {
    const frame = editor.page.frameLocator('iframe[name="editor-canvas"]');

    // Insert the Hero Image block
    await editor.insertBlock({
        name: 'design-system-wordpress-plugin/hero-image',
    });

    // Fill heading
    await frame
        .getByRole('document', { name: 'Block: Heading' })
        .first()
        .fill(opts.title);

    // Fill description if provided
    if (opts.description) {
        await frame
            .getByRole('document', { name: 'Block: Cover' })
            .getByLabel('Empty block; start writing or')
            .first()
            .fill(opts.description);
    }

    // Fill button text if provided
    if (opts.buttonText) {
        await frame
            .getByRole('textbox', { name: 'Button text' })
            .first()
            .fill(opts.buttonText);
    }

    return frame;
}

test.describe('Hero Image block variation', () => {
    const headingContent = (
        frame: ReturnType<Editor['page']['frameLocator']>
    ) =>
        frame.locator(
            'h1.wp-block-heading, h1.block-editor-rich-text__editable'
        );

    const paragraphContent = (
        frame: ReturnType<Editor['page']['frameLocator']>
    ) =>
        frame.locator(
            'p.wp-block-paragraph, p.block-editor-rich-text__editable'
        );

    const buttonContent = (frame: ReturnType<Editor['page']['frameLocator']>) =>
        frame.locator('.wp-block-button__link');

    test.beforeEach(async ({ admin, editor }) => {
        // Navigate directly to the hero-image template part in the site editor
        const templatePartPath = `/wp_template_part/${SLUG}`;
        await admin.visitAdminPage(
            'site-editor.php',
            `path=${encodeURIComponent(templatePartPath)}&canvas=edit`
        );

        await editor.setContent('');
    });

    test('renders heading, description, and button when all fields are filled', async ({
        admin,
    }) => {
        const editor = admin.editor;
        const frame = await configureHeroImage(editor, {
            title: 'Home Page Title',
            description: 'Description, under 200 characters',
            buttonText: 'Learn More',
        });

        await expect(headingContent(frame).first()).toContainText(
            'Home Page Title'
        );
        await expect(paragraphContent(frame).first()).toContainText(
            'Description, under 200 characters'
        );
        await expect(buttonContent(frame).first()).toContainText('Learn More');
    });

    test('renders only the title when description and button are empty', async ({
        admin,
    }) => {
        const editor = admin.editor;
        const frame = await configureHeroImage(editor, {
            title: 'No Description or Action Button',
        });

        await expect(headingContent(frame).first()).toContainText(
            'No Description or Action Button'
        );
    });
});
