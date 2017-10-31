<?php
$conn = mysql_connect("localhost", "root", "0000", "amigosecreto");
if (!$conn) {
    die('Erro na conexão: ' . mysql_error());
}

$sql = 'CREATE DATABASE IF NOT EXISTS amigosecreto';

if (mysql_query($sql, $conn)) {
    echo "Banco de dados criado com sucesso!\n";
}
else {
    echo 'Erro na criação do banco de dados: '.mysql_error()."\n";
}

mysql_select_db('amigosecreto', $conn);

$sql = 'CREATE TABLE IF NOT EXISTS tb_pessoas(
          id int(2) primary key auto_increment,
          nome varchar(60) not null,
          email varchar(60) unique not null
        );';

if(mysql_query($sql)){
  echo "Tabela criada com sucesso!\n";
}
else{
  echo "Erro na criação da tabela: ".mysql_error()."\n";
}
?>
