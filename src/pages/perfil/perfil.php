<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projetos FSVJ - Perfil</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="perfil.css" />
    </head>
    <body>
        <nav class="nav-container">
                <section class="nav-logo">
                    <img class="logo" src="../../assets/images/logo_menu.svg" alt="Logo do software">                
                </section>
                <div>
                    <p class="mensagem-usuario">Olá, Usuário</p>
                </div>

                <section class="nav-menu">
                    <h2>Menu</h2>
                    <ul>
                        <li>
                            <a href="#"><i class="bi bi-archive-fill"></i> Projetos</a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-people-fill"></i>Usuário</a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-geo-alt-fill"></i>Locais</a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-person-circle"></i>Perfil</a>
                        </li>
                        <li>                        
                            <a href=""><i class="bi bi-box-arrow-right"></i> Sair</a>
                        </li>
                    </ul>
                </section>

                <section class="nav-projetos">
                    <h2>Projetos Atuais</h2>
                    <span>0</span>
                    <ul>
                        <li>
                            <p class="nome-projeto">Nome do Projeto</p>
                        </li>
                    </ul>
                </section>
        </nav>
        <main>
            <section class="main-header">
                <div class="titulo-container">
                    <h1>Meu perfil</h1>
                    <p>Gerenciar Perfil</p>
                </div>
            </section>
            <section class="perfil-container">
                <form method="POST">
                    <div class="dados-container">
                        <label for="inputNome">Nome do Usuário</label>
                        <input type="text" id="inputNome" name="nome" placeholder="Nome do Usuário" autocomplete="off">
                    </div>
                    <div class="dados-container">
                        <label for="inputCargo">Cargo</label>
                        <select name="cargo" id="cargo">
                            <option value="Escolha-Cargo">Escolha o Cargo</option>
                            <option value="Voluntário">Voluntário</option>
                            <option value="Coordenador">Coordenador</option>
                            <option value="Diretor">Diretor</option>
                        </select>

                    </div>
                    <div class="dados-container">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" id="inputEmail" name="email" placeholder="usuario@email.com" autocomplete="off" />
                    </div>
                    <div class="dados-container input-senha">
                        <label for="inputSenha">Senha</label>
                        <div class="input-senha">
                            <input type="password" name="senha" placeholder="Digite sua senha" autocomplete="off" />
                            <i class="bi bi-eye-slash-fill senha-escondida" onclick="ExibirSenha()"></i>
                            <i class="bi bi-eye-fill senha-exibida" onclick="EsconderSenha()"></i>
                        </div>
                    </div>

                    <div class="perfil-divisor"></div>

                    <div class="editar-container">
                        <h2>Editar Informações</h2>
                    </div>

                    <div class="editar-container">
                        <label for="inputEmailEditar">E-mail</label>
                        <input type="email" id="inputEmailEditar" name="emailEditar" placeholder="usuario@email.com" autocomplete="off" />
                    </div>
                    <span class="erro"><i class="bi bi-exclamation-circle-fill"></i> Formato de E-mail Inválido</span>

                    <div class="dados-container input-senhaEditar">
                        <label for="inputSenhaEditar">Senha</label>
                        <div class="input-senhaEditar">
                            <input type="password" id="inputSenhaEditar" name="senhaEditar" placeholder="Digite sua senha" autocomplete="off" />
                            <i class="bi bi-eye-slash-fill senha-escondida" onclick="ExibirSenha()"></i>
                            <i class="bi bi-eye-fill senha-exibida" onclick="EsconderSenha()"></i>
                         </div>
                        </div>
                        <span class="erro"><i class="bi bi-exclamation-circle-fill"></i> Senha precisa conter caracteres especiais</span>
                    <div  class="botao-container">
                        <button type="submit" class="botao-salvar">Salvar</button>
                    </div>
                </form>
            </section>
        </main>
    </body>
</html>