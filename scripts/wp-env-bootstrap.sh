#!/bin/sh
# Bootstrap script for wp-env to set up a deterministic local environment for development and visual regression testing.

# install dependencies for the plugin to ensure autoloading is available in wp-env
cd wp-content/plugins/design-system-wordpress-plugin && composer dump-autoload && cd ../../../

set -eu

# Keep local environments deterministic for visual regression and development.
wp theme activate design-system-wordpress-theme
wp rewrite structure '/%postname%/' --hard
wp rewrite flush --hard
wp option update timezone_string 'UTC'
wp option update start_of_week '1'

# Ensure a deterministic static front page instead of "Your latest posts".
front_page_id="$(wp post list --post_type=page --name=home --post_status=publish,draft,pending,private --field=ID --format=ids | awk '{print $1}')"

if [ -z "$front_page_id" ]; then
    front_page_id="$(wp post create \
        --post_type=page \
        --post_status=publish \
        --post_title='Home' \
        --post_name='home' \
        --post_content='<!-- wp:paragraph --><p>Welcome to the design system theme development environment.</p><!-- /wp:paragraph -->' \
        --porcelain)"
fi

wp option update show_on_front 'page'
wp option update page_on_front "$front_page_id"