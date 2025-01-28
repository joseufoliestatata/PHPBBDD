CREATE DATABASE tienda2;

USE tienda2;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

INSERT INTO productos (nombre) VALUES 
('Producto 1'), ('Producto 2'), ('Producto 3');