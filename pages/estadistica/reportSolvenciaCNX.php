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
    //get   usuanobac, ususecaul, usutipbac,
    $sql="SELECT usu.$varCarnet, resumen.$varprestest,usu.$varPriNombre, usu.$varSegNombre, usu.$varPriApellido, usu.$varSegApellido, usu.$varAnoBachi,usu.$varSecAula,usu.$varTipBachi
        FROM usuario as usu
        LEFT JOIN $varresumenlibroprestamo as resumen on usu.$varUsuCodigo=resumen.$varusuCodigoF
        WHERE usu.$varNivel='3' AND usu.$varCarnet='$varCarnetSearch'
        GROUP by usu.$varUsuCodigo;";
    //echo $sql;
    $profileData=mysqli_query($conexion,$sql);
    $itemsName=mysqli_fetch_assoc($profileData);

                  $ANIO="";
              switch ($itemsName[$varAnoBachi]) {
                case 0:
                   $ANIO="1º";
                   break;            
                case 1:
                    $ANIO="2º";
                    break;
                case 2:
                   $ANIO="3º";
                   break;                                                                        
              } 
              $BACHI=""; 
              switch ($itemsName[$varTipBachi]) {
                case 0:
                    $BACHI="Salud";
                    break;
                case 1:
                    $BACHI="Mecanica";
                    break;
                case 2:
                    $BACHI="Contaduria";
                    break;                                                                                    
              } 
              $SECCION=""; 
              switch ($itemsName[$varSecAula]) {
                case 0:
                   $SECCION="sección A";
                   break;
                case 1:
                   $SECCION="sección B";
                   break;
                case 2:
                   $SECCION="sección C";
                  break;
                case 3:
                   $SECCION="sección D";
                   break;                                           
              }


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('../../img/structures/reportP3Color.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    // Move to the right
    $this->Cell(5);
    
    // Title

    $this->Image('../../img/structures/reportP3Color.png',0,0,218);
    $this->SetY(40);
    $this->SetX(75);
    $this->Cell(0,10,'SOLVENCIA',0);
    // Line break
    $this->Ln(20);
}
}
// Instanciation of inherited class

$pdf = new PDF('P','mm','Letter');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(25);
$pdf->SetFont('Arial','',12);

$pdf->Cell(5);
$pdf->SetY(36);
$pdf->SetX(142);
$pdf->Cell(0,5,'Fecha: '.date('d/m/Y'));

$pdf->Cell(100);
$pdf->SetY(70);

$pdf->SetFont('Arial','',14);
$pdf->MultiCell(155,7,utf8_decode('El Colegio Marista, Instituto Católico Técnico Vocacional Jesús Obrero a través de la Biblioteca hace constar que el estudiante '.$itemsName[$varPriNombre].' '.$itemsName[$varSegNombre].' '.$itemsName[$varPriApellido].' '.$itemsName[$varSegApellido].', con el carnet: '.$itemsName[$varCarnet].' del bachillerato '.$ANIO.' '.$BACHI.' '.$SECCION.', se encuentra solvente de los procesos y actividades bibliotecarias.'),0,'J');


$y_axis_initial=230;
$y_axis=$y_axis_initial;

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