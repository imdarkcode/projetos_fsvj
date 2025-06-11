<?php
    include("../../../conexao.php");
    $id_usuario = $_GET["id_usuario"];
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projetos FSVJ - Usuários</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="shortcut icon" href="../../assets/images/favicon.svg">
        <link rel="stylesheet" href="../../styles/components/navbar.css" />
        <link rel="stylesheet" href="usuarios.css" />
    </head>

    <body>
        <?php include("../../components/navbar.php"); ?>
        <?php include("../../components/editar_usuario.php"); ?>
        <?php include("../../components/adicionar_usuario.php"); ?>
        <?php include("../../components/excluir_usuario.php"); ?>

        <main class="main-container">
            <section class="main-header">
                <div class="titulo-container">
                    <h1 class="titulo-grande">Usuários</h1>
                </div>

                <button class="botao-grande fundo-preto" onclick="AbrirAdicionarUsuario()"><i class="bi bi-plus-lg"></i> Adicionar Usuário</button>
            </section>

            <div class="barra-pesquisa">
                <input class="input fundo-branco" type="text" placeholder="Nome do Usuário">
                <button class="botao-pequeno fundo-preto"><i class="bi bi-search"></i></button>
            </div>

            <?php
                $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_usuario'";
                $query_usuario_sistema = $mysqli -> query($sql);
            
                while ($row_usuario_sistema = $query_usuario_sistema -> fetch_assoc()) {
                    $id_usuario_sistema = $row_usuario_sistema["ID_USUARIO"];
                    $nome_usuario_sistema = $row_usuario_sistema["NOME"];
                    $hierarquia_usuario_sistema = $row_usuario_sistema["HIERARQUIA"];

                    echo '
                    <section class="usuario-container">
                        <div>
                            <h2 class="label">'.$nome_usuario_sistema.' (Você)</h2>
                            <p class="sub-titulo primeira-letra-maiuscula">'.$hierarquia_usuario_sistema.'</p>
                        </div>

                        <div class="botoes-container">
                            <button class="botao-pequeno fundo-preto" onclick="AbrirEditarUsuario'.$id_usuario_sistema.'()"><i class="bi bi-sliders"></i></button>
                        </div>                
                    </section>

                    <div class="divisor fundo-cinza"></div>
                    ';
                }

                $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO != '$id_usuario'";
                $query_usuario_sistema = $mysqli -> query($sql);
            
                while ($row_usuario_sistema = $query_usuario_sistema -> fetch_assoc()) {
                    $id_usuario_sistema = $row_usuario_sistema["ID_USUARIO"];
                    $nome_usuario_sistema = $row_usuario_sistema["NOME"];
                    $hierarquia_usuario_sistema = $row_usuario_sistema["HIERARQUIA"];

                    echo '
                    <section class="usuario-container">
                        <div>
                            <h2 class="label">'.$nome_usuario_sistema.'</h2>
                            <p class="sub-titulo primeira-letra-maiuscula">'.$hierarquia_usuario_sistema.'</p>
                        </div>

                        <div class="botoes-container">
                            <button class="botao-pequeno fundo-preto" onclick="AbrirEditarUsuario'.$id_usuario_sistema.'()"><i class="bi bi-sliders"></i></button>
                            <button class="botao-pequeno fundo-vermelho" onclick="AbrirExcluirUsuario'.$id_usuario_sistema.'()"><i class="bi bi-person-dash-fill"></i></button>
                        </div>                
                    </section>

                    <div class="divisor fundo-cinza"></div>
                    ';
                }
            ?>
        </main>
    </body>
</html>