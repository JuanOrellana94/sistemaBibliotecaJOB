	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	session_start();
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];



if (!empty($_GET["usuario"])) {
   	//AGREGAR CONDICION DE LIMITE POR TIPO DE USUARIO
   	// CRITERIO DE USUARIO EXISTE. 
	if (!empty($_GET["busqueda"])) { 
		// CRITERIO DE BUSQUEDA EXISTE.
		$textUsuario  = $_GET["usuario"]; 
		$textBusqueda  = $_GET["busqueda"]; 
		$checkEjemplar="SELECT * from $tablaEjemplares WHERE $varejemcodreg='$textBusqueda';";

		$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

		$dataRow = mysqli_fetch_array($resultado);	

		if(isset($dataRow)){ 
			//EL LIBRO EXISTE
			?> 	
			<?php 
			if ($dataRow[$varejemestu]==0) {
				//EL LIBRO ESTA DISPONIBLE
				
				//OBTENER EL CODIGO DE USUARIO DEL CARNET INSERTADO
				$checkEjemplar="SELECT * from $tablaUsuarios 

					WHERE $varAccNombre='$textUsuario' OR $varCarnet='$textUsuario';";

				$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

				$dataRow = mysqli_fetch_array($resultado);

				$solicitanteCod=$dataRow[$varUsuCodigo];

				//OBTENER EL CODIGO INTERNO DEL EJEMPLAR INGRESADO
				$checkEjemplar="SELECT * from $tablaEjemplares 

				 WHERE $varejemcodreg='$textBusqueda';";

				$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

				$dataRow = mysqli_fetch_array($resultado);

				$codEjemplar=$dataRow[$varejemcod];


				//INSERTAR REGISTRO DE PRESTAMO EN ESPERA SI NO EXISTE
			

				//REVISAR EN LA BASE SI EXISTE UN PRESTAMO EN PROCESO SIN FINALIZAR (PRESTAMO ESTADO = 3) A NOMBRE DEL USUARIO SOLICITANDO

				$checkEjemplar="SELECT * from $varresumenlibroprestamo 

				WHERE $varprestest='3' AND $varusuCodigoF='$solicitanteCod';";

				$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

				$dataRow = mysqli_fetch_array($resultado);	

				if ($dataRow>0) {
					//YA EXISTE UN PROCESO ABIERTO PARA PRESTAMO CON ESTE USUARIO

					$varprestcodNew=$dataRow[$varprestcod];

					$checkEjemplar="SELECT * from $vardetallesprestamolibro 

					WHERE $varprestcodlib='$varprestcodNew' AND $varejemcod='$codEjemplar';";

					$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

					$dataRow = mysqli_fetch_array($resultado);

					if ($dataRow>0) {
						?> 	
					 	<p class="card-text"><div class='alert alert-warning' role='alert'>Este ejemplar ya ha sido añadido a la lista</div></p>
						<?php
					} else {

						?> 	
					 	<p class="card-text"><div class='alert alert-success' role='alert'>Un ejemplar ha sido añadido</div></p>
						<?php


						$insRegistro=mysqli_query($conexion,"
						    INSERT INTO  $vardetallesprestamolibro(
						     $varprestcodlib,
						     $varejemcod)
						     VALUES (
						     '$varprestcodNew',
						     '$codEjemplar'
						 );")
						    or die ('ERROR INS-INS:'.mysqli_error($conexion));
					}
				} else {
					//NO EXISTE UN PROCESO ABIERTO PARA PRESTAMO CON ESTE USUARIO
					?> 	
				 	<p class="card-text"><div class='alert alert-success' role='alert'>Nuevo registro creado</div></p>
					<?php

					$insRegistro=mysqli_query($conexion,"
					    INSERT INTO  $varresumenlibroprestamo(
					     $varprestfec,
					     $varprestdev,
					     $varprestcom,
					     $varprestest,
					     $varprestren,
					     $varusuCodigoF,
					     $varusuCodBiblio)
					     VALUES (
					     NOW(),
					     DATE_ADD(NOW(), INTERVAL 7 DAY),
					     'Ningun Comentario',
					     '3',
					     '0',
					     '$solicitanteCod',
					     '$usuCodigo'
					 );")
					    or die ('ERROR INS-INS:'.mysqli_error($conexion));


					$checkEjemplar="SELECT * from $varresumenlibroprestamo 

					WHERE $varprestest='3' AND $varusuCodigoF='$solicitanteCod';";

					$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

					$dataRow = mysqli_fetch_array($resultado);

					$varprestcodNew=$dataRow[$varprestcod];


					$insRegistro=mysqli_query($conexion,"
					    INSERT INTO  $vardetallesprestamolibro(
					     $varprestcodlib,
					     $varejemcod)
					     VALUES (
					     '$varprestcodNew',
					     '$codEjemplar'

					 );")
					    or die ('ERROR INS-INS:'.mysqli_error($conexion));
				}


			} else if ($dataRow[$varejemestu]==1) {
				//EL LIBRO ESTA PRESTADO
				?> 	
			 	<p class="card-text"><div class='alert alert-warning' role='alert'>Este ejemplar esta Prestado (Ver Devoluciones)</div></p>
				<?php 
			} else if ($dataRow[$varejemestu]==2) {
				//EL LIBRO ESTA NO DISPONIBLE
				?> 	
			 	<p class="card-text"><div class='alert alert-warning' role='alert'>Este ejemplar esta registado como No Disponible</div></p>
				<?php 
			} else if ($dataRow[$varejemestu]==3) {
				//EL LIBRO ESTA PERDIDO
				?> 	
			 	<p class="card-text"><div class='alert alert-warning' role='alert'>Este ejemplar esta registado como Perdido (Ver Perdidos) </div></p>
				<?php 
			}
		} else{
			//CHECKEA SI EL CODIGO ES DE UN EQUIPO
			$checkEjemplar="
				SELECT * FROM $tablaExistenciaequipo WHERE $varexistcodreg = '$textBusqueda';";

			$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

			$dataRow = mysqli_fetch_array($resultado);	

		 	if(isset($dataRow)){//EL LIBRO EXISTE
				?> 	
				<?php 
				if ($dataRow[$varexistestu]==0) {
					//EL EQUIPO ESTA DISPONIBLE
					
					//OBTENER EL CODIGO DE USUARIO DEL CARNET INSERTADO
					$checkEjemplar="SELECT * from $tablaUsuarios 

						WHERE $varAccNombre='$textUsuario' OR $varCarnet='$textUsuario';";

					$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

					$dataRow = mysqli_fetch_array($resultado);

					$solicitanteCod=$dataRow[$varUsuCodigo];

					//OBTENER EL CODIGO INTERNO DEL EQUIPO INGRESADO
					$checkEjemplar="SELECT * from $tablaExistenciaequipo 

					 WHERE $varexistcodreg='$textBusqueda';";

					$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

					$dataRow = mysqli_fetch_array($resultado);

					$codExistencia=$dataRow[$varexistcod];


					//INSERTAR REGISTRO DE PRESTAMO EN ESPERA SI NO EXISTE
				

					//REVISAR EN LA BASE SI EXISTE UN PRESTAMO EN PROCESO SIN FINALIZAR (PRESTAMO ESTADO = 3) A NOMBRE DEL USUARIO SOLICITANDO

					$checkEjemplar="SELECT * from $varresumenequipoprestamo 

					WHERE $varprestestequi='3' AND $varusuCodigoFEquipo='$solicitanteCod';";

					$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

					$dataRow = mysqli_fetch_array($resultado);	

					if ($dataRow>0) {
						//YA EXISTE UN PROCESO ABIERTO PARA PRESTAMO CON ESTE USUARIO

						$varprestcodNew=$dataRow[$varprestcodequi];

						$checkEjemplar="SELECT * from $vardetallesprestamoequipo 

						WHERE $varprestcodequi='$varprestcodNew' AND $varexistcod='$codExistencia';";

						$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

						$dataRow = mysqli_fetch_array($resultado);

						if ($dataRow>0) {
							?> 	
						 	<p class="card-text"><div class='alert alert-warning' role='alert'>Este codigo ya ha sido añadido a la lista</div></p>
							<?php
						} else {

							?> 	
						 	<p class="card-text"><div class='alert alert-success' role='alert'>Un equipo ha sido añadido</div></p>
							<?php


							$insRegistro=mysqli_query($conexion,"
							    INSERT INTO  $vardetallesprestamoequipo(
							     $varprestcodequi,
							     $varexistcod)
							     VALUES (
							     '$varprestcodNew',
							     '$codExistencia'
							 );")
							    or die ('ERROR INS-INS:'.mysqli_error($conexion));
						}
					} else {
						//NO EXISTE UN PROCESO ABIERTO PARA PRESTAMO CON ESTE USUARIO
						?> 	
					 	<p class="card-text"><div class='alert alert-success' role='alert'>Nuevo registro creado</div></p>
						<?php

						$insRegistro=mysqli_query($conexion,"
						    INSERT INTO  $varresumenequipoprestamo(
						     $varprestfecequi,
						     $varprestdevequi,
						     $varprestcomequi,
						     $varprestestequi,						
						     $varusuCodigoFEquipo,
						     $varusuCodBiblioEquipo)
						     VALUES (
						     NOW(),
						     DATE_ADD(NOW(), INTERVAL 7 DAY),
						     'Ningun Comentario',
						     '3',
						     '$solicitanteCod',
						     '$usuCodigo'
						 );")
						    or die ('ERROR INS-INS:'.mysqli_error($conexion));


						$checkEjemplar="SELECT * from $varresumenequipoprestamo 

						WHERE $varprestestequi='3' AND $varusuCodigoFEquipo='$solicitanteCod';";

						$resultado=mysqli_query($conexion, $checkEjemplar) or die(mysqli_error($conexion));

						$dataRow = mysqli_fetch_array($resultado);

						$varprestcodNew=$dataRow[$varprestcodequi];


						$insRegistro=mysqli_query($conexion,"
						    INSERT INTO  $vardetallesprestamoequipo(
							     $varprestcodequi,
							     $varexistcod)
							     VALUES (
							     '$varprestcodNew',
							     '$codExistencia'

						 );")
						    or die ('ERROR INS-INS:'.mysqli_error($conexion));
					}
				} else if ($dataRow[$varexistestu]==1) {
					//EL LIBRO ESTA PRESTADO
					?> 	
				 	<p class="card-text"><div class='alert alert-warning' role='alert'>Este equipo ya esta Prestado (Ver Devoluciones)</div></p>
					<?php 
				} else if ($dataRow[$varexistestu]==2) {
					//EQUIPO EN REPARACION
					?> 	
				 	<p class="card-text"><div class='alert alert-warning' role='alert'>No se puede prestar. Equipo en estado de reparacion.</div></p>
					<?php 
				} else if ($dataRow[$varexistestu]==3) {
					//EL EQUIPO ESTA PERDIDO
					?> 	
				 	<p class="card-text"><div class='alert alert-warning' role='alert'>No se puede prestar. Este equipo esta registado como Perdido (Ver Perdidos) </div></p>
					<?php 
				} else if ($dataRow[$varexistestu]==4) {
					//EL EQUIPO ESTA PERDIDO
					?> 	
				 	<p class="card-text"><div class='alert alert-danger' role='alert'>No se puede prestar. Equipo no disponible </div></p>
					<?php 
				}
			} else{
			?>			
		 	<p class="card-text"><div class='alert alert-danger' role='alert'>Este codigo es invalido </div></p>
		 	<?php 		
			} 
		}
	} else {
		?>		
	 	<p class="card-text"><div class='alert alert-info' role='alert'>No se ha ingresado ningun libro para prestar</div></p>
	 	<?php 
	}
} else{
		?> 
		
	 	<p class="card-text"><div class='alert alert-info' role='alert'>Agrega un Usuario Primero</div></p>
	 	<?php 
	}


	



?>
