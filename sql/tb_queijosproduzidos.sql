-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 15-Jul-2021 às 02:22
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_producaodequeijo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_queijosproduzidos`
--

CREATE TABLE IF NOT EXISTS `tb_queijosproduzidos` (
  `que_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `que_usu_codigo` int(11) DEFAULT NULL,
  `que_produto` varchar(50) NOT NULL,
  `que_dataproducao` date NOT NULL,
  `que_custo` float NOT NULL,
  `que_datafabricacao` date NOT NULL,
  `que_valorvenda` decimal(8,2) NOT NULL,
  `que_quantidade` int(11) NOT NULL,
  PRIMARY KEY (`que_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `tb_queijosproduzidos`
--

INSERT INTO `tb_queijosproduzidos` (`que_codigo`, `que_usu_codigo`, `que_produto`, `que_dataproducao`, `que_custo`, `que_datafabricacao`, `que_valorvenda`, `que_quantidade`) VALUES
(1, 1, 'Queijo de Coalho', '0000-00-00', 10, '2020-02-03', '15.00', 0),
(2, 1, 'manteiga', '0000-00-00', 10, '2020-06-01', '25.00', 0),
(3, 1, 'Leite de Vaca', '0000-00-00', 0, '2021-07-14', '2.00', 0),
(5, 1, 'Queijo de Manteiga', '0000-00-00', 0, '2021-06-27', '21.50', 0),
(6, 1, 'RequeijÃ£o em barra', '0000-00-00', 0, '2021-06-02', '15.00', 0),
(7, 1, 'Queijo ParmesÃ£o', '0000-00-00', 0, '2021-07-13', '20.40', 0),
(8, 1, 'Leite de Cabra', '0000-00-00', 0, '2021-07-14', '3.60', 0),
(9, 1, 'Queijo Canastra', '0000-00-00', 0, '2021-07-14', '22.00', 2),
(10, 1, 'Queijo Canastra', '0000-00-00', 0, '2021-07-13', '22.00', 0),
(11, 1, 'Leite de Cabra	', '0000-00-00', 0, '2021-07-12', '3.60', 0),
(12, 1, 'Queijo Ralado', '0000-00-00', 0, '2021-07-12', '1.20', 15),
(13, 1, 'Queijo Ralado', '0000-00-00', 0, '2021-07-14', '1.20', 0),
(14, 1, 'Manteiga sem sal', '0000-00-00', 0, '2021-07-13', '9.50', -19),
(15, 1, 'Manteiga sem sal', '0000-00-00', 0, '2021-07-06', '9.50', 0),
(16, 1, 'Queijo de Coalho	', '0000-00-00', 0, '2021-07-14', '15.00', 11),
(17, 1, 'RequeijÃ£o em barra	', '0000-00-00', 0, '2021-07-14', '15.00', 6),
(18, 1, 'Queijo de Manteiga	', '0000-00-00', 0, '2021-07-14', '21.50', 18),
(19, 1, 'queijo de manteiga', '0000-00-00', 0, '2021-07-14', '15.00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
