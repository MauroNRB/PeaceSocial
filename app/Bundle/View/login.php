<?php include('base/isLogin.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('base/header.php') ?>
    <title>Login - Peace Social</title>
</head>

<body class="login-register">
<div class="loginbox">
    <img src="img/avatar.png" class="avatar">
    <h1>Login</h1>
    <form method="POST" action="../Controller/loginController.php">
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