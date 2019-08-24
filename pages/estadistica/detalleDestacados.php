<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
?>
<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#libros" role="tab" aria-controls="pills-home" aria-selected="true">Libros</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#usuarios" role="tab" aria-controls="pills-profile" aria-selected="false">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#secciones" role="tab" aria-controls="pills-contact" aria-selected="false">Secciones</a>
  </li>
</ul>    
<div class="tab-content" id="estadisticaContent">
  <div class="tab-pane fade show active" id="libros" role="tabpanel" aria-labelledby="general-tab">       
    <table class="table table-striped">
      <thead style="background-color: #fff7db">
          <th colspan="2"> Top Libros mas prestados</th>
          <th colspan="1"># Prestamos</th>
      </thead>
      <tbody>
        <?php 
          $selTable=mysqli_query($conexion,"
                SELECT libro.$varlibcod, libro.$varlibtit, count(ejemplares.$varejemcod) as counter FROM $tablaLibros as libro
                INNER JOIN $tablaEjemplares as ejemplares on libro.$varlibcod=ejemplares.$varejemlibcod
                INNER JOIN $vardetallesprestamolibro as detalle on ejemplares.$varejemcod=detalle.$varejemcodlib
                INNER JOIN $varresumenlibroprestamo as resumen on resumen.$varprestcod=detalle.$varprestcodlib
                WHERE DATE_FORMAT(resumen.$varprestfec,'%Y') = DATE_FORMAT(NOW(), '%Y' )
                GROUP BY libro.$varlibcod
                ORDER BY counter DESC
                LIMIT 10;");
        if (mysqli_num_rows($selTable)==0){
          echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'> La busqueda no devolvió ningún resultado </div>";
        } else{
          $place=1;
          while ($dataLibros=mysqli_fetch_assoc($selTable)){
            ?>
            <tr>           
              <td><?php echo  $place."º";?> </td>                        
              <td><?php echo $dataLibros[$varlibtit];?>  </td>
              <td style="text-align:right;"><?php echo $dataLibros['counter'];?> </td>
            </tr>
            <?php
            $place=$place+1; 
          }
        } ?>
      </tbody>
    </table>                    
  </div>
  <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="reportes-tab">         
    <table class="table table-striped">
      <thead style="background-color: #fff7db">
          <th colspan="2"> Top estudiantes mas concurrentes</th>
          <th colspan="1"># Prestamos</th>
      </thead>
      <tbody>
        <?php 
          $selTable=mysqli_query($conexion,"
            SELECT usuarios.$varPriNombre, usuarios.$varSegNombre,usuarios.$varSecAula, usuarios.$varAnoBachi, usuarios.$varTipBachi,COUNT(detalle.$vardetcodlib) as counter
            FROM $tablaUsuarios as usuarios
            INNER JOIN $varresumenlibroprestamo as resumen on resumen.$varusuCodigoF=usuarios.$varUsuCodigo
            INNER JOIN $vardetallesprestamolibro as detalle on resumen.$varprestcod=detalle.$varprestcodlib
            WHERE usuarios.$varNivel=3 AND DATE_FORMAT(resumen.$varprestfec,'%Y') = DATE_FORMAT(NOW(), '%Y' )
            GROUP by usuarios.$varUsuCodigo
            ORDER BY counter DESC
            LIMIT 10;");
          if (mysqli_num_rows($selTable)==0){
            echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'> La busqueda no devolvió ningún resultado </div>";
          } else{
            $place=1;
            while ($dataLibros=mysqli_fetch_assoc($selTable)){
              ?>
              <tr>                    
                  <td><?php echo  $place."º";?> </td>                        
                  <td><?php echo $dataLibros[$varPriNombre]." ".$dataLibros[$varSegNombre];?></td>
                  <td style="text-align:right;"><?php echo $dataLibros['counter'];?> </td>                   
              </tr>
              <?php
              $place=$place+1; 
            }
          } 
        ?>
      </tbody>
    </table>
  </div>
    <div class="tab-pane fade" id="secciones" role="tabpanel" aria-labelledby="solvencias-tab">
      <table class="table table-striped">
        <thead style="background-color: #fff7db">
          <th colspan="2"> Top clases mas concurrentes</th>
          <th colspan="1"># Prestamos</th>
        </thead>       
        <tbody>
          <?php 
          $selTable=mysqli_query($conexion,"
            SELECT usuarios.$varSecAula, usuarios.$varAnoBachi, usuarios.$varTipBachi,COUNT(detalle.$vardetcodlib) as counter
            FROM $tablaUsuarios as usuarios
            INNER JOIN $varresumenlibroprestamo as resumen on resumen.$varusuCodigoF=usuarios.$varUsuCodigo
            INNER JOIN $vardetallesprestamolibro as detalle on resumen.$varprestcod=detalle.$varprestcodlib
            WHERE usuarios.$varNivel=3 AND DATE_FORMAT(resumen.$varprestfec,'%Y') = DATE_FORMAT(NOW(), '%Y' )
            GROUP by usuarios.$varSecAula,usuarios.$varAnoBachi,usuarios.$varTipBachi
            ORDER BY counter DESC
            LIMIT 10;");
          if (mysqli_num_rows($selTable)==0){
            echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'> La busqueda no devolvió ningún resultado </div>";
          }else{
            $place=1;
            while ($dataLibros=mysqli_fetch_assoc($selTable)){
              $ANIO="";
              switch ($dataLibros[$varAnoBachi]) {
                case 0:
                   $ANIO="1º";
                   break;            
                case 1:
                    $ANIO="2º";
                    break;
                case 2:
                   $ANIO="3º";
                   break;                                                                        
              } 
              $BACHI=""; 
              switch ($dataLibros[$varTipBachi]) {
                case 0:
                    $BACHI="Salud";
                    break;
                case 1:
                    $BACHI="Mecanica";
                    break;
                case 2:
                    $BACHI="Contaduria";
                    break;                                                                                    
              } 
              $SECCION=""; 
              switch ($dataLibros[$varSecAula]) {
                case 0:
                   $SECCION="sección A";
                   break;
                case 1:
                   $SECCION="sección B";
                   break;
                case 2:
                   $SECCION="sección C";
                  break;
                case 3:
                   $SECCION="sección D";
                   break;                                           
              }
              ?>
              <tr>
                <td><?php echo  $place."º";?> </td>                        
                <td><?php echo $BACHI." - ".$ANIO."  ".$SECCION;?>  </td>
                <td style="text-align:right;"><?php echo $dataLibros['counter'];?> </td>
              </tr>
              <?php
              $place=$place+1; 
            }
          } 
          ?>
      </tbody>
    </table>
  </div>
</div>


   


    
	

	