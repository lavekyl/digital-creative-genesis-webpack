<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds widgets to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

// If statement for menu placement.
if ( get_theme_mod( 'dcg_navigation_layout_select' ) === 'centered' ) {
	// Add support for right and left menu & rename top menu.
	add_theme_support(
		'genesis-menus',
		array(
			'primary'      => __( 'Above Header Menu', 'digital-creative-genesis' ),
			'header-left'  => __( 'Header Left', 'digital-creative-genesis' ),
			'header-right' => __( 'Header Right', 'digital-creative-genesis' ),
			'secondary'    => __( 'Footer Menu', 'digital-creative-genesis' ),
		)
	);
} else {
	// Rename primary and secondary navigation menus.
	add_theme_support(
		'genesis-menus',
		array(
			'primary'   => __( 'Header Menu', 'digital-creative-genesis' ),
			'secondary' => __( 'Footer Menu', 'digital-creative-genesis' ),
		)
	);
}

/**
 * Define our standard responsive menu settings.
 */
function dcg_standard_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'digital-creative-genesis' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'digital-creative-genesis' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

/**
 * Define our centered logo responsive menu settings.
 */
function dcg_centered_logo_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'digital-creative-genesis' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'digital-creative-genesis' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header-left',
				'.nav-header-right',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

/**
 * Hook menu to left of logo.
 *
 * @since 1.0.0
 */
function dcg_header_left_menu() {

	genesis_nav_menu(
		array(
			'theme_location' => 'header-left',
			'depth'          => 2,
		)
	);

}

/**
 * Hook menu to right of logo.
 *
 * @since 1.0.0
 */
function dcg_header_right_menu() {

	genesis_nav_menu(
		array(
			'theme_location' => 'header-right',
			'depth'          => 2,
		)
	);

}

/**
 * Reposition the primary navigation menu.
 */
if ( get_theme_mod( 'dcg_navigation_layout_select' ) === 'centered' ) {
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	add_action( 'genesis_before_header', 'genesis_do_nav', 7 );
	add_action( 'genesis_header', 'dcg_header_left_menu', 6 );
	add_action( 'genesis_header', 'dcg_header_right_menu', 9 );
}

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

add_filter( 'wp_nav_menu_args', 'dcg_secondary_menu_args' );
/**
 * Reduce the secondary navigation menu to one level depth.
 *
 * @param array $args Menu arguments.
 */
function dcg_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}
