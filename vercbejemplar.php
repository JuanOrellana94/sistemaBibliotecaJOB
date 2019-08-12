<?php

  include("src/libs/vars.php");
  include("src/libs/sessionControl/conection.php");
  date_default_timezone_set("America/El_Salvador");  

  $xejemplar = $_GET['codeje'];
  $sql = "SELECT ejemcod, ejemcodreg, libtit FROM ejemplareslibros INNER JOIN libros ON libros.libcod = ejemplareslibros.libcod WHERE ejemplareslibros.ejemcodreg = '" . $xejemplar . "'";
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));      
?>

<html>
<body>
<p>
      <?php
      while($ejemplar = mysqli_fetch_assoc($resultado)) { 
          $numejemplar= substr($ejemplar['ejemcodreg'],-5);           
          echo "<b>" . $ejemplar['libtit'] . "</b>, Ejemplar #" . $numejemplar ."<br>";
          $codbarra =$ejemplar['ejemcod'] . str_replace("-", "", $ejemplar['ejemcodreg']) . '1234'; 
          echo "<div><img src='cbarra.php?xvalor=".$codbarra. "'></div>";          
      }
      echo "<br>" . $codbarra;
  ?>
      <?php echo "<br><br><a href=\"cbarraejempdf.php?codeje=" . $xejemplar. "\">Mostrar PDF</a>"; ?>
</p>
</body>
</html>
