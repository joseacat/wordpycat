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
 * Añadimos la hoja de estilos
 */
 wp_enqueue_style( 'style', get_stylesheet_uri() );
