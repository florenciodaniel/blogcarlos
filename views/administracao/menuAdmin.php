<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>MENUS</h1>
<a href="<?php echo BASE_URL;?>menuAdmin/adicionarmenuAdmin">Adicionar menu</a>
<table width="100%" border="1">
 <tr>
  <th align="left">id</th>
  <th align="left">nome</th>
  <th align="left">url</th>
  <th align="left">açoes</th>
 </tr>
 
 <?php foreach($menus as $menu):?>
 <tr>
 <td><?php  echo utf8_encode($menu['id']);?></td>
 <td><?php  echo utf8_encode($menu['nome']);?></td>
 <td><?php  echo utf8_encode($menu['url']);?></td>
 <td>
  <a href="<?php echo BASE_URL;?>menuAdmin/editarMenu/<?php  echo $menu['id'];?>">editar</a>
  <a href="<?php echo BASE_URL;?>menuAdmin/deletarMenu/<?php  echo $menu['id'];?>">excluir</a>
 </td>
</tr>
 <?php endforeach;?>
</table>