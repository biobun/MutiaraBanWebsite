<?php
if (!function_exists('corporate_hub_expertise_args')) :
    /**
     * Tab Expertise Details
     *
     * @since corporate hub 1.0.0
     *
     * @return array $qarg expertise details.
     */
    function corporate_hub_expertise_args()
    {
        $corporate_hub_expertise_number = absint(corporate_hub_get_option('number-of-home-expertise'));
        $corporate_hub_expertise_from = esc_attr(corporate_hub_get_option('select-expertise-from'));

        switch ($corporate_hub_expertise_from) {
            case 'from-page':
                $corporate_hub_expertise_page_list_array = array();
                for ($i = 1; $i <= $corporate_hub_expertise_number; $i++) {
                    $corporate_hub_expertise_page_list = corporate_hub_get_option('select-page-for-expertise-' . $i);
                    if (!empty($corporate_hub_expertise_page_list)) {
                        $corporate_hub_expertise_page_list_array[] = absint($corporate_hub_expertise_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($corporate_hub_expertise_page_list_array)) {
                    return;
                }
                /*page query*/
                $qarg = array(
                    'posts_per_page' => esc_attr($corporate_hub_expertise_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $corporate_hub_expertise_page_list_array,
                );
                return $qarg;
                break;

            case 'from-category':
                $corporate_hub_expertise_category = esc_attr(corporate_hub_get_option('select-category-for-expertise'));
                $qarg = array(
                    'posts_per_page' => esc_attr($corporate_hub_expertise_number),
                    'post_type' => 'post',
                    'cat' => $corporate_hub_expertise_category,
                );
                return $qarg;
                break;

            default:
                break;
        }
        ?>
        <?php
    }
endif;
if (!function_exists('corporate_hub_expertise')) :
    /**
     * Banner expertise
     *
     * @since corporate hub 1.0.0
     *
     */
    function corporate_hub_expertise()
    {
        $corporate_hub_expertise_excerpt_number = absint(corporate_hub_get_option('number-of-content-home-expertise'));
        if (1 != corporate_hub_get_option('show-our-expertise-section')) {
            return null;
        }
        ?>
        <section class="about-section-middle section-block">
            <div class="section-bg about-section-bottom-bg">
                <div class="container-fluid">
                    <div class="twp-row">
                        <div class="col-sm-12 mb-20">
                            <div class="section-head">
                                <h2 class="section-title"> <?php echo wp_kses_post(corporate_hub_get_option('our-expertise-section-title')); ?> </h2>
                            </div>
                        </div>
                        <?php $corporate_hub_expertise_args = corporate_hub_expertise_args();
                        $corporate_hub_expertise_query = new WP_Query($corporate_hub_expertise_args);
                        $j = 1;
                        if ($corporate_hub_expertise_query->have_posts()) :
                            while ($corporate_hub_expertise_query->have_posts()) : $corporate_hub_expertise_query->the_post();
                                if (has_excerpt()) {
                                    $corporate_hub_expertise_content = get_the_excerpt();
                                } else {
                                    $corporate_hub_expertise_content = corporate_hub_words_count($corporate_hub_expertise_excerpt_number, get_the_content());
                                }
                                if (has_post_thumbnail()) {
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'corporate-hub-medium-e');
                                    $url = $thumb['0'];
                                } else {
                                    $url = get_template_directory_uri() . '/images/no-image-medium.jpg';
                                }
                                ?>
                                <div class="col-sm-4 col-xs-12 twp-column">
                                    <a href="<?php the_permalink(); ?>" class="about-featured">
                                        <div class="about-featured-wrapper">
                                            <span class="about-featured-image">
                                                <img
                                                    src="<?php echo esc_url($url); ?>"
                                                    alt=""/>
                                            </span>
                                            <span class="number secondary-color">
                                                <?php echo esc_attr('0' . $j); ?>
                                            </span>
                                        </div>
                                        <div class="about-title clearfix">
                                            <h3 class="alt-features-title primary-color"><?php the_title(); ?></h3>
                                        </div>
                                    </a>
                                    <p><?php echo esc_html($corporate_hub_expertise_content); ?></p>
                                </div>
                                <?php
                                $j++;
                                if ($j % 3 == 0) {
                                    echo "<div class='clear'></div>";
                                }
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
        </section>
        <!-- end expertise-section -->
        <?php
    }
endif;
add_action('corporate_hub_action_front_page', 'corporate_hub_expertise', 29);


