<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-01-31
 */

include('base/isLoggedLoginRegister.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require 'base/Header.php';
        $login = new \app\Bundle\View\base\Header();
        $login->constructorHeadHTML();
    ?>
    <title>Login - Peace Social</title>
</head>

<body class="login-register">
<div class="loginbox">
    <img src="img/avatar.png" class="avatar">
    <h1>Login</h1>
    <form method="POST" action="../Controller/login.php">
        <p>Login</p>
        <input type="text" name="login" id="login" placeholder="Login/E-mail">
        <p>Senha: </p>
        <input type="password" name="password" id="password" placeholder="Senha">
        <input class="btn btn-primary" type="submit" value="Entrar" name="submit">
        <br>
    </form>
    <a href="register.php">Cadastra-se</a>
</div>
</body>

</html>