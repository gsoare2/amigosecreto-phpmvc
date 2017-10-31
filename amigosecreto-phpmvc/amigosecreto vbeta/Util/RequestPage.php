<?php

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_STRING);

$arrayPaginas = array(
    "home" => "../View/home.php", //Página inicial
    "cadastrar" => "../View/UsuarioView/CadastrarUsuario.php",
    "sortear" => "../View/UsuarioView/SortearUsuario.php",
);

if ($pagina) {
    $encontrou = false;

    foreach ($arrayPaginas as $page => $key) {
        if ($pagina == $page) {
            $encontrou = true;
            require_once($key);
        }
    }

    if (!$encontrou) {
        require_once("../View/home.php");
    }
} else {
    require_once("../View/home.php");
}
?>
