<?php
session_start();
require_once '../Gestion/FuncionesDB.php';
if (isset($_POST['enviar'])){
    #carga del archivo de imagen
    $ruta = "../imagenes/obras/";
    if (file_exists($ruta . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $ruta . $_FILES["file"]["name"]);
      }
      
      añadirObra($_POST['nombre'], $_POST['grupo'], $_FILES["file"]["name"], $_POST['descripcion'], $_POST['f_ini'], $_POST['f_fin'], $_POST['hora']);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div>
            <!--aquí va el formulario de gestion-->
            <form id="altaObra" action="" method="post" enctype="multipart/form-data">
                <p>Nombre de la obra</p>
                <input type="text" name="nombre" size="50"/>
                <p>Grupo de teatro</p>
                <input type="text" name="grupo" size="50"/>
                <label for="archivo">Archivo de imagen</label>
                <input type="file" name="file"/>
                <p>Descripcion</p>
                <textarea rows="5" cols="50" name="descripcion" form="altaObra"></textarea></br> <!--esto llega como descripcion-->
                <label for="f_ini">fecha de inicio</label>
                       <input name="f_ini"type="date"/>
                <label for="f_fin">fecha de fin</label>
                       <input name="f_fin"type="date"/>
                <label for="hora">hora del pase</label>
                       <input name="hora"type="time"/>
                       <input type="submit" name="enviar" value="Enviar"/>
            </form>
        </div>
    </body>
</html>