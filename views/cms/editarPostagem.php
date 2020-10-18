<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
date_default_timezone_set("America/Sao_Paulo");
$date = new DateTime();
//echo $date->format("d/m/Y - H:i:s");
?>
<?php foreach ($usuarios as $usuario): ?>
<?php endforeach; ?>

<?php
$niveltotal = $usuario['nivel_total'];
$nivelPagina = $usuario['nivel_admin'];
?>    
<?php if ($niveltotal === "on" || $nivelPagina === "on"): ?>  
  <p class="titulo txtcenter">use a barra de pesquisa para buscar o post a ser editado</p>
  <form method="POST">
    <input type="text" name="busca" autofocus="TRUE" class="busca">
    <input type="submit" value="pesquisar" class="submitFoto">
  </form>
  <?php if (isset($buscados) && !empty($buscados)): ?>
    <?php foreach ($buscados as $achados): ?>
      <div class="formUm">
        <form method="POST" enctype="multipart/form-data">
          <div class="formDois">
            <p class="paragrafo">editar o título = </p>
            <input type="text" name="titulo" value="<?php echo $achados['titulo']; ?>" class="input">
          </div>
          <hr>
          <p class="paragrafo">editar o conteúdo</p>
          <textarea name="texto" placeholder="insira aqui o texto da postagem" id="editor" class="textao"><?php echo $achados['texto']; ?></textarea>
          <hr>
          <div class="paragrafo_titulo">
            <p class="paragrafo">Deseja trocar as fotos = </p>
          </div>

          <div class="fotos_edicao">
            <?php foreach ($achados['essaimagem'] as $valued): ?>

              <div class="trocar_foto_edicao">
                <img src="../assets/img/post/<?php echo $valued['url_img']; ?>">
                <input type="text" name="img[]"  value="<?php echo $valued['url_img']; ?>" class="naoMostrar">

              </div>
            <?php endforeach; ?>
          </div>

          <input type="file" name="url_img[]" multiple="TRUE" class="submitFoto" value="trocar fotos">
          <hr>

          <input type="text" name="hashtag" value="<?php echo $achados['hashtag']; ?>" class="naoMostrar">
          <input type="submit" value="editar post" class="submit">
        </form> 
      </div> 
    <?php endforeach; ?>

  <?php endif; ?>
<?php endif; ?>
<?php if ($niveltotal !== "on" && $nivelPagina !== "on"): ?>
  <div class="acesso_negado">
    <p>ACESSO NEGADO...<br>PÁGINA NÃO DISPONÍVEL PARA ESTE USUÁRIO</p>  
  </div>
<?php endif; ?>
<script type="text/javascript" src="<?php echo BASE_URL; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  window.onload = function () {
    CKEDITOR.replace("editor");
  };
</script>
<script>
  function enviar_imagem1(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img1').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#Arquivo1").change(function () {
    enviar_imagem1(this);
  });
</script>
</script>
<script>function enviar_imagem2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img2').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#Arquivo2").change(function () {
    enviar_imagem2(this);
  });</script>
<script>function enviar_imagem3(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img3').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#Arquivo3").change(function () {
    enviar_imagem3(this);
  });</script>
<script>function enviar_imagem4(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img4').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#Arquivo4").change(function () {
    enviar_imagem4(this);
  });</script>
<script>function enviar_imagem5(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img5').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#Arquivo5").change(function () {
    enviar_imagem5(this);
  });</script>