CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(255) NOT NULL,
    correo_usuario VARCHAR(255) NOT NULL UNIQUE,
    contrasena_usuario VARCHAR(255) NOT NULL,
    tipo_usuario ENUM('usuario', 'administrador') NOT NULL
);

-- Crear la tabla de tipos de archivo
CREATE TABLE tipos_archivo (
    id_tipo_archivo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_tipo VARCHAR(50) NOT NULL
);

-- Crear la tabla de archivos
CREATE TABLE archivos (
    id_archivo INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    autor VARCHAR(255),
    fecha DATE,
    ruta_archivo VARCHAR(500) NOT NULL,  -- Ruta del archivo en el servidor
    id_usuario INT NOT NULL,            -- Relación con el usuario que subió el archivo
    id_tipo_archivo INT NOT NULL,       -- Relación con el tipo de archivo
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_tipo_archivo) REFERENCES tipos_archivo(id_tipo_archivo)
);

-- Ejemplo de inserción en la tabla usuarios (en un entorno real, las contraseñas deben ser encriptadas)
INSERT INTO tipos_archivo (nombre_tipo) VALUES
('Libros y monografía'),
('Manuscritos'),
('Fotografías'),
('Partituras');

-- Ejemplo de inserción en la tabla usuarios (en un entorno real, las contraseñas deben ser encriptadas)

INSERT INTO usuarios (nombre_usuario, correo_usuario, contrasena_usuario, tipo_usuario)
VALUES ('admin', 'admin@correo.com', 'password_admin', 'administrador'),
       ('usuario1', 'usuario1@correo.com', 'password_usuario', 'usuario');

-- Ejemplo de inserción en la tabla archivos
INSERT INTO archivos (titulo, descripcion, autor, fecha, ruta_archivo, id_usuario, id_tipo_archivo)
VALUES ('Libro 1', 'Descripción del libro 1', 'Autor 1', '2024-12-07', '/archivos/libros/libro1.pdf', 1, 1),
       ('Manuscrito 1', 'Descripción del manuscrito 1', 'Autor 2', '2024-12-06', '/archivos/manuscritos/manuscrito1.pdf', 2, 2),
       ('Fotografía 1', 'Descripción de la fotografía 1', 'Autor 3', '2024-12-05', '/archivos/fotografias/foto1.jpg', 2, 3);