<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");

?>


<table class="table table-striped table-bordered table-hover">
    <thead>
    	<tr>
            <th colspan="2"></th>
    			
    	</tr>
    </thead>
    <tbody>
    	<tr>
            <?php 
                $formatDateSend= "%Y % c %d";
                $sql="SELECT count($varlibcod) FROM $tablaLibros";
                $profileData=mysqli_query($conexion,$sql);
                $count = mysqli_fetch_array($profileData);
                //echo $sql;
            ?>
    		<td>1.Total libros creados:</td>
            <td><span class="badge badge-primary float-right"><?php echo  $count[0] ?></span></td>
        </tr>
        <tr>
            <?php 
                $formatDateSend= "%Y % c %d";
                $sql="SELECT count($varejemcod) FROM $tablaEjemplares";
                $profileData=mysqli_query($conexion,$sql);
                $count = mysqli_fetch_array($profileData);
                //echo $sql;
            ?>
            <td>2.Total ejemplares registrados:</td>
            <td><span class="badge badge-primary float-right"><?php echo  $count[0] ?></span></td>
        </tr>
        <tr>
            <?php 
                $formatDateSend= "%Y % c %d";
                $sql="SELECT count($varejemcod) FROM $tablaEjemplares WHERE $varejemtipadq='0'";
                $profileData=mysqli_query($conexion,$sql);
                $count = mysqli_fetch_array($profileData);
                //echo $sql;
            ?>
            <td>3.Total ejemplares donados:</td>
            <td><span class="badge badge-primary float-right"><?php echo  $count[0] ?></span></td>
        </tr>
        <tr>
            <?php 
                $formatDateSend= "%Y % c %d";
                $sql="SELECT count($varejemcod) FROM $tablaEjemplares WHERE $varejemestu='3'";
                $profileData=mysqli_query($conexion,$sql);
                $count = mysqli_fetch_array($profileData);
                //echo $sql;
            ?>
            <td>4.Total ejemplares extraviados:</td>
            <td><span class="badge badge-primary float-right"><?php echo  $count[0] ?></span></td>
        </tr>
        <tr>
            <?php 
                $formatDateSend= "%Y % c %d";
                $sql="SELECT count($varejemcod) FROM $tablaEjemplares WHERE $varejemconfis='3'";
                $profileData=mysqli_query($conexion,$sql);
                $count = mysqli_fetch_array($profileData);
                //echo $sql;
            ?>
            <td>5.Total ejemplares en mala condicion:</td>
            <td><span class="badge badge-primary float-right"><?php echo  $count[0] ?></span></td>
        </tr>
        <tr>
            <?php 
                $formatDateSend= "%Y % c %d";
                $sql="SELECT count($varejemcod) FROM $tablaEjemplares WHERE $varejemconfis='4'";
                $profileData=mysqli_query($conexion,$sql);
                $count = mysqli_fetch_array($profileData);
                //echo $sql;
            ?>
            <td>6.Total ejemplares en condicion de sustitucion:</td>
            <td><span class="badge badge-primary float-right"><?php echo  $count[0] ?></span></td>
        </tr>
        <tr>
            <?php 
                $formatDateSend= "%Y % c %d";
                $sql="SELECT count($varUsuCodigo) FROM $tablaUsuarios WHERE $varNivel > '1'";
                $profileData=mysqli_query($conexion,$sql);
                $count = mysqli_fetch_array($profileData);
                //echo $sql;
            ?>
            <td>7.Total cuentas de usuario registradas:</td>
            <td><span class="badge badge-primary float-right"><?php echo  $count[0] ?></span></td>
        </tr>
        <tr>
            <?php 
                $formatDateSend= "%Y % c %d";
                $sql="SELECT count($varUsuCodigo) FROM $tablaUsuarios WHERE $varCueEstatus > '2'";
                $profileData=mysqli_query($conexion,$sql);
                $count = mysqli_fetch_array($profileData);
                //echo $sql;
            ?>
            <td>8.Total de cuentas de usuario suspendidas:</td>
            <td><span class="badge badge-primary float-right"><?php echo  $count[0] ?></span></td>
        </tr>
    </tbody>

</table>


    
	

	