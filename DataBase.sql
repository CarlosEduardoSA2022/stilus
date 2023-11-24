-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: stilus
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `prd_id` int(10) NOT NULL AUTO_INCREMENT,
  `prd_nome` varchar(200) NOT NULL,
  `prd_avaliacao` decimal(5,1) DEFAULT NULL,
  `prd_descricao` varchar(2000) DEFAULT NULL,
  `prd_preco` decimal(15,2) NOT NULL,
  `prd_quantidade` int(11) NOT NULL DEFAULT 0,
  `prd_ativo` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`prd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_imagem`
--

DROP TABLE IF EXISTS `produto_imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto_imagem` (
  `pri_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pri_produto_id` int(11) DEFAULT NULL,
  `pri_caminho_imagem` varchar(155) DEFAULT NULL,
  `pri_nome_imagem` varchar(155) DEFAULT NULL,
  `pri_padrao` tinyint(4) DEFAULT 0,
  `pri_ativa` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`pri_id`),
  KEY `fk_produto_imagem` (`pri_produto_id`),
  CONSTRAINT `fk_produto_imagem` FOREIGN KEY (`pri_produto_id`) REFERENCES `produto` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_imagem`
--

LOCK TABLES `produto_imagem` WRITE;
/*!40000 ALTER TABLE `produto_imagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto_imagem` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `usuario_tipo`
--

DROP TABLE IF EXISTS `usuario_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_tipo` (
  `tus_id` int(10) NOT NULL AUTO_INCREMENT,
  `tus_nome` varchar(45) DEFAULT NULL,
  `tus_ativo` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`tus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_tipo`
--

LOCK TABLES `usuario_tipo` WRITE;
/*!40000 ALTER TABLE `usuario_tipo` DISABLE KEYS */;
INSERT INTO `usuario_tipo` VALUES (1,'Administrador',1),(2,'Estoquista',1),(3,'Cliente',1);
/*!40000 ALTER TABLE `usuario_tipo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;


--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `usr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usr_nome` varchar(155) NOT NULL,
  `usr_email` varchar(155) NOT NULL,
  `usr_cpf` varchar(11) NOT NULL,
  `usr_senha` varchar(60) NOT NULL,
  `usr_usuario_tipo_id` int(11) DEFAULT NULL,
  `usr_ativo` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `usr_cpf_UNIQUE` (`usr_cpf`),
  UNIQUE KEY `usr_email_UNIQUE` (`usr_email`),
  KEY `fk_usuario_tipo` (`usr_usuario_tipo_id`),
  CONSTRAINT `fk_usuario_tipo` FOREIGN KEY (`usr_usuario_tipo_id`) REFERENCES `usuario_tipo` (`tus_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'José da Silva','jose@silva.com','11111111111','$2y$10$fGziUjx0Zn06SZVOYy07S.RjdUgme5jyqP9RxKZLXobYHZZXMCSpi',1,1),(2,'Maria da Silva','maria@silva.com','22222222222','$2y$10$fGziUjx0Zn06SZVOYy07S.RjdUgme5jyqP9RxKZLXobYHZZXMCSpi',2,1),(3,'João da Silva','joao@silva.com','33333333333','$2y$10$fGziUjx0Zn06SZVOYy07S.RjdUgme5jyqP9RxKZLXobYHZZXMCSpi',3,0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-24 14:52:48
