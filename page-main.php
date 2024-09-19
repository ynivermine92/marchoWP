<?php
/**
 * Template Name: main
 *
 * @package marcho
 */

get_header(); ?>


    <main>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'partials/content' ); ?>

        <?php endwhile; ?>
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        <?php else : ?>

            <?php get_template_part( 'partials/content', 'none' ); ?>

        <?php endif; ?>
    </main>


<?php get_footer(); ?>
