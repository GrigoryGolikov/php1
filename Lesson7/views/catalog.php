
<?php foreach ($goods as $good): ?>
<form method="get" action="/catalog/" >
    <a href="/item/<?=$good["id"]?>">
    <b><?=$good['name']?></b><br>
    <img width="150" src="/img/<?=$good['image']?>" alt=""></a><br>
    Цена: <?=$good['price']?><br>
    <button type="submit" value="<?=$good["id"]?>" name="id">Купить</button><hr>
</form>
<?php endforeach; ?>
