<?php session_start();
	require_once 'butacas.php';
	require_once '../Gestion/FuncionesDB.php';
	realizarReservas($_POST['custom']);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reserva</title>
<link href="../Stylesheet/principal.css" rel="stylesheet" type="text/css" />
<link href="../Stylesheet/reservas.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="capacontenedora">
    	<header>
        <div class="contenedor" id="uno">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">home</p>
		</div>
        <div class="contenedor" id="dos">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">home</p>
		</div>
        <div class="contenedor" id="tres">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">home</p>
		</div>
        <div class="contenedor" id="cuatro">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">home</p>
		</div>
        <div class="contenedor" id="cinco">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">home</p>
		</div>
        </header>
        <div id="contenedoraCapaCalendario">
			<h1 class="titulos">
				COMPRA REALIZADA CON ÉXITO
			</h1>
			<img id="imgExitoCompra" src="../imagenes/exitoCompra.png" alt="éxito reserva" />
			<img id="imgExitoCompraInvertida" src="../imagenes/exitoCompra.png" alt="éxito reserva" />
			<div id="capaInformacion">
				<h1 class="titulos">
					<?php
						echo $_SESSION['fecha'] . " (" . $_SESSION['hora'] . ")";
					?>
				</h1>
				<div id="capabutacasReservadasExito">
					<?php
						mostrarReservas();
					?>
				</div>
			</div> 
			<p class="info">***Podrá consultar sus compras siempre que lo desee accediendo a la sección "Mis reservas" del menú***</p> 		     	  		       	               	    
        </div>  
		<div id="capaFooter">
        	<img id="imagenCandado"/>	
        </div>   		
	</div>
</body>
</html>

