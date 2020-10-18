<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php foreach ($usuarios as $usuario): ?>
<?php endforeach; ?>
<div class="view_container">
<p class="txtcenter titulo"><?php echo (isset($usuario['nome'])) ? utf8_encode($usuario['nome']) : utf8_encode($usuario['usuario']); ?> aqui você pode redefinir suas configurações de usuário</p>
<div class="formUm">
    <form method="POST" enctype="multipart/form-data">
        <div class="formDois">
            <span class="paragrafo">Nome de tratamento social = </span>
            <input type="text" name="nome" autofocus="TRUE" value="<?php echo (isset($usuario['nome'])) ? utf8_encode($usuario['nome']) : "ex. Sr. Edinei lima Soares"; ?>" class="input" >
        </div>
        <hr>
        <div class="formDois">
            <span class="paragrafo">Para mudar seu nome de usuario = </span>
            <input type="text" name="usuario" placeholder="Digite novo usuàrio" value="<?php echo utf8_encode($usuario['usuario'])?>"class="input" >
        </div>
        <hr>
        <div class="formDois">
            <span class="paragrafo">Para trocar sua senha = </span>
            <input type="password" name="senha" placeholder="********" class="input">
            <input type="password" name="nosenha" class="naoMostrar"  readonly="TRUE" value="<?php echo $usuario['senha']; ?>">
        </div>
        <hr>
        <div class="formDois">
            <p class="paragrafo">Trocar foto = </p>
            <input type="file" name="foto" class="submitFoto" id="arquivo">
        </div>
        <hr>
        <input type="text" name="nofoto" value="<?php echo $usuario['img']; ?>" class="naoMostrar">
        <div class="formFoto">
            <img src="assets/img/usuario/<?php echo $usuario['img']; ?>">
            <img id="foto" Name="foto"/>
        </div>
        <input type="text" name="token" value="<?php echo $usuario['token']; ?>" class="naoMostrar">

        <input type="submit" value="configurar usuário" class="submit">
    </form>
</div>
</div>
   <script>
           function enviar_imagem1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#foto').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#arquivo").change(function() {
  enviar_imagem1(this);
});
       </script>