<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");


	if (isset($_GET["busqueda"])) { 
		$textBusqueda  = $_GET["busqueda"]; 
	} else {
		$textBusqueda=""; 
	};

	date_default_timezone_set("America/El_Salvador");
	$limite = 3;
	
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=1; 
	};

	$sql = "SELECT COUNT(bolsaprestamo.$varsolcod) 
      	FROM $varbolsaprestamo as bolsaprestamo 
		inner join $tablaLibros as libro on bolsaprestamo.$varlibcodcar = libro.$varlibcod
		inner join $tablaUsuarios as usuario on bolsaprestamo.$varusucod = usuario.$varUsuCodigo

      WHERE  $varCarnet = '$textBusqueda'
	; ";

      $filas_resultado = mysqli_query($conexion, $sql);  
      $filas = mysqli_fetch_row($filas_resultado);  
      $todal_filas = $filas[0];  
      $total_paginas = ceil($todal_filas / $limite);


  	?>  
  	<script>
  		var valueID = "<?php  echo $textBusqueda; ?>";
                      	
	    $("#pagination li").on('click',function(e){
	    e.preventDefault();
	      $("#cargarDetallesInfo").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
	      $("#pagination li").removeClass('active');
	      $(this).addClass('active');
	          var paginaNumero = this.id;
	        $("#cargarDetallesInfo").load("pages/historial/detalleSolicitud.php?busqueda="+valueID+"&pagina="+paginaNumero);
	      });
	</script>

  <?php
  	$inicia_desde = ($pagina-1) * $limite;     



	$formatDateSend= "%Y % c %d";
	$sql="SELECT * 
		FROM $varbolsaprestamo as bolsaprestamo 
		inner join $tablaLibros as libro on bolsaprestamo.$varlibcodcar = libro.$varlibcod
		inner join $tablaUsuarios as usuario on bolsaprestamo.$varusucod = usuario.$varUsuCodigo

      WHERE  $varCarnet = '$textBusqueda' OR $varAccNombre='$textBusqueda'
      	;";
	$profileData=mysqli_query($conexion,$sql);
	$dateItems=mysqli_fetch_assoc($profileData);

  $codUsuarioDelBolsa=$dateItems[$varUsuCodigo];





	?>	<br>

  <div class="row"><h6 class="card-subtitle mb-2 text-muted">Solicita los siguientes libros:</h6> <div style="margin-top: -2.5%; margin-left: 1%; height: 15px;"> <button type="button"  id="cerrar" name="cerrar" class="btn btn-danger btn-sm badge-pill" onclick="borrarSolicitud('<?php echo $codUsuarioDelBolsa;?>')"><small>Eliminar Solicitud</small></button></div></div>
          


				<table class="table table-hover">
					

					<tbody>

						<?php 
              $sql="SELECT * 
                FROM $varbolsaprestamo as bolsaprestamo 
                inner join $tablaLibros as libro on bolsaprestamo.$varlibcodcar = libro.$varlibcod
                inner join $tablaUsuarios as usuario on bolsaprestamo.$varusucod = usuario.$varUsuCodigo
                    WHERE  $varCarnet = '$textBusqueda' OR $varAccNombre='$textBusqueda'
                LIMIT $inicia_desde, $limite
                ;";
							$selTable=mysqli_query($conexion, $sql);

           

					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: gray; font-weight: bold; text-align: center;'>	
							 No hay Informacion</div>";
						} else{

							while ($dataLibros=mysqli_fetch_assoc($selTable)){
                $codLibro=$dataLibros[$varejemlibcod];
                $estNames="";
                
                $sql2="SELECT ejemplares.$varejemcod, ejemplares.$varejemlibcod,  estante.$varestdes FROM $tablaEjemplares as ejemplares
                      INNER JOIN $tablaEstante as estante on ejemplares.$varejemestcod=estante.$varestcod
                      WHERE ejemplares.$varejemlibcod='$codLibro'
                      GROUP BY estante.$varestdes;
                    
                  ;";
                $selTable2=mysqli_query($conexion, $sql2);
                while ($dataRow = mysqli_fetch_array($selTable2)){
                  $estNames .= "<span class='badge badge-pill badge-primary'>".$dataRow[$varestdes]."</span>";
                }
						?>

						<tr>					
							<td><?php echo $dataLibros[$varlibcantidad]." copia(s) de:".$dataLibros[$varlibtit]." | ". $estNames;?> </td>					
							 
							
						
						</tr>
						<?php }
						} ?>
					</tbody>
				</table>

								<nav aria-label="Page navigation">
					<ul class='pagination pagination-sm justify-content-center"' id="pagination">
                    	<?php

                    	$printEnd=0;
                    	$rangoLeash='2';//TEMP                   	
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

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->

   <!--MODAL PARA CONFIRMAR EL PRESTAMO REALIZADO item-->
  <div class="modal fade" id="renovacionModal" name="renovacionModal" tabindex="-1" role="dialog" aria-labelledby="renovacionModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content ">
        <div class="modal-header " style="background: #D5D9DF;">
          <h5 class="modal-title " id="deleteEditorialTitle"><img src="img/icons/BookSucess.png" width="35" height="30"> Renovarcion de Prestamo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background: #D5D9DF;">
          <form id="renovacionForm" name="renovacionForm">
            <div class="row">         
              <div class="col-sm-12">
                <div class="form-group">
                  <p><div id=notificationLabel style="color: black;  text-align: center;"><label for="TituloLabel">Para renovar este prestamo, seleccione una nueva fecha de renovacion: </label></div></p>
                  <div style="text-align: center">       
                  <input type="date" id="renovacionDate" name="renovacionDate">  
                  </div>
					<input type="text" class="form-control" name="codRegistroPrestamo" id="codRegistroPrestamo" aria-describedby="codRegistroPrestamo" placeholder="" >
                 
                  <input type="text" value="" class="form-control" name="codFechaDevolucion" id="codFechaDevolucion" aria-describedby="codFechaDevolucion">

                  

                  <h2> <div id="codigoPrestamoInfo" style="color: black; font-weight: bold; text-align: center;"></div>  </h2>        
      
                </div>
              </div>
            </div>    
          </form>
        </div>
        <div class="modal-footer " style="background: #D5D9DF;">
           <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
          <button type="button"  id="cerrar" name="cerrar" class="btn btn-success " onclick="renovarPrestamo()">Renovar</button>
        </div>
       
      </div>
    </div>
  </div>


 <script>
 	
 $('#renovacionModal').on('show.bs.modal', function (event) {
 	  var button = $(event.relatedTarget) // Button that triggered the modal
      var varCodigoRegistro = button.data('varCodigoRegistroDIV')
      var varFechaReg = button.data('varFechaRegDIV')
      
      //modal.find('.modal-title').text('Editar autor: ' + varautnom +' '+varautape);

      document.getElementById('codRegistroPrestamo').value = varCodigoRegistro
 
      document.getElementById('codFechaDevolucion').value = varFechaReg
   
    })



 </script>

				