<?php
	require_once("lib/config.php");
	class Conexion
	{
		static function conet($host,$user,$pass,$db)
		{
			$link=mysql_connect($host,$user,$pass)or 
				die("Error al realizar la conexión!. Por favor verifique los valores del
					archivo de configuración");
				
			mysql_select_db($db, $link) or
				die("Error al seleccionar la BD [{$db}]. Por favor verifique los valores del archivo
					de configuración");
			 // se coloca para saber si funciona pero se puede eliminar.
			return $link;
		}
	} 

		function Redir($pag,$msg,$t)
		{
			echo$msg;
		
?>	
		<meta http-equiv="Refresh" content="<?php echo $t; ?>; url=<?php echo $pag; ?>">
<?php
	}
?>
