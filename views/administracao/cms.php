<?php foreach ($usuarios as $usuario): ?>
<?php endforeach; ?>

<?php
$niveltotal = $usuario['nivel_total'];
$nivelPagina = $usuario['nivel_cms'];
?>    
<?php if ($niveltotal === "on" || $nivelPagina === "on"): ?>  
<div class="cms_container">

</div>
<?php endif;?>
<?php if($niveltotal!=="on" && $nivelPagina!=="on"):?>
<h1>Desculpe!<br>voce precisa de autorização para acessar este conteúdo</h1>
<?php endif;?>