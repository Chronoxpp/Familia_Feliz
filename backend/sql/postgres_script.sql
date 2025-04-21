CREATE DATABASE familiaFeliz WITH
    OWNER = dev
    ENCODING = 'UTF8'
;


CREATE TABLE IF NOT EXISTS familias(
    id SERIAL PRIMARY KEY,
    descricao VARCHAR(200) NOT NULL
);


CREATE TABLE IF NOT EXISTS usuarios(
    id SERIAL PRIMARY KEY,
    nome_completo VARCHAR(200) NOT NULL
);


CREATE TABLE IF NOT EXISTS familia_membros(
    id_familia int NOT NULL,
    id_membro int NOT NULL,
    CONSTRAINT fk_id_familia FOREIGN KEY (id_familia) REFERENCES familias(id) ON DELETE CASCADE,
    CONSTRAINT fk_id_membro FOREIGN KEY (id_membro) REFERENCES usuarios(id) ON DELETE NO ACTION
);