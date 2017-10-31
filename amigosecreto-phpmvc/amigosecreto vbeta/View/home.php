<?php
require_once("../Controller/UsuarioController.php");
require_once("../Model/Usuario.php");
require_once("../DAL/UsuarioDAO.php");

//Instancias
$usuarioController = new UsuarioController();

//Variaveis globais
$resultadoBusca = "";
$listaUsuariosBusca = [];
?>
<h4>Inicio</h4>
<hr />
<div class="row">
  <div class="col-lg-4">
    <form name="frmBuscarUsuario" id="frmBuscarUsuario" method="post">
      <label  class="form-control-label" for="txtBuscar">Digite o nome ou o e-mail que deseja buscar:</label><br />
      <input type="text" class="form-control" name="txtBuscar" id="txtBuscar" placeholder="Procure pelo e-mail ou pelo nome">
  </div>
  <div class="col-lg-2">
    <label for="slTipoBusca"></label>
    <select style="margin-top: 23px;" class="form-control" id="slTipoBusca" name="slTipoBusca">
      <option value="1">Nome</option>
      <option value="2">E-mail</option>
    </select>
  </div>
  <div class="col-lg-2">
    <input style="margin-top: 29px;" id="btnBuscar" name="btnBuscar" type="submit" class="btn btn-info" value="Procurar"/>
    </form>
  </div>
  <div class="col-lg-4"></div>
</div>

<br />

<script>
  //Quando a pagina estiver carregada popula a table com todas as info do banco
  $(document).ready(function(){
    <?php
      $listaUsuariosBusca = $usuarioController->init();
    ?>
  });
</script>
<?php
//Pesquisa por nome ou e-mail
if(filter_input(INPUT_POST, "btnBuscar", FILTER_SANITIZE_STRING)){
  $termo = filter_input(INPUT_POST, "txtBuscar", FILTER_SANITIZE_STRING);
  $tipo = filter_input(INPUT_POST, "slTipoBusca", FILTER_SANITIZE_NUMBER_INT);

  $listaUsuariosBusca = $usuarioController->RetornarUsuarios($termo, $tipo);

  if($listaUsuariosBusca != null){
    echo "<p>Exibindo dados.</p>";
  }
  else{
    echo "<p>Nenhum registro encontrado.</p>";
  }
}

//Delecao do usuario
if(filter_input(INPUT_GET, "idDel", FILTER_SANITIZE_NUMBER_INT)){
  if($usuarioController->Deletar(filter_input(INPUT_GET, "idDel", FILTER_SANITIZE_NUMBER_INT))){
    echo "<p>Deletado.</p>";
    ?>
    <script>
      $(location).attr('href', '?pagina=home');
    </script>
    <?php
  }
  else{
    echo "<p>Houve um erro ao tentar deletar.</p>";
  }
}
?>

<table class="table table-responsive table-hover table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>E-mail</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      if($listaUsuariosBusca != null)
        foreach($listaUsuariosBusca as $usuario){ //foreach que popula as info no banco
    ?>
    <tr>
      <td><?=$usuario->getNome();?></td>
      <td><?=$usuario->getEmail();?></td>
      <td><a href="?pagina=cadastrar&id=<?=$usuario->getId(); ?>" class="btn btn-success">Editar</a>
          <a href="?pagina=home&idDel=<?=$usuario->getId();?>" class="btn btn-danger" onclick="return confirm('Deseja realmente remover?')">Delete</a>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
