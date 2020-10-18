<?php

class homeController extends Controller {

  public function index() {

    $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
        'depoimentos' => array()
    );

    $ps = new Post();
    $data['ultimoPost'] = $ps->verUltimoPosts();
//    $data['todosPosts'] = $ps->verTodosUltimoPosts();

    $ultimoIdPost = $data['ultimoPost']['hashtag'];
    $data['ultimoPostImg'] = $ps->pegarImgUltimoPost($ultimoIdPost);
    
    

    $pagAtual = 1;
    $paginicio = 0;
    $paglimite = 4;

    if (!empty($_GET['p'])) {
      $pagAtual = $_GET['p'];
    }
    $paginicio = ($pagAtual * $paglimite) - $paglimite;

    $data['todosPosts'] = $ps->verTodosPosts($paginicio, $paglimite);
    $data['totalPosts'] = $ps->verTotalPosts();
    $data['numeroDePaginas'] = ceil($data['totalPosts'] / $paglimite);
    $data['pagAtual'] = $pagAtual;
    $data['todosUltimosPosts'] = $ps->verTodosUltimoPosts();
    $data['postAleatorio'] = $ps->verPostsAleatorios();
    
    
    
    
    

    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplate('home', $data);
  }
    public function humor() {

    $data = array();

    $ps = new Post();

    $pagAtual = 1;
    $paginicio = 0;
    $paglimite = 4;

    if (!empty($_GET['p'])) {
      $pagAtual = $_GET['p'];
    }
    $paginicio = ($pagAtual * $paglimite) - $paglimite;

    $data['todosPostsHumor'] = $ps->verTodosPostsHumor($paginicio, $paglimite);
    $data['totalPostsHumor'] = $ps->verTotalPostsHumor();
    $data['numeroDePaginas'] = ceil($data['totalPostsHumor'] / $paglimite);
    $data['pagAtual'] = $pagAtual;

    $data['postAleatorio'] = $ps->verPostsAleatorios();
    
    $this->loadTemplate('humor', $data);
  }

      public function curiosidade() {
        
    $data = array();

    $ps = new Post();

    $pagAtual = 1;
    $paginicio = 0;
    $paglimite = 4;

    if (!empty($_GET['p'])) {
      $pagAtual = $_GET['p'];
    }
    $paginicio = ($pagAtual * $paglimite) - $paglimite;

    $data['todosPostsCuriosidade'] = $ps->verTodosPostsCuriosidade($paginicio, $paglimite);
    $data['totalPostsCuriosidade'] = $ps->verTotalPostsCuriosidade();
    $data['numeroDePaginas'] = ceil($data['totalPostsCuriosidade'] / $paglimite);
    $data['pagAtual'] = $pagAtual;

    $data['postAleatorio'] = $ps->verPostsAleatorios();
    
    $this->loadTemplate('curiosidade', $data);
  }
  
        public function carro() {
        
    $data = array();

    $ps = new Post();

    $pagAtual = 1;
    $paginicio = 0;
    $paglimite = 4;

    if (!empty($_GET['p'])) {
      $pagAtual = $_GET['p'];
    }
    $paginicio = ($pagAtual * $paglimite) - $paglimite;

    $data['todosPostsCarro'] = $ps->verTodosPostsCarro($paginicio, $paglimite);
    $data['totalPostsCarro'] = $ps->verTotalPostsCarro();
    $data['numeroDePaginas'] = ceil($data['totalPostsCarro'] / $paglimite);
    $data['pagAtual'] = $pagAtual;

    $data['postAleatorio'] = $ps->verPostsAleatorios();
    
    $this->loadTemplate('carro', $data);
  }
  
    
        public function adulto() {
        
    $data = array();

    $ps = new Post();

    $pagAtual = 1;
    $paginicio = 0;
    $paglimite = 4;

    if (!empty($_GET['p'])) {
      $pagAtual = $_GET['p'];
    }
    $paginicio = ($pagAtual * $paglimite) - $paglimite;

    $data['todosPostsAdulto'] = $ps->verTodosPostsAdulto($paginicio, $paglimite);
    $data['totalPostsAdulto'] = $ps->verTotalPostsAdulto();
    $data['numeroDePaginas'] = ceil($data['totalPostsAdulto'] / $paglimite);
    $data['pagAtual'] = $pagAtual;

    $data['postAleatorio'] = $ps->verPostsAleatorios();
    
    $this->loadTemplate('adulto', $data);
  }
}
