<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();
	//REVISION DE SEGURIDAD
	   if (!isset($_SESSION[ "autorizado" ]) || $_SESSION["usuNivelNombre"]=="Personal" || $_SESSION["usuNivelNombre"]=="Estudiante")
	   {
	     echo ("<script LANGUAGE='JavaScript'>   window.alert('Acceso denegado. Regresando a menu principal');
	     </script>");        
	   }
	//FIN REVISION DE SEGURIDAD
	$textBusqueda=$_GET['busqueda'];
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];
	$checkValidation="SELECT $varUsuCodigo FROM  $varbolsaprestamo
	WHERE $varusucod ='$textBusqueda';";
	$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));
	$dataRow = mysqli_fetch_array($resultado);		 
	if($dataRow=0) {
	 	echo "0";	 	
	} else {
		$insRegistro=mysqli_query($conexion,"
			DELETE FROM $varbolsaprestamo
			WHERE $varusucod ='$textBusqueda'		    
		    ;")
		or die ('ERROR INS-INS:'.mysqli_error($conexion));
		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $tablaBitacora(
		      $varFecha,
		      $varDesc,
		      $varBitUsuCodigo,
		      $varNomLibreria,
		      $varNomPersona
		      ) VALUES(
		      NOW(),
		      'elimino una solicitud de prestamo',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		or die ('ERROR INS-INS:'.mysqli_error($conexion));
		echo '<div class="alert alert-warning" role="alert"> Solicitud eliminada </div>");';
	}
?>