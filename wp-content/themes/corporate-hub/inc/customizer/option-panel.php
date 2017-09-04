<?php 

/**
 * Theme Options Panel.
 *
 * @package corporate_hub
 */

$default = corporate_hub_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_front_page_section',
	array(
		'title'      => __( 'Home/Front Page Settings', 'corporate-hub' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);
	/*slider and its property section*/
	require get_template_directory() . '/inc/customizer/slider.php';

	/*About section*/
	require get_template_directory() . '/inc/customizer/about.php';

	/*latest-blog section*/
	require get_template_directory() . '/inc/customizer/latest-blog.php';

	/*our-team section*/
	require get_template_directory() . '/inc/customizer/our-team.php';

	/*recent-work section*/
	require get_template_directory() . '/inc/customizer/recent-work.php';

	/*service section*/
	require get_template_directory() . '/inc/customizer/service.php';

	/*testimonial section*/
	require get_template_directory() . '/inc/customizer/testimonial.php';

?>