<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corporate_hub_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'corporate-hub' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'corporate-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	$corporate_hub_footer_widgets_number = corporate_hub_get_option('number-of-footer-widget');

	if( $corporate_hub_footer_widgets_number > 0 ){
	    register_sidebar(array(
	        'name' => __('Footer Column One', 'corporate-hub'),
	        'id' => 'footer-col-one',
	        'description' => __('Displays items on footer section.','corporate-hub'),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' => '</aside>',
	        'before_title'  => '<h1 class="widget-title">',
	        'after_title'   => '</h1>',
	    ));
	    if( $corporate_hub_footer_widgets_number > 1 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Two', 'corporate-hub'),
	            'id' => 'footer-col-two',
	            'description' => __('Displays items on footer section.','corporate-hub'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title">',
	            'after_title'   => '</h1>',
	        ));
	    }
	    if( $corporate_hub_footer_widgets_number > 2 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Three', 'corporate-hub'),
	            'id' => 'footer-col-three',
	            'description' => __('Displays items on footer section.','corporate-hub'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title">',
	            'after_title'   => '</h1>',
	        ));
	    }
	    if( $corporate_hub_footer_widgets_number > 3 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Four', 'corporate-hub'),
	            'id' => 'footer-col-four',
	            'description' => __('Displays items on footer section.','corporate-hub'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title">',
	            'after_title'   => '</h1>',
	        ));
	    }
	}
}
add_action( 'widgets_init', 'corporate_hub_widgets_init' );
