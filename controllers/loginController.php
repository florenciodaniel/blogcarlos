<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class loginController extends Controller{
 
 public function index(){
   $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
        'msg'=>''
          );
   if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
    $usuario= addslashes($_POST['usuario']);
    $senha= addslashes($_POST['senha']);
    
    $user=new Usuarios();

    
    //verificando se tem um usuario com este usuario e com esta senha
    if($user->verificarUsuario($usuario, $senha)){
     $token=$user->criarToken($usuario);
     $_SESSION['token']=$token;


  header("Location: ". BASE_URL. "admin");
    } else {
     $data['msg']='Usuário e/ou senha inválidos';
    }
   }
   
   
   

        //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
        $this->loadTemplate('login', $data);
 }
 
 
 
 
}