
<body>
  <?php

   
   






 $pageLocation=$_GET["pageLocation"];

 if ($pageLocation=="busqueda") {
    include("pages/operaciones/buscarMenu.php");
 } else if ($pageLocation=="none") {
 	 include("top.php");
 	# code...
 }




 include("down.php");


?>
