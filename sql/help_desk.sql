-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `help_desk`;

DROP TABLE IF EXISTS `chamados`;
CREATE TABLE `chamados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(60) CHARACTER SET utf8 NOT NULL,
  `categoria` varchar(60) CHARACTER SET utf8 NOT NULL,
  `descricao` mediumtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `chamados_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `chamados` (`id`, `user_id`, `titulo`, `categoria`, `descricao`) VALUES
(20,	1,	'NÃ£o liga!',	'Hardware',	'NÃ£o funciona mais, apÃ³s troca do dia 04/07'),
(21,	2,	'NÃ£o liga!',	'Impressora',	'Estou com um grande problema nas impressoras!'),
(23,	1,	'Teste2',	'Software',	'NÃ£o funciona')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `titulo` = VALUES(`titulo`), `categoria` = VALUES(`categoria`), `descricao` = VALUES(`descricao`);

DROP TABLE IF EXISTS `chamados_finalizados`;
CREATE TABLE `chamados_finalizados` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `chamados_finalizados` (`id`, `user_id`, `titulo`, `categoria`, `descricao`) VALUES
(24,	2,	'Teste2',	'Impressora',	'Tentando pela perdi as contas'),
(24,	2,	'',	'CriaÃ§Ã£o UsuÃ¡rio',	'cja,adpaflaksjga3ggadsgaz')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `titulo` = VALUES(`titulo`), `categoria` = VALUES(`categoria`), `descricao` = VALUES(`descricao`);

DROP TABLE IF EXISTS `conversa`;
CREATE TABLE `conversa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chamado_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chamado_id` (`chamado_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `conversa_ibfk_1` FOREIGN KEY (`chamado_id`) REFERENCES `chamados` (`id`),
  CONSTRAINT `conversa_ibfk_2` FOREIGN KEY (`chamado_id`) REFERENCES `chamados` (`id`),
  CONSTRAINT `conversa_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `conversa` (`id`, `chamado_id`, `user_id`, `msg`) VALUES
(24,	21,	2,	'Bo jogar lol'),
(25,	21,	1,	'NÃ£o'),
(26,	21,	2,	'po bicho, Ã© cache'),
(27,	21,	1,	'Ã© nÃ£o'),
(28,	21,	2,	'Depois da instalaÃ§Ã£o da 9.2 meu scriptcase parou de funcionar\r\n'),
(29,	21,	1,	'FODA-SE'),
(30,	21,	2,	'Pow'),
(31,	21,	2,	'*')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `chamado_id` = VALUES(`chamado_id`), `user_id` = VALUES(`user_id`), `msg` = VALUES(`msg`);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  `perfil` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qtd_chamados` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `ativo`, `perfil`, `qtd_chamados`) VALUES
(1,	'Victor',	'victor@gmail.com',	'123456',	1,	'admin',	0),
(2,	'Mária',	'maria@gmail.com',	'1234',	1,	'user',	6),
(3,	'Teste testando',	'teste@teste.com.br',	'1234',	0,	'user',	0)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `nome` = VALUES(`nome`), `email` = VALUES(`email`), `senha` = VALUES(`senha`), `ativo` = VALUES(`ativo`), `perfil` = VALUES(`perfil`), `qtd_chamados` = VALUES(`qtd_chamados`);

-- 2018-07-27 18:57:28