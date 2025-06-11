<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_usuario_sistema = $_GET["id_usuario_sistema"];
    $nome_usuario_sistema = $_GET["nome_usuario"];
    $email_usuario_sistema = $_GET["email_usuario"];
    $senha_usuario_sistema = $_GET["senha_usuario"];
    $hierarquia_usuario_sistema = $_GET["hierarquia_usuario"];

    $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_usuario_sistema'";
    $query_usuario_sistema = $mysqli -> query($sql);

    if ($query_usuario_sistema -> num_rows > 0) {
        $sql = "UPDATE USUARIOS SET NOME = '$nome_usuario_sistema', EMAIL = '$email_usuario_sistema', SENHA = '$senha_usuario_sistema', HIERARQUIA = '$hierarquia_usuario_sistema' WHERE ID_USUARIO = '$id_usuario_sistema'";
        $mysqli -> query($sql);
    }
    
    header("Location: ../pages/usuarios/usuarios.php?id_usuario=$id_usuario");
?>