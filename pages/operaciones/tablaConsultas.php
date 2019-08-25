	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");

	$limite=20;
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

	$sql = "SELECT COUNT($varlibcod) 
      FROM $tablaLibros as libro 
		inner join $tablaDewey as dewey on libro.$varlibDew = dewey.$vardewcod 
		inner join $tablaEditoral as edito on libro.$varlibedit = edito.$vareditcod 								
		inner join $tablAutor as aut on libro.$varautcod=aut.$varautcod 
      WHERE 
			 $varlibtit LIKE '%$textBusqueda%' OR
			'%$textBusqueda%' LIKE  Concat(Concat('%',$varautnom),'%') OR	
			'%$textBusqueda%' LIKE Concat(Concat('%',$varautape),'%') OR
			'%$textBusqueda%' LIKE  Concat(Concat('%',$varautseud),'%') OR
			'%$textBusqueda%' LIKE Concat(Concat('%',$vareditnom),'%') OR
			'%$textBusqueda%' LIKE  Concat(Concat('%',$vardewtipcla),'%') OR
			'%$textBusqueda%' LIKE Concat(Concat('%',$varlibtags),'%') OR
			'%$textBusqueda%' LIKE  Concat(Concat('%',$vardewtipcla),'%')
	ORDER BY $varlibcod; ";  
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
      $("#cargandoFeedback").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
          $("#cargandoFeedback").html('');
        $("#cargarTabla").load("pages/operaciones/tablaConsultas.php?pagina="+paginaNumero+"&busqueda="+ $("#textBusqueda").val());

  		setTimeout( function() {
      		$("#cargandoFeedback").hide(500);
                           
    	}, 1000);
      });
</script>

  <?php
 

	$inicia_desde = ($pagina-1) * $limite;  

	?>		
				
					<table class="table table-hover"  style="background-color: #FFFFFF;width: 100%">
						<tbody>


							<?php 
								$selTable=mysqli_query($conexion,"SELECT * FROM $tablaLibros as libro 
									inner join $tablaDewey as dewey on libro.$varlibDew = dewey.$vardewcod 
									inner join $tablaEditoral as edito on libro.$varlibedit = edito.$vareditcod 								
									inner join $tablAutor as aut on libro.$varautcod=aut.$varautcod
									WHERE 
									 $varlibtit LIKE '%$textBusqueda%' OR
									'%$textBusqueda%' LIKE  Concat(Concat('%',$varautnom),'%') OR	
									'%$textBusqueda%' LIKE Concat(Concat('%',$varautape),'%') OR
									'%$textBusqueda%' LIKE  Concat(Concat('%',$varautseud),'%') OR
									'%$textBusqueda%' LIKE Concat(Concat('%',$vareditnom),'%') OR
									'%$textBusqueda%' LIKE  Concat(Concat('%',$vardewtipcla),'%') OR
									'%$textBusqueda%' LIKE Concat(Concat('%',$varlibtags),'%') OR
									'%$textBusqueda%' LIKE  Concat(Concat('%',$vardewtipcla),'%')
									ORDER BY libro.$varlibcod
									LIMIT $inicia_desde, $limite;");

							if (mysqli_num_rows($selTable)==0){
							 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
								 La busqueda no devolvió ningún resultado </div>";
							} else{
								while ($dataLibros=mysqli_fetch_assoc($selTable)){
							?>
							<tr>
								<td align="center" style="padding: 0px;"><img src="<?php echo $dataLibros[$varlibpor];?>" width="120" height="160">  </td>
								<td>Titulo: <?php echo $dataLibros[$varlibtit];?> <br>
									Autor: <?php echo $dataLibros[$varautnom]." ".$dataLibros[$varautape];?><br>
									Editorial: <?php echo $dataLibros[$vareditnom];?> 
								</td> 					
								<td>Numero de paginas:<br>
									<?php echo $dataLibros[$varlibnumpag];?>

								</td>
								<td>Etiquetas:<br>
									<?php echo $dataLibros[$varlibtags];?>
										
								</td>
								
								<td> 
									<div class="btn-group" role="group" aria-label="Opciones">
									 <button type="button" class="btn btn-light" data-toggle="modal" data-target="#prestamosModal"
									 data-varlibcod="<?php echo $dataLibros[$varlibcod];?>"
									 data-varlibtit="<?php echo $dataLibros[$varlibtit];?>"
									 data-varlibpor="<?php echo $dataLibros[$varlibpor];?>"	
									 data-varlibaut="<?php echo $dataLibros[$varautnom]." ".$dataLibros[$varautape];?>"							
									 title="Prestar"

									 
									 ><img src="img/icons/itemPr.png" width="65" height="50"></button>

									 <button type="button" class="btn btn-light"   data-toggle="modal" data-target="#modalVerInformacion"	
								      data-varlibcod="<?php echo $dataLibros[$varlibcod];?>"
									  data-varlibtit="<?php echo $dataLibros[$varlibtit];?>"
									  data-varlibpor="<?php echo $dataLibros[$varlibpor];?>"
									  data-varlibdes="<?php echo $dataLibros[$varlibdes];?>"	 
								      title="Ver Informacion">
									<img  src="img/icons/pregunta.png" width="35" height="30">

								</button>
									</div>
									 
								</td>
							</tr>
							<?php } 
						}?>
						</tbody>
					</table>
				
			

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				