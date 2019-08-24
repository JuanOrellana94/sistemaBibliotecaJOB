<!--INICIO CONTENEDOR DE CATALOGO DE Estantes-->
<div class="row ">
  <div class="col-lg-4 col-md-6 col-sm-10 d-flex align-items-stretch" >
    <div class="card t-100" style="margin-bottom:9px;">
      <div class="card-header">
        <ul class="nav nav-tabs  nav-fill" id="myTab" role="tablist">     
          <li class="nav-item">
            <a class="nav-link active" id="gen-tab" data-toggle="tab" href="#actGen" role="tab" aria-controls="all" aria-selected="true"> <h6> Actividad del mes</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="all-tab" data-toggle="tab" href="#actAll" role="tab" onclick="datainfoAll();" aria-controls="all" aria-selected="true"> <h6>Datos generales</h6></a>
          </li>
      </ul>
      </div>      
      <div class="tab-content" id="tabGenerales">
        <div class="tab-pane fade show active" id="actGen" role="tabpanel" aria-labelledby="gen-tab">
          <form id="formMes">              
            <div class="input-group rounded-0">
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
              ?>
              <div class="input-group-prepend">
                <label class="input-group-text rounded-0" for="mesSelect"> Mes</label>
              </div>
              <select class="custom-select rounded-0" id="mesSelect">
          
                <option selected value="<?php echo $varDate;?>"><?php echo $monthName;?></option>
                <?php
                  $limitMonth=12;
                  $counter=1;
                  for($i = $counter; $i <= $limitMonth; $i++){
                    if ($i==1) {
                      $monthName="Enero";
                    } else if ($i==2) {
                      $monthName="Febrero";
                    } else if ($i==3) {
                      $monthName="Marzo";
                    } else if ($i==4) {
                      $monthName="Abril";
                    } else if ($i==5) {
                      $monthName="Mayo";
                    } else if ($i==6) {
                      $monthName="Junio";
                    } else if ($i==7) {
                      $monthName="Julio";
                    } else if ($i==8) {
                      $monthName="Agosto";
                    } else if ($i==9) {
                      $monthName="Septiembre";
                    } else if ($i==10) {
                      $monthName="Octubre";
                    } else if ($i==11) {
                      $monthName="Noviembre";
                    }else if ($i==12) {
                      $monthName="Diciembre";
                    }
                  echo "<option value='$i'>$monthName</option>";
                  }
                ?>              
              </select>
            </div>
          </form>
          <div id="dataTabla"><img src="img/structures/replace.gif" style="max-width: 60%;"></div>
        </div>
        <div class="tab-pane fade" id="actAll" role="tabpanel" aria-labelledby="all-tab">
          <div id="infoAll">
            <img src="img/structures/replace.gif" style="max-width: 60%;">
          </div>
        </div>
      </div>
      <div class="card-body"></div>            
      <div class="card-footer">
       <p class="text-muted">Informacion mostrada es solamente sobre el mes y año seleccionado</p>
      </div>
    </div>   
  </div>
  <div class="col-lg-4 col-md-6 col-sm-10 d-flex align-items-stretch">
    <div class="card t-100"  style="margin-bottom:9px;">
      <div class="card-header" >
         <h4>Destacados</h4>
      </div>
      
      <div id="dataDestacados"><img src="img/structures/replace.gif" style="max-width: 60%;"></div>
      <div class="card-body"></div>
      <div class="card-footer"> 
        <small>
          <p class="text-muted text-justify" > Listados de los usuarios/clases que mas prestamos han realizado con registros dentro del sistema bibliotecario</p> 
        </small>
      </div>
    </div>  
    <?php
      $currentYear=date("Y");
    ?>
  </div>
  <div class="col-lg-4 col-md-12 col-sm-10 d-flex align-items-stretch">
    <div class="card t-100"  style="margin-bottom:9px;">
      <div class="card-header">
        <h4 class="text-muted">Graficos comparativos, Año: <?php echo $currentYear; ?></h4>
      </div>
      <div class="card-body">
        <select class="custom-select graphSelect" id="typeSelectGraph">
          <option value="1">Libros - Prestamos</option>
          <option value="2">Libros - Devoluciones</option>
          <option value="3">Equipos - Prestamos</option>
          <option value="4">Equipos- Devoluciones</option>
        </select>  
        <canvas id="chartPG" width="400" height="400"></canvas>   
      </div>
      <div class="card-footer">
        <p class="text-muted">Informacion basada en el total de prestamos realizados cada mes durante el año concurrente</p>
      </div>
    </div>  
  </div>
</div>
<script>
  window.onload = function () {
    dataMes();
  };
  $(document).ready(function () {
            showGraphPrestamo();
        });
  $(function(){
    $('.custom-select').trigger('change'); //This event will fire the change event. 
    $('.custom-select').change(function(){
      dataMes();      
    });
  });

  $(function(){
    $('#typeSelectGraph').trigger('change'); //This event will fire the change event. 
    $('#typeSelectGraph').change(function(){
      showGraphPrestamo();       
    });
  });
function showGraphPrestamo()
  {
    {
      var tipoSel=$("#typeSelectGraph").val();

      //alert(busqueda);
      $.post("pages/estadistica/graphPrestamo.php?tipo="+tipoSel,
        function (data){
          console.log(data);
          var name = [];
          var marks = [];
          var monthName="None";
            for (var i in data) {
              if (data[i].Month==1) {
                monthName="Enero";
              } else if (data[i].Month==2) {
                 monthName="Febrero";
              } else if (data[i].Month==3) {
                 monthName="Marzo";
              } else if (data[i].Month==4) {
                monthName="Abril";
              } else if (data[i].Month==5) {
                 monthName="Mayo";
              } else if (data[i].Month==6) {
                 monthName="Junio";
              } else if (data[i].Month==7) {
                 monthName="Julio";
              } else if (data[i].Month==8) {
                 monthName="Agosto";
              } else if (data[i].Month==9) {
                 monthName="Septiembre";
              }  if (data[i].Month==10) {
                 monthName="Octubre";
              } else if (data[i].Month==11) {
                monthName="Noviembre";
              }else if (data[i].Month==12) {
                 monthName="Diciembre";
              }
              name.push(monthName);
              marks.push(data[i].counter);
            }
            var chartdata = {
              labels: name,
              datasets: [{
                label: 'Cantidad',
                backgroundColor: '#003764',
                borderColor: '#003764',
                hoverBackgroundColor: '#0070cc',
                hoverBorderColor: '#0070cc',
                data: marks
              }]
            };
            //var graphTarget = document.getElementById('chartPG').getContext('2d');
            var graphTarget = document.getElementById("chartPG").getContext("2d");
            if(window.bar != undefined) 
              window.bar.destroy(); 
              window.bar  = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata,
                options: {
                  scales: {
                    yAxes: [{
                      ticks: {
                        beginAtZero: true,
                        userCallback: function(label, index, labels) {
                        // when the floored value is the same as the value we have a whole number
                          if (Math.floor(label) === label) {
                            return label;
                          }
                        },
                      }
                    }],
                  },
                }
              });
          });
      }
  }
</script>
