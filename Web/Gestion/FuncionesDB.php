<?php

$format = "o-m-d";

$link = mysqli_connect("localhost", "root", "", "teatro");

function reservar($fecha, $hora, $fila, $numero, $seccion, $dni) {
    global $link;
    $sql = "INSERT INTO `reserva`(`dni`, `fecha`, `hora`, `fila`, `numero`, `seccion`) VALUES ('"
            . $dni . "','"
            . $fecha . "','"
            . $hora . "',"
            . $fila . ","
            . $numero . ","
            . $seccion . ")";
    mysqli_query($link, $sql);
}

function verButacasReservadas($fecha,$hora){
    global $link;
    $sql = "SELECT `fila`, `numero`, `seccion` FROM `reserva` WHERE `fecha` = '"
            .$fecha. "' AND `hora` = '"
            .$hora."'";
        return mysqli_query($link, $sql);
}

function verObraReservada($no_entrada){
	global $link;
	$sql = "SELECT nombre,uri FROM obra WHERE ref IN (SELECT ref FROM obra WHERE (SELECT fecha FROM reserva WHERE no_entrada=".$no_entrada.")as fecha BETWEEN f_inicio AND f_final)";
	#$cursor = mysqli_fetch_array(mysqli_query($link, $sql));
	return mysqli_query($link, $sql);
}

function verMisReservas($dni){
    global $link;
    $sql = "SELECT * FROM `reserva` WHERE `dni` = '"
            .$dni. "'";
        return mysqli_query($link, $sql);
}

function verPrecios(){
    global $link;
    $sql = "SELECT * FROM `seccion`";
        return mysqli_query($link, $sql);//devuelve codigo/precio/nombreSeccion
}

function verObras(){
    global $link;
    $sql = "SELECT * FROM `obra`";
    
    return mysqli_query($link, $sql);
}

/*Devuelve la información de una obra en concreto*/
function verInfoObra($ref){
    global $link;
	$sql = "select * from obra where ref =". $ref;
    
    $resultado = mysqli_query($link, $sql);
	
	return mysqli_fetch_array($resultado);
}

function verPases($obra){
    global $link;
    $sql = "select f_inicio, f_final from obra where ref =". $obra ;
    $cursor = mysqli_fetch_array(mysqli_query($link, $sql));
    $fecha_i = $cursor[0];
    $fecha_f = $cursor[1];
    $sql = "SELECT * FROM `pase` WHERE fecha BETWEEN '".$fecha_i."' AND '".$fecha_f."'";
    
    return mysqli_query($link, $sql);
}

function añadirObra($nombre, $grupo, $uri, $descripcion, $fecha_ini, $fecha_fin, $hora){
    global $link;
    
    $sql = "INSERT INTO `obra`(`nombre`, `grupo`, `uri`, `descripcion`, `f_inicio`, `f_final`) VALUES ('"
            . $nombre . "','"
            . $grupo . "','"
            . $uri . "','"
            . $descripcion . "','"
            . $fecha_ini . "','"
            . $fecha_fin . "')";
    mysqli_query($link, $sql);
    altaPases($fecha_ini, $fecha_fin, $hora);
}
function altaPases($fecha_ini, $fecha_fin, $hora){
    global $link;
    global $format;
    $inicio = strtotime($fecha_ini)/60/60/24;
    $fin = strtotime($fecha_fin)/60/60/24;
    $dias = $fin - $inicio;
    for ($i=0; $i<$dias;$i++){
        $fecha_alta = date($format, strtotime($fecha_ini)+($i*(60*60*24)));
        $sql = "INSERT INTO `pase` (`fecha`, `hora`) VALUES ('". $fecha_alta . "','". $hora . "')";
    mysqli_query($link, $sql);
    }
}
?>