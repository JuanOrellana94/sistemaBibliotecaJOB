<?php
  


  $servidor="localhost";
  $usuario="bibliocnx";
  $clave="Biblioteca123$";
  $base="sistemabiblioteca";


  $sistemaVersion="1.0";

  $tabla2="...";
  $carta="612x792";
  $a4="595x842";
  $oficio="612x1008";

  // codigo instituto
    $instituocodigo="88160-";

  //Nombre de tablas

//Multa por retraso
    $costoMulta=0.25;
  
  $tablaBitacora="bitacora";

  $tablaDewey="deweyclasificacion";
 
  $tablaGenAut="detallegeneroautor";
 
  $tablaGenero="generoliterario";


    //Nombre de tabla USUARIOS
   $tablaUsuarios="usuario";

   $varUsuCodigo="usucod";
   $varAccNombre="usuaccnom";
   $varContrasena="usuclave";
   $varPriNombre="usuprinom";
   $varSegNombre="ususegnom";
   $varPriApellido="usupriape";
   $varSegApellido="ususegape";
   $varCarnet="usucarnet";
   $varCorreo="usucorre";
   $varCueEstatus="usuestcue";
   $varAnoBachi="usuanobac";
   $varSecAula="ususecaul";
   $varTipBachi="usutipbac";
   $varNivel="usunivel";
   $varusucodbar="usucodbar";

  //1Nombre de tabla LIBROS

    $tablaLibros="libros";
     //tabl aname
   $varlibcod="libcod";
   $varlibtit="libtit";
   $varlibdes="libdes";
   $varlibpor="libpor";
   $varlibfecreg="libfecreg";
   $varlibfecedi="libfecedi";
   $varlibnumpag="libnumpag";
   $varlibisbn="libisbn";
   $varlibgenaut="autcod"; //libro genero-autor
   $varlibDew="dewcod";
   $varlibedit="editcod";
   $varlibtags="libtags";

   // 2 Nombres tabla DEWEY: dewcod, dewcodcla, dewtipcla;
   $vardewcod="dewcod";
   $vardewcodcla="dewcodcla";
   $vardewtipcla="dewtipcla";

   // 3 Nombres tabla AUTORLIBRO autcod, autnom, autape, autseud, autdes;
   //tabla
    $tablAutor="autorlibro";

    $varautcod="autcod";
    $varautnom="autnom";
    $varautape="autape";   
    $varautseud="autseud";
    $varautdes="autdes";

    // 4 Nombres tabla GENEROLITERARIO gencod, gennom, gensub, gendes;
    $vargencod="gencod";
    $vargennom="gennom";   
    $vargensub="gensub";
    $vargendes="gendes";

    // 5 NOMBRE TABLA DETALLEGENEROAUTOR genautcod, gencod, autcod;
    $vargenautcod="genautcod";   
    $vargencod="gencod";
    $varautcod="autcod";

   // TABLA EDITORIAL
     $tablaEditoral="editorialeslibros";
 // 6 NOMBRE TABLA EDITORIAL editcod, editnom, editpai

    $vareditcod="editcod";   
    $vareditnom="editnom";
    $vareditpai="editpai";

     // TABLA ESTANTE
    $tablaEstante="estante";
  // 7 NOMBRE TABLA ESTANTE estcod,estdes

    $varestcod="estcod";
    $varestdes="estdes";

        // TABLA EJEMPLARES
     $tablaEjemplares="ejemplareslibros";

     
 // 8 NOMBRE TABLA EJEMPLARESLIBROS ejemcod, ejemcodreg, ejemfecadq, ejemtipadq, ejemdetaqu, ejempruni, ejemestu, ejemconfis, ejemdetcon, ejemres, estcod, libcod

    $varejemcod="ejemcod";
    $varejemcodreg="ejemcodreg";
    $varejemfecadq="ejemfecadq";
    $varejemdetaqu="ejemdetaqu";
    $varejempruni="ejempruni";
    $varejemestu="ejemestu";
    $varejemconfis="ejemconfis";
    $varejemdetcon="ejemdetcon";
    $varejemres="ejemres";
    $varejemestcod="estcod"; 
    $varejemlibcod="libcod";
    $varejemtipadq="ejemtipadq";
    $varexistcodbar='existcodbar';
    $varejemcodbar='ejemcodbar';
    $varejemfecreg='ejemfecreg';
    $varejemfecest='ejemfecest';


 // TABLA EQUIPO
      $tablaEquipo="equipo";
//9 NOMBRE DE TABLA EQUIPO equicod,equitip, equimar, equides, equicodifi
    $varequicod="equicod";
    $varequitip="equitip";    
    $varequimg="equimg";
    $varequides="equides";
    $varequicodifi="equicodifi";
    $varequifecreg="equifecreg";

// TABLA existenciaequipo
    $tablaExistenciaequipo="existenciaequipo";
////10 NOMBRE DE LA TABLA existenciaequipo: existcod, existcodreg, existfecadq, existtipadq, existdetadq, existpreuni, existestu, existconfis, existdesest, estcod, equicod
    $varexistcod="existcod";
    $varexistcodreg="existcodreg";
    $varexistfecadq="existfecadq";
    $varexisttipadq="existtipadq";
    $varexistdetadq="existdetadq";
    $varexistpreuni="existpreuni";
    $varexistestu="existestu";
    $varexistmarca="existmarca";    
    $varexistconfis="existconfis";
    $varexistdesest="existdesest";
    $varestcod="estcod";
    $varequicodExist="equicod";
    $varequicod="equicod";
    $varexistcodbar='existcodbar';
    $varexistfecreg='existfecreg';
    $varexistfecest='existfecest';



 //TABLA SOLICITUD DE PRESTAMO BOLSA PRESTAMO   BOLSAPRESTAMO
  //solcod, usucod, libcod, solfec, libcantidad, solfecenviar CARRITO BOLSA DE LIBROS
    $varbolsaprestamo="bolsaprestamo";
    $varsolcod="solcod";
    $varusucod="usucod";
    $varlibcodcar="libcod";
    $varsolfec="solfec";
    $varlibcantidad="libcantidad";
    $varsolfecenviar="solfecenviar";
    $varsolestado="solestado";
    $varequipfecreg="equipfecreg";

//TABLA RESUMEN DE LIBRO PRESTAMO
//VARIABLES resumenlibroprestamo
//prestcodlib, prestfeclib, prestdevlib, prestcomlib, prestestlib, prestrenlib, usuCodigo, usuCodBiblio   

    $varresumenlibroprestamo="resumenlibroprestamo";
    $varprestcod="prestcodlib";
    $varprestfec="prestfeclib";
    $varprestdev="prestdevlib";
    $varprestcom="prestcomlib";
    $varprestest="prestestlib";
    $varprestren="prestrenlib";
    $varusuCodigoF="usuCodigo";
    $varusuCodBiblio="usuCodBiblio"; 
    $varprestfechafin="prestfechafin";
    $varprestdevsolv="prestdevsolv";

  //VARIABLES detallesprestamolibro
  //detcodlib, prestcodlib, ejemcod
  //detcodlib, prestcodlib, ejemcod 

  $vardetallesprestamolibro="detallesprestamolibro";

  $vardetcodlib="detcodlib";
  $varprestcodlib="prestcodlib";
  $varejemcodlib="ejemcod";
  $vardetlibest="detlibest";

//TABLA RESUMEN DE EQUIPO PRESTAMO
//VARIABLES resumenequipoprestamo

  //prestcodequi, prestfecequi, prestdevequi, prestcomequi, prestestequi, usucod
    $varresumenequipoprestamo="resumenequipoprestamo";

    $varprestcodequi="prestcodequi";
    $varprestfecequi="prestfecequi";
    $varprestdevequi="prestdevequi";
    $varprestcomequi="prestcomequi";
    $varprestestequi="prestestequi";
    $varusuCodigoFEquipo="usucod";
    $varusuCodBiblioEquipo="usuCodBiblioEquipo";
     $varprestfechafinEquipo="prestfechafinEquipo";


//detallesprestamolibro; 
  //detcodequi, prestcodequi, existcod
  //detcodequi, prestcodequi, existcod, detequiest


  $vardetallesprestamoequipo="detallesprestamoequipo";

  $vardetcodequi="detcodequi";
  $varprestcodequiDet="prestcodequi";
  $varexistcodDet="existcod";
    $vardetequiest="detequiest";




   //Variables de BITACORA
    //bircod, bitfec, bitdes, bitusucod, bitnomlib, bitnombre
    $tablaBitacora="bitacora";
  $varBitCod="bircod";
  $varFecha="bitfec";
  $varDesc="bitdes";
  $varBitUsuCodigo="bitusucod";
  $varNomLibreria="bitnomlib";
  $varNomPersona="bitnombre";





?>
