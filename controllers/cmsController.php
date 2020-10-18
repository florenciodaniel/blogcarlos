<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class cmsController extends Controller {

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
    $g = new Galeria();
    $data['fotos'] = $g->getGaleria();
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();
    $ps = new Post();
    $data['postagens'] = $ps->verTodosPosts();




    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('administracao/cms', $data);
  }

  public function adicionarPostagem() {

    $data = array(); //variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    $ps = new Post();
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();
    $data['ultimoPost'] = $ps->verUltimoPosts();
//      adicionando novo post

    if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
      $titulo = $_POST['titulo'];
      $texto = $_POST['texto'];
      $autor = $_POST['autor'];
      $date = $_POST['date'];
      $categoria = $_POST['categoria'];
      $ultimoId = $_POST['ultimoId'];
      $id = $ultimoId + 1;
      $hashtag= time() . rand(0, 999);

      if (isset($_FILES['url_img']) && !empty($_FILES['url_img']['tmp_name'])) {
        //$permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (count($_FILES['url_img']['tmp_name']) > 0) {

          //if (in_array($_FILES['url_img']['type'], $permitidos)) {
          for ($q = 0; $q < count($_FILES['url_img']['tmp_name']); $q++) {
            $nomeDoArquivo = md5($_FILES['url_img']['name'][$q] . time() . rand(0, 999)) . '.jpg';
            move_uploaded_file($_FILES['url_img']['tmp_name'][$q], 'assets/img/post/' . $nomeDoArquivo);
            $imagens[$q] = $nomeDoArquivo;
          }
        }
      }

      $ps->adicionarPostImg($titulo, $texto, $autor, $date, $hashtag,$categoria, $imagens, $id);

      header("Location: " . BASE_URL . "cms/adicionarPostagem");
      exit;
    }



    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/adicionarPostagem', $data);
  }

  public function adicionarFoto() {

    $data = array(); //variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    $ps = new Post();
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();

    $fotos = new Galeria();

    if (isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) {
      $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
      if (in_array($_FILES['foto']['type'], $permitidos)) {
        $url = md5(time() . rand(0, 999)) . '.jpg';
        move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/galeria/' . $url);

        $titulo = '';
        if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
          $titulo = addslashes($_POST['titulo']);
        }
      }
      $fotos->salvarFoto($titulo, $url);
    }


    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/adicionarFoto', $data);
  }

  public function deletarFoto() {

    $data = array(); //variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();
    $g = new Galeria();
    $data['fotos'] = $g->getGaleria();

    if (isset($_POST['id']) && !empty($_POST['id'])) {
      $delete = $_POST['id'];
      $url = $_POST['url'];
      unlink("assets/img/galeria/" . $url);
      $g->deleteFoto($delete);
      header("Location: " . BASE_URL . "cms/deletarFoto");
      exit;
    }



    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/deletarFoto', $data);
  }

  public function deletarPostagem() {

    $data = array(); //variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();
    $ps = new Post();
    $data['postsDelete'] = $ps->verTodosPostsPraDeletar();

    if (isset($_POST['hashtag']) && !empty($_POST['hashtag'])) {
      $delete = $_POST['hashtag'];
      $img = $_POST['img'];
      foreach ($img as $key => $value) {
        unlink("assets/img/post/" . $value);
      }
      $ps->deletePost($delete);
      header("Location: " . BASE_URL . "cms/deletarPostagem");
      exit;
    }



    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/deletarPostagem', $data);
  }

  public function editarPostagem() {

    $data = array(); //variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();
    $ps = new Post();
    $data['posts'] = $ps->verTodosPosts();
    $busca = '';
    if (!empty($_POST['busca'])) {
      $busca = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'busca'))));
    }
    $data['buscados'] = $ps->pesquisarPost($busca);

    if (isset($_POST['hashtag']) && !empty($_POST['hashtag'])) {
      $hashtag = $_POST['hashtag'];
      $titulo = $_POST['titulo'];
      $texto = $_POST['texto'];


      if (isset($_FILES['url_img']) && !empty($_FILES['url_img']['tmp_name'])) {
        //$permitidos = array('image/jpg', 'image/jpeg', 'image/png');

        if (count($_FILES['url_img']['tmp_name']) > 0) {

          //if (in_array($_FILES['url_img']['type'], $permitidos)) {
          for ($q = 0; $q < count($_FILES['url_img']['tmp_name']); $q++) {
            $nomeDoArquivo = md5($_FILES['url_img']['name'][$q] . time() . rand(0, 999)) . '.jpg';
            move_uploaded_file($_FILES['url_img']['tmp_name'][$q], 'assets/img/post/' . $nomeDoArquivo);
            $imagens[$q] = $nomeDoArquivo;
          }
        }
      }
      if ($_FILES['url_img']['tmp_name'] == ['']) {
        $temImgPraTrocar = "nao";
      } else {
        $temImgPraTrocar = "sim";
      }
      if ($temImgPraTrocar === "sim") {
        $img = $_POST['img'];
        foreach ($img as $key => $value) {
          unlink("assets/img/post/" . $value);
        }
      }



      $ps->editarPost($hashtag, $titulo, $texto, $temImgPraTrocar, $imagens);
      header("Location: " . BASE_URL . "cms/editarPostagem");
      exit;
    }



    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/editarPostagem', $data);
  }

  public function adicionarPagina() {

    $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    );
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();

    $p = new Paginas();
    if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
      $home = utf8_decode(addslashes(str_replace(" ", "", $_POST['titulo'])));
      $url = utf8_decode(addslashes(str_replace(" ", "", $_POST['titulo'])));
      $nomedoarquivo = "views/" . $home . ".php";
      $conteudo = "<div class=\"pagConteudo\">\n <?php \$essaPagina=\"$url\";?>\n <div class=\"pagFoto\"> \n <div  class=\"pagFoto1\"> \n             <img  src=\"assets/img/pagina/<?php echo \$paginacao['img1']; ?>\" <?php echo (!empty(\$paginacao['img1'])) ? 'class=\"picpg\"' : 'class=\"naoMostrar\"'; ?> alt=\"<?php echo \$paginacao['alt1'];?>\"> \n      <img  src=\"assets/img/pagina/<?php echo \$paginacao['img1']; ?>\" <?php echo (!empty(\$paginacao['img1'])) ? 'class=\"picbigpg\"' : 'class=\"naoMostrar\"'; ?>>\n <img  src=\"assets/img/pagina/<?php echo \$paginacao['img3']; ?>\" <?php echo (!empty(\$paginacao['img3'])) ? 'class=\"picpg\"' : 'class=\"naoMostrar\"'; ?> alt=\"<?php echo \$paginacao['alt3'];?>\"> \n      <img  src=\"assets/img/pagina/<?php echo \$paginacao['img3']; ?>\" <?php echo (!empty(\$paginacao['img3'])) ? 'class=\"picbigpg\"' : 'class=\"naoMostrar\"'; ?>> \n <img  src=\"assets/img/pagina/<?php echo \$paginacao['img5']; ?>\" <?php echo (!empty(\$paginacao['img5'])) ? 'class=\"picpg\"' : 'class=\"naoMostrar\"'; ?> alt=\"<?php echo \$paginacao['alt5'];?>\"> \n      <img  src=\"assets/img/pagina/<?php echo \$paginacao['img5']; ?>\" <?php echo (!empty(\$paginacao['img5'])) ? 'class=\"picbigpg\"' : 'class=\"naoMostrar\"'; ?>>        </div> \n <div  class=\"pagFoto2\"> \n             <img  src=\"assets/img/pagina/<?php echo \$paginacao['img2']; ?>\" <?php echo (!empty(\$paginacao['img2'])) ? 'class=\"picpg\"' : 'class=\"naoMostrar\"'; ?> alt=\"<?php echo \$paginacao['alt2'];?>\"> \n      <img  src=\"assets/img/pagina/<?php echo \$paginacao['img2']; ?>\" <?php echo (!empty(\$paginacao['img2'])) ? 'class=\"picbigpg\"' : 'class=\"naoMostrar\"'; ?>>\n <img  src=\"assets/img/pagina/<?php echo \$paginacao['img4']; ?>\" <?php echo (!empty(\$paginacao['img4'])) ? 'class=\"picpg\"' : 'class=\"naoMostrar\"'; ?> alt=\"<?php echo \$paginacao['alt4'];?>\"> \n      <img  src=\"assets/img/pagina/<?php echo \$paginacao['img4']; ?>\" <?php echo (!empty(\$paginacao['img4'])) ? 'class=\"picbigpg\"' : 'class=\"naoMostrar\"'; ?>> \n <img  src=\"assets/img/pagina/<?php echo \$paginacao['img6']; ?>\" <?php echo (!empty(\$paginacao['img6'])) ? 'class=\"picpg\"' : 'class=\"naoMostrar\"'; ?> alt=\"<?php echo \$paginacao['alt6'];?>\"> \n      <img  src=\"assets/img/pagina/<?php echo \$paginacao['img6']; ?>\" <?php echo (!empty(\$paginacao['img6'])) ? 'class=\"picbigpg\"' : 'class=\"naoMostrar\"'; ?>>        </div> \n</div>\n <div class=\"pagCorpo\">\n <?php \n echo \$paginacao['corpo'];\n ?>\n </div>\n</div>";
      file_put_contents($nomedoarquivo, $conteudo);
    }
    if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
      $home = str_replace(" ", "", $_POST['titulo']);
      $url = str_replace(" ", "", $_POST['titulo']);
      $nomedoarquivoController = "controllers/" . $home . "Controller" . ".php";
      $conteudoController = "<?php\n class " . $home . "Controller" . " " . "extends Controller { \n public function index(){\n \$data = array();\n \$p=new Paginas();\n \$essaPagina=\"$url\"; \n \$url=\$essaPagina; \n \$p->getPaginasByUrl(\$url); \n \$data['paginacao']=\$p->getPaginasByUrl(\$url);\n \$this->loadTemplate('$home', \$data);\n } \n}";
      file_put_contents($nomedoarquivoController, $conteudoController);
    }


    if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
      $titulo = utf8_decode(addslashes($_POST['titulo']));
//         $url = addslashes($_POST['url']);
      $url = utf8_decode(addslashes(str_replace(" ", "", $_POST['titulo'])));
      $corpo = utf8_decode(addslashes($_POST['corpo']));
      if (isset($_FILES['img1']) && !empty($_FILES['img1']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img1']['type'], $permitidos)) {
          $img1 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img1']['tmp_name'], 'assets/img/pagina/' . $img1);
        }
      } else {
        $img1 = '';
      }
      if (isset($_FILES['img2']) && !empty($_FILES['img2']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img2']['type'], $permitidos)) {
          $img2 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img2']['tmp_name'], 'assets/img/pagina/' . $img2);
        }
      } else {
        $img2 = '';
      }
      if (isset($_FILES['img3']) && !empty($_FILES['img3']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img3']['type'], $permitidos)) {
          $img3 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img3']['tmp_name'], 'assets/img/pagina/' . $img3);
        }
      } else {
        $img3 = '';
      }
      if (isset($_FILES['img4']) && !empty($_FILES['img4']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img4']['type'], $permitidos)) {
          $img4 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img4']['tmp_name'], 'assets/img/pagina/' . $img4);
        }
      } else {
        $img4 = '';
      }
      if (isset($_FILES['img5']) && !empty($_FILES['img5']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img4']['type'], $permitidos)) {
          $img5 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img5']['tmp_name'], 'assets/img/pagina/' . $img5);
        }
      } else {
        $img5 = '';
      }
      if (isset($_FILES['img6']) && !empty($_FILES['img6']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img6']['type'], $permitidos)) {
          $img6 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img6']['tmp_name'], 'assets/img/pagina/' . $img6);
        }
      } else {
        $img6 = '';
      }
      $alt1 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt1'))));
      $alt2 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt2'))));
      $alt3 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt3'))));
      $alt4 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt4'))));
      $alt5 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt5'))));
      $alt6 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt6'))));



      $p->insert($titulo, $url, $corpo, $img1, $img2, $img3, $img4, $img5, $img6, $alt1, $alt2, $alt3, $alt4, $alt5, $alt6);

      //para adicionar o menu automaticamente
      if (isset($_POST['addmenu']) && !empty($_POST['addmenu'])) {
        $m = new Menu();
        $m->insert($titulo, $url);
      }

      header("Location: " . BASE_URL . "cms/adicionarPagina");
      exit;
    }



    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/adicionarPagina', $data);
  }

  public function deletarPagina() {

    $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    );
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();
    $m = new Menu();
    $data['menus'] = $m->getMenu();
    $p = new Paginas();
    $data['paginas'] = $p->getPaginas();
    if (isset($_POST['id']) && !empty($_POST['id'])) {
      $id = $_POST['id'];
      $url = $_POST['url'];
      $p->delete($id);
      $m->delete($url); //estamos pegando a url do paginas pq aparentemenyte são iguais a do menu, já que são criadas juntas

      unlink("controllers/" . $url . "Controller.php");
      unlink("views/" . $url . ".php");

      if (!empty($_POST['img1'])) {
        $img1 = $_POST['img1'];
        unlink("assets/img/pagina/" . $img1);
      }
      if (!empty($_POST['img2'])) {
        $img2 = $_POST['img2'];
        unlink("assets/img/pagina/" . $img2);
      }
      if (!empty($_POST['img3'])) {
        $img3 = $_POST['img3'];
        unlink("assets/img/pagina/" . $img3);
      }
      if (!empty($_POST['img4'])) {
        $img4 = $_POST['img4'];
        unlink("assets/img/pagina/" . $img4);
      }
      if (!empty($_POST['img5'])) {
        $img5 = $_POST['img5'];
        unlink("assets/img/pagina/" . $img5);
      }
      if (!empty($_POST['img6'])) {
        $img6 = $_POST['img6'];
        unlink("assets/img/pagina/" . $img6);
      }

      header("Location: " . BASE_URL . "cms/deletarPagina");
      exit();
    }





    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/deletarPagina', $data);
  }

  public function adicionarDepoimento() {

    $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    );
    $d = new Depoimentos();
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();

    if (isset($_POST['autor']) && !empty($_POST['autor'])) {
      $autor = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'autor', FILTER_DEFAULT))));
      $depoimento = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'texto', FILTER_DEFAULT))));


      if (empty($_FILES['foto']['tmp_name'])) {
        $url = $_POST['nofoto'];
      } else {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['foto']['type'], $permitidos)) {
          $url = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/depoimentos/' . $url);
        }
      }

      $d->adicionarDepoimento($autor, $depoimento, $url);
      header("Location: " . BASE_URL . "cms/adicionarDepoimento");
      exit;
    }


    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/adicionarDepoimento', $data);
  }

  public function editarDepoimento() {

    $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    );
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();
    $d = new Depoimentos();
    $data['depoimentos'] = $d->getDepoimentosAdmin();
    $url = '';
    if (isset($_POST['autor']) && !empty($_POST['autor'])) {
      $autor = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'autor'))));
      $texto = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'texto'))));
      $id = $_POST['id'];

      if (empty($_FILES['foto']['tmp_name'])) {
        $url = $_POST['nofoto'];
      } else {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['foto']['type'], $permitidos)) {
          $url = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/depoimentos/' . $url);
        }
        if (!empty($_FILES['foto'])) {
          $caminho = $_POST['nofoto'];
          if ($caminho != 'fotopadrao.jpg') {
            unlink("assets/img/depoimentos/" . $caminho);
          }
        }
      }

      $d->editarDepoimento($autor, $texto, $url, $id);
      header("Location: " . BASE_URL . "cms/editarDepoimento");
      exit;
    }



    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/editarDepoimento', $data);
  }

  public function deletarDepoimento() {

    $data = array(//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
    );
    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();
    $d = new Depoimentos();
    $data['depoimentos'] = $d->getDepoimentosAdmin();
    $verificarId = '';
    if (isset($_POST['id']) && !empty($_POST['id'])) {
      $verificarId = $_POST['id'];
      $d->verificandoId($verificarId);
    }
    if (isset($_POST['excluirid']) && !empty($_POST['excluirid'])) {
      $delete = $_POST['excluirid'];
      $url = $_POST['url'];
      if ($url != 'fotopadrao.jpg') {
        unlink("assets/img/depoimentos/" . $url);
      }
      $d->deletardepoimento($delete);
      header("Location: " . BASE_URL . "cms/deletarDepoimento");
      exit;
    }
    $data['verificado'] = $d->verificandoId($verificarId);
    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/deletarDepoimento', $data);
  }

  public function trocarSlide() {

    $data = array(); //variavel responsavel por inserir dados dinamicos vindo do banco por exemplo

    $u = new Usuarios();
    $data['usuarios'] = $u->usuarioLogado();

    $sld = new Slide();
    $data['slides'] = $sld->verSlides();
    if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
      $alt1 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt1'))));
      $alt2 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt2'))));
      $alt3 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt3'))));
      $alt4 = trim(utf8_decode(addslashes(filter_input(INPUT_POST, 'alt4'))));
      if (isset($_FILES['img1']) && !empty($_FILES['img1']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img1']['type'], $permitidos)) {
          $img1 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img1']['tmp_name'], 'assets/img/slide/' . $img1);
        }
        if (!empty($_FILES['img1'])) {
          $caminho1 = $_POST['caminho1'];
          unlink("assets/img/slide/" . $caminho1);
        }
      }
      if (isset($_FILES['img2']) && !empty($_FILES['img2']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img2']['type'], $permitidos)) {
          $img2 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img2']['tmp_name'], 'assets/img/slide/' . $img2);
        }
        if (!empty($_FILES['img2'])) {
          $caminho2 = $_POST['caminho2'];
          unlink("assets/img/slide/" . $caminho2);
        }
      }

      if (isset($_FILES['img3']) && !empty($_FILES['img3']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img3']['type'], $permitidos)) {
          $img3 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img3']['tmp_name'], 'assets/img/slide/' . $img3);
        }
        if (!empty($_FILES['img1'])) {
          $caminho3 = $_POST['caminho3'];
          unlink("assets/img/slide/" . $caminho3);
        }
      }
      if (isset($_FILES['img4']) && !empty($_FILES['img4']['tmp_name'])) {
        $permitidos = array('image/jpg', 'image/jpeg', 'image/png');
        if (in_array($_FILES['img4']['type'], $permitidos)) {
          $img4 = md5(time() . rand(0, 999)) . '.jpg';
          move_uploaded_file($_FILES['img4']['tmp_name'], 'assets/img/slide/' . $img4);
        }
        if (!empty($_FILES['img4'])) {
          $caminho4 = $_POST['caminho4'];
          unlink("assets/img/slide/" . $caminho4);
        }
      }
      $sld->trocarSlide($alt1, $alt2, $alt3, $alt4, $img1, $img2, $img3, $img4);
      header("Location: " . BASE_URL . "cms/trocarSlide");
      exit;
    }

    //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
    $this->loadTemplateInAdmin('cms/trocarSlide', $data);
  }

}
