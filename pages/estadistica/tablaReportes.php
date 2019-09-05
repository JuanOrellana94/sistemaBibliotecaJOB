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
  <div class="col-lg-4 col-md-6 col-sm-12  d-flex align-items-stretch" style="margin-bottom:9px;">
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
                  <label class="input-group-text rounded-0" for="mesSelectInput"> Mes</label>
                  </div>
                  <select class="custom-select rounded-0" id="mesSelectInput" name="mesSelectInput">                              
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
                <select class="custom-select rounded-0" id="yearSelectMonth" name="yearSelectMonth">                 
                  <option selected value="<?php echo $currentYear;?>"><?php echo $currentYear;?> </option>
                  <?php
                    $limitYear=$currentYear-10;
                    $counter=$currentYear-1;
                    for($i = $counter ; $i > $limitYear; $i--){
                      echo "<option value='$i'>$i</option>";
                    }
                  ?>
                </select>
                <button class="btn btn-outline-primary rounded-0" type="button" onclick="reportGenMnoth()">
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
  <div class="col-lg-4 col-md-6  col-sm-12  d-flex align-items-stretch" style="margin-bottom:9px;">
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
                <button class="btn btn-outline-primary rounded-0" type="button" onclick="reportGen()">
                  <img src="img/icons/PDF_32.png" width="30" height="30" alt=""> Generar .PDF
                </button>
              </div>
            </form>
            <div id="lastGenYear"></div>
            <div id="printReturnanual"></div>
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
  <div class="col-lg-4 col-md-6  col-sm-12  d-flex align-items-stretch" style="margin-bottom:9px;">
    <div class="card">
      <div class="card-header">
        <h5>Reporte - Prestamos de biblioteca</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <a class="font-weight-normal text-justify">Generar un Informe de actividad, cambios y detalles de relevancia referentes a los prestamos de libros durante el año:</a>
            <form id="reportYearProcs" name="reportYearProcs">
              <div class="input-group mb-3" style="margin-top: 5px;">
                <div class="input-group-prepend rounded-0">
                <label class="input-group-text rounded-0" for="yearSelect"> Año</label>
                </div>
                <?php
                  $currentYear=date("Y");
                ?>
                <select class="custom-select rounded-0" id="yearSelectProcs" name="yearSelectProcs">                 
                  <option selected value="<?php echo $currentYear;?>"><?php echo $currentYear;?> </option>
                  <?php
                    $limitYear=$currentYear-10;
                    $counter=$currentYear-1;
                    for($i = $counter ; $i > $limitYear; $i--){
                      echo "<option value='$i'>$i</option>";
                    }
                  ?>
                </select>
                <button class="btn btn-outline-danger rounded-0" type="button" onclick="reportPresProc()">
                  <img src="img/icons/PDF_32.png" width="30" height="30" alt=""> Generar .PDF
                </button>
              </div>
            </form>
            <div id="lastGenYear"></div>
            <div id="printReturnanual"></div>
            <div class="alert alert-warning" role="alert">
              <p>Este reporte contiene:</p>
              <p>* Listado de los prestamos realizados, activos y finalizados, en el sistema durante el  año seleccionado</p>
              <p>* Conteo de los prestamos realizados, incluyendo estudiantes y personal</p>
              <p>* Conteo de la multa acumulada de los prestamos realizados, activos y finalizados, que fueron devueltos o estan en retraso durante el año selecccionado</p>
           

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

</script>