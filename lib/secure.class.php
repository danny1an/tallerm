<?php
	class Secure
	{
		static function sesion_vars_ok(){
			if (!isset($_SESSION)) session_start();	
			
			if (!isset($_SESSION['ss_name'])  or !isset($_SESSION['ss_user'])or
				!isset($_SESSION['ss_email']) or !isset($_SESSION['ss_role'])) 
				die('Accceso directo No autorizado!');
		}
			//funcion que inicializa las variables de sesion

			//funcion para cerrar sesion
			//disponible para cualquier usuario
		static function sesion_cerrar()
		{
			if (!isset($_SESSION)) session_start();

			//varifica que las variables de sesion estan inicializadas
			//limpia la variable gloval $_SESSION asignando un array vacio
			//que borra todo el contenido 
			if (isset($_SESSION['ss_name']) or isset($_SESSION['ss_user']) or
				isset($_SESSION['ss_email']) or isset($_SESSION['ss_role']))
			{
				$_SESSION= array();/*limpia las posiciones dela var gloval $_SESSION con un arreglo.
				 detruye la secion sesion_destroy()*/ 
				 if (session_destroy()) 
				{
				 	require_once('conexion.class.php');
				 	$msg="sesion finalizada con exito.";
				 	Redir('index.php',$msg,2);
				 	//redireccionar al formulario de inicio
				}else
					die("sesion: Alert 03 - error al finalizar la sesion.");	 
			}
	 	}
	 		static function vali_datos($name,$user,$email,$role)
			{ 
				$_SESSION['ss_name']= $name;
				$_SESSION['ss_user']= $user;
				$_SESSION['ss_email']= $email;
				$_SESSION['ss_role']= $role;
			}	
	}	
?>
