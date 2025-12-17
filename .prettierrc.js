const prettierConfig = require(
  require.resolve("@wordpress/scripts/config/.prettierrc.js")
);

const overrides = [
    {
        "files": "*.{html,php}",
        "options": {
            "parser": "html",
            "useTabs": false,
            "tabWidth": 4,
            "htmlWhitespaceSensitivity": "strict",
            "singleAttributePerLine": true,
            "printWidth": 999999
        }
    }
];

prettierConfig.useTabs = false;
prettierConfig.overrides = [...prettierConfig.overrides, ...overrides];

module.exports = prettierConfig;
