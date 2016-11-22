<?php
/**
 * Plantilla para mostrar el contenido de la página.
 */

// Cabecera
get_header(); ?>

<?php
if(have_posts()){
  the_post();
  if(has_thumbnail){
    the_post_thumbnail();
  }
  the_title('<h1>','</h1>');
  the_content();
}else{
  echo "No hay contenido en esta página.";
}
?>

<?php
// Footer
get_footer();
?>
