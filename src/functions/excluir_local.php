<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_local = $_GET["id_local"];

    $sql = "DELETE FROM LOCAIS WHERE ID_LOCAL = '$id_local'";
    $mysqli -> query($sql);

    header("Location: ../pages/locais/locais.php?id_usuario=$id_usuario");
?>