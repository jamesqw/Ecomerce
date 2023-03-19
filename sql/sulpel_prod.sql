-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Nov 22, 2007 as 12:09 AM
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
-- Estrutura da tabela `sulpel_prod`
-- 

CREATE TABLE `sulpel_prod` (
  `codigo` int(4) NOT NULL auto_increment,
  `titulo` varchar(40) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `preco` float(9,2) NOT NULL,
  `novidade` char(1) NOT NULL,
  PRIMARY KEY  (`codigo`)
) TYPE=MyISAM  AUTO_INCREMENT=13 ;

-- 
-- Extraindo dados da tabela `sulpel_prod`
-- 

INSERT INTO `sulpel_prod` VALUES (7, 'Monitor 17 LCD', 'sansung', 600.00, 'X');
INSERT INTO `sulpel_prod` VALUES (8, 'IMPRESSORA CANON ', 'IP1300', 200.00, 'X');
INSERT INTO `sulpel_prod` VALUES (9, 'MEMÓRIA DDR2 512 MB 667', 'PC5300', 100.00, '');
INSERT INTO `sulpel_prod` VALUES (10, 'MEMÓRIA DDR2 1 GB 667', 'PC5300', 180.00, 'X');
INSERT INTO `sulpel_prod` VALUES (11, 'Estabilizador 1000va', 'ENERMAX  PRETO', 170.00, '');
INSERT INTO `sulpel_prod` VALUES (12, 'phyton', 'informatica', 500.00, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
