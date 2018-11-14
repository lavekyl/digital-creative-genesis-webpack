<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds speed tuning functions to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

add_filter( 'script_loader_tag', 'js_defer_attr', 10 );
/**
 * Function to add defer to all scripts
 *
 * @param string $tag All script tags.
 */
function js_defer_attr( $tag ) {
	// Add async to all remaining scripts.
	if ( ! is_admin() ) {
		return str_replace( ' src', ' defer="defer" src', $tag );
	} else {
		return $tag;
	}
}

add_action( 'wp_footer', 'gfont_loader' );
/**
 * Add the fonts via web font loader.
 */
function gfont_loader() {
	// Can also be added in Theme Settings under Genesis in the admin dashboard. ?>
	<script>
	WebFont.load({
		google: {
			families: ['Crimson Text', 'Open Sans']
		}
	});
	</script>
	<?php
}
