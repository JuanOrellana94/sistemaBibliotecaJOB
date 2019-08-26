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
	$restriccion="";
      if ($_SESSION['usuNivelNombre']=='Administrador') {
	     	# code...
	  	    if (empty($_GET["ordenar"])) { 
		          $varordenar=$_GET["ordenar"];
              switch ($varordenar) {              
                 case '3':
                	    $restriccion="$varNivel='1' OR $varNivel='4'";
                 break;
                 case '4':
                	    $restriccion="$varNivel='4'";
                 break;
                 case '5':
                	    $restriccion="$varNivel='1'";
                 break;                             	
              }  
		
		 
	      } else {
	      	    $varordenar=$_GET["ordenar"];
	          	switch ($varordenar) {
              	 case '3':
                	    $restriccion="$varNivel='1' OR $varNivel='4'";
                 break;
                 case '4':
                	    $restriccion="$varNivel='4'";
                 break;
                 case '5':
                	    $restriccion="$varNivel='1'";
                 break;                               	
              } 
	      }
	     }else{
	     	 
             if (empty($_GET["ordenar"])) { 
		          $varordenar=$_GET["ordenar"];
              switch ($varordenar) {
              	case '0':
              		    $restriccion="$varNivel='2' OR $varNivel='3' ";
                break;
                case '1':
                	    $restriccion="$varNivel='2'"; 
                break;
                 case '2':
                	    $restriccion="$varNivel='3'";
                 break;
              }  
		
		 
	      } else {
	      	    $varordenar=$_GET["ordenar"];
	          	switch ($varordenar) {
              	case '0':
              		    $restriccion="$varNivel='2' OR $varNivel='3' ";
                break;
                case '1':
                	    $restriccion="$varNivel='2'"; 
                break;
                 case '2':
                	    $restriccion="$varNivel='3'";
                 break;                                             	
              } 
	      }

	     }

	$limite = 8;
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
		
      WHERE $restriccion AND (
		$varUsuCodigo LIKE '%$textBusqueda%' OR
		$varAccNombre LIKE '%$textBusqueda%'	OR
		$varCorreo LIKE '%$textBusqueda%' OR
		$varusucodbar LIKE '%$textBusqueda%' OR
		'%$textBusqueda%' LIKE Concat(Concat('%',$varPriNombre),'%') OR
		'%$textBusqueda%' LIKE  Concat(Concat('%',$varSegNombre),'%') OR
		'%$textBusqueda%' LIKE  Concat(Concat('%',$varPriApellido),'%') OR
		'%$textBusqueda%' LIKE  Concat(Concat('%',$varSegApellido),'%')
		)
	ORDER BY $varUsuCodigo DESC";  
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
      $("#cargarTabla").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#cargarTabla").load("pages/usuarios/tablaUsuarios.php?pagina="+ paginaNumero +"&busqueda=" + $("#textBusqueda").val() +"&ordenar="+$("#textBusquedaordenar").val());
      });
</script>

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-bordered table-hover"  style="background-color: #FFFFFF;">
					<thead>
						<tr>
							<th>Nombres</th>
							<th>Apellidos</th>							                    
							<th>Usuario</th>
							<?php if ($varordenar==2) {
							 ?>							
							<th>Año</th>
							<th>Seccion</th>
							<th>Bachillerato</th>
						   <?php } ?>
							<th>Nivel</th>
							<th>Cuenta</th> 
							<th class="aTable">Opciones</th>
						</tr>
					</thead>

					<tbody>


						<?php 
							$selTable=mysqli_query($conexion,"SELECT * FROM $tablaUsuarios 
								WHERE  $restriccion AND (
                                $varUsuCodigo LIKE '%$textBusqueda%' OR
		                        $varAccNombre LIKE '%$textBusqueda%'	OR
		                        $varCorreo LIKE '%$textBusqueda%' OR
		                        $varusucodbar LIKE '%$textBusqueda%' OR	                      
								'%$textBusqueda%' LIKE Concat(Concat('%',$varPriNombre),'%') OR
								'%$textBusqueda%' LIKE  Concat(Concat('%',$varSegNombre),'%') OR
								'%$textBusqueda%' LIKE  Concat(Concat('%',$varPriApellido),'%') OR
								'%$textBusqueda%' LIKE  Concat(Concat('%',$varSegApellido),'%') )		
								ORDER BY $varUsuCodigo DESC
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
                                  $barra="disabled";
						           switch ($dataLibros[$varNivel]) {
                                           case '0':
                                               $Nivel="ADMINISTRADOR";
                                           break;
                                           case '1':
                                                $Nivel="BIBLIOTECARIO";
                                           break;
                                           case '2':
                                               $Nivel="PERSONAL ADMINISTRATIVO";
                                           break;
                                           case '3':
                                               $Nivel="ESTUDIANTE";
                                               $barra="";
                                           break;
                                           case '4':
                                               $Nivel="AUXILIAR";

                                           break;
                                           default:
                                                $Nivel=" ";
                                           break;                                           
                                      } 
                                      // Estado de la cuenta
                                  $Estado=""; 
						           switch ($dataLibros[$varCueEstatus]) {
                                           case '0':
                                               $Estado="ACTIVA";
                                               $color="green";
                                           break;
                                           case '1':
                                                $Estado="INACTIVA";
                                                $color="orange";
                                           break;
                                           case '2':
                                               $Estado="SUSPENDIDA";
                                               $color="Red";
                                           break; 
                                           case '3':
                                               $Estado="CON PRESTAMO";
                                               $color="purple";
                                           break;                                                                                  
                                      } 


                                      $ANIO=""; 
						           switch ($dataLibros[$varAnoBachi]) {
                                           case '0':
                                               $ANIO="PRIMER AÑO";
                                           break;
                                           case '1':
                                                $ANIO="SEGUNDO AÑO";
                                           break;
                                           case '2':
                                               $ANIO="TERCER AÑO";
                                           break;
                                           default:
                                                $ANIO=" ";
                                           break;
                                                                                   
                                      } 

                                      $BACHI=""; 
						           switch ($dataLibros[$varTipBachi]) {
                                           case '0':
                                               $BACHI="SALUD";
                                           break;
                                           case '1':
                                                $BACHI="MECANICA";
                                           break;
                                           case '2':
                                               $BACHI="CONTADURIA";
                                           break;
                                           default:
                                                $BACHI=" ";
                                           break;                                                                                    
                                      } 

                                      $SECCION=""; 
						           switch ($dataLibros[$varSecAula]) {
                                           case '0':
                                               $SECCION="SECCION A";
                                           break;
                                           case '1':
                                               $SECCION="SECCION B";
                                           break;
                                           case '2':
                                               $SECCION="SECCION C";
                                           break;
                                           case '3':
                                               $SECCION="SECCION D";
                                           break;
                                           default:
                                                $SECCION=" ";
                                           break;                                           
                                      } 

						 ?>
						<tr>
											
							<td><?php echo $dataLibros[$varPriNombre]." ". $dataLibros[$varSegNombre];?>  </td>
							<td><?php echo $dataLibros[$varPriApellido]." ".$dataLibros[$varSegApellido]; ?></td>					
							<td><?php echo $dataLibros[$varAccNombre]; ?></td>
                              <?php if ($dataLibros[$varNivel]==3) {
							 ?>								
							<td><?php echo $ANIO; ?></td>
							<td><?php echo $SECCION; ?></td>
							<td><?php echo $BACHI; ?></td>
						    <?php } ?>
							<td><?php echo $Nivel; ?></td>
							<td><p style="color:<?php echo $color; ?>"><?php echo $Estado; ?></p></td>
							
							<td> 
								<div class="btn-group" role="group" aria-label="Opciones">
								<button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalEditarUsuario"
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
								<!-- opcion para generar codigo de barras -->
								 
                     <!-- Opcion de eliminar -->
							<!-- 	<button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalBorrarEstante"
								 	data-varusuariocod="<?php echo $dataLibros[$varUsuCodigo];?>"
									data-varusuariocod="<?php echo  $dataLibros[$varPriNombre];?>"
									title="Eliminar Usuario">
								 	<img  src="img/icons/BookEditWideDel.png" width="35" height="30">
								 </button> -->

								<?php if ($Estado=='ACTIVA') {
									# code...									
								 ?>
								 <button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalusuariodesactivar"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="Desactivar cuenta">
								 	<img  src="img/icons/usuarioDesactivar.png" width="35" height="30">
								 </button>
								 <!-- OPCION DE SUSPENDER / REANUDAR EN PROCESO -->
<!-- 								 <button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalusuariosuspender"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="Suspender Cuenta">
								 	<img  src="img/icons/usuarioSuspender.png" width="35" height="30">
								 </button> -->
								 <?php 
                                    }elseif ($Estado=='INACTIVA') {
                                    	# code...                                   	
                                     
								  ?>
								  <button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalusuarioactivar"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="activar cuenta">
								 	<img  src="img/icons/usuarioActivar.png" width="35" height="30">
								 </button>


								 <!-- <button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalusuariosuspender"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="Suspender Cuenta">
								 	<img  src="img/icons/usuarioSuspender.png" width="35" height="30">
								 </button> -->
								 <?php 
								     }else{
 								  ?>
                                  <!-- <button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" data-target="#modalusuarioareanudar"
								 	data-varusuariomodificarcodigo="<?php echo $dataLibros[$varUsuCodigo];?>"	
									title="Reanudar">
								 	<img  src="img/icons/usuarioReanudar.png" width="35" height="30">
								 </button> -->								 
							<?php
							
                                 }
							 ?>	
							     <button type="button" class="btn btn-light"   data-toggle="modal" <?php echo $barra ?> data-target="#modalBarraUsuario"
							        	data-varusuariomote="<?php echo $dataLibros[$varAccNombre];?>"
							        	data-varusuariocod="<?php echo $dataLibros[$varUsuCodigo];?>"	
								        data-varusuariocarnet="<?php echo  $dataLibros[$varCarnet];?>"								     
								      title="Ver Codigo de barra">
									<img  src="img/icons/barras.png" width="35" height="30">

								</button>
							     <!-- <?php echo "<a href=\"vercbusuario.php?codusu=" . $dataLibros[$varUsuCodigo]. "\">CB</a>"; ?> -->
							     
								</div>

							</td>
						</tr>
						<?php }
						} ?>
					</tbody>
				</table>

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				