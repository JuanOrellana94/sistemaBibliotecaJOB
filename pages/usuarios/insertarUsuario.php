<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$formUsuarionom1=strtoupper($_POST['formUsuarionom1']);
	$formUsuarionom2=strtoupper($_POST['formUsuarionom2']);
    $formUsuarioape1=strtoupper($_POST['formUsuarioape1']);
    $formUsuarioape2=strtoupper($_POST['formUsuarioape2']);
    $formUsuariomote=strtoupper($_POST['formUsuariomote']);
    $formUsuariopass=md5($_POST['formUsuariopass']);
    $formUsuariobachi=$_POST['formUsuariobachi'];
    $formUsuarioanio=$_POST['formUsuarioanio'];
    $formUsuariocarnet=$_POST['formUsuariocarnet'];
    $formUsuariocorreo=strtoupper($_POST['formUsuariocorreo']);
    $formUsuarioseccion=$_POST['formUsuarioseccion'];
    $formUsuariotipo=$_POST['formUsuariotipo'];

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $tablaUsuarios WHERE $varCarnet='$formUsuariocarnet';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "0";

		} else {


		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO usuario( $varPriNombre, $varSegNombre, $varPriApellido, $varSegApellido, $varCarnet , $varCorreo, $varContrasena, $varAccNombre, $varAnoBachi, $varSecAula, $varTipBachi,$varNivel) VALUES ('$formUsuarionom1','$formUsuarionom2','$formUsuarioape1','$formUsuarioape2','$formUsuariocarnet','$formUsuariocorreo','$formUsuariopass','$formUsuariomote','$formUsuarioanio','$formUsuarioseccion','$formUsuariobachi','$formUsuariotipo');")
		    or die ('ERROR INS-INS'.mysqli_error($conexion));

	


		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $tablaBitacora(
		      $varFecha,
		      $varDesc,
		      $varBitUsuCodigo,
		      $varNomLibreria,
		      $varNomPersona
		      ) VALUES(
		      NOW(),
		      ' ingreso un nuevo Usuario: $formUsuarionom1',
		      '$formUsuariocarnet',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";
}
 ?>