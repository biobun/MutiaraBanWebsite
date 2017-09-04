<?php
/**
 * about section
 *
 * @package corporate_hub
 */

$default = corporate_hub_get_default_theme_options();
// our expertise Main Section.
$wp_customize->add_section( 'expertise_section_settings',
	array(
		'title'      => esc_html__( 'Expertise Section', 'corporate-hub' ),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show-work-process-section.
$wp_customize->add_setting( 'theme_options[show-our-expertise-section]',
	array(
		'default'           => $default['show-our-expertise-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show-our-expertise-section]',
	array(
		'label'    => esc_html__( 'Enable Expertise Section', 'corporate-hub' ),
		'section'  => 'expertise_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - show-work-process-section.
$wp_customize->add_setting( 'theme_options[our-expertise-section-title]',
	array(
		'default'           => $default['our-expertise-section-title'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[our-expertise-section-title]',
	array(
		'label'    => esc_html__( 'Title For Expertise Section', 'corporate-hub' ),
		'section'  => 'expertise_section_settings',
		'type'     => 'text',
		'priority' => 100,
	)
);


/*No of expertise*/
$wp_customize->add_setting( 'theme_options[number-of-home-expertise]',
	array(
		'default'           => $default['number-of-home-expertise'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[number-of-home-expertise]',
	array(
		'label'    => esc_html__( 'Select No Of Expertise', 'corporate-hub' ),
        'description'     => __( 'After choosing "Select No Of expertise" option please save and publish and refresh to get actual no of field for page if you have choosed page field bellow.', 'corporate-hub' ),
		'section'  => 'expertise_section_settings',
		'choices'               => array(
		    '1' => __( '1', 'corporate-hub' ),
		    '2' => __( '2', 'corporate-hub' ),
		    '3' => __( '3', 'corporate-hub' )
		    ),
		'type'     => 'select',
		'priority' => 170,
	)
);

/*content excerpt in expertise*/
$wp_customize->add_setting( 'theme_options[number-of-content-home-expertise]',
	array(
		'default'           => $default['number-of-content-home-expertise'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[number-of-content-home-expertise]',
	array(
		'label'    => esc_html__( 'Select No Words Of Expertise', 'corporate-hub' ),
		'section'  => 'expertise_section_settings',
		'type'     => 'number',
		'priority' => 180,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

// Setting - select-expertise-from.
$wp_customize->add_setting( 'theme_options[select-expertise-from]',
	array(
		'default'           => $default['select-expertise-from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[select-expertise-from]',
	array(
		'label'       => esc_html__( 'Select Expertise From', 'corporate-hub' ),
		'section'     => 'expertise_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'from-page' => __( 'Page', 'corporate-hub' ),
		    'from-category' => __( 'Category', 'corporate-hub' )
		    ),
		'priority'    => 210,
	)
);

/*expertise from page*/
for ( $i=1; $i <=  corporate_hub_get_option( 'number-of-home-expertise' ) ; $i++ ) {
        $wp_customize->add_setting( 'theme_options[select-page-for-expertise-'. $i .']', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'theme_options[select-page-for-expertise-'. $i .']', array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Expertise From Page', 'corporate-hub' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'expertise_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 220,
            'active_callback' 	=> 'corporate_hub_is_select_page_expertise',
            )
        );
    }

// Setting - drop down category for expertise.
$wp_customize->add_setting( 'theme_options[select-category-for-expertise]',
	array(
		'default'           => $default['select-category-for-expertise'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Corporate_Hub_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[select-category-for-expertise]', 
	array(
        'label'           => __( 'Category For Expertise Section', 'corporate-hub' ),
        'description'     => __( 'Select category to be shown on tab ', 'corporate-hub' ),
        'section'         => 'expertise_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 230,
		'active_callback' => 'corporate_hub_is_select_cat_expertise',
    ) ) );


/*about section*/

// our about Main Section.
$wp_customize->add_section( 'about_section_settings',
	array(
		'title'      => esc_html__( 'About Section', 'corporate-hub' ),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show-work-process-section.
$wp_customize->add_setting( 'theme_options[show-our-about-section]',
	array(
		'default'           => $default['show-our-about-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show-our-about-section]',
	array(
		'label'    => esc_html__( 'Enable About Section', 'corporate-hub' ),
		'section'  => 'about_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - show-about-section.
$wp_customize->add_setting( 'theme_options[select-about-main-page]',
	array(
		'default'           => $default['select-about-main-page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control( 'theme_options[select-about-main-page]',
	array(
		'label'    => esc_html__( 'Select Main About Page', 'corporate-hub' ),
		'section'  => 'about_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 130,
	)
);


/*No of about*/
$wp_customize->add_setting( 'theme_options[number-of-home-about]',
	array(
		'default'           => $default['number-of-home-about'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[number-of-home-about]',
	array(
		'label'    => esc_html__( 'Select No Of About', 'corporate-hub' ),
        'description'     => __( 'After choosing "Select No Of about" option please save and publish and refresh to get actual no of field for page if you have choosed page field bellow.', 'corporate-hub' ),
		'section'  => 'about_section_settings',
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

/*content excerpt in about*/
$wp_customize->add_setting( 'theme_options[number-of-content-home-about]',
	array(
		'default'           => $default['number-of-content-home-about'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[number-of-content-home-about]',
	array(
		'label'    => esc_html__( 'Select No Words Of About', 'corporate-hub' ),
		'section'  => 'about_section_settings',
		'type'     => 'number',
		'priority' => 180,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

/*No of font icon*/

/*about from page*/
for ( $i=1; $i <=  corporate_hub_get_option( 'number-of-home-about' ) ; $i++ ) {
		$wp_customize->add_setting( 'theme_options[number-of-home-about-icon-'. $i .']', array(
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'theme_options[number-of-home-about-icon-'. $i .']', array(
		    'input_attrs'       => array(
		        'style'           => 'width: 250px;'
		        ),
		    'label'             => esc_html__( 'Font Icon', 'corporate-hub' ) . ' - ' . $i ,
			'description'     => sprintf( __( 'Use icomoon icon: Eg: %1$s. %2$s See more here %3$s', 'corporate-hub' ), 'ion-android-bulb','<a href="'.esc_url('http://ionicons.com/cheatsheet.html').'" target="_blank">','</a>' ),
		    'priority'          =>  '120' . $i,
		    'section'           => 'about_section_settings',
		    'type'        		=> 'text',
		    'priority'    		=> 180,
		    )
		);

        $wp_customize->add_setting( 'theme_options[select-page-for-about-'. $i .']', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'theme_options[select-page-for-about-'. $i .']', array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'About From Page', 'corporate-hub' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'about_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 180,
            )
        );
    }