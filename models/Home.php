<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Home extends Model{
 
 public function getHome(){
  $array=array();
  $sql="SELECT * FROM home";
  $sql= $this->db->query($sql);
  
  if($sql->rowCount()>0){
   foreach ($sql->fetchAll() as $h){
    $array[$h['nome']]=$h['valor'];
   }
  }
  
  
  
  return $array;
 }
 public function setPropriedade($valor,$nome){
  $this->db->query("UPDATE home SET valor = '$valor' WHERE nome = '$nome'");
 }
 
}
