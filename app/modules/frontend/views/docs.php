<article>
                <p>Данные в файле представлены в виде объекта:</p>
                <code>
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
                <p>Поля районов представлены ключами вида r61, r62, ... , r68 - таким образом кодируются районы в государственных статистических реестрах исполнительной власти. Нумерация алфавитная, это означает, что 61 - это АНД район, 62 - Бабушкинский, 68 - Самарский. Однако, в связи с изменением названий районов поменялся и их алфавитный порядок. Но! <strong>Я более чем уверен, что в органах установившийся порядок менять не будут!</strong> Скорее всего, нумерация останется старой, поменяют только названия. Ввиду этого я оставил такие поля для совместимости с базами органов исполнительной власти.</p>
                <p>Также в корне объекта имеется поле <span class="data-text">lastUpdate</span> которое содержит временную метку даты последнего обновления файла данных (целое число).</p>
                <p>Каждый район - это объект с обязательными полями: <span class="data-text">oldAreaName</span> - старое название района, <span class="data-text">newAreaName</span> - новое название района, <span class="data-text">objects</span> - массив географических объектов, подвергшихся переименованию.</p>
                <p>Каждый объект переименования имеет обязательные поля: <span class="data-text">type</span> - тип объекта (перечень ниже), <span class="data-text">oldName</span> - старое название объекта, <span class="data-text">newName</span> - новое название объекта, а также набор необязательных полей, таких как <span class="data-text">newType</span>, <span class="data-text">restored</span>, <span class="data-text">link</span>.</p>
                <p>Типы объектов переименования имеют следующиие значения:<br> 
                    <span class="data-text">street</span> - улица<br>                
                    <span class="data-text">lane</span> - переулок<br>
                    <span class="data-text">avenue</span> - проспект<br>
                    <span class="data-text">impasse</span> - тупик<br>
                    <span class="data-text">square</span> - площадь<br>
                    <span class="data-text">embankment</span> - набережная<br>
                    <span class="data-text">park</span> - парк, сквер<br>
                    <span class="data-text">slope</span> - спуск<br>
                    <span class="data-text">area</span> - жилмассив<br>
                    <span class="data-text">lake</span> - залив<br>
                    <span class="data-text">island</span> - остров<br>
                    <span class="data-text">station</span> - станция<br>
                </p>
                <p>Поле <span class="data-text">newType</span> описывает новый тип объекта в случае если при переименовании также был изменён статус объекта (например, если улица объявлена проспектом).</p>
                <p>Поле <span class="data-text">restored</span> с установленным значением <span class="data-text">true</span> указывает на возвращение объекту исторического названия.</p>
                <p>Поле <span class="data-text">link</span> описывает ссылку на субъекта переименования текущего объекта (иначе говоря, в честь кого или чего сделано переименование конкретной улицы или места). Это поле, в сою очередь имеет два обязательных поля: <span class="data-text">href</span> - ссылка на источник с информацией о субъекте и <span class="data-text">type</span> - тип субъекта, это целое число, значение которого соответствует:<br>
                    <span class="data-text">0</span> - конкретная личность<br>
                    <span class="data-text">1</span> - определенное историческое событие<br>
                    <span class="data-text">2</span> - географический объект<br>
                    <span class="data-text">3</span> - некоторая организация или сообщество, например - семья<br>
                </p>
                <p>Принимаются предложения по дополнительным полям, присоединяйтесь к разработке на странице <a href="/about">О проекте</a></p>
                <p>Прямая ссылка на файл с данными в формате JSON: <a href="api/v1/streets">скачать...</a></p>
            </article>