<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Post extends Model {

  public function adicionarPostImg($titulo, $texto, $autor, $date, $hashtag,$categoria, $imagens, $id) {

    $sql = "INSERT INTO post SET titulo = :titulo, texto = :texto, autor = :autor, date = :date, categoria = :categoria, hashtag= :hashtag";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":titulo", $titulo);
    $sql->bindValue(":texto", $texto);
    $sql->bindValue(":autor", $autor);
    $sql->bindValue(":date", $date);
    $sql->bindValue(":categoria", $categoria);
    $sql->bindValue(":hashtag", $hashtag);


    $sql->execute();


    foreach ($imagens as $key => $value) {
      $sql = "INSERT INTO post_img SET hashtag_post = :hashtag_post, url_img = :url_img";
      $sql = $this->db->prepare($sql);
      $sql->bindValue(":hashtag_post", $hashtag);
      $sql->bindValue(":url_img", $value);
      $sql->execute();
    }
  }

//  public function adicionarPost($titulo, $texto, $autor, $date) {
//    $sql = "INSERT INTO post SET titulo = :titulo, texto = :texto, autor = :autor, date = :date";
//    $sql = $this->db->prepare($sql);
//    $sql->bindValue(":titulo", $titulo);
//    $sql->bindValue(":texto", $texto);
//    $sql->bindValue(":autor", $autor);
//    $sql->bindValue(":date", $date);
//
//
//    $sql->execute();
//  }
//
//  public function adicionarImgPost($imagens, $id) {
//
//    foreach ($imagens as $key => $value) {
//      $sql = "INSERT INTO post_img SET id_post = :id_post, url_img = :url_img";
//      $sql = $this->db->prepare($sql);
//      $sql->bindValue(":id_post", $id);
//      $sql->bindValue(":url_img", $value);
//      $sql->execute();
//    }
//  }

//  public function adicionarImgAoPost($titulo, $texto, $img1, $img2, $img3, $img4, $img5) {
//    $sql = "INSERT INTO post SET titulo = :titulo, texto = :texto, img1 = :img1, img2 = :img2, img3 = :img3, img4 = :img4, img5 = :img5";
//    $sql = $this->db->prepare($sql);
//    $sql->bindValue(":titulo", $titulo);
//    $sql->bindValue(":texto", $texto);
//    $sql->bindValue(":img1", $img1);
//    $sql->bindValue(":img2", $img2);
//    $sql->bindValue(":img3", $img3);
//    $sql->bindValue(":img4", $img4);
//    $sql->bindValue(":img5", $img5);
//
//    $sql->execute();
//  }

  public function verUltimoPosts() {
    $array = array();
    $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 1";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetch();
    }
    return $array;
  }
  
    public function pegarImgUltimoPost($ultimoIdPost) {
    $array = array();
    $sql = "SELECT * FROM post_img WHERE hashtag_post = :ultimoId ";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":ultimoId", $ultimoIdPost);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
    }
    return $array;
  }

  public function verTodosUltimoPosts() {
    $array = array();
    $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 1,4";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
      
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
    }
    return $array;
  }

//  public function pegarImgsPost($item) {
//  $array=array();
//    $sql = "SELECT * FROM post_img WHERE id_post = :id_post";
//    $sql = $this->db->prepare($sql);
//    $sql->bindValue(":id_post", $item);
//    $sql->execute();
//    if ($sql->rowCount() > 0) {
//      $array = $sql->fetchAll();
//      
//    }
//    
//    return $array;
//  }

  public function verTodosPosts($pagInicio = 0, $pagLimite = 4) {
    $array = array();
    $sql = "SELECT * FROM post WHERE categoria != 'adulto' ORDER BY id DESC LIMIT $pagInicio, $pagLimite";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
      
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
    }
    return $array;
  }
    public function verTodosPostsPraDeletar() {
    $array = array();
    $sql = "SELECT * FROM post";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
      
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
    }
    return $array;
  }

  public function verTotalPosts() {
    $sql = "SELECT COUNT(*) as c FROM post WHERE categoria != 'adulto'";
    $sql = $this->db->query($sql);
    $sql = $sql->fetch();

    return $sql['c'];
  }

  public function verPostsAleatorios() {
    $array = array();
    $sql = "SELECT * FROM post ORDER BY RAND() LIMIT 1,4 ";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
            
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
    }
    return $array;
  }

  public function deletePost($delete) {
    $sql = "DELETE FROM post WHERE hashtag = :hashtag";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":hashtag", $delete);
    $sql->execute();
    
        $sql = "DELETE FROM post_img WHERE hashtag_post = :hashtag";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":hashtag", $delete);
    $sql->execute();
  }

  public function pesquisarPost($busca) {
    $array = array();

    if (!empty($busca)) {//aqui é colocado un if pois podemos ter a $busca vazia
      $sql = "SELECT * FROM post WHERE titulo LIKE :titulo OR texto LIKE :texto OR autor LIKE :autor OR date LIKE :date ORDER BY id DESC LIMIT 1";
      $sql = $this->db->prepare($sql);
      $sql->bindValue(":titulo", '%' . $busca . '%');
      $sql->bindValue(":texto", '%' . $busca . '%');
      $sql->bindValue(":autor", '%' . $busca . '%');
      $sql->bindValue(":date", '%' . $busca . '%');

      $sql->execute();
      if ($sql->rowCount() > 0) {
        $array = $sql->fetchAll();
                  
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
      }
      return $array;
    }
  }

  public function editarPost($hashtag, $titulo, $texto,$temImgPraTrocar, $imagens) {
    $sql = "UPDATE post SET titulo = :titulo, texto = :texto WHERE hashtag = :hashtag";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":hashtag", $hashtag);
    $sql->bindValue(":titulo", $titulo);
    $sql->bindValue(":texto", $texto);
    $sql->execute();
    
  
    if($temImgPraTrocar==='sim'){
            $sql = "DELETE FROM post_img WHERE hashtag_post = :hashtag";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":hashtag", $hashtag);
    $sql->execute();
    
       
    $sql->execute();
        foreach ($imagens as $key => $value) {
      $sql = "INSERT INTO post_img SET hashtag_post = :hashtag_post, url_img = :url_img";
      $sql = $this->db->prepare($sql);
      $sql->bindValue(":hashtag_post", $hashtag);
      $sql->bindValue(":url_img", $value);
      $sql->execute();
    }
    }

  }

  public function essePost($id) {
    $array = array();
    $sql = "SELECT * FROM post WHERE id = :id ";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
            
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
    }
    return $array;
  }

  public function verTodosPostsHumor($pagInicio = 0, $pagLimite = 4) {
    $array = array();
    $sql = "SELECT * FROM post WHERE categoria = 'humor' ORDER BY id DESC LIMIT $pagInicio, $pagLimite";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
      
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
    }
    return $array;
  }

    public function verTotalPostsHumor() {
    $sql = "SELECT COUNT(*) as c FROM post WHERE categoria = 'humor'";
    $sql = $this->db->query($sql);
    $sql = $sql->fetch();

    return $sql['c'];
  }
  
    public function verTodosPostsCuriosidade($pagInicio = 0, $pagLimite = 4) {
    $array = array();
    $sql = "SELECT * FROM post WHERE categoria = 'curiosidade' ORDER BY id DESC LIMIT $pagInicio, $pagLimite";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
      
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
    }
    return $array;
  }

    public function verTotalPostsCuriosidade() {
    $sql = "SELECT COUNT(*) as c FROM post WHERE categoria = 'curiosidade'";
    $sql = $this->db->query($sql);
    $sql = $sql->fetch();

    return $sql['c'];
  }
      public function verTodosPostsCarro($pagInicio = 0, $pagLimite = 4) {
    $array = array();
    $sql = "SELECT * FROM post WHERE categoria = 'carro' ORDER BY id DESC LIMIT $pagInicio, $pagLimite";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
      
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
    }
    return $array;
  }

    public function verTotalPostsCarro() {
    $sql = "SELECT COUNT(*) as c FROM post WHERE categoria = 'carro'";
    $sql = $this->db->query($sql);
    $sql = $sql->fetch();

    return $sql['c'];
  }
  
        public function verTodosPostsAdulto($pagInicio = 0, $pagLimite = 4) {
    $array = array();
    $sql = "SELECT * FROM post WHERE categoria = 'adulto' ORDER BY id DESC LIMIT $pagInicio, $pagLimite";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
      
      $imagens=new Img();
      foreach ($array as $key => $value) {
        //$array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['id']);
        $array[$key]['essaimagem']=$imagens->pegarImgPeloId($value['hashtag']);
        
      }
    }
    return $array;
  }

    public function verTotalPostsAdulto() {
    $sql = "SELECT COUNT(*) as c FROM post WHERE categoria = 'adulto'";
    $sql = $this->db->query($sql);
    $sql = $sql->fetch();

    return $sql['c'];
  }

}
