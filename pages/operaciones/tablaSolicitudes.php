	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");

	$limite = 3;
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

		$sql = "SELECT COUNT(bolsaprestamo.$varusucod) 
      	FROM $varbolsaprestamo as bolsaprestamo 
		inner join $tablaLibros as libro on bolsaprestamo.$varlibcodcar = libro.$varlibcod
		inner join $tablaUsuarios as usuario on bolsaprestamo.$varusucod = usuario.$varUsuCodigo

      WHERE 
		(usuario.$varAccNombre LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1') OR
		(usuario.$varPriNombre LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1') OR
		(usuario.$varSegNombre LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1') OR
		(usuario.$varPriApellido LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1') OR
		(usuario.$varSegApellido LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1') OR
		(usuario.$varCarnet LIKE '%$textBusqueda%'AND bolsaprestamo.$varsolestado='1')

	GROUP BY bolsaprestamo.$varusucod; ";
      $filas_resultado = mysqli_query($conexion, $sql);  
      $filas = mysqli_num_rows($filas_resultado);  
      $todal_filas = $filas;  
      $total_paginas = ceil($todal_filas / $limite); 
  	?>                    
                    

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-info table-hover"  style=" cursor: pointer;">


					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"SELECT SUM($varlibcantidad) as 'cantidad' ,$varPriNombre,$varPriApellido,$varCarnet,$varAccNombre
						      	FROM $varbolsaprestamo as bolsaprestamo 
								inner join $tablaLibros as libro on bolsaprestamo.$varlibcodcar = libro.$varlibcod
								inner join $tablaUsuarios as usuario on bolsaprestamo.$varusucod = usuario.$varUsuCodigo
						      WHERE 
								(usuario.$varAccNombre LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1') OR
								(usuario.$varPriNombre LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1') OR
								(usuario.$varSegNombre LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1') OR
								(usuario.$varPriApellido LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1')  OR
								(usuario.$varSegApellido LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1')  OR
								(usuario.$varCarnet LIKE '%$textBusqueda%' AND bolsaprestamo.$varsolestado='1') 
								GROUP BY bolsaprestamo.$varusucod
								LIMIT $inicia_desde, $limite
								;");
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: gray; font-weight: bold; text-align: center;'>	
							 No hay consultas en este momento</div>";
						} else{

							


							while ($datosTabla=mysqli_fetch_assoc($selTable)){
								if ($datosTabla[$varCarnet]=="" || !empty($datosTabla[$varCarnet])) {
									$userBar=$datosTabla[$varAccNombre];
								}else{
									$userBar=$datosTabla[$varCarnet];
								}

						?>
						<tr id="<?php  echo $userBar; ?>" onclick="cargarSolicitud('<?php  echo $userBar; ?>')">
							<td> <small> <?php echo $datosTabla[$varPriNombre].' '.$datosTabla[$varPriApellido];?> </div>
								<br>
							
							<?php echo $datosTabla[$varCarnet]." - ".$datosTabla['cantidad']." Libro(s)"?>
							</small></td>
							

						</tr>
						
													
						
						<?php }
						} ?>
					</tbody>
				</table>
				<nav aria-label="Page navigation">
					<ul class='pagination  pagination-sm justify-content-center"' id="pagination">
                    	<?php

                    	$printEnd=0;
                    	$rangoLeash='1';//TEMP                   	
                    	if ($pagina<=$rangoLeash+2) {
                    		$rangoInferior='1';
                    	}else{
                    		$rangoInferior= $pagina-$rangoLeash;
                    		?>
                    			<li class='page-item'  id="1"> <a class="page-link" href='pagination.php?page=1'> 1 </a> </li>
                    			<li class='page-item'  > <a class="page-link"> ... </a> </li>    
                    		<?php
                    	}

                    	if ($pagina>=($total_paginas-$rangoLeash)){
                    		$rangoSuperior=$total_paginas;
                    	}else{
                    		$rangoSuperior= $pagina+$rangoLeash;
                    		$printEnd=1;

                    	}  



                    		if(!empty($total_paginas)){
                    			for($i=$rangoInferior; $i<=$rangoSuperior; $i++){ 
									if($i == $pagina){ ?>
										<li class='page-item active'  id="<?php echo $i;?>"> <a class="page-link" href='pagination.php?page=<?php echo $i;?>'>
											<?php echo $i;?></a>
										</li> 
                    			
                            	<?php } else {?>
                            	<li class='page-item'id="<?php echo $i;?>"><a class="page-link" href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                            <?php }?>    
                        <?php }
                    }//Here

                    if ($printEnd==1) {
                    	
                 
                    ?>

                    			<li class='page-item'  > <a class="page-link"> ... </a> </li>
                    			<li class='page-item'  id="<?php echo $total_paginas;?>"> <a class="page-link" href='pagination.php?page=1'> <?php echo $total_paginas;?> </a> </li>
                    			    
                    		<?php
                    }

                    ?>
					</ul>
				 </nav>		

 <script>
                      	
    $("#pagination li").on('click',function(e){
    e.preventDefault();
      $("#solicitudesUsuarios").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#solicitudesUsuarios").load("pages/operaciones/tablaSolicitudes.php?pagina="+ paginaNumero +"&busqueda=" + $("#textSolicitudes").val());
      });
</script>

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				