<?php

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
        echo "Страницы не существует 404";
    }


    return ob_get_clean();
}
