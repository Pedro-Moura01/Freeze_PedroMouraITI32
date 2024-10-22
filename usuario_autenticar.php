<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "referencias.php" ?>
</head>
<body>

        <?php "header.php" ?>

    <?php

    include "conexao_bd.php";

    $login = $_POST["txtLoginUsuario"];
    $senha = $_POST["txtSenhaUsuario"];

    $sql = "SELECT * FROM usuario WHERE login_usuario = '$login'";

$dados = retonarDados($sql);
if ($dados == 0)
{
    echo "<h1>O usuário informado não existe</h1>"
    echo "<a href = 'login.php'>Voltar</a>"
}
else
{
    $linha = mysqli_fetch_assoc($dados);
    $hash = $linha ["senha_usuario"];
    $retorno = password_verify($senha,$hash);

    if ($retorno)
{
    session_start();
    $_SESSION["$login"] = $login;
    header("location:index_admin.php");
}
else
{
    echo <h1>O usuário informado não existe</h1>
    echo "<a href = 'login.php'>Voltar</a>"
}
}
    ?>
    <?php include "footer.php"  ?>

</body>
</html>