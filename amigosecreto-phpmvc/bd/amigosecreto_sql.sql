create database amigosecreto;

use amigosecreto;

create table tb_pessoas(

	id int(2) primary key auto_increment,

	nome varchar(60) not null,

    email varchar(60) unique not null

);