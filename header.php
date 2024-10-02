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
                <? if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
                }
                ?>
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
                    <a class="user-nav__link modal__btn" href="#">
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
        </div>
    </header>





    <!-- Modal -->
    <div class="modal__wrapper">
        <div class="modal">
            <div class="modal__close"> <img src="https://www.svgrepo.com/show/499592/close-x.svg" alt="cancel" width="10px" height="10px"></div>
            <div class="modal__title"><span>Авторизация</span> </div>
            <div class="modal__body">
                <div class="modal__verification">перейдите к регистрации </div>
                <form class="modal__form" action="">
                    <input placeholder="ведите email@" class="modal__input modal__mail" type="email">
                    <input placeholder="ведите пароль" class="modal__input modal__password" type="text">
                    <button class="modal__button">Войти</button>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modalRegist__wrapper">
        <div class="modalRegist">
            <div class="modalRegist__close modal__close"> <img src="https://www.svgrepo.com/show/499592/close-x.svg" alt="cancel" width="40px" height="30px"></div>
            <div class="modalRegist__title"><span>регистрация</span> </div>
            <div class="modalRegist__body">
                <div class="modalRegist__regist">перейти к входу</div>
                <form class="modalRegist__form" action="">
                    <input placeholder="email@" class="modalRegist__input modal__email" type="email">
                    <input placeholder="телефон" class="modalRegist__input modalRegist__tell" type="tel" value="+38" placeholder="+380-00-000-00-00">
                    <button class="modalRegist__button">регистрация</button>
                </form>
            </div>
        </div>
    </div>