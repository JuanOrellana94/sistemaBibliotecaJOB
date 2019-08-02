<?php
$code_number = '2012499100001033';
  include("src/libs/vars.php");
  include("src/libs/sessionControl/conection.php");
  date_default_timezone_set("America/El_Salvador");
  if(!isset($_SESSION)){
      session_start();    
  }

  $xejemplar = $_GET['codeje'];
  $sql = "SELECT ejemcod, ejemcodreg, libtit FROM ejemplareslibros INNER JOIN libros ON libros.libcod = ejemplareslibros.libcod WHERE ejemplareslibros.ejemcodreg = '" . $xejemplar . "'";
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));      
?>

<html>
<body>
<p> este es el codigo digitado <?php echo $code_number ?><br> 
y la imagen del codigo de barra es <br>
<?php echo "<img src='cbarra.php?xvalor=".$code_number. "'>" ?>
</p>

<p>
      <?php
      while($ejemplar = mysqli_fetch_assoc($resultado)) {          
          echo "<b>" . $ejemplar['libtit'] . "</b>, Ejemplar #" . $ejemplar['ejemcod'] ."<br><br>";
          $codbarra =$ejemplar['ejemcod'] . str_replace("-", "", $ejemplar['ejemcodreg']) . '1234'; 
          echo "<img src='cbarra.php?xvalor=".$codbarra. "'>";          
      }
      echo "<br><br>" . $codbarra;
  ?>

</p>
</body>
</html>
