<?php 
if ( ! function_exists( 'corporate_hub_service_args' ) ) :
    /**
     * Tab service Details
     *
     * @since corporate hub 1.0.0
     *
     * @return array $qargs service details.
     */
    function corporate_hub_service_args() {
        $corporate_hub_service_number = absint (corporate_hub_get_option('number-of-home-service'));
        $corporate_hub_service_page_list_array = array();
        for( $i = 1; $i <= $corporate_hub_service_number; $i++ ){
            $corporate_hub_service_page_list = corporate_hub_get_option( 'select-page-for-service_' . $i );
                if ( ! empty( $corporate_hub_service_page_list ) ) {
                    $corporate_hub_service_page_list_array[]  =   absint($corporate_hub_service_page_list);
                }
        }
        // Bail if no valid pages are selected.
        if ( empty( $corporate_hub_service_page_list_array ) ) {
            return;
        }
        /*page query*/
        $qargs = array(
            'posts_per_page' => esc_attr( $corporate_hub_service_number ),
            'orderby'        => 'post__in',
            'post_type'      => 'page',
            'post__in'       => $corporate_hub_service_page_list_array,
        );
        return $qargs;
    }
endif;


if ( ! function_exists( 'corporate_hub_service' ) ) :
    /**
     * Banner service
     *
     * @since corporate hub 1.0.0
     *
     */
    function corporate_hub_service() {
        $corporate_hub_service_excerpt_number = absint(corporate_hub_get_option('number-of-content-home-service'));
        $corporate_hub_service_item_number = absint(corporate_hub_get_option('number-of-content-home-service'));
        $corporate_hub_tab_button_text = corporate_hub_get_option('corporate-hub-tab-button-text');
        $corporate_hub_service_main_page = array();
        $corporate_hub_service_main_page[] = esc_attr(corporate_hub_get_option('select-service-main-page'));
        $corporate_hub_excerpt_number = absint(corporate_hub_get_option('number-of-content-home-service'));
        if( 1 != corporate_hub_get_option( 'show-service-section' ) ){
            return null;
        }
        ?>
        <section class="service-section section-block">
            <div class="section-bg service-section-bg">
                <div class="container">
                    <div class="sec-choose">
                        <!-- Nav tabs -->
                        <div class="choose-tab col-md-5">
                            <?php
                            if( !empty( $corporate_hub_service_main_page )){
                                $corporate_hub_service_main_page_args = array(
                                    'post_type' => 'page',
                                    'post__in' => $corporate_hub_service_main_page,
                                    'orderby' => 'post__in'
                                );
                            } 
                            if( !empty( $corporate_hub_service_main_page_args )){
                                $corporate_hub_service_main_page_query = new WP_Query($corporate_hub_service_main_page_args);
                                while ($corporate_hub_service_main_page_query->have_posts()): $corporate_hub_service_main_page_query->the_post();
                                    if (has_excerpt()) {
                                        $corporate_hub_service_main_content = get_the_excerpt();
                                    }
                                    else {
                                        $corporate_hub_service_main_content = corporate_hub_words_count( $corporate_hub_service_excerpt_number ,get_the_content());
                                    }
                                    ?>
                                    <div class="section-head">
                                        <a href="<?php the_permalink(); ?>"><h2 class="section-title"><?php the_title(); ?></h2> </a>
                                    </div>

                                    <p><?php echo wp_kses_post($corporate_hub_service_main_content); ?>
                                    </p>
                                <?php endwhile;
                                wp_reset_postdata();
                            }
                            ?>
                            <?php $corporate_hub_service_args = corporate_hub_service_args();
                            $corporate_hub_service_query = new WP_Query($corporate_hub_service_args);
                            ?>
                            <ul class="nav nav-tabs" role="tablist">
                                <?php
                                $j = 0;
                                if ($corporate_hub_service_query->have_posts()) :
                                    while ($corporate_hub_service_query->have_posts()) : $corporate_hub_service_query->the_post();
                                    global $post;
                                    $post_slug=$post->post_name;
                                    if ($j == 0) {
                                        $active_class='active';
                                    }
                                    else{
                                        $active_class='';
                                    }
                                    ?>
                                        <li role="presentation" class="<?php echo esc_attr($active_class );?>">
                                            <a href="#<?php echo esc_attr( $post_slug); ?>" aria-controls="<?php echo esc_attr( $post_slug); ?>" role="tab" data-toggle="tab"><?php the_title(); ?></a>
                                        </li>
                                    <?php 
                                    $j++;
                                    endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                            </ul>
                        </div>

                        <!-- Tab panels -->
                        <div class="col-md-7">
                            <!-- Tab Content -->
                            <div class="tab-content">
                                <?php $corporate_hub_service_args = corporate_hub_service_args();
                                $corporate_hub_service_query = new WP_Query($corporate_hub_service_args);
                                $j = 0;
                                if ($corporate_hub_service_query->have_posts()) :
                                    while ($corporate_hub_service_query->have_posts()) : $corporate_hub_service_query->the_post();
                                    global $post;
                                    $post_slug=$post->post_name;
                                    if ($j == 0) {
                                        $active_class='active';
                                    }
                                    else{
                                        $active_class='';
                                    }
                                    if(has_post_thumbnail()){
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'corporate-hub-tab-image' );
                                        $url = $thumb['0'];
                                    }
                                    else{
                                      $url = get_template_directory_uri() . '/images/no-image-tab.jpg';
                                    }
                                    if (has_excerpt()) {
                                        $corporate_hub_service_content = get_the_excerpt();
                                    }
                                    else {
                                        $corporate_hub_service_content = corporate_hub_words_count( $corporate_hub_service_excerpt_number ,get_the_content());
                                    }
                                    ?>
                                        <div role="tabpanel" class="tab-pane <?php echo esc_attr($active_class);?>" id="<?php echo esc_attr( $post_slug); ?>">
                                            <div class="detail-in">
                                                <img src="<?php echo esc_url($url); ?>" alt="image">
                                                <?php if (!empty($corporate_hub_service_content)){?>
                                                    <div class="elements-bg col-sm-8 text-content">
                                                        <p><?php echo wp_kses_post($corporate_hub_service_content); ?>
                                                        </p>
                                                        <?php if (!empty ($corporate_hub_tab_button_text)) { ?>
                                                            <div class="twp-slider-cta">
                                                                <a class="btn twp-btn twp-btn-transparent"
                                                                   href="<?php the_permalink(); ?>"><?php echo esc_html($corporate_hub_tab_button_text); ?></a>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php 
                                    $j++;
                                    endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end service-section -->
    <?php 
    }
endif;
add_action( 'corporate_hub_action_front_page', 'corporate_hub_service', 30 );