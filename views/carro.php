<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="blog_container">

  <div class="blog_container_post">


    <?php foreach ($todosPostsCarro as $post): ?>
      <div class="cada_post">

        <h1 class="titulo_post"><?php echo $post['titulo']; ?></h1>
        
        <div class="img_post">
          
          <img src="<?php echo BASE_URL; ?>assets/img/post/<?php echo  $post['essaimagem'][0]['url_img']; ?>">
          
        </div>



        <p><?php echo substr($post['texto'], 0, 700); ?></p>
        <button class="submit"><a href="<?php echo BASE_URL; ?>postagem/?p=<?php echo $post['id']; ?>">ver o post completo</a></button>
          <p><?php echo $post['categoria']; ?></p><br>
    <p><?php echo $post['autor']; ?></p><br>
      </div>

      <hr>
    <?php endforeach; ?>

    <div class="container_paginacao">
      <?php for ($q = 1; $q <= $numeroDePaginas; $q++): ?>
        <div class="itemPaginacao <?php echo($pagAtual == $q) ? 'pagina_ativa' : ''; ?>"><a href="<?php echo BASE_URL; ?>home/carro/?p=<?php echo $q; ?>"><?php echo $q; ?></a></div>
      <?php endfor; ?>
    </div>

  </div>

  <div class="blog_container_outros">
    <h3>Veja tambem</h3>
    <?php foreach ($postAleatorio as $aleatorio): ?> 
      <a href="<?php echo BASE_URL; ?>postagem/?p=<?php echo $aleatorio['id']; ?>"> <div class="blog_container_outros_pqn" style="background-image:url(<?php echo BASE_URL; ?>assets/img/post/<?php echo  $aleatorio['essaimagem'][0]['url_img']; ?>) ">

          <h6><?php echo $aleatorio['titulo']; ?></h6>


        </div></a>

    <?php endforeach; ?>
  </div>


</div>