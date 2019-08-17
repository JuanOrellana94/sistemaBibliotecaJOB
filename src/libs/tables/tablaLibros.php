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
     if ($_SESSION['usuNivelNombre']=='Administrador') {
	     	# code...
	  	     $bloqueo="disabled";
	     }else{
	     	$bloqueo="";
	     }   

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
		$varautnom LIKE '%$textBusqueda%' OR
		$vareditnom LIKE '%$textBusqueda%' OR
		$vardewtipcla LIKE '%$textBusqueda%' OR
		$vardewtipcla  LIKE '%$textBusqueda%'
	ORDER BY $varlibcod; ";  
      $filas_resultado = mysqli_query($conexion, $sql);  
      $filas = mysqli_fetch_row($filas_resultado);  
      $todal_filas = $filas[0];  
      $total_paginas = ceil($todal_filas / $limite); 
  	?>                    
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
      $("#cargarTablaLibros").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#cargarTablaLibros").load("src/libs/tables/tablaLibros.php?pagina="+ paginaNumero +"&busqueda=" + $("#textBusqueda").val());
      });
</script>

  <?php
 

	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-bordered table-hover"  style="background-color: #FFFFFF;">
					<thead>
						<tr>
							<th>Codigo</th>
							<th> Titulo</th>
							<th>Autor</th>
							<th>Editorial</th>
							<th>Genero</th>
							
							<th class="aTable">Opciones</th>
						</tr>
					</thead>

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"SELECT * FROM $tablaLibros as libro 
								inner join $tablaDewey as dewey on libro.$varlibDew = dewey.$vardewcod 
								inner join $tablaEditoral as edito on libro.$varlibedit = edito.$vareditcod 								
								inner join $tablAutor as aut on libro.$varautcod=aut.$varautcod
								WHERE 
								$varlibtit LIKE '%$textBusqueda%' OR
								$varautnom LIKE '%$textBusqueda%' OR
								$vareditnom LIKE '%$textBusqueda%' OR
								$vardewtipcla LIKE '%$textBusqueda%' OR
								$vardewtipcla  LIKE '%$textBusqueda%'
								ORDER BY libro.$varlibcod
								LIMIT $inicia_desde, $limite;");

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


				
