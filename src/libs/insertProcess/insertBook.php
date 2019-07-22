<?php 
	include("../vars.php");
	include("../sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$libtit=$_POST['libtit'];
	$libdes=$_POST['libdes'];
	$libpor="img/portadas/Default.jpg";
	$libfecedi=$_POST['libfecedi'];
	$libnumpag=$_POST['libnumpag'];
	$libisbn=$_POST['libisbn'];
	$libgenaut=$_POST['autnom'];//genaut Ahora es autnom
	$libgenaut=$_POST['autnom'];
	$libDew=$_POST['dewcod'];
	$libedit=$_POST['editcod'];
	$libtags=$_POST['libtags'];


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaLibros WHERE $varlibisbn='$libisbn';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "0";

		} else {


		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $tablaLibros(		    
			   $varlibtit,
			   $varlibdes,
			   $varlibpor,
			   $varlibfecreg,
			   $varlibfecedi,
			   $varlibnumpag,
			   $varlibisbn,
			   $varlibgenaut,
			   $varlibDew,
			   $varlibedit,
			   $varlibtags
		      ) VALUES(
		      '$libtit',
		      '$libdes',
		      '$libpor',
		       NOW(),
		      '$libfecedi',
		      '$libnumpag',
		      '$libisbn',
		      '$libgenaut',
		      '$libDew',
		  	  '$libedit',
		  	  '$libtags');")
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
		      'Ingreso un nuevo libro a la base de datos nombre: $libtit',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "1";
}
 ?>