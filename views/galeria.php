<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="galeriaContainer">
  <div class="galeria_titulo"><h1>Nossa galeria de fotos</h1></div>

  <div class="galeria_bloco">



<?php foreach ($fotos as $foto): ?>
        <div class="galeria_part">
          <div class="imagenDaGaleria">
            <a class="button_saiba" href="#<?php echo $foto['id']; ?>" rel="modal">
              <img src="assets/img/galeria/<?php echo $foto['url']; ?>">
            </a>
          </div>
          <div class="paragf"><p> <?php echo $foto['titulo']; ?></p></div>
          <div class="window" id="<?php echo $foto['id']; ?>">
            <a href="#" class="fechar">X Fechar</a>
            <img src="assets/img/galeria/<?php echo $foto['url']; ?>">
          </div>
          <!-- mascara para cobrir o site -->  
          <div id="mascara"></div>
        </div>
    <?php endforeach; ?>



  </div>
</div>

