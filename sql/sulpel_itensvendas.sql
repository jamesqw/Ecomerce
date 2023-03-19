-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Nov 22, 2007 as 12:08 AM
-- Versão do Servidor: 5.0.41
-- Versão do PHP: 5.0.5


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- 
-- Banco de Dados: `trab2`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sulpel_itensvendas`
-- 

CREATE TABLE `sulpel_itensvendas` (
  `codvenda` int(5) NOT NULL,
  `codlivro` int(4) NOT NULL,
  `quant` int(3) NOT NULL,
  `preco` float(9,2) NOT NULL,
  PRIMARY KEY  (`codvenda`,`codlivro`)
) TYPE=MyISAM;

-- 
-- Extraindo dados da tabela `sulpel_itensvendas`
-- 

INSERT INTO `sulpel_itensvendas` VALUES (1, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (2, 8, 1, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (2, 10, 1, 180.00);
INSERT INTO `sulpel_itensvendas` VALUES (5, 8, 1, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (6, 8, 1, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (8, 8, 1, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (9, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (10, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (11, 8, 1, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (12, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (13, 8, 1, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (14, 8, 1, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (15, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (16, 8, 1, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (17, 8, 5, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (18, 8, 4, 200.00);
INSERT INTO `sulpel_itensvendas` VALUES (24, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (25, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (26, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (28, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (29, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (31, 7, 2, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (33, 7, 1, 600.00);
INSERT INTO `sulpel_itensvendas` VALUES (36, 10, 1, 180.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
