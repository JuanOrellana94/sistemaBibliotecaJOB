	<?php 
	include("../vars.php");
	include("../sessionControl/conection.php");

	$textBusqueda=$_POST['textBusqueda'];

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
								$vardewtipcla  LIKE '%$textBusqueda%'
								ORDER BY libro.$varlibcod;");
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
								 <button type="button" class="btn btn-light" data-toggle="modal" data-target="#editBookModal"
								 data-varlibcod="<?php echo $dataLibros[$varlibcod];?>"
								 data-varlibtit="<?php echo $dataLibros[$varlibtit];?>"							
								 data-varlibdes="<?php echo $dataLibros[$varlibdes];?>"
								 data-varlibedit="<?php echo $dataLibros[$varlibedit];?>"
								 data-varlibfecedi="<?php echo $dataLibros[$varlibfecedi];?>"
								 data-varlibnumpag="<?php echo $dataLibros[$varlibnumpag];?>"
								 data-varlibisbn="<?php echo $dataLibros[$varlibisbn];?>"
								 data-varlibgenaut="<?php echo $dataLibros[$varlibgenaut];?>"
								 data-vardewcod="<?php echo $dataLibros[$vardewcod];?>"
								 title="Editar Libro"

								 
								 ><img src="img/icons/BookEditWide.png" width="35" height="30"></button>

								 <button type="button" class="btn btn-light" data-toggle="modal" data-target="#deleteBookModal"
								  data-varlibcod="<?php echo $dataLibros[$varlibcod];?>"
								  data-varlibtit="<?php echo $dataLibros[$varlibtit];?>"
								  title="Eliminar Libro"		
								  ><img src="img/icons/BookEditWideDel.png" width="35" height="30"></button>
								</div>
							</td>
						</tr>
						<?php } 
					}?>
					</tbody>
				</table>

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				