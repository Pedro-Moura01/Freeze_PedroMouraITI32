<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <?php include "referencias.php" ?>
</head>
<body>
        <!-- Inclusão do topo da página -->
        <?php include "header_admin.php" ?>

        <?php

        //1° PASSO - INCLUSÃO AO BD
        include "conexao_bd.php";

        $login_usuario = $_POST["txtLoginUsuario"];
        $senha_usuario = $_POST["txtSenhaUsuario"];
        
        //2° PASSO - CAPTURAR OS DADOS 
        $hash = password_hash($senha_usuario, 1);
        
        //3° PASSO - COMANDO SQL
        $sql = "INSERT INTO usuario(login_usuario,senha_usuario)";
        $sql .= " VALUES('$login_usuario','$hash') ";

        //4° PASSO - EXECUTAR NO BDA
        if (executarComando ($sql))
        {
            echo "<h1>Usuário adicionado!</h1>";
        }
        else
        {
            echo "<h1>Usuárionão cadastrado!</h1>";
        }
?>