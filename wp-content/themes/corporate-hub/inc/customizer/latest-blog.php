<?php
/**
 * Blog section
 *
 * @package corporate_hub
 */

$default = corporate_hub_get_default_theme_options();

// Latest Blog Section.
$wp_customize->add_section( 'latest_blog_section_settings',
	array(
		'title'      => __( 'Latest Blog Section', 'corporate-hub' ),
		'priority'   => 180,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show-blog-section.
$wp_customize->add_setting( 'theme_options[show-blog-section]',
	array(
		'default'           => $default['show-blog-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show-blog-section]',
	array(
		'label'    => __( 'Enable Blog', 'corporate-hub' ),
		'section'  => 'latest_blog_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - main-title-blog-section.
$wp_customize->add_setting( 'theme_options[main-title-blog-section]',
	array(
		'default'           => $default['main-title-blog-section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[main-title-blog-section]',
	array(
		'label'    => __( 'Section Title', 'corporate-hub' ),
		'section'  => 'latest_blog_section_settings',
		'type'     => 'text',
		'priority' => 100,

	)
);

/*content excerpt in blog*/
$wp_customize->add_setting( 'theme_options[number-of-excerpt-home-blog]',
	array(
		'default'           => $default['number-of-excerpt-home-blog'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[number-of-excerpt-home-blog]',
	array(
		'label'    => __( 'No words of blog', 'corporate-hub' ),
		'section'  => 'latest_blog_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

// Setting - drop down category for blog.
$wp_customize->add_setting( 'theme_options[select-category-for-blog]',
	array(
		'default'           => $default['select-category-for-blog'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Corporate_Hub_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[select-category-for-blog]',
	array(
        'label'           => __( 'Category For blog Section', 'corporate-hub' ),
        'description'     => __( 'If category is selected the latest post from category will be published', 'corporate-hub' ),
        'section'         => 'latest_blog_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 230,
    ) ) );

/*button text*/
$wp_customize->add_setting( 'theme_options[blog-button-text]',
	array(
		'default'           => $default['blog-button-text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[blog-button-text]',
	array(
		'label'    		=> __( 'Button Text', 'corporate-hub' ),
		'description'	=> __( 'Removing the text from this section will disable the button below blog section', 'corporate-hub' ),
		'section'  		=> 'latest_blog_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 120,
	)
);

/*button url*/
$wp_customize->add_setting( 'theme_options[blog-button-link]',
	array(
		'default'           => $default['blog-button-link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[blog-button-link]',
	array(
		'label'    		=> __( 'URL Link', 'corporate-hub' ),
		'section'  		=> 'latest_blog_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 130,
	)
);

