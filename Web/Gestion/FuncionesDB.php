<?php

#$format = "d-m-o";~

$link = mysqli_connect("localhost", "root", "", "teatro");

function reservar($fecha, $hora, $fila, $numero, $seccion, $dni) {
    global $link;
    $sql = "INSERT INTO `reserva`(`dni`, `fecha`, `hora`, `fila`, `numero`, `seccion`) VALUES ('"
            . $dni . "','"
            . $fecha . "','"
            . $hora . "',"
            . $fila . ","
            . $numero . ","
            . $seccion . ",)";
    return mysqli_query($link, $sql);
}

function verButacasReservadas($fecha,$hora){
    global $link;
    $sql = "SELECT `fila`, `numero`, `seccion` FROM `reserva` WHERE `fecha` = '"
            .$fecha. "' AND `hora` = '"
            .$hora."'";
        return mysqli_query($link, $sql);
}

function verMisReservas($dni){
    global $link;
    $sql = "SELECT * FROM `reserva` WHERE `dni` = '"
            .$dni. "'";
        return mysqli_query($link, $sql);
}

/*
	Param: referencia de la obra
	Return: fecha final de la obra
			-1 en el caso de error 
			0 si la obra no existe
*/ 
function verFechaFin($ref){
	global $link;
	$fecha = -1;
	$sql = "select f_final FROM obra WHERE ref =" . $ref;

	//Si no se producen errores
	if($resultado = mysqli_query($link, $sql)){
		if (mysqli_num_rows($resultado)>0)
			$fecha = mysqli_fetch_row($resultado)[0];
		else
			$fecha = 0;    
	}
	return $fecha;
}

/*
	Param: referencia de la obra
	Return: titulo de la obra
			-1 en el caso de error 
			0 si la obra no existe
*/ 
function verTituloObra($ref){
	global $link;
	$titulo = -1;
	$sql = "select nombre FROM obra WHERE ref =" . $ref;

	//Si no se producen errores
	if($resultado = mysqli_query($link, $sql)){
		if (mysqli_num_rows($resultado)>0)
			$titulo = mysqli_fetch_row($resultado)[0];
		else
			$titulo = 0;    
	}
	return $titulo;
}


?>

