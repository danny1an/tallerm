<?php
	if (isset($_POST['eliminar_r']) or isset($_POST['crear_r']) or isset($_POST['editar_r']) or isset($_POST['actualizar_r']))
	{ 
		require_once('lib/config.php');
		require_once("lib/conexion.class.php");
    	$cnx= Conexion::conet($host,$user,$pass,$db);

		if(!isset($_POST['crear_r']))	$rol_id=$_POST['id'];
		
				//sentenci eliminar registros
		
		if (isset($_POST['eliminar_r'])) 
			$sql="DELETE FROM roles WHERE id={$rol_id}";
		

		elseif(isset($_POST['editar_r']))
			$sql="SELECT * FROM roles WHERE id={$rol_id}";

		elseif (isset($_POST['actualizar_r'])) {
			$sql="UPDATE roles SET rol='$_POST[rol]', descripcion='{$_POST['descripcion']}' WHERE id={$rol_id} ";
		}

		
		elseif(isset($_POST['crear_r'])) {
			$sql="INSERT INTO roles (rol, descripcion) ";
			$sql.="VALUES ('{$_POST['rol']}','{$_POST['descripcion']}') ";

		}
		
		if($res=mysql_query($sql))
		{
			echo $res;
			//redirecciona a la vista de todos los usuario
			
			if (isset($_POST['eliminar_r']) or isset($_POST['crear_r']) or isset($_POST['actualizar_r'])) 
			{
				$msg="opreracion exisosa!, <br> redireccionando ";
				Redir("roles.php",$msg,1);
			}	

			if (isset($_POST['editar_r'])) 
			{
				$rs=mysql_fetch_array($res);
				require_once('edit_r.php');
			}		
		}
	}else echo "btn no presionado";	
?>	

