<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro');
    .containerLogin{
      width: 100%;
      height: 100vh;
      position: absolute;
      top: 0;
      left: 0;
      background-image: url(assets/img/back.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      z-index: 2000;
    }
   .line {
      position: relative;
      top: 60px;
      width: 50%;
      margin: 0 auto;
      border-right: 2px solid rgba(255, 255, 255, 0.75);
      font-size: 180%;
      text-align: center;
      white-space: nowrap;
      overflow: hidden;transform: translateY(-50%);
      color: white;
      text-shadow:2px 2px 2px black;
}
span{
  color: red;
}
/*Animation*/
 
.anim-typewriter {
      animation: typewriter 4s steps(40) 1s 1 normal both,
      blinkTextCursor 500ms steps(40) infinite normal;
}
 
@keyframes typewriter {
      from {
            width: 0;
      }
      to {
            width: 16em;
      }
}
 
@keyframes blinkTextCursor {
      from {
            border-right-color: rgba(255, 255, 255, 0.75);
      }
      to {
            border-right-color: transparent;
      }
}
 .formulario{
     width: 580px; 
     margin: auto; 
     font-size: 1.5em; 
     background: linear-gradient(120deg, rgba(188, 76, 219,0.6) 0%, rgba(188, 76, 219,0.6) 10%, rgba(255,255,255,0.6) 20%, rgba(255,255,255,0.6) 30%, rgba(188, 76, 219,0.6) 40%, rgba(188, 76, 219,0.6) 50%, rgba(188, 76, 219,0.6) 60%, rgba(255,255,255,0.6) 70%, rgba(255,255,255,0.6) 80%, rgba(188, 76, 219,0.6) 90%, rgba(188, 76, 219,0.6) 100%); /* w3c */
     text-align: center;
     margin-top: 30px;
     font-family: 'Source Sans Pro', sans-serif;
     padding: 0.8%;
     border: 1px solid rgba(48, 46, 46,0.8);
     border-radius: 5px;
     color: black;
     text-shadow: 1px 1px  white;
     box-shadow: 0px 0px 15px white;
 }
 input{
     font-size: 25px; 
     width: 70%; 
     margin: auto;
     border-radius: 5px;
     border: 1px solid rgba(48, 46, 46,1);
     box-shadow: 2px 2px 5px white;
     padding-left: 8px;
 }

 .entrar{width: 100px; margin-bottom: 25px; cursor: pointer;}
 .entrar:hover{background-color: #f94a00; }
 
</style>

<div class="containerLogin">
  <h1 class="line anim-typewriter">Acessando <span>STYLUSPRIME</span> sistemas</h1>
<div class="formulario">
 <p>Area de acesso restrito, por favor<br><strong>Identifique-se</strong></p>
 
  <form method="POST">
   <p>Usuário</p>
 <input type="text" name="usuario" required="TRUE" autofocus="TRUE" placeholder="Digite seu email"><br>
 
  <p>Senha</p>
  <input type="password" name="senha" required="TRUE" placeholder="Digite sua senha"><br><br>
  
  <input  type="submit" value="Entrar" class="entrar"><br>
</form>
 </div>
 
<?php if(!empty($msg)):?>
<h2><?php echo $msg;?></h2>
<?php endif; ?>
</div>