<?php
/******DISTRIBUCIÓN DE NUESTRO TEATRO******/

//Secciones
$SECCIONES['PLATEA'] = "Platea"; 
$SECCIONES['PALCO1'] = "Palco 1"; 
$SECCIONES['PALCO2'] = "Palco 2";
$SECCIONES['PALCO3'] = "Palco 3";
$SECCIONES['PALCO4'] = "Palco 4";
$SECCIONES['ANFITEATRO'] = "Anfiteatro"; 

//Filas por secciones
$NUM_FILAS_PLATEA = 5;
$NUM_FILAS_ANFITEATRO = 3;

//Columnas por secciones
$NUM_COLUMNAS_PLATEA = 12; //Ha de ser un número par
$NUM_COLUMNAS_ANFITEATRO = 18; //Ha de ser un número par, múltiplo de 3

//Butacas del palco (Siempre tendrá una fila)
$NUM_BUTACAS_PALCO1 = 4;
$NUM_BUTACAS_PALCO2 = 4;
$NUM_BUTACAS_PALCO3 = 4;
$NUM_BUTACAS_PALCO4 = 4;

/******************************************/

function crearPlatea($fil, $col){
	global $SECCIONES;
	echo "<table>";
	echo "<tr><td colspan='".($col+4)."'><p class='secciones'>Platea - X€</p></td></tr>";
	for($f=$fil-1; $f>=0; $f--){

		echo "<tr>";
		echo "<td><p class='secciones'>F: ". ($f+1) ."</p></td>";
		echo "<td>&nbsp;</td>";

		//Asientos pares
		for($c=$col-1; $c>0; $c=$c-2){
			elegirTipoButaca($f, $c, $SECCIONES['PLATEA']);
		}

		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";

		//Asientos impares
		for($c=0; $c<$col; $c=$c+2){
			elegirTipoButaca($f, $c, $SECCIONES['PLATEA']);
	
		}
		echo "</tr>";
	}
	echo "</table>";	
}

function crearPalco($seccion, $butacas){
	echo "<table>";
	echo "<tr><td colspan='$col'><p class='secciones'>" . $seccion . " - X€</p></td></tr>";
	for($f=$fil-1; $f>=0; $f--){
		echo "<tr>";
		for($c=$col-1; $c>=0; $c--)
			elegirTipoButaca($f, $c, $seccion);
		echo "</tr>";
	}
	echo "</table>";	
}


function crearAnfiteatro($fil, $col){
	global $SECCIONES;
	echo "<table>";
	echo "<tr><td colspan='".($col+4)."'><p class='secciones'>Anfiteatro - X€</p></td></tr>";
	for($f=$fil-1; $f>=0; $f--){

		echo "<tr>";
		echo "<td><p class='secciones'>F: ". ($f+1) ."</p></td>";
		echo "<td>&nbsp;</td>";

		//Asientos pares
		for($c=$col-1; $c>=$col/3; $c=$c-2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO']);
		}
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		for($c=$col/3-1; $c>=0; $c=$c-2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO']);
		}
		
		//Asientos impares
		for($c=0; $c<$col/3; $c=$c+2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO']);
	
		}
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		for($c=$col/3; $c<$col; $c=$c+2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO']);
	
		}
		
		echo "</tr>";
	}
	echo "</table>";	
}

function elegirTipoButaca($f, $c, $s){
	global $SECCIONES, $NUM_COLUMNAS;
		
	$butacaReserva=$s.":".($f+1).":".($c+1);
	
	echo "<td>";
		if(isset($_SESSION['butacasReservadas']) && in_array($butacaReserva, $_SESSION['butacasReservadas'])){
		
			echo "<a href='obraindependiente.php?noButaca=$butacaReserva'>";
				$butacaReserva=explode(':', $butacaReserva);	
				echo "<div class='butacaReservada'>$butacaReserva[2]</div>";
			echo "</a>";
					
		}
		else{
			echo "<a href = 'obraindependiente.php?butaca=$butacaReserva'>";
				$butacaReserva=explode(':', $butacaReserva);	
				echo "<div class='butacaLibre'>$butacaReserva[2]</div>";
			echo "</a>";
		}
	echo "</td>";
}
?>
