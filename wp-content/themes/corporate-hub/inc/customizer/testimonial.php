<?php
/**
 * testimonial section
 *
 * @package corporate_hub
 */

$default = corporate_hub_get_default_theme_options();

// testimonial Main Section.
$wp_customize->add_section( 'testimonial_section_settings',
	array(
		'title'      => __( 'Testimonial Section', 'corporate-hub' ),
		'priority'   => 160,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);


// Setting - show-testimonial-section.
$wp_customize->add_setting( 'theme_options[show-testimonial-section]',
	array(
		'default'           => $default['show-testimonial-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show-testimonial-section]',
	array(
		'label'    => __( 'Enable Testimonial', 'corporate-hub' ),
		'section'  => 'testimonial_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting testimonial-section-background_image.
$wp_customize->add_setting( 'theme_options[testimonial-section-background_image]',
	array(
	'default'           => $default['testimonial-section-background_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_hub_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'theme_options[testimonial-section-background_image]',
		array(
		'label'           => __( 'Testimonial Section Background Image.', 'corporate-hub' ),
		'description'	  => sprintf( __( 'Recommended Size %1$s X %2$s', 'corporate-hub' ), 1400, 335 ),
		'section'         => 'testimonial_section_settings',
		'priority'        => 102,

		)
	)
);

// Setting - title-testimonial-section.
$wp_customize->add_setting( 'theme_options[title-testimonial-section]',
	array(
		'default'           => $default['title-testimonial-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[title-testimonial-section]',
	array(
		'label'    => __( 'Section Title', 'corporate-hub' ),
		'section'  => 'testimonial_section_settings',
		'type'     => 'text',
		'priority' => 104,
	)
);


/*No of testimonial*/
$wp_customize->add_setting( 'theme_options[number-of-home-testimonial]',
	array(
		'default'           => $default['number-of-home-testimonial'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[number-of-home-testimonial]',
	array(
		'label'    => __( 'Select no of testimonial', 'corporate-hub' ),
        'description'     => __( 'If you are using selection "from page" option please refresh to get actual no of page', 'corporate-hub' ),
		'section'  => 'testimonial_section_settings',
		'choices'               => array(
		    '1' => __( '1', 'corporate-hub' ),
		    '2' => __( '2', 'corporate-hub' ),
		    '3' => __( '3', 'corporate-hub' )
		    ),
		'type'     => 'select',
		'priority' => 105,
	)
);

/*content excerpt in testimonial*/
$wp_customize->add_setting( 'theme_options[number-of-content-home-testimonial]',
	array(
		'default'           => $default['number-of-content-home-testimonial'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[number-of-content-home-testimonial]',
	array(
		'label'    => __( 'Select no words of testimonial', 'corporate-hub' ),
		'section'  => 'testimonial_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

// Setting - select-testimonial-from.
$wp_customize->add_setting( 'theme_options[select-testimonial-from]',
	array(
		'default'           => $default['select-testimonial-from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[select-testimonial-from]',
	array(
		'label'       => __( 'Select testimonial From', 'corporate-hub' ),
		'section'     => 'testimonial_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'from-page' => __( 'Page', 'corporate-hub' ),
		    'from-category' => __( 'Category', 'corporate-hub' )
		    ),
		'priority'    => 110,
	)
);

for ( $i=1; $i <=  corporate_hub_get_option( 'number-of-home-testimonial' ) ; $i++ ) {
        $wp_customize->add_setting( 'theme_options[select-page-for-testimonial_'. $i .']', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
            
        ) );

        $wp_customize->add_control( 'theme_options[select-page-for-testimonial_'. $i .']', array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'testimonial From Page', 'corporate-hub' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'testimonial_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 120,
            'active_callback' 	=> 'corporate_hub_is_select_page_testimonial',
            )
        );
    }

// Setting - drop down category for testimonial.
$wp_customize->add_setting( 'theme_options[select-category-for-testimonial]',
	array(
		'default'           => $default['select-category-for-testimonial'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Corporate_Hub_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[select-category-for-testimonial]',
	array(
        'label'           => __( 'Category for Testimonial ', 'corporate-hub' ),
        'description'     => __( 'Select category to be shown on tab ', 'corporate-hub' ),
        'section'         => 'testimonial_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 130,
		'active_callback' => 'corporate_hub_is_select_cat_testimonial',

    ) ) );
