import { expect, test } from '@wordpress/e2e-test-utils-playwright';
import fs from 'fs';
import path from 'path';

const SNAPSHOT_DIR = 'tests/screenshot/__snapshots__';
const KEEP_DEBUG_FIXTURES = false;
const DESKTOP_NAV_PATH = path.resolve(
    __dirname,
    '../../parts/desktop-navigation.html'
);

function toRelativePath(link) {
    return new URL(link).pathname;
}

async function createNavigationMenu(requestUtils, menuData) {
    function serializeLinkBlock(title, url) {
        const attrs = JSON.stringify({
            label: title,
            url,
            kind: 'custom',
        });

        return `<!-- wp:navigation-link ${attrs} /-->`;
    }

    const blocksContent = menuData.items
        .map((item) => serializeLinkBlock(item.title, item.url))
        .join('\n');

    const response = await requestUtils.rest({
        method: 'POST',
        path: '/wp/v2/navigation',
        data: {
            title: menuData.title,
            content: blocksContent,
            status: 'publish',
        },
    });

    return response.id;
}

async function cleanupRegressionFixtures(requestUtils) {
    const deleteMatchingItems = async (endpoint, slugPrefixes) => {
        const items = await requestUtils.rest({
            method: 'GET',
            path: endpoint,
            params: {
                per_page: 100,
                context: 'edit',
            },
        });

        for (const item of items) {
            const slug = item.slug || '';
            if (!slugPrefixes.some((prefix) => slug.startsWith(prefix))) {
                continue;
            }

            await requestUtils.rest({
                method: 'DELETE',
                path: `${endpoint}/${item.id}`,
                params: { force: true },
            });
        }
    };

    await deleteMatchingItems('/wp/v2/navigation', ['regression-navigation-']);
    await deleteMatchingItems('/wp/v2/posts', [
        'template-shell-regression-post-',
    ]);
    await deleteMatchingItems('/wp/v2/pages', [
        'services-regression-',
        'apply-for-benefit-regression-',
    ]);
    await deleteMatchingItems('/wp/v2/categories', ['regression-updates-']);
}

async function captureTemplateShell(page, snapshotPrefix) {
    const site = page.locator('.wp-site-blocks').first();
    await site.waitFor();

    const header = page
        .locator(
            '.wp-site-blocks > header, .wp-site-blocks > .wp-block-template-part'
        )
        .first();
    await expect(header).toBeVisible();
    await header.screenshot({
        animations: 'disabled',
        path: `${SNAPSHOT_DIR}/template-${snapshotPrefix}-header-frontend.png`,
    });

    const navbar = header
        .locator(
            '.wp-block-design-system-wordpress-plugin-navigation[data-show-in-desktop="true"]'
        )
        .first();
    await expect(navbar).toBeVisible();

    const navLinks = navbar.getByRole('link');
    expect(await navLinks.count()).toBeGreaterThan(0);
    await expect(
        navbar.getByRole('link', { name: /home/i }).first()
    ).toBeVisible();
    await navbar.screenshot({
        animations: 'disabled',
        path: `${SNAPSHOT_DIR}/template-${snapshotPrefix}-navbar-frontend.png`,
    });

    const breadcrumb = header
        .locator('.wp-block-design-system-wordpress-plugin-breadcrumb')
        .first();
    await expect(breadcrumb).toBeVisible();
    await breadcrumb.screenshot({
        animations: 'disabled',
        path: `${SNAPSHOT_DIR}/template-${snapshotPrefix}-breadcrumb-frontend.png`,
    });

    const footerAck = page
        .locator('.has-banner-background-dark-background-color')
        .first();
    await expect(footerAck).toBeVisible();
    await footerAck.screenshot({
        animations: 'disabled',
        path: `${SNAPSHOT_DIR}/template-${snapshotPrefix}-footer-ack-frontend.png`,
    });

    const footer = page.locator('.bcgov-footer-container').first();
    await expect(footer).toBeVisible();
    await footer.screenshot({
        animations: 'disabled',
        path: `${SNAPSHOT_DIR}/template-${snapshotPrefix}-footer-frontend.png`,
    });

    await site.screenshot({
        animations: 'disabled',
        path: `${SNAPSHOT_DIR}/template-${snapshotPrefix}-shell-frontend.png`,
    });
}

test.describe('template shell regression', () => {
    const fixtureState = {
        pageId: null,
        parentPageId: null,
        postId: null,
        categoryId: null,
        navigationId: null,
    };

    const routes = {
        page: '',
        singular: '',
        archive: '',
        notFound: ['/missing-regression-route-404/'],
    };

    test.beforeAll(async ({ requestUtils }) => {
        await cleanupRegressionFixtures(requestUtils);

        const suffix = Date.now();
        fixtureState.suffix = suffix;

        const category = await requestUtils.rest({
            method: 'POST',
            path: '/wp/v2/categories',
            data: {
                name: `Regression Updates ${suffix}`,
                slug: `regression-updates-${suffix}`,
            },
        });
        fixtureState.categoryId = category.id;

        const parentPage = await requestUtils.rest({
            method: 'POST',
            path: '/wp/v2/pages',
            data: {
                title: `Services Regression ${suffix}`,
                slug: `services-regression-${suffix}`,
                status: 'publish',
            },
        });
        fixtureState.parentPageId = parentPage.id;

        const page = await requestUtils.rest({
            method: 'POST',
            path: '/wp/v2/pages',
            data: {
                title: `Apply For Benefit Regression ${suffix}`,
                slug: `apply-for-benefit-regression-${suffix}`,
                status: 'publish',
                parent: parentPage.id,
                content:
                    '<!-- wp:paragraph --><p>Template shell regression fixture page.</p><!-- /wp:paragraph -->',
            },
        });
        fixtureState.pageId = page.id;

        const post = await requestUtils.rest({
            method: 'POST',
            path: '/wp/v2/posts',
            data: {
                title: `Template Shell Regression Post ${suffix}`,
                slug: `template-shell-regression-post-${suffix}`,
                status: 'publish',
                categories: [category.id],
                content:
                    '<!-- wp:paragraph --><p>Template shell regression fixture post.</p><!-- /wp:paragraph -->',
            },
        });
        fixtureState.postId = post.id;

        fixtureState.navigationId = await createNavigationMenu(requestUtils, {
            title: `Regression Navigation ${suffix}`,
            items: [
                { title: 'Home', url: '/' },
                { title: 'Services', url: toRelativePath(parentPage.link) },
                { title: 'Apply for Benefit', url: toRelativePath(page.link) },
            ],
        });

        // Update the navigation block to use the created wp_navigation post.
        let desktopNavContent = fs.readFileSync(DESKTOP_NAV_PATH, 'utf8');
        desktopNavContent = desktopNavContent.replace(
            /"ref":\d+/g,
            `"ref":${fixtureState.navigationId}`
        );
        desktopNavContent = desktopNavContent.replace(
            /"menuId":\d+/g,
            `"menuId":${fixtureState.navigationId}`
        );
        fs.writeFileSync(DESKTOP_NAV_PATH, desktopNavContent);

        routes.page = toRelativePath(page.link);
        routes.singular = toRelativePath(post.link);
        routes.archive = toRelativePath(category.link);
    });

    test.afterAll(async ({ requestUtils }) => {
        if (KEEP_DEBUG_FIXTURES) {
            return;
        }
        if (fixtureState.postId) {
            await requestUtils.rest({
                method: 'DELETE',
                path: `/wp/v2/posts/${fixtureState.postId}`,
                params: { force: true },
            });
        }

        if (fixtureState.pageId) {
            await requestUtils.rest({
                method: 'DELETE',
                path: `/wp/v2/pages/${fixtureState.pageId}`,
                params: { force: true },
            });
        }

        if (fixtureState.parentPageId) {
            await requestUtils.rest({
                method: 'DELETE',
                path: `/wp/v2/pages/${fixtureState.parentPageId}`,
                params: { force: true },
            });
        }

        if (fixtureState.categoryId) {
            await requestUtils.rest({
                method: 'DELETE',
                path: `/wp/v2/categories/${fixtureState.categoryId}`,
                params: { force: true },
            });
        }

        // Revert the navigation block
        let desktopNavContent = fs.readFileSync(DESKTOP_NAV_PATH, 'utf8');
        desktopNavContent = desktopNavContent.replace(
            /"ref":\d+/g,
            '"ref":123'
        );
        desktopNavContent = desktopNavContent.replace(
            /"menuId":\d+/g,
            '"menuId":123'
        );
        fs.writeFileSync(DESKTOP_NAV_PATH, desktopNavContent);

        // Delete the wp_navigation fixture
        if (fixtureState.navigationId) {
            try {
                await requestUtils.rest({
                    method: 'DELETE',
                    path: `/wp/v2/navigation/${fixtureState.navigationId}`,
                    params: { force: true },
                });
            } catch (e) {
                // Ignore
            }
        }

        await cleanupRegressionFixtures(requestUtils);
    });

    test('template page shell shows complete header and footer', async ({
        page,
    }) => {
        await page.goto(routes.page, { waitUntil: 'networkidle' });
        await captureTemplateShell(page, 'page');
    });

    test('template singular shell shows complete header and footer', async ({
        page,
    }) => {
        await page.goto(routes.singular, { waitUntil: 'networkidle' });
        await captureTemplateShell(page, 'singular');
    });

    test('template archive shell shows complete header and footer', async ({
        page,
    }) => {
        await page.goto(routes.archive, { waitUntil: 'networkidle' });
        await captureTemplateShell(page, 'archive');
    });

    test('template 404 shell shows complete header and footer', async ({
        page,
    }) => {
        await page.goto(routes.notFound[0], { waitUntil: 'networkidle' });
        await captureTemplateShell(page, '404');
    });
});
