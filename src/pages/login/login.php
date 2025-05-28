<body>
  <section class="imagem-container">
    <img src="../../assets/images/imagem_login.jpg" alt="Imagem de login" />
  </section>

  <section class="login-container">
    <h1>ProjetosFSVJ</h1>
    <p class="descricao">Faça login para acessar ou gerenciar seus projetos de forma prática e organizada</p>

    <form>
      <label for="email">E-mail</label>
      <input type="text" id="email" placeholder="Digite seu e-mail" />

      <label for="senha">Senha</label>
      <div class="senha-container">
        <input type="password" id="senha" placeholder="Digite sua senha" />
        <i class="bi bi-eye-slash-fill eye"></i>
      </div>

      <a href="#" class="esqueci-senha">Esqueceu sua senha?</a>
      <p class="erro">E-mail ou senha inválidos</p>

      <button type="submit">Entrar</button>
    </form>

    <p class="rodape">
      Este ambiente é exclusivo para usuários autorizados do <strong>Fundo Social Vale do Jequitinhonha</strong>
    </p>
  </section>
</body>

