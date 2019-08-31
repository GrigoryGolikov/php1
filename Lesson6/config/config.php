<?php
define("TEMPLATES_DIR", "../view/");
define("LAYOUTS_DIR", 'layout/');
define("IMG_BIG_DIR", "/gallery_img/big/");
define("IMG_SML_DIR", "/gallery_img/small/");

/* DB config */
define('HOST', 'localhost');
define('USER', 'user');
define('PASS', '12345');
define('DB', 'shop');

require_once "../engine/db.php";
require_once "../engine/functions.php";
require_once "../engine/log.php";