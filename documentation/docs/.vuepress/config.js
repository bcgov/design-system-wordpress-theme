import { defaultTheme } from '@vuepress/theme-default';

import { defineUserConfig } from 'vuepress';
import { searchPlugin } from '@vuepress/plugin-search'
import { viteBundler } from '@vuepress/bundler-vite';

export default defineUserConfig({
    base: '/design-system-wordpress-theme/',
    lang: 'en-US',
    title: 'Design System WordPress Theme',
    description: 'Developer Documentation for Design System WordPress Theme',
    bundler: viteBundler({}),
    theme: defaultTheme({
        logo: '/images/BCID_H_rgb_pos.png',
        logoDark: '/images/BCID_H_rgb_rev.png',
        editLink: false,
        lastUpdated: false,
        repo: 'bcgov/design-system-wordpress-theme',
        repoLabel: 'Github',
        sidebarDepth: 2,  // 
        navbar: [
            {
                text: 'Home',
                link: '/',
            },
        ],
        // sidebar array
        // all pages will use the same sidebar
        sidebar: [
            // SidebarItem
            {
                text: 'Site Editor',
                collapsible: true,
                children: [
                    {
                        text: 'Patterns',
                        collapsible: true,
                        children: [
                            {
                                text: "How to use patterns", link: "/guide/SiteEditor/Patterns/HowToUsePatterns", children: [
                                    { text: "DSWP Card With Hyper Link List", link: "/guide/SiteEditor/Patterns/DSWPCardWithHyperLinkList" },
                                    { text: "DSWP Vertical Cards", link: "/guide/SiteEditor/Patterns/DSWPVerticalCards" },
                                    { text: "DSWP Default Heading", link: "/guide/SiteEditor/Patterns/DSWPDefaultHeading" },
                                    { text: "DSWP Footer With Territorial Acknowledgement", link: "/guide/SiteEditor/Patterns/DSWPFooterWithTerritorialAcknowledgement" },
                                ]
                            },
                            "/guide/SiteEditor/Patterns/PatternsOverview",
                        ]
                    }
                ],
            },
            {
                text: 'Developers',
                collapsible: true,
                children: [
                    "/guide/Developers/Patterns/PatternsTroubleShooting",
                    "/guide/Developers/TemplateParts",
                ]
            }
        ],
    }),
    plugins: [
        searchPlugin({
          locales: {
            '/': {
              placeholder: 'Search...',
            },
          },
        }),
      ],
});
