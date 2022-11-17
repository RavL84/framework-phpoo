
/**
 * Author:  raul
 * Created: 4 de out. de 2022
 */

CREATE TABLE estado (
    id integer PRIMARY KEY NOT NULL,
    sigla VARCHAR(2),
    nome VARCHAR(255)
);

CREATE TABLE cidade (
    id integer PRIMARY KEY NOT NULL,
    nome VARCHAR(255) NOT NULL,
    id_estado INTEGER REFERENCES estado (id)
);

CREATE TABLE pessoa (
    id integer PRIMARY KEY NOT NULL,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    bairro VARCHAR(255) NOT NULL,
    telefone VARCHAR(32) NOT NULL,
    email VARCHAR(32),
    id_cidade integer references cidade(id)
);
INSERT INTO estado (id, sigla, nome) VALUES (1, 'GO', 'Goias');
INSERT INTO estado (id, sigla, nome) VALUES (2, 'RJ', 'Rio_de_Janeiro');


INSERT INTO cidade (id, nome, id_estado) VALUES (1, 'Goiânia', 1);
INSERT INTO cidade (id, nome, id_estado) VALUES (2, 'São Gonçalo', 2);
INSERT INTO cidade (id, nome, id_estado) VALUES (3, 'Niterói', 2);


INSERT INTO pessoa
(id, nome, endereco, bairro, telefone, email, id_cidade) 
VALUES 
(1, 'Raul', 'Rua sem nome', 'sembairro', '32-9564-6321', 'Raul@teste.com', '1');

INSERT INTO pessoa 
(id, nome, endereco, bairro, telefone, email, id_cidade)
VALUES 
(2, 'Camylla', 'Rua sem nome', 'sembairro', '54-5454-9875', 'Camylla@teste.com', '1');

INSERT INTO pessoa 
(id, nome, endereco, bairro, telefone, email, id_cidade)
VALUES 
(3, 'Paulo', 'Rua dois e meio', 'bairro do meio', '80-6547-9865', 'paulo@teste.com', '2');
    

SELECT pessoa.nome, pessoa.endereco, pessoa.bairro, pessoa.telefone, pessoa.email, cidade.nome AS cidade, estado.nome AS estado 
FROM pessoa
LEFT JOIN cidade ON pessoa.id_cidade = cidade.id 
LEFT JOIN estado ON cidade.id_estado = estado.id
ORDER BY pessoa.id;

-- SELECT * FROM cidade;
-- SELECT * FROM estado;
-- SELECT * FROM pessoa;


