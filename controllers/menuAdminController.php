<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class menuAdminController extends Controller {
 private $user;
 public function __construct() {
  parent::__construct();
  
  $this->user=new Usuarios();
  if(!$this->user->checarLogin()){
   header("Location: ".BASE_URL."login");
   exit;
  }
          //se o usuario for do tipo cliente ao acessar envia pra cliente
        $u = new Usuarios();
        $tipoChecado = $u->checarTipo();
        if ($tipoChecado['tipo'] === "c") {
            header("Location: " . BASE_URL . "cliente");
            exit;
        }
 }
  public function index() {

        $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
        
          );
        $m=new Menu();
        $data['menus']=$m->getMenu();

        //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
        $this->loadTemplateInAdmin('administracao/menuAdmin', $data);
    }
   public function deletarMenu($id){
     $m= new Menu();
     $m->delete($id);
     header("Location: ".BASE_URL."menuAdmin");
    }
    

    public function editarMenu($id){
     $data=array();
     $m = new Menu();
     if(isset($_POST['nome']) && !empty($_POST['nome'])){
      $nome= addslashes($_POST['nome']);
      $url= addslashes($_POST['url']);
      
      $m->update($nome, $url, $id);
      header("Location: ".BASE_URL."menuAdmin");
      exit;
     }
     
     $data['menu']=$m->getMenu($id);
     $this->loadTemplateInAdmin('administracao/editarMenu', $data);
    }
    public function adicionarmenuAdmin(){
     $data=array();
     $m = new Menu();
     if(isset($_POST['nome']) && !empty($_POST['nome'])){
      $nome= addslashes($_POST['nome']);
      $url= addslashes($_POST['url']);
      
      $m->insert($nome, $url);
      header("Location: ".BASE_URL."menuAdmin");
      exit;
     }
     
     
     $this->loadTemplateInAdmin('administracao/adicionarmenuAdmin', $data);
    }
 
}