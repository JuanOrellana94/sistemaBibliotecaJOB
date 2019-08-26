<?php
$fileName = $_FILES["file1"]["name"]; // The file name
$extension = explode(".",$fileName);
    $num = count($extension)-1;
if($extension[$num] == "sql"){
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

echo "<br>";

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: porfavor seleccione el archivo sql de respaldo";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "upload/bdrespaldo.sql")){
    echo '<div style="color: red; font-weight: bold; text-align: center;"><h5>Esta accion remplazara los datos actuales, le recomendamos realizar un respaldo de la data actual</div>';    
    echo "$fileName el archivo esta listo para restaurarse: &nbsp;&nbsp;";   
    echo '<a href="pages/restaurar/upload/upload/restore.php"><img src="img/icons/restaurar.png"  width="50" height="50"alt="restaurar" /></a></h5>'; 
    // array_map('unlink', glob("upload/$fileName")); 
    // echo "$fileName upload is delete";
} else {
    echo "move_uploaded_file function failed";
}
}else{
	echo "el archivo subido no es sql, se eliminara del servidor";
	array_map('unlink', glob("upload/$fileName")); 
}
?>

