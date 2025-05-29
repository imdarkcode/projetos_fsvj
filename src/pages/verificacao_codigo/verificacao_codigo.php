<?php
    include("../../../conexao.php");

    $erroCodigo = false;
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="verificacao_codigo.css">
        <title>Projetos FSVJ - Verificação de código</title>
    </head>

    <body>
        <section class="imagem-container">
            <img src="../../assets/images/imagem_login.jpg" alt="Imagem de login" />
        </section>

        <section class="login-container">
            <img class="logo" src="../../assets/images/logo_login.svg" alt="Logo do software">
            <p class="descricao">Digite o código enviado no seu e-mail. Verifique se não está na caixa de spam</p>

            <form method="POST">
                <div class="codigo-container">
                    <label for="inputCodgio">Cógido</label>
                    <input type="text" id="inputCodgio" name="codigo" placeholder="Digite o códgo recebido" autocomplete="off" />
                </div>

                <p class="erro" style="<?php if ($erroCodigo) {echo 'display: block;';}?>"><i class="bi bi-exclamation-circle-fill"></i>Código inválido</p>
                <button type="submit">Verificar código</button>
                <div class="login-divisor"></div>
            </form>

            <p class="rodape">
                Este ambiente é exclusivo para usuários autorizados do <strong>Fundo Social Vale do Jequitinhonha</strong>
            </p>
        </section> 

        <script src="login.js"></script>
    </body>
</html>

