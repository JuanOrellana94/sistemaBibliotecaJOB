<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$formcategorianom=mb_strtoupper ($_POST['formcategorianom']);
	$formcategoriacod=$_POST['formcategoriacod'];
	


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaDewey WHERE $vardewtipcla='$formcategorianom' AND $vardewcodcla='formcategoriacod';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "0";

		} else {


		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO   $tablaDewey(		    
			   $vardewtipcla,
			   $vardewcodcla			   
		      ) VALUES(
		      '$formcategorianom',
		      '$formcategoriacod'     
		      );")
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
		      ' ingreso un nuevo codigo dewey: $formcategorianom',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";
}
 ?>