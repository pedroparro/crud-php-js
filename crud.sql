-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18-Fev-2022 às 21:16
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `base_cidades`
--

CREATE TABLE `base_cidades` (
  `id` int(11) NOT NULL,
  `operacoes_cidades` varchar(250) NOT NULL,
  `operacoes_emitente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `base_cidades`
--

INSERT INTO `base_cidades` (`id`, `operacoes_cidades`, `operacoes_emitente`) VALUES
(14, 'SUZANO', 1),
(15, 'JANDIRA', 1),
(16, 'GUARUJA', 1),
(22, 'LEME', 2),
(23, 'SALTO', 2),
(24, 'BAURU', 4),
(25, 'TRÊS CORAÇÔES', 5),
(26, 'NEPOMUCENO', 5),
(27, 'PERDÕES', 6),
(28, 'BETIM', 7),
(29, 'CONTAGEM', 7),
(30, 'PERDÕES 2', 6),
(31, 'RP 1', 3),
(32, 'RP 2', 3),
(33, 'RP 3', 3),
(34, 'PERDÕES 3', 6),
(35, 'IBITINGA 1', 4),
(36, 'IBITINGA 2', 4),
(37, 'BH', 7),
(38, 'POUSO ALEGRE', 5),
(39, 'SOROCABA', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `base_emitente`
--

CREATE TABLE `base_emitente` (
  `id` int(11) NOT NULL,
  `operacoes_emitente` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `base_emitente`
--

INSERT INTO `base_emitente` (`id`, `operacoes_emitente`) VALUES
(1, 'SP'),
(2, 'ITU'),
(3, 'RP'),
(4, 'IBITINGA'),
(5, 'POUSO ALEGRE'),
(6, 'PERDOES'),
(7, 'BH');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacoes`
--

CREATE TABLE `operacoes` (
  `id` int(11) NOT NULL,
  `nf` varchar(15) NOT NULL,
  `operacoes_emitente` int(11) NOT NULL,
  `operacoes_cidades` int(11) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `destinatario` varchar(250) NOT NULL,
  `entregador` varchar(220) NOT NULL,
  `data_op` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `operacoes`
--

INSERT INTO `operacoes` (`id`, `nf`, `operacoes_emitente`, `operacoes_cidades`, `cliente`, `destinatario`, `entregador`, `data_op`) VALUES
(17, '456790', 1, 16, 'SP', 'SP', 'SP', '2022-02-18'),
(18, '4567545', 2, 23, 'ITU', 'ITU', 'ITU', '2022-02-18'),
(19, '322444', 3, 31, 'RP', 'RP', 'RP', '2022-02-18'),
(20, '890989', 4, 24, 'IBITINGA', 'IBITINGA', 'IBITINGA', '2022-02-18'),
(21, '435643', 5, 25, 'POUSO ALEGRE', 'POUSO ALEGRE', 'POUSO ALEGRE', '2022-02-18'),
(22, '768976', 6, 34, 'PERDÕES', 'PERDÕES', 'PERDÕES', '2022-02-18'),
(23, '767694', 7, 28, 'BH', 'BH', 'BH', '2022-02-18');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `base_cidades`
--
ALTER TABLE `base_cidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operacoes_emitente` (`operacoes_emitente`);

--
-- Índices para tabela `base_emitente`
--
ALTER TABLE `base_emitente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `operacoes`
--
ALTER TABLE `operacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_op_emitente` (`operacoes_emitente`),
  ADD KEY `operacoes_cidades` (`operacoes_cidades`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `base_cidades`
--
ALTER TABLE `base_cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `base_emitente`
--
ALTER TABLE `base_emitente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `operacoes`
--
ALTER TABLE `operacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `base_cidades`
--
ALTER TABLE `base_cidades`
  ADD CONSTRAINT `base_cidades_ibfk_1` FOREIGN KEY (`operacoes_emitente`) REFERENCES `base_emitente` (`id`);

--
-- Limitadores para a tabela `operacoes`
--
ALTER TABLE `operacoes`
  ADD CONSTRAINT `fk_op_cidades` FOREIGN KEY (`operacoes_cidades`) REFERENCES `base_cidades` (`id`),
  ADD CONSTRAINT `fk_op_emitente` FOREIGN KEY (`operacoes_emitente`) REFERENCES `base_emitente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
