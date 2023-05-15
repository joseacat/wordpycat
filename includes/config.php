<?php

/*
 * Registramos los menús para nuestro tema
 */
add_action( 'init', 'registrar_menus' );
function registrar_menus() {
	register_nav_menus(
		array(
			'menu-principal' => __( 'Menú principal', 'wordpycat'),
			'menu-secundario' => __( 'Menú secundario', 'wordpycat' )
		)
	);
}


/**
 * Registrar el sidebar
 */
function registrar_sidebar() {
	register_sidebar(
		array(
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
	// Soporta post-thumbnail
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'customizar_tema' );


/**
 * Función que agregar el preload a archivos CSS.
 */
function agregar_rel_preload( $html, $handle, $href, $media ) {
	if ( is_admin() ) {
		return $html;
	}
	// Aplicar rel preload solo a los assets que estén dentro de este array.
	$assets = [ 'wp-block-library' ];
	if ( ! in_array( $handle, $assets ) ) {
		return $html;
	}
    $html = <<<EOT
<link rel='preload' as='style' id='$handle' href='$href' type='text/css' media='$media' />
EOT;
    return $html;
}
add_filter( 'style_loader_tag', 'agregar_rel_preload', 10, 4 );
