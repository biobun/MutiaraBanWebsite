<?php
if (!function_exists('corporate_hub_recent_work_args')) :
    /**
     * Recent Work Details
     *
     * @since corporate hub 1.0.0
     *
     * @return array $qargs recent_work details.
     */
    function corporate_hub_recent_work_args()
    {
        $corporate_hub_recent_work_number = absint(corporate_hub_get_option('number-of-home-recent-work'));
        $corporate_hub_recent_work_from = esc_attr(corporate_hub_get_option('select-recent-work-from'));

        switch ($corporate_hub_recent_work_from) {
            case 'from-page':
                $corporate_hub_recent_work_page_list_array = array();
                for ($i = 1; $i <= $corporate_hub_recent_work_number; $i++) {
                    $corporate_hub_recent_work_page_list = corporate_hub_get_option('select-page-for-recent-work_' . $i);
                    if (!empty($corporate_hub_recent_work_page_list)) {
                        $corporate_hub_recent_work_page_list_array[] = absint($corporate_hub_recent_work_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($corporate_hub_recent_work_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => esc_attr($corporate_hub_recent_work_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $corporate_hub_recent_work_page_list_array,
                );
                return $qargs;
                break;

            case 'from-category':
                $corporate_hub_recent_work_category = esc_attr(corporate_hub_get_option('select-category-for-recent-work'));
                $qargs = array(
                    'posts_per_page' => esc_attr($corporate_hub_recent_work_number),
                    'post_type' => 'post',
                    'cat' => $corporate_hub_recent_work_category,
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


if (!function_exists('corporate_hub_recent_work')) :
    /**
     * Banner recent_work
     *
     * @since corporate hub 1.0.0
     *
     */
    function corporate_hub_recent_work()
    {
        $corporate_hub_recent_work_excerpt_number = absint(corporate_hub_get_option('number-of-content-home-recent-work'));
        $corporate_hub_recent_work_item_number = absint(corporate_hub_get_option('number-of-content-home-recent-work'));
        $corporate_hub_recent_work_main_page = array();
        $corporate_hub_recent_work_main_page[] = esc_attr(corporate_hub_get_option('select-recent-work-main-page'));
        $corporate_hub_excerpt_number = absint(corporate_hub_get_option('number-of-content-home-recent-work'));
        if (1 != corporate_hub_get_option('show-recent-work-section')) {
            return null;
        }
        ?>
        <section class="showcase-section section-block">
            <div class="section-bg twp-pt-0 twp-pb-0 clearfix">
                <div class="left-side zoom-gallery">
                    <div class="twp-portfolio">
                        <?php $corporate_hub_recent_work_args = corporate_hub_recent_work_args();
                        $corporate_hub_recent_work_query = new WP_Query($corporate_hub_recent_work_args);
                        if ($corporate_hub_recent_work_query->have_posts()) :
                            while ($corporate_hub_recent_work_query->have_posts()) : $corporate_hub_recent_work_query->the_post();
                                if (has_post_thumbnail()) {
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'corporate-hub-potrait');
                                    $url = $thumb['0'];
                                } else {
                                    $url = get_template_directory_uri() . '/images/no-image-portrait.jpg';
                                }
                                ?>
                                <figure>
                                    <a href="<?php echo esc_url($url); ?>" title="<?php the_title(); ?>">
                                        <img src="<?php echo esc_url($url); ?>" alt="<?php the_title(); ?>">
                                        <figcaption>
                                            <i class="zoom-icon ion-ios-plus"></i>
                                        </figcaption>
                                    </a>

                                </figure>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
                <!-- end left-side -->
                <div class="right-side">
                    <div class="middle-div">
                        <div class="inner">
                            <?php
                            if (!empty($corporate_hub_recent_work_main_page)) {
                                $corporate_hub_recent_work_main_page_args = array(
                                    'post_type' => 'page',
                                    'post__in' => $corporate_hub_recent_work_main_page,
                                    'orderby' => 'post__in'
                                );
                            }
                            if (!empty($corporate_hub_recent_work_main_page_args)) {
                                $corporate_hub_recent_work_main_page_query = new WP_Query($corporate_hub_recent_work_main_page_args);
                                while ($corporate_hub_recent_work_main_page_query->have_posts()): $corporate_hub_recent_work_main_page_query->the_post();
                                    if (has_excerpt()) {
                                        $corporate_hub_recent_work_main_content = get_the_excerpt();
                                    } else {
                                        $corporate_hub_recent_work_main_content = corporate_hub_words_count($corporate_hub_recent_work_excerpt_number, get_the_content());
                                    }
                                    ?>
                                    <div class="secondary-font elements-color">
                                        <h2 class="section-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <?php if (!empty($corporate_hub_recent_work_main_content)) { ?>
                                            <p><?php echo wp_kses_post($corporate_hub_recent_work_main_content); ?></p>
                                        <?php } ?>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                            }
                            ?>
                        </div>
                        <!-- end inner -->
                    </div>
                    <!-- end middle-div -->
                </div>
                <!-- end right-side -->
            </div>
        </section>
        <!-- end showcase-section -->

        <!-- end recent work-section -->
        <?php
    }
endif;
add_action('corporate_hub_action_front_page', 'corporate_hub_recent_work', 30);