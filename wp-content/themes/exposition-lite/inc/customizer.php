<?php
/**
 * Exposition Theme Customizer
 *
 * @package Exposition
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themefurnace_customize_register( $wp_customize )
{
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// custom handler - textarea
	class themefurnace_Textarea_Control extends WP_Customize_Control
	{
		public $type = 'textarea';

		public function render_content()
		{
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5"
						  style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}

}

add_action( 'customize_register', 'themefurnace_customize_register' );

function themefurnace_sanitize_menu_position( $value )
{
	if ( !in_array( $value, array( 'left', 'top' ) ) ) {
		$value = 'left';
	}

	return $value;
}

function themefurnace_sanitize_color_hex( $value )
{
	if ( !preg_match( '/\#[a-fA-F0-9]{6}/', $value ) ) {
		$value = '#ffffff';
	}

	return $value;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function themefurnace_customize_preview_js()
{
	wp_enqueue_script( 'themefurnace_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

add_action( 'customize_preview_init', 'themefurnace_customize_preview_js' );


function themefurnace_customizer( $wp_customize )
{


	$wp_customize->add_section( 'themefurnacefooter', array(
		'title'       => 'Footer Text', // The title of section
		'priority'    => 50,
		'description' => 'Footer Text', // The description of section
	) );

	$wp_customize->add_setting( 'themefurnacefooter_footer_text', array(
		'default'           => 'Hello world',
		'sanitize_callback' => 'sanitize_text_field',
		// Let everything else default
	) );
	$wp_customize->add_control( 'themefurnacefooter_footer_text', array(
		// wptuts_welcome_text is a id of setting that this control handles
		'label'   => 'Footer Text',
		// 'type' =>, // Default is "text", define the content type of setting rendering.
		'section' => 'themefurnacefooter', // id of section to which the setting belongs
		// Let everything else default
	) );


	$wp_customize->add_section( 'themefurnace_logo_section', array(
		'title'       => __( 'Logo', 'themefurnace' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	) );


	$wp_customize->add_setting( 'themefurnace_logo', array( 'default' => get_template_directory_uri() . '/img/logo.png', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_setting( 'themefurnace_footer_logo', array( 'default' => get_template_directory_uri() . '/img/footer-logo.png', 'sanitize_callback' => 'esc_url_raw' ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themefurnace_logo', array(
		'label'    => __( 'Logo', 'themefurnace' ),
		'section'  => 'themefurnace_logo_section',
		'settings' => 'themefurnace_logo',
	) ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themefurnace_footer_logo', array(
		'label'    => __( 'Footer Logo', 'themefurnace' ),
		'section'  => 'themefurnace_logo_section',
		'settings' => 'themefurnace_footer_logo',
	) ) );


	// $font_choices array from php file
	require_once( dirname( __FILE__ ) . '/google-fonts/fonts.php' );


	$wp_customize->add_section( 'google_fonts', array(
		'title'    => __( 'Fonts', 'themefurnace' ),
		'priority' => 50,
	) );

	$wp_customize->add_setting( 'google_fonts_heading_font', array(
		'default'           => 'none',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'google_fonts_heading_font', array(
		'label'    => __( 'Header Font', 'themefurnace' ),
		'section'  => 'google_fonts',
		'settings' => 'google_fonts_heading_font',
		'type'     => 'select',
		'choices'  => $font_choices,
	) );

	$wp_customize->add_setting( 'google_fonts_body_font', array(
		'default'           => 'none',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'google_fonts_body_font', array(
		'label'    => __( 'Body Font', 'themefurnace' ),
		'section'  => 'google_fonts',
		'settings' => 'google_fonts_body_font',
		'type'     => 'select',
		'choices'  => $font_choices,
	) );


	$wp_customize->add_section( 'themefurnace_colors', array(
			'title'    => __( 'Colors', 'themefurnace' ),
			'priority' => 35,
		)
	);

	$wp_customize->add_setting( 'content_color', array(
			'default'           => '#ffffff',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'themefurnace_sanitize_color_hex',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content', array(
		'label'    => __( 'Content color', 'themefurnace' ),
		'section'  => 'colors',
		'settings' => 'content_color',
	) ) );


	$wp_customize->add_setting( 'text_color', array(
			'default'           => '#222222',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'themefurnace_sanitize_color_hex',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text', array(
		'label'    => __( 'Text color', 'themefurnace' ),
		'section'  => 'colors',
		'settings' => 'text_color',
	) ) );


	$wp_customize->add_setting( 'headings_color', array(
			'default'           => '#303030',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'themefurnace_sanitize_color_hex',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headings', array(
		'label'    => __( 'Headings color', 'themefurnace' ),
		'section'  => 'colors',
		'settings' => 'headings_color',
	) ) );


	$wp_customize->add_setting( 'link_color', array(
			'default'           => '#D0B431',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'themefurnace_sanitize_color_hex',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link', array(
		'label'    => __( 'Link color', 'themefurnace' ),
		'section'  => 'colors',
		'settings' => 'link_color',
	) ) );

	$wp_customize->add_setting( 'footer_color', array(
			'default'           => '#1e1e1e',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'themefurnace_sanitize_color_hex',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer', array(
		'label'    => __( 'Footer color', 'themefurnace' ),
		'section'  => 'colors',
		'settings' => 'footer_color',
	) ) );

	$wp_customize->add_section( 'themefurnace_menu_position_section', array(
		'title'    => __( 'Menu Position', 'themefurnace' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'themefurnace_menu_position', array(
			'default'           => 'left',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'themefurnace_sanitize_menu_position',
		)
	);

	$wp_customize->add_control( 'themefurnace_menu_position',
		array(
			'label'    => __( 'Menu Position', 'themefurnace' ),
			'section'  => 'themefurnace_menu_position_section',
			'settings' => 'themefurnace_menu_position',
			'type'     => 'radio',
			'choices'  => array(
				'left' => 'left',
				'top'  => 'top',
			),
		)
	);


}

add_action( 'customize_register', 'themefurnace_customizer', 11 );

