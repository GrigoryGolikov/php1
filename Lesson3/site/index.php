<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'main';
}


switch ($page) {
    case 'main':
        $params = ['name' => 'Alex'];
        $menu = [
            'Главная' => '"/Lesson3/site/"',
            'Каталог' => '"/Lesson3/site/?page=catalog"',
            'АПИ тест' => '"/Lesson3/site/?page=apicatalog"',
        ];
        break;
    case 'catalog':
        $params = ['catalog' => [
            "Спички",
            "Метла",
            "Ведро"
        ]
        ];
        $menu = [
            'Главная' => '"/Lesson3/site/"',
            'Каталог' => '"/Lesson3/site/?page=catalog\"',
            'АПИ тест' => '"/Lesson3/site/?page=apicatalog\"',
        ];
        break;
    case 'apicatalog':
        $params = ['catalog' => [
            "Спички",
            "Метла",
            "Ведро"
        ]
        ];
        $menu = [];
        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        die();
        break;
}



echo render($page, $params, $menu);

function render($page, $params = [], $menu)
{

    return renderTempate("layout", ['content' => renderTempate($page, $params), 'menu' => renderMenu($menu)]);
}


function renderTempate($page, $params = [])
{
    ob_start();

    extract($params);

    $filename = $page . ".php";

    if (file_exists($filename)) {
        include $filename;
    } else {
        echo "Страницы не существует 404";
    }

    return ob_get_clean();
}

function renderMenu($arr = []){

    if (!is_array($arr)) {
        return 'Error';
    }
    $renderArr[] = '';
    foreach ($arr as $key => $value) {
        $renderArr[] = "<a href=" . $value ." >" . $key . "</a>";
    }
    $renderArr[] = '';
    return implode($renderArr);
}