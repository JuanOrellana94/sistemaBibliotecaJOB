<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();
//GENERAR PRESTAMO CREAR REGISTRO, CAMBIAR ESTADO DE USUARIO, CAMBIAR ESTADO A EJEMPLARES CAMBIAR ESTADO A PROCESO DE PRESTAMO A ACTIVO

	if (isset($_POST["varprestcodlib"])) { 
		$varprestcodlibs=$_POST['varprestcodlib'];
	} else {
	 $varprestcodlibs=''; 
	}

	if (isset($_POST["varprestcodequi"])) { 
		$varprestcodequis=$_POST['varprestcodequi'];
	} else {
	 $varprestcodequis=''; 
	}

	$fechaDevolucion=$_POST['fechaDevolucion'];

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];


//Revisas si existe un registro de prestamo
	$checkValidation="SELECT * FROM $varresumenlibroprestamo 
					WHERE $varprestcod ='$varprestcodlibs' AND
					$varprestest='3'
					;";

	$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


	
	
	if(mysqli_num_rows($resultado)==0) {
	 	//$tipoPrestamo='Error';
	 	//echo $tipoPrestamo;
	 	//STARTS HERE REVISAR SI EXISTE EQUIPO EN CASO DE QUE NO HAYA LIBROS INGRESADOS
			$checkValidation="SELECT * FROM $varresumenequipoprestamo 
					WHERE $varprestcodequi ='$varprestcodequis' AND
					$varprestestequi='3'
					;";

			$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


			$dataRow = mysqli_fetch_array($resultado);	


			
			
			if(mysqli_num_rows($resultado)==0) {

			 	echo '0';

			 	
			} else {
				$usuCodigoPrestamista=$dataRow[$varusuCodigoFEquipo];
				$selTable=mysqli_query($conexion,"
						SELECT * FROM $vardetallesprestamoequipo as detalles
						INNER JOIN  $tablaExistenciaequipo as existencias on detalles.$varexistcodDet=existencias.$varexistcod
						INNER JOIN $varresumenequipoprestamo as resumen on detalles.$varprestcodequiDet=resumen.$varprestcodequi
						WHERE detalles.$varprestcodequiDet ='$varprestcodequis' AND resumen.$varprestestequi='3';			
				;");
				if (mysqli_num_rows($selTable)==0){
					//No hay resultados
					echo "3";
				} else{
					$existenciaUsado=0;
					while ($datosTabla=mysqli_fetch_assoc($selTable)){
									
						if ( $datosTabla[$varexistestu]>0) {
							$existenciaUsado=$existenciaUsado+1;
						}								
					}

					if ($existenciaUsado>0) {
					//Existe un ejemplar que no esta disponible/prestado/etc CANCELAR PROCESO ENVIAR ERROR
						echo "2";
					} else{

						$selTable=mysqli_query($conexion,"
							SELECT * FROM $vardetallesprestamoequipo 
							WHERE $varprestcodequiDet ='$varprestcodequis'								
						;");

						if (mysqli_num_rows($selTable)==0){
							 echo "ERROR";
						} else{
							while ($datosTabla=mysqli_fetch_assoc($selTable)){
								$existenciaPrestar= $datosTabla[$varexistcodDet];	

								$insRegistro=mysqli_query($conexion,"
								UPDATE $tablaExistenciaequipo SET
									$varexistestu='1'									
									WHERE $varexistcod='$existenciaPrestar';
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
								    'Libro codigo $existenciaPrestar puesto en estado 1=prestado',
								    '$usuCodigo',
								    '---',
								    '$bitPersonaName');")
							    or die ('ERROR INS-INS:'.mysqli_error($conexion));
							}
							//CIERRE BUCLE FINAL

							// SET PRESTAMO ON ACTIVO

					 		//3 CUZ MEANS HE CAN'T DO MORE !
							$insRegistro=mysqli_query($conexion,"
								UPDATE $tablaUsuarios SET
								$varCueEstatus='3' 		
							    WHERE $varUsuCodigo='$usuCodigoPrestamista';")
							   or die ('ERROR INS-INS:'.mysqli_error($conexion));


							//Prestamo estado libro: estado del prestamo 0=Activo 1=Renovado 2=Finalizado 3=en espera
							$insRegistro=mysqli_query($conexion,"
								UPDATE $varresumenequipoprestamo SET
								$varprestestequi='0',
								$varprestdevequi='$fechaDevolucion'			
							    WHERE $varprestcodequi='$varprestcodequis';")
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
							      'Prestamo realizado Registro: $varprestcodequis',
							      '$usuCodigo',
							      '---',
							      '$bitPersonaName');")
							or die ('ERROR INS-INS:'.mysqli_error($conexion));

							echo "1";
						}
					}


				}
			}

			//ENDS HERE

	 	
	} else {

		$dataRow = mysqli_fetch_array($resultado);	

		$usuCodigoPrestamista=$dataRow[$varusuCodigoF];

		$checkValidation="SELECT * FROM $vardetallesprestamoequipo as detalles
					INNER JOIN $varresumenequipoprestamo  as resumen on detalles.$varprestcodequiDet=resumen.$varprestcodequi
					WHERE detalles.$varprestcodequi ='$varprestcodequis' AND
					resumen.$varprestestequi='3'
					;";



		$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));
		$dataRow = mysqli_fetch_array($resultado);	

		if(mysqli_num_rows($resultado)!=0) {

		 	echo "4";

		 	
		} else { 	

			$selTable=mysqli_query($conexion,"
			SELECT * FROM $vardetallesprestamolibro as detalles
			INNER JOIN  $tablaEjemplares as ejemplares on detalles.$varejemcodlib=ejemplares.$varejemcod
			INNER JOIN $varresumenlibroprestamo as resumen on detalles.$varprestcodlib=resumen.$varprestcod
			WHERE detalles.$varprestcodlib ='$varprestcodlibs' AND resumen.$varprestest='3';			
		;");
		if (mysqli_num_rows($selTable)==0){
			
			echo "3";
			

		} else{
			$ejemplarUsado=0;
			while ($datosTabla=mysqli_fetch_assoc($selTable)){
							
				if ( $datosTabla[$varejemestu]>0) {
					$ejemplarUsado=$ejemplarUsado+1;
				}								
			}

			if ($ejemplarUsado>0) {
			//Existe un ejemplar que no esta disponible/prestado/etc CANCELAR PROCESO ENVIAR ERROR
				echo "2";
			} else{

				$selTable=mysqli_query($conexion,"
					SELECT * FROM $vardetallesprestamolibro 
					WHERE $varprestcodlib ='$varprestcodlibs'								
				;");

				if (mysqli_num_rows($selTable)==0){
					 echo "ERROR";
				} else{
					while ($datosTabla=mysqli_fetch_assoc($selTable)){
						$ejemplarPrestar= $datosTabla[$varejemcodlib];	

						$insRegistro=mysqli_query($conexion,"
						UPDATE $tablaEjemplares SET
							$varejemestu='1'									
							WHERE $varejemcod='$ejemplarPrestar';
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
						    'Libro codigo $ejemplarPrestar puesto en estado 1=prestado',
						    '$usuCodigo',
						    '---',
						    '$bitPersonaName');")
					    or die ('ERROR INS-INS:'.mysqli_error($conexion));
					}
					//CIERRE BUCLE FINAL

					// SET PRESTAMO ON ACTIVO

			 		//3 CUZ MEANS HE CAN'T DO MORE !
					$insRegistro=mysqli_query($conexion,"
						UPDATE $tablaUsuarios SET
						$varCueEstatus='3' 		
					    WHERE $varUsuCodigo='$usuCodigoPrestamista';")
					   or die ('ERROR INS-INS:'.mysqli_error($conexion));




					$insRegistro=mysqli_query($conexion,"
						UPDATE $varresumenlibroprestamo SET
						$varprestest='0',
						$varprestdev='$fechaDevolucion'		
					    WHERE $varprestcodlib='$varprestcodlibs';")
					   or die ('ERROR INS-INS:'.mysqli_error($conexion));

					   //LISTA DE PEDIDOS ES ELIMINADA
						$insRegistro=mysqli_query($conexion,"
							DELETE FROM $varbolsaprestamo
						    WHERE $varusucod='$usuCodigoPrestamista';")
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
					      'Prestamo realizado, codigo registro: $varprestcodlibs',
					      '$usuCodigo',
					      '---',
					      '$bitPersonaName');")
					or die ('ERROR INS-INS:'.mysqli_error($conexion));

					echo "1";
				}
			}
		}

		}


		
	}

 ?>
