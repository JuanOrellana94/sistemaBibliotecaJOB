<?php
header('Content-Type: application/json');

include("../../src/libs/vars.php");
include("../../src/libs/sessionControl/conection.php");

//if (isset($_GET["busqueda"])) { 
//		$yearSelect  = $_GET["busqueda"]; 
//	} else {
//		$yearSelect='2019';
//	};

if (isset($_GET["tipo"])) { 
		$typeSelect  = $_GET["tipo"]; 
	} else {
		$typeSelect='2	';
	};


if ($typeSelect==1) {
	$yearSelect=date("Y");
	
	 $sqlQuery="SELECT DATE_FORMAT(resumen.$varprestfec,'%c') as Month, COUNT(detalle.$vardetcodlib) as counter FROM $tablaLibros as libro INNER JOIN $tablaEjemplares as ejemplares on libro.$varlibcod=ejemplares.$varejemlibcod INNER JOIN $vardetallesprestamolibro as detalle on ejemplares.$varejemcod=detalle.$varejemcodlib INNER JOIN $varresumenlibroprestamo as resumen on resumen.$varprestcod=detalle.$varprestcodlib 
	 	 WHERE DATE_FORMAT(resumen.$varprestfec,'%Y') LIKE '%$yearSelect%'  GROUP BY DATE_FORMAT(resumen.$varprestfec,'%c');";
	//echo json_encode($sqlQuery);
	$result = mysqli_query($conexion,$sqlQuery);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}
} else if ($typeSelect==2) {
	$monthSelect=date("c");
	$yearSelect=date("Y");
	$sqlQuery="SELECT DATE_FORMAT(resumen.$varprestfec,'%c') as Month, COUNT(detalle.$vardetcodlib) as counter  FROM $vardetallesprestamolibro as detalle INNER JOIN $varresumenlibroprestamo as resumen on detalle.$varprestcodlib= resumen.$varprestcod INNER JOIN $tablaEjemplares as ejemplar on ejemplar.$varejemcod=detalle.$varejemcodlib  WHERE DATE_FORMAT(resumen.$varprestfechafin,'%Y')='$yearSelect' AND ejemplar.$varejemestu='0'GROUP BY DATE_FORMAT(resumen.$varprestfec,'%c');";                    
	//echo json_encode($sqlQuery);
	$result = mysqli_query($conexion,$sqlQuery);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

} else if ($typeSelect==3) {
	$yearSelect=date("Y");
	$sqlQuery="SELECT DATE_FORMAT(resumen.$varprestfecequi,'%c') as Month, COUNT(detalle.$vardetcodequi) as counter FROM $tablaEquipo as equipo INNER JOIN $tablaExistenciaequipo as existencia on equipo.$varequicod=existencia.$varequicodExist INNER JOIN $vardetallesprestamoequipo as detalle on existencia.$varexistcod=detalle.$varexistcodDet INNER JOIN $varresumenequipoprestamo as resumen on resumen.$varprestcodequi=detalle.$varprestcodequiDet 
	 	 WHERE DATE_FORMAT(resumen.$varprestfecequi,'%Y') LIKE '%$yearSelect%'  GROUP BY DATE_FORMAT(resumen.$varprestfecequi,'%c');";
	//echo json_encode($sqlQuery);
	$result = mysqli_query($conexion,$sqlQuery);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

} else if ($typeSelect==4) {
	$yearSelect=date("Y");
	$sqlQuery="SELECT DATE_FORMAT(resumen.$varprestfecequi,'%c') as Month, COUNT(detalle.$vardetcodequi) as counter  FROM $vardetallesprestamoequipo as detalle INNER JOIN $varresumenequipoprestamo as resumen on detalle.$varprestcodequi= resumen.$varprestcodequi INNER JOIN $tablaExistenciaequipo as existencia on existencia.$varexistcod=detalle.$varexistcodDet  WHERE DATE_FORMAT(resumen.$varprestcodequi,'%Y')='$yearSelect' AND existencia.$varexistestu='0'GROUP BY DATE_FORMAT(resumen.$varprestfec,'%c');";
	//echo json_encode($sqlQuery);
	$result = mysqli_query($conexion,$sqlQuery);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

}
	





echo json_encode($data);
?>