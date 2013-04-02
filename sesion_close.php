<?php
	//funciona para cerar la sesion del usuario
	//garantizar que nadie lo invoque de manera directa
	require_once("lib/secure.class.php");
	    Secure::sesion_cerrar();

?>