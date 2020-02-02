<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-02-01
 */

require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

require 'Useful.php';
$userful = new \app\Bundle\Controller\Useful();

session_start();

$login = $_POST['login'];
$submit = $_POST['submit'];
$password = md5($_POST['password']);
$loginQuery = "SELECT a.username, a.password FROM user_social a WHERE a.username = '$login' AND a.password = '$password'";
$emailQuery = "SELECT a.email, a.password FROM user_social a WHERE a.email = '$login' AND a.password = '$password'";

if (isset($submit)) {

    $loginCheck = $database->queryBuilder($loginQuery) or die();
    $emailCheck = $database->queryBuilder($emailQuery) or die();

    if (mysqli_num_rows($loginCheck) < 1 && mysqli_num_rows($emailCheck) < 1) {
        $msg = 'Login e/ou senha incorretos';
        $route = '../View/login.php';

        $userful->alert($msg, $route);
    } else {
        $_SESSION['social-login'] = $login;
        $_SESSION['social-password'] = $password;
        header("Location:../View/home.php");
    }
}