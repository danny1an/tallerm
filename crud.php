<?php
	require_once("lib/secure.class.php");
    Secure::sesion_vars_ok();
    
	if (isset($_POST['eliminar']) or isset($_POST['editar_u']) or isset($_POST['actualizar_u']) or isset($_POST['crear']) ) 
	{ 
		require_once('lib/config.php');
		require_once("lib/conexion.class.php");
    	$cnx= Conexion::conet($host,$user,$pass,$db);

		
		if(!isset($_POST['crear']))	$usr_id=$_POST['id'];
		
			//sentenci eliminar registros
		if (isset($_POST['eliminar'])) 
			$sql="DELETE FROM usuarios WHERE id={$usr_id}";
		
		
		elseif(isset($_POST['editar_u']))
			$sql="SELECT * FROM usuarios WHERE id={$usr_id}";

			

		elseif (isset($_POST['actualizar_u'])) {
			 $e=sha1($_POST['pass1']);
			$sql="UPDATE usuarios SET ";
			$sql.="name='{$_POST['nom']}', user='{$_POST['user']}', pass='{$e}', email='{$_POST['mail']}', role='{$_POST['roles']}' WHERE id={$usr_id} ";
	
		}

		elseif (isset($_POST['crear'])) { 
			$e=sha1($_POST['pass1']);	
			$sql="INSERT INTO usuarios(name,user,pass,email,role) ";
			$sql.="VALUES ('{$_POST['nom']}','{$_POST['user']}','{$e}','{$_POST['mail']}','{$_POST['roles']}') ";
		}

		if($res=mysql_query($sql)){
			//redirecciona a la vista de todos los usuario
			if (isset($_POST['eliminar']) or isset($_POST['crear']) or isset($_POST['actualizar_u']) ) {
				echo "<br>";
				$msg="opreracion exisosa!, <br> redireccionando ";
				Redir("usuarios.php",$msg,1);
			}
			
			if (isset($_POST['editar_u'])) {
				$rs=mysql_fetch_array($res);
				require_once('edit_u.php');
			}	
		}
	}else echo "btn no presionado";	
?>	

