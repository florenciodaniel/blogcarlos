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
$nivelPagina = $usuario['nivel_usuario'];
?>    
<?php if ($niveltotal === "on" || $nivelPagina === "on"): ?>  


    <div class="view_container">


    </div>
<?php endif; ?>
<?php if ($niveltotal !== "on" && $nivelPagina !== "on"): ?>
    <h1>Desculpe!<br>voce precisa de autorização para acessar este conteúdo</h1>
<?php endif; ?>