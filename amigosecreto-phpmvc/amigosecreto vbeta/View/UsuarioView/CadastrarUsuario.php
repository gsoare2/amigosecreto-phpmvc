<?php
require_once("../Controller/UsuarioController.php");
require_once("../Model/Usuario.php");

//Instancia da classe UsuarioController
$usuarioController = new UsuarioController();

//Variaveis globais
$nome = "";
$email = "";
$resultado = "";
$resultadoValida = "";

//Input do botão salvar
if(filter_input(INPUT_POST, "btnSalvar", FILTER_SANITIZE_STRING)){
  //Instancia da classe Usuario
  $usuario = new Usuario();
  //Recebimento dos inputs
  $usuario->setNome(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING));
  $usuario->setEmail(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_STRING));

  if(!filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT)){
    //Cadastrao do usuario
    if($usuarioController->Cadastrar($usuario)){
      $resultado = "<div class=\"alert alert-success\" role=\"alert\">Usuario cadastrado com sucesso.</div>";
      ?>
      <script>
        //Redirecionamento para a pagina home
        window.setInterval(function(){
          $(location).attr('href', '?pagina=home');
        }, 500);
      </script>
      <?php
    }
    else{
      $resultado = "<div class=\"alert alert-danger\" role=\"alert\">Houve um erro tentar cadastrar o usuario.</div>";
    }
  }
  else{
    //Edicao de usuario
    $usuario->setId(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT));
    if($usuarioController->Alterar($usuario)){
      $resultado = "<div class=\"alert alert-success\" role=\"alert\">Usuario Alterado com sucesso.</div>";
      ?>
      <script>
        window.setInterval(function(){
          $(location).attr('href', '?pagina=home');
        }, 500);
      </script>
      <?php
    }
    else{
      $resultado = "<div class=\"alert alert-danger\" role=\"alert\">Houve um erro tentar alterar o usuario.</div>";
    }
  }
}


//Retornar o cod por get para edição de usuario
if(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT)){
  $retornoUsuario = $usuarioController->RetornaCod(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT));
  $nome = $retornoUsuario->getNome();
  $email = $retornoUsuario->getEmail();
}
?>
<h4>Cadastrar pessoas</h4>
<hr />
<br />
<form method="POST" id="frmCadastrarUsuario" name="frmCadastrarUsuario">
  <div class="row">
    <div class="col-lg-4">
      <div class="form-group">
        <label class="form-control-label" for="txtNome">Qual é o seu nome?</label><span class="vlCampos"> *</span>
        <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Seu nome" value="<?=$nome?>">
      </div>
    </div>
    <div class="col-md-8"></div>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <div class="form-group">
        <label class="form-control-label" for="txtEmail">Qual é o seu e-mail? <span id="validaEmail"></span> </label><span class="vlCampos"> *</span>
        <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="email@dominio.com" value="<?=$email?>">

      </div>
    </div>
    <div class="col-md-8"></div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <p id="pResultado"><?= $resultado; ?></p>
    </div>
    <div class="col-md-8"></div>
  </div>
  <input id="btnSalvar" name="btnSalvar" type="submit" class="btn btn-success" value="Salvar" />
</form>
