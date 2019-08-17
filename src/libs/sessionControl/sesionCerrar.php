<?php
//CERRAR LA SESION
	include("../vars.php");
	include "conection.php";
	session_start();

 	$usuCodigo=$_SESSION['usuCodigo'];
 	$bitNomPersonaData=$_SESSION['nombreComp'];


	$insRegistro=mysqli_query($conexion,"
    INSERT INTO  $tablaBitacora(
      $varFecha,
      $varDesc,
      $varBitUsuCodigo,
      $varNomLibreria,
      $varNomPersona
      ) VALUES(
      NOW(),
      ' se deslogeo del sistema exitosamente ',
      '$usuCodigo',
      '---',
  	  '$bitNomPersonaData');")
    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	
	
	unset($_SESSION);

	session_destroy();
	
	mysqli_close($conexion);
	
	echo "Sesion cerrada";



?>