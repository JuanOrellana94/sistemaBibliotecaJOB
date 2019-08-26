-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.50-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,MYSQL323' */;


--
-- Create schema sistemabiblioteca
--

CREATE DATABASE IF NOT EXISTS sistemabiblioteca;
USE sistemabiblioteca;

--
-- Definition of table `autorlibro`
--

DROP TABLE IF EXISTS `autorlibro`;
CREATE TABLE `autorlibro` (
  `autcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla codigo de autor:',
  `autnom` varchar(40) NOT NULL COMMENT 'Nombre del autor: campo obligatorio',
  `autape` varchar(40) DEFAULT NULL COMMENT 'Apellido del autor: campo obligatorio',
  `autseud` varchar(45) DEFAULT NULL COMMENT 'Nombre seudonimo literario del autor: nombre del autor con el cual es conocido en la comunidad literaria',
  PRIMARY KEY (`autcod`)
) TYPE=InnoDB AUTO_INCREMENT=38;

--
-- Dumping data for table `autorlibro`
--

/*!40000 ALTER TABLE `autorlibro` DISABLE KEYS */;
INSERT INTO `autorlibro` VALUES  (27,'HOMERO','ARISTOCRATA','HOMERO'),
 (28,'ANN ','RADCLIFFE','ANN WARD '),
 (29,'GABRIEL JOSé','GARCíA MáRQUEZ','GABITO'),
 (30,'VICENTE','ALEIXANDRE','4108'),
 (31,'ISAAC ','BASHEVIS SINGER','1544'),
 (32,'OCTAVIO PAZ',' PAZ LOZANO','0074'),
 (33,'GABRIELA ','MISTRAL','6484'),
 (34,'JUAN RAMóN','JIMéNEZ MANTECóN','1348'),
 (35,'MIGUEL ÁNGEL','ASTURIAS ROSALES','8162'),
 (36,'RICARDO ELIéCER','NEFTALí REYES BASOALTO','R104'),
 (37,'EDGARDO ALFREDO ',' ESPINO NAJARRO','E6649');
/*!40000 ALTER TABLE `autorlibro` ENABLE KEYS */;


--
-- Definition of table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora` (
  `bircod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Bitacora código: llave primaria de la tabla bitacora',
  `bitfec` datetime DEFAULT NULL COMMENT 'Bitacora fecha: fecha y hora de la actividad realizada',
  `bitdes` varchar(450) DEFAULT NULL COMMENT 'Bitacora descripción: actividad realizada',
  `bitusucod` varchar(45) DEFAULT NULL COMMENT 'Bitacora código de usuario: usuario que realizo la actividad',
  `bitnomlib` varchar(45) DEFAULT NULL COMMENT 'Bitacora nombre libreria: nombre de la libreria',
  `bitnombre` varchar(45) NOT NULL,
  PRIMARY KEY (`bircod`)
) TYPE=InnoDB AUTO_INCREMENT=1005;

--
-- Dumping data for table `bitacora`
--

/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES  (734,'2019-08-17 21:37:33',' se deslogeo del sistema exitosamente ','1','---','JOEL VILLALTA'),
 (735,'2019-08-17 21:37:45','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (736,'2019-08-17 22:59:51','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (737,'2019-08-17 23:11:59',' ingreso un nuevo Usuario: BRANDON','BIBLIOTECARIO','---','Administrador Institudo'),
 (738,'2019-08-17 23:12:14',' se deslogeo del sistema exitosamente ','6','---','Administrador Institudo'),
 (739,'2019-08-17 23:16:15','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (740,'2019-08-17 23:17:21',' se deslogeo del sistema exitosamente ','6','---','Administrador Institudo'),
 (741,'2019-08-17 23:20:55','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (742,'2019-08-17 23:21:17',' se deslogeo del sistema exitosamente ','6','---','Administrador Institudo'),
 (743,'2019-08-17 23:21:23','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (744,'2019-08-17 23:25:13','Ingreso una nueva editorial al sistema: Pearson','6','---','Administrador Institudo'),
 (745,'2019-08-17 23:30:12','Ingreso una nueva editorial al sistema: ThomsonReuters','6','---','Administrador Institudo'),
 (746,'2019-08-17 23:31:07',' ingreso un nuevo editorial: RELX GROUP','6','---','Administrador Institudo'),
 (747,'2019-08-17 23:31:25',' ingreso un nuevo editorial: WOLTERS KLUWER','6','---','Administrador Institudo'),
 (748,'2019-08-17 23:31:41',' ingreso un nuevo editorial: PENGUIN RANDOM HOUSE','6','---','Administrador Institudo'),
 (749,'2019-08-17 23:32:01',' ingreso un nuevo editorial: 	CHINSOUTH PUBLISHING & MEDIA GROUP CO., LTD','6','---','Administrador Institudo'),
 (750,'2019-08-17 23:32:16',' ingreso un nuevo editorial: GRUPO PLANETA','6','---','Administrador Institudo'),
 (751,'2019-08-17 23:32:32',' ingreso un nuevo editorial: SCHOLASTIC','6','---','Administrador Institudo'),
 (752,'2019-08-17 23:35:00',' ingreso un nuevo editorial: CHINA PUBLISHING GROUP CORPORATION','6','---','Administrador Institudo'),
 (753,'2019-08-17 23:35:22',' ingreso un nuevo editorial: GRUPO SANTILLANA','6','---','Administrador Institudo'),
 (754,'2019-08-17 23:35:54',' ingreso un nuevo editorial: EDITORA FTD','6','---','Administrador Institudo'),
 (755,'2019-08-17 23:36:17',' ingreso un nuevo editorial: CORNELSEN','6','---','Administrador Institudo'),
 (756,'2019-08-17 23:36:36',' ingreso un nuevo editorial: SANOMA','6','---','Administrador Institudo'),
 (757,'2019-08-17 23:37:04','ha editado el editorial: PEARSON  Codigo: 6','6','---','Administrador Institudo'),
 (758,'2019-08-17 23:37:08','ha editado el editorial: THOMSONREUTERS  Codigo: 7','6','---','Administrador Institudo'),
 (759,'2019-08-17 23:38:31',' ingreso un nuevo editorial: EDITORIAL MEDICA PANAMERICANA SA','6','---','Administrador Institudo'),
 (760,'2019-08-17 23:39:04',' ingreso un nuevo editorial: EDITORIAL VICENS VIVES SA.','6','---','Administrador Institudo'),
 (761,'2019-08-17 23:39:56',' ingreso un nuevo Estante: EST1','6','---','Administrador Institudo'),
 (762,'2019-08-17 23:40:02',' ingreso un nuevo Estante: EST2','6','---','Administrador Institudo'),
 (763,'2019-08-17 23:40:08',' ingreso un nuevo Estante: EST3','6','---','Administrador Institudo'),
 (764,'2019-08-17 23:40:13',' ingreso un nuevo Estante: EST4','6','---','Administrador Institudo'),
 (765,'2019-08-17 23:40:21',' ingreso un nuevo Estante: EST5','6','---','Administrador Institudo'),
 (766,'2019-08-17 23:40:28',' ingreso un nuevo Estante: EST6','6','---','Administrador Institudo'),
 (767,'2019-08-17 23:40:36',' ingreso un nuevo Estante: EST7','6','---','Administrador Institudo'),
 (768,'2019-08-17 23:40:50',' ingreso un nuevo Estante: EST8','6','---','Administrador Institudo'),
 (769,'2019-08-17 23:40:59',' ingreso un nuevo Estante: EST9','6','---','Administrador Institudo'),
 (770,'2019-08-17 23:41:06',' ingreso un nuevo Estante: EST10','6','---','Administrador Institudo'),
 (771,'2019-08-17 23:47:02',' ingreso un nuevo autor: Homero Aristocrata','6','---','Administrador Institudo'),
 (772,'2019-08-17 23:47:59',' ingreso un nuevo codigo dewey: GENERALIDADES','6','---','Administrador Institudo'),
 (773,'2019-08-17 23:48:19',' ingreso un nuevo codigo dewey: FILOSOFÍAS Y DISCIPLINAS AFINES','6','---','Administrador Institudo'),
 (774,'2019-08-17 23:48:33',' ingreso un nuevo codigo dewey: CIENCIAS PURAS','6','---','Administrador Institudo'),
 (775,'2019-08-17 23:48:59','ha editado la categoria dewey: RELIGIÓN  Codigo: 5','6','---','Administrador Institudo'),
 (776,'2019-08-17 23:49:11','elimino la categoria RELIGIÓN','6','---','Administrador Institudo'),
 (777,'2019-08-17 23:49:18',' ingreso un nuevo codigo dewey: RELIGIÓN','6','---','Administrador Institudo'),
 (778,'2019-08-17 23:49:45',' ingreso un nuevo codigo dewey: CIENCIAS SOCIALES','6','---','Administrador Institudo'),
 (779,'2019-08-17 23:50:07',' ingreso un nuevo codigo dewey: LENGUAS','6','---','Administrador Institudo'),
 (780,'2019-08-17 23:50:29',' ingreso un nuevo codigo dewey: CIENCIAS PURAS','6','---','Administrador Institudo'),
 (781,'2019-08-17 23:52:16',' ingreso un nuevo codigo dewey: CIENCIAS APLICADAS (TECNOLOGÍA)','6','---','Administrador Institudo'),
 (782,'2019-08-17 23:52:30',' ingreso un nuevo codigo dewey: BELLAS ARTES','6','---','Administrador Institudo'),
 (783,'2019-08-17 23:52:50',' ingreso un nuevo codigo dewey: LITERATURA','6','---','Administrador Institudo'),
 (784,'2019-08-17 23:55:35','Ingreso un nuevo libro a la base de datos nombre: Ilíada','6','---','Administrador Institudo'),
 (785,'2019-08-17 23:55:48','ha agregado una nueva imagen de portada: Ilíada Codigo: 24','6','---','Administrador Institudo'),
 (786,'2019-08-17 23:59:28',' ingreso un nuevo autor: Ann  Radcliffe','6','---','Administrador Institudo'),
 (787,'2019-08-17 23:59:48','Ingreso un nuevo libro a la base de datos nombre: El romance del bosque','6','---','Administrador Institudo'),
 (788,'2019-08-18 00:01:51','ha agregado una nueva imagen de portada: El romance del bosque Codigo: 25','6','---','Administrador Institudo'),
 (789,'2019-08-18 00:05:19',' ingreso un nuevo autor: Gabriel José García Márquez','6','---','Administrador Institudo'),
 (790,'2019-08-18 00:05:29','Ingreso un nuevo libro a la base de datos nombre: Cien años de soledad','6','---','Administrador Institudo'),
 (791,'2019-08-18 00:05:58','ha agregado una nueva imagen de portada: Cien años de soledad Codigo: 26','6','---','Administrador Institudo'),
 (792,'2019-08-18 00:09:06',' ingreso un nuevo autor: VICENTE ALEIXANDRE','6','---','Administrador Institudo'),
 (793,'2019-08-18 00:09:13','ha editado el autor: GABRIEL JOSé GARCíA MáRQUEZ Codigo: 29','6','---','Administrador Institudo'),
 (794,'2019-08-18 00:09:17','ha editado el autor: ANN  RADCLIFFE Codigo: 28','6','---','Administrador Institudo'),
 (795,'2019-08-18 00:09:21','ha editado el autor: HOMERO ARISTOCRATA Codigo: 27','6','---','Administrador Institudo'),
 (796,'2019-08-18 00:10:22',' ingreso un nuevo autor: ISAAC  BASHEVIS SINGER','6','---','Administrador Institudo'),
 (797,'2019-08-18 00:12:00',' ingreso un nuevo autor: OCTAVIO PAZ  PAZ LOZANO','6','---','Administrador Institudo'),
 (798,'2019-08-18 00:13:25',' ingreso un nuevo autor: GABRIELA  MISTRAL','6','---','Administrador Institudo'),
 (799,'2019-08-18 00:15:08',' ingreso un nuevo autor: JUAN RAMóN JIMéNEZ MANTECóN','6','---','Administrador Institudo'),
 (800,'2019-08-18 00:16:11',' ingreso un nuevo autor: MIGUEL ÁNGEL ASTURIAS ROSALES','6','---','Administrador Institudo'),
 (801,'2019-08-18 00:17:07',' ingreso un nuevo autor: RICARDO ELIéCER NEFTALí REYES BASOALTO','6','---','Administrador Institudo'),
 (802,'2019-08-18 16:15:16','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (803,'2019-08-18 16:15:54','ha editado libro: Cien años de soledad Codigo: 26','6','---','Administrador Institudo'),
 (804,'2019-08-18 16:16:37','ha editado libro: Cien años de soledad Codigo: 26','6','---','Administrador Institudo'),
 (805,'2019-08-18 16:17:04','ha editado libro: Cien años de soledad Codigo: 26','6','---','Administrador Institudo'),
 (806,'2019-08-18 16:20:18',' ingreso un nuevo autor: Edgardo Alfredo   Espino Najarro','6','---','Administrador Institudo'),
 (807,'2019-08-18 16:22:23','Ingreso un nuevo libro a la base de datos nombre: Jícaras tristes','6','---','Administrador Institudo'),
 (808,'2019-08-18 16:23:17','ha agregado una nueva imagen de portada: Jícaras tristes Codigo: 27','6','---','Administrador Institudo'),
 (809,'2019-08-18 16:52:21',' ingreso un nuevo equipo: COMPUTADORA PORTáTIL','6','---','Administrador Institudo'),
 (810,'2019-08-18 16:54:13','ha editado el equipo: 0108  Codigo: COMPUTADORA PORTáTIL','6','---','Administrador Institudo'),
 (811,'2019-08-18 16:54:23','ha editado el equipo: 0108  Codigo: COMPUTADORA PORTÁTIL','6','---','Administrador Institudo'),
 (812,'2019-08-18 17:00:18',' ingreso un nuevo equipo: EQUIPO DE CóMPUTO','6','---','Administrador Institudo'),
 (813,'2019-08-18 17:25:08',' ingreso un nuevo equipo: EQUIPO DE COMPUTO','6','---','Administrador Institudo'),
 (814,'2019-08-18 17:28:43',' ingreso un nuevo equipo: COMPUTADORA PORTÁTIL','6','---','Administrador Institudo'),
 (815,'2019-08-18 17:47:21',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (816,'2019-08-18 17:49:55','ha editado el ejemplar: 88160-800-00001','6','---','Administrador Institudo'),
 (817,'2019-08-18 17:50:46','ha editado el ejemplar: 88160-800-00001','6','---','Administrador Institudo'),
 (818,'2019-08-18 17:57:10',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (819,'2019-08-18 18:13:22',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (820,'2019-08-18 19:23:18',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (821,'2019-08-18 19:24:40',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (822,'2019-08-18 19:26:15',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (823,'2019-08-18 22:02:52',' ingreso un nuevo Usuario: ELIAS','vm11001','---','Administrador Institudo'),
 (824,'2019-08-18 22:05:29','ha editado el usuario: ELIAS  Codigo: 8','6','---','Administrador Institudo'),
 (825,'2019-08-18 22:07:24',' ingreso un nuevo Usuario: MARIA','MC501','---','Administrador Institudo'),
 (826,'2019-08-19 11:02:40','elimino el Editorial THOMSONREUTERS','7','---','MARIA TESTING'),
 (827,'2019-08-19 11:16:32',' ingreso un nuevo Usuario: PRESTAMOS','18001','---','MARIA TESTING'),
 (828,'2019-08-22 08:51:04','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (829,'2019-08-22 09:05:11',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (830,'2019-08-22 09:05:29',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (831,'2019-08-22 09:05:30',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (832,'2019-08-22 09:07:11',' ingreso un nuevo equipo: TEST','6','---','Administrador Institudo'),
 (833,'2019-08-22 09:07:31',' ingreso un nuevo equipo: 123','6','---','Administrador Institudo'),
 (834,'2019-08-22 09:07:42',' ingreso un nuevo equipo: 12312','6','---','Administrador Institudo'),
 (835,'2019-08-22 09:08:19',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (836,'2019-08-22 09:08:20',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (837,'2019-08-22 09:08:52',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (838,'2019-08-22 09:08:53',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (839,'2019-08-22 18:11:37','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (840,'2019-08-22 18:13:07',' ingreso un nuevo Usuario: ESTUDIANTE1','18002','---','Administrador Institudo'),
 (841,'2019-08-22 18:13:35',' ingreso un nuevo Usuario: ESTUDIANTE2','18003','---','Administrador Institudo'),
 (842,'2019-08-22 18:14:11',' ingreso un nuevo Usuario: ESTUDIANTE3','18004','---','Administrador Institudo'),
 (843,'2019-08-22 18:14:50',' ingreso un nuevo Usuario: ESTUDIANTE4','18005','---','Administrador Institudo'),
 (844,'2019-08-22 18:15:24','Libro codigo 17 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (845,'2019-08-22 18:15:24','Prestamo realizado, codigo registro: 25','6','---','Administrador Institudo'),
 (846,'2019-08-22 18:17:12','Libro codigo 18 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (847,'2019-08-22 18:17:13','Libro codigo 23 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (848,'2019-08-22 18:17:13','Prestamo realizado, codigo registro: 26','6','---','Administrador Institudo'),
 (849,'2019-08-22 18:17:40','Libro codigo 24 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (850,'2019-08-22 18:17:40','Prestamo realizado, codigo registro: 27','6','---','Administrador Institudo'),
 (851,'2019-08-22 18:18:33','Libro codigo 25 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (852,'2019-08-22 18:18:33','Prestamo realizado, codigo registro: 28','6','---','Administrador Institudo'),
 (853,'2019-08-22 18:19:10','Libro codigo 29 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (854,'2019-08-22 18:19:10','Prestamo realizado, codigo registro: 29','6','---','Administrador Institudo'),
 (855,'2019-08-22 18:51:13',' ingreso un nuevo Usuario: ESTUDIANTE5','18006','---','Administrador Institudo'),
 (856,'2019-08-22 19:22:07','Libro codigo 27 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (857,'2019-08-22 19:22:07','Prestamo realizado, codigo registro: 30','6','---','Administrador Institudo'),
 (858,'2019-08-22 19:36:27','Ejemplar: 88160-800-000022 devuelto PROCESO DE PRESTAMO: 26','6','---','Administrador Institudo'),
 (859,'2019-08-22 19:36:27','Usuario puesto en activo, devolucion realizada en proceso: 26','6','---','Administrador Institudo'),
 (860,'2019-08-22 19:40:10','Ejemplar: 88160-800-000022, Puesto en Disponible Aunque no existe Registro de Prestamo enlazado','6','---','Administrador Institudo'),
 (861,'2019-08-22 19:46:42','Ejemplar: 88160-800-00004 devuelto PROCESO DE PRESTAMO: 27','6','---','Administrador Institudo'),
 (862,'2019-08-22 19:46:43','Usuario puesto en activo, devolucion realizada en proceso: 27','6','---','Administrador Institudo'),
 (863,'2019-08-22 19:58:46','Ejemplar: 88160-800-00006 devuelto PROCESO DE PRESTAMO: 29','6','---','Administrador Institudo'),
 (864,'2019-08-22 19:58:46','Usuario puesto en activo, devolucion realizada en proceso: 29','6','---','Administrador Institudo'),
 (865,'2019-08-22 20:27:55',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (866,'2019-08-22 21:03:24','Libro codigo 26 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (867,'2019-08-22 21:03:25','Prestamo realizado, codigo registro: 31','6','---','Administrador Institudo'),
 (868,'2019-08-22 21:12:58','elimino el ejemplar 30','6','---','Administrador Institudo'),
 (869,'2019-08-22 21:35:42','ha editado el ejemplar: 18','6','---','Administrador Institudo'),
 (870,'2019-08-22 21:51:57',' ingreso una nueva existencia de equipo: 88160-0114-00001','6','---','Administrador Institudo'),
 (871,'2019-08-22 21:52:07',' ingreso una nueva existencia de equipo: 88160-0114-00002','6','---','Administrador Institudo'),
 (872,'2019-08-22 21:52:28',' ingreso una nueva existencia de equipo: 88160-0114-00003','6','---','Administrador Institudo'),
 (873,'2019-08-22 21:57:26','ha editado el equipo: 5','6','---','Administrador Institudo'),
 (874,'2019-08-22 21:57:33','elimino el Equipo EQUIPO DE COMPUTO','6','---','Administrador Institudo'),
 (875,'2019-08-22 22:00:03','ha editado el equipo: 5','6','---','Administrador Institudo'),
 (876,'2019-08-22 22:00:59',' ingreso un nuevo equipo: CAÑON LACER','6','---','Administrador Institudo'),
 (877,'2019-08-22 22:05:15',' ingreso una nueva existencia de equipo: 88160-0550-00001','6','---','Administrador Institudo'),
 (878,'2019-08-22 22:09:44',' ingreso una nueva existencia de equipo: 88160-0550-00002','6','---','Administrador Institudo'),
 (879,'2019-08-22 22:17:08',' ingreso un nuevo equipo: TOTAL WAR','6','---','Administrador Institudo'),
 (880,'2019-08-22 22:17:25',' ingreso una nueva existencia de equipo: 88160-140-00001','6','---','Administrador Institudo'),
 (881,'2019-08-22 22:19:05',' ingreso un nuevo equipo: NEW WAR','6','---','Administrador Institudo'),
 (882,'2019-08-22 22:24:40',' ingreso una nueva existencia de equipo: 88160-141-00001','6','---','Administrador Institudo'),
 (883,'2019-08-22 22:28:13',' ingreso un nuevo Usuario: ESTUDIANTE7','18007','---','Administrador Institudo'),
 (884,'2019-08-22 22:29:59','Libro codigo 1 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (885,'2019-08-22 22:29:59','Prestamo realizado Registro: 48','6','---','Administrador Institudo'),
 (886,'2019-08-22 22:30:31','EQUIPO: 88160-140-00001 devuelto PROCESO DE PRESTAMO: 48','6','---','Administrador Institudo'),
 (887,'2019-08-22 22:30:31','Usuario puesto en activo, devolucion realizada en proceso: 48','6','---','Administrador Institudo'),
 (888,'2019-08-22 23:00:42',' ingreso un nuevo equipo: OLD WAR','6','---','Administrador Institudo'),
 (889,'2019-08-22 23:01:14',' ingreso una nueva existencia de equipo: 88160-142-00001','6','---','Administrador Institudo'),
 (890,'2019-08-22 23:05:13','Libro codigo 1 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (891,'2019-08-22 23:05:13','Prestamo realizado Registro: 49','6','---','Administrador Institudo'),
 (892,'2019-08-23 05:58:09','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (893,'2019-08-23 07:14:20',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (894,'2019-08-23 07:15:00','Libro codigo 3 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (895,'2019-08-23 07:15:00','Prestamo realizado Registro: 50','6','---','Administrador Institudo'),
 (896,'2019-08-23 07:15:48','Ejemplar: 88160-800-000034 devuelto PROCESO DE PRESTAMO: 31','6','---','Administrador Institudo'),
 (897,'2019-08-23 07:15:48','Usuario puesto en activo, devolucion realizada en proceso: 31','6','---','Administrador Institudo'),
 (898,'2019-08-23 07:18:39','EQUIPO: 88160-140-00001 devuelto PROCESO DE PRESTAMO: 49','6','---','Administrador Institudo'),
 (899,'2019-08-23 07:18:39','Usuario puesto en activo, devolucion realizada en proceso: 49','6','---','Administrador Institudo'),
 (900,'2019-08-23 07:19:11','Libro codigo 1 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (901,'2019-08-23 07:19:11','Prestamo realizado Registro: 51','6','---','Administrador Institudo'),
 (902,'2019-08-23 07:22:44',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (903,'2019-08-23 07:26:02','ha editado el autor: EDGARDO ALFREDO   ESPINO NAJARRO Codigo: 37','6','---','Administrador Institudo'),
 (904,'2019-08-23 07:26:22','ha editado el autor: RICARDO ELIéCER NEFTALí REYES BASOALTO Codigo: 36','6','---','Administrador Institudo'),
 (905,'2019-08-23 07:26:41','ha editado el autor: MIGUEL ÁNGEL ASTURIAS ROSALES Codigo: 35','6','---','Administrador Institudo'),
 (906,'2019-08-23 07:26:58','ha editado el autor: JUAN RAMóN JIMéNEZ MANTECóN Codigo: 34','6','---','Administrador Institudo'),
 (907,'2019-08-23 07:27:15','ha editado el autor: GABRIELA  MISTRAL Codigo: 33','6','---','Administrador Institudo'),
 (908,'2019-08-23 07:27:29','ha editado el autor: OCTAVIO PAZ  PAZ LOZANO Codigo: 32','6','---','Administrador Institudo'),
 (909,'2019-08-23 07:27:45','ha editado el autor: ISAAC  BASHEVIS SINGER Codigo: 31','6','---','Administrador Institudo'),
 (910,'2019-08-23 07:28:03','ha editado el autor: VICENTE ALEIXANDRE Codigo: 30','6','---','Administrador Institudo'),
 (911,'2019-08-23 07:28:38','Libro codigo 32 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (912,'2019-08-23 07:28:38','Prestamo realizado, codigo registro: 32','6','---','Administrador Institudo'),
 (913,'2019-08-23 07:44:45',' ingreso un nuevo Usuario: ESTUDIANTE8','18008','---','Administrador Institudo'),
 (914,'2019-08-23 07:45:31',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (915,'2019-08-23 07:46:27','Libro codigo 33 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (916,'2019-08-23 07:46:27','Prestamo realizado, codigo registro: 33','6','---','Administrador Institudo'),
 (917,'2019-08-23 08:53:30','ha editado el ejemplar: 18','6','---','Administrador Institudo'),
 (918,'2019-08-23 08:53:37','ha editado el ejemplar: 18','6','---','Administrador Institudo'),
 (919,'2019-08-23 16:22:19','Libro codigo 2 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (920,'2019-08-23 16:22:19','Prestamo realizado Registro: 52','6','---','Administrador Institudo'),
 (921,'2019-08-23 16:29:26','Ejemplar: 88160-800-ANNWARD-00033 devuelto PROCESO DE PRESTAMO: 33','6','---','Administrador Institudo'),
 (922,'2019-08-23 16:29:26','Usuario puesto en activo, devolucion realizada en proceso: 33','6','---','Administrador Institudo'),
 (923,'2019-08-23 16:31:53','Libro codigo 25 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (924,'2019-08-23 16:31:53','Prestamo realizado, codigo registro: 34','6','---','Administrador Institudo'),
 (925,'2019-08-23 19:21:33','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (926,'2019-08-23 20:34:01','EQUIPO: 88160-140-00001 devuelto PROCESO DE PRESTAMO: 51','6','---','Administrador Institudo'),
 (927,'2019-08-23 20:34:01','Usuario puesto en activo, devolucion realizada en proceso: 51','6','---','Administrador Institudo'),
 (928,'2019-08-23 20:36:02','EQUIPO: 88160-141-00001 devuelto PROCESO DE PRESTAMO: 52','6','---','Administrador Institudo'),
 (929,'2019-08-23 20:36:02','Usuario puesto en activo, devolucion realizada en proceso: 52','6','---','Administrador Institudo'),
 (930,'2019-08-23 20:52:47','Libro codigo 2 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (931,'2019-08-23 20:52:47','Prestamo realizado Registro: 53','6','---','Administrador Institudo'),
 (932,'2019-08-23 23:26:38',' se deslogeo del sistema exitosamente ','6','---','Administrador Institudo'),
 (933,'2019-08-24 06:13:18','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (934,'2019-08-24 06:36:49',' se deslogeo del sistema exitosamente ','6','---','Administrador Institudo'),
 (935,'2019-08-24 06:37:01','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (936,'2019-08-24 15:10:34','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (937,'2019-08-24 17:22:23','Ejemplar: 88160-800-AlfredoEspino-00032 devuelto PROCESO DE PRESTAMO: 32','6','---','Administrador Institudo'),
 (938,'2019-08-24 17:22:23','Usuario puesto en activo, devolucion realizada en proceso: 32','6','---','Administrador Institudo'),
 (939,'2019-08-24 18:34:49','EQUIPO: 88160-141-00001 devuelto PROCESO DE PRESTAMO: 53','6','---','Administrador Institudo'),
 (940,'2019-08-24 18:34:49','Usuario puesto en activo, devolucion realizada en proceso: 53','6','---','Administrador Institudo'),
 (941,'2019-08-24 18:35:30','EQUIPO: 88160-142-00001 devuelto PROCESO DE PRESTAMO: 50','6','---','Administrador Institudo'),
 (942,'2019-08-24 18:35:30','Usuario puesto en activo, devolucion realizada en proceso: 50','6','---','Administrador Institudo'),
 (943,'2019-08-24 19:04:55','ha editado el usuario: JALEA  Codigo: 17','6','---','Administrador Institudo'),
 (944,'2019-08-24 20:36:38','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (945,'2019-08-25 00:32:23','Libro codigo 21 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (946,'2019-08-25 00:32:23','Libro codigo 22 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (947,'2019-08-25 00:32:23','Libro codigo 23 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (948,'2019-08-25 00:32:23','Prestamo realizado, codigo registro: 35','6','---','Administrador Institudo'),
 (949,'2019-08-25 00:36:03','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (950,'2019-08-25 00:40:01','Ejemplar: 88160-800-000012 devuelto PROCESO DE PRESTAMO: 35','6','---','Administrador Institudo'),
 (951,'2019-08-25 06:32:21','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (952,'2019-08-25 07:29:31',' ingreso un nuevo Usuario: MALEN','18009','---','Administrador Institudo'),
 (953,'2019-08-25 07:36:36','Libro codigo 21 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (954,'2019-08-25 07:36:36','Libro codigo 24 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (955,'2019-08-25 07:36:36','Libro codigo 32 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (956,'2019-08-25 07:36:36','Prestamo realizado, codigo registro: 36','6','---','Administrador Institudo'),
 (957,'2019-08-25 07:39:30','Ejemplar: 88160-800-AlfredoEspino-00032 devuelto PROCESO DE PRESTAMO: 36','6','---','Administrador Institudo'),
 (958,'2019-08-25 07:39:45','Ejemplar: 88160-800-000012 devuelto PROCESO DE PRESTAMO: 35','6','---','Administrador Institudo'),
 (959,'2019-08-25 07:39:55','Ejemplar: 88160-800-00003 devuelto PROCESO DE PRESTAMO: 35','6','---','Administrador Institudo'),
 (960,'2019-08-25 07:40:01','Ejemplar: 88160-800-000013 devuelto PROCESO DE PRESTAMO: 35','6','---','Administrador Institudo'),
 (961,'2019-08-25 07:40:01','Usuario puesto en activo, devolucion realizada en proceso: 35','6','---','Administrador Institudo'),
 (962,'2019-08-25 07:43:17','Ejemplar: 88160-800-00004 devuelto PROCESO DE PRESTAMO: 36','6','---','Administrador Institudo'),
 (963,'2019-08-25 07:43:17','Usuario puesto en activo, devolucion realizada en proceso: 36','6','---','Administrador Institudo'),
 (964,'2019-08-25 07:49:00','Libro codigo 26 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (965,'2019-08-25 07:49:00','Libro codigo 31 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (966,'2019-08-25 07:49:00','Libro codigo 18 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (967,'2019-08-25 07:49:00','Libro codigo 19 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (968,'2019-08-25 07:49:01','Prestamo realizado, codigo registro: 37','6','---','Administrador Institudo'),
 (969,'2019-08-25 08:42:41','Ejemplar: 88160-800-000034 devuelto PROCESO DE PRESTAMO: 37','6','---','Administrador Institudo'),
 (970,'2019-08-25 08:42:51','Ejemplar: 88160-800-ANNWARD-00031 devuelto PROCESO DE PRESTAMO: 37','6','---','Administrador Institudo'),
 (971,'2019-08-25 08:42:57','Ejemplar: 88160-800-000022 devuelto PROCESO DE PRESTAMO: 37','6','---','Administrador Institudo'),
 (972,'2019-08-25 08:43:02','Ejemplar: 88160-800-00001 devuelto PROCESO DE PRESTAMO: 37','6','---','Administrador Institudo'),
 (973,'2019-08-25 08:43:02','Usuario puesto en activo, devolucion realizada en proceso: 37','6','---','Administrador Institudo'),
 (974,'2019-08-25 10:10:50','Libro codigo 24 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (975,'2019-08-25 10:10:50','Libro codigo 28 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (976,'2019-08-25 10:10:50','Prestamo realizado, codigo registro: 38','6','---','Administrador Institudo'),
 (977,'2019-08-25 11:28:43','Libro codigo 23 puesto en estado 1=prestado','6','---','Administrador Institudo'),
 (978,'2019-08-25 11:28:43','Prestamo realizado, codigo registro: 39','6','---','Administrador Institudo'),
 (979,'2019-08-25 14:50:43',' ingreso un nuevo Usuario: USUADIEZ','1810','---','Administrador Institudo'),
 (980,'2019-08-25 14:51:00','ha editado el usuario: USUADIEZ  Codigo: 19','6','---','Administrador Institudo'),
 (981,'2019-08-25 15:00:51','Ejemplar: 88160-800-00005 devuelto PROCESO DE PRESTAMO: 28','6','---','Administrador Institudo'),
 (982,'2019-08-25 15:00:51','Usuario puesto en activo, devolucion realizada en proceso: 28','6','---','Administrador Institudo'),
 (983,'2019-08-25 15:05:41','Ejemplar: 88160-800-000011 devuelto PROCESO DE PRESTAMO: 25','6','---','Administrador Institudo'),
 (984,'2019-08-25 15:05:41','Usuario puesto en activo, devolucion realizada en proceso: 25','6','---','Administrador Institudo'),
 (985,'2019-08-25 15:14:37','Prestamo con cargos multa. Codigo registro: 35 fue cancelado','','---',''),
 (986,'2019-08-25 15:17:21','Prestamo con cargos multa. Codigo registro: 35 fue cancelado','','---',''),
 (987,'2019-08-25 15:18:05',' se deslogeo del sistema exitosamente ','6','---','Administrador Institudo'),
 (988,'2019-08-25 15:18:35','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (989,'2019-08-25 15:19:02','Prestamo con cargos multa. Codigo registro: 35 fue cancelado','6','---','Administrador Institudo'),
 (990,'2019-08-25 15:20:08','Prestamo con cargos multa. Codigo registro: 25 fue cancelado','6','---','Administrador Institudo'),
 (991,'2019-08-25 21:47:14','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (992,'2019-08-26 06:42:34','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (993,'2019-08-26 07:13:05','ingreso exitosamente al sistema','6','---','Administrador Institudo'),
 (994,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (995,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (996,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (997,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (998,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (999,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (1000,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (1001,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (1002,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (1003,'2019-08-26 08:44:45',' ingreso un nuevo ejemplar: ejemcodreg','6','---','Administrador Institudo'),
 (1004,'2019-08-26 10:53:56','ingreso exitosamente al sistema','6','---','Administrador Institudo');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;


--
-- Definition of table `bolsaprestamo`
--

DROP TABLE IF EXISTS `bolsaprestamo`;
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
) TYPE=InnoDB COMMENT='Tabla modelo carrito de compras para realizar prestamos';

--
-- Dumping data for table `bolsaprestamo`
--

/*!40000 ALTER TABLE `bolsaprestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `bolsaprestamo` ENABLE KEYS */;


--
-- Definition of table `detallesprestamoequipo`
--

DROP TABLE IF EXISTS `detallesprestamoequipo`;
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
) TYPE=InnoDB AUTO_INCREMENT=71;

--
-- Dumping data for table `detallesprestamoequipo`
--

/*!40000 ALTER TABLE `detallesprestamoequipo` DISABLE KEYS */;
INSERT INTO `detallesprestamoequipo` VALUES  (65,48,1,0),
 (66,49,1,0),
 (67,50,3,0),
 (68,51,1,0),
 (69,52,2,0),
 (70,53,2,0);
/*!40000 ALTER TABLE `detallesprestamoequipo` ENABLE KEYS */;


--
-- Definition of table `detallesprestamolibro`
--

DROP TABLE IF EXISTS `detallesprestamolibro`;
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
) TYPE=InnoDB AUTO_INCREMENT=79;

--
-- Dumping data for table `detallesprestamolibro`
--

/*!40000 ALTER TABLE `detallesprestamolibro` DISABLE KEYS */;
INSERT INTO `detallesprestamolibro` VALUES  (55,25,17,0),
 (56,26,18,0),
 (57,26,23,0),
 (58,27,24,0),
 (59,28,25,0),
 (60,29,29,0),
 (61,30,27,0),
 (62,31,26,0),
 (63,32,32,0),
 (64,33,33,0),
 (65,34,25,0),
 (66,35,21,0),
 (67,35,22,0),
 (68,35,23,0),
 (69,36,21,0),
 (70,36,24,0),
 (71,36,32,0),
 (72,37,26,0),
 (73,37,31,0),
 (74,37,18,0),
 (75,37,19,0),
 (76,38,24,0),
 (77,38,28,0),
 (78,39,23,0);
/*!40000 ALTER TABLE `detallesprestamolibro` ENABLE KEYS */;


--
-- Definition of table `deweyclasificacion`
--

DROP TABLE IF EXISTS `deweyclasificacion`;
CREATE TABLE `deweyclasificacion` (
  `dewcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla clasificacion de dewey',
  `dewcodcla` varchar(25) NOT NULL COMMENT 'Codigo de la clasificacion de dewey: numero de registro de dewey ',
  `dewtipcla` varchar(45) NOT NULL COMMENT 'Tipo de la clasificacion de dewey: nombres de los tipos de la clasificacion de dewey',
  PRIMARY KEY (`dewcod`)
) TYPE=InnoDB AUTO_INCREMENT=13;

--
-- Dumping data for table `deweyclasificacion`
--

/*!40000 ALTER TABLE `deweyclasificacion` DISABLE KEYS */;
INSERT INTO `deweyclasificacion` VALUES  (3,'000','GENERALIDADES'),
 (4,'100','FILOSOFÍAS Y DISCIPLINAS AFINES'),
 (6,'200','RELIGIÓN'),
 (7,'300','CIENCIAS SOCIALES'),
 (8,'400','LENGUAS'),
 (9,'500','CIENCIAS PURAS'),
 (10,'600','CIENCIAS APLICADAS (TECNOLOGÍA)'),
 (11,'700','BELLAS ARTES'),
 (12,'800','LITERATURA');
/*!40000 ALTER TABLE `deweyclasificacion` ENABLE KEYS */;


--
-- Definition of table `editorialeslibros`
--

DROP TABLE IF EXISTS `editorialeslibros`;
CREATE TABLE `editorialeslibros` (
  `editcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla editorial:',
  `editnom` varchar(60) NOT NULL COMMENT 'Nombre de la editorial:',
  PRIMARY KEY (`editcod`)
) TYPE=InnoDB AUTO_INCREMENT=21;

--
-- Dumping data for table `editorialeslibros`
--

/*!40000 ALTER TABLE `editorialeslibros` DISABLE KEYS */;
INSERT INTO `editorialeslibros` VALUES  (6,'PEARSON'),
 (8,'RELX GROUP'),
 (9,'WOLTERS KLUWER'),
 (10,'PENGUIN RANDOM HOUSE'),
 (11,'	CHINSOUTH PUBLISHING & MEDIA GROUP CO., LTD'),
 (12,'GRUPO PLANETA'),
 (13,'SCHOLASTIC'),
 (14,'CHINA PUBLISHING GROUP CORPORATION'),
 (15,'GRUPO SANTILLANA'),
 (16,'EDITORA FTD'),
 (17,'CORNELSEN'),
 (18,'SANOMA'),
 (19,'EDITORIAL MEDICA PANAMERICANA SA'),
 (20,'EDITORIAL VICENS VIVES SA.');
/*!40000 ALTER TABLE `editorialeslibros` ENABLE KEYS */;


--
-- Definition of table `ejemplareslibros`
--

DROP TABLE IF EXISTS `ejemplareslibros`;
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
  `ejemfecreg` timestamp NOT NULL COMMENT 'FECHA QUE SE CREO EL EJEMPLAR EN EL SISTEMA',
  `ejemfecest` datetime DEFAULT NULL COMMENT 'FECHA EN LA QUE SE CAMBIO EL ESTADO DEL EJEMPLAR',
  PRIMARY KEY (`ejemcod`),
  KEY `fk_ejemplaresLibros_Estante1_idx` (`estcod`),
  KEY `fk_ejemplaresLibros_Libros1_idx` (`libcod`),
  CONSTRAINT `fk_ejemplaresLibros_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`),
  CONSTRAINT `fk_ejemplaresLibros_Libros1` FOREIGN KEY (`libcod`) REFERENCES `libros` (`libcod`)
) TYPE=InnoDB AUTO_INCREMENT=44;

--
-- Dumping data for table `ejemplareslibros`
--

/*!40000 ALTER TABLE `ejemplareslibros` DISABLE KEYS */;
INSERT INTO `ejemplareslibros` VALUES  (17,'88160-800-000011','2019-08-07',0,'EJEMPLAR DONADO POR EL COLEGIO CHAMPAGNAT','',0,0,'EJEMPLAR EN PERFECTO ESTADO, SIN EMBARGO LAS PAGINAS 45 Y 8',NULL,NULL,5,24,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (18,'88160-800-000022','2019-07-30',1,'SIN DESCRIPCION','180',0,4,'EL EJEMPLAR NO TIENE TODAS LAS PAGINAS, FALTAN LAS PAGINA 6',NULL,NULL,5,24,'2019-08-22 20:40:47','2019-08-23 08:53:37'),
 (19,'88160-800-00001','2019-07-30',0,'DONACION POR PARTE DEL COLEGIO CHAMPAGNAT','',0,2,'PORTADA DESCOLORADA',NULL,NULL,5,26,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (20,'88160-800-00002','2019-07-30',1,'','12',0,0,'SIN DETALLES',NULL,NULL,5,26,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (21,'88160-800-000012','2019-07-29',0,'DONADO POR EL COLEGIO CHAMPAGNAT','',0,0,'SIN DETALLES',NULL,NULL,5,25,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (22,'88160-800-000013','2019-07-29',0,'DONADO POR EL COLEGIO CHAMPAGNAT','',0,0,'SIN DETALLES',NULL,NULL,5,27,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (23,'88160-800-00003','2019-08-23',1,'','85',1,0,'',NULL,'2388160800000031234',8,26,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (24,'88160-800-00004','2019-08-15',0,'87','',1,1,'',NULL,'2488160800000041234',7,26,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (25,'88160-800-00005','2019-08-15',0,'87','',0,1,'',NULL,'2588160800000051234',7,26,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (26,'88160-800-000034','2019-08-07',0,'12312','',0,1,'',NULL,'2688160800000031234',7,24,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (27,'88160-800-000042','2019-08-07',0,'12312','',1,1,'',NULL,'2788160800000041234',7,24,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (28,'88160-800-000052','2019-08-23',0,'12312','',1,4,'',NULL,'2888160800000051234',7,24,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (29,'88160-800-00006','2019-08-23',0,'12312','',3,4,'',NULL,'2988160800000061234',7,24,'2019-08-22 20:40:47','2019-08-22 21:06:05'),
 (30,'88160-800-HOMERO-00030','2019-08-23',0,'FEFAF','',2,2,'',NULL,'308816080000030',7,24,'2019-08-22 20:27:55','2019-08-22 21:12:58'),
 (31,'88160-800-ANNWARD-00031','2019-08-24',1,'','120',0,0,'',NULL,'318816080000031',7,25,'2019-08-23 07:14:20',NULL),
 (32,'88160-800-AlfredoEspino-00032','2019-08-24',1,'','877',0,1,'',NULL,'328816080000032',6,27,'2019-08-23 07:22:44',NULL),
 (33,'88160-800-ANNWARD-00033','2019-08-14',0,'MAAAA','',1,1,'',NULL,'338816080000033',6,25,'2019-08-23 07:45:31',NULL),
 (34,'88160-800-HOMERO-00034','2019-08-14',0,'','',0,2,'',NULL,'3422222222',10,24,'2019-08-26 08:44:45',NULL),
 (35,'88160-800-HOMERO-00035','2019-08-14',0,'','',0,2,'',NULL,'3522222222',10,24,'2019-08-26 08:44:45',NULL),
 (36,'88160-800-HOMERO-00036','2019-08-14',0,'','',0,2,'',NULL,'3622222222',10,24,'2019-08-26 08:44:45',NULL),
 (37,'88160-800-HOMERO-00037','2019-08-14',0,'','',0,2,'',NULL,'3722222222',10,24,'2019-08-26 08:44:45',NULL),
 (38,'88160-800-HOMERO-00038','2019-08-14',0,'','',0,2,'',NULL,'3822222222',10,24,'2019-08-26 08:44:45',NULL),
 (39,'88160-800-HOMERO-00039','2019-08-14',0,'','',0,2,'',NULL,'3922222222',10,24,'2019-08-26 08:44:45',NULL),
 (40,'88160-800-HOMERO-00040','2019-08-14',0,'','',0,2,'',NULL,'4022222222',10,24,'2019-08-26 08:44:45',NULL),
 (41,'88160-800-HOMERO-00041','2019-08-14',0,'','',0,2,'',NULL,'4122222222',10,24,'2019-08-26 08:44:45',NULL),
 (42,'88160-800-HOMERO-00042','2019-08-14',0,'','',0,2,'',NULL,'4222222222',10,24,'2019-08-26 08:44:45',NULL),
 (43,'88160-800-HOMERO-00043','2019-08-14',0,'','',0,2,'',NULL,'4322222222',10,24,'2019-08-26 08:44:45',NULL);
/*!40000 ALTER TABLE `ejemplareslibros` ENABLE KEYS */;


--
-- Definition of table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
  `equicod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Equipo codigo: llave primaria de la tabla equipo',
  `equitip` varchar(45) NOT NULL,
  `equides` varchar(100) DEFAULT NULL COMMENT 'Equipo descripcion: Descripcion general del equipo',
  `equicodifi` varchar(100) DEFAULT NULL COMMENT 'Codificación para equipos: 01 MAQUINARIA Y EQUIPO DE OFICINA ',
  `equimg` varchar(450) DEFAULT NULL COMMENT 'Contiene la direccion de la imagen del equipo',
  `equifecreg` timestamp NOT NULL COMMENT 'FECHA CREACION DE EQUIPO',
  PRIMARY KEY (`equicod`)
) TYPE=InnoDB AUTO_INCREMENT=4;

--
-- Dumping data for table `equipo`
--

/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES  (1,'TOTAL WAR','NOTHING','140',NULL,'2019-08-22 22:54:58'),
 (2,'NEW WAR','YAY','141',NULL,'2019-08-22 22:54:58'),
 (3,'OLD WAR','NOTHING2','142',NULL,'2019-08-22 23:00:42');
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;


--
-- Definition of table `estante`
--

DROP TABLE IF EXISTS `estante`;
CREATE TABLE `estante` (
  `estcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Estante codigo: llave primaria de la tabla estante',
  `estdes` varchar(45) NOT NULL COMMENT 'Estante descripcion: Nombre del estante',
  PRIMARY KEY (`estcod`)
) TYPE=InnoDB AUTO_INCREMENT=15;

--
-- Dumping data for table `estante`
--

/*!40000 ALTER TABLE `estante` DISABLE KEYS */;
INSERT INTO `estante` VALUES  (5,'EST1'),
 (6,'EST2'),
 (7,'EST3'),
 (8,'EST4'),
 (9,'EST5'),
 (10,'EST6'),
 (11,'EST7'),
 (12,'EST8'),
 (13,'EST9'),
 (14,'EST10');
/*!40000 ALTER TABLE `estante` ENABLE KEYS */;


--
-- Definition of table `existenciaequipo`
--

DROP TABLE IF EXISTS `existenciaequipo`;
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
  `existfecreg` timestamp NOT NULL COMMENT 'FECHA DE CREACION DE LA EXISTENCIA',
  `existfecest` datetime DEFAULT NULL COMMENT 'FECHA DE CAMBIO DEL ESTADO DE EXISTENCIA',
  PRIMARY KEY (`existcod`),
  KEY `fk_existenciaEquipo_Estante1_idx` (`estcod`),
  KEY `fk_existenciaEquipo_Equipo1_idx` (`equicod`),
  CONSTRAINT `fk_existenciaEquipo_Equipo1` FOREIGN KEY (`equicod`) REFERENCES `equipo` (`equicod`),
  CONSTRAINT `fk_existenciaEquipo_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`)
) TYPE=InnoDB AUTO_INCREMENT=4;

--
-- Dumping data for table `existenciaequipo`
--

/*!40000 ALTER TABLE `existenciaequipo` DISABLE KEYS */;
INSERT INTO `existenciaequipo` VALUES  (1,'88160-140-00001','2019-08-23',1,'','98',0,2,'','',12,1,'2019-08-22 22:17:25',NULL),
 (2,'88160-141-00001','2019-08-23',0,'DONATIONSHION!','',0,0,'','288160141000011234',13,2,'2019-08-22 22:24:40',NULL),
 (3,'88160-142-00001','2019-08-24',1,'','5000',0,1,'','388160142000011234',13,3,'2019-08-22 23:01:14',NULL);
/*!40000 ALTER TABLE `existenciaequipo` ENABLE KEYS */;


--
-- Definition of table `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros` (
  `libcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del libro: llave primaria de la tabla libros',
  `libtit` varchar(150) NOT NULL COMMENT 'Titulo del libro: Nombre del libro',
  `libdes` varchar(1050) NOT NULL COMMENT 'Descripcion del libro: campo que registra una pequeña reseña del contenido del libro',
  `libpor` varchar(450) NOT NULL COMMENT 'Portada del libro: Direccion de la imagen del libro registrada',
  `libfecedi` date DEFAULT NULL COMMENT 'Fecha de edicion del libro: o fecha de publicacion del libro',
  `libnumpag` int(15) DEFAULT NULL COMMENT 'Numero de paginas del libro: cantidad de paginas del libro',
  `libisbn` varchar(50) DEFAULT NULL COMMENT 'Isbn del libro: codigo internacional de identificacion del libro',
  `libfecreg` timestamp NOT NULL,
  `autcod` int(11) NOT NULL,
  `dewcod` int(11) NOT NULL,
  `editcod` int(11) NOT NULL,
  `libtags` varchar(450) NOT NULL DEFAULT '---',
  PRIMARY KEY (`libcod`),
  KEY `fk_Libros_deweyClasificacion1_idx` (`dewcod`),
  KEY `fk_Libros_editorialesLibros1_idx` (`editcod`),
  KEY `fk_Libros_detalleGeneroAutor1_idx` (`autcod`),
  CONSTRAINT `fk_Libros_Autor1` FOREIGN KEY (`autcod`) REFERENCES `autorlibro` (`autcod`),
  CONSTRAINT `fk_Libros_deweyClasificacion1` FOREIGN KEY (`dewcod`) REFERENCES `deweyclasificacion` (`dewcod`),
  CONSTRAINT `fk_Libros_editorialesLibros1` FOREIGN KEY (`editcod`) REFERENCES `editorialeslibros` (`editcod`)
) TYPE=InnoDB AUTO_INCREMENT=97;

--
-- Dumping data for table `libros`
--

/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` VALUES  (24,'Ilíada','Homero es el poeta griego por antonomasia, el poeta divino que influyó decisivamente en el arte, la literatura, la lengua, la religión y la filosofía griegas. Su obra, memorizada por los escolares, ha dejado a través de los siglos una huella indeleble en la vida de los griegos. Homero llegó a Occidente de la mano de Petrarca, cuando este humanista adquirió los manuscritos de los dos inigualables poemas homéricos que, con gran dolor, no supo descifrar. El mensaje de la \"Ilíada\" está, sin embargo, ahora claro para nosotros: aunque los héroes hagan frente al inexorable hado que pesa sobre los mortales cosechando la gloria, nada hay sobre la tierra más miserable que el hombre. La presente edición restituye la obra a sus orígenes ofreciendo una traducción muy literal en verso. ','img/portadas/926423f315cf7ac9cc399736af7fdd962c0f1a.jpg','2018-09-06',1088,'978-84-376-2197-5','2019-08-17 23:55:35',27,12,6,'Tragedia griega,Literatura'),
 (25,'El romance del bosque','Si Horace Walpole puede considerarse el padre indiscutible de la novela gótica, Ann Radcliffe fue sin duda la madre. La ingeniosa y racionalista Ann Radcliffe evoca en sus obras los aspectos más sombríos y dramáticos de la naturaleza con una cierta poesía. Mediante una recargada ornamentación y una extravagante dramatización de las más variadas formas de transgresión (incesto, violación...), que prometían peligros inminentes, luego desplazados o incumplidos, lograba captar la atención del lector. Fue la más eximia representante de la escuela gótica y logró poner de moda aquel género en las postrimerías del siglo XVIII. Su influencia alcanzó a escritores como Byron, Shelley o las hermanas Brontë. ','img/portadas/63730336780.jpg','2019-01-30',592,'978-84-376-3650-4','2019-08-17 23:59:47',28,12,17,'Romance,Novela'),
 (26,'Cien años de soledad','1967. En Buenos Aires aparece la novela de un escritor colombiano de cuarenta años. No queda hoy lengua literaria a la que no haya sido traducida. \"Cien años de soledad\" no sólo cautiva a los lectores de cualquier condición: su impulso poderoso ha levantado las letras castellanas de todo un continente. Desvelar la magia de su prosa, acotar las arenas movedizas de su particular quehacer literario son tareas tan imposibles como dañinas; sí agradecerá el lector, en cambio, la aclaración de ciertas alusiones, la comprobación de la densidad que subyace a un texto aparentemente diáfano. No nos engañemos: son millones las páginas que han engendrado las de la novela, pero ante ella al lector no le queda otra actitud que la misma lectura devoradora y deslumbrada del último de los Aurelianos. ','img/portadas/410719cien-anos-de-soledad-garcia-marquez-sudamericana_MLA-F-3118290747_092012.jpg','2019-08-06',560,'978-84-376-0494-7','2019-08-18 00:05:29',29,12,16,'Literatura,Sigloxx'),
 (27,'Jícaras tristes',' El poeta niño, un idealista, un reservado, un romántico, un hombre sedicioso y acéfalo desvaído, propenso de lo más pulcro de  la vida. Por más sencillas que fuesen, por mas sencillas que parezcan, encuentra la ternura delicada de cada elemento que pudiese desnudarse y resaltar su belleza natural al margen de todo lo que le encerrase. Un impulsivo sentimental  atado en sus propias emociones, insigne en el arte de la poesía, la música y la pintura, aún que seria la poesía la que pasaría a inmortalizarlo.  Hablamos de Edgardo Alfredo Espino Najarro.\r\nCruel desenlace de su vida, rodeada de misterios, pero hecho que dio a luz el único legado que nos dejo Espino. Su obra jícaras tristes, que en mis condiciones como estudiante me atrevería a llamarla como un usufructo cultural, que bien podría, ser promocionada de manera más amplia con el fin de enriquecer la literatura salvadoreña.','img/portadas/664099Espino20001.jpg','2018-11-06',234,'978-84-376-2197-6','2019-07-18 16:22:23',37,12,18,'Obra,Literatura'),
 (28,'Libro1','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-5','2019-07-24 13:26:15',27,4,17,'testing,book'),
 (29,'Libro2','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-52','2019-07-24 13:27:01',28,4,9,'testing,book'),
 (30,'Libro3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-82','2019-07-24 13:27:12',27,6,12,'testing,book'),
 (31,'Libro4','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-83','2019-08-24 13:27:21',27,12,10,'testing,book'),
 (32,'Libro5','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-84','2019-08-24 13:27:21',27,4,19,'testing,book'),
 (33,'Libro6','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-85','2019-08-24 13:27:21',30,7,8,'testing,book'),
 (34,'7Libro7','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-86','2019-08-24 13:27:22',27,4,20,'testing,book'),
 (35,'Libro8','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-87','2019-07-24 13:27:22',31,12,15,'testing,book'),
 (36,'Libro29','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-88','2019-07-24 13:27:22',27,4,8,'testing,book'),
 (37,'Libro210','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-89','2019-07-24 13:27:22',34,8,11,'testing,book'),
 (38,'Libro211','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-81','2019-08-24 13:27:23',32,4,8,'testing,book'),
 (39,'Libro212','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-91','2019-08-24 13:27:23',27,12,18,'testing,book'),
 (40,'Libro213','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-812','2019-08-24 13:27:23',33,4,8,'testing,book'),
 (41,'Libro214','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-813','2019-08-24 13:27:23',27,9,12,'testing,book'),
 (42,'Libro215','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1990-09-01',150,'978-84-376-2197-814','2019-08-24 13:27:23',27,11,8,'testing,book'),
 (43,'LibroDemo1','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-85','2019-08-24 13:39:28',27,4,8,'testing,book'),
 (44,'LibroDemo2','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-86','2019-08-24 13:39:28',27,4,8,'testing,book'),
 (45,'LibroDemo3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-87','2019-08-24 13:39:29',27,4,8,'testing,book'),
 (46,'LibroDemo4','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-887','2019-08-24 13:39:29',34,4,8,'testing,book'),
 (47,'LibroDemo5','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-898','2019-08-24 13:39:29',27,4,8,'testing,book'),
 (48,'LibroDemo6','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-854','2019-08-24 13:39:29',35,4,8,'testing,book'),
 (49,'LibroDemo7','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-821','2019-08-24 13:39:29',34,4,8,'testing,book'),
 (50,'LibrdEMO8','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-854','2019-08-24 13:39:30',27,4,8,'testing,book'),
 (51,'LibroDemo9','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-885','2019-08-24 13:39:30',27,4,8,'testing,book'),
 (52,'LibroDemo10','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-898','2019-08-24 13:39:30',37,4,8,'testing,book'),
 (53,'LibroDemo11','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-835','2019-08-24 13:39:30',27,4,8,'testing,book'),
 (54,'LibroDemo12','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-885','2019-08-24 13:39:30',27,4,8,'testing,book'),
 (55,'LibroDemo13','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-898','2019-08-24 13:39:30',36,4,8,'testing,book'),
 (56,'LibroDemo14','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:31',27,4,8,'testing,book'),
 (57,'LibroDemo15','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:31',34,4,8,'testing,book'),
 (58,'LibroDemo16','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:31',27,4,8,'testing,book'),
 (59,'LibroDemo17','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:31',35,4,8,'testing,book'),
 (60,'LibroDemo21','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:31',27,4,8,'testing,book'),
 (61,'LibroDemo32','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:31',37,4,8,'testing,book'),
 (62,'LibroDemo22','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:32',27,4,8,'testing,book'),
 (63,'LibroDemo23','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:32',28,4,8,'testing,book'),
 (64,'LibroDemo24','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:32',27,4,8,'testing,book'),
 (65,'LibroDemo25','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:32',29,4,8,'testing,book'),
 (66,'LibroDemo322','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1994-09-01',358,'978-84-3546-2234-8','2019-08-24 13:39:32',30,4,8,'testing,book'),
 (67,'LibroCont','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-1','2019-08-24 13:54:40',30,10,12,'testing,book'),
 (68,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-123','2019-08-24 13:54:45',30,10,12,'testing,book'),
 (69,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-545645-12','2019-08-24 13:54:47',30,10,12,'testing,book'),
 (70,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-453453-12','2019-08-24 13:54:47',30,10,12,'testing,book'),
 (71,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-5-9654541-12','2019-08-24 13:54:47',30,10,12,'testing,book'),
 (72,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'54345','2019-08-24 13:54:48',30,10,12,'testing,book'),
 (73,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'5435434534534','2019-08-24 13:54:48',30,10,12,'testing,book'),
 (74,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'453453453453','2019-08-24 13:54:48',30,10,12,'testing,book'),
 (75,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'435378378','2019-08-24 13:54:48',30,10,12,'testing,book'),
 (76,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'345345354','2019-08-24 13:54:48',30,10,12,'testing,book'),
 (77,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'786578945','2019-08-24 13:54:48',30,10,12,'testing,book'),
 (78,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'345345345354','2019-08-24 13:54:48',30,10,12,'testing,book'),
 (79,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'123453453','2019-08-24 13:54:49',30,10,12,'testing,book'),
 (80,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'37866783783','2019-08-24 13:54:49',30,10,12,'testing,book'),
 (81,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'123543254','2019-08-24 13:54:49',30,10,12,'testing,book'),
 (82,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'12323','2019-08-24 13:54:49',30,10,12,'testing,book'),
 (83,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'12354354','2019-08-24 13:54:49',30,10,12,'testing,book'),
 (84,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-12','2019-08-24 13:54:49',30,10,12,'testing,book'),
 (85,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'543453543687','2019-08-24 13:54:49',30,10,12,'testing,book'),
 (86,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-125','2019-08-24 13:54:50',30,10,12,'testing,book'),
 (87,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'6546378687687','2019-08-24 13:54:50',30,10,12,'testing,book'),
 (88,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-1288','2019-08-24 13:54:50',30,10,12,'testing,book'),
 (89,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-1299','2019-08-24 13:54:50',30,10,12,'testing,book'),
 (90,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-1277','2019-08-24 13:54:50',30,10,12,'testing,book'),
 (91,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-1244','2019-08-24 13:54:50',30,10,12,'testing,book'),
 (92,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-1211','2019-08-24 13:54:50',30,10,12,'testing,book'),
 (93,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'2221212121212424','2019-08-24 13:54:51',30,10,12,'testing,book'),
 (94,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'23783873783873873','2019-08-24 13:54:55',30,10,12,'testing,book'),
 (95,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-12568','2019-08-24 13:54:55',30,10,12,'testing,book'),
 (96,'LibroCont3','DEMUSDATAFORTESTINGPURPOSES','img/portadas/Default.png','1999-05-05',1255,'978-84-8621-9651-12887','2019-08-24 13:54:55',30,10,12,'testing,book');
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;


--
-- Definition of table `resumenequipoprestamo`
--

DROP TABLE IF EXISTS `resumenequipoprestamo`;
CREATE TABLE `resumenequipoprestamo` (
  `prestcodequi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Prestamo codigo de equipo: llave primaria de la tabla resumenPrestamoEquipo',
  `prestfecequi` timestamp NOT NULL COMMENT 'Prestamo fecha de equipo:  fecha en la que se realizo el prestamo',
  `prestdevequi` date NOT NULL COMMENT 'Prestamo fecha equipo: fecha de devolucion del prestamo de equipo',
  `prestcomequi` varchar(150) DEFAULT NULL COMMENT 'Prestamo comentario equipo: comentarios agregados al proceso de prestamo de equipo',
  `prestestequi` int(11) NOT NULL COMMENT 'Prestamo estado equipo: estado del préstamo 0=Activo 1=Finalizado  3=en espera',
  `usucod` int(11) NOT NULL COMMENT 'Usuario codigo: llave foranea de la tabla usuarios',
  `usuCodBiblioEquipo` int(11) NOT NULL COMMENT 'USUARIO QUE REALIZA EL PROCESO DE PRESTAMO',
  `prestfechafinEquipo` date DEFAULT NULL COMMENT 'Fecha que se entrega todos los equipos, se cierra el prestamo',
  PRIMARY KEY (`prestcodequi`),
  KEY `fk_resumenEquipoPrestamo_Usuario1_idx` (`usucod`),
  CONSTRAINT `fk_resumenEquipoPrestamo_Usuario1` FOREIGN KEY (`usucod`) REFERENCES `usuario` (`usucod`)
) TYPE=InnoDB AUTO_INCREMENT=54;

--
-- Dumping data for table `resumenequipoprestamo`
--

/*!40000 ALTER TABLE `resumenequipoprestamo` DISABLE KEYS */;
INSERT INTO `resumenequipoprestamo` VALUES  (48,'2019-05-22 22:29:52','2019-08-23','Ningun Comentario',1,12,6,'2019-05-23'),
 (49,'2019-08-22 23:04:08','2019-08-23','Ningun Comentario',1,13,6,'2019-08-23'),
 (50,'2019-07-22 23:09:00','2019-08-24','Ningun Comentario',1,12,6,'2019-08-24'),
 (51,'2019-08-23 07:19:11','2019-08-24','Ningun Comentario',1,13,6,'2019-08-23'),
 (52,'2019-08-23 16:22:19','2019-08-23','Ningun Comentario',1,16,6,'2019-08-23'),
 (53,'2019-08-23 20:52:47','2019-08-24','Ningun Comentario',1,13,6,'2019-08-24');
/*!40000 ALTER TABLE `resumenequipoprestamo` ENABLE KEYS */;


--
-- Definition of table `resumenlibroprestamo`
--

DROP TABLE IF EXISTS `resumenlibroprestamo`;
CREATE TABLE `resumenlibroprestamo` (
  `prestcodlib` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Prestamo codigo libro: llave primaria de la tabla resumen prestamo libros',
  `prestfeclib` timestamp NOT NULL COMMENT 'Prestamo fecha libro: fecha en la que es realizado el prestamo',
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
) TYPE=InnoDB AUTO_INCREMENT=40;

--
-- Dumping data for table `resumenlibroprestamo`
--

/*!40000 ALTER TABLE `resumenlibroprestamo` DISABLE KEYS */;
INSERT INTO `resumenlibroprestamo` VALUES  (25,'2019-04-22 18:15:14','2019-08-23','Ningun Comentario',1,0,14,6,'2019-08-25',1),
 (26,'2019-06-22 18:15:41','2019-08-22','Ningun Comentario',1,0,13,6,'2019-08-22',0),
 (27,'2019-07-22 18:17:34','2019-08-24','Ningun Comentario',1,0,12,6,'2019-08-22',0),
 (28,'2019-07-22 18:18:21','2019-08-24','Ningun Comentario',1,0,11,6,'2019-08-25',0),
 (29,'2019-08-22 18:19:00','2019-08-23','Ningun Comentario',1,0,10,6,'2019-08-22',0),
 (30,'2019-02-22 19:21:56','2019-08-23','Ningun Comentario',0,0,15,6,NULL,0),
 (31,'2019-08-22 21:03:15','2019-08-23','Ningun Comentario',1,0,10,6,'2019-08-23',0),
 (32,'2019-08-23 07:28:38','2019-08-23','Ningun Comentario',1,0,10,6,'2019-08-24',0),
 (33,'2018-08-21 07:46:27','2019-08-21','Ningun Comentario',1,0,17,6,'2019-08-24',0),
 (34,'2019-08-22 16:31:53','2019-08-22','Ningun Comentario',0,0,17,6,NULL,0),
 (35,'2019-08-22 00:32:23','2019-08-23','Ningun Comentario',1,0,16,6,'2019-08-26',1),
 (36,'2019-08-23 07:36:36','2019-08-23','Ningun Comentario',1,0,18,6,'2019-08-25',0),
 (37,'2019-08-24 07:49:00','2019-08-24','Ningun Comentario',1,0,18,6,'2019-08-26',0),
 (38,'2019-08-23 10:10:50','2019-08-23','Ningun Comentario',0,0,18,6,NULL,0),
 (39,'2019-08-25 11:28:43','2019-08-26','Ningun Comentario',0,0,12,6,NULL,0);
/*!40000 ALTER TABLE `resumenlibroprestamo` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
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
) TYPE=InnoDB AUTO_INCREMENT=20;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES  (6,'Administrador','Sistema','Institudo','JO','adminbiblio','admin@mail.sc','0','5f2150c49f5aa191fdee5f8d26c3e50e','adminbiblio','-','-','-','1','-'),
 (7,'BRANDON','ISMAR','MELARA','GARCIA',NULL,'BIBLIO@GMAIL.COM','0','535ab76633d94208236a2e829ea6d888','BIBLIOTECARIO',NULL,NULL,NULL,'1',NULL),
 (8,'ELIAS','ALFREDO','VENTURA','MARTINEZ','vm001','ELI@GMAIL.COM','0','535ab76633d94208236a2e829ea6d888','EA501','0','0','2','3',NULL),
 (9,'MARIA','ABIGAIL','CONSUELO','TORRES',NULL,'MARIA@GMAIL.COM','0','535ab76633d94208236a2e829ea6d888','MC501',NULL,NULL,NULL,'2',NULL),
 (10,'PRESTAMOS','ESTUDIANTE','ESTUDIANTE','PRESTAMOS','18001','1800@GMAIL','0','6cbab356d49502660d99ed767604a327','18001','1','1','0','3',NULL),
 (11,'ESTUDIANTE1','--','DEMO1','--','18002','MAIL@GMAIL.COM','0','6cbab356d49502660d99ed767604a327','18002','0','0','0','3',NULL),
 (12,'ESTUDIANTE2','--','DEMO1','--','18003','MAIL@2','3','6563f4cdc1f2ef1ad710ad6772ea022b','18003','1','2','1','3',NULL),
 (13,'ESTUDIANTE3','--','DEMO1','--','18004','MAIL@3','0','e14f2c0c9152f1c78681652ff1189f2b','18004','2','1','2','3',NULL),
 (14,'ESTUDIANTE4','--','DEMO1','--','18005','MAIL@5','0','1194292054da355d3be4c0d3b69b9d9f','18005','1','1','1','3',NULL),
 (15,'ESTUDIANTE5','--','DEMO2','--','18006','MAIL@6','3','e2a0be057e5dde0a3d390d4b78189580','18006','1','1','0','3',NULL),
 (16,'ESTUDIANTE7','--','DEMO1','--','18007','MAIL@7','0','f2aaab100e39e5fd93ff0bbb01d4f212','18007','1','1','1','3',NULL),
 (17,'JALEA','MOST','ATASA','TAN','18008','MAIL@8','3','4218470a524ef1991202bb63abee5d72','18008','2','2','1','3','17180081234567890'),
 (18,'MALEN','MALON','MILAN','MULAN','18009','MAIL@GMAIL.COM','3','e25f50c93d321b7fdff05757de426238','18009','0','0','0','3','180012340'),
 (19,'USUADIEZ','SNAME','PNAME','SANAME','18010','1MAIL@GMAIL','0','6e79ed05baec2754e25b4eac73a332d2','18010','1','0','0','3','1918101234567890');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
