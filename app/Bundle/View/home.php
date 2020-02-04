<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-01-31
 */

require 'base/Login.php';
$login = new \app\Bundle\View\base\Login();
$login->isLogged();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require 'base/Header.php';
        $login = new \app\Bundle\View\base\Header();
        $login->constructorHeadHTML();
    ?>
    <title>Homepage - Peace Social</title>
</head>
<body>
<h1>Page</h1>
<form method="post" action="base/logout.php">
    <input type="submit" name="logOut" value="Deslogar"/>
</form>
</body>
</html>
