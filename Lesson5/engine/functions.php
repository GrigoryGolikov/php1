<?php

function prepareVariables($page) {
    $params = [];
   // updateImages();
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
        case 'gallery':
            $params = [
                'images' => getImages()
            ];

            break;
        case 'img':
            $params = [
                'img' => getImg($_GET['id'])
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
    }
    return $params;

}

function render($page, $params = [])
{
    return renderTempate("layout", ['content' => renderTempate($page, $params)]);
}

function renderTempate($page, $params = [])
{
    ob_start();

    extract($params);

    $filename = TEMPLATES_DIR . $page . ".php";

    if (file_exists($filename)) {
        include $filename;
    } else {
        echo "Страница не существует 404";
    }

    return ob_get_clean();
}

// Функция рьновления базы данных.
// Очищает а потом заполняет из папки с картинками
function updateImages() {

    $sql = "DELETE FROM `imgs` WHERE 1";
    executeQuery($sql);
    $arrImg = array_slice(scandir(ROOT_DIR . IMG_SML_DIR),2);
    foreach ($arrImg as $item){
        $sql = "INSERT INTO `imgs`( `fileName`) VALUES ('{$item}')";
        executeQuery($sql);
    }

}

function getImages(){
    $images = getAssocResult("SELECT * FROM imgs ORDER BY counter DESC");
    return $images;
    //return array_slice(scandir($page),2);

}

function getImg($id) {
    $id = (int)$id;

    $sql = "UPDATE `imgs` SET `counter`= `counter` + 1 WHERE id = {$id}";
    getAssocResult($sql);

    $sql = "SELECT fileName, counter FROM imgs WHERE id = {$id}";
    $news = getAssocResult($sql);


    //В случае если картинки нет, вернем пустое значение
    $result = [];
    if(isset($news[0]))
        $result = $news[0];
    return $result;
}

