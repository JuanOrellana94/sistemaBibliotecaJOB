<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

	$editequiponom=strtoupper($_POST['editequiponom']);
	$editequicodifi=$_POST['editequicodifi'];	
	$editequipodes=strtoupper($_POST['editequipodes']);	
    $editequicod=$_POST['editequicod'];
    
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaEquipo WHERE ($varequicodifi='$editequicodifi'  OR $varequitip='$editequiponom') and $varequicod!='$editequicod';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "0";

		} else {


		$insRegistro=mysqli_query($conexion,"
			UPDATE $tablaEquipo SET
			$varequicodifi='$editequicodifi',
			$varequides='$editequipodes',
			$varequitip='$editequiponom'			
			WHERE $varequicod='$editequicod';
		    ")
	    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	
// Memo: Campo Bitacora Descipcion  $varDesc debe ser extendida para evitar errores string too long

		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $tablaBitacora(
		      $varFecha,
		      $varDesc,
		      $varBitUsuCodigo,
		      $varNomLibreria,
		      $varNomPersona
		      ) VALUES(
		      NOW(),
		      'ha editado el equipo: $editequicodifi  Codigo: $editequiponom',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "1";
}
 ?>