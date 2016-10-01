-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 26-Set-2016 às 00:16
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
-- Estrutura da tabela `Aluno`
--

CREATE TABLE IF NOT EXISTS `Aluno` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAluno` varchar(45) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `idTurmaAluno` int(11) NOT NULL,
  PRIMARY KEY (`idAluno`),
  KEY `idTurmaAluno` (`idTurmaAluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `Aluno`
--

INSERT INTO `Aluno` (`idAluno`, `nomeAluno`, `matricula`, `frequencia`, `idTurmaAluno`) VALUES
(1, 'Edgard Alexandre Ribeiro', '201418110086', 35, 1),
(3, 'Pedro de Deus Barbosa', '201418110138', 53, 1),
(4, 'Vitor Carvalho de Melo', '201418110079', 73, 1),
(13, 'Teste', '23426242423442', 76, 2),
(14, 'Willian Alves de Almeida', '201418110169', 80, 1),
(15, 'Guilherme', '1237513752', NULL, 6),
(17, 'Nicholas', '21541557451', NULL, 8),
(18, 'Ivys', '785387284124', NULL, 8),
(19, 'Não Faz Nada ', '2414234243422', NULL, 2),
(21, 'Não Faz Nada 2', '234262424234', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Anotacao`
--

CREATE TABLE IF NOT EXISTS `Anotacao` (
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
-- Estrutura da tabela `Atividade`
--

CREATE TABLE IF NOT EXISTS `Atividade` (
  `idAtividade` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAtividade` varchar(45) NOT NULL,
  `valorAtividade` float NOT NULL,
  `bimestreAtividade` varchar(45) NOT NULL,
  `tipoAtividade` varchar(45) NOT NULL,
  `idTurmaAtividade` int(11) NOT NULL,
  PRIMARY KEY (`idAtividade`),
  KEY `idTurmaAtividade` (`idTurmaAtividade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `Atividade`
--

INSERT INTO `Atividade` (`idAtividade`, `nomeAtividade`, `valorAtividade`, `bimestreAtividade`, `tipoAtividade`, `idTurmaAtividade`) VALUES
(1, 'Prova LP2', 10, '1º Bimestre', 'Prova', 1),
(2, 'Prova de Física', 8, '3º Bimestre', 'Prova', 1),
(3, 'Prova de LP1', 12, '2º Bimestre', 'Prova', 6),
(4, 'Trabalho de Português', 6, '1º Bimestre', 'Trabalho', 8),
(5, 'Dever de História', 3.5, '2º Bimestre', 'Dever', 1),
(6, 'Prova de Matemática', 7, '2º Bimestre', 'Prova', 1),
(7, 'Trabalho de Geografia', 8.5, '3º Bimestre', 'Trabalho', 6),
(8, 'Prova de Física', 8, '1º Bimestre', 'Prova', 8),
(9, 'Redação', 6, '3º Bimestre', 'Redação', 8),
(10, 'Apresentação de Literatura', 8, '1º Bimestre', 'Apresentação', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Nota`
--

CREATE TABLE IF NOT EXISTS `Nota` (
  `idNota` int(11) NOT NULL AUTO_INCREMENT,
  `idAtividade` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `valorNota` float NOT NULL,
  PRIMARY KEY (`idNota`),
  KEY `idAtividade` (`idAtividade`,`idAluno`),
  KEY `idAluno` (`idAluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `Nota`
--

INSERT INTO `Nota` (`idNota`, `idAtividade`, `idAluno`, `valorNota`) VALUES
(1, 1, 1, 10),
(2, 1, 3, 7),
(4, 1, 4, 10),
(5, 5, 1, 1),
(6, 5, 3, 3.4),
(7, 5, 4, 3.5),
(8, 6, 1, 5),
(9, 10, 1, 6),
(10, 2, 1, 8),
(11, 10, 3, 2),
(12, 6, 3, 4.2),
(13, 2, 3, 2),
(14, 10, 4, 7.5),
(15, 6, 4, 6.8),
(16, 2, 4, 6),
(17, 1, 14, 9),
(18, 10, 14, 7.2),
(19, 5, 14, 3.5),
(20, 6, 14, 5),
(21, 2, 14, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Login`
--

CREATE TABLE IF NOT EXISTS `Login` (
  `idSenha` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(56) NOT NULL,
  PRIMARY KEY (`idSenha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `Login`
--

INSERT INTO `Login` (`idSenha`, `senha`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Turma`
--

CREATE TABLE IF NOT EXISTS `Turma` (
  `idTurma` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTurma` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTurma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `Turma`
--

INSERT INTO `Turma` (`idTurma`, `nomeTurma`) VALUES
(1, '3° Informática'),
(2, '2° Edificações'),
(6, '1º Informática'),
(8, '2º Mecatrônica'),
(13, '3º Mecatrônica'),
(14, '1º Edificações');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Aluno`
--
ALTER TABLE `Aluno`
  ADD CONSTRAINT `Aluno_ibfk_1` FOREIGN KEY (`idTurmaAluno`) REFERENCES `Turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Anotacao`
--
ALTER TABLE `Anotacao`
  ADD CONSTRAINT `Anotacao_ibfk_1` FOREIGN KEY (`idTurmaAnotacao`) REFERENCES `Turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Atividade`
--
ALTER TABLE `Atividade`
  ADD CONSTRAINT `Atividade_ibfk_1` FOREIGN KEY (`idTurmaAtividade`) REFERENCES `Turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Nota`
--
ALTER TABLE `Nota`
  ADD CONSTRAINT `Nota_ibfk_1` FOREIGN KEY (`idAtividade`) REFERENCES `Atividade` (`idAtividade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Nota_ibfk_2` FOREIGN KEY (`idAluno`) REFERENCES `Aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
