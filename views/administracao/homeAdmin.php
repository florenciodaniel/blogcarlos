<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?> 
Pagina de adminstração do home do site

<form method="POST">
 titulo do site<br>
 <input type="text" name="site_titulo" value="<?php echo utf8_encode($this->home['site_titulo']);?>"><br><br>
 
 aparencia do site(CSS)<br>
 <select name="css">
  <option value="estiloHome" <?php echo ($this->home['css']=='estiloHome')?'selected="selected"':'';?>>opção 1</option>
  <option value="estiloTeste" <?php echo ($this->home['css']=='estiloTeste')?'selected="selected"':'';?>>opção 2</option>
  <option value="estiloAlternativo" <?php echo ($this->home['css']=='estiloAlternativo')?'selected="selected"':'';?>>opção 3</option>
 </select><br><br>
 
  rodapé do site<br>
 <input type="text" name="site_rodape" value="<?php echo utf8_encode($this->home['site_rodape']);?>"><br><br>
 
 <input type="submit" value="salvar">
 
</form>

