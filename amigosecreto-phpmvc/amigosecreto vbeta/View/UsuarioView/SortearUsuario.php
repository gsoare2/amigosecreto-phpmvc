<?php
require_once("../Controller/SortearController.php");
require_once("../Model/Usuario.php");

//Instancias
$sortearController = new SortearController();
$usuario = new Usuario();

//Variaveis globais
$nomesUsuario1 = [];
$nomesUsuario2 = [];
$jaSelected = [];
$controle = [];

?>
<h4>Pessoas sorteadas</h4>
<hr />
<br />
<?php

//Recebimento de info das pessoas no banco
$listaUsuario = $sortearController->SortearUsuario();
//Populando um array com as info somente nome
foreach ($listaUsuario as $obj){
  if(sizeof($listaUsuario) >= 2){
    array_push($nomesUsuario1, $obj->getNome());
    array_push($nomesUsuario2, $obj->getNome());
  }
  else{
    echo "<p>Não existem pessoas suficientes para realizar o sorteio.</p>";
  }
}
//Sorteio de pessoas por nome
while(sizeof($nomesUsuario2) > 0){
  $max2 = (sizeof($nomesUsuario2)-1);
  $random1 = array_rand($nomesUsuario1);
  $random2 = array_rand($nomesUsuario2);

  array_push($controle, $max2);
  if(sizeof($controle) > 10){
    ?>
      <script>
        location.reload();
      </script>
    <?php
  }
  if(($random1 != $random2) && (!in_array($random1, $jaSelected))){
    echo "<h5>$nomesUsuario1[$random1] saiu com $nomesUsuario2[$random2].</h5>";
    array_push($jaSelected, $random1);
    unset($nomesUsuario2[$random2]);
    $controle = [];
  }
}
?>
