CREATE DATABASE IF NOT EXISTS 'paw2018_tp2_reinaudi_garay';

CREATE TABLE `articulo` (
  `id` int(8) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `imagen` blob,
  `fecha_publicacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mime` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `comentario` (
  `id` int(8) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `id_articulo` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE `tag` (
  `id` int(8) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `id_articulo` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_ibfk_1` (`id_articulo`);

ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_ibfk_1` (`id_articulo`);

ALTER TABLE `articulo`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `comentario`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `tag`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id`) ON DELETE CASCADE;

ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id`) ON DELETE CASCADE;

CREATE TABLE `imagen` (
  `id` int(8) NOT NULL,
  `imagen` mediumblob,  
  `mime` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `imagen`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


CREATE TABLE `tag` (
  `id` int(8) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `id_articulo` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`);

CREATE TABLE `turno` (
  `id` int(8) UNSIGNED NOT NULL,
  `titulo` int(8) NOT NULL,
  `nombre` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `telefono` text COLLATE utf8_bin NOT NULL,
   `calzado` int(8) NOT NULL,
    `altura` int(8) NOT NULL,
   `fecha_nacimiento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color_pelo` text COLLATE utf8_bin NOT NULL,
     `turno` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `turno`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
