<?php
/**
 * Recent Work section
 *
 * @package corporate_hub
 */

$default = corporate_hub_get_default_theme_options();

// work Main Section.
$wp_customize->add_section( 'recent_work_section_settings',
	array(
		'title'      => __( 'Recent Work Section', 'corporate-hub' ),
		'priority'   => 140,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show-recent-work-section.
$wp_customize->add_setting( 'theme_options[show-recent-work-section]',
	array(
		'default'           => $default['show-recent-work-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show-recent-work-section]',
	array(
		'label'    => __( 'Enable Recent Work', 'corporate-hub' ),
		'section'  => 'recent_work_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Setting - show-recent-work-section.
$wp_customize->add_setting( 'theme_options[select-recent-work-main-page]',
	array(
		'default'           => $default['select-recent-work-main-page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control( 'theme_options[select-recent-work-main-page]',
	array(
		'label'    => __( 'Select Main work Page', 'corporate-hub' ),
		'section'  => 'recent_work_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 130,
	)
);

/*content excerpt in recent work*/
$wp_customize->add_setting( 'theme_options[number-of-content-home-recent-work]',
	array(
		'default'           => $default['number-of-content-home-recent-work'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[number-of-content-home-recent-work]',
	array(
		'label'    => __( 'Select no words of recent work', 'corporate-hub' ),
		'section'  => 'recent_work_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);


/*No of recent-work*/
$wp_customize->add_setting( 'theme_options[number-of-home-recent-work]',
	array(
		'default'           => $default['number-of-home-recent-work'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[number-of-home-recent-work]',
	array(
		'label'    => __( 'Select No Of Recent Work', 'corporate-hub' ),
        'description'     => __( 'After choosing "Select No Of Recent Work" option please save and publish and refresh to get actual no of field for icon and page bellow.', 'corporate-hub' ),
		'section'  => 'recent_work_section_settings',
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


// Setting - select-recent-work-from.
$wp_customize->add_setting( 'theme_options[select-recent-work-from]',
	array(
		'default'           => $default['select-recent-work-from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[select-recent-work-from]',
	array(
		'label'       => __( 'Select Recent Work From', 'corporate-hub' ),
		'section'     => 'recent_work_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'from-page' => __( 'Page', 'corporate-hub' ),
		    'from-category' => __( 'Category', 'corporate-hub' )
		    ),
		'priority'    => 210,
	)
);


for ( $i=1; $i <=  corporate_hub_get_option( 'number-of-home-recent-work' ) ; $i++ ) {
        $wp_customize->add_setting( 'theme_options[select-page-for-recent-work_'. $i .']', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'theme_options[select-page-for-recent-work_'. $i .']', array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Recent Work From Page', 'corporate-hub' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'recent_work_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 220,
            'active_callback' 	=> 'corporate_hub_is_select_page_recent_work',
            )
        );
    }

// Setting - drop down category for recent work.
$wp_customize->add_setting( 'theme_options[select-category-for-recent-work]',
	array(
		'default'           => $default['select-category-for-recent-work'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Corporate_Hub_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[select-category-for-recent-work]',
	array(
        'label'           => __( 'Category For Recent Work Section', 'corporate-hub' ),
        'description'     => __( 'Select category to be shown on tab ', 'corporate-hub' ),
        'section'         => 'recent_work_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 230,
		'active_callback' => 'corporate_hub_is_select_cat_recent_work',
    ) ) );
