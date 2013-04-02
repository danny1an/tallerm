<!Doctype html>
<html lang="ES">
	<head>
		<meta charset="utf8">
		<link rel="shortcut icon" href="img/png/an.ico">
		<link rel="stylesheet" type="text/css" href="bootstrap-responsive.min.css">
     	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<title>inicio</title>
	</head>

	<body>
		
		<span><h1 class="span3  offset5" id="h1">Login</h1></span>
		<div id="d3" class="span4  offset4">
			<span class="offset2"><img id="img" src="img/usuarios.png" ></span>
			<form action="validar.php" method="POST" id="frm_logueo" name="frm_logueo"
				onsubmit="return valida_frm_campos(this);">
				<label for="lbl_user">Usuario</label>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" id="inp_usuario" name="inp_usuario" class="input-medium" MAXLENGTH="15" required autofocus>
				</div>
				<label for="lbl_pass">Clave</label>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-lock"></i></span>
					<input type="password" id="inp_clave" name="inp_clave" class="input-medium" MAXLENGTH="10" required >
				</div><br>
				<input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-success" value="ingresar">
			</form>
		</div>
	</body>
</html>

