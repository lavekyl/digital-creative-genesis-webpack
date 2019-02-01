<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds the dist (styles and scripts) to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

add_action( 'wp_enqueue_scripts', 'dcg_enqueue_scripts_styles' );
/**
 * Enqueue Scripts and Styles.
 */
function dcg_enqueue_scripts_styles() {

	// Load responsive menu and arguments.
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'digital-creative-genesis-custom-style', get_stylesheet_directory_uri() . "/assets/styles/build/style{$suffix}.css", array(), CHILD_THEME_VERSION );

	wp_enqueue_script( 'digital-creative-genesis-custom-js', get_stylesheet_directory_uri() . "/assets/scripts/build/scripts{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'digital-creative-genesis-responsive-menu', get_stylesheet_directory_uri() . "/assets/scripts/build/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

	if ( get_theme_mod( 'dcg_navigation_layout_select' ) === 'centered' ) {
		wp_localize_script(
			'digital-creative-genesis-responsive-menu',
			'genesis_responsive_menu',
			dcg_centered_logo_responsive_menu_settings()
		);
	} else {
		wp_localize_script(
			'digital-creative-genesis-responsive-menu',
			'genesis_responsive_menu',
			dcg_standard_responsive_menu_settings()
		);
	}

}
