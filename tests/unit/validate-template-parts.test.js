const fs = require('fs');
const os = require('os');
const path = require('path');
const { spawnSync } = require('child_process');

/**
 * Unit tests for the template-part validator script.
 * Tests are structured to create temporary workspaces with fixture files, run the validator script, and assert on the results.
 */

const validatorScriptPath = path.resolve(__dirname, '../../scripts/validate-template-parts.js');
const validationSuccessMessage = 'no theme attributes found';
const validationFailureMessage = 'Template Part Validation Failed';

const temporaryWorkspaces = [];

const createTempWorkspace = () => {
    const workspacePath = fs.mkdtempSync(path.join(os.tmpdir(), 'template-part-validator-'));
    temporaryWorkspaces.push(workspacePath);

    return workspacePath;
};

const writeFixtureFiles = (workspacePath, filesByPath) => {
    Object.entries(filesByPath).forEach(([relativeFilePath, fileContents]) => {
        const absoluteFilePath = path.join(workspacePath, relativeFilePath);
        fs.mkdirSync(path.dirname(absoluteFilePath), { recursive: true });
        fs.writeFileSync(absoluteFilePath, fileContents, 'utf8');
    });
};

const runValidator = (workspacePath) => {
    return spawnSync('node', [validatorScriptPath], {
        cwd: workspacePath,
        encoding: 'utf8',
    });
};

const expectValidatorSuccess = (validatorResult) => {
    expect(validatorResult.error).toBeUndefined();
    expect(validatorResult.signal).toBeNull();
    expect(validatorResult.status).toBe(0);
    expect(validatorResult.stdout).toContain(validationSuccessMessage);
};

const expectValidatorFailure = (validatorResult) => {
    expect(validatorResult.error).toBeUndefined();
    expect(validatorResult.signal).toBeNull();
    expect(validatorResult.status).toBe(1);
    expect(validatorResult.stderr).toContain(validationFailureMessage);
};

describe('validate-template-parts script', () => {
    afterAll(() => {
        temporaryWorkspaces.forEach((workspacePath) => {
            fs.rmSync(workspacePath, { recursive: true, force: true });
        });
    });

    test('passes when no template-part block has theme attribute', () => {
        const workspacePath = createTempWorkspace();

        writeFixtureFiles(workspacePath, {
            'parts/header.html': '<!-- wp:template-part {"slug":"breadcrumb","align":"full"} /-->',
        });

        const validatorResult = runValidator(workspacePath);

        expectValidatorSuccess(validatorResult);
    });

    test('fails when any template-part block includes theme attribute (single-line and multiline)', () => {
        const workspacePath = createTempWorkspace();

        writeFixtureFiles(workspacePath, {
            'parts/one.html': '<!-- wp:template-part {"slug":"one","theme":"t"} /-->',
            'parts/two.html': [
                '<!-- wp:template-part {',
                '  "slug": "two",',
                '  "theme": "t"',
                '} /-->',
            ].join('\n'),
        });

        const validatorResult = runValidator(workspacePath);

        expectValidatorFailure(validatorResult);
        expect(validatorResult.stderr).toContain('parts/one.html:1');
        expect(validatorResult.stderr).toContain('parts/two.html:1');
    });

    test('warns when no template files are found', () => {
        const workspacePath = createTempWorkspace();

        const validatorResult = runValidator(workspacePath);

        expect(validatorResult.status).toBe(0);
        expect(validatorResult.stderr).toContain(
            'Warning: No template files found. Please check that parts/ and templates/ directories exist.'
        );
        expect(validatorResult.stdout).toContain('Validated 0 file(s)');
    });
});
