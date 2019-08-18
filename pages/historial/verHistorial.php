<!--ASPECTO VISUAL DE LA PAGINA DE AUTORES-->
    <!--CONTENEDOR PARA MENU DE PRESTAMOS HACER PRESTAMOS--> 
    <?php

     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
<br/>
  <body style="background-color:#d7dbec;">
  <!--INICIO CONTENEDOR DE PRESTAMOS-->

  
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 mb-4  col-sm-2  col-md-2">
        <div class="card  h-10" id="indicadores">
          <h5 class="card-header">Actividades</h5>
          <div class="card-body">
            <div class="row">
              <button type="button" class="btn btn-primary btn-block" onclick="location.href = 'acciones.php?pageLocation=prestamos';">
                <small>  Hacer Prestamo</small>
              </button>
               <button type="button" class="btn btn-primary btn-block" onclick="location.href = 'acciones.php?pageLocation=devoluciones';">
                <small>  Hacer Devolucion</small>
              </button>
            </div>
          </div>
        </div>
        <br>
        <div class="card h-90" id="indicadores">
          <h5 class="card-header">Indicadores</h5>
        

            <?php 
            $varDate=date("n");

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

           

            ?>  <div class="card-body">
              <div class="row">
                <button type="button" class="btn btn-primary">
                 <img src="img/icons/date-sm.png" style="max-width: 15%;">   <?php  echo " ".date("j")." de ".$monthName.", ".date("Y")." "; ?>
                </button>
              </div>

              <div id=indicatorMain></div>
    </div>
        </div>
      </div>
      <div class=" col-sm-12 col-md-10 col-lg-7">
        <div class="card h-90">
          <h5 class="card-header">Historial </h5>
          <div class="card-body">
            <ul class="nav  nav-pills">
                 <li class="nav-item" style="max-width: 30%;">
                    <a class="nav-link active" id="libro-tab"  data-toggle="tab" href="#librosTab" role="tab" aria-controls="libros" aria-selected="true"><img src="img/icons/Booklight.png" style="max-width: 15%;"> Libros</a>
                  </li>
                  <li class="nav-item"  style="max-width: 30%;">
                    <a class="nav-link"  id="equipo-tab" data-toggle="tab" href="#equipoTab" role="tab" aria-controls="equipo" aria-selected="false"><img src="img/icons/equipment.png" style="max-width: 15%;"> Equipo</a>
                  </li>
            </ul>
            
            <div class="tab-content" id="tabContenido">
              <div class="tab-pane fade  show active" id="librosTab" role="tabpanel" aria-labelledby="libro-tab">
                <form method="GET" class="form-inline" id="formBusquedaLibroCodigo" style="margin-top: 1%;">
                 
                    
                       <div class="btn-group btn-group-toggle " data-toggle="buttons">

                    
                      <input type="input"  id="codigoLibro" class="form-control" aria-describedby="codigoLibroInLine" placeholder="Registro de Prestamo">
                      

                        <button class="btn btn-primary" onclick="recargarPrestamosGeneral()" type="button"> <small> Buscar  </small></button>

                        <?php
                           $formatDateSend= "%Y % c %d";
                          $sql="SELECT COUNT($varprestcod) FROM $varresumenlibroprestamo WHERE $varprestest = '0' AND  DATE_FORMAT($varprestdev,'$formatDateSend') < DATE_FORMAT(NOW(), '$formatDateSend' );";
                          $profileData=mysqli_query($conexion,$sql);
                          $count = mysqli_fetch_array($profileData);
                        ?>

                        
                          <label class="btn btn-outline-secondary active" onclick="recargarPrestamosGeneral()">
                            <input type="radio" value='0' name="filtroSearch" id="all"  checked> <small>Todos</small>
                          </label>
                          <label class="btn btn-outline-primary"  onclick="recargarPrestamosGeneral()">
                            <input type="radio" value='1' name="filtroSearch"  id="out"  > <small>Prestados</small>
                          </label>
                          <label class="btn btn-outline-success" onclick="recargarPrestamosGeneral()">
                            <input type="radio" value='2' name="filtroSearch"  id="in"  > <small>Devueltos</small>
                          </label>
                           <label class="btn btn-outline-danger" onclick="recargarPrestamosGeneral()">
                            <input type="radio" value='3' name="filtroSearch" id="over" ><small>En retraso</small> &nbsp; <span class="badge badge-danger"><?php  echo $count[0];?></span>  
                          </label>
                        </div>
                         
                    
                  

                      <!-- 

                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="radioTodos" name="filtroradio" class="custom-control-input">
                          <label class="custom-control-label" for="radioTodos">Todos</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="radioPrestados" name="filtroradio" class="custom-control-input">
                          <label class="custom-control-label" for="radioPrestados">Prestados</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="radioPrestados" name="filtroradio" class="custom-control-input">
                          <label class="custom-control-label" for="radioDevueltos">Devueltos</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="radioPrestados" name="filtroradio" class="custom-control-input">
                          <label class="custom-control-label" for="radioRestraso">En retraso</label>
                        </div>-->

                   
                   
                   
                    
                
                </form>
                <div id="historialTabla"></div>
              </div>
              <div class="tab-pane fade" id="equipoTab" role="tabpanel" aria-labelledby="equipo-tab">
               
                 <div id="historialTablaEquipo"></div>
              </div>
            </div>
     
          </div>
          
        </div>
      </div>
        <div class="col-lg-3 mb-4  sm-4">
        <div class="card bg-light h-100">
          <h5 class="card-header">Informacion</h5>
          <div class="card-body">

            <div id="cargarDetallesInfo">
              <div class="d-flex justify-content-center"> <p style="text-align: center" class="text-muted">Haz click sobre registro para mas  informacion</p> </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
  </div>






<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->
<script>
    window.onload = function () {

      recargarPrestamosGeneral()
      recargarIndicadoresGeneral()

      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          recargarPrestamosGeneral();
          event.preventDefault();
          return false;
        
        }
      });

   
  
  };


//Funcion para cargar y recargar tabla de solicitudes
function recargarPrestamosGeneral(){
   
  $("#historialTabla").show();
  $("#historialTabla").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
  setTimeout( function() {
    var busqueda=$("#codigoLibro").val();
    var filterall=$('input[name=filtroSearch]:checked').val();  
   
    $("#historialTabla").load("pages/historial/historialGeneral.php?pagina=1&busqueda="+ busqueda +"&filter="+ filterall);
  }, 50);
  //
  //    $("#solicitudesUsuarios").hide(500);                          
  //  }, 1000);
}

function recargarIndicadoresGeneral(){
   
  $("#indicatorMain").show();
  $("#indicatorMain").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
  setTimeout( function() {
    var busqueda=$("#codigoLibro").val();
    var filterall=$('input[name=filtroSearch]:checked').val();  
   
    $("#indicatorMain").load("pages/historial/indicatorMain.php");
  }, 50);
  //
  //    $("#solicitudesUsuarios").hide(500);                          
  //  }, 1000);
}

function recargarPrestamosGeneralEmpty(){
  document.getElementById("formBusquedaLibroCodigo").reset(); 
  $("#historialTabla").show();
  $("#historialTabla").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

  var busqueda=$("#codigoLibro").val();  
  $("#historialTabla").load("pages/historial/historialGeneral.php?pagina=1&busqueda="+ busqueda);

  //setTimeout( function() {
  //    $("#solicitudesUsuarios").hide(500);                          
  //  }, 1000);
}
function recargarPrestamosGeneralEquipo(){
   
  $("#historialTabla").show();
  $("#historialTabla").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

  var busqueda=$("#textSolicitudes").val();  
  $("#historialTabla").load("pages/historial/historialGeneralEquipo.php?pagina=1");

  //setTimeout( function() {
  //    $("#solicitudesUsuarios").hide(500);                          
  //  }, 1000);
}

function renovarLibro(){
  var fechaDevo = $("#renoFechaMew").val();
  var fechaDevoOriginal = $("#renoFechaOriginal").val();
  //var fechaDevo =document.getElementById("fechaDevolucion").value;
  var fechaHoy = new Date();
  let formatted_date = fechaHoy.getFullYear() + "-" + (fechaHoy.getMonth() + 1) + "-" + fechaHoy.getDate()
  

 

  if ($("#codigoPrestamo").val()==""){
    $("#mensajeRenovacion").show();
    $("#mensajeRenovacion").html("Codigo Prestamo NO existe");
  }  else if ($("#renoFechaOriginal").val()==""){
    $("#mensajeRenovacion").show();
    $("#mensajeRenovacion").html("Fecha Original NO existe");
  }else if ($("#renoFechaMew").val()==""){
    $("#mensajeRenovacion").show();
    $("#mensajeRenovacion").html("Selecciona una nueva fecha de renovacion");
  }else  if (new Date(fechaDevo).getTime() <= new Date(fechaDevoOriginal).getTime()){
    $("#mensajeRenovacion").show();
    $("#mensajeRenovacion").html("<div class='alert alert-danger' role='alert'> Fecha de devolucion no puede ser menor o igual a la fecha original</div>");
     setTimeout(
                function() {
                  $("#mensajeRenovacion").hide(500);   
            }, 6000);
  }else  if (new Date(fechaDevo).getTime() <= new Date(formatted_date).getTime()){
    $("#mensajeRenovacion").show();
    $("#mensajeRenovacion").html("<div class='alert alert-danger' role='alert'> Fecha de devolucion no puede ser menor la fecha de hoy</div>");
     setTimeout(
                function() {
                  $("#mensajeRenovacion").hide(500);   
            }, 6000);
  }else {
    $("#mensajeRenovacion").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/historial/renovarPrestamo.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formRenovacion").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#mensajeRenovacion").show();
                    $("#mensajeRenovacion").html("<div class='alert alert-success' role='alert'>Renovacion realizada</div>");
  
                    setTimeout(
                        function() {
                          
                          $("#mensajeRenovacion").hide(500);          
                    }, 5000);



                } else if (data==0) {
                  //error
                  $("#mensajeRenovacion").show();
                  $("#mensajeRenovacion").html("<div class='alert alert-danger' role='alert'>Numero de renovaciones exedida</div>");
                     
                    setTimeout(
                        function() {
                          $("#mensajeRenovacion").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#mensajeRenovacion").show();
                     $("#mensajeRenovacion").html("<div class='alert alert-success' role='alert'>Renovacion realizada</div>");
  
                    setTimeout(
                        function() {
                          cargarDetalles(data);                         
                          $("#mensajeRenovacion").hide(500);          
                    }, 3000);
                }

              }
            });
  }
}


function cargarDetalles(x){

   $("#cargarDetallesInfo").show();
  $("#cargarDetallesInfo").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

  var busqueda=x;
  $("#cargarDetallesInfo").load("pages/historial/detallesPrestamo.php?busqueda="+ busqueda);



}



</script>
