	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	session_start();
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];
	if (!empty($_GET["usuario"])) { 
		// CRITERIO DE USUARIO EXISTE.
		$textUsuario  = $_GET["usuario"];
		$selTable="
			SELECT * from $varresumenlibroprestamo AS resumen
			INNER JOIN $tablaUsuarios AS usuario ON resumen.$varusuCodigoF=usuario.$varUsuCodigo

			WHERE (usuario.$varAccNombre='$textUsuario' AND resumen.$varprestest='0') OR
				  (usuario.$varCarnet='$textUsuario'AND  resumen.$varprestest='0')
		;";			
							$resultado=mysqli_query($conexion, $selTable) or die(mysqli_error($conexion));

							if(mysqli_num_rows($resultado)==0) {
									//Revisar si es equipo
								
								//CHECK RESUMEN PRESTAMO DE EQUIPOS

									$selTable="
									SELECT * from $varresumenequipoprestamo AS resumen
									INNER JOIN $tablaUsuarios AS usuario ON resumen.$varusuCodigoFEquipo=usuario.$varUsuCodigo

									WHERE (usuario.$varAccNombre='$textUsuario' AND resumen.$varprestestequi='0') OR
										  (usuario.$varCarnet='$textUsuario'AND  resumen.$varprestestequi='0')
								;";
						
								$resultado=mysqli_query($conexion, $selTable) or die(mysqli_error($conexion));

								$dataRow = mysqli_fetch_array($resultado);

								$varcodTransaccion=$dataRow[$varprestcodequi]

								?>

								<p>
										<?php echo $dataRow[$varprestcodequi]; ?>
								</p>



								


							<?php

							}else{

								$dataRow = mysqli_fetch_array($resultado);

								$varcodTransaccion=$dataRow[$varprestcodlib]


								?>

								<p>
										<?php echo $dataRow[$varprestcodlib]; ?>
								</p>

								
								 <?php

							 }

	} else {
		?> 
	 	<p class="card-text"><div class='alert alert-info' role='alert'>Usuario no asignado</div></p>
	 	<?php 
	}




?>
