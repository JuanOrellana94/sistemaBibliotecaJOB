<?php 
	
	include("../vars.php");
	include("../sessionControl/conection.php");

	

?>		
	 <!-- SELECT CON INFORMACION ACTUALIZADA LLAMADO POR LA FUNCION reloadSelectAutores() GUARDADA EN src/js/insertProcess/jsBooks.js-->
<label for="AutorLabel">Autor</label>
<select class="form-control js-Dropdown-Busqueda" style="width:100%" type="text" name="editgenautcod" id="editgenautcod">
    <option value="">Seleccione Autor</option>
    <?php
      $selAuto=mysqli_query($conexion,"SELECT * FROM $tablAutor") or die ("Error al conectar");
      while ($listAuto=mysqli_fetch_assoc($selAuto)) { ?> 
        
        <option value="<?php echo $listAuto["$varautcod"]?>"><?php echo $listAuto["$varautnom"]." ".$listAuto["$varautape"]?>         
        </option>
    <?php 
      }
    ?>      
</select>