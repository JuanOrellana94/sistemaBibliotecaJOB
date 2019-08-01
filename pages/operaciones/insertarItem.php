<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();

	$insertlibcod=$_POST['varlibcod'];
	$insertlibcantidad=$_POST['libcantidad'];
	$insertlibtit=$_POST['varlibtit'];  

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

$checkValidation="SELECT * FROM $varbolsaprestamo WHERE $varlibcodcar = '$insertlibcod' AND $varusucod='$usuCodigo';";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);	
	 
	 if($dataRow>0) {
		echo "0";
		//EL LIBRO YA EXISTE EN LA LISTA DE PRESTAMO DE ESTE ESTUDIANTE/USUARIO 

		} else {
			//INGRESAR EL LIBRO + CANTIDAD DE EJEMPLARES  SELECT * FROM bolsaprestamo where usucod = 1;

			$checkNumeroLibros="SELECT * FROM $varbolsaprestamo WHERE $varusucod = '$usuCodigo';";

			$resultado=mysqli_query($conexion, $checkNumeroLibros) or die(mysqli_error($conexion));

			//SUMAR EJEMPLARES DE CADA LIBRO REGISTRADO A LA CUENTA DEL USUARIO SOLICITANTE
			$contador=0;

			while ($dataLibros=mysqli_fetch_assoc($resultado)){
				$contador=$contador+$dataLibros[$varlibcantidad];
			}

			$contador=$contador+$insertlibcantidad;


		if ($contador>3 && $_SESSION['usuNivel']==3){
			echo '2';
			// 2 ERROR, EL ESTUDIANTE EXEDIO EL LIMITE DE LIBROS A PEDIR
		} else if ( $_SESSION['usuNivel']<2) {
			echo '3';
			//  3 Cuentas Administrador no puede solicitar prestamos
		} else {

			$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $varbolsaprestamo(
		     $varusucod,
		     $varlibcodcar,
		     $varsolfec,
		     $varlibcantidad,
		     $varsolfecenviar)
		     VALUES (
		     '$usuCodigo',
		     '$insertlibcod',
		     NOW(),
		     '$insertlibcantidad',
		     NOW()
		 );")
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
		      'Agrega un libro a su carrito de prestamo: $insertlibtit',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

	echo "1";



		}




		
}
 ?>