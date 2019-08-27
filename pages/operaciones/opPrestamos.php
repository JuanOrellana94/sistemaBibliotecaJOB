<!--ASPECTO VISUAL DE LA PAGINA DE AUTORES-->
    <!--CONTENEDOR PARA MENU DE PRESTAMOS HACER PRESTAMOS--> 
    <?php
     ?>
<!--INICIO CONTENEDOR DE PRESTAMOS-->    
<div class="container-fluid">
  <br> 
  <div class="row">
      <div class="col-sm-2 mb-4" >
        <!--Area de Solicitudes pendientes-->
        <div class="card bg-light border-info h-100">
          <div class="card-body"  style="min-height: 100%; height:100%;">
            <h7 class="card-title"> Nuevas solicitudes </h7>
              <input type="text" class="form-control" placeholder="Buscar solicitud" id="textSolicitudes" name="textSolicitudes"> 
            <div id="solicitudesUsuarios"></div>
              <div class="dropdown-divider"></div>
            <h7 class="card-title"> Solicitudes pendientes</h7>
            <input type="text" class="form-control" placeholder="Buscar solicitud" id="textPendientes" name="textPendientes"> 
            <div id="solicitudesPendientes"></div>
          </div>
        </div>
      </div>
      <div class="col-sm-3 mb-4">
        <div id=contenedorPrincipal>
          <!--  remover  -->
        </div> 
      </div>
      <div class="col-sm-7 mb-4">
        <div id=contenedorSalida>
          <!--  remover  -->
        </div> 
      </div>
  </div>
</div>
<!--MODAL PARA CONFIRMAR EL PRESTAMO REALIZADO item-->
<div class="modal fade" id="confirmacionPrestamo" tabindex="-1" role="dialog" aria-labelledby="confirmacionPrestamo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header " style="background: #D5D9DF;">
        <h5 class="modal-title " id="deleteEditorialTitle"><img src="img/icons/BookSucess.png" width="35" height="30"> Prestamo realizado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="confirmacionForm" name="confirmacionForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">TRANSACCION REALIZADA, CODIGO DE PRESTAMO:</label></div>            

                <h2> <div id="codigoPrestamoInfo" style="color: black; font-weight: bold; text-align: center;"></div>  </h2>        
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer " style="background: #D5D9DF;">
        <button type="button"  id="cerrar" name="cerrar" class="btn btn-success mx-auto" onclick="cerrarModalConfimacion()">Aceptar</button>
      </div>
     
    </div>
  </div>
</div>

<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->
<script>
    window.onload = function () {
      recargarSolicitudes();
      recargarPendientes();
      cargarContendorPrincipal();
      cargarContendorSalida();
      setSelect2();       
      $(window).keydown(function(event){
        if(event.keyCode == 13) {         
            event.preventDefault();
          return false;  
        }
      });


      var solBuscar = document.getElementById("textSolicitudes");
      solBuscar.addEventListener("keydown", function (e) {
        if (e.keyCode === 13) {  //revisar si tecla presionada es Enter
        recargarSolicitudes();
        }
      });

      var penBuscar = document.getElementById("textPendientes");
      penBuscar.addEventListener("keydown", function (e) {
        if (e.keyCode === 13) {  //revisar si tecla presionada es Enter
        recargarPendientes();
        }
    });
  };


//Funcion para cargar y recargar tabla de solicitudes
function recargarSolicitudes(){
   
  $("#solicitudesUsuarios").show();
  $("#solicitudesUsuarios").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

  var busqueda=$("#textSolicitudes").val();  
  $("#solicitudesUsuarios").load("pages/operaciones/tablaSolicitudes.php?pagina=1&busqueda="+ busqueda);

  //setTimeout( function() {
  //    $("#solicitudesUsuarios").hide(500);                          
  //  }, 1000);
}
function recargarPendientes(){
   
  $("#solicitudesPendientes").show();
  $("#solicitudesPendientes").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

  var busqueda=$("#textPendientes").val();  
  $("#solicitudesPendientes").load("pages/operaciones/tablaPendientes.php?pagina=1&busqueda="+ busqueda);

  //setTimeout( function() {
  //    $("#solicitudesUsuarios").hide(500);                          
  //    }, 1000);
}

function cargarCodigoTransaccion(){
  //detalles del libro como el codigo dela transaccion

  var usuario=$("#varAccNombre").val();
  
  $("#infoDetalles").load("pages/operaciones/infoDetalle.php?usuario="+ usuario);

  setTimeout( function() {
      $("#cargandoFeedbackEjemplar").hide(500);                          
   }, 1000);
}

function cargarCodigoConfirmacionModal(){
  //detalles del libro como el codigo dela transaccion
  var usuario=$("#varAccNombre").val();

  $("#codigoPrestamoInfo").html('<img src="img/structures/replace.gif" style="max-width: 70%">').show(500);
  
  $("#codigoPrestamoInfo").load("pages/operaciones/infoConfirmacion.php?usuario="+ usuario);

}


function cargarContendorSalida(){

   $("#contenedorSalida").load("pages/operaciones/prestamoOutput.php");


}
function cargarContendorPrincipal(){

   $("#contenedorPrincipal").load("pages/operaciones/prestamoMain.php");


}


function reiniciarFormPrestamo(){
   cargarContendorPrincipal();
   cargarContendorSalida();
}

function cerrarModalConfimacion(){
  reiniciarFormPrestamo();
  $('#confirmacionPrestamo').modal('hide')
  
}

function cargarListadoLibros(){

  var usuario=$("#varAccNombre").val();
  
  $("#infoLista").load("pages/operaciones/infoListaLibros.php?pagina=1&usuario="+ usuario);

  setTimeout( function() {
      $("#cargandoFeedbackEjemplar").hide(500);                          
   }, 1000);
}
//FUNCION BUSCAR CODIGO DE USUARIO E INSERTAR EN FORMULARIO OUTPUT
function buscarCodUsu(){
   
  $("#cargandoFeedbackUsuario").show();
  $("#cargandoFeedbackUsuario").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

  var busqueda=$("#textUsuario").val();  

  $("#infoPersona").load("pages/operaciones/infoUsuario.php?busqueda="+ busqueda);
  cargarCodigoTransaccionVariableMode(busqueda);
  cargarListadoLibrosVariableMode(busqueda);
  setTimeout( function() { 
        $("#cargandoFeedbackUsuario").hide(500);
      }, 1000);
}
//FUNCION BUSCAR EJEMPLAR Y REGISTRAR EN EL PRESTAMO DE BASE DE DATOS ESTADO = 3 == EN ESPERA
function buscarCodEjemplar(){
   
  $("#infoListaLibros").show();
  $("#infoListaLibros").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

  var usuario=$("#varAccNombre").val();  
  var busqueda=$("#textEjemplar").val(); 

  $("#infoListaLibros").load("pages/operaciones/infoEjemplar.php?usuario="+ usuario+"&busqueda="+busqueda);


    setTimeout( function() { 
        document.getElementById('textEjemplar').value = "";
      }, 1000);
  document.getElementById("textEjemplar").focus();  
  cargarListadoLibros();
  cargarCodigoTransaccion();
  setTimeout( function() {   
    cargarCodigoTransaccion();
    cargarListadoLibros();     
    $("#infoListaLibros").hide(500);
   }, 3000);
}

function alertConfirmacion(){
  $('#confirmacionPrestamo').modal({backdrop: 'static', keyboard: false});
  $('#confirmacionPrestamo').modal('toggle');

  cargarCodigoConfirmacionModal();

}

function cancelarPrestamo(){
  
}

function removerLibroLista(){

  if ($("#varejemcodlibs").val()==""){
    $("#respuestaBorrarItem").show();
    $("#respuestaBorrarItem").html("Codigo de Libro necesario");
  }else if ($("#varprestcodlibs").val()==""){
    $("#respuestaBorrarItem").show();
    $("#respuestaBorrarItem").html("Codigo de Libro necesario");
  }else {
    $("#respuestaBorrarItem").html('<img src="img/structures/replace.gif" style="max-width: 60%">').show(500);
    var url = "pages/operaciones/borrarItemPrestamo.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#borrarItemForm").serialize(),
      success: function (data){
          if (data==1) {
            //sucess
            $("#respuestaBorrarItem").show();
            $("#respuestaBorrarItem").html("<div class='alert alert-success' role='alert'> Ejemplar a sido removido </div>");
            cargarListadoLibros();
            setTimeout(
                function() {
                  $("#respuestaBorrarItem").hide(500);
                  
            }, 6000);
            $('#borrarItemModal').modal('hide');
          } else if (data==0) {
            $("#respuestaBorrarItem").show();
            $("#respuestaBorrarItem").html("<div class='alert alert-danger' role='alert'> Error </div>");
            cargarListadoLibros();
            setTimeout(
                function() {
                  $("#respuestaBorrarItem").hide(500);
                  
                  
            }, 6000);

          } else{
            $("#respuestaBorrarItem").show();
            $("#respuestaBorrarItem").html(data);

          }     
          
      }
    });
  }

}
//generarPrestamo
function crearPrestamo(){
  var fechaDevo = $("#fechaDevolucion").val();
  //var fechaDevo =document.getElementById("fechaDevolucion").value;
  var fechaHoy = new Date();

  let formatted_date = fechaHoy.getFullYear() + "-" + (fechaHoy.getMonth() + 1) + "-" + fechaHoy.getDate()
  

  if ($("#fechaDevolucion").val()==""){
    $("#fechaControl").show();
    $("#fechaControl").html("<div class='alert alert-danger' role='alert'> Ingresa una fecha de devolucion </div>");
     setTimeout(
                function() {
                  $("#fechaControl").hide(500);   
            }, 6000);
  }else  if (new Date(fechaDevo).getTime() < new Date(formatted_date).getTime()){
    $("#fechaControl").show();
    $("#fechaControl").html("<div class='alert alert-danger' role='alert'> Error. Fecha de devolucion no puede ser menor a la fecha de este dia</div>");
     setTimeout(
                function() {
                  $("#fechaControl").hide(500);   
            }, 6000);
  }else  if ($("#varprestcodlib").val()=="" && $("#varprestcodequi").val()==""){
    $("#fechaControl").show();
    $("#fechaControl").html("<div class='alert alert-danger' role='alert'> Error: No se ha añadido ningun articulo al prestamo actual</div>");
     setTimeout(
                function() {
                  $("#fechaControl").hide(500);   
            }, 6000);
  }else {
    $("#fechaControl").hide(500);
    $("#mensajeFinal").html('<img src="img/structures/replace.gif" style="max-width: 60%">').show(500);
    var url = "pages/operaciones/generarPrestamo.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#formularioDetalles").serialize(),
      success: function (data){
          if (data==1) {
            //sucess
            $("#mensajeFinal").show();
            $("#mensajeFinal").html("<div class='alert alert-success' role='alert'> Prestamo registrado</div>");
            recargarPendientes()
            recargarSolicitudes()
            alertConfirmacion();
    
          } else if (data==0) {
            $("#mensajeFinal").show();
            $("#mensajeFinal").html("<div class='alert alert-danger' role='alert'> Codigo Invalido (2) </div>");
            

          } else if (data==2) {
            $("#mensajeFinal").show();
            $("#mensajeFinal").html("<div class='alert alert-danger' role='alert'> Uno o mas articulos en este registro ya estan prestados o no se encuentran disponibles </div>");

          }else if (data==3) {
            $("#mensajeFinal").show();
            $("#mensajeFinal").html("<div class='alert alert-danger' role='alert'> Error-2: No se ha añadido ningun articulo al prestamo actual </div>");

          }else if (data==4) {
            $("#mensajeFinal").show();
            $("#mensajeFinal").html("<div class='alert alert-danger' role='alert'> No puedes prestar Libros Y Equipo a la vez</div>");

          } else{
            $("#mensajeFinal").show();
            $("#mensajeFinal").html(data);

          }     
          
      }
    });
  }

}

function cargarSolicitud(x){

  $("#contenedorSalida").load("pages/operaciones/prestamoOutput.php");
  
  setTimeout( function() {
    $("#infoBolsaPrestamo").show();
    $("#infoBolsaPrestamo").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

    var busqueda=x;
    buscarCodUsuVariableMode(busqueda);
    $("#infoBolsaPrestamo").load("pages/operaciones/detalleSolicitud.php?busqueda="+ busqueda);

  }, 100);
}
function cargarPendiente(x){
  $("#contenedorSalida").load("pages/operaciones/prestamoOutput.php");
  
  setTimeout( function() {
    $("#cargandoFeedbackUsuario").show();
    $("#cargandoFeedbackUsuario").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
    var busqueda=x;  
    document.getElementById('textUsuario').value = busqueda;
    document.getElementById("textUsuario").disabled = true;

   //var busqueda=x;
    //buscarCodUsu();
    var busqueda=x;
    buscarCodUsuVariableMode(busqueda); 
  }, 100);
}

function cargarListadoLibrosVariableMode(x){

  var usuario=x;
  
  $("#infoLista").load("pages/operaciones/infoListaLibros.php?pagina=1&usuario="+ usuario);

  setTimeout( function() {
      $("#cargandoFeedbackEjemplar").hide(500);                          
   }, 1000);
}

function cargarCodigoTransaccionVariableMode(x){
  //detalles del libro como el codigo dela transaccion

  var usuario=x;  
  document.getElementById('textUsuario').value = usuario;
  


  
  $("#infoDetalles").load("pages/operaciones/infoDetalle.php?usuario="+ usuario);

  setTimeout( function() {
      $("#cargandoFeedbackEjemplar").hide(500);                          
   }, 1000);
}

function buscarCodUsuVariableMode(x){
   
  $("#cargandoFeedbackUsuario").show();
  $("#cargandoFeedbackUsuario").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

  var busqueda=x;  
  $("#infoPersona").load("pages/operaciones/infoUsuario.php?busqueda="+ busqueda);
  cargarCodigoTransaccionVariableMode(busqueda);
  cargarListadoLibrosVariableMode(busqueda);   

  setTimeout( function() {
    
  
      $("#cargandoFeedbackUsuario").hide(500);                          
   }, 500);
}

function borrarSolicitud(x){

  var busqueda=x;
  
  $("#infoBolsaPrestamo").load("pages/operaciones/borrarSolicitud.php?&busqueda="+ busqueda);

  setTimeout( function() {

      reiniciarFormPrestamo();               
      recargarSolicitudes();
      recargarPendientes();  
   }, 2000);
}

</script>
