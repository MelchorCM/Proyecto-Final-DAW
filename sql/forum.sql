CREATE USER 'adminforo' IDENTIFIED BY 'usuario';

# Creamos la base de datos

CREATE DATABASE fororeptil DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci; 
USE fororeptil;

# Estructura

CREATE TABLE temas (
    id INTEGER(5) PRIMARY KEY not null auto_increment,
    titulo varchar(100) not null default '',
    fecha DATE not null,
    descripcion TEXT not null,
    categoria enum('otros','reptiles','anfibios','artropodos','insectos') NOT NULL default 'otros',
    id_usuario INTEGER,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id)
)ENGINE=MyISAM;

CREATE TABLE mensajes (
    id INTEGER(5) PRIMARY KEY not null auto_increment,
    mensaje TEXT not null,
    fecha DATE not null,
    id_usuario INTEGER,
    id_tema INTEGER,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_tema) REFERENCES tema(id)
)ENGINE=MyISAM;

CREATE TABLE usuarios (
  id INTEGER(5) PRIMARY KEY not null auto_increment,
  usuario varchar(100) NOT NULL,
  contraseña varchar(32) NOT NULL,
  tipo enum('admin','usuario') NOT NULL
) ENGINE=MyISAM;