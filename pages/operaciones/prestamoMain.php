<div class="card h-100">
    <div class="card-body">
    	<div class="row"> 
    		<div class="col-lg-10 col-md-8 col-sm-7"><h5 class="card-title">Prestamo de libros y equipos.</h5></div>
    		<div class="col-lg-2 col-md-6 col-sm-5">
    		<div class="btn-group float-right" role="group" aria-label="Opciones"> 
				<button class="btn" type="button" onclick="reiniciarFormPrestamo();" data-toggle="tooltip" data-placement="top" title="Cancelar este prestamo">
		                  <img src="img/icons/BookauthorReload.png" width="45" height="45">
		        </button>
	    	</div></div>

    		
    		

    	</div>
      


        <div class="dropdown-divider"></div>
         <br>  
       
      

		<form id="formularioPrestamo" name="formularioPrestamo" autocomplete = "off">
			<div class="row">
				<div class="col-sm-8">
				    <div class="form-group" data-toggle="tooltip"  tabindex="0"  data-placement="right"  title="Codigo/Carnet del estudiante o personal que desea realizar un prestamo">
					 	 <h6 class="card-subtitle mb-2 text-muted">Carnet del solicitante:</h6>
      
	                 <input  type="text" class="form-control" onfocus="this.value=''" name="textUsuario" id="textUsuario" aria-describedby="textUsuario" placeholder="">

	              	</div>
	       	
		    	</div>
		    	<div class="col-sm-4">
					 		
	                 	<div id="cargandoFeedbackUsuario"></div>	             	
		    		
		    	</div>
		    </div>	
        <div class="dropdown-divider"></div>
         <br>  
		    <div class="row">
				<div class="col-sm-8" data-toggle="tooltip" data-placement="right"  title="Ingresa el codigo del ejemplar de libro que deseas prestar">
					<div class="form-group" >
					 	<h6 class="card-subtitle mb-2 text-muted" >Codigo del Ejemplar:</h6>
      	                <input disabled type="text" class="form-control" onfocus="this.value=''" name="textEjemplar" id="textEjemplar" aria-describedby="textEjemplar" placeholder="">
      	                <div id="infoListaLibros"></div>
      	                <div id="solicitudDetallesDiv"></div>
					</div>
		    	</div>
		    	<div class="col-sm-4">					 				
	                 <div id="cargandoFeedbackEjemplar"></div>

		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-sm-12">
		    		
		    	</div>
		    </div>
		</form>      
    </div>
</div>
<script>
var keyTimer;



	document.getElementById("textUsuario").focus(); 
	var usuBuscar = document.getElementById("textUsuario");
      usuBuscar.addEventListener("keyup", function (e) {   
      	if(event.keyCode != 9 || event.keyCode != 8 || event.keyCode != 16 || event.keyCode != 18 || event.keyCode !=32) {   
		if(keyTimer){
			clearTimeout(keyTimer);
		}
		keyTimer = setTimeout(function () {
		  buscarCodUsu();   
		}, 500); 
		}   
         
      });
    var ejemplarBuscar = document.getElementById("textEjemplar");
    	ejemplarBuscar.addEventListener("keyup", function (e) {
    	if(event.keyCode != 9 || event.keyCode != 8 || event.keyCode != 16 || event.keyCode != 18 || event.keyCode !=32) {   
			if(keyTimer){
				clearTimeout(keyTimer);
			}
			keyTimer = setTimeout(function () {
			  buscarCodEjemplar();      
			}, 500);
		}
      });
    function recargarDevoluciones(){   
		  $("#solicitudesUsuarios").show();
		  $("#solicitudesUsuarios").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
		  var busqueda=$("#textSolicitudes").val();  
		  $("#solicitudesUsuarios").load("pages/operaciones/tablaSolicitudes.php?pagina=1&busqueda="+ busqueda);
		  //setTimeout( function() {
		  //    $("#solicitudesUsuarios").hide(500);                          
		  //  }, 1000);
}
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})	
</script>