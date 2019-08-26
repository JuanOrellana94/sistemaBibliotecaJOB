	<?php 
	session_start();
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
      if ($_SESSION['usuNivelNombre']=='Administrador') {
	     	# code...
	  	     $bloqueo="disabled";
	     }else{
	     	$bloqueo="";
	     }   
	$limite = 20;
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=20; 
	};


	if (isset($_GET["busqueda"])) { 
		$textBusqueda  = $_GET["busqueda"]; 
	} else {
		$textBusqueda=""; 
	};

	$sql = "SELECT COUNT($varestcod) 
      FROM $tablaEstante
		
      WHERE 
		$varestcod LIKE '%$textBusqueda%' OR
		$varestdes LIKE '%$textBusqueda%'		
	ORDER BY $varestcod ";  
      $filas_resultado = mysqli_query($conexion, $sql);  
      $filas = mysqli_fetch_row($filas_resultado);  
      $todal_filas = $filas[0];  
      $total_paginas = ceil($todal_filas / $limite); 
  	?>                    
                <nav aria-label="Page navigation">
					<ul class='pagination justify-content-center' id="pagination">
                    	<?php
                		$printEnd=0;
                    	$rangoLeash='4';//TEMP                   	
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
      $("#cargarTabla").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#cargarTabla").load("pages/estantes/tablaEstantes.php?pagina="+ paginaNumero +"&busqueda=" + $("#textBusqueda").val());
      });
</script>

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-bordered table-hover"  style="background-color: #FFFFFF;">
					<thead>
						<tr>
							
							<th>Indicador o nombre del estante</th>
							
	
							
							<th class="aTable">Opciones</th>
						</tr>
					</thead>

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"SELECT * FROM $tablaEstante 
								WHERE 
								$varestcod LIKE '%$textBusqueda%' OR
								$varestdes LIKE '%$textBusqueda%' 								
								ORDER BY $varestcod
								LIMIT $inicia_desde, $limite;");
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
							 La busqueda no devolvió ningún resultado </div>";
						} else{

							while ($dataLibros=mysqli_fetch_assoc($selTable)){
						?>
						<tr>
												
							<td><?php echo $dataLibros[$varestdes];?>  </td>							 
							
							<td> 
								<div class="btn-group" role="group" aria-label="Opciones">
								<button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalEditarEstante"
								 data-varestantecod="<?php echo $dataLibros[$varestcod];?>"
								 data-varestantenom="<?php echo  $dataLibros[$varestdes];?>"								 					 
								 title="Editar Estante">
									<img  src="img/icons/BookEditWide.png" width="35" height="30">
								</button>

								<button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalBorrarEstante"
								 	data-varestantecod="<?php echo $dataLibros[$varestcod];?>"
									data-varestantenom="<?php echo  $dataLibros[$varestdes];?>"
									title="Eliminar Estante">
								 	<img  src="img/icons/BookEditWideDel.png" width="35" height="30">
								 </button>
								</div>
							</td>
						</tr>
						<?php }
						} ?>
					</tbody>
				</table>

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				