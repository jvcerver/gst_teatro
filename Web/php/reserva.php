<?php session_start();
	require_once '../Gestion/FuncionesDB.php';
	
	/*****Obtenemos la información que necesitaremos*****/
	//Referencia de la obra
	$ref = $_POST['hdnRef'];
	
	//Obtener información de la obra
	$infoObra=verInfoObra($ref);
	
	function mostrarReservas(){
		foreach($_SESSION['butacasReservadas'] as $butacas){
			$butacas = explode(':', $butacas);
			switch($butacas[0]){
				case 1:
					echo "Platea-> F:" . $butacas[1] . " B:" . $butacas[2]; 
					break;
				case 2:
					echo "Anfiteatro-> F:" . $butacas[1] . " B:" . $butacas[2];  
					break;
				default:
					echo "Palco " . ($butacas[0]-2) . "-> B:" . $butacas[2];  
			}
			echo "</br>";
		}	
	}
	
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
    	<div id="capatitulo">El teatro cool</div>
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
			<div id="capaIzquierda">
				<h1 class="titulos"><?=$infoObra['nombre']?></h1>
					<img id="capaCartel" src="../imagenes/butacaLibre.png" alt="imagen cartel"/>
			</div> 
			<div id="capaCentral">
				<h1 class="titulos">
					<?php
						echo $_SESSION['fecha'] . " (" . $_SESSION['hora'] . ")";
					?>
				</h1>
				<div id="capabutacasReservadas">
					<?php
						mostrarReservas();
					?>
				</div> 
			</div> 	
			<div id="capaDerecha">
				<form id="formulario" method="post" action="">
					<div id="capaDNI">
						<h1 class="titulos">DNI</p> <input id="txtDNI" size="10" maxlength="9" type="text" name="txtDNI"/>
						<input id="btnComprar" type="submit" value="Comprar"/>
					</div>
				</form>
			</div>  
				     	  		       	               	         
        </div>     
	</div>
</body>
</html>

