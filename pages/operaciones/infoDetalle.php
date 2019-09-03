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
			INNER JOIN $vardetallesprestamolibro AS detalles ON resumen.$varprestcod = detalles.$varprestcodlib
			INNER JOIN $tablaEjemplares AS ejemplar ON detalles.$varejemcodlib = ejemplar.$varejemcod
			INNER JOIN $tablaLibros AS libros ON ejemplar.$varejemlibcod = libros.$varlibcod
			INNER JOIN $tablaUsuarios AS usuario ON resumen.$varusuCodigoF=usuario.$varUsuCodigo

			WHERE (usuario.$varAccNombre='$textUsuario' AND resumen.$varprestest='3') OR
				  (usuario.$varCarnet='$textUsuario'AND  resumen.$varprestest='3')
		;";

		$resultado=mysqli_query($conexion, $selTable) or die(mysqli_error($conexion));

		$dataRow = mysqli_fetch_array($resultado);

		$varcodTransaccion=$dataRow[$varprestcodlib]
		?>
		 <input type="text" class="form-control" name="varprestcodlib" value="<?php echo $dataRow[$varprestcodlib]; ?>" id="varprestcodlib" aria-describedby="varprestcodlib" hidden > 
		<?php
		//CHECK RESUMEN PRESTAMO DE EQUIPOS
			$selTable="
			SELECT * from $varresumenequipoprestamo AS resumen
			INNER JOIN $vardetallesprestamoequipo AS detalles ON resumen.$varprestcodequi = detalles.$varprestcodequiDet
			INNER JOIN $tablaExistenciaequipo AS existencia ON detalles.$varexistcodDet = existencia.$varexistcod
			INNER JOIN $tablaEquipo AS equipo ON existencia.$varequicodExist = equipo.$varequicod
			INNER JOIN $tablaUsuarios AS usuario ON resumen.$varusuCodigoFEquipo=usuario.$varUsuCodigo

			WHERE (usuario.$varAccNombre='$textUsuario' AND resumen.$varprestestequi='3') OR
				  (usuario.$varCarnet='$textUsuario'AND  resumen.$varprestestequi='3')
		;";
		$resultado=mysqli_query($conexion, $selTable) or die(mysqli_error($conexion));
		$dataRow = mysqli_fetch_array($resultado);
		$varcodTransaccion=$dataRow[$varprestcodequi]
		?>
		<input type="text" class="form-control" name="varprestcodequi" value="<?php echo $dataRow[$varprestcodequi]; ?>" id="varprestcodequi" aria-describedby="varprestcodequi" hidden> 
		<?php
	} else {
		// CRITERIO DE USUARIO NO EXISTE.
		$textBusqueda="";
		?> 
	 	<p class="card-text"><div class='alert alert-info' role='alert'>Usuario no asignado</div></p>
	 	<?php 
	}




?>
