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
                                    { text: "DSWP Heading with Paragraph(s)", link: "/guide/SiteEditor/Patterns/DSWPHeadingWithParagraphs" },
                                    { text: "DSWP Horizontal Card No Shadow", link: "/guide/SiteEditor/Patterns/DSWPHorizontalCardNoShadow" },
                                    { text: "DSWP Icon with Excerpt", link: "/guide/SiteEditor/Patterns/DSWPIconWithExcerpt" },
                                    { text: "DSWP Hero Image with Title", link: "/guide/SiteEditor/Patterns/DSWPHeroImageWithTitle" },
                                    { text: "DSWP Horizontal Card", link: "/guide/SiteEditor/Patterns/DSWPHorizontalCard" },
                                    { text: "DSWP Horizontal Card Large Image Left", link: "/guide/SiteEditor/Patterns/DSWPHorizontalCardLargeImageLeft" },
                                    { text: "DSWP Horizontal Card Large Image Right", link: "/guide/SiteEditor/Patterns/DSWPHorizontalCardLargeImageRight" },
                                    { text: "DSWP Image And Text", link: "/guide/SiteEditor/Patterns/DSWPImageAndText" },
                                    { text: "DSWP Image And Text Flipped", link: "/guide/SiteEditor/Patterns/DSWPImageAndTextFlipped" },
                                    { text: "DSWP Information Contact Socials", link: "/guide/SiteEditor/Patterns/DSWPInformationContactSocials" },
                                    { text: "DSWP Link With Arrow", link: "/guide/SiteEditor/Patterns/DSWPLinkWithArrow" },
                                    { text: "DSWP Secondary Hero Image With Title", link: "/guide/SiteEditor/Patterns/DSWPSecondaryHeroImageWithTitle" },
                                    { text: "DSWP Team Pattern", link: "/guide/SiteEditor/Patterns/DSWPTeamPattern" },
                                    { text: "DSWP Vertical Cards With Icon", link: "/guide/SiteEditor/Patterns/DSWPVerticalCardsWithIcon" }
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
