  <?php 
  	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	session_start();

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

    $extencionesValidas = array('jpeg', 'jpg'); // valid extencionensions
	$direccion = '../../img/equipoimg/'; // upload directory
	if(!empty($_POST['modalequicodimg']) || !empty($_POST['modalequitipimg']) || $_FILES['subirPortada'])
	{
		$img = $_FILES['subirPortada']['name'];
		$tmp = $_FILES['subirPortada']['tmp_name'];
		// get uploaded file's extencionension
		$extencion = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$imagenSubir = rand(1000,1000000).$img;
		// check's valid format
		if(in_array($extencion, $extencionesValidas)) 
		{ 
			$direccion = $direccion.strtolower($imagenSubir); 
			if(move_uploaded_file($tmp,$direccion)) 
			{
			
			$equicod = $_POST['modalequicodimg'];
			$equitit = $_POST['modalequitipimg'];
			echo "1";
	
			
			$insRegistro=mysqli_query($conexion,"
			UPDATE $tablaEquipo SET		
			$varequimg='img/equipoimg/$imagenSubir'
			WHERE $varequicod='$equicod';
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
		      'ha agregado una nueva imagen al equipo: $equitit Codigo: $equicod',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));

			
			}
		} 
		else 
		{
			echo '0';
		}
	}
 ?>