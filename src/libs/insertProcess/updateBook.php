<?php 
	include("../vars.php");
	include("../sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

	$libcod=$_POST['editlibcod'];
	$libtit=mb_strtoupper ($_POST['editlibtit']);
	$libdes=$_POST['editlibdes'];
	
	$libfecedi=$_POST['editlibfecedi'];
	$libnumpag=$_POST['editlibnumpag'];

	$libgenaut=mb_strtoupper ($_POST['editgenautcod']);
	$libDew=$_POST['editdewcod'];
	$libedit=$_POST['editeditcod'];
	$libtags=$_POST['editlibtags'];
	$current_date=date("d-m-Y h:i:s");

	//$libisbn=$_POST['editlibisbn']; 
	
	if (isset($_POST["editlibisbn"])) { 
		$libisbn=$_POST['editlibisbn']; 
	} else {
		$libisbn="000-0-00-000000-0"; 
	};

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaLibros WHERE $varlibisbn='$libisbn' AND  $varlibcod!='$libcod' AND $varlibisbn != '000-0-00-000000-0';";

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