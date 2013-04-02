<?php
	
	if (!isset($_POST['btn_ingresar']))
	{
		die('acceso directo no autorizado');
	}
	else
	{	
		session_start();
		require_once("lib/config.php");
		include_once("lib/conexion.class.php");	
		require_once("lib/secure.class.php");
    	
		conexion::conet($host,$user,$pass,$db);

		$usuario = stripcslashes($_POST['inp_usuario']);
		$clave = stripcslashes($_POST['inp_clave']);
		$e= sha1($clave);

		$sql = "SELECT * FROM usuarios WHERE user = '{$usuario}'";
		$res = mysql_query($sql);
		$nreg = mysql_num_rows($res); //Devuelve el número de registros q arrojó la consulta SQL.
		if($nreg == 0){
			$msg='usuario o clave no coinciden';
			Redir("index.php",$msg,3);
			//Redireccionar para el formulario de logeo
		}else{
			//regiostro las variables de sesion
			
			$reg_usr = mysql_fetch_array($res); //recupera el registro de encontrado al ejecutar la consulta
		
			if($e != $reg_usr['pass']){

				$msg="usuario o clave no coinciden";
				Redir("index.php",$msg,3);
				//echo "clave1: $clave<br>claveb: {$reg_usr['pass']}<br> ";

			}else{
				Secure::vali_datos($reg_usr['name'],$reg_usr['user'],$reg_usr['email'],$reg_usr['role']);
				$msg="Bienvenido {$reg_usr['name']} . Por favor espere un momento
				mientras es Redireccionado!";
				Redir("usuarios.php",$msg,3);
			}
		}
	}	
?>
