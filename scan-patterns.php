<?php
$directory           = './patterns'; // Set the directory to scan.
$img_failures        = []; // Array to hold failures for <img src>.
$href_failures       = []; // Array to hold failures for <a href>.
$total_files_scanned = 0; // Total number of files scanned.
$passed_checks       = 0; // Number of files that passed checks.
$failed_checks       = 0; // Number of files that failed checks.

// ANSI color codes.
$green  = "\033[32m"; // Green.
$red    = "\033[31m"; // Red.
$yellow = "\033[33m"; // Yellow.
$orange = "\033[38;5;214m"; // Orange (using 256-color mode).
$reset  = "\033[0m"; // Reset to default color.

/**
 * Check files in the specified directory for <img> and <a> tag issues.
 *
 * @param string $dir The directory to scan.
 */
function check_files( $dir ) {
    global $img_failures, $href_failures, $total_files_scanned, $passed_checks, $failed_checks; // Use global variables.
    $files = scandir( $dir );
    foreach ( $files as $file ) {
        if ( '.' === $file || '..' === $file ) { // Yoda condition.
            continue; // Skip current and parent directory.
        }

        $file_path = $dir . DIRECTORY_SEPARATOR . $file; // Construct the file path.

        if ( is_dir( $file_path ) ) {
            check_files( $file_path ); // Recursively check directories.
        } elseif ( 'php' === pathinfo( $file_path, PATHINFO_EXTENSION ) ) { // Yoda condition.
            ++$total_files_scanned; // Increment total files scanned.
            $lines       = file( $file_path ); // Read the file into an array of lines.
            $file_passed = true; // Assume the file passes unless a failure is found.

            foreach ( $lines as $line_number => $line_content ) {
                // Check for <img> tags in the current line.
                if ( preg_match( '/<img[^>]+src="([^"]*)"/', $line_content, $matches ) ) {
                    // Check if the src contains PHP.
                    if ( false === strpos( $matches[1], 'php' ) ) { // Yoda condition.
                        // If src does not contain PHP, add to img_failures with line number.
                        $img_failures[] = "$file_path (Line " . ( $line_number + 1 ) . ')';
                        $file_passed    = false; // Mark the file as failed.
                    }
                }

                // Check for <a> tags in the current line.
                if ( preg_match( '/<a[^>]+href="([^"]*)"/', $line_content, $matches ) ) {
                    // Check if the href contains localhost.
                    if ( false !== strpos( $matches[1], 'localhost' ) ) { // Yoda condition.
                        // If href contains localhost, add to href_failures with line number.
                        $href_failures[] = "$file_path (Line " . ( $line_number + 1 ) . ')';
                        $file_passed     = false; // Mark the file as failed.
                    }
                }
            }

            if ( $file_passed ) {
                ++$passed_checks; // Increment passed checks.
            } else {
                ++$failed_checks; // Increment failed checks.
            }
        }
    }
}

check_files( $directory ); // Start checking files.

// Report results.
echo 'Total files scanned: ' . esc_html( $total_files_scanned ) . "\n"; // Escape output for security.
echo esc_html( $green ) . 'Files passed: ' . esc_html( $passed_checks ) . esc_html( $reset ) . "\n"; // Escape output for security.
echo esc_html( $red ) . 'Files failed: ' . esc_html( $failed_checks ) . esc_html( $reset ) . "\n"; // Escape output for security.

if ( ! empty( $img_failures ) || ! empty( $href_failures ) ) {
    echo esc_html( $yellow ) . 'Failed files:' . esc_html( $reset ) . "\n"; // Indicate failed files.

    // Check for <img> failures.
    if ( ! empty( $img_failures ) ) {
        echo esc_html( $yellow ) . 'Missing PHP in <img src>:' . esc_html( $reset ) . "\n"; // Indicate missing PHP in <img src>.
        foreach ( $img_failures as $failure ) {
            echo esc_html( $orange ) . esc_html( $failure ) . esc_html( $reset ) . "\n"; // Print img failures in orange and escape output.
        }
        echo "\n"; // New line for separation.
    }

    // Check for <a> failures.
    if ( ! empty( $href_failures ) ) {
        echo esc_html( $yellow ) . "Containing 'localhost' in <a href>:" . esc_html( $reset ) . "\n"; // Indicate localhost in <a href>.
        foreach ( $href_failures as $failure ) {
            echo esc_html( $orange ) . esc_html( $failure ) . esc_html( $reset ) . "\n"; // Print href failures in orange and escape output.
        }
    }
}

echo "\n"; // Final newline for better output separation.

/**
 * Escape output for security.
 *
 * @param string $str The string to escape.
 * @return string Escaped string.
 */
function esc_html( $str ) {
    return htmlspecialchars( $str, ENT_QUOTES, 'UTF-8' );
}
