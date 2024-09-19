<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php global $geniuscourses_options; ?>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                    <img class="logo__img" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo">
                </a>

                <nav class="menu">
                    <!--nav -->
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'header_nav',
                            'menu_class' => 'menu',
                            'container' => false,
                            'add_li_class' => 'menu__list-item',
                            'add_link_class' => 'menu__list-link'
                        ),
                    ); ?>
                    <!--nav -->
                </nav>
                <div class="user-nav">
                    <a class="user-nav__link" href="">
                        <img class="user-nav__link-img" src="<?php echo get_template_directory_uri(); ?>/images/icons/user.svg" alt="">
                    </a>
                    <a class="user-nav__link" href="">
                        <img class="user-nav__link-img" src="<?php echo get_template_directory_uri(); ?>/images/icons/search.svg" alt="">
                    </a>
                    <a class="user-nav__link" href="">
                        <img class="user-nav__link-img" src="<?php echo get_template_directory_uri(); ?>/images/icons/heart_icon.svg" alt="">
                        <span class="user-nav__num">3</span>
                    </a>
                    <a class="user-nav__link" href="">
                        <img class="user-nav__link-img" src="<?php echo get_template_directory_uri(); ?>/images/icons/cart_icon.svg" alt="">
                        <span class="user-nav__num">7</span>
                    </a>
                </div>

            </div>
            <h1 class="title"></h1>
        </div>
    </header>