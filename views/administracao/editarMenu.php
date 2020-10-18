<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>EDITAR MENU
<form method="POST">
 nome do menu<br>
 <input type="text" name="nome" value="<?php echo $menu['nome'];?>"><br><br>
 
  url do menu<br>
 <input type="text" name="url" value="<?php echo $menu['url'];?>"><br><br>
 
 <input type="submit" value="editar">
</form>
