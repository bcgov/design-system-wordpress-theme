import { expect, test } from '@wordpress/e2e-test-utils-playwright';

const SNAPSHOT_DIR = 'tests/screenshot/__snapshots__';

const FIXTURE_PREFIXES = {
    navigation: ['regression-navigation-'],
    posts: ['template-regression-post-'],
    pages: ['services-regression-', 'apply-for-benefit-regression-'],
    categories: ['regression-updates-'],
};

const TEST_CONTENT = {
    page: '<!-- wp:paragraph --><p>Template regression fixture page.</p><!-- /wp:paragraph -->',
    post: '<!-- wp:paragraph --><p>Template regression fixture post.</p><!-- /wp:paragraph -->',
};

function toRelativePath(link) {
    return new URL(link).pathname;
}

async function createNavigationMenu(requestUtils, menuData) {
    const blocksContent = menuData.items
        .map(
            (item) =>
                `<!-- wp:navigation-link ${JSON.stringify({
                    label: item.title,
                    url: item.url,
                    kind: 'custom',
                })} /-->`
        )
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

async function createFixture(requestUtils, endpoint, data) {
    return requestUtils.rest({
        method: 'POST',
        path: endpoint,
        data,
    });
}

async function deleteFixture(requestUtils, endpoint, id) {
    if (!id) {
        return;
    }

    await requestUtils.rest({
        method: 'DELETE',
        path: `${endpoint}/${id}`,
        params: { force: true },
    });
}

async function deleteMatchingItems(requestUtils, endpoint, slugPrefixes) {
    const items = await requestUtils.rest({
        method: 'GET',
        path: endpoint,
        params: { per_page: 100, context: 'edit' },
    });

    const deletePromises = items
        .filter((item) =>
            slugPrefixes.some((prefix) => (item.slug || '').startsWith(prefix))
        )
        .map((item) =>
            requestUtils.rest({
                method: 'DELETE',
                path: `${endpoint}/${item.id}`,
                params: { force: true },
            })
        );

    await Promise.all(deletePromises);
}

async function cleanupRegressionFixtures(requestUtils) {
    await Promise.all([
        deleteMatchingItems(
            requestUtils,
            '/wp/v2/navigation',
            FIXTURE_PREFIXES.navigation
        ),
        deleteMatchingItems(
            requestUtils,
            '/wp/v2/posts',
            FIXTURE_PREFIXES.posts
        ),
        deleteMatchingItems(
            requestUtils,
            '/wp/v2/pages',
            FIXTURE_PREFIXES.pages
        ),
        deleteMatchingItems(
            requestUtils,
            '/wp/v2/categories',
            FIXTURE_PREFIXES.categories
        ),
    ]);
}

async function mockNavigationResponse(page, fixtureState) {
    await page.route('**/wp-json/wp/v2/navigation*', async (route) => {
        const requestUrl = route.request().url();

        if (!requestUrl.includes(`navigation/${fixtureState.navigationId}`)) {
            await route.continue();
            return;
        }

        await route.fulfill({
            status: 200,
            contentType: 'application/json',
            body: JSON.stringify({
                id: fixtureState.navigationId,
                title: {
                    rendered: `Regression Navigation ${fixtureState.suffix}`,
                },
                content: {
                    rendered: '<nav>Test Navigation Menu</nav>',
                },
                status: 'publish',
            }),
        });
    });
}

async function assertTemplateChrome(page) {
    const site = page.locator('.wp-site-blocks').first();
    await site.waitFor();

    const header = page
        .locator(
            '.wp-site-blocks > header, .wp-site-blocks > .wp-block-template-part'
        )
        .first();
    await expect(header).toBeVisible();

    const footer = page.locator('.bcgov-footer-container').first();
    await expect(footer).toBeVisible();

    return site;
}

test.describe('template regression', () => {
    const fixtureState = {
        pageId: null,
        parentPageId: null,
        postId: null,
        categoryId: null,
        navigationId: null,
        suffix: null,
    };

    const routes = {
        page: '',
        singular: '',
        archive: '',
        notFound: '/missing-regression-route-404/',
    };

    /**
     * Sets up test fixtures before running template regression tests
     */
    test.beforeAll(async ({ requestUtils }) => {
        await cleanupRegressionFixtures(requestUtils);

        const suffix = Date.now();
        fixtureState.suffix = suffix;

        // Create test fixtures
        const category = await createFixture(
            requestUtils,
            '/wp/v2/categories',
            {
                name: `Regression Updates ${suffix}`,
                slug: `regression-updates-${suffix}`,
            }
        );
        fixtureState.categoryId = category.id;

        const parentPage = await createFixture(requestUtils, '/wp/v2/pages', {
            title: `Services Regression ${suffix}`,
            slug: `services-regression-${suffix}`,
            status: 'publish',
            content: TEST_CONTENT.page,
        });
        fixtureState.parentPageId = parentPage.id;

        const page = await createFixture(requestUtils, '/wp/v2/pages', {
            title: `Apply For Benefit Regression ${suffix}`,
            slug: `apply-for-benefit-regression-${suffix}`,
            status: 'publish',
            content: TEST_CONTENT.page,
            parent: parentPage.id,
        });
        fixtureState.pageId = page.id;

        const post = await createFixture(requestUtils, '/wp/v2/posts', {
            title: `Template Regression Post ${suffix}`,
            slug: `template-regression-post-${suffix}`,
            status: 'publish',
            content: TEST_CONTENT.post,
            categories: [category.id],
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

        // Set up routes
        routes.page = toRelativePath(page.link);
        routes.singular = toRelativePath(post.link);

        // Get category link for archive route
        const categoryData = await requestUtils.rest({
            method: 'GET',
            path: `/wp/v2/categories/${fixtureState.categoryId}`,
        });
        routes.archive = toRelativePath(categoryData.link);
    });

    /**
     * Cleans up test fixtures after running template regression tests
     */
    test.afterAll(async ({ requestUtils }) => {
        // Skip cleanup in debug mode
        if (process.env.KEEP_DEBUG_FIXTURES === 'true') {
            return;
        }

        // Clean up fixtures in parallel
        await Promise.all([
            deleteFixture(requestUtils, '/wp/v2/posts', fixtureState.postId),
            deleteFixture(requestUtils, '/wp/v2/pages', fixtureState.pageId),
            deleteFixture(
                requestUtils,
                '/wp/v2/pages',
                fixtureState.parentPageId
            ),
            deleteFixture(
                requestUtils,
                '/wp/v2/categories',
                fixtureState.categoryId
            ),
            deleteFixture(
                requestUtils,
                '/wp/v2/navigation',
                fixtureState.navigationId
            ),
        ]);

        // Clean up any remaining fixtures
        await cleanupRegressionFixtures(requestUtils);
    });

    // Test each template type
    const templates = [
        { name: 'page', getUrl: () => routes.page },
        { name: 'singular', getUrl: () => routes.singular },
        { name: 'archive', getUrl: () => routes.archive },
        { name: '404', getUrl: () => routes.notFound },
    ];

    templates.forEach(({ name, getUrl }) => {
        test(`template ${name}`, async ({ page }) => {
            await mockNavigationResponse(page, fixtureState);

            const url = getUrl();
            await page.goto(url, { waitUntil: 'networkidle' });

            const site = await assertTemplateChrome(page);

            await site.screenshot({
                animations: 'disabled',
                path: `${SNAPSHOT_DIR}/template-${name}-frontend.png`,
            });
        });
    });
});
