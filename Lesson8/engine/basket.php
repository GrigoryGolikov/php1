<?php

function deleteFromBasket($id) {
    $id=(int)$id;
    $session_id = session_id();
    $sql = "DELETE FROM `basket` WHERE `basket`.`id` = {$id} AND `session_id`='$session_id'";
    return executeQuery($sql);
}

function getBasket() {
    $session_id = session_id();
    $sql = "SELECT basket.id as basket_id, goods.id as good_id, goods.name as name, goods.price as price, goods.image as image FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `session_id`='{$session_id}' AND NOT basket.framed";
    $basket = getAssocResult($sql);
    return $basket;
}

function summFromBasket() {
    $session_id = session_id();
    $sql = "SELECT SUM(goods.price) as summ FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `session_id` ='$session_id' AND NOT basket.framed";
    return getAssocResult($sql)[0]['summ'];
}

function addToBasket($id) {

    $id = (int)$id;
    $session_id = session_id();
    $sql = "INSERT INTO `basket` (`session_id`, `goods_id`) VALUES ('{$session_id}', '{$id}');";
    return executeQuery($sql);
}

function getBasketCount() {
    $session_id = session_id();
    $sql = "SELECT COUNT(id) as count FROM `basket` WHERE `session_id`='{$session_id}' AND NOT basket.framed";
    $result = getAssocResult($sql);
    $count = [];
    if (isset($result[0]))
        $count = $result[0];
    return $count['count'];
}

function addBasketToOrder() {
   // $id = (int)$id;
    $session_id = session_id();
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $adres = $_POST["adres"];

    $sql = "INSERT INTO `orders` (`session_id`, `name`, `phone`, `adres`, `status_id`) VALUES ('{$session_id}', '{$name}', '{$phone}', '{$adres}','1');";

    executeQuery($sql);
    $sql = "UPDATE `basket` SET `framed` = 1 WHERE  `session_id`='{$session_id}'";
    return executeQuery($sql);

}