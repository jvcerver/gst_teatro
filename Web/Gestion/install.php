<?php
#este fichero no tiene uso alguno mas que para generar una base de datos inicial,
#tras importar una base de datos ya creada no es necesario dar de alta las butacas

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

        darAlta(5, 12,1);
        darAlta(1, 4, 5); #palcos
        darAlta(1, 4, "6");
        darAlta(1, 4, "3");
        darAlta(1, 4, "4");
        darAlta(3, 18, 2);#anfi
        
        ?>
        done!