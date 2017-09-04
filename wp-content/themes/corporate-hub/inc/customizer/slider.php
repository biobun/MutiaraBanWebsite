<?php
/**
 * slider section
 *
 * @package corporate_hub
 */

$default = corporate_hub_get_default_theme_options();

// Slider Main Section.
$wp_customize->add_section( 'slider_section_settings',
	array(
		'title'      => __( 'Slider Section', 'corporate-hub' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);


// Setting - show-slider-section.
$wp_customize->add_setting( 'theme_options[show-slider-section]',
	array(
		'default'           => $default['show-slider-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show-slider-section]',
	array(
		'label'    => __( 'Enable Slider', 'corporate-hub' ),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

/*No of Slider*/
$wp_customize->add_setting( 'theme_options[number-of-home-slider]',
	array(
		'default'           => $default['number-of-home-slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[number-of-home-slider]',
	array(
		'label'    => __( 'Select no of slider', 'corporate-hub' ),
        'description'     => __( 'If you are using selection "from page" option please refresh to get actual no of page', 'corporate-hub' ),
		'section'  => 'slider_section_settings',
		'choices'               => array(
		    '1' => __( '1', 'corporate-hub' ),
		    '2' => __( '2', 'corporate-hub' ),
		    '3' => __( '3', 'corporate-hub' )
		    ),
		'type'     => 'select',
		'priority' => 105,
	)
);

/*content excerpt in Slider*/
$wp_customize->add_setting( 'theme_options[number-of-content-home-slider]',
	array(
		'default'           => $default['number-of-content-home-slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[number-of-content-home-slider]',
	array(
		'label'    => __( 'Select no words of slider', 'corporate-hub' ),
		'section'  => 'slider_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);


// Setting - select-slider-from.
$wp_customize->add_setting( 'theme_options[select-slider-from]',
	array(
		'default'           => $default['select-slider-from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[select-slider-from]',
	array(
		'label'       => __( 'Select Slider From', 'corporate-hub' ),
		'section'     => 'slider_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'from-page' => __( 'Page', 'corporate-hub' ),
		    'from-category' => __( 'Category', 'corporate-hub' )
		    ),
		'priority'    => 110,
	)
);

for ( $i=1; $i <=  corporate_hub_get_option( 'number-of-home-slider' ) ; $i++ ) {
        $wp_customize->add_setting( 'theme_options[select-page-for-slider_'. $i .']', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'theme_options[select-page-for-slider_'. $i .']', array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Slider From Page', 'corporate-hub' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'slider_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 120,
            'active_callback' 	=> 'corporate_hub_is_select_page_slider',
            )
        );
    }

// Setting - drop down category for slider.
$wp_customize->add_setting( 'theme_options[select-category-for-slider]',
	array(
		'default'           => $default['select-category-for-slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Corporate_Hub_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[select-category-for-slider]',
	array(
        'label'           => __( 'Category for slider', 'corporate-hub' ),
        'description'     => __( 'Select category to be shown on tab ', 'corporate-hub' ),
        'section'         => 'slider_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 130,
		'active_callback' => 'corporate_hub_is_select_cat_slider',

    ) ) );

/*settings for Section property*/
/*Button Text*/
$wp_customize->add_setting( 'theme_options[button-text-on-slider]',
	array(
		'default'           => $default['button-text-on-slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[button-text-on-slider]',
	array(
		'label'    => __( 'Button Text', 'corporate-hub' ),
		'description'     => __( 'Removing text will disable button on the slider', 'corporate-hub' ),
		'section'  => 'slider_section_settings',
		'type'     => 'text',
		'priority' => 170,
	)
);

