<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

    $editUsuariocod=$_POST['editUsuariocod'];
	$editUsuarionom1=strtoupper($_POST['editUsuarionom1']);
	$editUsuarionom2=strtoupper($_POST['editUsuarionom2']);
    $editUsuarioape1=strtoupper($_POST['editUsuarioape1']);
    $editUsuarioape2=strtoupper($_POST['editUsuarioape2']);
    $editUsuariomote=strtoupper($_POST['editUsuariomote']);
   
    
    
    $editUsuariocorreo=strtoupper($_POST['editUsuariocorreo']);
    
    $editUsuarionivel=$_POST['editUsuarionivel'];

    $usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];


    if ($editUsuarionivel=='3') {
         
          $editUsuarioseccion=$_POST['editUsuarioseccion'];
          $editUsuariocarnet=$_POST['editUsuariocarnet'];
          $editUsuariobachi=$_POST['editUsuariobachi'];
          $editUsuarioaniobachi=$_POST['editUsuarioaniobachi'];

         $checkValidation="SELECT * FROM $tablaUsuarios WHERE $varCarnet='$editUsuariocarnet' AND $varAccNombre='$editUsuariomote' AND $varUsuCodigo != '$editUsuariocod';";
            $resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


      $dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "0";

		} else {     
          if (empty($_POST['editUsuariopass'])) {
         	# code...
                    
			$sql="UPDATE $tablaUsuarios SET $varPriNombre='$editUsuarionom1',$varSegNombre='$editUsuarionom2',$varPriApellido='$editUsuarioape1',$varSegApellido='$editUsuarioape2',$varCarnet='$editUsuariocarnet',$varCorreo='$editUsuariocorreo',$varAccNombre='$editUsuariomote',$varAnoBachi='$editUsuarioaniobachi',$varSecAula='$editUsuarioseccion',$varTipBachi='$editUsuariobachi',$varNivel='$editUsuarionivel' WHERE  $varUsuCodigo='$editUsuariocod'";
         }else{

         	$editUsuariopass=md5($_POST['editUsuariopass']);
            
            $sql="UPDATE $tablaUsuarios SET $varPriNombre='$editUsuarionom1',$varSegNombre='$editUsuarionom2',$varPriApellido='$editUsuarioape1',$varSegApellido='$editUsuarioape2',$varCarnet='$editUsuariocarnet',$varCorreo='$editUsuariocorreo',$varContrasena='$editUsuariopass',$varAccNombre='$editUsuariomote',$varAnoBachi='$editUsuarioaniobachi',$varSecAula='$editUsuarioseccion',$varTipBachi='$editUsuariobachi',$varNivel='$editUsuarionivel' WHERE  $varUsuCodigo='$editUsuariocod'";	    

         }


        $insRegistro=mysqli_query($conexion,$sql)
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
		      'ha editado el usuario: $editUsuarionom1  Codigo: $editUsuariocod',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	         echo "1";
     }




    }else{ 

    	  $editUsuarioseccion="";
          $editUsuariocarnet="";
          $editUsuariobachi="";
          $editUsuarioaniobachi="";
              

         $checkValidation="SELECT * FROM $tablaUsuarios WHERE  $varAccNombre='$editUsuariomote' AND $varUsuCodigo!= '$editUsuariocod';";
            $resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


      $dataRow = mysqli_fetch_array($resultado);	

	 
	 if($dataRow>0) {
		echo "0";

		} else {     
          if (empty($_POST['editUsuariopass'])) {
         	# code...
                    
			$sql="UPDATE $tablaUsuarios SET $varPriNombre='$editUsuarionom1',$varSegNombre='$editUsuarionom2',$varPriApellido='$editUsuarioape1',$varSegApellido='$editUsuarioape2',$varCarnet='$editUsuariocarnet',$varCorreo='$editUsuariocorreo',$varAccNombre='$editUsuariomote',$varAnoBachi='$editUsuarioaniobachi',$varSecAula='$editUsuarioseccion',$varTipBachi='$editUsuariobachi',$varNivel='$editUsuarionivel' WHERE  $varUsuCodigo='$editUsuariocod'";
         }else{

         	$editUsuariopass=md5($_POST['editUsuariopass']);
            
            $sql="UPDATE $tablaUsuarios SET $varPriNombre='$editUsuarionom1',$varSegNombre='$editUsuarionom2',$varPriApellido='$editUsuarioape1',$varSegApellido='$editUsuarioape2',$varCarnet='$editUsuariocarnet',$varCorreo='$editUsuariocorreo',$varContrasena='$editUsuariopass',$varAccNombre='$editUsuariomote',$varAnoBachi='$editUsuarioaniobachi',$varSecAula='$editUsuarioseccion',$varTipBachi='$editUsuariobachi',$varNivel='$editUsuarionivel' WHERE  $varUsuCodigo='$editUsuariocod'";	    

         }


        $insRegistro=mysqli_query($conexion,$sql)
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
		      'ha editado el usuario: $editUsuarionom1  Codigo: $editUsuariocod',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	         echo "1";
     }


    }

     

 ?>