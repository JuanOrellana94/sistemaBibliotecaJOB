<?php
  


  $servidor="localhost";
  $usuario="bibliocnx";
  $clave="Biblioteca123$";
  $base="sistemabiblioteca";

  
  $tabla2="...";
  $carta="612x792";
  $a4="595x842";
  $oficio="612x1008";


  //Nombre de tablas
  
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


  //solcod, usucod, libcod, solfec, libcantidad, solfecenviar CARRITO BOLSA DE LIBROS
    $varbolsaprestamo="bolsaprestamo";
    $varsolcod="solcod";
    $varusucod="usucod";
    $varlibcodcar="libcod";
    $varsolfec="solfec";
    $varlibcantidad="libcantidad";
    $varsolfecenviar="solfecenviar";




   //Variables de BITACORA
  $varFecha="bitfec";
  $varDesc="bitdes";
  $varBitUsuCodigo="bitusucod";
  $varNomLibreria="bitnomlib";
  $varNomPersona="bitnombre";

?>
