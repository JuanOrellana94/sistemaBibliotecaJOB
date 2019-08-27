	<?php
	session_start(); 
	include("../vars.php");
	include("../sessionControl/conection.php");
	$limite = 20;

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

     if ($_SESSION['usuNivelNombre']=='Administrador') {
	     	# code...
	  	     $bloqueo="disabled";
	     }else{
	     	$bloqueo="";
	     }
	     //NEW UPDATE
	     //EXISTE ORDER SI NO DEFAULT ORDENAR POR CODIGO LIBRO
	if (isset($_GET["order"])) { 
		if ($_GET["order"]=='cod') {
			$orderCod  = " ORDER BY $varlibcod "; 	
		} else if ($_GET["order"]=='titu') {
			$orderCod  = " ORDER BY $varlibtit "; 	
		} if ($_GET["order"]=='aut') {
			$orderCod  = " ORDER BY $varautnom "; 	
		} if ($_GET["order"]=='edi') {
			$orderCod  = " ORDER BY $vareditnom "; 	
		} if ($_GET["order"]=='gen') {
			$orderCod  = " ORDER BY $vardewtipcla "; 	
		} 
		
	} else {
		//DEFAULT
	 $orderCod="ORDER BY $varlibcod"; 
	};
	//END

	$sql = "SELECT COUNT($varlibcod) 
      FROM $tablaLibros as libro 
		inner join $tablaDewey as dewey on libro.$varlibDew = dewey.$vardewcod 
		inner join $tablaEditoral as edito on libro.$varlibedit = edito.$vareditcod 								
		inner join $tablAutor as aut on libro.$varautcod=aut.$varautcod 
      WHERE 
		$varlibtit LIKE '%$textBusqueda%' OR
		$varautnom LIKE '%$textBusqueda%' OR
		$vareditnom LIKE '%$textBusqueda%' OR
		$vardewtipcla LIKE '%$textBusqueda%'
	 ";  
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
      $("#cargarTablaLibros").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#cargarTablaLibros").load("src/libs/tables/tablaLibros.php?pagina="+ paginaNumero +"&busqueda=" + $("#textBusqueda").val());
      });


    function colorder(x){
    	var orderby = x
    	var paginaNumero=$("#paginaColumn").val();
    	//FUNCION PARA RECARGAR CON EL NUEVO ORDENAMIENTO
    	 $("#cargarTablaLibros").load('src/libs/tables/tablaLibros.php?pagina=<?php echo $pagina; ?>&order='+orderby+'&busqueda=' + $("#textBusqueda").val());
    }


</script>

  <?php
 

	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-bordered table-hover"  style="background-color: #FFFFFF;">
					<thead>
						<tr style=" cursor: pointer;">
								<?php
							     //EXISTE ORDER SI NO DEFAULT ORDENAR POR CODIGO LIBRO
								if (isset($_GET["order"])) { 
									if ($_GET["order"]=='cod') {
										?>
										<th class="bg-primary text-white"	onclick="colorder('cod')">Codigo ISBN</th>
										<th 	onclick="colorder('titu')"> Titulo</th>
										<th 	onclick="colorder('aut')">Autor</th>
										<th 	onclick="colorder('edi')">Editorial</th>
										<th 	onclick="colorder('gen')">Genero</th>										
										<th class="aTable">Opciones</th>

										<?php	
									} else if ($_GET["order"]=='titu') {
										?>
										<th 	onclick="colorder('cod')">Codigo ISBN</th>
										<th class="bg-primary text-white"	onclick="colorder('titu')"> Titulo</th>
										<th 	onclick="colorder('aut')">Autor</th>
										<th 	onclick="colorder('edi')">Editorial</th>
										<th 	onclick="colorder('gen')">Genero</th>										
										<th class="aTable">Opciones</th>

										<?php 	
									} if ($_GET["order"]=='aut') {
										?>
										<th 	onclick="colorder('cod')">Codigo ISBN</th>
										<th onclick="colorder('titu')"> Titulo</th>
										<th class="bg-primary text-white"		onclick="colorder('aut')">Autor</th>
										<th 	onclick="colorder('edi')">Editorial</th>
										<th 	onclick="colorder('gen')">Genero</th>										
										<th class="aTable">Opciones</th>

										<?php 	
									} if ($_GET["order"]=='edi') {
										?>
										<th 	onclick="colorder('cod')">Codigo ISBN</th>
										<th onclick="colorder('titu')"> Titulo</th>
										<th onclick="colorder('aut')">Autor</th>
										<th class="bg-primary text-white"	onclick="colorder('edi')">Editorial</th>
										<th 	onclick="colorder('gen')">Genero</th>										
										<th class="aTable">Opciones</th>

										<?php 	 	
									} if ($_GET["order"]=='gen') {
										?>
										<th 	onclick="colorder('cod')">Codigo ISBN</th>
										<th onclick="colorder('titu')"> Titulo</th>
										<th onclick="colorder('aut')">Autor</th>
										<th onclick="colorder('edi')">Editorial</th>
										<th class="bg-primary text-white"	onclick="colorder('gen')">Genero</th>										
										<th class="aTable">Opciones</th>

										<?php 
									} 
									
								} else {
									//DEFAULT
								 	?>  <th onclick="colorder('cod')">Codigo ISBN</th>
										
										<th onclick="colorder('titu')"> Titulo</th>
										<th onclick="colorder('aut')">Autor</th>
										<th onclick="colorder('edi')">Editorial</th>
										<th onclick="colorder('gen')">Genero</th>										
										<th class="aTable">Opciones</th>

										<?php 
								};

							?>

							

							
						
						</tr>
					</thead>

					<tbody>


						<?php
							$sql="SELECT * FROM $tablaLibros as libro 
								inner join $tablaDewey as dewey on libro.$varlibDew = dewey.$vardewcod 
								inner join $tablaEditoral as edito on libro.$varlibedit = edito.$vareditcod 								
								inner join $tablAutor as aut on libro.$varautcod=aut.$varautcod
								WHERE 
								$varlibtit LIKE '%$textBusqueda%' OR
								$varautnom LIKE '%$textBusqueda%' OR
								$vareditnom LIKE '%$textBusqueda%' OR
								$vardewtipcla LIKE '%$textBusqueda%'
								
								";

							//CONCATENAR OCN EL TIPO DE ORDENAMIENTO Y LIMITAR PARA PAGINADO
							$sql .= $orderCod." LIMIT $inicia_desde, $limite;";
							
							$selTable=mysqli_query($conexion,$sql);
							echo $sql;

						if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
							 La busqueda no devolvió ningún resultado </div>";
						} else{
							while ($dataLibros=mysqli_fetch_assoc($selTable)){
						?>
						<tr>
							<td><?php echo $dataLibros[$varlibisbn];?> </td>
							<td><?php echo $dataLibros[$varlibtit];?>  </td> 						
							<td><?php echo $dataLibros[$varautnom]." ".$dataLibros[$varautape];?>  </td>
							<td><?php echo $dataLibros[$vareditnom];	?></td> 
							<td><?php echo $dataLibros[$vardewcodcla]." ".$dataLibros[$vardewtipcla];	?></td>
							
							<td> 
								<div class="btn-group" role="group" aria-label="Opciones">
								 <button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#editBookModal"
								 data-varlibcod="<?php echo $dataLibros[$varlibcod];?>"
								 data-varlibtit="<?php echo $dataLibros[$varlibtit];?>"							
								 data-varlibdes="<?php echo $dataLibros[$varlibdes];?>"
								 data-varlibedit="<?php echo $dataLibros[$varlibedit];?>"
								 data-varlibfecedi="<?php echo $dataLibros[$varlibfecedi];?>"
								 data-varlibnumpag="<?php echo $dataLibros[$varlibnumpag];?>"
								 data-varlibisbn="<?php echo $dataLibros[$varlibisbn];?>"
								 data-varlibgenaut="<?php echo $dataLibros[$varlibgenaut];?>"
								 data-vardewcod="<?php echo $dataLibros[$vardewcod];?>"
								 data-varlibtags="<?php echo $dataLibros[$varlibtags];?>"
								 title="Editar Libro"								 
								 ><img src="img/icons/BookEditWide.png" width="35" height="30"></button>

								  <button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#fotografiaModal"
								  data-varlibcod="<?php echo $dataLibros[$varlibcod];?>"
								  data-varlibtit="<?php echo $dataLibros[$varlibtit];?>"
								  data-varlibpor="<?php echo $dataLibros[$varlibpor];?>"
								  title="Portada del Libro"		
								  ><img src="img/icons/BookCover.png" width="35" height="30"></button>
								 <button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#deleteBookModal"
								  data-varlibcod="<?php echo $dataLibros[$varlibcod];?>"
								  data-varlibtit="<?php echo $dataLibros[$varlibtit];?>"

								  title="Eliminar Libro"		
								  ><img src="img/icons/BookEditWideDel.png" width="35" height="30"></button>
                                 <a href="catalogos.php?pageLocation=ejemplares&codigoLib=<?php echo $dataLibros[$varlibcod];?>" title="ver ejemplares"><img src="img/icons/detalle.png" align="center" width="40" height="35"></a>
								  
								</div>
							</td>
						</tr>
						<?php } 
					}?>
					</tbody>
				</table>

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				
