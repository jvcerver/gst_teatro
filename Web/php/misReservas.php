<?php session_start();
	require_once 'butacas.php';
	require_once '../Gestion/FuncionesDB.php';
	require_once 'headerAndFooter.php';
	require_once 'funcionesPDF.php';
	
	if(isset($_POST['Imprimir']))
		imprmirEntrada($_POST['codigo'], $_POST['fecha'], $_POST['hora'], $_POST['butaca']);
	
	
	function comprobarFechaPasada($fecha, $hora){
		return strtotime($fecha. " ". $hora) < strtotime(date("Y-m-d H:i:s"));
	}
	
	function comprobarFechaActual($fecha, $hora){
		return strtotime($fecha. " ". $hora) > strtotime(date("Y-m-d H:i:s"));
	}

	function mostrarMisReservas($infoReservas, $funcion){
		$numReservas=0;
		//Situamos el puntero al inico del resultado de la consulta
		mysqli_data_seek($infoReservas, 0);
		$precios=obtenerPreciosSecciones();
		while($v=mysqli_fetch_array($infoReservas)){
			if($funcion($v['fecha'], $v['hora'])){
				$butaca = $v['seccion'].":".$v['fila'].":".$v['numero'];
				$numReservas++;
				$infoObra=mysqli_fetch_array(verObraReservada($v['no_entrada']));
				echo "<div class='miReserva'>";
					echo "<img class='imgMiReserva' src='../imagenes/obras/".$infoObra['uri']."' alt='imagen obra'/>";
					echo "<p class='codigoMiReserva'> Código ". $v['no_entrada'] . "</p>";
					echo "<div class='infoMiReserva'><h4>".$infoObra['nombre']."</h4>";
						echo "<h6>" . $v['fecha'] . " (" . $v['hora'] . ")</h6>";
						echo "<h6>";
						mostrarReservaIndividual($butaca, $precios);
						echo "</h6>";
						echo "<form method='post' action=''>";
							echo "<input type='hidden' name='codigo' value='".$v['no_entrada']."'/>";
							echo "<input type='hidden' name='fecha' value='".$v['fecha']."'/>";
							echo "<input type='hidden' name='hora' value='".$v['hora']."'/>";
							echo "<input type='hidden' name='butaca' value='".$butaca."'/>";
							echo "<input type='submit' id='btnImprimir' value='Imprimir' name='Imprimir'/>";
						echo "</form>";
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
        	<?php cabecera(); ?>
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
					<h1 class="titulos">Compras pasadas</h1>
					<?php mostrarMisReservas($infoReservas, "comprobarFechaPasada");?>
				</div> 
				<div id="capaCentral">
					<h1 class="titulos">Compras actuales</h1>
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
        	<?php pieDePagina(); ?>
        </div>      
	</div>
</body>
</html>

