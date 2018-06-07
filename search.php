<?php
/**
 * Búsqueda
 */


// Cabecera
get_header(); ?>

<?php
if(have_posts()){
  while(have_posts()){
  ?>
    <?php the_post(); ?>
      <?php
      if(has_post_thumbnail()){
        the_post_thumbnail('thumbnail');
      }else{
        ?>
        <img src="<?php echo get_template_directory_uri(); ?>/recursos/img/sin-imagen.jpg" alt="<?php _x('Sin imagen', 'woopycat'); ?>">
        <?php
      }
      ?>
      <a href="<?php the_permalink(); ?>">
        <?php the_title('<h1>','</h1>'); ?>
      </a>
    <?php the_excerpt(); ?>
  <?php
  }
  next_posts_link( '<<');
  previous_posts_link( '>>' );
}else{
  ?>
    <h1>No hay contenido</h1>
  <?php
}
// Footer
get_footer();
?>
