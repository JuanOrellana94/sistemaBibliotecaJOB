

<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	
	$formejemplarcodlib=$_POST['formejemplarcodigolib'];
	$formejemplarestado=strtoupper($_POST['formejemplarestado']);
	$formejemplarcomentario=strtoupper($_POST['formejemplarcomentario']);
	$formejemplaringreso=$_POST['formejemplaringreso'];
	$formejemplarfecha=$_POST['formejemplarfecha'];
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

     $sql=("SELECT t1.$vardewcodcla as dewe FROM $tablaDewey as t1 join $tablaLibros as t2 on t2.$varlibDew = t1.$vardewcod WHERE t2.$varlibcod = $formejemplarcodlib");
     $sql2=("SELECT lpad(count($varejemcod)+1,5,'0') as codigo from $tablaEjemplares where $varlibcod = $formejemplarcodlib");
     $consulta=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    $consulta2=mysqli_query($conexion, $sql2) or die(mysqli_error($conexion));
    while ($datacodigo=mysqli_fetch_assoc($consulta)){
    	 while ($datacodigo2=mysqli_fetch_assoc($consulta2)){
          $newcodigo= $instituocodigo."".$datacodigo['dewe']."-".$datacodigo2['codigo'];
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
			$tablaEjemplares($varejemcodreg, $varejemfecadq, $varejemtipadq,
			 $varejemdetaqu, $varejempruni, $varejemconfis, $varejemdetcon, $varestcod, $varlibcod) 
			 VALUES ('$newcodigo','$formejemplarfecha','$formejemplaringreso',
			 '$formdetalle','$formprecio','$formejemplarestado','$formejemplarcomentario','$formestantcod','$formejemplarcodlib');")
		    or die ('ERROR INS-INS: '.mysqli_error($conexion));

	

		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $tablaBitacora(
		      $varFecha,
		      $varDesc,
		      $varBitUsuCodigo,
		      $varNomLibreria,
		      $varNomPersona
		      ) VALUES(
		      NOW(),
		      ' ingreso un nuevo ejemplar: $varejemcodreg',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";
    // }
 ?>