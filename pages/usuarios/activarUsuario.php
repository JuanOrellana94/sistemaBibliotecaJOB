<?php 
 	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();    
	$varactivarusuariocod=$_POST['varactivarusuariocod'];

	$sql=("Update $tablaUsuarios SET $varCueEstatus='0' where $varUsuCodigo='$varactivarusuariocod'");
      $insRegistro=mysqli_query($conexion,$sql)
        or die ('ERROR INS-INS'.mysqli_error($conexion));  

    $usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];
    
    $insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $tablaBitacora(
		      $varFecha,
		      $varDesc,
		      $varBitUsuCodigo,
		      $varNomLibreria,
		      $varNomPersona
		      ) VALUES(
		      NOW(),
		      'Activo al usuario $varactivarusuariocod',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

     
 ?>