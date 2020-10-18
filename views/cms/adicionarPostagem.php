<?php foreach ($usuarios as $usuario): ?>
<?php endforeach; ?>

<?php
date_default_timezone_set("America/Sao_Paulo");
$date = new DateTime();
//echo $date->format("d/m/Y - H:i:s");
$niveltotal = $usuario['nivel_total'];
$nivelPagina = $usuario['nivel_cms'];
?>    
<?php if ($niveltotal === "on" || $nivelPagina === "on"): ?> 
  <div class="view_container">

    <p class="titulo txtcenter">adicione uma nova postagem</p>
    <div class="formUm">
      <form method="POST" enctype="multipart/form-data">
        <input type="text" name="ultimoId" value="<?php echo $ultimoPost['id']; ?>" class="naoMostrar">
        <input type="text" name="date" value="<?php echo $date->format("d/m/Y - H:i:s"); ?>" readonly="TRUE" class="naoMostrar">
        <div class="formDois">
          <p class="paragrafo">titulo da postagem =</p>
          <input type="text" name="titulo" placeholder="escreva um titulo" class="input"><br><br>
        </div>
        <hr>
        <p class="paragrafo_texto">escreva o texto da postagem</p><br>
        <textarea name="texto" placeholder="insira aqui o texto da postagem" id="postagem" class="textao"></textarea>
        <hr>
        <div class="formDois">
          <p class="paragrafo">autor =</p>
          <input type="text" name="autor" placeholder="autor da postagem" class="input"><br><br>
        </div>
        <hr>
        <p class="paragrafo">Categorias validas: humor, adulto, carro, curiosidade</p><br>
        <div class="formDois">
          
          <p class="paragrafo">categoria =</p>
          <input type="text" name="categoria" placeholder="categoria" class="input"><br><br>
        </div>
        <hr>

        <hr>
        <p class="paragrafo_texto">escolha imagens para publicar junto com a postagem</p><br>
        <div class="input_selecao">
          <input type="file" name="url_img[]" multiple="TRUE"class="submitFoto"id="Arquivo1"><br><br>

        </div>


        <input type="submit" value="publicar postagem" class="submit">


      </form>
    </div>
  </div>
<?php endif; ?>
<?php if ($niveltotal !== "on" && $nivelPagina !== "on"): ?>
  <div class="acesso_negado">
    <p>ACESSO NEGADO...<br>PÁGINA NÃO DISPONÍVEL PARA ESTE USUÁRIO</p>  
  </div>
<?php endif; ?>

<script type="text/javascript" src="<?php echo BASE_URL; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  window.onload = function () {
    CKEDITOR.replace("postagem");
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