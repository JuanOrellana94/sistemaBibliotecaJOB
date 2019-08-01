<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$varejemcodlibs=$_POST['varejemcodlibs']; //varejemcodlibs EQUIVALE A EXISTENCIA PARA EQUIPOS
	$varprestcodlibs=$_POST['varprestcodlibs'];
	$vartipo=$_POST['vartipo'];

	$usuCodigo=$_SESSION['usuCodigo'];

    $bitPersonaName=$_SESSION['nombreComp'];


if ($vartipo=='1') {
	$checkValidation="SELECT * FROM $vardetallesprestamolibro WHERE $varprestcodlib ='$varprestcodlibs';";

	$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


	$dataRow = mysqli_fetch_array($resultado);	
	 
	 if($dataRow==0) {

	 	echo "0";

	 	
	} else {

		$insRegistro=mysqli_query($conexion,"
			DELETE FROM $vardetallesprestamolibro
			WHERE $varprestcodlib ='$varprestcodlibs' AND
				  $varejemcodlib ='$varejemcodlibs'		    
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
		      'elimino un item de la lista de prestamo en tabla detallesprestamolibro',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));



	$checkValidation="SELECT * FROM $vardetallesprestamolibro WHERE $varprestcodlib ='$varprestcodlibs';";

	$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


	$dataRow = mysqli_fetch_array($resultado);	
	 
	 if($dataRow==0) {

	 	$insRegistro=mysqli_query($conexion,"
			DELETE FROM $varresumenlibroprestamo
			WHERE $varprestcod ='$varprestcodlibs'     
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
		      'elimino un registro de prestamos',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	 	
	}

		echo "1";
	}
} else if ($vartipo=='2') {
	$checkValidation="SELECT * FROM $vardetallesprestamoequipo WHERE $varprestcodequiDet ='$varprestcodlibs';";

	$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


	$dataRow = mysqli_fetch_array($resultado);	
	 
	 if($dataRow==0) {

	 	echo "0";

	 	
	} else {

		$insRegistro=mysqli_query($conexion,"
			DELETE FROM $vardetallesprestamoequipo
			WHERE $varprestcodequiDet ='$varprestcodlibs' AND
				  $varexistcodDet ='$varejemcodlibs'		    
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
		      'elimino un item de la lista de prestamo en tabla detallesprestamolibro',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));


		$checkValidation="SELECT * FROM $vardetallesprestamoequipo WHERE $varprestcodequiDet ='$varprestcodlibs';";

		$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


		$dataRow = mysqli_fetch_array($resultado);	
		 
		 if($dataRow==0) {

		 	$insRegistro=mysqli_query($conexion,"
				DELETE FROM $varresumenequipoprestamo
				WHERE $varprestcodequi ='$varprestcodlibs'     
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
			      'elimino un registro de prestamos',
			      '$usuCodigo',
			      '---',
			      '$bitPersonaName');")
			    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	 	
	}

		echo "1";
	}
}





 ?>