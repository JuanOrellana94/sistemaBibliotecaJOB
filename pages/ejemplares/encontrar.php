<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$reanuEjemplarcod=$_POST['reanuEjemplarcod'];
	$reanuEjemplarnom=$_POST['reanuEjemplarnom'];
	


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaEjemplares WHERE $varejemcod='$reanuEjemplarcod' and $varejemestu='1';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {


	 	echo "0";

	 	
		} else {

		$insRegistro=mysqli_query($conexion,"
			UPDATE  $tablaEjemplares
			SET $varejemestu='0',
				$varejemfecest=NOW()
			WHERE 	$varejemcod='$reanuEjemplarcod'	    
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
		      'Reporto como encontrado el ejemplar $reanuEjemplarcod',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";

	
}

 ?>