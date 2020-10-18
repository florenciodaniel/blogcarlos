
<?php /**
 * home.php
 * arquivo responsavel por poe ser a pagina home do site
 * projeto clinica veterinaria petplay
 * @author Daniel Florêncio
 * @copyright (c) 2018, Daniel Florêncio - StylusPrime.com
 */ ?>


<div class="blog_container">

  <div class="blog_container_post">


    <?php foreach ($todosPosts as $post): ?>
      <div class="cada_post">

        <h1 class="titulo_post"><?php echo $post['titulo']; ?></h1>
        
        <div class="img_post">
          
          <img src="<?php echo BASE_URL; ?>assets/img/post/<?php echo  $post['essaimagem'][0]['url_img']; ?>">
          
        </div>
        <div class="info">
          <div class="info_item"><p>Categoria = <?php echo $post['categoria']; ?></p></div>
          <div class="info_item"><p>Autor = <?php echo $post['autor']; ?></p></div>
          <div class="info_item"><p>postado em = <?php echo $post['date']; ?></p></div>
        </div>



        <p><?php echo substr($post['texto'], 0, 700); ?></p>
       
      <div class="links">
        <button><a href="<?php echo BASE_URL; ?>postagem/?p=<?php echo $post['id']; ?>">ver o post completo</a></button>
        
      </div>
      </div>

      <hr>
    <?php endforeach; ?>

    <div class="container_paginacao">
      <?php for ($q = 1; $q <= $numeroDePaginas; $q++): ?>
        <div class="itemPaginacao <?php echo($pagAtual == $q) ? 'pagina_ativa' : ''; ?>"><a href="<?php echo BASE_URL; ?>home/?p=<?php echo $q; ?>"><?php echo $q; ?></a></div>
      <?php endfor; ?>
    </div>

  </div>

  <div class="blog_container_outros">
    <h3>nosso social</h3>
    
    <div class="blog_container_Social">
      <div class="blog_container_Social_item"><img src="<?php echo BASE_URL; ?>assets/img/social/icon1.jpg"></div>
      <div class="blog_container_Social_item"><img src="<?php echo BASE_URL; ?>assets/img/social/icon2.jpg"></div>
      <div class="blog_container_Social_item"><img src="<?php echo BASE_URL; ?>assets/img/social/icon3.jpg"></div>
      <div class="blog_container_Social_item"><img src="<?php echo BASE_URL; ?>assets/img/social/icon4.jpg"></div>
    </div>
    <h3>Veja tambem</h3>
    <?php foreach ($postAleatorio as $aleatorio): ?> 
      <a href="<?php echo BASE_URL; ?>postagem/?p=<?php echo $aleatorio['id']; ?>"> <div class="blog_container_outros_pqn" style="background-image:url(<?php echo BASE_URL; ?>assets/img/post/<?php echo  $aleatorio['essaimagem'][0]['url_img']; ?>) ">

          <h6><?php echo $aleatorio['titulo']; ?></h6>


        </div></a>

    <?php endforeach; ?>
  </div>


</div>