<?php
function darAlta($fila, $numero, $seccion) {
            echo 'funcion...\n';
            $conexion = mysqli_connect("localhost", "root", "", "teatro");
            for ($i = 1; $i <= $fila; $i++) {
                for ($j = 1; $j <= $numero; $j++) {
                    $sql = "INSERT INTO `butaca`(`fila`, `numero`, `seccion`) VALUES (" . $i . "," . $j . "," . $seccion . ");";
                    $resultado=mysqli_query($conexion, $sql);
                }
            }
        }
function darAltaPases($fecha_inicio, $fecha_fin){
}

#alta de la platea
        $fila = 5;
        $numero = 12;
        $seccion = 0; #platea

        darAlta($fila, $numero, $seccion);
        darAlta(1, 4, "1"); #palcos
        darAlta(1, 4, "2");
        darAlta(1, 4, "3");
        darAlta(1, 4, "4");
        darAlta(3, 18, 5);#anfi
        
        ?>
        done!