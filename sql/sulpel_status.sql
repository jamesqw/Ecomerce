-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Nov 22, 2007 as 12:10 AM
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
-- Estrutura da tabela `sulpel_status`
-- 

CREATE TABLE `sulpel_status` (
  `codigo` int(2) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY  (`codigo`)
) TYPE=MyISAM;

-- 
-- Extraindo dados da tabela `sulpel_status`
-- 

INSERT INTO `sulpel_status` VALUES (1, 'pendente');
INSERT INTO `sulpel_status` VALUES (2, 'ok');
INSERT INTO `sulpel_status` VALUES (3, 'cancelado');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
