	<?php 
	//HISTORIAL GENERAL DE LIBROS
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	$limite = 8;
	
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=1; 
	};


	function fechaFormato($fecha_init){

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


	$textBusqueda=$_GET['busqueda'];

	$filterall=$_GET['filter'];
	$sql = "SELECT COUNT(resumen.$varprestcod) as Contador
      FROM $varresumenlibroprestamo  as resumen
      INNER JOIN $tablaUsuarios as usuarios ON resumen.$varusuCodigoF=usuarios.$varUsuCodigo
      WHERE ";

    if ($filterall=='0'){
    	$sql .= "  resumen.$varprestcod >= '0' ";
    }
     else if ($filterall=='1'){
     	$sql .= "  resumen.$varprestest='0'";
     	
    } else if ($filterall=='2') {
    	$sql .= "  resumen.$varprestest='1' ";    	
    } else if ($filterall=='3') {
    	$sql .= "  resumen.$varprestest='0' AND $varprestfec < NOW() ";
    }

   if($textBusqueda && !empty($textBusqueda)){
		$sql .= " AND resumen.$varprestcod = '$textBusqueda' OR usuarios.$varCarnet = '$textBusqueda' OR usuarios.$varAccNombre = '$textBusqueda'";
	}

	$sql .= ";";



      $filas_resultado = mysqli_query($conexion, $sql);  
      $filas = mysqli_fetch_row($filas_resultado);  
      $todal_filas = $filas[0];  
      $total_paginas = ceil($todal_filas / $limite);


  	?>                    
         	

 <script>
                      	
    $("#pagination li").on('click',function(e){
    e.preventDefault();
      $("#historialTabla").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#historialTabla").load("pages/historial/historialGeneral.php?pagina="+ paginaNumero +"&busqueda=" + $("#codigoLibro").val() + "&filter="+ $('input[name=filtroSearch]:checked').val());
      });
</script>

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-hover" id="tablaGeneral" style=" cursor: pointer;">
					<thead>
						<tr>
							
							<th width=15px>Registro</th>
							<th >Prestamo a: </th>
							<th >Prestado el: </th>
							<th> Estado </th>					
						</tr>
					</thead>

					<tbody>


						<?php
						 	$formatDateSend= "%Y % c %d";
							$sql="SELECT resumen.$varprestcod, resumen.$varprestdev,resumen.$varprestfec, resumen.$varprestest, resumen.$varprestren, usuarios.$varPriNombre, usuarios.$varPriApellido, usuarios.$varAccNombre, COUNT(detalles.$vardetcodlib) as contadorLibros 
								FROM $varresumenlibroprestamo AS resumen
								INNER JOIN $vardetallesprestamolibro as detalles on resumen.$varprestcod =detalles.$varprestcodlib
								INNER JOIN $tablaUsuarios as usuarios on resumen.$varusuCodigoF = usuarios.$varUsuCodigo ";

								    if ($filterall=='0'){
								    	$sql .= " WHERE resumen.$varprestcod >= '0' ";
								    }
								     else if ($filterall=='1'){
								     	$sql .= " WHERE resumen.$varprestest='0' ";
								     	
								    } else if ($filterall=='2') {
								    	$sql .= " WHERE resumen.$varprestest='1' ";    	
								    } else if ($filterall=='3') {
								    	$sql .= " WHERE (resumen.$varprestest='0' AND  DATE_FORMAT(resumen.$varprestdev,'$formatDateSend') < DATE_FORMAT(NOW(), '$formatDateSend' )) ";
								    }

								   if($textBusqueda && !empty($textBusqueda)){
										$sql .= " AND resumen.$varprestcod = '$textBusqueda' OR usuarios.$varCarnet = '$textBusqueda' OR usuarios.$varAccNombre = '$textBusqueda' ";
									}

								$sql .= " GROUP by resumen.$varprestcod	
								ORDER BY resumen.$varprestfec DESC							
								LIMIT $inicia_desde, $limite
								;";

              

							$selTable=mysqli_query($conexion, $sql);
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
							 La busqueda no devolvió ningún resultado </div>";
						} else{

							while ($dataLibros=mysqli_fetch_assoc($selTable)){
						?>
						<?php
                                 // Nivel del Usuario 
                                  $Nivel=""; 
                                  $Estado="Error";
						   
                                    $color="white";
                                    $fechaColor = strtotime($dataLibros[$varprestdev]);
                                    $fechaHoyColor = date("Y-m-d");

                                    if ($dataLibros[$varprestest]=='0' AND date("Y-m-d",$fechaColor) >= $fechaHoyColor ) {
                                    	$color="#ecf9ec";//Greenish ACTIVO SIN RETRASOS AUN
                                    	$Estado="Prestado";
                                    } else if ($dataLibros[$varprestest]=='0' AND date("Y-m-d",$fechaColor)< $fechaHoyColor) {
                                    	$color="#ffe6e6";//redish RETRASO
                                    	$Estado="En retraso";
                                    }else if ($dataLibros[$varprestest]=='1') {
                                    	$color="#e6f9ff";//blue finalizado
                                    	 $Estado="Devuelto";
                                    }else if ($dataLibros[$varprestest]=='3') {
                                    	$color="#ffffe6";//yellow en espera
                                    	$Estado="En espera";
                                    }


						 ?>
						 <script> 	
						 	var valueID = "<?php  echo $dataLibros[$varprestcod]; ?>";
						 </script>
						 <tr style="background-color: <?php echo $color; ?>" id="<?php  echo $dataLibros[$varprestcod]; ?>" onclick="cargarDetalles('<?php  echo $dataLibros[$varprestcod]; ?>')">
							
							<td> <?php echo $dataLibros[$varprestcod]?></td>
							<td> <?php echo $dataLibros[$varPriNombre]." ".$dataLibros[$varPriApellido];?>
							</td>	
							<td><?php 
								  fechaFormato($dataLibros[$varprestfec]);
									?> 
							</td>	
							<td>
								<?php echo $Estado;?>
							</td>
						
						</tr>
						<?php }
						} ?>
					</tbody>
				</table>

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
              

				  

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataLibros[$varlibcod];?>">Ver detalles</a>  -->


				