

<form method="get" action="/catalog/">
    <b><?=$good['name']?></b><br>
    <img width="150" src="/img/<?=$good['image']?>" alt=""></a><br>
    <b>Описание:</b><br> <?=$good['description']?><br>
    Цена: <?=$good['price']?><br>
    <button type="submit" value="<?=$good["id"]?>" name="id">Купить</button><hr>
</form>