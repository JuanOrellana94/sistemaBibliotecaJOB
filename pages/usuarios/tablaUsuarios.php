	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");

	$limite = 5;
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=20; 
	};


	if (isset($_GET["busqueda"])) { 
		$textBusqueda  = $_GET["busqueda"]; 
	} else {
		$textBusqueda=""; 
	};

	$sql = "SELECT COUNT($varUsuCodigo) 
      FROM $tablaUsuarios
		
      WHERE 
		$varUsuCodigo LIKE '%$textBusqueda%' OR
		$varAccNombre LIKE '%$textBusqueda%'	OR
		$varCorreo LIKE '%$textBusqueda%'	
	ORDER BY $varUsuCodigo ";  
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
        $("#cargarTabla").load("pages/usuarios/tablaUsuarios.php?pagina="+ paginaNumero +"&busqueda=" + $("#textBusqueda").val());
      });
</script>

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-bordered table-hover"  style="background-color: #FFFFFF;">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Carnet</th>
	                        <th>Correo</th>
	                        <th>Estado de Cuenta</th>   
							<th>Usuario</th>
							<th>Año</th>
							<th>Seccion</th>
							<th>Bachillerato</th>
							<th>Nivel</th>
							<th class="aTable">Opciones</th>
						</tr>
					</thead>

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"SELECT * FROM $tablaUsuarios 
								WHERE 
                                $varUsuCodigo LIKE '%$textBusqueda%' OR
		                        $varAccNombre LIKE '%$textBusqueda%'	OR
		                           $varCorreo LIKE '%$textBusqueda%' 								
								ORDER BY $varUsuCodigo
								LIMIT $inicia_desde, $limite;");
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
							 La busqueda no devolvió ningún resultado </div>";
						} else{

							while ($dataLibros=mysqli_fetch_assoc($selTable)){
						?>
						<?php
                                 // Nivel del Usuario 
                                  $Nivel=""; 
						           switch ($dataLibros[$varNivel]) {
                                           case 0:
                                               $Nivel="ADMINISTRADOR";
                                           break;
                                           case 1:
                                                $Nivel="BIBLIOTECARIO";
                                           break;
                                           case 2:
                                               $Nivel="PERSONAL ADMINISTRATIVO";
                                           break;
                                           case 3:
                                               $Nivel="ESTUDIANTE";
                                           break;                                           
                                      } 
                                      // Estado de la cuenta
                                  $Estado=""; 
						           switch ($dataLibros[$varCueEstatus]) {
                                           case 0:
                                               $Estado="ACTIVA";
                                           break;
                                           case 1:
                                                $Estado="INACTIVA";
                                           break;
                                           case 2:
                                               $Estado="SUSPENDIDA";
                                           break;                                                                                   
                                      } 


                                      $ANIO=""; 
						           switch ($dataLibros[$varAnoBachi]) {
                                           case 0:
                                               $ANIO="PRIMER AÑO";
                                           break;
                                           case 1:
                                                $ANIO="SEGUNDO AÑO";
                                           break;
                                           case 2:
                                               $ANIO="TERCER AÑO";
                                           break;
                                                                                   
                                      } 

                                      $BACHI=""; 
						           switch ($dataLibros[$varTipBachi]) {
                                           case 0:
                                               $BACHI="SALUD";
                                           break;
                                           case 1:
                                                $BACHI="MECANICA";
                                           break;
                                           case 2:
                                               $BACHI="CONTADURIA";
                                           break;                                                                                    
                                      } 

                                      $SECCION=""; 
						           switch ($dataLibros[$varSecAula]) {
                                           case 0:
                                               $SECCION="SECCION A";
                                           break;
                                           case 1:
                                               $SECCION="SECCION B";
                                           break;
                                           case 2:
                                               $SECCION="SECCION C";
                                           break;
                                           case 3:
                                               $SECCION="SECCION D";
                                           break;                                           
                                      } 

						 ?>
						<tr>
							<td><?php echo $dataLibros[$varUsuCodigo];?> </td>						
							<td><?php echo $dataLibros[$varPriNombre]." ". $dataLibros[$varSegNombre];?>  </td>
							<td><?php echo $dataLibros[$varPriApellido]." ".$dataLibros[$varSegApellido]; ?></td>							 
							<td><?php echo $dataLibros[$varCarnet]; ?></td>
							<td><?php echo $dataLibros[$varCorreo]; ?></td>
							<td><?php echo $Estado; ?></td>
							<td><?php echo $dataLibros[$varAccNombre]; ?></td>
							<td><?php echo $ANIO; ?></td>
							<td><?php echo $SECCION; ?></td>
							<td><?php echo $BACHI; ?></td>
							<td><?php echo $Nivel; ?></td>
							
							<td> 
								<div class="btn-group" role="group" aria-label="Opciones">
								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalEditarUsuario"
								 data-varusuariocod="<?php echo $dataLibros[$varUsuCodigo];?>"
								 data-varusuarionom1="<?php echo  $dataLibros[$varPriNombre];?>"
								 data-varusuarionom2="<?php echo $dataLibros[$varSegNombre];?>"
								 data-varusuarioape1="<?php echo  $dataLibros[$varPriApellido];?>"
								 data-varusuarioape2="<?php echo $dataLibros[$varSegApellido];?>"
								 data-varusuariocarnet="<?php echo  $dataLibros[$varCarnet];?>"
								 data-varusuariocorreo="<?php echo $dataLibros[$varCorreo];?>"
								 data-varusuariomote="<?php echo  $dataLibros[$varAccNombre];?>"
								 data-varusuarioaniobachi="<?php echo $dataLibros[$varAnoBachi];?>"
								 data-varusuarioaula="<?php echo  $dataLibros[$varSecAula];?>"
								 data-varusuariobachi="<?php echo $dataLibros[$varTipBachi];?>"
								 data-varusuarionivel="<?php echo $dataLibros[$varNivel];?>"
								 data-varusuarioestado="<?php echo $dataLibros[$varCueEstatus];?>"
								 title="Editar Usuario">
									<img  src="img/icons/usuarioEditar.png" width="35" height="30">
								</button>
                     <!-- Opcion de eliminar -->
							<!-- 	<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalBorrarEstante"
								 	data-varusuariocod="<?php echo $dataLibros[$varUsuCodigo];?>"
									data-varusuariocod="<?php echo  $dataLibros[$varPriNombre];?>"
									title="Eliminar Usuario">
								 	<img  src="img/icons/BookEditWideDel.png" width="35" height="30">
								 </button> -->

								<?php if ($Estado=='ACTIVA') {
									# code...									
								 ?>
								 <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalusuariodesACTIVAr"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="Desactivar cuenta">
								 	<img  src="img/icons/usuarioDesACTIVAr.png" width="35" height="30">
								 </button>
								 <!-- OPCION DE SUSPENDER / REANUDAR EN PROCESO -->
<!-- 								 <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalusuariosuspender"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="Suspender Cuenta">
								 	<img  src="img/icons/usuarioSuspender.png" width="35" height="30">
								 </button> -->
								 <?php 
                                    }elseif ($Estado=='INACTIVA') {
                                    	# code...                                   	
                                     
								  ?>
								  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalusuarioACTIVAr"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="activar cuenta">
								 	<img  src="img/icons/usuarioACTIVAr.png" width="35" height="30">
								 </button>
								 <!-- <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalusuariosuspender"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="Suspender Cuenta">
								 	<img  src="img/icons/usuarioSuspender.png" width="35" height="30">
								 </button> -->
								 <?php 
								     }else{
 								  ?>
                                  <!-- <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalusuarioareanudar"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="Reanudar">
								 	<img  src="img/icons/usuarioReanudar.png" width="35" height="30">
								 </button> -->								 
							<?php
							
                                 }
							 ?>	
								</div>
							</td>
						</tr>
						<?php }
						} ?>
					</tbody>
				</table>

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				