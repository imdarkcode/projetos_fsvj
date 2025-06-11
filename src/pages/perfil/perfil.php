<?php
    include("../../../conexao.php");
    $id_usuario = $_GET["id_usuario"];
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projetos FSVJ - Perfil</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="shortcut icon" href="../../assets/images/favicon.svg">
        <link rel="stylesheet" href="../../styles/components/navbar.css" />
        <link rel="stylesheet" href="perfil.css" />
    </head>

    <body>
        
    <?php include("../../components/navbar.php"); ?>

        <main>
            <section class="main-header">
                <div class="titulo-container">
                    <h1 class="titulo-grande">Meu perfil</h1>
                    <p class="sub-titulo">Gerenciar Perfil</p>
                </div>
            </section>

            <?php
                $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_usuario'";
                $query_usuario = $mysqli -> query($sql);

                $row_usuario = $query_usuario -> fetch_assoc();
                $hierarquia = $row_usuario["HIERARQUIA"];
                $nome_usuario = $row_usuario["NOME"];
                $email = $row_usuario["EMAIL"];
                $senha = $row_usuario["SENHA"];

                if ($hierarquia != 'DIRETOR') {
                    echo '
                        <section class="informacoes-perfil">
                            <div class="input-container-reto">
                                <label class="label">Nome do usuário</label>
                                <input type="text" name="nome_usuario" class="input fundo-branco" placeholder="Nome do usuário" value="'.$nome_usuario.'" disabled>
                            </div>

                             <div class="input-container-reto">
                                <label class="label">Cargo</label>
                                <select class="input fundo-branco" name="hierarquia_usuario" disabled>
                                    <option value="VOLUNTÁRIO" '.($hierarquia == 'VOLUNTÁRIO' ? 'selected' : '').'>Voluntário</option>
                                    <option value="COORDENADOR" '.($hierarquia == 'COORDENADOR' ? 'selected' : '').'>Coordenador</option>
                                </select>
                            </div>

                            <div class="input-container-reto">
                                <label class="label">E-mail</label>
                                <input type="text" name="email_usuario" class="input fundo-branco" placeholder="E-mail do usuário" value="'.$email.'" disabled>
                            </div>

                            <div class="input-container-reto">
                                <label class="label">Senha</label>
                                <input type="text" name="senha_usuario" class="input fundo-branco" placeholder="Senha do usuário" value="'.$senha.'" disabled>
                            </div>
                        </section>

                        <div class="divisor fundo-cinza"></div>
                    ';
                }
            ?>
            
            <form method="GET" action="../../functions/editar_perfil.php" class="informacoes-perfil"> 
                <h2 class="titulo-grande">Editar Informações</h2>

                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

                <?php 
                    if ($hierarquia == 'DIRETOR') {
                        echo '
                            <div class="input-container-reto">
                                <label class="label">Nome do usuário</label>
                                <input type="text" name="nome_usuario" class="input fundo-branco" placeholder="Nome do usuário" value="'.$nome_usuario.'">
                            </div>

                            <div class="input-container-reto">
                                <label class="label">Cargo</label>
                                <select class="input fundo-branco" name="hierarquia_usuario">
                                    <option value="VOLUNTÁRIO" '.($hierarquia == 'VOLUNTÁRIO' ? 'selected' : '').'>Voluntário</option>
                                    <option value="COORDENADOR" '.($hierarquia == 'COORDENADOR' ? 'selected' : '').'>Coordenador</option>
                                    <option value="DIRETOR" '.($hierarquia == 'DIRETOR' ? 'selected' : '').'>Diretor</option>
                                </select>
                            </div>
                        ';
                    }
                    else {
                        echo '
                            <input type="hidden" name="nome_usuario" value="'.$nome_usuario.'">
                            <input type="hidden" name="hierarquia_usuario" value="'.$hierarquia.'">
                        ';
                    }
                ?>

                <div class="input-container-reto">
                    <label class="label">E-mail</label>
                    <input type="text" name="email_usuario" class="input fundo-branco" placeholder="E-mail do usuário" value="<?php echo $email; ?>">
                </div>

                <div class="input-container-reto">
                    <label class="label">Senha</label>
                    <input type="text" name="senha_usuario" class="input fundo-branco" placeholder="Senha do usuário" value="<?php echo $senha; ?>">
                </div>

                <button type="submit" class="botao-form fundo-preto">Editar</button>
            </section>
        </main>
    </body>
</html>