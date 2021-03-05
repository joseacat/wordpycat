<?php
/**
 * Plantilla para mostrar el contenido del post.
 */
 
// Cabecera
get_header();

if(have_posts()){
	the_post();
	if(has_post_thumbnail()){
		the_post_thumbnail('thumbnail');
	}
	the_title('<h1>','</h1>');
	the_content();
}else{
	echo __('No hay contenido en este post.', 'wordpycat');
}

// Footer
get_footer();