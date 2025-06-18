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
        <link rel="shortcut icon" href="../../assets/images/favicon.svg">
        <link rel="stylesheet" href="alterar_senha.css">
        <title>Projetos FSVJ - Recuperação de senha</title>
    </head>

    <body>
        <section class="imagem-container">
            <img src="../../assets/images/imagem_login.jpg" alt="Imagem de login" />
        </section>

        <section class="login-container">
            <img class="logo" src="../../assets/images/logo_login.svg" alt="Logo do software">
            <p class="descricao">Informe sua nova senha</p>

            <form method="GET" action="../../functions/alterar_senha.php">
                <div class="senha-container">
                    <label for="inputSenha">Nova Senha</label>
                    <div class="input-senha">
                        <input type="password" id="inputSenha" name="senha" placeholder="Digite sua nova senha" autocomplete="off" />
                        <i id="btnExibirSenha" class="bi bi-eye-slash-fill senha-escondida" onclick="ExibirSenha()"></i>
                        <i id="btnEsconderSenha" class="bi bi-eye-fill senha-exibida" onclick="EsconderSenha()"></i>
                    </div>
                </div>

                <p id="mensagemErroSenha" class="erro"><i class="bi bi-exclamation-circle-fill"></i>Senha precisa conter caracteres especiais</p>
                <button id="btnConfirmar" type="submit" disabled>Confirmar</button>
                <div class="login-divisor"></div>
            </form>

            <p class="rodape">
                Este ambiente é exclusivo para usuários autorizados do <strong>Fundo Social Vale do Jequitinhonha</strong>
            </p>
        </section> 

        <script>
            function ExibirSenha() {
                let btnExibirSenha = document.getElementById("btnExibirSenha");
                let btnEsconderSenha = document.getElementById("btnEsconderSenha");
                let inputSenha = document.getElementById("inputSenha");

                btnExibirSenha.style.display = "none";
                btnEsconderSenha.style.display = "block";
                inputSenha.type = "text";
            }

            function EsconderSenha() {
                let btnEsconderSenha = document.getElementById("btnEsconderSenha");
                let btnExibirSenha = document.getElementById("btnExibirSenha");

                btnEsconderSenha.style.display = "none";
                btnExibirSenha.style.display = "block";
                inputSenha.type = "password";
            }

            const inputSenha = document.getElementById("inputSenha");
            const caracteresEspeciais = ["!", "@", "#", "$", "%", "&", "-", "_"];
            const mensagemErroSenha = document.getElementById("mensagemErroSenha");
            const btnConfirmar = document.getElementById("btnConfirmar");

            inputSenha.addEventListener('input', function() {
                let valorInput = inputSenha.value;

                if (caracteresEspeciais.some(caractere => valorInput.includes(caractere))) {
                    mensagemErroSenha.style.display = "None";
                    btnConfirmar.disabled = false;
                    btnConfirmar.style.backgroundColor = "var(--g11)";
                    btnConfirmar.style.cursor = "pointer";
                }
                else if (valorInput == "") {
                    mensagemErroSenha.style.display = "None";
                    btnConfirmar.disabled = true;
                    btnConfirmar.style.backgroundColor = "var(--g6)";
                    btnConfirmar.style.cursor = "not-allowed";
                }
                else {
                    mensagemErroSenha.style.display = "Block";
                    btnConfirmar.disabled = true;
                    btnConfirmar.style.backgroundColor = "var(--g6)";
                    btnConfirmar.style.cursor = "not-allowed";
                }
            });
        </script>
    </body>
</html>

