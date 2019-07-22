<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");

	$delestantecod=$_POST['delestantecod'];
	
	?>			
				<table class="table table-borderless table-sm">
					<thead>
						<tr>
							<th>Codigo Ejemplar</th>
							<th>Titulo</th>

						</tr>
					</thead>

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"
								SELECT t1.$varlibtit as varlibtit ,t2.$varejemcodreg as varejemcodreg FROM $tablaLibros as t1 JOIN $tablaEjemplares as t2 on 
								t2.$varlibcod = t1.$varejemlibcod where t2.$varejemestcod = $delestantecod;");
							while ($dataLibros=mysqli_fetch_assoc($selTable)){
						?>
						<tr>
							<td><?php echo $dataLibros['varejemcodreg'];?> </td>						
							<td><?php echo $dataLibros['varlibtit'];?></td> 
						</tr>
						<?php } ?>
					</tbody>
				</table>

