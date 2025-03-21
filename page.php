<?php

/**
 * Page
 */

get_header(); ?>

<main role="main" aria-label="Content">
    <section>
        <?php
	if (have_posts()) :
            the_post(); ?>
            <div class="page-single">
		<?php the_content(); ?>
            </div>
        <?php
        endif;
        ?>
    </section>
</main>

<?php get_footer(); ?>
