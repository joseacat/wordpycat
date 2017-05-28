<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
  </head>
<body <?php body_class(isset($class) ? $class : ''); ?>>
  <nav class="navbar-cabecera" role="navigation">
        <div class="contenedor">
            <div class="navbar-logo">
                <?php
                $logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($logo_id, 'full');
                if(has_custom_logo()){
                ?>
                    <img src="<?php echo esc_url($logo[0]); ?>">
                <?php
                }else{
                ?>
                    <h1> <?php echo get_bloginfo( 'name' ); ?> </h1>
                <?php
                }
                ?>
            </div>
            <div class="navbar-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'menu-principal',  'menu_class' => 'nav navbar-nav' ) ); ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="contenedor contenido-principal">
