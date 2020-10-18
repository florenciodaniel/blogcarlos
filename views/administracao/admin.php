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
$nivelPagina = $usuario['nivel_admin'];
?>    
<?php if ($niveltotal === "on" || $nivelPagina === "on"): ?>  


    <div class="view_container">


    </div>
<?php endif; ?>
<?php if ($niveltotal !== "on" && $nivelPagina !== "on"): ?>
<div class="acesso_negado">
    <p>ACESSO NEGADO...<br>PÁGINA NÃO DISPONÍVEL PARA ESTE USUÁRIO</p>  
</div>
<?php endif; ?>