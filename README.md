# rename.kr.ua

Сайт [rename.kr.ua](http://rename.kr.ua/) створено, щоб допомогти жителям міста знайти як саме змінилися назви вулиць, згідно закону про декомунізацію

Information about renamed streets in Kirovohrad, Ukraine in 2015-2016

---

### Для розгортання веб сервера локально, необхідні деякі програми:

1. Oracle VirtulBox https://www.virtualbox.org
1. Hashicorp Vagrant https://www.vagrantup.com/
1. Git https://git-scm.com/

### Більш детально з використаними продуктами можна ознайомитись:

1. https://www.vagrantup.com/ - official site Vagrant
1. https://hub.docker.com/_/mysql/ - official repository MYSQL
1. https://hub.docker.com/_/php/ - official reopsitory PHP
1. https://getcomposer.org/ - official documentations Composer for PHP
1. https://docs.docker.com/ - official documentations for Docker

# Інструкція з використання

Середовище розробки використовує поточну папку як джерело для програми.

### Структура файлів проекту
```
    .
    ├── Dockerfile
    ├── docker-compose.yml
    ├── docker-compose.override.yml
    ├── credentials.env          *
    ├── rmkr.sql            **
    ├── .env            ***
    └── Vagrantfile

```
`* credentials.env` - містить користувацькі дані, як приклад (credentials.env.example)

`** rmkr.sql` - таблиця для експорту в базу даних, постачається окремо

`***` Якщо 80 порт, у вас, зайнятий, вкажіть вільний порт через файл `.env` як приклад (.env.example),та розкоментуйте відповідні рядки в `docker-compose.yml`.

`#   ports:`
`#    - "${BIND_PORT:-80}:80"`

Для запуску середовища використовуйте наступну команду:

`$ vagrant up`

### Після запуску віртуальної машини сайт буде доступний за адресою:
http://localhost:8080

---
### Розгортання проекту на хмарному сервісі, з існуючим реверс проксі-сервісом traefik

Для розгортання проекту і підключення до сервісу traefik, необхідно запустити `docker-compose.yml` разом з `docker-compose.override.yml` використовуючи `-f`:

`docker-compose -f docker-compose.yml -f docker-compose.override.yml up -d`
