
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
 }




 include("down.php");


?>
