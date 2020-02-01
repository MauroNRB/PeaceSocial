<?php
require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

$login = $_POST['login'];
$submit = $_POST['submit'];
$password = md5($_POST['password']);
$loginQuery = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$password'";
$emailQuery = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$password'";

if (isset($submit)) {
    $loginCheck = $database->queryBuilder($loginQuery) or die("Erro ao selecionar");

    $emailCheck = $database->queryBuilder($emailQuery) or die("Erro ao selecionar");

    if ((mysql_num_rows($loginCheck) <= 0) || (mysql_num_rows($emailCheck) <= 0)) {
        echo "
            <script language='javascript' type='text/javascript'>
                alert('Login e/ou senha incorretos');
                window.location.href='../../View/html/login.php';
            </script>";
        die();
    } else {
        setcookie("login", $login);
        header("Location:./index.php");
    }
}