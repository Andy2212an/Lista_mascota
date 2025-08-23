CREATE DATABASE mascota;
USE mascota;

CREATE TABLE mascotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    edad INT,
    sexo VARCHAR(10),
    imagen VARCHAR(200) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;

INSERT INTO mascotas (nombre, especie, edad, sexo, imagen) VALUES
    ('Luna', 'Perro', 3, 'F', 'luna.jpg'),
    ('Milo', 'Gato', 2, 'M', 'milo.jpg');

SELECT * FROM mascotas;