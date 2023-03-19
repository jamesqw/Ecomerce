-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Nov 22, 2007 as 12:12 AM
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
-- Estrutura da tabela `sulpel_vendas`
-- 

CREATE TABLE `sulpel_vendas` (
  `codigo` int(5) NOT NULL auto_increment,
  `codcli` int(4) NOT NULL,
  `data` date NOT NULL,
  `total` float(9,2) NOT NULL,
  `codstatus` int(2) NOT NULL,
  `formapg` varchar(10) NOT NULL,
  PRIMARY KEY  (`codigo`)
) TYPE=MyISAM  AUTO_INCREMENT=38 ;

-- 
-- Extraindo dados da tabela `sulpel_vendas`
-- 

INSERT INTO `sulpel_vendas` VALUES (29, 9, '2007-11-21', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (28, 9, '2007-11-21', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (27, 12, '2007-11-20', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (26, 3, '2007-11-16', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (25, 3, '2007-11-16', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (24, 3, '2007-11-16', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (23, 8, '2007-11-09', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (22, 8, '2007-11-09', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (21, 8, '2007-11-09', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (20, 8, '2007-11-09', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (19, 8, '2007-11-09', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (18, 3, '2007-11-01', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (17, 3, '2007-11-01', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (15, 3, '2007-10-25', 0.00, 3, 'Boleto');
INSERT INTO `sulpel_vendas` VALUES (16, 3, '2007-10-25', 0.00, 2, 'Cartão');
INSERT INTO `sulpel_vendas` VALUES (30, 13, '2007-11-21', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (31, 10, '2007-11-21', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (32, 26, '2007-11-21', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (33, 11, '2007-11-21', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (34, 11, '2007-11-21', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (35, 11, '2007-11-21', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (36, 11, '2007-11-21', 0.00, 0, '');
INSERT INTO `sulpel_vendas` VALUES (37, 28, '2007-11-21', 0.00, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
