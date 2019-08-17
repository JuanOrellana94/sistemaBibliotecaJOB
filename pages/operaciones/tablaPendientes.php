	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");

	session_start();

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];


	$limite = 1;
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=1; 
	};


	if (isset($_GET["busqueda"])) { 
		$textBusqueda  = $_GET["busqueda"]; 
	} else {
		$textBusqueda=""; 
	};

		$sql = "SELECT * from $varresumenlibroprestamo AS resumen 
				INNER JOIN $vardetallesprestamolibro AS detalles ON resumen.$varprestcod = detalles.$varprestcodlib
				INNER JOIN $tablaUsuarios as usuarios ON resumen.$varusuCodigoF = usuarios.$varUsuCodigo
				WHERE
				($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varAccNombre LIKE '%$textBusqueda%') OR
				($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varCarnet LIKE '%$textBusqueda%') OR
				($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varPriNombre LIKE '%$textBusqueda%') OR 
				($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varSegNombre LIKE '%$textBusqueda%') OR 
				($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varPriApellido LIKE '%$textBusqueda%') OR 
				($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varSegApellido LIKE '%$textBusqueda%') 
				GROUP BY resumen.$varusuCodigoF
				;";
      $filas_resultado = mysqli_query($conexion, $sql);  
      $filas = mysqli_num_rows($filas_resultado);   // ERROR BUG CAMBIAR  mysqli_fetch_row POR mysqli_num_rows
      //
      	$sql = "SELECT * from $varresumenequipoprestamo AS resumen 
				INNER JOIN $vardetallesprestamoequipo AS detalles ON resumen.$varprestcodequi = detalles.$varprestcodequiDet
				INNER JOIN $tablaUsuarios as usuarios ON resumen.$varusuCodigoFEquipo = usuarios.$varUsuCodigo
				
				WHERE 
				($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varAccNombre LIKE '%$textBusqueda%') OR
				($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varCarnet LIKE '%$textBusqueda%') OR
				($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varPriNombre LIKE '%$textBusqueda%') OR 
				($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varSegNombre LIKE '%$textBusqueda%') OR 
				($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varPriApellido LIKE '%$textBusqueda%') OR 
				($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varSegApellido LIKE '%$textBusqueda%') 
				GROUP BY resumen.$varusuCodigoFEquipo
				;";
      $filas_resultado = mysqli_query($conexion, $sql);  
        

      //
      if (mysqli_num_rows($filas_resultado)>$filas) {
      	 $filas = mysqli_num_rows($filas_resultado);
      }

      $todal_filas = $filas;  // $filas
      $total_paginas = ceil($todal_filas / $limite); 
  	?>                    
                    

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-warning table-hover "  style=" cursor: pointer;">

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"
								SELECT * from $varresumenlibroprestamo AS resumen 
								INNER JOIN $vardetallesprestamolibro AS detalles ON resumen.$varprestcod = detalles.$varprestcodlib
								INNER JOIN $tablaUsuarios as usuarios ON resumen.$varusuCodigoF = usuarios.$varUsuCodigo
								
								WHERE 
								($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varAccNombre LIKE '%$textBusqueda%') OR
								($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varCarnet LIKE '%$textBusqueda%') OR
								($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varPriNombre LIKE '%$textBusqueda%') OR 
								($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varSegNombre LIKE '%$textBusqueda%') OR 
								($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varPriApellido LIKE '%$textBusqueda%') OR 
								($varprestest='3' AND $varusuCodBiblio='$usuCodigo' AND $varSegApellido LIKE '%$textBusqueda%') 
								GROUP BY resumen.$varusuCodigoF
								
								LIMIT $inicia_desde, $limite
							;");
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: gray; font-weight: bold; text-align: center;'>	
							 No hay resultados</div>";
						} else{

							while ($datosTabla=mysqli_fetch_assoc($selTable)){
						?>
						<tr>
							<td> <div style="height:25px;"> <small> <?php echo $datosTabla[$varPriNombre].' '.$datosTabla[$varPriApellido];?>
							 <br>
							 <?php echo $datosTabla[$varCarnet]?>

							</small></div></td>

							<td><div style="height:25px;"><img src="img/icons/sendReq.png" width="35" height="30"></div></td>	
		
						</tr>						
													
						
						<?php }
						} 

						//STARTS HERE

						$selTable=mysqli_query($conexion,"
								SELECT * from $varresumenequipoprestamo AS resumen 
								INNER JOIN $vardetallesprestamoequipo AS detalles ON resumen.$varprestcodequi = detalles.$varprestcodequiDet
								INNER JOIN $tablaUsuarios as usuarios ON resumen.$varusuCodigoFEquipo = usuarios.$varUsuCodigo
								
								WHERE 
								($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varAccNombre LIKE '%$textBusqueda%') OR
								($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varCarnet LIKE '%$textBusqueda%') OR
								($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varPriNombre LIKE '%$textBusqueda%') OR 
								($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varSegNombre LIKE '%$textBusqueda%') OR 
								($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varPriApellido LIKE '%$textBusqueda%') OR 
								($varprestestequi='3' AND $varusuCodBiblioEquipo='$usuCodigo' AND $varSegApellido LIKE '%$textBusqueda%') 
								GROUP BY resumen.$varusuCodigoFEquipo
								
								LIMIT $inicia_desde, $limite
							;");
						if (mysqli_num_rows($selTable)==0){
							 echo "<div id='respuesta' style='color: gray; font-weight: bold; text-align: center;'>	
								 No hay resultados</div>";
							} else{

								while ($datosTabla=mysqli_fetch_assoc($selTable)){
							?>
							<tr>
								<td> <div style="height:25px;"> <small> <?php echo $datosTabla[$varPriNombre].' '.$datosTabla[$varPriApellido];?>
								 <br>
								 <?php echo $datosTabla[$varCarnet]?>

								</small></div></td>

								<td><div style="height:25px;"><img src="img/icons/sendReq.png" width="35" height="30"></div></td>	
			
							</tr>						
														
							
							<?php }
							} 


						//ENDS HERE

						?>
					</tbody>
				</table>
				 <nav aria-label="Page navigation">
                        <ul class='pagination justify-content-center"' id="pagination">
                        <?php if(!empty($total_paginas)):for($i=1; $i<=$total_paginas; $i++):  
                            if($i == $pagina):?>
                                    <li class='page-item active'  id="<?php echo $i;?>"><a class="page-link" href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
                            <?php else:?>
                            <li class='page-item'id="<?php echo $i;?>"><a class="page-link" href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                            <?php endif;?>    
                        <?php endfor;endif;?>
                        </ul>
                 </nav>		

 <script>
                      	
    $("#pagination li").on('click',function(e){
    e.preventDefault();
      $("#solicitudesPendientes").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#solicitudesPendientes").load("pages/operaciones/tablaPendientes.php?pagina="+ paginaNumero +"&busqueda=" + $("#textPendientes").val());
      });
</script>

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				