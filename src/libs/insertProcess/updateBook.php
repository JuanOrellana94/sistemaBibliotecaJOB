<?php 
	include("../vars.php");
	include("../sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

	$libcod=$_POST['editlibcod'];
	$libtit=strtoupper($_POST['editlibtit']);
	$libdes=strtoupper($_POST['editlibdes']);
	
	$libfecedi=$_POST['editlibfecedi'];
	$libnumpag=$_POST['editlibnumpag'];
	$libisbn=$_POST['editlibisbn'];
	$libgenaut=strtoupper($_POST['editgenautcod']);
	$libDew=$_POST['editdewcod'];
	$libedit=$_POST['editeditcod'];
	$libtags=strtoupper($_POST['editlibtags']);
	$current_date=date("d-m-Y h:i:s");

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaLibros WHERE $varlibisbn='$libisbn' AND  $varlibcod!='$libcod';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "0";

		} else {


		$insRegistro=mysqli_query($conexion,"
			UPDATE $tablaLibros SET
			$varlibtit='$libtit',
			$varlibdes='$libdes',
			$varlibfecedi='$libfecedi',
			$varlibnumpag='$libnumpag',
			$varlibisbn='$libisbn',
			$varlibgenaut='$libgenaut',
			$varlibDew='$libDew',
			$varlibedit='$libedit',
			$varlibtags='$libtags'
			WHERE $varlibcod='$libcod';
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
		      'ha editado libro: $libtit Codigo: $libcod',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "1";
}
 ?>