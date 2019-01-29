create database binb;
	use binb;
	create table cliente(
		idcliente int primary key auto_increment,
		data timestamp DEFAULT current_timestamp,
		nome varchar(150),
		email varchar(255),
		assunto varchar(200),
		msg text,
		status ENUM('ativo','inativo') DEFAULT 'ativo' NOT NULL 
		);

	create table produtos(
		id int(10) NOT NULL primary key auto_increment,
		nome varchar (250) NOT NULL,
		code varchar (100) NOT NULL,
		img varchar (200) NOT NULL,
		preco decimal (10,2) NOT NULL,
		quantidade varchar(3) NOT NULL,
		tipo ENUM('camisa','disco') NOT NULL
		);


