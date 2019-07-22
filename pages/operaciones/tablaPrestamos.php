	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	session_start();
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

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
		$varlibtags LIKE '%$textBusqueda%' OR
		$vardewtipcla  LIKE '%$textBusqueda%'
	ORDER BY $varlibcod; ";  
      $filas_resultado = mysqli_query($conexion, $sql);  
      $filas = mysqli_fetch_row($filas_resultado);  
      $todal_filas = $filas[0];  
      $total_paginas = ceil($todal_filas / $limite); 
  	?>                    


  <?php
 

	$inicia_desde = ($pagina-1) * $limite;  

	?>		
				
					<table class="table table-responsive"  style="background-color: #FFFFFF; width: 100%">
						<tbody>


							<?php 
								$selTable=mysqli_query($conexion,"SELECT * FROM $tablaLibros as libro
									inner join $tablAutor as autor on libro.$varlibgenaut = autor.$varautcod
									inner join $varbolsaprestamo as carrito on libro.$varlibcod = carrito.$varlibcodcar
									inner join $tablaUsuarios as usuario on usuario.$varUsuCodigo = carrito.$varusucod
									WHERE 
									carrito.$varusucod='$usuCodigo'
									LIMIT $inicia_desde, $limite;");

							if (mysqli_num_rows($selTable)==0){
							 echo "<div class='alert alert-success' role='alert'> No has agregado ningun libro a tu lista </div>";
							} else{
								while ($dataLibros=mysqli_fetch_assoc($selTable)){
							?>
							<tr>
								<td align="center" style="padding: 0px;"><img src="<?php echo $dataLibros[$varlibpor];?>" width="35" height="51">  </td>
								<td>Titulo: <?php echo $dataLibros[$varlibtit];?> <br>
									Autor: <?php echo $dataLibros[$varautnom]." ".$dataLibros[$varautape];?><br>
								</td>

								<td> <?php  if ($dataLibros[$varlibcantidad]>1) {
									echo $dataLibros[$varlibcantidad].'<small> Ejemplares</small>';
								} else if ($dataLibros[$varlibcantidad]=1) {
									echo $dataLibros[$varlibcantidad].'<small> Ejemplar</small>';	
								}


							   ;?> </td>						
								
								<td> 
									<div class="btn-group" role="group" aria-label="Opciones">
									 <button type="button" class="btn btn-light" data-toggle="modal" data-target="#borrarItemModal"
									 data-varsolcod="<?php echo $dataLibros[$varsolcod];?>"
									 title="Remover"									 
									 > <img src="img/icons/itemD.png" width="35" height="35"> </button>
									 
								</td>

							</tr>
							<?php } 
						}?>
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
      $("#tablaPrestar").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#tablaPrestar").load("pages/operaciones/tablaPrestamos.php?pagina="+ paginaNumero);
      });
</script>
			

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				