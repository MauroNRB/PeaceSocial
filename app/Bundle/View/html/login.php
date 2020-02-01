<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include('../base/cabecalho.php')?>
        <title>Login - Peace Social</title>
    </head>

    <body>
        <div class="loginbox">
            <img src="../img/avatar.png" class="avatar">
            <h1>Login</h1>
            <!--            <form method="POST" action="login.php">-->
            <form>
                <p>Login</p>
                <input type="text" name="login" id="login" placeholder="Login">
                <p>Senha: </p>
                <input type="password" name="senha" id="senha" placeholder="Senha">
                <input type="submit" value="Entrar" id="entrar" name="entrar">
                <br>
            </form>
            <a href="register.php">Cadastra-se</a>
        </div>
    </body>

</html>