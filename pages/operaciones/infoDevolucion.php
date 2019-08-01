	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	session_start();
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];


    $limite = 5;
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=1; 
	};

	if (!empty($_GET["busqueda"])) { 
		// CRITERIO DE CODIGO HA SIDO AGREGADO.
		$textCodigo  = $_GET["busqueda"];

		//CHECKEAR SI EL CODIGO ES DE UN LIBRO
		$selTable=mysqli_query($conexion," SELECT * FROM $tablaEjemplares 
						WHERE $varejemcodreg='$textCodigo'									
							;");

		//$dataRow = mysqli_fetch_array($resultado);	

		if (mysqli_num_rows($selTable)==0){
			//CHECKEAR SI EL CODIGO ES DE EQUIPO
			$selTable=mysqli_query($conexion," SELECT * FROM $tablaExistenciaequipo 
				WHERE $varexistcodreg='$textCodigo'									
				;");
			if (mysqli_num_rows($selTable)==0){
				//CODIGO ERROR =1
				?> <p class="card-text"><div class='alert alert-danger' role='alert'>Error 2: Codigo Invalido</div></p>
				<?php
			} else{
				//El CODIGO ES DE EQUIPO
				$dataRow = mysqli_fetch_array($selTable);
				//echo "Equipo";
				//CHECKING EQUIPMENT STARTS HERE
					//Existencia estatus: estado del equipo 0=Disponible 1=Prestado 2=Reparacion 3=Extraviado 4=No disponible
					//Prestamo estado equipo: estado del préstamo 0=Activo 1=Finalizado  3=en espera
				if($dataRow[$varexistestu]=="0"){
					//NO ESTA PRESTADO
					?> <p class="card-text"><div class='alert alert-warning' role='alert'>No existen prestamos relacionados a este equipo</div></p>
					<?php
				} else if ($dataRow[$varexistestu]=="1"){
					//PRESTADO > PROCEDER A DEVOLVER
					//START
					//Prestamo estado RESUMENequipo: estado del préstamo 0=Activo 1=Finalizado  3=en espera
						$selTable=mysqli_query($conexion," SELECT * FROM $varresumenequipoprestamo as resumen
						INNER JOIN $vardetallesprestamoequipo as detalles on detalles.$varprestcodequiDet=resumen.$varprestcodequi
						INNER JOIN $tablaExistenciaequipo as existencias on detalles.$varexistcodDet=existencias.$varexistcod
						WHERE existencias.$varexistcodreg='$textCodigo' AND resumen.$varprestestequi='0';									
						;");
					if (mysqli_num_rows($selTable)==0){
						//CODIGO ERROR =No existe un registro para este libro que esta prestado
						?> <p class="card-text"><div class='alert alert-danger' role='alert'>Error: No existe un registro de prestamo para este equipo, Calidad del equipo puesto en estado Disponible para futuros prestamos</div></p>
						<?php
						//ACCION REESTABLECER EL ESTADO DE EQUIPO INGRESADO A DISPONIBLE AUNQUE NO HAY UN REGISTRO DE PRESTAMO NI USUARIO RELACIONADO


						$insRegistro=mysqli_query($conexion,"
									UPDATE $tablaExistenciaequipo SET
									$varexistestu='0'			
								    WHERE $varexistcodreg='$textCodigo';")
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
							      'Equipo: $textCodigo, Puesto en Disponible Aunque no existe Registro de Prestamo enlazado',
							      '$usuCodigo',
							      '---',
							      '$bitPersonaName');")
							or die ('ERROR INS-INS:'.mysqli_error($conexion));

	 
					} else{
						//ACCION REVISAR OTROS REGISTROS , CAMBIAR ESTADO DE EQUIPO A DISPONIBLE, CAMBIAR USUARIO A ACTIVO
						//Estado de la cuenta de usuario: muestra si una cuenta esta logeada en el sistema 0=Activa 1=inactiva 2=Suspendida 3=EN PRESTAMO
						$dataRow = mysqli_fetch_array($selTable);
						$codigoResumenPrestamo=$dataRow[$varprestcodequi];
						$codigoUsuarioPrestamo=$dataRow[$varusuCodigoFEquipo];


						//Estatus del ejemplar: estado del libro si  0=Disponible  1=Prestado 2=No disponible 3=Extraviado

						$insRegistro=mysqli_query($conexion,"
									UPDATE $tablaExistenciaequipo SET
									$varexistestu='0'			
								    WHERE $varexistcodreg='$textCodigo';")
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
								      'EQUIPO: $textCodigo devuelto PROCESO DE PRESTAMO: $codigoResumenPrestamo',
								      '$usuCodigo',
								      '---',
								      '$bitPersonaName');")
								or die ('ERROR INS-INS:'.mysqli_error($conexion));



						$selTable=mysqli_query($conexion," SELECT * FROM $varresumenequipoprestamo as resumen
						INNER JOIN $vardetallesprestamoequipo as detalles on detalles.$varprestcodequiDet=resumen.$varprestcodequi
						INNER JOIN $tablaExistenciaequipo as existencias on detalles.$varexistcodDet=existencias.$varexistcod
						INNER JOIN $tablaEquipo as equipo on existencias.$varequicodExist=equipo.$varequicod
						INNER JOIN $tablaUsuarios as usuarios on usuarios.$varUsuCodigo=resumen.$varusuCodigoFEquipo
						WHERE resumen.$varprestcodequi='$codigoResumenPrestamo' AND existencias.$varexistestu='1'									
						;");

						if (mysqli_num_rows($selTable)==0){
							//NO EXISTEN OTROS EJEMPLARES QUE PERTENECEN A ESTE PROCESO DE PRESTAMO > ACTUALIZAR USUARIO A ACTIVA(0)
							$insRegistro=mysqli_query($conexion,"
								UPDATE $tablaUsuarios SET
								$varCueEstatus='0' 		
							    WHERE $varUsuCodigo='$codigoUsuarioPrestamo';")
							   or die ('ERROR INS-INS:'.mysqli_error($conexion));

							// PRESTAMO ES COMPLETAMENTE FINALIZADO PASAR DE ACTIVO (0) A FINALIZADO (1)
							   $insRegistro=mysqli_query($conexion,"
								UPDATE $varresumenequipoprestamo SET
								$varprestestequi='1' 		
							    WHERE $varprestcodequi='$codigoResumenPrestamo';")
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
							      'Usuario puesto en activo, devolucion realizada en proceso: $codigoResumenPrestamo',
							      '$usuCodigo',
							      '---',
							      '$bitPersonaName');")
							or die ('ERROR INS-INS:'.mysqli_error($conexion));

							?> <p class="card-text"><div class='alert alert-success' role='alert'>Equipo devuelto exitosamente. Este usuario no tiene ningun Prestamo pendiente</div></p>
							<?php



						} else {
							

							?> <p class="card-text"><div class='alert alert-success' role='alert'>Equipo devuelto exitosamente. Este equipo pertenece a un prestamo que tiene los siguientes articulos sin devolver:</div></p> <?php

							?>
						
							<?php
								$contadorOnce=1;

								while ($datosTabla=mysqli_fetch_assoc($selTable)){

									if ($contadorOnce==1) {
										?>
											Carnet del Prestamista: <?php echo $datosTabla[$varCarnet];?> <br>
											Codigo del Prestamo: <?php echo $codigoResumenPrestamo;?> 
											<br>
											Codigo del Prestamo: <?php echo $datosTabla[$varprestdevequi];?> 

											<table class="table table-primary">
											<tbody>

										<?php
									}
									$contadorOnce=$contadorOnce+1;

									?>
									<tr>
										<td align="center" style="padding: 1px;"><img src="<?php echo $datosTabla[$varequimg];?>" width="40" height="51">  </td>
										<td><div style="height:60px;"> <small> Codigo #:<?php echo $datosTabla[$varexistcodreg];?> <br>
											Titulo: <?php echo $datosTabla[$varequitip]; ?><br>
										
										 </small></div></td>
									</tr>	

									<?php
								}

								?>
								</tbody>
							</table>
							<?php


						}
					
					}
					//END

				} else if ($dataRow[$varexistestu]=="2"){
					//NO DISPONIBLE
					?> <p class="card-text"><div class='alert alert-warning' role='alert'>ERROR: ARTICULO NO DISPONIBLE PARA PRESTAMOS</div></p>
					<?php
				} else if ($dataRow[$varexistestu]=="3"){
					//EXTRAVIADO
					?> <p class="card-text"><div class='alert alert-danger' role='alert'>Este articulo fue marcado como perdido.</div></p>
					<?php
				} else {

					?> <p class="card-text"><div class='alert alert-danger' role='alert'>Error infoDevolucion.php at 66: Estado del articulo desconocido. Consulte con Administrador</div></p>
					<?php
				}
				//CHECKING ENDS HERE
			}
		} else {
			//EL CODIGO ES DE LIBRO
			$dataRow = mysqli_fetch_array($selTable);
			//CHECKING STARTS HERE
			//echo "Libro";
			//Estatus del ejemplar: estado del libro si  0=Disponible  1=Prestado 2=No disponible 3=Extraviado
			//Prestamo estado libro: estado del prestamo 0=Activo 1=Renovado 2=Finalizado 3=en espera
			if($dataRow[$varejemestu]=="0"){
				//NO ESTA PRESTADO
				?> <p class="card-text"><div class='alert alert-warning' role='alert'>No existen prestamos relacionados a este ejemplar</div></p>
				<?php
			} else if ($dataRow[$varejemestu]=="1"){
				//PRESTADO > PROCEDER A DEVOLVER
				//START
				//Prestamo estado RESUMEN libro: estado del prestamo 0=Activo 1=Renovado 2=Finalizado 3=en espera
					$selTable=mysqli_query($conexion," SELECT * FROM $varresumenlibroprestamo as resumen
					INNER JOIN $vardetallesprestamolibro as detalles on detalles.$varprestcodlib=resumen.$varprestcod
					INNER JOIN $tablaEjemplares as ejemplares on detalles.$varejemcodlib=ejemplares.$varejemcod
					WHERE ejemplares.$varejemcodreg='$textCodigo' AND resumen.$varprestest='0';									
					;");
				if (mysqli_num_rows($selTable)==0){
					//CODIGO ERROR =No existe un registro para este libro que esta prestado
					?> <p class="card-text"><div class='alert alert-danger' role='alert'>Error: No existe un registro de prestamo para este ejemplar, el estado de este ejemplar ha sido cambiado a Disponible</div></p>
					<?php
					//ACCION REESTABLECER EL ESTADO DE LIBRO A DISPONIBLE AUNQUE NO HAY UN REGISTRO DE PRESTAMO NI USUARIO RELACIONADO

					$insRegistro=mysqli_query($conexion,"
								UPDATE $tablaEjemplares SET
								$varejemestu='0'			
							    WHERE $varejemcodreg='$textCodigo';")
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
							      'Ejemplar: $textCodigo, Puesto en Disponible Aunque no existe Registro de Prestamo enlazado',
							      '$usuCodigo',
							      '---',
							      '$bitPersonaName');")
							or die ('ERROR INS-INS:'.mysqli_error($conexion));


 
				} else{
					//ACCION REVISAR OTROS REGISTROS , CAMBIAR ESTADO DE EJEMPLAR A DISPONIBLE, CAMBIAR USUARIO A ACTIVO
					//Estado de la cuenta de usuario: muestra si una cuenta esta logeada en el sistema 0=Activa 1=inactiva 2=Suspendida 3=EN PRESTAMO
					$dataRow = mysqli_fetch_array($selTable);
					$codigoResumenPrestamo=$dataRow[$varprestcod];
					$codigoUsuarioPrestamo=$dataRow[$varusuCodigoF];


					//Estatus del ejemplar: estado del libro si  0=Disponible  1=Prestado 2=No disponible 3=Extraviado

					$insRegistro=mysqli_query($conexion,"
								UPDATE $tablaEjemplares SET
								$varejemestu='0'			
							    WHERE $varejemcodreg='$textCodigo';")
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
							      'Ejemplar: $textCodigo devuelto PROCESO DE PRESTAMO: $codigoResumenPrestamo',
							      '$usuCodigo',
							      '---',
							      '$bitPersonaName');")
							or die ('ERROR INS-INS:'.mysqli_error($conexion));



					$selTable=mysqli_query($conexion," SELECT * FROM $varresumenlibroprestamo as resumen
					INNER JOIN $vardetallesprestamolibro as detalles on detalles.$varprestcodlib=resumen.$varprestcod
					INNER JOIN $tablaEjemplares as ejemplares on detalles.$varejemcodlib=ejemplares.$varejemcod
					INNER JOIN $tablaLibros as libros on ejemplares.$varejemlibcod=libros.$varlibcod
					INNER JOIN $tablaUsuarios as usuarios on usuarios.$varUsuCodigo=resumen.$varusuCodigoF
					WHERE resumen.$varprestcod='$codigoResumenPrestamo' AND ejemplares.$varejemestu='1'									
					;");

					if (mysqli_num_rows($selTable)==0){
						//NO EXISTEN OTROS EJEMPLARES QUE PERTENECEN A ESTE PROCESO DE PRESTAMO > ACTUALIZAR USUARIO A ACTIVA(0)
							$insRegistro=mysqli_query($conexion,"
								UPDATE $tablaUsuarios SET
								$varCueEstatus='0' 		
							    WHERE $varUsuCodigo='$codigoUsuarioPrestamo';")
							   or die ('ERROR INS-INS:'.mysqli_error($conexion));

							// PRESTAMO ES COMPLETAMENTE FINALIZADO PASAR DE ACTIVO (0) A FINALIZADO (1)
							   $insRegistro=mysqli_query($conexion,"
								UPDATE $varresumenlibroprestamo SET
								$varprestest='1' 		
							    WHERE $varprestcod='$codigoResumenPrestamo';")
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
							      'Usuario puesto en activo, devolucion realizada en proceso: $codigoResumenPrestamo',
							      '$usuCodigo',
							      '---',
							      '$bitPersonaName');")
							or die ('ERROR INS-INS:'.mysqli_error($conexion));

							?> <p class="card-text"><div class='alert alert-success' role='alert'>Libro devuelto exitosamente. El usuario que comenzo este prestamo no tiene ningun otro libro pendiente</div></p>
					<?php



					} else {
						

						?> <p class="card-text"><div class='alert alert-success' role='alert'>Libro devuelto exitosamente. Este ejemplar pertenece a un Prestamo que aun tiene otros ejemplares pendientes :</div></p> <?php

						?>
					
						<?php
							$contadorOnce=1;

							while ($datosTabla=mysqli_fetch_assoc($selTable)){

								if ($contadorOnce==1) {
									?>
										Carnet del Prestamista: <?php echo $datosTabla[$varCarnet];?> <br>
										Codigo del Prestamo: <?php echo $codigoResumenPrestamo;?> 
										<br>
										Codigo del Prestamo: <?php echo $datosTabla[$varprestdev];?> 

										<table class="table table-primary">
										<tbody>

									<?php
								}
								$contadorOnce=$contadorOnce+1;

								?>
								<tr>
									<td align="center" style="padding: 1px;"><img src="<?php echo $datosTabla[$varlibpor];?>" width="40" height="51">  </td>
									<td><div style="height:60px;"> <small> Codigo #:<?php echo $datosTabla[$varejemcodreg];?> <br>
										Titulo: <?php echo $datosTabla[$varlibtit]; ?><br>
									
									 </small></div></td>
								</tr>	

								<?php
							}

							?>
							</tbody>
						</table>
						<?php


					}
				
				}
				//END

			} else if ($dataRow[$varejemestu]=="2"){
				//NO DISPONIBLE
				?> <p class="card-text"><div class='alert alert-warning' role='alert'>ERROR: LIBRO NO DISPONIBLE PARA PRESTAMOS</div></p>
				<?php
			} else if ($dataRow[$varejemestu]=="3"){
				//EXTRAVIADO
				?> <p class="card-text"><div class='alert alert-danger' role='alert'>Este ejemplar fue marcado como perdido.</div></p>
				<?php
			} else {

				?> <p class="card-text"><div class='alert alert-danger' role='alert'>Error infoDevolucion.php at 66: Estado del articulo desconocido. Consulte con Administrador</div></p>
				<?php
			}
			//CHECKING ENDS HERE


		}

	}

	else {
		// CODIGO NO HA SIDO AGREGADO
		$textCodigo="";
		?> 	
	 		<p class="card-text"><div class='alert alert-danger' role='alert'>Error 1: Codigo Invalido</div></p>
	 	<?php 
	}

	
    





?>