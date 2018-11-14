<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds Genesis adjustment functions to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

// Genesis adjustments.
// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

/**
 * Remove the header right widget area.
 */
if ( get_theme_mod( 'dcg_navigation_layout_select' ) !== 'below' ) {
	unregister_sidebar( 'header-right' );
}

/**
 * Reposition the primary navigation menu.
 */
if ( get_theme_mod( 'dcg_navigation_layout_select' ) === 'top' ) {
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	add_action( 'genesis_before_header', 'genesis_do_nav' );
} elseif ( get_theme_mod( 'dcg_navigation_layout_select' ) === 'right' ) {
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	add_action( 'genesis_header', 'genesis_do_nav' );
}

remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'dcg_custom_footer' );
/**
 * Customize the footer copyright.
 */
function dcg_custom_footer() {
	if ( get_theme_mod( 'dcg_footer_copyright_text' ) ) :
		?>
		<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> | <?php echo esc_html( get_theme_mod( 'dcg_footer_copyright_text' ) ); ?></p>
	<?php else : ?>
		<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> | All Rights Reserved | Powered by <a href="http://wordpress.org/">WordPress</a></p>
		<?php
	endif;
}
