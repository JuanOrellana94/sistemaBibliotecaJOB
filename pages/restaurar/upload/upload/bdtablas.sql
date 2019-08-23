
CREATE DATABASE IF NOT EXISTS sistemabiblioteca;
USE sistemabiblioteca;



DROP TABLE IF EXISTS `autorlibro`;
CREATE TABLE `autorlibro` (
  `autcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla codigo de autor:',
  `autnom` varchar(40) NOT NULL COMMENT 'Nombre del autor: campo obligatorio',
  `autape` varchar(40) DEFAULT NULL COMMENT 'Apellido del autor: campo obligatorio',
  `autseud` varchar(45) DEFAULT NULL COMMENT 'Nombre seudonimo literario del autor: nombre del autor con el cual es conocido en la comunidad literaria',
  PRIMARY KEY (`autcod`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora` (
  `bircod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Bitacora código: llave primaria de la tabla bitacora',
  `bitfec` datetime DEFAULT NULL COMMENT 'Bitacora fecha: fecha y hora de la actividad realizada',
  `bitdes` varchar(450) DEFAULT NULL COMMENT 'Bitacora descripción: actividad realizada',
  `bitusucod` varchar(45) DEFAULT NULL COMMENT 'Bitacora código de usuario: usuario que realizo la actividad',
  `bitnomlib` varchar(45) DEFAULT NULL COMMENT 'Bitacora nombre libreria: nombre de la libreria',
  `bitnombre` varchar(45) NOT NULL,
  PRIMARY KEY (`bircod`)
) ENGINE=InnoDB AUTO_INCREMENT=919 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `deweyclasificacion`;
CREATE TABLE `deweyclasificacion` (
  `dewcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla clasificacion de dewey',
  `dewcodcla` varchar(25) NOT NULL COMMENT 'Codigo de la clasificacion de dewey: numero de registro de dewey ',
  `dewtipcla` varchar(45) NOT NULL COMMENT 'Tipo de la clasificacion de dewey: nombres de los tipos de la clasificacion de dewey',
  PRIMARY KEY (`dewcod`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `editorialeslibros`;
CREATE TABLE `editorialeslibros` (
  `editcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla editorial:',
  `editnom` varchar(60) NOT NULL COMMENT 'Nombre de la editorial:',
  PRIMARY KEY (`editcod`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
  `equicod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Equipo codigo: llave primaria de la tabla equipo',
  `equitip` varchar(45) NOT NULL,
  `equides` varchar(100) DEFAULT NULL COMMENT 'Equipo descripcion: Descripcion general del equipo',
  `equicodifi` varchar(100) DEFAULT NULL COMMENT 'Codificación para equipos: 01 MAQUINARIA Y EQUIPO DE OFICINA ',
  `equimg` varchar(450) DEFAULT NULL COMMENT 'Contiene la direccion de la imagen del equipo',
  `equifecreg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'FECHA CREACION DE EQUIPO',
  PRIMARY KEY (`equicod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `estante`;
CREATE TABLE `estante` (
  `estcod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Estante codigo: llave primaria de la tabla estante',
  `estdes` varchar(45) NOT NULL COMMENT 'Estante descripcion: Nombre del estante',
  PRIMARY KEY (`estcod`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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
  `existfecreg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'FECHA DE CREACION DE LA EXISTENCIA',
  `existfecest` datetime DEFAULT NULL COMMENT 'FECHA DE CAMBIO DEL ESTADO DE EXISTENCIA',
  PRIMARY KEY (`existcod`),
  KEY `fk_existenciaEquipo_Estante1_idx` (`estcod`),
  KEY `fk_existenciaEquipo_Equipo1_idx` (`equicod`),
  CONSTRAINT `fk_existenciaEquipo_Equipo1` FOREIGN KEY (`equicod`) REFERENCES `equipo` (`equicod`),
  CONSTRAINT `fk_existenciaEquipo_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `libros`;
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
  `ejemfecreg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'FECHA QUE SE CREO EL EJEMPLAR EN EL SISTEMA',
  `ejemfecest` datetime DEFAULT NULL COMMENT 'FECHA EN LA QUE SE CAMBIO EL ESTADO DEL EJEMPLAR',
  PRIMARY KEY (`ejemcod`),
  KEY `fk_ejemplaresLibros_Estante1_idx` (`estcod`),
  KEY `fk_ejemplaresLibros_Libros1_idx` (`libcod`),
  CONSTRAINT `fk_ejemplaresLibros_Estante1` FOREIGN KEY (`estcod`) REFERENCES `estante` (`estcod`),
  CONSTRAINT `fk_ejemplaresLibros_Libros1` FOREIGN KEY (`libcod`) REFERENCES `libros` (`libcod`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `resumenequipoprestamo`;
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla modelo carrito de compras para realizar prestamos';


