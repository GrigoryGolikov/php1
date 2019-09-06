<?php if (!$allow): ?>
<form action="/login/" method="post">
    <input type='text' name='login' placeholder='Логин'>
    <input type='password' name='pass' placeholder='Пароль'>
    Save? <input type='checkbox' name='save'>
    <input type='submit' name='send'>
</form>
<?php else:?>
Добро пожаловать, <?=$user?> <a href='/logout/'>выход</a><br>


<?php endif;?>

<a href="/">Главная</a>
<a href="/news/">Новости</a>
<a href="/catalog/">Каталог</a>
<a href="/feedback/">Отзывы</a>
<a href="/basket/">Корзина <span id="counter"><?=$count?></span></a>
<?php if ($admin): ?>
    <a href="/admin/">Админка</a>
<?php endif;?>