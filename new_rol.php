<?php
	require_once("lib/secure.class.php");
    Secure::sesion_vars_ok();

  	
 ?>
<!Doctype html>
<html lang="ES">
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<title>Nuevo Rol</title>

	</head>

	<body>
		
		 <div id="color" class="span6 offset4">	
		 	 <span><h1>Nuevo Rol</h1></span>
			<form  method="post" action="crud_r.php" >
				<b>Rol:</b><br>
				<input type="text" name="rol" class="input-medium" MAXLENGTH="20"  required autofocus><br>
				<b>Descripcion:</b><br>
				<textarea  name="descripcion"  rows="3" cols="50" placeholder="descripcion del rol" required></textarea><br>
				<input type="submit" id="crear_r" name="crear_r" value="crear"  class="btn btn-success" > 
				<input type="reset" class="btn btn-inverse" value="limpiar">
				<a href="roles.php" class=" btn btn-info">Atras</a>
			</form></div>	
	</body>
</html>