-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Nov 22, 2007 as 12:11 AM
-- Versão do Servidor: 5.0.41
-- Versão do PHP: 5.0.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- 
-- Banco de Dados: `trab2`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sulpel_usuarios`
-- 

CREATE TABLE `sulpel_usuarios` (
  `nome` varchar(20) collate latin1_general_ci NOT NULL,
  `senha` varchar(40) collate latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Extraindo dados da tabela `sulpel_usuarios`
-- 

INSERT INTO `sulpel_usuarios` VALUES ('andregds85', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
