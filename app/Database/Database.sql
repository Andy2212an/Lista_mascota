CREATE DATABASE mascota;
USE mascota;

CREATE TABLE mascotas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  dueno VARCHAR(100) NOT NULL,
  especie VARCHAR(50) NOT NULL,
  edad INT NOT NULL,
  sexo ENUM('Macho', 'Hembra') NOT NULL,
  imagen VARCHAR(255) DEFAULT NULL,
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO mascotas (nombre, dueno, especie, edad, sexo, imagen) VALUES
('Firulais', 'Juan Pérez', 'Perro', 3, 'Macho', 'firulais.jpg'),
('Michi', 'Ana Torres', 'Gato', 2, 'Hembra', 'michi.png'),
('Rex', 'Carlos López', 'Perro', 5, 'Macho', 'rex.jpg');

SELECT * FROM mascotas;