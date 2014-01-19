<?php session_start();
	if(isset($_SESSION['ref']))
		unset($_SESSION['ref']);
	session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Obras</title>
<link href="../Stylesheet/principal.css" rel="stylesheet" type="text/css" />
<link href="../Stylesheet/obras.css" rel="stylesheet" type="text/css" />

<!--Slider-->
<script type="text/javascript" src="../javascript/modernizr.custom.28468.js"></script>
<!---->


</head>
<!-- en php posteriormente -->
	<div id="capacontenedora">
    	<header>
        <a href="elteatro.php">
        <div class="contenedor" id="uno">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">El teatro</p>        
		</div>
        </a>
        <a href="obras.php">
        <div class="contenedor" id="dos">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">Obras</p>
		</div>
        </a>
        <a href="autores.php">
        <div class="contenedor" id="tres">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">Autores</p>
		</div>
        </a>
        <a href="misreservas.php">
        <div class="contenedor" id="cuatro">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">Mis Reservas</p>
		</div>
        </a>
        <a href="Pops.php">
        <div class="contenedor" id="cinco">
			<img class="icon" src="../imagenes/icon5.png">
			<p class="texto">Pops</p>
		</div>
        </a>
        </header>
		<div id="contenedoraCapaCalendario">
			<div id="da-slider" class="da-slider">
				<?php
					require_once '../Gestion/FuncionesDB.php';
					$obras=verObras();
					while($v=mysqli_fetch_array($obras)){?>
						<div class="da-slide">
							<h2><?=$v['nombre']?></h2>
							<p>
								Del <?=$v['f_inicio']?> al <?=$v['f_final']?><br/>
								<?=$v['grupo']?><br/>
								<?=$v['descripcion']?>
							</p>  
							 <!--Pasarle también la referencia-->
							<a href="obraindependiente.php?ref=<?=$v['ref']?>" class="da-link">Comprar</a>
							<div class="da-img"><img src="../imagenes/obras/<?=$v['uri']?>" height="200px" width="200px" alt="imagen cartel" /></div>
						</div>
					<?php 
					}
				?>
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
			<script type="text/javascript" src="../javascript/jquery-1.7.1.min.js"></script>
			<script type="text/javascript" src="../javascript/jquery.cslider.js"></script>
			<script type="text/javascript">
				$(function() {
			
					$('#da-slider').cslider({
						autoplay	: true,
						bgincrement	: 450
					});
			
				});
			</script>	
		</div>
		<div id="capaFooter">
        	<a href="admin.php"><div id="../imagenes/imagenCandado"></div></a>	
        </div> 
	</div> 	
<body>
</body>
</html>

		
		
		 		
