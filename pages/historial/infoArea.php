<div class="card-body">
	<div id="cargarDetallesInfo">
		<div class="alert alert-success" role="alert">
 			  <p style="text-align: center" class="text-muted">Haz click sobre un registro para mas informacion</p>
		</div>
		
		<div class="alert alert-warning" role="alert">
			<h4 class="alert-heading d-flex justify-content-center">Historial</h4>


			<p><b>Historial:</b> registros de los prestamos realizados recientemente, vista de entradas y salidas del dia</p>
			
				
               <button style="max-width: 22%" type="button" data-toggle="tooltip" data-placement="right" title="Prestamo" class="btn btn-link float-right">
                  <img src="img/icons/Prestamo.png" style="max-width: 100%">
              </button> 
               <button style="max-width: 22%" type="button" data-toggle="tooltip" data-placement="right" title="Devolucion" class="btn btn-link float-right">
                   <img src="img/icons/PrestamoDevolucion.png" style="max-width: 100%">
              </button> 

			<p><b>Menu de actividades:</b> <br> Accede rapidamente a prestamos y devoluciones desde el historial</p>


			<p><b>Indicadores:</b> <br> Informacion rapida sobre el numero de prestamos y devoluciones hechas durante el dia</p>

			  <button style="max-width: 22%" type="button" data-toggle="tooltip" data-placement="right" title="Libros" class="btn btn-link float-right">
                  <img src="img/icons/Booklight.png" style="max-width: 100%">
              </button> 
               <button style="max-width: 22%" type="button" data-toggle="tooltip" data-placement="right" title="Equipos" class="btn btn-link float-right">
                   <img src="img/icons/equipment.png" style="max-width: 100%">
              </button> 

			<p><b>Pestañas Libros y Equipos:</b> <br> El historial de libros esta separado en pestañas para facil navegacion</p>
		</div>
    </div>
          
 </div>

 <script>
 	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 	
 </script>