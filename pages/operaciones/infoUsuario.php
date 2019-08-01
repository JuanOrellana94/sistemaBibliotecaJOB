	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	session_start();
	$usuCodigo=$_SESSION['usuCodigo'];
	$usuCarnet=$_SESSION['usuCarnet'];
    $bitPersonaName=$_SESSION['nombreComp'];



	if (!empty($_GET["busqueda"])) {
		if ($usuCarnet==$_GET["busqueda"]) {
			?> 
			<h6 class="card-subtitle mb-2 text-muted">Prestar Libros a:</h6>
		 	<p class="card-text"><div class='alert alert-danger' role='alert'>Este carnet pertenece a tu cuenta</div></p>
		 	<script>
				document.getElementById("generarPrestamo").disabled = true;
				document.getElementById("fechaDevolucion").disabled = true;
				document.getElementById("textEjemplar").disabled = true;
			</script>
		 	<?php 
		} else{
			// CRITERIO DE BUSQUEDA EXISTE.
			$textBusqueda  = $_GET["busqueda"]; 
			$checkUsuario="SELECT * from $tablaUsuarios WHERE $varCarnet='$textBusqueda' OR $varAccNombre='$textBusqueda';";

			$resultado=mysqli_query($conexion, $checkUsuario) or die(mysqli_error($conexion));

			$dataRow = mysqli_fetch_array($resultado);

			if( $dataRow[$varNivel] == 0 ){
		      $usuTipo="Administrador";
		    }else  if( $dataRow[$varNivel] == 1 ){
		      $usuTipo="Bibliotecario";
		    }else  if( $dataRow[$varNivel] == 2 ){
		      $usuTipo="Personal";
		    }else  if( $dataRow[$varNivel] == 3 ){
		      $usuTipo="Estudiante";
		    }

		    if( $dataRow[$varCueEstatus] == 0 ){
		      $usuEstado="Activa";
		    }else  if( $dataRow[$varCueEstatus] == 1 ){
		      $usuEstado="Inactiva";
		    }else  if( $dataRow[$varCueEstatus] == 2 ){
		      $usuEstado="Suspendida";
		    }
		    	

		if(isset($dataRow)){ 
				?>   
				<h6 class="card-subtitle mb-2 text-muted">Prestar Libros a: <?php  echo $dataRow[$varPriNombre].' '.$dataRow[$varPriApellido];?> </h6>
				<div>
					<p class="card-subtitle mb-2 ">Nombre: <?php echo $dataRow[$varPriNombre].' '.$dataRow[$varSegNombre].' '.$dataRow[$varPriApellido].' '.$dataRow[$varSegApellido]; ?></p>
					<p class="card-subtitle mb-2 ">Carnet: <?php echo $dataRow[$varCarnet]; ?></p>
					<p class="card-subtitle mb-2 ">Año: <?php echo $dataRow[$varAnoBachi].'° - Seccion: '.$dataRow[$varSecAula]; ?></p>

					 <input type="text" class="form-control" name="varUsuCodigo" value="<?php echo $dataRow[$varUsuCodigo]; ?>" id="varUsuCodigo" aria-describedby="varUsuCodigo" hidden="true"> 
					  <input type="text" class="form-control" name="varAccNombre" value="<?php echo $dataRow[$varAccNombre]; ?>" id="varAccNombre" aria-describedby="varUsuCodigo" hidden="true"> 


					 <script>
					 	
					 </script>

					 
				</div>

				<?php
					if ($dataRow[$varCueEstatus]==0) {
						?>
						<script>
							document.getElementById("textEjemplar").focus();
							document.getElementById("generarPrestamo").disabled = false;
							document.getElementById("fechaDevolucion").disabled = false;
							document.getElementById("textEjemplar").disabled = false;
							//document.getElementById("textUsuario").disabled = true;

								 document.getElementById("cancelarPrestamo").disabled = false;
							

						</script>
						<?php
					} else if ($dataRow[$varCueEstatus]==1) {
						?>
						<div class="alert alert-danger" role="alert">
						   Esta cuenta esta desactivada
						</div>
						<script>
							document.getElementById("generarPrestamo").disabled = true;
							document.getElementById("fechaDevolucion").disabled = true;
							document.getElementById("textEjemplar").disabled = true;
						</script>
						<?php
					}else if ($dataRow[$varCueEstatus]==2) {
						?>
						<div class="alert alert-danger" role="alert">
						   Esta cuenta ha sido suspendida
						</div>
						<script>
							document.getElementById("generarPrestamo").disabled = true;
							document.getElementById("fechaDevolucion").disabled = true;
							document.getElementById("textEjemplar").disabled = true;
						</script>
						<?php
					}else if ($dataRow[$varCueEstatus]==3) {
						?>
						<div class="alert alert-danger" role="alert">
						   Esta cuenta tiene prestamos activos (Ver Historial)
						</div>
						<script>
							document.getElementById("generarPrestamo").disabled = true;
							document.getElementById("fechaDevolucion").disabled = true;
							document.getElementById("textEjemplar").disabled = true;
							
						</script>
						<?php
					}

					?> 


					<?php
				
			} else{
			?> 
			<h6 class="card-subtitle mb-2 text-muted">Prestar Libros a:</h6>
		 	<p class="card-text"><div class='alert alert-danger' role='alert'>El codigo de usuario insertado es invalido </div></p>
		 	<?php 		
			}
		}
	} else {
		$textBusqueda="";
		?> 
		<h6 class="card-subtitle mb-2 text-muted">Prestar Libros a:</h6>
	 	<p class="card-text"><div class='alert alert-info' role='alert'>No se ha ingresado ningun usuario</div></p>
	 	<?php 
	}

	



?>
