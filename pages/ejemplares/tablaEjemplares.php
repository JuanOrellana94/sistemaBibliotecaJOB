	<?php 
	session_start();
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php"); 
  //validacion por nivel de usuaruio
	  $bloqueo=""; 
	  if ($_SESSION['usuNivelNombre']=='Administrador') {
	     	# code...
	  	     $bloqueo="disabled";
	     }else{
	     	$bloqueo="";
	     }
	 
	 $bloqueo2="";
	 $bloqueo3="style='display: none;'";
	 $bloqueo4="style='display: none;'";
	 $bloqueo5="style='display: none;'";
		$varordenar=$_GET["ordenar"];
            switch ($varordenar) {
              	case '0':
              		   $textBusquedaorde = '0';
                break;
                case '1':
                	   $textBusquedaorde  = '1';
                	   $bloqueo2="style='display: none;'";
                	   $bloqueo3="style='display: true;'";
                break;
                case '2':
                	   $textBusquedaorde  = '2';
                	   $bloqueo="disabled";
                	   $bloqueo2="style='display: none;'";
                	   $bloqueo4="style='display: true;'";
                break;
                case '3':
                	   $textBusquedaorde  = '3';
                	   $bloqueo="disabled";
                	   $bloqueo2=" style='display: none;' "; 
                	   $bloqueo5="style='display: true;'";               	   
                break;              	
              }  		
		 

	  	    
    ?>
    
    <?php  
	$limite = 6;
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=20; 
	};


	if (isset($_GET["busqueda"])) { 
		$textBusqueda  = $_GET["busqueda"]; 
	} else {
		$textBusqueda=""; 
	}
	
	$CodigoLibPrincipal=$_GET["codigoLib"]; 	
	

		
	$sql = "SELECT COUNT( t1.$varejemcod ) as Codigo, t3.$varlibpor as Portada, t1.$varejemdetcon as Comentario, t1.$varejemcodreg as CodigoReg ,t1.$varejemfecadq as Fecha ,t1.$varejempruni as Precio,t1.$varejemestu as Estado, t1.$varejemtipadq as Ingreso,t1.$varejemdetaqu as detalleIngreso, t1.$varejemconfis as Condicion ,t1.$varejemres as Reserva ,t2.$varestdes as Estante, t3.$varlibtit as Titulo, t3.$varlibcod as CodigoLib FROM $tablaEjemplares AS t1 JOIN $tablaEstante as t2 on t2.$varestcod = t1.$varestcod JOIN $tablaLibros as t3 on t3.$varlibcod = t1.$varlibcod 		
      WHERE 
         t3.$varlibcod = '$CodigoLibPrincipal' AND  t1.$varejemestu = '$textBusquedaorde' AND
		 t3.$varlibtit LIKE '%$textBusqueda%' OR  t1.$varejemcodbar LIKE '%$textBusqueda%'

	ORDER BY 'Codigo' ";  
      $filas_resultado = mysqli_query($conexion, $sql);  
      $filas = mysqli_fetch_row($filas_resultado);  
      $todal_filas = $filas[0];  
      $total_paginas = ceil($todal_filas / $limite); 
  	?>                    
                     <nav aria-label="Page navigation">
                        <ul class='pagination justify-content-center"' id="pagination">
                        <?php if(!empty($total_paginas)):for($i=1; $i<=$total_paginas; $i++):  
                            if($i == $pagina):?>
                                    <li class='page-item active'  id="<?php echo $i;?>"><a class="page-link"  href="pagination.php?page=<?php echo $i;?>"><?php echo $i;?></a></li> 
                            <?php else:?>
                            <li class='page-item'id="<?php echo $i;?>"><a class="page-link" href="pagination.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
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

        $("#cargarTabla").load("pages/ejemplares/tablaEjemplares.php?pagina="+ paginaNumero +"&busqueda=" + $("#textBusqueda").val()+"&codigoLib="+$("#codigoLib").val()+ "&ordenar=" + $("#textBusquedaordenar").val());
      });
</script>

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-bordered table-hover"  style="background-color: #FFFFFF;">
					<thead>
						<tr>
							<th>Codigo</th>						
							<th>Ubicacion</th>
							<th>Ingreso</th>
							<th>Precio</th>
							<th>Condicion</th>
							<th>Estado</th>			
	
							
							<th class="aTable">Opciones</th>
						</tr>
					</thead>

					<tbody>


						<?php 
					     
					     $selTable=mysqli_query($conexion,"SELECT  t1.$varejemcod  as Codigo, t1.$varejemdetcon as Comentario, t3.$varlibpor as Portada, t1.$varejemcodreg as CodigoReg ,t1.$varejemfecadq as Fecha ,t1.$varejempruni as Precio,t1.$varejemestu as Estado, t1.$varejemtipadq as Ingreso,t1.$varejemdetaqu as detalleIngreso, t1.$varejemconfis as Condicion ,t1.$varejemres as Reserva ,t2.$varestdes as Estante, t2.$varestcod as EstanteCodigo, t3.$varlibtit as Titulo, t3.$varlibcod as CodigoLib FROM $tablaEjemplares AS t1 JOIN $tablaEstante as t2 on t2.$varestcod = t1.$varestcod JOIN $tablaLibros as t3 on t3.$varlibcod = t1.$varlibcod 		
                                   WHERE 	
                                  t3.$varlibcod = '$CodigoLibPrincipal' AND  t1.$varejemestu = '$textBusquedaorde' AND                  
		                          $varejemcodreg LIKE '%$textBusqueda%'	OR  t1.$varejemcodbar LIKE '%$textBusqueda%'
	                       ORDER BY 'CodigoReg'
                            LIMIT $inicia_desde, $limite;");
	                       
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
							 La busqueda no devolvió ningún resultado</div>";						
						} else{
							$Condicion="";
							$estado="";
							$color="";

							while ($dataLibros=mysqli_fetch_assoc($selTable)){
								$numejemplar= substr($dataLibros['CodigoReg'],-5); 
						?>
					
							   <?php 
						   //Condicion fisica: 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala
						 
						           switch ($dataLibros['Condicion']) {
                                           case 0:
                                               $Condicion="OPTIMO";
                                           break;
                                           case 1:
                                                $Condicion="MUY BUENO";
                                           break;
                                           case 2:
                                               $Condicion="REGULAR";
                                           break;
                                           case 3:
                                               $Condicion="MALA";
                                           break;
                                           case 4:
                                               $Condicion="MUY MALA";
                                           break;
                                      }
                            //  Estado del libro:  0=Disponible 1=Prestado 2=No disponible 3=Extraviado                    
                                    
                                    switch ($dataLibros['Estado']) {
                                           case 0:
                                               $estado="DISPONIBLE";
                                               $color="green";
                                           break;
                                           case 1:
                                                $estado="PRESTADO";
                                                $color="blue";
                                           break;
                                           case 2:
                                               $estado="NO DISPONIBLE";
                                               $color="purple";  
                                           break;
                                           case 3:
                                               $estado="EXTRAVIADO";
                                               $color="red";
                                           break;
                                      }
                            // Tipo de adquisicion del ejemplar: campo que muestra si el ejemplar 0=Donacion 1=Compra 
                                        switch ($dataLibros['Ingreso']) {
                                           case 0:
                                               $Ingreso="DONACION";
                                              
                                           break;
                                           case 1:
                                                $Ingreso="COMPRA";
                                               
                                           break;                                         
                                      }


						      ?>
						<tr > 

							<td><?php echo $dataLibros['CodigoReg'];?> </td>			
							<td><?php echo $dataLibros['Estante'];?>  </td>
							<td><?php echo "$Ingreso";?>  </td>
							<td><?php                                   
							 if (empty($dataLibros['Precio'])) {
								echo "----";
							}else {
							     echo "$"." ".$dataLibros['Precio']; 	
							}  
                                ?>
						    </td>
							<td><?php echo "$Condicion";?></td>
							<td><p style="color:<?php echo $color; ?>"><?php echo "$estado";?></p></td>							 
							
							<td> 
								<div class="btn-group" role="group" aria-label="Opciones">
								<button type="button" class="btn btn-light" <?php echo $bloqueo ?> data-toggle="modal" 
								 data-target="#modalEditarEjemplar"
								 data-varejemplarcod="<?php echo $dataLibros['Codigo'];?>"
								 data-varejemplarcodlib="<?php echo $dataLibros['CodigoLib'];?>"
								 data-varejemplarfecha="<?php echo  $dataLibros['Fecha'];?>"	
								 data-varejemplartitulo="<?php echo $dataLibros['Titulo'];?>"
								 data-varejemplarestante="<?php echo $dataLibros['EstanteCodigo'];?>"
								 data-varejemplartipoingreso="<?php echo  $dataLibros['Ingreso'];?>"
								 data-varejemplardetaingreso="<?php echo  $dataLibros['detalleIngreso'];?>"
								 data-varejemplarcomentario="<?php echo  $dataLibros['Comentario'];?>"
								 data-varejemplarcondicion="<?php echo $dataLibros['Condicion'];?>"	
								 data-varejemplarprecio="<?php echo $dataLibros['Precio'];?>"
								 data-varejemplarestado="<?php echo  $dataLibros['Estado'];?>"								 					 
								 title="Editar Ejemplar">
									<img  src="img/icons/BookEditWide.png" width="35" height="30">
								</button>
                                  
								<button type="button" class="btn btn-light"   data-toggle="modal" data-target="#modalVerEjemplar"	
								      data-varejemplarportada="<?php echo  $dataLibros['Portada'];?>"
								      data-varejemplartitulo="<?php echo $dataLibros['Titulo'];?>"    		
								      data-varejemplarcodreg="<?php echo $dataLibros['CodigoReg'];?>"      		
								      data-varejemplartipadqui="<?php echo $Ingreso ;?>"
						              data-varejemplardetadqui="<?php echo  $dataLibros['detalleIngreso'];?>"	
								      data-varejemplardesfisica="<?php echo $dataLibros['Comentario'];?>"
								      title="Ver Ejemplar">
									<img  src="img/icons/verEjemplar.png" width="35" height="30">

								</button>
								<button type="button" class="btn btn-light"   data-toggle="modal" data-target="#modalBarraEjemplar"
							        	data-varejemplartitulo="<?php echo $dataLibros['Titulo'];?>"
							        	data-varejemplarcodlib="<?php echo $dataLibros['CodigoLib'];?>"	
								        data-varejemplarcodigoreg="<?php echo  $dataLibros['CodigoReg'];?>"								        
								        data-varejemplarnumero="<?php echo  $numejemplar; ?>"							     
								      title="Ver Codigo de barra">
									<img  src="img/icons/barras.png" width="35" height="30">

								</button>
                                 <!-- <?php echo "<a href=\"vercbejemplar.php?codeje=" . $dataLibros['CodigoReg']. "\">CB</a>"; ?> -->


								<button type="button" class="btn btn-light" <?php echo $bloqueo2 ?> data-toggle="modal" data-target="#modalBorrarEjemplar"
								 	data-varejemplarcod="<?php echo $dataLibros['Codigo'];?>"
									data-varejemplarnom="<?php echo  $dataLibros['Titulo'];?>"
								    data-varejemplarcodreg="<?php echo $dataLibros['CodigoReg'];?>" 
									title="Eliminar Ejemplar">
								 	<img  src="img/icons/BookEditWideDel.png" width="35" height="30">
								 </button>
								 <button type="button" class="btn btn-light" <?php echo $bloqueo3 ?> data-toggle="modal" data-target="#modalReportarEjemplar"
								 	data-varejemplarcod="<?php echo $dataLibros['Codigo'];?>"
									data-varejemplarnom="<?php echo  $dataLibros['Titulo'];?>"
									data-varejemplarcodreg="<?php echo $dataLibros['CodigoReg'];?>" 
									title="Reportar ejemplar">
								 	<img  src="img/icons/laberinto.png" width="35" height="30">
								 </button>
								 <button type="button" class="btn btn-light" <?php echo $bloqueo4 ?> data-toggle="modal" data-target="#modalReanudarEjemplar"
								 	data-varejemplarcod="<?php echo $dataLibros['Codigo'];?>"
									data-varejemplarnom="<?php echo  $dataLibros['Titulo'];?>"
									data-varejemplarcodreg="<?php echo $dataLibros['CodigoReg'];?>" 
									title="Reanudar ejemplar">
								 	<img  src="img/icons/reanudar.png" width="35" height="30">
								 </button>
								 <button type="button" class="btn btn-light" <?php echo $bloqueo5 ?> data-toggle="modal" data-target="#modalEncontrarEjemplar"
								 	data-varejemplarcod="<?php echo $dataLibros['Codigo'];?>"
									data-varejemplarnom="<?php echo  $dataLibros['Titulo'];?>"
									data-varejemplarcodreg="<?php echo $dataLibros['CodigoReg'];?>" 
									title="Ejemplar encontrado">
								 	<img  src="img/icons/encontrado.png" width="35" height="30">
								 </button>


								</div>
							</td>
						</tr>
						<?php }
						} ?>
					</tbody>
				</table>

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->				