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

function verMisReservas($dni){
    global $link;
    $sql = "SELECT * FROM `reserva` WHERE `dni` = '"
            .$dni. "'";
        return mysqli_query($link, $sql);
}

