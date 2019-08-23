<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$repoExistenciacod=$_POST['repoExistenciacod'];
	$repoExistencianom=$_POST['repoExistencianom'];
	


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

 $checkValidation="SELECT * FROM $tablaExistenciaequipo WHERE $varexistcod='$repoExistenciacod' and $varexistestu!='1';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {


	 	echo "0";

	 	
		} else {

		$insRegistro=mysqli_query($conexion,"
			UPDATE $tablaExistenciaequipo SET $varexistestu='3',
			$varexistfecest=NOW()	WHERE 	$varexistcod='$repoExistenciacod'	    
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
		      'Reporto como perdido el Equipo $repoExistencianom',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";

	
}

 ?>