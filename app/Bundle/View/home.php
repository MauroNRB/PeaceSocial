<?php
include('base/isLogin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('base/header.php') ?>
    <title>Homepage - Peace Social</title>
</head>
<body>
<h1>Page</h1>
<form method="post" action="base/logOut.php">
    <input type="submit" name="logOut" value="Deslogar"/>
</form>
</body>
</html>