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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
<!--    <link href="../../assets/css/estiloHome.css" rel="stylesheet" type="text/css"/>-->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/<?php echo $this->home['css']; ?>.css"/>



  </head>
  <body>
    <header>
      <div class="topoContainer">
                <div class="banner">
          <h1>Nome do blog</h1>
<!--          <div class="busca">
            <form method="POST">
              <input type="text" name="pesquisa" placeholder="procurar" class="busca1">
              <input type="submit" value="pesquisar" class="submitFoto">
            </form>
          </div>-->
        </div>
        <div class="cabecalho">
          <div class="link_home">
            <a href="<?php echo BASE_URL; ?>">home</a>
          </div>
          <div class="link_sobre">
            <a href="<?php echo BASE_URL; ?>">sobre</a>
          </div>
          <div class="link_contato">
            <a href="<?php echo BASE_URL; ?>admin">contato</a>
          </div>

          <div class="categoria">
            <ul>
              <li><a href="">categorias</a>
                <ul>
                  <li><a href="<?php echo BASE_URL; ?>admin">ADMIN</a></li>
                  <li><a href="<?php echo BASE_URL; ?>home/humor">humor</a></li>
                  <li><a href="<?php echo BASE_URL; ?>home/curiosidade">curiosidades</a></li>
                  <li><a href="<?php echo BASE_URL; ?>home/carro">carros</a></li>
                  <li><a href="<?php echo BASE_URL; ?>home/adulto">adulto</a></li>
                  <li><a href="#">about</a></li>
                  <li><a href="#">about</a></li>
                </ul>
              </li>
            </ul>
          </div>

        </div>

      </div>
    </header>

    <main>
      <div class="container_geral">
        <?php
        $this->loadViewInTemplate($viewName, $viewData);
        ?>
      </div>
    </main>


    <footer>

      <footer>
        <div class="rodape">
          <h1>@Daniel Florêncio</h1>
          <h2><a  href="http://www.stylusprime.com" class="link" rel="nofollow" target="_blank" >desenvolvido e organizado por <span class='animated lightSpeedInRight' style="color: blue">StylusPrime</span> &copy; Todos os direitos reservados</a></h2>
          <!--    <h2>"Se você pensa que pode ou se pensa que não pode, de qualquer forma você está certo."  - Henry Ford</h2>-->
        </div>
      </footer>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>

      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/cycle2.js"></script>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.js"></script>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/slide.js"></script>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/menufixo.js"></script>
  </body>
</html>
