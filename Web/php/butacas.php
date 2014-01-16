<?php
/******DISTRIBUCIÓN DE NUESTRO TEATRO******/

//Secciones
$SECCIONES['PLATEA'] = 1; 
$SECCIONES['PALCO1'] = 3; 
$SECCIONES['PALCO2'] = 4;
$SECCIONES['PALCO3'] = 5;
$SECCIONES['PALCO4'] = 6;
$SECCIONES['ANFITEATRO'] = 2;

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

function crearPlatea($fil, $col, $butacasOcupadas){
	global $SECCIONES;
	echo "<table>";
	echo "<tr><td colspan='".($col+4)."'><p class='secciones'>Platea - X€</p></td></tr>";
	for($f=$fil-1; $f>=0; $f--){

		echo "<tr>";
		echo "<td><p class='secciones'>F: ". ($f+1) ."</p></td>";
		echo "<td>&nbsp;</td>";

		//Asientos pares
		for($c=$col-1; $c>0; $c=$c-2){
			elegirTipoButaca($f, $c, $SECCIONES['PLATEA'], $butacasOcupadas);
		}

		echo "<td><div class='pasillo'></div></td>";

		//Asientos impares
		for($c=0; $c<$col; $c=$c+2){
			elegirTipoButaca($f, $c, $SECCIONES['PLATEA'], $butacasOcupadas);
	
		}
		echo "</tr>";
	}
	echo "</table>";	
}

function crearPalco($seccion, $butacas, $butacasOcupadas){
	$numButaca=$butacas-1;
	echo "<table>";
	echo "<tr><td colspan='$butacas/2'><p class='secciones'>" . $seccion . " - X€</p></td></tr>";
	//Butacas en 2 filas
	for($i=0; $i<2; $i++){
		echo "<tr>";
			for($b=$butacas/2-1; $b>=0; $b--){
				echo "<td>";
				elegirTipoButaca(0, $numButaca, $seccion, $butacasOcupadas);
				$numButaca--;
				echo "</td>";
			}
		echo "</tr>";
	}
	echo "</table>";	
}


function crearAnfiteatro($fil, $col, $butacasOcupadas){
	global $SECCIONES;
	echo "<table>";
	echo "<tr><td colspan='".($col+4)."'><p class='secciones'>Anfiteatro - X€</p></td></tr>";
	for($f=$fil-1; $f>=0; $f--){

		echo "<tr>";
		echo "<td><p class='secciones'>F: ". ($f+1) ."</p></td>";
		echo "<td>&nbsp;</td>";

		//Asientos pares
		for($c=$col-1; $c>=$col/3; $c=$c-2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO'], $butacasOcupadas);
		}
		echo "<td><div class='pasillo'></div></td>";
		for($c=$col/3-1; $c>=0; $c=$c-2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO'], $butacasOcupadas);
		}
		
		//Asientos impares
		for($c=0; $c<$col/3; $c=$c+2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO'], $butacasOcupadas);
	
		}
		echo "<td><div class='pasillo'></div></td>";
		for($c=$col/3; $c<$col; $c=$c+2){
			elegirTipoButaca($f, $c, $SECCIONES['ANFITEATRO'], $butacasOcupadas);
	
		}
		
		echo "</tr>";
	}
	echo "</table>";	
}

function elegirTipoButaca($f, $c, $s, $butacasOcupadas){
	global $SECCIONES, $NUM_COLUMNAS;
		
	$butacaReserva=$s.":".($f+1).":".($c+1);
	
	echo "<td>";
		//Butaca ocupada
		if(in_array($butacaReserva, $butacasOcupadas)){
				$butacaReserva=explode(':', $butacaReserva);	
				echo "<div class='butacaOcupada'>$butacaReserva[2]</div>";
		}
		//Butaca Reservada
		else if(isset($_SESSION['butacasReservadas']) && in_array($butacaReserva, $_SESSION['butacasReservadas'])){
		
				echo "<a href='obraindependiente.php?noButaca=$butacaReserva'>";
					$butacaReserva=explode(':', $butacaReserva);	
					echo "<div class='butacaReservada'>$butacaReserva[2]</div>";
				echo "</a>";
					
			}
			//Butaca libre
			else{
				echo "<a href = 'obraindependiente.php?butaca=$butacaReserva'>";
					$butacaReserva=explode(':', $butacaReserva);	
					echo "<div class='butacaLibre'>$butacaReserva[2]</div>";
				echo "</a>";
			}
	echo "</td>";
}
?>
