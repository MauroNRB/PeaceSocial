<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-01-31
 */

require 'base/InsertHTML.php';

include('base/isLoggedLoginRegister.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
            $login = new \app\Bundle\View\base\InsertHTML();
            $login->constructorHeadHTML();
        ?>
        <title>Cadastro - Peace Social</title>
    </head>

    <body class="login-register">
        <div class="loginbox">
            <img src="img/avatar.png" class="avatar">
            <h2>Cadastro</h2>
            <form method="POST" action="../Controller/register.php">
                <p>Login</p>
                <input type="text" name="login" id="login" placeholder="Login">
                <p>E-mail</p>
                <input type="email" name="email" id="email" placeholder="E-mail">
                <p>Senha: </p>
                <input type="password" name="password" id="password" placeholder="Senha">
                <input type="submit" value="Cadastrar" id="submit" name="submit">
            </form>
            <a href="login.php">Logar</a>
        </div>
    </body>

</html>