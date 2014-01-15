<?php session_start();
	require_once 'butacas.php';
	require_once '../Gestion/FuncionesDB.php';
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
	
	//Referencia de la obra
	$ref = 1; //$_POST['refObra'];
	//Obtener el último día del espectáculo y convertirlo al formato YYYYMMDD
	$ultimoDia=verFechaFin($ref);
	$ultimoDia=explode('-', $ultimoDia);
	$ultimoDia = $ultimoDia[0].$ultimoDia[1].$ultimoDia[2];
	
	//Obtener las horas de la fecha seleccionada
	//$query
	
	//Obtener las butacas reservadas en esa fecha
	//$butacas=verButacasReservadas($fecha,$hora);
		
?>
	
	<?php
		
	//Hora
	//Si habíamos seleccionado una hora la añadimos a la variable de sesion
	if(isset($_GET['hora']))
		$_SESSION['hora'] = $_GET['hora'];
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
<script language="javascript" type="text/javascript">
function comprobarboton(){
	var boolean = "<?php echo isset($_SESSION['butacasReservadas']); ?>" ;
	if (boolean == 1){
		document.getElementById("formulario").reservar.disabled=false;
	} else {
		document.getElementById("formulario").reservar.disabled=true;
	}
	document.getElementById("pase").value="<?php echo $_SESSION['hora']; ?>";
}
</script>
</head>
<body onload=comprobarboton()>
	<div id="capacontenedora">
    	<div id="capatitulo">El teatro cool
		</div>
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
					<?php crearAnfiteatro($NUM_FILAS_ANFITEATRO, $NUM_COLUMNAS_ANFITEATRO);?>
				</div>
				<div id="butacasPlatea">
					<?php crearPlatea($NUM_FILAS_PLATEA, $NUM_COLUMNAS_PLATEA);?>
				</div>
				<div id="butacasPalco1">
					<?php crearPalco($SECCIONES['PALCO1'], $NUM_BUTACAS_PALCO1);?>
				</div>
				<div id="butacasPalco2">
					<?php crearPalco($SECCIONES['PALCO2'], $NUM_BUTACAS_PALCO2);?>
				</div>
				<div id="butacasPalco3">
					<?php crearPalco($SECCIONES['PALCO3'], $NUM_BUTACAS_PALCO3);?>
				</div>
				<div id="butacasPalco4">
					<?php crearPalco($SECCIONES['PALCO4'], $NUM_BUTACAS_PALCO4);?>
				</div>
            </div>
        	<div id="capacalendarioyhora">  
				<div id="capatituloobra">
					<!--$_POST['tituloObra']-->
					<?=verHoras(2014-01-02);?>
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
                </div>
				<form id="formulario" method="get" action="">
					Fecha: <input id="fecha" type="text"/>
	        		<div id="capahoras">
						<select name="hora" onchange="this.form.submit()" id="pase">
							<Option value="0">---Seleccione hora---</option>
							<Option>Hora 1</option>
							<Option>Hora 2</option>
							<Option>Hora 3</option>							
						</select>
	                </div> 
	                <div id="capabutton">
	            		<input type="submit" disabled="true" name="reservar" value="Comprar"/>
                	</div>
				</form>         		       	      
        	</div>          	         
        </div>     
	</div>
</body>
</html>


