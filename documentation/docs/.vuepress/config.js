import { defaultTheme } from '@vuepress/theme-default';

import { defineUserConfig } from 'vuepress';
import { searchPlugin } from '@vuepress/plugin-search';
import { viteBundler } from '@vuepress/bundler-vite';

export default defineUserConfig( {
    base: '/alphagov-wordpress-theme/',
    lang: 'en-US',
    title: 'Alpha-Gov WordPress Theme',
    description: 'Developer Documentation for Alpha-Gov WordPress Theme',
    bundler: viteBundler( {} ),
    theme: defaultTheme( {
        logo: '/images/BCID_H_rgb_pos.png',
        logoDark: '/images/BCID_H_rgb_rev.png',
        editLink: false,
        lastUpdated: false,
        repo: 'bcgov/alphagov-wordpress-theme',
        repoLabel: 'Github',
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
