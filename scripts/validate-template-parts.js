#!/usr/bin/env node

/**
 * Validate that `wp:template-part` blocks do not include a `theme` attribute.
 * Exits non-zero when any violations are found.
 */

const fs = require('fs');
const glob = require('glob');

const TEMPLATE_DIRS = ['parts/**/*.html', 'templates/**/*.html'];
const TEMPLATE_PART_BLOCK_REGEX = /<!--\s*wp:template-part\b[\s\S]*?\/-->/g;
const THEME_ATTRIBUTE_REGEX = /"theme"\s*:/;

const errors = [];

const getLineNumber = (content, index) => content.slice(0, index).split('\n').length;

// Gather files from all patterns, deduplicate, and scan each file once.
const files = [...new Set(
    TEMPLATE_DIRS.flatMap((pattern) =>
        glob.sync(pattern, { ignore: ['node_modules/**', 'vendor/**'] })
    )
)].sort();

for (const file of files) {
    let content;
    try {
        content = fs.readFileSync(file, 'utf8');
    } catch (err) {
        console.error(`Error reading file ${file}: ${err.message}`);
        continue;
    }

    for (const match of content.matchAll(TEMPLATE_PART_BLOCK_REGEX)) {
        if (THEME_ATTRIBUTE_REGEX.test(match[0])) {
            errors.push({
                file,
                line: getLineNumber(content, match.index),
                message: 'Remove the "theme" attribute; child themes cannot override template parts when it is present',
            });
        }
    }
}

if (errors.length > 0) {
    console.error('\n❌ Template Part Validation Failed\n');
    errors.forEach((error) => {
        console.error(`${error.file}:${error.line}`);
        console.error(`  ${error.message}\n`);
    });
    process.exit(1);
} else {
    if (files.length === 0) {
        console.warn('⚠️  Warning: No template files found. Please check that parts/ and templates/ directories exist.');
    }
    console.log(`✅ Validated ${files.length} file(s) - no theme attributes found`);
    process.exit(0);
}
