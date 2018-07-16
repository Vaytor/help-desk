-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jul-2018 às 23:00
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help_desk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(60) CHARACTER SET utf8 NOT NULL,
  `categoria` varchar(60) CHARACTER SET utf8 NOT NULL,
  `descricao` mediumtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id`, `user_id`, `titulo`, `categoria`, `descricao`) VALUES
(1, 1, 'não liga!', 'Hardware', 'Meu pc não está ligando!'),
(2, 1, 'Teste', 'Hardware', 'dasdad'),
(3, 1, 'Victor', 'CriaÃ§Ã£o UsuÃ¡rio', 'aÃ¡Ã¡dsÃ¡sdÂ´nÃ£Ã§'),
(4, 1, 'NÃ£o liga!', 'Hardware', 'Ã§][aÃ¡'),
(5, 1, 'NÃ£o liga!', 'Impressora', 'qweqweÂ´qÃ£Ã§'),
(6, 1, 'NÃ£o liga!', 'Software', 'Ã§]qeÂ´qÃ¡'),
(7, 1, 'NÃ£o liga!', 'Impressora', 'wqew\r\n'),
(8, 1, '', 'CriaÃ§Ã£o UsuÃ¡rio', ''),
(9, 2, 'Ação', 'Hardware', 'ação'),
(10, 1, 'NÃ£o liga!', 'Impressora', 'aÃ§Ã£p'),
(11, 1, 'NÃ£o liga!', 'CriaÃ§Ã£o UsuÃ¡rio', 'aÃ§Ã£o'),
(12, 1, 'NÃ£o liga!', 'CriaÃ§Ã£o UsuÃ¡rio', 'saaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `ativo`) VALUES
(1, 'Victor', 'victor@gmail.com', '123456', 0),
(2, 'Mária', 'maria@gmail.com', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `chamados`
--
ALTER TABLE `chamados`
  ADD CONSTRAINT `chamados_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
