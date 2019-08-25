<?php


include("../../src/libs/vars.php");
include("../../src/libs/sessionControl/conection.php");

if (isset($_POST["carnetCod"])) { 
	$textBusqueda= $_POST["carnetCod"]; 
} else {
	$textBusqueda=""; 
}

?>

<?php
$printecho='0';
$sql="SELECT usu.usucarnet, usu.usuprinom, usu.ususegnom, usu.usupriape, usu.ususegape
FROM usuario as usu
WHERE usu.usunivel='3' AND usu.usucarnet='$textBusqueda';";

$selTable=mysqli_query($conexion,$sql);
		if (mysqli_num_rows($selTable)==0){
			// 0 = USUARIO NO EXISTE CARNET INVALIDO
			echo "0";
		} else {		

		
			$sql="SELECT  resumen.prestfechafin, resumen.$varprestfec, resumen.prestestlib, usu.usupriape, usu.ususegape, resumen.$varprestdev FROM usuario as usu INNER JOIN resumenlibroprestamo as resumen on usu.usucod=resumen.usuCodigo WHERE usu.usunivel='3' AND usu.usucarnet='$textBusqueda' AND resumen.prestdevsolv='0' AND  (DATE_FORMAT(prestfechafin,'%d%m%Y')>DATE_FORMAT(prestdevlib,'%d%m%Y') OR prestestlib='0');";

			$selTable=mysqli_query($conexion,$sql);
			if (mysqli_num_rows($selTable)==0){
				// 0 = USUARIO NO TIENE PRESTAMOS ACTIVOS NI DEUDAS
				echo "2";
			} else {
				//DEBE LIBROS
				while ($dataLibros=mysqli_fetch_assoc($selTable)){
            		 $fechaColor = strtotime($dataLibros[$varprestdev]);
            		 $fechaHoyColor = date("d-m-Y");

		            if (date("d-m-Y",$fechaColor)< $fechaHoyColor){
		            	$printecho=$printecho+1;	                  
            		} else{
            			// existe con prestamos activos pero no estan retrasados		  
            		}	
        		}
        		if ($printecho!='0') {
            			echo '3';
            		}
            		else{
            			echo '4';
            		}
			}
		}
?>