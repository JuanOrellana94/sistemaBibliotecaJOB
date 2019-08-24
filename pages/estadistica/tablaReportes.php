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
  <div class="col-lg-4 col-md-6 mx-auto d-flex align-items-stretch" style="width:100%;margin-bottom:9px;">
    <div class="card">
      <div class="card-header">
        <h5>Reporte - Actividad bibliotecaria mensual</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <a class="font-weight-normal text-justify">Generar un Informe de actividad, cambios y detalles de relevancia referentes a los libros adiquiridos durante el mes de:</a>
            <?php 
              $mesDate=date("n");
              $mesName=getmonth($mesDate);
            ?>
            <form id="reportMes" name="reportMes">
              <div class="input-group" style="margin-top: 5px;">
                  <div class="input-group-prepend">
                  <label class="input-group-text rounded-0" for="mesSelect"> Mes</label>
                  </div>
                  <select class="custom-select rounded-0" id="mesSelect">                              
                    <option selected value="<?php echo $mesDate;?>"><?php echo $mesName;?></option>                                
                      <?php
                        $limitMonth=12;
                        $counter=1;
                        for($i = $counter; $i <= $limitMonth; $i++){
                          $mesName=getmonth($i);
                          echo "<option value='$i'>$mesName</option>";
                        }
                      ?>
                  </select>                                     
              </div>
              <div class="input-group mb-3" style="margin-top: 5px;">
                <div class="input-group-prepend rounded-0">
                <label class="input-group-text rounded-0" for="yearSelect"> Año</label>
                </div>
                <?php
                  $currentYear=date("Y");
                ?>
                <select class="custom-select rounded-0" id="yearSelect">                 
                  <option selected value="<?php echo $currentYear;?>"><?php echo $currentYear;?> </option>
                  <?php
                    $limitYear=$currentYear-10;
                    $counter=$currentYear-1;
                    for($i = $counter ; $i > $limitYear; $i--){
                      echo "<option value='$i'>$i</option>";
                    }
                  ?>
                </select>
                <button class="btn btn-outline-secondary rounded-0" type="button">
                  <img src="img/icons/PDF_32.png" width="30" height="30" alt=""> Generar .PDF
                </button>
              </div>
            </form>
            <div id="lastGenMes"></div>
            <div id="printReturn"></div>
            <div class="alert alert-info" role="alert">
              <p>Esta version de informe bibliotecario contiene:</p>
              <p>* Numero de libros ingresado y/o adquiridos, al sistema en el mes y año seleccionado</p>
              <p>* Numero de ejemplares registrados a cada libro en el mes y año seleccionado</p>
              <p>* Total de libros extraviados en el mes y año seleccionado</p>
              <p>* Total de libros registrados</p>
            </div>
          </div>
        </div> 
      </div>
      <div class="card-footer">
        <div class="text-muted">
           Reportes - Mensual
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 mx-auto d-flex align-items-stretch" style="width:100%;margin-bottom:9px;">
    <div class="card">
      <div class="card-header">
        <h5>Reporte - Actividad bibliotecaria anual</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <a class="font-weight-normal text-justify">Generar un Informe de actividad, cambios y detalles de relevancia referentes a los libros adiquiridos durante el año de:</a>
            <form id="reportYear" name="reportYear">
              <div class="input-group mb-3" style="margin-top: 5px;">
                <div class="input-group-prepend rounded-0">
                <label class="input-group-text rounded-0" for="yearSelect"> Año</label>
                </div>
                <?php
                  $currentYear=date("Y");
                ?>
                <select class="custom-select rounded-0" id="yearSelectMain" name="yearSelectMain">                 
                  <option selected value="<?php echo $currentYear;?>"><?php echo $currentYear;?> </option>
                  <?php
                    $limitYear=$currentYear-10;
                    $counter=$currentYear-1;
                    for($i = $counter ; $i > $limitYear; $i--){
                      echo "<option value='$i'>$i</option>";
                    }
                  ?>
                </select>
                <button class="btn btn-outline-secondary rounded-0" type="button" onclick="reportGen()">
                  <img src="img/icons/PDF_32.png" width="30" height="30" alt=""> Generar .PDF
                </button>
              </div>
            </form>
            <div id="lastGenYear"></div>
            <div id="printReturn"></div>
            <div class="alert alert-warning" role="alert">
              <p>Esta version de informe bibliotecario contiene:</p>
              <p>* Numero de libros ingresado y/o adquiridos, al sistema en el  año seleccionado</p>
              <p>* Numero de ejemplares registrados a cada libro en el año seleccionado</p>
              <p>* Total de libros extraviados en el año seleccionado</p>
              <p>* Total de libros registrados</p>

            </div>
          </div>
        </div> 
      </div>
      
      <div class="card-footer">
        <div class="text-muted">
          Reportes - Anual
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12 mx-auto d-flex align-items-stretch" style="margin-bottom: 9px;">
    <div class="card" >
      <div class="card-header">
        <h5>Reporte - Solvencia de Estudiante</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <a class="font-weight-normal text-justify">Generar un documento de solvencia de biblioteca en caso de que el estudiante no se encuentre con cargos por mora en la entrega tardia de ejemplares ni se encuentre en posesion de alugn ejemplar aun por devolver:</a>
            <form id="reportSolvencia" name="reportSolvencia">
              <div class="input-group mb-3" style="margin-top: 5px;">
                <div class="input-group-prepend rounded-0">
                  <label class="input-group-text rounded-0" for="carnetSelect"> Carnet: </label>
                </div>
                <input type="text" class="form-control" id="carnetCod" name="carnetCod" placeholder="Carnet o Codigo del estudiante" aria-label="Carnet" aria-describedby="Carnet INPUT">

              </div>
              <div class="input-group mb-3" style="margin-top: 5px;">
                <div class="input-group-prepend rounded-0">
                <label class="input-group-text rounded-0" for="yearSelect"> Año</label>
                </div>
                <?php
                  $currentYear=date("Y");
                ?>
                <select class="custom-select rounded-0" id="yearSelect">                 
                  <option selected value="<?php echo $currentYear;?>"><?php echo $currentYear;?> </option>
                  <?php
                    $limitYear=$currentYear-10;
                    $counter=$currentYear-1;
                    for($i = $counter ; $i > $limitYear; $i--){
                      echo "<option value='$i'>$i</option>";
                    }
                  ?>
                </select>
                <button class="btn btn-outline-secondary rounded-0" type="button">
                  <img src="img/icons/PDF_32.png" width="30" height="30" alt=""> Generar .PDF
                </button>
              </div>
            </form>
            <div id="lastGenSolvencia"></div>
            <div id="printReturn"></div>
            <div class="alert alert-danger" role="alert">
                <p class="font-weith-bold" >Si el estudiante posee algun tipo de cargo por mora en la entrega tardia de ejemplares prestados por la biblioteca y/o posee ejemplares aun por devolver, el generador de solvencias de biblioteca creara un informe sobre los incidentes que impiden la obtencion de su solvencia </p>

              <p class="font-weith-bold">Requisitos para generar una solvencia de biblioteca:</p>
              <p>* El estudiante debera devolver cualquier libro prestado en biblioteca, si los hay.</p>
              <p>* El estudiante debera pagar cualquier multa por retraso en la entrega de los libros
              prestados en biblioteca, si los hay</p>
              <p>* La cuenta del estudiante debe encontrarse activa. (No haber sido desactivada previamente a la solicitud de solvencia por un bibliotecario, la cuenta tendra que ser reactivada de ser el caso)</p>
              
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