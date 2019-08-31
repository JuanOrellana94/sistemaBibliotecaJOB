  <?php 
  	include("../vars.php");
	include("../sessionControl/conection.php");
	session_start();

	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];

    $codLIBP=$_POST['modallibcodPortada']; //CODIGO DEL REGISTRO QUE QUERES ACTUALIZAR PORTADA/BORRAR PORTADA ACTUAL


	$checkValidation="SELECT * FROM $tablaLibros WHERE $varlibcod='$codLIBP';";



	$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


	while ($dataRow = mysqli_fetch_array($resultado)){
		$imgDir=$dataRow["$varlibpor"];

	}
	if ($imgDir!="img/portadas/Default.png") {
		unlink("../../../".$imgDir);//LOS ../../ VAN A CAMBIAR SI ESTAS ENLA CARPETA PAGES, ya que esta src/libs/insertprocess/
}




    $extencionesValidas = array('jpeg', 'jpg'); // valid extencionensions
	$direccion = '../../../img/portadas/'; // upload directory
	if(!empty($_POST['modallibcodPortada']) || !empty($_POST['modallibtitPortada']) || $_FILES['subirPortada'])
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
			
			$libcod = $_POST['modallibcodPortada'];
			$libtit = $_POST['modallibtitPortada'];
			echo "1";
	
			
			$insRegistro=mysqli_query($conexion,"
			UPDATE $tablaLibros SET		
			$varlibpor='img/portadas/$imagenSubir'
			WHERE $varlibcod='$libcod';
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
		      'ha agregado una nueva imagen de portada: $libtit Codigo: $libcod',
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