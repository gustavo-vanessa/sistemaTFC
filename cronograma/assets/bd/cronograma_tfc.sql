-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: cronograma_tfc
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_atividade` varchar(450) NOT NULL,
  `status_atividade` varchar(450) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `data_inicio_atividade` date NOT NULL,
  `data_fim_atividade` date NOT NULL,
  `data_validacao_atividade` date DEFAULT NULL,
  `observacoes_atividade` longtext,
  PRIMARY KEY (`id_atividade`),
  KEY `id_projeto_idx` (`id_projeto`),
  CONSTRAINT `id_projeto` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (39,'Atividade principal','NE',9,'2017-01-01','2017-01-02','2017-03-27',''),(40,'Atividade principal Gustavo','NE',10,'2017-03-27','2017-03-31',NULL,'');
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividades_padroes`
--

DROP TABLE IF EXISTS `atividades_padroes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades_padroes` (
  `id_atividades_padroes` int(11) NOT NULL AUTO_INCREMENT,
  `nome_atividades_padroes` varchar(450) NOT NULL,
  `descricao_atividades_padroes` varchar(450) NOT NULL,
  `ie_obrigatorio_atividades_padroes` tinytext NOT NULL,
  `id_pmbok_versao` int(11) NOT NULL,
  PRIMARY KEY (`id_atividades_padroes`),
  KEY `fk_pmbok_versao_idx` (`id_pmbok_versao`),
  CONSTRAINT `fk_pmbok_versao` FOREIGN KEY (`id_pmbok_versao`) REFERENCES `pmbok_versao` (`id_pmbok_versao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades_padroes`
--

LOCK TABLES `atividades_padroes` WRITE;
/*!40000 ALTER TABLE `atividades_padroes` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividades_padroes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `data_log` datetime DEFAULT NULL,
  `valor_anterior_log` varchar(450) DEFAULT NULL,
  `valor_atual_log` varchar(450) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `comando_realizado_log` varchar(450) DEFAULT NULL,
  `tabela_alteracao_log` varchar(450) DEFAULT NULL,
  `erro_log` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  KEY `fk_log_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_log_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(450) DEFAULT NULL,
  `descricao_perfil` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Orientador','Acesso Total ao projetos que esta orientando'),(2,'Orientando','Acesso restrito aos seus projetos'),(3,'Coordenador','Acesso total ao sistema');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_do_usuario`
--

DROP TABLE IF EXISTS `perfil_do_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_do_usuario` (
  `perfil_id_perfil` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`perfil_id_perfil`,`usuario_id_usuario`),
  KEY `fk_perfil_has_usuario_usuario1_idx` (`usuario_id_usuario`),
  KEY `fk_perfil_has_usuario_perfil1_idx` (`perfil_id_perfil`),
  CONSTRAINT `fk_perfil_has_usuario_perfil1` FOREIGN KEY (`perfil_id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_do_usuario`
--

LOCK TABLES `perfil_do_usuario` WRITE;
/*!40000 ALTER TABLE `perfil_do_usuario` DISABLE KEYS */;
INSERT INTO `perfil_do_usuario` VALUES (1,41),(3,41),(1,42),(2,43),(2,44);
/*!40000 ALTER TABLE `perfil_do_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pmbok_versao`
--

DROP TABLE IF EXISTS `pmbok_versao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pmbok_versao` (
  `id_pmbok_versao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_pmbok_versao` varchar(450) NOT NULL,
  PRIMARY KEY (`id_pmbok_versao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pmbok_versao`
--

LOCK TABLES `pmbok_versao` WRITE;
/*!40000 ALTER TABLE `pmbok_versao` DISABLE KEYS */;
INSERT INTO `pmbok_versao` VALUES (1,'versao 2017');
/*!40000 ALTER TABLE `pmbok_versao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projeto`
--

DROP TABLE IF EXISTS `projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projeto` (
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
  KEY `fk_pmbok_versap_idx` (`id_pmbok_versao`),
  CONSTRAINT `fk_pmbok_versap` FOREIGN KEY (`id_pmbok_versao`) REFERENCES `pmbok_versao` (`id_pmbok_versao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`id_orientador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto`
--

LOCK TABLES `projeto` WRITE;
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
INSERT INTO `projeto` VALUES (9,'cronograna','A',NULL,42,43,1),(10,'teste projeto Gustavo','A',NULL,42,44,1);
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_atividade`
--

DROP TABLE IF EXISTS `sub_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_atividade` (
  `id_sub_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sub_atividade` varchar(450) NOT NULL,
  `status_sub_atividade` varchar(450) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `data_inicio_sub_atividade` date NOT NULL,
  `data_fim_sub_atividade` date NOT NULL,
  `data_validacao_sub_atividade` date DEFAULT NULL,
  `observacoes_sub_atividade` longtext,
  PRIMARY KEY (`id_sub_atividade`),
  KEY `id_atividade_idx` (`id_atividade`),
  CONSTRAINT `id_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_atividade`
--

LOCK TABLES `sub_atividade` WRITE;
/*!40000 ALTER TABLE `sub_atividade` DISABLE KEYS */;
INSERT INTO `sub_atividade` VALUES (9,'teste','NE',39,'2017-12-31','2017-12-31','2017-03-27','');
/*!40000 ALTER TABLE `sub_atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_atividades_padroes`
--

DROP TABLE IF EXISTS `sub_atividades_padroes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_atividades_padroes` (
  `id_sub_atividades_padroes` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sub_atividade_padroes` varchar(450) NOT NULL,
  `descricao_sub_atividades_padroes` varchar(450) NOT NULL,
  `ie_obrigatorio_sub_atividades_padroes` tinytext NOT NULL,
  `id_atividade_padroes` int(11) NOT NULL,
  PRIMARY KEY (`id_sub_atividades_padroes`),
  KEY `fk_sub_atividade_padroes_atividade_padroes1_idx` (`id_atividade_padroes`),
  CONSTRAINT `id_atividade_padroes` FOREIGN KEY (`id_atividade_padroes`) REFERENCES `atividades_padroes` (`id_atividades_padroes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_atividades_padroes`
--

LOCK TABLES `sub_atividades_padroes` WRITE;
/*!40000 ALTER TABLE `sub_atividades_padroes` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_atividades_padroes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(450) NOT NULL,
  `login_usuario` varchar(450) NOT NULL,
  `senha_usuario` varchar(450) NOT NULL,
  `email_usuario` varchar(450) DEFAULT NULL,
  `tfc_usuario` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (41,'coordenador de TFC','coordenador','coordenador','coordenador@coordenador.com',NULL),(42,'orientador','orientador','orientador','orientador@gmail.com',0),(43,'vanessa','vanessa','vanessa','vanessa@vanessa.com',NULL),(44,'gustavo','gustavo','gustavo','gustavo@gustavo.com',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cronograma_tfc'
--
/*!50003 DROP FUNCTION IF EXISTS `obter_desc_pmbok` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_desc_pmbok`(id_pmbok_versao integer) RETURNS varchar(400) CHARSET latin1
BEGIN

declare desc_pmbok varchar (400);

select pv.descricao_pmbok_versao 
into desc_pmbok
from pmbok_versao pv
where pv.id_pmbok_versao = id_pmbok_versao;


RETURN desc_pmbok;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `obter_nome_atividade` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_nome_atividade`(id_atividade integer, id_sub_atividade integer) RETURNS varchar(400) CHARSET latin1
BEGIN

declare desc_atividade varchar (400);

select nome_atividade
into desc_atividade
from atividade a, sub_atividade sa
where a.id_atividade = sa.id_atividade
and a.id_atividade = id_atividade
and sa.id_sub_atividade = id_sub_atividade;


RETURN desc_atividade;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `obter_nome_atividade_padrao` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_nome_atividade_padrao`(id_atividade_padroes integer, id_sub_atividades_padroes integer) RETURNS varchar(400) CHARSET latin1
BEGIN
declare desc_atividade varchar (400);

select nome_atividades_padroes 
into desc_atividade
from atividades_padroes ap, sub_atividades_padroes sap
where ap.id_atividades_padroes = sap.id_atividade_padroes
and ap.id_atividades_padroes = id_atividade_padroes
and sap.id_sub_atividades_padroes = id_sub_atividades_padroes;

RETURN desc_atividade;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `obter_nome_orientador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_nome_orientador`(id_orientador integer) RETURNS varchar(400) CHARSET latin1
BEGIN

declare nome_orientador varchar (400);

select u.nome_usuario
into nome_orientador
from usuario u, perfil_do_usuario pu
where u.id_usuario = id_orientador
and u.id_usuario = pu.usuario_id_usuario
and pu.perfil_id_perfil = 1;

RETURN nome_orientador;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `obter_nome_orientando` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_nome_orientando`(id_orientando integer) RETURNS varchar(400) CHARSET latin1
BEGIN

declare nome_orientando varchar (400);

select u.nome_usuario
into nome_orientando
from usuario u, perfil_do_usuario pu
where u.id_usuario = id_orientando
and u.id_usuario = pu.usuario_id_usuario
and pu.perfil_id_perfil = 2;

RETURN nome_orientando;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `obter_nome_perfil` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_nome_perfil`(id_perfil integer) RETURNS varchar(400) CHARSET latin1
BEGIN

declare nome_perfil varchar(400);

select p.nome_perfil
into nome_perfil
from perfil p
where p.id_perfil = id_perfil;

RETURN nome_perfil;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `obter_nome_projeto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_nome_projeto`(id_projeto integer, id_atividade integer) RETURNS varchar(400) CHARSET latin1
BEGIN

declare nome_projeto varchar (400);

select p.nome_projeto
into nome_projeto
from projeto p, atividade a
where p.id_projeto = a.id_projeto
and a.id_atividade = id_atividade
and p.id_projeto = id_projeto;

RETURN nome_projeto;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `obter_nome_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_nome_usuario`(id_usuario integer) RETURNS varchar(400) CHARSET latin1
BEGIN
declare nome_usuario varchar(400);

select u.nome_usuario 
into nome_usuario
from usuario u
where u.id_usuario = id_usuario;

RETURN nome_usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-27 21:35:40
