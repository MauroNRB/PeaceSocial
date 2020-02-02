<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-02-01
 */

require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

require 'Validate.php';
$validate = new \app\Bundle\Controller\Validate();

require 'Useful.php';
$userful = new \app\Bundle\Controller\Useful();


$login = isset($_POST['login']) ? $_POST['login'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = !empty($_POST['password']) ? md5($_POST['password']) : null;

$queryLogin = "SELECT a.username as username, a.email as email FROM user_social a WHERE username = '$login' OR email = '$email'";
$arr = $database->arrSelect($queryLogin);

$msgValidadade = $validate->validadeRegister($login, $email, $password, $arr);

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