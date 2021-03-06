<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-02-04
 */

require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

require 'Validate.php';
$validate = new \app\Bundle\Controller\Validate();

require 'Useful.php';
$userful = new \app\Bundle\Controller\Useful();


$text = isset($_POST['text-publication']) ? $_POST['text-publication'] : null;
$title = isset($_POST['title-message']) ? $_POST['title-message'] : null;

session_start();
$loginSession = isset($_SESSION['social-login']) ? $_SESSION['social-login'] : null;

$queryLogin = "SELECT a.id as id, a.ban as ban, a.username as username, a.email as email FROM user_social a WHERE username = '$loginSession' OR email = '$loginSession'";
$arr = $database->arrSelect($queryLogin);

$msgValidadade = $validate->validadePublication($arr);

if(!empty($msgValidadade)) {
    $msg = $msgValidadade;
    $route = '/app/Bundle/View/home.php';

    $userful->alert($msg, $route);
    die();
} else if(empty($text)) {
    $msg = 'Ops! É preciso preencher o campo de texto para publicar sua mensagem';
    $route = '/app/Bundle/View/home.php';

    $userful->alert($msg, $route);
    die();
} else {
    $id = $arr['id'];

    $query = "INSERT INTO message_social (id_user, message, title) VALUES ('$id', '$text', '$title')";
    $insert = $database->queryBuilder($query);

    $route = '/app/Bundle/View/home.php';

    if($insert) {
        $msg = 'Foi públicado sua messagem';

        $userful->alert($msg, $route);
    } else {
        $msg = 'Não foi possível enviar sua publicação';

        $userful->alert($msg, $route);
    }
}