<?php

function getOrders() {
    $session_id = session_id();
    $sql = "SELECT orders.id, name, phone, adres, session_id, orderStatuses.status as status FROM `orders` left join orderStatuses on (orderStatuses.id = orders.status_id) WHERE 1";
    $orders = getAssocResult($sql);
    return $orders;
}

function getOrder($id) {
    $session_id = session_id();
    $sql = "SELECT orders.id, name, phone, adres, session_id, orderStatuses.status as status FROM `orders` left join orderStatuses on (orderStatuses.id = orders.status_id) WHERE orders.id = '{$id}'";
    $result = getAssocResult($sql);
    $order = [];
    if (isset($result[0]))
        $order = $result[0];
    return $order;

}

function getDetails($id) {
    $session_id = session_id();
    $sql = "SELECT basket.id as basket_id, goods.id as good_id, goods.name as name, goods.price as price, goods.image as image FROM `basket`, orders, `goods` WHERE basket.goods_id=goods.id AND orders.session_id = basket.session_id and orders.id = '{$id}'";
    $basket = getAssocResult($sql);
    return $basket;
}

function updateStatusOrder($id, $status){

    $sql = "UPDATE `orders` SET `status_id`='{$status}' WHERE id = '{$id}'";
    return executeQuery($sql);

}

function getStatus($status_id){
    $sql = "SELECT  `status` FROM `orderStatuses` WHERE id = '{$status_id}'";
    $result = getAssocResult($sql);
    $status = "";
    if (isset($result[0]))
        $status = $result[0];
    return $status['status'];
}