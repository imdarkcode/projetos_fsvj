<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetos FSVJ - Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="shortcut icon" href="../../assets/images/favicon.svg">
    <link rel="stylesheet" href="usuario.css" />
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
                    <h1>Usuários</h1>
                </div>
                <div class= "main-botao">
                    <button class="botao-adicionar"><i class="bi bi-plus-lg"></i> Adicionar Usuário</button>
                </div>
            </section>
            <section class="main-search">
                    <input type="text" placeholder="Nome do Usuário">
                    <button class="botao-buscar"><i class="bi bi-search"></i></button>
            </section>
            <section class="usuarios-container">
                <div class="usuarios-titulo">
                    <h2>Nome do Diretor(Você)</h2>
                    <p>Diretor</p>
                </div>
                <div class="botoes-usuario">
                    <button class="botao-editar"><i class="bi bi-sliders"></i></button>
                </div>                
            </section>
            <div class="usuarios-divisor"></div>
            <section class="usuarios-container">
                <div class="usuarios-titulo">
                    <h2>Nome do Usuário</h2>
                    <p>Hirarquia</p>
                </div>
                <div class="botoes-usuario">
                    <button class="botao-editar"><i class="bi bi-sliders"></i></button>
                    <button class="botao-remover"><i class="bi bi-person-dash-fill"></i></button>
                </div>
            </section>
            <div class="usuarios-divisor"></div>
        </main>
</body>
</html>