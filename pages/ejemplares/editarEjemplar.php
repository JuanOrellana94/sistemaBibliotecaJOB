<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

	
	
	if(empty($_POST['inputprecio'])){
          $editejemplarprecio="";  
	}else{
          $editejemplarprecio=$_POST['inputprecio'];
	}
	if(empty($_POST['inputdetalle'])){
         $inputdetalle="SIN DESCRIPCION"; 
	}else{
         $inputdetalle=strtoupper($_POST['inputdetalle']);
	}

	$editejemplartipoingreso=$_POST['editejemplartipoingreso'];	
	$editejemplarestado=$_POST['editejemplarestado'];
	$editejemplarcodigo=$_POST['editejemplarcodigo']; 
	$editejemplarcomentario=strtoupper($_POST['editejemplarcomentario']);
	$editestantcod=$_POST['editestantcod'];
	 	


	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

     $checkValidation="SELECT  t1.$varejemcod  as Codigo, t1.$varejemdetcon as Comentario, t3.$varlibpor as Portada, t1.$varejemcodreg as CodigoReg ,t1.$varejemfecadq as Fecha ,t1.$varejempruni as Precio,t1.$varejemestu as Estado, t1.$varejemtipadq as Ingreso, t1.$varejemconfis as Condicion ,t1.$varejemres as Reserva ,t2.$varestdes as Estante, t3.$varlibtit as Titulo FROM $tablaEjemplares AS t1 JOIN $tablaEstante as t2 on t2.$varestcod = t1.$varestcod JOIN $tablaLibros as t3 on t3.$varlibcod = t1.$varlibcod   WHERE   $varejemcod = '$editejemplarcodigo'";

     $resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


	

	 
	 if (mysqli_num_rows($resultado)==0) {
		echo "0";        
		} else {

            
		$insRegistro=mysqli_query($conexion,"
			UPDATE $tablaEjemplares SET
			$varejemconfis='$editejemplarestado',
		    $varejempruni='$editejemplarprecio',
			$varejemtipadq='$editejemplartipoingreso',
			$varejemdetcon='$editejemplarcomentario',
			$varestcod='$editestantcod',
			$varejemdetaqu='$inputdetalle',
			$varejemfecest=NOW()
			WHERE $varejemcod ='$editejemplarcodigo';
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
		      'ha editado el ejemplar: $editejemplarcodigo',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "1";

	
}
 ?>