-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Set-2018 às 16:27
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xvision`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `custo_ligacao_minuto` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `custo_ligacao_minuto`) VALUES
(1, 1.45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ligacoes`
--

CREATE TABLE `ligacoes` (
  `id` int(11) NOT NULL,
  `num_origem` varchar(15) COLLATE utf8_bin NOT NULL,
  `num_destino` varchar(15) COLLATE utf8_bin NOT NULL,
  `tempo_ligacao` time NOT NULL,
  `data_ligacao` date NOT NULL,
  `hora_ligacao` time NOT NULL,
  `comentario` text COLLATE utf8_bin,
  `excluido` enum('Nao','Sim') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `ligacoes`
--

INSERT INTO `ligacoes` (`id`, `num_origem`, `num_destino`, `tempo_ligacao`, `data_ligacao`, `hora_ligacao`, `comentario`, `excluido`) VALUES
(1, '(62) 3991-1821', '(62) 3991-1825', '00:25:12', '2018-09-06', '20:33:25', 'LIGAÇÃO REALIZADA PELO CELULAR', 'Sim'),
(3, '(62) 3232-1515', '(62) 3321-4548', '01:25:00', '2018-09-07', '18:52:00', 'OLA', 'Nao'),
(5, '(62) 3232-1515', '(62) 3321-4548', '00:18:35', '2018-09-03', '16:15:00', '', 'Nao'),
(6, '(62) 3232-0000', '(62) 3991-1821', '00:13:35', '2018-09-08', '10:15:00', 'opa', 'Sim'),
(7, '(62) 3991-1821', '(62) 98222-2480', '00:05:30', '2018-08-31', '18:15:00', 'LIGAÇÃO REALIZADA PARA O CELULAR DO PAPAI', 'Nao'),
(8, '(62) 3232-1515', '(62) 3321-4548', '00:13:35', '2018-09-03', '11:11:00', NULL, 'Nao'),
(9, '(62) 3991-1821', '(62) 98222-2480', '00:05:30', '2018-09-04', '11:52:00', 'PAPAI', 'Sim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligacoes`
--
ALTER TABLE `ligacoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ligacoes`
--
ALTER TABLE `ligacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
