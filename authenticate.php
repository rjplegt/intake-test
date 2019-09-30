<?php
require_once('services/Database.php');

$db = new Database;

session_start();
session_unset();

//TODO: Handle failure gracefully

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];

//TODO: Gebruik SHA256 instead of md5 for securing the password
    $password = md5($_POST['password']);


    $users = $db->getAllRows(sprintf('SELECT *
                                FROM user
                                WHERE login = \'%s\'
                                AND password = \'%s\';', $login, $password));

    if (count($users) > 0) {
        $_SESSION['logged_in'] = true;
        header("Location: index.php?page=overview");
        die;
    }
}
header("Location: login.php?login_failed=1");