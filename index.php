<?php

/**
 * Index
 */

get_header(); ?>

<main role="main" aria-label="Content">
    <section class="grid-cards-post">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article class="card-post">
                    <div>
                        <div class="image">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail(
                                    get_the_ID(),
                                    "full"
                                ); ?>
                            </a>
                        </div>
                        <div class="meta-post">
                            <div class="title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <div class="date">
                                <small><?php echo get_the_date(); ?></small>
                            </div>
                        </div>
                    </div>
                </article>
            <?php
            endwhile;
            the_posts_navigation();
        endif; ?>
    </section>
</main>

<?php get_footer(); ?>
