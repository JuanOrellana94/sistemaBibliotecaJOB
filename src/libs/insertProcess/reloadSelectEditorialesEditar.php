<?php 
	
	include("../vars.php");
	include("../sessionControl/conection.php");

	

?>		
	 <!-- SELECT CON INFORMACION ACTUALIZADA LLAMADO POR LA FUNCION reloadSelectAutores() GUARDADA EN src/js/insertProcess/jsBooks.js-->
<label for="EditorialLabel">Editorial</label>
  <select class="form-control js-Dropdown-Busqueda" style="width:100%" type="text" name="editeditcod" id="editeditcod">
    <option value="">Seleccione una Editorial</option>
      <?php
        $selEdit=mysqli_query($conexion,"SELECT * FROM $tablaEditoral e");
        while ($listEdit=mysqli_fetch_assoc($selEdit)) { ?> 
          
          <option value="<?php echo $listEdit["$vareditcod"]?>"><?php echo $listEdit["$vareditnom"]?>         
    </option>
    <?php 
      }
      
    ?>
    
  </select>