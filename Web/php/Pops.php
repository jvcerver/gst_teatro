<?php	
	require_once 'headerAndFooter.php';	
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>El Teatro</title>
<link href="../Stylesheet/principal.css" rel="stylesheet" type="text/css" />
</head>
<body >
	<div id="fondo"></div>
	<div id="capacontenedora">
    	<header>
        	<?php cabecera(); ?>
        </header>
        <div id="contenedoraCapaCalendario">         
        	<div id="palomita1"></div>
        	<div id="palomita2"></div>
        	<div id="palomita3"></div>
        	<div id="refresco1"></div>
        	<div id="refresco2"></div>
        	<div id="refresco3"></div>       
        </div>
		<div id="capaFooter">
        	<?php pieDePagina(); ?>
        </div>   
	</div>
</body>
</html>

