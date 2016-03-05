<h3 class='page-title'>
    Про проект
</h3>

<div class="page-body">
    <article>
        <p><b>Дані у файлі представлені у вигляді об'єкта:</b></p>
        <code type='json'>
            <pre>
                {
                    "lastUpdate": 1451286316468,
                    "r61": {
                        "oldAreaName": "Амур-Нижньодніпровський",
                        "newAreaName": "Амур-Нижньодніпровський",
                        "objects": [
                            {
                                "type": "street", 
                                "newType": "avenue", 
                                "oldName": "Баглія",
                                "newName": "Брацлавська",
                                "restored": true,
                                "link": {
                                    "href": "https://uk.wikipedia.org/wiki/%D0%91%D1%80%D0%B0%D1%86%D0%BB%D0%B0%D0%B2",
                                    "type": 2
                                }
                            },
                        ...
                        ]
                    },
                    "r62": {
                    ...
                    },
                    ...
                    "r68": {
                    ...
                    }
                }
            </pre>
        </code>
        <p>Поля районів представлені ключами виду r61, r62, ... , r68 - таким чином кодуються райони в державних статистичних реєстрах виконавчої влади. Нумерация алфавитная, это означает, что 61 - это АНД район, 62 - Бабушкинский, 68 - Самарский. Однако, в связи с изменением названий районов поменялся и их алфавитный порядок. Но! <strong>Я более чем уверен, что в органах установившийся порядок менять не будут!</strong> Скорее всего, нумерация останется старой, поменяют только названия. Ввиду этого я оставил такие поля для совместимости с базами органов исполнительной власти.</p>
        <p>Також в корені об'єкта є поле <span class="data-text">lastUpdate</span> яке містить тимчасову мітку дати останнього оновлення файлу даних ( ціле число ).</p>
        <p>Кожен район - це об'єкт з обов'язковими полями: <span class="data-text">oldAreaName</span> - стара назва району, <span class="data-text">newAreaName</span> -нова назва району, <span class="data-text">objects</span> - массив географічних обьектів, які зазнали перейменування.</p>
        <p>Кожен об'єкт перейменування має обов'язкові поля: <span class="data-text">type</span> - тип объекта (перечень ниже), <span class="data-text">oldName</span> - стара назва объекта, <span class="data-text">newName</span> - нова назва объекта, а також набір необов'язкових полів , таких як  <span class="data-text">newType</span>, <span class="data-text">restored</span>, <span class="data-text">link</span>.</p>
        <p>Поле <span class="data-text">link</span> описує посилання на суб'єкта перейменування поточного об'єкта ( інакше кажучи , в честь кого або чого зроблено перейменування конкретної вулиці чи місця ) . Це поле , в сою чергу має два обов'язкових поля: <span class="data-text">href</span> - посилання на джерело з інформацією про суб'єкта і <span class="data-text">type</span> - тип суб'єкта , це ціле число , значення якого відповідає:<br>
            <span class="data-text">1</span> - конкретна особистість<br>
            <span class="data-text">3</span> - певну історичну подію<br>
            <span class="data-text">2</span> - географічний об'єкт<br>
            <span class="data-text">4</span> - деяка організація або співтовариство , наприклад - сім'я<br>
        </p>
        <p>Пряме посилання на API з даними в форматі JSON: <a href="api/v1/streets">завантажити...</a></p>
    </article>
</div>