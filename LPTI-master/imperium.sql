-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 25-Set-2016 às 03:06
-- Versão do servidor: 5.5.28
-- versão do PHP: 5.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `imperium`
--
CREATE DATABASE IF NOT EXISTS `imperium` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `imperium`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAluno` varchar(45) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `idTurmaAluno` int(11) NOT NULL,
  PRIMARY KEY (`idAluno`),
  KEY `idTurmaAluno` (`idTurmaAluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `nomeAluno`, `matricula`, `frequencia`, `idTurmaAluno`) VALUES
(1, 'Edgard Alexandre Ribeiro', '151615111098148181', 45, 1),
(3, 'Pedro', '9831742365322957', 53, 1),
(4, 'Vitor', '3242342252384834', 17, 1),
(13, 'Teste', '23426242423442', 76, 2),
(14, 'Willian', '23423523232', 34, 1),
(15, 'Guilherme', '1237513752', NULL, 6),
(17, 'Nicholas', '21541557451', NULL, 8),
(18, 'Ivys', '785387284124', NULL, 8),
(19, 'Não Faz Nada ', '2414234243422', NULL, 2),
(20, 'Não Faz Nada 2', '2353525232355', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anotacao`
--

CREATE TABLE IF NOT EXISTS `anotacao` (
  `idAnotacao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAnotacao` varchar(45) NOT NULL,
  `conteudoAnotacao` longtext NOT NULL,
  `tipoAnotacao` varchar(45) NOT NULL,
  `idTurmaAnotacao` int(11) NOT NULL,
  PRIMARY KEY (`idAnotacao`),
  KEY `idTurma` (`idTurmaAnotacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `idAtividade` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAtividade` varchar(45) NOT NULL,
  `valorAtividade` float NOT NULL,
  `bimestreAtividade` varchar(45) NOT NULL,
  `tipoAtividade` varchar(45) NOT NULL,
  `idTurmaAtividade` int(11) NOT NULL,
  PRIMARY KEY (`idAtividade`),
  KEY `idTurmaAtividade` (`idTurmaAtividade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`idAtividade`, `nomeAtividade`, `valorAtividade`, `bimestreAtividade`, `tipoAtividade`, `idTurmaAtividade`) VALUES
(1, 'Prova LP2', 10, '1º Bimestre', 'Prova', 1),
(2, 'Prova de Física', 8, '3º Bimestre', 'Prova', 1),
(3, 'Prova de LP1', 12, '2º Bimestre', 'Prova', 6),
(4, 'Trabalho de Português', 6, '1º Bimestre', 'Trabalho', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `idNota` int(11) NOT NULL AUTO_INCREMENT,
  `idAtividade` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `valorNota` float NOT NULL,
  PRIMARY KEY (`idNota`),
  KEY `idAtividade` (`idAtividade`,`idAluno`),
  KEY `idAluno` (`idAluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`idNota`, `idAtividade`, `idAluno`, `valorNota`) VALUES
(1, 1, 1, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `senha`
--

CREATE TABLE IF NOT EXISTS `senha` (
  `idSenha` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(56) NOT NULL,
  PRIMARY KEY (`idSenha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `senha`
--

INSERT INTO `senha` (`idSenha`, `senha`) VALUES
(1, 'admina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `idTurma` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTurma` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTurma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`idTurma`, `nomeTurma`) VALUES
(1, '3° Informática'),
(2, '2° Edificações'),
(6, '1º Informática'),
(8, '2º Mecatrônica');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `Aluno_ibfk_1` FOREIGN KEY (`idTurmaAluno`) REFERENCES `turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `anotacao`
--
ALTER TABLE `anotacao`
  ADD CONSTRAINT `Anotacao_ibfk_1` FOREIGN KEY (`idTurmaAnotacao`) REFERENCES `turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `Atividade_ibfk_1` FOREIGN KEY (`idTurmaAtividade`) REFERENCES `turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `Nota_ibfk_2` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Nota_ibfk_1` FOREIGN KEY (`idAtividade`) REFERENCES `atividade` (`idAtividade`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
