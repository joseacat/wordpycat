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
            <header class="header-page alignfull" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                <div>
                    <?php the_title('<h1>', '</h1>'); ?>
                </div>
            </header>
            <div class="single-page">
                <?php the_content(); ?>
            </div>
        <?php
        endif;
        ?>
    </section>
</main>

<?php get_footer(); ?>
