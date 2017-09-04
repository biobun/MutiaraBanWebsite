<?php
if ( ! function_exists( 'corporate_hub_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since corporate hub 1.0.0
 */
function corporate_hub_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;


if ( ! function_exists( 'corporate_hub_body_class' ) ) :

	/**
	 * body class.
	 *
	 * @since 1.0.0
	 */
	function corporate_hub_body_class($corporate_hub_body_class) {
		global $post;
		$global_layout = corporate_hub_get_option( 'global-layout' );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'corporate-hub-meta-select-layout', true );
			if ( empty( $post_options ) ) {
				$global_layout = esc_attr( corporate_hub_get_option('global-layout') );
			} else{
				$global_layout = esc_attr($post_options);
			}
		}
		if ($global_layout == 'left-sidebar') {
			$corporate_hub_body_class[]= 'left-sidebar';
		}
		elseif ($global_layout == 'no-sidebar') {
			$corporate_hub_body_class[]= 'no-sidebar';
		}
		else{
			$corporate_hub_body_class[]= 'right-sidebar';

		}
		return $corporate_hub_body_class;

	}
endif;

add_action( 'body_class', 'corporate_hub_body_class' );
/**
* Returns word count of the sentences.
*
* @since corporate hub 1.0.0
*/
if ( ! function_exists( 'corporate_hub_words_count' ) ) :
	function corporate_hub_words_count( $length = 25, $corporate_hub_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $corporate_hub_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;


if ( ! function_exists( 'corporate_hub_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function corporate_hub_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {

			require_once get_template_directory() . '/assets/libraries/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );

	}

endif;


if ( ! function_exists( 'corporate_hub_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function corporate_hub_custom_posts_navigation() {

		$pagination_type = corporate_hub_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'corporate_hub_action_posts_navigation', 'corporate_hub_custom_posts_navigation' );


if( ! function_exists( 'corporate_hub_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  corporate hub 1.0.0
     *
     * @param null
     * @return int
     */
    function corporate_hub_excerpt_length( $length ){
        global $corporate_hub_customizer_all_values;
        $excerpt_length = $corporate_hub_customizer_all_values['excerpt-length-global'];
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'corporate_hub_excerpt_length', 999 );

if ( ! function_exists( 'corporate_hub_fonts_url' ) ) :

	/**
	 * Return fonts URL.
	 *
	 * @since 1.0.0
	 * @return string Fonts URL.
	 */
	function corporate_hub_fonts_url() {

		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'corporate-hub' ) ) {
			$fonts[] = 'Roboto:100,300,400,400i,500,700';
		}
		
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;

	}

endif;