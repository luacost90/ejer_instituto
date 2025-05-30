CREATE DATABASE IF NOT EXISTS bd_aped
CHARACTER SET utf8
COLLATE utf8_general_ci;
USE bd_aped;

CREATE TABLE representante(
    id_representante INT(11) AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(15) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
 
);

CREATE TABLE estudiante(
    id_estudiante INT(11) AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(15) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    edad INT(2) NOT NULL,
    sexo ENUM('masculino','femenino') NOT NULL,
    fk_representante INT NOT NULL,
    fk_plantel INT NOT NULL,
    FOREIGN KEY (fk_representante) REFERENCES  representante(id_representante) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (fk_plantel) REFERENCES plantel(id_plantel) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE plantel (
    id_plantel INT(11) AUTO_INCREMENT PRIMARY KEY,
    eponimo VARCHAR(50) NOT NULL,
    codigo_dea VARCHAR(30) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    cedula VARCHAR(15) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    seccion VARCHAR(50) NOT NULL,
    tipo_matricula VARCHAR(50) NOT NULL,
    grado VARCHAR(50) NOT NULL
);