<?php
/**
 * Funciones extras para el tema Woopystrap
 */

/**
 * Registramos los menús para nuestro tema
 */
function registrar_menus() {
  register_nav_menus(
    array(
      'menu-principal' => __( 'Menú principal' ),
      'menu-secundario' => __( 'Menú secundario' )
    )
  );
}
add_action( 'init', 'registrar_menus' );


/**
 * Añadimos las hojas de estilos
 */
 wp_enqueue_style('style', get_stylesheet_uri());
 wp_enqueue_style('bootstrapcss', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');

 /**
  * Añadimos los archivos JavaScript
  */
  wp_enqueue_script('jqueryjs', 'https://code.jquery.com/jquery-3.1.1.min.js');
  wp_enqueue_script('bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');


add_theme_support( 'post-thumbnails' );
