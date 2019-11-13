-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: funerales_i
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE Database funerales_i;
use funerales_i;
--
-- Table structure for table `ataudes`
--

DROP TABLE IF EXISTS `ataudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ataudes` (
  `idAtaudes` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Imagen` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Precio` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  PRIMARY KEY (`idAtaudes`,`Usuarios_idUsuarios`),
  KEY `fk_Ataudes_Usuarios_idx` (`Usuarios_idUsuarios`),
  CONSTRAINT `fk_Ataudes_Usuarios` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ataudes`
--

LOCK TABLES `ataudes` WRITE;
/*!40000 ALTER TABLE `ataudes` DISABLE KEYS */;
/*!40000 ALTER TABLE `ataudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenido`
--

DROP TABLE IF EXISTS `contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `contenido` (
  `idContenido` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Titulo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` longtext COLLATE utf8_spanish2_ci,
  `Descipcion2` longtext COLLATE utf8_spanish2_ci,
  `Descripcion3` longtext COLLATE utf8_spanish2_ci,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `TamañoTitulo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idContenido`,`Usuarios_idUsuarios`),
  KEY `fk_Contenido_Usuarios1_idx` (`Usuarios_idUsuarios`),
  CONSTRAINT `fk_Contenido_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenido`
--

LOCK TABLES `contenido` WRITE;
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obituarios`
--

DROP TABLE IF EXISTS `obituarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `obituarios` (
  `idObituarios` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Imagen` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  PRIMARY KEY (`idObituarios`,`Usuarios_idUsuarios`),
  KEY `fk_Obituarios_Usuarios1_idx` (`Usuarios_idUsuarios`),
  CONSTRAINT `fk_Obituarios_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obituarios`
--

LOCK TABLES `obituarios` WRITE;
/*!40000 ALTER TABLE `obituarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `obituarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `NombrUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Contraseña` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'funerales_i'
--

--
-- Dumping routines for database 'funerales_i'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-12 20:20:30
