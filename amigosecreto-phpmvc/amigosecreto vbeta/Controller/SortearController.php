<?php
require_once("../DAL/SortearDAO.php");
//require_once("../Controller/UsuarioController.php");

$sortearDAO = new SortearDAO();

class SortearController{
  public function __construct(){
    $this->sortearDAO = new SortearDAO();
  }

  //Funcao que retorna dados do banco para sortear
  public function SortearUsuario(){
    return $this->sortearDAO->retornaNomes();
  }
}
