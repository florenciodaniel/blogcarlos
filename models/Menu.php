<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Menu  extends Model{
// public function __construct() {
//  parent::__construct();
// }

 public function getMenu($id=0){
  $array=array();
  $sql="SELECT * FROM menu";
  if($id>0){
   $sql.=" WHERE id= '$id'";
  }
  $sql= $this->db->query($sql);
  
  if($sql-> rowCount()>0){
   if($id >0){
    $array=$sql->fetch();
   } else {
    $array=$sql->fetchAll();
   }
   
  }
  
  
  return $array;
 }
 public function delete($url){
  $this->db->query("DELETE FROM menu WHERE url = '$url'");
 }
 
 public function update($nome, $url, $id){
  $this->db->query("UPDATE menu SET nome = '$nome', url = '$url' WHERE id = '$id'");
 }
  public function insert($nome, $url){
  $this->db->query("INSERT INTO menu SET nome = '$nome', url = '$url'");
 }
 
}