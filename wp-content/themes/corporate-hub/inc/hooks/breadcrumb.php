<?php 

if ( ! function_exists( 'corporate_hub_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function corporate_hub_add_breadcrumb() {

		// Bail if Breadcrumb disabled.
		$breadcrumb_type = corporate_hub_get_option( 'breadcrumb-type' );
		if ( 'disabled' === $breadcrumb_type ) {
			return;
		}
		// Bail if Home Page.
		if ( is_front_page() || is_home() ) {
			return;
		}
		// Render breadcrumb.
		echo '<div class="col-md-4 mt-20">';
		switch ( $breadcrumb_type ) {
			case 'simple':
				corporate_hub_simple_breadcrumb();
			break;

			case 'advanced':
				if ( function_exists( 'bcn_display' ) ) {
					bcn_display();
				}
			break;

			default:
			break;
		}
		echo '</div><!-- .container -->';
		return;

	}

endif;

add_action( 'corporate_hub_action_breadcrumb', 'corporate_hub_add_breadcrumb' , 10 );
