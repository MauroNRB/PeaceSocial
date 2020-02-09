<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-01-31
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
        <title>Homepage - Peace Social</title>
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
                        <form method="post" action="../Controller/publication.php">
                            <div class="form-group">
                                <label for="title-message">Título</label>
                                <input type="text" class="form-control" name="title-message" placeholder="Título da Publicação">
                                <label for="text-publication">Message</label>
                                <textarea class="form-control" name="text-publication" rows="3"></textarea>
                            </div>
                            <input class="btn btn-primary float-right" type="submit" name="submit-publication" value="Publicar"/>
                        </form>
                    </div>
                    <div class="col-lg-3 d-none d-sm-none d-md-none d-lg-block secund-colum">
                        <br>

                    </div>
                    <br>
                    <div class="col-lg-9 col-sm-12 col-xs-12 col-md-12">
                        <div class="container">
                            <div class="row">
                                <?php
                                    $search = new \app\Bundle\View\base\InsertHTML();
                                    $search->queryMessageSearch();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $footer = new \app\Bundle\View\base\InsertHTML();
            $footer->constructorFooterHTML();
        ?>
    </body>
</html>