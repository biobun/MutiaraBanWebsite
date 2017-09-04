<?php
if (!function_exists('corporate_hub_about_args')) :
    /**
     * Tab About Details
     *
     * @since corporate hub 1.0.0
     *
     * @return array $qargs about details.
     */
    function corporate_hub_about_args()
    {
        $corporate_hub_about_number = absint(corporate_hub_get_option('number-of-home-about'));
        $corporate_hub_about_page_list_array = array();
        for ($i = 1; $i <= $corporate_hub_about_number; $i++) {
            $corporate_hub_about_page_list = corporate_hub_get_option('select-page-for-about-' . $i);
            if (!empty($corporate_hub_about_page_list)) {
                $corporate_hub_about_page_list_array[] = absint($corporate_hub_about_page_list);
            }
        }
        // Bail if no valid pages are selected.
        if (empty($corporate_hub_about_page_list_array)) {
            return;
        }
        /*page query*/
        $qargs = array(
            'posts_per_page' => esc_attr($corporate_hub_about_number),
            'orderby' => 'post__in',
            'post_type' => 'page',
            'post__in' => $corporate_hub_about_page_list_array,
        );
        return $qargs;
    }
endif;

if (!function_exists('corporate_hub_about')) :
    /**
     * Banner about
     *
     * @since corporate hub 1.0.0
     *
     */
    function corporate_hub_about()
    {
        $corporate_hub_about_excerpt_number = absint(corporate_hub_get_option('number-of-content-home-about'));
        $corporate_hub_about_number = absint(corporate_hub_get_option('number-of-home-about'));

        $corporate_hub_about_main_page = array();
        $corporate_hub_about_main_page[] = esc_attr(corporate_hub_get_option('select-about-main-page'));
        if (1 != corporate_hub_get_option('show-our-about-section')) {
            return null;
        }
        ?>
        <section class="about-section about-section-bottom section-block">
            <div class="section-bg about-section-bg">
                <div class="container-fluid twp-plr-0">
                    <div class="twp-row">
                        <?php
                        if (!empty($corporate_hub_about_main_page)) {
                            $corporate_hub_about_main_page_args = array(
                                'post_type' => 'page',
                                'post__in' => $corporate_hub_about_main_page,
                                'orderby' => 'post__in'
                            );
                        }
                        if (!empty($corporate_hub_about_main_page_args)) {
                            $corporate_hub_about_main_page_query = new WP_Query($corporate_hub_about_main_page_args);
                            while ($corporate_hub_about_main_page_query->have_posts()): $corporate_hub_about_main_page_query->the_post();
                                if (has_post_thumbnail()) {
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'corporate-hub-potrait');
                                    $url = $thumb['0'];
                                } else {
                                    $url = get_template_directory_uri() . '/images/no-image-portrait.jpg';
                                }
                                ?>

                                <div class="col-md-4 col-sm-6 col-xs-12 twp-bordered twp-min-height data-bg twp-column" data-background="<?php echo esc_url($url); ?>" data-mh="about-group">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="section-title">
                                            <h2 class="side-title secondary-font primary-color"><?php the_title(); ?></h2>
                                        </div>
                                    </a>
                                </div>

                                <?php
                            endwhile;
                            wp_reset_postdata();
                        } ?>
                        <div class="col-md-8 col-sm-6 col-xs-12 twp-column " data-mh="about-group">
                            <?php $corporate_hub_about_args = corporate_hub_about_args();
                            $corporate_hub_about_query = new WP_Query($corporate_hub_about_args);
                            $j = 1;
                            if ($corporate_hub_about_query->have_posts()) :
                                while ($corporate_hub_about_query->have_posts()) : $corporate_hub_about_query->the_post();
                                    if (has_excerpt()) {
                                        $corporate_hub_about_content = get_the_excerpt();
                                    } else {
                                        $corporate_hub_about_content = corporate_hub_words_count($corporate_hub_about_excerpt_number, get_the_content());
                                    }
                                    $curporate_hub_about_icon = corporate_hub_get_option('number-of-home-about-icon-' . $j);
                                    ?>
                                    <article class="content-box">
                                        <div class="title-box">
                                            <div class="icon-box">
                                                <i class="<?php echo esc_attr($curporate_hub_about_icon); ?>"></i>
                                            </div>
                                            <h4 class="alt-features-title primary-color bordered-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h4>
                                        </div>
                                        <p><?php echo esc_html($corporate_hub_about_content); ?></p>
                                    </article>
                                    <!-- end content-box -->
                                    <?php

                                    if ($j % 2 == 0) {
                                        echo "<div class='clear'></div>";
                                    }
                                    $j++;
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
        </section>
        <!-- end about-section  Top-->
        <?php
    }
endif;
add_action('corporate_hub_action_front_page', 'corporate_hub_about', 30);
?>