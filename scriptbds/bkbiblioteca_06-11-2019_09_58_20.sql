-- MySQL dump 10.16  Distrib 10.1.41-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sistemabiblioteca
-- ------------------------------------------------------
-- Server version	10.1.41-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autorlibro` (
  `autcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla codigo de autor:',
  `autnom` varchar(40) NOT NULL COMMENT 'Nombre del autor: campo obligatorio',
  `autape` varchar(40) DEFAULT NULL COMMENT 'Apellido del autor: campo obligatorio',
  `autseud` varchar(45) DEFAULT NULL COMMENT 'Nombre seudonimo literario del autor: nombre del autor con el cual es conocido en la comunidad literaria',
  PRIMARY KEY (`autcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autorlibro`
--

LOCK TABLES `autorlibro` WRITE;
/*!40000 ALTER TABLE `autorlibro` DISABLE KEYS */;
/*!40000 ALTER TABLE `autorlibro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `bircod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Bitacora código: llave primaria de la tabla bitacora',
  `bitfec` datetime DEFAULT NULL COMMENT 'Bitacora fecha: fecha y hora de la actividad realizada',
  `bitdes` varchar(450) DEFAULT NULL COMMENT 'Bitacora descripción: actividad realizada',
  `bitusucod` varchar(45) DEFAULT NULL COMMENT 'Bitacora código de usuario: usuario que realizo la actividad',
  `bitnomlib` varchar(45) DEFAULT NULL COMMENT 'Bitacora nombre libreria: nombre de la libreria',
  `bitnombre` varchar(45) NOT NULL,
  PRIMARY KEY (`bircod`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,'2019-08-25 11:39:26',' ingreso un nuevo Usuario: BRANDON','adminbiblio','---','BRANDON MELARA'),(2,'2019-08-25 11:40:12',' se deslogeo del sistema exitosamente ','18','---','BRANDON MELARA'),(3,'2019-08-25 11:40:18','ingreso exitosamente al sistema','1','---','BRANDON MELARA'),(4,'2019-10-31 20:45:53',' ingreso un nuevo Usuario: VILMA','bibliotecaria','---','BRANDON MELARA'),(5,'2019-10-31 20:46:48','ingreso exitosamente al sistema','2','---','VILMA ALFARO'),(6,'2019-10-31 20:46:52',' se deslogeo del sistema exitosamente ','2','---','VILMA ALFARO'),(7,'2019-10-31 20:47:19','ingreso exitosamente al sistema','2','---','VILMA ALFARO'),(8,'2019-10-31 20:48:39',' realizo un cambio de clave exitosamente','2','---','VILMA ALFARO'),(9,'2019-10-31 20:48:41',' se deslogeo del sistema exitosamente ','2','---','VILMA ALFARO'),(10,'2019-10-31 20:48:51','ingreso exitosamente al sistema','2','---','VILMA ALFARO'),(11,'2019-10-31 20:50:23',' ingreso un nuevo Usuario: MONICA','auxilar1','---','BRANDON MELARA'),(12,'2019-10-31 20:51:30',' ingreso un nuevo Usuario: DAYRA','auxiliar2','---','BRANDON MELARA'),(13,'2019-10-31 20:52:37',' ingreso un nuevo Usuario: KENIA','auxiliar3','---','BRANDON MELARA'),(14,'2019-10-31 20:53:34',' ingreso un nuevo Usuario: JHOSELINNE','auxiliar4','---','BRANDON MELARA'),(15,'2019-10-31 20:55:04',' ingreso un nuevo Usuario: JANCY','auxiliar5','---','BRANDON MELARA'),(16,'2019-10-31 20:56:14',' ingreso un nuevo Usuario: ADILSON','auxiliar6','---','BRANDON MELARA'),(17,'2019-10-31 20:58:10',' ingreso un nuevo Usuario: FATIMA','auxiliar7','---','BRANDON MELARA'),(18,'2019-10-31 21:00:13',' ingreso un nuevo Usuario: ANDERSON','auxiliar8','---','BRANDON MELARA'),(19,'2019-10-31 21:01:06',' ingreso un nuevo Usuario: DARWIN','auxiliar9','---','BRANDON MELARA'),(20,'2019-10-31 21:02:01',' se deslogeo del sistema exitosamente ','1','---','BRANDON MELARA'),(21,'2019-10-31 21:02:13','ingreso exitosamente al sistema','1','---','BRANDON MELARA'),(22,'2019-10-31 21:03:44',' se deslogeo del sistema exitosamente ','1','---','BRANDON MELARA'),(23,'2019-10-31 21:04:00','ingreso exitosamente al sistema','1','---','BRANDON MELARA'),(24,'2019-10-31 21:04:42',' se deslogeo del sistema exitosamente ','2','---','VILMA ALFARO'),(25,'2019-10-31 21:04:48','ingreso exitosamente al sistema','1','---','BRANDON MELARA'),(26,'2019-10-31 21:07:47',' ingreso un nuevo Usuario: IRENE','auxiliar10','---','BRANDON MELARA'),(27,'2019-10-31 21:08:36',' ingreso un nuevo Usuario: BRISSEYDA','auxiliar11','---','BRANDON MELARA'),(28,'2019-10-31 21:09:26',' ingreso un nuevo Usuario: YANCY','auxiliar12','---','BRANDON MELARA'),(29,'2019-10-31 21:10:40',' ingreso un nuevo Usuario: ANDREA','auxiliar13','---','BRANDON MELARA'),(30,'2019-10-31 21:15:49','ingreso exitosamente al sistema','2','---','VILMA ALFARO'),(31,'2019-10-31 21:16:01',' se deslogeo del sistema exitosamente ','2','---','VILMA ALFARO'),(32,'2019-10-31 21:16:14','ingreso exitosamente al sistema','4','---','DAYRA VASQUEZ'),(33,'2019-10-31 21:16:55',' realizo un cambio de clave exitosamente','4','---','DAYRA VASQUEZ'),(34,'2019-10-31 21:16:57',' se deslogeo del sistema exitosamente ','4','---','DAYRA VASQUEZ'),(35,'2019-10-31 21:17:17','ingreso exitosamente al sistema','4','---','DAYRA VASQUEZ'),(36,'2019-10-31 21:19:02',' se deslogeo del sistema exitosamente ','4','---','DAYRA VASQUEZ'),(37,'2019-10-31 21:19:41','ingreso exitosamente al sistema','6','---','JHOSELINNE CASTILLO'),(38,'2019-10-31 21:20:00',' realizo un cambio de clave exitosamente','6','---','JHOSELINNE CASTILLO'),(39,'2019-10-31 21:20:02',' se deslogeo del sistema exitosamente ','6','---','JHOSELINNE CASTILLO'),(40,'2019-10-31 21:20:24','ingreso exitosamente al sistema','6','---','JHOSELINNE CASTILLO'),(41,'2019-10-31 21:21:22',' se deslogeo del sistema exitosamente ','6','---','JHOSELINNE CASTILLO'),(42,'2019-10-31 21:22:03','ingreso exitosamente al sistema','8','---','ADILSON ORDOÑEZ'),(43,'2019-10-31 21:22:18',' realizo un cambio de clave exitosamente','8','---','ADILSON ORDOÑEZ'),(44,'2019-10-31 21:22:20',' se deslogeo del sistema exitosamente ','8','---','ADILSON ORDOÑEZ'),(45,'2019-10-31 21:22:29','ingreso exitosamente al sistema','8','---','ADILSON ORDOÑEZ'),(46,'2019-10-31 21:22:49',' se deslogeo del sistema exitosamente ','8','---','ADILSON ORDOÑEZ'),(47,'2019-10-31 21:23:49','ingreso exitosamente al sistema','11','---','DARWIN ORTIZ'),(48,'2019-10-31 21:24:40',' realizo un cambio de clave exitosamente','11','---','DARWIN ORTIZ'),(49,'2019-10-31 21:24:42',' se deslogeo del sistema exitosamente ','11','---','DARWIN ORTIZ'),(50,'2019-10-31 21:24:55','ingreso exitosamente al sistema','11','---','DARWIN ORTIZ'),(51,'2019-10-31 21:25:15',' se deslogeo del sistema exitosamente ','11','---','DARWIN ORTIZ'),(52,'2019-10-31 21:25:47','ingreso exitosamente al sistema','1','---','BRANDON MELARA'),(53,'2019-10-31 21:26:20','ingreso exitosamente al sistema','5','---','KENIA AREVALO'),(54,'2019-10-31 21:26:44',' realizo un cambio de clave exitosamente','5','---','KENIA AREVALO'),(55,'2019-10-31 21:26:47',' se deslogeo del sistema exitosamente ','5','---','KENIA AREVALO'),(56,'2019-10-31 21:27:01','ingreso exitosamente al sistema','5','---','KENIA AREVALO'),(57,'2019-10-31 21:27:27',' se deslogeo del sistema exitosamente ','5','---','KENIA AREVALO'),(58,'2019-10-31 21:28:19','ingreso exitosamente al sistema','7','---','JANCY RUANO'),(59,'2019-10-31 21:28:46',' realizo un cambio de clave exitosamente','7','---','JANCY RUANO'),(60,'2019-10-31 21:28:48',' se deslogeo del sistema exitosamente ','7','---','JANCY RUANO'),(61,'2019-10-31 21:29:05','ingreso exitosamente al sistema','7','---','JANCY RUANO'),(62,'2019-10-31 21:29:31',' se deslogeo del sistema exitosamente ','7','---','JANCY RUANO'),(63,'2019-10-31 21:38:03','ingreso exitosamente al sistema','1','---','BRANDON MELARA'),(64,'2019-10-31 21:39:39','ha editado el usuario: MONICA  Codigo: 3','1','---','BRANDON MELARA'),(65,'2019-10-31 21:40:28','ingreso exitosamente al sistema','15','---','ANDREA AGUILAR'),(66,'2019-10-31 21:40:32',' se deslogeo del sistema exitosamente ','15','---','ANDREA AGUILAR'),(67,'2019-10-31 21:41:48','ha editado el usuario: MONICA  Codigo: 3','1','---','BRANDON MELARA'),(68,'2019-10-31 21:41:52','ingreso exitosamente al sistema','3','---','MONICA TREJO'),(69,'2019-10-31 21:41:57',' se deslogeo del sistema exitosamente ','3','---','MONICA TREJO'),(70,'2019-10-31 21:42:23','ingreso exitosamente al sistema','3','---','MONICA TREJO'),(71,'2019-10-31 21:42:36',' realizo un cambio de clave exitosamente','3','---','MONICA TREJO'),(72,'2019-10-31 21:42:38',' se deslogeo del sistema exitosamente ','3','---','MONICA TREJO'),(73,'2019-10-31 21:42:46','ingreso exitosamente al sistema','3','---','MONICA TREJO'),(74,'2019-10-31 21:43:03',' se deslogeo del sistema exitosamente ','3','---','MONICA TREJO'),(75,'2019-10-31 21:44:39',' se deslogeo del sistema exitosamente ','1','---','BRANDON MELARA'),(76,'2019-10-31 21:44:52','ingreso exitosamente al sistema','2','---','VILMA ALFARO'),(77,'2019-10-31 21:45:46',' ingreso un nuevo Estante: ESTANTE1','2','---','VILMA ALFARO'),(78,'2019-10-31 21:45:55',' ingreso un nuevo Estante: ESTANTE2','2','---','VILMA ALFARO'),(79,'2019-10-31 21:46:01',' ingreso un nuevo Estante: ESTANTE3','2','---','VILMA ALFARO'),(80,'2019-10-31 21:46:07',' ingreso un nuevo Estante: ESTANTE4','2','---','VILMA ALFARO'),(81,'2019-10-31 21:46:15',' ingreso un nuevo Estante: ESTANTE5','2','---','VILMA ALFARO'),(82,'2019-10-31 21:46:21',' ingreso un nuevo Estante: ESTANTE6','2','---','VILMA ALFARO'),(83,'2019-10-31 21:46:45',' ingreso un nuevo Estante: ESTANTE7','2','---','VILMA ALFARO'),(84,'2019-10-31 21:46:51',' ingreso un nuevo Estante: ESTANTE8','2','---','VILMA ALFARO'),(85,'2019-10-31 21:46:59',' ingreso un nuevo Estante: ESTANTE9','2','---','VILMA ALFARO'),(86,'2019-10-31 21:47:14',' ingreso un nuevo Estante: ESTANTE10','2','---','VILMA ALFARO'),(87,'2019-10-31 21:47:26',' ingreso un nuevo Estante: ESTANTE11','2','---','VILMA ALFARO'),(88,'2019-10-31 21:47:33',' ingreso un nuevo Estante: ESTANTE12','2','---','VILMA ALFARO'),(89,'2019-10-31 21:47:38',' ingreso un nuevo Estante: ESTANTE13','2','---','VILMA ALFARO'),(90,'2019-10-31 21:47:46',' ingreso un nuevo Estante: ESTANTE14','2','---','VILMA ALFARO'),(91,'2019-10-31 21:47:53',' ingreso un nuevo Estante: ESTANTE15','2','---','VILMA ALFARO'),(92,'2019-10-31 21:48:00',' ingreso un nuevo Estante: ESTANTE16','2','---','VILMA ALFARO'),(93,'2019-10-31 21:48:08',' ingreso un nuevo Estante: ESTANTE17','2','---','VILMA ALFARO'),(94,'2019-10-31 21:50:20',' ingreso un nuevo codigo dewey: GENERALIDADES','2','---','VILMA ALFARO'),(95,'2019-10-31 21:51:19',' ingreso un nuevo codigo dewey: FILOSOFIAS Y DISIPLINAS AFINES','2','---','VILMA ALFARO'),(96,'2019-10-31 21:51:43',' ingreso un nuevo codigo dewey: RELIGION','2','---','VILMA ALFARO'),(97,'2019-10-31 21:52:04',' ingreso un nuevo codigo dewey: CIENCIAS SOCIALES','2','---','VILMA ALFARO'),(98,'2019-10-31 21:52:22',' ingreso un nuevo codigo dewey: LENGUAS','2','---','VILMA ALFARO'),(99,'2019-10-31 21:52:37',' ingreso un nuevo codigo dewey: CIENCIAS PURAS','2','---','VILMA ALFARO'),(100,'2019-10-31 21:53:13',' ingreso un nuevo codigo dewey: CIENCIAS APLICADAS(TECNOLOGIA)','2','---','VILMA ALFARO'),(101,'2019-10-31 21:53:32',' ingreso un nuevo codigo dewey: BELLAS ARTES','2','---','VILMA ALFARO'),(102,'2019-10-31 21:53:55',' ingreso un nuevo codigo dewey: LITERATURA','2','---','VILMA ALFARO'),(103,'2019-10-31 21:54:14',' ingreso un nuevo codigo dewey: GEOGRAFIA E HISTORIA','2','---','VILMA ALFARO'),(104,'2019-10-31 21:57:53',' se deslogeo del sistema exitosamente ','2','---','VILMA ALFARO'),(105,'2019-10-31 21:57:58','ingreso exitosamente al sistema','1','---','BRANDON MELARA'),(106,'2019-10-31 21:59:43',' se deslogeo del sistema exitosamente ','1','---','BRANDON MELARA'),(107,'2019-10-31 21:59:52','ingreso exitosamente al sistema','2','---','VILMA ALFARO'),(108,'2019-10-31 22:01:53',' se deslogeo del sistema exitosamente ','2','---','VILMA ALFARO'),(109,'2019-11-06 15:58:08','ingreso exitosamente al sistema','1','---','BRANDON MELARA');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bolsaprestamo`
--

DROP TABLE IF EXISTS `bolsaprestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deweyclasificacion` (
  `dewcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla clasificacion de dewey',
  `dewcodcla` varchar(25) NOT NULL COMMENT 'Codigo de la clasificacion de dewey: numero de registro de dewey ',
  `dewtipcla` varchar(45) NOT NULL COMMENT 'Tipo de la clasificacion de dewey: nombres de los tipos de la clasificacion de dewey',
  PRIMARY KEY (`dewcod`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deweyclasificacion`
--

LOCK TABLES `deweyclasificacion` WRITE;
/*!40000 ALTER TABLE `deweyclasificacion` DISABLE KEYS */;
INSERT INTO `deweyclasificacion` VALUES (1,'000','GENERALIDADES'),(2,'100','FILOSOFIAS Y DISIPLINAS AFINES'),(3,'200','RELIGION'),(4,'300','CIENCIAS SOCIALES'),(5,'400','LENGUAS'),(6,'500','CIENCIAS PURAS'),(7,'600','CIENCIAS APLICADAS(TECNOLOGIA)'),(8,'700','BELLAS ARTES'),(9,'800','LITERATURA'),(10,'900','GEOGRAFIA E HISTORIA');
/*!40000 ALTER TABLE `deweyclasificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorialeslibros`
--

DROP TABLE IF EXISTS `editorialeslibros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editorialeslibros` (
  `editcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla editorial:',
  `editnom` varchar(60) NOT NULL COMMENT 'Nombre de la editorial:',
  PRIMARY KEY (`editcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorialeslibros`
--

LOCK TABLES `editorialeslibros` WRITE;
/*!40000 ALTER TABLE `editorialeslibros` DISABLE KEYS */;
/*!40000 ALTER TABLE `editorialeslibros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ejemplareslibros`
--

DROP TABLE IF EXISTS `ejemplareslibros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `ejemfecreg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'FECHA QUE SE CREO EL EJEMPLAR EN EL SISTEMA',
  `ejemfecest` datetime DEFAULT NULL COMMENT 'FECHA EN LA QUE SE CAMBIO EL ESTADO DEL EJEMPLAR',
  PRIMARY KEY (`ejemcod`),
  KEY `fk_ejemplaresLibros_Estante1_idx` (`estcod`),
  KEY `fk_ejemplaresLibros_Libros1_idx` (`libcod`),
  CONSTRAINT `fk_ejemplaresLibros_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`),
  CONSTRAINT `fk_ejemplaresLibros_Libros1` FOREIGN KEY (`libcod`) REFERENCES `libros` (`libcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejemplareslibros`
--

LOCK TABLES `ejemplareslibros` WRITE;
/*!40000 ALTER TABLE `ejemplareslibros` DISABLE KEYS */;
/*!40000 ALTER TABLE `ejemplareslibros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo` (
  `equicod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Equipo codigo: llave primaria de la tabla equipo',
  `equitip` varchar(45) NOT NULL,
  `equides` varchar(100) DEFAULT NULL COMMENT 'Equipo descripcion: Descripcion general del equipo',
  `equicodifi` varchar(100) DEFAULT NULL COMMENT 'Codificación para equipos: 01 MAQUINARIA Y EQUIPO DE OFICINA ',
  `equimg` varchar(450) DEFAULT NULL COMMENT 'Contiene la direccion de la imagen del equipo',
  `equifecreg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'FECHA CREACION DE EQUIPO',
  PRIMARY KEY (`equicod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estante`
--

DROP TABLE IF EXISTS `estante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estante` (
  `estcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Estante codigo: llave primaria de la tabla estante',
  `estdes` varchar(45) NOT NULL COMMENT 'Estante descripcion: Nombre del estante',
  PRIMARY KEY (`estcod`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estante`
--

LOCK TABLES `estante` WRITE;
/*!40000 ALTER TABLE `estante` DISABLE KEYS */;
INSERT INTO `estante` VALUES (1,'ESTANTE1'),(2,'ESTANTE2'),(3,'ESTANTE3'),(4,'ESTANTE4'),(5,'ESTANTE5'),(6,'ESTANTE6'),(7,'ESTANTE7'),(8,'ESTANTE8'),(9,'ESTANTE9'),(10,'ESTANTE10'),(11,'ESTANTE11'),(12,'ESTANTE12'),(13,'ESTANTE13'),(14,'ESTANTE14'),(15,'ESTANTE15'),(16,'ESTANTE16'),(17,'ESTANTE17');
/*!40000 ALTER TABLE `estante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `existenciaequipo`
--

DROP TABLE IF EXISTS `existenciaequipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `existfecreg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'FECHA DE CREACION DE LA EXISTENCIA',
  `existfecest` datetime DEFAULT NULL COMMENT 'FECHA DE CAMBIO DEL ESTADO DE EXISTENCIA',
  PRIMARY KEY (`existcod`),
  KEY `fk_existenciaEquipo_Estante1_idx` (`estcod`),
  KEY `fk_existenciaEquipo_Equipo1_idx` (`equicod`),
  CONSTRAINT `fk_existenciaEquipo_Equipo1` FOREIGN KEY (`equicod`) REFERENCES `equipo` (`equicod`),
  CONSTRAINT `fk_existenciaEquipo_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumenequipoprestamo`
--

DROP TABLE IF EXISTS `resumenequipoprestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
/*!40101 SET character_set_client = utf8 */;
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
  `prestdevsolv` int(11) unsigned DEFAULT '0' COMMENT 'ANY CONFLICT AS BEEN SOLVED',
  PRIMARY KEY (`prestcodlib`),
  KEY `fk_resumenPrestamo_Usuario1_idx` (`usuCodigo`),
  CONSTRAINT `fk_resumenPrestamo_Usuario1` FOREIGN KEY (`usuCodigo`) REFERENCES `usuario` (`usucod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'BRANDON','ISMAR','MELARA','GARCIA','adminbiblio','ISMARK@GMAIL.COM','0','5f2150c49f5aa191fdee5f8d26c3e50e','ADMINBIBLIO','1','1','1','0',NULL),(2,'VILMA','YANETH','ALFARO','CAÑAS',NULL,NULL,'0','5a92dd532c5a5ae129b91adf58db76e4','bibliotecaria',NULL,NULL,NULL,'1',NULL),(3,'MONICA','ALEXANDRA','TREJO','MARAVILLA','',NULL,'0','c11f8f5dcbf7b335636a42bb76fa89f1','auxiliar1','','','','4',NULL),(4,'DAYRA','ASTRID','VASQUEZ','BELTRANENA',NULL,NULL,'0','c11f8f5dcbf7b335636a42bb76fa89f1','auxiliar2',NULL,NULL,NULL,'4',NULL),(5,'KENIA','ESMERALDA','AREVALO','SALGUERO',NULL,NULL,'0','a9d81114599d23d098d6f8e80a50dbe8','auxiliar3',NULL,NULL,NULL,'4',NULL),(6,'JHOSELINNE','DANIELA','CASTILLO','TORRES',NULL,NULL,'0','4191c3fb40fcc2c2d110f82023354db8','auxiliar4',NULL,NULL,NULL,'4',NULL),(7,'JANCY','IVETTE','RUANO','VELASCO',NULL,NULL,'0','fbd24b92a958032d5cd647932bffcac0','auxiliar5',NULL,NULL,NULL,'4',NULL),(8,'ADILSON','ENRIQUE','ORDOÑEZ','PINEDA',NULL,NULL,'0','90eb7723a657b6597100aafef171d9f2','auxiliar6',NULL,NULL,NULL,'4',NULL),(9,'FATIMA','NICOLE','MERCADO','SERVINO',NULL,NULL,'0','6e4da048b68b88ccee6ac382788898ce','auxiliar7',NULL,NULL,NULL,'4',NULL),(10,'ANDERSON','JOSE','DURAN','RUANO',NULL,NULL,'0','4f01dd17c7a24d0cc3199c35cf6223be','auxiliar8',NULL,NULL,NULL,'4',NULL),(11,'DARWIN','STANLEY','ORTIZ','MENDOZA',NULL,NULL,'0','11e08f0ddffec35826e6a053bae6781f','auxiliar9',NULL,NULL,NULL,'4',NULL),(12,'IRENE','ABIGAIL','ORTEGA','AVALOS',NULL,NULL,'0','b1e267044edbb8f8fa415f67903b7c0e','auxiliar10',NULL,NULL,NULL,'4',NULL),(13,'BRISSEYDA','ALEXANDRA','CASTELLANOS','CARRANZA',NULL,NULL,'0','50cb87f5f718647a95a199711d937191','auxiliar11',NULL,NULL,NULL,'4',NULL),(14,'YANCY','NINGUNO','LOZANO','MENDOZA',NULL,NULL,'0','a4bf0d4787943b78a8b517f746ca6494','auxiliar12',NULL,NULL,NULL,'4',NULL),(15,'ANDREA','SARAI','AGUILAR','HERNANDEZ',NULL,NULL,'0','7b55550834f35fcce9b30ed03263b401','auxiliar13',NULL,NULL,NULL,'4',NULL);
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

-- Dump completed on 2019-11-06 15:58:20
