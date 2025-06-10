<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_projeto = $_GET["id_projeto"];
    $nome_participante = $_GET["nome_participante"];

    $sql = "SELECT U.ID_USUARIO FROM USUARIOS U WHERE U.NOME = '$nome_participante' AND U.HIERARQUIA != 'DIRETOR' AND U.ID_USUARIO != '$id_usuario'";
    $query_participante = $mysqli -> query($sql);

    if ($query_participante -> num_rows > 0) {
        $row_participante = $query_participante -> fetch_assoc();
        $id_participante = $row_participante["ID_USUARIO"];

        $sql = "SELECT * FROM USUARIOS_PROJETOS UP WHERE UP.ID_USUARIO = '$id_participante' AND UP.ID_PROJETO = '$id_projeto'";
        $query_usuario_projeto = $mysqli -> query($sql);

        if ($query_usuario_projeto -> num_rows <= 0) {
            $sql = "INSERT INTO USUARIOS_PROJETOS (ID_USUARIO, ID_PROJETO) VALUES ('$id_participante', '$id_projeto')";
            $mysqli -> query($sql);
        }
    }

    header("Location: ../pages/projetos/projetos.php?id_usuario=$id_usuario");
?>