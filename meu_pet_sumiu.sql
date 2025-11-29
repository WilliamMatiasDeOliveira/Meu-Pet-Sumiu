CREATE DATABASE IF NOT EXISTS meu_pet_sumiu;

USE meu_pet_sumiu;

CREATE TABLE IF NOT EXISTS usuarios(
	id_usuario BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	senha VARCHAR(255) NOT NULL,
	telefone VARCHAR(14)NOT NULL
);

CREATE TABLE IF NOT EXISTS pets(
	id_pet BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	usuario_id BIGINT UNSIGNED NOT NULL,
	nome VARCHAR(255),
	idade INT,
	porte VARCHAR(255)NOT NULL,
	raca VARCHAR(255),
	localizacao VARCHAR(255) NOT NULL,
	DATA VARCHAR(255) NOT NULL,
	imagem VARCHAR(255) NOT NULL,
	cor VARCHAR(255),
	corOlhos VARCHAR(255),
	situacao VARCHAR(255) NOT NULL,
	observacao VARCHAR(255),
	FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario)
	
);


#drop database meu_pet_sumiu;




































