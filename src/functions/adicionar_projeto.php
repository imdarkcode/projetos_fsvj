<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
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

                    $sql = "INSERT INTO PROJETOS (NOME, ESCOPO, DATA_INICIO, DATA_TERMINO, ID_LOCAL, ID_DIRETOR, ID_COORDENADOR) VALUES ('$nome_projeto', '$escopo', '$data_inicio', '$data_termino', '$id_local', '$id_diretor', '$id_coordenador')";
                    $mysqli -> query($sql);
                }
            }
            else {
                $sql = "INSERT INTO PROJETOS (NOME, ESCOPO, DATA_INICIO, DATA_TERMINO, ID_DIRETOR, ID_COORDENADOR) VALUES ('$nome_projeto', '$escopo', '$data_inicio', '$data_termino', '$id_diretor', '$id_coordenador')";
                $mysqli -> query($sql);
            }
        }
    }

    header("Location: ../pages/projetos/projetos.php?id_usuario=$id_usuario");
?>