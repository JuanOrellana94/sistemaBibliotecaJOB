<!--ASPECTO VISUAL DE LA PAGINA DE AUTORES-->
    <!--CONTENEDOR PARA MENU DE PRESTAMOS HACER PRESTAMOS--> 
    <?php

    date_default_timezone_set("America/El_Salvador");

     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
<br/>
  <body style="background-color:#757575;">
  <!--INICIO CONTENEDOR DE PRESTAMOS-->

  
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-2 mb-4  col-sm-2  col-md-2">
      <div class="card h-90" id="indicadores">
        <h5 class="card-header">Buscar</h5>   
        <div class="card-body">
            <div class="row">
                <form name="formBusqueda" id="formBusqueda">          
                  <div class="input-group ">               
                    <input type="text" class="form-control"  placeholder="Buscar" id="busquedaBit" name="busquedaBit"> 
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" onclick="cargarTablaBitacora()"> Buscar </button>
                    </div> 
                  </div>
                  <small id="dateHelp" class="form-text text-muted">Busqueda de registros</small>

                  <br>
                                      
                </form>

            </div>

         
        </div>
      </div>
    </div>
    <div class=" col-sm-10 col-md-10 col-lg-10">
      <div class="card h-90">
        <h5 class="card-header">Historial de la bitacora</h5>
        <div class="card-body">
          <div class="btn-group btn-group-toggle btn-lg btn-block" data-toggle="buttons">
            <label class="btn btn-secondary active" onclick="cargarTablaBitacora()">
              <input type="radio" name="filtroSearch" value="0" id="0" autocomplete="off" checked> Todos
            </label>
            <label class="btn btn-secondary" onclick="cargarTablaBitacora()">
              <input type="radio" name="filtroSearch" value="1" id="1" autocomplete="off" > Inicios y Cierres de sesion
            </label>
            <label class="btn btn-secondary" onclick="cargarTablaBitacora()">
              <input type="radio" name="filtroSearch" value="2" id="2" autocomplete="off"> Prestamos
            </label>
              <label class="btn btn-secondary" onclick="cargarTablaBitacora()">
              <input type="radio" name="filtroSearch" value="3" id="3" autocomplete="off"> Devoluciones
            </label>
              <label class="btn btn-secondary" onclick="cargarTablaBitacora()">
              <input type="radio" name="filtroSearch" value="4" id="4" autocomplete="off"> Ingresos a catalogos
            </label>      
          </div>

           <div class="btn-group btn-group-toggle btn-lg btn-block" data-toggle="buttons" style="margin-top: -1%">
            <label class="btn btn-info active" onclick="cargarTablaBitacora()">
              <input type="radio" name="filtroSearchTime" value="0" id="0" autocomplete="off" checked> Hoy
            </label>
            <label class="btn btn-info" onclick="cargarTablaBitacora()">
              <input type="radio" name="filtroSearchTime" value="1" id="1" autocomplete="off" > Este mes
            </label>
            <label class="btn btn-info" onclick="cargarTablaBitacora()">
              <input type="radio" name="filtroSearchTime" value="2" id="2" autocomplete="off"> Este año
            </label>
            <label class="btn btn-info" onclick="cargarTablaBitacora()">
              <input type="radio" name="filtroSearchTime" value="2" id="2" autocomplete="off">Todos
            </label>
               
          </div>

          <div id="tablaBitacora"></div>     
        </div>        
      </div>
    </div>  
  </div>
</div>






<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->
<script>
    window.onload = function () {
      cargarTablaBitacora();

      $(window).keydown(function(event){
        if(event.keyCode == 13) {         
          event.preventDefault();
          return false;
        
        }
      });

   
  }

  $(function(){
     $("#busquedaBit").keyup(function(e){
          if (e.keyCode === 13) {
              cargarTablaBitacora();
          }
     });

});


//Funcion para cargar y recargar tabla de solicitudes
function cargarTablaBitacora(){

   $("#tablaBitacora").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
   
  $("#tablaBitacora").show();
  $("#tablaBitacora").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
  setTimeout( function() {
    var busqueda=$("#busquedaBit").val();
    var filterall=$('input[name=filtroSearch]:checked').val();
    var filterallTime=$('input[name=filtroSearchTime]:checked').val();  
   
    $("#tablaBitacora").load("pages/bitacora/tablaBitacora.php?pagina=1&busqueda="+ busqueda +"&filter="+ filterall+"&filterTime="+ filterallTime);
  }, 50);
  //
  //    $("#solicitudesUsuarios").hide(500);                          
  //  }, 1000);
}

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }



</script>
