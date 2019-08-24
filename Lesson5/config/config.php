<?php
define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT']);
define("TEMPLATES_DIR", ROOT_DIR . "/../view/");
define("IMG_BIG_DIR", "/gallery_img/big/");
define("IMG_SML_DIR", "/gallery_img/small/");

/* DB config */
define('HOST', 'localhost');
define('USER', 'user');
define('PASS', '12345');
define('DB', 'shop');

require_once ROOT_DIR . "/../engine/db.php";
require_once ROOT_DIR . "/../engine/functions.php";
require_once ROOT_DIR . "/../engine/log.php";