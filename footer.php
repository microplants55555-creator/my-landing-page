    </div><!-- Закрываем .site-content из header.php -->

    <footer class="site-footer">
        <div class="container">
            <div class="footer-columns">
                <!-- Колонка 1: О компании -->
                <div class="footer-col">
                    <h3>Потолки PRO-Кубань</h3>
                    <p>Профессиональная установка натяжных потолков в Краснодаре с 2011 года. Личная ответственность мастеров-основателей.</p>
                </div>

                <!-- Колонка 2: Контакты -->
                <div class="footer-col">
                    <h3>Контакты</h3>
                    <p><i class="fas fa-phone-alt"></i> <a href="tel:+79991234567">+7 (999) 123-45-67</a></p>
                    <p><i class="fas fa-envelope"></i> <a href="mailto:info@example.com">info@potolki-pro-kuban.ru</a></p>
                    <p><i class="fas fa-map-marker-alt"></i> Краснодар</p>
                </div>

                <!-- Колонка 3: Быстрые ссылки -->
                <div class="footer-col">
                    <h3>Быстрые ссылки</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                    ));
                    ?>
                </div>
            </div>

            <!-- Копирайт -->
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> «Потолки PRO-Кубань». Все права защищены.</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); // Критически важная функция WordPress для подключения скриптов в подвале ?>
</body>
</html>