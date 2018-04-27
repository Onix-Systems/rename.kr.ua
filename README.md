# rename.kr.ua

Сайт [rename.kr.ua](http://rename.kr.ua/) створено, щоб допомогти жителям міста знайти як саме змінилися назви вулиць, згідно закону про декомунізацію

Information about renamed streets in Kirovohrad, Ukraine in 2015-2016

---

### Для розгорання веб севера необхідні деякі програми:

1. Oracle VirtulBox https://www.virtualbox.org
1. Hashicorp Vagrant https://www.vagrantup.com/
1. Git https://git-scm.com/

### Більш детально з використаними продуктими можна ознайомитись:

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
    ├── credentials.env          *
    ├── rmkr.sql            **
    ├── .env            ***
    └── Vagrantfile

```
`* credentials.env` - містить користувацькі дані, як приклад (credentials.env.example)

`** rmkr.sql` - таблиця для експорту в базу даних, постачається окремо

`***` Якщо 80 порт, у вас, зайнятий, вкажіть вільний порт через файл `.env` як приклад (.env.example).

Для запуску середовища використовуйте наступну команду:

`$ vagrant up`

Після запуску віртуальної машини сайт буде доступний за адресою:
http://localhost:8080
