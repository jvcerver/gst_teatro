<?php session_start();
	require_once 'butacas.php';
	require_once '../Gestion/FuncionesDB.php';
	
	/*****Obtenemos la información que necesitaremos*****/
	//Referencia de la obra
	$ref = $_POST['hdnRef'];
	
	//Obtener información de la obra
	$infoObra=verInfoObra($ref);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reserva</title>
<link href="../Stylesheet/principal.css" rel="stylesheet" type="text/css" />
<link href="../Stylesheet/reservas.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function activarBoton(){
	if(document.getElementById("txtDNI").value.length==9)
		document.getElementById("btnComprar").disabled=false;
	else
		document.getElementById("btnComprar").disabled=true;
}
</script>
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
					<img id="capaCartel" src="../imagenes/obras/<?=$infoObra['uri']?>" alt="imagen cartel"/>
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
				<form id="formulario" method="post" action="exitoReserva.php">
					<div id="capaDNI">
						<h1 class="titulos">DNI</h1> <input id="txtDNI" maxlength="9" type="text" name="txtDNI" onKeyUp="activarBoton()"/>
						<input id="btnComprar" type="submit" value="Comprar" disabled="false"/>
					</div>
				</form>
			</div>  
				     	  		       	               	         
        </div>     
	</div>
</body>
</html>

