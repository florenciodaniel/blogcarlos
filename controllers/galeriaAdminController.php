<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class galeriaAdminController extends Controller {

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
      $g = new Galeria();
      $data['fotos'] = $g->getGaleria();
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();



      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('administracao/galeriaAdmin', $data);
   }
}