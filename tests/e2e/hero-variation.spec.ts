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

        // Read textContent and normalize invisible chars (BOM / zero-width)
        const headingText =
            (await frame
                .getByRole('document', { name: 'Block: Heading' })
                .first()
                .textContent()) ?? '';
        const paragraphText =
            (await frame
                .getByRole('document', { name: 'Block: Paragraph' })
                .first()
                .textContent()) ?? '';
        const buttonText =
            (await frame
                .getByRole('document', { name: 'Block: Button' })
                .first()
                .textContent()) ?? '';

        const normalize = (s: string) => s.replace(/\uFEFF/g, '').trim();

        expect(normalize(headingText)).toContain('Home Page Title');
        expect(normalize(paragraphText)).toContain(
            'Description, under 200 characters'
        );
        expect(normalize(buttonText)).toContain('Learn More');
    });

    test('renders only the title when description and button are empty', async ({
        admin,
    }) => {
        const editor = admin.editor;
        const frame = await configureHeroImage(editor, {
            title: 'No Description or Action Button',
        });

        const headingText =
            (await frame
                .getByRole('document', { name: 'Block: Heading' })
                .first()
                .textContent()) ?? '';
        const normalize = (s: string) => s.replace(/\uFEFF/g, '').trim();
        expect(normalize(headingText)).toContain(
            'No Description or Action Button'
        );
    });
});
