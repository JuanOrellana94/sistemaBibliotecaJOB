
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

//$selectYear="2019";

if (isset($_GET["year"])) { 
    $selectYear  = $_GET["year"]; 
  } else {
    $selectYear="2019"; 
  };

if (isset($_GET["month"])) { 
        $selectMonth  = $_GET["month"]; 
    } else {
        $selectMonth=""; 
};



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



  //get 
  $sql="SELECT count($varlibcod) FROM $tablaLibros WHERE DATE_FORMAT($varlibfecreg,'%Y')='$selectYear' AND DATE_FORMAT($varlibfecreg,'%c')='$selectMonth';";
  $profileData=mysqli_query($conexion,$sql);
  $countBook = mysqli_fetch_array($profileData);


  $sql="SELECT count($varejemcod) FROM $tablaEjemplares WHERE DATE_FORMAT($varejemfecreg,'%Y')='$selectYear' AND DATE_FORMAT($varejemfecreg,'%c')='$selectMonth';";
  $profileData=mysqli_query($conexion,$sql);
  $countEjem = mysqli_fetch_array($profileData);

  $sql="SELECT COUNT($varejemcod) from $tablaEjemplares WHERE $varejemestu='3' AND DATE_FORMAT($varejemfecest,'%Y')='$selectYear' AND DATE_FORMAT($varejemfecest,'%c' )='$selectMonth';";
  
  $profileData=mysqli_query($conexion,$sql);
  $countStolen = mysqli_fetch_array($profileData);



class PDF extends FPDF
{
// Page header
function Header()
{

  if (isset($_GET["month"])) { 
        $selectMonth  = $_GET["month"]; 
    } else {
        $selectMonth="0"; 
    };
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
    $this->Cell(5);
    
    // Title

    $this->Image('../../img/structures/reportP3Color.png',0,0,210);
    $this->SetY(33);
    $this->SetX(10);
    $this->Cell(0,10,'Informe de libros, Mes de '.$monthName,0);
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
$pdf->SetY(45);
$pdf->Cell(0,5,'Fecha: '.date('d/m/Y'));

$pdf->Cell(100);
$pdf->SetY(60);

$pdf->SetFont('Arial','',14);
$pdf->MultiCell(155,7,utf8_decode('Este informe hace constar que durante el mes de: '. $monthName.', año: '.$selectYear.', se han adquirido dentro de la biblioteca '.$countBook[0].' nuevos libros y se agrego un total de '.$countEjem[0].' ejemplares únicos para libros existentes. El listado de cada libro y su respectiva cantidad de ejemplares se lista a continuación:
'),0,'J');


$pdf->SetXY(15,150);

$pdf->SetAutoPageBreak(false);

$y_axis_initial = 97;

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(15);
$pdf->Cell(10,6,'',1,0,'L',1);
$pdf->Cell(50,6,'Codigo ISBN',1,0,'L',1);
$pdf->Cell(93,6,'Libro',1,0,'L',1);
$pdf->Cell(31,6,'# Ejemplares',1,0,'R',1);


//Select the Products you want to show in your PDF file

$sql="SELECT libro.libisbn,libro.libtit,aut.autnom, aut.autape, COUNT(ejem.ejemcod) as counter
  FROM libros AS libro
  INNER JOIN autorlibro AS aut ON libro.autcod=aut.autcod
  LEFT JOIN ejemplareslibros AS ejem ON  ejem.libcod=libro.libcod
  WHERE DATE_FORMAT($varejemfecreg,'%Y')='$selectYear'
  AND DATE_FORMAT($varejemfecreg,'%c')='$selectMonth'
  GROUP BY libro.libcod
  ORDER BY libro.libisbn
  ;";

$result=mysqli_query($conexion,$sql);


//initialize counter
$y_axis_initial = 103;
$i = 0;

//Set maximum rows per page
$max = 18;

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
      $max = 24 ;
      
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY(57);
        $pdf->SetX(15);
        $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(10,6,'',1,0,'L',1);
      $pdf->Cell(50,6,'Codigo ISBN',1,0,'L',1);
    $pdf->Cell(93,6,'Libro',1,0,'L',1);
    $pdf->Cell(31,6,'# Ejemplares',1,0,'R',1);
        
        //Go to next row
        $y_axis = 57;
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','',12);
    $pdf->SetY($y_axis);
    $pdf->SetX(15);
    $pdf->Cell(10,6,$counterNum,1,0,'L',1);
    $pdf->Cell(50,6,$row['libisbn'],1,0,'L',1);
    $pdf->Cell(93,6,utf8_decode($row['libtit']),1,0,'L',1);
    $pdf->Cell(31,6,$row['counter'],1,0,'R',1);

    //Go to next row
    $y_axis=$y_axis+$row_height;
    $i = $i + 1;
}

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','',12);
    $pdf->SetY($y_axis);
    $pdf->SetX(15);
    $pdf->Cell(153,6,'Total de ejemplares:',1,0,'L',1);
  $pdf->Cell(31,6,$countEjem[0],1,0,'R',1);

$y_axis=$y_axis+8;

$pdf->SetY($y_axis);

$pdf->SetX(15);
$pdf->SetFont('Arial','',13);

$sql="SELECT count($varejemcod) FROM $tablaEjemplares;";
  $profileData=mysqli_query($conexion,$sql);
  $countEjem = mysqli_fetch_array($profileData);

$pdf->MultiCell(169,6,utf8_decode('El total actual de libros registrados dentro de biblioteca es de '.$countEjem[0].'. Se indica tambien que '.$countStolen[0].' ejemplares fueron reportados como extraviados durante el periodo de '.$monthName.'.'),0,'J');

$pdf->SetX(15);
$pdf->SetFont('Arial','B',14);

$y_axis=$y_axis+19;

$pdf->SetY($y_axis);
$pdf->SetLeftMargin(10);
$pdf->SetX(15);

$pdf->MultiCell(169,7,utf8_decode('Atentamente, representante de biblioteca:'),0,'J');

$y_axis=$y_axis+20;
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
$pdf->SetTitle('Reporte Bibliotecario '.$monthName, true);


$pdf->Output("I","Reporte".$monthName."Biblioteca.pdf", true );











?>