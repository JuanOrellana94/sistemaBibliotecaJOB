<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

	$estantecod=$_POST['editestantecod'];
	$estantenom=$_POST['editestantenom'];	

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaEstante WHERE $varestdes='$estantenom'  AND $varestcod!='$estantecod';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "0";

		} else {


		$insRegistro=mysqli_query($conexion,"
			UPDATE $tablaEstante SET
			$varestdes='$estantenom'			
			WHERE $varestcod='$estantecod';
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
		      'ha editado el editorial: $estantenom  Codigo: $estantecod',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "1";
}
 ?>