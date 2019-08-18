<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

	$codPrestamo=$_POST['codigoPrestamo'];
	$renoFecha=$_POST['renoFechaMew'];

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT $varprestren FROM $varresumenlibroprestamo WHERE $varprestcod='$codPrestamo';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));

$dataRow=mysqli_fetch_assoc($resultado);

	 
	 if($dataRow[$varprestren]>=3) {
		echo "0";

		} else {

			$contador=$dataRow[$varprestren];
			$contador=$contador+1;



		$insRegistro=mysqli_query($conexion,"
			UPDATE $varresumenlibroprestamo SET
			$varprestdev='$renoFecha',
			$varprestren='$contador'
			WHERE $varprestcod='$codPrestamo';
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
		      'Hizo una renovacion del prestamo: $codPrestamo',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo $codPrestamo;
}
 ?>

