<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class adminController extends Controller {
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


        //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
        $this->loadTemplateInAdmin('administracao/admin', $data);
    }
    
   

      public function adicionarCliente() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();

      $c = new Clientes();
      $jaExiste = '';
      if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {
         $jaExiste = trim(addslashes(filter_input(INPUT_POST, 'cpf', FILTER_VALIDATE_INT)));
      }
      $foiCadastrado = $c->verificarCodigo($jaExiste);
      if (in_array($jaExiste, $foiCadastrado)) {
         $data['foiCadastrado'] = $c->verificarCodigo($jaExiste);
      } else {



         if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {
            $cpf = trim(addslashes(filter_input(INPUT_POST, 'cpf', FILTER_VALIDATE_INT)));
            $nome = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'nome',FILTER_DEFAULT)))));
            $endereco = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'endereco',FILTER_DEFAULT)))));
            $telefone = trim(addslashes(filter_input(INPUT_POST, 'telefone', FILTER_VALIDATE_INT)));
            $email = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)))));
            $observacao = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'observacao',FILTER_DEFAULT)))));

            if (empty($_FILES['imagem']['tmp_name'])) {
               $url = $_POST['nofoto'];
            } else {

               $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
               if (in_array($_FILES['imagem']['type'], $permitidos)) {
                  $url = md5(time() . rand(0, 999)) . '.jpg';
                  move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/img/clientes/' . $url);
               }
            }
            $credito_valor= trim(addslashes(filter_input(INPUT_POST, 'credito_valor', FILTER_DEFAULT)));
            $c->adicionarCliente($cpf, $nome, $endereco, $telefone, $email, $observacao, $url,$credito_valor);
         }
      }
      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/adicionarCliente', $data);
   }
   
   public function adicionarFornecedor() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();

      $f = new Fornecedores();

      $jaExiste = '';
      if (isset($_POST['cnpj']) && !empty($_POST['cnpj'])) {
         $jaExiste = trim(addslashes(filter_input(INPUT_POST, 'cnpj', FILTER_VALIDATE_INT)));
      }
      $foiCadastrado = $f->verificarCodigo($jaExiste);
      if (in_array($jaExiste, $foiCadastrado)) {
         $data['foiCadastrado'] = $f->verificarCodigo($jaExiste);
      } else {

         if (isset($_POST['cnpj']) && !empty($_POST['cnpj'])) {
            $cnpj = trim(addslashes(filter_input(INPUT_POST, 'cnpj', FILTER_VALIDATE_INT)));
            $nome_juridico = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'nome_juridico',FILTER_DEFAULT)))));
            $nome_fantasia = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'nome_fantasia',FILTER_DEFAULT)))));
            $telefone_um = trim(addslashes(filter_input(INPUT_POST, 'telefone_um', FILTER_VALIDATE_INT)));
            $telefone_dois = trim(addslashes(filter_input(INPUT_POST, 'telefone_dois', FILTER_VALIDATE_INT)));
            $endereco = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'endereco',FILTER_DEFAULT)))));
            $email = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)))));
            $representante = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'representante',FILTER_DEFAULT)))));
            $produtos = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'produtos',FILTER_DEFAULT)))));
            $observacao = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST, 'observacao',FILTER_DEFAULT)))));

            $f->adicionarFornecedor($cnpj, $nome_juridico, $nome_fantasia, $telefone_um, $telefone_dois, $endereco, $email, $representante, $produtos, $observacao);
         }
      }


      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/adicionarFornecedor', $data);
   }
   
   public function adicionarServico() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $s = new Servicos();
     $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();
            $jaExiste = '';
      if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
         $jaExiste = trim(addslashes(filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT)));
      }
      $foiCadastrado = $s->verificarCodigo($jaExiste);
      if (in_array($jaExiste, $foiCadastrado)) {
         $data['foiCadastrado'] = $s->verificarCodigo($jaExiste);
      } else {
      
      if(isset($_POST['tipo']) && !empty($_POST['tipo'])){
         $tipo= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'tipo', FILTER_DEFAULT))));
         $codigo= trim(addslashes(filter_input(INPUT_POST,'codigo', FILTER_VALIDATE_INT)));
         $preco= trim(addslashes(str_replace(',','.', str_replace('.','', filter_input(INPUT_POST,'preco')))));
         $descricao= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'descricao', FILTER_DEFAULT))));
         
          if (empty($_FILES['imagem']['tmp_name'])) {
            $url=$_POST['noimagem'];
            } else {
               $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
            if (in_array($_FILES['imagem']['type'], $permitidos)) {
               $url = md5(time() . rand(0, 999)) . '.jpg';
               move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/img/servicos/' . $url);
            }

         }
         $s->adicionarServico($tipo, $codigo, $preco, $descricao, $url);
      }
      }

      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/adicionarServico', $data);
   }
   
   public function deletarCliente() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();
      $c = new Clientes();
      $busca = '';
      if (!empty($_POST['busca'])) {
         $busca = trim(utf8_decode(addslashes(filter_input(INPUT_POST,'busca',FILTER_DEFAULT))));
      }
      $data['buscados'] = $c->pesquisarCliente($busca);
      $data['clientes'] = $c->visualizarCliente();
      
       $verificarCodigo='';
            if (isset($_POST['id']) && !empty($_POST['id'])) {
    $verificarCodigo= trim(addslashes(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT)));
$c->verificandoCodigo($verificarCodigo);

      }
      if (isset($_POST['excluircodigo']) && !empty($_POST['excluircodigo'])) {
         $delete = $_POST['excluircodigo'];
         $caminho = $_POST['caminho'];
         unlink("assets/img/clientes/".$caminho);
         $c->deletarCliente($delete);
         header("Location: " . BASE_URL . "admin/deletarCliente");
         exit;
      }

$data['verificado'] = $c->verificandoCodigo($verificarCodigo);

      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/deletarCliente', $data);
   }
   
   public function deletarFornecedor() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();
      $f = new Fornecedores();
      $busca = '';
      if (!empty($_POST['busca'])) {
         $busca = trim(utf8_decode(addslashes(filter_input(INPUT_POST,'busca'))));
      }
      $data['buscados'] = $f->pesquisarFornecedor($busca);
      
      $data['fornecedores'] = $f->visualizarFornecedor();
             $verificarCodigo='';
            if (isset($_POST['cnpj']) && !empty($_POST['cnpj'])) {
    $verificarCodigo=$_POST['cnpj'];
$f->verificandoCodigo($verificarCodigo);

      }
      
      if(isset($_POST['excluircodigo']) && !empty($_POST['excluircodigo'])){
         $cnpj=$_POST['excluircodigo'];
                  
         
         $f->deletarFornecedor($cnpj);
         header("Location: " . BASE_URL . "admin/deletarFornecedor");
            exit;
      }


$data['verificado'] = $f->verificandoCodigo($verificarCodigo);

      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/deletarFornecedor', $data);
   }
   
   public function editarCliente() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();
      $c = new Clientes();
      $busca = '';
      if (!empty($_POST['busca'])) {
         $busca = trim(utf8_decode(addslashes(filter_input(INPUT_POST,'busca'))));
      }
      $data['buscados'] = $c->pesquisarCliente($busca);
      
      
      
      if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {
         $cpf = trim(addslashes(filter_input(INPUT_POST,'cpf',FILTER_VALIDATE_INT)));
         $nome = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'nome')))));
         $endereco = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'endereco')))));
         $telefone = trim(addslashes(filter_input(INPUT_POST,'telefone',FILTER_VALIDATE_INT)));
         $email = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)))));
         $observacao = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'observacao')))));
         $id= addslashes($_POST['id']);
         
                  if (empty($_FILES['imagem']['tmp_name'])) {
            $url=$_POST['noimagem'];
            } else {
               $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
            if (in_array($_FILES['imagem']['type'], $permitidos)) {
               $url = md5(time() . rand(0, 999)) . '.jpg';
               move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/img/clientes/' . $url);
            }
            if(!empty($_FILES['imagem'])){
              $caminho=$_POST['noimagem'];
              if($caminho!='fotopadrao.jpg'){
              unlink("assets/img/clientes/".$caminho);
            }
            }
         }
$credito_valor= trim(addslashes(filter_input(INPUT_POST, 'credito_valor', FILTER_DEFAULT)));
         $c->editarCliente($cpf, $nome, $endereco, $telefone,$email,$observacao, $url,$credito_valor, $id);
         header("Location: " . BASE_URL . "admin/editarCliente");
            exit;
         
      }




      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/editarCliente', $data);
   }
   
   public function editarFornecedor() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();
      $f = new Fornecedores();
      $busca = '';
      if (!empty($_POST['busca'])) {
         $busca = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'busca'))));
      }
      $data['buscados'] = $f->pesquisarFornecedor($busca);



      if (isset($_POST['cnpj']) && !empty($_POST['cnpj'])) {
         $cnpj = trim(addslashes(filter_input(INPUT_POST,'cnpj',FILTER_VALIDATE_INT)));
         $nome_juridico = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'nome_juridico')))));
         $nome_fantasia = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'nome_fantasia')))));
         $telefone_um = trim(addslashes(filter_input(INPUT_POST,'telefone_um',FILTER_VALIDATE_INT)));
         $telefone_dois = trim(addslashes(filter_input(INPUT_POST,'telefone_dois',FILTER_VALIDATE_INT)));
         $endereco = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'endereco')))));
         $email = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)))));
         $representante = trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'representante')))));
         $produtos= trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'produtos')))));
         $observacao =trim(strip_tags(utf8_decode(addslashes(filter_input(INPUT_POST,'observacao')))));
         $id=$_POST['id'];

        

         $f->editarFornecedor($cnpj, $nome_juridico, $nome_fantasia, $telefone_um, $telefone_dois,$endereco,$email,$representante,$produtos,$observacao,$id);
         header("Location: " . BASE_URL . "admin/editarFornecedor");
         exit;
      }




      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/editarFornecedor', $data);
   }

   public function deletarServico() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();
      $s = new Servicos();
      $busca = '';
      if (!empty($_POST['busca'])) {
         $busca = trim(utf8_decode(addslashes(filter_input(INPUT_POST,'busca'))));
      }
      $data['buscados'] = $s->pesquisarServicos($busca);
      
      $data['servicos'] = $s->visualizarServicos();
      
             $verificarCodigo='';
            if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
    $verificarCodigo=$_POST['codigo'];
$s->verificandoCodigo($verificarCodigo);

      }
      
      if(isset($_POST['excluircodigo']) && !empty($_POST['excluircodigo'])){
         $codigo=$_POST['excluircodigo'];
         
         $s->deletarServico($codigo);
         header("Location: " . BASE_URL . "deletarServico");
            exit;
      }

$data['verificado'] = $s->verificandoCodigo($verificarCodigo);


      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/deletarServico', $data);
   }
   
   public function editarServico() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();
      $s = new Servicos();
      $busca = '';
      if (!empty($_POST['busca'])) {
         $busca = trim(utf8_decode(addslashes(filter_input(INPUT_POST,'busca'))));
      }
      $data['buscados'] = $s->pesquisarServicos($busca);
      
      
      
      if(isset($_POST['tipo']) && !empty($_POST['tipo'])){
         $codigo= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'codigo'))));
         $tipo= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'tipo'))));
         $preco= trim(addslashes(str_replace(',','.', str_replace('.','', filter_input(INPUT_POST,'preco')))));
         $descricao= trim(utf8_decode(addslashes(filter_input(INPUT_POST,'descricao'))));
         $id= addslashes($_POST['id']);
         
                  if (empty($_FILES['imagem']['tmp_name'])) {
            $url=$_POST['noimagem'];
            } else {
               $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
            if (in_array($_FILES['imagem']['type'], $permitidos)) {
               $url = md5(time() . rand(0, 999)) . '.jpg';
               move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/img/servicos/' . $url);
            }
            if(!empty($_FILES['imagem'])){
              $caminho=$_POST['noimagem'];
              unlink("assets/img/servicos/".$caminho);
            }
         }

         $s->editarServico($codigo, $tipo, $preco, $descricao, $url, $id);
         header("Location: " . BASE_URL . "admin/editarServico");
            exit;
         
      }




      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/editarServico', $data);
   }
   
   public function pesquisarCliente() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();

      $c = new Clientes();
      $busca = '';
      if (!empty(filter_input(INPUT_POST,'busca'))) {
         $busca = trim(utf8_decode(addslashes(filter_input(INPUT_POST,'busca'))));
      }
      
      $data['buscados'] = $c->pesquisarCliente($busca);

      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/pesquisarCliente', $data);
   }
   
   public function pesquisarServico() {

      $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
      );
      $u = new Usuarios();
      $data['usuarios'] = $u->usuarioLogado();

      $s = new Servicos();
      $busca = '';
      if (!empty($_POST['busca'])) {
         $busca = trim(utf8_decode(addslashes(filter_input(INPUT_POST,'busca'))));
      }
      
      $data['buscados'] = $s->pesquisarServicos($busca);

      //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
      $this->loadTemplateInAdmin('admin/pesquisarServico', $data);
   }
   
   
   
   
   
   
   
   

        public function logout(){
     unset($_SESSION['token']);
     header("Location: ".BASE_URL."login");
     exit;
    }

    
    
}