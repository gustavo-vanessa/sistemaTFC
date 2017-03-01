-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Mar-2017 às 00:03
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cronograma_tfc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_atividade` varchar(450) NOT NULL,
  `status_atividade` varchar(450) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `data_inicio_atividade` date NOT NULL,
  `data_fim_atividade` date NOT NULL,
  `data_validacao_atividade` date DEFAULT NULL,
  `observacoes_atividade` longtext,
  PRIMARY KEY (`id_atividade`),
  KEY `id_projeto_idx` (`id_projeto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id_atividade`, `nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES
(1, 'asa', 'Selecione', 2, '2017-03-01', '2017-03-10', '0000-00-00', ''),
(2, 'asa', 'Selecione', 2, '2017-03-01', '2017-03-10', '0000-00-00', ''),
(3, 'teste', 'S', 2, '2017-12-31', '2018-01-30', '0000-00-00', ''),
(4, 'adas', 'S', 2, '2017-03-01', '2017-03-03', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades_padroes`
--

CREATE TABLE IF NOT EXISTS `atividades_padroes` (
  `id_atividades_padroes` int(11) NOT NULL AUTO_INCREMENT,
  `nome_atividades_padroes` varchar(450) NOT NULL,
  `descricao_atividades_padroes` varchar(450) NOT NULL,
  `ie_obrigatorio_atividades_padroes` tinytext NOT NULL,
  `id_pmbok_versao` int(11) NOT NULL,
  PRIMARY KEY (`id_atividades_padroes`),
  KEY `fk_pmbok_versao_idx` (`id_pmbok_versao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `atividades_padroes`
--

INSERT INTO `atividades_padroes` (`id_atividades_padroes`, `nome_atividades_padroes`, `descricao_atividades_padroes`, `ie_obrigatorio_atividades_padroes`, `id_pmbok_versao`) VALUES
(2, 'adss', 'adasad', 'S', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `data_log` datetime DEFAULT NULL,
  `valor_anterior_log` varchar(450) DEFAULT NULL,
  `valor_atual_log` varchar(450) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `campo_alteracao_log` varchar(450) DEFAULT NULL,
  `tabela_alteracao_log` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  KEY `fk_log_usuario1_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(450) DEFAULT NULL,
  `descricao_perfil` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_do_usuario`
--

CREATE TABLE IF NOT EXISTS `perfil_do_usuario` (
  `perfil_id_perfil` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`perfil_id_perfil`,`usuario_id_usuario`),
  KEY `fk_perfil_has_usuario_usuario1_idx` (`usuario_id_usuario`),
  KEY `fk_perfil_has_usuario_perfil1_idx` (`perfil_id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pmbok_versao`
--

CREATE TABLE IF NOT EXISTS `pmbok_versao` (
  `id_pmbok_versao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_pmbok_versao` varchar(450) NOT NULL,
  PRIMARY KEY (`id_pmbok_versao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pmbok_versao`
--

INSERT INTO `pmbok_versao` (`id_pmbok_versao`, `descricao_pmbok_versao`) VALUES
(1, 'versão 2017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_projeto` varchar(450) NOT NULL,
  `status_projeto` varchar(45) NOT NULL,
  `data_validacao` date DEFAULT NULL,
  `id_orientador` int(11) NOT NULL,
  `id_orientando` int(11) NOT NULL,
  `id_pmbok_versao` int(11) NOT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `fk_projeto_usuario1_idx` (`id_orientador`),
  KEY `fk_projeto_usuario2_idx` (`id_orientando`),
  KEY `fk_pmbok_versap_idx` (`id_pmbok_versao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id_projeto`, `nome_projeto`, `status_projeto`, `data_validacao`, `id_orientador`, `id_orientando`, `id_pmbok_versao`) VALUES
(2, 'teste', 'teste', '2017-02-22', 3, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_atividade`
--

CREATE TABLE IF NOT EXISTS `sub_atividade` (
  `id_sub_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sub_atividade` varchar(450) NOT NULL,
  `status_sub_atividade` varchar(450) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `data_inicio_sub_atividade` date NOT NULL,
  `data_fim_sub_atividade` date NOT NULL,
  `data_validacao_sub_atividade` date DEFAULT NULL,
  `observacoes_sub_atividade` longtext,
  PRIMARY KEY (`id_sub_atividade`),
  KEY `id_atividade_idx` (`id_atividade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_atividades_padroes`
--

CREATE TABLE IF NOT EXISTS `sub_atividades_padroes` (
  `id_sub_atividades_padroes` int(11) NOT NULL,
  `nome_sub_atividade_padroes` varchar(450) NOT NULL,
  `descricao_sub_atividades_padroes` varchar(450) NOT NULL,
  `ie_obrigatorio_sub_atividades_padroes` tinytext NOT NULL,
  `id_atividade_padroes` int(11) NOT NULL,
  PRIMARY KEY (`id_sub_atividades_padroes`),
  KEY `fk_sub_atividade_padroes_atividade_padroes1_idx` (`id_atividade_padroes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(450) NOT NULL,
  `login_usuario` varchar(450) NOT NULL,
  `senha_usuario` varchar(450) NOT NULL,
  `email_usuario` varchar(450) DEFAULT NULL,
  `tfc_usuario` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`, `tfc_usuario`) VALUES
(3, 'gustavo', 'gustavo', 'gustav', 'gustavo@gustavo.com', NULL),
(10, 'teste', 'teste', 'teste', 'teste@teste.com', NULL),
(12, 'teste', 'teste', 'teste', 'teste@teste.com', NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `id_projeto` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atividades_padroes`
--
ALTER TABLE `atividades_padroes`
  ADD CONSTRAINT `fk_pmbok_versao` FOREIGN KEY (`id_pmbok_versao`) REFERENCES `pmbok_versao` (`id_pmbok_versao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `perfil_do_usuario`
--
ALTER TABLE `perfil_do_usuario`
  ADD CONSTRAINT `fk_perfil_has_usuario_perfil1` FOREIGN KEY (`perfil_id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `fk_pmbok_versap` FOREIGN KEY (`id_pmbok_versao`) REFERENCES `pmbok_versao` (`id_pmbok_versao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`id_orientador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sub_atividade`
--
ALTER TABLE `sub_atividade`
  ADD CONSTRAINT `id_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sub_atividades_padroes`
--
ALTER TABLE `sub_atividades_padroes`
  ADD CONSTRAINT `id_atividade_padroes` FOREIGN KEY (`id_atividade_padroes`) REFERENCES `atividades_padroes` (`id_atividades_padroes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
