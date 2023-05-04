-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Maio-2023 às 02:16
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `greengo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE `equipe` (
  `idEquipe` int(11) NOT NULL,
  `nomeEquipe` varchar(100) NOT NULL,
  `codEntrada` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `idZona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especie`
--

CREATE TABLE `especie` (
  `idEspecie` int(11) NOT NULL,
  `nomePop` varchar(100) NOT NULL,
  `nomeCie` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `imagemEspecie` varchar(200) NOT NULL,
  `frutifera` tinyint(1) NOT NULL,
  `comestivel` tinyint(1) NOT NULL,
  `raridade` tinyint(1) NOT NULL,
  `medicinal` tinyint(1) NOT NULL,
  `toxidade` tinyint(1) NOT NULL,
  `exotica` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `myuser`
--

CREATE TABLE `myuser` (
  `id` int(11) NOT NULL,
  `nomeUsuario` varchar(100) DEFAULT NULL,
  `genero` tinyint(1) NOT NULL,
  `escolaridade` tinyint(1) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipoUsuario` tinyint(1) NOT NULL,
  `somaPonto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `myuser`
--

INSERT INTO `myuser` (`id`, `nomeUsuario`, `genero`, `escolaridade`, `email`, `senha`, `tipoUsuario`, `somaPonto`) VALUES
(8, 'gabriel', 0, 0, 'gabriel.mandellicardoso@gmail.com', '39f1d985999d5add2270fb7a6b620df2', 2, 0),
(9, 'nikolas', 0, 0, 'nikolas.araujo.tds@gmail.com', '09756885c3b8d9cb381852e3f2b7f220', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `idPergunta` int(11) NOT NULL,
  `descricaoP` varchar(600) NOT NULL,
  `idQuiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planta`
--

CREATE TABLE `planta` (
  `idPlanta` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idEspecie` int(11) NOT NULL,
  `codNumerico` int(11) NOT NULL,
  `imagemPlanta` varchar(200) NOT NULL,
  `pontuacaoPlanta` int(4) NOT NULL,
  `codQR` varchar(5000) NOT NULL,
  `nomeSocial` varchar(60) NOT NULL,
  `historia` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quizz`
--

CREATE TABLE `quizz` (
  `idQuiz` int(11) NOT NULL,
  `pontoQuiz` int(11) NOT NULL,
  `idZona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `idResposta` int(11) NOT NULL,
  `isCorreta` tinyint(1) NOT NULL,
  `descricaoR` varchar(600) NOT NULL,
  `idPergunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `zona`
--

CREATE TABLE `zona` (
  `idZona` int(11) NOT NULL,
  `nomeZona` varchar(60) NOT NULL,
  `qntPlantas` int(11) DEFAULT NULL,
  `pontoZona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `zona`
--

INSERT INTO `zona` (`idZona`, `nomeZona`, `qntPlantas`, `pontoZona`) VALUES
(7, 'aeaeaea', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idEquipe`),
  ADD KEY `id` (`id`),
  ADD KEY `idZona` (`idZona`);

--
-- Índices para tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idEspecie`);

--
-- Índices para tabela `myuser`
--
ALTER TABLE `myuser`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`idPergunta`),
  ADD KEY `idQuiz` (`idQuiz`);

--
-- Índices para tabela `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`idPlanta`),
  ADD KEY `idZona` (`idZona`),
  ADD KEY `fkEspecie` (`idEspecie`);

--
-- Índices para tabela `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`idQuiz`),
  ADD KEY `idZona` (`idZona`);

--
-- Índices para tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`idResposta`),
  ADD KEY `idPergunta` (`idPergunta`);

--
-- Índices para tabela `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `idEquipe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `especie`
--
ALTER TABLE `especie`
  MODIFY `idEspecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `myuser`
--
ALTER TABLE `myuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `planta`
--
ALTER TABLE `planta`
  MODIFY `idPlanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `quizz`
--
ALTER TABLE `quizz`
  MODIFY `idQuiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `idResposta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `zona`
--
ALTER TABLE `zona`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`id`) REFERENCES `myuser` (`id`),
  ADD CONSTRAINT `equipe_ibfk_2` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`);

--
-- Limitadores para a tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `pergunta_ibfk_1` FOREIGN KEY (`idQuiz`) REFERENCES `quizz` (`idQuiz`);

--
-- Limitadores para a tabela `planta`
--
ALTER TABLE `planta`
  ADD CONSTRAINT `fkEspecie` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecie`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkZona` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `quizz`
--
ALTER TABLE `quizz`
  ADD CONSTRAINT `quizz_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`);

--
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`idPergunta`) REFERENCES `pergunta` (`idPergunta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
