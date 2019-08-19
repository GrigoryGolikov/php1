<?php

function renderTemplate($page, $header = '', $menu = '', $content = '', $footer = '')
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

echo renderTemplate('layout', renderTemplate('header'),renderTemplate('menu'),renderTemplate('content'),renderTemplate('footer'));