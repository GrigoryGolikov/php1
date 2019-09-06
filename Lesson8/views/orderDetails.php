<h2>Детали заказа</h2>

Имя <?=$name?>
телефон: <?=$phone?>
адрес: <?=$adres?>

статус: <span id = <?=status.$id_order?>><?=$status?></span>
<button class="accept" id="<?=$id_order?>">В работу</button><br>
<button class="close" id="<?=$id_order?>">Закрыть</button><br>

<?php foreach ($basket as $item):?>
    <div id="item_<?=$item['basket_id']?>">
        <?=$item['name']?> <br>
        <img src="/img/<?= $item['image'] ?>" width="150">
        <br>
        <button class="delete" id="<?=$item['basket_id']?>">Удалить</button>
        <br>
        Цена: <?=$item['price']?>  <br>
    </div>
<?php endforeach;?>
<br>

Общая стоимость: <span id="summ"><?=$summ?></span>

