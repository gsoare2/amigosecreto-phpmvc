<?php
require_once("../DAL/UsuarioDAO.php");

class UsuarioController{
  private $usuarioDAO;

  public function __construct(){
    $this->usuarioDAO = new UsuarioDAO();
  }

  //Cadastro
  public function Cadastrar(Usuario $usuario){
    if(strlen($usuario->getNome()) > 1 && strpos($usuario->getEmail(), "@") &&
                                          strpos($usuario->getEmail(), ".")){
         return $this->usuarioDAO->Cadastrar($usuario);
       }
    else{
      return false;
    }
  }

  //Consultas
  public function RetornarUsuarios($termo, $tipo){
    if($termo != "" && $tipo >= 1 && $tipo <=2){
      return $this->usuarioDAO->RetornarUsuarios($termo, $tipo);
    }
    else{
      return null;
    }
  }

  public function init(){
    return $this->usuarioDAO->init();
  }

  public function RetornaCod($usuarioCod){
    if($usuarioCod > 0){
      return $this->usuarioDAO->RetornaCod($usuarioCod);
    }
    else{
      return null;
    }
  }

  //Alteracao
  public function Alterar(Usuario $usuario){
    if(strlen($usuario->getNome()) > 1 && strpos($usuario->getEmail(), "@") &&
                                          strpos($usuario->getEmail(), ".")){
         return $this->usuarioDAO->Alterar($usuario);
       }
    else{
      return false;
    }
  }

  //Delecao
  public function Deletar($id){
    if($id){
      return $this->usuarioDAO->Deletar($id);
    }
    else{
      return false;
    }
  }
}

?>
