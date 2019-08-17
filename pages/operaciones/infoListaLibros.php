	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	session_start();
	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];


    $limite = 10;
	if (isset($_GET["pagina"])) { 
		$pagina  = $_GET["pagina"]; 
	} else {
		$pagina=1; 
	};

	if (!empty($_GET["usuario"])) { 
		// CRITERIO DE USUARIO EXISTE.
		$textUsuario  = $_GET["usuario"]; 

		$sql = "SELECT * from $varresumenlibroprestamo AS resumen
				INNER JOIN $vardetallesprestamolibro AS detalles ON resumen.$varprestcod = detalles.$varprestcodlib
				INNER JOIN $tablaEjemplares AS ejemplar ON detalles.$varejemcod = ejemplar.$varejemcod
				INNER JOIN $tablaLibros AS libros ON ejemplar.$varejemlibcod = libros.$varlibcod
				INNER JOIN $tablaUsuarios AS usuario ON resumen.$varusuCodigoF=usuario.$varUsuCodigo
				WHERE (usuario.$varAccNombre='$textUsuario' AND $varprestest='3' ) OR
				(usuario.$varCarnet='$textUsuario' AND $varprestest='3' )
				;";


      $filas_resultado = mysqli_query($conexion, $sql);  
      $filas = mysqli_num_rows($filas_resultado);  
      $todal_filas = $filas;  
      $total_paginas = ceil($todal_filas / $limite); 


      $inicia_desde = ($pagina-1) * $limite;  

      ?><table class="table table-primary">
<?php


							$selTable=mysqli_query($conexion,"
								SELECT * from $varresumenlibroprestamo AS resumen
								INNER JOIN $vardetallesprestamolibro AS detalles ON resumen.$varprestcod = detalles.$varprestcodlib
								INNER JOIN $tablaEjemplares AS ejemplar ON detalles.$varejemcodlib = ejemplar.$varejemcod
								INNER JOIN $tablaLibros AS libros ON ejemplar.$varejemlibcod = libros.$varlibcod
								INNER JOIN $tablaUsuarios AS usuario ON resumen.$varusuCodigoF=usuario.$varUsuCodigo

								WHERE (usuario.$varAccNombre='$textUsuario' AND $varprestest='3' ) OR
									  (usuario.$varCarnet='$textUsuario' AND $varprestest='3' )

								LIMIT $inicia_desde, $limite
							;");
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: gray; font-weight: bold; text-align: center;'>	
							 Sin libros agregados (Check infoListaLibros.php)</div>";
						} else{

							?>			
							
							  <thead>
							    <tr>
							    	
							      <th colspan="2">Libros agregados</th>
							     
							    </tr>
							  </thead>

						<tbody>

							<?php



							while ($datosTabla=mysqli_fetch_assoc($selTable)){
								

								if ($datosTabla[$varejemestu]=='0') {
									$estadoLibro="Disponible"; 	
							 	} else if ($datosTabla[$varejemestu]=='1') {							 		
							 		$estadoLibro="Prestado";
							 	} else if ($datosTabla[$varejemestu]=='2') {							 		
							 		$estadoLibro="No Disponible";
							 	}else if ($datosTabla[$varejemestu]=='3') {							 		
							 		$estadoLibro="Extraviado";
							 	}
						?>
						<tr>
							<td align="center" style="padding: 1px;"><img src="<?php echo $datosTabla[$varlibpor];?>" width="40" height="51">  </td>
							<td><div style="height:35px;"> <small> Ejemplar #:<?php echo $datosTabla[$varejemcodreg];?> <br>
								Titulo: <?php echo $datosTabla[$varlibtit]; ?> <br>
								Estado:  <?php echo $estadoLibro; ?> 
							 </small></div></td>

							 <td> 
									<div class="btn-group" role="group" aria-label="Opciones">
									 <button type="button" class="btn" data-toggle="modal" data-target="#borrarItemModal"
									 data-vareejemplar="<?php echo $datosTabla[$varejemcodlib];?>"
									 data-varprestamocodigo="<?php echo $datosTabla[$varprestcodlib];?>"
									 data-vartipo="1"													
									 title="Remover"

									 
									 ><img src="img/icons/BookEditWideDel.png" width="37" height="34"></button>
									</div>
									 
							</td>
							
						</tr>						
																			
						<?php }
						} 
							$selTable=mysqli_query($conexion,"
								SELECT * from $varresumenequipoprestamo AS resumen
								INNER JOIN $vardetallesprestamoequipo AS detalles ON resumen.$varprestcodequi = detalles.$varprestcodequiDet
								INNER JOIN $tablaExistenciaequipo AS existencia ON detalles.$varexistcodDet = existencia.$varexistcod
								INNER JOIN $tablaEquipo AS equipo ON existencia.$varequicodExist = equipo.$varequicod
								INNER JOIN $tablaUsuarios AS usuario ON resumen.$varusuCodigoFEquipo=usuario.$varUsuCodigo


								WHERE (usuario.$varAccNombre='$textUsuario' AND $varprestestequi='3' ) OR
									  (usuario.$varCarnet='$textUsuario' AND $varprestestequi='3' )

								LIMIT $inicia_desde, $limite
							;");
					if (mysqli_num_rows($selTable)==0){
						 echo "<div id='respuesta' style='color: gray; font-weight: bold; text-align: center;'>	
							 Sin equipo agregados (Check infoListaLibros.php)</div>";
						} else{

							?>			
						

							  <thead>
							    <tr>
							    	
							      <th colspan="2">Equipo agregados</th>
							     
							    </tr>
							  </thead>

						<tbody>

							<?php


							//Existencia estatus: estado del equipo 0=Disponible 1=Prestado 2=Reparacion 3=Extraviado 4=No disponible
							while ($datosTabla=mysqli_fetch_assoc($selTable)){
								

								if ($datosTabla[$varexistestu]=='0') {
									$estadoEquipo="Disponible"; 	
							 	} else if ($datosTabla[$varexistestu]=='1') {							 		
							 		$estadoEquipo="Prestado";
							 	} else if ($datosTabla[$varexistestu]=='2') {							 		
							 		$estadoEquipo="En Reparacion";
							 	}else if ($datosTabla[$varexistestu]=='3') {							 		
							 		$estadoEquipo="Extraviado";
							 	}else if ($datosTabla[$varexistestu]=='4') {							 		
							 		$estadoEquipo="No disponible";
							 	}
						?>
						<tr>
							<td align="center" style="padding: 1px;"><img src="<?php echo $datosTabla[$varequimg];?>" width="40" height="51">  </td>
							<td><div style="height:35px;"> <small> Codigo #:<?php echo $datosTabla[$varexistcodreg];?> <br>
								Titulo: <?php echo $datosTabla[$varequitip]; ?> <br>
								Estado:  <?php echo $estadoEquipo; ?> 
							 </small></div></td>

							 <td> 
									<div class="btn-group" role="group" aria-label="Opciones">
									 <button type="button" class="btn" data-toggle="modal" data-target="#borrarItemModal"
									 data-vareejemplar="<?php echo $datosTabla[$varexistcodDet];?>"
									 data-varprestamocodigo="<?php echo $datosTabla[$varprestcodequi];?>"
									 data-vartipo="2"												
									 title="Remover"

									 
									 ><img src="img/icons/BookEditWideDel.png" width="37" height="34"></button>
									</div>
									 
							</td>
							
						</tr>						
																			
						<?php }
						} ?>



						</tbody>
				</table>
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

 <!--MODAL PARA borrar item-->
<div class="modal fade" id="borrarItemModal" tabindex="-1" role="dialog" aria-labelledby="borrarItemModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteEditorialTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Remover</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="borrarItemForm" name="borrarItemForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Remover este libro de la lista?</label></div>                
                <input type="text" class="form-control" name="varejemcodlibs" id="varejemcodlibs" aria-describedby="varejemcodlibDel" placeholder="" hidden>
                 <input type="text" class="form-control" name="varprestcodlibs" id="varprestcodlibs" aria-describedby="varprestcodlibDel" placeholder="" hidden>
                  <input type="text" class="form-control" name="vartipo" id="vartipo" aria-describedby="vartipo" placeholder="" hidden>
                           
                  <div id="labelBorrar" style="color: black; font-weight: bold; text-align: center;"></div>
                  <div id="respuestaBorrarItem" style="color: red; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTablaBorrar" id="cargarTablaBorrar"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
                
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-warning" onclick="removerLibroLista()">Remover</button>
      </div>
     
    </div>
  </div>
</div>
		

 <script>


 	 $('#borrarItemModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varejemcodlibDel = button.data('vareejemplar')
      var varprestcodlibDel = button.data('varprestamocodigo')
      var vartipoDel = button.data('vartipo')
      $('#borrarButton').attr("disabled", false);  

      var modal = $(this)
      
      $("#respuestaBorrarItem").html(" ");

       $("#notificationLabel").html('Remover este articulo?');
 

      document.getElementById('varejemcodlibs').value = varejemcodlibDel;
      document.getElementById('varprestcodlibs').value = varprestcodlibDel;
      document.getElementById('vartipo').value = vartipoDel;

      
      
    })
                      	
    $("#pagination li").on('click',function(e){
    e.preventDefault();
      $("#infoLista").html('<img src="img/structures/replace.gif" style="max-width: 50%">');
      $("#pagination li").removeClass('active');
      $(this).addClass('active');
          var paginaNumero = this.id;
        $("#infoLista").load("pages/operaciones/infoListaLibros.php?pagina="+ paginaNumero +"&busqueda=" + $("#textUsuario").val());
      });
</script>

	
<?php


	} else {
		// CRITERIO DE USUARIO NO EXISTE.
		$textBusqueda="";
		?> 
		<h6 class="card-subtitle mb-2 text-muted">Prestar Libros a:</h6>
	 	<p class="card-text"><div class='alert alert-info' role='alert'>Libros que se van a prestar</div></p>
	 	<?php 
	}





	



?>
