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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (1,'asa','N',2,'2017-03-01','2017-03-10','0000-00-00','teste'),(37,'asa','S',2,'2017-12-31','2017-12-31','2017-12-31','');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades_padroes`
--

LOCK TABLES `atividades_padroes` WRITE;
/*!40000 ALTER TABLE `atividades_padroes` DISABLE KEYS */;
INSERT INTO `atividades_padroes` VALUES (2,'adsssd','adasad','S',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2017-03-04 19:48:17',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'asa\',\'S\',\'2\',\'2016-12-31\',\'2017-12-30\',\'2017-12-31\',\'\')','atividade','Codigo Retornado: 00000 Mensagem retornada: '),(2,'2017-03-04 19:49:21',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2017-12-31\',\'\')','atividade','Codigo Retornado: 00000 Mensagem retornada: '),(3,'2017-03-04 19:51:26',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2017-12-31\',\'\')','atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(4,'2017-03-04 20:14:32',NULL,NULL,3,'','atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(5,'2017-03-04 20:16:12',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2016-12-31\',\'\')','atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(6,'2017-03-04 20:21:15',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2016-12-31\',\'\')','','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(7,'2017-03-04 20:56:57',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2016-12-31\',\'\')','','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(8,'2017-03-04 20:57:45',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2016-12-31\',\'\')','','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(9,'2017-03-04 20:59:22',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2016-12-31\',\'\')','tabela','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(10,'2017-03-04 21:11:06',NULL,NULL,3,'update `atividade` set `nome_atividade` = \'asa\', `status_atividade` = \'N\', `id_projeto` = \'2\', `data_inicio_atividade` = \'2017-03-01\', `data_fim_atividade` = \'2017-03-10\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'\' where id_atividade = 1','','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(11,'2017-03-04 21:11:40',NULL,NULL,3,'update `atividade` set `nome_atividade` = \'asa\', `status_atividade` = \'Selecione\', `id_projeto` = \'2\', `data_inicio_atividade` = \'2017-03-01\', `data_fim_atividade` = \'2017-03-10\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'teste\' where id_atividade = 1','','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(12,'2017-03-04 21:12:00',NULL,NULL,3,'update `atividade` set `nome_atividade` = \'asa\', `status_atividade` = \'Selecione\', `id_projeto` = \'2\', `data_inicio_atividade` = \'2017-03-01\', `data_fim_atividade` = \'2017-03-10\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'teste\' where id_atividade = 1','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(13,'2017-03-04 21:13:11',NULL,NULL,3,'update `atividade` set `nome_atividade` = \'asa\', `status_atividade` = \'S\', `id_projeto` = \'2\', `data_inicio_atividade` = \'2017-03-01\', `data_fim_atividade` = \'2017-03-10\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'teste\' where id_atividade = 1','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(14,'2017-03-04 21:26:50','Atividade','Array',3,'update `atividade` set `nome_atividade` = \'asa\', `status_atividade` = \'Selecione\', `id_projeto` = \'2\', `data_inicio_atividade` = \'2017-03-01\', `data_fim_atividade` = \'2017-03-10\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'\' where id_atividade = 1','Array','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(15,'2017-03-04 21:38:11','Atividade','Array',3,'update `atividade` set `nome_atividade` = \'asa\', `status_atividade` = \'Selecione\', `id_projeto` = \'2\', `data_inicio_atividade` = \'2017-03-01\', `data_fim_atividade` = \'2017-03-10\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'test\' where id_atividade = 1','Array','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(16,'2017-03-04 23:00:17','Atividade','id = 1 nome = asa status = Selecione id projeto = 2 data inicio = 2017-03-01 data fim = 2017-03-10 data validacao = 0000-00-00 observacoes = test',3,'update `atividade` set `nome_atividade` = \'asa\', `status_atividade` = \'Selecione\', `id_projeto` = \'2\', `data_inicio_atividade` = \'2017-03-01\', `data_fim_atividade` = \'2017-03-10\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'teste\' where id_atividade = 1','id = 1 nome = asa status = Selecione id projeto = 2 data inicio = 2017-03-01 data fim = 2017-03-10 data validacao = 0000-00-00 observacoes = teste','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(17,'2017-03-04 23:09:14','id = 1 nome = asa status = Selecione id projeto = 2 data inicio = 2017-03-01 data fim = 2017-03-10 data validacao = 0000-00-00 observacoes = teste','id = 1 nome = asa status = N id projeto = 2 data inicio = 2017-03-01 data fim = 2017-03-10 data validacao = 0000-00-00 observacoes = teste',3,'update `atividade` set `nome_atividade` = \'asa\', `status_atividade` = \'N\', `id_projeto` = \'2\', `data_inicio_atividade` = \'2017-03-01\', `data_fim_atividade` = \'2017-03-10\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'teste\' where id_atividade = 1','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(18,'2017-03-04 23:10:31',NULL,NULL,3,'update `atividade` set `nome_atividade` = \'asa\', `status_atividade` = \'Selecione\', `id_projeto` = \'Selecione\', `data_inicio_atividade` = \'2017-03-01\', `data_fim_atividade` = \'2017-03-10\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'teste\' where id_atividade = 1','Atividade','Codigo Retornado: 23000 Mensagem retornada: Cannot add or update a child row: a foreign key constraint fails (`cronograma_tfc`.`atividade`, CONSTRAINT `id_projeto` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(19,'2017-03-04 23:18:26','','',3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2017-12-31\',\'\')','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(20,'2017-03-04 23:19:11','','',3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2017-12-31\',\'\')','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(21,'2017-03-04 23:21:56','','',3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2017-12-31\',\'\')','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(22,'2017-03-04 23:22:00','','',3,'DELETE FROM `atividade` WHERE id_atividade = 34','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(23,'2017-03-04 23:22:03','','',3,'DELETE FROM `atividade` WHERE id_atividade = 35','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(24,'2017-03-04 23:22:12','','',3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'asa\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2017-12-31\',\'\')','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(25,'2017-03-04 23:22:15','','',3,'DELETE FROM `atividade` WHERE id_atividade = 36','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(26,'2017-03-05 00:47:58','id =  nome = ','id =  nome = ',3,'update `pmbok_versao` set `descricao_pmbok_versao` = \'versao 2017\' where id_pmbok_versao = 1','TABELA','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(27,'2017-03-05 00:49:25','id = 1 nome = versao 2017','id = 1 nome = versao 2016',3,'update `pmbok_versao` set `descricao_pmbok_versao` = \'versao 2016\' where id_pmbok_versao = 1','TABELA','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(28,'2017-03-05 00:50:05','id = 1 nome = versao 2016','id = 1 nome = versao 2018',3,'update `pmbok_versao` set `descricao_pmbok_versao` = \'versao 2018\' where id_pmbok_versao = 1','TABELA','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(29,'2017-03-05 00:52:58','id = 1 nome = versao 2018','id = 1 nome = versao 2016',3,'update `pmbok_versao` set `descricao_pmbok_versao` = \'versao 2016\' where id_pmbok_versao = 1','TABELA','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(30,'2017-03-05 00:53:53','id = 1 nome = versao 2016','id = 1 nome = versao 2018',3,'update `pmbok_versao` set `descricao_pmbok_versao` = \'versao 2018\' where id_pmbok_versao = 1','Pmbok','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(31,'2017-03-05 00:54:03','id = 1 nome = versao 2018','id = 1 nome = versao 2017',3,'update `pmbok_versao` set `descricao_pmbok_versao` = \'versao 2017\' where id_pmbok_versao = 1','Pmbok','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(32,'2017-03-05 01:15:40','','id =  nome =  status =  id atividade =  data inicio =  data fim =  data validacao =  observacoes = ',3,'update `sub_atividade` set `nome_sub_atividade` = \'teste 3\', `status_sub_atividade` = \'Selecione\', `id_atividade` = \'1\', `data_inicio_sub_atividade` = \'2017-12-31\', `data_fim_sub_atividade` = \'2017-12-31\', `data_validacao_sub_atividade` = \'2017-12-31\', `observacoes_sub_atividade` = \'test\' where id_sub_atividade = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(33,'2017-03-05 01:17:31','','id =  nome =  status =  id atividade =  data inicio =  data fim =  data validacao =  observacoes = ',3,'update `sub_atividade` set `nome_sub_atividade` = \'teste 3\', `status_sub_atividade` = \'Selecione\', `id_atividade` = \'1\', `data_inicio_sub_atividade` = \'2017-12-31\', `data_fim_sub_atividade` = \'2017-12-31\', `data_validacao_sub_atividade` = \'2017-12-31\', `observacoes_sub_atividade` = \'teste\' where id_sub_atividade = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(34,'2017-03-05 01:17:52','','id = 1 nome = teste 3 status = Selecione id atividade = 1 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste',3,'update `sub_atividade` set `nome_sub_atividade` = \'teste 3\', `status_sub_atividade` = \'Selecione\', `id_atividade` = \'1\', `data_inicio_sub_atividade` = \'2017-12-31\', `data_fim_sub_atividade` = \'2017-12-31\', `data_validacao_sub_atividade` = \'2017-12-31\', `observacoes_sub_atividade` = \'teste\' where id_sub_atividade = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(35,'2017-03-05 01:18:02','','id = 1 nome = teste 3 status = Selecione id atividade = 1 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = test',3,'update `sub_atividade` set `nome_sub_atividade` = \'teste 3\', `status_sub_atividade` = \'Selecione\', `id_atividade` = \'1\', `data_inicio_sub_atividade` = \'2017-12-31\', `data_fim_sub_atividade` = \'2017-12-31\', `data_validacao_sub_atividade` = \'2017-12-31\', `observacoes_sub_atividade` = \'test\' where id_sub_atividade = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(36,'2017-03-05 01:21:23','','id = 1 nome = teste 3 status = Selecione id atividade = 1 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste',3,'update `sub_atividade` set `nome_sub_atividade` = \'teste 3\', `status_sub_atividade` = \'Selecione\', `id_atividade` = \'1\', `data_inicio_sub_atividade` = \'2017-12-31\', `data_fim_sub_atividade` = \'2017-12-31\', `data_validacao_sub_atividade` = \'2017-12-31\', `observacoes_sub_atividade` = \'teste\' where id_sub_atividade = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(37,'2017-03-05 01:22:03','id = 1 nome = teste 3 status = Selecione id atividade = 1 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste','id = 1 nome = teste 3 status = Selecione id atividade = 1 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste',3,'update `sub_atividade` set `nome_sub_atividade` = \'teste 3\', `status_sub_atividade` = \'Selecione\', `id_atividade` = \'1\', `data_inicio_sub_atividade` = \'2017-12-31\', `data_fim_sub_atividade` = \'2017-12-31\', `data_validacao_sub_atividade` = \'2017-12-31\', `observacoes_sub_atividade` = \'teste\' where id_sub_atividade = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(38,'2017-03-05 01:22:14','id = 1 nome = teste 3 status = Selecione id atividade = 1 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste','id = 1 nome = teste 3 status = Selecione id atividade = 1 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste',3,'update `sub_atividade` set `nome_sub_atividade` = \'teste 3\', `status_sub_atividade` = \'Selecione\', `id_atividade` = \'1\', `data_inicio_sub_atividade` = \'2017-12-31\', `data_fim_sub_atividade` = \'2017-12-31\', `data_validacao_sub_atividade` = \'2017-12-31\', `observacoes_sub_atividade` = \'teste\' where id_sub_atividade = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(39,'2017-03-05 01:31:25',NULL,NULL,3,'update `projeto` set `nome_projeto` = \'test\', `status_projeto` = \'Selecione\', `data_validacao` = \'2017-02-22\', `id_orientador` = \'Selecione\', `id_orientando` = \'Selecione\' where id_projeto = 2','Projeto','Codigo Retornado: 23000 Mensagem retornada: Cannot add or update a child row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`id_orientador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(40,'2017-03-05 01:31:33',NULL,NULL,3,'update `projeto` set `nome_projeto` = \'test\', `status_projeto` = \'Selecione\', `data_validacao` = \'2017-02-22\', `id_orientador` = \'Selecione\', `id_orientando` = \'Selecione\' where id_projeto = 2','Projeto','Codigo Retornado: 23000 Mensagem retornada: Cannot add or update a child row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`id_orientador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(41,'2017-03-05 01:31:43',NULL,NULL,3,'update `projeto` set `nome_projeto` = \'test\', `status_projeto` = \'Selecione\', `data_validacao` = \'2017-02-22\', `id_orientador` = \'Selecione\', `id_orientando` = \'Selecione\' where id_projeto = 2','Projeto','Codigo Retornado: 23000 Mensagem retornada: Cannot add or update a child row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`id_orientador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(42,'2017-03-05 01:32:10','id = 2 nome = teste status = teste data validacao = 2017-02-22 id orientador = 3 id orientando = 10 id pmbok = 1','id = 2 nome = test status = A data validacao = 2016-01-21 id orientador = 3 id orientando = 10 id pmbok = 1',3,'update `projeto` set `nome_projeto` = \'test\', `status_projeto` = \'A\', `data_validacao` = \'2016-01-21\', `id_orientador` = \'3\', `id_orientando` = \'10\' where id_projeto = 2','Projeto','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(43,'2017-03-05 01:32:30','id = 1 nome = teste 3 status = Selecione id atividade = 1 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste','id = 1 nome = teste  status = Selecione id atividade = 1 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste',3,'update `sub_atividade` set `nome_sub_atividade` = \'teste \', `status_sub_atividade` = \'Selecione\', `id_atividade` = \'1\', `data_inicio_sub_atividade` = \'2017-12-31\', `data_fim_sub_atividade` = \'2017-12-31\', `data_validacao_sub_atividade` = \'2017-12-31\', `observacoes_sub_atividade` = \'teste\' where id_sub_atividade = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(44,'2017-03-05 01:34:26','id = 2 nome = adss Descricao = adasad Obrigatorio = S PMBOK = 1','id = 2 nome = adsssdfasdf Descricao = adasad Obrigatorio = N PMBOK = 1',3,'update `atividades_padroes` set `nome_atividades_padroes` = \'adsssdfasdf\', `descricao_atividades_padroes` = \'adasad\', `ie_obrigatorio_atividades_padroes` = \'N\', `id_pmbok_versao` = \'1\' where id_atividades_padroes = 2','TABELA','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(45,'2017-03-05 01:35:26','id = 2 nome = adsssdfasdf Descricao = adasad Obrigatorio = N PMBOK = 1','id = 2 nome = adsssd Descricao = adasad Obrigatorio = N PMBOK = 1',3,'update `atividades_padroes` set `nome_atividades_padroes` = \'adsssd\', `descricao_atividades_padroes` = \'adasad\', `ie_obrigatorio_atividades_padroes` = \'N\', `id_pmbok_versao` = \'1\' where id_atividades_padroes = 2','AtividadePadrao','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(46,'2017-03-05 01:46:49','','id = id_sub_atividades_padroes nome = teste descricao = teste id atividade principaÃ§ = 2 obrigatorio = S',3,'update `atividades_padroes` set `nome_atividades_padroes` = \'\', `descricao_atividades_padroes` = \'\', `ie_obrigatorio_atividades_padroes` = \'S\', `id_pmbok_versao` = \'adsssd\' where id_atividades_padroes = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(47,'2017-03-05 02:10:28','id = 1 nome = teste descricao = teste id atividade principaÃ§ = 2 obrigatorio = N','id = 1 nome = teste descricao = teste id atividade principaÃ§ = 2 obrigatorio = N',3,'update `sub_atividades_padroes` set `nome_sub_atividade_padroes` = \'teste\', `descricao_sub_atividades_padroes` = \'teste\', `ie_obrigatorio_sub_atividades_padroes` = \'N\', `id_atividade_padroes` = \'2\' where id_sub_atividades_padroes = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(48,'2017-03-05 02:10:40','id = 1 nome = teste descricao = teste id atividade principaÃ§ = 2 obrigatorio = N','id = 1 nome = test descricao = teste id atividade principaÃ§ = 2 obrigatorio = S',3,'update `sub_atividades_padroes` set `nome_sub_atividade_padroes` = \'test\', `descricao_sub_atividades_padroes` = \'teste\', `ie_obrigatorio_sub_atividades_padroes` = \'S\', `id_atividade_padroes` = \'2\' where id_sub_atividades_padroes = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(49,'2017-03-05 02:12:39','id = 2 nome = adsssd Descricao = adasad Obrigatorio = N PMBOK = 1','id = 2 nome = adsssd Descricao = adasad Obrigatorio = S PMBOK = 1',3,'update `atividades_padroes` set `nome_atividades_padroes` = \'adsssd\', `descricao_atividades_padroes` = \'adasad\', `ie_obrigatorio_atividades_padroes` = \'S\', `id_pmbok_versao` = \'1\' where id_atividades_padroes = 2','AtividadePadrao','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(50,'2017-03-05 02:13:02','id = 1 nome = test descricao = teste id atividade principaÃ§ = 2 obrigatorio = S','id = 1 nome = test descricao = teste id atividade principaÃ§ = 2 obrigatorio = N',3,'update `sub_atividades_padroes` set `nome_sub_atividade_padroes` = \'test\', `descricao_sub_atividades_padroes` = \'teste\', `ie_obrigatorio_sub_atividades_padroes` = \'N\', `id_atividade_padroes` = \'2\' where id_sub_atividades_padroes = 1','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(51,'2017-03-05 02:16:35','id = 10 nome = teste login = teste senha = teste email = teste@teste.com TFC = ','id = 10 nome = teste login = teste senha = teste email = teste@teste.co TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste.co\' where id_usuario = 10','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(52,'2017-03-05 02:16:44','id = 10 nome = teste login = teste senha = teste email = teste@teste.co TFC = ','id = 10 nome = teste login = teste senha = teste email = teste@teste.com TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste.com\' where id_usuario = 10','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(53,'2017-03-06 22:17:26','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(54,'2017-03-06 22:17:53','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(55,'2017-03-06 22:18:48','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(56,'2017-03-06 22:19:36','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(57,'2017-03-06 22:44:30','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(58,'2017-03-06 22:44:34',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(59,'2017-03-06 22:44:35',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(60,'2017-03-06 22:44:36',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(61,'2017-03-06 22:44:36',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(62,'2017-03-06 22:44:38','','',3,'DELETE FROM `usuario` WHERE id_usuario = 12','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(63,'2017-03-06 22:44:40','','',3,'DELETE FROM `usuario` WHERE id_usuario = 13','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(64,'2017-03-06 22:44:41','','',3,'DELETE FROM `usuario` WHERE id_usuario = 15','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(65,'2017-03-06 22:44:42','','',3,'DELETE FROM `usuario` WHERE id_usuario = 14','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(66,'2017-03-06 22:44:43',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(67,'2017-03-06 22:44:44','','',3,'DELETE FROM `usuario` WHERE id_usuario = 16','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(68,'2017-03-06 22:44:45','','',3,'DELETE FROM `usuario` WHERE id_usuario = 17','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(69,'2017-03-06 22:45:19','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(70,'2017-03-06 22:47:10','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(71,'2017-03-06 22:50:46','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(72,'2017-03-06 22:51:30','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(73,'2017-03-06 22:51:30','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'21\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(74,'2017-03-06 22:51:49','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(75,'2017-03-06 22:51:49','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'22\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(76,'2017-03-06 22:51:54',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(77,'2017-03-06 22:51:54',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(78,'2017-03-06 22:51:55',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(79,'2017-03-06 22:51:55',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(80,'2017-03-06 22:51:56',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(81,'2017-03-06 22:51:57','','',3,'DELETE FROM `usuario` WHERE id_usuario = 18','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(82,'2017-03-06 22:51:58',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(83,'2017-03-06 22:51:59','','',3,'DELETE FROM `usuario` WHERE id_usuario = 19','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(84,'2017-03-06 22:51:59',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(85,'2017-03-06 22:52:00',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 20','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(86,'2017-03-06 22:52:01',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(87,'2017-03-06 22:52:03',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(88,'2017-03-06 22:52:05',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 20','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(89,'2017-03-06 22:52:06',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 20','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(90,'2017-03-06 22:52:07',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 20','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(91,'2017-03-06 22:52:09',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 21','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(92,'2017-03-06 22:52:10',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 20','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(93,'2017-03-06 22:52:12',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(94,'2017-03-06 22:52:16',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 21','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(95,'2017-03-06 22:52:50',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 22','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(96,'2017-03-06 22:52:52',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 21','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`perfil_do_usuario`, CONSTRAINT `fk_perfil_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)');
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
INSERT INTO `perfil_do_usuario` VALUES (1,3),(2,10),(2,20),(2,21),(2,22);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto`
--

LOCK TABLES `projeto` WRITE;
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
INSERT INTO `projeto` VALUES (2,'test','A','2016-01-21',3,10,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_atividade`
--

LOCK TABLES `sub_atividade` WRITE;
/*!40000 ALTER TABLE `sub_atividade` DISABLE KEYS */;
INSERT INTO `sub_atividade` VALUES (1,'teste ','Selecione',1,'2017-12-31','2017-12-31','2017-12-31','teste');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_atividades_padroes`
--

LOCK TABLES `sub_atividades_padroes` WRITE;
/*!40000 ALTER TABLE `sub_atividades_padroes` DISABLE KEYS */;
INSERT INTO `sub_atividades_padroes` VALUES (1,'test','teste','N',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'gustavo','gustavo','gustav','gustavo@gustavo.com',NULL),(10,'teste','teste','teste','teste@teste.com',NULL),(20,'teste','teste','teste','teste@teste.com',NULL),(21,'teste','teste','teste','teste@teste.com',NULL),(22,'teste','teste','teste','teste@teste.com',NULL);
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
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_nome_usuario`(id_usuario integer) RETURNS varchar(400) CHARSET utf32 COLLATE utf32_unicode_ci
BEGIN
declare nome_usuario varchar (400);

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

-- Dump completed on 2017-03-06 23:00:48
