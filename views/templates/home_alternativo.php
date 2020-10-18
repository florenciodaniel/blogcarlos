<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="pt-br">
 <head>
  <meta charset="UTF-8">
  <title><?php echo utf8_encode($this->home['site_titulo']); ?></title>
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/icon.png"/>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/estiloAlternativo.css"/>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/cycle2.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/slide.js"></script>
 </head>
 <body>
  <header>
   <div class="topoContainer">
   <div class="topo">
    <div class="topoLogo">
    <img src="<?php echo BASE_URL;?>assets/img/logocms.png" height="60px">
    </div>
    <div class="topoSlogan">
     <p>Esse CMS tem que ser top</p>
    </div>
   </div>
      <div class="menu">
    <?php $this->loadMenu();?>
   </div>
</div>
  </header>

  <main>
   <div class="container">
<?php
$this->loadViewInTemplate($viewName, $viewData);
?>
   </div>
  </main>


  <footer>
   <div class="rodape">
    <h1>@Daniel Florêncio</h1>
    <h2>"Se você pensa que pode ou se pensa que não pode, de qualquer forma você está certo."  - Henry Ford</h2>
   </div>
  </footer>

 </body>
</html>