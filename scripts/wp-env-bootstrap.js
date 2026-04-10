#!/usr/bin/env node
/**
 * Bootstrap the wp-env `cli` and `tests-cli` environments for local development and testing.
 */

const { execFileSync } = require( 'node:child_process' );
const path = require( 'node:path' );

const projectRoot = path.resolve( __dirname, '..' );
const environments = process.argv.slice( 2 );
const targetEnvironments = environments.length ? environments : [ 'cli', 'tests-cli' ];
const welcomeContent = '<!-- wp:paragraph --><p>Welcome to the design system theme development environment.</p><!-- /wp:paragraph -->';

/**
 * Executes a command inside a wp-env Docker container.
 *
 * @param {string} environment - The wp-env environment name ('cli' or 'tests-cli')
 * @param {string[]} args - Command arguments to pass to wp-env
 * @param {Object} options - Execution options
 * @param {boolean} options.captureOutput - If true, captures stdout as string; if false, inherits stdio
 * @returns {string|undefined} Captured output if captureOutput=true, otherwise undefined
 */
function runWpEnv( environment, args, { captureOutput = false } = {} ) {
	// Build the full wp-env command: wp-env run <environment> <args...>
	const commandArgs = [ 'run', environment, ...args ];

	// Configure execution options
	const execOptions = {
		cwd: projectRoot, // Run from the project root directory
		encoding: captureOutput ? 'utf8' : undefined, // Return string if capturing output
		stdio: captureOutput
			? [ 'ignore', 'pipe', 'inherit' ] // Suppress stdin, capture stdout, show stderr
			: 'inherit', // Inherit all stdio from parent process
	};

	return execFileSync( 'wp-env', commandArgs, execOptions );
}

/**
 * Bootstraps a single wp-env environment with consistent WordPress configuration.
 *
 * This function performs the complete setup for a development or testing environment,
 * including plugin autoload generation, theme activation, WordPress settings, and
 * creating a predictable home page for testing.
 *
 * @param {string} environment - The wp-env environment name to bootstrap ('cli' or 'tests-cli')
 */
function bootstrapEnvironment( environment ) {
	console.log( `\nBootstrapping ${ environment }...` );

	// Build plugin autoload files for the local environment.
	runWpEnv( environment, [
		'sh',
		'-lc',
		'cd /var/www/html/wp-content/plugins/design-system-wordpress-plugin && composer dump-autoload',
	] );

	// Apply consistent local WordPress settings.
	runWpEnv( environment, [ 'wp', 'theme', 'activate', 'design-system-wordpress-theme' ] );
	runWpEnv( environment, [ 'wp', 'rewrite', 'structure', '/%postname%/', '--hard' ] );
	runWpEnv( environment, [ 'wp', 'rewrite', 'flush', '--hard' ] );
	runWpEnv( environment, [ 'wp', 'option', 'update', 'timezone_string', 'UTC' ] );
	runWpEnv( environment, [ 'wp', 'option', 'update', 'start_of_week', '1' ] );

	// Set a static home page for predictable testing.
	const existingFrontPageId = runWpEnv(
		environment,
		[
			'wp',
			'post',
			'list',
			'--post_type=page',
			'--name=home',
			'--post_status=publish,draft,pending,private',
			'--field=ID',
			'--format=ids',
		],
		{ captureOutput: true }
	)
		.trim()
		.split( /\s+/ )
		.filter( Boolean )[ 0 ];

	const frontPageId =
		existingFrontPageId ||
		runWpEnv(
			environment,
			[
				'wp',
				'post',
				'create',
				'--post_type=page',
				'--post_status=publish',
				'--post_title=Home',
				'--post_name=home',
				`--post_content=${ welcomeContent }`,
				'--porcelain',
			],
			{ captureOutput: true }
		)
			.trim();

	runWpEnv( environment, [ 'wp', 'option', 'update', 'show_on_front', 'page' ] );
	runWpEnv( environment, [ 'wp', 'option', 'update', 'page_on_front', frontPageId ] );
}

// Main execution: Bootstrap all target environments
try {
	// Process each environment specified in command line args (or defaults to ['cli', 'tests-cli'])
	for ( const environment of targetEnvironments ) {
		bootstrapEnvironment( environment );
	}
} catch ( error ) {
	// If any bootstrap step fails, show error and exit with failure code
	console.error(
		'\nwp-env bootstrap failed. Start the local environment with `npm run wp-env start` and try again.'
	);
	process.exit( error.status ?? 1 );
}
