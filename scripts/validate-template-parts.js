#!/usr/bin/env node

/**
 * Validate that `wp:template-part` blocks do not include a `theme` attribute.
 * Exits non-zero when any violations are found.
 */

const fs = require('fs');
const glob = require('glob');

const TEMPLATE_DIRS = ['parts/**/*.html', 'templates/**/*.html'];
const TEMPLATE_PART_START_REGEX = /<!--\s*wp:template-part\b/g;
const TEMPLATE_PART_BLOCK_REGEX = /<!--\s*wp:template-part\b[\s\S]*?\/-->/g;
const THEME_ATTRIBUTE_REGEX = /"theme"\s*:/;

const errors = [];
let totalFilesScanned = 0;

const getLineNumber = (content, index) => content.slice(0, index).split('\n').length;

const normalizeMatchedText = (value) => value.split('\n').map((line) => line.trim()).join(' ');

const findMalformedTemplatePartStarts = (startMatches, blockMatches) => {
    const validStartIndices = new Set(blockMatches.map((match) => match.index));

    return startMatches.filter((startMatch) => !validStartIndices.has(startMatch.index));
};

const hasMalformedAttributesObject = (templatePartBlock) => {
    const firstOpenBraceIndex = templatePartBlock.indexOf('{');
    const lastCloseBraceIndex = templatePartBlock.lastIndexOf('}');

    if (firstOpenBraceIndex === -1 && lastCloseBraceIndex === -1) {
        return false;
    }

    if (firstOpenBraceIndex === -1 || lastCloseBraceIndex === -1 || firstOpenBraceIndex > lastCloseBraceIndex) {
        return true;
    }

    const attributesObjectText = templatePartBlock.slice(firstOpenBraceIndex, lastCloseBraceIndex + 1);

    try {
        JSON.parse(attributesObjectText);
        return false;
    } catch (error) {
        return true;
    }
};

// Gather files from all patterns and scan each file once.
const files = TEMPLATE_DIRS.flatMap((pattern) =>
    glob.sync(pattern, { ignore: ['node_modules/**', 'vendor/**'] })
);

files.sort();

totalFilesScanned = files.length;

for (const file of files) {
    let content;
    try {
        content = fs.readFileSync(file, 'utf8');
    } catch (err) {
        console.error(`Error reading file ${file}: ${err.message}`);
        continue;
    }

    const templatePartStartMatches = [...content.matchAll(TEMPLATE_PART_START_REGEX)];
    const templatePartBlockMatches = [...content.matchAll(TEMPLATE_PART_BLOCK_REGEX)];

    const malformedStartMatches = findMalformedTemplatePartStarts(templatePartStartMatches, templatePartBlockMatches);

    malformedStartMatches.forEach((startMatch) => {
        errors.push({
            file,
            line: getLineNumber(content, startMatch.index),
            content: '<!-- wp:template-part ...',
            message: 'Malformed template-part block; block must be closed with /-->',
        });
    });

    templatePartBlockMatches.forEach((templatePartMatch) => {
        const templatePartBlock = templatePartMatch[0];
        const lineNumber = getLineNumber(content, templatePartMatch.index);

        if (THEME_ATTRIBUTE_REGEX.test(templatePartBlock)) {
            errors.push({
                file,
                line: lineNumber,
                content: normalizeMatchedText(templatePartBlock),
                message: 'Remove the "theme" attribute; child themes cannot override template parts when it is present',
            });
        }

        if (hasMalformedAttributesObject(templatePartBlock)) {
            errors.push({
                file,
                line: lineNumber,
                content: normalizeMatchedText(templatePartBlock),
                message: 'Malformed template-part attributes object; JSON must be valid',
            });
        }
    });
}

if (errors.length > 0) {
    console.error('\n❌ Template Part Validation Failed\n');
    errors.forEach((error) => {
        console.error(`${error.file}:${error.line}`);
        console.error(`  ${error.message}`);
        console.error(`  ${error.content}\n`);
    });
    process.exit(1);
} else {
    if (totalFilesScanned === 0) {
        console.warn('⚠️  Warning: No template files found. Please check that parts/ and templates/ directories exist.');
    }
    console.log(`✅ Validated ${totalFilesScanned} file(s) - no theme attributes found`);
    process.exit(0);
}
