<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

	$editexistenciaprecio=$_POST['inputprecio'];
	$editexistenciatipoingreso=$_POST['editexistenciatipoingreso'];
	$inputdetalle=mb_strtoupper ($_POST['inputdetalle']);
	$editexistenciaestado=$_POST['editExistenciastado'];
	$editexistenciacodigo=$_POST['editexistenciacodigo']; 
	$editexistenciacomentario=mb_strtoupper ($_POST['editexistenciacomentario']);
	$editestantcod=$_POST['editestantcod'];
	$editexistenciafecha=$_POST['editexistenciafecha'];


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT  t1.$varexistcod as Codigo, t1.$varexistcodreg as CodigoReg, t1.$varexistfecadq as Fecha, t1.$varexisttipadq as Ingreso, t1.$varexistdetadq as detalleIngreso, t1.$varexistpreuni as Precio, t1.$varexistestu as Estado, t1.$varexistconfis as Condicion, t1.$varexistdesest as Comentario, t1.$varequicod as codEquipo, t2.$varestdes as Estante , t2.$varestcod as codEstante, t3.$varequitip as equipoNom, t3.$varequimg as Imagen FROM $tablaExistenciaequipo as t1 JOIN estante as t2 on t2.$varestcod = t1.$varestcod JOIN equipo as t3 on t3.$varequicod = t1.$varequicod   WHERE   $varexistcod = '$editexistenciacodigo'";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));

 $sql=("SELECT  $varexistcod as codigo, $varexistcodreg as CodigoReg FROM $tablaExistenciaequipo WHERE $varexistcod = $editexistenciacodigo");    
    $consulta=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));   
    while ($datacodigo2=mysqli_fetch_assoc($consulta)){
         $formejemplarcodbarra=$datacodigo2['codigo'] ."". str_replace("-", "", $datacodigo2['CodigoReg']) ."". '1234';
      }
	

	 
	 if (mysqli_num_rows($resultado)==0) {
		echo "0";        
		} else {


		$insRegistro=mysqli_query($conexion,"
			UPDATE $tablaExistenciaequipo SET
			$varexistconfis='$editexistenciaestado',
		    $varexistpreuni='$editexistenciaprecio',
			$varexisttipadq='$editexistenciatipoingreso',
			$varexistdetadq='$editexistenciacomentario',
			$varestcod='$editestantcod',
			$varexistdetadq='$inputdetalle',
			$varexistfecadq='$editexistenciafecha',
			$varexistcodbar='$formejemplarcodbarra',
			$varexistfecest=NOW()


			WHERE $varexistcod ='$editexistenciacodigo';
		    ")
	    or die ('ERROR INS-INS'.mysqli_error($conexion));

	
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
		      'ha editado el equipo: $editexistenciacodigo',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "1";

	
}
 ?>