<?php
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
?>  
	<div class="dropdown-divider"></div>
	<div style="text-align: center"> <p class="text-muted">Libros - Actividades de hoy</p> </div>
	<div class="dropdown-divider"></div> 
<?php
	$count=0;
    $formatDateSend= "%Y % c %d";
    $sql="SELECT COUNT($varprestcod) FROM $varresumenlibroprestamo WHERE DATE_FORMAT($varprestfec,'$formatDateSend') = DATE_FORMAT(NOW(), '$formatDateSend' );";
    $profileData=mysqli_query($conexion,$sql);
    $count = mysqli_fetch_array($profileData);
    $sql="SELECT COUNT($varprestcodequi) FROM $varresumenequipoprestamo WHERE DATE_FORMAT($varprestfecequi,'$formatDateSend') = DATE_FORMAT(NOW(), '$formatDateSend' );";
    $profileData=mysqli_query($conexion,$sql);
    $countEquip= mysqli_fetch_array($profileData);
    $countPrint=$count[0]+$countEquip[0];
?>
		<div class="row">
			<button type="button" class="btn btn-info btn-block" data-toggle="tooltip" data-placement="right" title="Total de Prestamos realizados este dia">
				<span class="badge badge-light"><?php  echo $countPrint;?></span> <small>  Prestamos Realizados </small>
		 	</button>
		</div>
	
  <br>
<?php
	$sql="SELECT COUNT($varprestcod) FROM $varresumenlibroprestamo WHERE $varprestest = '1' AND  DATE_FORMAT($varprestfechafin,'$formatDateSend') = DATE_FORMAT(NOW(), '$formatDateSend' );";
	$profileData=mysqli_query($conexion,$sql);
	$count = mysqli_fetch_array($profileData);
?>
	
		<div class="row">
			<button type="button" class="btn btn-info btn-block"  data-toggle="tooltip" data-placement="right" title="Total de devoluciones realizadas este dia">
				<span class="badge badge-light"><?php  echo $count[0];?></span> <small>  Devoluciones Realizadas </small>
		 	</button>

		</div>
	
	<br>
	
<?php
	$sql="SELECT COUNT($varprestcod) FROM $varresumenlibroprestamo WHERE $varprestest = '0' AND  DATE_FORMAT($varprestdev,'$formatDateSend') = DATE_FORMAT(NOW(), '$formatDateSend' );";
	$profileData=mysqli_query($conexion,$sql);
	$count = mysqli_fetch_array($profileData);
?>
	
		<div class="row">
			<button type="button" class="btn btn-warning btn-block"  data-toggle="tooltip" data-placement="right" title="Prestamos con limite de entrega para hoy">
				<span class="badge badge-light"><?php  echo $count[0];?></span> <small> Para devolver hoy </small>
		 	</button>

		</div>
	
<?php
	
?>

<script>
	
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>


