

	 <?php  include("top.php");

      $_SESSION[ 'pagCurrent' ] = "escritorio.php";  
      //$usupag=$_SESSION['loginperfor'] . ",escritorio.php";
      //setcookie('pagusu', $usupag, time()+28800);
if ($_SESSION["usuNivelNombre"]=="Personal" || $_SESSION["usuNivelNombre"]=="Estudiante" ) {
    ?>
      <script>
       
          Swal.fire({
          title: 'Acceso denegado',
          text: 'No puedes acceder a este contenido',
          type: 'error',
          
          confirmButtonText: 'Entendido',
          allowOutsideClick: false
          }).then(Entendido => {
          if (Entendido) {
            window.location.href = "menuopt.php";
          }
          })
          window.stop();
        
      </script>
    <?php
   }
 
   ?>
    	<br>
    	<br>
    			<h2 align="center" class="">Menu Principal</h2>
    		
    <div class="escritorio" >
        <div class="row respond" >

          <table align="center" >
            <tr>
              <td>
                  <div class="container">  <img src="img/icons/book.png" alt="Snow" style="width:100%">
                   <button class="btn btn-lg btn-block" onclick="location.href='catalogos.php?pageLocation=libros';">Catalogos</button>
                  </div>
              </td>

               <td>
                  <div class="container">  <img src="img/icons/Ops.png" alt="Snow" style="width:100%">
                   <button class="btn btn-lg btn-block" onclick="location.href='acciones.php?pageLocation=historial';">Operaciones</button>
                  </div>
              </td>

               <td>
                  <div class="container">  <img src="img/icons/Est.png" alt="Snow" style="width:100%">
                   <button class="btn btn-lg btn-block" onclick="location.href='acciones.php?pageLocation=indicadores';">Estadisticas</button>
                  </div>
              </td>

               <td>
                  <div class="container">  <img src="img/icons/utils.png" alt="Snow" style="width:100%">
                   <button class="btn btn-lg btn-block" onclick="location.href='acciones.php?pageLocation=cbejemplar';">Utileria</button>
                  </div>
              </td>      
                      
            </tr>
           
          </table>       
        </div>
    </div>
    <?php  include("down.php") ?>
  