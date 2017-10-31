<?php
require_once("Banco.php");

class UsuarioDAO{
  private $pdo;
  private $debug;

  public function __construct(){
    $this->pdo = new Banco();
    $this->debug = true;
  }

  //Funcao de cadastro
  public function Cadastrar(Usuario $usuario){
    try {
      $sql = "INSERT INTO tb_pessoas (nome, email) VALUES (:nome, :email)";
      $param = array(
        ":nome" => $usuario->getNome(),
        ":email" => $usuario->getEmail()
      );
      return $this->pdo->ExecuteNonQuery($sql, $param);
    }
    catch (Exception $e) {
      if($this->debug){
        echo "ERRO: {$e->getMessage()} LINE: ($e->getLine())";
      }
      return false;
    }
  }

  //Funcoes de consultas
  public function RetornarUsuarios($termo, $tipo){
    try{
      $sql = "";
      $paramLike = "";
      switch ($tipo) {
        case 1:
          $sql = "SELECT nome, email, id FROM tb_pessoas WHERE nome LIKE :termo ORDER BY nome ASC";
          break;
        case 2:
          $sql = "SELECT nome, email, id FROM tb_pessoas WHERE email LIKE :termo ORDER BY nome ASC";
          break;
      }
      $param = array(
        ":termo"=>"%{$termo}%"
      );
      $dataTable = $this->pdo->ExecuteQuery($sql, $param);
      $listaUsuario = [];

      foreach($dataTable as $resultado){
        $usuario = new Usuario();
        $usuario->setNome($resultado["nome"]);
        $usuario->setEmail($resultado["email"]);
        $usuario->setId($resultado["id"]);

        $listaUsuario[] = $usuario;
      }
      return $listaUsuario;
    }
    catch (Exception $e) {
      if($this->debug){
        echo "ERRO: {$e->getMessage()} LINE: ($e->getLine())";
      }
      return null;
    }
  }

  public function RetornaCod($usuarioCod){
    try {
      $sql = "SELECT nome, email FROM tb_pessoas WHERE id = :id";
      $param = array(
        ":id" => $usuarioCod
      );

      $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);
      if($dt != null){
        $usuario = new Usuario();
        $usuario->setNome($dt["nome"]);
        $usuario->setEmail($dt["email"]);
        return $usuario;
      }
      else{
        return null;
      }
    } catch (Exception $e) {
      if($this->debug){
        echo "ERRO: {$e->getMessage()} LINE: ($e->getLine())";
      }
      return null;
    }
  }

  public function init(){
    try{
      $sql = "SELECT nome, email, id FROM tb_pessoas ORDER BY nome ASC";

      $dataTable = $this->pdo->ExecuteQuery($sql);
      $listaUsuario = [];

      foreach($dataTable as $resultado){
        $usuario = new Usuario();
        $usuario->setNome($resultado["nome"]);
        $usuario->setEmail($resultado["email"]);
        $usuario->setId($resultado["id"]);

        $listaUsuario[] = $usuario;
      }
      return $listaUsuario;
    }
    catch (Exception $e) {
      if($this->debug){
        echo "ERRO: {$e->getMessage()} LINE: ($e->getLine())";
      }
      return null;
    }
  }

  //funcao de alterar
  public function Alterar(Usuario $usuario){
    try {
      $sql = "UPDATE tb_pessoas SET nome = :nome, email = :email WHERE id = :id";
      $param = array(
        ":nome" => $usuario->getNome(),
        ":email" => $usuario->getEmail(),
        ":id" => $usuario->getId()
      );
      return $this->pdo->ExecuteNonQuery($sql, $param);
    }
    catch (Exception $e) {
      if($this->debug){
        echo "ERRO: {$e->getMessage()} LINE: ($e->getLine())";
      }
      return false;
    }
  }

  //Funcao de delecao
  public function Deletar($id){
    try {
      $sql = "DELETE FROM tb_pessoas WHERE id = :id";
      $param = array(
        ":id" => $id
      );
      return $this->pdo->ExecuteNonQuery($sql, $param);
    }
    catch (Exception $e) {
      if($this->debug){
        echo "ERRO: {$e->getMessage()} LINE: ($e->getLine())";
      }
      return false;
    }
  }
}
?>
