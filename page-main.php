<?php

/**
 * Template Name: main
 *
 * @package marcho
 */

get_header(); ?>


<main class="main">
    <!-- slick slider -->
    <section class="top-slider">
        <div class="container top-slider__container">
            <div class="top-slider__inner">
                <!-- slick group -->
                <?php if (have_rows('main_slider')): ?>
                    <?php while (have_rows('main_slider')) : the_row(); ?>
                        <div class="top-slider__item">
                            <div class="top-slider__content">
                                <h3 class="top-slider__title">
                                    <?php the_sub_field('main_sliderTitle'); ?>
                                </h3>
                                <p class="top-slider__next">
                                    <?php the_sub_field('main_sliderText'); ?>
                                </p>
                                <a class="top-slider__link" href="https://marcho/shop/">
                                    BUY NOW
                                </a>
                            </div>
                            <?php
                            $image = get_sub_field('main_sliderImage');
                            if ($image):
                            ?>
                                <img class="top-slider__img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- slick group -->

    </section>
    <section class="categories-info">
        <div class="categories-info__inner">
            <div class="container">
                <div class="info">
                    <div class="info__wrapper">
                        <!-- info group -->
                        <?php while (have_rows('main__delivery')) : the_row(); ?>
                            <div class="info__item">
                                <?php
                                $image = get_sub_field('delivery__image');
                                if ($image): ?>
                                    <img class="info___img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                                <h5 class="info__item-title"><?php esc_html(the_sub_field('delivery__title')); ?></h5>
                                <p class="info__item-text"><?php esc_html(the_sub_field('delivery__text')); ?> </p>
                            </div>
                        <?php endwhile; ?>
                        <!-- info group -->
                    </div>
                    <!-- categories -->
                    <div class="categories">
                        <?php while (have_rows('main__categoeies')): the_row(); ?>
                            <h2 class="title"><?php echo esc_html(get_sub_field('categoeies__title')); ?></h2>
                            <p class="text"><?php echo esc_html(get_sub_field('categoeies__sub-title')); ?></p>

                            <div class="categories__items">
                                <?php while (have_rows('categoeies__fashion')): the_row(); ?>
                                    <div class="categories__item">
                                        <a class="categories__link-shop" href="https://marcho/shop/">
                                            <?php $image = get_sub_field('categories__fashion-image');
                                            if ($image): ?>
                                                <img class="categories__item-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                            <?php endif; ?>

                                            <div class="categories__item-box">
                                                <p class="categories__item-subtitle"><?php echo esc_html(get_sub_field('categories__fashion-title')); ?></p>
                                                <h4 class="categories__item-title"><?php echo esc_html(get_sub_field('categories__fashion-text')); ?></h4>
                                                <a class="categories__link" href="<?php echo esc_url(get_sub_field('categories__fashion-link')); ?>"><?php echo esc_html(get_sub_field('categories__fashion-link')); ?></a>

                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <!-- categories -->
                </div>
            </div>
        </div>

    </section>
    <!-- popap fancybox-->
    <section class="video-fashion">
        <div class="container">
            <div class="video-fashion__inner">
                <?php while (have_rows('main__video')): the_row(); ?>
                    <?php $image = get_sub_field('video__fashion'); ?>
                    <div class="video-fashion__popup" style="background-image: url('<?php echo esc_url($image['url']); ?>');">



                        <a class="video-fashion__play" data-fancybox href="https://www.youtube.com/watch?v=_sI_Ps7JSEk">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/play-btn.svg" alt="video play button">
                        </a>
                    </div>

                    <div class="video-fashion__content">
                        <p class="video-fashion__subtitle"><?php the_sub_field('video__fashion-subtitle'); ?></p>
                        <h3 class=" title video-fashion__title"><?php the_sub_field('video__fashion-title'); ?></h3>
                        <p class="text video-fashion__text"><?php the_sub_field('video__fashion-text'); ?></p>

                        <a class="video-fashion__link top-slider__link" href="#">V i e w <span>N o w</span></a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- rateyo -->
    <!--trend -->
    <section id="showMore1" class="product show-more">
        <div class="container show-more__container">
            <?php while (have_rows('main__trend')): the_row(); ?>
                <h3 class="title"><?php esc_html(the_sub_field('trend__title')); ?></h3>
                <p class="text"><?php esc_html(the_sub_field('trend__subTitle')); ?></p>
                <div class="product__items show-more__list">
                    <?php while (have_rows('trend__product')): the_row(); ?>
                        <?php $sale  = get_sub_field('sale'); ?>

                        <div class="product-item show-more__item <?php if ($sale) {
                                                                        echo 'product-item--sale';
                                                                    } ?>">
                            <div class="product-item__img-box">
                                <?php $image = get_sub_field('trend__product-image');
                                if ($image): ?>
                                    <img class="product-item__images show-more__img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                                <div class="product-item__link-box">
                                    <a class="product-item__link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="19px" height="20px">
                                            <path fill-rule="evenodd" fill="rgb(41, 40, 45)"
                                                d="M18.709,18.219 L14.028,13.269 C15.231,11.813 15.891,9.982 15.891,8.075 C15.891,3.622 12.328,-0.002 7.947,-0.002 C3.568,-0.002 0.005,3.622 0.005,8.075 C0.005,12.529 3.568,16.153 7.947,16.153 C9.591,16.153 11.160,15.649 12.498,14.690 L17.216,19.680 C17.414,19.890 17.678,20.004 17.964,20.004 C18.232,20.004 18.486,19.899 18.680,19.710 C19.093,19.307 19.105,18.639 18.709,18.219 L18.709,18.219 ZM7.947,2.106 C11.185,2.106 13.819,4.785 13.819,8.075 C13.819,11.367 11.185,14.046 7.947,14.046 C4.711,14.046 2.078,11.367 2.078,8.075 C2.078,4.785 4.711,2.106 7.947,2.106 L7.947,2.106 Z" />
                                        </svg>
                                    </a>
                                    <a class="product-item__link product-item__link--line product-item__link-cart" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="16px" height="20px">
                                            <path fill-rule="evenodd" fill="rgb(41, 40, 45)"
                                                d="M15.999,17.294 L14.854,4.396 C14.830,4.109 14.589,3.892 14.307,3.892 L11.953,3.892 C11.920,1.740 10.163,0.002 8.005,0.002 C5.847,0.002 4.090,1.740 4.057,3.892 L1.703,3.892 C1.417,3.892 1.180,4.109 1.156,4.396 L0.011,17.294 C0.011,17.311 0.007,17.327 0.007,17.343 C0.007,18.812 1.352,20.006 3.007,20.006 L13.003,20.006 C14.658,20.006 16.003,18.812 16.003,17.343 C16.003,17.327 16.003,17.311 15.999,17.294 L15.999,17.294 ZM8.005,1.106 C9.554,1.106 10.817,2.350 10.849,3.892 L5.161,3.892 C5.193,2.350 6.456,1.106 8.005,1.106 L8.005,1.106 ZM13.003,18.902 L3.007,18.902 C1.969,18.902 1.127,18.215 1.111,17.368 L2.206,5.001 L4.053,5.001 L4.053,6.678 C4.053,6.985 4.298,7.230 4.605,7.230 C4.911,7.230 5.157,6.985 5.157,6.678 L5.157,5.001 L10.849,5.001 L10.849,6.678 C10.849,6.985 11.095,7.230 11.401,7.230 C11.708,7.230 11.953,6.985 11.953,6.678 L11.953,5.001 L13.800,5.001 L14.899,17.368 C14.883,18.215 14.037,18.902 13.003,18.902 L13.003,18.902 Z" />
                                        </svg>
                                    </a>
                                    <a class="product-item__link product-item__link--like product-item__link-liked" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="23px" height="20px">
                                            <path fill-rule="evenodd" fill="rgb(41, 40, 45)"
                                                d="M16.894,-0.001 C14.470,-0.001 12.935,1.423 12.074,2.618 C11.851,2.929 11.661,3.239 11.501,3.532 C11.342,3.239 11.152,2.929 10.928,2.618 C10.068,1.423 8.533,-0.001 6.108,-0.001 C4.384,-0.001 2.810,0.697 1.675,1.964 C0.593,3.172 -0.004,4.791 -0.004,6.521 C-0.004,8.405 0.744,10.157 2.349,12.034 C3.783,13.713 5.847,15.443 8.236,17.447 C9.127,18.193 10.047,18.965 11.028,19.809 L11.057,19.834 C11.184,19.944 11.343,19.999 11.501,19.999 C11.660,19.999 11.818,19.944 11.945,19.834 L11.975,19.809 C12.955,18.965 13.876,18.193 14.766,17.447 C17.156,15.443 19.219,13.713 20.653,12.034 C22.258,10.157 23.006,8.405 23.006,6.521 C23.006,4.791 22.410,3.172 21.327,1.964 C20.192,0.696 18.618,-0.001 16.894,-0.001 ZM13.892,16.437 C13.124,17.080 12.334,17.743 11.501,18.455 C10.668,17.743 9.878,17.081 9.111,16.437 C4.434,12.516 1.345,9.926 1.345,6.521 C1.345,5.114 1.821,3.806 2.687,2.840 C3.562,1.863 4.777,1.325 6.108,1.325 C7.957,1.325 9.151,2.445 9.828,3.385 C10.435,4.228 10.752,5.078 10.860,5.404 C10.951,5.677 11.209,5.862 11.501,5.862 C11.793,5.862 12.052,5.677 12.142,5.404 C12.250,5.078 12.567,4.228 13.174,3.385 C13.851,2.445 15.046,1.325 16.894,1.325 C18.225,1.325 19.440,1.863 20.316,2.840 C21.181,3.806 21.658,5.114 21.658,6.521 C21.658,9.926 18.568,12.516 13.892,16.437 Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="star" data-rateyo-rating="4.5"></div>
                            <h4 class="product-item__title"><?php esc_html(the_sub_field('trend__product-name')); ?></h4>
                            <div class="product-item__price">
                                <div class="product-item__new-price"><?php esc_html(the_sub_field('trend__product-price')); ?></div>
                                <div class="product-item__old-price"><?php esc_html(the_sub_field('trend__product-previousPrice')); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endwhile; ?>
            <button class="product__link show-more__btn" href="#">
                LOAD MORE
            </button>

        </div>
    </section>
    <!--trend -->




    <?php while (have_rows('main__promo')): the_row(); ?>
        <?php $image = get_sub_field('promo__image'); ?>
        <div class="promo" style="background-image: url('<?php echo esc_url($image['url']); ?>');">


            <div class="container">
                <div class="promo__inner">
                    <p class="promo__subtitle">
                        <?php echo esc_html(get_sub_field('promo__text')); ?>
                    </p>

                    <?php $count = esc_attr(get_sub_field('promo__count')); ?>

                    <h3 class="title"><?php echo esc_html(get_sub_field('promo__sub-title')); ?></h3>
                    <div class="promo__clock" data-time="<?php echo $count; ?>">
                        <div class="promo__clock-item">
                            <span class="promo__days"></span>
                            <div class="promo__text">Days</div>
                        </div>
                        <div class="promo__clock-item">
                            <span class="promo__hours"></span>
                            <div class="promo__text">Hours</div>
                        </div>
                        <div class="promo__clock-item">
                            <span class="promo__minutes"></span>
                            <div class="promo__text">Minutes</div>
                        </div>
                        <div class="promo__clock-item">
                            <span class="promo__seconds"></span>
                            <div class="promo__text">Seconds</div>
                        </div>
                    </div>
                    <a class="promo__link product__link" href="https://marcho/shop/">SHOP NOW</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <div class="parners">
        <div class="container">
            <ul class="parners__list">
                <?php while (have_rows('parners')): the_row(); ?>
                    <?php $image = get_sub_field('parners__image');
                    if ($image): ?>
                        <li class="parners__item"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></li>
                    <?php endif; ?>
                <?php endwhile ?>

            </ul>
        </div>
    </div>



    <section class="blog">
        <div class="container">
            <?php while (have_rows('main__blog')): the_row(); ?>
                <h3 class="title">
                    <?php echo esc_html(get_sub_field('blog__title')); ?>
                </h3>
                <p class="text">
                    <?php echo esc_html(get_sub_field('blog__sub-title')); ?>
                </p>
                <div class="blog__items">
                    <?php while (have_rows('blog__cart')): the_row(); ?>
                        <div class="blog__item">
                            <a class="blog__item-imglink" href="#">
                            <?php $image = get_sub_field('blog__image');
                                if ($image): ?>
                                    <img  src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                                <div class="blog__item-box">
                                <div class="block-box">
                                    <div class="block-box__author" href="">By Admin</div>
                                    <div class="block-box__date"><?php echo esc_html(get_sub_field('blog__data')); ?></div>
                                </div>
                                <a class="blog__item-title-link" href="#">
                                    <h4 class="blog__item-title">
                                    <?php echo esc_html(get_sub_field('blog__text')); ?>
                                    </h4>
                                </a>
                                <a class="blog__item-link" href="#">
                                    Read More
                                </a>
                            </div>
                            </a>
                  
                        </div>
                    <?php endwhile ?>
                </div>
            <?php endwhile ?>
        </div>
    </section>
</main>


<?php get_footer(); ?>