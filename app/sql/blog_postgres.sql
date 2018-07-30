--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.9
-- Dumped by pg_dump version 10.1

-- Started on 2018-04-16 10:45:50 ART

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
-- TOC entry 2072 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 174 (class 1259 OID 851917)
-- Name: articulo; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE articulo (
    id integer NOT NULL,
    titulo character varying(255) NOT NULL,
    descripcion character varying,
    fecha_publicacion date DEFAULT now() NOT NULL
);


--
-- TOC entry 173 (class 1259 OID 851915)
-- Name: articulo_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE articulo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2073 (class 0 OID 0)
-- Dependencies: 173
-- Name: articulo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE articulo_id_seq OWNED BY articulo.id;


--
-- TOC entry 176 (class 1259 OID 851929)
-- Name: comentario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE comentario (
    id integer NOT NULL,
    descripcion character varying NOT NULL,
    id_articulo integer NOT NULL
);


--
-- TOC entry 175 (class 1259 OID 851927)
-- Name: comentario_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE comentario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2074 (class 0 OID 0)
-- Dependencies: 175
-- Name: comentario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE comentario_id_seq OWNED BY comentario.id;


--
-- TOC entry 177 (class 1259 OID 851943)
-- Name: tag; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE tag (
    id integer NOT NULL,
    descripcion character varying NOT NULL,
    id_articulo integer NOT NULL
);


--
-- TOC entry 178 (class 1259 OID 851946)
-- Name: tag_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE tag_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2075 (class 0 OID 0)
-- Dependencies: 178
-- Name: tag_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE tag_id_seq OWNED BY tag.id;


--
-- TOC entry 1944 (class 2604 OID 851920)
-- Name: articulo id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY articulo ALTER COLUMN id SET DEFAULT nextval('articulo_id_seq'::regclass);


--
-- TOC entry 1946 (class 2604 OID 851932)
-- Name: comentario id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY comentario ALTER COLUMN id SET DEFAULT nextval('comentario_id_seq'::regclass);


--
-- TOC entry 1947 (class 2604 OID 851948)
-- Name: tag id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY tag ALTER COLUMN id SET DEFAULT nextval('tag_id_seq'::regclass);


--
-- TOC entry 1949 (class 2606 OID 851926)
-- Name: articulo pk_articulo; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY articulo
    ADD CONSTRAINT pk_articulo PRIMARY KEY (id);


--
-- TOC entry 1951 (class 2606 OID 851937)
-- Name: comentario pk_comentarios; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY comentario
    ADD CONSTRAINT pk_comentarios PRIMARY KEY (id);


--
-- TOC entry 1953 (class 2606 OID 851956)
-- Name: tag pk_tags; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY tag
    ADD CONSTRAINT pk_tags PRIMARY KEY (id);


--
-- TOC entry 1954 (class 2606 OID 851938)
-- Name: comentario fk_comentario_articulo; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY comentario
    ADD CONSTRAINT fk_comentario_articulo FOREIGN KEY (id_articulo) REFERENCES articulo(id);


--
-- TOC entry 1955 (class 2606 OID 851957)
-- Name: tag fk_tags_articulo; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY tag
    ADD CONSTRAINT fk_tags_articulo FOREIGN KEY (id_articulo) REFERENCES articulo(id);


--
-- TOC entry 2071 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: -
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2018-04-16 10:45:50 ART

--
-- PostgreSQL database dump complete
--

