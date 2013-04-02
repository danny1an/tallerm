<?php
  require_once("lib/secure.class.php");
    Secure::sesion_vars_ok();

    require_once("lib/config.php");
    require_once("lib/conexion.class.php");
    $cnx= Conexion::conet($host,$user,$pass,$db);

    $ssql="SELECT * FROM roles ";

    $rs=mysql_query($ssql); 
 ?>
<!Doctype html>
<html lang="ES">
  <head>
    <meta charset="utf8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <title>Editar Rol</title>

  </head>

  <body>
    
     <div id="color" class="span6 offset4"> 
       <span><h1>Editar Rol</h1></span>
      <form  method="POST" action="crud_r.php" confirm>
        <b>Rol:</b><br>
        <input type="text" name="rol" value="<?php echo $rs['rol'] ?>" class="input-medium" MAXLENGTH="20"  required autofocus><br>
        <b>Descripcion:</b><br>
        <textarea  name="descripcion" value="<?php echo $rs['descripcion'] ?>" rows="3" cols="50" placeholder="descripcion del rol" required></textarea><br>
        <input type="hidden" name="id" value="<?php echo $rs['id'] ?>">
        <input type="submit" id="actualizar_r" name="actualizar_r" value="actualizar"  class="btn btn-success" > 
        <input type="reset" class="btn btn-inverse" value="limpiar">
        <a href="roles.php" class=" btn btn-info">Atras</a>
      </form></div> 
  </body>
</html>