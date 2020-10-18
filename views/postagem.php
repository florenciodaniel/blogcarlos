<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
  .cada_post{
    width: 100%;

  }
</style>

<div class="blog_container">

  <div class="blog_container_post">
    

    <?php foreach ($essePost as $post): ?>

      <div name="<?php echo $post['id']; ?>" class="cada_post">

    

        <h1><?php echo $post['titulo']; ?></h1>
        

        <div <?php echo (!empty($post['essaimagem'])) ? 'class="post_container_post_img"' : 'class="naoMostrar"'; ?>>
          <div class="post_container_post_img_principal">
          <?php foreach ($post['essaimagem'] as $valued): ?>
            <div class="post_container_post_img_principal_img">
            <a class="button_saiba" href="#<?php echo substr($valued['url_img'], 0, 6); ?>" rel="modal">
              <img src="<?php echo BASE_URL; ?>assets/img/post/<?php echo $valued['url_img']; ?>">
            </a>
              </div>
            <div class="window" id="<?php echo substr($valued['url_img'], 0, 6); ?>">
              <a href="#" class="fechar">X Fechar</a>
              <img src="<?php echo BASE_URL; ?>assets/img/post/<?php echo $valued['url_img']; ?>">
            </div>
            <!-- mascara para cobrir o site -->  
            <div id="mascara"></div>
            
            
          <?php endforeach; ?>
            </div>
          

        <p><?php echo $post['texto']; ?></p>

      </div>
    <?php endforeach; ?>
    <hr>




  </div>

  <div class="blog_container_outros">
    
    <h3>Veja tambem</h3>
    <?php foreach ($postAleatorio as $aleatorio): ?> 
    
      <a href="<?php echo BASE_URL; ?>postagem/?p=<?php echo $aleatorio['id']; ?>"> <div class="blog_container_outros_pqn" style="background-image:url(<?php echo BASE_URL; ?>assets/img/post/<?php echo $aleatorio['essaimagem'][0]['url_img']; ?>) ">

          <h6><?php echo $aleatorio['titulo']; ?></h6>
          

        </div></a>

    <?php endforeach; ?>
    
  </div>


</div>
