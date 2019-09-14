     <?php      
        if ($_SESSION['usuNivelNombre']=='Administrador') {
        # code...
           $bloqueo="disabled";
       }else{
           $bloqueo="";
       }   
     ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="escritorio.php">Escritorio</a></li>
      <li class="breadcrumb-item">Catalogos</li>   
      <li class="breadcrumb-item" active  >Libros</li>
    </ol>
  </nav>  
    


<div class="container-fluid" > 
    <div class="col-sm-12"> 

      <!--Panel/card para el catalogo de libros-->
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle; margin: 5px">
               <p class="font-weight-light"> <h3>  Catalogo de Libros</h3>  Administrar y agregar nuevos libros.</p>       
            </div>           
          </div>     
        </div>
        <!--Cuerpo del panel--> 
        <div class="card-body">                    
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-5">
                      <form name="formBusqueda" id="formBusqueda" action="#" method="POST"  onsubmit="recargarTabla();">          
                        <div class="input-group">               
                          <input type="text" class="form-control" placeholder="Realizar busqueda" id="textBusqueda" name="textBusqueda"> 
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-info" type="button" id="buscarLibro" onclick="recargarTabla();"> Buscar </button>
                          </div>            
                        </div>
                        <small id="dateHelp" class="form-text text-muted">Busca por medio de Titulo, Autor, Genero o Codigo ISBN.</small>
                      </form>  
                    </div> 
                    <div class="col-sm-3">
                      <div name="cargandoFeedback" id="cargandoFeedback" align="left"> </div>
                      
                    </div>  
                    <div class="col-sm-2">
                      <div name="accionFeedback" id="accionFeedback"> </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="btn-group float-right" role="group" aria-label="Opciones"> 
                         <button class="btn btn-light float-right" type="button" onclick="recargarTablaLimpiar();" data-toggle="tooltip" data-placement="top" title="Recargar Tabla">
                          <img src="img/icons/Bookreload.png" width="45" height="45">
                        </button>
                        <button type="button" class="btn btn-light " <?php echo $bloqueo ?> data-toggle="modal" data-target="#newBookModal">
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo Libro" src="img/icons/Bookadd.png" width="45" height="45">
                        </button>
                       
                      </div>
                    </div>
                  </div>

                  <div>

                     <!--TABLA LIBROS CONTENEDOR-->
                    <div align="center" name="cargarTablaLibros" id="cargarTablaLibros">
                    </div>
                                       
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>          
      </div>
         <!--Fin delcuerpo del panel-->
      </div>
       <!--Fin Panel/card para el catalogo de libros-->
    </div>
</div>


 <!--MODAL PARA INSERTAR NUEVO LIBRO-->
<div class="modal fade" id="newBookModal" tabindex="-1" role="dialog" aria-labelledby="newBookModal" aria-hidden="true">
  
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBookModalTittle"><img src="img/icons/book.png" width="30" height="30"> Nuevo Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formNewBook" name="formNewBook">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="TituloLabel">Titulo</label>
                <input type="text" class="form-control" name="libtit"  maxlength="150" id="libtit" aria-describedby="libtit" placeholder="Titulo del libro" onkeyup="sendInsert(this,this.value)">
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-10">                    
                    <div id="insertarSelectEditorialNuevo">
                      <label for="editcod">Editorial</label>
                      <select class="form-control js-Dropdown-Busqueda" style="width:100%"  type="text" name="editcod" id="editcod">
                        <option value="">Seleccione una Editorial</option>
                          <?php
                            $selEdit=mysqli_query($conexion,"SELECT * FROM $tablaEditoral e");
                            while ($listEdit=mysqli_fetch_assoc($selEdit)) { ?> 
                              
                              <option value="<?php echo $listEdit["$vareditcod"]?>"><?php echo $listEdit["$vareditnom"]?>         
                        </option>
                        <?php 
                          }
                          
                        ?>
                      </select>
                    </div>  
                  </div>
                  <div class="col-2">
                    <button type="button" class="btn btn-light float-right" data-toggle="modal" data-target="#newEditorialModal" style="margin-top: 65%">
                      <img src="img/icons/Bookaeditorial+.png" width="35" height="35">
                    </button>

                  </div>
                </div>
              </div> 
              <div class="form-group">

                <label for="Descripcion">Descripcion</label>
                <div class="input-group">
                  <textarea class="form-control" style="height: 135px" aria-label="libdes" id="libdes" name="libdes" onkeyup="sendInsert(this,this.value)"></textarea>
                </div>
              </div> 
              <div class="form-group">
                <label for="TituloLabel">Numero de paginas</label>
                <input type="text" class="form-control" name="libnumpag" id="libnumpag"  maxlength="10" onkeypress="return isNumberKey(event);" onkeyup="sendInsert(this,this.value)" aria-describedby="libnumpag" placeholder="">
              </div> 
            </div>
            <div class="col-sm-6">            
              <div class="form-group">
                <div class="row">
                  <div class="col-10">
                    <div id="insertarSelectAutorNuevo">
                      <label for="AutorLabel">Autor</label>
                      <select class="form-control js-Dropdown-Busqueda" style="width:100%" type="text" name="autnom" id="autnom">
                        <option value="">Seleccione Autor</option>
                        <?php
                          $selAuto=mysqli_query($conexion,"SELECT * FROM $tablAutor") or die ("Error al conectar");
                          while ($listAuto=mysqli_fetch_assoc($selAuto)) { ?> 
                            
                            <option value="<?php echo $listAuto["$varautcod"]?>"><?php echo $listAuto["$varautnom"]." ".$listAuto["$varautape"]?>         
                            </option>
                        <?php 
                          }
                        ?>      
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <button type="button" class="btn btn-light float-right" data-toggle="modal" data-target="#newAuthorModal" style="margin-top: 65%">
                      <img src="img/icons/Bookauthor+png.png" width="35" height="35">
                    </button>

                  </div>
                </div>
              </div>
              <div class="form-group">    
                <label for="PublishDate">Fecha de Publicacion</label>
                <input type="date" name="libfecedi" id="libfecedi" value="">
                <small id="emailHelp" class="form-text text-muted">Fecha de la publicacion de la edicion.</small>
              </div>

          
                <div class="form-group">
                <label for="libisbn">Codigo ISBN</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend" style="max-width: 10%">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input"  id="checkISBN"  checked style="max-width: 5%"  data-toggle="tooltip" data-placement="left" title="Habilitar uso de Codigo ISBN para este libro" >
                    </div>
                  </div>
                <input type="text" class="form-control" name="libisbn" id="libisbn" maxlength="27" onkeypress="return isNumberSysmbolKey(event);"  onkeyup="sendInsert(this,this.value)" aria-describedby="libisbn" placeholder="000-0-00-000000-0">
              </div>
              </div>
              <div class="form-group">
                <label for="DeweyLabel">Codigo Dewey</label>
                <select class="form-control js-Dropdown-Busqueda" style="width:100%" type="text" name="dewcod" id="dewcod">
                  <option value="">Seleccione codigo</option>
                  <?php
                    $selEdit=mysqli_query($conexion,"SELECT * FROM $tablaDewey");
                    while ($listEdit=mysqli_fetch_assoc($selEdit)) { ?> 
                      
                       <option value="<?php echo $listEdit["$vardewcod"]?>"><?php echo $listEdit["$vardewcodcla"]." ".$listEdit["$vardewtipcla"]?>              
                      </option>
                  <?php 
                    }
                    
                  ?>
                  
                </select>
              </div>
               <div class="form-group">
                <label for="TituloLabel">Criterios de Busqueda (Usa Tab entre cada criterio)</label>
                <input  class="block-tab" name="libtags" id="libtags" maxlength="27" aria-describedby="editlibisbn" placeholder="" onkeyup="sendInsert(this,this.value)">
              </div>             
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
               
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
         <div id="answerPrint" style="color: red; font-weight: bold; text-align: center;"></div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertBook()">Guardar Nuevo</button>
      </div>
     
    </div>
  </div>
</div>

 <!--MODAL PARA  EDITAR  ACTUALIZAR LIBRO -->
<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBookModalTittle"><img src="img/icons/book.png" width="30" height="30"> Nuevo Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEditBook" name="formEditBook">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" class="form-control" name="editlibcod" id="editlibcod" aria-describedby="editlibcod" placeholder="Titulo del libro" hidden="true">
                <label for="TituloLabel">Titulo</label>
                <input type="text" class="form-control" name="editlibtit"   maxlength="150" id="editlibtit" aria-describedby="editlibtit" placeholder="Titulo del libro">
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-10">
                    <div id="insertarSelectEditorialEditar">  
                      <label for="EditorialLabel">Editorial</label>
                      <select class="form-control js-Dropdown-Busqueda" style="width:100%" type="text" name="editeditcod" id="editeditcod">
                        <option value="">Seleccione una Editorial</option>
                          <?php
                            $selEdit=mysqli_query($conexion,"SELECT * FROM $tablaEditoral e");
                            while ($listEdit=mysqli_fetch_assoc($selEdit)) { ?> 
                              
                              <option value="<?php echo $listEdit["$vareditcod"]?>"><?php echo $listEdit["$vareditnom"]?>         
                        </option>
                        <?php 
                          }
                          
                        ?>
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-2"> 
                    <button type="button" class="btn btn-light float-right" data-toggle="modal" data-target="#newEditorialModal" style="margin-top: 65%">
                      <img src="img/icons/Bookaeditorial+.png" width="35" height="35">
                    </button>

                  </div>
                </div>
              </div> 
              <div class="form-group">

                <label for="Descripcion">Descripcion</label>
                <div class="input-group">
                  <textarea class="form-control" style="height: 135px" aria-label="editlibdes" id="editlibdes" name="editlibdes"></textarea>
                </div>
              </div> 
              <div class="form-group">
                <label for="TituloLabel">Numero de paginas</label>
                <input type="text" class="form-control" name="editlibnumpag" id="editlibnumpag" maxlength="10" onkeypress="return isNumberKey(event);" aria-describedby="editlibnumpag" placeholder="">
              </div>           
            </div>
            <div class="col-sm-6">            
              <div class="form-group">
                <div class="row">
                  <div class="col-10">
                    <div id="insertarSelectAutorEditar">
                      <label for="AutorLabel">Autor</label>
                      <select class="form-control js-Dropdown-Busqueda" style="width:100%" type="text" name="editgenautcod" id="editgenautcod">
                        <option value="">Seleccione Autor</option>
                        <?php
                          $selAuto=mysqli_query($conexion,"SELECT * FROM $tablAutor") or die ("Error al conectar");
                          while ($listAuto=mysqli_fetch_assoc($selAuto)) { ?> 
                            
                            <option value="<?php echo $listAuto["$varautcod"]?>"><?php echo $listAuto["$varautnom"]." ".$listAuto["$varautape"]?>         
                            </option>
                        <?php 
                          }
                        ?>      
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <button type="button" class="btn btn-light float-right" data-toggle="modal" data-target="#newAuthorModal" style="margin-top: 65%">
                      <img src="img/icons/Bookauthor+png.png" width="35" height="35">
                    </button>

                  </div>
                </div>
              </div>
              <div class="form-group">    
                <label for="PublishDate">Fecha de Publicacion</label>
                <input type="date" name="editlibfecedi" id="editlibfecedi" value="">
                <small id="dateHelp" class="form-text text-muted">Fecha de la publicacion de la edicion.</small>
              </div>

             
              <div class="form-group">
                <label for="TituloLabel">Codigo ISBN</label>
                <input type="text" class="form-control" name="editlibisbn" id="editlibisbn" maxlength="27" onkeypress="return isNumberSysmbolKey(event);"  aria-describedby="editlibisbn" placeholder="">
              </div>
              <div class="form-group">
                <label for="DeweyLabel">Codigo Dewey</label>
                <select class="form-control js-Dropdown-Busqueda" style="width:100%" type="text" name="editdewcod" id="editdewcod">
                  <option value="">Seleccione codigo</option>
                  <?php
                    $selEdit=mysqli_query($conexion,"SELECT * FROM $tablaDewey");
                    while ($listEdit=mysqli_fetch_assoc($selEdit)) { ?> 
                      
                      <option value="<?php echo $listEdit["$vardewcod"]?>"><?php echo $listEdit["$vardewcodcla"]." ".$listEdit["$vardewtipcla"]?>             
                      </option>
                  <?php 
                    }
                    
                  ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="TituloLabel">Criterios de Busqueda (Usa Tab entre cada criterio)</label>
                <input  class="block-tab" name="editlibtags" id="editlibtags" maxlength="27" aria-describedby="editlibtags" placeholder="">
              </div>     
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
         <div id="answerEditPrint" style="color: red; font-weight: bold; text-align: center;"></div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="updateBook()">Guardar cambios</button>
      </div>
     
    </div>
  </div>
</div>  


 <!--MODAL PARA INSERTAR NUEVO EDITORIAL-->
<div class="modal fade" id="newEditorialModal" tabindex="-1" role="dialog" aria-labelledby="newEditorialModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEditorialModalTittle"><img src="img/icons/Bookaeditorial.png" width="30" height="30"> Nueva Editorial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNewEditorial" name="formNewEditorial  ">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <label for="TituloLabel">Nombre de la Editorial</label>
                <input type="text" class="form-control" name="modaleditnom" id="modaleditnom" aria-describedby="modaleditnom" placeholder="Editorial">
              </div>
     
            </div>
          </div>      
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="answerEditorialPrint" style="color: red; font-weight: bold; text-align: center;"></div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertEditorial()">Insertar</button>
      </div>
     
    </div>
  </div>
</div>


<!--MODAL PARA INSERTAR NUEVO AUTOR-->
<div class="modal fade" id="newAuthorModal" tabindex="-1" role="dialog" aria-labelledby="newAuthorModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newAuthorModal"><img src="img/icons/Bookauthor.png" width="30" height="30"> Nuevo Autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNewAuthor" name="formNewAuthor">
          <div class="row">
           
            <div class="col-sm-6">

              <div class="form-group">
                <label for="TituloLabel">Nombre</label>
                <input type="text" class="form-control" name="formautnom" id="formautnom" aria-describedby="varautnom" placeholder="">
              </div>
             
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="TituloLabel">Apellido</label>
                <input type="text" class="form-control" name="formautape" id="formautape" aria-describedby="varautape" placeholder="">
              </div>

            </div>
           </div>
           <div class="row">
             <div class="col-sm-12">
                <div class="form-group">
                <label for="TituloLabel">Codigo Cutter</label>
                <input type="text" class="form-control" name="formautseud" id="formautseud" aria-describedby="autseud" placeholder="">
              </div>

             </div>
           </div>
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="answerAuthorPrint" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertAuthor()">Insertar</button>
      </div>
     
    </div>
  </div>
</div>


<!--MODAL PARA ELIMINAR LIBRO-->
<div class="modal fade" id="deleteBookModal" tabindex="-1" role="dialog" aria-labelledby="deleteBookModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEditorialModalTittle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Esta es una accion <h5> Permanente. </h5> Desea Eliminar libro?</label></div>                
                <input type="text" class="form-control" name="modallibcod" id="modallibcod" aria-describedby="modallibcod" placeholder="Editorial" hidden="true">
                <input type="text" class="form-control" name="modallibtit" id="modallibtit" aria-describedby="modallibtit" placeholder="Editorial" hidden="true">

                <h4>
                  <div id="deleteLabel" style="color: red; font-weight: bold; text-align: center;"></div>
                </h4>
              </div>
            </div>
          </div>    
        </form>
        <div id="answerDeletePrint" style="color: red; font-weight: bold; text-align: center;"></div>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" onclick="deleteBook()">Eliminar</button>
      </div>
     
    </div>
  </div>
</div>


 <!--MODAL PARA AGREGAR FOTOGRAFIA FOTO IMAGEN SUBIR-->
<div class="modal fade" id="fotografiaModal" tabindex="-1" role="dialog" aria-labelledby="fotografiaModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEditorialModalTittle"><img src="img/icons/BookCover.png" width="30" height="30"> Agregar una portada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formFotografia" name="formFotografia ">
          <div class="row">         
            <div class="col-sm-12 ">
              <div class="form-group ">
                <div class="alert alert-success" role="alert">
                  Subir una imagen de portada 
                </div>
                
                <input type="text" class="form-control" name="modallibcodPortada" id="modallibcodPortada" aria-describedby="modallibcodPortada" placeholder="Codigo Libro" hidden="true">
                 <input type="text" class="form-control" name="modallibtitPortada" id="modallibtitPortada" aria-describedby="modallibtitPortada" placeholder="Codigo Libro" hidden="true">
                <div id="preview" class="d-flex justify-content-center"> <img src="img/icons/BookCover2.png" class="img-fluid"/></div>
                <div id="errorMensaje" class="d-flex justify-content-center"></div><br>
                     <div class="d-flex justify-content-center">
                      <input style="width:90%" id="subirPortada"  type="file" accept="image/jpeg" name="subirPortada" />
                    </div>                 
              </div>
     
            </div>
          </div> 
          <div class="d-flex justify-content-center">
            <div class="btn-group">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" type="submit" class="btn btn-primary" onclick="subirFotografia()">Subir portada</button>
            </div>
          </div>     
        </form>
      </div>
      <div class="modal-footer d-flex justify-content-center" style="background: #D5D9DF;">
         
      
      </div>
     
    </div>
  </div>
</div>








<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->
<script>
window.onload = function () {
   
    recargarTabla();
    setSelect2();

    $('.block-tab').on('keydown', function(e) { 
      if (e.keyCode == 9) e.preventDefault(); 
    });

    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        recargarTabla();
        event.preventDefault();
        return false;    
      }
    });
 };
//AJAX PARA SUBIR  PORTADA LIBRO



 $('#newBookModal').on('show.bs.modal', function (event) {
    $('#libtags').tagsInput({      
      'defaultText':'Nueva',     
      'height':'50px',
      'width':'350px',
      'placeholderColor' : '#003764'
    });
 });

 $('#editBookModal').on('show.bs.modal', function (event) {
  
 });

//Insertar datos al modal de editar
    $('#editBookModal').on('show.bs.modal', function (event) {

      
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varlibtit = button.data('varlibtit')
      var varlibcod = button.data('varlibcod') // Extract info from data-* attributes
      var varlibdes = button.data('varlibdes')
      var varlibfecedi = button.data('varlibfecedi')
      var varlibnumpag = button.data('varlibnumpag')
      var varlibgenaut = button.data('varlibgenaut')
      var vardewcod = button.data('vardewcod')
      var varlibedit = button.data('varlibedit')
      var varlibisbn = button.data('varlibisbn')
      var varlibtags = button.data('varlibtags')

  
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Editar: ' + varlibtit);

      document.getElementById('editlibcod').value = varlibcod;
      document.getElementById('editlibtit').value = varlibtit;
      document.getElementById('editeditcod').value = varlibedit;
      document.getElementById('editlibdes').value = varlibdes;
      document.getElementById('editgenautcod').value = varlibgenaut;
      document.getElementById('editlibfecedi').value = varlibfecedi;
      document.getElementById('editlibnumpag').value = varlibnumpag;    
      document.getElementById('editlibisbn').value = varlibisbn;
      document.getElementById('editdewcod').value = vardewcod;
      document.getElementById('editlibtags').value = varlibtags; 


     

      $('.js-Dropdown-Busqueda').select2({
        "selected": true
      });

      $('#editlibtags').tagsInput({      
        'defaultText':'Nueva',     
        'height':'50px',
        'width':'350px',
        'placeholderColor' : '#003764'
      });

       $('#editlibtags').removeTag('');

    
    }) //TRIGGER EN MODAL PARA SUBIR FOTOGRAFIA IMAGEN LIBRO
   
     $('#fotografiaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varlibtit = button.data('varlibtit')
      var varlibcod = button.data('varlibcod')
      var varlibpor = button.data('varlibpor') // Extract info from data-* attributes

      $("#errorMensaje").html('').show(500);
     
      var modal = $(this)

      $("#preview").html('<img src="'+varlibpor+'" style="max-width: 50%">')
      document.getElementById('modallibcodPortada').value = varlibcod;
      document.getElementById('modallibtitPortada').value = varlibtit;
      
      
    })

     //TRIGGER EN MODAL PARA ELIMINAR LIBRO
     $('#deleteBookModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varlibtit = button.data('varlibtit')
      var varlibcod = button.data('varlibcod') // Extract info from data-* attributes


      
      var modal = $(this)

      $("#deleteLabel").html(varlibtit);
      document.getElementById('modallibcod').value = varlibcod;
      document.getElementById('modallibtit').value = varlibtit;
      
      
    })



</script>
