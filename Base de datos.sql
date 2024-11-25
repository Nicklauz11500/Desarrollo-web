-- Crear base de datos
CREATE DATABASE user_auth;

-- Usar la base de datos creada
USE user_auth;

-- Crear la tabla de usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE(username)
);
