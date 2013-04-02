<?php
	require_once("lib/secure.class.php");
    Secure::sesion_vars_ok();

  	require_once("lib/config.php");
 	require_once("lib/conexion.class.php");
    $cnx= Conexion::conet($host,$user,$pass,$db); 

	 	$fecha = date('d_m_Y_G_i_s');

		$comando= "mysqldump --opt -h 127.0.0.1 -u root -proot  ADSI > //opt/lampp/htdocs/tallerm/backup/".$db."backup_".$fecha.".sql";
			if(!exec($comando ))
			{
				$msg ="Se Genero la Copia de Seguridad Exitosa";
				Redir('usuarios.php',$msg,1);
			}
?>