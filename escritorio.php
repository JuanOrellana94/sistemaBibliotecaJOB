

	 <?php  include("top.php");

      $_SESSION[ 'pagCurrent' ] = "escritorio.php";  
      //$usupag=$_SESSION['loginperfor'] . ",escritorio.php";
      //setcookie('pagusu', $usupag, time()+28800);

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
                   <button class="btn btn-lg btn-block">Catalogos</button>
                  </div>
              </td>

               <td>
              	  <div class="container">  <img src="img/icons/Ops.png" alt="Snow" style="width:100%">
                   <button class="btn btn-lg btn-block">Operaciones</button>
                  </div>
               </td>

               <td>
              	  <div class="container">  <img src="img/icons/Est.png" alt="Snow" style="width:100%">
                   <button class="btn btn-lg btn-block">Estadisticas</button>
                  </div>
              </td>

               <td>
              	   <div class="container">  <img src="img/icons/utils.png" alt="Snow" style="width:100%">
                   <button class="btn btn-lg btn-block">Utileria</button>
                  </div>
              </td>   
                      
            </tr>
           
          </table>       
        </div>
    </div>
    <?php  include("down.php") ?>
  