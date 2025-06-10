<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_projeto = $_GET["id_projeto"];
    $nome_projeto = $_GET["nome_projeto"];
    $data_inicio = $_GET["data_inicio"];
    $data_termino = $_GET["data_termino"];
    $nome_diretor = $_GET["nome_diretor"];
    $nome_coordenador = $_GET["nome_coordenador"];
    $escopo = $_GET["escopo"];
    $nome_local = $_GET["nome_local"];

    $sql = "SELECT U.ID_USUARIO FROM USUARIOS U WHERE U.NOME = '$nome_diretor' AND U.HIERARQUIA = 'DIRETOR'";
    $query_diretor = $mysqli -> query($sql);

    if ($query_diretor -> num_rows > 0) {
        $row_diretor = $query_diretor -> fetch_assoc();
        $id_diretor = $row_diretor["ID_USUARIO"];

        $sql = "SELECT U.ID_USUARIO FROM USUARIOS U WHERE U.NOME = '$nome_coordenador' AND U.HIERARQUIA = 'COORDENADOR'";
        $query_coordenador = $mysqli -> query($sql);

        if ($query_coordenador -> num_rows > 0) {
            $row_coordenador = $query_coordenador -> fetch_assoc();
            $id_coordenador = $row_coordenador["ID_USUARIO"];

            if (!empty($nome_local)) {
                $sql = "SELECT * FROM LOCAIS L WHERE L.NOME = '$nome_local'";
                $query_local = $mysqli -> query($sql);

                if ($query_local -> num_rows > 0) {
                    $row_local = $query_local -> fetch_assoc();
                    $id_local = $row_local["ID_LOCAL"];

                    $sql = "UPDATE PROJETOS SET NOME = '$nome_projeto', ESCOPO = '$escopo', DATA_INICIO = '$data_inicio', DATA_TERMINO = '$data_termino', ID_LOCAL = '$id_local', ID_DIRETOR = '$id_diretor', ID_COORDENADOR = '$id_coordenador' WHERE ID_PROJETO = '$id_projeto'";
                    $mysqli -> query($sql);
                }
            }
            else {
                $sql = "UPDATE PROJETOS SET NOME = '$nome_projeto', ESCOPO = '$escopo', DATA_INICIO = '$data_inicio', DATA_TERMINO = '$data_termino', ID_DIRETOR = '$id_diretor', ID_COORDENADOR = '$id_coordenador' WHERE ID_PROJETO = '$id_projeto'";
                $mysqli -> query($sql);
            }
        }
    }

    header("Location: ../pages/projetos/projetos.php?id_usuario=$id_usuario");
?>