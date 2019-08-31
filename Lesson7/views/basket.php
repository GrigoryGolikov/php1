<h2>Корзина</h2>

<?php foreach ($basket as $good): ?>
    <form method="get" action="/basket/" >
        <a href="/item/<?=$good["id"]?>">
            <b><?=$good['name']?></b><br>
            <img width="150" src="/img/<?=$good['image']?>" alt=""></a><br>
        Цена: <?=$good['price']?><br>
        <button type="submit" value="<?=$good["id"]?>" name="id">Удалить</button><hr>
    </form>
<?php endforeach; ?>
