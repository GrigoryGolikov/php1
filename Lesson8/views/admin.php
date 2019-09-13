<?php if ($admin): ?>
<h2>Админка</h2>


<?php foreach ($orders as $item):?>
    <div id="item_<?=$item['id']?>">
        <div>
            <p> Имя <span><?=$item['name'].' '?></span></p>
            <p> телефон: <span><?=$item['phone'].' '?></span></p>
            <p> адрес: <span><?=$item['adres'].' '?></span></p>
            <p> статус: <span id = <?=status.$item['id']?>><?=$item['status']?></span></p>
            <a href="/orderDetails/<?=$item['id']?>">Детали заказа</a>

        </div>
        <div class="order">
            <button class="accept" id="<?=$item['id']?>">Передать в работу</button><br>
            <button class="close" id="<?=$item['id']?>">Закрыть заказ</button><br>
        </div>
    </div>
    <br><hr>
<?php endforeach;?>
<br>

<?php endif; ?>