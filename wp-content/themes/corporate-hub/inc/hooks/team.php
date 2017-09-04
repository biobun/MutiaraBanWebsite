<?php
if (!function_exists('corporate_hub_team_args')) :
    /**
     * Team Details
     *
     * @since corporate hub 1.0.0
     *
     * @return array $qargs team details.
     */
    function corporate_hub_team_args()
    {
        $corporate_hub_team_number = absint(corporate_hub_get_option('number-of-home-team'));
        $corporate_hub_team_from = esc_attr(corporate_hub_get_option('select-team-from'));
        switch ($corporate_hub_team_from) {
            case 'from-page':
                $corporate_hub_team_page_list_array = array();
                for ($i = 1; $i <= $corporate_hub_team_number; $i++) {
                    $corporate_hub_team_page_list = corporate_hub_get_option('select-page-for-team_' . $i);
                    if (!empty($corporate_hub_team_page_list)) {
                        $corporate_hub_team_page_list_array[] = absint($corporate_hub_team_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($corporate_hub_team_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => esc_attr($corporate_hub_team_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $corporate_hub_team_page_list_array,
                );
                return $qargs;
                break;

            case 'from-category':
                $corporate_hub_team_category = esc_attr(corporate_hub_get_option('select-category-for-team'));
                $qargs = array(
                    'posts_per_page' => esc_attr($corporate_hub_team_number),
                    'post_type' => 'post',
                    'cat' => $corporate_hub_team_category,
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


if (!function_exists('corporate_hub_team')) :
    /**
     * Team
     *
     * @since corporate hub 1.0.0
     *
     */
    function corporate_hub_team()
    {
        $corporate_hub_team_excerpt_number = absint(corporate_hub_get_option('number-of-content-home-team'));
        if (1 != corporate_hub_get_option('show-team-section')) {
            return null;
        }
        $corporate_hub_team_args = corporate_hub_team_args();
        $corporate_hub_team_query = new WP_Query($corporate_hub_team_args); ?>
        <section class="team-section section-block">
            <div class="section-bg team-section-bg">
                <div class="container">
                    <div class="row">
                        <div class="section-head text-center">
                            <h2 class="section-title pb-20"><?php echo wp_kses_post(corporate_hub_get_option('title-team-section')); ?></h2>
                        </div>
                        <?php
                        if ($corporate_hub_team_query->have_posts()) :
                            while ($corporate_hub_team_query->have_posts()) : $corporate_hub_team_query->the_post();
                                if (has_post_thumbnail()) {
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'corporate-hub-medium');
                                    $url = $thumb['0'];
                                } else {
                                    $url = get_template_directory_uri() . '/images/no-image.jpg';
                                }
                                if (has_excerpt()) {
                                    $corporate_hub_team_content = get_the_excerpt();
                                } else {
                                    $corporate_hub_team_content = corporate_hub_words_count($corporate_hub_team_excerpt_number, get_the_content());
                                }
                                ?>

                                <div class="col-md-4 col-sm-4">
                                    <div class="figure-wrapper">
                                        <a href='<?php the_permalink(); ?>'>
                                            <figure class="figure-effect">
                                                <img src="<?php echo esc_url($url); ?>" alt="image" class="img-responsive">
                                                <figcaption>
                                                    <h3 class="alt-features-title primary-color"><?php the_title(); ?></h3>
                                                    <p><?php echo wp_kses_post($corporate_hub_team_content); ?></p>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- end team-section -->
        <?php
    }
endif;
add_action('corporate_hub_action_front_page', 'corporate_hub_team', 50);