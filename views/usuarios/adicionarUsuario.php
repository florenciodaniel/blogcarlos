<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
date_default_timezone_set("America/Sao_Paulo");
$date = new DateTime();
echo $date->format("d/m/Y - H:i:s");
?>
<?php foreach ($usuarios as $usuario): ?>

<?php endforeach; ?>
<?php
$niveltotal = $usuario['nivel_total'];
$nivelPagina = $usuario['nivel_usuario'];
?>
<?php if ($niveltotal === "on" || $nivelPagina === "on"): ?>



   <p class="titulo txtcenter">Insira um novo usuário para admnistrar o sistema</p>
   <div class="formTable">
      <form method="POST">
         <div class="formDois">
            <p class="paragrafo"> Nome do novo usuário = </p>
            <input type="text" name="usuario" required="TRUE" autofocus="TRUE" placeholder="Digite o novo usuario" class="input"/>
         </div>
         <hr>
         <div class="formDois">
            <p class="paragrafo">Digite uma senha para novo usuário = </p>
            <input type="password" name="senha" required="TRUE" placeholder="Digite uma senha" class="input"/>
         </div>
         <hr>

         <p class="paragrafo">Escolha as permissões que o novo usuário pode ter acesso no sistema</p><br>


         <table border="1" cellpadding="1" width="100%">
            <thead>
               <tr>
                  <th width="90%"><p class="paragrafo">permissôes</p></th>
                  <th><p class="paragrafo">marque para permitir</p></th>
               </tr>
            </thead>
            <tbody>
               <tr class="inputUsu">
                  <td><p class="paragrafo">Permite ao novo usuário SOMENTE acionar o PDV para efetuar venda</p></td>
                  <td><input type="checkbox" name="nivel_venda" value="on"/><br></td>
               </tr>
               <tr class="inputUsu">
                  <td><p class="paragrafo">Permite ao novo usuário acesso total ao sistema, (marcar esta opção marca automaticamente todas as demais)</p></td>
                  <td><input type="checkbox" name="nivel_total" value="on"/><br></td>
               </tr>
               <tr class="inputUsu">
                  <td><p class="paragrafo">Permite ao novo usuário administração</p></td>
                  <td><input type="checkbox" name="nivel_admin" value="on"/><br></td>
               </tr>
               <tr class="inputUsu">
                  <td><p class="paragrafo">Permite ao novo usuário configurar o site</p></td>
                  <td><input type="checkbox" name="nivel_cms" value="on"/><br></td>
               </tr>
               <tr class="inputUsu">
                  <td><p class="paragrafo">Permite ao novo usuário gerenciar usuarios</p></td>
                  <td><input type="checkbox" name="nivel_usuario" value="on"/><br></td>
               </tr>
               <tr class="inputUsu">
                  <td><p class="paragrafo">Permite ao novo usuário acessar configurações do estoque e produtos</p></td>
                  <td><input type="checkbox" name="nivel_estoque" value="on"/><br></td>
               </tr>
               <tr class="inputUsu">
                  <td><p class="paragrafo">Permite ao novo usuário  ecessar o finaceiro do sistema</p></td>
                  <td><input type="checkbox" name="nivel_financeiro" value="on"/><br></td>
               </tr>
               <tr class="inputUsu">
                  <td><p class="paragrafo">Permite ao novo usuário acionar o PDV para efeutar venda</p></td>
                  <td><input type="checkbox" name="nivel_venda" value="on"/><br></td>
               </tr>
               

               
               <input type="text" name="date_cadastro" value="<?php echo $date->format("d/m/Y - H:i:s" ); ?>" readonly="TRUE" class="naoMostrar"/>
            </tbody>
         </table>

         <input type="submit" value="criar novo usuario" class="submit"/>
      </form>
   </div>
<?php endif; ?>
<?php if ($niveltotal !== "on" && $nivelPagina !== "on"): ?>
   <div class="acesso_negado">
    <p>ACESSO NEGADO...<br>PÁGINA NÃO DISPONÍVEL PARA ESTE USUÁRIO</p>  
</div>
<?php endif; ?>

