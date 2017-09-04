<?php
if (!function_exists('corporate_hub_blog')) :
    /**
     * blog
     *
     * @since corporate hub 1.0.0
     *
     */
    function corporate_hub_blog()
    {
        $corporate_hub_blog_excerpt_number = absint(corporate_hub_get_option('number-of-excerpt-home-blog'));
        $corporate_hub_blog_category = esc_attr(corporate_hub_get_option('select-category-for-blog'));
        if (1 != corporate_hub_get_option('show-blog-section')) {
            return null;
        }
        ?>
        <section class="blog-section section-block">
            <div class="section-bg blog-section-bg">
                <div class="container">
                    <div class="row">
                        <div class="latest-blog-heading clearfix">
                            <div class="col-sm-8 col-xs-12">
                                <div class="section-head">
                                    <h2 class="section-title"><?php echo esc_html(corporate_hub_get_option('main-title-blog-section')); ?></h2>
                                </div>
                            </div>
                            <?php 
                            $corporate_hub_blog_button_text = esc_html(corporate_hub_get_option('blog-button-text'));
                            if (!empty($corporate_hub_blog_button_text)) { ?>
                            <div class="col-sm-4 col-xs-12">
                                <div class="pull-right">
                                    <a href="<?php echo esc_url(corporate_hub_get_option('blog-button-link')); ?>" class="btn twp-btn twp-btn-primary mt-20">
                                        <?php echo esc_html(corporate_hub_get_option('blog-button-text')); ?>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                       <div class="clearfix col-sm-12 mb-20">
                           <hr>
                       </div>
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="twp-blogposts">
                                    <?php
                                    $corporate_hub_home_blog_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 3,
                                        'cat' => $corporate_hub_blog_category,
                                    );
                                    $corporate_hub_home_about_post_query = new WP_Query($corporate_hub_home_blog_args);
                                    if ($corporate_hub_home_about_post_query->have_posts()) :
                                        while ($corporate_hub_home_about_post_query->have_posts()) : $corporate_hub_home_about_post_query->the_post();
                                            if (has_post_thumbnail()) {
                                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'corporate-hub-medium');
                                                $url = $thumb['0'];
                                            } else {
                                                $url = get_template_directory_uri() . '/images/no-image.jpg';
                                            }
                                            if (has_excerpt()) {
                                                $corporate_hub_blog_content = get_the_excerpt();
                                            } else {
                                                $corporate_hub_blog_content = corporate_hub_words_count($corporate_hub_blog_excerpt_number, get_the_content());
                                            }
                                            ?>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <article class="twp-post">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <?php if (is_sticky()) { ?>
                                                                    <a class="twp-sticky-btn" href="<?php the_permalink(); ?>"><?php echo esc_html__('sticky', 'corporate-hub' ); ?></a>
                                                                <?php } ?>
                                                                <figure>
                                                                    <img src="<?php echo esc_url($url); ?>"
                                                                         alt="image description">
                                                                    <figcaption class="twp-img-hover">
                                                                        <div class="twp-hover-box">
                                                                            <ul class="twp-share-icons">
                                                                                <li>
                                                                                    <a href="<?php the_permalink(); ?>">
                                                                                        <i class="ion-link href-link"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </figcaption>
                                                                </figure>
                                                                <div class="twp-postmeta-wrapper">
                                                                    <ul class="twp-postmeta alt-font clearfix">
                                                                        <li>
                                                                            <a class="twp-postmeta-author"
                                                                               href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                                                <i class="ion-android-person"></i> <?php echo esc_html(get_the_author()); ?>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <?php
                                                                            $archive_day = get_the_time('d');
                                                                            ?>
                                                                            <a class="twp-postmeta-date"
                                                                               href="<?php echo esc_attr(get_day_link('', '', $archive_day)); ?>">
                                                                                <i class="ion-calendar"></i> <?php echo esc_attr(get_the_date('M j, Y')); ?>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="twp-post-content">
                                                                    <div class="twp-heading-border">
                                                                        <h3 class="alt-features-title"><a
                                                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                        </h3>
                                                                    </div>
                                                                    <div class="twp-description">
                                                                        <p><?php echo wp_kses_post($corporate_hub_blog_content); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            <?php
                                            wp_reset_postdata();
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action('corporate_hub_action_front_page', 'corporate_hub_blog', 70);