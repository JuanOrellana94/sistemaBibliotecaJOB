<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$formequiponom=mb_strtoupper ($_POST['formequiponom']);
	$formequicodifi=$_POST['formequicodifi'];	
	$formequipodes=mb_strtoupper ($_POST['formequipodes']);	
	


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaEquipo WHERE $varequitip='$formequiponom' OR $varequicodifi='$formequicodifi';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "0";

		} else {


		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO   $tablaEquipo(		    
			   $varequitip,
			   $varequides,
			   $varequicodifi			   
		      ) VALUES(
		      '$formequiponom',
		      '$formequipodes',
		      '$formequicodifi'     
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
		      ' ingreso un nuevo equipo: $formequiponom',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";
}
 ?>