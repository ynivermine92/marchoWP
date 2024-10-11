<div class="search">
  <div class="conanter">
    <div class="search__wrapper">
      <form class="search__form" method="get" action="<?php echo home_url('/'); ?>">
        <input class="search__input" type="text" name="s" placeholder="поиск" value="<?php the_search_query(); ?>" />
        <button class="search__btn" type="submit">найти</button>
      </form>
      <div class="search__btn-clouse">X</div>
    </div>
  </div>
</div>




