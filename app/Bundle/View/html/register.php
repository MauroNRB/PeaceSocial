<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include('../base/cabecalho.php')?>
        <title>Cadastro - Peace Social</title>
    </head>

    <body>
        <div class="loginbox">
            <img src="../img/avatar.png" class="avatar">
            <h1>Cadastro</h1>
            <!--            <form method="POST" action="cadastro.php">-->
            <form>
                <p>Login</p>
                <input type="text" name="login" id="login" placeholder="Login">
                <p>Senha: </p>
                <input type="password" name="senha" id="senha" placeholder="Senha">
                <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
            </form>
        </div>
    </body>

</html>