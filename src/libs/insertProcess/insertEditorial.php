<?php 
	include("../vars.php");
	include("../sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$modaleditnom=$_POST['modaleditnom'];

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaEditoral WHERE $vareditnom='$modaleditnom';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "Esta editorial ya ha sido agregada";

		} else {


		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $tablaEditoral(		    
			   $vareditnom,
			   $vareditpai			 
		      ) VALUES(
		      '$modaleditnom',
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
		      'Ingreso una nueva editorial al sistema: $modaleditnom',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "<span style='color: green;'> Editorial agregado </span>";
}
 ?>