create database `aula_crud`;

use `aula_crud`;

CREATE TABLE `login` (
  `id` int(9) NOT NULL auto_increment,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(100) NOT NULL,
  `qtde` int(5) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  CONSTRAINT FK_produtos_1
  FOREIGN KEY (login_id) REFERENCES login(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;
