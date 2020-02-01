<?php
require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

$login = $_POST['login'];
$submit = $_POST['submit'];
$password = md5($_POST['password']);
$query = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$password'";

if (isset($submit)) {
    $checks = $database->queryBuilder($query) or die("Erro ao selecionar");
    if (mysql_num_rows($checks) <= 0) {
        echo"
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