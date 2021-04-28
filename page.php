<?php
/**
 * Plantilla para mostrar el contenido de la página.
 */

// Cabecera
get_header();
?>

<div>
	<?php
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
	?>
</div>

<?php
// Footer
get_footer();
