<?php

function auth($login, $pass)
{
    $db = getdb();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));

    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);

    if (password_verify($pass, $row['pass'])) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];

        $hash = uniqid(rand(), true);
        $id = mysqli_real_escape_string($db, strip_tags(stripslashes($_SESSION['id'])));
        $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
        $result = mysqli_query($db, $sql);
        setcookie("hash", $hash, time() + 3600);
        return true;
    }
    return false;

}

function is_auth()
{
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];

        $db = getdb();
        $sql = "SELECT * FROM `users` WHERE `hash`='{$hash}'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']) ? true : false;
}

function get_user()
{
    return is_auth() ? $_SESSION['login'] : false;
}
