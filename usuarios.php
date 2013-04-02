<?php
  //iniciar sesiion y verifico las var sessions activas 
    require_once("lib/secure.class.php");
    Secure::sesion_vars_ok();

  require_once("lib/config.php");
  require_once("lib/conexion.class.php");
  $cnx= Conexion::conet($host,$user,$pass,$db);

    $limite = 2;
    @$pagina = $_GET['pag'];
    if(is_numeric($pagina))  
        $inicio = ($pagina - 1)*$limite;
    else  
        $inicio = 0;

    @$busca=$_POST['busca'];
    if ( $busca!="") 
    {
      $ssql="SELECT SQL_CALC_FOUND_ROWS u.id as id, u.name as name, u.user as user, u.email as email, r.rol as rol ";
      $ssql.="FROM usuarios u, roles r ";
      $ssql.="WHERE u.role = r.id and (u.name like '%".$busca."%' or u.user like '%".$busca."%' or r.rol like '%".$busca."%' ) ";
     
    }else
    {
      $ssql="SELECT SQL_CALC_FOUND_ROWS u.id as id, u.name as name, u.user as user, u.email as email, r.rol as rol ";
      $ssql.="FROM usuarios u, roles r ";
      $ssql.="WHERE u.role = r.id ";
      $ssql.="LIMIT $inicio,$limite";
    }

      $res=mysql_query($ssql,$cnx); 
      $nreg=mysql_num_rows($res); 
      
       $sqlTotal = "SELECT FOUND_ROWS() as total";
      $rsTotal = mysql_query($sqlTotal);
      $rowTotal = mysql_fetch_assoc($rsTotal);
      $total = $rowTotal["total"];
      $totalPag = ceil($total/$limite);  
?>     
<!DOCTYPE html>
<html>
  <head>
    <title>ejemplos</title>
    <link rel="shortcut icon" href="img/png/an.ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <script type="text/javascript" src="js/confir.js"></script>
  </head>

  <body id="bo">
    <div id="di" class="navbar" >
      <div class="container">
        <div class="navbar-inner">
          <section id="di1">
            <form   action="sesion_close.php" method="POST" id="frm_ss_close" name="frm_ss_close">
              <img src="img/png/glyphicons_003_user.png"> <?php echo$_SESSION['ss_name']?>
              <input type="submit" name="ss_close" value="cerrar sesion" class="btn btn-primary">  
            </form>
          </section>
          <section id="di2">
            <form  action="usuarios.php?pag=1" name="f_buscar" method="POST" >
              <div class="input-append">
                <input type="search" class="input-medium" name="busca" placeholder="buscar" autofocus>
                <input class="btn btn-warning" type="submit" value="Buscar">
            </div>
            </form>
          </section>
          <section id="di3">
            <div class="pagination">
              <ul>
                <?php
                    for ($i=1; $i <= $totalPag; $i++) 
                  { ?>
                    <li><?php echo "<a href='usuarios.php?pag=".$i."&busca=".$busca."'> $i </a>"; ?></li>
                <?php } ?>
              </ul>
            </div>  
          </section>
        </div>
      </div>
    </div>  

    <table class="table table-hover " >
      <span><h1 id="h1">Usuarios del sistema</h1></span>
        <tr>
          <th>nombres <img src="img/png/glyphicons_267_credit_card.png"></th>
          <th>usuarios <img src="img/png/glyphicons_043_group.png"></th>
          <th>emails <img src="img/png/glyphicons_129_message_new.png"></th>
          <th><a href="roles.php" class="a">Roles</a> <img src="img/png/glyphicons_044_keys.png"></th>
          <th><img src="img/png/glyphicons_029_notes_2.png"> <?php echo $nreg?> <img src="img/png/glyphicons_229_retweet_2.png"> <?php
                if($totalPag==0)
                  echo " ".$total.""; 
                else 
                  echo " ".$total."";
            ?></th>
          
        </tr>
          <?php  
              while ($r=mysql_fetch_array($res)) 
              { ?>
                <tr>
                  <td><?php echo "{$r['name']}"?></td>    
                  <td><?php echo "{$r['user']}"?></td>
                  <td><?php echo "{$r['email']}"?></td>
                  <td><?php echo "{$r['rol']}"?></td>
                  <td>
                    <form action="crud.php" method="post" id="frm_usr_acc" name="frm_usr_acc">
                      <input type="hidden" name="id" value="<?php echo $r['id'] ?>">
                      <?php
                        if ($_SESSION['ss_role']<=2) { ?>
                        <input type="submit"  name="editar_u" value="Editar" class="btn btn-mini btn-success" >
                      <?php } if ($_SESSION['ss_role']==1) { ?>
                        <input type="submit"  name="eliminar" value="Eliminar" class="btn btn-mini btn-danger" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">
                      <?php } ?> 
                </tr>
                    </form>
                </td>
             <?php }?>
    </table>
     <?php
      if ($_SESSION['ss_role']==1) { ?>
          <td><a href="new_user.php" id="new_user" name="new" class="btn btn-success" ><img src="img/png/glyphicons_006_user_add.png"> Nuevo</a></td>
      <? }?>    
     <!-- <td><a href="new_user.php" target="_blank" class="btn btn-success" onClick="window.open(this.href, this.target, 'width=1100,height=900'); return false;"><img src="img/png/glyphicons_006_user_add.png"> Nuevo</a></td>-->
      <td><a href="a_pdf.php" id="a_pdf" name="a_pdf" class="btn btn-inverse" ><img src="img/png/glyphicons_051_eye_open.png"> PDF</a></td>
      <td><a href="backup.php" id="resp" name="resp" class="btn btn-danger" ><img src="img/png/glyphicons_151_new_window.png"> Backup</a></td>
  </body>
</html>