<?php
function doBasketAction($action) {
    if (isset($_GET['id'])){
        deleteGood($_GET['id']);
    }
}

function deleteGood($id) {
   // if (isset($_COOKIE["hash"])){
        $hash = $_COOKIE["hash"];
        $sql = "DELETE FROM `basket` WHERE id={$id} AND id_session = '{$hash}' ";
    //} else{
    //    $sql = "DELETE FROM `basket` WHERE id={$id} ";
    //}

    $result = executeQuery($sql);
    if (mysqli_affected_rows(getDb()) != 1) return false;
    return $result;
}

function addGood($id) {
    $hash = $_COOKIE["hash"];
    $sql = "INSERT INTO `basket`(`id_good`, `id_session`) VALUES ('{$id}','{$hash}')";
    $result = executeQuery($sql);
    if (mysqli_affected_rows(getDb()) != 1) return false;
    return $result;
}

function getAllBasket() {
    $hash = $_COOKIE["hash"];
    $sql = "SELECT basket.id, goods.name, goods.image, goods.description, goods.price FROM 	 basket LEFT JOIN goods ON(basket.id_good = goods.id and basket.id_session = '{$hash}' )";
    $result = getAssocResult($sql);
    return $result;
}

function getCountBasket()
{
    $hash = $_COOKIE["hash"];
    $sql = "SELECT COUNT(1) as coun FROM `basket` WHERE id_session = '{$hash}' ";
    $result = getAssocResult($sql)[0];
    return $result['coun'];
}