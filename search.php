<?php get_header(); ?>

<div class="search-results">
    <h1>Результаты поиска для: "<?php echo get_search_query(); ?>"</h1>

    <?php if (have_posts()) : ?>
        <ul>
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <p><?php the_excerpt(); ?></p>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>Ничего не найдено.</p>
        <p><a href="<?php echo esc_url(home_url('/')); ?>">Вернуться назад</a></p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
