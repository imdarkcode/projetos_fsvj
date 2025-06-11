<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_usuario_sistema = $_GET["id_usuario_sistema"];

    $sql = "DELETE FROM USUARIOS WHERE ID_USUARIO = '$id_usuario_sistema'";
    $mysqli -> query($sql);

    header("Location: ../pages/usuarios/usuarios.php?id_usuario=$id_usuario");
?>