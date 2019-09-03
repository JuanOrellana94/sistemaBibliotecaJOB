<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">  
      <TITLE>SISTEMA DE BIBLIOTECA, VERSION PROTOTIPO 1.0, 2019</TITLE>
      <!-- Bootstrap -->
      <script src="src/js/jquery-3.4.0.min.js"></script>
      <script src="src/js/bootstrap.bundle.min.js"></script>
      <script src="src/js/jsSession.js"></script>
      <script src="src/js/jsRedirects.js"></script>
      <link rel="stylesheet" href="src/css/background.css">

      <!-- Bootstrap -->
      <link rel="stylesheet" href="src/css/bootstrap.css">  

      <style>
        .container {
          position: relative;
          width: 100%;
           cursor: pointer;
        }


        .image {
          opacity: 1;
          display: block;
          width: 100%;
          height: auto;
          transition: .5s ease;
          backface-visibility: hidden;
        }

        .middle {

          cursor: pointer;
          transition: .5s ease;
          opacity: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          text-align: center;
        }

        .container:hover .image {
          opacity: 0.3;
        }

        .container:hover .middle {
          opacity: 1;
}


        .text {
          
          background-color: #003764;
           padding: 16px 32px;

          color: white;
          font-size: 20px;
          position: absolute;
          top: 50%;
          left: 50%;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
          white-space: nowrap;
        }

        
      </style>



  </head>
  <body> 
  <div class="bg2">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-md" style="background-color:#003764;">
              <a class="navbar-brand">
                    <img src="img/icons/LogoSimple.png" width="125" height="120" alt="">
              </a>   
          </nav>
        </div>
      </div>
         
      <div class="center" style="max-width: 70%; margin-top: 10%; margin-left: 5%">
        <div class="row">   
          <div class="row row h-100 justify-content-center align-items-center">   
            <div class="col-sm-4">
              <div class="container">      
                <div class="card">
                 <img class="card-img-top image" src="img/icons/menuRepo.png" alt="Repositorio">           
                  <div class="middle">
                    <div class="text">Biblioteca Virtual</div>
                  </div>
                </div>
              </div>              
            </div>
            <div class="col-sm-4">
              <div class="container">      
                <div class="card">
                 <img class="card-img-top image" src="img/icons/menuQuery.png" alt="Repositorio">           
                  <div class="middle" onclick="rediConsulta()">
                    <div class="text">Consultas</div>
                  </div>
                </div>
              </div>              
            </div>
            <div class="col-sm-4">
              <div class="container">      
                <div class="card">
                 <img class="card-img-top image"  src="img/icons/menuSys.png" alt="Repositorio">           
                  <div class="middle" onclick="rediLogin()">                    
                    
                    <div class="text">Acceder</div>
                  </div>
                </div>
              </div>              
            </div>    
          </div>
        </div>
      </div>
  </div>


<?php  include("down.php") ?>
 
</html>


<script>
  $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script> 

