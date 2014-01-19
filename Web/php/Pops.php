<?php	
	require_once '../Gestion/headerAndFooter.php';	
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>El Teatro</title>
<link href="../Stylesheet/principal.css" rel="stylesheet" type="text/css" />
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
        	<div id="palomita1"></div>
        	<div id="palomita2"></div>
        	<div id="palomita3"></div>
        	<div id="refresco1"></div>
        	<div id="refresco2"></div>
        	<div id="refresco3"></div>       
        </div>
		<div id="capaFooter">
        	<a href="admin.php"><div id="imagenCandado"></div></a>	
        </div>   
	</div>
</body>
</html>

