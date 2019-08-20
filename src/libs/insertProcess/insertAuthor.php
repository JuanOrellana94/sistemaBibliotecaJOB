<?php 
	include("../vars.php");
	include("../sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$formautnom=strtoupper($_POST['formautnom']);
	$formautape=strtoupper($_POST['formautape']);
	$formseud=strtoupper($_POST['formautseud']);


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablAutor WHERE $varautnom='$formautnom' AND $varautape='$formautape';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "Esta Autor ya ha sido agregado";

		} else {


		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $tablAutor(		    
			   $varautnom,
			   $varautape,
			   $varautseud,
			   $varautdes
		      ) VALUES(
		      '$formautnom',
		      '$formautape',
		      '$formseud',
		      '---'
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
		      ' ingreso un nuevo autor: $formautnom $formautape',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "<span style='color: green;'> Autor agregado </span>";
}
 ?>