<?php
/**
 * Index principal
 */


// Cabecera
get_header(); ?>

<div class="row">
<?php
if(have_posts()){
  while(have_posts()){
?>
    <?php the_post(); ?>
    <section class="col-md-4 col-sm-12">
      <div class="img-listado">
        <?php
        if(has_post_thumbnail()){
          the_post_thumbnail('thumbnail');
        }else{
          ?>
          <img src="<?php echo get_template_directory_uri(); ?>/recursos/img/sin-imagen.jpg" alt="Sin imagen">
          <?php
        }
        ?>
      </div>
    <a href="<?php the_permalink(); ?>">
      <?php the_title('<h1>','</h1>'); ?>
    </a>

    <?php the_excerpt(); ?>
    </section>
  <?php
  }
  ?>
  </div>
  <div class="row">
  <?php
  next_posts_link( '<<');
  previous_posts_link( '>>' );
  ?>
  </div>
<?php
}else{
?>
  <div class="row">
    <h1>No hay contenido</h1>
  </div>
<?php
}
?>

<?php
// Footer
get_footer();
?>
