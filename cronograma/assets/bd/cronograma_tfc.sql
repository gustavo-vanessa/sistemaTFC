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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (1,'asa','E',2,'2017-03-01','2017-03-10','2017-03-24',''),(11,'teste 654321','E',2,'2017-12-31','2017-12-31','2017-12-31','teste teste teste  gsgs gs g sag ds dsg dsg dsg dsg sdg sg sg sdg sg wr gt wrg fh erg xgtwr g xbr egzd  grs gzd grs gd grs '),(19,'aaa','E',2,'2017-03-01','2017-03-02','2017-03-24',NULL),(24,'bbb','E',2,'2017-03-02','2017-03-02','2017-03-24',NULL),(29,'teste 654321','E',2,'2017-12-31','2017-12-31','2017-12-31',''),(30,'atividade do projeto da vanessa','E',3,'2017-12-31','2017-12-31','2017-03-24',''),(33,'teste','E',6,'2017-12-31','2017-12-31','2017-03-24','teste'),(34,'teste','NE',6,'2017-12-31','2017-12-30','0000-00-00',''),(35,'teste','NE',6,'2017-12-31','2017-12-30',NULL,''),(36,'teste','NE',6,'2017-12-30','2017-12-29',NULL,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades_padroes`
--

LOCK TABLES `atividades_padroes` WRITE;
/*!40000 ALTER TABLE `atividades_padroes` DISABLE KEYS */;
INSERT INTO `atividades_padroes` VALUES (2,'adss','adasad','S',1),(3,'teste atividade padrao 2','esta Ã© uma atividade teste 2','N',1),(4,'testando a 3 atividade padrao','vamos ver como reage','S',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2017-03-06 18:21:21','','',3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste 654321\',\'S\',\'2\',\'2017-12-31\',\'2017-12-31\',\'2017-12-31\',\'\')','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(2,'2017-03-06 19:14:36','id = 11 nome = teste 654321 status = S id projeto = 2 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste teste teste','id = 11 nome = teste 654321 status = Selecione id projeto = 2 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 2017-12-31 observacoes = teste teste teste  gsgs gs g sag ds dsg dsg dsg dsg sdg sg sg sdg sg wr gt wrg fh erg xgtwr g xbr egzd  grs gzd grs gd grs ',3,'update `atividade` set `nome_atividade` = \'teste 654321\', `status_atividade` = \'Selecione\', `id_projeto` = \'2\', `data_inicio_atividade` = \'2017-12-31\', `data_fim_atividade` = \'2017-12-31\', `data_validacao_atividade` = \'2017-12-31\', `observacoes_atividade` = \'teste teste teste  gsgs gs g sag ds dsg dsg dsg dsg sdg sg sg sdg sg wr gt wrg fh erg xgtwr g xbr egzd  grs gzd grs gd grs \' where id_atividade = 11','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(3,'2017-03-06 19:15:28','id = 2 nome = adss Descricao = adasad Obrigatorio = S PMBOK = 1','id = 2 nome = adss Descricao = adasad Obrigatorio = S PMBOK = 1',3,'update `atividades_padroes` set `nome_atividades_padroes` = \'adss\', `descricao_atividades_padroes` = \'adasad\', `ie_obrigatorio_atividades_padroes` = \'S\', `id_pmbok_versao` = \'1\' where id_atividades_padroes = 2','AtividadePadrao','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(4,'2017-03-06 23:18:47','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(5,'2017-03-06 23:18:47','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'14\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(6,'2017-03-06 23:19:59','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 14','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(7,'2017-03-06 23:19:59','','',3,'DELETE FROM `usuario` WHERE id_usuario = 14','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(8,'2017-03-06 23:20:14','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(9,'2017-03-06 23:20:14','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'15\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(10,'2017-03-06 23:20:18','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 15','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(11,'2017-03-06 23:20:18','','',3,'DELETE FROM `usuario` WHERE id_usuario = 15','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(12,'2017-03-06 23:20:23','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 12','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(13,'2017-03-06 23:20:23','','',3,'DELETE FROM `usuario` WHERE id_usuario = 12','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(14,'2017-03-06 23:20:26','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 10','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(15,'2017-03-06 23:20:26',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(16,'2017-03-06 23:20:30','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 10','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(17,'2017-03-06 23:20:30',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(18,'2017-03-06 23:25:25','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(19,'2017-03-06 23:25:25','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'16\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(20,'2017-03-06 23:26:16','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(21,'2017-03-06 23:26:16','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'17\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(22,'2017-03-06 23:27:15','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(23,'2017-03-06 23:27:15','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'18\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(24,'2017-03-06 23:29:51','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(25,'2017-03-06 23:29:52','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'19\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(26,'2017-03-06 23:45:08','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(27,'2017-03-06 23:45:08','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'20\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(28,'2017-03-06 23:46:29','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(29,'2017-03-06 23:46:29','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'21\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(30,'2017-03-06 23:46:44','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(31,'2017-03-06 23:46:44','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'22\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(32,'2017-03-06 23:46:52','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(33,'2017-03-06 23:46:52','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'23\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(34,'2017-03-06 23:46:58','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(35,'2017-03-06 23:46:59','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'24\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(36,'2017-03-06 23:47:22','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(37,'2017-03-06 23:47:22','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'25\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(38,'2017-03-06 23:47:25','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 25','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(39,'2017-03-06 23:47:25','','',3,'DELETE FROM `usuario` WHERE id_usuario = 25','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(40,'2017-03-06 23:47:27','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 18','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(41,'2017-03-06 23:47:27','','',3,'DELETE FROM `usuario` WHERE id_usuario = 18','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(42,'2017-03-06 23:47:31','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 17','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(43,'2017-03-06 23:47:31','','',3,'DELETE FROM `usuario` WHERE id_usuario = 17','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(44,'2017-03-06 23:47:33','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 16','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(45,'2017-03-06 23:47:33','','',3,'DELETE FROM `usuario` WHERE id_usuario = 16','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(46,'2017-03-06 23:47:34','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 19','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(47,'2017-03-06 23:47:34','','',3,'DELETE FROM `usuario` WHERE id_usuario = 19','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(48,'2017-03-06 23:47:35','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 20','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(49,'2017-03-06 23:47:35','','',3,'DELETE FROM `usuario` WHERE id_usuario = 20','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(50,'2017-03-06 23:47:36','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 21','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(51,'2017-03-06 23:47:36','','',3,'DELETE FROM `usuario` WHERE id_usuario = 21','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(52,'2017-03-06 23:47:37','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 22','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(53,'2017-03-06 23:47:37','','',3,'DELETE FROM `usuario` WHERE id_usuario = 22','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(54,'2017-03-06 23:47:37','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 23','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(55,'2017-03-06 23:47:37','','',3,'DELETE FROM `usuario` WHERE id_usuario = 23','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(56,'2017-03-06 23:47:38','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 24','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(57,'2017-03-06 23:47:38','','',3,'DELETE FROM `usuario` WHERE id_usuario = 24','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(58,'2017-03-06 23:51:02','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(59,'2017-03-06 23:51:02','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'26\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(60,'2017-03-06 23:53:36','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(61,'2017-03-06 23:53:36','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'27\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(62,'2017-03-06 23:54:01','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(63,'2017-03-06 23:54:01','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'28\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(64,'2017-03-06 23:54:10','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(65,'2017-03-06 23:54:10','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'29\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(66,'2017-03-06 23:54:28','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(67,'2017-03-06 23:54:28','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'30\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(68,'2017-03-06 23:54:51','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 10','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(69,'2017-03-06 23:54:52',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(70,'2017-03-06 23:54:54','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 26','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(71,'2017-03-06 23:54:55','','',3,'DELETE FROM `usuario` WHERE id_usuario = 26','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(72,'2017-03-06 23:54:56','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 27','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(73,'2017-03-06 23:54:56','','',3,'DELETE FROM `usuario` WHERE id_usuario = 27','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(74,'2017-03-06 23:54:57','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 28','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(75,'2017-03-06 23:54:57','','',3,'DELETE FROM `usuario` WHERE id_usuario = 28','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(76,'2017-03-06 23:54:57','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 29','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(77,'2017-03-06 23:54:57','','',3,'DELETE FROM `usuario` WHERE id_usuario = 29','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(78,'2017-03-06 23:54:58','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 30','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(79,'2017-03-06 23:54:59','','',3,'DELETE FROM `usuario` WHERE id_usuario = 30','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(80,'2017-03-06 23:58:56',NULL,NULL,3,'INSERT INTO`projeto` (`nome_projeto`, `status_projeto`, `data_validacao`, `id_orientador`, `id_orientando`, `id_pmbok_versao`) VALUES (\'teste\', \'A\', \'2017-12-31\', \'3\', \'Selecione\', \'1\')','Projeto','Codigo Retornado: 23000 Mensagem retornada: Cannot add or update a child row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(81,'2017-03-06 23:59:18','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(82,'2017-03-06 23:59:18','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'31\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(83,'2017-03-06 23:59:35','','',3,'INSERT INTO`projeto` (`nome_projeto`, `status_projeto`, `data_validacao`, `id_orientador`, `id_orientando`, `id_pmbok_versao`) VALUES (\'teste\', \'A\', \'2017-12-31\', \'3\', \'31\', \'1\')','Projeto','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(84,'2017-03-06 23:59:39','','',3,'DELETE FROM `projeto` WHERE id_projeto = 9','Projeto','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(85,'2017-03-06 23:59:55','id = 2 nome = test status = A data validacao = 2017-02-23 id orientador = 3 id orientando = 10 id pmbok = 1','id = 2 nome = test status = Selecione data validacao = 2017-02-23 id orientador = 3 id orientando = 31 id pmbok = 1',3,'update `projeto` set `nome_projeto` = \'test\', `status_projeto` = \'Selecione\', `data_validacao` = \'2017-02-23\', `id_orientador` = \'3\', `id_orientando` = \'31\' where id_projeto = 2','Projeto','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(86,'2017-03-07 00:00:17','id = 1 nome = versão 2017','id = 1 nome = versao 2017',3,'update `pmbok_versao` set `descricao_pmbok_versao` = \'versao 2017\' where id_pmbok_versao = 1','Pmbok','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(87,'2017-03-07 00:02:44','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(88,'2017-03-07 00:02:45','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'32\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(89,'2017-03-07 00:02:45','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'32\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(90,'2017-03-07 00:04:34','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 32','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(91,'2017-03-07 00:04:34','','',3,'DELETE FROM `usuario` WHERE id_usuario = 32','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(92,'2017-03-07 00:04:34','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 31','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(93,'2017-03-07 00:04:34',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 31','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(94,'2017-03-07 00:04:37','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 31','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(95,'2017-03-07 00:04:37',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 31','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(96,'2017-03-07 00:04:52','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(97,'2017-03-07 00:05:09','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 33','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(98,'2017-03-07 00:05:09','','',3,'DELETE FROM `usuario` WHERE id_usuario = 33','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(99,'2017-03-07 00:05:19','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(100,'2017-03-07 00:05:50','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(101,'2017-03-07 00:05:57','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(102,'2017-03-07 00:05:57','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'36\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(103,'2017-03-07 00:05:57','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'36\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(104,'2017-03-07 00:06:48','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(105,'2017-03-07 00:06:48','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'37\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(106,'2017-03-07 00:06:48','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'37\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(107,'2017-03-07 00:07:26','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 31','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(108,'2017-03-07 00:07:26',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 31','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(109,'2017-03-07 00:07:28','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 34','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(110,'2017-03-07 00:07:28','','',3,'DELETE FROM `usuario` WHERE id_usuario = 34','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(111,'2017-03-07 00:07:30','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 35','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(112,'2017-03-07 00:07:30','','',3,'DELETE FROM `usuario` WHERE id_usuario = 35','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(113,'2017-03-07 00:09:47','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(114,'2017-03-07 00:09:47','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'38\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(115,'2017-03-07 00:10:02','id = 2 nome = test status = Selecione data validacao = 2017-02-23 id orientador = 3 id orientando = 31 id pmbok = 1','id = 2 nome = test status = Selecione data validacao = 2017-02-23 id orientador = 3 id orientando = 38 id pmbok = 1',3,'update `projeto` set `nome_projeto` = \'test\', `status_projeto` = \'Selecione\', `data_validacao` = \'2017-02-23\', `id_orientador` = \'3\', `id_orientando` = \'38\' where id_projeto = 2','Projeto','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(116,'2017-03-07 00:10:10','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 38','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(117,'2017-03-07 00:10:10',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 38','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(118,'2017-03-07 00:10:14','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 31','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(119,'2017-03-07 00:10:14','','',3,'DELETE FROM `usuario` WHERE id_usuario = 31','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(120,'2017-03-07 00:19:17','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(121,'2017-03-07 00:19:17','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'39\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(122,'2017-03-07 00:19:29','id = 2 nome = test status = Selecione data validacao = 2017-02-23 id orientador = 3 id orientando = 38 id pmbok = 1','id = 2 nome = test status = Selecione data validacao = 2017-02-23 id orientador = 3 id orientando = 39 id pmbok = 1',3,'update `projeto` set `nome_projeto` = \'test\', `status_projeto` = \'Selecione\', `data_validacao` = \'2017-02-23\', `id_orientador` = \'3\', `id_orientando` = \'39\' where id_projeto = 2','Projeto','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(123,'2017-03-07 00:31:57','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 37','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(124,'2017-03-07 00:31:57','','',3,'DELETE FROM `usuario` WHERE id_usuario = 37','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(125,'2017-03-07 00:31:58','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 38','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(126,'2017-03-07 00:31:58','','',3,'DELETE FROM `usuario` WHERE id_usuario = 38','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(127,'2017-03-07 00:32:01','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 36','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(128,'2017-03-07 00:32:01','','',3,'DELETE FROM `usuario` WHERE id_usuario = 36','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(129,'2017-03-07 00:32:02','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 10','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(130,'2017-03-07 00:32:02','','',3,'DELETE FROM `usuario` WHERE id_usuario = 10','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(131,'2017-03-07 00:32:04','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 39','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(132,'2017-03-07 00:32:04',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 39','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(133,'2017-03-07 00:32:05','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 39','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(134,'2017-03-07 00:32:05',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 39','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario2` FOREIGN KEY (`id_orientando`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(135,'2017-03-07 00:32:06','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 3','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(136,'2017-03-07 00:32:06',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 3','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`id_orientador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(137,'2017-03-07 00:32:07','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 3','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(138,'2017-03-07 00:32:07',NULL,NULL,3,'DELETE FROM `usuario` WHERE id_usuario = 3','Usuario','Codigo Retornado: 23000 Mensagem retornada: Cannot delete or update a parent row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`id_orientador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(139,'2017-03-07 00:41:17','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@testte\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(140,'2017-03-07 00:41:17','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'40\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(141,'2017-03-07 00:41:19','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 40','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(142,'2017-03-07 00:41:19','','',3,'DELETE FROM `usuario` WHERE id_usuario = 40','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(143,'2017-03-07 01:04:27','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(144,'2017-03-07 01:04:27','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'41\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(145,'2017-03-07 01:07:24','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 41','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(146,'2017-03-07 01:07:24','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 41','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(147,'2017-03-07 01:07:24','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'41\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(148,'2017-03-07 01:07:29','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 41','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(149,'2017-03-07 01:07:29','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 41','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(150,'2017-03-07 01:07:29','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'41\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(151,'2017-03-07 01:07:29','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'41\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(152,'2017-03-07 01:07:44','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 41','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(153,'2017-03-07 01:07:44','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 41','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(154,'2017-03-07 01:07:44','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'41\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(155,'2017-03-07 01:07:51','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 41','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(156,'2017-03-07 01:07:52','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 41','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(157,'2017-03-07 01:07:52','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'41\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(158,'2017-03-07 01:08:02','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 41','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(159,'2017-03-07 01:08:02','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 41','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(160,'2017-03-07 01:08:02','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'41\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(161,'2017-03-07 01:08:13','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 41','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(162,'2017-03-07 01:08:13','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 41 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 41','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(163,'2017-03-07 01:08:13','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'41\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(164,'2017-03-07 01:08:22','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 41','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(165,'2017-03-07 01:08:22','','',3,'DELETE FROM `usuario` WHERE id_usuario = 41','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(166,'2017-03-07 01:09:30','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'teste\',\'teste\',\'teste\',\'teste@teste\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(167,'2017-03-07 01:09:30','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(168,'2017-03-07 01:10:21','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 42','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(169,'2017-03-07 01:10:22','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 42','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(170,'2017-03-07 01:10:22','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(171,'2017-03-07 01:10:22','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(172,'2017-03-07 01:34:27','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 42','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(173,'2017-03-07 01:34:27','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 42','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(174,'2017-03-07 01:34:27','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(175,'2017-03-07 01:34:32','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 42','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(176,'2017-03-07 01:34:32','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 42','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(177,'2017-03-07 01:34:32','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(178,'2017-03-07 01:34:32','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(179,'2017-03-07 01:34:37','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 42','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(180,'2017-03-07 01:34:37','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 42','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(181,'2017-03-07 01:34:37','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(182,'2017-03-07 01:34:41','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 42','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(183,'2017-03-07 01:34:41','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 42','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(184,'2017-03-07 01:34:41','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(185,'2017-03-07 01:34:45','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 42','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(186,'2017-03-07 01:34:45','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 42','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(187,'2017-03-07 01:34:46','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(188,'2017-03-07 01:34:46','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(189,'2017-03-07 01:34:52','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 42','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(190,'2017-03-07 01:34:52','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 42','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(191,'2017-03-07 01:34:52','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(192,'2017-03-07 01:35:20','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 42','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(193,'2017-03-07 01:35:20','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 42 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 42','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(194,'2017-03-07 01:35:20','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(195,'2017-03-07 01:35:20','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'42\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(196,'2017-03-13 18:27:32','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 39','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(197,'2017-03-13 18:27:32','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 39','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(198,'2017-03-13 18:27:32','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'39\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(199,'2017-03-13 18:34:03','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 39','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(200,'2017-03-13 18:34:04','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 39','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(201,'2017-03-13 18:34:04','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'39\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(202,'2017-03-13 18:51:53','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 39','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(203,'2017-03-13 18:51:53','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 39','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(204,'2017-03-13 18:51:53','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'39\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(205,'2017-03-13 18:52:22','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 39','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(206,'2017-03-13 18:52:22','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 39','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(207,'2017-03-13 18:52:22','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'39\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(208,'2017-03-13 18:55:31','','',3,'DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = 39','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(209,'2017-03-13 18:55:31','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ','id = 39 nome = teste login = teste senha = teste email = teste@teste TFC = ',3,'update `usuario` set `nome_usuario` = \'teste\', `login_usuario` = \'teste\', `senha_usuario` = \'teste\', `email_usuario` = \'teste@teste\' where id_usuario = 39','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(210,'2017-03-13 18:55:31','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'3\',\'39\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(211,'2017-03-13 18:55:31','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'1\',\'39\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(212,'2017-03-20 00:34:28','','',3,'INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES (\'vanessa\',\'vanessa\',\'vanessa\',\'vanessa@vanessa.com\')','Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(213,'2017-03-20 00:34:29','','',3,'INSERT INTO `perfil_do_usuario`(`perfil_id_perfil`, `usuario_id_usuario` )VALUES (\'2\',\'40\')','Perfil_do_Usuario','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(214,'2017-03-20 18:25:40','','',3,'INSERT INTO`projeto` (`nome_projeto`, `status_projeto`, `data_validacao`, `id_orientador`, `id_orientando`, `id_pmbok_versao`) VALUES (\'teste\', \'A\', \'\', \'3\', \'40\', \'1\')','Projeto','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(215,'2017-03-20 18:34:39',NULL,NULL,3,'update `projeto` set `nome_projeto` = \'Projeto da vanessa\', `status_projeto` = \'Selecione\', `data_validacao` = \'\', `id_orientador` = \'Selecione\', `id_orientando` = \'Selecione\' where id_projeto = 3','Projeto','Codigo Retornado: 23000 Mensagem retornada: Cannot add or update a child row: a foreign key constraint fails (`cronograma_tfc`.`projeto`, CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`id_orientador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(216,'2017-03-20 18:36:49','id = 3 nome = teste status = A data validacao = 0000-00-00 id orientador = 3 id orientando = 40 id pmbok = 1','id = 3 nome = Projeto teste da vanessa status = A data validacao = 0000-00-00 id orientador = 3 id orientando = 40 id pmbok = 1',3,'update `projeto` set `nome_projeto` = \'Projeto teste da vanessa\', `status_projeto` = \'A\', `data_validacao` = \'\', `id_orientador` = \'3\', `id_orientando` = \'40\' where id_projeto = 3','Projeto','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(217,'2017-03-20 18:37:25','','',3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'teste\',\'S\',\'3\',\'2017-12-31\',\'2017-12-31\',\'\',\'\')','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(218,'2017-03-20 18:38:27','id = 30 nome = teste status = S id projeto = 3 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 0000-00-00 observacoes = ','id = 30 nome = atividade do projeto da vanessa status = S id projeto = 3 data inicio = 2017-12-31 data fim = 2017-12-31 data validacao = 0000-00-00 observacoes = ',3,'update `atividade` set `nome_atividade` = \'atividade do projeto da vanessa\', `status_atividade` = \'S\', `id_projeto` = \'3\', `data_inicio_atividade` = \'2017-12-31\', `data_fim_atividade` = \'2017-12-31\', `data_validacao_atividade` = \'\', `observacoes_atividade` = \'\' where id_atividade = 30','Atividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(219,'2017-03-20 18:38:58','','',3,'INSERT INTO `sub_atividade`(`nome_sub_atividade`, `status_sub_atividade`, `id_atividade`, `data_inicio_sub_atividade`, `data_fim_sub_atividade`, `data_validacao_sub_atividade`, `observacoes_sub_atividade`) VALUES (\'subatividade do projeto da vanessa\',\'S\',\'30\',\'2017-12-01\',\'2017-12-30\',\'\',\'\')','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(220,'2017-03-20 18:41:07','','',3,'INSERT INTO `sub_atividade`(`nome_sub_atividade`, `status_sub_atividade`, `id_atividade`, `data_inicio_sub_atividade`, `data_fim_sub_atividade`, `data_validacao_sub_atividade`, `observacoes_sub_atividade`) VALUES (\'segunda sub atividade do projeto da vanessa\',\'S\',\'30\',\'2017-12-31\',\'2017-12-31\',\'\',\'\')','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(221,'2017-03-22 12:21:34','','',3,'INSERT INTO `atividades_padroes`(`nome_atividades_padroes`, `descricao_atividades_padroes`, `ie_obrigatorio_atividades_padroes`, `id_pmbok_versao`) VALUES (\'teste atividade padrao 2\',\'esta Ã© uma atividade teste 2\',\'N\',\'1\')','AtividadePadrao','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(222,'2017-03-22 12:21:58','','',3,'INSERT INTO `atividades_padroes`(`nome_atividades_padroes`, `descricao_atividades_padroes`, `ie_obrigatorio_atividades_padroes`, `id_pmbok_versao`) VALUES (\'testando a 3 atividade padrao\',\'vamos ver como reage\',\'S\',\'1\')','AtividadePadrao','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(223,'2017-03-22 18:33:42','','',3,'INSERT INTO `sub_atividades_padroes`(`nome_sub_atividade_padroes`, `descricao_sub_atividades_padroes`, `ie_obrigatorio_sub_atividades_padroes`, `id_atividade_padroes`) VALUES (\'teste de sub atividade 2\',\'teste de sub atividade 2\',\'S\',\'3\')','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(224,'2017-03-22 18:33:56','','',3,'INSERT INTO `sub_atividades_padroes`(`nome_sub_atividade_padroes`, `descricao_sub_atividades_padroes`, `ie_obrigatorio_sub_atividades_padroes`, `id_atividade_padroes`) VALUES (\'teste de sub atividade 3\',\'teste de sub atividade 3\',\'N\',\'3\')','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(225,'2017-03-22 21:38:22','','',3,'INSERT INTO `sub_atividades_padroes`(`nome_sub_atividade_padroes`, `descricao_sub_atividades_padroes`, `ie_obrigatorio_sub_atividades_padroes`, `id_atividade_padroes`) VALUES (\'teste de sub atividade 4\',\'teste de sub atividade 4\',\'N\',\'3\')','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(226,'2017-03-22 21:38:37','','',3,'INSERT INTO `sub_atividades_padroes`(`nome_sub_atividade_padroes`, `descricao_sub_atividades_padroes`, `ie_obrigatorio_sub_atividades_padroes`, `id_atividade_padroes`) VALUES (\'teste de sub atividade 5\',\'teste de sub atividade 5\',\'S\',\'4\')','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(227,'2017-03-22 21:38:52','','',3,'INSERT INTO `sub_atividades_padroes`(`nome_sub_atividade_padroes`, `descricao_sub_atividades_padroes`, `ie_obrigatorio_sub_atividades_padroes`, `id_atividade_padroes`) VALUES (\'teste de sub atividade 6\',\'teste de sub atividade 6\',\'S\',\'4\')','Subatividade','Codigo Retornado: 00000 Mensagem retornada: Sucesso'),(228,'2017-03-22 22:46:38',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'testando a 3 atividade padrao\',\'\',\'\',\'\',\'\',\'\',\'\')','Atividade','Codigo Retornado: 23000 Mensagem retornada: Cannot add or update a child row: a foreign key constraint fails (`cronograma_tfc`.`atividade`, CONSTRAINT `id_projeto` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION)'),(229,'2017-03-22 23:02:44',NULL,NULL,3,'INSERT INTO `atividade`(`nome_atividade`, `status_atividade`, `id_projeto`, `data_inicio_atividade`, `data_fim_atividade`, `data_validacao_atividade`, `observacoes_atividade`) VALUES (\'testando a 3 atividade padrao\',\'\',\'\',\'\',\'\',\'\',\'\')','Atividade','Codigo Retornado: 23000 Mensagem retornada: Cannot add or update a child row: a foreign key constraint fails (`cronograma_tfc`.`atividade`, CONSTRAINT `id_projeto` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION)');
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
INSERT INTO `perfil_do_usuario` VALUES (1,3),(1,39),(3,39),(2,40);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto`
--

LOCK TABLES `projeto` WRITE;
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
INSERT INTO `projeto` VALUES (2,'test','Selecione','2017-02-23',3,39,1),(3,'Projeto teste da vanessa','A','2017-03-23',3,40,1),(6,'este Ã© um teste','A',NULL,3,40,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_atividade`
--

LOCK TABLES `sub_atividade` WRITE;
/*!40000 ALTER TABLE `sub_atividade` DISABLE KEYS */;
INSERT INTO `sub_atividade` VALUES (1,'teste 3','NE',1,'2017-12-31','2017-12-31','2017-12-31','teste'),(2,'subatividade do projeto da vanessa','E',30,'2017-12-01','2017-12-30','2017-03-24',''),(3,'segunda sub atividade do projeto da vanessa','E',30,'2017-12-31','2017-12-31','2017-03-24',''),(4,'teste','NE',36,'2017-12-31','2017-12-31','2017-12-31','teste');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_atividades_padroes`
--

LOCK TABLES `sub_atividades_padroes` WRITE;
/*!40000 ALTER TABLE `sub_atividades_padroes` DISABLE KEYS */;
INSERT INTO `sub_atividades_padroes` VALUES (1,'teste','teste','S',2),(2,'teste de sub atividade 2','teste de sub atividade 2','S',3),(3,'teste de sub atividade 3','teste de sub atividade 3','N',3),(4,'teste de sub atividade 4','teste de sub atividade 4','N',3),(5,'teste de sub atividade 5','teste de sub atividade 5','S',4),(6,'teste de sub atividade 6','teste de sub atividade 6','S',4);
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'gustavo','gustavo','gustav','gustavo@gustavo.com',NULL),(39,'teste','teste','teste','teste@teste',NULL),(40,'vanessa','vanessa','vanessa','vanessa@vanessa.com',NULL);
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
/*!50003 DROP FUNCTION IF EXISTS `obter_projeto_subatividade` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `obter_projeto_subatividade`(id_subatividade integer) RETURNS int(11)
BEGIN

declare id_projeto integer;

SELECT a.id_projeto
into id_projeto
FROM sub_atividade sa, atividade a
where sa.id_atividade = a.id_atividade
and sa.id_sub_atividade = id_subatividade;


RETURN id_projeto;
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

-- Dump completed on 2017-03-24  2:44:53
