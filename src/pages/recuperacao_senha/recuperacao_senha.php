<?php
    include("../../../conexao.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST["email"];
        $erroEmail = false;

        $sql = "SELECT * FROM USUARIOS U WHERE U.EMAIL = '$email'";
        $query_usuario = $mysqli -> query($sql);

        if ($query_usuario -> num_rows > 0) {
            header("Location: ../verificacao_codigo/verificacao_codigo.php?email=$email");
        }
        else {
            $erroEmail = true;
        }

        $mysqli -> close();
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="recuperacao_senha.css">
        <title>Projetos FSVJ - Recuperação de senha</title>
    </head>

    <body>
        <section class="imagem-container">
            <img src="../../assets/images/imagem_login.jpg" alt="Imagem de login" />
        </section>

        <section class="login-container">
            <img class="logo" src="../../assets/images/logo_login.svg" alt="Logo do software">
            <p class="descricao">Digite seu e-mail para receber o código de recuperação de senha</p>

            <form method="POST">
                <div class="email-container">
                    <label for="inputEmail">E-mail</label>
                    <input type="email" id="inputEmail" name="email" placeholder="Digite seu e-mail" autocomplete="off" />
                </div>

                <p class="erro" style="<?php if ($erroEmail) {echo 'display: block;';}?>"><i class="bi bi-exclamation-circle-fill"></i>E-mail não encontrado</p>
                <button type="submit">Enviar código</button>
                <div class="login-divisor"></div>
            </form>

            <p class="rodape">
                Este ambiente é exclusivo para usuários autorizados do <strong>Fundo Social Vale do Jequitinhonha</strong>
            </p>
        </section> 

        <script src="login.js"></script>
    </body>
</html>

