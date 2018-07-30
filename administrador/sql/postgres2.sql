--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.9
-- Dumped by pg_dump version 10.1

-- Started on 2018-06-11 13:42:58 ART

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'SQL_ASCII';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2121 (class 1262 OID 957531)
-- Name: paw_tpfinal; Type: DATABASE; Schema: -; Owner: -
--

CREATE DATABASE paw_tpfinal WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF8' LC_CTYPE = 'en_US.UTF8';


\connect paw_tpfinal

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'SQL_ASCII';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 11905)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2124 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 174 (class 1259 OID 957613)
-- Name: categoria; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE categoria (
    id integer NOT NULL,
    descripcion character varying(255) NOT NULL
);


--
-- TOC entry 173 (class 1259 OID 957611)
-- Name: categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2125 (class 0 OID 0)
-- Dependencies: 173
-- Name: categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE categoria_id_seq OWNED BY categoria.id;


--
-- TOC entry 178 (class 1259 OID 957633)
-- Name: categoria_noticia; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE categoria_noticia (
    id integer NOT NULL,
    id_noticia integer NOT NULL,
    id_categoria integer NOT NULL
);


--
-- TOC entry 177 (class 1259 OID 957631)
-- Name: categoria_noticia_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE categoria_noticia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2126 (class 0 OID 0)
-- Dependencies: 177
-- Name: categoria_noticia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE categoria_noticia_id_seq OWNED BY categoria_noticia.id;


--
-- TOC entry 180 (class 1259 OID 957651)
-- Name: galeria_home; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE galeria_home (
    id integer NOT NULL,
    nombre character varying(60) NOT NULL,
    alt character varying(60) NOT NULL,
    imagen bytea NOT NULL
);


--
-- TOC entry 179 (class 1259 OID 957649)
-- Name: galeria_home_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE galeria_home_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2127 (class 0 OID 0)
-- Dependencies: 179
-- Name: galeria_home_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE galeria_home_id_seq OWNED BY galeria_home.id;


--
-- TOC entry 176 (class 1259 OID 957621)
-- Name: noticia; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE noticia (
    id integer NOT NULL,
    titulo character varying(255) NOT NULL,
    descripcion character varying NOT NULL,
    imagen bytea NOT NULL,
    fecha timestamp without time zone DEFAULT now() NOT NULL,
    subtitulo character varying(255) NOT NULL
);


--
-- TOC entry 175 (class 1259 OID 957619)
-- Name: noticia_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE noticia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2128 (class 0 OID 0)
-- Dependencies: 175
-- Name: noticia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE noticia_id_seq OWNED BY noticia.id;


--
-- TOC entry 182 (class 1259 OID 957662)
-- Name: quienes_somos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE quienes_somos (
    id integer NOT NULL,
    titulo character varying(60),
    descripcion character varying NOT NULL,
    imagen_fondo bytea
);


--
-- TOC entry 181 (class 1259 OID 957660)
-- Name: quienes_somos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE quienes_somos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2129 (class 0 OID 0)
-- Dependencies: 181
-- Name: quienes_somos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE quienes_somos_id_seq OWNED BY quienes_somos.id;


--
-- TOC entry 184 (class 1259 OID 957673)
-- Name: ubicacion; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ubicacion (
    id integer NOT NULL,
    descripcion character varying(500) NOT NULL,
    latitud double precision NOT NULL,
    longitud double precision NOT NULL,
    letra_marcador "char"
);


--
-- TOC entry 183 (class 1259 OID 957671)
-- Name: ubicacion_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ubicacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2130 (class 0 OID 0)
-- Dependencies: 183
-- Name: ubicacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ubicacion_id_seq OWNED BY ubicacion.id;


--
-- TOC entry 186 (class 1259 OID 957684)
-- Name: usuario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE usuario (
    id integer NOT NULL,
    usuario character varying(255) NOT NULL,
    nombre character varying(255) NOT NULL,
    apellido character varying(255) NOT NULL,
    fecha_nacimiento date NOT NULL,
    password text
);


--
-- TOC entry 185 (class 1259 OID 957682)
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2131 (class 0 OID 0)
-- Dependencies: 185
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuario.id;


--
-- TOC entry 1970 (class 2604 OID 957616)
-- Name: categoria id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY categoria ALTER COLUMN id SET DEFAULT nextval('categoria_id_seq'::regclass);


--
-- TOC entry 1973 (class 2604 OID 957636)
-- Name: categoria_noticia id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY categoria_noticia ALTER COLUMN id SET DEFAULT nextval('categoria_noticia_id_seq'::regclass);


--
-- TOC entry 1974 (class 2604 OID 957654)
-- Name: galeria_home id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY galeria_home ALTER COLUMN id SET DEFAULT nextval('galeria_home_id_seq'::regclass);


--
-- TOC entry 1971 (class 2604 OID 957624)
-- Name: noticia id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY noticia ALTER COLUMN id SET DEFAULT nextval('noticia_id_seq'::regclass);


--
-- TOC entry 1975 (class 2604 OID 957665)
-- Name: quienes_somos id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY quienes_somos ALTER COLUMN id SET DEFAULT nextval('quienes_somos_id_seq'::regclass);


--
-- TOC entry 1976 (class 2604 OID 957676)
-- Name: ubicacion id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ubicacion ALTER COLUMN id SET DEFAULT nextval('ubicacion_id_seq'::regclass);


--
-- TOC entry 1977 (class 2604 OID 957687)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuario ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- TOC entry 2104 (class 0 OID 957613)
-- Dependencies: 174
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO categoria VALUES (1, 'Novedades');
INSERT INTO categoria VALUES (2, 'Eventos');
INSERT INTO categoria VALUES (3, 'Noticias');


--
-- TOC entry 2108 (class 0 OID 957633)
-- Dependencies: 178
-- Data for Name: categoria_noticia; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2110 (class 0 OID 957651)
-- Dependencies: 180
-- Data for Name: galeria_home; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2106 (class 0 OID 957621)
-- Dependencies: 176
-- Data for Name: noticia; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2112 (class 0 OID 957662)
-- Dependencies: 182
-- Data for Name: quienes_somos; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO quienes_somos VALUES (1, 'DADADA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL);


--
-- TOC entry 2114 (class 0 OID 957673)
-- Dependencies: 184
-- Data for Name: ubicacion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO ubicacion VALUES (1, 'Mi Ubicacion', -34.5771999999999977, -59.089500000000001, 'A');
INSERT INTO ubicacion VALUES (5, 'Baum', -34.5682580000000002, -59.1039329999999978, 'V');


--
-- TOC entry 2116 (class 0 OID 957684)
-- Dependencies: 186
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO usuario VALUES (4, 'admin', 'admin', 'toba', '2000-01-01', 'admin');


--
-- TOC entry 2132 (class 0 OID 0)
-- Dependencies: 173
-- Name: categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('categoria_id_seq', 1, false);


--
-- TOC entry 2133 (class 0 OID 0)
-- Dependencies: 177
-- Name: categoria_noticia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('categoria_noticia_id_seq', 1, false);


--
-- TOC entry 2134 (class 0 OID 0)
-- Dependencies: 179
-- Name: galeria_home_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('galeria_home_id_seq', 1, false);


--
-- TOC entry 2135 (class 0 OID 0)
-- Dependencies: 175
-- Name: noticia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('noticia_id_seq', 1, false);


--
-- TOC entry 2136 (class 0 OID 0)
-- Dependencies: 181
-- Name: quienes_somos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('quienes_somos_id_seq', 1, false);


--
-- TOC entry 2137 (class 0 OID 0)
-- Dependencies: 183
-- Name: ubicacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('ubicacion_id_seq', 5, true);


--
-- TOC entry 2138 (class 0 OID 0)
-- Dependencies: 185
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('usuarios_id_seq', 4, true);


--
-- TOC entry 1979 (class 2606 OID 957618)
-- Name: categoria pk_categoria; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY categoria
    ADD CONSTRAINT pk_categoria PRIMARY KEY (id);


--
-- TOC entry 1983 (class 2606 OID 957638)
-- Name: categoria_noticia pk_categoria_noticia; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY categoria_noticia
    ADD CONSTRAINT pk_categoria_noticia PRIMARY KEY (id);


--
-- TOC entry 1985 (class 2606 OID 957659)
-- Name: galeria_home pk_galeria_home; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY galeria_home
    ADD CONSTRAINT pk_galeria_home PRIMARY KEY (id);


--
-- TOC entry 1981 (class 2606 OID 957630)
-- Name: noticia pk_noticia; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY noticia
    ADD CONSTRAINT pk_noticia PRIMARY KEY (id);


--
-- TOC entry 1987 (class 2606 OID 957670)
-- Name: quienes_somos pk_quienes_somos; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY quienes_somos
    ADD CONSTRAINT pk_quienes_somos PRIMARY KEY (id);


--
-- TOC entry 1989 (class 2606 OID 957681)
-- Name: ubicacion pk_ubicacion; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ubicacion
    ADD CONSTRAINT pk_ubicacion PRIMARY KEY (id);


--
-- TOC entry 1991 (class 2606 OID 957692)
-- Name: usuario pk_usuarios; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT pk_usuarios PRIMARY KEY (id);


--
-- TOC entry 1993 (class 2606 OID 957644)
-- Name: categoria_noticia fk_categoria_noticia__categoria; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY categoria_noticia
    ADD CONSTRAINT fk_categoria_noticia__categoria FOREIGN KEY (id_categoria) REFERENCES categoria(id);


--
-- TOC entry 1992 (class 2606 OID 957639)
-- Name: categoria_noticia fk_categoria_noticia__noticia; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY categoria_noticia
    ADD CONSTRAINT fk_categoria_noticia__noticia FOREIGN KEY (id_noticia) REFERENCES noticia(id);


--
-- TOC entry 2123 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: -
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2018-06-11 13:42:58 ART

--
-- PostgreSQL database dump complete
--

