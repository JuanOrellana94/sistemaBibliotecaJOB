
<!--INICIO CONTENEDOR DE CATALOGO DE Estantes-->    
<div class="card">
  <div class="card-body">
          <div class="row">        
            <div class="col-lg-9 col-md-6">
             <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#general" role="tab" aria-controls="pills-home" aria-selected="true">Datos Generales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#reportes" role="tab" aria-controls="pills-profile" aria-selected="false">Reportes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#solvencias" role="tab" aria-controls="pills-contact" aria-selected="false">Solvencias</a>
                </li>
            </ul>                  
            </div>                
            <div class="col-lg-3 col-md-6">
              <div class="d-flex justify-content-end" style="margin-top:3%; margin-right: 5%">  <p> <h3  class="text-muted">  Información  Estadistica</h3></p></div>
            
            </div>
          </div>


        <!--Cuerpo del panel--> 
        <div class="card-body">              
          <div class="row">            
            <div class="col-md-12">               

                <div class="tab-content" id="estadisticaContent">
                  <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                   
                    <div id="repGeneral"></div>
                    
                  </div>
                  <div class="tab-pane fade" id="reportes" role="tabpanel" aria-labelledby="reportes-tab">
                        <p>reportes</p>
                       <div id="repReporte"></div>
                  </div>
                  <div class="tab-pane fade" id="solvencias" role="tabpanel" aria-labelledby="solvencias-tab">
                     <p>Retrasos</p>
                     <div id="repReporte"></div>
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
    

  setTimeout(
     function() {
                          
       dataMes();dataDestacados();       
    }, 100);


      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          cargarGeneral();
          
          event.preventDefault();
          return false;
        
        }
      });

   
  
  };

  
  function cargarGeneral(){

    $("#repGeneral").show();
    $("#repGeneral").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

    $("#repGeneral").load("pages/estadistica/tablaGeneral.php");

  }

   function dataMes(){

    var anioSel=document.getElementById('yearSelect').value;
    var mesSel=document.getElementById('mesSelect').value;
   
    $("#dataTabla").load("pages/estadistica/detalleMes.php?year="+anioSel+"&month="+mesSel);
  }

function dataDestacados(){
    $("#dataDestacados").load("pages/estadistica/detalleDestacados.php");
  }


   
</script>