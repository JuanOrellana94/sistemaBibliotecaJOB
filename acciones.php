
<body>
  <?php

   
   






 $pageLocation=$_GET["pageLocation"];

 if ($pageLocation=="busqueda") {
    include("pages/operaciones/buscarMenu.php");
 } else if ($pageLocation=="prestamos") {
 	 include("top.php");
 	 include("pages/operaciones/opPrestamos.php");
 	# code...
 }  else if ($pageLocation=="devoluciones") {
 	 include("top.php");
 	 include("pages/operaciones/opDevoluciones.php");
 	# code...
 }  else if ($pageLocation=="historial") {
 	 include("top.php");
 	 include("pages/historial/verHistorial.php");
 	# code...
 } else if ($pageLocation=="codbarras") {
 	 include("top.php");
 	 include("pages/codbarras/cbestudiante.php");
 	# code...
 } else if ($pageLocation=="cbejemplar") {
 	 include("top.php");
 	 include("pages/codbarras/cbejemplar.php");
 	# code...
 }else if ($pageLocation=="restaurar") {
 	 include("top.php");
 	 include("pages/restaurar/restaurarbd.php");
 	# code...
 }else if ($pageLocation=="indicadores") {
 	 include("top.php");
 	 include("pages/estadistica/verIndicadores.php");
 	# code...
 } else if ($pageLocation=="cbequipo") {
 	 include("top.php");
 	 include("pages/codbarras/cbequipo.php");
 	# code...
 } else if ($pageLocation=="bitacora") {
 	 include("top.php");
 	 include("pages/bitacora/verBitacora.php");
 	# code...
 }





 include("down.php");


?>
