// docs/.vuepress/config.js
import { defaultTheme } from "@vuepress/theme-default";
import { defineUserConfig } from "vuepress";
import searchPlugin from "@vuepress/plugin-search";
import { viteBundler } from "@vuepress/bundler-vite";
var config_default = defineUserConfig({
  base: "/design-system-wordpress-theme/",
  lang: "en-US",
  title: "Design System WordPress Theme",
  description: "Developer Documentation for Design System WordPress Theme",
  bundler: viteBundler({}),
  theme: defaultTheme({
    logo: "/images/BCID_H_rgb_pos.png",
    logoDark: "/images/BCID_H_rgb_rev.png",
    editLink: false,
    lastUpdated: false,
    repo: "bcgov/design-system-wordpress-theme",
    repoLabel: "Github",
    sidebarDepth: 2,
    // 
    navbar: [
      {
        text: "Home",
        link: "/"
      }
    ],
    // sidebar array
    // all pages will use the same sidebar
    sidebar: [
      // SidebarItem
      {
        text: "Site Editor",
        collapsible: true,
        children: [
          {
            text: "Patterns",
            collapsible: true,
            children: [
              {
                text: "How to use patterns",
                link: "/guide/SiteEditor/Patterns/HowToUsePatterns",
                children: [
                  { text: "DSWP Card With Hyper Link List", link: "/guide/SiteEditor/Patterns/DSWPCardWithHyperLinkList" },
                  { text: "DSWP Vertical Cards", link: "/guide/SiteEditor/Patterns/DSWPVerticalCards" },
                  { text: "DSWP Default Heading", link: "/guide/SiteEditor/Patterns/DSWPDefaultHeading" }
                ]
              },
              "/guide/SiteEditor/Patterns/PatternsOverview"
            ]
          }
        ]
      },
      {
        text: "Developers",
        collapsible: true,
        children: [
          "/guide/Developers/Patterns/PatternsTroubleShooting",
          "/guide/Developers/TemplateParts"
        ]
      }
    ]
  }),
  plugins: [
    ["@vuepress/search", {
      searchMaxSuggestions: 10
    }]
  ]
});
export {
  config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsiZG9jcy8udnVlcHJlc3MvY29uZmlnLmpzIl0sCiAgInNvdXJjZXNDb250ZW50IjogWyJjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfZGlybmFtZSA9IFwiL1VzZXJzL2FzcGl0ZXJpL0RldmVsb3BtZW50L2Rldi13cC93cC1jb250ZW50L3RoZW1lcy9kZXNpZ24tc3lzdGVtLXdvcmRwcmVzcy10aGVtZS9kb2N1bWVudGF0aW9uL2RvY3MvLnZ1ZXByZXNzXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ZpbGVuYW1lID0gXCIvVXNlcnMvYXNwaXRlcmkvRGV2ZWxvcG1lbnQvZGV2LXdwL3dwLWNvbnRlbnQvdGhlbWVzL2Rlc2lnbi1zeXN0ZW0td29yZHByZXNzLXRoZW1lL2RvY3VtZW50YXRpb24vZG9jcy8udnVlcHJlc3MvY29uZmlnLmpzXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ltcG9ydF9tZXRhX3VybCA9IFwiZmlsZTovLy9Vc2Vycy9hc3BpdGVyaS9EZXZlbG9wbWVudC9kZXYtd3Avd3AtY29udGVudC90aGVtZXMvZGVzaWduLXN5c3RlbS13b3JkcHJlc3MtdGhlbWUvZG9jdW1lbnRhdGlvbi9kb2NzLy52dWVwcmVzcy9jb25maWcuanNcIjtpbXBvcnQgeyBkZWZhdWx0VGhlbWUgfSBmcm9tICdAdnVlcHJlc3MvdGhlbWUtZGVmYXVsdCc7XG5cbmltcG9ydCB7IGRlZmluZVVzZXJDb25maWcgfSBmcm9tICd2dWVwcmVzcyc7XG5pbXBvcnQgc2VhcmNoUGx1Z2luIGZyb20gJ0B2dWVwcmVzcy9wbHVnaW4tc2VhcmNoJztcbmltcG9ydCB7IHZpdGVCdW5kbGVyIH0gZnJvbSAnQHZ1ZXByZXNzL2J1bmRsZXItdml0ZSc7XG5cbmV4cG9ydCBkZWZhdWx0IGRlZmluZVVzZXJDb25maWcoe1xuICAgIGJhc2U6ICcvZGVzaWduLXN5c3RlbS13b3JkcHJlc3MtdGhlbWUvJyxcbiAgICBsYW5nOiAnZW4tVVMnLFxuICAgIHRpdGxlOiAnRGVzaWduIFN5c3RlbSBXb3JkUHJlc3MgVGhlbWUnLFxuICAgIGRlc2NyaXB0aW9uOiAnRGV2ZWxvcGVyIERvY3VtZW50YXRpb24gZm9yIERlc2lnbiBTeXN0ZW0gV29yZFByZXNzIFRoZW1lJyxcbiAgICBidW5kbGVyOiB2aXRlQnVuZGxlcih7fSksXG4gICAgdGhlbWU6IGRlZmF1bHRUaGVtZSh7XG4gICAgICAgIGxvZ286ICcvaW1hZ2VzL0JDSURfSF9yZ2JfcG9zLnBuZycsXG4gICAgICAgIGxvZ29EYXJrOiAnL2ltYWdlcy9CQ0lEX0hfcmdiX3Jldi5wbmcnLFxuICAgICAgICBlZGl0TGluazogZmFsc2UsXG4gICAgICAgIGxhc3RVcGRhdGVkOiBmYWxzZSxcbiAgICAgICAgcmVwbzogJ2JjZ292L2Rlc2lnbi1zeXN0ZW0td29yZHByZXNzLXRoZW1lJyxcbiAgICAgICAgcmVwb0xhYmVsOiAnR2l0aHViJyxcbiAgICAgICAgc2lkZWJhckRlcHRoOiAyLCAgLy8gXG4gICAgICAgIG5hdmJhcjogW1xuICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgIHRleHQ6ICdIb21lJyxcbiAgICAgICAgICAgICAgICBsaW5rOiAnLycsXG4gICAgICAgICAgICB9LFxuICAgICAgICBdLFxuICAgICAgICAvLyBzaWRlYmFyIGFycmF5XG4gICAgICAgIC8vIGFsbCBwYWdlcyB3aWxsIHVzZSB0aGUgc2FtZSBzaWRlYmFyXG4gICAgICAgIHNpZGViYXI6IFtcbiAgICAgICAgICAgIC8vIFNpZGViYXJJdGVtXG4gICAgICAgICAgICB7XG4gICAgICAgICAgICAgICAgdGV4dDogJ1NpdGUgRWRpdG9yJyxcbiAgICAgICAgICAgICAgICBjb2xsYXBzaWJsZTogdHJ1ZSxcbiAgICAgICAgICAgICAgICBjaGlsZHJlbjogW1xuICAgICAgICAgICAgICAgICAgICB7XG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0OiAnUGF0dGVybnMnLFxuICAgICAgICAgICAgICAgICAgICAgICAgY29sbGFwc2libGU6IHRydWUsXG4gICAgICAgICAgICAgICAgICAgICAgICBjaGlsZHJlbjogW1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJIb3cgdG8gdXNlIHBhdHRlcm5zXCIsIGxpbms6IFwiL2d1aWRlL1NpdGVFZGl0b3IvUGF0dGVybnMvSG93VG9Vc2VQYXR0ZXJuc1wiLCBjaGlsZHJlbjogW1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgeyB0ZXh0OiBcIkRTV1AgQ2FyZCBXaXRoIEh5cGVyIExpbmsgTGlzdFwiLCBsaW5rOiBcIi9ndWlkZS9TaXRlRWRpdG9yL1BhdHRlcm5zL0RTV1BDYXJkV2l0aEh5cGVyTGlua0xpc3RcIiB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgeyB0ZXh0OiBcIkRTV1AgVmVydGljYWwgQ2FyZHNcIiwgbGluazogXCIvZ3VpZGUvU2l0ZUVkaXRvci9QYXR0ZXJucy9EU1dQVmVydGljYWxDYXJkc1wiIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7IHRleHQ6IFwiRFNXUCBEZWZhdWx0IEhlYWRpbmdcIiwgbGluazogXCIvZ3VpZGUvU2l0ZUVkaXRvci9QYXR0ZXJucy9EU1dQRGVmYXVsdEhlYWRpbmdcIiB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBdXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcIi9ndWlkZS9TaXRlRWRpdG9yL1BhdHRlcm5zL1BhdHRlcm5zT3ZlcnZpZXdcIixcbiAgICAgICAgICAgICAgICAgICAgICAgIF1cbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIF0sXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgIHRleHQ6ICdEZXZlbG9wZXJzJyxcbiAgICAgICAgICAgICAgICBjb2xsYXBzaWJsZTogdHJ1ZSxcbiAgICAgICAgICAgICAgICBjaGlsZHJlbjogW1xuICAgICAgICAgICAgICAgICAgICBcIi9ndWlkZS9EZXZlbG9wZXJzL1BhdHRlcm5zL1BhdHRlcm5zVHJvdWJsZVNob290aW5nXCIsXG4gICAgICAgICAgICAgICAgICAgIFwiL2d1aWRlL0RldmVsb3BlcnMvVGVtcGxhdGVQYXJ0c1wiLFxuICAgICAgICAgICAgICAgIF1cbiAgICAgICAgICAgIH1cbiAgICAgICAgXSxcbiAgICB9KSxcbiAgICBwbHVnaW5zOiBbXG4gICAgICAgIFsnQHZ1ZXByZXNzL3NlYXJjaCcsIHtcbiAgICAgICAgICAgIHNlYXJjaE1heFN1Z2dlc3Rpb25zOiAxMFxuICAgICAgICB9XVxuICAgIF1cbn0pO1xuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUFxZixTQUFTLG9CQUFvQjtBQUVsaEIsU0FBUyx3QkFBd0I7QUFDakMsT0FBTyxrQkFBa0I7QUFDekIsU0FBUyxtQkFBbUI7QUFFNUIsSUFBTyxpQkFBUSxpQkFBaUI7QUFBQSxFQUM1QixNQUFNO0FBQUEsRUFDTixNQUFNO0FBQUEsRUFDTixPQUFPO0FBQUEsRUFDUCxhQUFhO0FBQUEsRUFDYixTQUFTLFlBQVksQ0FBQyxDQUFDO0FBQUEsRUFDdkIsT0FBTyxhQUFhO0FBQUEsSUFDaEIsTUFBTTtBQUFBLElBQ04sVUFBVTtBQUFBLElBQ1YsVUFBVTtBQUFBLElBQ1YsYUFBYTtBQUFBLElBQ2IsTUFBTTtBQUFBLElBQ04sV0FBVztBQUFBLElBQ1gsY0FBYztBQUFBO0FBQUEsSUFDZCxRQUFRO0FBQUEsTUFDSjtBQUFBLFFBQ0ksTUFBTTtBQUFBLFFBQ04sTUFBTTtBQUFBLE1BQ1Y7QUFBQSxJQUNKO0FBQUE7QUFBQTtBQUFBLElBR0EsU0FBUztBQUFBO0FBQUEsTUFFTDtBQUFBLFFBQ0ksTUFBTTtBQUFBLFFBQ04sYUFBYTtBQUFBLFFBQ2IsVUFBVTtBQUFBLFVBQ047QUFBQSxZQUNJLE1BQU07QUFBQSxZQUNOLGFBQWE7QUFBQSxZQUNiLFVBQVU7QUFBQSxjQUNOO0FBQUEsZ0JBQ0ksTUFBTTtBQUFBLGdCQUF1QixNQUFNO0FBQUEsZ0JBQStDLFVBQVU7QUFBQSxrQkFDeEYsRUFBRSxNQUFNLGtDQUFrQyxNQUFNLHVEQUF1RDtBQUFBLGtCQUN2RyxFQUFFLE1BQU0sdUJBQXVCLE1BQU0sK0NBQStDO0FBQUEsa0JBQ3BGLEVBQUUsTUFBTSx3QkFBd0IsTUFBTSxnREFBZ0Q7QUFBQSxnQkFDMUY7QUFBQSxjQUNKO0FBQUEsY0FDQTtBQUFBLFlBQ0o7QUFBQSxVQUNKO0FBQUEsUUFDSjtBQUFBLE1BQ0o7QUFBQSxNQUNBO0FBQUEsUUFDSSxNQUFNO0FBQUEsUUFDTixhQUFhO0FBQUEsUUFDYixVQUFVO0FBQUEsVUFDTjtBQUFBLFVBQ0E7QUFBQSxRQUNKO0FBQUEsTUFDSjtBQUFBLElBQ0o7QUFBQSxFQUNKLENBQUM7QUFBQSxFQUNELFNBQVM7QUFBQSxJQUNMLENBQUMsb0JBQW9CO0FBQUEsTUFDakIsc0JBQXNCO0FBQUEsSUFDMUIsQ0FBQztBQUFBLEVBQ0w7QUFDSixDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
