<?php
/**
 * Default theme options.
 *
 * @package corporate_hub
 */

if ( ! function_exists( 'corporate_hub_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function corporate_hub_get_default_theme_options() {

		$defaults = array();

		// Slider Section.
		$defaults['show-slider-section']				= 0;
		$defaults['number-of-home-slider']				= 3;
		$defaults['number-of-content-home-slider']		= 30;
		$defaults['select-slider-from']					= 'from-category';
		$defaults['select-page-for-slider']				= 0;
		$defaults['select-category-for-slider']			= 1;
		$defaults['button-text-on-slider']				= esc_html__( 'Browse More', 'corporate-hub' );
		
		/*Latest Blog Default Value*/
		$defaults['show-blog-section']					= 0;
		$defaults['main-title-blog-section']			= esc_html__( 'Latest Blog', 'corporate-hub' );
		$defaults['number-of-excerpt-home-blog']		= 40;
		$defaults['select-category-for-blog']			= 0;
		$defaults['blog-button-text']					= esc_html__( 'ALL NEWS ON OUR BLOG', 'corporate-hub' );
		$defaults['blog-button-link']					= '';

		/*testimonial section*/
		$defaults['show-testimonial-section']			= 0;
		$defaults['testimonial-section-background_image']= get_template_directory_uri() . '/images/banner.jpg';
		$defaults['title-testimonial-section']			= esc_html__( 'What people say?', 'corporate-hub' );
		$defaults['number-of-home-testimonial']			= 3;
		$defaults['number-of-content-home-testimonial']	= 30;
		$defaults['select-testimonial-from']			= 'from-category';
		$defaults['select-page-for-testimonial']		= 0;
		$defaults['select-category-for-testimonial']	= 1;

		/*about section*/
		$defaults['show-our-expertise-section']			= 0;
		$defaults['our-expertise-section-title']		= esc_html__( 'Our Expertise', 'corporate-hub' );
		$defaults['number-of-home-expertise']			= 3;
		$defaults['number-of-content-home-expertise']	= 40;
		$defaults['select-expertise-from']				= 'from-category';
		$defaults['select-page-for-expertise-1']		= 0;
		$defaults['select-category-for-expertise']		= 1;

		$defaults['show-our-about-section']				= 0;
		$defaults['select-about-main-page']				= 0;
		$defaults['number-of-home-about']				= 4;
		$defaults['number-of-content-home-about']		= 30;
		$defaults['number-of-home-about-icon-1']		= 'ion-android-bulb';
		$defaults['select-page-for-about-1']			= 0;

		/*team section*/
		$defaults['show-team-section']					= 0;
		$defaults['title-team-section']					= esc_html__( 'Our professionals', 'corporate-hub' );
		$defaults['number-of-home-team']				= 3;
		$defaults['number-of-content-home-team']		= 30;
		$defaults['select-team-from']					= 'from-category';
		$defaults['select-page-for-team']				= 0;
		$defaults['select-category-for-team']			= 1;

		/*recent work*/
		$defaults['show-recent-work-section']    		= 0;
		$defaults['number-of-content-home-recent-work'] = 20;
		$defaults['select-recent-work-main-page']    	= 0;
		$defaults['number-of-home-recent-work']    		= 4;
		$defaults['select-recent-work-from']			= 'from-category';
		$defaults['select-page-for-recent-work']		= 0;
		$defaults['select-category-for-recent-work']	= 1;

		/*service*/
		$defaults['show-service-section']    		= 0;
		$defaults['number-of-content-home-service'] = 30;
		$defaults['select-service-main-page']    	= 0;
		$defaults['number-of-home-service']    		= 4;
		$defaults['select-service-from']			= 'from-category';
		$defaults['select-page-for-service']		= 0;
		$defaults['select-category-for-service']	= 1;
		$defaults['corporate-hub-tab-button-text']	= '';

		/*layout*/
		$defaults['enable-overlay-option']			= 1;
		$defaults['enable-moving-animation-option']	= 1;
		$defaults['homepage-layout-option']			= 'full-width';
		$defaults['global-layout']					= 'right-sidebar';
		$defaults['excerpt-length-global']			= 50;
		$defaults['archive-layout']					= 'excerpt-only';
		$defaults['archive-layout-image']			= 'right';
		$defaults['single-post-image-layout']		= 'full';
		$defaults['pagination-type']				= 'default';
		$defaults['copyright-text']					= esc_html__( 'Copyright All right reserved', 'corporate-hub' );
		$defaults['social-content-heading']			= esc_html__( 'CONNECT WITH US', 'corporate-hub' );
		$defaults['social-icon-style']				= 'square';
		$defaults['number-of-footer-widget']		= 3;
		$defaults['dissable-theme-name']			= 0;
		$defaults['breadcrumb-type']				= 'simple';
		$defaults['custom-css']						= '';

		// Pass through filter.
		$defaults = apply_filters( 'corporate_hub_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
