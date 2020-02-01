<?php

require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

require 'Validate.php';
$validate = new \app\Bundle\Controller\Validate();

require 'Useful.php';
$userful = new \app\Bundle\Controller\Useful();


$login = $_POST['login'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$queryUsername = "SELECT a.username FROM user_social a WHERE a. username = '$login'";
$arrLogin = $database->arrSelect($queryUsername);

$queryEmail = "SELECT a.email FROM user_social a WHERE a.email = '$email'";
$arrEmail = $database->arrSelect($queryUsername);

$msgValidadade = $validate->validadeRegister($login, $email, $password, $arrLogin, $arrEmail);

if(!empty($msgValidadade)) {
    $msg = $msgValidadade;
    $route = '../View/register.php';

    $userful->alert($msg, $route);
    die();
} else {
    $query = "INSERT INTO user_social (username, email, password, ban, adm) VALUES ('$login', '$email','$password', 0, 0)";
    $insert = $database->queryBuilder($query);

    if($insert) {
        $msg = 'Usuário cadastrado com sucesso!';
        $route = '../View/login.php';

        $userful->alert($msg, $route);
    } else {
        $msg = 'Não foi possível cadastrar esse usuário';
        $route = '../View/register.php';

        $userful->alert($msg, $route);
    }
}