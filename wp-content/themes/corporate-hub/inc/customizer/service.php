<?php
/**
 * Service section
 *
 * @package corporate_hub
 */

$default = corporate_hub_get_default_theme_options();

// Service Main Section.
$wp_customize->add_section( 'service_section_settings',
	array(
		'title'      => __( 'Service Section', 'corporate-hub' ),
		'priority'   => 130,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show-service-section.
$wp_customize->add_setting( 'theme_options[show-service-section]',
	array(
		'default'           => $default['show-service-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show-service-section]',
	array(
		'label'    => __( 'Enable Service', 'corporate-hub' ),
		'section'  => 'service_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

/*content excerpt in service*/
$wp_customize->add_setting( 'theme_options[number-of-content-home-service]',
	array(
		'default'           => $default['number-of-content-home-service'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[number-of-content-home-service]',
	array(
		'label'    => __( 'Select no words of service', 'corporate-hub' ),
		'section'  => 'service_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

// Setting - show-service-section.
$wp_customize->add_setting( 'theme_options[select-service-main-page]',
	array(
		'default'           => $default['select-service-main-page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control( 'theme_options[select-service-main-page]',
	array(
		'label'    => __( 'Select Main work Page', 'corporate-hub' ),
		'section'  => 'service_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 130,
	)
);



/*No of service*/
$wp_customize->add_setting( 'theme_options[number-of-home-service]',
	array(
		'default'           => $default['number-of-home-service'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[number-of-home-service]',
	array(
		'label'    => __( 'Select No Of Service', 'corporate-hub' ),
        'description'     => __( 'After choosing "Select No Of Service" option please save and publish and refresh to get actual no of field for icon and page bellow.', 'corporate-hub' ),
		'section'  => 'service_section_settings',
		'choices'               => array(
		    '1' => __( '1', 'corporate-hub' ),
		    '2' => __( '2', 'corporate-hub' ),
		    '3' => __( '3', 'corporate-hub' ),
		    '4' => __( '4', 'corporate-hub' )
		    ),
		'type'     => 'select',
		'priority' => 170,
	)
);


for ( $i=1; $i <=  corporate_hub_get_option( 'number-of-home-service' ) ; $i++ ) {
        $wp_customize->add_setting( 'theme_options[select-page-for-service_'. $i .']', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'theme_options[select-page-for-service_'. $i .']', array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Service From Page', 'corporate-hub' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'service_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 220,
            )
        );
    }

    
    /*Button Text*/
    $wp_customize->add_setting( 'theme_options[corporate-hub-tab-button-text]',
    	array(
    		'default'           => $default['corporate-hub-tab-button-text'],
    		'capability'        => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_text_field',
    	)
    );
    $wp_customize->add_control( 'theme_options[corporate-hub-tab-button-text]',
    	array(
    		'label'    => __( 'Button Text', 'corporate-hub' ),
    		'description'     => __( 'Removing text will disable button on the Service Section', 'corporate-hub' ),
    		'section'  => 'service_section_settings',
    		'type'     => 'text',
    		'priority' => 225,
    	)
    );

