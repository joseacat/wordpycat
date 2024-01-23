<?php

/**
 * Añadir categoría para los bloques creados.
 */
function agregar_categoria_bloques( $categories ) {
	array_unshift( $categories, array(
		'slug'	=> 'wordpycat',
		'title' => __( 'WordPycat', 'wordpycat' ),
		'icon'  => null,
	) );
	return $categories;
}

add_filter( 'block_categories_all', 'agregar_categoria_bloques', 1, 2 );


/**
 * Registrar todos los bloques de ACF
 */

function registrar_bloques() {
    register_block_type( get_template_directory_uri() . '/blocks/bannerCards' );
}

add_action( 'acf/init', 'registrar_bloques' );



/**
 * Registrar scripts de los bloques
 */

 function registrar_scripts_bloques() {
    $version = '1.0.0';

    // Añadir aquí los scripts de todos los bloques
    wp_register_script( 'wordpycat-block', get_template_directory_uri() . 'blocks/wordpycat/app.js', array( 'acf' ), $version, true );

}

add_action( 'acf/init', 'registrar_scripts_bloques' );



/**
 * Añade ruta para que se guarden los custom fields en la carpeta fields.
 * https://www.advancedcustomfields.com/resources/local-json/#saving-explained
 */
function guardar_custom_fields( $path ) {
    $path = get_template_directory_uri() . '/fields';

	return $path;
}

add_filter('acf/settings/save_json', 'guardar_custom_fields' );



/**
 * Set path for saving ACF JSON files.
 * https://www.advancedcustomfields.com/resources/local-json/#loading-explained
 */
function cargar_custom_fields( $paths ) {
	
    unset($paths[0]);

	$paths[] = get_template_directory_uri() . '/fields';

	return $paths;
}

add_filter( 'acf/settings/load_json', 'cargar_custom_fields' );


