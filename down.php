<?php include("src/libs/vars.php"); ?>
<style>
	 .textBottom {          
          color: white;
          font-size: 20px;

        }
  .navbot{
    position:absolute;
    bottom:0;
    right:0;
    width: 100%
  }
</style>
<br>
<div class="row" style="margin-top:1%;">
  <div class="col-lg-12 navbot">
    <nav class="navbar navbot" style="background-color:#003764;">
      <a class="navbar-brand" ></a>

    	<div class="textBottom"><small>SISTEMA DE BIBLIOTECA, <?php echo $sistemaVersion; ?> , 2019</small>
      		<img src="img/icons/LogoSys.png" width="55" height="50">  
    	</div>
    </nav>
    </div>
</div>

</body>


<script>
	$(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script> 


</html>
