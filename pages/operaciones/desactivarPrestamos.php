	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	session_start();
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

	

    // $varsolestado='1' 1 ESTADO = ACTIVO
	$insRegistro=mysqli_query($conexion,"
			UPDATE $varbolsaprestamo SET
			$varsolestado='0'
			WHERE $varusucod='$usuCodigo';
		    ")
	    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "<div class='alert alert-warning' role='alert'> Has cancelado tu prestamo. (desactivarPrestamo.php Mensaje)</div>";

	?>


				