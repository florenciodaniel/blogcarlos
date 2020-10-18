<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuarios extends Model {

   private $info;

   public function verificarUsuario($usuario, $senha) {

      $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
      $sql = $this->db->prepare($sql);
      $sql->bindValue(":usuario", $usuario);
      $sql->bindValue(":senha", md5($senha));
      $sql->execute();

      if ($sql->rowCount() > 0) {
         return TRUE;
      } else {
         return FALSE;
      }
   }

   public function criarToken($usuario) {
      $token = md5(time() . rand(0, 9999) . time() . rand(0, 9999));

      $sql = "UPDATE usuarios SET token= :token WHERE usuario = :usuario";
      $sql = $this->db->prepare($sql);
      $sql->bindValue(":token", $token);
      $sql->bindValue(":usuario", $usuario);
      $sql->execute();

      return $token;
   }

   public function checarLogin() {
      if (!empty($_SESSION['token'])) {
         $token = $_SESSION['token'];

         $sql = "SELECT * FROM usuarios WHERE token = :token";
         $sql = $this->db->prepare($sql);
         $sql->bindvalue(":token", $token);
         $sql->execute();

         if ($sql->rowCount() > 0) {
            $this->info = $sql->fetch();
            return TRUE;
         }
      }
      return FALSE;
   }

   public function usuarioLogado() {
      $array = array();
      if (!empty($_SESSION['token'])) {
         $token = $_SESSION['token'];

         $sql = "SELECT * FROM usuarios WHERE token = :token";
         $sql = $this->db->prepare($sql);
         $sql->bindvalue(":token", $token);
         $sql->execute();
      }
      if ($sql->rowCount() > 0) {
         $array = $sql->fetchall();
      }


      return $array;
   }
      public function usuarioLogadoVenda() {
      $array = array();
      if (!empty($_SESSION['token'])) {
         $token = $_SESSION['token'];

         $sql = "SELECT * FROM usuarios";
         $sql = $this->db->prepare($sql);
         
         $sql->execute();
      }
      if ($sql->rowCount() > 0) {
         $array = $sql->fetchall();
      }


      return $array;
   }

   public function editarUsuario($nome, $usuario, $senha, $token,$url) {

      $sql = "UPDATE usuarios SET nome = :nome, usuario = :usuario, senha = :senha, img = :img WHERE token = :token";
      $sql = $this->db->prepare($sql);
      $sql->bindValue(":nome", $nome);
      $sql->bindValue(":usuario", $usuario);
      $sql->bindValue(":senha", $senha);
      $sql->bindValue(":token", $token);
      $sql->bindValue(":img", $url);
      $sql->execute();
   }

   public function adicionarUsuario($usuario, $senha, $date_cadastro, $nivel_total,$nivel_admin,$nivel_cms,$nivel_estoque,$nivel_financeiro,$nivel_usuario,$nivel_venda,$url) {
      $sql = "INSERT INTO usuarios SET usuario = :usuario, senha = :senha, date_cadastro = :date_cadastro, nivel_total = :nivel_total, nivel_admin = :nivel_admin, nivel_cms = :nivel_cms, nivel_estoque = :nivel_estoque, nivel_financeiro = :nivel_financeiro, nivel_usuario = :nivel_usuario, nivel_venda = :nivel_venda, img = :img";
          
      $sql = $this->db->prepare($sql);
      $sql->bindValue(":usuario", $usuario);
      $sql->bindValue(":date_cadastro", $date_cadastro);
      $sql->bindValue(":nivel_total", $nivel_total);
      $sql->bindValue(":nivel_admin", $nivel_admin);
      $sql->bindValue(":nivel_cms", $nivel_cms);
      $sql->bindValue(":nivel_estoque", $nivel_estoque);
      $sql->bindValue(":nivel_financeiro", $nivel_financeiro);
      $sql->bindValue(":nivel_usuario", $nivel_usuario);
      $sql->bindValue(":nivel_venda", $nivel_venda);
      $sql->bindValue(":img", $url);

      
      $sql->bindValue(":senha", md5($senha));

      $sql->execute();
   }

   public function verUsuarios() {
      $array = array();
      $sql = "SELECT * FROM usuarios";
      $sql = $this->db->query($sql);

      if ($sql->rowCount() > 0) {
         $array = $sql->fetchall();
      }

      return $array;
   }


      public function deletarUsuario($codigo) {
         if ($codigo != 1) {
         $sql = "DELETE FROM usuarios WHERE id = :id";
      
      $sql = $this->db->prepare($sql);
      $sql->bindValue(":id", $codigo);
      $sql->execute();
         }
   }
   public function verificandoCodigo($verificarCodigo) {
      $array = array();
      $sql = "SELECT * FROM usuarios WHERE id = '$verificarCodigo'";
      $sql = $this->db->query($sql);

      if ($sql->rowCount() > 0) {
         $array = $sql->fetchAll();
      }


      return $array;
   }
   
   //verificar se pode cancelar compra
   public function podeCancelar(){
      $pode=array();
      $sql = "SELECT senha FROM usuarios WHERE nivel_total = 'on' OR nivel_financeiro = 'on'";
      $sql = $this->db->query($sql);
      if ($sql->rowCount() > 0) {
         $pode= $sql->fetchAll();
      }
      return $pode;
   }
//            public function checarTipo() {
//          $tipoChecado='';
//      if (!empty($_SESSION['token'])) {
//         $token = $_SESSION['token'];
//
//         $sql = "SELECT tipo FROM usuarios WHERE token = :token";
//         $sql = $this->db->prepare($sql);
//         $sql->bindvalue(":token", $token);
//         $sql->execute();
//      }
//      if ($sql->rowCount() > 0) {
//         $tipoChecado = $sql->fetch();
//      }
//
//
//
//      return $tipoChecado;
//   }
   
}
