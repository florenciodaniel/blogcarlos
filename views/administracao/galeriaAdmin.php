<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php foreach ($usuarios as $usuario): ?>

<?php endforeach; ?>
<?php
$niveltotal=$usuario['nivel_total'];
$nivelPagina=$usuario['nivel_gv'];

?>
<?php



if($niveltotal==="on" || $nivelPagina==="on"):?>
<h1>Estas são as fotos que existem na galeria</h1>
<div class="galeria_bloco">

   <?php foreach ($fotos as $foto): ?>
      <div class="galeria_part">


         <div class="imagenDaGaleria">

            <img src="assets/img/galeria/<?php echo $foto['url']; ?>">
         </div>

         <div class="paragf"><p> <?php echo $foto['titulo']; ?></p></div>

      </div>
   

   <?php endforeach; ?>

</div>
<?php endif;?>
<?php

if($niveltotal!=="on" && $nivelPagina!=="on"):?>
<h1>infelizmnete voce não tem acesso a esse conteudo</h1>
<?php endif;?>
