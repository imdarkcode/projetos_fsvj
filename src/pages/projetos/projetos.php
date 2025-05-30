<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Projetos FSVJ - Projetos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="projetos.css" />
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
                        <a href=""><i class="bi bi-archive-fill"></i> Projetos</a>
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
                <h2>Projetos</h2>
                <div class="botoes-header">
                    <button class="adicionar"><i class="bi bi-plus-lg"></i> Adicionar Projeto</button>
                    <button class="filtrar"><i class="bi bi-funnel-fill"></i> Filtrar</button>
                </div>
            </section>
                <section class="main-projetos">
                    <div class="projetos">
                        <div class=titulo-projetos>
                            <h2>Nome do Projeto</h2>
                            <p>Nome do Coodenador</p>
                        </div>
                        <div class="botoes-projetos">
                            <button><i class="bi bi-trash3-fill"></i></button>
                            <button><i class="bi bi-plus-lg"></i></button>
                            <button><i class="bi bi-sliders"></i></button>
                            <button><i class="bi bi-people-fill"></i></button>
                            <button><i class="bi bi-info"></i></button>
                            <button><i class="bi bi-caret-down-fill"></i></button>
                        </div>                      
                    </div>
                    <div class="barra-progresso">
                        <div class=progresso>                            
                        </div>
                    </div>                 
            </section>
            <section class="main-fases">
                <div class="fases">
                    <div>
                        <h2>Fase</h2>
                        <p>Concluído</p>
                    </div>
                    <div class="main-tarefas">
                        <a href="#">Ver Tarefas <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="fases-divisor"></div>
            </section>
        </main>
    </body>
</html>
