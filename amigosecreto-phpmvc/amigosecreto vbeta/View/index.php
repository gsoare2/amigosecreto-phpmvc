<html>
  <head>
    <title>Amigo Secreto</title>
    <meta charset="utf-8">
    <!--Minha folha de estilo-->
    <link rel="stylesheet" href="css/style.css">
    <!--Folha de estilo bootstrap-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!--Import da fonte-->
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <!--Jquery-->
    <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
    <!--Script js para validacao-->
    <script src="js/validacoes.js" charset="utf-8"></script>
    <!--Script js bootstrap-->
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>

  <body>
    <div class="painel center">
      <!--Menu-->
      <ul class="menu">
        <li class="item"><a href="?pagina=home">Inicio</a></li>
        <li class="item"><a href="?pagina=cadastrar">Cadastrar</a></li>
        <li class="item"><a href="?pagina=sortear">Sortear</a></li>
      </ul>

      <br />

      <!--Conteudo do site-->
      <div class="conteudo">
        <?php
          //Requisicao do arquivo request page onde organiza as paginas
          require_once("../Util/RequestPage.php");
        ?>
      </div>
    </div>
  </body>
</html>
