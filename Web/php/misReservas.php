<?php session_start();
	require_once 'butacas.php';
	require_once '../Gestion/FuncionesDB.php';
	
	
	function comprobarFechaPasada($fecha, $hora){
		return strtotime($fecha. " ". $hora) < strtotime(date("Y-m-d H:i:s"));
	}
	
	function comprobarFechaActual($fecha, $hora){
		return strtotime($fecha. " ". $hora) > strtotime(date("Y-m-d H:i:s"));
	}

	function mostrarMisReservas($infoReservas, $funcion){
		$actuales = 
		$numReservas=0;
		//Situamos el puntero al inico del resultado de la consulta
		mysqli_data_seek($infoReservas, 0);
		while($v=mysqli_fetch_array($infoReservas)){
			if($funcion($v['fecha'], $v['hora'])){
				$numReservas++;
				echo "<div class='miReserva'>";
					echo "<img class='imgMiReserva' src='../imagenes/butacaLibre.png' alt='imagen obra'/>";
					echo "<p class='codigoMiReserva'> Código ". $v['no_entrada'] . "</p>";
					echo "<div class='infoMiReserva'><h4>Título de la obra</h4>";
						echo "<h6>" . $v['fecha'] . " (" . $v['hora'] . ")</h6>";
						echo "<h5>Butaca</h5>";
					echo "</div>";	
				echo "</div>";
			}
		}
		if($numReservas==0)
			echo "<h4>No hay reservas</h4>";
	}
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
		document.getElementById("botonDNI").disabled=false;
	else
		document.getElementById("botonDNI").disabled=true;
}
</script>
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
			<?php
			
			if(isset($_POST['txtDNI'])){
				/*****Obtenemos la información que necesitaremos si existe *****/
				//DNI del que reserva
				$dni = $_POST['txtDNI'];
	
				//Obtener información de las reservas
				$infoReservas = verMisReservas($dni);
			?>	
				<div id="capaIzquierda">
					<h1 class="titulos">Reservas pasadas</h1>
					<?php mostrarMisReservas($infoReservas, "comprobarFechaPasada");?>
				</div> 
				<div id="capaCentral">
					<h1 class="titulos">Reservas actuales</h1>
					<?php mostrarMisReservas($infoReservas, "comprobarFechaActual");?>
				</div> 
			<?php }
			else{
				echo "<h2 class='infoDNIMiReserva'>Para consultar sus reservas <br/> introduzca su DNI en el recuadro de la derecha</h2>";
			}?>
			<div id="capaDerecha">
				<form id="formulario" method="post" action="">
					<div id="capaDNI">
						<h1 class="titulos">DNI</h1> <input id="txtDNI" maxlength="9" type="text" name="txtDNI" onKeyUp="activarBoton()" value="<?php if(isset($_POST['txtDNI'])) echo $_POST['txtDNI'];?>"/>
						<input id="botonDNI" type="submit" value="Mis reservas" disabled="false"/>
					</div>
				</form>
			</div>       	  		       	               	         
        </div> 
		<div id="capaFooter">
        	<img id="imagenCandado"/>	
        </div>      
	</div>
</body>
</html>

