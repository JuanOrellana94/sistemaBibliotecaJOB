<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

	$insertlibcod=$_POST['varlibcod'];
	$insertlibcantidad=$_POST['libcantidad'];
	$insertlibtit=$_POST['varlibtit'];  

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $varbolsaprestamo WHERE $varlibcodcar = '$insertlibcod';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	
	 
	 if($dataRow>0) {
		echo "0";

		} else {
		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $varbolsaprestamo(
		     $varusucod,
		     $varlibcodcar,
		     $varsolfec,
		     $varlibcantidad,
		     $varsolfecenviar)
		     VALUES (
		     '$usuCodigo',
		     '$insertlibcod',
		     NOW(),
		     '$insertlibcantidad',
		     NOW()
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
		      'Agrega un libro a su carrito de prestamo: $insertlibtit',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "1";
}
 ?>