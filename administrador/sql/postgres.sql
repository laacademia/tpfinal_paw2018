begin transaction;
--rollback;
create table categoria(
    id serial not null,
    descripcion character varying(255) not null,
    CONSTRAINT pk_categoria PRIMARY KEY (id)
);
INSERT INTO categoria (id, descripcion) VALUES (1, 'Novedades'), (2, 'Eventos'), (3, 'Noticias');

CREATE TABLE noticia (
  id serial not null,
  titulo character varying (255) NOT NULL,
  descripcion character varying NOT NULL,
  imagen bytea NOT NULL,
  fecha timestamp NOT NULL DEFAULT NOW(),
  subtitulo character varying (255) NOT NULL,
  CONSTRAINT pk_noticia PRIMARY KEY (id)
);

CREATE TABLE categoria_noticia (
  id SERIAL NOT NULL,
  id_noticia INTEGER NOT NULL,
  id_categoria INTEGER NOT NULL,
  CONSTRAINT pk_categoria_noticia PRIMARY KEY (id),
  CONSTRAINT fk_categoria_noticia__noticia FOREIGN KEY (id_noticia) REFERENCES noticia(id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_categoria_noticia__categoria FOREIGN KEY (id_categoria) REFERENCES categoria (id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE galeria_home (
  id serial NOT NULL,
  nombre character varying(60) NOT NULL,
  alt character varying(60) NOT NULL,
  imagen bytea NOT NULL,
  CONSTRAINT pk_galeria_home PRIMARY KEY (id)
);

CREATE TABLE quienes_somos (
  id serial NOT NULL,
  titulo character varying(60),
  descripcion character varying NOT NULL,
  imagen_fondo bytea,
  CONSTRAINT pk_quienes_somos PRIMARY KEY (id)
);
INSERT INTO quienes_somos (id, titulo, descripcion, imagen_fondo) VALUES
(1, 'DADADA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL);

CREATE TABLE ubicacion (
  id serial NOT NULL,
  descripcion character varying(500) NOT NULL,
  latitud float NOT NULL,
  longitud float NOT NULL,
  CONSTRAINT pk_ubicacion PRIMARY KEY (id)
);
INSERT INTO ubicacion (id, descripcion, latitud, longitud) VALUES (1, 'Mi Ubicacion', -34.5772, -59.0895);

CREATE TABLE usuario (
  id SERIAL NOT NULL,
  usuario character varying(255) NOT NULL,
  nombre character varying(255) NOT NULL,
  apellido character varying(255) NOT NULL,
  fecha_nacimiento date NOT NULL,
  password text,
  CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

commit