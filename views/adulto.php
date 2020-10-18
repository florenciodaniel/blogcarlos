<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
  .modal18{
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 10000;
    background-color: black;
    display: block;
  }
  .modal18:target{
    display: none;
    pointer-events: auto;
  }
  .modal18-contentcon{
    width: 100%;
    height: 100vh;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-direction: normal;
    -moz-box-direction: normal;
    -webkit-box-orient: vertical;
    -moz-box-orient: vertical;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    -webkit-box-pack: center;
    -moz-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-align-content: center;
    -ms-flex-line-pack: center;
    align-content: center;
    -webkit-box-align: center;
    -moz-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
  }
  .modah{
    width: 100%;
    margin-top: 200px;
  }
  .modah h1{

    text-align: center;
    color: white;
    font-size: 3em;
  }
  .modala{
    width: 100%;
    margin-top: 50px;
    text-align: center;
  }
  .modala a{

    text-align: center;
    color: white;
    font-size: 2em;
    background-color: blue;
    padding-left: 25px;
    padding-right: 25px;
    text-decoration: none;
    border: 1px solid white;
    border-radius: 6px;
  }
    .modala a:hover{
    background-color: red;

  }

</style>

<div class="blog_container">

  <div id="fechar" class="modal18">
    <div class="modal18-content">
      <div class="modah">
        <h1>Conteúdo somente para maiores de idade</h1>
      </div>
      <div class="modala">
        <a href="#fechar">Sou maior de idade</a>
      </div>
      <div class="modala">
      <a href="<?php echo BASE_URL; ?>" class="fecharmodal">Ver outro conteúdo</a>
      </div>
    </div>
  </div>
  <div class="blog_container_post">


    <?php foreach ($todosPostsAdulto as $post): ?>
      <div class="cada_post">

        <h1 class="titulo_post"><?php echo $post['titulo']; ?></h1>

        <div class="img_post">

          <img src="<?php echo BASE_URL; ?>assets/img/post/<?php echo $post['essaimagem'][0]['url_img']; ?>">

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
        <div class="itemPaginacao <?php echo($pagAtual == $q) ? 'pagina_ativa' : ''; ?>"><a href="<?php echo BASE_URL; ?>home/adulto/?p=<?php echo $q; ?>"><?php echo $q; ?></a></div>
      <?php endfor; ?>
    </div>

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


