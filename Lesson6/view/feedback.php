<h2>Отзывы</h2>

<?=$error?>

<form action="/feedback/add"/" method="post">
    Оставьте отзыв: <br>
    <input hidden type="text" name="id" value="<?=$row['id']?>"><br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$row['name']?>"><br>
    <input type="text" name="feedback" placeholder="Ваш отзыв" value="<?=$row['feedback']?>"><br>
    <input type="submit">
</form>

<?php foreach ($feedback as $item): ?>
    <p>
        <b><?=$item['name']?>:</b> <?=$item['feedback']?> <a href="/feedback/edit/<?=$item['id']?>">[править]</a>  <a href="/feedback/delete/<?=$item['id']?>">[x]</a><br>
    </p>
<?php endforeach;?>