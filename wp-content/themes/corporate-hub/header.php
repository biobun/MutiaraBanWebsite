<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Hub
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- full-screen-layout/boxed-layout -->
<?php if (corporate_hub_get_option('homepage-layout-option') == 'full-width') {
    $corporate_hub_homepage_layout = 'full-screen-layout';
} elseif (corporate_hub_get_option('homepage-layout-option') == 'boxed') {
    $corporate_hub_homepage_layout = 'boxed-layout';
} ?>
<div id="page" class="site site-bg nav-overlay <?php echo esc_attr($corporate_hub_homepage_layout); ?>">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'corporate-hub'); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="top-header">
            <div class="container">
                <div class="site-branding">
                    <?php
                    if (is_front_page() && is_home()) : ?>
                        <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                    rel="home"><?php bloginfo('name'); ?></a></span>
                    <?php else : ?>
                        <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                    rel="home"><?php bloginfo('name'); ?></a></span>
                        <?php
                    endif;
                    corporate_hub_the_custom_logo(); 
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                        <?php
                    endif; ?>
                </div><!-- .site-branding -->
                <div class="twp-nav ">
                    <ul class="navbar-extras">
                        <li>
                            <a href="#" class="search-button"><i class="icon twp-icon ion-ios-search"></i></a>
                            <!-- end search-button -->
                        </li>
                    </ul>
                </div>
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <a id="nav-toggle" href="#" aria-controls="primary-menu" aria-expanded="false">
                        <span class="screen-reader-text">
                            <?php esc_html_e('Primary Menu', 'corporate-hub'); ?>
                        </span>
                        <span class="icon-bar top"></span>
                        <span class="icon-bar middle"></span>
                        <span class="icon-bar bottom"></span>
                    </a>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => 'div',
                        'container_class' => 'menu'
                    )); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header>
    <!-- #masthead -->
    <!-- Innerpage Header Begins Here -->
    <?php
        if (is_front_page() && !is_home()) {

        } else {
            do_action('corporate-hub-page-inner-title');
        }
    ?>
    <!-- Innerpage Header Ends Here -->
    <div class="search-box">
        <div class="middle-div">
            <div class="inner">
                <h4><?php echo esc_html__('SEARCH','corporate-hub' ); ?></h4>
               <?php get_search_form(); ?>
                <span class="close-search">
                    <i class="icon twp-icon ion-ios-close-empty"></i>
                </span>
            </div>
        </div>
    </div>
    <div id="content" class="site-content">