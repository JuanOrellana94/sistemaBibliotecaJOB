	<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");



	if (isset($_GET["year"])) { 
		$yearSelect  = $_GET["year"]; 
	} else {
		$yearSelect=date("Y"); 
	};

	if (isset($_GET["month"])) { 
		$monthSelect  = $_GET["month"]; 
	} else {
		$monthSelect= date("n"); 
	};

	//$count=0;
   // $formatDateSend= "%Y % c %d";
   // $sql="SELECT COUNT($varprestcod) FROM $varresumenlibroprestamo WHERE DATE_FORMAT($varprestfec,'$formatDateSend') = DATE_FORMAT(NOW(), '$formatDateSend' );";
    //$profileData=mysqli_query($conexion,$sql);
    //$count = mysqli_fetch_array($profileData);


    ?>

    <table class="table table-bordered ">
    	<thead>
    		<tr>
    			
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td colspan="2"></td>
    		</tr>
    		<tr>
                <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT(detalle.$vardetcodlib) FROM $vardetallesprestamolibro as detalle
                        INNER JOIN $varresumenlibroprestamo as resumen on detalle.$varprestcodlib= resumen.$varprestcod
                        WHERE DATE_FORMAT(resumen.$varprestfec,'%c')='$monthSelect' AND DATE_FORMAT($varprestfec,'%Y')='$yearSelect';";
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>
    			<td>Libro prestado: <span class="badge badge-success float-right"><?php echo  $count[0] ?></span></td>
                 <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT(ejemplar.$varejemcod) FROM $vardetallesprestamolibro as detalle
                        INNER JOIN $varresumenlibroprestamo as resumen on detalle.$varprestcodlib= resumen.$varprestcod
                        INNER JOIN $tablaEjemplares as ejemplar on ejemplar.$varejemcod=detalle.$varejemcodlib
                        WHERE DATE_FORMAT(resumen.$varprestfechafin,'%c')='$monthSelect' AND DATE_FORMAT(resumen.$varprestfechafin,'%Y')='$yearSelect'
                        AND ejemplar.$varejemestu='0';";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>
    			<td>Libro devuelto: <span class="badge badge-primary float-right"><?php echo  $count[0] ?></td>
    		</tr>
    		<tr>
                <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT(detalle.$vardetcodlib) FROM $vardetallesprestamolibro as detalle
                        INNER JOIN $varresumenlibroprestamo as resumen on detalle.$varprestcodlib= resumen.$varprestcod
                        INNER JOIN $tablaEjemplares as ejemplar on ejemplar.$varejemcod=detalle.$varejemcodlib
                        WHERE DATE_FORMAT(resumen.$varprestfec,'%c')='$monthSelect' AND DATE_FORMAT(resumen.$varprestfec,'%Y')='$yearSelect'
                        AND ejemplar.$varejemestu='1';";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>
    			<td>Libro sin devolver:  <span class="badge badge-warning float-right"><?php echo  $count[0] ?></td>

                <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT($varejemcod) FROM $tablaEjemplares   
                        WHERE (DATE_FORMAT($varejemfecest,'%c')='$monthSelect' AND DATE_FORMAT($varejemfecest,'%Y')='$yearSelect')
                        AND ($varejemestu='3');";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>

    			<td> Libro perdido: <span class="badge badge-warning float-right"><?php echo  $count[0] ?></td>
    		</tr>
    		<tr>
    			<?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT($varejemcod) FROM $tablaEjemplares   
                        WHERE (DATE_FORMAT($varejemfecest,'%c')='$monthSelect' AND DATE_FORMAT($varejemfecest,'%Y')='$yearSelect')
                        AND ($varejemconfis='4');";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>

                <td> Libro dañado: <span class="badge badge-warning float-right"><?php echo  $count[0] ?></td>
    		</tr>
    		<tr>
                <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT($varlibcod) FROM $tablaLibros                  
                        WHERE DATE_FORMAT($varlibfecreg,'%c')='$monthSelect' AND DATE_FORMAT($varlibfecreg,'%Y')='$yearSelect'
                      ;";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                //echo $sql;
                ?>                
    			<td>Nuevo libro: <span class="badge badge-secondary float-right"><?php echo  $count[0];?></td>

                     <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT($varejemcod) FROM $tablaEjemplares                  
                        WHERE DATE_FORMAT($varejemfecreg,'%c')='$monthSelect' AND DATE_FORMAT($varejemfecreg,'%Y')='$yearSelect'
                      ;";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                //echo $sql;
                ?>       
    			<td>Nuevo ejemplar: <span class="badge badge-secondary float-right"><?php echo  $count[0];?></td>
    		</tr>
            <tr>
                <td colspan="2"></td>
            </tr>

            <tr>
                <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT(detalle.$vardetcodequi) FROM $vardetallesprestamoequipo as detalle
                        INNER JOIN $varresumenequipoprestamo as resumen on detalle.$varprestcodequiDet= resumen.$varprestcodequi
                        WHERE DATE_FORMAT(resumen.$varprestfecequi,'%c')='$monthSelect' AND DATE_FORMAT($varprestfecequi,'%Y')='$yearSelect';";
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>
                <td>Existencia prestada: <span class="badge badge-success float-right"><?php echo  $count[0] ?></span></td>
                 <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT(detalle.$vardetcodequi) FROM $vardetallesprestamoequipo as detalle
                        INNER JOIN $varresumenequipoprestamo as resumen on detalle.$varprestcodequiDet= resumen.$varprestcodequi
                        INNER JOIN $tablaExistenciaequipo as existencia on existencia.$varexistcod=detalle.$varexistcodDet
                        WHERE DATE_FORMAT(resumen.$varprestfechafinEquipo,'%c')='$monthSelect' AND DATE_FORMAT(resumen.$varprestfechafinEquipo,'%Y')='$yearSelect'
                        AND (existencia.$varexistestu='0' OR resumen.$varprestestequi='1');";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>
                <td>Existencia devuelta: <span class="badge badge-primary float-right"><?php echo  $count[0] ?></td>
            </tr>
            <tr>
                <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT(detalle.$vardetcodequi) FROM $vardetallesprestamoequipo as detalle
                        INNER JOIN $varresumenequipoprestamo as resumen on detalle.$varprestcodequiDet= resumen.$varprestcodequi
                        INNER JOIN $tablaExistenciaequipo as existencia on existencia.$varexistcod=detalle.$varexistcodDet
                        WHERE DATE_FORMAT(resumen.$varprestfecequi,'%c')='$monthSelect' AND DATE_FORMAT(resumen.$varprestfecequi,'%Y')='$yearSelect'
                        AND existencia.$varexistestu='1';";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>
                <td>Existencia sin devolver:  <span class="badge badge-warning float-right"><?php echo  $count[0] ?></td>

                <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT($varexistcod) FROM $tablaExistenciaequipo   
                        WHERE (DATE_FORMAT($varexistfecest,'%c')='$monthSelect' AND DATE_FORMAT($varexistfecest,'%Y')='$yearSelect')
                        AND ($varexistestu='3');";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>

                <td>Existencia perdida: <span class="badge badge-warning float-right"><?php echo  $count[0] ?></td>
            </tr>
                <tr>
                <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT($varexistcod) FROM $tablaExistenciaequipo   
                        WHERE (DATE_FORMAT($varexistfecreg,'%c')='$monthSelect' AND DATE_FORMAT($varexistfecreg,'%Y')='$yearSelect')
                        AND ($varexistconfis='4');";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                    //echo $sql;
                 ?>

                <td>Existencia dañada: <span class="badge badge-warning float-right"><?php echo  $count[0] ?></td>
            </tr>
            <tr>
                <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT($varequicod) FROM $tablaEquipo                  
                        WHERE DATE_FORMAT($varequifecreg,'%c')='$monthSelect' AND DATE_FORMAT($varequifecreg,'%Y')='$yearSelect'
                      ;";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                //echo $sql;
                ?>                
                <td>Nueva existencia: <span class="badge badge-secondary float-right"><?php echo  $count[0];?></td>

                     <?php 
                    $formatDateSend= "%Y % c %d";
                    $sql="SELECT COUNT($varexistcod) FROM $tablaExistenciaequipo                  
                        WHERE DATE_FORMAT($varexistfecreg,'%c')='$monthSelect' AND DATE_FORMAT($varexistfecreg,'%Y')='$yearSelect'
                      ;";                    
                    $profileData=mysqli_query($conexion,$sql);
                    $count = mysqli_fetch_array($profileData);

                //echo $sql;
                ?>       
                <td>Nueva existencia: <span class="badge badge-secondary float-right"><?php echo  $count[0];?></td>
            </tr>


            

    	</tbody>

    </table>


    
	

	