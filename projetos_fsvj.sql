-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/06/2025 às 15:58
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetos_fsvj`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `documentos`
--

CREATE TABLE `documentos` (
  `ID_DOCUMENTO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `ANEXADO_EM` date DEFAULT curdate(),
  `ID_PROJETO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `documentos`
--

INSERT INTO `documentos` (`ID_DOCUMENTO`, `NOME`, `ANEXADO_EM`, `ID_PROJETO`) VALUES
(1, 'Comprovante de aluguel de cadeiras', '2025-06-05', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `ID_ENDERECO` int(11) NOT NULL,
  `RUA` varchar(50) NOT NULL,
  `BAIRRO` varchar(50) NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `CIDADE` varchar(50) NOT NULL,
  `CEP` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`ID_ENDERECO`, `RUA`, `BAIRRO`, `NUMERO`, `CIDADE`, `CEP`) VALUES
(1, 'Rua das Flores', 'Centro', 123, 'Taquaritinga', '15900-000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `ID_EQUIPAMENTO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `QUANTIDADE_DISPONIVEL` int(11) NOT NULL,
  `ID_PROJETO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipamentos`
--

INSERT INTO `equipamentos` (`ID_EQUIPAMENTO`, `NOME`, `QUANTIDADE_DISPONIVEL`, `ID_PROJETO`) VALUES
(1, 'Notebook', 20, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos_utilizados`
--

CREATE TABLE `equipamentos_utilizados` (
  `ID_EQUIPAMENTO_UTILIZADO` int(11) NOT NULL,
  `QUANTIDADE_UTILIZADA` int(11) NOT NULL,
  `ID_EQUIPAMENTO` int(11) NOT NULL,
  `ID_FASE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipamentos_utilizados`
--

INSERT INTO `equipamentos_utilizados` (`ID_EQUIPAMENTO_UTILIZADO`, `QUANTIDADE_UTILIZADA`, `ID_EQUIPAMENTO`, `ID_FASE`) VALUES
(1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fases`
--

CREATE TABLE `fases` (
  `ID_FASE` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `ESCOPO` mediumtext DEFAULT NULL,
  `ESTADO` enum('NÃO INICIADA','EM ANDAMENTO','CONCLUÍDA') DEFAULT 'NÃO INICIADA',
  `DATA_INICIO` date NOT NULL,
  `DATA_TERMINO` date NOT NULL,
  `ID_PROJETO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fases`
--

INSERT INTO `fases` (`ID_FASE`, `NOME`, `ESCOPO`, `ESTADO`, `DATA_INICIO`, `DATA_TERMINO`, `ID_PROJETO`) VALUES
(1, 'Planejamento 2', 'Escopo da fase', 'NÃO INICIADA', '2025-06-04', '2025-06-14', 1),
(4, 'Planejamento 2', 'Escopo da fase', 'NÃO INICIADA', '2025-06-04', '2025-06-14', 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `gastos`
--

CREATE TABLE `gastos` (
  `ID_GASTO` int(11) NOT NULL,
  `DESTINO` varchar(50) NOT NULL,
  `VALOR` float DEFAULT 0,
  `ID_FASE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `gastos`
--

INSERT INTO `gastos` (`ID_GASTO`, `DESTINO`, `VALOR`, `ID_FASE`) VALUES
(1, 'Compra de camisetas', 5000, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `locais`
--

CREATE TABLE `locais` (
  `ID_LOCAL` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `ID_ENDERECO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `locais`
--

INSERT INTO `locais` (`ID_LOCAL`, `NOME`, `ID_ENDERECO`) VALUES
(1, 'Edícula São João', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
--

CREATE TABLE `projetos` (
  `ID_PROJETO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `ESCOPO` mediumtext DEFAULT NULL,
  `DATA_INICIO` date NOT NULL,
  `DATA_TERMINO` date NOT NULL,
  `CRIADO_EM` date DEFAULT curdate(),
  `ID_LOCAL` int(11) DEFAULT NULL,
  `ID_DIRETOR` int(11) NOT NULL,
  `ID_COORDENADOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projetos`
--

INSERT INTO `projetos` (`ID_PROJETO`, `NOME`, `ESCOPO`, `DATA_INICIO`, `DATA_TERMINO`, `CRIADO_EM`, `ID_LOCAL`, `ID_DIRETOR`, `ID_COORDENADOR`) VALUES
(1, 'Aprender na Prática 2025', 'Escopo do projeto', '2025-06-04', '2025-07-04', '2025-06-05', NULL, 1, 2),
(11, 'Inglês na Prática', 'Escopo do projeto', '2025-06-01', '2025-06-30', '2025-06-10', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `recursos`
--

CREATE TABLE `recursos` (
  `ID_RECURSO` int(11) NOT NULL,
  `FONTE` varchar(50) NOT NULL,
  `VALOR` float DEFAULT 0,
  `ID_PROJETO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `recursos`
--

INSERT INTO `recursos` (`ID_RECURSO`, `FONTE`, `VALOR`, `ID_PROJETO`) VALUES
(1, 'Prefeitura Municipal de Taquaritinga', 300000, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `ID_RELATORIO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `GERADO_EM` date DEFAULT curdate(),
  `ID_FASE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `relatorios`
--

INSERT INTO `relatorios` (`ID_RELATORIO`, `NOME`, `GERADO_EM`, `ID_FASE`) VALUES
(1, 'Relatório do Planejamento do projeto Aprender na P', '2025-06-05', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `ID_TAREFA` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `DESCRICAO` mediumtext DEFAULT NULL,
  `ESTADO` enum('A FAZER','EM ANDAMENTO','CONCLUÍDA') DEFAULT 'A FAZER',
  `CRIADO_EM` date DEFAULT curdate(),
  `DATA_VENCIMENTO` date NOT NULL,
  `ID_FASE` int(11) NOT NULL,
  `ID_DOCUMENTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`ID_TAREFA`, `NOME`, `DESCRICAO`, `ESTADO`, `CRIADO_EM`, `DATA_VENCIMENTO`, `ID_FASE`, `ID_DOCUMENTO`) VALUES
(1, 'Coletar Assinaturas', 'Descrição da tarefa', 'A FAZER', '2025-06-05', '2025-06-10', 1, NULL),
(2, 'Consultar Pagamentos', 'Descrição da tarefa', 'A FAZER', '2025-06-10', '2025-06-11', 1, NULL),
(3, 'Criar Formulário de Inscrição', '', 'A FAZER', '2025-06-10', '2025-06-11', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `SENHA` varchar(50) NOT NULL,
  `HIERARQUIA` enum('DIRETOR','COORDENADOR','VOLUNTÁRIO') NOT NULL,
  `CRIADO_EM` date DEFAULT curdate(),
  `EXCLUIDO` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOME`, `EMAIL`, `SENHA`, `HIERARQUIA`, `CRIADO_EM`, `EXCLUIDO`) VALUES
(1, 'João Augusto', 'joao@email.com', '#senha123', 'DIRETOR', '2025-06-05', 'N'),
(2, 'Ana Souza', 'ana@email.com', '#senha123', 'COORDENADOR', '2025-06-05', 'N'),
(3, 'Guilherme Oliveira', 'guilherme@email.com', '#senha123', 'VOLUNTÁRIO', '2025-06-05', 'N');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_projetos`
--

CREATE TABLE `usuarios_projetos` (
  `ID_USUARIO_PROJETO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PROJETO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios_projetos`
--

INSERT INTO `usuarios_projetos` (`ID_USUARIO_PROJETO`, `ID_USUARIO`, `ID_PROJETO`) VALUES
(1, 3, 1),
(2, 3, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_tarefas`
--

CREATE TABLE `usuarios_tarefas` (
  `ID_USUARIO_TAREFA` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_TAREFA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios_tarefas`
--

INSERT INTO `usuarios_tarefas` (`ID_USUARIO_TAREFA`, `ID_USUARIO`, `ID_TAREFA`) VALUES
(1, 3, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`ID_DOCUMENTO`),
  ADD KEY `FK_DOCUMENTOS_PROJETOS` (`ID_PROJETO`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`ID_ENDERECO`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`ID_EQUIPAMENTO`),
  ADD KEY `FK_EQUIPAMENTOS_PROJETOS` (`ID_PROJETO`);

--
-- Índices de tabela `equipamentos_utilizados`
--
ALTER TABLE `equipamentos_utilizados`
  ADD PRIMARY KEY (`ID_EQUIPAMENTO_UTILIZADO`),
  ADD KEY `FK_EQUIPAMENTOS_UTILIZADOS_EQUIPAMENTOS` (`ID_EQUIPAMENTO`),
  ADD KEY `FK_EQUIPAMENTOS_UTILIZADOS_FASE` (`ID_FASE`);

--
-- Índices de tabela `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`ID_FASE`),
  ADD KEY `FK_FASES_PROJETOS` (`ID_PROJETO`);

--
-- Índices de tabela `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`ID_GASTO`),
  ADD KEY `FK_GASTOS_FASES` (`ID_FASE`);

--
-- Índices de tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`ID_LOCAL`),
  ADD KEY `FK_LOCAIS_ENDERECOS` (`ID_ENDERECO`);

--
-- Índices de tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`ID_PROJETO`),
  ADD KEY `ID_LOCAL` (`ID_LOCAL`),
  ADD KEY `FK_PROJETOS_DIRETORES` (`ID_DIRETOR`),
  ADD KEY `FK_PROJETOS_COORDENADORES` (`ID_COORDENADOR`);

--
-- Índices de tabela `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`ID_RECURSO`),
  ADD KEY `FK_RECURSOS_PROJETOS` (`ID_PROJETO`);

--
-- Índices de tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`ID_RELATORIO`),
  ADD KEY `FK_RELATORIOS_FASES` (`ID_FASE`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`ID_TAREFA`),
  ADD KEY `FK_TAREFAS_FASES` (`ID_FASE`),
  ADD KEY `ID_DOCUMENTO` (`ID_DOCUMENTO`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Índices de tabela `usuarios_projetos`
--
ALTER TABLE `usuarios_projetos`
  ADD PRIMARY KEY (`ID_USUARIO_PROJETO`),
  ADD KEY `FK_USUARIOS_PROJETOS_PROJETOS` (`ID_PROJETO`),
  ADD KEY `FK_USUARIOS_PROJETOS_USUARIOS` (`ID_USUARIO`);

--
-- Índices de tabela `usuarios_tarefas`
--
ALTER TABLE `usuarios_tarefas`
  ADD PRIMARY KEY (`ID_USUARIO_TAREFA`),
  ADD KEY `FK_USUARIOS_TAREFAS_TAREFAS` (`ID_TAREFA`),
  ADD KEY `FK_USUARIOS_TAREFAS_USUARIOS` (`ID_USUARIO`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `ID_DOCUMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `ID_ENDERECO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `ID_EQUIPAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `equipamentos_utilizados`
--
ALTER TABLE `equipamentos_utilizados`
  MODIFY `ID_EQUIPAMENTO_UTILIZADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fases`
--
ALTER TABLE `fases`
  MODIFY `ID_FASE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `gastos`
--
ALTER TABLE `gastos`
  MODIFY `ID_GASTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `ID_LOCAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `ID_PROJETO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `recursos`
--
ALTER TABLE `recursos`
  MODIFY `ID_RECURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `ID_RELATORIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `ID_TAREFA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios_projetos`
--
ALTER TABLE `usuarios_projetos`
  MODIFY `ID_USUARIO_PROJETO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios_tarefas`
--
ALTER TABLE `usuarios_tarefas`
  MODIFY `ID_USUARIO_TAREFA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `FK_DOCUMENTOS_PROJETOS` FOREIGN KEY (`ID_PROJETO`) REFERENCES `projetos` (`ID_PROJETO`);

--
-- Restrições para tabelas `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD CONSTRAINT `FK_EQUIPAMENTOS_PROJETOS` FOREIGN KEY (`ID_PROJETO`) REFERENCES `projetos` (`ID_PROJETO`);

--
-- Restrições para tabelas `equipamentos_utilizados`
--
ALTER TABLE `equipamentos_utilizados`
  ADD CONSTRAINT `FK_EQUIPAMENTOS_UTILIZADOS_EQUIPAMENTOS` FOREIGN KEY (`ID_EQUIPAMENTO`) REFERENCES `equipamentos` (`ID_EQUIPAMENTO`),
  ADD CONSTRAINT `FK_EQUIPAMENTOS_UTILIZADOS_FASE` FOREIGN KEY (`ID_FASE`) REFERENCES `fases` (`ID_FASE`);

--
-- Restrições para tabelas `fases`
--
ALTER TABLE `fases`
  ADD CONSTRAINT `FK_FASES_PROJETOS` FOREIGN KEY (`ID_PROJETO`) REFERENCES `projetos` (`ID_PROJETO`);

--
-- Restrições para tabelas `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `FK_GASTOS_FASES` FOREIGN KEY (`ID_FASE`) REFERENCES `fases` (`ID_FASE`);

--
-- Restrições para tabelas `locais`
--
ALTER TABLE `locais`
  ADD CONSTRAINT `FK_LOCAIS_ENDERECOS` FOREIGN KEY (`ID_ENDERECO`) REFERENCES `enderecos` (`ID_ENDERECO`);

--
-- Restrições para tabelas `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `FK_PROJETOS_COORDENADORES` FOREIGN KEY (`ID_COORDENADOR`) REFERENCES `usuarios` (`ID_USUARIO`),
  ADD CONSTRAINT `FK_PROJETOS_DIRETORES` FOREIGN KEY (`ID_DIRETOR`) REFERENCES `usuarios` (`ID_USUARIO`),
  ADD CONSTRAINT `projetos_ibfk_1` FOREIGN KEY (`ID_LOCAL`) REFERENCES `locais` (`ID_LOCAL`);

--
-- Restrições para tabelas `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `FK_RECURSOS_PROJETOS` FOREIGN KEY (`ID_PROJETO`) REFERENCES `projetos` (`ID_PROJETO`);

--
-- Restrições para tabelas `relatorios`
--
ALTER TABLE `relatorios`
  ADD CONSTRAINT `FK_RELATORIOS_FASES` FOREIGN KEY (`ID_FASE`) REFERENCES `fases` (`ID_FASE`);

--
-- Restrições para tabelas `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `FK_TAREFAS_FASES` FOREIGN KEY (`ID_FASE`) REFERENCES `fases` (`ID_FASE`),
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`ID_DOCUMENTO`) REFERENCES `documentos` (`ID_DOCUMENTO`);

--
-- Restrições para tabelas `usuarios_projetos`
--
ALTER TABLE `usuarios_projetos`
  ADD CONSTRAINT `FK_USUARIOS_PROJETOS_PROJETOS` FOREIGN KEY (`ID_PROJETO`) REFERENCES `projetos` (`ID_PROJETO`),
  ADD CONSTRAINT `FK_USUARIOS_PROJETOS_USUARIOS` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`);

--
-- Restrições para tabelas `usuarios_tarefas`
--
ALTER TABLE `usuarios_tarefas`
  ADD CONSTRAINT `FK_USUARIOS_TAREFAS_TAREFAS` FOREIGN KEY (`ID_TAREFA`) REFERENCES `tarefas` (`ID_TAREFA`),
  ADD CONSTRAINT `FK_USUARIOS_TAREFAS_USUARIOS` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
