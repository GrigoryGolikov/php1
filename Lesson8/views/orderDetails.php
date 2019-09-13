<h2>Детали заказа</h2>

Имя <?=$name?>
телефон: <?=$phone?>
адрес: <?=$adres?>
<p> Имя <span><?=$name.' '?></span></p>
<p> телефон: <span><?=$phone.' '?></span></p>
<p> адрес: <span><?=$adres.' '?></span></p>
<p> статус: <span id = <?=status.$id_order?>><?=$status?></span></p>

<div class="order">
    <button class="accept" id="<?=$id_order?>">В работу</button><br>
    <button class="close" id="<?=$id_order?>">Закрыть</button><br>
</div>
<hr>
<?php foreach ($basket as $item):?>
    <div id="item_<?=$item['basket_id']?>">
        <?=$item['name']?> <br>
        <img src="/img/<?= $item['image'] ?>" width="150">
        <br>
        <button class="delete" id="<?=$item['basket_id']?>">Удалить</button>
        <br>
        Цена: <?=$item['price']?>  <br>
    </div><hr>
<?php endforeach;?>
<br>
<br><br>
