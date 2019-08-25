<?php


include("../../src/libs/vars.php");
include("../../src/libs/sessionControl/conection.php");
date_default_timezone_set("America/El_Salvador");
 	session_start();

 $usuCodigo=$_SESSION['usuCodigo'];
 $bitPersonaName=$_SESSION['nombreComp'];


if (isset($_POST["carnetCodCancelSolv"])) { 
	$textBusqueda= $_POST["carnetCodCancelSolv"]; 
} else {
	$textBusqueda=""; 
}

?>

<?php
$printecho='0';
$printechoDEBT='0';
$sql="SELECT usu.usucarnet, usu.usuprinom, usu.ususegnom, usu.usupriape, usu.ususegape
FROM usuario as usu
WHERE usu.usunivel='3' AND usu.usucarnet='$textBusqueda';";

$selTable=mysqli_query($conexion,$sql);
		if (mysqli_num_rows($selTable)==0){
			// 0 = USUARIO NO EXISTE CARNET INVALIDO
			echo "0";
		} else {		

		
			$sql="SELECT  resumen.prestfechafin, resumen.$varprestfec, resumen.prestestlib, resumen.prestcodlib, usu.usupriape, usu.ususegape, resumen.$varprestdev FROM usuario as usu INNER JOIN resumenlibroprestamo as resumen on usu.usucod=resumen.usuCodigo WHERE usu.usunivel='3'  AND usu.usucarnet='$textBusqueda' AND  (DATE_FORMAT(prestfechafin,'%d%m%Y')>DATE_FORMAT(prestdevlib,'%d%m%Y') OR resumen.$varprestest='0') AND resumen.prestdevsolv='0';";

			$selTable=mysqli_query($conexion,$sql);
			if (mysqli_num_rows($selTable)==0){
				// 0 = USUARIO NO TIENE PRESTAMOS ACTIVOS NI DEUDAS
				echo "2";
			} else {

				//DEBE LIBROS
				while ($dataLibros=mysqli_fetch_assoc($selTable)){
					$fechaColor = strtotime($dataLibros[$varprestdev]);
             		$fechaHoyColor = date("d-m-Y");


             		if ($dataLibros[$varprestest]=='0'){
             			$printecho='1';   

             			if (date("d-m-Y",$fechaColor)<$fechaHoyColor){

             				$printechoDEBT='1'; 

            			} 
             		} else {

             			if (date("d-m-Y",$fechaColor)<$fechaHoyColor){

             				$printechoDEBT='1'; 

            			} 

             		}


		            
            	}
            	if ($printechoDEBT=='0') {
            		echo "2";            		
            	}else{
            		if ($printecho =='1') {           			
            			echo '3';
            		}
            		else if ($printecho =='0'){

            			$sql="SELECT resumen.$varprestcod, resumen.prestfechafin, resumen.$varprestfec, resumen.prestestlib, resumen.prestcodlib, usu.usupriape, usu.ususegape, resumen.$varprestdev FROM usuario as usu INNER JOIN resumenlibroprestamo as resumen on usu.usucod=resumen.usuCodigo WHERE usu.usunivel='3'  AND usu.usucarnet='$textBusqueda' AND  (DATE_FORMAT(prestfechafin,'%d%m%Y')>DATE_FORMAT(prestdevlib,'%d%m%Y') OR $varprestest='0');";

						$selTable=mysqli_query($conexion,$sql);
						if (mysqli_num_rows($selTable)==0){
							// 0 = USUARIO NO TIENE PRESTAMOS ACTIVOS NI DEUDAS
							echo "2";
						} else {

							//if ($printecho =='1') {           			
			            	//	echo '3';
			            	//}
							//DEBE LIBROS
							while ($dataLibros=mysqli_fetch_assoc($selTable)){
			            		
			            		$prestCodvar = $dataLibros[$varprestcod];
			            		$insRegistro=mysqli_query($conexion,"
								UPDATE $varresumenlibroprestamo SET
									$varprestdevsolv='1'
									WHERE $varprestcod='$prestCodvar';
								    ")
							    or die ('ERROR INS-INS:'.mysqli_error($conexion));

							
						// Memo: Campo Bitacora Descipcion  $varDesc debe ser extendida para evitar errores string too long

								$insRegistro=mysqli_query($conexion,"
								    INSERT INTO  $tablaBitacora(
								      $varFecha,
								      $varDesc,
								      $varBitUsuCodigo,
								      $varNomLibreria,
								      $varNomPersona
								      ) VALUES(
								      NOW(),
								      'Prestamo con cargos multa. Codigo registro: $prestCodvar fue cancelado',
								      '$usuCodigo',
								      '---',
								      '$bitPersonaName');")
								    or die ('ERROR INS-INS:'.mysqli_error($conexion));

			            	}
			            	echo '4';

			           	}
            			

            		}
            	}

        		
			}
		}
	
?>