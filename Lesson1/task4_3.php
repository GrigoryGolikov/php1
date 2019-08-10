<?php
$year = 2019;
$headline1 = "Информация обо мне";
$title = "Главная страница - страница обо мне";

// Получаем содержимое файла site.tmpl
$content = file_get_contents("site.tmpl");

// Заменяем текстовые вставки на значения соответствующих переменных
$content = str_replace("{{TITLE}}",$title,$content);
$content = str_replace("{{HEADLINE1}}",$headline1,$content);
$content = str_replace("{{YEAR}}",$year,$content);

echo $content;