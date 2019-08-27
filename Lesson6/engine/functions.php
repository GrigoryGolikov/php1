<?php

function prepareVariables($page, $action, $id) {
    $params = [];
    switch ($page) {
        case 'main':
            $params = ['name' => 'Alex'];
            break;
        case 'catalog':

            $params = ['catalog' => [
                "Спички",
                "Метла",
                "Ведро"
            ]
            ];
            _log($params, "params");
            break;

        case 'news':
            $params = [
                'news' => getNews()
            ];
            break;
        case 'newscontent':
            $params = [
                'newscontent' => getNewsContent($id)
            ];

            break;
        case 'apicatalog':
            $params = ['catalog' => [
                "Спички",
                "Метла",
                "Ведро"
            ]
            ];
            echo json_encode($params, JSON_UNESCAPED_UNICODE);
            die();
            break;
        case 'feedback':

            doFeedbackAction($params, $action, $id);

            $params['feedback'] = getAllFeedback();
            break;
    }
    return $params;
}

function doFeedbackAction(&$params, $action, $id) {
    if ($_GET['status'] == 1) {$params['error'] = "Отзыв добавлен!";}
    if ($_GET['status'] == 2) {$params['error'] = "Отзыв удален!";}

    if ($action == "delete") {
        var_dump("Удалим отзыв с id={$id}");
        die();
    }
    if ($action == "add") {
        var_dump("Добавим отзыв!");
        die();
    }

}

function getAllFeedback() {
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
    return getAssocResult($sql);
}

function getNews() {
    $news = getAssocResult("SELECT * FROM news");
    return $news;
}

function getNewsContent($id) {
    $id = (int)$id;
    $sql = "SELECT text FROM news WHERE id = {$id}";
    $news = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if(isset($news[0]))
        $result = $news[0];
    return $result;
}

function render($page, $params = [])
{
    return renderTempate(LAYOUTS_DIR . "layout", ['content' => renderTempate($page, $params)]);
}


function renderTempate($page, $params = [])
{
    ob_start();

    extract($params);

    $filename = TEMPLATES_DIR . $page . ".php";

    if (file_exists($filename)) {
        include $filename;
    } else {
        echo "Страницы не существует 404";
    }


    return ob_get_clean();
}
