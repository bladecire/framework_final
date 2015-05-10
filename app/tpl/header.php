<body>
<header>
<div class="header-tit">
  <div id="wrapper">
    <a href="<?= APP_W; ?>"><img class="logo" alt="Put your logo" src="<?= APP_W . 'pub/theme/k/' . $logo; ?>"/></a>
    <h1><?= $titol; ?>
    </h1>
  </div>
</div>
<!-- from div header-tit -->


<div class="regist">

  <?php 
    $destino = 'home/login';
    $texto_boton = "Entrar";
    if(isset($_SESSION['user'])){ $destino = 'home/salir';$texto_boton = 'Salir';}
  ?>

  <form class="reg" name="formlog" method="post" action="<?= APP_W.$destino; ?>">
  <?php if($destino == 'home/login'){  ?>
    <label for="nusuario">Nombre Usuario: <input type="text" name="usuario" value="" placeholder="nombre de usuario" required></label>
    <label for="password">Password: <input type="password" name="password" required></label>
  <?php }else{ ?>
      <p>Bienvenido <?php echo $_SESSION['user']; ?> </p>
  <?php } ?>
    <input type="submit" class="bEntra" value="<?= $texto_boton?>" id="logsend">    
  </form>
</div>
</header>