<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_projeto = $_GET["id_projeto"];

    $sql = "DELETE FROM PROJETOS WHERE ID_PROJETO = '$id_projeto'";
    $mysqli -> query($sql);

    header("Location: ../pages/projetos/projetos.php?id_usuario=$id_usuario");
?>