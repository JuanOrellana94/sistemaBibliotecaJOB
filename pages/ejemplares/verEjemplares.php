<!--ASPECTO VISUAL DE LA PAGINA DE Ejemplares-->
    <!--CONTENEDOR PARA TABLA DE Ejemplares/MODALES PARA AGREGAR Y ELIMINAR Ejemplares--> 

    <?php
     if ($_SESSION['usuNivelNombre']=='Administrador') {
        # code...
           $bloqueo="disabled";
       }else{
        $bloqueo="";
       }   
     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
       

<!--INICIO CONTENEDOR DE CATALOGO DE Ejemplares-->    
<div class="container-fluid" > 
 <!--     -->
        <!--Cuerpo del panel--> 
        <div class="card-body">              
          <div class="row">            
            <div class="col-md-12">
              <div class="card">
                <div class="card-body"> 
                 <!--   -->

                   <table class="table" >
                     <tr >
                      <td rowspan="5" width="100" height="200"><h3>Perfil del libro</h3>  <hr style="color: #0056b2;" /><div><table class="table table-bordered table-hover"  style="background-color: #FFFFFF"; cellspacing="2"; cellpadding="2";  border-spacing: 5px; style="background-color: #FFFFFF;">
          

          <tbody>
                       <?php

              $tablaperfil=mysqli_query($conexion,"SELECT  t1.$varlibtit as Titulo, t1.$varlibdes as Descripcion , t1.$varlibpor as Portada , t2.$varautnom as Autor , t2.$varautape as Autorape, t5.$vareditnom as Editorial from $tablaLibros as t1 JOIN $tablAutor as t2 ON t2.$varautcod = t1.$varautcod JOIN $tablaEditoral as t5 on t5.$vareditcod = t1.$vareditcod where t1.$varlibcod = '$_GET[codigoLib]' ; ");
               
          if (mysqli_num_rows($tablaperfil)==0){
             echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>  
               La busqueda no devolvió ningún resultado  </div>";
            } else{

              $dataLibros=mysqli_fetch_assoc($tablaperfil) 
                          ?>
                 
                        

            <tr >             
              <td  align="center"><?php echo "<img src= '$dataLibros[Portada]' 'width=200 height=400' >";  ?> </td>
                          
                                        
            </tr>
            <tr>  

                        

              <td  align="center" height="100" width="200"><button type="button" class="btn btn-primary btn-lg btn-block"><p class="font-weight-light"><h4><?php echo $dataLibros['Titulo'];?></h4> <hr style="color: #0056b2;" /> </p>
                            <div align="left"><br>AUTOR:<br><p style="color:black"><?php echo $dataLibros['Autor'];?> <?php echo $dataLibros['Autorape'];?></p>EDITORIAL:<p style="color:black"><?php echo $dataLibros['Editorial'];?></p></div> 
              </button> </td>                       
                    

              
            </tr>
            
                          
                        
              
                    
            
            <?php 
            } ?>
          </tbody>
        </table></div></td>                       
                     </tr>
                     <tr>
                        <td height="50"><div class="col-sm-0">  
                          <div class="card">   
                          <div class="card-header">
                          <div class="row mx-auto">
                             <div style="vertical-align: middle; margin: 5px">
                          <p class="font-weight-light"> <h3>  Catalogo de Ejemplares</h3>  Administrar informacion de Ejemplares.</p>       
                             </div>           
                            </div>     
                         </div> </td>
                       </tr>
                       <tr>
                         <td height="50"><div class="row">

                    <div class="col-sm-5">

                      <form name="formBusqueda" id="formBusqueda">          
                        <div class="input-group">               
                          <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();"  type="text" class="form-control" placeholder="Realizar busqueda" id="textBusqueda" name="textBusqueda">
                          <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" value="<?php echo $_GET['codigoLib']; ?>" id="codigoLib" name="codigoLib" hidden> 
 
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-info" type="button" onclick="recargarTabla()"> Buscar </button>
                          </div> 
                        </div>
                        <small id="dateHelp" class="form-text text-muted">Herramienta de busqueda automatica.</small>
                      </form> 
                      <small id="dateHelp" class="form-text text-muted">Mostrar por estado</small> <br>
                      <form name="formBusqueda" id="formBusqueda">          
                        <div class="input-group">               
                          <select class="form-control" id="textBusquedaordenar" onchange="recargarTabla()">
                            <option value="0">DISPONIBLES</option>
                            <option value="1">PRESTADO</option>
                            <option value="2">ELIMINADOS</option>
                            <option value="3">EXTRAVIADOS</option>
                          </select> 
                        </div>  

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
                          <img src="img/icons/BookediorialReload.png" width="45" height="45">
                        </button>

                        <button type="button" class="btn btn-light float-right" <?php echo $bloqueo ?>  data-toggle="modal" data-target="#newEjemplarModal"  >
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo Ejemplar" src="img/icons/Bookadd.png" width="45" height="45">
                        </button>
                        
                      </div>
                    </div>
                    </div></td>
                       </tr> 
                       <tr>
                        <td > <div align="center" name="cargarTabla" id="cargarTabla"> </div></td>  
                       </tr>                        
                                             
                                                             
                   </table>
                               
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

<!--INICIAN MODALS PARA INSERTAR, MODIFICAR, ELIMINAR Ejemplares-->


<!--MODAL PARA INSERTAR NUEVO Ejemplar-->
<div class="modal fade" id="newEjemplarModal" tabindex="-1" role="dialog" aria-labelledby="newEjemplarModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     
     <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEjemplarModal"><img src="img/icons/Bookadd.png" width="30" height="30"> Nuevo Ejemplar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNuevoEjemplar" name="formNuevoEjemplar">                
           <table class="table" >
            <tr>
              <th>Detalles de adquisición</td>
            </tr>
            <tr>             
                 
                  <td>
                    <label>Tipo de ingreso:</label>
                    <div>
                       <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="hidden" name="formejemplarcodigolib" id="formejemplarcodigolib" value="<?php echo $_GET['codigoLib']; ?>" />                     
                      
                         <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name='formejemplaringreso' id='formejemplaringreso'>
                             <option value="">Seleccione un tipo de ingreso</option>
                             <option value="0">DONACION</option>
                             <option value="1">COMPRA</option>                            
                         </select>    
                         <p>Ingrese el detalle de ingreso:</p>
                           <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" type="" name="formdetalle" id="formdetalle"  />                        
                     <p>Ingrese el precio unitario:</p>
                           <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" type="number" min="0.01" step="0.01" name="formprecio" id="formprecio" disabled="" onkeypress="return soloNumeros(event);" /> 
                                                   
                 </div>
                  </td>
                <tr>                                  
                  <td>
               <!--  Condicion fisica: 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala -->
                    <label>Estado fisico:</label>               
                    <div>
                         <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name='formejemplarestado' id='formejemplarestado'>
                             <option value="">Seleccione una estado fisico</option>
                             <option value="0">OPTIMO</option>
                             <option value="1">MUY BUENO</option>
                             <option value="2">REGULAR</option>
                             <option value="3">MALA</option> 
                             <option value="4">MUY MALA</option>                           
                         </select>                      
                    </div>
                  </td>
                  </tr>   
            <tr>
                  <td>
                  <label for="formestantcod">Estantes</label>
                      <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" style="width:100%"  type="text" name="formestantcod" id="formestantcod">
                        <option value="">Seleccione una Estante</option>
                          <?php
                            $selEdit=mysqli_query($conexion,"SELECT * FROM $tablaEstante e");
                            while ($listEdit=mysqli_fetch_assoc($selEdit)) { ?> 
                              
                              <option value="<?php echo $listEdit["$varestcod"]?>" ><?php echo $listEdit["$varestdes"]?>         
                        </option>
                        <?php 
                          }
                          
                        ?>
                      </select>
                  </td> 
            </tr>                  
            </tr>  
             <td>
               <!--  Condicion fisica: 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala -->
                    <label>Cantidad de ejemplares a registrar: </label>               
                    <div>
                        <input class="form-control" type="number" name="formejemplarescantidad" id="formejemplarescantidad" value="1">                  
                    </div>
                  </td>                   
            <tr>
             <td>
                <label for="PublishDate">Fecha de Adquisicion</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="date" name="formejemplarfecha" id="formejemplarfecha" value="">
             </td>
           </tr>
            <tr>              
              <td>
                           <div class="form-group">
                              <label for="exampleFormControlTextarea2">Detalle del estado fisico:</label>
                             <textarea maxlength="250" class="form-control rounded-0" name="formejemplarcomentario" id="formejemplarcomentario" aria-describedby="formejemplarcomentario" placeholder="" rows="3"></textarea>
                           </div>
               </td>           
                   
          
              
            </tr>
        
           
          </tbody> 
        </table>
      </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaNuevoEjemplar" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="insertarbutton"  class="btn btn-primary" onclick="insertarEjemplar()">Insertar</button>
      </div>
          
    </div>
  </div>
</div>

<!--MODAL PARA MODIFICAR  Ejemplar-->
<div class="modal fade" id="modalEditarEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalEditarEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     
     <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEjemplarModal"><img src="img/icons/Bookadd.png" width="30" height="30">Editar Ejemplar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formEditEjemplar" name="formEditEjemplar">
          
           
        <div align="center">        
          <table class="table" s>   
       

           
             
                                        
            </tr>
            <tr>
              <th>Detalles de adquisición</td>
            </tr>
            <tr>             
                 
                  <td>
                    <label>Tipo de ingreso:</label>
                  
                      <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="hidden" name="editejemplarcodigo" id="editejemplarcodigo" />                     
                      <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control js-Dropdown-Busqueda" name='editejemplartipoingreso' id='editejemplartipoingreso' onchange="bloquearselect()">
                             <option value="0">DONACION</option>
                             <option value="1">COMPRA</option>                            
                         </select>
                      <p>Ingrese el detalle de ingreso:</p>
                           <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" type="" name="inputdetalle" id="inputdetalle"  /> 
                     <p>Ingrese el precio unitario:</p>
                           <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  type="" name="inputprecio" id="inputprecio"  />
                                               
                 
                  </td> 
                <tr>
                  <td>

               <!--  Condicion fisica: 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala -->
                    <label>Estado fisico:</label>               
                    <div>
                         <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control js-Dropdown-Busqueda" name='editejemplarestado' id='editejemplarestado'>                   
                          
                             <option value="0">OPTIMO</option>
                             <option value="1">MUY BUENO</option>
                             <option value="2">REGULAR</option>
                             <option value="3">MALA</option> 
                             <option value="4">MUY MALA</option>                           
                         </select>                      
                    </div>
                  </td>  
              </tr>
               <tr>
                  <td>
                  <label for="labelestantcod">Estantes</label>
                      <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control js-Dropdown-Busqueda" style="width:100%"  type="text" name="editestantcod" id="editestantcod">
                        <option value="">Seleccione una Estante</option>
                          <?php
                            $selEdit=mysqli_query($conexion,"SELECT * FROM $tablaEstante e");
                            while ($listEdit=mysqli_fetch_assoc($selEdit)) { ?> 
                              
                              <option value="<?php echo $listEdit["$varestcod"]?>" ><?php echo $listEdit["$varestdes"]?>         
                        </option>
                        <?php 
                          }
                          
                        ?>
                      </select>
                  </td> 
            </tr> 
            </tr> 
            <td>                    
                  <div class="form-group">    
                <label>Fecha de Adquisicion</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="date" name="editejemplarfecha" id="editejemplarfecha" value="">                
              </div>
              </td>
            <tr>              
              <td>
                           <div class="form-group">
                              <label for="exampleFormControlTextarea2">Detalle del estado fisico:</label>
                             <textarea maxlength="250" class="form-control rounded-0" name="editejemplarcomentario" id="editejemplarcomentario" aria-describedby="editejemplarcomentario" placeholder="" rows="3"></textarea>
                           </div>
               </td>           
                   
          
              
            </tr>
        
           
          </tbody> 
        </table>         
       </div>                
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaEditarEjemplar" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarEjemplar()">Editar</button>
      </div>
     
    </div>
  </div>
</div>




<!--MODAL PARA ELIMINAR Ejemplar-->

<div class="modal fade" id="modalBorrarEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteEjemplarTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Desea eliminar Ejemplar:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="delEjemplarcod" id="delEjemplarcod" aria-describedby="delEjemplarcod" placeholder="Ejemplar" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="delEjemplarnom" id="delEjemplarnom" aria-describedby="delEjemplarnom" placeholder="Ejemplar" hidden="true">
                           
                  <div id="labelBorrar" style="color: red; font-weight: bold; text-align: center;"></div>

         
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaBorrarEjemplar" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="deleteEjemplar()">Eliminar</button>
      </div>
     
    </div>
  </div>
</div>


<!-- Modal Ver ejemplar -->

<div class="modal fade" id="modalVerEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalVerEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
          <label id="verEjemplartit"></label>        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body" style="background: #D5D9DF;">        
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">                                             
                   <div id="contenedordiv"></div>
                    <div class="row">
                     <div class="col">
                      <table class="table" cellspacing="2" cellpadding="1">                       
                       <tr align="left">
                         <td><h6>CODIGO EJEMPLAR:</h6></td>
                         <td> <label id="verEjemplarcodreg"></label></td>                        
                       </tr>
                       <tr align="left">
                         <td><h6>TIPO DE ADQUISICION:</h6></td>
                         <td > <label id="verEjemplartipadqui"></label></td>                        
                       </tr>
                       <tr align="left">
                         <td><h6>DESCRIP. DE ADQUISICION:</h6></td>
                         <td colspan="3"> <label id="verEjemplardetadqui"></label></td>                        
                       </tr>                                      
                       <tr align="left">
                         <td><h6>DESCRIP.  FISICA:</h6></td>
                         <td colspan="3"><div><textarea maxlength="250" class="form-control rounded-0" name="verEjemplardesfisica" id="verEjemplardesfisica" aria-describedby="verEjemplardesfisica" placeholder="" rows="7" cols="100"></textarea></div></td>             
                       </tr>
                     </table>
                   </div>                    
                   </div>   
                         
               </div>              
              </div>
            </div>
             <div class="modal-footer" style="background: #D5D9DF;">              
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>             
             </div>
          </div>    
        </form>
      </div>      
    </div>
  </div>
</div>

                                        
<!-- Modal Ver codigo de barra -->

<div class="modal fade" id="modalBarraEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalBarraEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal" role="document">
    <div class="modal-content">
       <div class="modal-header" style="background: #D5D9DF;">
           <label id="codigobarra"></label>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>  
       </div> 
       <div class="modal-body">       
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">             
             <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" value="<?php echo $_GET['codigoLib']; ?>" id="codigoLib" name="codigoLib" hidden> 
              <div align="center" id="cargarcodigodebarra"></div>         
                         
               </div>              
              </div>
            </div>
        </div>
             <div class="modal-footer" style="background: #D5D9DF;">              
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>             
             </div>
          </div>    
        </form>
      </div>      
    </div>
  </div>
</div>                   
<!--MODAL PARA reanudar Ejemplar-->

<div class="modal fade" id="modalReanudarEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalReanudarEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteEjemplarTitle"><img src="img/icons/reanudar.png" width="35" height="30"> Reanudar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="reateForm" name="reateForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Desea reanudar este ejemplar:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="reaEjemplarcod" id="reaEjemplarcod" aria-describedby="reaEjemplarcod" placeholder="Ejemplar" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="reaEjemplarnom" id="reaEjemplarnom" aria-describedby="reaEjemplarnom" placeholder="Ejemplar" hidden="true">
                           
                  <div id="labelreanudar" style="color: green; font-weight: bold; text-align: center;"></div>

         
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaReanudarEjemplar" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-success" onclick="reanudarEjemplar()">Reanudar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA reportar Ejemplar-->

<div class="modal fade" id="modalReportarEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalReportarEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteEjemplarTitle"><img src="img/icons/laberinto.png" width="35" height="30"> Reportar como perdido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="repoForm" name="repoForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Desea reportar este ejemplar:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="repoEjemplarcod" id="repoEjemplarcod" aria-describedby="repoEjemplarcod" placeholder="Ejemplar" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="repoEjemplarnom" id="repoEjemplarnom" aria-describedby="repoEjemplarnom" placeholder="Ejemplar" hidden="true">
                           
                  <div id="labelreportar" style="color: green; font-weight: bold; text-align: center;"></div>

         
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaReportarEjemplar" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="reportarEjemplar()">Reportar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA encontrar Ejemplar-->

<div class="modal fade" id="modalEncontrarEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalEncontrarEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteEjemplarTitle"><img src="img/icons/encontrado.png" width="35" height="30">Reportar como encontrado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="encontrarForm" name="encontrarForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Desea marcar como encontrado este ejemplar:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="reanuEjemplarcod" id="reanuEjemplarcod" aria-describedby="reanuEjemplarcod" placeholder="Ejemplar" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="reanuEjemplarnom" id="reanuEjemplarnom" aria-describedby="reanuEjemplarnom" placeholder="Ejemplar" hidden="true">
                           
                  <div id="labelencontrar" style="color: green; font-weight: bold; text-align: center;"></div>

         
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaEncontrarEjemplar" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-success" onclick="encontrarEjemplar()">encontrar</button>
      </div>
     
    </div>
  </div>
</div>






<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->
<script>
    window.onload = function () {     
        
      recargarTabla();
      setSelect2();
      
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          recargarTabla();
          event.preventDefault();
          return false;
        
        }
      });

  };
//Funcion para recargar tabla
function recargarTabla(){
   //Mostrar gif de cargando a la par de la barra de busqueda
  $("#cargandoFeedback").show();
  $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

  var busqueda=$("#textBusqueda").val();
  var variablecod=$("#codigoLib").val();
  var ordenar=$("#textBusquedaordenar").val();
  busqueda=busqueda.trim().replace(/ /g, '%20');
  $("#cargarTabla").load("pages/ejemplares/tablaEjemplares.php?pagina=1&busqueda="+busqueda+"&codigoLib="+variablecod + "&ordenar=" + ordenar);
  
  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

  var busqueda=$("#textBusqueda").val();
  var variablecod=$("#codigoLib").val();
  var ordenar=$("#textBusquedaordenar").val();  
  $("#cargarTabla").load("pages/ejemplares/tablaEjemplares.php?pagina=1&busqueda="+busqueda+"&codigoLib="+variablecod + "&ordenar=" + ordenar);
    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}




//INSERTAR NUEVO Ejemplar
function insertarEjemplar(){       
        
  if ($("#formejemplaringreso").val()==""){
    $("#respuestaNuevoEjemplar").show();
    $("#respuestaNuevoEjemplar").html("seleccione un tipo de ingreso del Ejemplar");  
  }else if ($("#formejemplarestado").val()==""){
    $("#respuestaNuevoEjemplar").show();
    $("#respuestaNuevoEjemplar").html("seleccione un estado fisico del Ejemplar");  
  }else if ($("#formestantcod").val()=="") {
    $("#respuestaNuevoEjemplar").show();
    $("#respuestaNuevoEjemplar").html("seleccione un estante del Ejemplar");  
  }else if ($("#formejemplarescantidad").val()<1 || $("#formejemplarescantidad").val()>400 ) {
    $("#respuestaNuevoEjemplar").show();
    $("#respuestaNuevoEjemplar").html("Cantidad minima de ejemplares a registrar es 1 y la maxima cantidad es 400, por favor verifique el dato "); 
  }else if ($("#formejemplarfecha").val()=="") {
    $("#respuestaNuevoEjemplar").show();
    $("#respuestaNuevoEjemplar").html("seleccione una fecha de adquisicion del Ejemplar"); 
  }
  else {
    $("#respuestaNuevoEjemplar").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);  
    $("#insertarbutton").attr("disabled", true);
    var url = "pages/ejemplares/insertarEjemplar.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formNuevoEjemplar").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Nuevo Ejemplar agregado </div>");
                     recargarTabla();
                     limpiarFormularioEjemplar();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(500);          
                    }, 6000);
                    $("#respuestaNuevoEjemplar").hide(500);
                    $('#newEjemplarModal').modal('hide');

                     $("#insertarbutton").attr("disabled", false);   

                } else if (data==0) {
                  //error
                  $("#respuestaNuevoEjemplar").show();
                  $("#respuestaNuevoEjemplar").html("<div class='alert alert-warning' role='alert'>Esta Ejemplar ya ha sido agregado </div>");
                     recargarTabla();
                    setTimeout(
                        function() {
                          $("#respuestaNuevoEjemplar").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#respuestaNuevoEjemplar").show();
                  $("#respuestaNuevoEjemplar").html(data);
                     recargarTabla();

                    setTimeout(
                        function() {
                          $("#respuestaNuevoEjemplar").hide(500);                                
                    }, 6000);
                }
 
              }
            });

  }
}
//EDITAR Ejemplar
function editarEjemplar(){

  if ($("#editejemplartipoingreso").val()==""){
    $("#respuestaEditarEjemplar").show();
    $("#respuestaEditarEjemplar").html("seleccione un tipo de ingreso del Ejemplar");  
  }else if ($("#editejemplarestado").val()==""){
    $("#respuestaEditarEjemplar").show();
    $("#respuestaEditarEjemplar").html("seleccione un estado fisico del Ejemplar");  
  }else if ($("#editestantcod").val()=="") {
    $("#respuestaEditarEjemplar").show();
    $("#respuestaEditarEjemplar").html("seleccione un estante del Ejemplar");  
  }else if ($("#editejemplarfecha").val()=="") {
    $("#respuestaEditarEjemplar").show();
    $("#respuestaEditarEjemplar").html("seleccione una fecha de adquisicion del Ejemplar"); 
  }
  else {
    $("#respuestaEditarEjemplar").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/ejemplares/editarEjemplar.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formEditEjemplar").serialize(),
              success: function (data){               
                if (data==1) {
                  //success
                  $("#accionFeedback").show();
                  $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Ejemplar ha sido editado </div>");
                  recargarTabla();
                  setTimeout(
                      function() {
                        $("#accionFeedback").hide(500);
                        
                  }, 6000);
                  $("#respuestaEditarEjemplar").hide(500);    
                  $("#modalEditarEjemplar").modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaEditarEjemplar").show();
                  $("#respuestaEditarEjemplar").html("<div class='alert alert-warning' role='alert'>Otro Ejemplar ya esta registrado con estos datos </div>");    
                  setTimeout(
                      function() {
                        $("#respuestaEditarEjemplar").hide(500);
                        
                       
                  }, 6000);
                  
                } else {
                  //any other error
                  $("#respuestaEditarEjemplar").show();
                  $("#respuestaEditarEjemplar").html(data);                  
                  setTimeout(
                      function() {
                        $("#respuestaEditarEjemplar").hide(500);
                        
                       
                  }, 6000);
                }
                  


              }
            });

  }
}
//BORRAR FORMULARIO DE NUEVO Ejemplar
function limpiarFormularioEjemplar(){
   document.getElementById("formNuevoEjemplar").reset();

}

//BORRAR Ejemplar
function deleteEjemplar(){
  $("#borrarButton").attr("disabled", true);

  if ($("#delEjemplarcod").val()==""){
    $("#respuestaBorrarEjemplar").show();
    $("#respuestaBorrarEjemplar").html("Codigo de Ejemplar necesario");
  }else {
    $("#labelBorrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);

    var url = "pages/ejemplares/borrarEjemplar.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#deleteForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Ejemplar TIENE LIBROS INSCRITOS
                  $("#labelBorrar").show();
                  $("#notificationLabel").html("");
                  $("#labelBorrar").html("No se puede borrar a este Ejemplar. Porque esta en prestamo:");
                                        
            
        }else if (data=="1"){  

          $("#labelBorrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelBorrar").html("<h5>Ejemplar ha sido eliminado</h5>");

          $("#modalBorrarEjemplar").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Ejemplar Eliminado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

//reanudar ejemplar
 function reanudarEjemplar(){
  $("#borrarButton").attr("disabled", true);

  if ($("#reaEjemplarcod").val()==""){
    $("#respuestaReanudarEjemplar").show();
    $("#respuestaReanudarEjemplar").html("Codigo de Ejemplar necesario");
  }else {
    $("#labelreanudar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);

    var url = "pages/ejemplares/reanudar.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#reateForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Ejemplar TIENE LIBROS INSCRITOS
                  $("#labelreanudar").show();
                  $("#notificationLabel").html("");
                  $("#labelreanudar").html("No se puede reanudar  este Ejemplar. porque esta en prestamo:");
                                        
            
        }else if (data=="1"){  

          $("#labelreanudar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelreanudar").html("<h5>Ejemplar ha sido Reanudado</h5>");

          $("#modalReanudarEjemplar").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Ejemplar Reanudado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}
//reportar ejemplar
 function reportarEjemplar(){
  $("#borrarButton").attr("disabled", true);

  if ($("#repoEjemplarcod").val()==""){
    $("#respuestaReportarEjemplar").show();
    $("#respuestareportarEjemplar").html("Codigo de Ejemplar necesario");
  }else {
    $("#labelreportar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);

    var url = "pages/ejemplares/reportar.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#repoForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Ejemplar TIENE LIBROS INSCRITOS
                  $("#labelreportar").show();
                  $("#notificationLabel").html("");
                  $("#labelreportar").html("No se puede reportar  este Ejemplar no esta en prestamo");
                                        
            
        }else if (data=="1"){  

          $("#labelreportar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelreportar").html("<h5>Ejemplar ha sido Reportado como perdido</h5>");

          $("#modalReportarEjemplar").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Ejemplar reportado como perdido </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

//encontrar ejemplar
 function encontrarEjemplar(){
  $("#borrarButton").attr("disabled", true);

  if ($("#reanuEjemplarcod").val()==""){
    $("#respuestaEncontrarEjemplar").show();
    $("#respuestaEncontrarEjemplar").html("Codigo de Ejemplar necesario");
  }else {
    $("#labelencontrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);

    var url = "pages/ejemplares/encontrar.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#encontrarForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Ejemplar TIENE LIBROS INSCRITOS
                  $("#labelencontrar").show();
                  $("#notificationLabel").html("");
                  $("#labelencontrar").html("No se puede reportar como encontrado  este Ejemplar esta en prestamo");
                                        
            
        }else if (data=="1"){  

          $("#labelencontrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelencontrar").html("<h5>Ejemplar ha sido reportado como encontrado</h5>");

          $("#modalEncontrarEjemplar").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Ejemplar reportado como encontrado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
         }            
      }
    });
  }
}

 $('#modalEditarEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varejemplarcod = button.data('varejemplarcod')
      var varejemplartitulo = button.data('varejemplartitulo')
      var varejemplarestante  = button.data('varejemplarestante')      
      var varejemplarcomentario  = button.data('varejemplarcomentario') 
      var inputprecio         = button.data('varejemplarprecio') 
      var varejemplarcondicion         = button.data('varejemplarcondicion')
      var varejemplartipoingreso         = button.data('varejemplartipoingreso')
      var varejemplardetaingreso         = button.data('varejemplardetaingreso')
      var varejemplarfecha         = button.data('varejemplarfecha') 

       
      var modal = $(this)
      modal.find('.modal-title').text('Editar Ejemplar: ' + varejemplartitulo );
       if (button.data('varejemplartipoingreso')== 0) {
              $("#inputprecio").prop("disabled", true);
              $("#inputdetalle").prop("disabled", false);
       }else{
              $("#inputprecio").prop("disabled", false);
              $("#inputdetalle").prop("disabled", true);
       }
        
       document.getElementById('editejemplarcomentario').value = varejemplarcomentario;      
       document.getElementById('editejemplarcodigo').value = varejemplarcod; 
       document.getElementById('inputprecio').value = inputprecio;
       //Se debe asignar el codigo que se buscara al 'select' no el nombre del campo.
       document.getElementById('editestantcod').value = varejemplarestante;
       document.getElementById('editejemplarestado').value = varejemplarcondicion;
       document.getElementById('editejemplartipoingreso').value = varejemplartipoingreso;
       document.getElementById('editejemplarfecha').value = varejemplarfecha; 
       document.getElementById('inputdetalle').value = varejemplardetaingreso;
       
       
        
    $('.js-Dropdown-Busqueda').select2({
        "selected": true
     });
   
      
    })


//Eliminar Ejemplar
  
     $('#modalBorrarEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varejemplarcod = button.data('varejemplarcod')
      var varejemplarnom = button.data('varejemplarnom')     
      var varejemplarcodreg = button.data('varejemplarcodreg')  
      $('#borrarButton').attr("disabled", false);  
      
      
      var modal = $(this)

       $("#notificationLabel").html('Desea Eliminar el libro  con codigo de registro:');
    


      $("#labelBorrar").html('<h5> '+varejemplarcodreg+' '+'<h5> ');
      document.getElementById('delEjemplarcod').value = varejemplarcod;
      document.getElementById('delEjemplarnom').value = varejemplarnom;
      
      
      
    })
//Reanudar Ejemplar
  
     $('#modalReanudarEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varejemplarcod = button.data('varejemplarcod')
      var varejemplarnom = button.data('varejemplarnom')
      var varejemplarcodreg = button.data('varejemplarcodreg')      

      $('#borrarButton').attr("disabled", false);  
      
      
      var modal = $(this)

       $("#notificationLabel").html('Desea reanudar el libro  con codigo de registro:');
    


      $("#labelreanudar").html('<h5> '+varejemplarcodreg+' '+'<h5> ');
      document.getElementById('reaEjemplarcod').value = varejemplarcod;
      document.getElementById('reaEjemplarnom').value = varejemplarnom;
      
      
      
    })

//Reportar Ejemplar
  
     $('#modalReportarEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varejemplarcod = button.data('varejemplarcod')
      var varejemplarnom = button.data('varejemplarnom')
      var varejemplarcodreg = button.data('varejemplarcodreg')      

      $('#borrarButton').attr("disabled", false);  
      
      
      var modal = $(this)

       $("#notificationLabel").html('Desea reportar como perdido  el libro el libro  con codigo de registro:');
    


      $("#labelreportar").html('<h5> '+varejemplarcodreg+' '+'<h5> ');
      document.getElementById('repoEjemplarcod').value = varejemplarcod;
      document.getElementById('repoEjemplarnom').value = varejemplarnom;
      
      
      
    })

//Encontrar Ejemplar
  
     $('#modalEncontrarEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varejemplarcod = button.data('varejemplarcod')
      var varejemplarnom = button.data('varejemplarnom')
      var varejemplarcodreg = button.data('varejemplarcodreg')      

      $('#borrarButton').attr("disabled", false);  
      
      
      var modal = $(this)

       $("#notificationLabel").html('Desea marcar como encontrado el libro  con codigo de registro:');
    


      $("#labelencontrar").html('<h5> '+varejemplarcodreg+' '+'<h5> ');
      document.getElementById('reanuEjemplarcod').value = varejemplarcod;
      document.getElementById('reanuEjemplarnom').value = varejemplarnom;
      
      
      
    })

//Ver ejemplar

$('#modalVerEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 

       var varejemplarportada  = button.data('varejemplarportada')
       $("#contenedordiv").html('<img align=left src="'+varejemplarportada+'" width=200 height=350>')      
       var varejemplartitulo = button.data('varejemplartitulo') 
       var varejemplarcodreg = button.data('varejemplarcodreg')
       var varejemplartipadqui = button.data('varejemplartipadqui')
       var varejemplardetadqui = button.data('varejemplardetadqui')
       var varejemplardesfisica = button.data('varejemplardesfisica')       


      var modal = $(this)   
        
       $("#verEjemplartit").html('<h4 align=center>Perfil del libro: '+varejemplartitulo+' '+'<h4> ');
       $("#verEjemplarcodreg").html('<h6 align=center>'+varejemplarcodreg+' '+'<h6> ');
       $("#verEjemplartipadqui").html('<h6 align=center>'+varejemplartipadqui+' '+'<h6> '); 
       $("#verEjemplardetadqui").html('<h6 align=center>'+varejemplardetadqui+' '+'<h6> '); 
       $("#verEjemplardesfisica").html(varejemplardesfisica);  
       
      
    })
//ver codigo de barra
$('#modalBarraEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) //
      var varejemplarcodlib  = button.data('varejemplarcodlib')      
      var varejemplarcodigoreg  = button.data('varejemplarcodigoreg')       
      var varejemplartitulo = button.data('varejemplartitulo')
      var varejemplarnumero = button.data('varejemplarnumero')
      

          
varejemplarnumero
      var modal = $(this)
       
       var codigoLib=$("#codigoLib").val();   
       $("#cargarcodigodebarra").load("pages/codbarras/vercbejemplar.php?codeje="+varejemplarcodigoreg+"&codigoLib=" + codigoLib); 
       $("#codigobarra").html('<h4 align=center>'+varejemplartitulo+', Ejemplar #'+varejemplarnumero+' '+'<h4> ')      

        
       
      
    })

     //habilitar input dependiendo del tipo de ignreso
 
$( function() {
    $("#formejemplaringreso").change( function() {
        if ($(this).val() === "0") {
            $("#formprecio").prop("disabled", true);
            $("#formdetalle").prop("disabled", false);
            // si selecciona donado, borra lo que contiene el input de precio:
            document.getElementById('formprecio').value="";
        } else {
            $("#formprecio").prop("disabled", false);
            $("#formdetalle").prop("disabled", true);
            document.getElementById('formdetalle').value="";
        }
    });
}); 
// en editar
 function bloquearselect(){
    if (document.getElementById('editejemplartipoingreso').value == 0) {
      $("#inputprecio").prop("disabled", true);
      $("#inputdetalle").prop("disabled", false);   

    }else{
      $("#inputprecio").prop("disabled", false);
      $("#inputdetalle").prop("disabled", true);      
    }
 }
  
// dejar los inmputs en mayusculas

$("#inputUpCase").keydown(function(event) {
            // Allow only backspace and delete
            if ( event.keyCode == 46 || event.keyCode == 8 ) {
                // let it happen, dont do anything
            }
            else {
                // Ensure that it is not a mayus and stop the keypress
                if (event.keyCode < 65 || event.keyCode > 90 ) {
                    event.preventDefault(); 
                }   
            }
        });

     //onkeypress="return soloLetras(event);" 

 function soloLetras(evt){
       key = event.keyCode || evt.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

    //onkeypress="return soloNumeros(event);" 

 function soloNumeros(evt){
       key = event.keyCode || evt.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "0123456789.";
       especiales = "8";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
  

</script>
