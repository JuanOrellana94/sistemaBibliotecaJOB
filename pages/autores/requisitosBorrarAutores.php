<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");

	$delautcod=$_POST['delautcod'];
	?>			
				<table class="table table-borderless table-sm">
					<thead>
						<tr>
							<th>Codigo</th>
							<th> Libro</th>

						</tr>
					</thead>

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"
								SELECT * FROM $tablaLibros
								WHERE $varlibedit='$delautcod'
								ORDER BY $varlibcod;");
							while ($dataLibros=mysqli_fetch_assoc($selTable)){
						?>
						<tr>
							<td><?php echo $dataLibros[$varlibisbn];?> </td>						
							<td><?php echo $dataLibros[$varlibtit];?></td> 
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				