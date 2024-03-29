<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
updateImages();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'main';
}

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
            'images' => getImages(ROOT_DIR . IMG_SML_DIR)
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

echo render($page, $params);

