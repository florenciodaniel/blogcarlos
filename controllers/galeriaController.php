<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class galeriaController extends Controller{
 
 public function index(){
  $data = array();//variavel responsavel por inserir dados dinamicos vindo do banco por exemplo
  $g= new Galeria();
  $data['fotos']=$g->getGaleria();
  
  
  
  
  

        //$this->loadTemplate('home', $data);//aqui eu coloco a view que eu quero chamar
        $this->loadTemplate('galeria', $data);
 }
 
}