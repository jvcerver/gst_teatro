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
	if(document.getElementById("txtDNI").value.length==9){
		document.getElementById("btnPayPal").style.display="block";
		document.getElementById("custom").value = document.getElementById("txtDNI").value;	
	}
	else
		document.getElementById("btnPayPal").style.display="none";
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
						$total=mostrarReservas();
					?>
				</div> 
				<h3 id="total">Total = <?=$total?>€</h3>
			</div> 	
			<div id="capaDerecha">
				<form id="formulario" action="https://www.sandbox.paypal.com/cgi-bin/localhost/gst_teatro/Web" method="post">
					<div id="capaDNI">
						<h1 class="titulos">DNI</h1> <input id="txtDNI" maxlength="9" type="text" name="txtDNI" onKeyUp="activarBoton()"/>
					</div>
					<div id="btnPayPal">
			               <input type="hidden" name="cmd" value="_xclick">
			               <input type="hidden" name="business" value="teatroSGE2014-facilitator@DAM.com ">
			               <input type="hidden" name="item_name" value="Pago de entradas <?=$infoObra['nombre']?>">
			               <input type="hidden" name="currency_code" value="EUR">
			               <input type="hidden" name="amount" value="<?=$total?>">
						   <input type="hidden" name="rm" value="2"> 
						   <input type="hidden" id="custom" name="custom">
						   <input type="hidden" name="no_shipping" value="1">
						   <input type="hidden" name="return" value="http://localhost/gst_teatro/Web/php/exitoReserva.php">
						   <input type="hidden" name="cancel_return" value="http://localhost/gst_teatro/Web">
			               <input type="image" src="../imagenes/btnPayPal.gif" name="submit" alt="Paga con PayPal de un modo más rápido y seguro">
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

