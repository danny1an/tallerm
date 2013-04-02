<?php
	require_once("lib/secure.class.php");
    Secure::sesion_vars_ok();

	require_once("lib/config.php");
    require_once("lib/conexion.class.php");
    $cnx= Conexion::conet($host,$user,$pass,$db);

    $ssql="SELECT * FROM roles";

    $res=mysql_query($ssql,$cnx); 
?>
<!Doctype html>
<html lang="ES">
	<head>
		<title>Editar usuario</title>
		<meta charset="utf8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
	    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	    <script>
	    	function clave()
	    	{
				var cl1=document.getElementById('pass1');
				var cl2=document.getElementById('pass2');
				if (cl1.value != cl2.value)
				{
				alert('Las dos claves ingresadas son distintas');
				cl2.focus()
				return false;
				}
			} 		
    	</script>
	</head>

	<body>
		<div id="color" class="span6 offset4">	
		 	<span><h1>Editar Usuarios</h1></span>
			<form  method="post" action="crud.php" confirm>
				<b>Nombre:</b><br>
				<input type="text" name="nom" value="<?php echo $rs['name']?>" class="input-medium" MAXLENGTH="20"  required ><br>
				<b>usuario:</b><br>
				<input type="text"  name="user" value="<?php echo $rs['user']?>" class="input-medium" MAXLENGTH="15"  required><br>
				<b>contraseña:</b><br>
				<input type="password" id="pass1" name="pass1" value="<?php echo $rs['pass']?>" class="input-medium" MAXLENGTH="10" required ><br>
				<b>confirmar contraseña:</b><br>
				<input type="password" id="pass2" name="pass2"  class="input-medium" MAXLENGTH="10"  required><br>
				<b>Email:</b><br>
				<input type="email" name="mail" value="<?php echo $rs['email']?>" class="input-medium" MAXLENGTH="40" required ><br>
				<b>Rol:</b><br>
				<select name="roles" class="input-medium" <?php if ($_SESSION['ss_role'] !=1)  echo "disabled"; ?>/>
				<?php
	           		while ($r=mysql_fetch_array($res))
		             {
	                 if ($rs['role']==$r['id'])
	                     echo "<option value='{$r['id']}' selected>{$r['rol']}</option>";
	                 else
	                     echo "<option value='{$r['id']}'>{$r['rol']}</option>";
		             }
		          ?>
				</select><br>
				<input type="hidden" name="id" value="<?php echo $rs['id'] ?>">
				<input type="submit" id="actualizar_u" name="actualizar_u" value="Actualizar"  class="btn btn-success" onclick="return clave()" > 
				<a href="usuarios.php" class=" btn btn-info">Atras</a>
			</form>
		</div>	
	</body>
</html>