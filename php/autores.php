<?php	
	require_once '../Gestion/headerAndFooter.php';	
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>El Teatro</title>
<link href="../Stylesheet/principal.css" rel="stylesheet" type="text/css" />
<!-- slider-->
<link rel="stylesheet" href="../javascript/SliderAutores/bjqs.css">
<link rel="stylesheet" href="../javascript/SliderAutores/demo.css">
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="../javascript/SliderAutores/js/bjqs-1.3.js"></script>


</head>
<body >
	<div id="fondo"></div>
	<div id="capacontenedora">
    	<header>
        <a href="elteatro.php">
        <div class="contenedor" id="uno">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">El teatro</p>        
		</div>
        </a>
        <a href="../index.php">
        <div class="contenedor" id="dos">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">Obras</p>
		</div>
        </a>
        <a href="autores.php">
        <div class="contenedor" id="tres">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">Autores</p>
		</div>
        </a>
        <a href="misreservas.php">
        <div class="contenedor" id="cuatro">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">Mis Reservas</p>
		</div>
        </a>
        <a href="Pops.php">
        <div class="contenedor" id="cinco">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">Pops</p>
		</div>
        </a>
        </header>
        <div id="contenedoraCapaCalendario">       
        <div id="banner-fade">
        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
          <li><img src="../javascript/SliderAutores/img/banner01.png" title="BD Creator and sql master"></li>
          <li><img src="../javascript/SliderAutores/img/banner02.png" title="PHP and Scripting"></li>
          <li><img src="../javascript/SliderAutores/img/banner03.png" title="Web design"></li>
        </ul>
        <!-- end Basic jQuery Slider -->
      </div>
      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 320,
            width       : 620,
            responsive  : true
          });
        });
      </script>
        </div>
        
		<div id="capaFooter">
        	<a href="admin.php"><div id="imagenCandado"></div></a>	
        </div>   
	</div>
</body>
</html>

