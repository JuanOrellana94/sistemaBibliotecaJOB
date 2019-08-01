	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	session_start();
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

	

//ACTIVAR PRESTAMO > SOLICITUD EN CONSULTAS
    $checkNumeroLibros="SELECT * FROM $varbolsaprestamo WHERE $varusucod = '$usuCodigo';";

	$resultado=mysqli_query($conexion, $checkNumeroLibros) or die(mysqli_error($conexion));


	if (mysqli_num_rows($resultado)>0){
		//condicion existen libros
		// $varsolestado='1' 1 ESTADO = ACTIVO
	$insRegistro=mysqli_query($conexion,"
			UPDATE $varbolsaprestamo SET
			$varsolfecenviar=NOW(),
			$varsolestado='1'
			WHERE $varusucod='$usuCodigo';
		    ")
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
		      '$bitPersonaName realizo su pedido (ActivarPrestamo)',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "<div class='alert alert-success' role='alert'> Has realizado tu prestamo! (ActivarPrestamo.php Mensaje)</div>";

		
	} else {
		//condicion no hay libros añadidos
		echo "<div class='alert alert-info' role='alert'> Agrega un libro a tu lista de pedido primero (ActivarPrestamo.php Mensaje)</div>";
		


	}


    
	?>


				