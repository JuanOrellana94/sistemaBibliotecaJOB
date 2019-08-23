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

	$limite = 5;
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=5; 
	};


	if (isset($_GET["busqueda"])) { 
		$textBusqueda  = $_GET["busqueda"]; 
	} else {
		$textBusqueda=""; 
	};

	$sql = "SELECT COUNT($varequicod) 
      FROM $tablaEquipo
		
      WHERE 
		$varequicodifi LIKE '%$textBusqueda%' OR
		$varequitip LIKE '%$textBusqueda%'
	ORDER BY $varequicod ";  
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
      $("#cargarTabla").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#cargarTabla").load("pages/equipo/tablaEquipo.php?pagina="+ paginaNumero +"&busqueda=" + $("#textBusqueda").val());
      });
</script>

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-bordered table-hover"  style="background-color: #FFFFFF;">
					<thead>
						<tr>
							<th>Codigo Equipo</th>
							<th>Tipo</th>
							<th>Descripcion</th>
							
	
							
							<th class="aTable">Opciones</th>
						</tr>
					</thead>

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"SELECT * FROM $tablaEquipo 
								WHERE 
							$varequicodifi LIKE '%$textBusqueda%' OR
		                    $varequitip LIKE '%$textBusqueda%'
								ORDER BY $varequicod
								LIMIT $inicia_desde, $limite;");
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
							 La busqueda no devolvió ningún resultado </div>";
						} else{

							while ($dataLibros=mysqli_fetch_assoc($selTable)){
						?>
						<tr>
							<td><?php echo $dataLibros[$varequicodifi];?> </td>
							<td><?php echo $dataLibros[$varequitip];?> </td>						
							<td><?php echo $dataLibros[$varequides];?>  </td>							 
							
							<td> 
								<div class="btn-group" role="group" aria-label="Opciones">
								<button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalEditarequipo"
								 data-varequicod="<?php echo $dataLibros[$varequicod];?>"
								 data-varequicodifi="<?php echo $dataLibros[$varequicodifi];?>"
								 data-varequitip="<?php echo  $dataLibros[$varequitip];?>"	
								 data-varequides="<?php echo $dataLibros[$varequides];?>"							 					 
								 title="Editar equipo">
									<img  src="img/icons/BookEditWide.png" width="35" height="30">
								</button>

								<button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#imagenModal"
								  data-varequicod="<?php echo $dataLibros[$varequicod];?>"
								  data-varequimg="<?php echo $dataLibros[$varequimg];?> "
								  data-varequitip="<?php echo  $dataLibros[$varequitip];?>"									  
								  title="Portada del Libro"		
								  ><img src="img/icons/BookCover.png" width="35" height="30"></button>

								 <a href="catalogos.php?pageLocation=existencias&equipoCod=<?php echo $dataLibros[$varequicod];?>" title="ver equipos"><img src="img/icons/ver-detalles.png" width="40" height="35"></a> 

								<!-- <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalBorrarequipo"
								 	data-varequicod="<?php echo $dataLibros[$varequicod];?>"
								    data-varequicodifi="<?php echo $dataLibros[$varequicodifi];?>"
								    data-varequitip="<?php echo  $dataLibros[$varequitip];?>"	
								    data-varequides="<?php echo $dataLibros[$varequides];?>"
									title="Eliminar equipo">
								 	<img  src="img/icons/BookEditWideDel.png" width="35" height="30">
								 </button> -->
								</div>
							</td>
						</tr>
						<?php }
						} ?>
					</tbody>
				</table>

				


				