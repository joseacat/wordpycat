<?php

/**
 * Header
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header id="site-header" class="header-general">
        <?php $is_front = ! is_paged() && (is_front_page() || (is_home() && ((int) get_option('page_for_posts') !== get_queried_object_id()))); ?>
        <div></div>
        <div class="inner-header-general">
            <div class="logo-header">
                <a class="home-link" href="<?php echo esc_url(home_url('/')); ?>" rel="home" <?php echo $is_front ? 'aria-current="page"' : ''; ?>>
                    <?php echo print_logo(); ?>
                </a>
            </div>

            <div id="main-menu" class="menu menu-main">
                <nav role="navigation">
                    <?php wp_nav_menu(array('theme_location' => 'main-menu',  'menu_class' => 'nav navbar-nav', 'container' => 'ul')); ?>
                </nav>
            </div>
        </div>
        <div></div>
    </header>
