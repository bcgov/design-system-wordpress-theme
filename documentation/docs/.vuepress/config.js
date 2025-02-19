import { defaultTheme } from '@vuepress/theme-default';

import { defineUserConfig } from 'vuepress';
import { searchPlugin } from '@vuepress/plugin-search';
import { viteBundler } from '@vuepress/bundler-vite';

export default defineUserConfig( {
    base: '/design-system-wordpress-theme/',
    lang: 'en-US',
    title: 'Design System WordPress Theme',
    description: 'Developer Documentation for Design System WordPress Theme',
    bundler: viteBundler( {} ),
    theme: defaultTheme( {
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
                     "/guide/SiteEditor/TemplateParts",
                     "/guide/SiteEditor/Patterns"
                ],
            },
        ],
    } ),
    plugins: [
        searchPlugin( {
            // options
        } ),
    ],
} );
