<?php
/**
 * Team section
 *
 * @package corporate_hub
 */

$default = corporate_hub_get_default_theme_options();

// Team Main Section.
$wp_customize->add_section( 'team_section_settings',
	array(
		'title'      => __( 'Team Section', 'corporate-hub' ),
		'priority'   => 170,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show-team-section.
$wp_customize->add_setting( 'theme_options[show-team-section]',
	array(
		'default'           => $default['show-team-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show-team-section]',
	array(
		'label'    => __( 'Enable Team', 'corporate-hub' ),
		'section'  => 'team_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Setting - title-team-section.
$wp_customize->add_setting( 'theme_options[title-team-section]',
	array(
		'default'           => $default['title-team-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[title-team-section]',
	array(
		'label'    => __( 'Section Title', 'corporate-hub' ),
		'section'  => 'team_section_settings',
		'type'     => 'text',
		'priority' => 104,
	)
);


/*No of team*/
$wp_customize->add_setting( 'theme_options[number-of-home-team]',
	array(
		'default'           => $default['number-of-home-team'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[number-of-home-team]',
	array(
		'label'    => __( 'Select No Of Team', 'corporate-hub' ),
        'description'     => __( 'If you are using selection "from page" option please refresh to get actual no of page', 'corporate-hub' ),
		'section'  => 'team_section_settings',
		'choices'               => array(
		    '1' => __( '1', 'corporate-hub' ),
		    '2' => __( '2', 'corporate-hub' ),
		    '3' => __( '3', 'corporate-hub' )
		    ),
		'type'     => 'select',
		'priority' => 105,
	)
);

/*content excerpt in team*/
$wp_customize->add_setting( 'theme_options[number-of-content-home-team]',
	array(
		'default'           => $default['number-of-content-home-team'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[number-of-content-home-team]',
	array(
		'label'    => __( 'Select No Words Of Team', 'corporate-hub' ),
		'section'  => 'team_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);


// Setting - select-team-from.
$wp_customize->add_setting( 'theme_options[select-team-from]',
	array(
		'default'           => $default['select-team-from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[select-team-from]',
	array(
		'label'       => __( 'Select Team From', 'corporate-hub' ),
		'section'     => 'team_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'from-page' => __( 'Page', 'corporate-hub' ),
		    'from-category' => __( 'Category', 'corporate-hub' )
		    ),
		'priority'    => 110,
	)
);

for ( $i=1; $i <=  corporate_hub_get_option( 'number-of-home-team' ) ; $i++ ) {
        $wp_customize->add_setting( 'theme_options[select-page-for-team_'. $i .']', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'corporate_hub_sanitize_dropdown_pages',
            
        ) );

        $wp_customize->add_control( 'theme_options[select-page-for-team_'. $i .']', array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Team From Page', 'corporate-hub' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'team_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 120,
            'active_callback' 	=> 'corporate_hub_is_select_page_team',
            )
        );
    }

// Setting - drop down category for team.
$wp_customize->add_setting( 'theme_options[select-category-for-team]',
	array(
		'default'           => $default['select-category-for-team'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Corporate_Hub_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[select-category-for-team]',
	array(
        'label'           => __( 'Category For Team Section', 'corporate-hub' ),
        'description'     => __( 'Select category to be shown on tab ', 'corporate-hub' ),
        'section'         => 'team_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 130,
		'active_callback' => 'corporate_hub_is_select_cat_team',

    ) ) );
