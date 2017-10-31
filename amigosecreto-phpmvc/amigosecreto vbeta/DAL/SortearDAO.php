<?php
require_once("Banco.php");

class SortearDAO{
  private $pdo;
  private $debug;

  public function __construct(){
    $this->pdo = new Banco();
    $this->debug = true;
  }

  //Funcao de retorno
  public function retornaNomes(){
    try{
      $sql = "SELECT nome FROM tb_pessoas ORDER BY nome ASC";

      $dataTable = $this->pdo->ExecuteQuery($sql);
      $listaUsuario = [];

      foreach($dataTable as $resultado){
        $usuario = new Usuario();
        $usuario->setNome($resultado["nome"]);
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
}
?>
