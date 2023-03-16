# Laravel + Lighthouse PHP

## Usage
Для запуска проекта нам понадобится докер.

1. Собираем все контейнеры с помощью команды - docker compose up -d

2. Устанавливаем зависимости composer в контейнере app - composer install

3. Проводим миграции в контейнере app - php artisan migrate:fresh --seed


## Сущности
Работа ведется с сущностями User, UserStatus, Specialization.

User и UserStatus имеют связь Один-к-одному.

User и Specialization имеют связь Один-ко-многим через промежуточную модель UserSpecialization.

## Project
Схема GraphQL с описанием всех схем, запросов и мутаций находится в директории graphql.

В схеме были использованы:
* пагинация;
* привязка отношений (в т.ч. вложенная;
* валидация.

Для создания мутации был использован генерируемый Lighthouse класс, в котором описывалась логика.

Для обработки входящих данных мутации было принято решение использовать DTO, что позволяет не беспокоиться о целостности поступающих данных.
