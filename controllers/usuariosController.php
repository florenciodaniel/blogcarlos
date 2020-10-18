<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class usuariosController extends Controller {

    private $user;

    public function __construct() {
        parent::__construct();

        $this->user = new Usuarios();
        if (!$this->user->checarLogin()) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    public function index() {

        $data = array(); //variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      
        $u = new Usuarios();
        $data['usuarios'] = $u->usuarioLogado();
       
        



        //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
        $this->loadTemplateInAdmin('administracao/usuarios', $data);
    }
   
    
       public function adicionarUsuario() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();

      if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
         $usuario = trim(utf8_decode(addslashes(filter_input(INPUT_POST,'usuario',FILTER_DEFAULT))));
         $senha = trim(utf8_decode(addslashes(filter_input(INPUT_POST,'senha',FILTER_DEFAULT))));
         $date_cadastro=trim(utf8_decode(addslashes(filter_input(INPUT_POST,'date_cadastro', FILTER_DEFAULT))));
         $nivel_total= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'nivel_total',FILTER_DEFAULT))));
         $nivel_admin= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'nivel_admin',FILTER_DEFAULT))));
         $nivel_cms= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'nivel_cms',FILTER_DEFAULT))));
         $nivel_usuario= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'nivel_usuario',FILTER_DEFAULT))));
         $nivel_estoque= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'nivel_estoque',FILTER_DEFAULT))));
         $nivel_financeiro= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'nivel_financeiro',FILTER_DEFAULT))));
         $nivel_venda= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'nivel_venda',FILTER_DEFAULT))));
         $url="fotopadrao.jpg";
         
         

         $u->adicionarUsuario($usuario, $senha, $date_cadastro, $nivel_total,$nivel_admin,$nivel_cms,$nivel_estoque,$nivel_financeiro,$nivel_usuario,$nivel_venda,$url);
      }


      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('usuarios/adicionarUsuario', $data);
   }

      public function deletarUsuario() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();
      $data['todosUsuarios'] = $u->verUsuarios();
           $verificarCodigo='';
            if (isset($_POST['id']) && !empty($_POST['id'])) {
    $verificarCodigo=$_POST['id'];
$u->verificandoCodigo($verificarCodigo);

      }
      
      if(isset($_POST['excluircodigo']) && !empty($_POST['excluircodigo'])){
         $codigo=$_POST['excluircodigo'];


         $u->deletarUsuario($codigo);
         header("Location: " . BASE_URL . "usuarios/deletarUsuario");
            exit;
      }

$data['verificado'] = $u->verificandoCodigo($verificarCodigo);



      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('usuarios/deletarUsuario', $data);
   }
    
       
    
        public function usuariosCadastrados() {

        $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
        );
        $u = new Usuarios();
        $data['usuarios'] = $u->usuarioLogado();
        $data['todosUsuarios'] = $u->verUsuarios();

        //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
        $this->loadTemplateInAdmin('usuarios/usuariosCadastrados', $data);
    }

}
