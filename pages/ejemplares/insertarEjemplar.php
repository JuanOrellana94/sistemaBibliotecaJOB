<?php 
	include("../../src/libs/vars.php");
	include("../../src/libs/sessionControl/conection.php");
	date_default_timezone_set("America/El_Salvador");
	session_start();


	
	$formejemplarcodlib=$_POST['formejemplarcodigolib'];
	$formejemplarestado=mb_strtoupper ($_POST['formejemplarestado']);
	$formejemplarcomentario=mb_strtoupper ($_POST['formejemplarcomentario']);
	$formejemplaringreso=$_POST['formejemplaringreso'];
	$formejemplarfecha=$_POST['formejemplarfecha'];
	$formestantcod=$_POST['formestantcod'];
  $formejemplarescantidad=$_POST['formejemplarescantidad'];	
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
		
  
   
   for ($i=0; $i <$formejemplarescantidad ; $i++) { 
     # code...
  

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

    	 	$formejemplarcodbarra="1"."222222222";
    	 }
    	}else{
     while ($datacodigo3=mysqli_fetch_assoc($consulta1)){
     	
               $tamaño=strlen($datacodigo3['codigo']);
          switch ($tamaño) {
              case '1':
              # code... 
                     $digitos="222222222";
              break;            
              case '2':
              # code...
                     $digitos="22222222";
              break;
              case '3':
              # code...
                    $digitos="2222222";
              break;
              case '4':
              # code...
                    $digitos="222222";
              break;
              case '5':
              # code...
                    $digitos="22222";
              break;
              case '6':
              # code...
                    $digitos="2222";
              break;
              case '7':
              # code...
                    $digitos="222";
              break;
          }
               $formejemplarcodbarra=$datacodigo3['codigo'] ."". $digitos ;
              
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


 }

	echo "1";
  
 ?>