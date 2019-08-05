-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-08-2019 a las 17:17:20
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemabiblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorlibro`
--

DROP TABLE IF EXISTS `autorlibro`;
CREATE TABLE IF NOT EXISTS `autorlibro` (
  `autcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla codigo de autor:',
  `autnom` varchar(40) NOT NULL COMMENT 'Nombre del autor: campo obligatorio',
  `autape` varchar(40) NOT NULL COMMENT 'Apellido del autor: campo obligatorio',
  `autseud` varchar(45) DEFAULT NULL COMMENT 'Nombre seudonimo literario del autor: nombre del autor con el cual es conocido en la comunidad literaria',
  `autdes` varchar(450) DEFAULT NULL COMMENT 'Autor descripcion: Resumen la biografia del autor o autora entre otros datos',
  `autstatus` int(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Estado del autor 0= Abilitado 1= Inabilidato',
  PRIMARY KEY (`autcod`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autorlibro`
--

INSERT INTO `autorlibro` (`autcod`, `autnom`, `autape`, `autseud`, `autdes`, `autstatus`) VALUES
(2, 'Ernest ', 'Hemingway ', 'Miller', '---', 0),
(3, 'Stephen ', 'King', 'SK', '---', 0),
(8, 'Virginia', 'Wolf', 'VW', '---', 0),
(23, 'qwq', 'w', 'qwqw', '---', 0),
(24, '12312312', '123123', '123123', '---', 0),
(25, 'dwqdwqdwqd', 'dqwdqwd', 'dqwdqw', '---', 0),
(26, 'ASD', 'ASD', 'ASDA', '---', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE IF NOT EXISTS `bitacora` (
  `bircod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Bitacora código: llave primaria de la tabla bitacora',
  `bitfec` datetime DEFAULT NULL COMMENT 'Bitacora fecha: fecha y hora de la actividad realizada',
  `bitdes` varchar(450) DEFAULT NULL COMMENT 'Bitacora descripción: actividad realizada',
  `bitusucod` varchar(45) DEFAULT NULL COMMENT 'Bitacora código de usuario: usuario que realizo la actividad',
  `bitnomlib` varchar(45) DEFAULT NULL COMMENT 'Bitacora nombre libreria: nombre de la libreria',
  `bitnombre` varchar(45) NOT NULL,
  PRIMARY KEY (`bircod`)
) ENGINE=InnoDB AUTO_INCREMENT=734 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`bircod`, `bitfec`, `bitdes`, `bitusucod`, `bitnomlib`, `bitnombre`) VALUES
(1, '2019-06-13 17:30:59', 'ingreso exitosamente al sistema', '', '---', ' '),
(2, '2019-06-13 17:31:38', 'ingreso exitosamente al sistema', '', '---', ' '),
(3, '2019-06-13 17:32:44', 'ingreso exitosamente al sistema', '', '---', ' '),
(4, '2019-06-13 17:33:42', 'ingreso exitosamente al sistema', '', '---', ' '),
(5, '2019-06-13 17:36:00', 'ingreso exitosamente al sistema', '', '---', ' '),
(6, '2019-06-13 17:38:03', 'ingreso exitosamente al sistema', '', '---', ' '),
(7, '2019-06-13 17:38:43', 'ingreso exitosamente al sistema', '1', '---', ' '),
(8, '2019-06-13 17:39:08', 'ingreso exitosamente al sistema', '1', '---', ' '),
(9, '2019-06-13 17:39:26', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(10, '2019-06-13 17:45:56', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(11, '2019-06-13 17:46:46', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(12, '2019-06-13 17:46:54', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(13, '2019-06-13 17:49:27', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(14, '2019-06-13 17:50:28', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(15, '2019-06-13 17:50:44', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(16, '2019-06-13 17:52:40', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(17, '2019-06-13 17:57:32', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(18, '2019-06-13 17:58:27', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(19, '2019-06-13 17:59:34', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(20, '2019-06-13 18:00:08', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(21, '2019-06-13 18:05:25', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(22, '2019-06-13 18:10:06', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(23, '2019-06-13 18:23:17', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(24, '2019-06-13 18:23:35', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(25, '2019-06-13 18:23:44', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(26, '2019-06-13 18:27:11', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(27, '2019-06-13 18:27:40', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(28, '2019-06-13 18:28:09', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(29, '2019-06-13 18:29:57', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(30, '2019-06-13 18:30:36', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(31, '2019-06-13 18:49:18', ' realizo un cambio de clave exitosamente', '1', '---', 'Joel Villalta'),
(32, '2019-06-13 18:49:21', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(33, '2019-06-13 18:49:49', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(34, '2019-06-13 18:49:58', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(35, '2019-06-13 18:50:40', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(36, '2019-06-13 19:04:32', ' realizo un cambio de clave exitosamente', '1', '---', 'Joel Villalta'),
(37, '2019-06-13 19:04:35', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(38, '2019-06-13 19:04:44', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(39, '2019-06-13 19:07:18', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(40, '2019-06-13 19:09:26', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(41, '2019-06-13 19:16:29', ' realizo un cambio de clave exitosamente', '1', '---', 'Joel Villalta'),
(42, '2019-06-13 19:16:32', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(43, '2019-06-13 19:19:08', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(44, '2019-06-13 19:19:30', ' realizo un cambio de clave exitosamente', '1', '---', 'Joel Villalta'),
(45, '2019-06-13 19:19:34', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(46, '2019-06-13 21:47:32', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(47, '2019-06-13 21:47:43', ' realizo un cambio de clave exitosamente', '1', '---', 'Joel Villalta'),
(48, '2019-06-13 21:47:46', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(49, '2019-06-13 21:48:11', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(50, '2019-06-14 06:24:23', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(51, '2019-06-14 10:23:11', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(52, '2019-06-14 11:41:48', 'Ingreso un nuevo libro a la base de datos nombre: Mother', '1', '---', 'Joel Villalta'),
(53, '2019-06-14 11:59:33', 'Ingreso un nuevo libro a la base de datos nombre: Mother', '1', '---', 'Joel Villalta'),
(54, '2019-06-14 12:15:00', 'Ingreso un nuevo libro a la base de datos nombre: 3rd atttempt', '1', '---', 'Joel Villalta'),
(55, '2019-06-14 12:36:58', 'Ingreso un nuevo libro a la base de datos nombre: qweqwe', '1', '---', 'Joel Villalta'),
(56, '2019-06-14 12:38:51', 'Ingreso un nuevo libro a la base de datos nombre: qweqwe', '1', '---', 'Joel Villalta'),
(57, '2019-06-14 12:44:20', 'Ingreso un nuevo libro a la base de datos nombre: 123123', '1', '---', 'Joel Villalta'),
(58, '2019-06-14 13:09:20', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(59, '2019-06-18 21:25:35', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(60, '2019-06-18 22:38:28', 'Ingreso un nuevo libro a la base de datos nombre: Carcacia', '1', '---', 'Joel Villalta'),
(61, '2019-06-18 22:38:58', 'Ingreso un nuevo libro a la base de datos nombre: Caciaciaaaa', '1', '---', 'Joel Villalta'),
(62, '2019-06-18 22:39:54', 'Ingreso un nuevo libro a la base de datos nombre: macharia', '1', '---', 'Joel Villalta'),
(63, '2019-06-18 22:51:05', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(64, '2019-06-18 22:51:23', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(65, '2019-06-20 07:50:26', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(66, '2019-06-20 09:58:16', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(67, '2019-06-20 09:58:32', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(68, '2019-06-20 10:34:49', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(69, '2019-06-20 11:02:55', 'ha editado libro: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(70, '2019-06-20 11:06:07', 'ha editado libro: Ordeal Magnus Codigo: 2', '1', '---', 'Joel Villalta'),
(71, '2019-06-20 11:19:24', 'Ingreso una nueva editorial al sistema: Editorial Santillana Loma Linda', '1', '---', 'Joel Villalta'),
(72, '2019-06-20 11:21:09', 'Ingreso una nueva editorial al sistema: Libros La Ceiba', '1', '---', 'Joel Villalta'),
(73, '2019-06-20 11:22:01', 'ha editado libro: Ordeal Magnus Codigo: 2', '1', '---', 'Joel Villalta'),
(74, '2019-06-20 12:12:49', ' ingreso un nuevo autor: Stephen  King', '1', '---', 'Joel Villalta'),
(75, '2019-06-20 12:26:16', 'ha editado libro: Ordeal Magnus Codigo: 2', '1', '---', 'Joel Villalta'),
(76, '2019-06-20 12:30:22', 'ha editado libro: Showdown Craig Codigo: 3', '1', '---', 'Joel Villalta'),
(77, '2019-06-20 12:55:34', ' ingreso un nuevo autor:  ', '1', '---', 'Joel Villalta'),
(78, '2019-06-20 12:56:33', 'ha editado libro: delete this pls Codigo: 5', '1', '---', 'Joel Villalta'),
(79, '2019-06-20 12:56:43', ' ingreso un nuevo autor:  ', '1', '---', 'Joel Villalta'),
(80, '2019-06-20 13:02:30', ' ingreso un nuevo autor:  ', '1', '---', 'Joel Villalta'),
(81, '2019-06-20 13:08:01', 'elimino el libro libtit', '1', '---', 'Joel Villalta'),
(82, '2019-06-20 13:08:09', 'elimino el libro libtit', '1', '---', 'Joel Villalta'),
(83, '2019-06-20 13:09:00', 'elimino el libro 123123', '1', '---', 'Joel Villalta'),
(84, '2019-06-20 13:10:13', 'ha editado libro: delete this now Codigo: 6', '1', '---', 'Joel Villalta'),
(85, '2019-06-20 13:10:27', 'elimino el libro delete this now', '1', '---', 'Joel Villalta'),
(86, '2019-06-20 13:10:51', 'elimino el libro Carcacia', '1', '---', 'Joel Villalta'),
(87, '2019-06-20 13:12:20', 'elimino el libro Caciaciaaaa', '1', '---', 'Joel Villalta'),
(88, '2019-06-20 13:12:24', 'elimino el libro Caciaciaaaa', '1', '---', 'Joel Villalta'),
(89, '2019-06-20 13:12:31', 'elimino el libro Caciaciaaaa', '1', '---', 'Joel Villalta'),
(90, '2019-06-20 13:14:20', 'ha editado libro: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(91, '2019-06-20 13:14:37', 'ha editado libro: Showdown Craig Codigo: 3', '1', '---', 'Joel Villalta'),
(92, '2019-06-20 13:14:47', 'ha editado libro: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(93, '2019-06-20 13:15:17', 'elimino el libro macharia', '1', '---', 'Joel Villalta'),
(94, '2019-06-20 13:32:13', 'Ingreso un nuevo libro a la base de datos nombre: DELETE THIS PLS', '1', '---', 'Joel Villalta'),
(95, '2019-06-20 13:32:41', 'ha editado libro: DELETE THIS PLS Codigo: 11', '1', '---', 'Joel Villalta'),
(96, '2019-06-20 13:33:56', 'elimino el libro DELETE THIS PLS', '1', '---', 'Joel Villalta'),
(97, '2019-06-20 14:01:30', 'Ingreso un nuevo libro a la base de datos nombre: DELETE THIS BOOK', '1', '---', 'Joel Villalta'),
(98, '2019-06-20 14:01:37', 'elimino el libro DELETE THIS BOOK', '1', '---', 'Joel Villalta'),
(99, '2019-06-20 14:03:06', 'Ingreso un nuevo libro a la base de datos nombre: DELTE THISDELTE THISDELTE THISDELTE THIS', '1', '---', 'Joel Villalta'),
(100, '2019-06-20 14:03:16', 'elimino el libro DELTE THISDELTE THISDELTE THISDELTE THIS', '1', '---', 'Joel Villalta'),
(101, '2019-06-20 15:19:19', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(102, '2019-06-20 17:28:46', ' ingreso un nuevo autor: William  Shakespeare', '1', '---', 'Joel Villalta'),
(103, '2019-06-20 17:51:20', 'ha editado libro: Showdown Craiglist Codigo: ', '1', '---', 'Joel Villalta'),
(104, '2019-06-20 17:51:54', 'ha editado libro: Showdown Craiglist Codigo: 3', '1', '---', 'Joel Villalta'),
(105, '2019-06-20 18:02:54', 'ha editado el autor: Willian Fulkner Codigo: ', '1', '---', 'Joel Villalta'),
(106, '2019-06-20 18:06:19', 'ha editado el autor: Willian Faulkner Codigo: ', '1', '---', 'Joel Villalta'),
(107, '2019-06-20 18:07:57', 'ha editado el autor: Willian Faulkner Codigo: ', '1', '---', 'Joel Villalta'),
(108, '2019-06-20 18:08:17', 'ha editado el autor: Willian Faulkner Codigo: 1', '1', '---', 'Joel Villalta'),
(109, '2019-06-20 18:11:49', ' ingreso un nuevo autor: Virginia Woolf', '1', '---', 'Joel Villalta'),
(110, '2019-06-20 19:02:11', 'ha editado libro: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(111, '2019-06-20 19:08:26', ' ingreso un nuevo autor: Testing Delete', '1', '---', 'Joel Villalta'),
(112, '2019-06-20 19:08:32', 'elimino el autor Testing Delete', '1', '---', 'Joel Villalta'),
(113, '2019-06-20 19:10:59', ' ingreso un nuevo autor: testing delete', '1', '---', 'Joel Villalta'),
(114, '2019-06-20 19:11:53', 'elimino el autor testing delete', '1', '---', 'Joel Villalta'),
(115, '2019-06-20 19:12:37', ' ingreso un nuevo autor: delte asdsad', '1', '---', 'Joel Villalta'),
(116, '2019-06-20 19:12:46', 'elimino el autor delte asdsad', '1', '---', 'Joel Villalta'),
(117, '2019-06-20 19:14:28', ' ingreso un nuevo autor: asdas asdasd', '1', '---', 'Joel Villalta'),
(118, '2019-06-20 19:14:36', 'elimino el autor asdas asdasd', '1', '---', 'Joel Villalta'),
(119, '2019-06-20 19:15:58', ' ingreso un nuevo autor: dwqdwq dwqdq', '1', '---', 'Joel Villalta'),
(120, '2019-06-20 19:16:03', 'elimino el autor dwqdwq dwqdq', '1', '---', 'Joel Villalta'),
(121, '2019-06-20 19:17:07', ' ingreso un nuevo autor: dwq dwq', '1', '---', 'Joel Villalta'),
(122, '2019-06-20 19:17:13', 'elimino el autor dwq dwq', '1', '---', 'Joel Villalta'),
(123, '2019-06-20 19:19:07', ' ingreso un nuevo autor: nain qwdwq', '1', '---', 'Joel Villalta'),
(124, '2019-06-20 19:19:15', 'elimino el autor nain qwdwq', '1', '---', 'Joel Villalta'),
(125, '2019-06-20 19:20:20', ' ingreso un nuevo autor: dwqdwq dqwdqw', '1', '---', 'Joel Villalta'),
(126, '2019-06-20 19:20:24', 'elimino el autor dwqdwq dqwdqw', '1', '---', 'Joel Villalta'),
(127, '2019-06-20 19:21:08', ' ingreso un nuevo autor: dqwdwq dqwdqw', '1', '---', 'Joel Villalta'),
(128, '2019-06-20 19:21:11', 'elimino el autor dqwdwq dqwdqw', '1', '---', 'Joel Villalta'),
(129, '2019-06-20 19:21:13', 'elimino el autor dqwdwq dqwdqw', '1', '---', 'Joel Villalta'),
(130, '2019-06-20 19:24:25', ' ingreso un nuevo autor: qwdwqd dwqdwqd', '1', '---', 'Joel Villalta'),
(131, '2019-06-20 19:24:30', 'elimino el autor qwdwqd dwqdwqd', '1', '---', 'Joel Villalta'),
(132, '2019-06-20 19:25:01', ' ingreso un nuevo autor: qwdwq dwqdwq', '1', '---', 'Joel Villalta'),
(133, '2019-06-20 19:25:05', 'elimino el autor qwdwq dwqdwq', '1', '---', 'Joel Villalta'),
(134, '2019-06-20 19:26:02', 'ha editado el autor: Willians Faulkner Codigo: 1', '1', '---', 'Joel Villalta'),
(135, '2019-06-20 19:26:09', 'ha editado el autor: Willian Faulkner Codigo: 1', '1', '---', 'Joel Villalta'),
(136, '2019-06-20 19:26:16', 'elimino el autor Willian Faulkner', '1', '---', 'Joel Villalta'),
(137, '2019-06-21 05:56:32', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(138, '2019-06-21 05:57:09', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(139, '2019-06-21 06:35:34', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(140, '2019-06-21 06:49:35', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(141, '2019-06-21 06:49:48', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(142, '2019-06-21 06:50:07', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(143, '2019-06-21 07:00:04', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(144, '2019-06-21 07:00:14', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(145, '2019-06-21 07:12:06', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(146, '2019-06-21 07:29:52', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(147, '2019-06-21 07:31:19', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(148, '2019-06-21 07:42:16', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(149, '2019-06-21 07:47:48', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(150, '2019-06-21 07:55:15', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(151, '2019-06-21 08:51:47', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(152, '2019-06-21 08:52:56', 'Ingreso una nueva editorial al sistema: MontaÃ±as de Fuego Internacional', '1', '---', 'Joel Villalta'),
(153, '2019-06-21 08:53:29', ' ingreso un nuevo autor: wqdqwd dwqdqwdq', '1', '---', 'Joel Villalta'),
(154, '2019-06-21 08:53:37', 'ha editado el autor: joorr dwqdqwdq Codigo: 20', '1', '---', 'Joel Villalta'),
(155, '2019-06-21 08:53:46', 'elimino el autor joorr dwqdqwdq', '1', '---', 'Joel Villalta'),
(156, '2019-06-21 08:54:43', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(157, '2019-06-21 09:20:35', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(158, '2019-06-21 14:55:11', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(159, '2019-06-21 14:55:39', 'Ingreso un nuevo libro a la base de datos nombre: wqdwqqwdwq', '1', '---', 'Joel Villalta'),
(160, '2019-06-21 14:56:05', 'elimino el libro wqdwqqwdwq', '1', '---', 'Joel Villalta'),
(161, '2019-06-21 14:57:33', 'Ingreso un nuevo libro a la base de datos nombre: wqdwqdwqdwqd', '1', '---', 'Joel Villalta'),
(162, '2019-06-21 14:58:41', 'Ingreso un nuevo libro a la base de datos nombre: wqddqwdwqdwqd', '1', '---', 'Joel Villalta'),
(163, '2019-06-21 15:00:41', 'elimino el libro wqdwqdwqdwqd', '1', '---', 'Joel Villalta'),
(164, '2019-06-21 15:01:55', 'elimino el libro wqddqwdwqdwqd', '1', '---', 'Joel Villalta'),
(165, '2019-06-21 15:03:13', 'Ingreso un nuevo libro a la base de datos nombre: dwqdqwd', '1', '---', 'Joel Villalta'),
(166, '2019-06-21 15:03:57', 'elimino el libro dwqdqwd', '1', '---', 'Joel Villalta'),
(167, '2019-06-21 15:06:53', 'Ingreso un nuevo libro a la base de datos nombre: dqwdwqdwq', '1', '---', 'Joel Villalta'),
(168, '2019-06-21 15:07:26', 'elimino el libro dqwdwqdwq', '1', '---', 'Joel Villalta'),
(169, '2019-06-21 15:08:08', 'Ingreso un nuevo libro a la base de datos nombre: asdasdasdasdasdasdasdasd', '1', '---', 'Joel Villalta'),
(170, '2019-06-21 15:08:21', 'elimino el libro asdasdasdasdasdasdasdasd', '1', '---', 'Joel Villalta'),
(171, '2019-06-21 15:13:03', 'Ingreso un nuevo libro a la base de datos nombre: asdasdsadasd', '1', '---', 'Joel Villalta'),
(172, '2019-06-21 15:14:30', 'Ingreso un nuevo libro a la base de datos nombre: 123123213', '1', '---', 'Joel Villalta'),
(173, '2019-06-21 15:19:50', 'Ingreso un nuevo libro a la base de datos nombre: wqdwqdwqd', '1', '---', 'Joel Villalta'),
(174, '2019-06-21 15:20:04', 'elimino el libro asdasdsadasd', '1', '---', 'Joel Villalta'),
(175, '2019-06-21 15:26:51', 'elimino el libro wqdwqdwqd', '1', '---', 'Joel Villalta'),
(176, '2019-06-21 15:35:13', 'Ingreso un nuevo libro a la base de datos nombre: answerPrintanswerPrintanswerPrint', '1', '---', 'Joel Villalta'),
(177, '2019-06-21 15:35:26', 'elimino el libro answerPrintanswerPrintanswerPrint', '1', '---', 'Joel Villalta'),
(178, '2019-06-21 15:35:53', 'ha editado libro: Showdown Editado Codigo: 3', '1', '---', 'Joel Villalta'),
(179, '2019-06-21 15:36:33', 'ha editado libro: Showdown Craig Codigo: 3', '1', '---', 'Joel Villalta'),
(180, '2019-06-21 15:46:25', ' ingreso un nuevo autor: delete delete', '1', '---', 'Joel Villalta'),
(181, '2019-06-21 15:47:52', ' ingreso un nuevo autor: dqwdwq wqddqwd', '1', '---', 'Joel Villalta'),
(182, '2019-06-21 15:49:20', ' ingreso un nuevo autor: dwqdwqd dwqdq', '1', '---', 'Joel Villalta'),
(183, '2019-06-21 15:55:05', 'ha editado el autor: delete but edited delete Codigo: 21', '1', '---', 'Joel Villalta'),
(184, '2019-06-21 15:55:18', 'ha editado el autor: delete more edited Codigo: 21', '1', '---', 'Joel Villalta'),
(185, '2019-06-21 15:58:00', 'ha editado el autor: delete nope as Codigo: 21', '1', '---', 'Joel Villalta'),
(186, '2019-06-21 15:58:31', 'ha editado el autor: delete yay aya Codigo: 21', '1', '---', 'Joel Villalta'),
(187, '2019-06-21 15:59:40', 'ha editado el autor: delete yay aya Codigo: 21', '1', '---', 'Joel Villalta'),
(188, '2019-06-21 15:59:49', 'ha editado el autor: delete yay aya Codigo: 21', '1', '---', 'Joel Villalta'),
(189, '2019-06-21 16:07:39', 'elimino el autor delete yay aya', '1', '---', 'Joel Villalta'),
(190, '2019-06-21 16:08:15', 'elimino el autor dwqdwqd dwqdq', '1', '---', 'Joel Villalta'),
(191, '2019-06-21 16:08:25', 'elimino el autor dqwdwq wqddqwd', '1', '---', 'Joel Villalta'),
(192, '2019-06-22 06:55:48', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(193, '2019-06-22 07:31:56', 'Ingreso una nueva editorial al sistema: New Times', '1', '---', 'Joel Villalta'),
(194, '2019-06-22 07:34:00', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(195, '2019-06-22 07:35:43', ' ingreso un nuevo autor: delte this clearEditorial', '1', '---', 'Joel Villalta'),
(196, '2019-06-22 07:36:36', ' ingreso un nuevo autor: dwq qdw', '1', '---', 'Joel Villalta'),
(197, '2019-06-22 07:45:43', 'elimino el autor delte this clearEditorial', '1', '---', 'Joel Villalta'),
(198, '2019-06-22 07:45:47', 'elimino el autor dwq qdw', '1', '---', 'Joel Villalta'),
(199, '2019-06-22 07:46:16', ' ingreso un nuevo autor: pink whata', '1', '---', 'Joel Villalta'),
(200, '2019-06-22 07:47:24', ' ingreso un nuevo autor: delte this pls ye', '1', '---', 'Joel Villalta'),
(201, '2019-06-22 07:49:39', 'elimino el autor pink whata', '1', '---', 'Joel Villalta'),
(202, '2019-06-22 07:49:43', 'elimino el autor delte this pls ye', '1', '---', 'Joel Villalta'),
(203, '2019-06-22 07:50:12', ' ingreso un nuevo autor: wqd dwq', '1', '---', 'Joel Villalta'),
(204, '2019-06-22 07:51:36', ' ingreso un nuevo autor: funciona  si', '1', '---', 'Joel Villalta'),
(205, '2019-06-22 07:54:26', ' ingreso un nuevo autor: funciona! mas', '1', '---', 'Joel Villalta'),
(206, '2019-06-22 07:54:48', 'elimino el autor wqd dwq', '1', '---', 'Joel Villalta'),
(207, '2019-06-22 07:54:51', 'elimino el autor wqd dwq', '1', '---', 'Joel Villalta'),
(208, '2019-06-22 07:54:56', 'elimino el autor funciona  si', '1', '---', 'Joel Villalta'),
(209, '2019-06-22 07:55:01', 'elimino el autor funciona! mas', '1', '---', 'Joel Villalta'),
(210, '2019-06-22 08:03:49', ' ingreso un nuevo autor: qw qw', '1', '---', 'Joel Villalta'),
(211, '2019-06-22 08:05:18', ' ingreso un nuevo autor: as as', '1', '---', 'Joel Villalta'),
(212, '2019-06-22 08:05:32', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(213, '2019-06-22 08:05:42', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(214, '2019-06-22 08:08:30', 'Ingreso una nueva editorial al sistema: Palaga', '1', '---', 'Joel Villalta'),
(215, '2019-06-22 08:09:22', 'Ingreso una nueva editorial al sistema: plastid', '1', '---', 'Joel Villalta'),
(216, '2019-06-22 08:10:47', 'Ingreso una nueva editorial al sistema: plastamid', '1', '---', 'Joel Villalta'),
(217, '2019-06-22 08:11:28', 'Ingreso una nueva editorial al sistema: joeliasdasda', '1', '---', 'Joel Villalta'),
(218, '2019-06-22 08:14:02', 'Ingreso una nueva editorial al sistema: mananaa', '1', '---', 'Joel Villalta'),
(219, '2019-06-22 08:14:14', 'Ingreso una nueva editorial al sistema: menenene', '1', '---', 'Joel Villalta'),
(220, '2019-06-22 09:34:43', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(221, '2019-06-22 10:13:25', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(222, '2019-06-22 10:19:49', 'ha editado libro: 123123213 Codigo: 21', '1', '---', 'Joel Villalta'),
(223, '2019-06-22 10:35:00', 'ha editado libro: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(224, '2019-06-22 10:38:22', 'ha editado libro: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(225, '2019-06-22 11:07:07', 'ha editado libro: Edited book Codigo: 21', '1', '---', 'Joel Villalta'),
(226, '2019-06-22 11:07:24', 'ha editado libro: Edited not so much Codigo: 21', '1', '---', 'Joel Villalta'),
(227, '2019-06-22 11:16:52', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(228, '2019-06-22 11:22:12', ' ingreso un nuevo autor: Steph  2', '1', '---', 'Joel Villalta'),
(229, '2019-06-22 11:22:26', ' ingreso un nuevo autor: steph 3 3', '1', '---', 'Joel Villalta'),
(230, '2019-06-22 11:27:16', 'ha editado el autor: Steph editado 2 Codigo: 18', '1', '---', 'Joel Villalta'),
(231, '2019-06-22 11:28:16', 'elimino el autor steph 3 3', '1', '---', 'Joel Villalta'),
(232, '2019-06-22 18:12:37', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(233, '2019-06-22 18:34:03', 'ha editado libro: Dancing night Codigo: 21', '1', '---', 'Joel Villalta'),
(234, '2019-06-22 19:09:38', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(235, '2019-06-22 19:09:46', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(236, '2019-06-22 19:12:05', ' realizo un cambio de clave exitosamente', '1', '---', 'Joel Villalta'),
(237, '2019-06-22 19:12:09', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(238, '2019-06-22 19:12:16', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(239, '2019-06-22 19:12:43', 'ha editado el autor: DELETE THIS qw Codigo: 16', '1', '---', 'Joel Villalta'),
(240, '2019-06-22 19:12:50', 'elimino el autor DELETE THIS qw', '1', '---', 'Joel Villalta'),
(241, '2019-06-22 19:12:57', 'elimino el autor as as', '1', '---', 'Joel Villalta'),
(242, '2019-06-22 19:13:51', 'Ingreso un nuevo libro a la base de datos nombre: Delete this', '1', '---', 'Joel Villalta'),
(243, '2019-06-22 19:14:00', 'ha editado libro: Delete this Codigo: 22', '1', '---', 'Joel Villalta'),
(244, '2019-06-22 19:14:06', 'elimino el libro Delete this', '1', '---', 'Joel Villalta'),
(245, '2019-06-22 21:57:16', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(246, '2019-06-22 22:00:20', 'elimino el autor Steph editado 2', '1', '---', 'Joel Villalta'),
(247, '2019-06-22 22:05:02', 'ha editado el autor: Virginia Wolf Codigo: 8', '1', '---', 'Joel Villalta'),
(248, '2019-06-22 22:05:45', ' ingreso un nuevo autor: qwwq dqwdwq', '1', '---', 'Joel Villalta'),
(249, '2019-06-22 22:05:49', 'elimino el autor qwwq dqwdwq', '1', '---', 'Joel Villalta'),
(250, '2019-06-22 22:08:40', ' ingreso un nuevo autor: wqd dwqdqw', '1', '---', 'Joel Villalta'),
(251, '2019-06-22 22:43:03', 'Ingreso un nuevo libro a la base de datos nombre: wqdqwd', '1', '---', 'Joel Villalta'),
(252, '2019-06-22 23:07:28', 'elimino el libro wqdqwd', '1', '---', 'Joel Villalta'),
(253, '2019-06-24 11:19:15', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(254, '2019-06-24 11:20:34', ' ingreso un nuevo autor: dqwdwqdwq dwqsdwqdwqdwq', '1', '---', 'Joel Villalta'),
(255, '2019-06-24 11:26:04', ' ingreso un nuevo autor: nuevo autor nuevo autor', '1', '---', 'Joel Villalta'),
(256, '2019-06-24 11:36:34', 'elimino el autor nuevo autor nuevo autor', '1', '---', 'Joel Villalta'),
(257, '2019-06-24 11:38:56', ' ingreso un nuevo autor: qwq w', '1', '---', 'Joel Villalta'),
(258, '2019-06-24 11:45:21', ' ingreso un nuevo autor: 12312312 123123', '1', '---', 'Joel Villalta'),
(259, '2019-06-24 11:47:34', ' ingreso un nuevo autor: dwqdwqdwqd dqwdqwd', '1', '---', 'Joel Villalta'),
(260, '2019-06-24 11:59:17', 'elimino el autor wqd dwqdqw', '1', '---', 'Joel Villalta'),
(261, '2019-06-24 12:15:52', 'elimino el autor dqwdwqdwq dwqsdwqdwqdwq', '1', '---', 'Joel Villalta'),
(262, '2019-06-27 09:07:29', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(263, '2019-06-27 09:23:17', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(264, '2019-06-27 09:24:47', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(265, '2019-06-27 09:25:09', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(266, '2019-06-27 09:26:02', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(267, '2019-06-27 09:27:24', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(268, '2019-06-27 09:27:45', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(269, '2019-06-27 09:31:39', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(270, '2019-06-27 10:29:08', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(271, '2019-06-27 10:31:31', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(272, '2019-06-27 10:33:09', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(273, '2019-06-27 11:31:35', 'Ingreso un nuevo libro a la base de datos nombre: wqdwq', '1', '---', 'Joel Villalta'),
(274, '2019-06-27 11:31:42', 'elimino el libro wqdwq', '1', '---', 'Joel Villalta'),
(275, '2019-06-27 11:40:27', 'Ingreso un nuevo libro a la base de datos nombre: delete', '1', '---', 'Joel Villalta'),
(276, '2019-06-27 11:57:26', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(277, '2019-06-27 12:11:03', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(278, '2019-06-27 12:12:49', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(279, '2019-06-27 12:13:48', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(280, '2019-06-27 12:29:18', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(281, '2019-06-27 12:29:39', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(282, '2019-06-27 12:32:49', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(283, '2019-06-27 12:33:11', 'ha editado libro: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(284, '2019-06-27 13:07:08', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(285, '2019-06-27 13:41:00', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(286, '2019-06-27 13:41:31', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(287, '2019-06-27 13:42:08', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(288, '2019-06-27 13:45:03', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(289, '2019-06-27 13:48:22', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(290, '2019-06-27 13:49:23', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(291, '2019-06-27 13:49:40', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(292, '2019-06-27 13:51:10', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(293, '2019-06-27 13:51:43', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(294, '2019-06-27 13:52:08', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(295, '2019-06-27 13:52:15', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(296, '2019-06-27 15:52:56', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(297, '2019-06-27 18:04:03', 'ha agregado una nueva imagen de portada:  Codigo: ', '', '---', ''),
(298, '2019-06-27 18:04:29', 'ha agregado una nueva imagen de portada:  Codigo: ', '', '---', ''),
(299, '2019-06-27 18:05:03', 'ha agregado una nueva imagen de portada:  Codigo: ', '', '---', ''),
(300, '2019-06-27 18:05:41', 'ha agregado una nueva imagen de portada:  Codigo: ', '1', '---', 'Joel Villalta'),
(301, '2019-06-27 18:09:51', 'ha agregado una nueva imagen de portada: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(302, '2019-06-27 18:11:52', 'ha agregado una nueva imagen de portada:  Codigo: ', '1', '---', 'Joel Villalta'),
(303, '2019-06-27 18:12:26', 'ha agregado una nueva imagen de portada: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(304, '2019-06-27 18:12:53', 'ha agregado una nueva imagen de portada: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(305, '2019-06-27 18:14:47', 'ha agregado una nueva imagen de portada: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(306, '2019-06-27 18:14:57', 'ha agregado una nueva imagen de portada: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(307, '2019-06-27 18:20:24', 'ha agregado una nueva imagen de portada: Dancing night Codigo: 21', '1', '---', 'Joel Villalta'),
(308, '2019-06-27 18:22:37', 'ha agregado una nueva imagen de portada: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(309, '2019-06-27 18:27:18', 'ha agregado una nueva imagen de portada: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(310, '2019-06-27 18:30:40', 'ha agregado una nueva imagen de portada: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(311, '2019-06-27 18:40:48', 'ha agregado una nueva imagen de portada: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(312, '2019-06-27 18:42:59', 'ha agregado una nueva imagen de portada: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(313, '2019-06-27 18:46:22', 'ha agregado una nueva imagen de portada: Dancing night Codigo: 21', '1', '---', 'Joel Villalta'),
(314, '2019-06-27 18:48:59', 'ha agregado una nueva imagen de portada: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(315, '2019-06-27 18:50:42', 'ha agregado una nueva imagen de portada: Showdown  Codigo: 3', '1', '---', 'Joel Villalta'),
(316, '2019-06-27 18:55:40', 'ha editado libro: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(317, '2019-06-27 19:00:25', 'ha agregado una nueva imagen de portada: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(318, '2019-06-27 19:00:41', 'ha editado libro: Book of Notes Codigo: 4', '1', '---', 'Joel Villalta'),
(319, '2019-06-27 20:25:09', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(320, '2019-06-27 20:28:53', ' ingreso un nuevo Estante: A2', '1', '---', 'Joel Villalta'),
(321, '2019-06-27 20:32:01', 'elimino el Estante A2', '1', '---', 'Joel Villalta'),
(322, '2019-06-27 20:42:11', 'elimino el Editorial MontaÃ±as de Fuego Internacional', '1', '---', 'Joel Villalta'),
(323, '2019-06-27 20:42:54', 'ha agregado una nueva imagen de portada: delete Codigo: 23', '1', '---', 'Joel Villalta'),
(324, '2019-06-27 20:43:24', 'elimino el libro delete', '1', '---', 'Joel Villalta'),
(325, '2019-06-27 21:20:23', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(326, '2019-06-27 21:21:05', 'ha editado libro: Dancing night Codigo: 21', '1', '---', 'Joel Villalta'),
(327, '2019-06-27 21:43:22', 'ha editado libro: Showdown Carg Codigo: 3', '1', '---', 'Joel Villalta'),
(328, '2019-07-02 16:20:16', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(329, '2019-07-04 08:07:47', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(330, '2019-07-04 08:08:07', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(331, '2019-07-04 08:48:01', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(332, '2019-07-04 14:16:11', 'Agrega un libro a su carrito de prestamo: ', '1', '---', 'Joel Villalta'),
(333, '2019-07-04 14:47:54', 'Agrega un libro a su carrito de prestamo: ', '1', '---', 'Joel Villalta'),
(334, '2019-07-04 14:49:17', 'Agrega un libro a su carrito de prestamo: Showdown Carg', '1', '---', 'Joel Villalta'),
(335, '2019-07-04 14:50:13', 'Agrega un libro a su carrito de prestamo: Showdown Carg', '1', '---', 'Joel Villalta'),
(336, '2019-07-04 15:03:25', 'Agrega un libro a su carrito de prestamo: Book of Notes', '1', '---', 'Joel Villalta'),
(337, '2019-07-04 16:13:41', 'Agrega un libro a su carrito de prestamo: Showdown Carg', '1', '---', 'Joel Villalta'),
(338, '2019-07-04 16:19:25', 'Agrega un libro a su carrito de prestamo: Book of Notes', '1', '---', 'Joel Villalta'),
(339, '2019-07-04 16:20:23', 'Agrega un libro a su carrito de prestamo: Dancing night', '1', '---', 'Joel Villalta'),
(340, '2019-07-04 16:38:51', 'Agrega un libro a su carrito de prestamo: Showdown Carg', '1', '---', 'Joel Villalta'),
(341, '2019-07-04 16:39:55', 'Agrega un libro a su carrito de prestamo: Book of Notes', '1', '---', 'Joel Villalta'),
(342, '2019-07-04 16:40:46', 'Agrega un libro a su carrito de prestamo: Dancing night', '1', '---', 'Joel Villalta'),
(343, '2019-07-04 20:23:13', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(344, '2019-07-04 20:25:41', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(345, '2019-07-04 20:25:47', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(346, '2019-07-04 20:47:11', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(347, '2019-07-04 20:50:23', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(348, '2019-07-04 20:50:30', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(349, '2019-07-04 20:51:40', 'Agrega un libro a su carrito de prestamo: ', '1', '---', 'Joel Villalta'),
(350, '2019-07-04 21:01:39', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(351, '2019-07-04 21:01:43', 'Agrega un libro a su carrito de prestamo: ', '1', '---', 'Joel Villalta'),
(352, '2019-07-04 21:10:04', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(353, '2019-07-04 21:10:10', 'Agrega un libro a su carrito de prestamo: ', '1', '---', 'Joel Villalta'),
(354, '2019-07-04 21:10:14', 'Agrega un libro a su carrito de prestamo: ', '1', '---', 'Joel Villalta'),
(355, '2019-07-04 21:10:23', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(356, '2019-07-04 21:11:21', 'Agrega un libro a su carrito de prestamo: ', '1', '---', 'Joel Villalta'),
(357, '2019-07-05 06:38:48', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(358, '2019-07-05 06:47:37', 'elimino un item de su lista de prestamo', '1', '---', 'Joel Villalta'),
(359, '2019-07-05 06:47:42', 'Agrega un libro a su carrito de prestamo: ', '1', '---', 'Joel Villalta'),
(360, '2019-07-11 08:54:19', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(361, '2019-07-11 08:54:43', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(362, '2019-07-12 09:35:52', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(363, '2019-07-12 09:39:02', ' ingreso un nuevo codigo dewey: testing', '1', '---', 'Joel Villalta'),
(364, '2019-07-12 09:40:38', ' ingreso un nuevo Usuario: JUAN', '19002', '---', 'Joel Villalta'),
(365, '2019-07-12 09:40:42', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(366, '2019-07-12 09:40:59', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(367, '2019-07-12 09:42:37', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(368, '2019-07-12 09:44:50', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(369, '2019-07-12 09:45:24', 'ha editado el usuario: JUAN  Codigo: 2', '1', '---', 'Joel Villalta'),
(370, '2019-07-12 09:45:30', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(371, '2019-07-12 09:45:46', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(372, '2019-07-12 09:46:02', 'ha editado el usuario: JUAN  Codigo: 2', '1', '---', 'Joel Villalta'),
(373, '2019-07-12 09:46:05', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(374, '2019-07-12 09:46:12', 'ingreso exitosamente al sistema', '2', '---', 'JUAN MEDRANO'),
(375, '2019-07-12 09:46:28', ' realizo un cambio de clave exitosamente', '2', '---', 'JUAN MEDRANO'),
(376, '2019-07-12 09:46:31', ' se deslogeo del sistema exitosamente ', '2', '---', 'JUAN MEDRANO'),
(377, '2019-07-12 09:46:37', 'ingreso exitosamente al sistema', '2', '---', 'JUAN MEDRANO'),
(378, '2019-07-12 09:46:54', 'ha editado el usuario: JUAN  Codigo: 2', '2', '---', 'JUAN MEDRANO'),
(379, '2019-07-12 09:46:58', ' se deslogeo del sistema exitosamente ', '2', '---', 'JUAN MEDRANO'),
(380, '2019-07-12 09:47:15', 'ingreso exitosamente al sistema', '2', '---', 'JUAN MEDRANO'),
(381, '2019-07-12 09:48:46', 'ingreso exitosamente al sistema', '2', '---', 'JUAN MEDRANO'),
(382, '2019-07-19 11:47:51', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(383, '2019-07-19 11:53:23', ' ingreso un nuevo Estante: A1', '1', '---', 'Joel Villalta'),
(384, '2019-07-19 11:53:27', ' ingreso un nuevo Estante: A2', '1', '---', 'Joel Villalta'),
(385, '2019-07-19 11:53:31', ' ingreso un nuevo Estante: A3', '1', '---', 'Joel Villalta'),
(386, '2019-07-19 11:53:58', 'ha agregado una nueva imagen de portada: Showdown Carg Codigo: 3', '1', '---', 'Joel Villalta'),
(387, '2019-07-19 12:03:58', ' ingreso un nuevo Usuario: BRANDON', '19003', '---', 'Joel Villalta'),
(388, '2019-07-19 12:05:22', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(389, '2019-07-19 12:05:31', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(390, '2019-07-19 13:04:59', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(391, '2019-07-19 13:05:44', ' ingreso un nuevo equipo: calculadora electronica', '1', '---', 'Joel Villalta'),
(392, '2019-07-19 13:14:03', 'ha agregado una nueva imagen al equipo: calculadora electronica Codigo: 1', '1', '---', 'Joel Villalta'),
(393, '2019-07-19 19:41:05', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(394, '2019-07-19 19:54:21', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'Joel Villalta'),
(395, '2019-07-19 19:54:21', 'Prestamo realizado', '1', '---', 'Joel Villalta'),
(396, '2019-07-19 19:55:28', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(397, '2019-07-19 19:57:35', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(398, '2019-07-19 19:57:40', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(399, '2019-07-19 20:00:51', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(400, '2019-07-19 20:03:54', ' se deslogeo del sistema exitosamente ', '1', '---', 'Joel Villalta'),
(401, '2019-07-19 20:04:09', 'ingreso exitosamente al sistema', '3', '---', 'BRANDON MELERA'),
(402, '2019-07-19 20:04:21', ' se deslogeo del sistema exitosamente ', '3', '---', 'BRANDON MELERA'),
(403, '2019-07-19 20:05:58', 'ingreso exitosamente al sistema', '3', '---', 'BRANDON MELERA'),
(404, '2019-07-19 20:06:03', ' se deslogeo del sistema exitosamente ', '3', '---', 'BRANDON MELERA'),
(405, '2019-07-19 20:07:31', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(406, '2019-07-19 20:08:01', 'elimino un item de su lista de prestamo en tabla detallesprestamolibro', '1', '---', 'Joel Villalta'),
(407, '2019-07-19 20:09:02', 'Libro codigo 5 puesto en estado 1=prestado', '1', '---', 'Joel Villalta'),
(408, '2019-07-19 20:09:02', 'Prestamo realizado', '1', '---', 'Joel Villalta'),
(409, '2019-07-19 20:12:39', 'elimino un item de su lista de prestamo en tabla detallesprestamolibro', '1', '---', 'Joel Villalta'),
(410, '2019-07-19 20:49:54', 'Libro codigo 11 puesto en estado 1=prestado', '1', '---', 'Joel Villalta'),
(411, '2019-07-19 20:49:54', 'Prestamo realizado', '1', '---', 'Joel Villalta'),
(412, '2019-07-19 21:54:21', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(413, '2019-07-19 21:56:41', 'ha agregado una nueva imagen de portada: Showdown Carg Codigo: 3', '1', '---', 'Joel Villalta'),
(414, '2019-07-19 21:56:56', 'ha editado libro: The Queen of Hearts Codigo: 3', '1', '---', 'Joel Villalta'),
(415, '2019-07-19 21:57:13', 'ha editado libro: The Way in the forest Codigo: 4', '1', '---', 'Joel Villalta'),
(416, '2019-07-19 21:57:57', 'ha editado libro: Book  Codigo: 23', '1', '---', 'Joel Villalta'),
(417, '2019-07-23 10:24:26', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(418, '2019-07-23 10:25:32', 'ha agregado una nueva imagen de portada: The Queen of Hearts Codigo: 3', '1', '---', 'Joel Villalta'),
(419, '2019-07-23 10:36:59', 'ha agregado una nueva imagen de portada: The Queen of Hearts Codigo: 3', '1', '---', 'Joel Villalta'),
(420, '2019-07-24 07:35:18', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(421, '2019-07-24 08:15:50', 'ha agregado una nueva imagen de portada: The Queen of Hearts Codigo: 3', '1', '---', 'Joel Villalta'),
(422, '2019-07-24 08:16:18', 'ha agregado una nueva imagen de portada: Book  Codigo: 23', '1', '---', 'Joel Villalta'),
(423, '2019-07-24 08:29:05', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(424, '2019-07-24 08:35:11', 'elimino un item de su lista de prestamo en tabla detallesprestamolibro', '1', '---', 'Joel Villalta'),
(425, '2019-07-24 08:39:14', 'Libro codigo 5 puesto en estado 1=prestado', '1', '---', 'Joel Villalta'),
(426, '2019-07-24 08:39:14', 'Prestamo realizado', '1', '---', 'Joel Villalta'),
(427, '2019-07-24 11:08:01', 'ingreso exitosamente al sistema', '1', '---', 'Joel Villalta'),
(428, '2019-07-27 06:58:54', 'ingreso exitosamente al sistema', '2', '---', 'JUAN MEDRANO'),
(429, '2019-07-27 07:15:16', 'elimino un item de su lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(430, '2019-07-27 12:31:50', 'Libro codigo 1 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(431, '2019-07-27 12:31:50', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(432, '2019-07-27 14:56:41', 'elimino un item de su lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(433, '2019-07-27 15:14:58', 'elimino un item de su lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(434, '2019-07-27 15:15:16', 'elimino un item de su lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(435, '2019-07-27 15:26:29', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(436, '2019-07-27 15:27:51', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(437, '2019-07-27 15:29:14', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(438, '2019-07-27 15:34:51', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(439, '2019-07-27 15:34:56', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(440, '2019-07-27 15:40:25', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(441, '2019-07-27 17:25:24', 'ha editado el usuario: JOEL  Codigo: 1', '2', '---', 'JUAN MEDRANO'),
(442, '2019-07-27 18:04:38', 'Libro codigo 1 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(443, '2019-07-27 18:04:38', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(444, '2019-07-27 18:30:17', 'Libro codigo 3 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(445, '2019-07-27 18:30:17', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(446, '2019-07-27 18:53:15', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(447, '2019-07-27 19:08:49', 'Libro codigo 4 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(448, '2019-07-27 19:08:49', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(449, '2019-07-27 19:26:44', 'Libro codigo 7 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(450, '2019-07-27 19:26:44', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(451, '2019-07-27 19:33:43', 'Libro codigo 1 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(452, '2019-07-27 19:33:43', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(453, '2019-07-27 19:43:15', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(454, '2019-07-27 19:43:19', 'Libro codigo 3 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(455, '2019-07-27 19:43:19', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(456, '2019-07-27 19:49:27', 'Libro codigo 5 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(457, '2019-07-27 19:49:27', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(458, '2019-07-27 19:52:14', 'Libro codigo 16 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(459, '2019-07-27 19:52:14', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(460, '2019-07-27 19:52:43', 'Libro codigo 1 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(461, '2019-07-27 19:52:43', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(462, '2019-07-27 19:55:52', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(463, '2019-07-27 21:39:59', 'ingreso exitosamente al sistema', '2', '---', 'JUAN MEDRANO'),
(464, '2019-07-27 21:58:34', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(465, '2019-07-27 21:58:34', 'elimino un registro de prestamos', '2', '---', 'JUAN MEDRANO'),
(466, '2019-07-27 22:07:18', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(467, '2019-07-27 22:07:18', 'elimino un registro de prestamos', '2', '---', 'JUAN MEDRANO'),
(468, '2019-07-27 22:35:04', 'Libro codigo 1 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(469, '2019-07-27 22:35:04', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(470, '2019-07-27 22:35:34', 'Libro codigo 2 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(471, '2019-07-27 22:35:34', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(472, '2019-07-27 22:56:57', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(473, '2019-07-27 22:56:57', 'elimino un registro de prestamos', '2', '---', 'JUAN MEDRANO'),
(474, '2019-07-27 22:57:01', 'Libro codigo 1 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(475, '2019-07-27 22:57:01', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(476, '2019-07-28 07:51:43', 'ingreso exitosamente al sistema', '2', '---', 'JUAN MEDRANO'),
(477, '2019-07-28 07:52:04', 'ha editado el usuario: JOEL  Codigo: 1', '2', '---', 'JUAN MEDRANO'),
(478, '2019-07-28 08:36:45', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(479, '2019-07-28 08:36:45', 'elimino un registro de prestamos', '2', '---', 'JUAN MEDRANO'),
(480, '2019-07-28 08:50:23', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(481, '2019-07-28 08:50:23', 'elimino un registro de prestamos', '2', '---', 'JUAN MEDRANO'),
(482, '2019-07-28 09:12:57', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '2', '---', 'JUAN MEDRANO'),
(483, '2019-07-28 09:13:02', 'Libro codigo 2 puesto en estado 1=prestado', '2', '---', 'JUAN MEDRANO'),
(484, '2019-07-28 09:13:02', 'Prestamo realizado', '2', '---', 'JUAN MEDRANO'),
(485, '2019-07-28 13:11:00', 'ingreso exitosamente al sistema', '1', '---', 'JOEL VILLALTA'),
(486, '2019-07-28 13:11:11', ' realizo un cambio de clave exitosamente', '1', '---', 'JOEL VILLALTA'),
(487, '2019-07-28 13:11:14', ' se deslogeo del sistema exitosamente ', '1', '---', 'JOEL VILLALTA'),
(488, '2019-07-28 13:11:19', 'ingreso exitosamente al sistema', '1', '---', 'JOEL VILLALTA'),
(489, '2019-07-28 13:12:05', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(490, '2019-07-28 13:12:15', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(491, '2019-07-28 13:12:15', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(492, '2019-07-28 13:12:15', 'Libro codigo 16 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(493, '2019-07-28 13:12:15', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(494, '2019-07-28 13:12:49', 'Libro codigo 8 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(495, '2019-07-28 13:12:49', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(496, '2019-07-28 15:37:59', 'Ejemplar: 123-15-415-112 devuelto PROCESO DE PRESTAMO: 14', '1', '---', 'JOEL VILLALTA'),
(497, '2019-07-28 15:37:59', 'Usuario puesto en activo, devolucion realizada en proceso: 14', '1', '---', 'JOEL VILLALTA');
INSERT INTO `bitacora` (`bircod`, `bitfec`, `bitdes`, `bitusucod`, `bitnomlib`, `bitnombre`) VALUES
(498, '2019-07-28 15:44:48', 'Ejemplar: 123-15-415-112 devuelto PROCESO DE PRESTAMO: 14', '1', '---', 'JOEL VILLALTA'),
(499, '2019-07-28 15:44:49', 'Usuario puesto en activo, devolucion realizada en proceso: 14', '1', '---', 'JOEL VILLALTA'),
(500, '2019-07-28 15:48:51', 'Ejemplar: 123-15-415-112 devuelto PROCESO DE PRESTAMO: 14', '1', '---', 'JOEL VILLALTA'),
(501, '2019-07-28 15:48:51', 'Usuario puesto en activo, devolucion realizada en proceso: 14', '1', '---', 'JOEL VILLALTA'),
(502, '2019-07-28 15:50:57', 'Ejemplar: 123-15-415-107 devuelto PROCESO DE PRESTAMO: 15', '1', '---', 'JOEL VILLALTA'),
(503, '2019-07-28 15:51:19', 'Ejemplar: 123-15-600-126 devuelto PROCESO DE PRESTAMO: 15', '1', '---', 'JOEL VILLALTA'),
(504, '2019-07-28 15:52:31', 'Ejemplar: 123-15-415-106 devuelto PROCESO DE PRESTAMO: 15', '1', '---', 'JOEL VILLALTA'),
(505, '2019-07-28 15:52:31', 'Usuario puesto en activo, devolucion realizada en proceso: 15', '1', '---', 'JOEL VILLALTA'),
(506, '2019-07-28 15:53:07', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(507, '2019-07-28 15:53:07', 'Libro codigo 4 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(508, '2019-07-28 15:53:07', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(509, '2019-07-28 15:53:08', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(510, '2019-07-28 15:53:30', 'Ejemplar: 123-15-415-106 devuelto PROCESO DE PRESTAMO: 15', '1', '---', 'JOEL VILLALTA'),
(511, '2019-07-28 15:59:44', 'Ejemplar: 123-15-415-107 devuelto PROCESO DE PRESTAMO: 15', '1', '---', 'JOEL VILLALTA'),
(512, '2019-07-28 15:59:44', 'Usuario puesto en activo, devolucion realizada en proceso: 15', '1', '---', 'JOEL VILLALTA'),
(513, '2019-07-28 15:59:56', 'Ejemplar: 123-15-415-108 devuelto PROCESO DE PRESTAMO: 16', '1', '---', 'JOEL VILLALTA'),
(514, '2019-07-28 15:59:56', 'Usuario puesto en activo, devolucion realizada en proceso: 16', '1', '---', 'JOEL VILLALTA'),
(515, '2019-07-28 16:03:22', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(516, '2019-07-28 16:03:22', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(517, '2019-07-28 16:03:22', 'Libro codigo 4 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(518, '2019-07-28 16:03:22', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(519, '2019-07-28 16:03:35', 'Ejemplar: 123-15-415-106 devuelto PROCESO DE PRESTAMO: 17', '1', '---', 'JOEL VILLALTA'),
(520, '2019-07-28 16:03:45', 'Ejemplar: 123-15-415-108 devuelto PROCESO DE PRESTAMO: 17', '1', '---', 'JOEL VILLALTA'),
(521, '2019-07-28 16:03:49', 'Ejemplar: 123-15-415-107 devuelto PROCESO DE PRESTAMO: 17', '1', '---', 'JOEL VILLALTA'),
(522, '2019-07-28 16:03:50', 'Usuario puesto en activo, devolucion realizada en proceso: 17', '1', '---', 'JOEL VILLALTA'),
(523, '2019-07-28 16:08:04', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(524, '2019-07-28 16:08:04', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(525, '2019-07-28 16:08:04', 'Libro codigo 4 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(526, '2019-07-28 16:08:04', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(527, '2019-07-28 16:08:18', 'Ejemplar: 123-15-415-106 devuelto PROCESO DE PRESTAMO: 18', '1', '---', 'JOEL VILLALTA'),
(528, '2019-07-28 16:09:20', 'Ejemplar: 123-15-415-107 devuelto PROCESO DE PRESTAMO: 18', '1', '---', 'JOEL VILLALTA'),
(529, '2019-07-28 16:10:49', 'Ejemplar: 123-15-415-108 devuelto PROCESO DE PRESTAMO: 18', '1', '---', 'JOEL VILLALTA'),
(530, '2019-07-28 16:10:49', 'Usuario puesto en activo, devolucion realizada en proceso: 18', '1', '---', 'JOEL VILLALTA'),
(531, '2019-07-28 16:14:20', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(532, '2019-07-28 16:14:20', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(533, '2019-07-28 16:14:20', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(534, '2019-07-28 16:14:20', 'Libro codigo 4 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(535, '2019-07-28 16:14:20', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(536, '2019-07-28 16:14:29', 'Ejemplar: 123-15-415-105 devuelto PROCESO DE PRESTAMO: 19', '1', '---', 'JOEL VILLALTA'),
(537, '2019-07-28 16:17:13', 'Ejemplar: 123-15-415-106 devuelto PROCESO DE PRESTAMO: 19', '1', '---', 'JOEL VILLALTA'),
(538, '2019-07-28 16:18:14', 'Ejemplar: 123-15-415-107 devuelto PROCESO DE PRESTAMO: 19', '1', '---', 'JOEL VILLALTA'),
(539, '2019-07-28 16:18:55', 'Ejemplar: 123-15-415-108 devuelto PROCESO DE PRESTAMO: 19', '1', '---', 'JOEL VILLALTA'),
(540, '2019-07-28 16:18:55', 'Usuario puesto en activo, devolucion realizada en proceso: 19', '1', '---', 'JOEL VILLALTA'),
(541, '2019-07-28 16:22:27', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(542, '2019-07-28 16:25:40', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(543, '2019-07-28 16:26:02', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(544, '2019-07-28 16:26:54', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(545, '2019-07-28 16:31:05', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(546, '2019-07-28 16:31:05', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(547, '2019-07-28 16:31:05', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(548, '2019-07-28 16:31:05', 'Libro codigo 4 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(549, '2019-07-28 16:31:05', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(550, '2019-07-28 16:31:14', 'Ejemplar: 123-15-415-105 devuelto PROCESO DE PRESTAMO: 20', '1', '---', 'JOEL VILLALTA'),
(551, '2019-07-28 16:31:41', 'Ejemplar: 123-15-415-106 devuelto PROCESO DE PRESTAMO: 20', '1', '---', 'JOEL VILLALTA'),
(552, '2019-07-28 16:32:37', 'Ejemplar: 123-15-415-108 devuelto PROCESO DE PRESTAMO: 20', '1', '---', 'JOEL VILLALTA'),
(553, '2019-07-28 16:32:40', 'Ejemplar: 123-15-415-107 devuelto PROCESO DE PRESTAMO: 20', '1', '---', 'JOEL VILLALTA'),
(554, '2019-07-28 16:32:40', 'Usuario puesto en activo, devolucion realizada en proceso: 20', '1', '---', 'JOEL VILLALTA'),
(555, '2019-07-28 16:33:54', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(556, '2019-07-28 16:33:54', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(557, '2019-07-28 16:54:26', 'Ejemplar: 123-15-415-105, Puesto en Disponible Aunque no existe Registro de Prestamo enlazado', '1', '---', 'JOEL VILLALTA'),
(558, '2019-07-28 16:55:44', 'Ejemplar: 123-15-415-105, Puesto en Disponible Aunque no existe Registro de Prestamo enlazado', '1', '---', 'JOEL VILLALTA'),
(559, '2019-07-28 16:58:39', 'Equipo: 9560, Puesto en Disponible Aunque no existe Registro de Prestamo enlazado', '1', '---', 'JOEL VILLALTA'),
(560, '2019-07-28 17:13:12', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 21', '1', '---', 'JOEL VILLALTA'),
(561, '2019-07-28 17:13:12', 'Usuario puesto en activo, devolucion realizada en proceso: 21', '1', '---', 'JOEL VILLALTA'),
(562, '2019-07-28 17:14:26', 'EQUIPO: 9557 devuelto PROCESO DE PRESTAMO: 19', '1', '---', 'JOEL VILLALTA'),
(563, '2019-07-28 17:14:26', 'Usuario puesto en activo, devolucion realizada en proceso: 19', '1', '---', 'JOEL VILLALTA'),
(564, '2019-07-28 17:14:43', 'Equipo: 9560, Puesto en Disponible Aunque no existe Registro de Prestamo enlazado', '1', '---', 'JOEL VILLALTA'),
(565, '2019-07-28 17:18:07', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(566, '2019-07-28 17:18:56', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(567, '2019-07-28 17:18:56', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(568, '2019-07-28 17:18:56', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(569, '2019-07-28 17:18:56', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(570, '2019-07-28 17:19:05', 'EQUIPO: 9560 devuelto PROCESO DE PRESTAMO: 22', '1', '---', 'JOEL VILLALTA'),
(571, '2019-07-28 17:19:41', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 22', '1', '---', 'JOEL VILLALTA'),
(572, '2019-07-28 17:20:55', 'EQUIPO: 9557 devuelto PROCESO DE PRESTAMO: 22', '1', '---', 'JOEL VILLALTA'),
(573, '2019-07-28 17:20:55', 'Usuario puesto en activo, devolucion realizada en proceso: 22', '1', '---', 'JOEL VILLALTA'),
(574, '2019-07-28 17:23:16', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(575, '2019-07-28 17:23:34', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(576, '2019-07-28 17:24:13', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(577, '2019-07-28 17:24:18', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(578, '2019-07-28 17:26:23', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(579, '2019-07-28 17:26:26', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(580, '2019-07-28 17:26:47', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(581, '2019-07-28 17:26:47', 'elimino un registro de prestamos', '1', '---', 'JOEL VILLALTA'),
(582, '2019-07-28 17:27:58', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(583, '2019-07-28 17:27:59', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(584, '2019-07-28 17:27:59', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(585, '2019-07-28 17:27:59', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(586, '2019-07-28 17:28:08', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 24', '1', '---', 'JOEL VILLALTA'),
(587, '2019-07-28 17:30:28', 'EQUIPO: 9560 devuelto PROCESO DE PRESTAMO: 24', '1', '---', 'JOEL VILLALTA'),
(588, '2019-07-28 17:30:45', 'EQUIPO: 9557 devuelto PROCESO DE PRESTAMO: 24', '1', '---', 'JOEL VILLALTA'),
(589, '2019-07-28 17:30:45', 'Usuario puesto en activo, devolucion realizada en proceso: 24', '1', '---', 'JOEL VILLALTA'),
(590, '2019-07-28 19:40:35', 'ingreso exitosamente al sistema', '1', '---', 'JOEL VILLALTA'),
(591, '2019-07-28 19:42:40', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(592, '2019-07-28 19:42:40', 'elimino un registro de prestamos', '1', '---', 'JOEL VILLALTA'),
(593, '2019-07-28 19:43:29', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(594, '2019-07-28 19:43:29', 'Libro codigo 4 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(595, '2019-07-28 19:43:29', 'Libro codigo 5 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(596, '2019-07-28 19:43:29', 'Libro codigo 6 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(597, '2019-07-28 19:43:29', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(598, '2019-07-28 19:43:41', 'Ejemplar: 123-15-415-107 devuelto PROCESO DE PRESTAMO: 22', '1', '---', 'JOEL VILLALTA'),
(599, '2019-07-28 19:44:13', 'Ejemplar: 123-15-415-108 devuelto PROCESO DE PRESTAMO: 22', '1', '---', 'JOEL VILLALTA'),
(600, '2019-07-28 19:44:26', 'Ejemplar: 123-15-415-109 devuelto PROCESO DE PRESTAMO: 22', '1', '---', 'JOEL VILLALTA'),
(601, '2019-07-28 19:44:29', 'Ejemplar: 123-15-415-110 devuelto PROCESO DE PRESTAMO: 22', '1', '---', 'JOEL VILLALTA'),
(602, '2019-07-28 19:44:29', 'Usuario puesto en activo, devolucion realizada en proceso: 22', '1', '---', 'JOEL VILLALTA'),
(603, '2019-07-28 19:45:00', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(604, '2019-07-28 19:45:00', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(605, '2019-07-28 19:45:00', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(606, '2019-07-28 19:45:14', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 25', '1', '---', 'JOEL VILLALTA'),
(607, '2019-07-28 19:45:32', 'EQUIPO: 9560 devuelto PROCESO DE PRESTAMO: 25', '1', '---', 'JOEL VILLALTA'),
(608, '2019-07-28 19:45:32', 'Usuario puesto en activo, devolucion realizada en proceso: 25', '1', '---', 'JOEL VILLALTA'),
(609, '2019-07-28 20:01:33', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(610, '2019-07-28 20:01:33', 'elimino un registro de prestamos', '1', '---', 'JOEL VILLALTA'),
(611, '2019-07-28 20:02:51', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(612, '2019-07-28 20:02:51', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(613, '2019-07-28 20:08:00', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 27', '1', '---', 'JOEL VILLALTA'),
(614, '2019-07-28 20:08:00', 'Usuario puesto en activo, devolucion realizada en proceso: 27', '1', '---', 'JOEL VILLALTA'),
(615, '2019-07-28 20:09:11', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(616, '2019-07-28 20:09:11', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(617, '2019-07-28 20:10:02', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(618, '2019-07-28 20:10:02', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(619, '2019-07-28 20:10:02', 'Libro codigo 4 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(620, '2019-07-28 20:10:02', 'Libro codigo 5 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(621, '2019-07-28 20:10:02', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(622, '2019-07-28 20:10:14', 'Ejemplar: 123-15-415-107 devuelto PROCESO DE PRESTAMO: 23', '1', '---', 'JOEL VILLALTA'),
(623, '2019-07-28 20:18:47', 'Ejemplar: 123-15-415-106 devuelto PROCESO DE PRESTAMO: 23', '1', '---', 'JOEL VILLALTA'),
(624, '2019-07-28 20:18:51', 'Ejemplar: 123-15-415-108 devuelto PROCESO DE PRESTAMO: 23', '1', '---', 'JOEL VILLALTA'),
(625, '2019-07-28 20:18:53', 'Ejemplar: 123-15-415-109 devuelto PROCESO DE PRESTAMO: 23', '1', '---', 'JOEL VILLALTA'),
(626, '2019-07-28 20:18:53', 'Usuario puesto en activo, devolucion realizada en proceso: 23', '1', '---', 'JOEL VILLALTA'),
(627, '2019-07-28 21:00:29', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(628, '2019-07-28 21:00:29', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(629, '2019-07-28 21:01:10', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 28', '1', '---', 'JOEL VILLALTA'),
(630, '2019-07-28 21:01:10', 'Usuario puesto en activo, devolucion realizada en proceso: 28', '1', '---', 'JOEL VILLALTA'),
(631, '2019-07-28 21:03:42', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(632, '2019-07-28 21:03:42', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(633, '2019-07-28 21:11:13', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 30', '1', '---', 'JOEL VILLALTA'),
(634, '2019-07-28 21:11:13', 'Usuario puesto en activo, devolucion realizada en proceso: 30', '1', '---', 'JOEL VILLALTA'),
(635, '2019-07-28 21:11:41', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(636, '2019-07-28 21:11:41', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(637, '2019-07-28 21:13:58', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 31', '1', '---', 'JOEL VILLALTA'),
(638, '2019-07-28 21:13:58', 'Usuario puesto en activo, devolucion realizada en proceso: 31', '1', '---', 'JOEL VILLALTA'),
(639, '2019-07-28 21:14:32', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(640, '2019-07-28 21:14:32', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(641, '2019-07-28 21:16:57', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 32', '1', '---', 'JOEL VILLALTA'),
(642, '2019-07-28 21:16:57', 'Usuario puesto en activo, devolucion realizada en proceso: 32', '1', '---', 'JOEL VILLALTA'),
(643, '2019-07-28 21:17:21', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(644, '2019-07-28 21:17:21', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(645, '2019-07-28 21:17:48', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 33', '1', '---', 'JOEL VILLALTA'),
(646, '2019-07-28 21:17:48', 'Usuario puesto en activo, devolucion realizada en proceso: 33', '1', '---', 'JOEL VILLALTA'),
(647, '2019-07-28 21:18:13', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(648, '2019-07-28 21:18:13', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(649, '2019-07-28 21:19:58', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 34', '1', '---', 'JOEL VILLALTA'),
(650, '2019-07-28 21:19:58', 'Usuario puesto en activo, devolucion realizada en proceso: 34', '1', '---', 'JOEL VILLALTA'),
(651, '2019-07-28 21:23:48', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(652, '2019-07-28 21:23:48', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(653, '2019-07-28 21:24:28', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 35', '1', '---', 'JOEL VILLALTA'),
(654, '2019-07-28 21:24:28', 'Usuario puesto en activo, devolucion realizada en proceso: 35', '1', '---', 'JOEL VILLALTA'),
(655, '2019-07-28 21:24:51', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(656, '2019-07-28 21:24:51', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(657, '2019-07-28 21:26:51', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 36', '1', '---', 'JOEL VILLALTA'),
(658, '2019-07-28 21:26:51', 'Usuario puesto en activo, devolucion realizada en proceso: 36', '1', '---', 'JOEL VILLALTA'),
(659, '2019-07-28 21:27:21', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(660, '2019-07-28 21:27:21', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(661, '2019-07-28 21:40:20', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 37', '1', '---', 'JOEL VILLALTA'),
(662, '2019-07-28 21:40:20', 'Usuario puesto en activo, devolucion realizada en proceso: 37', '1', '---', 'JOEL VILLALTA'),
(663, '2019-07-28 21:41:35', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(664, '2019-07-28 21:41:35', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(665, '2019-07-28 21:42:47', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 38', '1', '---', 'JOEL VILLALTA'),
(666, '2019-07-28 21:42:47', 'Usuario puesto en activo, devolucion realizada en proceso: 38', '1', '---', 'JOEL VILLALTA'),
(667, '2019-07-28 21:43:11', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(668, '2019-07-28 21:43:11', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(669, '2019-07-28 21:44:16', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 39', '1', '---', 'JOEL VILLALTA'),
(670, '2019-07-28 21:44:16', 'Usuario puesto en activo, devolucion realizada en proceso: 39', '1', '---', 'JOEL VILLALTA'),
(671, '2019-07-28 21:44:31', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(672, '2019-07-28 21:44:31', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(673, '2019-07-28 21:45:43', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 40', '1', '---', 'JOEL VILLALTA'),
(674, '2019-07-28 21:45:43', 'Usuario puesto en activo, devolucion realizada en proceso: 40', '1', '---', 'JOEL VILLALTA'),
(675, '2019-07-28 21:46:03', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(676, '2019-07-28 21:46:03', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(677, '2019-07-28 21:50:56', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 41', '1', '---', 'JOEL VILLALTA'),
(678, '2019-07-28 21:50:56', 'Usuario puesto en activo, devolucion realizada en proceso: 41', '1', '---', 'JOEL VILLALTA'),
(679, '2019-07-28 21:51:45', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(680, '2019-07-28 21:51:45', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(681, '2019-07-28 21:54:48', ' ingreso un nuevo Usuario: YOHALMO', '19004', '---', 'JOEL VILLALTA'),
(682, '2019-07-28 21:55:49', 'Libro codigo 4 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(683, '2019-07-28 21:55:49', 'Libro codigo 16 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(684, '2019-07-28 21:55:49', 'Libro codigo 11 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(685, '2019-07-28 21:55:49', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(686, '2019-07-28 22:08:32', 'EQUIPO: 9560 devuelto PROCESO DE PRESTAMO: 29', '1', '---', 'JOEL VILLALTA'),
(687, '2019-07-28 22:08:32', 'Usuario puesto en activo, devolucion realizada en proceso: 29', '1', '---', 'JOEL VILLALTA'),
(688, '2019-07-28 22:08:36', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 42', '1', '---', 'JOEL VILLALTA'),
(689, '2019-07-28 22:08:36', 'Usuario puesto en activo, devolucion realizada en proceso: 42', '1', '---', 'JOEL VILLALTA'),
(690, '2019-07-28 22:08:57', 'Ejemplar: 123-15-415-108 devuelto PROCESO DE PRESTAMO: 24', '1', '---', 'JOEL VILLALTA'),
(691, '2019-07-28 22:09:03', 'Ejemplar: 123-15-415-115 devuelto PROCESO DE PRESTAMO: 24', '1', '---', 'JOEL VILLALTA'),
(692, '2019-07-28 22:09:11', 'Ejemplar: 123-15-600-126 devuelto PROCESO DE PRESTAMO: 24', '1', '---', 'JOEL VILLALTA'),
(693, '2019-07-28 22:09:11', 'Usuario puesto en activo, devolucion realizada en proceso: 24', '1', '---', 'JOEL VILLALTA'),
(694, '2019-07-28 22:23:34', 'elimino un item de la lista de prestamo en tabla detallesprestamolibro', '1', '---', 'JOEL VILLALTA'),
(695, '2019-07-29 08:17:39', 'ingreso exitosamente al sistema', '1', '---', 'JOEL VILLALTA'),
(696, '2019-07-29 08:27:52', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(697, '2019-07-29 08:27:52', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(698, '2019-07-29 08:27:52', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(699, '2019-07-29 08:27:52', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(700, '2019-07-29 08:31:45', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 43', '1', '---', 'JOEL VILLALTA'),
(701, '2019-07-29 08:31:52', 'EQUIPO: 9560 devuelto PROCESO DE PRESTAMO: 43', '1', '---', 'JOEL VILLALTA'),
(702, '2019-07-29 08:31:59', 'EQUIPO: 9557 devuelto PROCESO DE PRESTAMO: 43', '1', '---', 'JOEL VILLALTA'),
(703, '2019-07-29 08:31:59', 'Usuario puesto en activo, devolucion realizada en proceso: 43', '1', '---', 'JOEL VILLALTA'),
(704, '2019-07-29 08:52:50', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(705, '2019-07-29 08:52:50', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(706, '2019-07-29 08:53:00', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 44', '1', '---', 'JOEL VILLALTA'),
(707, '2019-07-29 08:53:00', 'Usuario puesto en activo, devolucion realizada en proceso: 44', '1', '---', 'JOEL VILLALTA'),
(708, '2019-07-29 09:05:08', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(709, '2019-07-29 09:05:08', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(710, '2019-07-29 09:05:36', 'Libro codigo 2 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(711, '2019-07-29 09:05:36', 'Libro codigo 3 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(712, '2019-07-29 09:05:37', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(713, '2019-07-29 11:07:00', 'ingreso exitosamente al sistema', '1', '---', 'JOEL VILLALTA'),
(714, '2019-07-29 11:07:19', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 45', '1', '---', 'JOEL VILLALTA'),
(715, '2019-07-29 11:07:19', 'Usuario puesto en activo, devolucion realizada en proceso: 45', '1', '---', 'JOEL VILLALTA'),
(716, '2019-07-29 11:07:24', 'EQUIPO: 9560 devuelto PROCESO DE PRESTAMO: 46', '1', '---', 'JOEL VILLALTA'),
(717, '2019-07-29 11:07:29', 'EQUIPO: 9557 devuelto PROCESO DE PRESTAMO: 46', '1', '---', 'JOEL VILLALTA'),
(718, '2019-07-29 11:07:29', 'Usuario puesto en activo, devolucion realizada en proceso: 46', '1', '---', 'JOEL VILLALTA'),
(719, '2019-07-29 11:07:53', 'Libro codigo 1 puesto en estado 1=prestado', '1', '---', 'JOEL VILLALTA'),
(720, '2019-07-29 11:07:53', 'Prestamo realizado', '1', '---', 'JOEL VILLALTA'),
(721, '2019-07-29 11:08:04', 'EQUIPO: 9555 devuelto PROCESO DE PRESTAMO: 47', '1', '---', 'JOEL VILLALTA'),
(722, '2019-07-29 11:08:04', 'Usuario puesto en activo, devolucion realizada en proceso: 47', '1', '---', 'JOEL VILLALTA'),
(723, '2019-08-05 11:11:32', 'Desactivo al usuario 4', '1', '---', 'JOEL VILLALTA'),
(724, '2019-08-05 11:11:34', 'Activo al usuario 4', '1', '---', 'JOEL VILLALTA'),
(725, '2019-08-05 11:11:52', ' ingreso un nuevo Usuario: ASD', 'asdasd', '---', 'JOEL VILLALTA'),
(726, '2019-08-05 11:12:23', 'ha editado el usuario: ASD  Codigo: 5', '1', '---', 'JOEL VILLALTA'),
(727, '2019-08-05 11:12:29', 'ha editado el usuario: ASD  Codigo: 5', '1', '---', 'JOEL VILLALTA'),
(728, '2019-08-05 11:12:58', ' ingreso una nueva existencia de equipo: 88160-0103-00004', '1', '---', 'JOEL VILLALTA'),
(729, '2019-08-05 11:13:47', ' ingreso un nuevo Estante: A6', '1', '---', 'JOEL VILLALTA'),
(730, '2019-08-05 11:13:54', ' ingreso un nuevo editorial: ASD', '1', '---', 'JOEL VILLALTA'),
(731, '2019-08-05 11:14:01', 'ha editado el editorial: ASD  Codigo: 4', '1', '---', 'JOEL VILLALTA'),
(732, '2019-08-05 11:14:09', ' ingreso un nuevo editorial: ASDD', '1', '---', 'JOEL VILLALTA'),
(733, '2019-08-05 11:14:19', ' ingreso un nuevo autor: ASD ASD', '1', '---', 'JOEL VILLALTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bolsaprestamo`
--

DROP TABLE IF EXISTS `bolsaprestamo`;
CREATE TABLE IF NOT EXISTS `bolsaprestamo` (
  `solcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'sss',
  `usucod` int(11) NOT NULL COMMENT 'codigo del usuario LLAVE FORANEA 1',
  `libcod` int(11) NOT NULL COMMENT 'codigo de Libro LLAVE FORANEA',
  `solfec` datetime NOT NULL COMMENT 'fecha de ultima actualizacion',
  `libcantidad` int(11) NOT NULL COMMENT 'cantidad de unidades solicitados',
  `solfecenviar` datetime NOT NULL COMMENT 'Solocitud en la que la solicutud es enviada a prestamo',
  `solestado` int(10) UNSIGNED NOT NULL COMMENT 'estado de la solicitud 0= solicitud no activa 1=solicitud enviada y pendiente',
  PRIMARY KEY (`solcod`),
  KEY `FK_bolsaprestamo_usucod` (`usucod`),
  KEY `FK_bolsaprestamo_libcod` (`libcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla modelo carrito de compras para realizar prestamos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallereservalibro`
--

DROP TABLE IF EXISTS `detallereservalibro`;
CREATE TABLE IF NOT EXISTS `detallereservalibro` (
  `detcodres` int(11) NOT NULL COMMENT 'Dettale código reserva: llave primaria de la tabla detalleReservaLibro',
  `rescod` int(11) NOT NULL COMMENT 'Reserva codigo: llave foránea de la tabla resumenLibroReserva',
  `ejemcod` int(11) NOT NULL COMMENT 'Ejempar codigo: llave foránea de la tabla ejemplaresLibros',
  PRIMARY KEY (`detcodres`),
  KEY `fk_detalleReservaLibro_resumenLibroReserva1_idx` (`rescod`),
  KEY `fk_detalleReservaLibro_ejemplaresLibros1_idx` (`ejemcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesprestamoequipo`
--

DROP TABLE IF EXISTS `detallesprestamoequipo`;
CREATE TABLE IF NOT EXISTS `detallesprestamoequipo` (
  `detcodequi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Detalle codigo equipo: llave primaria de la tabla detalleprestamoequipo\n',
  `prestcodequi` int(11) NOT NULL,
  `existcod` int(11) NOT NULL,
  `detequiest` int(11) NOT NULL DEFAULT '0' COMMENT 'ESTADO PRESTAMO INDIVIDUAL EQUIPO 0=activo 1=devuelto',
  PRIMARY KEY (`detcodequi`),
  KEY `fk_detallesPrestamoEquipo_resumenEquipoPrestamo1_idx` (`prestcodequi`),
  KEY `fk_detallesPrestamoEquipo_existenciaEquipo1_idx` (`existcod`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallesprestamoequipo`
--

INSERT INTO `detallesprestamoequipo` (`detcodequi`, `prestcodequi`, `existcod`, `detequiest`) VALUES
(19, 19, 2, 0),
(22, 21, 1, 0),
(23, 22, 1, 0),
(24, 22, 2, 0),
(26, 22, 3, 0),
(34, 24, 1, 0),
(35, 24, 2, 0),
(36, 24, 3, 0),
(37, 25, 1, 0),
(38, 25, 3, 0),
(40, 27, 1, 0),
(41, 28, 1, 0),
(42, 29, 3, 0),
(43, 30, 1, 0),
(44, 31, 1, 0),
(45, 32, 1, 0),
(46, 33, 1, 0),
(47, 34, 1, 0),
(48, 35, 1, 0),
(49, 36, 1, 0),
(50, 37, 1, 0),
(51, 38, 1, 0),
(52, 39, 1, 0),
(53, 40, 1, 0),
(54, 41, 1, 0),
(55, 42, 1, 0),
(56, 43, 1, 0),
(58, 43, 2, 0),
(59, 43, 3, 0),
(60, 44, 1, 0),
(61, 45, 1, 0),
(62, 46, 2, 0),
(63, 46, 3, 0),
(64, 47, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesprestamolibro`
--

DROP TABLE IF EXISTS `detallesprestamolibro`;
CREATE TABLE IF NOT EXISTS `detallesprestamolibro` (
  `detcodlib` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Detalle codigo libro: llave primaria de la tabla prestamo libro',
  `prestcodlib` int(11) NOT NULL,
  `ejemcod` int(11) NOT NULL,
  `detlibest` int(11) NOT NULL DEFAULT '0' COMMENT 'ESTADO PRESTAMO LIBRO 0 activo 1=devuelto',
  PRIMARY KEY (`detcodlib`),
  KEY `fk_detallesPrestamoLibro_resumenLibroPrestamo1_idx` (`prestcodlib`),
  KEY `fk_detallesPrestamoLibro_ejemplaresLibros1_idx` (`ejemcod`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallesprestamolibro`
--

INSERT INTO `detallesprestamolibro` (`detcodlib`, `prestcodlib`, `ejemcod`, `detlibest`) VALUES
(17, 14, 8, 0),
(18, 15, 2, 0),
(19, 15, 3, 0),
(21, 15, 16, 0),
(22, 16, 2, 0),
(23, 16, 4, 0),
(24, 16, 3, 0),
(25, 17, 2, 0),
(26, 17, 3, 0),
(27, 17, 4, 0),
(28, 18, 2, 0),
(29, 18, 3, 0),
(30, 18, 4, 0),
(31, 19, 1, 0),
(32, 19, 2, 0),
(33, 19, 3, 0),
(34, 19, 4, 0),
(35, 20, 1, 0),
(36, 20, 2, 0),
(37, 20, 3, 0),
(42, 20, 4, 0),
(44, 22, 3, 0),
(45, 22, 4, 0),
(46, 22, 5, 0),
(47, 22, 6, 0),
(48, 23, 2, 0),
(49, 23, 3, 0),
(50, 23, 4, 0),
(51, 23, 5, 0),
(52, 24, 4, 0),
(53, 24, 16, 0),
(54, 24, 11, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deweyclasificacion`
--

DROP TABLE IF EXISTS `deweyclasificacion`;
CREATE TABLE IF NOT EXISTS `deweyclasificacion` (
  `dewcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla clasificacion de dewey',
  `dewcodcla` varchar(25) NOT NULL COMMENT 'Codigo de la clasificacion de dewey: numero de registro de dewey ',
  `dewtipcla` varchar(45) NOT NULL COMMENT 'Tipo de la clasificacion de dewey: nombres de los tipos de la clasificacion de dewey',
  PRIMARY KEY (`dewcod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deweyclasificacion`
--

INSERT INTO `deweyclasificacion` (`dewcod`, `dewcodcla`, `dewtipcla`) VALUES
(1, '123456', 'Ciencias'),
(2, 'mal', 'testing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorialeslibros`
--

DROP TABLE IF EXISTS `editorialeslibros`;
CREATE TABLE IF NOT EXISTS `editorialeslibros` (
  `editcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla editorial:',
  `editnom` varchar(60) NOT NULL COMMENT 'Nombre de la editorial:',
  `editpai` varchar(45) DEFAULT NULL COMMENT 'Pais de ubicacion de la editorial',
  PRIMARY KEY (`editcod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `editorialeslibros`
--

INSERT INTO `editorialeslibros` (`editcod`, `editnom`, `editpai`) VALUES
(1, 'Editorial 1', 'Outlander'),
(2, 'Editorial Santillana Loma Linda', '---'),
(3, 'Libros La Ceiba', '---'),
(4, 'ASD', '---'),
(5, 'ASDD', '---');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplareslibros`
--

DROP TABLE IF EXISTS `ejemplareslibros`;
CREATE TABLE IF NOT EXISTS `ejemplareslibros` (
  `ejemcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla ejemplares libros:',
  `ejemcodreg` varchar(100) NOT NULL COMMENT 'Codigo de registro del ejemplar: numero del codigo de registro del inventario de los lbros asignado por la institucion',
  `ejemfecadq` date NOT NULL COMMENT 'Fecha de adquisicion del ejemplar:  fecha exacta del dia en que se obtuvo el ejemplar',
  `ejemtipadq` int(11) NOT NULL COMMENT 'Tipo de  adquisicion del ejemplar: campo que muestra si el ejemplar 0=Donacion 1=Compra',
  `ejemdetaqu` varchar(250) DEFAULT NULL COMMENT 'Detalles de la adquisicion del ejemplar: descripncion de la compra o donacion del ejemplar, si el caso fue donacion detallar quien fue el autor de la donacion',
  `ejempruni` varchar(15) DEFAULT NULL COMMENT 'Precio unitario del ejemplar: Precio en dolares del ejemplar adquirido si este fue comprado por la institucion',
  `ejemestu` int(11) NOT NULL DEFAULT '0' COMMENT 'Estatus del ejemplar: estado del libro si  0=Disponible  1=Prestado 2=No disponible 3=Extraviado',
  `ejemconfis` int(11) NOT NULL COMMENT 'Condicion fisica del ejemplar: si el ejemplar esta en 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala',
  `ejemdetcon` varchar(250) DEFAULT NULL COMMENT 'Detalle de la condicion ejemplar: descripcion de la condicion fisica del ejemplar ',
  `ejemres` varchar(45) DEFAULT NULL COMMENT 'Ejemplar reserva: permite reservar un libro unicamente si estan en proceso de prestamo los estado del campos son ''0''=sin reserva ''1''=con reserva',
  `estcod` int(11) NOT NULL,
  `libcod` int(11) NOT NULL,
  PRIMARY KEY (`ejemcod`),
  KEY `fk_ejemplaresLibros_Estante1_idx` (`estcod`),
  KEY `fk_ejemplaresLibros_Libros1_idx` (`libcod`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejemplareslibros`
--

INSERT INTO `ejemplareslibros` (`ejemcod`, `ejemcodreg`, `ejemfecadq`, `ejemtipadq`, `ejemdetaqu`, `ejempruni`, `ejemestu`, `ejemconfis`, `ejemdetcon`, `ejemres`, `estcod`, `libcod`) VALUES
(1, '123-15-415-105', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(2, '123-15-415-106', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(3, '123-15-415-107', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(4, '123-15-415-108', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(5, '123-15-415-109', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(6, '123-15-415-110', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(7, '123-15-415-111', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(8, '123-15-415-112', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(9, '123-15-415-113', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(10, '123-15-415-114', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(11, '123-15-415-115', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 3),
(12, '123-15-600-110', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 21),
(13, '123-15-600-115', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 21),
(14, '123-15-600-119', '2019-07-18', 0, 'none', '0', 3, 0, 'none', '0', 1, 21),
(15, '123-15-600-125', '2019-07-18', 0, 'none', '0', 2, 0, 'none', '0', 1, 21),
(16, '123-15-600-126', '2019-07-18', 0, 'none', '0', 0, 0, 'none', '0', 1, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `equicod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Equipo codigo: llave primaria de la tabla equipo',
  `equitip` varchar(45) NOT NULL,
  `equides` varchar(45) DEFAULT NULL COMMENT 'Equipo descripcion: Descripcion general del equipo',
  `equicodifi` varchar(100) DEFAULT NULL COMMENT 'Codificación para equipos: 01 MAQUINARIA Y EQUIPO DE OFICINA ',
  `equimg` varchar(450) DEFAULT NULL COMMENT 'Contiene la direccion de la imagen del equipo',
  PRIMARY KEY (`equicod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`equicod`, `equitip`, `equides`, `equicodifi`, `equimg`) VALUES
(1, 'calculadora electronica', 'se utiliza para calculos matematicos', '0103', 'img/equipoimg/979063Azulapsd2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante`
--

DROP TABLE IF EXISTS `estante`;
CREATE TABLE IF NOT EXISTS `estante` (
  `estcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Estante codigo: llave primaria de la tabla estante',
  `estdes` varchar(45) NOT NULL COMMENT 'Estante descripcion: Nombre del estante',
  PRIMARY KEY (`estcod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estante`
--

INSERT INTO `estante` (`estcod`, `estdes`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existenciaequipo`
--

DROP TABLE IF EXISTS `existenciaequipo`;
CREATE TABLE IF NOT EXISTS `existenciaequipo` (
  `existcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Existencia Codigo: llave primaria de la tabla existenciaEquipo',
  `existcodreg` varchar(100) NOT NULL COMMENT 'Existencia Codigo de registro: Codigo de registro de inventario de equipos',
  `existfecadq` date NOT NULL COMMENT 'existencia fecha de adquisicion: feecha en la cual se adquirio el equipo',
  `existtipadq` int(11) NOT NULL COMMENT 'Existencia tipo adquisicion: registra el tipo de adquisicion del equipo  0=Donacion 1=Compra',
  `existdetadq` varchar(250) DEFAULT NULL COMMENT 'Existencia detalle adquisicion: descripcion acerca de los detalles de la aquisicion del equipo',
  `existpreuni` varchar(45) DEFAULT NULL COMMENT 'Existencia precio unitario: precio unitario del equipo',
  `existestu` int(11) NOT NULL DEFAULT '0' COMMENT 'Existencia estatus: estado del equipo 0=Disponible 1=Prestado 2=Reparacion 3=Extraviado 4=No disponible',
  `existconfis` int(11) NOT NULL DEFAULT '0' COMMENT 'Existencia condicion fisica: condicion fisica del equipo 0=Optima 1=Muy buena 2=Buena 3=Mala',
  `existdesest` varchar(250) DEFAULT NULL COMMENT 'existencia descripcion equipo: descripcion detallada de las condiciones del quipo',
  `estcod` int(11) NOT NULL,
  `equicod` int(11) NOT NULL,
  `existmarca` varchar(45) DEFAULT NULL COMMENT 'equipo marca del equipo',
  PRIMARY KEY (`existcod`),
  KEY `fk_existenciaEquipo_Estante1_idx` (`estcod`),
  KEY `fk_existenciaEquipo_Equipo1_idx` (`equicod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `existenciaequipo`
--

INSERT INTO `existenciaequipo` (`existcod`, `existcodreg`, `existfecadq`, `existtipadq`, `existdetadq`, `existpreuni`, `existestu`, `existconfis`, `existdesest`, `estcod`, `equicod`, `existmarca`) VALUES
(1, '9555', '2019-07-27', 0, 'lolel', '0.50', 0, 0, 'melm', 1, 1, NULL),
(2, '9557', '2019-07-27', 0, 'lolel2', '0.50', 0, 0, 'melm2', 1, 1, NULL),
(3, '9560', '2019-07-28', 0, 'lolel3', '0.50', 0, 0, 'melm2', 1, 1, NULL),
(4, '88160-0103-00004', '2019-07-29', 0, 'ASD', '', 0, 0, 'ASD', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generoliterario`
--

DROP TABLE IF EXISTS `generoliterario`;
CREATE TABLE IF NOT EXISTS `generoliterario` (
  `gencod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla genero autor:',
  `gennom` varchar(45) NOT NULL COMMENT 'Nombre del genero literario: nombre de los diferentes tipos de generos literarios',
  `gensub` varchar(45) DEFAULT NULL COMMENT 'Subgenro literario: nombres de los subgenero literarios de autores',
  `gendes` varchar(250) DEFAULT NULL COMMENT 'Descripcion del genero literario: pequeño resumen del genero literario',
  PRIMARY KEY (`gencod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `generoliterario`
--

INSERT INTO `generoliterario` (`gencod`, `gennom`, `gensub`, `gendes`) VALUES
(1, 'Literay 1', 'Literally sub', 'Literal description');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `libcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del libro: llave primaria de la tabla libros',
  `libtit` varchar(150) NOT NULL COMMENT 'Titulo del libro: Nombre del libro',
  `libdes` varchar(450) NOT NULL COMMENT 'Descripcion del libro: campo que registra una pequeña reseña del contenido del libro',
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
  KEY `fk_Libros_detalleGeneroAutor1_idx` (`autcod`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`libcod`, `libtit`, `libdes`, `libpor`, `libfecedi`, `libnumpag`, `libisbn`, `libfecreg`, `autcod`, `dewcod`, `editcod`, `libtags`) VALUES
(3, 'The Queen of Hearts', 'Story fantasy adventure following the trials of a group of heroes in search of a mithycal place told in legends', 'img/portadas/6541329780399585050.jpg', '2019-06-11', 1220, '12354', '2019-06-14 17:59:33', 2, 1, 2, 'ciencia ficcion,misterio'),
(4, 'The Way in the forest', 'Short tales format with multiple characters with a different set of motives', '../../../img/portadas/740915por2.jpg', '2019-06-13', 123, '1234213', '2019-06-14 18:15:00', 3, 1, 3, 'Terror'),
(21, 'Dancing night', '123123213123123213123123213', '../../../img/portadas/595042five-feet-apart-9781534437333_hr-679x1024.jpg', '2019-06-12', 123, '543332', '2019-06-21 21:14:30', 3, 1, 1, 'romance,accion,suspenso'),
(23, 'Book ', 'Testing Book for insert on catalogs', 'img/portadas/161820por2.jpg', '2019-07-10', 122, '12312312', '2019-07-19 00:19:14', 3, 1, 2, 'testing,tag');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumenequipoprestamo`
--

DROP TABLE IF EXISTS `resumenequipoprestamo`;
CREATE TABLE IF NOT EXISTS `resumenequipoprestamo` (
  `prestcodequi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Prestamo codigo de equipo: llave primaria de la tabla resumenPrestamoEquipo',
  `prestfecequi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Prestamo fecha de equipo:  fecha en la que se realizo el prestamo',
  `prestdevequi` date NOT NULL COMMENT 'Prestamo fecha equipo: fecha de devolucion del prestamo de equipo',
  `prestcomequi` varchar(150) DEFAULT NULL COMMENT 'Prestamo comentario equipo: comentarios agregados al proceso de prestamo de equipo',
  `prestestequi` int(11) NOT NULL COMMENT 'Prestamo estado equipo: estado del préstamo 0=Activo 1=Finalizado  3=en espera',
  `usucod` int(11) NOT NULL COMMENT 'Usuario codigo: llave foranea de la tabla usuarios',
  `usuCodBiblioEquipo` int(11) NOT NULL COMMENT 'USUARIO QUE REALIZA EL PROCESO DE PRESTAMO',
  PRIMARY KEY (`prestcodequi`),
  KEY `fk_resumenEquipoPrestamo_Usuario1_idx` (`usucod`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resumenequipoprestamo`
--

INSERT INTO `resumenequipoprestamo` (`prestcodequi`, `prestfecequi`, `prestdevequi`, `prestcomequi`, `prestestequi`, `usucod`, `usuCodBiblioEquipo`) VALUES
(19, '2019-07-28 14:29:51', '2019-08-04', 'Ningun Comentario', 1, 3, 2),
(21, '2019-07-28 22:33:41', '2019-08-04', 'Ningun Comentario', 1, 2, 1),
(22, '2019-07-28 23:16:16', '2019-08-04', 'Ningun Comentario', 1, 2, 1),
(24, '2019-07-28 23:26:57', '2019-08-04', 'Ningun Comentario', 1, 3, 1),
(25, '2019-07-29 01:44:45', '2019-08-04', 'Ningun Comentario', 1, 2, 1),
(27, '2019-07-29 02:02:45', '2019-08-04', 'Ningun Comentario', 1, 2, 1),
(28, '2019-07-29 02:08:15', '2019-07-31', 'Ningun Comentario', 1, 2, 1),
(29, '2019-07-29 02:20:08', '2019-07-30', 'Ningun Comentario', 1, 3, 1),
(30, '2019-07-29 03:03:31', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(31, '2019-07-29 03:11:30', '2019-07-31', 'Ningun Comentario', 1, 2, 1),
(32, '2019-07-29 03:14:19', '2019-07-31', 'Ningun Comentario', 1, 2, 1),
(33, '2019-07-29 03:17:13', '2019-07-31', 'Ningun Comentario', 1, 2, 1),
(34, '2019-07-29 03:18:05', '2019-07-31', 'Ningun Comentario', 1, 2, 1),
(35, '2019-07-29 03:23:41', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(36, '2019-07-29 03:24:44', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(37, '2019-07-29 03:27:01', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(38, '2019-07-29 03:41:29', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(39, '2019-07-29 03:43:07', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(40, '2019-07-29 03:44:25', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(41, '2019-07-29 03:46:00', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(42, '2019-07-29 03:51:38', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(43, '2019-07-29 04:16:22', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(44, '2019-07-29 14:35:23', '2019-07-30', 'Ningun Comentario', 1, 2, 1),
(45, '2019-07-29 14:54:40', '2019-07-29', 'Ningun Comentario', 1, 2, 1),
(46, '2019-07-29 15:05:23', '2019-07-29', 'Ningun Comentario', 1, 3, 1),
(47, '2019-07-29 17:07:43', '2019-07-29', 'Ningun Comentario', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumenlibroprestamo`
--

DROP TABLE IF EXISTS `resumenlibroprestamo`;
CREATE TABLE IF NOT EXISTS `resumenlibroprestamo` (
  `prestcodlib` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Prestamo codigo libro: llave primaria de la tabla resumen prestamo libros',
  `prestfeclib` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Prestamo fecha libro: fecha en la que es realizado el prestamo',
  `prestdevlib` date NOT NULL COMMENT 'Prestamo fecha de devolucion libro: fecha de la devolucion del prestamo del libro',
  `prestcomlib` varchar(255) DEFAULT NULL COMMENT 'Prestamo comentarios libro: Comentarios en relacion al prestamo',
  `prestestlib` int(11) DEFAULT NULL COMMENT 'Prestamo estado libro: estado del prestamo 0=Activo 1=Renovado 2=Finalizado 3=en espera',
  `prestrenlib` int(11) NOT NULL DEFAULT '0' COMMENT 'Prestamo numero de renovaciones libro: cantidad de  renovaciones realizadas durante el prestamo',
  `usuCodigo` int(11) NOT NULL COMMENT 'Codigo del usuario: llave foranea de la tabla usuario',
  `usuCodBiblio` int(11) NOT NULL COMMENT 'CODIGO USUARIO BIBLIOTECARIO',
  PRIMARY KEY (`prestcodlib`),
  KEY `fk_resumenPrestamo_Usuario1_idx` (`usuCodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resumenlibroprestamo`
--

INSERT INTO `resumenlibroprestamo` (`prestcodlib`, `prestfeclib`, `prestdevlib`, `prestcomlib`, `prestestlib`, `prestrenlib`, `usuCodigo`, `usuCodBiblio`) VALUES
(14, '2019-07-28 14:02:00', '2019-08-04', 'Ningun Comentario', 0, 0, 1, 2),
(15, '2019-07-28 19:11:47', '2019-08-04', 'Ningun Comentario', 1, 0, 2, 1),
(16, '2019-07-28 21:52:51', '2019-08-04', 'Ningun Comentario', 1, 0, 2, 1),
(17, '2019-07-28 22:00:33', '2019-08-04', 'Ningun Comentario', 1, 0, 2, 1),
(18, '2019-07-28 22:07:52', '2019-08-04', 'Ningun Comentario', 1, 0, 2, 1),
(19, '2019-07-28 22:11:32', '2019-08-04', 'Ningun Comentario', 1, 0, 2, 1),
(20, '2019-07-28 22:20:36', '2019-08-04', 'Ningun Comentario', 1, 0, 2, 1),
(22, '2019-07-29 01:42:58', '2019-08-04', 'Ningun Comentario', 1, 0, 2, 1),
(23, '2019-07-29 02:09:34', '2019-07-29', 'Ningun Comentario', 1, 0, 3, 1),
(24, '2019-07-29 03:55:16', '2019-07-30', 'Ningun Comentario', 1, 0, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumenlibroreserva`
--

DROP TABLE IF EXISTS `resumenlibroreserva`;
CREATE TABLE IF NOT EXISTS `resumenlibroreserva` (
  `rescod` int(11) NOT NULL COMMENT 'Reserva código: llave primaria de la tabla resumenLibroReserva',
  `resfec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Reserva fecha: fecha en la que es realizada la reserva',
  `resest` int(11) NOT NULL DEFAULT '0' COMMENT 'Reserva estado: estado de la reserva 0=''Vigente'' 1=''finalizada''',
  `usucod` int(11) NOT NULL COMMENT 'Usuario código: llave foránea de la tanla usuario',
  PRIMARY KEY (`rescod`),
  KEY `fk_resumenLibroReserva_Usuario1_idx` (`usucod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usucod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo usuario: llave primaria de la tabla usuarios',
  `usuprinom` varchar(45) NOT NULL COMMENT 'Personal auxiliar',
  `ususegnom` varchar(45) DEFAULT NULL COMMENT 'Segundo nombre del usuario: campo no obligatorio',
  `usupriape` varchar(45) NOT NULL COMMENT 'Prrimer apellido del usuario: campo obligatorio',
  `ususegape` varchar(45) DEFAULT NULL COMMENT 'Segundo apellido del usuario: campo no obligatorio',
  `usucarnet` varchar(45) NOT NULL COMMENT 'Carnet del usuario: Numero de carnet del personal o estudiantes de la institucion',
  `usucorre` varchar(250) DEFAULT NULL COMMENT 'Correo electronico del usuario: campo no obligatorio',
  `usuestcue` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Estado de la cuenta de usuario: muestra si una cuenta esta logeada en el sistema 0=Activa 1=inactiva 2=Suspendida',
  `usuclave` varchar(250) NOT NULL COMMENT 'Contraseña del usuario: Clave para entrar al sistema ',
  `usuaccnom` varchar(45) NOT NULL COMMENT 'Usuario acceso nombre: nombre de acceso al sistema para el usuario',
  `usuanobac` varchar(11) DEFAULT NULL COMMENT 'Año de bachillerato del usuario: Año de bachillerato que realiza el usuario 1°,2°,3°',
  `ususecaul` varchar(15) DEFAULT NULL COMMENT 'Seccion del aula del usuario: Secciones establecidas por la institucion para sus bachillerato como 1° A,1°B etc.',
  `usutipbac` varchar(11) DEFAULT NULL COMMENT 'Tipo de bachillerato del usuario: los bachilleratos disponibles en la institucion 0=Comercio 1=Mecanica 2=Salud',
  `usunivel` varchar(11) NOT NULL COMMENT 'Usuario Nivel: neveles de acceso a los modulos del sistema 0=Administrador 1=Bibliotecario 2=Personal administrativo 3=Estudiante',
  PRIMARY KEY (`usucod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usucod`, `usuprinom`, `ususegnom`, `usupriape`, `ususegape`, `usucarnet`, `usucorre`, `usuestcue`, `usuclave`, `usuaccnom`, `usuanobac`, `ususecaul`, `usutipbac`, `usunivel`) VALUES
(1, 'JOEL', 'ALFONZO', 'VILLALTA', 'ROMERO', '19001', 'MAIL@SAMPLES.COM', '0', 'f178151bb5b19ff12afedbff97983140', '19001', '0', '0', '0', '1'),
(2, 'JUAN', 'DIEGO', 'MEDRANO', 'ORELLANA', '19002', 'MAIL@GMAIL.COM', '0', '5f2150c49f5aa191fdee5f8d26c3e50e', '19002', '0', '0', '0', '3'),
(3, 'BRANDON', 'ISMAR', 'MELERA', 'GARCIA', '19003', 'MAIL@TESTING', '0', '1a81859544a7eff3e599b8c322559c00', '19003', '1', '1', '0', '3'),
(4, 'YOHALMO', 'ADONAY', 'RODRIGUEZ', 'ORELLANA', '19004', 'MAIL@GMAIL.COM', '0', '0e364cf4a1a53aa0afe4627cbc86d145', '19004', '1', '1', '1', '3'),
(5, 'ASD', 'ASD', 'ASD', 'ASD', 'asdasd', 'ASDASD', '0', 'f178151bb5b19ff12afedbff97983140', 'ASD', '0', '0', '0', '3');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bolsaprestamo`
--
ALTER TABLE `bolsaprestamo`
  ADD CONSTRAINT `FK_bolsaprestamo_libcod` FOREIGN KEY (`libcod`) REFERENCES `libros` (`libcod`),
  ADD CONSTRAINT `FK_bolsaprestamo_usucod` FOREIGN KEY (`usucod`) REFERENCES `usuario` (`usucod`);

--
-- Filtros para la tabla `detallereservalibro`
--
ALTER TABLE `detallereservalibro`
  ADD CONSTRAINT `fk_detalleReservaLibro_ejemplaresLibros1` FOREIGN KEY (`ejemcod`) REFERENCES `ejemplareslibros` (`ejemcod`),
  ADD CONSTRAINT `fk_detalleReservaLibro_resumenLibroReserva1` FOREIGN KEY (`rescod`) REFERENCES `resumenlibroreserva` (`rescod`);

--
-- Filtros para la tabla `detallesprestamoequipo`
--
ALTER TABLE `detallesprestamoequipo`
  ADD CONSTRAINT `fk_detallesPrestamoEquipo_existenciaEquipo1` FOREIGN KEY (`existcod`) REFERENCES `existenciaequipo` (`existcod`),
  ADD CONSTRAINT `fk_detallesPrestamoEquipo_resumenEquipoPrestamo1` FOREIGN KEY (`prestcodequi`) REFERENCES `resumenequipoprestamo` (`prestcodequi`);

--
-- Filtros para la tabla `detallesprestamolibro`
--
ALTER TABLE `detallesprestamolibro`
  ADD CONSTRAINT `fk_detallesPrestamoLibro_ejemplaresLibros1` FOREIGN KEY (`ejemcod`) REFERENCES `ejemplareslibros` (`ejemcod`),
  ADD CONSTRAINT `fk_detallesPrestamoLibro_resumenLibroPrestamo1` FOREIGN KEY (`prestcodlib`) REFERENCES `resumenlibroprestamo` (`prestcodlib`);

--
-- Filtros para la tabla `ejemplareslibros`
--
ALTER TABLE `ejemplareslibros`
  ADD CONSTRAINT `fk_ejemplaresLibros_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`),
  ADD CONSTRAINT `fk_ejemplaresLibros_Libros1` FOREIGN KEY (`libcod`) REFERENCES `libros` (`libcod`);

--
-- Filtros para la tabla `existenciaequipo`
--
ALTER TABLE `existenciaequipo`
  ADD CONSTRAINT `fk_existenciaEquipo_Equipo1` FOREIGN KEY (`equicod`) REFERENCES `equipo` (`equicod`),
  ADD CONSTRAINT `fk_existenciaEquipo_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_Libros_Autor1` FOREIGN KEY (`autcod`) REFERENCES `autorlibro` (`autcod`),
  ADD CONSTRAINT `fk_Libros_deweyClasificacion1` FOREIGN KEY (`dewcod`) REFERENCES `deweyclasificacion` (`dewcod`),
  ADD CONSTRAINT `fk_Libros_editorialesLibros1` FOREIGN KEY (`editcod`) REFERENCES `editorialeslibros` (`editcod`);

--
-- Filtros para la tabla `resumenequipoprestamo`
--
ALTER TABLE `resumenequipoprestamo`
  ADD CONSTRAINT `fk_resumenEquipoPrestamo_Usuario1` FOREIGN KEY (`usucod`) REFERENCES `usuario` (`usucod`);

--
-- Filtros para la tabla `resumenlibroprestamo`
--
ALTER TABLE `resumenlibroprestamo`
  ADD CONSTRAINT `fk_resumenPrestamo_Usuario1` FOREIGN KEY (`usuCodigo`) REFERENCES `usuario` (`usucod`);

--
-- Filtros para la tabla `resumenlibroreserva`
--
ALTER TABLE `resumenlibroreserva`
  ADD CONSTRAINT `fk_resumenLibroReserva_Usuario1` FOREIGN KEY (`usucod`) REFERENCES `usuario` (`usucod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
