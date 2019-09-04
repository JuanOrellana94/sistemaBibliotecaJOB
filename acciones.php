
<body>
<script>

	

	function errorAccAux(){
		Swal.fire({
	     	title: 'Acceso denegado',
	     	text: 'Los usuarios auxiliares no pueden acceder a este contenido',
	     	type: 'error',
	    	confirmButtonText: 'Entendido',
	    	allowOutsideClick: false
  		}).then(Entendido => {
		if (Entendido) {
			window.location.href = "escritorio.php";
		}
		});
	}

	function errorAccAdminOnly(){
		Swal.fire({
	     	title: 'Acceso denegado',
	     	text: 'Area de adminstrador',
	     	type: 'error',
	    	confirmButtonText: 'Entendido',
	    	allowOutsideClick: false
  		}).then(Entendido => {
		if (Entendido) {
			window.location.href = "escritorio.php";
		}
		});
	}
	
	
</script>
  <?php


 $pageLocation=$_GET["pageLocation"];

 if ($pageLocation=="busqueda") {
    include("pages/operaciones/buscarMenu.php");
 } else if ($pageLocation=="prestamos") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		?>
		<script>
			errorAccAux();	
		</script>
		<?php
	} else {	   
 	 	include("pages/operaciones/opPrestamos.php");
	}
 }  else if ($pageLocation=="devoluciones") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		?>
		<script>
			errorAccAux();	
		</script>
		<?php
	} else {		
 		include("pages/operaciones/opDevoluciones.php");
 	}
 }  else if ($pageLocation=="historial") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		?>
		<script>
			errorAccAux();	
		</script>
		<?php
	} else {
		
		include("pages/historial/verHistorial.php");
	}
 } else if ($pageLocation=="codbarras") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		?>
		<script>
			errorAccAux();	
		</script>
		<?php
	} else {		
		include("pages/codbarras/cbestudiante.php");
	}
 } else if ($pageLocation=="cbejemplar") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		?>
		<script>
			errorAccAux();	
		</script>
		<?php
	} else {
 	 	include("pages/codbarras/cbejemplar.php");
 	}
 }else if ($pageLocation=="restaurar") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar" || $_SESSION["usuNivelNombre"]=="Bibliotecario"){
		?>
		<script>
			errorAccAdminOnly();	
		</script>
		<?php
	} else {
 	 include("pages/restaurar/restaurarbd.php");
 	}
 	
 }else if ($pageLocation=="indicadores") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		?>
		<script>
			errorAccAux();	
		</script>
		<?php
	} else {
 	 include("pages/estadistica/verIndicadores.php");
 	}
 } else if ($pageLocation=="cbequipo") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		?>
		<script>
			errorAccAux();	
		</script>
		<?php
	} else {
 	 include("pages/codbarras/cbequipo.php");
 	}
 } else if ($pageLocation=="bitacora") {
 	include("top.php");
 	if ($_SESSION["usuNivelNombre"]=="Auxiliar"){
		?>
		<script>
			errorAccAux();	
		</script>
		<?php
	} else {
 	 include("pages/bitacora/verBitacora.php");
 	}
 }





 include("down.php");


?>
