<?php 
	//ELIMINAR UN LIBRO DE LA SOLICITUD DEL MAESTRO/ESTUDIANTE EN CONSULTAS/BUSCARMENU.PHP
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();
	$delsolcodigo=$_POST['delsolcodigo'];
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];
	$checkValidation="SELECT * FROM bolsaprestamo WHERE $varsolcod ='$delsolcodigo';";
	$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));
	$dataRow = mysqli_fetch_array($resultado);		 
	if($dataRow=0) {
		echo "0";	 	
	} else {
		$insRegistro=mysqli_query($conexion,"
			DELETE FROM $varbolsaprestamo
			WHERE $varsolcod ='$delsolcodigo'		    
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
		      'elimino un item de su lista de prestamo',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		or die ('ERROR INS-INS:'.mysqli_error($conexion));
		echo "1";	
	}
?>