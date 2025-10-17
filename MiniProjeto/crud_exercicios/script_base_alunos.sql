
CREATE TABLE aparelhos (
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(70) NOT NULL,
    CONSTRAINT pk_aparelhos PRIMARY KEY (id)
);

INSERT INTO aparelhos (nome) VALUES ('Esteira');
INSERT INTO aparelhos (nome) VALUES ('Bicicleta');
INSERT INTO aparelhos (nome) VALUES ('Leg Press');
INSERT INTO aparelhos (nome) VALUES ('Supino');

CREATE TABLE exercicios (
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(70) NOT NULL,
    descricao varchar(255) NOT NULL,
    qtd_vezes int NOT NULL,
    id_aparelho int NOT NULL,
    CONSTRAINT pk_exercicios PRIMARY KEY (id),
    CONSTRAINT fk_exercicios_aparelhos FOREIGN KEY (id_aparelho) REFERENCES aparelhos(id)
);

INSERT INTO exercicios (nome, descricao, qtd_vezes, id_aparelho) 
VALUES ('Corrida', 'Correr de maneira casual', 3, 1);

INSERT INTO exercicios (nome, descricao, qtd_vezes, id_aparelho) 
VALUES ('Pedalar', 'Pedalar tranquilamente', 5, 2);



