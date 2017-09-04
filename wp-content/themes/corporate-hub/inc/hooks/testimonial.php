<?php
if (!function_exists('corporate_hub_testimonial_args')) :
    /**
     * Testimonial Details
     *
     * @since corporate hub 1.0.0
     *
     * @return array $qargs testimonial details.
     */
    function corporate_hub_testimonial_args()
    {
        $corporate_hub_testimonial_number = absint(corporate_hub_get_option('number-of-home-testimonial'));
        $corporate_hub_testimonial_from = esc_attr(corporate_hub_get_option('select-testimonial-from'));
        switch ($corporate_hub_testimonial_from) {
            case 'from-page':
                $corporate_hub_testimonial_page_list_array = array();
                for ($i = 1; $i <= $corporate_hub_testimonial_number; $i++) {
                    $corporate_hub_testimonial_page_list = corporate_hub_get_option('select-page-for-testimonial_' . $i);
                    if (!empty($corporate_hub_testimonial_page_list)) {
                        $corporate_hub_testimonial_page_list_array[] =  absint($corporate_hub_testimonial_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($corporate_hub_testimonial_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => esc_attr($corporate_hub_testimonial_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $corporate_hub_testimonial_page_list_array,
                );
                return $qargs;
                break;

            case 'from-category':
                $corporate_hub_testimonial_category = esc_attr(corporate_hub_get_option('select-category-for-testimonial'));
                $qargs = array(
                    'posts_per_page' => esc_attr($corporate_hub_testimonial_number),
                    'post_type' => 'post',
                    'cat' => $corporate_hub_testimonial_category,
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


if (!function_exists('corporate_hub_testimonial')) :
    /**
     * Testimonial
     *
     * @since corporate hub 1.0.0
     *
     */
    function corporate_hub_testimonial()
    {
        $corporate_hub_testimonial_excerpt_number = absint(corporate_hub_get_option('number-of-content-home-testimonial'));
        if (1 != corporate_hub_get_option('show-testimonial-section')) {
            return null;
        }
        $corporate_hub_testimonial_args = corporate_hub_testimonial_args();
        $corporate_hub_testimonial_query = new WP_Query($corporate_hub_testimonial_args); ?>
        <section class="testmonial-section section-block data-bg bg-fixed"
                 data-background="<?php echo esc_url(corporate_hub_get_option('testimonial-section-background_image')); ?>">
            <div class="testmonial-container">
                <div class="section-head secondary-font text-center">
                    <h2 class="section-title"><?php echo wp_kses_post(corporate_hub_get_option('title-testimonial-section')); ?>
                    </h2>
                </div>
                <div class="twp-testmonial">
                    <?php
                    if ($corporate_hub_testimonial_query->have_posts()) :
                        while ($corporate_hub_testimonial_query->have_posts()) : $corporate_hub_testimonial_query->the_post();
                            if (has_post_thumbnail()) {
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                                $url = $thumb['0'];
                            } else {
                                $url = get_template_directory_uri() . '/images/team1.jpg';
                            }
                            if (has_excerpt()) {
                                $corporate_hub_testimonial_content = get_the_excerpt();
                            } else {
                                $corporate_hub_testimonial_content = corporate_hub_words_count($corporate_hub_testimonial_excerpt_number, get_the_content());
                            }
                            ?>
                            <div class="testimonial-item">
                                <div class="testmonial-avatar">
                                    <a href='<?php the_permalink(); ?>'>
                                        <img src="<?php echo esc_url($url); ?>" alt="" class="img-circle"/>
                                    </a>
                                </div>
                                <blockquote>
                                    <p>
                                        <?php echo wp_kses_post($corporate_hub_testimonial_content); ?>
                                    </p>
                                    <footer class="testimonial-author">
                                        <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
                                    </footer>
                                </blockquote>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </section>
        <!-- End Testmonial -->
        <?php
    }
endif;
add_action('corporate_hub_action_front_page', 'corporate_hub_testimonial', 40);