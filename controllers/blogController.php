<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class blogController extends Controller {

  public function index() {

    $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    );
    $ps = new Post();
    $data['ultimoPost'] = $ps->verUltimoPosts();

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
    
    
//    $item = $data['todosPosts']['id'];
//    $data['imgspost'] = $ps->pegarImgsPost($item);

    


    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplate('blog', $data);
  }


}
