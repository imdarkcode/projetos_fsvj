<?php
    include("../../../conexao.php");
    $id_usuario = $_GET["id_usuario"];
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projetos FSVJ - Locais</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="shortcut icon" href="../../assets/images/favicon.svg">
        <link rel="stylesheet" href="../../styles/components/navbar.css" />
        <link rel="stylesheet" href="locais.css" />
    </head>

    <body>
        
        <?php include("../../components/navbar.php"); ?>
        <?php include("../../components/editar_local.php"); ?>
        <?php include("../../components/excluir_local.php"); ?>
        <?php include("../../components/adicionar_local.php"); ?>

        <main class="main-container">
            <section class="main-header">
                <div class="titulo-container">
                    <h1 class="titulo-grande">Locais</h1>
                </div>

                <button class="botao-grande fundo-preto" onclick="AbrirAdicionarLocal()"><i class="bi bi-plus-lg"></i> Adicionar Local</button>
            </section>

            <div class="barra-pesquisa">
                <input class="input fundo-branco" type="text" placeholder="Nome do Local">
                <button class="botao-pequeno fundo-preto"><i class="bi bi-search"></i></button>
            </div>

            <?php
                $sql = "SELECT * FROM LOCAIS L INNER JOIN ENDERECOS E ON L.ID_ENDERECO = E.ID_ENDERECO";
                $query_local_endereco = $mysqli -> query($sql);
            
                while ($row_local_endereco = $query_local_endereco -> fetch_assoc()) {
                    $id_local = $row_local_endereco["ID_LOCAL"];
                    $nome_local = $row_local_endereco["NOME"];
                    $endereco = $row_local_endereco["RUA"] .', '. $row_local_endereco["NUMERO"] .' - '. $row_local_endereco["BAIRRO"] .', '. $row_local_endereco["CIDADE"];

                    echo '
                    <section class="usuario-container">
                        <div>
                            <h2 class="label">'.$nome_local.'</h2>
                            <p class="sub-titulo">'.$endereco.'</p>
                        </div>

                        <div class="botoes-container">
                            <button class="botao-pequeno fundo-preto" onclick="AbrirEditarLocal'.$id_local.'()"><i class="bi bi-sliders"></i></button>
                            <button class="botao-pequeno fundo-vermelho" onclick="AbrirExcluirLocal'.$id_local.'()"><i class="bi bi-trash3-fill"></i></button>
                        </div>                
                    </section>

                    <div class="divisor fundo-cinza"></div>
                    ';
                }
            ?>
        </main>
    </body>
</html>