<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");

	$delcategoriacod=$_POST['delcategoriacod'];
	
	?>			
				<table class="table table-borderless table-sm">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Libro</th>

						</tr>
					</thead>

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"
								SELECT * FROM $tablaLibros
								WHERE $varlibDew='$delcategoriacod'
								ORDER BY $varlibDew LIMIT 5;");
							while ($dataLibros=mysqli_fetch_assoc($selTable)){
						?>
						<tr>
							<td><?php echo $dataLibros[$varlibcod];?> </td>						
							<td><?php echo $dataLibros[$varlibtit];?></td> 
						</tr>
						<?php } ?>
					</tbody>
				</table>

