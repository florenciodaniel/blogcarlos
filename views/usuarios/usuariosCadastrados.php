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
<p class="titulo txtcenter"> aqui voce pode ver a lista dos usuários já cadastrados </p>
<?php   foreach ($todosUsuarios as $esseUsuario):?>
<div class="formUm">
      
         <div class="formDois">
            <p class="paragrafo">Nome do usuário</p>
            <input type="text" name="nome" value="<?php echo utf8_encode($esseUsuario['nome']);?>" class="input">
         </div>
   
         <div class="formDois">
            <p class="paragrafo">Usuário</p>
            <input type="text" name="nome" value="<?php echo utf8_encode($esseUsuario['usuario']);?>" class="input">
         </div>
  
   <div class="formDois">
            <p class="paragrafo">cadastrado em </p>
            <input type="text" name="nome" value="<?php echo $esseUsuario['date_cadastro'];?>" class="input">
         </div>
        
   </div>
 <hr>
<?php endforeach;?>




<?php endif;?>
<?php

if($niveltotal!=="on" && $nivelPagina!=="on"):?>
<div class="acesso_negado">
    <p>ACESSO NEGADO...<br>PÁGINA NÃO DISPONÍVEL PARA ESTE USUÁRIO</p>  
</div>
<?php endif;?>
