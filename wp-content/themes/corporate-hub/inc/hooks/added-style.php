<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Corporate Hub
 */


if (!function_exists('corporate_hub_add_option_custom_css')) :

    /**
     * Add custom CSS.
     *
     * @since 1.0.0
     */
    function corporate_hub_add_option_custom_css()
    {

        $custom_css = corporate_hub_get_option('custom-css');
        $output = '';
        if (!empty($custom_css)) {
            $output = "\n" . '<style type="text/css">' . "\n";
            $output .= wp_strip_all_tags($custom_css);
            $output .= "\n" . '</style>' . "\n";
        }
        echo $output;

    }

endif;

add_action('corporate_hub_action_theme_custom_css', 'corporate_hub_add_option_custom_css', 99);


if (!function_exists('corporate_hub_trigger_custom_css_action')) :

    /**
     * Do action theme custom CSS.
     *
     * @since 1.0.0
     */
    function corporate_hub_trigger_custom_css_action()
    {

        /**
         * Hook - corporate_hub_action_theme_custom_css.
         *
         * @hooked corporate_hub_add_option_custom_css - 99
         */
        do_action('corporate_hub_action_theme_custom_css');
        $corporate_hub_enable_banner_overlay = corporate_hub_get_option('enable-overlay-option');
        ?>
        <style type="text/css">
            <?php
            /* Banner Image */
            if ( $corporate_hub_enable_banner_overlay == 1 ){
                ?>
                    .inner-header-overlay,
                    .hero-slider.overlay .slider-item:before {
                        background: #000;
                        filter: alpha(opacity=65);
                        opacity: 0.65;
                    }
            <?php
        } ?>
        </style>

    <?php }

endif;

add_action('wp_head', 'corporate_hub_trigger_custom_css_action', 99);
