
<!--INICIO CONTENEDOR DE CATALOGO DE Estantes-->    
<div class="card">
  <div class="card-body" style="background-color: #d9d9d9;">
    <div class="row">        
      <div class="col-lg-9 col-md-6">
        <ul class="nav nav-tabs mb-6" id="pills-tab" role="tablist">
          <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#general" role="tab" aria-controls="pills-home" aria-selected="true"><h5>Indicadores Generales</h5></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-reportes-tab" data-toggle="pill" href="#reportes" role="tab" onclick="cargarReporte();" aria-controls="pills-reportes" aria-selected="false"><h5>Reportes</h5></a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" id="pills-solvencia-tab" data-toggle="pill" href="#solvencias" role="tab" onclick="cargarSolvencia();" aria-controls="pills-solvencias" aria-selected="false"><h5>Solvencias</h5></a>
                </li>                
            </ul>                  
            </div>                
            <div class="col-lg-3 col-md-6 d-none d-md-block">
              <div class="d-flex justify-content-end" style="margin-top:3%; margin-right: 5%">  <p> <h3  class="text-muted">  Información  Estadistica</h3></p></div>
            
            </div>
          </div>
        <!--Cuerpo del panel--> 
        <div class="card-body">              
          <div class="row">            
            <div class="col-md-12 col-lg-12">               
              <div class="tab-content" id="estadisticaContent">
                  <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">                   
                    <div id="repGeneral"></div>                    
                  </div>
                  <div class="tab-pane fade" id="reportes" role="tabpanel" aria-labelledby="reportes-tab">   
                    <div id="repReporte">
                                             
                    </div>
                  </div>
                   <div class="tab-pane fade" id="solvencias" role="tabpanel" aria-labelledby="solvencia-tab">   
                    <div id="repSolvencia">
                                             
                    </div>
                  </div>
                </div>
            </div>  
          </div>
    </div>
  </div>
</div>

<script>
  window.onload = function () {

      cargarGeneral();
      $(window).keydown(function(event){
        if(event.keyCode == 13) {         
          event.preventDefault();
          return false;
        
        }
      });
    

  setTimeout(
     function() {
                          
       dataMes();dataDestacados();       
    }, 100);


      





   
  
  };

  
  function cargarGeneral(){

    $("#repGeneral").show();
    $("#repGeneral").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

    $("#repGeneral").load("pages/estadistica/tablaGeneral.php");

  }
  function cargarReporte(){

    $("#repReporte").show();
    $("#repReporte").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

    $("#repReporte").load("pages/estadistica/tablaReportes.php");

  }
  function cargarSolvencia(){

    $("#repSolvencia").show();
    $("#repSolvencia").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

    $("#repSolvencia").load("pages/estadistica/tablaSolvencias.php");

  }

   function dataMes(){

    var anioSel=document.getElementById('yearSelect').value;
    var mesSel=document.getElementById('mesSelect').value;
   
    $("#dataTabla").load("pages/estadistica/detalleMes.php?year="+anioSel+"&month="+mesSel);
  }

function dataDestacados(){
    $("#dataDestacados").load("pages/estadistica/detalleDestacados.php");
  }

  function datainfoAll(){
    $("#infoAll").load("pages/estadistica/detalleBDS.php");
  }


function reportGen(){
  var url = "pages/estadistica/printReportVars.php";
   var yearSS=$("#yearSelectMain").val();
    $.ajax({
      type: "POST",
      url: url,
      data:  $("#reportYear").serialize(),
      success: function (data){
                open("pages/estadistica/reportGlobal.php?year="+yearSS, true,'newwin');
      }
    });
}

function reportGenSolvencia(){
  if ($("#carnetCod").val()==""){
    $("#printReturnSolvencia").show();
    $("#printReturnSolvencia").html("<div class='alert alert-warning' role='alert'>Agrega un carnet valido</div>");  
  }else {
  $("#printReturnSolvencia").show();
  $("#printReturnSolvencia").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
  var url = "pages/estadistica/printCheckSolvencia.php";
   var carnetCod=$("#carnetCod").val();
    $.ajax({
      type: "POST",
      url: url,
      data:  $("#reportSolvencia").serialize(),
      success: function (data){
        if (data==0) {
           //error NO EXISTE
                  $("#printReturnSolvencia").show();
                  $("#printReturnSolvencia").html("<div class='alert alert-warning' role='alert'>Carnet invalido </div>");
                    setTimeout(
                        function() {
                          $("#printReturnSolvencia").hide(500);                                
                    }, 6000);
        } else if (data==1) {
           $("#printReturnSolvencia").show();
                  $("#printReturnSolvencia").html("<div class='alert alert-success' role='alert'>Carnet valido </div>");
                    setTimeout(
                        function() {
                          $("#printReturnSolvencia").hide(500);                                
                    }, 6000);
        } else if (data==2) {
          //2 EL USUARIO NO TIENE RETRASOS NI PRESTAMOS ACTIVOS
           $("#printReturnSolvencia").html("<div class='alert alert-success' role='alert'>Este usuario no posee prestamos activos ni cargos por mora </div>");
           open("pages/estadistica/reportSolvenciaCNX.php?cncnet="+carnetCod, true,'newwin');

        } else if (data==3) {
          //3 EL USUARIO TIENE RETRASOS O PRESTAMOS ACTIVOS
            $("#printReturnSolvencia").html("<div class='alert alert-danger' role='alert'>Este usuario tiene prestamos activos o retrasos con mora. Generando reporte...</div>");
          open("pages/estadistica/reportSolvencia.php?cncnet="+carnetCod, true,'newwin');
        } else if (data==4) {
          //3 EL USUARIO TIENE RETRASOS O PRESTAMOS ACTIVOS
            $("#printReturnSolvencia").html("<div class='alert alert-warning' role='alert'>Este usuario no tiene retraso pero aun tiene prestamos sin devolver, por lo que no se puede generar un documento de solvencia.</div>");
          //open("pages/estadistica/reportSolvencia.php?cncnet="+carnetCod, true,'newwin');
        } else{
          $("#printReturnSolvencia").html(data);
        }
               
      }
    });
    }
}function cancelarSolvencias(){
  if ($("#carnetCodCancelSolv").val()==""){
    $("#printReturnCancelarSolvencia").show();
    $("#printReturnCancelarSolvencia").html("<div class='alert alert-warning' role='alert'>Agrega un carnet valido</div>");  
  }else {
  $("#printReturnCancelarSolvencia").show();
  $("#printReturnCancelarSolvencia").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
  var url = "pages/estadistica/printCancelSolvencia.php";
   var carnetCod=$("#carnetCodCancelSolv").val();
    $.ajax({
      type: "POST",
      url: url,
      data:  $("#reportSolvenciaCancel").serialize(),
      success: function (data){
        if (data==0) {
           //error NO EXISTE
                  $("#printReturnCancelarSolvencia").show();
                  $("#printReturnCancelarSolvencia").html("<div class='alert alert-warning' role='alert'>Carnet invalido </div>");
                    setTimeout(
                        function() {
                          $("#printReturnCancelarSolvencia").hide(500);                                
                    }, 6000);
        } else if (data==1) {
           $("#printReturnCancelarSolvencia").show();
                  $("#printReturnCancelarSolvencia").html("<div class='alert alert-success' role='alert'>Carnet valido </div>");
                    setTimeout(
                        function() {
                          $("#printReturnCancelarSolvencia").hide(500);                                
                    }, 6000);
        } else if (data==2) {
          //2 EL USUARIO NO TIENE RETRASOS NI PRESTAMOS ACTIVOS
           $("#printReturnCancelarSolvencia").html("<div class='alert alert-warning' role='alert'>Este usuario no posee posee cargos que borrar o aun tiene libros que devolver, consultar historial o generar reporte de solvencia.</div>");
           //open("pages/estadistica/reportSolvencia.php?cncnet="+carnetCod, true,'newwin');

        } else if (data==3) {
          //3 EL USUARIO TIENE RETRASOS O PRESTAMOS ACTIVOS
           $("#printReturnCancelarSolvencia").html("<div class='alert alert-danger' role='alert'>Para cancelar multas es necesario devolver todos los libros pendientes.</div>");
            
        } else if (data==4) {
          //3 EL USUARIO TIENE RETRASOS SIN DEVOLVER
           $("#printReturnCancelarSolvencia").html("<div class='alert alert-warning' role='alert'>Las multas por retrasos pendientes han sido canceladas</div>");        
          //open("pages/estadistica/reportSolvencia.php?cncnet="+carnetCod, true,'newwin');
        } else{
          $("#printReturnCancelarSolvencia").html(data);
        }
               
      }
    });
    }
}


   
</script>