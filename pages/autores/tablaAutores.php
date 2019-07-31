	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");

	$limite = 5;
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=1; 
	};


	if (isset($_GET["busqueda"])) { 
		$textBusqueda  = $_GET['busqueda']; 
	} else {
		$textBusqueda=""; 
	};
	if (empty($_GET["ordenar"])) { 
		$varordenar=$_GET["ordenar"];
            switch ($varordenar) {
              	case '0':
              		   $textBusquedaorde  = $varautcod." ". "DESC" ;
                break;
                case '1':
                	$textBusquedaorde  = $varautcod." ". "ASC" ;
                break;              	
              }  
		
		 
	} else {
		$textBusquedaorde =$varautcod; 
	};
 
	$sql = "SELECT COUNT($varautcod) 
      FROM $tablAutor		
          WHERE   
         concat_ws('',$varautnom,$varautape)
		 LIKE '%$textBusqueda%' OR
		 concat_ws('',$varautnom,$varautape)
		 LIKE '%$textBusqueda%' OR
		$varautseud LIKE '%$textBusqueda%'
	ORDER BY $textBusquedaorde;";  
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
        $("#cargarTabla").load("pages/autores/tablaAutores.php?pagina="+ paginaNumero +"&busqueda=" + $("#textBusqueda").val() + "&ordenar=" + $("#textBusquedaordenar").val());
      });
</script>

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-bordered table-hover"  style="background-color: #FFFFFF;">
					<thead>
						<tr>
							<th>Codigo</th>
							<th> Nombre del Autor</th>
							<th>Pseudonimo</th>
	
							
							<th class="aTable">Opciones</th>
						</tr>
					</thead>

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"SELECT * FROM $tablAutor 							
								WHERE   
                                   concat_ws('',$varautnom,$varautape) 
	                              LIKE '%$textBusqueda%' OR
		                           concat_ws('',$varautnom,$varautape)
		                          LIKE '%$textBusqueda%' OR
		                          $varautseud LIKE '%$textBusqueda%'
								ORDER BY $textBusquedaorde
								LIMIT $inicia_desde, $limite;");
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
							 La busqueda no devolvió ningún resultado </div>";
						} else{

							while ($dataLibros=mysqli_fetch_assoc($selTable)){
						?>
						<tr>
							<td><?php echo $dataLibros[$varautcod];?> </td>						
							<td><?php echo $dataLibros[$varautnom]." ".$dataLibros[$varautape];?>  </td>
							<td><?php echo $dataLibros[$varautseud];?></td> 
							
							<td> 
								<div class="btn-group" role="group" aria-label="Opciones">
								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalEditarAutor"
								 data-varautcod="<?php echo $dataLibros[$varautcod];?>"
								 data-varautnom="<?php echo  $dataLibros[$varautnom];?>"
								 data-varautape="<?php echo  $dataLibros[$varautape];?>"								
								 data-varautseud="<?php echo $dataLibros[$varautseud];?>"
								 title="Editar Autor">
									<img  src="img/icons/BookEditWide.png" width="35" height="30">
								</button>

								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalBorrarAutor"
								 	data-varautcod="<?php echo $dataLibros[$varautcod];?>"
									data-varautnom="<?php echo  $dataLibros[$varautnom];?>"
									data-varautape="<?php echo  $dataLibros[$varautape];?>"	
									title="Eliminar Autor">
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


				