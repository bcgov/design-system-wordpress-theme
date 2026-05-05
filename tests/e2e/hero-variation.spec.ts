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
        // Select the button text and apply a link using keyboard shortcut
        await editor.page.keyboard.press('Control+K'); // or Cmd+K on Mac

        // Wait for the link popover to appear
        await editor.page.waitForTimeout(500);

        // Try to find the URL input in the popover
        const linkInputs = editor.page.locator(
            'input[placeholder*="Paste URL"], input[type="url"], input[type="text"]'
        );
        if ((await linkInputs.count()) > 0) {
            await linkInputs.first().fill(opts.link);
            await editor.page.keyboard.press('Enter');
        }
    }

    return editor.canvas;
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
