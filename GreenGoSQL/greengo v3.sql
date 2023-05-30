-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Maio-2023 às 16:32
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

--
-- Extraindo dados da tabela `especie`
--

INSERT INTO `especie` (`idEspecie`, `nomePop`, `nomeCie`, `descricao`, `imagemEspecie`, `frutifera`, `comestivel`, `raridade`, `medicinal`, `toxidade`, `exotica`) VALUES
(18, 'Cactus', 'Cactus cientifucsio', '<p>Cactus é mto foda tem espinho</p>', '../../public/especies/73052c0da5a25dae226e7271b5b1c3c5.jpg', 1, 1, 0, 0, 0, 0),
(19, 'Caladium', 'Caladium cientificus', '<p>verdi e rosa</p>', '../../public/especies/aa60c077117e999ed73341dec33d65ee.jpg', 0, 0, 0, 0, 0, 1),
(20, 'Suculenta', 'Muito suculenta', '<p>da vontade de comer só pelo nome</p>', '../../public/especies/0b4b84181c96962a563210e11b41a9d9.jpg', 0, 1, 0, 1, 0, 0),
(21, 'Vitoria Regia', 'Vitoria Regia', '<p>Onde os sapos ficam</p>', '../../public/especies/d9954a1e1c365a086ecbb3ca34e72c41.jpg', 0, 0, 0, 0, 0, 1);

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

--
-- Extraindo dados da tabela `planta`
--

INSERT INTO `planta` (`idPlanta`, `idZona`, `idEspecie`, `codNumerico`, `imagemPlanta`, `pontuacaoPlanta`, `codQR`, `nomeSocial`, `historia`) VALUES
(67, 16, 18, 1000, '../../public/plantas/524f302af15ee8555116eb4e487e611b.jpg', 10, '../../public/qrcode/qrcode_1000.png', 'Ana Terra', '<p>Ana Terra História</p>'),
(68, 16, 18, 1001, '../../public/plantas/2dd08102476f925c50224eb0f867b4d0.jpg', 10, '../../public/qrcode/qrcode_1001.png', 'Teste', '<p>teste</p>');

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
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) DEFAULT NULL,
  `genero` varchar(20) NOT NULL,
  `escolaridade` varchar(20) NOT NULL,
  `loginUsuario` varchar(30) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipoUsuario` tinyint(1) NOT NULL
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
(16, 'Zona Deserto', NULL, NULL),
(19, 'Zona Franca', NULL, NULL),
(21, 'Zona Teste', NULL, NULL);

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
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

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
  MODIFY `idEspecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `planta`
--
ALTER TABLE `planta`
  MODIFY `idPlanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `zona`
--
ALTER TABLE `zona`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`idUsuario`),
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
