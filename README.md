# 🐶 CRUD de Mascotas - CodeIgniter 4

Este es un proyecto de ejemplo hecho en CodeIgniter 4, que implementa un CRUD (Crear, Leer, Actualizar y Eliminar) para gestionar mascotas.

## 📋 Nombre del Archivo es:
- mascota

## 📋 Características

Registro de mascotas con los siguientes datos:

- Nombre
- Especie
- Edad
- Sexo (Macho / Hembra)
- Dueño
- Imagen

Operaciones disponibles:

- Crear nueva mascota
- Listar todas las mascotas
- Editar datos de una mascota
- Eliminar mascota

## 🚀 Instalación en Laragon

1. Clona o copia este proyecto en la carpeta:
- C:\laragon\www\mascota


2. Crea la base de datos en **HeidiSQL** o en consola MySQL:

```sql
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
);
```

3. El archivo env renómbralo como .env:

4. Inicia Laragon y abre el navegador en:

- http://mascota.test/mascotas

## 📂 Estructura del proyecto
```
app/
  Controllers/
    MascotaController.php   # Controlador del CRUD
  Models/
    Mascota.php             # Modelo de la tabla mascotas
  Views/
    mascotas/
      crear.php             # Vista para crear mascotas
      editar.php            # Vista para editar mascotas
      listar.php            # Vista para listar mascotas
      perfil.php            # Vista con cards de mascotas
    Layouts/
      header.php            # Cabecera del sitio
      footer.php            # Pie de página
public/
  uploads/                  # Carpeta donde se guardan las imágenes
.env                       # Archivo de configuración de la base de datos
```
- **En el github el Archivo esta asi "env" lo renómbralo como ".env"**

## 🖼️ Vista de Perfil (perfil.php)
En la vista Views/mascotas/perfil.php se muestran las mascotas registradas usando cards de Bootstrap, para que se vea más visual. Cada card contiene:

- Imagen de la mascota 

- Nombre de la mascota

- Especie

- Edad

- Sexo

- Dueño

- Fecha de registro

Esto permite que los usuarios vean rápidamente la información

## 🖥️ Uso del CRUD
1. Listar mascotas:
Ve a http://mascota.test/mascotas/listar para ver la lista completa.
Aquí se pueden eliminar o editar mascotas.

2. Crear mascota:
Ve a http://mascota.test/mascotas/crear para registrar una nueva mascota.

3. Editar mascota:
Desde la lista de mascotas, haz clic en Editar para modificar los datos.

4. Eliminar mascota:
Desde la lista de mascotas, haz clic en Eliminar para borrar un registro.
