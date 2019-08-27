<?php 
	include("../vars.php");
	include("../sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$modallibcod=$_POST['modallibcod'];


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];


		$insRegistro=mysqli_query($conexion,"
			DELETE FROM $tablAutor
			WHERE $varautcod='$delautcod'		    
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
		      ' ingreso un nuevo autor: $formautnom $formautape',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "<span style='color: green;'> Libro Eliminado </span>";

 ?>