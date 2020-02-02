# PeaceSocial
Rede social para ajudar um ao outro

// Script Banco de Dados MySQL

create table user_social
(

	id integer not null AUTO_INCREMENT,
	username VARCHAR(75) not null,
	email VARCHAR(100) not NULL,
	password VARCHAR(40) not null,
	ban TINYINT(1),
	adm TINYINT(1),
	primary key (id)

);
