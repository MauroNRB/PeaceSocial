<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-02-09
 */

require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

require 'Validate.php';
$validate = new \app\Bundle\Controller\Validate();

include 'Useful.php';
$userful = new \app\Bundle\Controller\Useful();

require 'SendEmail/SendGmail.php';
$send = new \app\Bundle\Controller\SendEmail\SendGmail();

session_start();

$login = isset($_SESSION['social-login']) ? $_SESSION['social-login'] : null;

$password = isset($_POST['password-account']) ? $_POST['password-account'] : null;

$passwordEncrypted = md5($password);

$msgValidadade = $validate->validadeUpdateAccount($password);

if(!empty($msgValidadade)) {
    $msg = $msgValidadade;
    $route = '../View/account.php';

    $userful->alert($msg, $route);
    die();
} else {
    $queryLogin = "SELECT a.id as id, a.username as username, a.email as email FROM user_social a WHERE username = '$login' OR email = '$login'";

    $arr = $database->arrSelect($queryLogin);

    $id = $arr['id'];

    $query = "
            UPDATE user_social a SET a.password = '$passwordEncrypted'
            WHERE a.id = '$id'
     ";

    $update = $database->queryBuilder($query);

    $title = 'Senha Alterada no Peace Social';
    $msg = 'Senha nova: ' . $password;
    $routerOrigin = '../View/updatePassword.php';
    $routerAfter = '../View/login.php';

    $sendoEmail = $send->send($arr['email'], $arr['username'], $title, $msg, $routerOrigin, $routerAfter);
}