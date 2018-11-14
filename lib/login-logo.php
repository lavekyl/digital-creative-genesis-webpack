<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds the login logo to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

add_filter( 'login_headerurl', 'dcg_login_logo_url' );
/**
 * Login Logo URL
 */
function dcg_login_logo_url() {
    return home_url();
}

/**
 * Login logo
 */
function dcg_login_logo() {
    $custom_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
    
    ?>
    <style type="text/css">
    .login h1 a {
        background-image: url( <?php echo esc_html( $custom_logo[0] ); ?> );
        background-size: contain;
        background-repeat: no-repeat;
		background-position: center center;
        display: block;
        overflow: hidden;
        text-indent: -9999em;
        width: 312px;
        height: 100px;
    }
    </style>
    <?php
}
add_action( 'login_head', 'dcg_login_logo' );
