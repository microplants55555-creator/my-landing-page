/**
 * Основные скрипты для темы "Потолки PRO-Кубань"
 * 1. Калькулятор стоимости
 * 2. Фильтрация портфолио
 * 3. Плавная прокрутка
 */

document.addEventListener('DOMContentLoaded', function() {
    // ==========================================================================
    // 1. КАЛЬКУЛЯТОР СТОИМОСТИ
    // ==========================================================================
    const calcMaterial = document.getElementById('calcMaterial');
    const calcArea = document.getElementById('calcArea');
    const calcLights = document.getElementById('calcLights');
    const calcOptions = document.getElementById('calcOptions');
    const calcTotalElement = document.getElementById('calcTotal');

    // Функция расчета
    function calculateTotal() {
        const pricePerMeter = parseInt(calcMaterial.value) || 0;
        const area = parseInt(calcArea.value) || 1;
        const lights = parseInt(calcLights.value) || 0;
        const options = parseInt(calcOptions.value) || 0;

        const baseCost = pricePerMeter * area;
        const lightsCost = lights * 800; // Предполагаемая стоимость установки одного светильника
        const total = baseCost + lightsCost + options;

        // Форматирование числа с пробелами
        if (calcTotalElement) {
            calcTotalElement.textContent = total.toLocaleString('ru-RU') + ' руб.';
        }
        return total;
    }

    // Слушатели изменений в полях калькулятора
    if (calcMaterial) calcMaterial.addEventListener('change', calculateTotal);
    if (calcArea) calcArea.addEventListener('input', calculateTotal);
    if (calcLights) calcLights.addEventListener('input', calculateTotal);
    if (calcOptions) calcOptions.addEventListener('change', calculateTotal);

    // Инициализация расчета при загрузке
    calculateTotal();

    // ==========================================================================
    // 2. ФИЛЬТРАЦИЯ ПОРТФОЛИО
    // ==========================================================================
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    if (filterButtons.length > 0 && portfolioItems.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Убираем активный класс со всех кнопок
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Добавляем активный класс нажатой кнопке
                this.classList.add('active');

                const filterValue = this.getAttribute('data-filter');

                // Показываем/скрываем элементы портфолио
                portfolioItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    }

    // ==========================================================================
    // 3. ПЛАВНАЯ ПРОКРУТКА ДЛЯ ЯКОРНЫХ ССЫЛОК
    // ==========================================================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;

            e.preventDefault();
            const targetElement = document.querySelector(href);
            if (targetElement) {
                // Учитываем высоту фиксированной шапки
                const headerHeight = document.querySelector('.site-header')?.offsetHeight || 80;
                const targetPosition = targetElement.offsetTop - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ==========================================================================
    // 4. ПРОСТАЯ ОТПРАВКА ФОРМ (ДЕМО   )
    // ==========================================================================
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Собираем данные формы (в реальном проекте здесь будет fetch на сервер)
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);

            // Демо-сообщение об успехе
            alert('Спасибо за заявку! В реальной версии сайта данные уйдут на почту или в CRM.\n\nИмя: ' + data.name + '\nТелефон: ' + data.phone);

            // Сбрасываем форму
            this.reset();
        });
    }

    console.log('Скрипты темы "Потолки PRO-Кубань" успешно загружены.');
});