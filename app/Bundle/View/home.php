<?php
include('base/isLogin.php');
include('base/logOut.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('base/header.php') ?>
</head>
<body>
<h1>Page</h1>
<form method="post">
    <input type="submit" name="logOut" value="Deslogar"/>
</form>
</body>
</html>
