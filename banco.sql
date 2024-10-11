CREATE DATABASE hackathon;
USE hackathon;
CREATE TABLE usuarios(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255) NOT NULL,
senha VARCHAR(30) NOT NULL,
cpf VARCHAR(15) NOT NULL);
INSERT INTO usuarios(nome, senha, cpf) values('gabriel@gmail.com', '123', '52949386857');
select * from usuarios;