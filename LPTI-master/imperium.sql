-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 30-Ago-2016 às 17:50
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `imperium`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aluno`
--

CREATE TABLE IF NOT EXISTS `Aluno` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAluno` varchar(45) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `frequencia` varchar(45) NOT NULL,
  `idTurmaAluno` int(11) NOT NULL,
  PRIMARY KEY (`idAluno`),
  KEY `idTurmaAluno` (`idTurmaAluno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Turma`
--

CREATE TABLE IF NOT EXISTS `Turma` (
  `idTurma` int(11) NOT NULL,
  `nomeTurma` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTurma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD CONSTRAINT `Nota_ibfk_2` FOREIGN KEY (`idAluno`) REFERENCES `Aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Nota_ibfk_1` FOREIGN KEY (`idAtividade`) REFERENCES `Atividade` (`idAtividade`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
