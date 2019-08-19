CREATE DATABASE  IF NOT EXISTS `sistemabiblioteca` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistemabiblioteca`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: sistemabiblioteca
-- ------------------------------------------------------
-- Server version	8.0.16

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

--
-- Table structure for table `autorlibro`
--

DROP TABLE IF EXISTS `autorlibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `autorlibro` (
  `autcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla codigo de autor:',
  `autnom` varchar(40) NOT NULL COMMENT 'Nombre del autor: campo obligatorio',
  `autape` varchar(40) DEFAULT NULL COMMENT 'Apellido del autor: campo obligatorio',
  `autseud` varchar(45) DEFAULT NULL COMMENT 'Nombre seudonimo literario del autor: nombre del autor con el cual es conocido en la comunidad literaria',
  PRIMARY KEY (`autcod`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autorlibro`
--

LOCK TABLES `autorlibro` WRITE;
/*!40000 ALTER TABLE `autorlibro` DISABLE KEYS */;
INSERT INTO `autorlibro` VALUES (27,'HOMERO','ARISTOCRATA','HOMERO'),(28,'ANN ','RADCLIFFE','ANN WARD '),(29,'GABRIEL JOSé','GARCíA MáRQUEZ','GABITO'),(30,'VICENTE','ALEIXANDRE','VICENTE PíO'),(31,'ISAAC ','BASHEVIS SINGER','BASHEVIS'),(32,'OCTAVIO PAZ',' PAZ LOZANO','OCTAVIO PAZ'),(33,'GABRIELA ','MISTRAL','LUCILA GODOY ALCAYAGA'),(34,'JUAN RAMóN','JIMéNEZ MANTECóN','JUAN RAMóN JIMéNEZ'),(35,'MIGUEL ÁNGEL','ASTURIAS ROSALES','MIGUEL ÁNGEL ASTURIAS'),(36,'RICARDO ELIéCER','NEFTALí REYES BASOALTO','PABLO NERUDA'),(37,'Edgardo Alfredo ',' Espino Najarro','Alfredo Espino');
/*!40000 ALTER TABLE `autorlibro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `bitacora` (
  `bircod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Bitacora código: llave primaria de la tabla bitacora',
  `bitfec` datetime DEFAULT NULL COMMENT 'Bitacora fecha: fecha y hora de la actividad realizada',
  `bitdes` varchar(450) DEFAULT NULL COMMENT 'Bitacora descripción: actividad realizada',
  `bitusucod` varchar(45) DEFAULT NULL COMMENT 'Bitacora código de usuario: usuario que realizo la actividad',
  `bitnomlib` varchar(45) DEFAULT NULL COMMENT 'Bitacora nombre libreria: nombre de la libreria',
  `bitnombre` varchar(45) NOT NULL,
  PRIMARY KEY (`bircod`)
) ENGINE=InnoDB AUTO_INCREMENT=826 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (734,'2019-08-17 21:37:33',' se deslogeo del sistema exitosamente ','1','---','JOEL VILLALTA'),(735,'2019-08-17 21:37:45','ingreso exitosamente al sistema','6','---','Administrador Institudo'),(736,'2019-08-17 22:59:51','ingreso exitosamente al sistema','6','---','Administrador Institudo'),(737,'2019-08-17 23:11:59',' ingreso un nuevo Usuario: BRANDON','BIBLIOTECARIO','---','Administrador Institudo'),(738,'2019-08-17 23:12:14',' se deslogeo del sistema exitosamente ','6','---','Administrador Institudo'),(739,'2019-08-17 23:16:15','ingreso exitosamente al sistema','6','---','Administrador Institudo'),(740,'2019-08-17 23:17:21',' se deslogeo del sistema exitosamente ','6','---','Administrador Institudo'),(741,'2019-08-17 23:20:55','ingreso exitosamente al sistema','6','---','Administrador Institudo'),(742,'2019-08-17 23:21:17',' se deslogeo del sistema exitosamente ','6','---','Administrador Institudo'),(743,'2019-08-17 23:21:23','ingreso exitosamente al sistema','6','---','Administrador Institudo'),(744,'2019-08-17 23:25:13','Ingreso una nueva editorial al sistema: Pearson','6','---','Administrador Institudo'),(745,'2019-08-17 23:30:12','Ingreso una nueva editorial al sistema: ThomsonReuters','6','---','Administrador Institudo'),(746,'2019-08-17 23:31:07',' ingreso un nuevo editorial: RELX GROUP','6','---','Administrador Institudo'),(747,'2019-08-17 23:31:25',' ingreso un nuevo editorial: WOLTERS KLUWER','6','---','Administrador Institudo'),(748,'2019-08-17 23:31:41',' ingreso un nuevo editorial: PENGUIN RANDOM HOUSE','6','---','Administrador Institudo'),(749,'2019-08-17 23:32:01',' ingreso un nuevo editorial: 	CHINSOUTH PUBLISHING & MEDIA GROUP CO., LTD','6','---','Administrador Institudo'),(750,'2019-08-17 23:32:16',' ingreso un nuevo editorial: GRUPO PLANETA','6','---','Administrador Institudo'),(751,'2019-08-17 23:32:32',' ingreso un nuevo editorial: SCHOLASTIC','6','---','Administrador Institudo'),(752,'2019-08-17 23:35:00',' ingreso un nuevo editorial: CHINA PUBLISHING GROUP CORPORATION','6','---','Administrador Institudo'),(753,'2019-08-17 23:35:22',' ingreso un nuevo editorial: GRUPO SANTILLANA','6','---','Administrador Institudo'),(754,'2019-08-17 23:35:54',' ingreso un nuevo editorial: EDITORA FTD','6','---','Administrador Institudo'),(755,'2019-08-17 23:36:17',' ingreso un nuevo editorial: CORNELSEN','6','---','Administrador Institudo'),(756,'2019-08-17 23:36:36',' ingreso un nuevo editorial: SANOMA','6','---','Administrador Institudo'),(757,'2019-08-17 23:37:04','ha editado el editorial: PEARSON  Codigo: 6','6','---','Administrador Institudo'),(758,'2019-08-17 23:37:08','ha editado el editorial: THOMSONREUTERS  Codigo: 7','6','---','Administrador Institudo'),(759,'2019-08-17 23:38:31',' ingreso un nuevo editorial: EDITORIAL MEDICA PANAMERICANA SA','6','---','Administrador Institudo'),(760,'2019-08-17 23:39:04',' ingreso un nuevo editorial: EDITORIAL VICENS VIVES SA.','6','---','Administrador Institudo'),(761,'2019-08-17 23:39:56',' ingreso un nuevo Estante: EST1','6','---','Administrador Institudo'),(762,'2019-08-17 23:40:02',' ingreso un nuevo Estante: EST2','6','---','Administrador Institudo'),(763,'2019-08-17 23:40:08',' ingreso un nuevo Estante: EST3','6','---','Administrador Institudo'),(764,'2019-08-17 23:40:13',' ingreso un nuevo Estante: EST4','6','---','Administrador Institudo'),(765,'2019-08-17 23:40:21',' ingreso un nuevo Estante: EST5','6','---','Administrador Institudo'),(766,'2019-08-17 23:40:28',' ingreso un nuevo Estante: EST6','6','---','Administrador Institudo'),(767,'2019-08-17 23:40:36',' ingreso un nuevo Estante: EST7','6','---','Administrador Institudo'),(768,'2019-08-17 23:40:50',' ingreso un nuevo Estante: EST8','6','---','Administrador Institudo'),(769,'2019-08-17 23:40:59',' ingreso un nuevo Estante: EST9','6','---','Administrador Institudo'),(770,'2019-08-17 23:41:06',' ingreso un nuevo Estante: EST10','6','---','Administrador Institudo'),(771,'2019-08-17 23:47:02',' ingreso un nuevo autor: Homero Aristocrata','6','---','Administrador Institudo'),(772,'2019-08-17 23:47:59',' ingreso un nuevo codigo dewey: GENERALIDADES','6','---','Administrador Institudo'),(773,'2019-08-17 23:48:19',' ingreso un nuevo codigo dewey: FILOSOFÍAS Y DISCIPLINAS AFINES','6','---','Administrador Institudo'),(774,'2019-08-17 23:48:33',' ingreso un nuevo codigo dewey: CIENCIAS PURAS','6','---','Administrador Institudo'),(775,'2019-08-17 23:48:59','ha editado la categoria dewey: RELIGIÓN  Codigo: 5','6','---','Administrador Institudo'),(776,'2019-08-17 23:49:11','elimino la categoria RELIGIÓN','6','---','Administrador Institudo'),(777,'2019-08-17 23:49:18',' ingreso un nuevo codigo dewey: RELIGIÓN','6','---','Administrador Institudo'),(778,'2019-08-17 23:49:45',' ingreso un nuevo codigo dewey: CIENCIAS SOCIALES','6','---','Administrador Institudo'),(779,'2019-08-17 23:50:07',' ingreso un nuevo codigo dewey: LENGUAS','6','---','Administrador Institudo'),(780,'2019-08-17 23:50:29',' ingreso un nuevo codigo dewey: CIENCIAS PURAS','6','---','Administrador Institudo'),(781,'2019-08-17 23:52:16',' ingreso un nuevo codigo dewey: CIENCIAS APLICADAS (TECNOLOGÍA)','6','---','Administrador Institudo'),(782,'2019-08-17 23:52:30',' ingreso un nuevo codigo dewey: BELLAS ARTES','6','---','Administrador Institudo'),(783,'2019-08-17 23:52:50',' ingreso un nuevo codigo dewey: LITERATURA','6','---','Administrador Institudo'),(784,'2019-08-17 23:55:35','Ingreso un nuevo libro a la base de datos nombre: Ilíada','6','---','Administrador Institudo'),(785,'2019-08-17 23:55:48','ha agregado una nueva imagen de portada: Ilíada Codigo: 24','6','---','Administrador Institudo'),(786,'2019-08-17 23:59:28',' ingreso un nuevo autor: Ann  Radcliffe','6','---','Administrador Institudo'),(787,'2019-08-17 23:59:48','Ingreso un nuevo libro a la base de datos nombre: El romance del bosque','6','---','Administrador Institudo'),(788,'2019-08-18 00:01:51','ha agregado una nueva imagen de portada: El romance del bosque Codigo: 25','6','---','Administrador Institudo'),(789,'2019-08-18 00:05:19',' ingreso un nuevo autor: Gabriel José García Márquez','6','---','Administrador Institudo'),(790,'2019-08-18 00:05:29','Ingreso un nuevo libro a la base de datos nombre: Cien años de soledad','6','---','Administrador Institudo'),(791,'2019-08-18 00:05:58','ha agregado una nueva imagen de portada: Cien años de soledad Codigo: 26','6','---','Administrador Institudo'),(792,'2019-08-18 00:09:06',' ingreso un nuevo autor: VICENTE ALEIXANDRE','6','---','Administrador Institudo'),(793,'2019-08-18 00:09:13','ha editado el autor: GABRIEL JOSé GARCíA MáRQUEZ Codigo: 29','6','---','Administrador Institudo'),(794,'2019-08-18 00:09:17','ha editado el autor: ANN  RADCLIFFE Codigo: 28','6','---','Administrador Institudo'),(795,'2019-08-18 00:09:21','ha editado el autor: HOMERO ARISTOCRATA Codigo: 27','6','---','Administrador Institudo'),(796,'2019-08-18 00:10:22',' ingreso un nuevo autor: ISAAC  BASHEVIS SINGER','6','---','Administrador Institudo'),(797,'2019-08-18 00:12:00',' ingreso un nuevo autor: OCTAVIO PAZ  PAZ LOZANO','6','---','Administrador Institudo'),(798,'2019-08-18 00:13:25',' ingreso un nuevo autor: GABRIELA  MISTRAL','6','---','Administrador Institudo'),(799,'2019-08-18 00:15:08',' ingreso un nuevo autor: JUAN RAMóN JIMéNEZ MANTECóN','6','---','Administrador Institudo'),(800,'2019-08-18 00:16:11',' ingreso un nuevo autor: MIGUEL ÁNGEL ASTURIAS ROSALES','6','---','Administrador Institudo'),(801,'2019-08-18 00:17:07',' ingreso un nuevo autor: RICARDO ELIéCER NEFTALí REYES BASOALTO','6','---','Administrador Institudo'),(802,'2019-08-18 16:15:16','ingreso exitosamente al sistema','6','---','Administrador Institudo'),(803,'2019-08-18 16:15:54','ha editado libro: Cien años de soledad Codigo: 26','6','---','Administrador Institudo'),(804,'2019-08-18 16:16:37','ha editado libro: Cien años de soledad Codigo: 26','6','---','Administrador Institudo'),(805,'2019-08-18 16:17:04','ha editado libro: Cien años de soledad Codigo: 26','6','---','Administrador Institudo'),(806,'2019-08-18 16:20:18',' ingreso un nuevo autor: Edgardo Alfredo   Espino Najarro','6','---','Administrador Institudo'),(807,'2019-08-18 16:22:23','Ingreso un nuevo libro a la base de datos nombre: Jícaras tristes','6','---','Administrador Institudo'),(808,'2019-08-18 16:23:17','ha agregado una nueva imagen de portada: Jícaras tristes Codigo: 27','6','---','Administrador Institudo'),(809,'2019-08-18 16:52:21',' ingreso un nuevo equipo: COMPUTADORA PORTáTIL','6','---','Administrador Institudo'),(810,'2019-08-18 16:54:13','ha editado el equipo: 0108  Codigo: COMPUTADORA PORTáTIL','6','---','Administrador Institudo'),(811,'2019-08-18 16:54:23','ha editado el equipo: 0108  Codigo: COMPUTADORA PORTÁTIL','6','---','Administrador Institudo'),(812,'2019-08-18 17:00:18',' ingreso un nuevo equipo: EQUIPO DE CóMPUTO','6','---','Administrador Institudo'),(813,'2019-08-18 17:25:08',' ingreso un nuevo equipo: EQUIPO DE COMPUTO','6','---','Administrador Institudo'),(814,'2019-08-18 17:28:43',' ingreso un nuevo equipo: COMPUTADORA PORTÁTIL','6','---','Administrador Institudo'),(815,'2019-08-18 17:47:21',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),(816,'2019-08-18 17:49:55','ha editado el ejemplar: 88160-800-00001','6','---','Administrador Institudo'),(817,'2019-08-18 17:50:46','ha editado el ejemplar: 88160-800-00001','6','---','Administrador Institudo'),(818,'2019-08-18 17:57:10',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),(819,'2019-08-18 18:13:22',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),(820,'2019-08-18 19:23:18',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),(821,'2019-08-18 19:24:40',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),(822,'2019-08-18 19:26:15',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),(823,'2019-08-18 22:02:52',' ingreso un nuevo Usuario: ELIAS','vm11001','---','Administrador Institudo'),(824,'2019-08-18 22:05:29','ha editado el usuario: ELIAS  Codigo: 8','6','---','Administrador Institudo'),(825,'2019-08-18 22:07:24',' ingreso un nuevo Usuario: MARIA','MC501','---','Administrador Institudo');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bolsaprestamo`
--

DROP TABLE IF EXISTS `bolsaprestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `bolsaprestamo` (
  `solcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'sss',
  `usucod` int(11) NOT NULL COMMENT 'codigo del usuario LLAVE FORANEA 1',
  `libcod` int(11) NOT NULL COMMENT 'codigo de Libro LLAVE FORANEA',
  `solfec` datetime NOT NULL COMMENT 'fecha de ultima actualizacion',
  `libcantidad` int(11) NOT NULL COMMENT 'cantidad de unidades solicitados',
  `solfecenviar` datetime NOT NULL COMMENT 'Solocitud en la que la solicutud es enviada a prestamo',
  `solestado` int(10) unsigned NOT NULL COMMENT 'estado de la solicitud 0= solicitud no activa 1=solicitud enviada y pendiente',
  PRIMARY KEY (`solcod`),
  KEY `FK_bolsaprestamo_usucod` (`usucod`),
  KEY `FK_bolsaprestamo_libcod` (`libcod`),
  CONSTRAINT `FK_bolsaprestamo_libcod` FOREIGN KEY (`libcod`) REFERENCES `libros` (`libcod`),
  CONSTRAINT `FK_bolsaprestamo_usucod` FOREIGN KEY (`usucod`) REFERENCES `usuario` (`usucod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla modelo carrito de compras para realizar prestamos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bolsaprestamo`
--

LOCK TABLES `bolsaprestamo` WRITE;
/*!40000 ALTER TABLE `bolsaprestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `bolsaprestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallesprestamoequipo`
--

DROP TABLE IF EXISTS `detallesprestamoequipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `detallesprestamoequipo` (
  `detcodequi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Detalle codigo equipo: llave primaria de la tabla detalleprestamoequipo\\n',
  `prestcodequi` int(11) NOT NULL,
  `existcod` int(11) NOT NULL,
  `detequiest` int(11) NOT NULL DEFAULT '0' COMMENT 'ESTADO PRESTAMO INDIVIDUAL EQUIPO 0=activo 1=devuelto',
  PRIMARY KEY (`detcodequi`),
  KEY `fk_detallesPrestamoEquipo_resumenEquipoPrestamo1_idx` (`prestcodequi`),
  KEY `fk_detallesPrestamoEquipo_existenciaEquipo1_idx` (`existcod`),
  CONSTRAINT `fk_detallesPrestamoEquipo_existenciaEquipo1` FOREIGN KEY (`existcod`) REFERENCES `existenciaequipo` (`existcod`),
  CONSTRAINT `fk_detallesPrestamoEquipo_resumenEquipoPrestamo1` FOREIGN KEY (`prestcodequi`) REFERENCES `resumenequipoprestamo` (`prestcodequi`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallesprestamoequipo`
--

LOCK TABLES `detallesprestamoequipo` WRITE;
/*!40000 ALTER TABLE `detallesprestamoequipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallesprestamoequipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallesprestamolibro`
--

DROP TABLE IF EXISTS `detallesprestamolibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `detallesprestamolibro` (
  `detcodlib` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Detalle codigo libro: llave primaria de la tabla prestamo libro',
  `prestcodlib` int(11) NOT NULL,
  `ejemcod` int(11) NOT NULL,
  `detlibest` int(11) NOT NULL DEFAULT '0' COMMENT 'ESTADO PRESTAMO LIBRO 0 activo 1=devuelto',
  PRIMARY KEY (`detcodlib`),
  KEY `fk_detallesPrestamoLibro_resumenLibroPrestamo1_idx` (`prestcodlib`),
  KEY `fk_detallesPrestamoLibro_ejemplaresLibros1_idx` (`ejemcod`),
  CONSTRAINT `fk_detallesPrestamoLibro_ejemplaresLibros1` FOREIGN KEY (`ejemcod`) REFERENCES `ejemplareslibros` (`ejemcod`),
  CONSTRAINT `fk_detallesPrestamoLibro_resumenLibroPrestamo1` FOREIGN KEY (`prestcodlib`) REFERENCES `resumenlibroprestamo` (`prestcodlib`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallesprestamolibro`
--

LOCK TABLES `detallesprestamolibro` WRITE;
/*!40000 ALTER TABLE `detallesprestamolibro` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallesprestamolibro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deweyclasificacion`
--

DROP TABLE IF EXISTS `deweyclasificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `deweyclasificacion` (
  `dewcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla clasificacion de dewey',
  `dewcodcla` varchar(25) NOT NULL COMMENT 'Codigo de la clasificacion de dewey: numero de registro de dewey ',
  `dewtipcla` varchar(45) NOT NULL COMMENT 'Tipo de la clasificacion de dewey: nombres de los tipos de la clasificacion de dewey',
  PRIMARY KEY (`dewcod`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deweyclasificacion`
--

LOCK TABLES `deweyclasificacion` WRITE;
/*!40000 ALTER TABLE `deweyclasificacion` DISABLE KEYS */;
INSERT INTO `deweyclasificacion` VALUES (3,'000','GENERALIDADES'),(4,'100','FILOSOFÍAS Y DISCIPLINAS AFINES'),(6,'200','RELIGIÓN'),(7,'300','CIENCIAS SOCIALES'),(8,'400','LENGUAS'),(9,'500','CIENCIAS PURAS'),(10,'600','CIENCIAS APLICADAS (TECNOLOGÍA)'),(11,'700','BELLAS ARTES'),(12,'800','LITERATURA');
/*!40000 ALTER TABLE `deweyclasificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorialeslibros`
--

DROP TABLE IF EXISTS `editorialeslibros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `editorialeslibros` (
  `editcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla editorial:',
  `editnom` varchar(60) NOT NULL COMMENT 'Nombre de la editorial:',
  PRIMARY KEY (`editcod`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorialeslibros`
--

LOCK TABLES `editorialeslibros` WRITE;
/*!40000 ALTER TABLE `editorialeslibros` DISABLE KEYS */;
INSERT INTO `editorialeslibros` VALUES (6,'PEARSON'),(7,'THOMSONREUTERS'),(8,'RELX GROUP'),(9,'WOLTERS KLUWER'),(10,'PENGUIN RANDOM HOUSE'),(11,'	CHINSOUTH PUBLISHING & MEDIA GROUP CO., LTD'),(12,'GRUPO PLANETA'),(13,'SCHOLASTIC'),(14,'CHINA PUBLISHING GROUP CORPORATION'),(15,'GRUPO SANTILLANA'),(16,'EDITORA FTD'),(17,'CORNELSEN'),(18,'SANOMA'),(19,'EDITORIAL MEDICA PANAMERICANA SA'),(20,'EDITORIAL VICENS VIVES SA.');
/*!40000 ALTER TABLE `editorialeslibros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ejemplareslibros`
--

DROP TABLE IF EXISTS `ejemplareslibros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ejemplareslibros` (
  `ejemcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla ejemplares libros:',
  `ejemcodreg` varchar(100) NOT NULL COMMENT 'Codigo de registro del ejemplar: numero del codigo de registro del inventario de los lbros asignado por la institucion',
  `ejemfecadq` date NOT NULL COMMENT 'Fecha de adquisicion del ejemplar:  fecha exacta del dia en que se obtuvo el ejemplar',
  `ejemtipadq` int(11) NOT NULL COMMENT 'Tipo de  adquisicion del ejemplar: campo que muestra si el ejemplar 0=Donacion 1=Compra',
  `ejemdetaqu` varchar(550) DEFAULT NULL COMMENT 'Detalles de la adquisicion del ejemplar: descripncion de la compra o donacion del ejemplar, si el caso fue donacion detallar quien fue el autor de la donacion',
  `ejempruni` varchar(15) DEFAULT NULL COMMENT 'Precio unitario del ejemplar: Precio en dolares del ejemplar adquirido si este fue comprado por la institucion',
  `ejemestu` int(11) NOT NULL DEFAULT '0' COMMENT 'Estatus del ejemplar: estado del libro si  0=Disponible  1=Prestado 2=No disponible 3=Extraviado',
  `ejemconfis` int(11) NOT NULL COMMENT 'Condicion fisica del ejemplar: si el ejemplar esta en 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala',
  `ejemdetcon` varchar(550) DEFAULT NULL COMMENT 'Detalle de la condicion ejemplar: descripcion de la condicion fisica del ejemplar ',
  `ejemres` varchar(45) DEFAULT NULL COMMENT 'Ejemplar reserva: permite reservar un libro unicamente si estan en proceso de prestamo los estado del campos son ''0''=sin reserva ''1''=con reserva',
  `ejemcodbar` varchar(45) DEFAULT NULL,
  `estcod` int(11) NOT NULL,
  `libcod` int(11) NOT NULL,
  PRIMARY KEY (`ejemcod`),
  KEY `fk_ejemplaresLibros_Estante1_idx` (`estcod`),
  KEY `fk_ejemplaresLibros_Libros1_idx` (`libcod`),
  CONSTRAINT `fk_ejemplaresLibros_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`),
  CONSTRAINT `fk_ejemplaresLibros_Libros1` FOREIGN KEY (`libcod`) REFERENCES `libros` (`libcod`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejemplareslibros`
--

LOCK TABLES `ejemplareslibros` WRITE;
/*!40000 ALTER TABLE `ejemplareslibros` DISABLE KEYS */;
INSERT INTO `ejemplareslibros` VALUES (17,'88160-800-00001','2019-08-07',0,'EJEMPLAR DONADO POR EL COLEGIO CHAMPAGNAT','',0,0,'EJEMPLAR EN PERFECTO ESTADO, SIN EMBARGO LAS PAGINAS 45 Y 8',NULL,NULL,5,24),(18,'88160-800-00002','2019-07-30',0,'DONADO POR EL COLEGIO CHAMPAGNAT','',0,2,'EL EJEMPLAR NO TIENE TODAS LAS PAGINAS, FALTAN LAS PAGINA 6',NULL,NULL,5,24),(19,'88160-800-00001','2019-07-30',0,'DONACION POR PARTE DEL COLEGIO CHAMPAGNAT','',0,2,'PORTADA DESCOLORADA',NULL,NULL,5,26),(20,'88160-800-00002','2019-07-30',1,'','12',0,0,'SIN DETALLES',NULL,NULL,5,26),(21,'88160-800-00001','2019-07-29',0,'DONADO POR EL COLEGIO CHAMPAGNAT','',0,0,'SIN DETALLES',NULL,NULL,5,25),(22,'88160-800-00001','2019-07-29',0,'DONADO POR EL COLEGIO CHAMPAGNAT','',0,0,'SIN DETALLES',NULL,NULL,5,27);
/*!40000 ALTER TABLE `ejemplareslibros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `equipo` (
  `equicod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Equipo codigo: llave primaria de la tabla equipo',
  `equitip` varchar(45) NOT NULL,
  `equides` varchar(100) DEFAULT NULL COMMENT 'Equipo descripcion: Descripcion general del equipo',
  `equicodifi` varchar(100) DEFAULT NULL COMMENT 'Codificación para equipos: 01 MAQUINARIA Y EQUIPO DE OFICINA ',
  `equimg` varchar(450) DEFAULT NULL COMMENT 'Contiene la direccion de la imagen del equipo',
  PRIMARY KEY (`equicod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (2,'COMPUTADORA PORTÁTIL','COMPUTADORA DELL','0108',NULL),(3,'EQUIPO DE CóMPUTO','COMPUTADORA  PARA LOS ESTUDIANTES DE BIBLIOTECA','0114 ',NULL),(4,'EQUIPO DE COMPUTO','COMPUTADORA DE ESCRITORIO PARA MAESTROS','0114',NULL),(5,'COMPUTADORA PORTÁTIL','COMPUTADORA PORTATIL ASUS','0108',NULL);
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estante`
--

DROP TABLE IF EXISTS `estante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `estante` (
  `estcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Estante codigo: llave primaria de la tabla estante',
  `estdes` varchar(45) NOT NULL COMMENT 'Estante descripcion: Nombre del estante',
  PRIMARY KEY (`estcod`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estante`
--

LOCK TABLES `estante` WRITE;
/*!40000 ALTER TABLE `estante` DISABLE KEYS */;
INSERT INTO `estante` VALUES (5,'EST1'),(6,'EST2'),(7,'EST3'),(8,'EST4'),(9,'EST5'),(10,'EST6'),(11,'EST7'),(12,'EST8'),(13,'EST9'),(14,'EST10');
/*!40000 ALTER TABLE `estante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `existenciaequipo`
--

DROP TABLE IF EXISTS `existenciaequipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `existenciaequipo` (
  `existcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Existencia Codigo: llave primaria de la tabla existenciaEquipo',
  `existcodreg` varchar(100) NOT NULL COMMENT 'Existencia Codigo de registro: Codigo de registro de inventario de equipos',
  `existfecadq` date NOT NULL COMMENT 'existencia fecha de adquisicion: feecha en la cual se adquirio el equipo',
  `existtipadq` int(11) NOT NULL COMMENT 'Existencia tipo adquisicion: registra el tipo de adquisicion del equipo  0=Donacion 1=Compra',
  `existdetadq` varchar(450) DEFAULT NULL COMMENT 'Existencia detalle adquisicion: descripcion acerca de los detalles de la aquisicion del equipo',
  `existpreuni` varchar(45) DEFAULT NULL COMMENT 'Existencia precio unitario: precio unitario del equipo',
  `existestu` int(11) NOT NULL DEFAULT '0' COMMENT 'Existencia estatus: estado del equipo 0=Disponible 1=Prestado 2=Reparacion 3=Extraviado 4=No disponible',
  `existconfis` int(11) NOT NULL DEFAULT '0' COMMENT 'Existencia condicion fisica: condicion fisica del equipo 0=Optima 1=Muy buena 2=Buena 3=Mala',
  `existdesest` varchar(450) DEFAULT NULL COMMENT 'existencia descripcion equipo: descripcion detallada de las condiciones del quipo',
  `existcodbar` varchar(45) DEFAULT NULL,
  `estcod` int(11) NOT NULL,
  `equicod` int(11) NOT NULL,
  PRIMARY KEY (`existcod`),
  KEY `fk_existenciaEquipo_Estante1_idx` (`estcod`),
  KEY `fk_existenciaEquipo_Equipo1_idx` (`equicod`),
  CONSTRAINT `fk_existenciaEquipo_Equipo1` FOREIGN KEY (`equicod`) REFERENCES `equipo` (`equicod`),
  CONSTRAINT `fk_existenciaEquipo_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `existenciaequipo`
--

LOCK TABLES `existenciaequipo` WRITE;
/*!40000 ALTER TABLE `existenciaequipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `existenciaequipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros`
--

DROP TABLE IF EXISTS `libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `libros` (
  `libcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del libro: llave primaria de la tabla libros',
  `libtit` varchar(150) NOT NULL COMMENT 'Titulo del libro: Nombre del libro',
  `libdes` varchar(1050) NOT NULL COMMENT 'Descripcion del libro: campo que registra una pequeña reseña del contenido del libro',
  `libpor` varchar(450) NOT NULL COMMENT 'Portada del libro: Direccion de la imagen del libro registrada',
  `libfecedi` date DEFAULT NULL COMMENT 'Fecha de edicion del libro: o fecha de publicacion del libro',
  `libnumpag` int(15) DEFAULT NULL COMMENT 'Numero de paginas del libro: cantidad de paginas del libro',
  `libisbn` varchar(50) DEFAULT NULL COMMENT 'Isbn del libro: codigo internacional de identificacion del libro',
  `libfecreg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autcod` int(11) NOT NULL,
  `dewcod` int(11) NOT NULL,
  `editcod` int(11) NOT NULL,
  `libtags` varchar(450) NOT NULL DEFAULT '---',
  PRIMARY KEY (`libcod`),
  KEY `fk_Libros_deweyClasificacion1_idx` (`dewcod`),
  KEY `fk_Libros_editorialesLibros1_idx` (`editcod`),
  KEY `fk_Libros_detalleGeneroAutor1_idx` (`autcod`) USING BTREE,
  CONSTRAINT `fk_Libros_Autor1` FOREIGN KEY (`autcod`) REFERENCES `autorlibro` (`autcod`),
  CONSTRAINT `fk_Libros_deweyClasificacion1` FOREIGN KEY (`dewcod`) REFERENCES `deweyclasificacion` (`dewcod`),
  CONSTRAINT `fk_Libros_editorialesLibros1` FOREIGN KEY (`editcod`) REFERENCES `editorialeslibros` (`editcod`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` VALUES (24,'Ilíada','Homero es el poeta griego por antonomasia, el poeta divino que influyó decisivamente en el arte, la literatura, la lengua, la religión y la filosofía griegas. Su obra, memorizada por los escolares, ha dejado a través de los siglos una huella indeleble en la vida de los griegos. Homero llegó a Occidente de la mano de Petrarca, cuando este humanista adquirió los manuscritos de los dos inigualables poemas homéricos que, con gran dolor, no supo descifrar. El mensaje de la \"Ilíada\" está, sin embargo, ahora claro para nosotros: aunque los héroes hagan frente al inexorable hado que pesa sobre los mortales cosechando la gloria, nada hay sobre la tierra más miserable que el hombre. La presente edición restituye la obra a sus orígenes ofreciendo una traducción muy literal en verso. ','img/portadas/926423f315cf7ac9cc399736af7fdd962c0f1a.jpg','2018-09-06',1088,'978-84-376-2197-5','2019-08-18 05:55:35',27,12,6,'Tragedia griega,Literatura'),(25,'El romance del bosque','Si Horace Walpole puede considerarse el padre indiscutible de la novela gótica, Ann Radcliffe fue sin duda la madre. La ingeniosa y racionalista Ann Radcliffe evoca en sus obras los aspectos más sombríos y dramáticos de la naturaleza con una cierta poesía. Mediante una recargada ornamentación y una extravagante dramatización de las más variadas formas de transgresión (incesto, violación...), que prometían peligros inminentes, luego desplazados o incumplidos, lograba captar la atención del lector. Fue la más eximia representante de la escuela gótica y logró poner de moda aquel género en las postrimerías del siglo XVIII. Su influencia alcanzó a escritores como Byron, Shelley o las hermanas Brontë. ','img/portadas/63730336780.jpg','2019-01-30',592,'978-84-376-3650-4','2019-08-18 05:59:47',28,12,17,'Romance,Novela'),(26,'Cien años de soledad','1967. En Buenos Aires aparece la novela de un escritor colombiano de cuarenta años. No queda hoy lengua literaria a la que no haya sido traducida. \"Cien años de soledad\" no sólo cautiva a los lectores de cualquier condición: su impulso poderoso ha levantado las letras castellanas de todo un continente. Desvelar la magia de su prosa, acotar las arenas movedizas de su particular quehacer literario son tareas tan imposibles como dañinas; sí agradecerá el lector, en cambio, la aclaración de ciertas alusiones, la comprobación de la densidad que subyace a un texto aparentemente diáfano. No nos engañemos: son millones las páginas que han engendrado las de la novela, pero ante ella al lector no le queda otra actitud que la misma lectura devoradora y deslumbrada del último de los Aurelianos. ','img/portadas/410719cien-anos-de-soledad-garcia-marquez-sudamericana_MLA-F-3118290747_092012.jpg','2019-08-06',560,'978-84-376-0494-7','2019-08-18 06:05:29',29,12,16,'Literatura,Sigloxx'),(27,'Jícaras tristes',' El poeta niño, un idealista, un reservado, un romántico, un hombre sedicioso y acéfalo desvaído, propenso de lo más pulcro de  la vida. Por más sencillas que fuesen, por mas sencillas que parezcan, encuentra la ternura delicada de cada elemento que pudiese desnudarse y resaltar su belleza natural al margen de todo lo que le encerrase. Un impulsivo sentimental  atado en sus propias emociones, insigne en el arte de la poesía, la música y la pintura, aún que seria la poesía la que pasaría a inmortalizarlo.  Hablamos de Edgardo Alfredo Espino Najarro.\r\nCruel desenlace de su vida, rodeada de misterios, pero hecho que dio a luz el único legado que nos dejo Espino. Su obra jícaras tristes, que en mis condiciones como estudiante me atrevería a llamarla como un usufructo cultural, que bien podría, ser promocionada de manera más amplia con el fin de enriquecer la literatura salvadoreña.','img/portadas/664099Espino20001.jpg','2018-11-06',234,'978-84-376-2197-6','2019-08-18 22:22:23',37,12,18,'Obra,Literatura');
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumenequipoprestamo`
--

DROP TABLE IF EXISTS `resumenequipoprestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `resumenequipoprestamo` (
  `prestcodequi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Prestamo codigo de equipo: llave primaria de la tabla resumenPrestamoEquipo',
  `prestfecequi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Prestamo fecha de equipo:  fecha en la que se realizo el prestamo',
  `prestdevequi` date NOT NULL COMMENT 'Prestamo fecha equipo: fecha de devolucion del prestamo de equipo',
  `prestcomequi` varchar(150) DEFAULT NULL COMMENT 'Prestamo comentario equipo: comentarios agregados al proceso de prestamo de equipo',
  `prestestequi` int(11) NOT NULL COMMENT 'Prestamo estado equipo: estado del préstamo 0=Activo 1=Finalizado  3=en espera',
  `usucod` int(11) NOT NULL COMMENT 'Usuario codigo: llave foranea de la tabla usuarios',
  `usuCodBiblioEquipo` int(11) NOT NULL COMMENT 'USUARIO QUE REALIZA EL PROCESO DE PRESTAMO',
  `prestfechafinEquipo` date DEFAULT NULL COMMENT 'Fecha que se entrega todos los equipos, se cierra el prestamo',
  PRIMARY KEY (`prestcodequi`),
  KEY `fk_resumenEquipoPrestamo_Usuario1_idx` (`usucod`),
  CONSTRAINT `fk_resumenEquipoPrestamo_Usuario1` FOREIGN KEY (`usucod`) REFERENCES `usuario` (`usucod`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumenequipoprestamo`
--

LOCK TABLES `resumenequipoprestamo` WRITE;
/*!40000 ALTER TABLE `resumenequipoprestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `resumenequipoprestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumenlibroprestamo`
--

DROP TABLE IF EXISTS `resumenlibroprestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `resumenlibroprestamo` (
  `prestcodlib` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Prestamo codigo libro: llave primaria de la tabla resumen prestamo libros',
  `prestfeclib` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Prestamo fecha libro: fecha en la que es realizado el prestamo',
  `prestdevlib` date NOT NULL COMMENT 'Prestamo fecha de devolucion libro: fecha de la devolucion del prestamo del libro',
  `prestcomlib` varchar(255) DEFAULT NULL COMMENT 'Prestamo comentarios libro: Comentarios en relacion al prestamo',
  `prestestlib` int(11) DEFAULT NULL COMMENT 'Prestamo estado libro: estado del prestamo 0=Activo 1=Renovado 2=Finalizado 3=en espera',
  `prestrenlib` int(11) NOT NULL DEFAULT '0' COMMENT 'Prestamo numero de renovaciones libro: cantidad de  renovaciones realizadas durante el prestamo',
  `usuCodigo` int(11) NOT NULL COMMENT 'Codigo del usuario: llave foranea de la tabla usuario',
  `usuCodBiblio` int(11) NOT NULL COMMENT 'CODIGO USUARIO BIBLIOTECARIO',
  `prestfechafin` date DEFAULT NULL COMMENT 'Fecha que el todos los libros del prestamo fueron devueltos',
  PRIMARY KEY (`prestcodlib`),
  KEY `fk_resumenPrestamo_Usuario1_idx` (`usuCodigo`),
  CONSTRAINT `fk_resumenPrestamo_Usuario1` FOREIGN KEY (`usuCodigo`) REFERENCES `usuario` (`usucod`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumenlibroprestamo`
--

LOCK TABLES `resumenlibroprestamo` WRITE;
/*!40000 ALTER TABLE `resumenlibroprestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `resumenlibroprestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `usucod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo usuario: llave primaria de la tabla usuarios',
  `usuprinom` varchar(45) NOT NULL COMMENT 'Personal auxiliar',
  `ususegnom` varchar(45) DEFAULT NULL COMMENT 'Segundo nombre del usuario: campo no obligatorio',
  `usupriape` varchar(45) NOT NULL COMMENT 'Prrimer apellido del usuario: campo obligatorio',
  `ususegape` varchar(45) DEFAULT NULL COMMENT 'Segundo apellido del usuario: campo no obligatorio',
  `usucarnet` varchar(45) DEFAULT NULL COMMENT 'Carnet del usuario: Numero de carnet del personal o estudiantes de la institucion',
  `usucorre` varchar(250) DEFAULT NULL COMMENT 'Correo electronico del usuario: campo no obligatorio',
  `usuestcue` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Estado de la cuenta de usuario: muestra si una cuenta esta logeada en el sistema 0=Activa 1=inactiva 2=Suspendida',
  `usuclave` varchar(250) NOT NULL COMMENT 'Contraseña del usuario: Clave para entrar al sistema ',
  `usuaccnom` varchar(45) NOT NULL COMMENT 'Usuario acceso nombre: nombre de acceso al sistema para el usuario',
  `usuanobac` varchar(11) DEFAULT NULL COMMENT 'Año de bachillerato del usuario: Año de bachillerato que realiza el usuario 1°,2°,3°',
  `ususecaul` varchar(15) DEFAULT NULL COMMENT 'Seccion del aula del usuario: Secciones establecidas por la institucion para sus bachillerato como 1° A,1°B etc.',
  `usutipbac` varchar(11) DEFAULT NULL COMMENT 'Tipo de bachillerato del usuario: los bachilleratos disponibles en la institucion 0=Comercio 1=Mecanica 2=Salud',
  `usunivel` varchar(11) NOT NULL COMMENT 'Usuario Nivel: neveles de acceso a los modulos del sistema 0=Administrador 1=Bibliotecario 2=Personal administrativo 3=Estudiante',
  `usucodbar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usucod`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (6,'Administrador','Sistema','Institudo','JO','adminbiblio','admin@mail.sc','0','7a591aa6d948d60829ce8c0d63652199','adminbiblio','-','-','-','1','-'),(7,'BRANDON','ISMAR','MELARA','GARCIA',NULL,'BIBLIO@GMAIL.COM','0','535ab76633d94208236a2e829ea6d888','BIBLIOTECARIO',NULL,NULL,NULL,'1',NULL),(8,'ELIAS','ALFREDO','VENTURA','MARTINEZ','vm001','ELI@GMAIL.COM','0','535ab76633d94208236a2e829ea6d888','EA501','0','0','2','3',NULL),(9,'MARIA','ABIGAIL','CONSUELO','TORRES',NULL,'MARIA@GMAIL.COM','0','535ab76633d94208236a2e829ea6d888','MC501',NULL,NULL,NULL,'2',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-18 22:10:30
