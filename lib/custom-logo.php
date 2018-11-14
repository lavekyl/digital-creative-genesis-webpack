<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds the custom logo functions to replace header image used in the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

add_action( 'genesis_theme_settings_metaboxes', 'dcg_remove_metaboxes' );
/**
 * Removes output of unused admin settings metaboxes.
 *
 * @since 1.0
 *
 * @param string $_genesis_admin_settings The admin screen to remove meta boxes from.
 */
function dcg_remove_metaboxes( $_genesis_admin_settings ) {

	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );

}

add_filter( 'genesis_customizer_theme_settings_config', 'dcg_remove_customizer_settings' );
/**
 * Removes output of header settings in the Customizer.
 *
 * @since 1.0
 *
 * @param array $config Original Customizer items.
 * @return array Filtered Customizer items.
 */
function dcg_remove_customizer_settings( $config ) {

	unset( $config['genesis']['sections']['genesis_header'] );
	return $config;

}

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );
