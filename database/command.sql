CREATE DATABASE IF NOT EXISTS instituto
CHARACTER SET utf8
COLLATE utf8_general_ci;
USE escuela;

CREATE TABLE representantes(
    id INT AUTO_INCREMEnT PRIMARY KEY,
    cedula VARCHAR(10) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE alumnos(
    id INT AUTO_INCREMEnT PRIMARY KEY,
    nombre VARCHAR(100),
    id_representante INT,
    FOREIGN KEY (id_representante) REFERENCES representantes(id) ON UPDATE CASCADE ON DELETE CASCADE
)