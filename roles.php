<?php
  //iniciar sesiion y verifico las var sessions activas 
  require_once("lib/secure.class.php");
    Secure::sesion_vars_ok();

     require_once("lib/config.php");
      require_once("lib/conexion.class.php");
      $cnx= Conexion::conet($host,$user,$pass,$db);
    
      $ssql="SELECT id, rol, descripcion FROM roles";

      $res=mysql_query($ssql,$cnx); 
      $nreg=mysql_num_rows($res);
?>     
<!DOCTYPE html>
<html>
    <head>
    <title>ejemplos</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
     <script type="text/javascript" src="js/confir.js"></script>
   </head>

   <body id="bo">
    <div id="di1" class="navbar" >
    <div class="container">
        <form   action="sesion_close.php" method="POST" id="frm_ss_close" name="frm_ss_close">
          <img src="img/png/glyphicons_003_user.png"> <?php echo$_SESSION['ss_name']?>
          <input type="submit" name="ss_close" value="cerrar sesion" class="btn btn-primary">  
        </form>
     </div>
     </div>
      <table class="table table-hover" >
        <span><h1 id="h1_2">Roles del sistema</h1></span>
          <tr>
              <th>roles</th>
              <th>Descricion</th>
			  <th><img src="img/png/glyphicons_029_notes_2.png"> <?php echo $nreg?><br></th>
          </tr>
          <?php  
              while ($r=mysql_fetch_array($res)) { ?>
                <tr>
                  <td><?php echo "{$r['rol']}"?></td>    
                  <td><?php echo "{$r['descripcion']}"?></td>
                  <td><form action="crud_r.php" method="post" id="frm_usr_acc" name="frm_usr_acc" >
                        <input type="hidden" name="id" value="<?php echo $r['id'] ?>">
 						           <?php if($_SESSION['ss_role']==1) { ?>
                          <input type="submit"  name="editar_r" value="Editar" class="btn btn-mini btn-success" >
                          <input type="submit"  name="eliminar_r" value="Eliminar" class="btn btn-mini btn-danger" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">
                      <?php } ?>
                        </form></td
                </tr>
           <?php }?>
     </table>
          <?php if($_SESSION['ss_role']<=2) { ?>
          <!--<td><a href="new_rol.php" target="_blank" class="btn btn-success" onClick="window.open(this.href, this.target, 'width=1100,height=900'); return false;"><img src="img/png/glyphicons_006_user_add.png"> Nuevo</a></td>-->
          <td><a href="new_rol.php" id="new_rol" name="new_r" class="btn btn-success" ><img src="img/png/glyphicons_006_user_add.png"> Nuevo</a></td>
          <?php }?>
          <a href="usuarios.php" id="usuar" name="usuar" class="btn btn-success" ><img src="img/png/glyphicons_006_user_add.png"> Usuarios</a></td>
  </body>
</html>