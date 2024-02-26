<?php

include(plugin_dir_path( __FILE__) . 'includes/config.php');
include(plugin_dir_path( __FILE__) . 'includes/extras.php');
include(plugin_dir_path( __FILE__) . 'includes/blocks.php');


/********************************************************
CONSTANTES
 ********************************************************/
define('WORDPYCAT_PATH', plugin_dir_path( __FILE__ ));      //slash at the end
define('WORDPYCAT_URL', get_template_directory_uri() . '/');  //slash at the end

/*
 * Añade JS y CSS al tema
 */
add_action('wp_enqueue_scripts', 'registrar_jscss');
function registrar_jscss(){
	$version = '1.0.0';

	// Añadimos las hojas de estilos
	wp_enqueue_style('simple', get_template_directory_uri() . '/recursos/css/simple.min.css', array(), $version);
	wp_enqueue_style('style', get_stylesheet_uri(), array(), $version);

	// Añadimos los archivos JavaScript
	wp_enqueue_script('app', get_template_directory_uri() . '/recursos/js/app.js', array(), $version, true);

}



