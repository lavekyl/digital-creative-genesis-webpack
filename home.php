<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds the blog page template to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

add_action( 'genesis_meta', 'digital_creative_genesis_blog_setup' );
/**
 * Set up the blog layout
 *
 * @since 1.0.0
 */
function digital_creative_genesis_blog_setup() {

	// Add standard-page body class.
	add_filter( 'body_class', 'digital_creative_genesis_add_body_class' );

}

/**
 * Add blog body class.
 *
 * @param array $classes Main body tag classes.
 */
function digital_creative_genesis_add_body_class( $classes ) {

	$classes[] = 'blog';

	return $classes;

}

// Run the Genesis loop.
genesis();
