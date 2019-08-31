	<?php 
	//HISTORIAL GENERAL DE LIBROS
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	$limite = 20;
	
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=1; 
	};

  if (isset($_GET["busqueda"])) { 
    $textBusqueda  = $_GET["busqueda"]; 
  } else {
   $textBusqueda=""; 
  };

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


	$textBusqueda=$_GET['busqueda'];
	$filterall=$_GET['filter'];
  $filterallTime=$_GET['filterTime'];

	$sql = "SELECT COUNT($varBitCod) as Contador
      FROM $tablaBitacora  WHERE 
     ";

    if ($filterall=='0'){
    	$sql .= "  $varBitCod >= '0' ";
    }
     else if ($filterall=='1'){
     	$sql .= "  $varDesc LIKE '%ingreso exitosamente%' OR $varDesc LIKE '%se deslogeo del sistema%' ";    	
    } else if ($filterall=='2') {
    	   $sql .= "  $varDesc LIKE '%Prestamo realizado%' ";
    } else if ($filterall=='3') {
    	$sql .= "   $varDesc LIKE '%devolucion realizada%' ";
    }  else if ($filterall=='4') {
                $sql .= "   $varDesc LIKE '%ingreso un nuevo%' OR   $varDesc LIKE '%ingreso una nueva%' ";
              }

     if ($filterallTime=='0'){
      $sql .= " AND DATE($varFecha) = CURDATE() ";
    }
     else if ($filterallTime=='1'){
      $sql .= " AND MONTH($varFecha)= MONTH(CURDATE()) AND YEAR($varFecha)= YEAR(CURDATE())";     
    } else if ($filterallTime=='2') {
         $sql .= "  AND YEAR($varFecha)= YEAR(CURDATE()) ";
    } else if ($filterallTime=='3') {
      $sql .= " ";
    } 

     if($textBusqueda && !empty($textBusqueda)){
                    $sql .= " AND $varDesc LIKE '%$textBusqueda%' OR  $varNomPersona LIKE '%$textBusqueda%' ";
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
      $("#tablaBitacora").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#tablaBitacora").load("pages/bitacora/tablaBitacora.php?pagina="+ paginaNumero +"&busqueda=" + $("#busquedaBit").val() + "&filter="+ $('input[name=filtroSearch]:checked').val());
      });
</script>

  <?php


	$inicia_desde = ($pagina-1) * $limite;  

	?>			
				<table class="table table-hover table-striped" id="tablaGeneral">
					<thead>
						<tr>
							
							<th width=15px>Registro</th>
							<th >Fecha</th>
							<th >Accion</th>
							<th> Codigo de Usuario </th>					
						</tr>
					</thead>

					<tbody>


						<?php
            //PREPARAR CONSULTA CON CONDICIONES DE BUSQUEDA
						 	$formatDateSend= "%Y % c %d";
							$sql="SELECT * FROM $tablaBitacora WHERE";

              if ($filterall=='0'){
                $sql .= "  $varBitCod >= '0' ";
              }
               else if ($filterall=='1'){
                $sql .= "  $varDesc LIKE '%ingreso exitosamente%' OR $varDesc LIKE '%se deslogeo del sistema%' ";
                
              } else if ($filterall=='2') {
                   $sql .= "  $varDesc LIKE '%Prestamo realizado%' ";
              } else if ($filterall=='3') {
                $sql .= "   $varDesc LIKE '%devolucion realizada%' ";
              }
              else if ($filterall=='4') {
                $sql .= "   $varDesc LIKE '%ingreso un nuevo%' OR   $varDesc LIKE '%ingreso una nueva%'";
              }

             if ($filterallTime=='0'){
                $sql .= " AND DATE($varFecha) = CURDATE() ";
              }
               else if ($filterallTime=='1'){
                $sql .= " AND MONTH($varFecha)= MONTH(CURDATE()) AND YEAR($varFecha)= YEAR(CURDATE())";     
              } else if ($filterallTime=='2') {
                   $sql .= "  AND YEAR($varFecha)= YEAR(CURDATE()) ";
              } else if ($filterallTime=='3') {
                $sql .= " ";
              } 
								   if($textBusqueda && !empty($textBusqueda)){
										$sql .= " AND $varDesc LIKE '%$textBusqueda%' OR  $varNomPersona LIKE '%$textBusqueda%'";
									}

								$sql .= " ORDER BY $varFecha DESC							
								LIMIT $inicia_desde, $limite
								;";

              

							$selTable=mysqli_query($conexion, $sql);
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>	
							 La busqueda no devolvió ningún resultado </div>";
						} else{

							while ($dataBita=mysqli_fetch_assoc($selTable)){
						?>
						 <tr>
              <td> <?php echo $dataBita[$varBitCod]?></td>
              <td><?php 
                  fechaFormato($dataBita[$varFecha]);
                  ?> 
              </td> 
							
							
							<td> <?php echo  $dataBita[$varNomPersona]." ".$dataBita[$varDesc]?>
							</td>	
              <td> <?php echo $dataBita[$varBitUsuCodigo]?></td>

						
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
              

				  

				<!--<a href="catalogos.php?pageLocation=pfL&id=<?php echo $dataBita[$varlibcod];?>">Ver detalles</a>  -->


				