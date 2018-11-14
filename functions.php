<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds functions to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

// Start the engine.
require_once get_template_directory() . '/lib/init.php';

// Setup Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'dcg_localization_setup' );
/**
 * Set Localization (do not remove).
 */
function dcg_localization_setup() {
	load_child_theme_textdomain( 'digital-creative-genesis', get_stylesheet_directory() . '/languages' );
}

add_filter( 'login_errors', 'dcg_login_errors' );
/**
 * Generic login error message
 */
function dcg_login_errors() {
	return 'Oops! Something is wrong!';
}

// Add the helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Add widgets.
require_once get_stylesheet_directory() . '/lib/widgets.php';

// Add Image upload and Color select to WordPress Theme Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Include Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Include Custom logo replacement for Header Image.
require_once get_stylesheet_directory() . '/lib/custom-logo.php';

// Include login logo replacement.
require_once get_stylesheet_directory() . '/lib/login-logo.php';

// Include Genesis adjustments.
require_once get_stylesheet_directory() . '/lib/genesis-adjustments.php';

// Add WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Add the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Add the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Digital Creative Genesis' );
define( 'CHILD_THEME_URL', 'https://lavertycreative.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// Add the assets and enqueue styles and scripts.
require_once get_stylesheet_directory() . '/lib/assets.php';

// Add our responsive menu settings.
require_once get_stylesheet_directory() . '/lib/menus.php';

// Sets the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 702; // Pixels.
}

// Add theme support functions.
require_once get_stylesheet_directory() . '/lib/theme-support.php';

// Add speed tuning functions.
require_once get_stylesheet_directory() . '/lib/speed-tuning.php';

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, true );

add_filter( 'genesis_author_box_gravatar_size', 'dcg_author_box_gravatar' );
/**
 * Modify size of the Gravatar in the author box.
 *
 * @param int $size Gravatar image size.
 */
function dcg_author_box_gravatar( $size ) {
	return 90;
}

add_filter( 'genesis_comment_list_args', 'dcg_comments_gravatar' );
/**
 * Modify size of the Gravatar in the entry comments.
 *
 * @param array $args Arguments for comments Gravatar size.
 */
function dcg_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}
