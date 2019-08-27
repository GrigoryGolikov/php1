Каталог<br>

<?php foreach ($catalog as $item) : ?>
    <p><a href="/product/<?=$item['id']?>"><?=$item['name']?> : <?=$item['price']?> руб. </a> </p>
<?php endforeach;?>

