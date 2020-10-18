<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class postagemController extends Controller {

  public function index() {

    $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    );
    $ps = new Post();
    $data['ultimoPost'] = $ps->verUltimoPosts();

 

    $data['todosPosts'] = $ps->verTodosPosts();

    
    $data['todosUltimosPosts'] = $ps->verTodosUltimoPosts();
    $data['postAleatorio'] = $ps->verPostsAleatorios();
    if (!empty($_GET['p'])) {
      $id = $_GET['p'];
    }
    $data['essePost'] = $ps->essePost($id);




    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplate('postagem', $data);
  }


}
