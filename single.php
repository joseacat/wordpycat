<?php

/**
 * Single
 */

get_header(); ?>

<main role="main" aria-label="Content">
    <section>
        <?php
	    if (have_posts()) :
            the_post(); ?>
            <header class="header-single alignfull" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                <div class="header-single-overlay"></div>
                <div>
                    <?php the_title('<h1>', '</h1>'); ?>
                </div>
                <div class="header-meta">
                    <span><?php the_date(); ?></span>
                    <br/>
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        $category_names = array();
                        foreach ( $categories as $category ) {
                            $category_names[] = esc_html( $category->name );
                        }
                        ?>
                        <small><?php echo implode( ', ', $category_names ); ?></small>
                        <?php
                    }
                    ?>
                </div>
            </header>
            <div class="single-post">
		        <?php the_content(); ?>
            </div>
        <?php
        endif;
        ?>
    </section>
</main>

<?php get_footer(); ?>
