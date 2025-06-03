<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetos FSVJ - Locais</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="locais.css" />
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
                    <h1>Locais</h1>
                </div>
                <div class= "main-botao">
                    <button class="botao-adicionar"><i class="bi bi-plus-lg"></i> Adicionar Local</button>
                </div>
            </section>

            <section class="main-search">
                <div class="buscar-container">
                    <input type="text" placeholder="Nome do Local">
                </div>
                <div class= "main-botao">
                    <button class="botao-buscar"><i class="bi bi-search"></i></button>
                </div>
            </section>
            <section class="local-container">
                <div class="local-titulo">
                    <h2>Nome Local</h2>
                    <p>Rua das Flores, 123 - Centro, Taquaritinga</p>
                </div>
                <div class="botoes-local">
                    <button class="botao-editar"><i class="bi bi-sliders"></i></button>
                    <button class="botao-remover"><i class="bi bi-trash-fill"></i></i></button>
                </div>
            </section>
            <div class="local-divisor"></div>
        </main>
</body>
</html>