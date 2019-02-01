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

// Remove Query String from Static Resources.
add_filter( 'style_loader_src', 'remove_css_js_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_css_js_ver', 10, 2 );
/**
 * Function to remove query strings
 *
 * @param src $src query strings.
 */
function remove_css_js_ver( $src ) {
	if ( strpos( $src, '?ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
		return $src;
	}
}
