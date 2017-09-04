<?php
if (!function_exists('corporate_hub_banner_slider_args')) :
    /**
     * Banner Slider Details
     *
     * @since corporate hub 1.0.0
     *
     * @return array $qargs Slider details.
     */
    function corporate_hub_banner_slider_args()
    {
        $corporate_hub_banner_slider_number = absint(corporate_hub_get_option('number-of-home-slider'));
        $corporate_hub_banner_slider_from = esc_attr(corporate_hub_get_option('select-slider-from'));
        switch ($corporate_hub_banner_slider_from) {
            case 'from-page':
                $corporate_hub_banner_slider_page_list_array = array();
                for ($i = 1; $i <= $corporate_hub_banner_slider_number; $i++) {
                    $corporate_hub_banner_slider_page_list = corporate_hub_get_option('select-page-for-slider_' . $i);
                    if (!empty($corporate_hub_banner_slider_page_list)) {
                        $corporate_hub_banner_slider_page_list_array[] = absint($corporate_hub_banner_slider_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($corporate_hub_banner_slider_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => esc_attr($corporate_hub_banner_slider_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $corporate_hub_banner_slider_page_list_array,
                );
                return $qargs;
                break;

            case 'from-category':
                $corporate_hub_banner_slider_category = esc_attr(corporate_hub_get_option('select-category-for-slider'));
                $qargs = array(
                    'posts_per_page' => esc_attr($corporate_hub_banner_slider_number),
                    'post_type' => 'post',
                    'cat' => $corporate_hub_banner_slider_category,
                );
                return $qargs;
                break;

            default:
                break;
        }
        ?>
        <?php
    }
endif;


if (!function_exists('corporate_hub_banner_slider')) :
    /**
     * Banner Slider
     *
     * @since corporate hub 1.0.0
     *
     */
    function corporate_hub_banner_slider()
    {
        $corporate_hub_slider_button_text = esc_html(corporate_hub_get_option('button-text-on-slider'));
        $corporate_hub_slider_excerpt_number = absint(corporate_hub_get_option('number-of-content-home-slider'));
        if (1 != corporate_hub_get_option('show-slider-section')) {
            return null;
        }
        $corporate_hub_banner_slider_args = corporate_hub_banner_slider_args();
        $corporate_hub_banner_slider_query = new WP_Query($corporate_hub_banner_slider_args); ?>
        <section id="home-slider" class="slider-section section-block">
            <div class="hero-slider overlay" data-autoplay="true">
                <?php
                if ($corporate_hub_banner_slider_query->have_posts()) :
                    while ($corporate_hub_banner_slider_query->have_posts()) : $corporate_hub_banner_slider_query->the_post();
                        if (has_post_thumbnail()) {
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'corporate-hub-slider-image');
                            $url = $thumb['0'];
                        } else {
                            $url = NULL;
                        }
                        if (has_excerpt()) {
                            $corporate_hub_slider_content = get_the_excerpt();
                        } else {
                            $corporate_hub_slider_content = corporate_hub_words_count($corporate_hub_slider_excerpt_number, get_the_content());
                        }
                        ?>
                        <div class="slider-item data-bg" data-background="<?php echo esc_url($url); ?>">
                            <figure>
                                <figcaption class="slider-position slider-default text-center">
                                    <div class="slider-position">
                                        <div class="slider-detail">
                                            <div class="slider-container">
                                                <h2 class="layer layer-fadeInLeft">
                                                    <?php the_title(); ?>
                                                </h2>
                                                <div class="slider-subtitle layer layer-fadeInRight">
                                                    <?php echo wp_kses_post($corporate_hub_slider_content); ?>
                                                </div>
                                                <?php if (!empty ($corporate_hub_slider_button_text)) { ?>
                                                    <div class="twp-slider-cta layer layer-fadeInUp">
                                                        <a class="btn twp-btn twp-btn-transparent"
                                                           href="<?php the_permalink(); ?>"><?php echo esc_html($corporate_hub_slider_button_text); ?></a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
            <!-- END .owl-slider -->
        </section>
        <!-- end slider-section -->
        <?php
    }
endif;
add_action('corporate_hub_action_front_page', 'corporate_hub_banner_slider', 10);