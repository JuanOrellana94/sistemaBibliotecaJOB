<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	
	$formejemplarcodlib=$_POST['formejemplarcodigolib'];
	$formejemplarestado=strtoupper($_POST['formejemplarestado']);
	$formejemplarcomentario=strtoupper($_POST['formejemplarcomentario']);
	$formejemplaringreso=$_POST['formejemplaringreso'];
	$formejemplarfecha=$_POST['formejemplarfecha'];
	$formestantcod=$_POST['formestantcod'];	
	if (isset($_POST["formprecio"])) { 
		$formprecio=$_POST['formprecio']; 
	} else {
		$formprecio=""; 
	};
	if (isset($_POST['formdetalle'])) { 
		$formdetalle=$_POST['formdetalle']; 
	} else {
		$formdetalle=""; 
	};
		
    
   

     $sql=("SELECT t1.$vardewcodcla as dewe, t3.$varautseud as cutter  FROM $tablaDewey as t1 join $tablaLibros as t2 on t2.$varlibDew = t1.$vardewcod join $tablAutor as t3 on t3.$varautcod = t2.$varautcod WHERE t2.$varlibcod = $formejemplarcodlib");
     $sql2=("SELECT lpad($varejemcod+1,5,'0') as codigo from $tablaEjemplares  order by ejemcod desc limit 1");
     $consulta=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    $consulta2=mysqli_query($conexion, $sql2) or die(mysqli_error($conexion));
    while ($datacodigo=mysqli_fetch_assoc($consulta)){
    	  if (mysqli_num_rows($consulta2)==0) {	
             $newcodigo= $instituocodigo."".$datacodigo['dewe']."-".$datacodigo['cutter']."-"."00001";
         }else{  

    	 while ($datacodigo2=mysqli_fetch_assoc($consulta2)){
          $newcodigo= $instituocodigo."".$datacodigo['dewe']."-".$datacodigo['cutter']."-".$datacodigo2['codigo'];
          $newcodigo2= $instituocodigo."".$datacodigo['dewe']."-".$datacodigo2['codigo'];
      }
        }
    }

   $sql1 = ("SELECT  ejemcod+1 as codigo from ejemplareslibros order by ejemcod desc limit 1");
    $consulta1=mysqli_query($conexion, $sql1) or die(mysqli_error($conexion));
    if (mysqli_num_rows($consulta1)==0) {
    	 $sql=("SELECT t1.$vardewcodcla as dewe, t3.$varautseud as cutter  FROM $tablaDewey as t1 join $tablaLibros as t2 on t2.$varlibDew = t1.$vardewcod join $tablAutor as t3 on t3.$varautcod = t2.$varautcod WHERE t2.$varlibcod = $formejemplarcodlib");
    	 $consulta=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    	 while ($datacodigo=mysqli_fetch_assoc($consulta)){	
    	 	$formejemplarcodbarra="1"."".str_replace("-", "", $instituocodigo)."".$datacodigo['dewe'].""."00001";
    	 }
    	}else{
     while ($datacodigo3=mysqli_fetch_assoc($consulta1)){
               $formejemplarcodbarra=$datacodigo3['codigo'] ."". str_replace("-", "", $newcodigo2);
              
        }
   }
    $usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];


       
		$insRegistro=mysqli_query($conexion,"
			INSERT INTO 
			$tablaEjemplares($varejemcodreg, $varejemfecadq, $varejemtipadq,
			 $varejemdetaqu, $varejempruni, $varejemconfis, $varejemdetcon, $varestcod, $varlibcod, $varejemcodbar) 
			 VALUES ('$newcodigo','$formejemplarfecha','$formejemplaringreso',
			 '$formdetalle','$formprecio','$formejemplarestado','$formejemplarcomentario','$formestantcod','$formejemplarcodlib','$formejemplarcodbarra');")
		    or die ('ERROR INS-INS: '.mysqli_error($conexion));
          
	 

  

		$insRegistro=mysqli_query($conexion,"
		    INSERT INTO  $tablaBitacora(
		      $varFecha,
		      $varDesc,
		      $varBitUsuCodigo,
		      $varNomLibreria,
		      $varNomPersona
		      ) VALUES(
		      NOW(),
		      ' ingreso un nuevo ejemplar: $varejemcodreg',
		      '$usuCodigo',
		      '---',
		      '$bitPersonaName');")
		    or die ('ERROR INS-INS:'.mysqli_error($conexion));




	echo "1";
  
 ?>