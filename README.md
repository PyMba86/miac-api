# Интеграция с МИАЦ

Библиотека для взаимодействия с МИАЦ ХМАО-Югра

Функции:
- Получить список МО
- Получить список специалистов
- Получить список слотов за период
- Изменить состояние слота

Особенности:
- Управление сеансами - установка правильных заголовков SOAP
- Отслеживание состояние сообщения
- Построение правильного сообщения запроса на основе предоставленных опций:
 библиотека пытается упростить слишкой сложные структуры запросов
- Обработка исключений и проверка сообщений об ошибках в ответе 

Задачи:
- задокументировать методы
- написать тесы к каждому методу (юнит, интеграционные)
- настроить непрерывное развертывание в composer


Установка:
```bash
$ composer require "pymba86/miac-api"
```