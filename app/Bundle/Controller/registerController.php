<?php
require '../Model/Database/Database.php';
$database = new \app\Bundle\Model\Database\Database();

$login = $_POST['login'];
$password = md5($_POST['password']);

$query = "SELECT login FROM usuarios WHERE login = '$login'";
$arr = $database->arrSelect($query);
$arrLogin = $arr['login'];

if($login == "" || $login == null) {
    echo"
        <script language='javascript' type='text/javascript'>
            alert('O campo login deve ser preenchido');
            window.location.href='../View/cadastro.php';
        </script>"
    ;
} else {
    if($arrLogin == $login) {

        echo"
            <script language='javascript' type='text/javascript'>
                alert('Esse login já existe');
                window.location.href='../View/cadastro.php';
            </script>"
        ;
        die();
    } else {
        $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$password')";
        $insert = $database->queryBuilderInsert($query);

        if($insert) {
            echo"
                <script language='javascript' type='text/javascript'>
                    alert('Usuário cadastrado com sucesso!');
                    window.location.href='../View/login.php'
                </script>"
            ;
        } else {
            echo"
                <script language='javascript' type='text/javascript'>
                    alert('Não foi possível cadastrar esse usuário');
                    window.location.href='../View/login.php'
                </script>"
            ;
        }
    }
}