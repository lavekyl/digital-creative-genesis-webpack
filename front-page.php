<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds the front page template to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

add_action( 'genesis_meta', 'digital_creative_genesis_home_setup' );
/**
 * Set up the homepage layout
 *
 * @since 1.0.0
 */
function digital_creative_genesis_home_setup() {

	// Add front-page body class.
	add_filter( 'body_class', 'digital_creative_genesis_add_body_class' );

	// Force full width content layout.
	add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

	// Remove Genesis loop.
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	add_action( 'genesis_loop', 'digital_creative_genesis_loop' );
}

/**
 * Add front-page body class.
 *
 * @param array $classes Main body tag classes.
 */
function digital_creative_genesis_add_body_class( $classes ) {

	$classes[] = 'front-page';

	return $classes;

}

/**
 * Add standard loop
 */
function digital_creative_genesis_loop() {
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
	endif;
}

// Run the Genesis loop.
genesis();
