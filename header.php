<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // Критически важная функция WordPress для подключения скриптов и стилей ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="site-header">
        <div class="container">
            <div class="header-inner">
                <!-- Логотип -->
                <div class="logo">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<a href="' . esc_url(home_url('/')) . '">Потолки PRO-Кубань</a>';
                    }
                    ?>
                </div>

                <!-- Основное меню -->
                <nav class="main-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'primary-menu',
                        'container'      => false,
                    ));
                    ?>
                </nav>

                <!-- Телефон в шапке (можно вынести в настройки темы) -->
                <div class="header-contacts">
                    <a href="tel:+79991234567" class="btn-phone">
                        <i class="fas fa-phone-alt"></i> +7 (999) 123-45-67
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Контейнер для основного контента -->
    <div class="site-content">