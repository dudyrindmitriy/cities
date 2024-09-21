## Требования

- PHP >= 8.0
- Composer
- MySQL или другая поддерживаемая СУБД
## Установка

1. Клонируйте репозиторий:
bash
git clone https://github.com/dudyrindmitriy/cities.git

2. Перейдите в директорию проекта:   
bash
cd cities

3. Установите зависимости:   
bash
composer install

4. Создайте файл `.env` на основе `.env.example`:   
bash
cp .env.example .env

5. Настройте подключение к базе данных в файле `.env`:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

6. Выполните миграции:
bash
php artisan migrate

7. Импортируйте города из API:
bash
php artisan parse:cities

8. Запустите сервер разработки: 
bash
php artisan serve
Приложение будет доступно по адресу [http://localhost:8000](http://localhost:8000).

## Использование

- При запуске приложения откроется главная страница с списком городов.
- Кликнув на город, вы будете перенаправлены на страницу с информацией о выбранном городе и с выделенным именем города.
- Если вы перейдете на основной домен (например, `http://localhost:8000`), вы будете перенаправлены на последний выбранный город.
- Вы можете использовать ссылки для перехода на страницы "О нас" и "Новости". Все ссылки будут содержать выбранный город в URL.

## API

В проекте реализованы методы API для добавления и удаления городов. Методы доступны по следующим URL:

- **Добавление города**: `POST /api/`
- **Удаление города**: `DELETE /api/{id}`

Для взаимодействия с API используйте Postman или любой другой инструмент для отправки запросов.