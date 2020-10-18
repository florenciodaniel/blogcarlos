<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class homeAdminController extends Controller {
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
       
        if(isset($_POST['site_titulo']) && !empty($_POST['site_titulo'])){
         $site_titulo= utf8_decode(addslashes($_POST['site_titulo']));
         $site_rodape= utf8_decode(addslashes($_POST['site_rodape']));
         $css= utf8_decode(addslashes($_POST['css']));
         
         $h=new Home();
         $h->setPropriedade($site_titulo, 'site_titulo');
         $h->setPropriedade($site_rodape, 'site_rodape');
         $h->setPropriedade($css, 'css');
         
         header("Location: ".BASE_URL."homeAdmin");
         exit;
        }


        $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
        
          );

  

        //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
        $this->loadTemplateInAdmin('administracao/homeAdmin', $data);
    }

 
}