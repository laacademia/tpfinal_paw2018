--postgres
ALTER TABLE ubicacion ADD COLUMN titulo character varying(60);
ALTER TABLE ubicacion ADD COLUMN subtitulo character varying(120);
ALTER TABLE ubicacion ADD COLUMN descripcion_texto character varying(255);
ALTER TABLE ubicacion ADD COLUMN horario character varying(255);
ALTER TABLE ubicacion ADD COLUMN direccion character varying;
ALTER TABLE ubicacion ADD COLUMN telefono character varying(60);
--mysql
ALTER TABLE ubicacion ADD COLUMN titulo varchar(60);
ALTER TABLE ubicacion ADD COLUMN subtitulo varchar(120);
ALTER TABLE ubicacion ADD COLUMN descripcion_texto varchar(255);
ALTER TABLE ubicacion ADD COLUMN horario varchar(255);
ALTER TABLE ubicacion ADD COLUMN direccion varchar;
ALTER TABLE ubicacion ADD COLUMN telefono varchar(60);
