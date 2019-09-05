<?php
require('../../fpdf/fpdf.php');
include("../../src/libs/vars.php");
include("../../src/libs/sessionControl/conection.php");
require('../../fpdf/mysql_table.php');
 date_default_timezone_set("America/El_Salvador");
 	session_start();
//require('../../fpdf/mysql_table.php');
//include("../../src/libs/funAcc/funAccent.php");
 	$usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];
//$varCarnetSearch="18009";
if (isset($_GET["cncnet"])) { 
        $varCarnetSearch  = $_GET["cncnet"]; 
    } else {
        $varCarnetSearch=""; 
    };


$totalCosto=0.00;
$printRows=0;
$printRowsDeb=0;
$rowCounterPending=0;
$rowCounterFinished=0;
$mensajeActivos="";
	//get 
	$sql="SELECT usu.$varCarnet, resumen.$varprestest,usu.$varPriNombre, usu.$varSegNombre, usu.$varPriApellido, usu.$varSegApellido
        FROM usuario as usu
        INNER JOIN $varresumenlibroprestamo as resumen on usu.$varUsuCodigo=resumen.$varusuCodigoF
        WHERE usu.$varNivel='3' AND usu.$varCarnet='$varCarnetSearch'
        GROUP by usu.$varUsuCodigo;";
    //echo $sql;
	$profileData=mysqli_query($conexion,$sql);
    $itemsName=mysqli_fetch_assoc($profileData);


//check if user has active prestamo
$sql="SELECT *
        FROM usuario as usu
        INNER JOIN resumenlibroprestamo as resumen on usu.$varUsuCodigo=resumen.$varusuCodigoF
        WHERE usu.$varNivel='3' AND usu.$varCarnet='$varCarnetSearch' AND resumen.$varprestest='0' AND resumen.prestdevsolv='0'
       ";

    $selTable=mysqli_query($conexion, $sql);

if (mysqli_num_rows($selTable)==0){
     //No tienen ningun prestamo activo
    //REVISAR SI EXISTEN PRESTAMOS TERMINADOS Y CON RETRASO

    $sql="SELECT * FROM usuario as usu
            INNER JOIN resumenlibroprestamo as resumen on usu.$varUsuCodigo=resumen.$varusuCodigoF
            WHERE usu.$varNivel='3' AND usu.$varCarnet='$varCarnetSearch' AND resumen.$varprestest='1' AND resumen.prestdevsolv='0'
            GROUP by resumen.prestcodlib";

    $selTable=mysqli_query($conexion, $sql);
    if (mysqli_num_rows($selTable)==0){
     // no existen prestamos finalizados
    //FINZALIZAR WITH FUNCTION()
    } else{
        //EXISTE dedudas en prestamos ya terminados //NO EXISTEN PRESTAMOS ACTIVOS

        
        while ($dataLibros=mysqli_fetch_assoc($selTable)){
            $fechaColor = strtotime($dataLibros[$varprestdev]);
            $fechaColorFin = strtotime($dataLibros[$varprestfechafin]); 

            if (date("d-m-Y",$fechaColorFin)> date("d-m-Y",$fechaColor)){
                //$OldDate=$fechaColor;
                //$NewDate = date('M j,Y', $OldDate);
                //$diff= date_diff(date_create($NewDate),date_create(date("M j, Y")));
                $printRowsDeb=1;

                $now = $fechaColorFin; 
                $your_date =$fechaColor;
                $datediff = $now - $your_date;


                //echo  $fechaColor.' '. $fechaColorFin;
                $retrasoActiveDiasSecond= round($datediff / (60 * 60 * 24));               
                $costoRetrasoActivediasUnformatted=$retrasoActiveDiasSecond*$costoMulta;
                $totalCosto=$totalCosto+$costoRetrasoActivediasUnformatted;   

            }

        }  
    }

} else{
//EXITE UN PRESTAMO SIN TERMINAR
      
    while ($dataLibros=mysqli_fetch_assoc($selTable)){
        $fechaColDev = strtotime($dataLibros[$varprestdev]);
        $fechaHoyColor = date("d-m-Y");

        if ($dataLibros[$varprestest]=='0' AND date("d-m-Y",$fechaColDev)<$fechaHoyColor) {
            $printRows=1;
            $OldDate=strtotime($dataLibros[$varprestdev]);
            $NewDate = date('M j,Y', $OldDate);
            $diff= date_diff(date_create($NewDate),date_create(date("M j, Y")));


            $retrasoActiveDias=$diff->format('%d');

            $costoRetrasoActivediasUnformatted=$retrasoActiveDias*$costoMulta;
            $totalCosto=$totalCosto+$costoRetrasoActivediasUnformatted;             
        }
    }
    $sql="SELECT * FROM usuario as usu
            INNER JOIN resumenlibroprestamo as resumen on usu.$varUsuCodigo=resumen.$varusuCodigoF
            WHERE usu.$varNivel='3' AND usu.$varCarnet='$varCarnetSearch' AND resumen.$varprestest='1' AND resumen.prestdevsolv='0'
            ";

    $selTable=mysqli_query($conexion, $sql);
    if (mysqli_num_rows($selTable)==0){
     // no existen prestamos finalizados
    //EJECUCION DEL REPORTE CONTINUA CON LOS DATOS YA OBTENIDOS
    } else{
        //EXISTE dedudas en prestamos ya terminados
       
        while ($dataLibros=mysqli_fetch_assoc($selTable)){
            $fechaColor = strtotime($dataLibros[$varprestdev]);
            $fechaColorFin = strtotime($dataLibros[$varprestfechafin]); 

            if (date("d-m-Y",$fechaColorFin)> date("d-m-Y",$fechaColor)){
                //$OldDate=$fechaColor;
                //$NewDate = date('M j,Y', $OldDate);
                //$diff= date_diff(date_create($NewDate),date_create(date("M j, Y")));
                $printRowsDeb=1;

                $now = $fechaColorFin; 
                $your_date =$fechaColor;
                $datediff = $now - $your_date;


                //echo  $fechaColor.' '. $fechaColorFin;
                $retrasoActiveDiasSecond= round($datediff / (60 * 60 * 24));               
                $costoRetrasoActivediasUnformatted=$retrasoActiveDiasSecond*$costoMulta;
                $totalCosto=$totalCosto+$costoRetrasoActivediasUnformatted;   

            }

        }  
    }
}


$costoRetrasoActivedias=number_format($totalCosto, 2);





class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('../../img/structures/reportP3Color.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    $this->Cell(5);
    
    // Title

    $this->Image('../../img/structures/reportP3Color.png',0,0,210);
    $this->SetY(35);
    $this->SetX(62);
    $this->SetTextColor(46,46,46);
    $this->Cell(0,10,'Solvencia de Biblioteca',0);
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'R');
}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm','Letter');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(25);
$pdf->SetFont('Arial','',12);

$pdf->Cell(5);
$pdf->SetY(50);
$pdf->Cell(0,5,'Fecha: '.date('d/m/Y'));

$pdf->Cell(100);
$pdf->SetY(60);

if ($printRows==1) {
    $mensajeActivos=" Se dan a conocer una lista de los libros que aún están pendientes para su devolución:";
}

$pdf->SetFont('Arial','',14);
$pdf->MultiCell(155,7,utf8_decode('Se hace constar que el estudiante '.$itemsName[$varPriNombre].' '.$itemsName[$varSegNombre].' '.$itemsName[$varPriApellido].' '.$itemsName[$varSegApellido].', con el carnet: '.$itemsName[$varCarnet].' del bachillerato, tiene un monto total en base a multas por atrasos en la entrega de libros de $'.$costoRetrasoActivedias.'.'.$mensajeActivos.' 
'),0,'J');

$y_axis_initial=90;
$y_axis=$y_axis_initial;
$pdf->SetY($y_axis);
if ($printRows==1) {
//$pdf->SetXY(15,150);
$pdf->SetAutoPageBreak(false);
$y_axis_initial = 95;
//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(13);
$pdf->Cell(10,6,'RP',1,0,'L',1);  
$pdf->Cell(60,6,'Ejemplar',1,0,'L',1);
$pdf->Cell(60,6,'Titulo',1,0,'L',1);
$pdf->Cell(30,6,'Prestado el:',1,0,'L',1);
$pdf->Cell(30,6,'Devolucion:',1,0,'L',1);


//Select the Products you want to show in your PDF file

$result=mysqli_query($conexion,"
     SELECT resumen.prestcodlib, resumen.prestfeclib, resumen.prestdevlib, ejemplar.ejemcodreg, libro.libtit FROM resumenlibroprestamo as resumen
    INNER JOIN detallesprestamolibro as detalle on detalle.prestcodlib=resumen.prestcodlib
    INNER JOIN ejemplareslibros as ejemplar on detalle.ejemcod=ejemplar.ejemcod
    INNER JOIN libros as libro on ejemplar.libcod=libro.libcod
    INNER JOIN usuario as usu on resumen.usuCodigo=usu.usucod
    WHERE resumen.prestestlib='0' AND usu.usucarnet='$varCarnetSearch' AND ejemplar.ejemestu='1' AND resumen.prestdevsolv='0'
    ;");


//initialize counter
$y_axis_initial = 101;
$i = 0;
//Set maximum rows per page
$max = 17;
$y_axis=$y_axis_initial;
//Set Row Height
$row_height = 6;
$counterNum=0;
while($row = mysqli_fetch_array($result))
{
    $counterNum=$counterNum+'1';
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {   
        $max = 22;        
        $pdf->AddPage();
        //print column titles for the current page
        $pdf->SetY(57);
        $pdf->SetX(13);
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,6,'RP',1,0,'L',1);  
        $pdf->Cell(60,6,'Ejemplar',1,0,'R',1);
        $pdf->Cell(60,6,'Nombre del libro',1,0,'R',1);
        $pdf->Cell(30,6,'Fecha de Prestamo',1,0,'L',1);
        $pdf->Cell(30,6,'Fecha de Devolucion',1,0,'L',1);
        
        //Go to next row
        $y_axis = 57;
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $datePrest=strtotime($row['prestfeclib']);
    $dateDev=strtotime($row['prestdevlib']);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','',12);
    $pdf->SetY($y_axis);
    $pdf->SetX(13);
    $pdf->Cell(10,6,$row['prestcodlib'],1,0,'L',1);
    $pdf->Cell(60,6,$row['ejemcodreg'],1,0,'L',1);
    $pdf->Cell(60,6,utf8_decode($row['libtit']),1,0,'L',1);
    $pdf->Cell(30,6,date("d-m-Y",$datePrest),1,0,'R',1);
    $pdf->Cell(30,6,date("d-m-Y", $dateDev),1,0,'R',1);

    //Go to next row
    $rowCounterPending=$rowCounterPending+1;
    $y_axis=$y_axis+$row_height;
    $i = $i + 1;
}


  
}
$devoldevult="";


if ($printRowsDeb==1){
    $y_axis=$y_axis+3;
    $devoldevult="Devolucion: Fecha limite de devolucion, Devuelto el: Fecha en que los libros fueron devueltos";

    $pdf->SetY($y_axis);
    if ($printRows==1) {
        $concatText="Ademas ";
        $concatText2="sido incluido en ";
        

    }else{
        $y_axis=$y_axis+12;
       
         $concatText="No se encuentran prestamos pendientes sin embargo ";
         $concatText2="generado ";
    }

    if ($rowCounterPending>=4) {
        $max='4';
    }else{
        $max='8';
    }

    $pdf->MultiCell(155,7,utf8_decode($concatText.'existen prestamos realizados con libros que fueron devueltos con un retraso que ha '.$concatText2.'el valor de la multa. Los prestamos son:.
    '),0,'J');

    $y_axis_initial = $y_axis+16;
    $i = 0;
    $y_axis=$y_axis_initial;
    //print column titles
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetY($y_axis_initial);
    $pdf->SetX(13);
    $pdf->Cell(10,6,'RP',1,0,'L',1);  
    $pdf->Cell(60,6,'Ejemplar',1,0,'L',1);
    $pdf->Cell(60,6,'Titulo',1,0,'L',1);
    $pdf->Cell(30,6,'Devolucion',1,0,'L',1);
    $pdf->Cell(30,6,'Devuelto el',1,0,'L',1);



    $result=mysqli_query($conexion,"
     SELECT resumen.prestcodlib, resumen.prestfeclib, resumen.prestdevlib, ejemplar.ejemcodreg, libro.libtit, resumen.prestfechafin FROM resumenlibroprestamo as resumen
    INNER JOIN detallesprestamolibro as detalle on detalle.prestcodlib=resumen.prestcodlib
    INNER JOIN ejemplareslibros as ejemplar on detalle.ejemcod=ejemplar.ejemcod
    INNER JOIN libros as libro on ejemplar.libcod=libro.libcod
    INNER JOIN usuario as usu on resumen.usuCodigo=usu.usucod
    WHERE resumen.prestestlib='1' AND usu.usucarnet='$varCarnetSearch' AND resumen.prestdevsolv='0'
    ;");


//initialize counter
$y_axis_initial = $y_axis_initial +6;
$i = 0;

//Set maximum rows per page


$y_axis=$y_axis_initial;

//Set Row Height
$row_height = 6;
$counterNum=0;

while($row = mysqli_fetch_array($result))

{




    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {   
        $max = 22;        
        $pdf->AddPage();
        //print column titles for the current page
        $pdf->SetY(57);
        $pdf->SetX(13);
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,6,'RP',1,0,'L',1);  
        $pdf->Cell(60,6,'Ejemplar',1,0,'R',1);
        $pdf->Cell(60,6,'Nombre del libro',1,0,'R',1);
        $pdf->Cell(30,6,'Devolucion',1,0,'L',1);
        $pdf->Cell(30,6,'Devuelto el',1,0,'L',1);
        
        //Go to next row
        $y_axis = 57;
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $fechaColor = strtotime($row[$varprestdev]);
    $fechaColorFin = strtotime($row[$varprestfechafin]);

    if (date("d-m-Y",$fechaColorFin)> date("d-m-Y",$fechaColor)){

                //$OldDate = strtotime($row[$varprestdev]);
                //$NewDate = date('M j, Y', $OldDate);
                //$diff = date_diff(date_create($NewDate),date_create(date("M j, Y")));

                $datePrest=strtotime($row['prestdevlib']);
                $dateDev=strtotime($row['prestfechafin']);
                $pdf->SetFillColor(255,255,255);
                $pdf->SetFont('Arial','',12);
                $pdf->SetY($y_axis);
                $pdf->SetX(13);
                $pdf->Cell(10,6,$row['prestcodlib'],1,0,'L',1);
                $pdf->Cell(60,6,$row['ejemcodreg'],1,0,'L',1);
                $pdf->Cell(60,6,utf8_decode($row['libtit']),1,0,'L',1);
                $pdf->Cell(30,6,date("d-m-Y",$datePrest),1,0,'R',1);
                $pdf->Cell(30,6,date("d-m-Y", $dateDev),1,0,'R',1);

                //Go to next row
                $y_axis=$y_axis+$row_height;
                $i = $i + 1;

            
    }
               


}

}

 $y_axis=$y_axis;

    $pdf->SetY($y_axis);
     $pdf->SetFont('Arial','I',8);

    $pdf->Cell(155,7,utf8_decode('RP: Registro de prestamo. '.$devoldevult),0,'J');

     $y_axis=$y_axis+6;
    $pdf->SetFont('Arial','',12);
     $pdf->SetY($y_axis);



    $pdf->MultiCell(155,7,utf8_decode('El estudiante debe solventar dicha situación para no tener inconvenientes con su proceso de graduación.
    '),0,'J');


     $y_axis=$y_axis+27;
$pdf->SetY($y_axis);

$pdf->Cell(15);
$pdf->SetX(33);
$pdf->SetFont('Arial','U',14);
$pdf->Cell(0,5,"  ".$bitPersonaName."  ");
$pdf->SetX(113);
$pdf->Cell(0,5,'                                     ');

$y_axis=$y_axis+7;
$pdf->SetY($y_axis);
$pdf->SetFont('Arial','B',14);
$pdf->SetX(47);
$pdf->Cell(0,5, $_SESSION['usuNivelNombre']);
$pdf->Cell(0,5,'');
$pdf->SetX(133);
$pdf->Cell(0,5,'Sello');
$pdf->SetTitle('Solvencia de Biblioteca - '.$itemsName[$varCarnet], true);


$pdf->Output("I","SolvencialBiblioteca".$itemsName[$varCarnet].".pdf", true );





$pdf->Output();






    

?>