<?php 

/**
 * Theme Options Panel.
 *
 * @package corporate_hub
 */

$default = corporate_hub_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'corporate-hub' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

/*layout management section start */
$wp_customize->add_section( 'theme_option_section_settings',
	array(
		'title'      => esc_html__( 'Layout Management', 'corporate-hub' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);


/*Home Page Layout*/
$wp_customize->add_setting( 'theme_options[enable-overlay-option]',
	array(
		'default'           => $default['enable-overlay-option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable-overlay-option]',
	array(
		'label'    => esc_html__( 'Enable Banner Overlay', 'corporate-hub' ),
		'section'  => 'theme_option_section_settings',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting( 'theme_options[enable-moving-animation-option]',
	array(
		'default'           => $default['enable-moving-animation-option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable-moving-animation-option]',
	array(
		'label'    => esc_html__( 'Enable Banner Moving Animation', 'corporate-hub' ),
		'section'  => 'theme_option_section_settings',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting( 'theme_options[homepage-layout-option]',
	array(
		'default'           => $default['homepage-layout-option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[homepage-layout-option]',
	array(
		'label'    => esc_html__( 'Home Page Layout', 'corporate-hub' ),
		'section'  => 'theme_option_section_settings',
		'choices'  => array(
                'full-width' => __( 'Full Width', 'corporate-hub' ),
                'boxed' => __( 'Boxed', 'corporate-hub' ),
		    ),
		'type'     => 'select',
		'priority' => 160,
	)
);

/*Global Layout*/
$wp_customize->add_setting( 'theme_options[global-layout]',
	array(
		'default'           => $default['global-layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global-layout]',
	array(
		'label'    => esc_html__( 'Global Layout', 'corporate-hub' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
                'right-sidebar' => __( 'Content - Primary Sidebar', 'corporate-hub' ),
                'left-sidebar' => __( 'Primary Sidebar - Content', 'corporate-hub' ),
                'no-sidebar' => __( 'No Sidebar', 'corporate-hub' )
		    ),
		'type'     => 'select',
		'priority' => 170,
	)
);


/*content excerpt in global*/
$wp_customize->add_setting( 'theme_options[excerpt-length-global]',
	array(
		'default'           => $default['excerpt-length-global'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt-length-global]',
	array(
		'label'    => esc_html__( 'Set Global Archive Length', 'corporate-hub' ),
		'section'  => 'theme_option_section_settings',
		'type'     => 'number',
		'priority' => 175,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

/*Archive Layout text*/
$wp_customize->add_setting( 'theme_options[archive-layout]',
	array(
		'default'           => $default['archive-layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive-layout]',
	array(
		'label'    => esc_html__( 'Archive Layout', 'corporate-hub' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
			'excerpt-only' => __( 'Excerpt Only', 'corporate-hub' ),
			'full-post' => __( 'Full Post', 'corporate-hub' ),
		    ),
		'type'     => 'select',
		'priority' => 180,
	)
);

/*Archive Layout image*/
$wp_customize->add_setting( 'theme_options[archive-layout-image]',
	array(
		'default'           => $default['archive-layout-image'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive-layout-image]',
	array(
		'label'    => esc_html__( 'Archive Image Alocation', 'corporate-hub' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
			'full' => __( 'Full', 'corporate-hub' ),
			'right' => __( 'Right', 'corporate-hub' ),
			'left' => __( 'Left', 'corporate-hub' ),
			'no-image' => __( 'No image', 'corporate-hub' )
		    ),
		'type'     => 'select',
		'priority' => 185,
	)
);

/*single post Layout image*/
$wp_customize->add_setting( 'theme_options[single-post-image-layout]',
	array(
		'default'           => $default['single-post-image-layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[single-post-image-layout]',
	array(
		'label'    => esc_html__( 'Single Post/Page Image Alocation', 'corporate-hub' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
			'full' => __( 'Full', 'corporate-hub' ),
			'right' => __( 'Right', 'corporate-hub' ),
			'left' => __( 'Left', 'corporate-hub' ),
			'no-image' => __( 'No image', 'corporate-hub' )
		    ),
		'type'     => 'select',
		'priority' => 190,
	)
);


// Pagination Section.
$wp_customize->add_section( 'pagination-section',
	array(
	'title'      => __( 'Pagination Options', 'corporate-hub' ),
	'priority'   => 110,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination-type.
$wp_customize->add_setting( 'theme_options[pagination-type]',
	array(
	'default'           => $default['pagination-type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[pagination-type]',
	array(
	'label'       => __( 'Pagination Type', 'corporate-hub' ),
	'section'     => 'pagination-section',
	'type'        => 'select',
	'choices'               => array(
		'default' => __( 'Default (Older / Newer Post)', 'corporate-hub' ),
		'numeric' => __( 'Numeric', 'corporate-hub' ),
	    ),
	'priority'    => 100,
	)
);



// Footer Section.
$wp_customize->add_section( 'footer-section',
	array(
	'title'      => __( 'Footer Options', 'corporate-hub' ),
	'priority'   => 130,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);


// Setting social-content-heading.
$wp_customize->add_setting( 'theme_options[number-of-footer-widget]',
	array(
	'default'           => $default['number-of-footer-widget'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[number-of-footer-widget]',
	array(
	'label'    => __( 'Number Of Footer Widget', 'corporate-hub' ),
	'section'  => 'footer-section',
	'type'     => 'select',
	'priority' => 100,
	'choices'               => array(
		0 => __( 'Disable footer sidebar area', 'corporate-hub' ),
		1 => __( '1', 'corporate-hub' ),
		2 => __( '2', 'corporate-hub' ),
		3 => __( '3', 'corporate-hub' ),
		4 => __( '4', 'corporate-hub' )
	    ),
	)
);

// Setting social-content-heading.
$wp_customize->add_setting( 'theme_options[social-content-heading]',
	array(
	'default'           => $default['social-content-heading'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[social-content-heading]',
	array(
	'label'    => __( 'Footer Social Title', 'corporate-hub' ),
	'section'  => 'footer-section',
	'type'     => 'text',
	'priority' => 100,
	)
);
// Setting social-icon-style.
$wp_customize->add_setting( 'theme_options[social-icon-style]',
	array(
	'default'           => $default['social-icon-style'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[social-icon-style]',
	array(
	'label'       => __( 'Social Icon Style', 'corporate-hub' ),
	'section'     => 'footer-section',
	'type'        => 'select',
	'choices'               => array(
		'square' => __( 'Square', 'corporate-hub' ),
		'circle' => __( 'Circle', 'corporate-hub' ),
	    ),
	'priority'    => 110,
	)
);

// Setting copyright-text.
$wp_customize->add_setting( 'theme_options[copyright-text]',
	array(
	'default'           => $default['copyright-text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[copyright-text]',
	array(
	'label'    => __( 'Footer Copyright Text', 'corporate-hub' ),
	'section'  => 'footer-section',
	'type'     => 'text',
	'priority' => 120,
	)
);


// dissable theme name
$wp_customize->add_setting( 'theme_options[dissable-theme-name]',
	array(
	'default'           => $default['dissable-theme-name'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[dissable-theme-name]',
	array(
	'label'    => __( 'Dissable Footer Creadit Option', 'corporate-hub' ),
	'section'  => 'footer-section',
	'type'     => 'checkbox',
	'priority' => 130,
	)
);


// Breadcrumb Section.
$wp_customize->add_section( 'breadcrumb-section',
	array(
	'title'      => __( 'Breadcrumb Options', 'corporate-hub' ),
	'priority'   => 120,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb-type.
$wp_customize->add_setting( 'theme_options[breadcrumb-type]',
	array(
	'default'           => $default['breadcrumb-type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb-type]',
	array(
	'label'       => __( 'Breadcrumb Type', 'corporate-hub' ),
	'description' => sprintf( __( 'Advanced: Requires %1$s Breadcrumb NavXT %2$s plugin', 'corporate-hub' ), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>' ),
	'section'     => 'breadcrumb-section',
	'type'        => 'select',
	'choices'               => array(
		'disabled' => __( 'Disabled', 'corporate-hub' ),
		'simple' => __( 'Simple', 'corporate-hub' ),
		'advanced' => __( 'Advanced', 'corporate-hub' ),
	    ),
	'priority'    => 100,
	)
);

if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	// Advanced Section.
	$wp_customize->add_section( 'custom-section',
		array(
		'title'      => __( 'Custom CSS', 'corporate-hub' ),
		'priority'   => 150,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
		)
	);

	// Setting custom-css.
	$wp_customize->add_setting( 'theme_options[custom-css]',
		array(
		'default'              => $default['custom-css'],
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_strip_all_tags',
		'sanitize_js_callback' => 'wp_strip_all_tags',
		)
	);
	$wp_customize->add_control( 'theme_options[custom-css]',
		array(
		'label'    => __( 'Custom CSS', 'corporate-hub' ),
		'section'  => 'custom-section',
		'type'     => 'textarea',
		'priority' => 100,
		)
	);
}
