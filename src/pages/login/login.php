<?php
  include("../../../conexao.php");
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="login.css">
        <title>Projetos FSVJ - Login</title>
    </head>

    <body>
        <section class="imagem-container">
            <img src="../../assets/images/imagem_login.jpg" alt="Imagem de login" />
        </section>

        <section class="login-container">
            <img class="logo" src="../../assets/images/logo_login.svg" alt="Logo do software">
            <p class="descricao">Faça login para acessar ou gerenciar seus projetos de forma prática e organizada</p>

            <form method="POST">
                <div class="email-container">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email" placeholder="Digite seu e-mail" />
                </div>

                <div class="senha-container">
                    <label for="senha">Senha</label>
                    <div class="input-senha">
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" />
                        <i class="bi bi-eye-slash-fill eye" aria-hidden="true"></i>
                    </div>
                </div>

                <a href="#" class="esqueci-senha">Esqueceu sua senha?</a>
                <p class="erro"><i class="bi bi-exclamation-circle-fill"></i> E-mail ou senha inválidos</p>
                <button type="submit">Entrar</button>
            </form>

            <p class="rodape">
                Este ambiente é exclusivo para usuários autorizados do <strong>Fundo Social Vale do Jequitinhonha</strong>
            </p>
        </section> 
    </body>
</html>

<?php
  /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM USUARIOS U WHERE U.EMAIL = '$email' AND U.SENHA = '$senha'";
    $query_usuario = $mysqli -> query($sql);

    if ($query_usuario -> num_rows > 0) {
      header('Location: ../projetos/projetos.php');
    }

    $mysqli -> close();
  }*/
?>

