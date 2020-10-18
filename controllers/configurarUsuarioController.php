<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class configurarUsuarioController extends Controller {
 private $user;
 public function __construct() {
  parent::__construct();
  
  $this->user=new Usuarios();
  if(!$this->user->checarLogin()){
   header("Location: ".BASE_URL."login");
   exit;
  }
 }

 public function index() {

        $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
        
          );
       $u= new Usuarios();
      $data['usuarios']=$u->usuarioLogado();
       

              if(isset($_POST['nome'])&& !empty($_POST['nome'])){
          $nome= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'nome', FILTER_DEFAULT))));
          $usuario=trim(utf8_decode(addslashes(filter_input(INPUT_POST,'usuario', FILTER_DEFAULT))));
          if(!empty($_POST['senha'])){
          $senha= trim(md5(addslashes(filter_input(INPUT_POST,'senha', FILTER_DEFAULT))));//se trocar a senha 
          } else {
             $senha= trim(addslashes(filter_input(INPUT_POST,'nosenha', FILTER_DEFAULT))); //se não trocar a senha
          }
          $token= ($_POST['token']);
         if (empty($_FILES['foto']['tmp_name'])) {
            $url=$_POST['nofoto'];
            } else {
               $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
            if (in_array($_FILES['foto']['type'], $permitidos)) {
               $url = md5(time() . rand(0, 999)) . '.jpg';
               move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/usuario/' . $url);
            }
            if(!empty($_FILES['foto'])){
              $caminho=$_POST['nofoto'];
              if($caminho!='fotopadrao.jpg'){
              unlink("assets/img/usuario/".$caminho);
              }
            }
         }
          
          $u->editarUsuario($nome, $usuario,$senha, $token,$url);
           header("Location: " . BASE_URL . "configurarUsuario");
            exit;
       }
       
       
       

        //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
        $this->loadTemplateInAdmin('administracao/configurarUsuario', $data);
    }


   
    
    
}