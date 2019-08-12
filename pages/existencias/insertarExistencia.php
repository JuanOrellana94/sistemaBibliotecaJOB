

<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	$formExistenciaequipoCod=$_POST['formExistenciaequipoCod'];	
	$formExistenciastado=strtoupper($_POST['formExistenciastado']);
	$formExistenciacomentario=strtoupper($_POST['formExistenciacomentario']);
	$formExistenciaingreso=$_POST['formExistenciaingreso'];
	$formExistenciafecha=$_POST['formExistenciafecha'];
	$formestantcod=$_POST['formestantcod'];	
	if (isset($_POST["formprecio"])) { 
		$formprecio=$_POST['formprecio']; 
	} else {
		$formprecio=""; 
	};
	if (isset($_POST['formdetalle'])) { 
		$formdetalle=$_POST['formdetalle']; 
	} else {
		$formdetalle=""; 
	};
		
    
    // select lpad(ejemcod,5,'0') from ejemplareslibros;
   // obtener codigo del ejemplar

     $sql=("SELECT $varequicodifi as codifi FROM $tablaEquipo  WHERE $varequicod = $formExistenciaequipoCod");
     $sql2=("SELECT lpad(count($varexistcod)+1,5,'0') as codigo from $tablaExistenciaequipo where $varequicod = $formExistenciaequipoCod");
     $consulta=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    $consulta2=mysqli_query($conexion, $sql2) or die(mysqli_error($conexion));
    while ($datacodigo=mysqli_fetch_assoc($consulta)){
    	 while ($datacodigo2=mysqli_fetch_assoc($consulta2)){
          $newcodigo= $instituocodigo."".$datacodigo['codifi']."-".$datacodigo2['codigo'];
      }
    }

    $usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

// $checkValidation="SELECT * FROM  $tablaEjemplares WHERE $varejemcodreg='222222';";

// $resultado=mysqli_query($conexion, $checkValidation) or die("SELECT * FROM  $tablaEjemplares WHERE $varejemcodreg='222222';".mysqli_error($conexion));


// $dataRow = mysqli_fetch_array($resultado);	

	 
// 	 if($dataRow>0) {
// 		echo "0";

// 		} else {


		$insRegistro=mysqli_query($conexion,"
			INSERT INTO 
			$tablaExistenciaequipo($varexistcodreg, $varexistfecadq, $varexisttipadq,
			 $varexistdetadq, $varexistpreuni, $varexistconfis, $varexistdesest, $varestcod, $varequicod) 
			 VALUES ('$newcodigo','$formExistenciafecha','$formExistenciaingreso',
			 '$formdetalle','$formprecio','$formExistenciastado','$formExistenciacomentario','$formestantcod','$formExistenciaequipoCod');")
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
		      ' ingreso una nueva existencia de equipo: $newcodigo',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";
    // }
 ?>