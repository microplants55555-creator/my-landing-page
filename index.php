<?php
/**
 * Основной шаблон темы
 *
 * @package Potolki_PRO_Kuban
 */

get_header(); // Загружает header.php
?>

<main id="main" class="site-main">
    <section class="hero">
        <div class="container">
            <h1><?php echo get_theme_mod('hero_title', 'Идеальный потолок в Краснодаре за 1 день'); ?></h1>
            <p><?php echo get_theme_mod('hero_description', 'Мы лично делаем замер, монтаж и даём гарантию на каждый проект с 2011 года.'); ?></p>
            <a href="#calculator" class="btn btn-accent">Рассчитать стоимость</a>
        </div>
    </section>

    <section id="calculator" class="calculator-section">
        <div class="container">
            <h2>Калькулятор стоимости</h2>
            <!-- Код калькулятора будет здесь -->
            <div id="calc-container"></div>
        </div>
    </section>

    <section class="portfolio-section">
        <div class="container">
            <h2>Наши работы</h2>
            <?php
            // Вывод портфолио из записей WordPress
            $portfolio_query = new WP_Query(array(
                'post_type' => 'portfolio',
                'posts_per_page' => 6
            ));
            if ($portfolio_query->have_posts()) :
                echo '<div class="portfolio-grid">';
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                    echo '<div class="portfolio-item">';
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium');
                    }
                    echo '<h3>' . get_the_title() . '</h3>';
                    echo '<p>' . get_the_excerpt() . '</p>';
                    echo '</div>';
                endwhile;
                echo '</div>';
                wp_reset_postdata();
            else :
                echo '<p>Работы пока не добавлены.</p>';
            endif;
            ?>
        </div>
    </section>

    <!-- Здесь будут другие секции: страхи, процесс, контакты -->
</main>

<?php
get_footer(); // Загружает footer.php
?>