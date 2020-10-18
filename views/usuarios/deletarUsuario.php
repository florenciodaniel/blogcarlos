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
$nivelPagina=$usuario['nivel_usuario'];

?>

<?php

if($niveltotal==="on" || $nivelPagina==="on"): ?>
<p class="titulo txtcenter"> aqui voce pode excluir um usuário </p>
<?php   foreach ($todosUsuarios as $esseUsuario):?>
<div class="formUm">
      <form method="POST">
         <div class="formDois">
            <p class="paragrafo">Nome do usuário</p>
            <input type="text" name="nome" value="<?php echo utf8_encode($esseUsuario['nome']);?>" class="input">
         </div>
         <div class="formDois">
            <p class="paragrafo">Usuário</p>
            <input type="text" name="nome" value="<?php echo utf8_encode($esseUsuario['usuario']);?>" class="input">
         </div>
         <input type="text" name="id" value="<?php echo $esseUsuario['id'];?>" class="naoMostrar"><br><br>
         <input type="submit" value="excluir esse usuario" class="submit">

      </form>
    <hr/>
    
   </div>


<?php endforeach;?>
      <?php foreach ($verificado as $codigoVerificado): ?>
         <?php //if (!empty($idVerificado['id'])): ?>
         <form method="POST">
            <div id="modalacionado">
               <div class="modal-box">
                  <div class="modal-box-conteudo">
                     <p class="txtmodal">Deseja realmente excluir este usuario dos seus registros</p>
                     <div class="display_model">
                            <div class="formDois">
            <p class="paragrafo">Nome do usuario</p>
            <input value="<?php echo $codigoVerificado['nome'];?>" class="input">
         </div>
                                 <div class="formDois">
            <p class="paragrafo">Usuário</p>
            <input value="<?php echo $codigoVerificado['usuario'];?>" class="input">
         </div>
                        <input type="text" name="excluircodigo" value="<?php echo $codigoVerificado['id']; ?>" class="naoMostrar">
                        <input type="submit" value="excluir este usuário" class="submitmodel" >
                        <a href="<?php BASE_URL; ?>"> <input type="button" value="voltar" class="fechar" ></a>

                     </div>
                  </div>

               </div>
            </div>
         </form>
         <?php //endif; ?>
      <?php endforeach; ?>



<?php endif;?>
<?php

if($niveltotal!=="on" && $nivelPagina!=="on"):?>
<div class="acesso_negado">
    <p>ACESSO NEGADO...<br>PÁGINA NÃO DISPONÍVEL PARA ESTE USUÁRIO</p>  
</div>
<?php endif;?>
<script type="text/javascript">
   $(document).ready(function (e) {
      $('.acionar-modal').click(function () {
         $('#modal').fadeIn(500);
      });
      $('.fechar, #modal').click(function (event) {
         if (event.target !== this) {
            return;
         }
         $('#modal').fadeOut(500);
      });
   });
</script>
<script type="text/javascript">
   $(document).ready(function (e) {
      $('.acionar-modal').click(function () {
         $('#modalacionado').fadeIn(500);
      });
      $('.fechar, #modalacionado').click(function (event) {
         if (event.target !== this) {
            return;
         }
         $('#modalacionado').fadeOut(500);
      });
   });
</script>