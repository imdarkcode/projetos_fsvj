<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $nome_usuario = $_GET["nome_usuario"];
    $email = $_GET["email_usuario"];
    $senha = $_GET["senha_usuario"];
    $hierarquia = $_GET["hierarquia_usuario"];

    $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_usuario'";
    $query_usuario_sistema = $mysqli -> query($sql);

    if ($query_usuario_sistema -> num_rows > 0) {
        $sql = "UPDATE USUARIOS SET NOME = '$nome_usuario', EMAIL = '$email', SENHA = '$senha', HIERARQUIA = '$hierarquia' WHERE ID_USUARIO = '$id_usuario'";
        $mysqli -> query($sql);
    }
    
    header("Location: ../pages/perfil/perfil.php?id_usuario=$id_usuario");
?>