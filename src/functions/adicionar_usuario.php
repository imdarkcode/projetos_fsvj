<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $nome_usuario_sistema = $_GET["nome_usuario"];
    $email_usuario_sistema = $_GET["email_usuario"];
    $senha_usuario_sistema = $_GET["senha_usuario"];
    $hierarquia_usuario_sistema = $_GET["hierarquia_usuario"];

    $sql = "INSERT INTO USUARIOS (NOME, EMAIL, SENHA, HIERARQUIA) VALUES ('$nome_usuario_sistema', '$email_usuario_sistema', '$senha_usuario_sistema', '$hierarquia_usuario_sistema')";
    $mysqli -> query($sql);
    
    header("Location: ../pages/usuarios/usuarios.php?id_usuario=$id_usuario");
?>