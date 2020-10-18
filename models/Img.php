<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Img extends Model {
  
  public function pegarImgPeloId($value) {
    $sql="SELECT url_img FROM post_img WHERE hashtag_post = :id";
    $sql= $this->db->prepare($sql);
    $sql->bindValue(":id",$value);
    $sql->execute();
    
    if($sql->rowCount()>0){
      $data=$sql->fetchAll();
      return $data;        
    } else {
      return '';
    }
  }
}