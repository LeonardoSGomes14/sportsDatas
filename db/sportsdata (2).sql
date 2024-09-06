-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/09/2024 às 12:38
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sportsdata`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `competitors`
--

CREATE TABLE `competitors` (
  `id_competitor` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `gender` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `team` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `competitors`
--

INSERT INTO `competitors` (`id_competitor`, `name`, `age`, `height`, `weight`, `gender`, `cpf`, `rg`, `team`) VALUES
(1, 'claudio', 55, 1, 88, 'masc', 132001524, 224441532, 'amarela'),
(2, 'alessandro', 25, 1.66, 67, 'masc', 1122233344, 11112321, 'laranja');

-- --------------------------------------------------------

--
-- Estrutura para tabela `locale`
--

CREATE TABLE `locale` (
  `id_locale` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `neighborhood` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `cep` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `locale`
--

INSERT INTO `locale` (`id_locale`, `street`, `neighborhood`, `number`, `cep`, `city`, `state`, `country`) VALUES
(1, 'conceição do monte alegre ', 'villa affini', 520, 19703024, 'paraguacu', 'sao paulo', 'brasil'),
(2, 'salmen zauy', 'vila nova', 325, 19703025, 'paraguacu paulista', 'sao paulo', 'brasil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sport`
--

CREATE TABLE `sport` (
  `id_sport` int(11) NOT NULL,
  `modality` varchar(255) NOT NULL,
  `olimpic_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sport`
--

INSERT INTO `sport` (`id_sport`, `modality`, `olimpic_year`) VALUES
(1, 'natacao', 2024),
(2, 'volei', 2024);

-- --------------------------------------------------------

--
-- Estrutura para tabela `trainer`
--

CREATE TABLE `trainer` (
  `id_trainer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `trainer`
--

INSERT INTO `trainer` (`id_trainer`, `name`, `age`, `height`, `weight`, `rg`, `cpf`) VALUES
(1, 'leonardo', 27, 1.8, 77, 110003214, 1221012332),
(2, 'lucas', 41, 1.7, 69, 102221013, 1030142111);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `competitors`
--
ALTER TABLE `competitors`
  ADD PRIMARY KEY (`id_competitor`);

--
-- Índices de tabela `locale`
--
ALTER TABLE `locale`
  ADD PRIMARY KEY (`id_locale`);

--
-- Índices de tabela `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id_sport`);

--
-- Índices de tabela `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id_trainer`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `competitors`
--
ALTER TABLE `competitors`
  MODIFY `id_competitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `locale`
--
ALTER TABLE `locale`
  MODIFY `id_locale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sport`
--
ALTER TABLE `sport`
  MODIFY `id_sport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id_trainer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
