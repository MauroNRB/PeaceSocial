# PeaceSocial
Rede social para ajudar um ao outro

// Script Banco de Dados MySQL

	create table user_social
	(
		id integer not null AUTO_INCREMENT,
		username VARCHAR(75) not null,
		email VARCHAR(100) not NULL,
		password CHAR(32) not null,
		ban TINYINT(1),
		adm TINYINT(1),
		primary key (id)
	);
	
	create table message_social
	(
		id_message integer not NULL AUTO_INCREMENT,
		id_user integer not null,
		message VARCHAR(1500),
		title VARCHAR(70),
		primary key (id_message),
		foreign key (id_user) references user_social (id)
	);