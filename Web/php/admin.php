<?php	
	require_once 'headerAndFooter.php';	
	if(isset($_POST['entrar'])){
		if($_POST['user']=="admin" && $_POST['pass']=="admin")
			header("Location: gestion.php");
	}
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
		<div id="entradaAdmin">
        	<form method="POST" action="">
            	<div id="user"><p>Admin</p>
            	<input type="text" name="user"/>
                </div>
                <div id="pass"><p>Pass</p>
            	<input type="password" name="pass"/>
                </div>
                <div id="submit">
            	<input type="submit" value="Entrar" name="entrar"/>
                </div>
            </form>	
        </div>
        </div>
        
		<div id="capaFooter">
        	<?php pieDePagina(); ?>
        </div>   
	</div>
</body>
</html>