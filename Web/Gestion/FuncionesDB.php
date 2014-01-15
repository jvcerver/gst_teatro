<?php

#$format = "d-m-o";

function verificarConexion(){
    
}

function reservar($fecha, $hora, $fila, $numero, $seccion, $dni) {
    $sql = "INSERT INTO `reserva`(`dni`, `fecha`, `hora`, `fila`, `numero`, `seccion`) VALUES ('"
            . $dni . "','"
            . $fecha . "','"
            . $hora . "',"
            . $fila . ","
            . $numero . ","
            . $seccion . ",)";
    return ...;
}

function verButacasReservadas($fecha,$hora){
    $sql = "SELECT `fila`, `numero`, `seccion` FROM `reserva` WHERE `fecha` = '"
            .$fecha. "' AND `hora` = '"
            .$hora."'";
    return ...;
}

function verMisReservas($dni){
    
}
