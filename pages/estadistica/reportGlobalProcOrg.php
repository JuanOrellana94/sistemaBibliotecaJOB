
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
$debtReprint='0';
$deCounter="0.00";
//$selectYear="2019";

if (isset($_GET["year"])) { 
    $selectYear  = $_GET["year"]; 
  } else {
    $selectYear="2019"; 
};

  

class PDF extends FPDF
{
// Page header
function Header()
{
  if (isset($_GET["year"])) { 
    $selectYear  = $_GET["year"]; 
  } else {
    $selectYear="2019"; 
  };

  if (isset($_GET["month"])) { 
        $selectMonth  = $_GET["month"]; 
    } else {
        $selectMonth="8"; 
    };
   $selectMonth="8"; 
      $varDate=$selectMonth;

            if ($varDate==1) {
              $monthName="Enero";
            } else if ($varDate==2) {
              $monthName="Febrero";
            } else if ($varDate==3) {
              $monthName="Marzo";
            } else if ($varDate==4) {
              $monthName="Abril";
            } else if ($varDate==5) {
              $monthName="Mayo";
            } else if ($varDate==6) {
              $monthName="Junio";
            } else if ($varDate==7) {
              $monthName="Julio";
            } else if ($varDate==8) {
              $monthName="Agosto";
            } else if ($varDate==9) {
              $monthName="Septiembre";
            } else if ($varDate==10) {
              $monthName="Octubre";
            } else if ($varDate==11) {
              $monthName="Noviembre";
            }else if ($varDate==12) {
              $monthName="Diciembre";
            }

    // Logo
    //$this->Image('../../img/structures/reportP3Color.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    $this->Cell(0);
    
    // Title

    $this->Image('../../img/structures/reportP3ColorWIDE.png',0,0,277);
    $this->SetY(28);
    $this->SetX(75);
    $this->Cell(0,10,utf8_decode('Informe anual de préstamos: '.$selectYear),0);
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
$pdf = new PDF('L','mm','Letter');

$pdf->AliasNbPages();
$pdf->AddPage('L');
$pdf->SetLeftMargin(25);
$pdf->SetFont('Arial','',12);

$pdf->Cell(5);
$pdf->SetY(27);
$pdf->Cell(0,5,'Fecha: '.date('d/m/Y'));

$pdf->Cell(100);
$pdf->SetY(38);
$pdf->SetX(21);

$pdf->SetFont('Arial','',14);
$pdf->MultiCell(240,7,utf8_decode('A continuación se reportan todos los préstamos de ejemplares correspondientes al año '.$selectYear.' realizados en el Instituto Católico Técnico Vocacional Jesús Obrero por sus estudiantes y su personal.
'),0,'J');


$pdf->SetXY(15,150);

$pdf->SetAutoPageBreak(false);

$y_axis_initial = 55;

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(13);
$pdf->Cell(13,6,'',1,0,'L',1);
$pdf->Cell(11,6,'RP',1,0,'L',1);
$pdf->Cell(60,6,'Usuario',1,0,'L',1);
$pdf->Cell(48,6,'Ejemplar',1,0,'L',1);
$pdf->Cell(60,6,'Titulo',1,0,'L',1);
$pdf->Cell(43,6,'Fecha',1,0,'R',1);
$pdf->Cell(20,6,'Multa',1,0,'R',1);



//Select the Products you want to show in your PDF file



$result=mysqli_query($conexion,"
  SELECT resumen.prestcodlib, resumen.prestfeclib, resumen.prestdevlib, resumen.prestestlib,
  resumen.prestfechafin, ejemplar.ejemcodreg, libro.libtit, usuario.usuprinom, usuario.ususegnom,usuario.usupriape,usuario.ususegape,usuario.usuaccnom,usuario.usunivel
  FROM resumenlibroprestamo as resumen
  INNER JOIN detallesprestamolibro as detalle on resumen.prestcodlib = detalle.prestcodlib
  INNER JOIN ejemplareslibros as ejemplar on detalle.ejemcod = ejemplar.ejemcod
  INNER JOIN libros as libro on libro.libcod = ejemplar.libcod
  INNER JOIN usuario as usuario on resumen.usuCodigo=usuario.usucod
  WHERE DATE_FORMAT(resumen.prestfeclib,'%Y')='$selectYear'
  GROUP BY detalle.detcodlib
  
  ;");


//initialize counter
$y_axis_initial = 61;
$i = 0;

//Set maximum rows per page
if (mysqli_num_rows($result)<=18) {
 $max = 18;
}else{
  $max = 24;
}


$y_axis=$y_axis_initial;

//Set Row Height
$row_height = 5;
$counterNum=0;
while($row = mysqli_fetch_array($result))
{
  $counterNum=$counterNum+'1';
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    { 
      $max = 21 ;
      
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY(43);
        $pdf->SetX(15);
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->SetX(13);
        $pdf->Cell(13,6,'n',1,0,'L',1);
        $pdf->Cell(11,6,'RP',1,0,'L',1);
        $pdf->Cell(60,6,'Usuario',1,0,'L',1);
        $pdf->Cell(48,6,'Ejemplar',1,0,'L',1);
        $pdf->Cell(60,6,'Titulo',1,0,'L',1);
        $pdf->Cell(43,6,'Fecha',1,0,'R',1);
        $pdf->Cell(20,6,'Multa',1,0,'R',1);
        //Go to next row
        $y_axis = 44;
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','',10);
    $pdf->SetY($y_axis);
    $pdf->SetX(15);
    $pdf->Cell(10,6,$counterNum,1,0,'L',1);

    if ($debtReprint==$row['prestcodlib']) {
      $varCodigoPrestamo="";
      $varsBorder="L R";
    }else{
      $varCodigoPrestamo=$row['prestcodlib'];
      $varsBorder="L T R B ";
    }

    if ($i == $max-1) { 
      $varsBorder .= " B ";
    }
 

    $pdf->SetX(13);
    $pdf->Cell(13,6,$counterNum,1,0,'L',1);
    $pdf->Cell(11,6,$varCodigoPrestamo,$varsBorder,0,'R',1);
    $pdf->Cell(60,6,utf8_decode($row['usuprinom'].' '.$row['usupriape']),1,0,'L',1);
    $pdf->Cell(48,6,$row['ejemcodreg'],1,0,'L',1);
    $pdf->Cell(60,6,utf8_decode($row['libtit']),1,0,'L',1);
    $date=date_create($row['prestfeclib']);

      
     $totalCosto='0.00';
    if ($row['usunivel']=="3") {
      if ($row['prestfechafin']=="") {
      $date2="Sin devolver";
        $fechaColDev = strtotime($row[$varprestdev]);
        $fechaHoyColor = date("d-m-Y");

        if ($row[$varprestest]=='0' AND date("d-m-Y",$fechaColDev)<$fechaHoyColor) {
           
            $OldDate=strtotime($row[$varprestdev]);
            $NewDate = date('M j,Y', $OldDate);
            $diff= date_diff(date_create($NewDate),date_create(date("M j, Y")));
            $retrasoActiveDias=$diff->format('%d');
            $costoRetrasoActivediasUnformatted=$retrasoActiveDias*$costoMulta;
            $totalCosto=$totalCosto+$costoRetrasoActivediasUnformatted;          
        }
      } else{
        $fechaColor = strtotime($row[$varprestdev]);
        $fechaColorFin = strtotime($row[$varprestfechafin]); 
        $date2print=date_create($row['prestfechafin']);
        $date2=date_format($date2print,"d/m/Y");
        if (date("d-m-Y",$fechaColorFin)> date("d-m-Y",$fechaColor)){
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


    $costoRetrasoActivedias=number_format($totalCosto, 2);

    

    if ($debtReprint==$row['prestcodlib']) {
      $costoRetrasoActivedias="";
    }else{
      $debtReprint=$row['prestcodlib'];
      $deCounter=$deCounter+number_format($costoRetrasoActivedias, 2);
      $costoRetrasoActivedias= "$".$costoRetrasoActivedias;
    }
    $pdf->Cell(43,6,date_format($date,"d/m/Y").' - '.$date2,1,0,'R',1);
    $pdf->Cell(20,6,$costoRetrasoActivedias,$varsBorder,0,'R',1);

    //Go to next row
    $y_axis=$y_axis+$row_height;
    $i = $i + 1;
}
$pdf->SetY($y_axis);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(13);
$pdf->Cell(13,6,'',1,0,'L',1);
$pdf->Cell(119,6,'Total de prestamos','L T B',0,'L',1);
$pdf->Cell(60,6,mysqli_num_rows($result),'T B R',0,'R',1);
$pdf->Cell(43,6,'Multa acumulada:','L T B',0,'L',1);
$pdf->Cell(20,6, '$'.$deCounter,'T B R',0,'R',1);

$y_axis=$y_axis+8;

$pdf->SetY($y_axis);

$pdf->SetX(15);
$pdf->SetFont('Arial','I',9);


$pdf->MultiCell(250,4,utf8_decode('RP: Registro de Prestamo. El informe muestra cada ejemplar prestado durante el periodo designado, con su fecha de prestamo y fecha en la que fue devuelto o se indica que aun no ha sido devuelto de ser el caso. La multa, si la hay, es el resultado de la cantidad de dias que el estudiante se retraso en la devolucion de su prestamo por el valor de la multap/dia de: $'.$costoMulta).' * Usuarios de tipo personal estan exentos de multas por retraso.',0,'J');

$pdf->SetX(15);
$pdf->SetFont('Arial','B',14);

$y_axis=$y_axis+14;

$pdf->SetY($y_axis);
$pdf->SetLeftMargin(10);
$pdf->SetX(15);

$pdf->MultiCell(169,7,utf8_decode('Atentamente, representante de biblioteca:'),0,'J');

$y_axis=$y_axis+15;
$pdf->SetY($y_axis);

$pdf->Cell(15);
$pdf->SetX(73);
$pdf->SetFont('Arial','U',14);
$pdf->Cell(0,5,"  ".$bitPersonaName."  ");
$pdf->SetX(153);
$pdf->Cell(0,5,'                                     ');

$y_axis=$y_axis+7;
$pdf->SetY($y_axis);
$pdf->SetFont('Arial','B',14);
$pdf->SetX(82);
$pdf->Cell(0,5, $_SESSION['usuNivelNombre']);
$pdf->Cell(0,5,'');
$pdf->SetX(173);
$pdf->Cell(0,5,'Sello');
$pdf->SetTitle('Reporte Bibliotecario '.$selectYear, true);


$pdf->Output("I","reporte Prestamos".$selectYear.".pdf", true );











?>