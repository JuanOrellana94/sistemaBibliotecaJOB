<?php

function getmonth($x){
  $varDate=$x;
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
  return  $monthName;
}

?>
<div class="row">
  <div class="col-lg-4 col-md-12 mx-auto d-flex align-items-stretch" style="margin-bottom: 9px;">
    <div class="card" >
      <div class="card-header">
        <h5>Reporte - Solvencia de Estudiante</h5>
      </div>
      <div class="card-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-Generar" role="tab" aria-controls="nav-home" aria-selected="true">Generar</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-Cancelar" role="tab" aria-controls="nav-profile" aria-selected="false">Cancelar</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-Generar" role="tabpanel" aria-labelledby="nav-home-tab"> 
            <div class="row">
          <div class="col-lg-12">
            <div class="alert alert-light" role="alert">
            <a class="font-weight-normal text-justify">Generar un documento de solvencia de biblioteca en caso de que el estudiante no se encuentre con cargos por mora en la entrega tardia de ejemplares ni se encuentre en posesion de alugn ejemplar aun por devolver:</a>
          </div>
            <form id="reportSolvencia" name="reportSolvencia">
              <div class="input-group mb-3" style="margin-top: 5px;">
                <div class="input-group-prepend rounded-0">
                  <label class="input-group-text rounded-0" for="carnetCod"> Carnet: </label>
                </div>
                <input type="text" class="form-control" id="carnetCod" name="carnetCod" placeholder="Carnet del estudiante" aria-label="Carnet" aria-describedby="Carnet INPUT">
                 <button class="btn btn-outline-secondary rounded-0" type="button" onclick="reportGenSolvencia()">
                  <img src="img/icons/PDF_32.png" width="30" height="30" alt="" > Generar .PDF
                </button>
              </div>
             
            </form>
            <div id="lastGenSolvencia"></div>
            <div id="printReturnSolvencia"> </div>
            <div class="alert alert-danger" role="alert">
                <p class="font-weith-bold" >Si el estudiante posee algun tipo de cargo por mora en la entrega tardia de ejemplares prestados por la biblioteca y/o posee ejemplares aun por devolver, el generador de solvencias de biblioteca creara un informe sobre los incidentes que impiden la obtencion de su solvencia </p>

              <p class="font-weith-bold">Requisitos para generar una solvencia de biblioteca:</p>
              <p>* El estudiante debera devolver cualquier libro prestado en biblioteca, si los hay.</p>
              <p>* El estudiante debera pagar cualquier multa por retraso en la entrega de los libros
              prestados en biblioteca, si los hay</p>
              <p>* La cuenta del estudiante debe encontrarse activa. (No haber sido desactivada previamente a la solicitud de solvencia por un bibliotecario, la cuenta tendra que ser reactivada de ser el caso)</p>
              
            </div>
           
          </div>
        </div> </div>
          <div class="tab-pane fade" id="nav-Cancelar" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
              <div class="col-md-12">
                 <div class="alert alert-light" role="alert">
                 <a class="font-weight-normal text-justify">Cancelar multas impuestas a un estudiante, si las hay.</a>
              </div>
              <form id="reportSolvenciaCancel" name="reportSolvenciaCancel">
                <div class="input-group mb-3" style="margin-top: 5px;">
                  <div class="input-group-prepend rounded-0">
                    <label class="input-group-text rounded-0" for="carnetCod"> Carnet: </label>
                  </div>
                  <input type="text" class="form-control" id="carnetCodCancelSolv" name="carnetCodCancelSolv" placeholder="Carnet del estudiante" aria-label="Carnet" aria-describedby="Carnet INPUT">
                   <button class="btn btn-outline-secondary rounded-0" type="button" onclick="cancelarSolvencias()">
                    Buscar
                  </button>
                </div>             
              </form>
            <div id="lastCanSolvencia"></div>
            <div id="printReturnCancelarSolvencia"></div>
            <div class="alert alert-danger" role="alert">
                <p class="font-weith-bold" >Cancelar multas permitiria al usuario obtener una solvencia valida en la pestaña para Generar Solvencias</p>

              <p class="font-weith-bold">Requisitos para cancelar una multa de biblioteca:</p>
              <p>* El estudiante debera devolver cualquier libro prestado en biblioteca, si los hay.</p>
              <p>* El estudiante debera cancelar la suma por motivos de multa indicada en el reporte de solvencia.</p>
             
              
            </div>
            </div>
          </div>
          
        </div>

      </div>
      
      <div class="card-footer">
        <div class="text-muted">
          Reportes - Solvencias
        </div>
      </div>
    </div>
  </div>

  <!--CutContent-->
</div>  

<script>
  
  
$(function(){
     $("#carnetCod").keyup(function(e){
          if (e.keyCode === 13) {
              reportGenSolvencia();
          }
     });

});

$(function(){
     $("#carnetCodCancelSolv").keyup(function(e){
          if (e.keyCode === 13) {
              cancelarSolvencias();
          }
     });

});
</script>