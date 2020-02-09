<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-02-09
 */

require 'base/InsertHTML.php';

require 'base/Login.php';
$login = new \app\Bundle\View\base\Login();
$login->isLogged();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            $head = new \app\Bundle\View\base\InsertHTML();
            $head->constructorHeadHTML();
        ?>
        <title>Minha Conta - Peace Social</title>
    </head>
    <body id="page-homepage">
    <?php
        $menu = new \app\Bundle\View\base\InsertHTML();
        $menu->constructorMenuHTML();
    ?>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-12 col-xs-12 col-md-12 first-colum">
                    <br>
                    <form method="post" action="../Controller/account.php">
                        <div class="form-group">
                            <label for="password-account">Senha</label>
                            <input type="password" class="form-control" name="password-account" placeholder="Nova Senha">
                        </div>
                        <input class="btn btn-primary float-right" type="submit" name="submit-password" value="Alterar"/>
                    </form>
                </div>
                <div class="col-lg-3 d-none d-sm-none d-md-none d-lg-block secund-colum">
                    <br>

                </div>
                <br>
            </div>
        </div>
    </div>
    <?php
        $footer = new \app\Bundle\View\base\InsertHTML();
        $footer->constructorFooterHTML();
    ?>
    </body>
</html>