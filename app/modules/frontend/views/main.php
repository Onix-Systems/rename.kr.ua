<div class="bs-example" data-example-id="striped-table">
   <div class="form-group"> 
      <label for="exampleInputEmail1">
         Пошук вулиці
      </label> 
      <input type="text" class="form-control" name='placeInp' placeholder="Введіть назву"> 
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
   <h3>Райони</h3>
   <table class="table table-striped ">
      <thead>
         <tr>
            <th>#</th>
            <th>Стара назва</th>
            <th>Нова назва</th>
         </tr>
      </thead>
      <tbody>
         <?php if ($areas): ?>
            <?php foreach ($areas as $keyArea => $valueArea): ?>
               <tr class='place-row'>
                  <th scope="row"><?= $keyArea+1 ?></th>
                  <td><?= $valueArea['old_name'] ?></td>
                  <td><?= $valueArea['new_name'] ?></td>
               </tr>
            <?php endforeach ?>
         <?php endif; ?>
      </tbody>
   </table>
   <h3>Вулиці</h3>
   <table class="table table-striped readyTable">
      <thead>
         <tr>
            <th>#</th>
            <th>Стара назва</th>
            <th>Нова назва</th>
            <th>На честь</th>
         </tr>
      </thead>
      <tbody>
         <?php if ($data): ?>
            <?php foreach ($data as $keyPlace => $valuePlace): ?>
               <tr class='place-row'>
                  <th scope="row"></th>
                  <td class='old_name'><?= $valuePlace['old_name'] ?></td>
                  <td class='new_name'><?= $valuePlace['new_name'] ?></td>
                  <td class='about'>
                     <?php if($valuePlace['eponim']): ?>
                        <?php 
                           $res = false;
                           foreach (['', 'Особа', 'Об’єкт', 'Історична назва', 'Суб’єкт'] as $key => $value) 
                              if ($valuePlace['eponim_type'] == $key) 
                                 $res = ($valuePlace['eponim'] && $valuePlace['eponim'] != 'історична назва') ? '<a href="'.$valuePlace['eponim'].'" target="__blank">'.$value.'</a>' : $value;
                           echo $res;
                         ?>
                     <?php endif; ?>
                  </td>
               </tr>
            <?php endforeach ?>
         <?php endif; ?>
      </tbody>
   </table>

</div>