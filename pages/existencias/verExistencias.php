<!--ASPECTO VISUAL DE LA PAGINA DE Existencias-->
    <!--CONTENEDOR PARA TABLA DE Existencias/MODALES PARA AGREGAR Y ELIMINAR Existencias--> 

    <?php
       if ($_SESSION['usuNivelNombre']=='Administrador') {
        # code...
           $bloqueo="disabled";
       }else{
        $bloqueo="";
       } 
     ?>
<!--DIRECCION DE LA UBICACION ACTUAL--> 

<!--INICIO CONTENEDOR DE CATALOGO DE Existencias-->    
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
                      <td rowspan="5" width="100" height="200"><h3>Perfil del Equipo</h3>  <hr style="color: #0056b2;" /><div><table class="table table-bordered table-hover"  style="background-color: #FFFFFF"; cellspacing="2"; cellpadding="2";  border-spacing: 5px; style="background-color: #FFFFFF;">
          

          <tbody>
                       <?php

              $tablaEquipo=mysqli_query($conexion,"SELECT * FROM $tablaEquipo where $varequicod = '$_GET[equipoCod]'; ");
               
          if (mysqli_num_rows($tablaEquipo)==0){
             echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>  
               La busqueda no devolvió ningún resultado  </div>";
            } else{

              $dataLibros=mysqli_fetch_assoc($tablaEquipo) 
                          ?>
                 
                        

            <tr >             
              <td  align="center"><?php echo "<img src= '$dataLibros[$varequimg]' 'width=200 height=400' >";  ?> </td>
                          
                                        
            </tr>
            <tr>  

                        

              <td  align="center" height="100" width="200"><button type="button" class="btn btn-primary btn-lg btn-block"><p class="font-weight-light"><h4><?php echo $dataLibros[$varequitip];?></h4> <hr style="color: #0056b2;" /> </p>
                            <div align="left"><br>Descripcion:<br><?php echo $dataLibros[$varequides];?> </div> 
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
                          <p class="font-weight-light"> <h3>  Catalogo de Existencias</h3>  Administrar informacion de Existencias.</p>       
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
                          <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" value="<?php echo $_GET['equipoCod']; ?>" id="equipoCod" name="equipoCod" hidden> 
 
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
                          <img src="img/icons/equiporeload.png" width="45" height="45">
                        </button>

                        <button type="button" class="btn btn-light float-right" <?php echo $bloqueo ?>  data-toggle="modal" data-target="#newExistenciaModal"  >
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo Existencia" src="img/icons/equipmentadd.png" width="45" height="45">
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

<!--INICIAN MODALS PARA INSERTAR, MODIFICAR, ELIMINAR Existencias-->


<!--MODAL PARA INSERTAR NUEVO Existencia-->
<div class="modal fade" id="newExistenciaModal" tabindex="-1" role="dialog" aria-labelledby="newExistenciaModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     
     <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newExistenciaModal"><img src="img/icons/equipmentadd.png" width="30" height="30"> Nuevo Existencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNuevoExistencia" name="formNuevoExistencia">                
           <table class="table" >
            <tr>
              <th>Detalles de adquisición</td>
            </tr>
            <tr>             
                 
                  <td>
                    <label>Tipo de ingreso:</label>
                    <div>
                       <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="hidden" name="formExistenciaequipoCod" id="formExistenciaequipoCod" value="<?php echo $_GET['equipoCod']; ?>" />
                   
                      
                         <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name='formExistenciaingreso' id='formExistenciaingreso'>
                             <option value="">Seleccione un tipo de ingreso</option>
                             <option value="0">DONACION</option>
                             <option value="1">COMPRA</option>                            
                         </select>    
                         <p>Ingrese el detalle de ingreso:</p>
                           <input maxlength="450" style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" type="" name="formdetalle" id="formdetalle"  />                        
                     <p>Ingrese el precio unitario:</p>
                           <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" type="" name="formprecio" id="formprecio" disabled="" /> 
                                                   
                 </div>
                  </td>
                <tr>                                  
                  <td>
               <!--  Condicion fisica: 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala -->
                    <label>Estado fisico:</label>               
                    <div>
                         <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name='formExistenciastado' id='formExistenciastado'>
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
           <tr>
             <td>
                <label for="PublishDate">Fecha de Adquisicion</label>
                <input type="date" name="formExistenciafecha" id="formExistenciafecha" value="">
             </td>
           </tr>
            <tr>              
              <td>
                           <div class="form-group">
                              <label for="exampleFormControlTextarea2">Detalle del estado fisico:</label>
                             <textarea maxlength="250" class="form-control rounded-0" name="formExistenciacomentario" id="formExistenciacomentario" aria-describedby="formExistenciacomentario" placeholder="" rows="3"></textarea>
                           </div>
               </td>           
                   
          
              
            </tr>
        
           
          </tbody> 
        </table>
      </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaNuevoExistencia" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertarExistencia()">Insertar</button>
      </div>
          
    </div>
  </div>
</div>

<!--MODAL PARA MODIFICAR  Existencia-->
<div class="modal fade" id="modalEditarExistencia" tabindex="-1" role="dialog" aria-labelledby="modalEditarExistencia" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     
     <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newExistenciaModal"><img src="img/icons/equipmentadd.png" width="30" height="30">Editar Existencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formeditexistencia" name="formeditexistencia">
          
           
        <div align="center">        
          <table class="table" s>   
       

           
             
                                        
            </tr>
            <tr>
              <th>Detalles de adquisición</td>
            </tr>
            <tr>             
                 
                  <td>
                    <label>Tipo de ingreso:</label>
                  
                      <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="hidden" name="editexistenciacodigo" id="editexistenciacodigo" />                     
                      <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control js-Dropdown-Busqueda" name='editexistenciatipoingreso' id='editexistenciatipoingreso'>
                             <option value="0">DONACION</option>
                             <option value="1">COMPRA</option>                            
                         </select>
                      <p>Ingrese el detalle de ingreso:</p>
                           <input maxlength="450" style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" type="" name="inputdetalle" id="inputdetalle"  /> 
                     <p>Ingrese el precio unitario:</p>
                           <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" type="" name="inputprecio" id="inputprecio"  />
                                               
                 
                  </td> 
                <tr>
                  <td>

               <!--  Condicion fisica: 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala -->
                    <label>Estado fisico:</label>               
                    <div>
                         <select style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control js-Dropdown-Busqueda" name='editExistenciastado' id='editExistenciastado'>                   
                          
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
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="date" name="editexistenciafecha" id="editexistenciafecha" value="">                
              </div>
              </td>
            <tr>              
              <td>
                           <div class="form-group">
                              <label for="exampleFormControlTextarea2">Detalle del estado fisico:</label>
                             <textarea maxlength="250" class="form-control rounded-0" name="editexistenciacomentario" id="editexistenciacomentario" aria-describedby="editexistenciacomentario" placeholder="" rows="3"></textarea>
                           </div>
               </td>           
                   
          
              
            </tr>
        
           
          </tbody> 
        </table>         
       </div>                
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaEditarExistencia" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btneditar" class="btn btn-primary" onclick="editarExistencia()">Editar</button>
      </div>
     
    </div>
  </div>
</div>




<!--MODAL PARA ELIMINAR Existencia-->

<div class="modal fade" id="modalBorrarExistencia" tabindex="-1" role="dialog" aria-labelledby="modalBorrarExistencia" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteExistenciaTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Eliminar Existencia es una accion <b> Permanente </b> desea eliminar Existencia:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="delExistenciacod" id="delExistenciacod" aria-describedby="delExistenciacod" placeholder="Existencia" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="delExistencianom" id="delExistencianom" aria-describedby="delExistencianom" placeholder="Existencia" hidden="true">
                           
                  <div id="labelBorrar" style="color: black; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTablaRequisito" id="cargarTablaRequisito"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaBorrarExistencia" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="deleteExistencia()">Eliminar</button>
      </div>
     
    </div>
  </div>
</div>


<!-- Modal Ver Existencia -->

<div class="modal fade" id="modalVerExistencia" tabindex="-1" role="dialog" aria-labelledby="modalVerExistencia" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
       <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">            
                   <label id="verExistenciatit"></label>                             
                   <div id="contenedordiv"></div>
                    <div class="row">
                     <div class="col">
                      <table class="table" cellspacing="2" cellpadding="1">                       
                       <tr align="left">
                         <td><h6>CODIGO Existencia:</h6></td>
                         <td> <label id="verExistenciacodreg"></label></td>                        
                       </tr>
                       <tr align="left">
                         <td><h6>TIPO DE ADQUISICION:</h6></td>
                         <td > <label id="verExistenciatipadqui"></label></td>                        
                       </tr>
                       <tr align="left">
                         <td><h6>DESCRIP. DE ADQUISICION:</h6></td>
                         <td colspan="3"> <label id="verExistenciadetadqui"></label></td>                        
                       </tr>                                      
                       <tr align="left">
                         <td><h6>DESCRIP.  FISICA:</h6></td>
                         <td colspan="3"><div><textarea maxlength="250" class="form-control rounded-0" name="verExistenciadesfisica" id="verExistenciadesfisica" aria-describedby="verExistenciadesfisica" placeholder=""  rows="7" cols="100"></textarea></div></td>             
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

<div class="modal fade" id="modalBarraequipo" tabindex="-1" role="dialog" aria-labelledby="modalBarraequipo" aria-hidden="true">
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
             <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" value="<?php echo $_GET['equipoCod']; ?>" id="codigoLib" name="codigoLib" hidden> 
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


<!--MODAL PARA reanudar Existencia-->

<div class="modal fade" id="modalReanudarExistencia" tabindex="-1" role="dialog" aria-labelledby="modalReanudarExistencia" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteExistenciaTitle"><img src="img/icons/reanudar.png" width="35" height="30"> Reanudar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="reateForm" name="reateForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Desea reanudar este Existencia:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="reaExistenciacod" id="reaExistenciacod" aria-describedby="reaExistenciacod" placeholder="Existencia" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="reaExistencianom" id="reaExistencianom" aria-describedby="reaExistencianom" placeholder="Existencia" hidden="true">
                           
                  <div id="labelreanudar" style="color: green; font-weight: bold; text-align: center;"></div>

         
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaReanudarExistencia" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-success" onclick="reanudarExistencia()">Reanudar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA reportar Existencia-->

<div class="modal fade" id="modalReportarExistencia" tabindex="-1" role="dialog" aria-labelledby="modalReportarExistencia" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteExistenciaTitle"><img src="img/icons/laberinto.png" width="35" height="30"> Reportar como perdido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="repoForm" name="repoForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Desea reportar este Existencia:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="repoExistenciacod" id="repoExistenciacod" aria-describedby="repoExistenciacod" placeholder="Existencia" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="repoExistencianom" id="repoExistencianom" aria-describedby="repoExistencianom" placeholder="Existencia" hidden="true">
                           
                  <div id="labelreportar" style="color: green; font-weight: bold; text-align: center;"></div>

         
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaReportarExistencia" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="reportarExistencia()">Reportar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA encontrar Existencia-->

<div class="modal fade" id="modalEncontrarExistencia" tabindex="-1" role="dialog" aria-labelledby="modalEncontrarExistencia" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteExistenciaTitle"><img src="img/icons/encontrado.png" width="35" height="30">Reportar como encontrado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="encontrarForm" name="encontrarForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Desea marcar como encontrado este Existencia:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="reanuExistenciacod" id="reanuExistenciacod" aria-describedby="reanuExistenciacod" placeholder="Existencia" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="reanuExistencianom" id="reanuExistencianom" aria-describedby="reanuExistencianom" placeholder="Existencia" hidden="true">
                           
                  <div id="labelencontrar" style="color: green; font-weight: bold; text-align: center;"></div>

         
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaEncontrarExistencia" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-success" onclick="encontrarExistencia()">encontrar</button>
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
  var variablecod=$("#equipoCod").val();
  var ordenar=$("#textBusquedaordenar").val();
  busqueda=busqueda.trim().replace(/ /g, '%20');
  $("#cargarTabla").load("pages/existencias/tablaExistencias.php?pagina=1&busqueda="+busqueda+"&equipoCod="+variablecod+ "&ordenar=" + ordenar);
  
  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();
    var variablecod=$("#equipoCod").val();
    var ordenar=$("#textBusquedaordenar").val();

  
    $("#cargarTabla").load("pages/existencias/tablaExistencias.php?pagina=1&busqueda="+busqueda+"&equipoCod="+variablecod+ "&ordenar=" + ordenar );

    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}




//INSERTAR NUEVO Existencia
function insertarExistencia(){       
        
  if ($("#formExistenciaingreso").val()==""){
    $("#respuestaNuevoExistencia").show();
    $("#respuestaNuevoExistencia").html("Seleccione un tipo de ingreso de la Existencias del Equipo");
  }else if ($("#formExistenciastado").val()==""){
    $("#respuestaNuevoExistencia").show();
    $("#respuestaNuevoExistencia").html("Seleccione un estado fisico  de la Existencias del Equipo");
  }else if ($("#formestantcod").val()==""){
    $("#respuestaNuevoExistencia").show();
    $("#respuestaNuevoExistencia").html("Seleccione un Estante  de la Existencias del Equipo");
  }else if ($("#formExistenciafecha").val()==""){
    $("#respuestaNuevoExistencia").show();
    $("#respuestaNuevoExistencia").html("Seleccione una fecha de adquisición de la Existencias del Equipo");
  }
  else {
    $("#respuestaNuevoExistencia").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);

    var url = "pages/existencias/insertarExistencia.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formNuevoExistencia").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Nuevo Existencia agregado </div>");
                     recargarTabla();
                     limpiarFormularioExistencia();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(500);          
                    }, 6000);
                    $("#respuestaNuevoExistencia").hide(500);
                    $('#newExistenciaModal').modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaNuevoExistencia").show();
                  $("#respuestaNuevoExistencia").html("<div class='alert alert-warning' role='alert'>Esta Existencia ya ha sido agregado </div>");
                     recargarTabla();
                    setTimeout(
                        function() {
                          $("#respuestaNuevoExistencia").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#respuestaNuevoExistencia").show();
                  $("#respuestaNuevoExistencia").html(data);
                     recargarTabla();

                    setTimeout(
                        function() {
                          $("#respuestaNuevoExistencia").hide(500);                                
                    }, 6000);
                }

              }
            });

  }
}
//EDITAR Existencia
function editarExistencia(){

  if ($("#editexistenciatipoingreso").val()==""){
    $("#respuestaEditarExistencia").show();
    $("#respuestaEditarExistencia").html("Seleccione un tipo de ingreso de la Existencias del Equipo");
  }else if ($("#editExistenciastado").val()==""){
    $("#respuestaEditarExistencia").show();
    $("#respuestaEditarExistencia").html("Seleccione un estado fisico  de la Existencias del Equipo");
  }else if ($("#editestantcod").val()==""){
    $("#respuestaEditarExistencia").show();
    $("#respuestaEditarExistencia").html("Seleccione un Estante  de la Existencias del Equipo");
  }else if ($("#editexistenciafecha").val()==""){
    $("#respuestaEditarExistencia").show();
    $("#respuestaEditarExistencia").html("Seleccione una fecha de adquisición de la Existencias del Equipo");
  }
  else {
    $("#respuestaEditarExistencia").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/existencias/editarExistencia.php";
      $("#btneditar").attr("disabled", true);
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formeditexistencia").serialize(),
              success: function (data){               
                if (data==1) {
                  //success
                  $("#accionFeedback").show();
                  $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Existencia ha sido editado </div>");
                  recargarTabla();
                  setTimeout(
                      function() {
                        $("#accionFeedback").hide(500);
                        
                  }, 6000);
                  $("#respuestaEditarExistencia").hide(500);    
                  $("#modalEditarExistencia").modal('hide');
                    $("#btneditar").attr("disabled", false);
                } else if (data==0) {
                  //error
                  $("#respuestaEditarExistencia").show();
                  $("#respuestaEditarExistencia").html("<div class='alert alert-warning' role='alert'>Otro Existencia ya esta registrado con estos datos </div>");    
                  setTimeout(
                      function() {
                        $("#respuestaEditarExistencia").hide(500);
                        
                       
                  }, 6000);
                  
                } else {
                  //any other error
                  $("#respuestaEditarExistencia").show();
                  $("#respuestaEditarExistencia").html(data);                  
                  setTimeout(
                      function() {
                        $("#respuestaEditarExistencia").hide(500);
                        
                       
                  }, 6000);
                }
                  


              }
            });

  }
}
//BORRAR FORMULARIO DE NUEVO Existencia
function limpiarFormularioExistencia(){
   document.getElementById("formNuevoExistencia").reset();

}

//BORRAR Existencia
function deleteExistencia(){
  $("#borrarButton").attr("disabled", true);

  if ($("#delExistenciacod").val()==""){
    $("#respuestaBorrarExistencia").show();
    $("#respuestaBorrarExistencia").html("Codigo de Existencia necesario");
  }else {
    $("#labelBorrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);

    var url = "pages/existencias/borrarExistencias.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#deleteForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          
                  $("#labelBorrar").show();
                  $("#notificationLabel").html("");
                  $("#labelBorrar").html("No se puede borrar a este Existencia. Porque esta en prestamo:");
                  $("#cargarTablaRequisito").show();
                  $("#cargarTablaRequisito").html(data);                           
              
          
        }else if (data=="1"){  

          $("#labelBorrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelBorrar").html("<h5>Existencia ha sido eliminada</h5>");

          $("#modalBorrarExistencia").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Existencia Eliminada </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

//reanudar Existencia
 function reanudarExistencia(){
  $("#borrarButton").attr("disabled", true);

  if ($("#reaExistenciacod").val()==""){
    $("#respuestaReanudarExistencia").show();
    $("#respuestaReanudarExistencia").html("Codigo de Existencia necesario");
  }else {
    $("#labelreanudar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);

    var url = "pages/existencias/reanudar.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#reateForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Existencia TIENE LIBROS INSCRITOS
                  $("#labelreanudar").show();
                  $("#notificationLabel").html("");
                  $("#labelreanudar").html("No se puede reanudar  esta Existencia. porque esta en prestamo:");
                                        
            
        }else if (data=="1"){  

          $("#labelreanudar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelreanudar").html("<h5>Existencia equipo ha sido Reanudada</h5>");

          $("#modalReanudarExistencia").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Existencia equipo Reanudada </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}
//reportar Existencia
 function reportarExistencia(){
  $("#borrarButton").attr("disabled", true);

  if ($("#repoExistenciacod").val()==""){
    $("#respuestaReportarExistencia").show();
    $("#respuestareportarExistencia").html("Codigo de Existencia necesario");
  }else {
    $("#labelreportar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);

    var url = "pages/existencias/reportar.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#repoForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Existencia TIENE LIBROS INSCRITOS
                  $("#labelreportar").show();
                  $("#notificationLabel").html("");
                  $("#labelreportar").html("No se puede reportar  esta Existencia no esta en prestamo");
                                        
            
        }else if (data=="1"){  

          $("#labelreportar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelreportar").html("<h5>Existencia equipo ha sido Reportada como perdido</h5>");

          $("#modalReportarExistencia").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Existencia equipo reportada como perdida </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

//encontrar Existencia
 function encontrarExistencia(){
  $("#borrarButton").attr("disabled", true);

  if ($("#reanuExistenciacod").val()==""){
    $("#respuestaEncontrarExistencia").show();
    $("#respuestaEncontrarExistencia").html("Codigo de Existencia necesario");
  }else {
    $("#labelencontrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);

    var url = "pages/existencias/encontrar.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#encontrarForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Existencia TIENE LIBROS INSCRITOS
                  $("#labelencontrar").show();
                  $("#notificationLabel").html("");
                  $("#labelencontrar").html("No se puede reportar como encontrado  esta Existencia esta en prestamo");
                                        
            
        }else if (data=="1"){  

          $("#labelencontrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelencontrar").html("<h5>Existencia equipo ha sido reportada como encontrada</h5>");

          $("#modalEncontrarExistencia").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Existencia equipo reportada como encontrada </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
         }            
      }
    });
  }
}

 $('#modalEditarExistencia').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varexistenciacod = button.data('varexistenciacod')
      var varexistencianombre = button.data('varexistencianombre')
      var varexistenciaestante  = button.data('varexistenciaestante')      
      var varexistenciacomentario  = button.data('varexistenciacomentario') 
      var inputprecio         = button.data('varexistenciaprecio') 
      var varexistenciacondicion         = button.data('varexistenciacondicion')
      var varexistenciatipoingreso         = button.data('varexistenciatipoingreso')
      var varexistenciadetaingreso         = button.data('varexistenciadetaingreso')
      var varexistenciafecha         = button.data('varexistenciafecha') 

       
      var modal = $(this)
      modal.find('.modal-title').text('Editar Existencia: ' + varexistencianombre );
     
        
       document.getElementById('editexistenciacomentario').value = varexistenciacomentario;      
       document.getElementById('editexistenciacodigo').value = varexistenciacod; 
       document.getElementById('inputprecio').value = inputprecio;
       //Se debe asignar el codigo que se buscara al 'select' no el nombre del campo.
       document.getElementById('editestantcod').value = varexistenciaestante;
       document.getElementById('editExistenciastado').value = varexistenciacondicion;
       document.getElementById('editexistenciatipoingreso').value = varexistenciatipoingreso;
       document.getElementById('editexistenciafecha').value = varexistenciafecha; 
       document.getElementById('inputdetalle').value = varexistenciadetaingreso;
       
       
        
    $('.js-Dropdown-Busqueda').select2({
        "selected": true
     });
   
      
    })


//Eliminar Existencia
  
     $('#modalBorrarExistencia').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varexistenciacod = button.data('varexistenciacod')
      var varexistencianom = button.data('varexistencianom')
      var varexistenciacodreg = button.data('varexistenciacodreg')     

      $('#borrarButton').attr("disabled", false);  


      var modal = $(this)

       $("#notificationLabel").html('Esta es una accion <h5> Permanente. </h5> Desea Eliminar registro?:');
       $("#cargarTablaRequisito").html('');


      $("#labelBorrar").html('<h5> '+varexistenciacodreg+' '+'<h5> ');
      document.getElementById('delExistenciacod').value = varexistenciacod;
      document.getElementById('delExistencianom').value = varexistencianom;
      
      
      
    })

     //Reanudar Ejemplar
  
     $('#modalReanudarExistencia').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varexistenciacod = button.data('varexistenciacod')
      var varexistencianom = button.data('varexistencianom')     
      var varexistenciacodreg = button.data('varexistenciacodreg')

      $('#borrarButton').attr("disabled", false);  
      
      
      var modal = $(this)

       $("#notificationLabel").html('Desea reanudar el libro  con codigo de registro:');
    


      $("#labelreanudar").html('<h5> '+varexistenciacodreg+' '+'<h5> ');
      document.getElementById('reaExistenciacod').value = varexistenciacod;
      document.getElementById('reaExistencianom').value = varexistencianom;
      
      
      
    })

//Reportar Ejemplar
  
     $('#modalReportarExistencia').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varexistenciacod = button.data('varexistenciacod')
      var varexistencianom = button.data('varexistencianom')
      var varexistenciacodreg = button.data('varexistenciacodreg')     

      $('#borrarButton').attr("disabled", false);  
      
      
      var modal = $(this)

       $("#notificationLabel").html('Desea reportar como perdido  el libro el libro  con codigo de registro:');
    


      $("#labelreportar").html('<h5> '+varexistenciacodreg+' '+'<h5> ');
      document.getElementById('repoExistenciacod').value = varexistenciacod;
      document.getElementById('repoExistencianom').value = varexistencianom;
      
      
      
    })

//Encontrar Ejemplar
  
     $('#modalEncontrarExistencia').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varexistenciacod = button.data('varexistenciacod')
      var varexistencianom = button.data('varexistencianom')
      var varexistenciacodreg = button.data('varexistenciacodreg')     

      $('#borrarButton').attr("disabled", false);  
      
      
      var modal = $(this)

       $("#notificationLabel").html('Desea marcar como encontrado el libro  con codigo de registro:');
    


      $("#labelencontrar").html('<h5> '+varexistenciacodreg+' '+'<h5> ');
      document.getElementById('reanuExistenciacod').value = varexistenciacod;
      document.getElementById('reanuExistencianom').value = varexistencianom;
      
      
      
    })
//Ver Existencia

$('#modalVerExistencia').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 

       var varexistenciaportada  = button.data('varexistenciaportada')
       $("#contenedordiv").html('<img align=left src="'+varexistenciaportada+'" width=200 height=350>')      
       var varexistenciaNom = button.data('varexistenciaNom') 
       var varexistenciacodreg = button.data('varexistenciacodreg')
       var varexistenciatipadqui = button.data('varexistenciatipadqui')
       var varexistenciadetadqui = button.data('varexistenciadetadqui')
       var varexistenciadesfisica = button.data('varexistenciadesfisica')       


      var modal = $(this)   
        
       $("#verExistenciatit").html('<h4 align=center>Perfil del libro: '+varexistenciaNom+' '+'<h4> ');
       $("#verExistenciacodreg").html('<h6 align=center>'+varexistenciacodreg+' '+'<h6> ');
       $("#verExistenciatipadqui").html('<h6 align=center>'+varexistenciatipadqui+' '+'<h6> '); 
       $("#verExistenciadetadqui").html('<h6 align=center>'+varexistenciadetadqui+' '+'<h6> '); 
       $("#verExistenciadesfisica").html(varexistenciadesfisica);  
       
      
    })

//ver codigo de barra
$('#modalBarraequipo').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) //
      var varequipocodlib  = button.data('varequipocodlib')      
      var varequipocodigoreg  = button.data('varequipocodigoreg')       
      var varequipotitulo = button.data('varequipotitulo')
      var varequiponumero = button.data('varequiponumero')    

          

      var modal = $(this)
       
       var codigoLib=$("#codigoLib").val();   
       $("#cargarcodigodebarra").load("pages/codbarras/vercbequipo.php?codequi="+varequipocodigoreg+"&codigoEqui=" + codigoLib); 
       $("#codigobarra").html('<h4 align=center>'+varequipotitulo+', equipo #'+varequiponumero+' '+'<h4> ')      

        
       
      
    })

     //habilitar input dependiendo del tipo de ignreso
 
$( function() {
    $("#formExistenciaingreso").change( function() {
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

</script>
