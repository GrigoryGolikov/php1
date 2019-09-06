<h2>Отзывы</h2>

<?=$error?>
<form action="/feedback/<?=$action?>/" method="post">
    Оставьте отзыв: <br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$name?>"><br>
    <input type="text" name="message" placeholder="Ваш отзыв" value="<?=$feedtext?>"><br>
    <input type="submit" value="<?=$buttonText?>">
</form>




<?php foreach ($feedback as $item): ?>
<p>
    <b><?=$item['name']?>:</b> <?=$item['feedback']?> <a href="/feedback/edit/<?=$item['id']?>">[править]</a>  <a href="/feedback/delete/<?=$item['id']?>">[x]</a><br>
</p>
<?php endforeach;?>


