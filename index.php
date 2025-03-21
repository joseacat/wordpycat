<?php

/**
 * Index
 */

get_header(); ?>

<main role="main" aria-label="Content">
    <section>
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post(); ?>
                <div class="post-single">
                    <div class="post-title">
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    </div>
                </div>
        <?php endwhile;
            the_posts_navigation();
        else :
            echo 'No posts yet';
        endif;
        ?>
    </section>
</main>

<?php get_footer(); ?>
