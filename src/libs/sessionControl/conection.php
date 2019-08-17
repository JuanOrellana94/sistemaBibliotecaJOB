<?php
	//CONEXION A LA BASE DE DATOS

	$conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
	mysqli_select_db($conexion,"$base");


	//$passwordUser=md5("19001");
	//echo $passwordUser."            as   ";

?>