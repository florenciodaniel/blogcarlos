<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>




  <ul>
    
    <li><a href="index.php">menu</a>
      
      <?php foreach ($menu as $menuitem): ?>
      <ul>
        <li>
          <a href="<?php echo BASE_URL . $menuitem['url']; ?>"><?php echo utf8_encode($menuitem['nome']); ?></a>
        </li>

      </ul>
      <?php endforeach; ?>
    </li>

  </ul>


