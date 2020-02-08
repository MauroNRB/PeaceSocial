<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-02-07
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
        <title>Atualizar Senha - Peace Social</title>
    </head>

    <body class="login-register">
        <div class="loginbox">
            <img src="img/avatar.png" class="avatar">
            <h2>Alterar Senha</h2>
            <form method="POST" action="../Controller/updatePassword.php">
                <p>E-mail</p>
                <input type="email" name="email" id="email" placeholder="E-mail">
                <input type="submit" value="Alterar" id="submit" name="submit">
            </form>
            <a href="login.php">Logar</a>
        </div>
    </body>

</html>