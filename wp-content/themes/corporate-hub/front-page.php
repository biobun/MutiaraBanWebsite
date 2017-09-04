<?php
/**
 * The template for displaying home page.
 * @package Corporate Hub
 */

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    }
else{
	if ((corporate_hub_get_option('show-slider-section') != 1) && (corporate_hub_get_option('show-blog-section') != 1) &&  (corporate_hub_get_option('show-testimonial-section') != 1) && (corporate_hub_get_option('show-work-process-section') != 1) &&
		(corporate_hub_get_option('show-our-expertise-section') != 1) && (corporate_hub_get_option('show-our-about-section') != 1) && (corporate_hub_get_option('show-team-section') != 1) && (corporate_hub_get_option('show-progress-section') != 1) &&
		(corporate_hub_get_option('show-google-map-section') != 1) && (corporate_hub_get_option('show-recent-work-section') != 1)  && (corporate_hub_get_option('show-service-section') != 1)) {
		if ( current_user_can( 'edit_theme_options' ) ) { ?>
			<section class="wrapper display-info">
				<div class="container">
				<?php echo sprintf(
					__( 'All Section are based on page and post. Enable each Section from customizer </br> eg: for slider section : Home/Front Page Settings -> Slider Section -> Enable Slider. </br>likewise to other sections </br> %s', 'corporate-hub' ),
					'<a class="button" href="' . esc_url( admin_url( 'customize.php' ) ) . '">' . __( 'click here', 'corporate-hub' ) . '</a>'
					); ?>
				</div>
			</section>
		<?php }
	}
	else{
	/**
	 * corporate_hub_action_front_page hook
	 * @since Corporate Hub 0.0.2
	 *
	 * @hooked corporate_hub_action_front_page -  10
	 * @sub_hooked corporate_hub_action_front_page -  10
	 */
	do_action( 'corporate_hub_action_front_page' );
	}
}
get_footer();