<?php session_start();
	require_once 'butacas.php';
	//Si habíamos seleccionado una butaca la añadimos a la variable de sesión de las butacas reservadas
	if(isset($_GET['butaca']))
		$_SESSION['butacasReservadas'][]=$_GET['butaca'];

	//Si habíamos deseleccionado una butaca la quitamos de la variable de sesión de las butacas reservadas
	else if(isset($_GET['noButaca']) && isset($_SESSION['butacasReservadas'])){
		unset($_SESSION['butacasReservadas'][array_search($_GET['noButaca'], $_SESSION['butacasReservadas'])]);
		//En caso de que se deseleccionen todas las butacas eliminamos la variable de sessión
		if (empty($_SESSION['butacasReservadas']))
			unset($_SESSION['butacasReservadas']);
	}
	
	//Obtener el último día del espectáculo
	$ultimoDia="20140124"
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Obra Individual</title>
<link href="../Stylesheet/principal.css" rel="stylesheet" type="text/css" />
<link href="../Stylesheet/butacas.css" rel="stylesheet" type="text/css" />
<!--Calendario-->
<link rel="stylesheet" type="text/css" href="../javascript/Calendario/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="../javascript/Calendario/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="../javascript/Calendario/css/gold/gold.css" />
<script type="text/javascript" src="../javascript/Calendario/js/jscal2.js"></script>
<script type="text/javascript" src="../javascript/Calendario/js/lang/es.js"></script>
<!--Calendario-->
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
        <!-- butacas here -->
        	<div id="capaobras">
				<div id="butacasAnfiteatro">
					<?php crearAnfiteatro($NUM_FILAS['ANFITEATRO'], $NUM_COLUMNAS['ANFITEATRO']);?>
				</div>
				<div id="butacasPlatea">
					<?php crearPlatea($NUM_FILAS['PLATEA'], $NUM_COLUMNAS['PLATEA']);?>
				</div>
				<div id="butacasPalco1">
					<?php crearPalco(1, $NUM_FILAS['PALCO'], $NUM_COLUMNAS['PALCO']);?>
				</div>
				<div id="butacasPalco2">
					<?php crearPalco(2, $NUM_FILAS['PALCO'], $NUM_COLUMNAS['PALCO']);?>
				</div>
				<div id="butacasPalco3">
					<?php crearPalco(3, $NUM_FILAS['PALCO'], $NUM_COLUMNAS['PALCO']);?>
				</div>
				<div id="butacasPalco4">
					<?php crearPalco(4, $NUM_FILAS['PALCO'], $NUM_COLUMNAS['PALCO']);?>
				</div>
            </div>
        	<div id="capacalendarioyhora">  
				<div id="capatituloobra">
					Título de la obra
				</div> 
				<!--Calendario-->            
        		<div id="capafechas">
			  	  <script type="text/javascript">
			  	  	Calendar.setup({
			  	      	cont          : "capafechas",
			  	      	bottomBar	  : false,
			  	  		min: <?=date("Ymd");?>, //Primer día seleccionable
			  	  		max: <?=$ultimoDia;?>, 	//Último día seleccionable
			  			onSelect      : function() {
			              	var fecha = document.getElementById("fecha");
			              	fecha.value = this.selection.print("%d/%m/%Y").join("\n");  
			  		    },
	
			  	  	})
			  	  </script>
				  <!--Fecha: <input id="fecha" type="text" disabled/>-->
                </div>
        		<div id="capahoras">
        		<form>
            	<input type="text" />
            	</form>
                </div> 
                <div id="capabutton">
        		<form>
            	<input type="submit" />
            	</form>
                </div>         		       	      
        	</div>          	         
        </div>     
	</div>
</body>
</html>
