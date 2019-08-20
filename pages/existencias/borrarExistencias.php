<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$delExistenciacod=$_POST['delExistenciacod'];
	$delExistencianom=$_POST['delExistencianom'];
	


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

 $checkValidation="SELECT * FROM $tablaExistenciaequipo WHERE $varexistcod='$delExistenciacod' and $varexistestu='1';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {


	 	echo "0";

	 	
		} else {

		$insRegistro=mysqli_query($conexion,"
			UPDATE $tablaExistenciaequipo SET $varexistestu='2'	WHERE 	$varexistcod='$delExistenciacod'	    
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
		      'elimino el Equipo $delExistencianom',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";

	
}

 ?>