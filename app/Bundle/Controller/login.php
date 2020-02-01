<?php
require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

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
        echo "
            <script language='javascript' type='text/javascript'>
                alert('Login e/ou senha incorretos');
                window.location.href='../View/login.php';
            </script>";
    } else {
        $_SESSION['social-login'] = $login;
        $_SESSION['social-password'] = $password;
        header("Location:../View/home.php");
    }
}