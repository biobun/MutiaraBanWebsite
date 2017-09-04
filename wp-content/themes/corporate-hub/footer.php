<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Hub
 */

?>
</div><!-- #content -->
<?php
if ( ! function_exists( 'corporate_hub_footer_widgets' ) ) :
    /**
     * Footer content
     *
     * @since corporate hub 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function corporate_hub_footer_widgets() {
        $corporate_hub_footer_widgets_number = corporate_hub_get_option('number-of-footer-widget');
        if( $corporate_hub_footer_widgets_number <= 0 ){
            return false;
        }
        if( !is_active_sidebar( 'footer-col-one' ) && !is_active_sidebar( 'footer-col-two' ) && !is_active_sidebar( 'footer-col-three' ) && !is_active_sidebar( 'footer-col-four' )){
            return false;
        }
        if( 1 == $corporate_hub_footer_widgets_number ){
                $col = 'col-md-12';
            }
        elseif( 2 == $corporate_hub_footer_widgets_number ){
            $col = 'col-md-6';
        }
        elseif( 3 == $corporate_hub_footer_widgets_number ){
            $col = 'col-md-4';
        }
        elseif( 4 == $corporate_hub_footer_widgets_number ){
            $col = 'col-md-3';
        }
        else{
            $col = 'col-md-3';
        }
        ?>

        <section class="wrapper block-section footer-widget">
            <div class="container overhidden">
                <div class="contact-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <?php if( is_active_sidebar( 'footer-col-one' ) && $corporate_hub_footer_widgets_number > 0 ) : ?>
                                    <div class="contact-list <?php echo esc_attr( $col );?>">
                                        <?php dynamic_sidebar( 'footer-col-one' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( is_active_sidebar( 'footer-col-two' ) && $corporate_hub_footer_widgets_number > 1 ) : ?>
                                    <div class="contact-list <?php echo esc_attr( $col );?>">
                                        <?php dynamic_sidebar( 'footer-col-two' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( is_active_sidebar( 'footer-col-three' ) && $corporate_hub_footer_widgets_number > 2 ) : ?>
                                    <div class="contact-list <?php echo esc_attr( $col );?>">
                                        <?php dynamic_sidebar( 'footer-col-three' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( is_active_sidebar( 'footer-col-four' ) && $corporate_hub_footer_widgets_number > 3 ) : ?>
                                    <div class="contact-list <?php echo esc_attr( $col );?>">
                                        <?php dynamic_sidebar( 'footer-col-four' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <?php
            }
        endif;
        add_action( 'corporate_hub_action_widget_footer', 'corporate_hub_footer_widgets', 10 ); 

do_action( 'corporate_hub_action_widget_footer' );
        ?>
<footer id="colophon" class="site-footer primary-bg" role="contentinfo">
    <div class="container-fluid">
            <!-- end col-12 -->
            <div class="row">
                <?php if (has_nav_menu('social')) { ?>
                    <div class="footer-social">
                        <?php 
                        $corporate_hub_social_title = esc_html(corporate_hub_get_option('social-content-heading'));
                        if (!empty($corporate_hub_social_title)) { ?>
                        <h4 class="social-title secondary-color"><?php echo esc_html(corporate_hub_get_option('social-content-heading') ); ?></h4>
                        <?php } ?>
                        <?php if (corporate_hub_get_option('social-icon-style') == 'circle') {
                            $corporate_hub_social_icon = 'bordered-radius';
                        }
                        else{
                            $corporate_hub_social_icon = '';
                        }?>
                        <div class="social-icons <?php echo esc_attr($corporate_hub_social_icon); ?>">
                            <?php
                                wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span>',
                                    'link_after'=>'</span>' , 'menu_id' => 'primary-menu','fallback_cb' => false, ) );
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="copyright-area">
                    <div class="site-info">
                        <?php
                        $corporate_hub_copy_text = wp_kses_post(corporate_hub_get_option('copyright-text'));
                        if(!empty ($corporate_hub_copy_text)){
                            echo wp_kses_post(corporate_hub_get_option('copyright-text') );
                        }
                        ?>
                        <?php

                         if( 1 != corporate_hub_get_option('dissable-theme-name')){
                            ?>
                        <span class="sep"> | </span>
                        <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'corporate-hub' ), 'Corporate Hub', '<a href="http://themeinwp.com/" target = "_blank" rel="designer">Themeinwp </a>' ); ?>
                        <?php
                        }
                        ?>
    			    </div><!-- .site-info -->
                </div>
            </div>
            <!-- end col-12 -->
    </div>
    <!-- end container -->
</footer>
</div><!-- #page -->
<a id="scroll-up"><i class="ion-ios-arrow-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>
