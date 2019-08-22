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
	$limite = 2;
	
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=1; 
	};

	$sql = "SELECT COUNT(existencia.$varexistcod) FROM $varresumenequipoprestamo as resumen
			INNER JOIN $vardetallesprestamoequipo as detalle on resumen.$varprestcodequi=detalle.$varprestcodequiDet
			INNER JOIN $tablaExistenciaequipo as existencia on detalle.$varexistcodDet = existencia.$varexistcod
			INNER JOIN $tablaEquipo as equipo on existencia.$varequicodExist = equipo.$varequicod
			WHERE resumen.$varprestcodequi='$textBusqueda';";
			

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
	        $("#cargarDetallesInfo").load("pages/historial/detallesPrestamoEquipo.php?busqueda="+valueID+"&pagina="+paginaNumero);
	      });
	</script>

  <?php
  	$inicia_desde = ($pagina-1) * $limite;     


	


	$formatDateSend= "%Y % c %d";
	$sql="SELECT * FROM $varresumenequipoprestamo as resumen
		INNER JOIN $vardetallesprestamoequipo as detalle on resumen.$varprestcodequi=detalle.$varprestcodequiDet
		INNER JOIN $tablaUsuarios as usuario on resumen.$varusuCodigoFEquipo = usuario.$varUsuCodigo
		WHERE resumen.$varprestcodequi='$textBusqueda'
	;";
	$profileData=mysqli_query($conexion,$sql);
	$dateItems=mysqli_fetch_assoc($profileData);

	$fechaColor = strtotime($dateItems[$varprestdevequi]);
    $fechaHoyColor = date("d-m-Y");

    if ($dateItems[$varprestestequi]=='0' AND date("d-m-Y",$fechaColor) >= $fechaHoyColor ) {
    
    	$Estado="Prestado";
    } else if ($dateItems[$varprestestequi]=='0' AND date("d-m-Y",$fechaColor)< $fechaHoyColor) {
    	
    	$Estado="En retraso";
    }else if ($dateItems[$varprestestequi]=='1') {
    	
    	 $Estado="Devuelto";
    }else if ($dateItems[$varprestestequi]=='3') {
    	
    	$Estado="En espera";
    }


	?>		<div class="row"><div class="col-lg-6"><p class="font-weight-bold"> Registro: <?php echo  $textBusqueda;?> </div>  <div class="col-lg-6"><p  class="font-weight-bold" style="text-align: right"> Estado: <?php echo  $Estado;?> </p></div> </div>	
			
			<p> Nombre: <?php echo $dateItems[$varPriNombre]." ".$dateItems[$varPriApellido]; ?></p>
			<p> Usuario: <?php echo $dateItems[$varAccNombre] ?> </p>
			
			<?php
			//FECHA DE PRESTAMO
			function FechaFormato($fecha_init){

				$fecha = strtotime($fecha_init);
				$varDate=date("n", $fecha);
		            if ($varDate==1) {
		              $monthName="Enero";
		            } else if ($varDate==2) {
		              $monthName="Febrero";
		            } else if ($varDate==3) {
		              $monthName="Marzo";
		            } else if ($varDate==4) {
		              $monthName="Abril";
		            } else if ($varDate==5) {
		              $monthName="Mayo";
		            } else if ($varDate==6) {
		              $monthName="Junio";
		            } else if ($varDate==7) {
		              $monthName="Julio";
		            } else if ($varDate==8) {
		              $monthName="Agosto";
		            } else if ($varDate==9) {
		              $monthName="Septiembre";
		            } else if ($varDate==10) {
		              $monthName="Octubre";
		            } else if ($varDate==11) {
		              $monthName="Noviembre";
		            }else if ($varDate==12) {
		              $monthName="Diciembre";
		            }
		    echo date("j", $fecha)." de ".$monthName.", ".date("Y", $fecha);
			}

			?>

			<p> P: <?php  fechaFormato($dateItems[$varprestfecequi]);?>  / D: <?php  fechaFormato($dateItems[$varprestdevequi]);?></p>
			
			<?php

			 $fechaColor = strtotime($dateItems[$varprestdevequi]);
             $fechaHoyColor = date("d-m-Y");

			 if ($dateItems[$varprestestequi]=='0' AND date("d-m-Y",$fechaColor) >= $fechaHoyColor ) {          	
            	$Estado="Prestado";
            	$OldDate = strtotime($dateItems[$varprestdevequi]);
            	$NewDate = date('M j, Y', $OldDate);
            	$diff = date_diff(date_create($NewDate),date_create(date("M j, Y")));

            	?>
            	<div class="alert alert-info" role="alert">
					Restan  <?php echo $diff->format('%D dia(s)');?> para hacer la devolucion
				</div>
				

            	<?php

            } else if ($dateItems[$varprestestequi]=='0' AND date("d-m-Y",$fechaColor)< $fechaHoyColor) {

            	$OldDate = strtotime($dateItems[$varprestdevequi]);
            	$NewDate = date('M j, Y', $OldDate);
            	$diff = date_diff(date_create($NewDate),date_create(date("M j, Y")));

            	$Estado="En retraso";
            	?>

            	<div class="alert alert-danger" role="alert">
					  Este prestamo tiene un retraso de <?php echo $diff->format('%D dia(s)');?>
				</div>

				<button type="button" class="btn btn-primary btn-block" disabled>
                		Hacer Renovacion
              	</button>

            	<?php
            }else if ($dateItems[$varprestestequi]=='1') {
            	
            	 $Estado="Devuelto";

            	 ?>

            	<div class="alert alert-success" role="alert">
					  Todos los equipos en este prestamo fueron entregados el:
					  <?php
					   fechaFormato($dateItems[$varprestfechafinEquipo]);
					  ?>
				</div>

				<button type="button" class="btn btn-primary btn-block" disabled>
                		Hacer Renovacion
              	</button>

            	<?php
            }else if ($dateItems[$varprestestequi]=='3') {            	
            	$Estado="En espera";
            }



			?>


				<table class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Existencia</th>
							<th>Equipo</th>
						</tr>
					</thead>

					<tbody>


						<?php 
						$sql="SELECT existencia.$varexistcodreg, existencia.$varexistestu,equipo.$varequitip FROM $varresumenequipoprestamo as resumen
								INNER JOIN $vardetallesprestamoequipo as detalle on resumen.$varprestcodequi=detalle.$varprestcodequiDet
								INNER JOIN $tablaExistenciaequipo as existencia on detalle.$varexistcodDet = existencia.$varexistcod
								INNER JOIN $tablaEquipo as equipo on existencia.$varequicodExist = equipo.$varequicod
								WHERE resumen.$varprestcodequi='$textBusqueda'
								LIMIT $inicia_desde, $limite
								;";
							$selTable=mysqli_query($conexion,$sql);

							

					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
							 No hay Informacion</div>";
						} else{
							// 0=Disponible  1=Prestado 2=No disponible 3=Extraviado

							while ($dataEquipos=mysqli_fetch_assoc($selTable)){
								if ($dataEquipos[$varexistestu]==0) {
									$icon='devGreen.png';
									$tooltip=' title="Devuelto" ';

								} else if ($dataEquipos[$varexistestu]==1) {
									$icon='devBlue.png';
									$tooltip=' title="Prestado" ';
								} else if ($dataEquipos[$varexistestu]==2) {
									$icon='devGray.png';
									$tooltip=' title="No Disponible" ';
								} else if ($dataEquipos[$varexistestu]==3) {
									$icon='devRed.png';
									$tooltip=' title="Extraviado" ';
								}
						?>
						<tr >
							<td > <img data-toggle="tooltip" data-placement="right" <?php echo $tooltip;?>  src="img/icons/<?php echo $icon;?>" style="max-width:40px"></td>
							<td><?php echo $dataEquipos[$varexistcodreg];?> </td>
							<td><?php echo $dataEquipos[$varequitip];?> </td>					
							 
							
						
						</tr>
						<?php }
						} ?>
					</tbody>
				</table>

								<nav aria-label="Page navigation">
					<ul class='pagination justify-content-center"' id="pagination">
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

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataEquipos[$varequicod];?>">Ver detalles</a>  -->

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


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 </script>

				