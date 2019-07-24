
<body>
  <?php

    include("top.php");
    include("pages/catalogs/catbar.php");






 $pageLocation=$_GET["pageLocation"];

if ($pageLocation=="respaldo") {
    include("pages/utilerias/utilrespaldo.php");
 } else if ($pageLocation=="cbarras") {
 	include("pages/utilerias/utilcbarras.php");
 }else if ($pageLocation=="historial") {
 	include("pages/utilerias/utilhistorial.php");
 }

 include("down.php");


?>
