-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/05/2025 às 13:08
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
  `ANEXADO_EM` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `ID_ENDERECO` int(11) NOT NULL,
  `RUA` varchar(50) NOT NULL,
  `BAIRRO` varchar(50) NOT NULL,
  `NUMERO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `ID_EQUIPAMENTO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `QUANTIDADE_DISPONIVEL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos_utilizados`
--

CREATE TABLE `equipamentos_utilizados` (
  `ID_EQUIPAMENTO_UTILIZADO` int(11) NOT NULL,
  `QUANTIDADE_UTILIZADA` int(11) NOT NULL,
  `ID_EQUIPAMENTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fases`
--

CREATE TABLE `fases` (
  `ID_FASE` int(11) NOT NULL,
  `ESCOPO` mediumtext DEFAULT NULL,
  `DATA_INICIO` date NOT NULL,
  `DATA_TERMINO` date NOT NULL,
  `GASTOS` float DEFAULT 0,
  `ID_PROJETO` int(11) NOT NULL,
  `ID_EQUIPAMENTO_UTILIZADO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `locais`
--

CREATE TABLE `locais` (
  `ID_LOCAL` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `ID_ENDERECO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
--

CREATE TABLE `projetos` (
  `ID_PROJETO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `ESCOPO` mediumtext DEFAULT NULL,
  `RECUROS_FINANCEIRO` float DEFAULT 0,
  `DATA_INICIO` date NOT NULL,
  `DATA_TERMINO` date NOT NULL,
  `CRIADO_EM` date DEFAULT curdate(),
  `ID_LOCAL` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_EQUIPAMENTO` int(11) DEFAULT NULL,
  `ID_DOCUMENTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `ID_TAREFA` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `DESCRICAO` mediumtext DEFAULT NULL,
  `ESTADO` enum('A FAZER','EM ANDAMENTO','CONCLUIDO') DEFAULT 'A FAZER',
  `CRIADO_EM` date DEFAULT curdate(),
  `DATA_VENCIMENTO` date NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_FASE` int(11) NOT NULL,
  `ID_DOCUMENTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `SENHA` varchar(50) NOT NULL,
  `HIERARQUIA` enum('DIRETOR','COORDENADOR','VOLUNTARIO') NOT NULL,
  `CRIADO_EM` date DEFAULT curdate(),
  `EXCLUIDO` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`ID_DOCUMENTO`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`ID_ENDERECO`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`ID_EQUIPAMENTO`);

--
-- Índices de tabela `equipamentos_utilizados`
--
ALTER TABLE `equipamentos_utilizados`
  ADD PRIMARY KEY (`ID_EQUIPAMENTO_UTILIZADO`),
  ADD KEY `ID_EQUIPAMENTO` (`ID_EQUIPAMENTO`);

--
-- Índices de tabela `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`ID_FASE`),
  ADD KEY `ID_PROJETO` (`ID_PROJETO`),
  ADD KEY `ID_EQUIPAMENTO_UTILIZADO` (`ID_EQUIPAMENTO_UTILIZADO`);

--
-- Índices de tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`ID_LOCAL`),
  ADD KEY `ID_ENDERECO` (`ID_ENDERECO`);

--
-- Índices de tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`ID_PROJETO`),
  ADD KEY `ID_LOCAL` (`ID_LOCAL`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_EQUIPAMENTO` (`ID_EQUIPAMENTO`),
  ADD KEY `ID_DOCUMENTO` (`ID_DOCUMENTO`);

--
-- Índices de tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`ID_RELATORIO`),
  ADD KEY `ID_FASE` (`ID_FASE`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`ID_TAREFA`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_FASE` (`ID_FASE`),
  ADD KEY `ID_DOCUMENTO` (`ID_DOCUMENTO`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `ID_DOCUMENTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `ID_ENDERECO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `ID_EQUIPAMENTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `equipamentos_utilizados`
--
ALTER TABLE `equipamentos_utilizados`
  MODIFY `ID_EQUIPAMENTO_UTILIZADO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fases`
--
ALTER TABLE `fases`
  MODIFY `ID_FASE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `ID_LOCAL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `ID_PROJETO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `ID_RELATORIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `ID_TAREFA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `equipamentos_utilizados`
--
ALTER TABLE `equipamentos_utilizados`
  ADD CONSTRAINT `equipamentos_utilizados_ibfk_1` FOREIGN KEY (`ID_EQUIPAMENTO`) REFERENCES `equipamentos` (`ID_EQUIPAMENTO`);

--
-- Restrições para tabelas `fases`
--
ALTER TABLE `fases`
  ADD CONSTRAINT `fases_ibfk_1` FOREIGN KEY (`ID_PROJETO`) REFERENCES `projetos` (`ID_PROJETO`),
  ADD CONSTRAINT `fases_ibfk_2` FOREIGN KEY (`ID_EQUIPAMENTO_UTILIZADO`) REFERENCES `equipamentos_utilizados` (`ID_EQUIPAMENTO_UTILIZADO`);

--
-- Restrições para tabelas `locais`
--
ALTER TABLE `locais`
  ADD CONSTRAINT `locais_ibfk_1` FOREIGN KEY (`ID_ENDERECO`) REFERENCES `enderecos` (`ID_ENDERECO`);

--
-- Restrições para tabelas `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `projetos_ibfk_1` FOREIGN KEY (`ID_LOCAL`) REFERENCES `locais` (`ID_LOCAL`),
  ADD CONSTRAINT `projetos_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`),
  ADD CONSTRAINT `projetos_ibfk_3` FOREIGN KEY (`ID_EQUIPAMENTO`) REFERENCES `equipamentos` (`ID_EQUIPAMENTO`),
  ADD CONSTRAINT `projetos_ibfk_4` FOREIGN KEY (`ID_DOCUMENTO`) REFERENCES `documentos` (`ID_DOCUMENTO`);

--
-- Restrições para tabelas `relatorios`
--
ALTER TABLE `relatorios`
  ADD CONSTRAINT `relatorios_ibfk_1` FOREIGN KEY (`ID_FASE`) REFERENCES `fases` (`ID_FASE`);

--
-- Restrições para tabelas `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`),
  ADD CONSTRAINT `tarefas_ibfk_2` FOREIGN KEY (`ID_FASE`) REFERENCES `fases` (`ID_FASE`),
  ADD CONSTRAINT `tarefas_ibfk_3` FOREIGN KEY (`ID_DOCUMENTO`) REFERENCES `documentos` (`ID_DOCUMENTO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
