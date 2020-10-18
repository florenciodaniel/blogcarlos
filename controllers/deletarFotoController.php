<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class deletarFotoController extends Controller {

   private $user;

   public function __construct() {
      parent::__construct();

      $this->user = new Usuarios();
      if (!$this->user->checarLogin()) {
         header("Location: " . BASE_URL . "login");
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

      $data = array(); //variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
                    $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();
      $g = new Galeria();
      $data['fotos'] = $g->getGaleria();

      if (isset($_POST['id']) && !empty($_POST['id'])) {
         $delete = $_POST['id'];
         $url=$_POST['url'];
         unlink("assets/img/galeria/".$url);
         $g->deleteFoto($delete);
         header("Location: " . BASE_URL . "deletarFoto");
         exit;
      }



      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('administracao/deletarFoto', $data);
   }

}
