-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Maio-2021 às 00:22
-- Versão do servidor: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(5) NOT NULL,
  `cliente` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mesa` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao_pedido` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `atendente` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidossalvos`
--

CREATE TABLE `pedidossalvos` (
  `id_pedido_salvo` int(5) NOT NULL,
  `cliente` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mesa` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao_pedido` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `atendente` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_hora` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedidossalvos`
--

INSERT INTO `pedidossalvos` (`id_pedido_salvo`, `cliente`, `mesa`, `descricao_pedido`, `atendente`, `data_hora`) VALUES
(21, '', '', '2 Milk Shake', 'Gabriel', '2021-05-02 13:17:23'),
(20, 'Ana', '10', 'Cafe', 'ana', '2021-05-02 13:04:41'),
(18, 'Maria', '02', 'Brownie', 'caixa', '2021-05-02 12:18:19'),
(16, '', '', 'NULL', '', '2021-04-23 17:57:25'),
(13, '', '', 'Cookie', '', '2021-04-23 17:47:05'),
(17, 'José', '01', 'Chocolate Quente', 'Gabriel', '2021-05-02 12:15:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidossalvos`
--
ALTER TABLE `pedidossalvos`
  ADD PRIMARY KEY (`id_pedido_salvo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `pedidossalvos`
--
ALTER TABLE `pedidossalvos`
  MODIFY `id_pedido_salvo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
