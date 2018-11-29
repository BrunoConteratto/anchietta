-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Nov-2018 às 20:39
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anchietta`
--
CREATE DATABASE IF NOT EXISTS `anchietta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `anchietta`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `fk_matricula` int(10) UNSIGNED NOT NULL,
  `fk_serie` int(10) UNSIGNED NOT NULL,
  `fk_turma` int(10) NOT NULL,
  `responsavel` varchar(45) NOT NULL,
  `turno` varchar(2) NOT NULL,
  PRIMARY KEY (`fk_matricula`),
  KEY `fk_serie_escolar_idx` (`fk_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`fk_matricula`, `fk_serie`, `fk_turma`, `responsavel`, `turno`) VALUES
(1, 1, 1, 'Milton Conteratto', 'M'),
(3, 1, 1, 'Paulo Tomcat', 'M'),
(4, 1, 1, 'Marcio Moas', 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_turma`
--

DROP TABLE IF EXISTS `aluno_turma`;
CREATE TABLE IF NOT EXISTS `aluno_turma` (
  `fk_aluno` int(10) UNSIGNED NOT NULL,
  `fk_turma` int(10) UNSIGNED NOT NULL,
  `fk_ano_turma` int(4) NOT NULL,
  `media_final` int(11) DEFAULT NULL,
  `situacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fk_aluno`,`fk_turma`),
  KEY `fk_turma_idx` (`fk_turma`),
  KEY `fk_aluno_turma_ano` (`fk_ano_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_turma`
--

INSERT INTO `aluno_turma` (`fk_aluno`, `fk_turma`, `fk_ano_turma`, `media_final`, `situacao`) VALUES
(1, 1, 2018, 55, 'APROVADO'),
(1, 2, 2017, NULL, NULL),
(3, 1, 2018, NULL, NULL),
(4, 2, 2018, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletim`
--

DROP TABLE IF EXISTS `boletim`;
CREATE TABLE IF NOT EXISTS `boletim` (
  `fk_aluno` int(10) UNSIGNED NOT NULL,
  `fk_turma` int(10) UNSIGNED NOT NULL,
  `fk_disciplina` int(10) UNSIGNED NOT NULL,
  `fk_professor` int(10) UNSIGNED NOT NULL,
  `ano` int(4) NOT NULL,
  `nota1` int(11) NOT NULL,
  `nota2` int(11) NOT NULL,
  `nota3` int(11) NOT NULL,
  `nota4` int(11) NOT NULL,
  `nota_parcial` int(11) NOT NULL,
  `nota_recuperacao` int(11) DEFAULT NULL,
  `nota_final` int(11) NOT NULL,
  `situacao` varchar(45) NOT NULL,
  PRIMARY KEY (`fk_aluno`,`fk_turma`,`fk_disciplina`),
  KEY `fk_turma_idx` (`fk_turma`),
  KEY `fk_disciplina_idx` (`fk_disciplina`),
  KEY `fk_professor_idx` (`fk_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `boletim`
--

INSERT INTO `boletim` (`fk_aluno`, `fk_turma`, `fk_disciplina`, `fk_professor`, `ano`, `nota1`, `nota2`, `nota3`, `nota4`, `nota_parcial`, `nota_recuperacao`, `nota_final`, `situacao`) VALUES
(1, 1, 1, 2, 2018, 50, 55, 27, 40, 55, 0, 55, 'APROVADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `cod_disciplina` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`cod_disciplina`, `nome`, `descricao`) VALUES
(1, 'Matemaica', NULL),
(2, 'Português', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `falta`
--

DROP TABLE IF EXISTS `falta`;
CREATE TABLE IF NOT EXISTS `falta` (
  `idFalta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_aluno` int(10) UNSIGNED NOT NULL,
  `fk_professor` int(10) UNSIGNED NOT NULL,
  `fk_turma` int(10) UNSIGNED NOT NULL,
  `fk_disciplina` int(10) UNSIGNED NOT NULL,
  `hora` int(11) NOT NULL,
  PRIMARY KEY (`idFalta`),
  KEY `fk_aluno_idx` (`fk_aluno`),
  KEY `fk_professor_idx` (`fk_professor`),
  KEY `fk_turma_idx` (`fk_turma`),
  KEY `fk_disciplina_idx` (`fk_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ano` int(11) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id`, `nome`, `ano`, `tipo`) VALUES
(1, 'Festival de dança', 2018, 1),
(2, 'Desfile civico', 2018, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria_midia`
--

DROP TABLE IF EXISTS `galeria_midia`;
CREATE TABLE IF NOT EXISTS `galeria_midia` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_galeria` int(11) UNSIGNED NOT NULL,
  `source` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_galeria` (`fk_galeria`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria_midia`
--

INSERT INTO `galeria_midia` (`id`, `fk_galeria`, `source`, `descricao`) VALUES
(1, 1, 'assets/images/150x150.png', 'SEM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `matricula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `telefone_fixo` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) NOT NULL,
  `data_entrada` date NOT NULL,
  `access_level` int(2) NOT NULL DEFAULT '0',
  `ativo` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`matricula`, `email`, `password`, `nome`, `data_nascimento`, `sexo`, `telefone`, `telefone_fixo`, `endereco`, `data_entrada`, `access_level`, `ativo`) VALUES
(1, 'brunoconteratto@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Bruno Conteratto', '1994-12-28', 'M', '999447124', NULL, 'Chiapetta RS', '2018-11-15', 0, 1),
(2, 'pedro@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Pedro Alcat', '1922-05-05', 'M', '999323923', NULL, 'Chiapetta RS', '2018-11-15', 1, 1),
(3, 'joao@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Joao Tomaz', '1999-02-09', 'M', '999123912', NULL, 'Chiapetta RS', '2018-11-16', 0, 1),
(4, 'leticia@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Leticia Pires', '1994-01-02', 'M', '992312393', NULL, 'Chiapetta RS', '2018-11-16', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `fk_matricula` int(10) UNSIGNED NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  PRIMARY KEY (`fk_matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`fk_matricula`, `carga_horaria`) VALUES
(2, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_disciplina`
--

DROP TABLE IF EXISTS `professor_disciplina`;
CREATE TABLE IF NOT EXISTS `professor_disciplina` (
  `fk_disciplina` int(10) UNSIGNED NOT NULL,
  `fk_professor` int(10) UNSIGNED NOT NULL,
  `aulas_semanais` int(11) NOT NULL,
  KEY `fk_disciplina_idx` (`fk_disciplina`),
  KEY `fk_professor_idx` (`fk_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor_disciplina`
--

INSERT INTO `professor_disciplina` (`fk_disciplina`, `fk_professor`, `aulas_semanais`) VALUES
(1, 2, 6),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova`
--

DROP TABLE IF EXISTS `prova`;
CREATE TABLE IF NOT EXISTS `prova` (
  `idProva` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_aluno` int(10) UNSIGNED NOT NULL,
  `fk_turma` int(10) UNSIGNED NOT NULL,
  `fk_professor` int(10) UNSIGNED NOT NULL,
  `fk_disciplina` int(10) UNSIGNED NOT NULL,
  `prova` int(11) NOT NULL,
  `bimestre` int(11) NOT NULL,
  `nota_maxima` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `ano` int(4) NOT NULL,
  PRIMARY KEY (`idProva`),
  KEY `fk_aluno_idx` (`fk_aluno`),
  KEY `fk_professor_idx` (`fk_professor`),
  KEY `fk_turma_idx` (`fk_turma`),
  KEY `fk_disciplina_idx` (`fk_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prova`
--

INSERT INTO `prova` (`idProva`, `fk_aluno`, `fk_turma`, `fk_professor`, `fk_disciplina`, `prova`, `bimestre`, `nota_maxima`, `nota`, `descricao`, `ano`) VALUES
(1, 1, 1, 2, 1, 1, 1, 20, 20, 'BOA NOTA', 2018),
(7, 3, 1, 2, 1, 1, 1, 20, 15, '', 2018);

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie_escolar`
--

DROP TABLE IF EXISTS `serie_escolar`;
CREATE TABLE IF NOT EXISTS `serie_escolar` (
  `cod_serie_escolar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `serie_escolar` varchar(45) NOT NULL,
  `fk_proxima_serie` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`cod_serie_escolar`),
  KEY `fk_proxima_serie_idx` (`fk_proxima_serie`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `serie_escolar`
--

INSERT INTO `serie_escolar` (`cod_serie_escolar`, `serie_escolar`, `fk_proxima_serie`) VALUES
(1, '1º Série', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `cod_turma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ano` int(4) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `fk_serie_escolar` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`cod_turma`),
  KEY `fk_serie_escolar_idx` (`fk_serie_escolar`),
  KEY `ano` (`ano`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cod_turma`, `ano`, `nome`, `fk_serie_escolar`) VALUES
(1, 2018, 'Turma 21', 1),
(2, 2017, 'Turma 13', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_disciplina`
--

DROP TABLE IF EXISTS `turma_disciplina`;
CREATE TABLE IF NOT EXISTS `turma_disciplina` (
  `fk_turma` int(10) UNSIGNED NOT NULL,
  `turno` varchar(45) NOT NULL,
  `hora` int(11) NOT NULL DEFAULT '1',
  `dia_semana` varchar(45) NOT NULL,
  `fk_disciplina` int(10) UNSIGNED NOT NULL,
  `fk_professor` int(10) UNSIGNED NOT NULL,
  `fk_ano_turma` int(4) NOT NULL,
  `sala` varchar(45) NOT NULL,
  PRIMARY KEY (`fk_turma`,`turno`,`hora`,`dia_semana`),
  KEY `fk_disciplina_idx` (`fk_disciplina`),
  KEY `fk_professor_idx` (`fk_professor`),
  KEY `fk_disciplina_turma_ano` (`fk_ano_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma_disciplina`
--

INSERT INTO `turma_disciplina` (`fk_turma`, `turno`, `hora`, `dia_semana`, `fk_disciplina`, `fk_professor`, `fk_ano_turma`, `sala`) VALUES
(1, 'M', 1, 'SEGUNDA', 1, 2, 2018, '201'),
(1, 'T', 1, 'TERÇA', 2, 2, 2018, '203'),
(2, 'M', 1, 'QUARTA', 1, 2, 2018, '105');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_matricula` FOREIGN KEY (`fk_matricula`) REFERENCES `pessoa` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_serie_escolar` FOREIGN KEY (`fk_serie`) REFERENCES `serie_escolar` (`cod_serie_escolar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `fk_aluno_turma` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_turma_ano` FOREIGN KEY (`fk_ano_turma`) REFERENCES `turma` (`ano`),
  ADD CONSTRAINT `fk_turma_aluno` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`fk_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `boletim`
--
ALTER TABLE `boletim`
  ADD CONSTRAINT `fk_boletim_aluno` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`fk_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_boletim_disciplina` FOREIGN KEY (`fk_disciplina`) REFERENCES `disciplina` (`cod_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_boletim_professor` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`fk_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_boletim_turma` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `falta`
--
ALTER TABLE `falta`
  ADD CONSTRAINT `fk_falta_aluno` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`fk_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_falta_disciplina` FOREIGN KEY (`fk_disciplina`) REFERENCES `disciplina` (`cod_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_falta_professor` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`fk_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_falta_turma` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `galeria_midia`
--
ALTER TABLE `galeria_midia`
  ADD CONSTRAINT `fk_galeria` FOREIGN KEY (`fk_galeria`) REFERENCES `galeria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_matricula` FOREIGN KEY (`fk_matricula`) REFERENCES `pessoa` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD CONSTRAINT `fk_disciplina` FOREIGN KEY (`fk_disciplina`) REFERENCES `disciplina` (`cod_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`fk_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prova`
--
ALTER TABLE `prova`
  ADD CONSTRAINT `fk_prova_aluno` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`fk_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prova_disciplina` FOREIGN KEY (`fk_disciplina`) REFERENCES `disciplina` (`cod_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prova_professor` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`fk_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prova_turma` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `serie_escolar`
--
ALTER TABLE `serie_escolar`
  ADD CONSTRAINT `fk_proxima_serie` FOREIGN KEY (`fk_proxima_serie`) REFERENCES `serie_escolar` (`cod_serie_escolar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_serie_escolar` FOREIGN KEY (`fk_serie_escolar`) REFERENCES `serie_escolar` (`cod_serie_escolar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD CONSTRAINT `fk_disciplina_turma` FOREIGN KEY (`fk_disciplina`) REFERENCES `disciplina` (`cod_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disciplina_turma_ano` FOREIGN KEY (`fk_ano_turma`) REFERENCES `turma` (`ano`),
  ADD CONSTRAINT `fk_turma_disciplina` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_professor` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`fk_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
