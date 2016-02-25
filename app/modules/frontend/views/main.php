<div class="bs-example" data-example-id="striped-table">
   <div class="form-group"> 
      <label for="exampleInputEmail1">
         Поиск улици
      </label> 
      <input type="text" class="form-control" name='placeInp' placeholder="Введите название"> 
   </div>
   <a href="" class='alphebet'>А</a>
   <a href="" class='alphebet'>Б</a>
   <a href="" class='alphebet'>В</a>
   <a href="" class='alphebet'>Г</a>
   <a href="" class='alphebet'>Ґ</a>
   <a href="" class='alphebet'>Д</a>
   <a href="" class='alphebet'>Е</a>
   <a href="" class='alphebet'>Є</a>
   <a href="" class='alphebet'>Ж</a>
   <a href="" class='alphebet'>З</a>
   <a href="" class='alphebet'>И</a>
   <a href="" class='alphebet'>І</a>
   <a href="" class='alphebet'>Ї</a>
   <a href="" class='alphebet'>Й</a>
   <a href="" class='alphebet'>К</a>
   <a href="" class='alphebet'>Л</a>
   <a href="" class='alphebet'>М</a>
   <a href="" class='alphebet'>Н</a>
   <a href="" class='alphebet'>О</a>
   <a href="" class='alphebet'>П</a>
   <a href="" class='alphebet'>Р</a>
   <a href="" class='alphebet'>С</a>
   <a href="" class='alphebet'>Т</a>
   <a href="" class='alphebet'>У</a>
   <a href="" class='alphebet'>Ф</a>
   <a href="" class='alphebet'>Х</a>
   <a href="" class='alphebet'>Ц</a> 
   <a href="" class='alphebet'>Ч</a>
   <a href="" class='alphebet'>Ш</a>
   <a href="" class='alphebet'>Щ</a>
   <a href="" class='alphebet'>Ь</a>
   <a href="" class='alphebet'>Ю</a>
   <a href="" class='alphebet'>Я</a> 
   <a href="" class='alphebet'>1</a>
   <a href="" class='alphebet'>2</a>
   <a href="" class='alphebet'>3</a>
   <a href="" class='alphebet'>4</a>
   <a href="" class='alphebet'>5</a>
   <a href="" class='alphebet'>6</a>
   <a href="" class='alphebet'>7</a>
   <a href="" class='alphebet'>8</a>
   <a href="" class='alphebet'>9</a>
   <a href="" class='alphebet'>0</a>

   <table class="table table-striped readyTable">
      <thead>
         <tr>
            <th>#</th>
            <th>Старое название</th>
            <th>Новое название</th>
         </tr>
      </thead>
      <tbody>
         <?php if ($data): ?>
            <?php foreach ($data as $keyPlace => $valuePlace): ?>
               <tr class='place-row'>
                  <th scope="row"></th>
                  <td class='old_name'><?= $valuePlace['old_name'] ?></td>
                  <td class='new_name'><?= $valuePlace['new_name'] ?></td>
               </tr>
            <?php endforeach ?>
         <?php endif; ?>
      </tbody>
   </table>

</div>