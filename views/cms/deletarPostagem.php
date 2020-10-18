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
$niveltotal = $usuario['nivel_total'];
$nivelPagina = $usuario['nivel_cms'];
?>    
<?php if ($niveltotal === "on" || $nivelPagina === "on"): ?> 

<p class="titulo txtcenter">Escolha o post que deseja remover e clique em excluir</p>
<div class="galeria_bloco">

   <?php foreach ($postsDelete as $post): ?>
      <div class="post_part">


         <div class="imagenDoPost">

            <img src="../assets/img/post/<?php echo $post['essaimagem'][0]['url_img']; ?>">

            
         </div>

         <div class="paragf"><p> <?php echo $post['titulo']; ?></p></div>
         <form method="POST">
            
<?php foreach ($post['essaimagem'] as $valued): ?>
           
           <input type="text" name="img[]"  value="<?php echo $valued['url_img']; ?>" class="naoMostrar">
<?php endforeach; ?>
            <input type="text" name="hashtag" value="<?php echo $post['hashtag']; ?>" class="naoMostrar">
            <input type="submit" value="excluir post" class="submit">

         </form>
      </div>
   

   <?php endforeach; ?>

</div>
<?php endif; ?>
<?php if ($niveltotal !== "on" && $nivelPagina !== "on"): ?>
<div class="acesso_negado">
    <p>ACESSO NEGADO...<br>PÁGINA NÃO DISPONÍVEL PARA ESTE USUÁRIO</p>  
</div>
<?php endif; ?>