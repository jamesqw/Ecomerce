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
-- Estrutura da tabela `sulpel_clientes`
-- 

CREATE TABLE `sulpel_clientes` (
  `codigo` int(4) NOT NULL auto_increment,
  `nome` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(12) NOT NULL,
  PRIMARY KEY  (`codigo`)
) TYPE=MyISAM  AUTO_INCREMENT=12 ;

-- 
-- Extraindo dados da tabela `sulpel_clientes`
-- 

INSERT INTO `sulpel_clientes` VALUES (3, 'andre gomes da silva', 'andregds85@gmail.com', '123456');
INSERT INTO `sulpel_clientes` VALUES (8, 'RODRIGO', 'rcasalinho@gmail.com', '123');
INSERT INTO `sulpel_clientes` VALUES (5, 'André 2', 'andregds85@yahoo.com', '123456');
INSERT INTO `sulpel_clientes` VALUES (6, 'Ciclano ', 'cliclano@bol.conm.br', '123456');
INSERT INTO `sulpel_clientes` VALUES (9, 'Rodrigo', 'rcasalinho@hotmail.com', '123');
INSERT INTO `sulpel_clientes` VALUES (10, 'fulano', 'fulano@globo.com', '123');
INSERT INTO `sulpel_clientes` VALUES (11, 'nik', 'nikflip360@hotmail.com', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
