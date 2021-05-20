<?php
/*
 * Funciones extras para el tema Wordpycat
 */

/*
 * Registramos los menús para nuestro tema
 */
add_action( 'init', 'registrar_menus' );
function registrar_menus() {
  
  register_nav_menus(
    array(
      'menu-principal' => __( 'Menú principal' ),
      'menu-secundario' => __( 'Menú secundario' )
    )
  );

}

/*
 * Añade JS y CSS al tema
 */
add_action('wp_enqueue_scripts', 'registrar_jscss');
function registrar_jscss(){
  
  /*
   * Añadimos las hojas de estilos
   */
 wp_enqueue_style('style', get_stylesheet_uri());

  /*
   * Añadimos los archivos JavaScript
   */
  wp_enqueue_script('jqueryjs', 'https://code.jquery.com/jquery-3.1.1.min.js');

}

/*
 * Para que el tema soporte post-thumbnails
 */
add_theme_support( 'post-thumbnails' );


/**
 * Registrar el sidebar
 */
function registrar_sidebar() {
  register_sidebar( array(
    'name' => __( 'Sidebar lateral', 'wordpycat' ),
    'id' => 'sidebar-1',
    'description' => __( 'Sidebar WordPycat.', 'wordpycat' ),
    'class' => 'footer-sidebar',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}
add_action( 'widgets_init', 'registrar_sidebar' );

/**
 * Personaliza el tema
 */
function customizar_tema() {
    // Permite utilizar la funcionalidad de WordPress para añadir logo al header
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
    // Permite alignwide y fullalign de Gutenberg
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'customizar_tema' );



/**
 * Pinta el logo o la cabecera si no está la imagen configurada
 */
function pintar_logo(){
    $texto = '';
    $logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($logo_id, 'full');
    if(has_custom_logo()){
        $texto = '<img src="' . esc_url($logo[0]) . '">';
	}else{
        $texto = '<h1>' . get_bloginfo( 'name' ) .  '</h1>';
	}
    return $texto;
}
