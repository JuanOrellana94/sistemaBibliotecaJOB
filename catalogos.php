
<body>
  <?php

    include("top.php");
    include("pages/catalogs/catbar.php");






 $pageLocation=$_GET["pageLocation"];

if ($pageLocation=="libros") {
    include("pages/catalogs/libros.php");
 } else if ($pageLocation=="autores") {
 	include("pages/autores/verAutores.php");
 }else if ($pageLocation=="editoriales") {
 	include("pages/editoriales/verEditoriales.php");
 }else if ($pageLocation=="estantes") {
 	include("pages/estantes/verEstantes.php");
 }else if ($pageLocation=="ejemplares") {
 	include("pages/ejemplares/verEjemplares.php");
 }else if ($pageLocation=="usuarios") {
 	include("pages/usuarios/verUsuarios.php");
 }else if ($pageLocation=="categorias") {
 	include("pages/categorias/verCategorias.php");
 }else if ($pageLocation=="equipo") {
 	include("pages/equipo/verEquipo.php");
 }else if ($pageLocation=="existencias") {
 	include("pages/existencias/verExistencias.php");
 }





 include("down.php");


?>
