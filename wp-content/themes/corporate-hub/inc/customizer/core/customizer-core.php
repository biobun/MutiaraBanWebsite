<?php
/**
 * Core functions.
 *
 * @package corporate_hub
 */

if ( ! function_exists( 'corporate_hub_get_option' ) ) :

	/**
	 * Get theme option from key.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function corporate_hub_get_option( $key = '' ) {

		global $corporate_hub_default_options;
		if ( empty( $key ) ) {
			return;
		}

		if ( ! $corporate_hub_default_options ) {
			$corporate_hub_default_options = corporate_hub_get_default_theme_options();
		}

		$default = ( isset( $corporate_hub_default_options[ $key ] ) ) ? $corporate_hub_default_options[ $key ] : '';
		$theme_options = get_theme_mod( 'theme_options', $corporate_hub_default_options );
		$theme_options = array_merge( $corporate_hub_default_options, $theme_options );
		$value = '';
		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}
		return $value;

	}

endif;

if ( ! function_exists( 'corporate_hub_get_options' ) ) :

	/**
	 * Get all theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Theme options.
	 */
  function corporate_hub_get_options(){

    $value = array();
    $value = get_theme_mod( 'theme_options' );
    return $value;

  }

endif;
