<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $nome_local = $_GET["nome_local"];
    $rua = $_GET["rua"];
    $bairro = $_GET["bairro"];
    $numero = $_GET["numero"];
    $cidade = $_GET["cidade"];
    $cep = $_GET["cep"];

    $sql = "SELECT * FROM ENDERECOS E WHERE E.RUA = '$rua' AND E.BAIRRO = '$bairro' AND E.NUMERO = '$numero' AND E.CIDADE = '$cidade' AND E.CEP = '$cep'";
    $query_endereco = $mysqli -> query($sql);

    if ($query_endereco -> num_rows <= 0) {
        $sql = "INSERT INTO ENDERECOS (RUA, BAIRRO, NUMERO, CIDADE, CEP) VALUE ('$rua', '$bairro', '$numero', '$cidade', '$cep')";
        $mysqli -> query($sql);

        $sql = "SELECT * FROM ENDERECOS E WHERE E.RUA = '$rua' AND E.BAIRRO = '$bairro' AND E.NUMERO = '$numero' AND E.CIDADE = '$cidade' AND E.CEP = '$cep'";
        $query_endereco = $mysqli -> query($sql);

        $row_endereco = $query_endereco -> fetch_assoc();
        $id_endereco = $row_endereco["ID_ENDERECO"];

        $sql = "INSERT INTO LOCAIS (NOME, ID_ENDERECO) VALUES ('$nome_local', '$id_endereco')";
        $mysqli -> query($sql);
    }
    else {
        $row_endereco = $query_endereco -> fetch_assoc();
        $id_endereco = $row_endereco["ID_ENDERECO"];

        $sql = "INSERT INTO LOCAIS (NOME, ID_ENDERECO) VALUES ('$nome_local', '$id_endereco')";
        $mysqli -> query($sql);
    }
    
    header("Location: ../pages/locais/locais.php?id_usuario=$id_usuario");
?>