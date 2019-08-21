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
    $formUsuariocorreo=strtoupper($_POST['formUsuariocorreo']);   
    $formUsuariotipo=$_POST['formUsuariotipo'];

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

  if ($formUsuariotipo=='3') {
         	# code...
  	          $formUsuariobachi=$_POST['formUsuariobachi'];
             $formUsuarioanio=$_POST['formUsuarioanio'];
             $formUsuarioseccion=$_POST['formUsuarioseccion'];
             $formUsuariocarnet=$_POST['formUsuariocarnet'];

            $sql1 = ("SELECT  $varUsuCodigo+1 as codigo,$varCarnet as carnet from $tablaUsuarios order by $varUsuCodigo desc limit 1");
            $consulta1=mysqli_query($conexion, $sql1) or die(mysqli_error($conexion));
     while ($datacodigo3=mysqli_fetch_assoc($consulta1)){
               $formejemplarcodbarra=$datacodigo3['codigo'] ."". $datacodigo3['carnet'] ."". '1234567890';
              
        } 
         	$sql="
		    INSERT INTO usuario( $varPriNombre, $varSegNombre, $varPriApellido, $varSegApellido, $varCarnet , $varCorreo, $varContrasena, $varAccNombre, $varAnoBachi, $varSecAula, $varTipBachi, $varNivel,$varusucodbar) VALUES ('$formUsuarionom1','$formUsuarionom2','$formUsuarioape1','$formUsuarioape2','$formUsuariocarnet','$formUsuariocorreo','$formUsuariopass','$formUsuariomote','$formUsuarioanio', '$formUsuarioseccion','$formUsuariobachi','$formUsuariotipo','$formejemplarcodbarra');";

               $checkValidation="SELECT * FROM $tablaUsuarios WHERE $varCarnet='$formUsuariocarnet' or $varAccNombre='$formUsuariomote';";

             $resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));

             $dataRow = mysqli_fetch_array($resultado);	
	 
	  if($dataRow>0) {
	 		echo "0";

		} else {


		$insRegistro=mysqli_query($conexion,$sql)
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
		      ' ingreso un nuevo Usuario: $formUsuarionom1',
		      '$formUsuariocarnet',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";
}


         }else{         	

         	$sql="
		    INSERT INTO usuario( $varPriNombre, $varSegNombre, $varPriApellido, $varSegApellido, $varCorreo, $varContrasena, $varAccNombre, $varNivel) VALUES ('$formUsuarionom1','$formUsuarionom2','$formUsuarioape1','$formUsuarioape2','$formUsuariocorreo','$formUsuariopass','$formUsuariomote','$formUsuariotipo');";

		    $checkValidation="SELECT * FROM $tablaUsuarios WHERE  $varAccNombre='$formUsuariomote';";

                $resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));
                $dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
	 		echo "0";

		} else {


		$insRegistro=mysqli_query($conexion,$sql)
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
		      ' ingreso un nuevo Usuario: $formUsuarionom1',
		      '$formUsuariomote',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";
}
         }
    

 ?>
 