DROP DATABASE IF EXISTS biblioteca;
CREATE DATABASE IF NOT EXISTS biblioteca;

USE biblioteca;

DROP TABLE IF EXISTS livros;

CREATE TABLE IF NOT EXISTS livros(
id int(11) not null auto_increment, 
cod_livro varchar(50),
nome_livro varchar(250),
desc_livro varchar(250),
PRIMARY KEY(id));
INSERT INTO livros(id, cod_livro, nome_livro, desc_livro)
VALUES(null, '1818','JAVA SOLID', 'JAVA PADRÕES DE PROJETO');

SELECT * FROM livros;