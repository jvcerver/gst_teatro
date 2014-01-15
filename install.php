<?php
function darAlta(){
		for	($i = 1; $i <= $fila; $i++){
			
		}
	}
	
	$conexion = mysqli_connect("localhost", "root", "", "teatro");
	$sql = "INSERT INTO `butaca`(`fila`, `numero`, `seccion`) VALUES ($fila,$numero,$seccion)";
	
	#alta de la platea
	$fila = 5;
	$numero = 12;
	$seccion = 'Platea';
	
	darAlta();
	
	
	
	