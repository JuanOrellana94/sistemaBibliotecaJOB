
<body>
  <?php

   






 $pageLocation=$_GET["pageLocation"];

 if ($pageLocation=="busqueda") {
    include("pages/operaciones/buscarMenu.php");
 } else if ($pageLocation=="prestamos") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		echo ("<script LANGUAGE='JavaScript'>  window.alert('Accedo denegado. Auxiliares no pueden utilizar esta area');
	     	 window.location.href='escritorio.php';
	     </script>");
	} else {	   
 	 	include("pages/operaciones/opPrestamos.php");
	}
 }  else if ($pageLocation=="devoluciones") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		echo ("<script LANGUAGE='JavaScript'>  window.alert('Accedo denegado. Auxiliares no pueden utilizar esta area');
	     	 window.location.href='escritorio.php';
	     </script>");
	} else {		
 		include("pages/operaciones/opDevoluciones.php");
 	}
 }  else if ($pageLocation=="historial") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		echo ("<script LANGUAGE='JavaScript'>  window.alert('Accedo denegado. Auxiliares no pueden utilizar esta area');
	     	 window.location.href='escritorio.php';
	     </script>");
	} else {
		
		include("pages/historial/verHistorial.php");
	}
 } else if ($pageLocation=="codbarras") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		echo ("<script LANGUAGE='JavaScript'>  window.alert('Accedo denegado. Auxiliares no pueden utilizar esta area');
	     	 window.location.href='escritorio.php';
	     </script>");
	} else {		
		include("pages/codbarras/cbestudiante.php");
	}
 } else if ($pageLocation=="cbejemplar") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		echo ("<script LANGUAGE='JavaScript'>  window.alert('Accedo denegado. Auxiliares no pueden utilizar esta area');
	     	 window.location.href='escritorio.php';
	     </script>");
	} else {
 	 	include("pages/codbarras/cbejemplar.php");
 	}
 }else if ($pageLocation=="restaurar") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar" || $_SESSION["usuNivelNombre"]=="Bibliotecario"){
		echo ("<script LANGUAGE='JavaScript'>  window.alert('Accedo denegado. Area restringida para Administrador');
	     	 window.location.href='escritorio.php';
	     </script>");
	} else {
 	 include("pages/restaurar/restaurarbd.php");
 	}
 	# code...
 }else if ($pageLocation=="indicadores") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		echo ("<script LANGUAGE='JavaScript'>  window.alert('Accedo denegado. Auxiliares no pueden utilizar esta area');
	     	 window.location.href='escritorio.php';
	     </script>");
	} else {
 	 include("pages/estadistica/verIndicadores.php");
 	}
 } else if ($pageLocation=="cbequipo") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		echo ("<script LANGUAGE='JavaScript'>  window.alert('Accedo denegado. Auxiliares no pueden utilizar esta area');
	     	 window.location.href='escritorio.php';
	     </script>");
	} else {
 	 include("pages/codbarras/cbequipo.php");
 	}
 } else if ($pageLocation=="bitacora") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		echo ("<script LANGUAGE='JavaScript'>  window.alert('Accedo denegado. Auxiliares no pueden utilizar esta area');
	     	 window.location.href='escritorio.php';
	     </script>");
	} else {
 	 include("pages/bitacora/verBitacora.php");
 	}
 }





 include("down.php");


?>
