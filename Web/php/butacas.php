<?php
/******DISTRIBUCIÓN DE NUESTRO TEATRO******/

//Secciones
$SECCIONES['PLATEA'] = "Platea"; 
$SECCIONES['PALCO'] = "Palco"; 
$SECCIONES['ANFITEATRO'] = "Anfiteatro"; 

//Filas por secciones
$NUM_FILAS['PLATEA'] = 5;
$NUM_FILAS['PALCO'] = 2;
$NUM_FILAS['ANFITEATRO'] = 3;

//Columnas por secciones
$NUM_COLUMNAS['PLATEA'] = 12; //Ha de ser un número par
$NUM_COLUMNAS['PALCO'] = 2; 
$NUM_COLUMNAS['ANFITEATRO'] = 18; //Ha de ser un número par, múltiplo de 3

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
			elegirTipoButaca($f, $c, $SECCIONES['PLATEA'], null);
		}

		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";

		//Asientos impares
		for($c=0; $c<$col; $c=$c+2){
			elegirTipoButaca($f, $c, $SECCIONES['PLATEA'], null);
	
		}
		echo "</tr>";
	}
	echo "</table>";	
}

function crearPalco($numPalco, $fil, $col){
	global $SECCIONES;
	echo "<table>";
	echo "<tr><td colspan='$col'><p class='secciones'>Palco " . $numPalco . " - X€</p></td></tr>";
	for($f=$fil-1; $f>=0; $f--){
		echo "<tr>";
		for($c=$col-1; $c>=0; $c--)
			elegirTipoButaca($f, $c, $SECCIONES['PALCO'], $numPalco);
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
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO'], null);
		}
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		for($c=$col/3-1; $c>=0; $c=$c-2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO'], null);
		}
		
		//Asientos impares
		for($c=0; $c<$col/3; $c=$c+2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO'], null);
	
		}
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		for($c=$col/3; $c<$col; $c=$c+2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO'], null);
	
		}
		
		echo "</tr>";
	}
	echo "</table>";	
}

function elegirTipoButaca($f, $c, $s, $numPalco){
	global $SECCIONES, $NUM_COLUMNAS;
	if($numPalco==null) //Si no es palco
		$butacaReserva=$s.":".($f+1).":".($c+1);
	else
		$butacaReserva=$s.":".$numPalco.":".($NUM_COLUMNAS['PALCO']*$f+$c+1);
	
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
