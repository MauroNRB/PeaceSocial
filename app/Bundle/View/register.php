<?php include('base/isLogin.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('base/header.php') ?>
    <title>Cadastro - Peace Social</title>
</head>

<body class="login-register">
<div class="loginbox">
    <img src="img/avatar.png" class="avatar">
    <h1>Cadastro</h1>
    <form method="POST" action="../Controller/registerController.php">
        <p>Login</p>
        <input type="text" name="login" id="login" placeholder="Login">
        <p>E-mail</p>
        <input type="email" name="email" id="email" placeholder="E-mail">
        <p>Senha: </p>
        <input type="password" name="password" id="password" placeholder="Senha">
        <input type="submit" value="Cadastrar" id="submit" name="submit">
    </form>
</div>
</body>

</html>