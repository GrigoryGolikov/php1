<?php

function prepareVariables($page, $action, $id) {
    $params = [];
    switch ($page) {
        case 'main':
            $params = ['name' => 'Alex'];
            break;
        case 'catalog':

            $params = ['catalog' => getCatalog()
            ];
            _log($params, "params");
            break;
        case 'product':
            $params = [
                'product' => getProduct($id)
            ];

            break;
        case 'gallery':
            $params = [
                'images' => getImages()
            ];

            break;
        case 'img':
            $params = [
                'img' => getImg($id)
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
        //var_dump("Удалим отзыв с id={$id}");
        $sql = "DELETE FROM `feedback` WHERE `feedback`.`id` = {$id}";
        $result = executeQuery( $sql);
        header("Location: /feedback/?status=2");
        die();
    }
    if ($action == "add") {
        //var_dump("Добавим отзыв!");

        $db = getDb();
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['feedback'])));
        $sql = "INSERT INTO `feedback` (`name`, `feedback`) VALUES ('{$name}', '{$feedback}');";
        $result = executeQuery( $sql);

        header("Location: /feedback/?status=1");

        die();
    }

    if ($action == "edit") {
        //var_dump("Правим отзыв!");
        $result = getAssocResult( "SELECT * FROM `feedback` WHERE id = {$id}");
        $row = $result[0];
        header("Location: /feedback/?status=1?id={$id}");
    }

}

function getAllFeedback() {
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
    return getAssocResult($sql);
}

/*function getNews() {
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
}*/

function getCatalog(){
    $catalog = getAssocResult("SELECT * FROM catalog ORDER BY price DESC");
    return $catalog;
}

function getProduct($id) {

    $id = (int)$id;
    $sql = "SELECT * FROM catalog WHERE id = {$id}";
    $product = getAssocResult($sql);

    $result = [];
    if(isset($product[0]))
        $result = $product[0];
    return $result;
}

function getImages(){
    $images = getAssocResult("SELECT * FROM imgs ORDER BY counter DESC");
    return $images;
}


function getImg($id) {
    $id = (int)$id;

    $sql = "UPDATE `imgs` SET `counter`= `counter` + 1 WHERE id = {$id}";
    executeQuery($sql);

    $sql = "SELECT fileName, counter FROM imgs WHERE id = {$id}";
    $images = getAssocResult($sql);


    //В случае если картинки нет, вернем пустое значение
    $result = [];
    if(isset($images[0]))
        $result = $images[0];
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
