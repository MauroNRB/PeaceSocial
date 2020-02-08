<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-02-07
 */

require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

require 'Validate.php';
$validate = new \app\Bundle\Controller\Validate();

include 'Useful.php';
$userful = new \app\Bundle\Controller\Useful();

require 'SendEmail/SendGmail.php';
$send = new \app\Bundle\Controller\SendEmail\SendGmail();

$email = isset($_POST['email']) ? $_POST['email'] : null;

$password = $userful->passwordGenerator(8, true, true, true, false);

$passwordEncrypted = md5($password);

$msgValidadade = $validate->validadeEmailUpdatePassword($email);

if(!empty($msgValidadade)) {
    $msg = $msgValidadade;
    $route = '../View/updatePassword.php';

    $userful->alert($msg, $route);
    die();
} else {
    $queryEmail = "SELECT a.username as username, a.email as email FROM user_social a WHERE email = '$email'";
    $arr = $database->arrSelect($queryEmail);

    $query = "
            UPDATE user_social a SET a.password = '$passwordEncrypted'
            WHERE a.email = '$email'
     ";

    $update = $database->queryBuilder($query);

    $title = 'Senha Alterada no Peace Social';
    $msg = 'Senha nova: ' . $password;
    $routerOrigin = '../View/updatePassword.php';
    $routerAfter = '../View/login.php';

    $sendoEmail = $send->send($arr['email'], $arr['username'], $title, $msg, $routerOrigin, $routerAfter);
}