<?php
/**
 * Основные функции темы "Потолки PRO-Кубань"
 */

// 1. Регистрация типа записи "Портфолио" (Наши работы)
function create_portfolio_post_type() {
    register_post_type('portfolio',
        array(
            'labels' => array(
                'name' => __('Наши работы'),
                'singular_name' => __('Работа')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-format-gallery',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'show_in_rest' => true // Важно для нового редактора
        )
    );
}
add_action('init', 'create_portfolio_post_type');

// 2. Добавление области настроек темы в админке (Customizer)
function theme_customize_register($wp_customize) {
    // Секция для главного экрана
    $wp_customize->add_section('hero_settings', array(
        'title' => __('Главный экран (Hero)', 'potolki-pro-kuban'),
        'priority' => 30,
    ));

    // Заголовок главного экрана
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Идеальный потолок в Краснодаре за 1 день',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => __('Заголовок', 'potolki-pro-kuban'),
        'section' => 'hero_settings',
        'type' => 'text',
    ));

    // Описание главного экрана
    $wp_customize->add_setting('hero_description', array(
        'default' => 'Мы лично делаем замер, монтаж и даём гарантию на каждый проект с 2011 года. Без посредников — только личная ответственность двух мастеров-основателей.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_description', array(
        'label' => __('Описание', 'potolki-pro-kuban'),
        'section' => 'hero_settings',
        'type' => 'textarea',
    ));

    // Добавьте здесь другие настройки: телефоны, email и т.д.
}
add_action('customize_register', 'theme_customize_register');

// 3. Подключение стилей и скриптов темы
function theme_scripts() {
    // Основной файл стилей
    wp_enqueue_style('main-style', get_stylesheet_uri(), array(), '1.0');
    
    // Google Fonts: Inter и Playfair Display
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap', array(), null);
    
    // Font Awesome для иконок
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Основной скрипт темы (для калькулятора и фильтров)
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');

// 4. Поддержка миниатюр (Featured Image) для записей
add_theme_support('post-thumbnails');
set_post_thumbnail_size(300, 200, true); // Размер миниатюры по умолчанию

// 5. Регистрация меню
function register_theme_menus() {
    register_nav_menus(
        array(
            'primary' => __('Основное меню'),
            'footer' => __('Меню в подвале')
        )
    );
}
add_action('init', 'register_theme_menus');
?>