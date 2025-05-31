<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projetos FSVJ - Tarefas</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="fase.css" />
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
                    <button class="btn-voltar"><i class="bi bi-arrow-left"></i></button>
                    <div class="titulo">
                        <p>Nome do projeto</p>
                        <h1>Fase</h1>                    
                    </div>
                </div>
                
                <div class="botoes-header">
                    <button><i class="bi bi-download"></i> Baixar Relatório</button>
                    <button><i class="bi bi-trash-fill"></i> Excluir Fase</button>
                    <button><i class="bi bi-sliders"></i> Editar Fase</button>
                    <button><i class="bi bi-info"></i> Informações</button>
                    <button><i class="bi bi-plus-lg"></i> Criar Tarefa</button>
                </div>
            </section>
            <section class="kanban-container">
                <div class="kanban-coluna">
                    <h2>A fazer<span>(0)</span></h2>                    
                    <div class="kanban-tarefa">
                        <h3>Nome da tarefa</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe optio nam voluptatum! Consequuntur at suscipit dolorum, quo quos excepturi doloremque vel facere fuga voluptatibus necessitatibus aperiam corporis nam praesentium possimus!</p>
                        <span class="data-tarefa">10 de Junho</span>
                    </div>
                </div>
    
                <div class="kanban-coluna">
                    <h2>Em andamento<span>(0)</span></h2>                   
                    <div class="kanban-tarefa">
                        <h3>Nome da tarefa</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque maxime culpa excepturi? Totam cum voluptas libero, possimus deleniti fuga nam iusto suscipit sint eos, autem rerum architecto? Eveniet, quos minima?</p>
                        <span class="data-tarefa">10 de Junho</span>
                    </div>
                    
                </div>
    
                <div class="kanban-coluna">
                    <h2>Concluído<span>(0)</span></h2>
                    <div class="kanban-tarefa">
                        <h3>Nome da tarefa</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis quaerat, commodi labore eum distinctio, modi maiores velit tempore non deserunt eos sit quae ipsum aperiam! Dolore ullam a debitis consequuntur?</p>
                        <span class="data-tarefa">10 de Junho</span>
                    </div>
                </div>      
            </section>
        </main>        
    </body>
</html>