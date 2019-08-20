<div class="card border-secondary h-100" style="background-color:#e6f4ff;">
    <div class="card-body">
    	
        
       
      

		<form  id="formularioDetalles">
			<div class="row">
				<div class="col-lg-5" >
					<div class="row">
    	
				       <h5 class="card-title" > <a class="navbar-brand" href="acciones.php?pageLocation=devoluciones">
			             <img src="img/icons/book.png" width="45" height="45" alt="" style="margin-left:15%;"> </a>  Informacion del prestamo </h5>
				       
				    </div>

			        <div class="dropdown-divider"></div>
					<div class="row"  data-toggle="tooltip" data-placement="right"  title="Informacion de prestamo">
						<div class="col-sm-12">
							 <div class="form-group" >

							 	<div id="infoPersona">
							 		<h6 class="card-subtitle mb-2 text-muted">Prestar Libros a:</h6>
			                 		<p class="card-text"><div class='alert alert-info' role='alert'>No se a ingresado ningun usuario </div></p>
			                 		
			                 	</div>

			              </div>
			       	
				    	</div>
				    </div>	
		        	<div class="dropdown-divider"></div>
		         	<br>  
				    <div class="row" data-toggle="tooltip" data-placement="right"  title="Proceso de prestamo">
						<div class="col-sm-12" >
							<div class="form-group" >
								<div class="infoDetallesPrestamo">								
							 		<h6 class="card-subtitle mb-2 text-muted" >Fecha de devolucion:</h6>
					                <input type="date" name="fechaDevolucion" id="fechaDevolucion">
					                <br>
					                <div id="fechaControl"></div>	

					                <div id="infoDetalles"></div>
					                <br>

					              
																              
										<button type="button" name="cancelarPrestamo" id="cancelarPrestamo"  class="btn btn-danger"  onclick="reiniciarFormPrestamo()">Cancelar</button> 
				        				<button type="button" name="generarPrestamo" id="generarPrestamo" class="btn btn-primary" onclick="crearPrestamo()">Hacer Prestamo</button> 		
						 			
									<div id="mensajeFinal"></div>	     	                
			            		</div>			       	
				    		</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7" >

					<div class="row">
						<div class="col-sm-12" >
							<div class="form-group" >
								<div id="infoBolsaPrestamo"></div>
								<div id="infoLista">
								 	<h6 class="card-subtitle mb-2 text-muted" >Libros a Prestar:</h6>
								 	<p class="card-text"><div class='alert alert-info' role='alert'>Libros que se van a prestar</div></p>
								 	
							 	</div>
		      	                
			            	</div>
			       	
				    	</div>
				    </div>
				</div>
			</div>
		</form>
     	  
    </div>
</div>

  
	<script>

	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})


		 	document.getElementById("cancelarPrestamo").disabled = true;
		 	document.getElementById("generarPrestamo").disabled = true;


	
	</script>