<?php
/**
 * Digital Creative Genesis.
 *
 * This file adds the Customizer additions to the Digital Creative Genesis Theme.
 *
 * @package Digital Creative Genesis
 * @author  Laverty Creative
 * @license GPL-2.0+
 * @link    https://lavertycreative.com/
 */

add_action( 'customize_register', 'dcg_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function dcg_customizer_register( $wp_customize ) {

	$wp_customize->add_setting(
		'dcg_link_color',
		array(
			'default'           => dcg_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dcg_link_color',
			array(
				'description' => __( 'Change the color of post info links, hover color of linked titles, hover color of menu items, and more.', 'digital-creative-genesis' ),
				'label'       => __( 'Link Color', 'digital-creative-genesis' ),
				'section'     => 'colors',
				'settings'    => 'dcg_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'dcg_accent_color',
		array(
			'default'           => dcg_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dcg_accent_color',
			array(
				'description' => __( 'Change the default hovers color for button.', 'digital-creative-genesis' ),
				'label'       => __( 'Accent Color', 'digital-creative-genesis' ),
				'section'     => 'colors',
				'settings'    => 'dcg_accent_color',
			)
		)
	);

	$wp_customize->add_setting(
		'dcg_logo_width',
		array(
			'default'           => 350,
			'sanitize_callback' => 'absint',
		)
	);

	// Add a control for the logo size.
	$wp_customize->add_control(
		'dcg_logo_width',
		array(
			'label'       => __( 'Logo Width', 'digital-creative-genesis' ),
			'description' => __( 'The maximum width of the logo in pixels.', 'digital-creative-genesis' ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => 'dcg_logo_width',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 100,
			),

		)
	);

	// HEADER ORIENTATION START.
	$wp_customize->add_setting(
		'dcg_header_parallax',
		array(
			'default'           => 'true',
			'sanitize_callback' => 'dcg_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'dcg_header_parallax',
		array(
			'section' => 'header_image',
			'label'   => 'Parallax header?',
			'type'    => 'checkbox',
		)
	);

	// DISPLAY OPTIONS SECTION START.
	$wp_customize->add_section(
		'dcg_display_options',
		array(
			'title'    => 'Display Options',
			'priority' => 100,
		)
	);

	// NAVIGATION LAYOUT START.
	$wp_customize->add_setting(
		'dcg_navigation_transparency',
		array(
			'default'           => 'true',
			'sanitize_callback' => 'dcg_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'dcg_navigation_transparency',
		array(
			'section' => 'dcg_display_options',
			'label'   => 'Transparent Navigation?',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'dcg_navigation_layout_select',
		array(
			'default'           => 'below',
			'sanitize_callback' => 'dcg_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'dcg_navigation_layout_select',
		array(
			'section' => 'dcg_display_options',
			'label'   => 'Navigation Location',
			'type'    => 'select',
			'choices' => array(
				'top'      => 'Above the header',
				'right'    => 'Right of the logo',
				'below'    => 'Below the header',
				'centered' => 'Centered logo in nav',
			),
		)
	);

	// STANDARD HEADER IMAGE START.
	$wp_customize->add_setting(
		'dcg_header_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'dcg_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'dcg_header_image',
			array(
				'label'    => 'Standard Header Image',
				'settings' => 'dcg_header_image',
				'section'  => 'dcg_display_options',
			)
		)
	);

	// FOOTER LAYOUT START.
	$wp_customize->add_setting(
		'dcg_display_footer',
		array(
			'default'           => 'true',
			'sanitize_callback' => 'dcg_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'dcg_display_footer',
		array(
			'section' => 'dcg_display_options',
			'label'   => 'Display Footer Widgets?',
			'type'    => 'checkbox',
		)
	);

	// COPYRIGHT MESSAGE START.
	$wp_customize->add_setting(
		'dcg_footer_copyright_text',
		array(
			'default'           => 'All Rights Reserved',
			'sanitize_callback' => 'dcg_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'dcg_footer_copyright_text',
		array(
			'section' => 'dcg_display_options',
			'label'   => 'Copyright Message',
			'type'    => 'text',
		)
	);

}

/**
 * Sanitizes the incoming input and returns it prior to serialization.
 *
 * @param   string $input The string to sanitize.
 * @return  string The sanitized string
 * @package digital-creative-agency
 * @since   0.5.0
 * @version 1.0.2
 */
function dcg_sanitize_input( $input ) {
	return wp_strip_all_tags( stripslashes( $input ) );
} // end dcg_sanitize_input

/**
 * Writes styles out the `<head>` element of the page based on the configuration options
 * saved in the Theme Customizer.
 *
 * @since   0.2.0
 * @version 1.0.1
 */
function dcg_customizer_css() { ?>
	<style type="text/css">
		<?php if ( get_theme_mod( 'dcg_navigation_layout_select' ) === 'centered' ) { ?>
			.nav-primary {
				border-top: none;
				text-align: center;
			}
			.nav-header-left {
				float: left;
				text-align: center;
				width: 40%;
			}
			.nav-header-right {
				float: right;
				text-align: center;
				width: 40%;
			}
			.header-full-width .title-area {
				float: none;
				margin: 0 auto;
				text-align: center;
				width: 20%;
			}
			@media (max-width: 1023px) {
				.header-full-width .title-area {
					margin-top: 25px;
					max-width: 200px;
					width: 100%;
				}
			}
		<?php } ?>

		<?php if ( get_theme_mod( 'dcg_navigation_layout_select' ) === 'right' ) { ?>
			.nav-primary {
				border-top: none;
				float: right;
				text-align: right;
				width: 75%;
			}
			.header-full-width .title-area {
				float: left;
				width: 25%;
			}
		<?php } ?>

		<?php if ( get_theme_mod( 'dcg_navigation_layout_select' ) === 'top' ) { ?>
			@media only screen and (min-width: 960px) {
				.site-header {
					position: relative;
				}
			}
			.header-image .title-area {
				max-width: 400px;
			}
			.header-image .site-title>a {
				display: block;
				float: none;
				min-height: 165px;
			}
			.nav-primary {
				border-top: none;
				text-align: center;
			}
		<?php } ?>

		<?php if ( get_theme_mod( 'dcg_navigation_layout_select' ) === 'below' ) { ?>
			@media only screen and (min-width: 960px) {
				.site-header {
					position: relative;
				}
			}
			.nav-primary {
				float: none;
				padding: 15px 30px;
			}
			.menu-toggle {
				float: none;
				margin: 10px auto;
			}
		<?php } ?>

		<?php if ( get_theme_mod( 'dcg_header_image' ) ) { ?>
			<?php if ( ! is_front_page() ) { ?>
				.site-header {
					background: url('<?php echo esc_html( get_theme_mod( 'dcg_header_image' ) ); ?>') no-repeat center;
					background-size: cover;
				}
				.site-header::after {
					background: rgba(255,255,255,0.6);
					content: '';
					display: block;
					height: 100%;
					left: 0;
					position: absolute;
					top: 0;
					width: 100%;
					z-index: 0;
				}
			<?php } ?>
		<?php } ?>
	</style>
	<?php
} // end dcg_customizer_css
add_action( 'wp_head', 'dcg_customizer_css' );
