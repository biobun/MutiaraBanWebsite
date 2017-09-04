<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package corporate_hub
 */

/*select page for slider*/
if ( ! function_exists( 'corporate_hub_is_select_page_slider' ) ) :

	/**
	 * Check if slider section page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_page_slider( $control ) {

		if ( 'from-page' === $control->manager->get_setting( 'theme_options[select-slider-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select cat for slider*/
if ( ! function_exists( 'corporate_hub_is_select_cat_slider' ) ) :

	/**
	 * Check if slider section form page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_cat_slider( $control ) {

		if ( 'from-category' === $control->manager->get_setting( 'theme_options[select-slider-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select page for testimonial*/
if ( ! function_exists( 'corporate_hub_is_select_page_testimonial' ) ) :

	/**
	 * Check if testimonial section form page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_page_testimonial( $control ) {

		if ( 'from-page' === $control->manager->get_setting( 'theme_options[select-testimonial-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select cat for testimonial*/
if ( ! function_exists( 'corporate_hub_is_select_cat_testimonial' ) ) :

	/**
	 * Check if slider section page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_cat_testimonial( $control ) {

		if ( 'from-category' === $control->manager->get_setting( 'theme_options[select-testimonial-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;


/*select page for team*/
if ( ! function_exists( 'corporate_hub_is_select_page_team' ) ) :

	/**
	 * Check if team section form page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_page_team( $control ) {

		if ( 'from-page' === $control->manager->get_setting( 'theme_options[select-team-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select cat for team*/
if ( ! function_exists( 'corporate_hub_is_select_cat_team' ) ) :

	/**
	 * Check if slider section page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_cat_team( $control ) {

		if ( 'from-category' === $control->manager->get_setting( 'theme_options[select-team-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select page for recent work*/
if ( ! function_exists( 'corporate_hub_is_select_page_recent_work' ) ) :

	/**
	 * Check if recent work section form page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_page_recent_work( $control ) {

		if ( 'from-page' === $control->manager->get_setting( 'theme_options[select-recent-work-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select cat for recent work*/
if ( ! function_exists( 'corporate_hub_is_select_cat_recent_work' ) ) :

	/**
	 * Check if recent work section form page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_cat_recent_work( $control ) {

		if ( 'from-category' === $control->manager->get_setting( 'theme_options[select-recent-work-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select page for expertise*/
if ( ! function_exists( 'corporate_hub_is_select_page_expertise' ) ) :

	/**
	 * Check if expertise section form page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_page_expertise( $control ) {

		if ( 'from-page' === $control->manager->get_setting( 'theme_options[select-expertise-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select cat for expertise*/
if ( ! function_exists( 'corporate_hub_is_select_cat_expertise' ) ) :

	/**
	 * Check if expertise section page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_hub_is_select_cat_expertise( $control ) {

		if ( 'from-category' === $control->manager->get_setting( 'theme_options[select-expertise-from]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

