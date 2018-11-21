<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds theme support functions to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add Post Format support for aside, gallery, link, and video.
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'video' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom logo.
add_theme_support(
	'custom-logo',
	array(
		'width'       => 600,
		'height'      => 160,
		'flex-width'  => true,
		'flex-height' => true,
	)
);

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Gutenberg.
// Wide Images.
add_theme_support( 'align-wide' );

// Editor Font Styles.
add_theme_support(
	'editor-font-sizes',
	array(
		array(
			'name'      => __( 'small', ' digital-creative-genesis' ),
			'shortName' => __( 'S', ' digital-creative-genesis' ),
			'size'      => 12,
			'slug'      => 'small',
		),
		array(
			'name'      => __( 'regular', ' digital-creative-genesis' ),
			'shortName' => __( 'M', ' digital-creative-genesis' ),
			'size'      => 16,
			'slug'      => 'regular',
		),
		array(
			'name'      => __( 'large', ' digital-creative-genesis' ),
			'shortName' => __( 'L', ' digital-creative-genesis' ),
			'size'      => 20,
			'slug'      => 'large',
		),
		array(
			'name'      => __( 'larger', ' digital-creative-genesis' ),
			'shortName' => __( 'XL', ' digital-creative-genesis' ),
			'size'      => 24,
			'slug'      => 'larger',
		),
	)
);

// Disable Custom Colors.
add_theme_support( 'disable-custom-colors' );

// Editor Color Palette.
add_theme_support(
	'editor-color-palette',
	array(
		array(
			'name'  => __( 'Blue', ' digital-creative-genesis' ),
			'slug'  => 'blue',
			'color' => '#0071bc',
		),
		array(
			'name'  => __( 'Red', ' digital-creative-genesis' ),
			'slug'  => 'red',
			'color' => '#e31c3d',
		),
		array(
			'name'  => __( 'Yellow', ' digital-creative-genesis' ),
			'slug'  => 'yellow',
			'color' => '#fdb81e',
		),
		array(
			'name'  => __( 'Gray', ' digital-creative-genesis' ),
			'slug'  => 'gray',
			'color' => '#323a45',
		),
	)
);
