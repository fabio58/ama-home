--
-- PostgreSQL database dump
--

-- Dumped from database version 11.6
-- Dumped by pg_dump version 11.6

-- Started on 2020-02-27 15:04:50

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 237 (class 1259 OID 66798)
-- Name: activations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.activations (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    used boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.activations OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 66806)
-- Name: admin_activations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin_activations (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    used boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.admin_activations OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 66814)
-- Name: admin_password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin_password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.admin_password_resets OWNER TO postgres;

--
-- TOC entry 241 (class 1259 OID 66823)
-- Name: admin_users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin_users (
    id integer NOT NULL,
    first_name character varying(255),
    last_name character varying(255),
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    activated boolean DEFAULT false NOT NULL,
    forbidden boolean DEFAULT false NOT NULL,
    language character varying(2) DEFAULT 'en'::character varying NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.admin_users OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 66821)
-- Name: admin_users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.admin_users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.admin_users_id_seq OWNER TO postgres;

--
-- TOC entry 3233 (class 0 OID 0)
-- Dependencies: 240
-- Name: admin_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.admin_users_id_seq OWNED BY public.admin_users.id;


--
-- TOC entry 196 (class 1259 OID 66317)
-- Name: applicant_answers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applicant_answers (
    id bigint NOT NULL,
    applicant_questionnaire_id smallint,
    answer character(1),
    extended_value character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    question_id smallint
);


ALTER TABLE public.applicant_answers OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 66320)
-- Name: applicant_answers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applicant_answers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.applicant_answers_id_seq OWNER TO postgres;

--
-- TOC entry 3234 (class 0 OID 0)
-- Dependencies: 197
-- Name: applicant_answers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.applicant_answers_id_seq OWNED BY public.applicant_answers.id;


--
-- TOC entry 198 (class 1259 OID 66322)
-- Name: applicant_contact_methods; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applicant_contact_methods (
    id smallint NOT NULL,
    applicant_id bigint,
    contact_method_id smallint,
    description character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.applicant_contact_methods OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 66325)
-- Name: applicant_contact_methods_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applicant_contact_methods_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.applicant_contact_methods_id_seq OWNER TO postgres;

--
-- TOC entry 3235 (class 0 OID 0)
-- Dependencies: 199
-- Name: applicant_contact_methods_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.applicant_contact_methods_id_seq OWNED BY public.applicant_contact_methods.id;


--
-- TOC entry 200 (class 1259 OID 66327)
-- Name: applicant_disabilities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applicant_disabilities (
    id smallint NOT NULL,
    applicant_id bigint NOT NULL,
    disability_id smallint NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.applicant_disabilities OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 66330)
-- Name: applicant_disabilities_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applicant_disabilities_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.applicant_disabilities_id_seq OWNER TO postgres;

--
-- TOC entry 3236 (class 0 OID 0)
-- Dependencies: 201
-- Name: applicant_disabilities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.applicant_disabilities_id_seq OWNED BY public.applicant_disabilities.id;


--
-- TOC entry 202 (class 1259 OID 66332)
-- Name: applicant_diseases; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applicant_diseases (
    id smallint NOT NULL,
    applicant_id bigint NOT NULL,
    disease_id smallint NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.applicant_diseases OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 66335)
-- Name: applicant_diseases_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applicant_diseases_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.applicant_diseases_id_seq OWNER TO postgres;

--
-- TOC entry 3237 (class 0 OID 0)
-- Dependencies: 203
-- Name: applicant_diseases_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.applicant_diseases_id_seq OWNED BY public.applicant_diseases.id;


--
-- TOC entry 260 (class 1259 OID 90124)
-- Name: applicant_documents; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applicant_documents (
    id smallint NOT NULL,
    applicant_id bigint,
    document_id smallint,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.applicant_documents OWNER TO postgres;

--
-- TOC entry 259 (class 1259 OID 90122)
-- Name: applicant_documents_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applicant_documents_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.applicant_documents_id_seq OWNER TO postgres;

--
-- TOC entry 3238 (class 0 OID 0)
-- Dependencies: 259
-- Name: applicant_documents_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.applicant_documents_id_seq OWNED BY public.applicant_documents.id;


--
-- TOC entry 230 (class 1259 OID 66726)
-- Name: applicant_questionnaires_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applicant_questionnaires_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.applicant_questionnaires_id_seq OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 66749)
-- Name: applicant_questionnaires; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applicant_questionnaires (
    id smallint DEFAULT nextval('public.applicant_questionnaires_id_seq'::regclass) NOT NULL,
    applicant_id bigint,
    quiestionnaire_template_id smallint
);


ALTER TABLE public.applicant_questionnaires OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 66342)
-- Name: applicant_relationships; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applicant_relationships (
    id smallint NOT NULL,
    name character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.applicant_relationships OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 66345)
-- Name: applicant_relationships_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applicant_relationships_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.applicant_relationships_id_seq OWNER TO postgres;

--
-- TOC entry 3239 (class 0 OID 0)
-- Dependencies: 205
-- Name: applicant_relationships_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.applicant_relationships_id_seq OWNED BY public.applicant_relationships.id;


--
-- TOC entry 206 (class 1259 OID 66347)
-- Name: applicant_statuses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applicant_statuses (
    id smallint NOT NULL,
    applicant_id bigint,
    status_id smallint,
    file_number character varying(20),
    financial_entity_id character varying(20),
    atc_id character varying(20),
    entity_id character varying(20),
    user_id integer,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.applicant_statuses OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 66350)
-- Name: applicant_statuses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applicant_statuses_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.applicant_statuses_id_seq OWNER TO postgres;

--
-- TOC entry 3240 (class 0 OID 0)
-- Dependencies: 207
-- Name: applicant_statuses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.applicant_statuses_id_seq OWNED BY public.applicant_statuses.id;


--
-- TOC entry 208 (class 1259 OID 66352)
-- Name: applicants; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applicants (
    id bigint NOT NULL,
    names character varying(255),
    last_names character varying(255),
    birthdate timestamp without time zone,
    gender character(1),
    state_id smallint,
    city_id bigint,
    education_level smallint,
    government_id character varying(20),
    marital_status character(5),
    pregnant boolean,
    pregnancy_due_date smallint,
    parent_applicant bigint,
    applicant_relationship smallint,
    cadaster character varying(255),
    property_id character varying(255),
    occupation character varying(255),
    monthly_income numeric(10,0),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone
);


ALTER TABLE public.applicants OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 66358)
-- Name: applicants_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applicants_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.applicants_id_seq OWNER TO postgres;

--
-- TOC entry 3241 (class 0 OID 0)
-- Dependencies: 209
-- Name: applicants_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.applicants_id_seq OWNED BY public.applicants.id;


--
-- TOC entry 210 (class 1259 OID 66360)
-- Name: cities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cities (
    id bigint NOT NULL,
    name character varying(255),
    state_id smallint,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.cities OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 66363)
-- Name: cities_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cities_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cities_id_seq OWNER TO postgres;

--
-- TOC entry 3242 (class 0 OID 0)
-- Dependencies: 211
-- Name: cities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cities_id_seq OWNED BY public.cities.id;


--
-- TOC entry 212 (class 1259 OID 66365)
-- Name: contact_methods; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contact_methods (
    id smallint NOT NULL,
    name character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.contact_methods OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 66368)
-- Name: contact_methods_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.contact_methods_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contact_methods_id_seq OWNER TO postgres;

--
-- TOC entry 3243 (class 0 OID 0)
-- Dependencies: 213
-- Name: contact_methods_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.contact_methods_id_seq OWNED BY public.contact_methods.id;


--
-- TOC entry 214 (class 1259 OID 66370)
-- Name: disabilities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.disabilities (
    id smallint NOT NULL,
    name character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.disabilities OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 66373)
-- Name: disabilities_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.disabilities_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.disabilities_id_seq OWNER TO postgres;

--
-- TOC entry 3244 (class 0 OID 0)
-- Dependencies: 215
-- Name: disabilities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.disabilities_id_seq OWNED BY public.disabilities.id;


--
-- TOC entry 216 (class 1259 OID 66375)
-- Name: diseases; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.diseases (
    id smallint NOT NULL,
    name character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.diseases OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 66378)
-- Name: diseases_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.diseases_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.diseases_id_seq OWNER TO postgres;

--
-- TOC entry 3245 (class 0 OID 0)
-- Dependencies: 217
-- Name: diseases_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.diseases_id_seq OWNED BY public.diseases.id;


--
-- TOC entry 258 (class 1259 OID 90115)
-- Name: document_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.document_types (
    id smallint NOT NULL,
    name character varying(255),
    enabled boolean DEFAULT true,
    type character(1),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.document_types OWNER TO postgres;

--
-- TOC entry 257 (class 1259 OID 90113)
-- Name: document_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.document_types_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.document_types_id_seq OWNER TO postgres;

--
-- TOC entry 3246 (class 0 OID 0)
-- Dependencies: 257
-- Name: document_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.document_types_id_seq OWNED BY public.document_types.id;


--
-- TOC entry 218 (class 1259 OID 66380)
-- Name: education_levels; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.education_levels (
    id smallint NOT NULL,
    name character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.education_levels OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 66383)
-- Name: education_levels_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.education_levels_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.education_levels_id_seq OWNER TO postgres;

--
-- TOC entry 3247 (class 0 OID 0)
-- Dependencies: 219
-- Name: education_levels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.education_levels_id_seq OWNED BY public.education_levels.id;


--
-- TOC entry 245 (class 1259 OID 66852)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 66850)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 3248 (class 0 OID 0)
-- Dependencies: 244
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 247 (class 1259 OID 66864)
-- Name: media; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.media (
    id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL,
    collection_name character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    file_name character varying(255) NOT NULL,
    mime_type character varying(255),
    disk character varying(255) NOT NULL,
    size bigint NOT NULL,
    manipulations json NOT NULL,
    custom_properties json NOT NULL,
    responsive_images json NOT NULL,
    order_column integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.media OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 66862)
-- Name: media_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.media_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.media_id_seq OWNER TO postgres;

--
-- TOC entry 3249 (class 0 OID 0)
-- Dependencies: 246
-- Name: media_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.media_id_seq OWNED BY public.media.id;


--
-- TOC entry 233 (class 1259 OID 66772)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 66770)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 3250 (class 0 OID 0)
-- Dependencies: 232
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 252 (class 1259 OID 66896)
-- Name: model_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.model_has_permissions (
    permission_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);


ALTER TABLE public.model_has_permissions OWNER TO postgres;

--
-- TOC entry 253 (class 1259 OID 66907)
-- Name: model_has_roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.model_has_roles (
    role_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);


ALTER TABLE public.model_has_roles OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 66791)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- TOC entry 249 (class 1259 OID 66876)
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- TOC entry 248 (class 1259 OID 66874)
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permissions_id_seq OWNER TO postgres;

--
-- TOC entry 3251 (class 0 OID 0)
-- Dependencies: 248
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- TOC entry 220 (class 1259 OID 66427)
-- Name: questionnaire_template_questions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.questionnaire_template_questions (
    id smallint NOT NULL,
    questionnaire_template_id smallint,
    question character varying(255),
    question_type character(1),
    "values" character varying(255),
    extended_value boolean DEFAULT false,
    extended_placeholder character varying(255),
    "order" smallint,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.questionnaire_template_questions OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 66434)
-- Name: questionnaire_template_questions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.questionnaire_template_questions_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.questionnaire_template_questions_id_seq OWNER TO postgres;

--
-- TOC entry 3252 (class 0 OID 0)
-- Dependencies: 221
-- Name: questionnaire_template_questions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.questionnaire_template_questions_id_seq OWNED BY public.questionnaire_template_questions.id;


--
-- TOC entry 222 (class 1259 OID 66436)
-- Name: questionnaire_templates; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.questionnaire_templates (
    id smallint NOT NULL,
    name character varying(255),
    enabled boolean DEFAULT true,
    questionnaire_type_id smallint,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.questionnaire_templates OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 66440)
-- Name: questionnaire_templates_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.questionnaire_templates_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.questionnaire_templates_id_seq OWNER TO postgres;

--
-- TOC entry 3253 (class 0 OID 0)
-- Dependencies: 223
-- Name: questionnaire_templates_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.questionnaire_templates_id_seq OWNED BY public.questionnaire_templates.id;


--
-- TOC entry 224 (class 1259 OID 66442)
-- Name: questionnaire_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.questionnaire_types (
    id smallint NOT NULL,
    name character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.questionnaire_types OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 66445)
-- Name: questionnaire_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.questionnaire_types_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.questionnaire_types_id_seq OWNER TO postgres;

--
-- TOC entry 3254 (class 0 OID 0)
-- Dependencies: 225
-- Name: questionnaire_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.questionnaire_types_id_seq OWNED BY public.questionnaire_types.id;


--
-- TOC entry 254 (class 1259 OID 66918)
-- Name: role_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.role_has_permissions (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);


ALTER TABLE public.role_has_permissions OWNER TO postgres;

--
-- TOC entry 251 (class 1259 OID 66887)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- TOC entry 250 (class 1259 OID 66885)
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO postgres;

--
-- TOC entry 3255 (class 0 OID 0)
-- Dependencies: 250
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- TOC entry 226 (class 1259 OID 66458)
-- Name: states; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.states (
    id smallint NOT NULL,
    name character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.states OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 66461)
-- Name: states_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.states_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.states_id_seq OWNER TO postgres;

--
-- TOC entry 3256 (class 0 OID 0)
-- Dependencies: 227
-- Name: states_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.states_id_seq OWNED BY public.states.id;


--
-- TOC entry 228 (class 1259 OID 66463)
-- Name: statuses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.statuses (
    id smallint NOT NULL,
    name character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.statuses OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 66466)
-- Name: statuses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.statuses_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.statuses_id_seq OWNER TO postgres;

--
-- TOC entry 3257 (class 0 OID 0)
-- Dependencies: 229
-- Name: statuses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.statuses_id_seq OWNED BY public.statuses.id;


--
-- TOC entry 256 (class 1259 OID 66935)
-- Name: translations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.translations (
    id integer NOT NULL,
    namespace character varying(255) DEFAULT '*'::character varying NOT NULL,
    "group" character varying(255) NOT NULL,
    key text NOT NULL,
    text jsonb NOT NULL,
    metadata jsonb,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.translations OWNER TO postgres;

--
-- TOC entry 255 (class 1259 OID 66933)
-- Name: translations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.translations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.translations_id_seq OWNER TO postgres;

--
-- TOC entry 3258 (class 0 OID 0)
-- Dependencies: 255
-- Name: translations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.translations_id_seq OWNED BY public.translations.id;


--
-- TOC entry 235 (class 1259 OID 66780)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 66778)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 3259 (class 0 OID 0)
-- Dependencies: 234
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 243 (class 1259 OID 66840)
-- Name: wysiwyg_media; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.wysiwyg_media (
    id integer NOT NULL,
    file_path character varying(255) NOT NULL,
    wysiwygable_id integer,
    wysiwygable_type character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.wysiwyg_media OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 66838)
-- Name: wysiwyg_media_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.wysiwyg_media_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.wysiwyg_media_id_seq OWNER TO postgres;

--
-- TOC entry 3260 (class 0 OID 0)
-- Dependencies: 242
-- Name: wysiwyg_media_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.wysiwyg_media_id_seq OWNED BY public.wysiwyg_media.id;


--
-- TOC entry 2919 (class 2604 OID 66826)
-- Name: admin_users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_users ALTER COLUMN id SET DEFAULT nextval('public.admin_users_id_seq'::regclass);


--
-- TOC entry 2895 (class 2604 OID 66494)
-- Name: applicant_answers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_answers ALTER COLUMN id SET DEFAULT nextval('public.applicant_answers_id_seq'::regclass);


--
-- TOC entry 2896 (class 2604 OID 66495)
-- Name: applicant_contact_methods id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_contact_methods ALTER COLUMN id SET DEFAULT nextval('public.applicant_contact_methods_id_seq'::regclass);


--
-- TOC entry 2897 (class 2604 OID 66496)
-- Name: applicant_disabilities id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_disabilities ALTER COLUMN id SET DEFAULT nextval('public.applicant_disabilities_id_seq'::regclass);


--
-- TOC entry 2898 (class 2604 OID 66497)
-- Name: applicant_diseases id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_diseases ALTER COLUMN id SET DEFAULT nextval('public.applicant_diseases_id_seq'::regclass);


--
-- TOC entry 2933 (class 2604 OID 90127)
-- Name: applicant_documents id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_documents ALTER COLUMN id SET DEFAULT nextval('public.applicant_documents_id_seq'::regclass);


--
-- TOC entry 2899 (class 2604 OID 66499)
-- Name: applicant_relationships id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_relationships ALTER COLUMN id SET DEFAULT nextval('public.applicant_relationships_id_seq'::regclass);


--
-- TOC entry 2900 (class 2604 OID 66500)
-- Name: applicant_statuses id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_statuses ALTER COLUMN id SET DEFAULT nextval('public.applicant_statuses_id_seq'::regclass);


--
-- TOC entry 2901 (class 2604 OID 66501)
-- Name: applicants id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicants ALTER COLUMN id SET DEFAULT nextval('public.applicants_id_seq'::regclass);


--
-- TOC entry 2902 (class 2604 OID 66502)
-- Name: cities id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cities ALTER COLUMN id SET DEFAULT nextval('public.cities_id_seq'::regclass);


--
-- TOC entry 2903 (class 2604 OID 66503)
-- Name: contact_methods id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contact_methods ALTER COLUMN id SET DEFAULT nextval('public.contact_methods_id_seq'::regclass);


--
-- TOC entry 2904 (class 2604 OID 66504)
-- Name: disabilities id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.disabilities ALTER COLUMN id SET DEFAULT nextval('public.disabilities_id_seq'::regclass);


--
-- TOC entry 2905 (class 2604 OID 66505)
-- Name: diseases id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diseases ALTER COLUMN id SET DEFAULT nextval('public.diseases_id_seq'::regclass);


--
-- TOC entry 2931 (class 2604 OID 90118)
-- Name: document_types id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.document_types ALTER COLUMN id SET DEFAULT nextval('public.document_types_id_seq'::regclass);


--
-- TOC entry 2906 (class 2604 OID 66506)
-- Name: education_levels id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.education_levels ALTER COLUMN id SET DEFAULT nextval('public.education_levels_id_seq'::regclass);


--
-- TOC entry 2924 (class 2604 OID 66855)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 2926 (class 2604 OID 66867)
-- Name: media id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.media ALTER COLUMN id SET DEFAULT nextval('public.media_id_seq'::regclass);


--
-- TOC entry 2915 (class 2604 OID 66775)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2927 (class 2604 OID 66879)
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- TOC entry 2908 (class 2604 OID 66511)
-- Name: questionnaire_template_questions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire_template_questions ALTER COLUMN id SET DEFAULT nextval('public.questionnaire_template_questions_id_seq'::regclass);


--
-- TOC entry 2910 (class 2604 OID 66512)
-- Name: questionnaire_templates id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire_templates ALTER COLUMN id SET DEFAULT nextval('public.questionnaire_templates_id_seq'::regclass);


--
-- TOC entry 2911 (class 2604 OID 66513)
-- Name: questionnaire_types id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire_types ALTER COLUMN id SET DEFAULT nextval('public.questionnaire_types_id_seq'::regclass);


--
-- TOC entry 2928 (class 2604 OID 66890)
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- TOC entry 2912 (class 2604 OID 66515)
-- Name: states id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.states ALTER COLUMN id SET DEFAULT nextval('public.states_id_seq'::regclass);


--
-- TOC entry 2913 (class 2604 OID 66516)
-- Name: statuses id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.statuses ALTER COLUMN id SET DEFAULT nextval('public.statuses_id_seq'::regclass);


--
-- TOC entry 2929 (class 2604 OID 66938)
-- Name: translations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.translations ALTER COLUMN id SET DEFAULT nextval('public.translations_id_seq'::regclass);


--
-- TOC entry 2916 (class 2604 OID 66783)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 2923 (class 2604 OID 66843)
-- Name: wysiwyg_media id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.wysiwyg_media ALTER COLUMN id SET DEFAULT nextval('public.wysiwyg_media_id_seq'::regclass);


--
-- TOC entry 3204 (class 0 OID 66798)
-- Dependencies: 237
-- Data for Name: activations; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3205 (class 0 OID 66806)
-- Dependencies: 238
-- Data for Name: admin_activations; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3206 (class 0 OID 66814)
-- Dependencies: 239
-- Data for Name: admin_password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3208 (class 0 OID 66823)
-- Dependencies: 241
-- Data for Name: admin_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.admin_users VALUES (1, 'Administrator', 'Administrator', 'administrator@brackets.sk', '$2y$10$Ks1ZxvwA5J012B6YyErkQ.yIhu8ASripC.8Ad7Hsu84JV9014wfym', 'jhbMsWCdl6Af3xQN66ONogACF7fC2TTT62fBt1qOcd2b3VULekDp2MuPYOl7', true, false, 'es', NULL, '2020-02-12 10:27:26', '2020-02-12 10:46:13');
INSERT INTO public.admin_users VALUES (2, 'Javier', 'Mendoza', 'jmendoza@muvh.gov.py', '$2y$10$veuKTzh8LHMzhioYYADk7OvIaw7vxNoyuHtWs5baf50qt.wXckE7S', '7RXyGuWCPwsoQRu2aVueBKx0i4OAFQRngprTNyEGrnscniez8ILZykJpg2XF', true, false, 'es', NULL, '2020-01-10 10:00:27', '2020-02-18 07:52:04');
INSERT INTO public.admin_users VALUES (3, 'Valeria', 'Jensen', 'vjensen@muvh.gov.py', '$2y$10$uqCKxLfwNzRy3MEaB46/u.HzUEyKrKe7WH4P0ogbmZne/FjQznszW', 'f18f7uzDoZJXIWhurRecMYsZ8CnWGUopB6UB6x6bYTaAqbzxVQqNagxshmDJ', true, false, 'es', NULL, '2020-02-18 08:21:48', '2020-02-18 08:21:48');


--
-- TOC entry 3163 (class 0 OID 66317)
-- Dependencies: 196
-- Data for Name: applicant_answers; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.applicant_answers VALUES (1, 1, '1', 'Cuenta con casa propia?', '2020-02-12 11:39:31', '2020-02-12 11:39:35', 1);
INSERT INTO public.applicant_answers VALUES (2, 1, '1', 'La casa donde vive, ¿cuenta con titulo de propiedad a su nombre?', '2020-02-12 11:39:31', '2020-02-12 11:39:35', 1);
INSERT INTO public.applicant_answers VALUES (3, 1, '1', '¿Tiene pagado el 70% o más de su Propiedad?', '2020-02-12 11:39:31', '2020-02-12 11:39:35', 1);
INSERT INTO public.applicant_answers VALUES (4, 1, '1', 'Recibio alguna vez subsidio habitacional del estado', '2020-02-12 11:44:13', '2020-02-12 11:44:16', 1);
INSERT INTO public.applicant_answers VALUES (5, 1, '1', 'Trabaja Actualmente?', '2020-02-12 11:44:13', '2020-02-12 11:44:16', 1);
INSERT INTO public.applicant_answers VALUES (6, 1, '1', '¿Podría Contar con un Ahorro Previo?', '2020-02-12 11:44:13', '2020-02-12 11:44:16', 1);
INSERT INTO public.applicant_answers VALUES (7, 1, '1', '¿Es sujeto de crédito?', '2020-02-12 11:48:14', '2020-02-12 11:48:18', 1);
INSERT INTO public.applicant_answers VALUES (8, 1, '1', 'Recibio alguna vez su conyuge/pareja subsidio habitacional del estado', '2020-02-12 11:48:14', '2020-02-12 11:48:18', 1);


--
-- TOC entry 3165 (class 0 OID 66322)
-- Dependencies: 198
-- Data for Name: applicant_contact_methods; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3167 (class 0 OID 66327)
-- Dependencies: 200
-- Data for Name: applicant_disabilities; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3169 (class 0 OID 66332)
-- Dependencies: 202
-- Data for Name: applicant_diseases; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3227 (class 0 OID 90124)
-- Dependencies: 260
-- Data for Name: applicant_documents; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3198 (class 0 OID 66749)
-- Dependencies: 231
-- Data for Name: applicant_questionnaires; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.applicant_questionnaires VALUES (1, 1, 1);


--
-- TOC entry 3171 (class 0 OID 66342)
-- Dependencies: 204
-- Data for Name: applicant_relationships; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3173 (class 0 OID 66347)
-- Dependencies: 206
-- Data for Name: applicant_statuses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.applicant_statuses VALUES (1, 1, 1, '131', '130', '210', '150', 1, '2020-02-19 09:11:52', '2020-02-19 09:11:59');
INSERT INTO public.applicant_statuses VALUES (2, 2, 2, '897', '120', '230', '145', 1, '2020-02-21 09:16:12', '2020-02-21 09:16:15');


--
-- TOC entry 3175 (class 0 OID 66352)
-- Dependencies: 208
-- Data for Name: applicants; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.applicants VALUES (1, ' MARIA MARGARITA', 'RIVEROS DE SCURA', '2020-02-01 11:20:47', 'F', 1, 1, 2, '593237', 'SOLTE', false, NULL, NULL, NULL, '3232', '23232', 'PROMOTORA', 2500000, NULL, '2020-02-18 14:45:50');
INSERT INTO public.applicants VALUES (2, 'WILDO DANIEL', 'GONZALEZ PORTILLO', '2020-02-25 09:12:49', 'M', 1, 1, NULL, '2188216', 'SOLTE', false, NULL, NULL, NULL, '789', '556', 'COBRADOR', 3000000, '2020-02-20 09:13:45', '2020-02-26 08:40:28');


--
-- TOC entry 3177 (class 0 OID 66360)
-- Dependencies: 210
-- Data for Name: cities; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cities VALUES (1, 'SAN LORENZO', 1, '2020-02-12 11:22:04', '2020-02-12 11:22:08');
INSERT INTO public.cities VALUES (2, 'LAMBARE', 1, '2020-02-12 11:22:04', '2020-02-12 11:22:08');


--
-- TOC entry 3179 (class 0 OID 66365)
-- Dependencies: 212
-- Data for Name: contact_methods; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.contact_methods VALUES (1, 'Dirección particular', NULL, NULL);
INSERT INTO public.contact_methods VALUES (2, 'Dirección laboral', NULL, NULL);
INSERT INTO public.contact_methods VALUES (3, 'Teléfono particular', NULL, NULL);
INSERT INTO public.contact_methods VALUES (4, 'Teléfono laboral', NULL, NULL);
INSERT INTO public.contact_methods VALUES (5, 'Celular', NULL, NULL);
INSERT INTO public.contact_methods VALUES (6, 'Email', NULL, NULL);


--
-- TOC entry 3181 (class 0 OID 66370)
-- Dependencies: 214
-- Data for Name: disabilities; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.disabilities VALUES (1, 'Ninguna', NULL, NULL);
INSERT INTO public.disabilities VALUES (2, 'Mental', NULL, NULL);
INSERT INTO public.disabilities VALUES (3, 'Sensorial', NULL, NULL);
INSERT INTO public.disabilities VALUES (4, 'Motora', NULL, NULL);


--
-- TOC entry 3183 (class 0 OID 66375)
-- Dependencies: 216
-- Data for Name: diseases; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.diseases VALUES (1, 'Motora', NULL, NULL);
INSERT INTO public.diseases VALUES (2, 'Sensorial', NULL, NULL);
INSERT INTO public.diseases VALUES (3, 'Mental', NULL, NULL);
INSERT INTO public.diseases VALUES (4, 'Ninguna', NULL, NULL);


--
-- TOC entry 3225 (class 0 OID 90115)
-- Dependencies: 258
-- Data for Name: document_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.document_types VALUES (1, 'Fotocopia de Cédula de Identidad (solicitante, cónyuge/pareja)', true, NULL, '2020-02-27 07:48:28', '2020-02-27 07:48:31');
INSERT INTO public.document_types VALUES (3, 'Documentos que acrediten la tenencia legal del inmueble (a nombre del solicitante)', true, NULL, '2020-02-27 07:51:24', '2020-02-27 07:51:27');
INSERT INTO public.document_types VALUES (4, 'Justificación de ingreso', true, NULL, '2020-02-27 07:51:44', '2020-02-27 07:51:48');
INSERT INTO public.document_types VALUES (5, 'Nota para postulación al Aporte Estatal (Subsidio)', true, NULL, '2020-02-27 07:52:01', '2020-02-27 07:52:04');
INSERT INTO public.document_types VALUES (6, 'Formulario de Inscripción (firmado por el solicitante)', true, NULL, '2020-02-27 07:52:17', '2020-02-27 07:52:33');
INSERT INTO public.document_types VALUES (7, 'Fotos de la vivienda a ser refaccionada o ampliada', true, NULL, '2020-02-27 07:52:17', '2020-02-27 07:52:33');
INSERT INTO public.document_types VALUES (2, 'Certificado de nacimiento original o copia autenticada, de los hijos/as menores de edad', true, NULL, '2020-02-27 07:50:52', '2020-02-27 07:50:56');


--
-- TOC entry 3185 (class 0 OID 66380)
-- Dependencies: 218
-- Data for Name: education_levels; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.education_levels VALUES (1, 'Primaria', NULL, NULL);
INSERT INTO public.education_levels VALUES (2, 'Secundaria', NULL, NULL);
INSERT INTO public.education_levels VALUES (3, 'Técnica', NULL, NULL);
INSERT INTO public.education_levels VALUES (4, 'Universitaria', NULL, NULL);
INSERT INTO public.education_levels VALUES (5, 'Especial', NULL, NULL);
INSERT INTO public.education_levels VALUES (6, 'Ninguna', NULL, NULL);


--
-- TOC entry 3212 (class 0 OID 66852)
-- Dependencies: 245
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3214 (class 0 OID 66864)
-- Dependencies: 247
-- Data for Name: media; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.media VALUES (2, 'Brackets\AdminAuth\Models\AdminUser', 1, 'avatar', 'r9hAkVEpH6x9x3TXej0nIWHJjWU2ic9yHQ5KP8ok', 'r9hAkVEpH6x9x3TXej0nIWHJjWU2ic9yHQ5KP8ok.png', 'image/png', 'media', 1284091, '[]', '{"name":"PAISAJE.jpg","file_name":"PAISAJE.jpg","width":1321,"height":655,"generated_conversions":{"thumb_200":true,"thumb_75":true,"thumb_150":true}}', '[]', 1, '2020-02-25 14:30:21', '2020-02-25 14:30:24');
INSERT INTO public.media VALUES (3, 'App\Models\Applicant', 2, 'documents', 'cEdD0IYnxzmGkhC3QMdN5ypwEJo4xUFeYlThQ0hz', 'cEdD0IYnxzmGkhC3QMdN5ypwEJo4xUFeYlThQ0hz.pdf', 'application/pdf', 'media', 1004439, '[]', '{"name":"TL-SG1024.pdf","file_name":"TL-SG1024.pdf"}', '[]', 2, '2020-02-25 14:58:02', '2020-02-25 14:58:02');
INSERT INTO public.media VALUES (4, 'App\Models\Applicant', 2, 'documents', 'xb8mBGO7psqLaI5zuhbwAtfyc2M9yPG3cwajy62d', 'xb8mBGO7psqLaI5zuhbwAtfyc2M9yPG3cwajy62d.png', 'image/png', 'media', 1284091, '[]', '{"name":"PAISAJE.jpg","file_name":"PAISAJE.jpg","width":1321,"height":655}', '[]', 3, '2020-02-26 08:40:28', '2020-02-26 08:40:28');


--
-- TOC entry 3200 (class 0 OID 66772)
-- Dependencies: 233
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.migrations VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO public.migrations VALUES (3, '2017_08_24_000000_create_activations_table', 1);
INSERT INTO public.migrations VALUES (4, '2017_08_24_000000_create_admin_activations_table', 1);
INSERT INTO public.migrations VALUES (5, '2017_08_24_000000_create_admin_password_resets_table', 1);
INSERT INTO public.migrations VALUES (6, '2017_08_24_000000_create_admin_users_table', 1);
INSERT INTO public.migrations VALUES (7, '2018_07_18_000000_create_wysiwyg_media_table', 1);
INSERT INTO public.migrations VALUES (8, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations VALUES (9, '2020_01_10_100027_create_media_table', 1);
INSERT INTO public.migrations VALUES (10, '2020_01_10_100027_create_permission_tables', 1);
INSERT INTO public.migrations VALUES (11, '2020_01_10_100027_create_translations_table', 1);
INSERT INTO public.migrations VALUES (12, '2020_01_10_100032_fill_default_admin_user_and_permissions', 1);
INSERT INTO public.migrations VALUES (13, '2020_01_10_105830_fill_permissions_for_city', 1);
INSERT INTO public.migrations VALUES (14, '2020_01_10_110020_fill_permissions_for_contact-method', 1);
INSERT INTO public.migrations VALUES (15, '2020_01_10_110114_fill_permissions_for_disability', 1);
INSERT INTO public.migrations VALUES (16, '2020_01_10_110215_fill_permissions_for_disease', 1);
INSERT INTO public.migrations VALUES (17, '2020_01_10_110259_fill_permissions_for_education-level', 1);
INSERT INTO public.migrations VALUES (18, '2020_01_10_111122_fill_permissions_for_state', 1);
INSERT INTO public.migrations VALUES (19, '2020_01_10_111312_fill_permissions_for_status', 1);
INSERT INTO public.migrations VALUES (20, '2020_01_10_111405_fill_permissions_for_questionnaire-type', 1);
INSERT INTO public.migrations VALUES (21, '2020_01_10_140717_fill_permissions_for_applicant-relationship', 1);
INSERT INTO public.migrations VALUES (22, '2020_01_10_142738_fill_permissions_for_applicant', 1);
INSERT INTO public.migrations VALUES (23, '2020_01_10_143547_fill_permissions_for_questionnaire-template', 1);
INSERT INTO public.migrations VALUES (24, '2020_02_19_092221_fill_permissions_for_applicant-status', 2);
INSERT INTO public.migrations VALUES (25, '2020_02_19_092728_fill_permissions_for_applicant-status', 3);
INSERT INTO public.migrations VALUES (26, '2020_02_19_093859_fill_permissions_for_applicant-status', 4);
INSERT INTO public.migrations VALUES (27, '2020_02_26_125516_fill_permissions_for_applicant-document', 5);


--
-- TOC entry 3219 (class 0 OID 66896)
-- Dependencies: 252
-- Data for Name: model_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3220 (class 0 OID 66907)
-- Dependencies: 253
-- Data for Name: model_has_roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.model_has_roles VALUES (1, 'Brackets\AdminAuth\Models\AdminUser', 1);
INSERT INTO public.model_has_roles VALUES (1, 'Brackets\AdminAuth\Models\AdminUser', 2);


--
-- TOC entry 3203 (class 0 OID 66791)
-- Dependencies: 236
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3216 (class 0 OID 66876)
-- Dependencies: 249
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.permissions VALUES (1, 'admin', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');
INSERT INTO public.permissions VALUES (2, 'admin.translation.index', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');
INSERT INTO public.permissions VALUES (3, 'admin.translation.edit', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');
INSERT INTO public.permissions VALUES (4, 'admin.translation.rescan', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');
INSERT INTO public.permissions VALUES (5, 'admin.admin-user.index', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');
INSERT INTO public.permissions VALUES (6, 'admin.admin-user.create', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');
INSERT INTO public.permissions VALUES (7, 'admin.admin-user.edit', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');
INSERT INTO public.permissions VALUES (8, 'admin.admin-user.delete', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');
INSERT INTO public.permissions VALUES (9, 'admin.upload', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');
INSERT INTO public.permissions VALUES (10, 'admin.city', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (11, 'admin.city.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (12, 'admin.city.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (13, 'admin.city.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (14, 'admin.city.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (15, 'admin.city.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (16, 'admin.city.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (17, 'admin.contact-method', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (18, 'admin.contact-method.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (19, 'admin.contact-method.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (20, 'admin.contact-method.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (21, 'admin.contact-method.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (22, 'admin.contact-method.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (23, 'admin.contact-method.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (24, 'admin.disability', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (25, 'admin.disability.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (26, 'admin.disability.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (27, 'admin.disability.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (28, 'admin.disability.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (29, 'admin.disability.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (30, 'admin.disability.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (31, 'admin.disease', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (32, 'admin.disease.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (33, 'admin.disease.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (34, 'admin.disease.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (35, 'admin.disease.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (36, 'admin.disease.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (37, 'admin.disease.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (38, 'admin.education-level', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (39, 'admin.education-level.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (40, 'admin.education-level.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (41, 'admin.education-level.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (42, 'admin.education-level.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (43, 'admin.education-level.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (44, 'admin.education-level.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (45, 'admin.state', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (46, 'admin.state.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (47, 'admin.state.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (48, 'admin.state.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (49, 'admin.state.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (50, 'admin.state.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (51, 'admin.state.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (52, 'admin.status', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (53, 'admin.status.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (54, 'admin.status.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (55, 'admin.status.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (56, 'admin.status.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (57, 'admin.status.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (58, 'admin.status.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (59, 'admin.questionnaire-type', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (60, 'admin.questionnaire-type.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (61, 'admin.questionnaire-type.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (62, 'admin.questionnaire-type.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (63, 'admin.questionnaire-type.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (64, 'admin.questionnaire-type.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (65, 'admin.questionnaire-type.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (66, 'admin.applicant-relationship', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (67, 'admin.applicant-relationship.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (68, 'admin.applicant-relationship.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (69, 'admin.applicant-relationship.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (70, 'admin.applicant-relationship.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (71, 'admin.applicant-relationship.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (72, 'admin.applicant-relationship.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (73, 'admin.applicant', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (74, 'admin.applicant.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (75, 'admin.applicant.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (76, 'admin.applicant.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (77, 'admin.applicant.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (78, 'admin.applicant.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (79, 'admin.applicant.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (80, 'admin.questionnaire-template', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (81, 'admin.questionnaire-template.index', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (82, 'admin.questionnaire-template.create', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (83, 'admin.questionnaire-template.show', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (84, 'admin.questionnaire-template.edit', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (85, 'admin.questionnaire-template.delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (86, 'admin.questionnaire-template.bulk-delete', 'admin', '2020-02-12 10:27:27', '2020-02-12 10:27:27');
INSERT INTO public.permissions VALUES (87, 'admin.applicant-status', 'admin', '2020-02-19 09:22:28', '2020-02-19 09:22:28');
INSERT INTO public.permissions VALUES (88, 'admin.applicant-status.index', 'admin', '2020-02-19 09:22:28', '2020-02-19 09:22:28');
INSERT INTO public.permissions VALUES (89, 'admin.applicant-status.create', 'admin', '2020-02-19 09:22:28', '2020-02-19 09:22:28');
INSERT INTO public.permissions VALUES (90, 'admin.applicant-status.show', 'admin', '2020-02-19 09:22:28', '2020-02-19 09:22:28');
INSERT INTO public.permissions VALUES (91, 'admin.applicant-status.edit', 'admin', '2020-02-19 09:22:28', '2020-02-19 09:22:28');
INSERT INTO public.permissions VALUES (92, 'admin.applicant-status.delete', 'admin', '2020-02-19 09:22:28', '2020-02-19 09:22:28');
INSERT INTO public.permissions VALUES (93, 'admin.applicant-status.bulk-delete', 'admin', '2020-02-19 09:22:28', '2020-02-19 09:22:28');
INSERT INTO public.permissions VALUES (94, 'admin.applicant-document', 'admin', '2020-02-26 12:55:25', '2020-02-26 12:55:25');
INSERT INTO public.permissions VALUES (95, 'admin.applicant-document.index', 'admin', '2020-02-26 12:55:25', '2020-02-26 12:55:25');
INSERT INTO public.permissions VALUES (96, 'admin.applicant-document.create', 'admin', '2020-02-26 12:55:25', '2020-02-26 12:55:25');
INSERT INTO public.permissions VALUES (97, 'admin.applicant-document.show', 'admin', '2020-02-26 12:55:25', '2020-02-26 12:55:25');
INSERT INTO public.permissions VALUES (98, 'admin.applicant-document.edit', 'admin', '2020-02-26 12:55:25', '2020-02-26 12:55:25');
INSERT INTO public.permissions VALUES (99, 'admin.applicant-document.delete', 'admin', '2020-02-26 12:55:25', '2020-02-26 12:55:25');
INSERT INTO public.permissions VALUES (100, 'admin.applicant-document.bulk-delete', 'admin', '2020-02-26 12:55:25', '2020-02-26 12:55:25');


--
-- TOC entry 3187 (class 0 OID 66427)
-- Dependencies: 220
-- Data for Name: questionnaire_template_questions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.questionnaire_template_questions VALUES (1, 1, 'Cuenta con casa propia?', 'F', 'SI', false, 'NULL', 0, '2020-02-12 11:37:10', '2020-02-12 11:37:14');


--
-- TOC entry 3189 (class 0 OID 66436)
-- Dependencies: 222
-- Data for Name: questionnaire_templates; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.questionnaire_templates VALUES (1, 'Social', true, 1, '2020-02-12 11:35:21', '2020-02-12 11:35:25');


--
-- TOC entry 3191 (class 0 OID 66442)
-- Dependencies: 224
-- Data for Name: questionnaire_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.questionnaire_types VALUES (1, 'Cooperativas', '2020-02-12 11:34:59', '2020-02-12 11:35:03');


--
-- TOC entry 3221 (class 0 OID 66918)
-- Dependencies: 254
-- Data for Name: role_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.role_has_permissions VALUES (1, 1);
INSERT INTO public.role_has_permissions VALUES (2, 1);
INSERT INTO public.role_has_permissions VALUES (3, 1);
INSERT INTO public.role_has_permissions VALUES (4, 1);
INSERT INTO public.role_has_permissions VALUES (5, 1);
INSERT INTO public.role_has_permissions VALUES (6, 1);
INSERT INTO public.role_has_permissions VALUES (7, 1);
INSERT INTO public.role_has_permissions VALUES (8, 1);
INSERT INTO public.role_has_permissions VALUES (9, 1);
INSERT INTO public.role_has_permissions VALUES (10, 1);
INSERT INTO public.role_has_permissions VALUES (11, 1);
INSERT INTO public.role_has_permissions VALUES (12, 1);
INSERT INTO public.role_has_permissions VALUES (13, 1);
INSERT INTO public.role_has_permissions VALUES (14, 1);
INSERT INTO public.role_has_permissions VALUES (15, 1);
INSERT INTO public.role_has_permissions VALUES (16, 1);
INSERT INTO public.role_has_permissions VALUES (17, 1);
INSERT INTO public.role_has_permissions VALUES (18, 1);
INSERT INTO public.role_has_permissions VALUES (19, 1);
INSERT INTO public.role_has_permissions VALUES (20, 1);
INSERT INTO public.role_has_permissions VALUES (21, 1);
INSERT INTO public.role_has_permissions VALUES (22, 1);
INSERT INTO public.role_has_permissions VALUES (23, 1);
INSERT INTO public.role_has_permissions VALUES (24, 1);
INSERT INTO public.role_has_permissions VALUES (25, 1);
INSERT INTO public.role_has_permissions VALUES (26, 1);
INSERT INTO public.role_has_permissions VALUES (27, 1);
INSERT INTO public.role_has_permissions VALUES (28, 1);
INSERT INTO public.role_has_permissions VALUES (29, 1);
INSERT INTO public.role_has_permissions VALUES (30, 1);
INSERT INTO public.role_has_permissions VALUES (31, 1);
INSERT INTO public.role_has_permissions VALUES (32, 1);
INSERT INTO public.role_has_permissions VALUES (33, 1);
INSERT INTO public.role_has_permissions VALUES (34, 1);
INSERT INTO public.role_has_permissions VALUES (35, 1);
INSERT INTO public.role_has_permissions VALUES (36, 1);
INSERT INTO public.role_has_permissions VALUES (37, 1);
INSERT INTO public.role_has_permissions VALUES (38, 1);
INSERT INTO public.role_has_permissions VALUES (39, 1);
INSERT INTO public.role_has_permissions VALUES (40, 1);
INSERT INTO public.role_has_permissions VALUES (41, 1);
INSERT INTO public.role_has_permissions VALUES (42, 1);
INSERT INTO public.role_has_permissions VALUES (43, 1);
INSERT INTO public.role_has_permissions VALUES (44, 1);
INSERT INTO public.role_has_permissions VALUES (45, 1);
INSERT INTO public.role_has_permissions VALUES (46, 1);
INSERT INTO public.role_has_permissions VALUES (47, 1);
INSERT INTO public.role_has_permissions VALUES (48, 1);
INSERT INTO public.role_has_permissions VALUES (49, 1);
INSERT INTO public.role_has_permissions VALUES (50, 1);
INSERT INTO public.role_has_permissions VALUES (51, 1);
INSERT INTO public.role_has_permissions VALUES (52, 1);
INSERT INTO public.role_has_permissions VALUES (53, 1);
INSERT INTO public.role_has_permissions VALUES (54, 1);
INSERT INTO public.role_has_permissions VALUES (55, 1);
INSERT INTO public.role_has_permissions VALUES (56, 1);
INSERT INTO public.role_has_permissions VALUES (57, 1);
INSERT INTO public.role_has_permissions VALUES (58, 1);
INSERT INTO public.role_has_permissions VALUES (59, 1);
INSERT INTO public.role_has_permissions VALUES (60, 1);
INSERT INTO public.role_has_permissions VALUES (61, 1);
INSERT INTO public.role_has_permissions VALUES (62, 1);
INSERT INTO public.role_has_permissions VALUES (63, 1);
INSERT INTO public.role_has_permissions VALUES (64, 1);
INSERT INTO public.role_has_permissions VALUES (65, 1);
INSERT INTO public.role_has_permissions VALUES (66, 1);
INSERT INTO public.role_has_permissions VALUES (67, 1);
INSERT INTO public.role_has_permissions VALUES (68, 1);
INSERT INTO public.role_has_permissions VALUES (69, 1);
INSERT INTO public.role_has_permissions VALUES (70, 1);
INSERT INTO public.role_has_permissions VALUES (71, 1);
INSERT INTO public.role_has_permissions VALUES (72, 1);
INSERT INTO public.role_has_permissions VALUES (73, 1);
INSERT INTO public.role_has_permissions VALUES (74, 1);
INSERT INTO public.role_has_permissions VALUES (75, 1);
INSERT INTO public.role_has_permissions VALUES (76, 1);
INSERT INTO public.role_has_permissions VALUES (77, 1);
INSERT INTO public.role_has_permissions VALUES (78, 1);
INSERT INTO public.role_has_permissions VALUES (79, 1);
INSERT INTO public.role_has_permissions VALUES (80, 1);
INSERT INTO public.role_has_permissions VALUES (81, 1);
INSERT INTO public.role_has_permissions VALUES (82, 1);
INSERT INTO public.role_has_permissions VALUES (83, 1);
INSERT INTO public.role_has_permissions VALUES (84, 1);
INSERT INTO public.role_has_permissions VALUES (85, 1);
INSERT INTO public.role_has_permissions VALUES (86, 1);
INSERT INTO public.role_has_permissions VALUES (87, 1);
INSERT INTO public.role_has_permissions VALUES (88, 1);
INSERT INTO public.role_has_permissions VALUES (89, 1);
INSERT INTO public.role_has_permissions VALUES (90, 1);
INSERT INTO public.role_has_permissions VALUES (91, 1);
INSERT INTO public.role_has_permissions VALUES (92, 1);
INSERT INTO public.role_has_permissions VALUES (93, 1);
INSERT INTO public.role_has_permissions VALUES (94, 1);
INSERT INTO public.role_has_permissions VALUES (95, 1);
INSERT INTO public.role_has_permissions VALUES (96, 1);
INSERT INTO public.role_has_permissions VALUES (97, 1);
INSERT INTO public.role_has_permissions VALUES (98, 1);
INSERT INTO public.role_has_permissions VALUES (99, 1);
INSERT INTO public.role_has_permissions VALUES (100, 1);


--
-- TOC entry 3218 (class 0 OID 66887)
-- Dependencies: 251
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.roles VALUES (1, 'Administrator', 'admin', '2020-02-12 10:27:26', '2020-02-12 10:27:26');


--
-- TOC entry 3193 (class 0 OID 66458)
-- Dependencies: 226
-- Data for Name: states; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.states VALUES (1, 'CENTRAL', '2020-02-12 11:21:45', '2020-02-12 11:21:48');


--
-- TOC entry 3195 (class 0 OID 66463)
-- Dependencies: 228
-- Data for Name: statuses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.statuses VALUES (1, 'POSTULACION', '2020-02-19 09:10:07', '2020-02-19 09:10:13');
INSERT INTO public.statuses VALUES (2, 'EN EVALUACIÓN ', '2020-02-19 09:10:07', '2020-02-19 09:10:07');
INSERT INTO public.statuses VALUES (3, 'CALIFICADO', '2020-02-26 07:08:15', '2020-02-26 07:08:19');
INSERT INTO public.statuses VALUES (4, 'NO CALIFICADO', '2020-02-26 07:08:41', '2020-02-26 07:08:45');


--
-- TOC entry 3223 (class 0 OID 66935)
-- Dependencies: 256
-- Data for Name: translations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.translations VALUES (212, 'brackets/admin-ui', 'admin', 'sidebar.settings.general', '{"en": "General", "es": "General"}', NULL, '2020-01-15 13:39:14', '2020-01-15 13:41:32', '2020-01-15 13:41:32');
INSERT INTO public.translations VALUES (214, '*', 'admin', 'article.columns.published_at', '[]', NULL, '2020-01-20 10:39:29', '2020-01-21 10:40:07', '2020-01-21 10:40:07');
INSERT INTO public.translations VALUES (21, '*', 'admin', 'admin-user.columns.id', '[]', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (232, '*', 'admin', 'applicant.find', '{"en": "admin.applicant.find", "es": "Buscar Postulantes"}', NULL, '2020-02-21 09:30:28', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (43, 'brackets/admin-auth', 'admin', 'passwords.invalid_token', '{"en": "The password reset token is invalid.", "es": "El token de restablecimiento de contraseña es inválido!"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (44, 'brackets/admin-auth', 'admin', 'passwords.invalid_user', '{"en": "We can''t find a user with this e-mail address.", "es": "No pudimos encontrar un usuario con esta dirección de email"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (45, 'brackets/admin-auth', 'admin', 'passwords.invalid_password', '{"en": "Password must be at least six characters long and match the confirmation.", "es": "La contraseña debe tener al menos 6 caracteres y coincidir con la confirmación."}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (46, 'brackets/admin-auth', 'admin', 'activation_form.title', '{"en": "Activate account", "es": "Activa Cuenta"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (47, 'brackets/admin-auth', 'admin', 'activation_form.note', '{"en": "Send activation link to e-mail", "es": "Enviar link de activación de contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (49, 'brackets/admin-auth', 'admin', 'activation_form.button', '{"en": "Send Activation Link", "es": "Enviar Link de Activación"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (55, 'brackets/admin-auth', 'admin', 'forgot_password.title', '{"en": "Reset Password", "es": "Restablecer Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (228, '*', 'admin', 'applicant.actions.documentosatc', '{"en": "admin.applicant.actions.documentosatc", "es": "Documentos ATC"}', NULL, '2020-02-17 08:43:43', '2020-02-18 09:02:40', '2020-02-18 09:02:40');
INSERT INTO public.translations VALUES (56, 'brackets/admin-auth', 'admin', 'forgot_password.note', '{"en": "Send password reset e-mail", "es": "Enviar email de restablecimiento de contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (57, 'brackets/admin-auth', 'admin', 'forgot_password.button', '{"en": "Send Password Reset Link", "es": "Enviar Link de Restablecimiento de Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (58, 'brackets/admin-auth', 'admin', 'password_reset.title', '{"en": "Reset Password", "es": "Restablecer Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (59, 'brackets/admin-auth', 'admin', 'password_reset.note', '{"en": "Reset forgotten password", "es": "Restablecer contraseña olvidada"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (60, 'brackets/admin-auth', 'admin', 'auth_global.password_confirm', '{"en": "Password confirmation", "es": "Confirmación de contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (61, 'brackets/admin-auth', 'admin', 'password_reset.button', '{"en": "Reset password", "es": "Restablecer contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (84, 'brackets/admin-ui', 'admin', 'media_uploader.max_number_of_files', '{"en": "(max no. of files: :maxNumberOfFiles files)", "es": "(Nro máximo de archivos: :maxNumberOfFiles archivos)"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (85, 'brackets/admin-ui', 'admin', 'media_uploader.max_size_pre_file', '{"en": "(max size per file: :maxFileSize MB)", "es": "(tamaño máximo por archivo: :maxFileSize MB)"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (86, 'brackets/admin-ui', 'admin', 'media_uploader.private_title', '{"en": "Files are not accessible for public", "es": "Los archivos no son accesibles públicamente"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (89, 'brackets/admin-translations', 'admin', 'title', '{"en": "Translations", "es": "Traducciones"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (90, 'brackets/admin-translations', 'admin', 'index.all_groups', '{"en": "All groups", "es": "Todos los grupos"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (91, 'brackets/admin-translations', 'admin', 'index.edit', '{"en": "Edit translation", "es": "Editar Traducción"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (92, 'brackets/admin-translations', 'admin', 'index.default_text', '{"en": "Default text", "es": "Texto por defecto"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (93, 'brackets/admin-translations', 'admin', 'index.translation', '{"en": "translation", "es": "traducción"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (94, 'brackets/admin-translations', 'admin', 'index.translation_for_language', '{"en": "Type a translation for :locale language.", "es": "Escribe una traducción para el idioma :locale."}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (95, 'brackets/admin-translations', 'admin', 'import.title', '{"en": "Translations import", "es": "Importar traducciones"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (96, 'brackets/admin-translations', 'admin', 'import.notice', '{"en": "You can import translations of a selected language from the .xslx file. Imported file must have identical structure as generated in Translations export.", "es": "No puedes importar traducciones del idioma seleccionado desde el archivos .xlsx. El archivo importado debe tener la misma estructura que la generada por Exportar Traducciones."}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (97, 'brackets/admin-translations', 'admin', 'import.upload_file', '{"en": "Upload File", "es": "Subir Archivo"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (98, 'brackets/admin-translations', 'admin', 'import.choose_file', '{"en": "Choose file", "es": "Seleccionar archivo"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (99, 'brackets/admin-translations', 'admin', 'import.language_to_import', '{"en": "Language to import", "es": "Idioma a importar"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (100, 'brackets/admin-translations', 'admin', 'fields.select_language', '{"en": "Select language", "es": "Seleccionar idioma"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (101, 'brackets/admin-translations', 'admin', 'import.do_not_override', '{"en": "Do not override existing translations", "es": "No sobrescribir las traducciones existentes"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (102, 'brackets/admin-translations', 'admin', 'import.conflict_notice_we_have_found', '{"en": "We have found", "es": "Encontramos"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (103, 'brackets/admin-translations', 'admin', 'import.conflict_notice_translations_to_be_imported', '{"en": "translations in total to be imported. Please review", "es": "traducciones a ser importadas. Por favor verifique"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (104, 'brackets/admin-translations', 'admin', 'import.conflict_notice_differ', '{"en": "translations that differs before continuing.", "es": "traducciones que difieren antes de continuar"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (105, 'brackets/admin-translations', 'admin', 'fields.group', '{"en": "Group", "es": "Grupo"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (106, 'brackets/admin-translations', 'admin', 'fields.default', '{"en": "Default", "es": "Por defecto"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (231, '*', 'admin', 'applicant-status.actions.find', '{"en": "admin.applicant-status.actions.find", "es": "Seguimiento"}', NULL, '2020-02-21 09:30:28', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (107, 'brackets/admin-translations', 'admin', 'fields.current_value', '{"en": "Current value", "es": "Valor actual"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (108, 'brackets/admin-translations', 'admin', 'fields.imported_value', '{"en": "Imported value", "es": "Valor importado"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (109, 'brackets/admin-translations', 'admin', 'import.sucesfully_notice', '{"en": "translations sucesfully imported", "es": "traducciones importadas exitosamente!"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (110, 'brackets/admin-translations', 'admin', 'import.sucesfully_notice_update', '{"en": "translations sucesfully updated.", "es": "traducciones actualizadas exitosamente."}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (111, 'brackets/admin-translations', 'admin', 'index.export', '{"en": "Translations export", "es": "Exportar traducciones"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (112, 'brackets/admin-translations', 'admin', 'export.notice', '{"en": "You can export translations of a selected language as .xslx file.", "es": "Puede exportar traducciones del idioma seleccionado como un archivo xslx."}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (113, 'brackets/admin-translations', 'admin', 'export.language_to_export', '{"en": "Language to export", "es": "Idioma a exportar"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (114, 'brackets/admin-translations', 'admin', 'btn.export', '{"en": "Export", "es": "Exportar"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (115, 'brackets/admin-translations', 'admin', 'index.title', '{"en": "Translations list", "es": "Lista de traducciones"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (116, 'brackets/admin-translations', 'admin', 'btn.import', '{"en": "Import", "es": "Importar"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (117, 'brackets/admin-translations', 'admin', 'btn.re_scan', '{"en": "Re-scan translations", "es": "Re-scan traducciones"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (118, 'brackets/admin-translations', 'admin', 'fields.created_at', '{"en": "Created at", "es": "Creado"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (119, 'brackets/admin-translations', 'admin', 'index.no_items', '{"en": "Could not find any translations", "es": "No encontramos ninguna traducción"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (120, 'brackets/admin-translations', 'admin', 'index.try_changing_items', '{"en": "Try changing the filters or re-scan", "es": "Intenta cambiar los filtros o reescanea"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (63, '*', '*', 'Translations', '{"en": "Translations", "es": "Traducciones"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (62, '*', '*', 'Manage access', '{"en": "Manage access", "es": "Manejar Accesos"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (64, '*', '*', 'Configuration', '{"en": "Configuration", "es": "Configuración"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (65, '*', '*', 'Login', '{"en": "Login", "es": "Inicio de sesión"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (66, '*', '*', 'E-Mail Address', '{"en": "E-Mail Address", "es": "Dirección de Email"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (67, '*', '*', 'Password', '{"en": "Password", "es": "Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (68, '*', '*', 'Remember Me', '{"en": "Remember Me", "es": "Recuerdame"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (69, '*', '*', 'Forgot Your Password?', '{"en": "Forgot Your Password?", "es": "Olvidaste tu contraseña?"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (70, '*', '*', 'Confirm Password', '{"en": "Confirm Password", "es": "Confirmar Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (71, '*', '*', 'Please confirm your password before continuing.', '{"en": "Please confirm your password before continuing.", "es": "Por favor confirme su password antes de continuar"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (72, '*', '*', 'Reset Password', '{"en": "Reset Password", "es": "Restablecer Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (73, '*', '*', 'Send Password Reset Link', '{"en": "Send Password Reset Link", "es": "Enviar Link de Restablecimiento de Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (74, '*', '*', 'Register', '{"en": "Register", "es": "Registrar"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (75, '*', '*', 'Name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (76, '*', '*', 'Verify Your Email Address', '{"en": "Verify Your Email Address", "es": "Verificar tu dirección de email"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (77, '*', '*', 'A fresh verification link has been sent to your email address.', '{"en": "A fresh verification link has been sent to your email address.", "es": "Un nuevo link de verificación fue enviado a tu dirección de email"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (78, '*', '*', 'Before proceeding, please check your email for a verification link.', '{"en": "Before proceeding, please check your email for a verification link.", "es": "Antes de ingresar, por favor verifique el link de verificación enviado a su email"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (79, '*', '*', 'If you did not receive the email', '{"en": "If you did not receive the email", "es": "Si no recibiste el email"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (80, '*', '*', 'click here to request another', '{"en": "click here to request another", "es": "ingrese aquí para solicitar uno nuevo"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (233, '*', '*', 'Unauthorized', '[]', NULL, '2020-02-21 09:30:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (234, '*', '*', 'Forbidden', '[]', NULL, '2020-02-21 09:30:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (235, '*', '*', 'Not Found', '[]', NULL, '2020-02-21 09:30:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (236, '*', '*', 'Page Expired', '[]', NULL, '2020-02-21 09:30:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (237, '*', '*', 'Too Many Requests', '[]', NULL, '2020-02-21 09:30:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (238, '*', '*', 'Server Error', '[]', NULL, '2020-02-21 09:30:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (239, '*', '*', 'Service Unavailable', '[]', NULL, '2020-02-21 09:30:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (240, '*', '*', 'Oh no', '[]', NULL, '2020-02-21 09:30:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (241, '*', '*', 'Go Home', '[]', NULL, '2020-02-21 09:30:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (81, '*', '*', 'Toggle navigation', '{"en": "Toggle navigation", "es": "Navegación"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (82, '*', '*', 'Logout', '{"en": "Logout", "es": "Salir"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (121, '*', '*', 'Close', '{"en": "Close", "es": "Cerrar"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (229, 'brackets/admin-ui', 'admin', 'btn.documentosatc', '{"en": "brackets/admin-ui::admin.btn.documentosatc", "es": "Documentos ATC"}', NULL, '2020-02-17 08:43:43', '2020-02-18 09:02:40', '2020-02-18 09:02:40');
INSERT INTO public.translations VALUES (13, '*', 'admin', 'admin-user.columns.roles', '[]', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (53, 'brackets/admin-auth', 'admin', 'login.button', '[]', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (88, 'brackets/admin-ui', 'admin', 'footer.powered_by', '[]', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (87, 'brackets/admin-ui', 'admin', 'footer.copyright', '{"en": "AMA © :year MUVH", "es": "AMA © :year MUVH"}', NULL, '2020-01-10 10:38:09', '2020-02-14 07:57:42', '2020-02-14 07:57:42');
INSERT INTO public.translations VALUES (1, 'brackets/admin-ui', 'admin', 'operation.succeeded', '{"en": "Operation successful", "es": "Operación exitosa"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (2, 'brackets/admin-ui', 'admin', 'operation.failed', '{"en": "Operation failed", "es": "Operación fallida"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (3, 'brackets/admin-ui', 'admin', 'operation.not_allowed', '{"en": "Operation not allowed", "es": "Operación no permitida"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (4, '*', 'admin', 'admin-user.columns.first_name', '{"en": "First name", "es": "Nombres"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (5, '*', 'admin', 'admin-user.columns.last_name', '{"en": "Last name", "es": "Apellidos"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (6, '*', 'admin', 'admin-user.columns.email', '[]', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (7, '*', 'admin', 'admin-user.columns.password', '{"en": "Password", "es": "Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (8, '*', 'admin', 'admin-user.columns.password_repeat', '{"en": "Password Confirmation", "es": "Confirmación de contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (9, '*', 'admin', 'admin-user.columns.activated', '{"en": "Activated", "es": "Activado"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (10, '*', 'admin', 'admin-user.columns.forbidden', '{"en": "Forbidden", "es": "Prohibido"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (11, '*', 'admin', 'admin-user.columns.language', '{"en": "Language", "es": "Idioma"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (12, 'brackets/admin-ui', 'admin', 'forms.select_an_option', '{"en": "Select an option", "es": "Selecciona una opción"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (14, 'brackets/admin-ui', 'admin', 'forms.select_options', '{"en": "Select options", "es": "Seleccionar opciones"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (15, '*', 'admin', 'admin-user.actions.create', '{"en": "New User", "es": "Nuevo Usuario"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (16, 'brackets/admin-ui', 'admin', 'btn.save', '{"en": "Save", "es": "Grabar"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (17, '*', 'admin', 'admin-user.actions.edit', '{"en": "Edit :name", "es": "Editar :name"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (18, '*', 'admin', 'admin-user.actions.index', '{"en": "Users", "es": "Usuarios"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (19, 'brackets/admin-ui', 'admin', 'placeholder.search', '{"en": "Search", "es": "Buscar"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (20, 'brackets/admin-ui', 'admin', 'btn.search', '{"en": "Search", "es": "Buscar"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (22, 'brackets/admin-ui', 'admin', 'btn.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (23, 'brackets/admin-ui', 'admin', 'btn.delete', '{"en": "Delete", "es": "Borrar"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (24, 'brackets/admin-ui', 'admin', 'pagination.overview', '{"en": "Displaying items from {{ pagination.state.from }} to {{ pagination.state.to }} of total {{ pagination.state.total }} items.", "es": "Mostrando items desde {{ pagination.state.from }} al {{ pagination.state.to }} de un total de {{ pagination.state.total }} items."}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (25, 'brackets/admin-ui', 'admin', 'index.no_items', '{"en": "Could not find any items", "es": "No se encontraron resultados"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (26, 'brackets/admin-ui', 'admin', 'index.try_changing_items', '{"en": "Try changing the filters or add a new one", "es": "Intenta cambiar el filtro o agregue uno nuevo"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (27, 'brackets/admin-ui', 'admin', 'btn.new', '{"en": "New", "es": "Nuevo"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (122, '*', 'admin', 'applicant-relationship.columns.name', '{"en": "Names", "es": "Nombres"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (123, '*', 'admin', 'applicant-relationship.actions.create', '{"en": "New applicant relationship", "es": "Nueva relación con postulante"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (124, '*', 'admin', 'applicant-relationship.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (125, '*', 'admin', 'applicant-relationship.actions.index', '{"en": "Applicant relationships", "es": "Relaciones con Postulantes"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (126, '*', 'admin', 'applicant-relationship.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (127, 'brackets/admin-ui', 'admin', 'listing.selected_items', '{"en": "Selected items", "es": "Items seleccionados"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (128, 'brackets/admin-ui', 'admin', 'listing.check_all_items', '{"en": "Check all items", "es": "Seleccionar todos los items"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (129, 'brackets/admin-ui', 'admin', 'listing.uncheck_all_items', '{"en": "Uncheck all items", "es": "Deseleccionar todos"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (179, '*', 'admin', 'contact-method.title', '{"en": "Contact methods", "es": "Métodos de contacto"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (217, '*', 'admin', 'applicant.columns.contact-method', '{"en": "Contact method", "es": "Método de contacto"}', NULL, '2020-01-21 10:40:07', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (218, '*', 'admin', 'applicant.columns.contact-description', '{"en": "Contact description", "es": "Contacto Descripción"}', NULL, '2020-01-21 10:40:07', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (219, 'brackets/admin-ui', 'admin', 'btn.add', '{"en": "Add", "es": "Agregar"}', NULL, '2020-01-21 13:57:34', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (180, '*', 'admin', 'disability.title', '{"en": "Disabilities", "es": "Discapacidades"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (221, '*', 'admin', 'applicant.actions.search', '[]', NULL, '2020-02-14 07:57:42', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (215, '*', 'admin', 'applicant.columns.disability', '{"en": "Disability", "es": "Discapacidad"}', NULL, '2020-01-20 10:39:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (181, '*', 'admin', 'disease.title', '{"en": "Diseases", "es": "Enfermedades"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (216, '*', 'admin', 'applicant.columns.disease', '{"en": "Disease", "es": "Enfermedad"}', NULL, '2020-01-20 10:39:29', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (130, '*', 'admin', 'applicant.columns.names', '{"en": "Names", "es": "Nombres"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (139, '*', 'admin', 'applicant.columns.last_names', '{"en": "Last name", "es": "Apellidos"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (140, '*', 'admin', 'applicant.columns.government_id', '{"en": "Government ID", "es": "Documento"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (138, '*', 'admin', 'applicant.columns.marital_status', '{"en": "Marital status", "es": "Estado civil"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (144, '*', 'admin', 'applicant.columns.gender', '{"en": "Gender", "es": "Género"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (145, '*', 'admin', 'applicant.columns.birthdate', '{"en": "Birthdate", "es": "Nacimiento"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (146, 'brackets/admin-ui', 'admin', 'forms.select_date_and_time', '{"en": "Select date and time", "es": "Selecciona Fecha"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (133, '*', 'admin', 'applicant.columns.property_id', '{"en": "Property ID", "es": "Nro. Finca"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (134, '*', 'admin', 'applicant.columns.cadaster', '{"en": "Cadaster", "es": "Cta Catastral"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (136, '*', 'admin', 'applicant.columns.parent_applicant', '{"en": "Applicant", "es": "Postulante"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (135, '*', 'admin', 'applicant.columns.applicant_relationship', '{"en": "Relationship with the applicant", "es": "Relación con el postulante"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (141, '*', 'admin', 'applicant.columns.education_level', '{"en": "Education level", "es": "Educación"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (132, '*', 'admin', 'applicant.columns.occupation', '{"en": "Occupation", "es": "Ocupación"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (147, '*', 'admin', 'applicant.columns.monthly_income', '{"en": "Monthly income", "es": "Ingreso mensual"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (148, '*', 'admin', 'applicant.actions.create', '{"en": "New applicant", "es": "Nuevo postulante"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (149, '*', 'admin', 'applicant.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (242, '*', 'admin', 'applicant.actions.documentsatc', '[]', NULL, '2020-02-26 09:03:21', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (150, '*', 'admin', 'applicant.actions.index', '{"en": "Applicants", "es": "Postulantes"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (151, '*', 'admin', 'applicant.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (143, '*', 'admin', 'applicant.columns.state_id', '{"en": "State", "es": "Departamento"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (142, '*', 'admin', 'applicant.columns.city_id', '{"en": "City", "es": "Ciudad"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (131, '*', 'admin', 'applicant.columns.pregnant', '{"en": "Pregnant?", "es": "Embarazada?"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (137, '*', 'admin', 'applicant.columns.pregnancy_due_date', '{"en": "Pregnancy due date (weeks)", "es": "Tiempo de Embarazo (semanas)"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (222, 'brackets/admin-ui', 'admin', 'btn.show', '[]', NULL, '2020-02-14 07:57:42', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (223, '*', 'admin', 'applicant.actions.viewatc', '{"en": "admin.applicant.actions.viewatc", "es": "Listado de ATC"}', NULL, '2020-02-14 07:57:42', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (224, 'brackets/admin-ui', 'admin', 'viewatc.no_items', '[]', NULL, '2020-02-14 07:57:42', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (225, 'brackets/admin-ui', 'admin', 'viewatc.try_changing_items', '[]', NULL, '2020-02-14 07:57:42', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (152, '*', 'admin', 'city.columns.name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (153, '*', 'admin', 'city.columns.state_id', '{"en": "State", "es": "Departamento"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (154, '*', 'admin', 'city.actions.create', '{"en": "New City", "es": "Nueva ciudad"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (155, '*', 'admin', 'city.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (156, '*', 'admin', 'city.actions.index', '{"en": "Cities", "es": "Ciudades"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (157, '*', 'admin', 'city.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (158, '*', 'admin', 'contact-method.columns.name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (159, '*', 'admin', 'contact-method.actions.create', '{"en": "New contact method", "es": "Nuevo método de contacto"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (160, '*', 'admin', 'contact-method.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (161, '*', 'admin', 'contact-method.actions.index', '{"en": "Contact methods", "es": "Métodos de contacto"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (162, '*', 'admin', 'contact-method.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (163, '*', 'admin', 'disability.columns.name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (164, '*', 'admin', 'disability.actions.create', '{"en": "New disability", "es": "Nueva discapacidad"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (165, '*', 'admin', 'disability.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (166, '*', 'admin', 'disability.actions.index', '{"en": "Disabilities", "es": "Discapacidades"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (167, '*', 'admin', 'disability.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (168, '*', 'admin', 'disease.columns.name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (169, '*', 'admin', 'disease.actions.create', '{"en": "New disease", "es": "Nueva enfermedad"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (170, '*', 'admin', 'disease.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (171, '*', 'admin', 'disease.actions.index', '{"en": "Diseases", "es": "Enfermedades"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (172, '*', 'admin', 'disease.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (173, '*', 'admin', 'education-level.columns.name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (174, '*', 'admin', 'education-level.actions.create', '{"en": "New education level", "es": "Nuevo nivel de educación"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (175, '*', 'admin', 'education-level.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (176, '*', 'admin', 'education-level.actions.index', '{"en": "Education levels", "es": "Niveles de educación"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (177, '*', 'admin', 'education-level.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (28, 'brackets/admin-ui', 'admin', 'profile_dropdown.account', '{"en": "Account", "es": "Cuenta"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (29, 'brackets/admin-auth', 'admin', 'profile_dropdown.logout', '{"en": "Logout", "es": "Salir"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (30, 'brackets/admin-ui', 'admin', 'sidebar.content', '{"en": "Operations", "es": "Operaciones"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (187, '*', 'admin', 'applicant.title', '{"en": "Applicants", "es": "Postulantes"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (226, 'brackets/admin-ui', 'admin', 'sidebar.atc', '{"en": "brackets/admin-ui::admin.sidebar.atc", "es": "ATC"}', NULL, '2020-02-14 07:57:42', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (227, '*', 'admin', 'applicant.viewatc', '{"en": "admin.applicant.viewatc", "es": "Listado ATC"}', NULL, '2020-02-14 07:57:42', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (31, 'brackets/admin-ui', 'admin', 'sidebar.settings', '{"en": "Settings", "es": "Configuraciones"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (213, '*', 'admin', 'sidebar.settings.general', '{"en": "General", "es": "General"}', NULL, '2020-01-15 13:41:32', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (183, '*', 'admin', 'state.title', '{"en": "States", "es": "Departamentos"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (178, '*', 'admin', 'city.title', '{"en": "Cities", "es": "Ciudades"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (182, '*', 'admin', 'education-level.title', '{"en": "Education levels", "es": "Niveles de Educación"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (186, '*', 'admin', 'applicant-relationship.title', '{"en": "Relationships", "es": "Relaciones"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (184, '*', 'admin', 'status.title', '{"en": "Status", "es": "Estados"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (185, '*', 'admin', 'questionnaire-type.title', '{"en": "Questionnaire types", "es": "Tipos de Cuestionarios"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (188, '*', 'admin', 'questionnaire-template.title', '{"en": "Questionnaire templates", "es": "Template de Cuestionarios"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (211, 'brackets/admin-ui', 'admin', 'sidebar.access', '{"en": "Access", "es": "Accesos"}', NULL, '2020-01-13 09:52:26', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (32, '*', 'admin', 'admin-user.actions.edit_password', '{"en": "Edit Password", "es": "Editar Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (33, '*', 'admin', 'admin-user.actions.edit_profile', '{"en": "Edit Profile", "es": "Editar Perfil"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (230, 'brackets/admin-ui', 'admin', 'btn.documentsatc', '{"en": "brackets/admin-ui::admin.btn.documentsatc", "es": "Subir Documentos"}', NULL, '2020-02-18 09:02:40', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (189, '*', 'admin', 'questionnaire-template.columns.name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (190, '*', 'admin', 'questionnaire-template.columns.enabled', '{"en": "Enabled", "es": "Habilitado"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (191, '*', 'admin', 'questionnaire-template.columns.questionnaire_type_id', '{"en": "Questionnaire type", "es": "Tipo de cuestionario"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (192, '*', 'admin', 'questionnaire-template.actions.create', '{"en": "New questionnaire template", "es": "Nuevo template de questionario"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (193, '*', 'admin', 'questionnaire-template.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (194, '*', 'admin', 'questionnaire-template.actions.index', '{"en": "Questionnaire template", "es": "Template de cuestionarios"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (195, '*', 'admin', 'questionnaire-template.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (196, '*', 'admin', 'questionnaire-type.columns.name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (197, '*', 'admin', 'questionnaire-type.actions.create', '{"en": "New questionnaire type", "es": "Nuevo tipo de questionario"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (198, '*', 'admin', 'questionnaire-type.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (199, '*', 'admin', 'questionnaire-type.actions.index', '{"en": "Questionnaire types", "es": "Tipos de cuestionario"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (200, '*', 'admin', 'questionnaire-type.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (201, '*', 'admin', 'state.columns.name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (202, '*', 'admin', 'state.actions.create', '{"en": "New state", "es": "Nuevo departamento"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (203, '*', 'admin', 'state.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (204, '*', 'admin', 'state.actions.index', '{"en": "States", "es": "Departamentos"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (205, '*', 'admin', 'state.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (206, '*', 'admin', 'status.columns.name', '{"en": "Name", "es": "Nombre"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (207, '*', 'admin', 'status.actions.create', '{"en": "New status", "es": "Nuevo estado"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (208, '*', 'admin', 'status.actions.edit', '{"en": "Edit", "es": "Editar"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (209, '*', 'admin', 'status.actions.index', '{"en": "Statuses", "es": "Estados"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (210, '*', 'admin', 'status.columns.id', '{"en": "ID", "es": "ID"}', NULL, '2020-01-10 14:41:14', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (50, 'brackets/admin-auth', 'admin', 'login.title', '{"en": "Login", "es": "Inicio de Sesión"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (51, 'brackets/admin-auth', 'admin', 'login.sign_in_text', '{"en": "Sign In to your account", "es": "Inicia Sesión"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (48, 'brackets/admin-auth', 'admin', 'auth_global.email', '{"en": "Your e-mail", "es": "Tu email"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (52, 'brackets/admin-auth', 'admin', 'auth_global.password', '{"en": "Password", "es": "Contraseña"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (54, 'brackets/admin-auth', 'admin', 'login.forgot_password', '{"en": "Forgot password?", "es": "Olvidó su contraseña?"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (83, 'brackets/admin-ui', 'admin', 'page_title_suffix', '{"en": "AMA MUVH", "es": "AMA MUVH"}', NULL, '2020-01-10 10:38:09', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (34, 'brackets/admin-auth', 'activations', 'email.line', '{"en": "You are receiving this email because we received an activation request for your account.", "es": "Estás recibiendo este email porque recibimos una solicitud de activación para tu cuenta"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (35, 'brackets/admin-auth', 'activations', 'email.action', '{"en": "Activate your account", "es": "Activa tu cuenta"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (36, 'brackets/admin-auth', 'activations', 'email.notRequested', '{"en": "If you did not request an activation, no further action is required.", "es": "Si no solicitaste una activación, no realice ninguna acción adicional"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (37, 'brackets/admin-auth', 'admin', 'activations.activated', '{"en": "Your account was activated!", "es": "Tu cuenta ha sido activada!"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (38, 'brackets/admin-auth', 'admin', 'activations.invalid_request', '{"en": "The request failed.", "es": "La solicitud falló!"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (39, 'brackets/admin-auth', 'admin', 'activations.disabled', '{"en": "Activation is disabled.", "es": "La activación se encuentra deshabilitada"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (40, 'brackets/admin-auth', 'admin', 'activations.sent', '{"en": "We have sent you an activation link!", "es": "Te hemos enviado un link de activación!"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (41, 'brackets/admin-auth', 'admin', 'passwords.sent', '{"en": "We have sent you a password reset link!", "es": "Te hemos enviado un link de restablecimiento de contraseña!"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);
INSERT INTO public.translations VALUES (42, 'brackets/admin-auth', 'admin', 'passwords.reset', '{"en": "Your password has been reset!", "es": "Tu contraseña ha sido restablecida!"}', NULL, '2020-01-10 10:00:47', '2020-02-26 09:03:21', NULL);


--
-- TOC entry 3202 (class 0 OID 66780)
-- Dependencies: 235
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3210 (class 0 OID 66840)
-- Dependencies: 243
-- Data for Name: wysiwyg_media; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3261 (class 0 OID 0)
-- Dependencies: 240
-- Name: admin_users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.admin_users_id_seq', 1, true);


--
-- TOC entry 3262 (class 0 OID 0)
-- Dependencies: 197
-- Name: applicant_answers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applicant_answers_id_seq', 8, true);


--
-- TOC entry 3263 (class 0 OID 0)
-- Dependencies: 199
-- Name: applicant_contact_methods_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applicant_contact_methods_id_seq', 1, false);


--
-- TOC entry 3264 (class 0 OID 0)
-- Dependencies: 201
-- Name: applicant_disabilities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applicant_disabilities_id_seq', 1, false);


--
-- TOC entry 3265 (class 0 OID 0)
-- Dependencies: 203
-- Name: applicant_diseases_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applicant_diseases_id_seq', 1, false);


--
-- TOC entry 3266 (class 0 OID 0)
-- Dependencies: 259
-- Name: applicant_documents_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applicant_documents_id_seq', 1, false);


--
-- TOC entry 3267 (class 0 OID 0)
-- Dependencies: 230
-- Name: applicant_questionnaires_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applicant_questionnaires_id_seq', 1, true);


--
-- TOC entry 3268 (class 0 OID 0)
-- Dependencies: 205
-- Name: applicant_relationships_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applicant_relationships_id_seq', 1, false);


--
-- TOC entry 3269 (class 0 OID 0)
-- Dependencies: 207
-- Name: applicant_statuses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applicant_statuses_id_seq', 2, true);


--
-- TOC entry 3270 (class 0 OID 0)
-- Dependencies: 209
-- Name: applicants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applicants_id_seq', 2, true);


--
-- TOC entry 3271 (class 0 OID 0)
-- Dependencies: 211
-- Name: cities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cities_id_seq', 2, true);


--
-- TOC entry 3272 (class 0 OID 0)
-- Dependencies: 213
-- Name: contact_methods_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.contact_methods_id_seq', 6, true);


--
-- TOC entry 3273 (class 0 OID 0)
-- Dependencies: 215
-- Name: disabilities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.disabilities_id_seq', 4, true);


--
-- TOC entry 3274 (class 0 OID 0)
-- Dependencies: 217
-- Name: diseases_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.diseases_id_seq', 4, true);


--
-- TOC entry 3275 (class 0 OID 0)
-- Dependencies: 257
-- Name: document_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.document_types_id_seq', 7, true);


--
-- TOC entry 3276 (class 0 OID 0)
-- Dependencies: 219
-- Name: education_levels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.education_levels_id_seq', 6, true);


--
-- TOC entry 3277 (class 0 OID 0)
-- Dependencies: 244
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 3278 (class 0 OID 0)
-- Dependencies: 246
-- Name: media_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.media_id_seq', 4, true);


--
-- TOC entry 3279 (class 0 OID 0)
-- Dependencies: 232
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 27, true);


--
-- TOC entry 3280 (class 0 OID 0)
-- Dependencies: 248
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permissions_id_seq', 100, true);


--
-- TOC entry 3281 (class 0 OID 0)
-- Dependencies: 221
-- Name: questionnaire_template_questions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.questionnaire_template_questions_id_seq', 1, true);


--
-- TOC entry 3282 (class 0 OID 0)
-- Dependencies: 223
-- Name: questionnaire_templates_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.questionnaire_templates_id_seq', 1, true);


--
-- TOC entry 3283 (class 0 OID 0)
-- Dependencies: 225
-- Name: questionnaire_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.questionnaire_types_id_seq', 1, true);


--
-- TOC entry 3284 (class 0 OID 0)
-- Dependencies: 250
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_seq', 1, true);


--
-- TOC entry 3285 (class 0 OID 0)
-- Dependencies: 227
-- Name: states_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.states_id_seq', 1, true);


--
-- TOC entry 3286 (class 0 OID 0)
-- Dependencies: 229
-- Name: statuses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.statuses_id_seq', 4, true);


--
-- TOC entry 3287 (class 0 OID 0)
-- Dependencies: 255
-- Name: translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.translations_id_seq', 242, true);


--
-- TOC entry 3288 (class 0 OID 0)
-- Dependencies: 234
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 3289 (class 0 OID 0)
-- Dependencies: 242
-- Name: wysiwyg_media_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.wysiwyg_media_id_seq', 1, false);


--
-- TOC entry 2943 (class 2606 OID 66521)
-- Name: applicant_relationships _copy_3; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_relationships
    ADD CONSTRAINT _copy_3 PRIMARY KEY (id);


--
-- TOC entry 2947 (class 2606 OID 66523)
-- Name: applicants _copy_4; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicants
    ADD CONSTRAINT _copy_4 PRIMARY KEY (id);


--
-- TOC entry 2949 (class 2606 OID 66525)
-- Name: cities _copy_5; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cities
    ADD CONSTRAINT _copy_5 PRIMARY KEY (id);


--
-- TOC entry 2957 (class 2606 OID 66527)
-- Name: education_levels _copy_6; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.education_levels
    ADD CONSTRAINT _copy_6 PRIMARY KEY (id);


--
-- TOC entry 2984 (class 2606 OID 66836)
-- Name: admin_users admin_users_email_deleted_at_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_users
    ADD CONSTRAINT admin_users_email_deleted_at_unique UNIQUE (email, deleted_at);


--
-- TOC entry 2987 (class 2606 OID 66834)
-- Name: admin_users admin_users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_users
    ADD CONSTRAINT admin_users_pkey PRIMARY KEY (id);


--
-- TOC entry 2935 (class 2606 OID 66533)
-- Name: applicant_answers applicant_answers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_answers
    ADD CONSTRAINT applicant_answers_pkey PRIMARY KEY (id);


--
-- TOC entry 2937 (class 2606 OID 66535)
-- Name: applicant_contact_methods applicant_contact_methods_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_contact_methods
    ADD CONSTRAINT applicant_contact_methods_pkey PRIMARY KEY (id);


--
-- TOC entry 2939 (class 2606 OID 66537)
-- Name: applicant_disabilities applicant_disabilities_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_disabilities
    ADD CONSTRAINT applicant_disabilities_pkey PRIMARY KEY (id);


--
-- TOC entry 2941 (class 2606 OID 66539)
-- Name: applicant_diseases applicant_diseases_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_diseases
    ADD CONSTRAINT applicant_diseases_pkey PRIMARY KEY (id);


--
-- TOC entry 3015 (class 2606 OID 90129)
-- Name: applicant_documents applicant_documents_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_documents
    ADD CONSTRAINT applicant_documents_pkey PRIMARY KEY (id);


--
-- TOC entry 2972 (class 2606 OID 66754)
-- Name: applicant_questionnaires applicant_questionnaires_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_questionnaires
    ADD CONSTRAINT applicant_questionnaires_pkey PRIMARY KEY (id);


--
-- TOC entry 2945 (class 2606 OID 66543)
-- Name: applicant_statuses applicant_statuses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_statuses
    ADD CONSTRAINT applicant_statuses_pkey PRIMARY KEY (id);


--
-- TOC entry 2951 (class 2606 OID 66545)
-- Name: contact_methods contact_methods_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contact_methods
    ADD CONSTRAINT contact_methods_pkey PRIMARY KEY (id);


--
-- TOC entry 2953 (class 2606 OID 66547)
-- Name: disabilities disabilities_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.disabilities
    ADD CONSTRAINT disabilities_pkey PRIMARY KEY (id);


--
-- TOC entry 2955 (class 2606 OID 66549)
-- Name: diseases diseases_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diseases
    ADD CONSTRAINT diseases_pkey PRIMARY KEY (id);


--
-- TOC entry 3013 (class 2606 OID 90121)
-- Name: document_types document_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.document_types
    ADD CONSTRAINT document_types_pkey PRIMARY KEY (id);


--
-- TOC entry 2992 (class 2606 OID 66861)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 2995 (class 2606 OID 66872)
-- Name: media media_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.media
    ADD CONSTRAINT media_pkey PRIMARY KEY (id);


--
-- TOC entry 2974 (class 2606 OID 66777)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 3002 (class 2606 OID 66906)
-- Name: model_has_permissions model_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_pkey PRIMARY KEY (permission_id, model_id, model_type);


--
-- TOC entry 3005 (class 2606 OID 66917)
-- Name: model_has_roles model_has_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_pkey PRIMARY KEY (role_id, model_id, model_type);


--
-- TOC entry 2997 (class 2606 OID 66884)
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- TOC entry 2959 (class 2606 OID 66563)
-- Name: questionnaire_template_questions questionnaire_template_questions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire_template_questions
    ADD CONSTRAINT questionnaire_template_questions_pkey PRIMARY KEY (id);


--
-- TOC entry 2962 (class 2606 OID 66565)
-- Name: questionnaire_templates questionnaire_templates_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire_templates
    ADD CONSTRAINT questionnaire_templates_pkey PRIMARY KEY (id);


--
-- TOC entry 2966 (class 2606 OID 66567)
-- Name: questionnaire_types questionnaire_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire_types
    ADD CONSTRAINT questionnaire_types_pkey PRIMARY KEY (id);


--
-- TOC entry 3007 (class 2606 OID 66932)
-- Name: role_has_permissions role_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_pkey PRIMARY KEY (permission_id, role_id);


--
-- TOC entry 2999 (class 2606 OID 66895)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- TOC entry 2968 (class 2606 OID 66573)
-- Name: states states_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.states
    ADD CONSTRAINT states_pkey PRIMARY KEY (id);


--
-- TOC entry 2970 (class 2606 OID 66575)
-- Name: statuses statuses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.statuses
    ADD CONSTRAINT statuses_pkey PRIMARY KEY (id);


--
-- TOC entry 3011 (class 2606 OID 66944)
-- Name: translations translations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.translations
    ADD CONSTRAINT translations_pkey PRIMARY KEY (id);


--
-- TOC entry 2976 (class 2606 OID 66790)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2978 (class 2606 OID 66788)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2989 (class 2606 OID 66848)
-- Name: wysiwyg_media wysiwyg_media_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.wysiwyg_media
    ADD CONSTRAINT wysiwyg_media_pkey PRIMARY KEY (id);


--
-- TOC entry 2980 (class 1259 OID 66805)
-- Name: activations_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX activations_email_index ON public.activations USING btree (email);


--
-- TOC entry 2981 (class 1259 OID 66813)
-- Name: admin_activations_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX admin_activations_email_index ON public.admin_activations USING btree (email);


--
-- TOC entry 2982 (class 1259 OID 66820)
-- Name: admin_password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX admin_password_resets_email_index ON public.admin_password_resets USING btree (email);


--
-- TOC entry 2985 (class 1259 OID 66837)
-- Name: admin_users_email_null_deleted_at; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX admin_users_email_null_deleted_at ON public.admin_users USING btree (email) WHERE (deleted_at IS NULL);


--
-- TOC entry 2993 (class 1259 OID 66873)
-- Name: media_model_type_model_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX media_model_type_model_id_index ON public.media USING btree (model_type, model_id);


--
-- TOC entry 3000 (class 1259 OID 66899)
-- Name: model_has_permissions_model_id_model_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);


--
-- TOC entry 3003 (class 1259 OID 66910)
-- Name: model_has_roles_model_id_model_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX model_has_roles_model_id_model_type_index ON public.model_has_roles USING btree (model_id, model_type);


--
-- TOC entry 2979 (class 1259 OID 66797)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- TOC entry 3008 (class 1259 OID 66946)
-- Name: translations_group_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX translations_group_index ON public.translations USING btree ("group");


--
-- TOC entry 3009 (class 1259 OID 66945)
-- Name: translations_namespace_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX translations_namespace_index ON public.translations USING btree (namespace);


--
-- TOC entry 2963 (class 1259 OID 66713)
-- Name: unique_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX unique_id ON public.questionnaire_templates USING btree (id);


--
-- TOC entry 2964 (class 1259 OID 66714)
-- Name: unique_id_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX unique_id_fk ON public.questionnaire_templates USING btree (questionnaire_type_id);


--
-- TOC entry 2960 (class 1259 OID 66712)
-- Name: unique_id_qtq; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX unique_id_qtq ON public.questionnaire_template_questions USING btree (id);


--
-- TOC entry 2990 (class 1259 OID 66849)
-- Name: wysiwyg_media_wysiwygable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX wysiwyg_media_wysiwygable_id_index ON public.wysiwyg_media USING btree (wysiwygable_id);


--
-- TOC entry 3016 (class 2606 OID 66755)
-- Name: applicant_answers fk_applicant_answers_applicant_quretionnaire_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_answers
    ADD CONSTRAINT fk_applicant_answers_applicant_quretionnaire_1 FOREIGN KEY (applicant_questionnaire_id) REFERENCES public.applicant_questionnaires(id);


--
-- TOC entry 3018 (class 2606 OID 66600)
-- Name: applicant_contact_methods fk_applicant_contact_methods_applicants_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_contact_methods
    ADD CONSTRAINT fk_applicant_contact_methods_applicants_1 FOREIGN KEY (applicant_id) REFERENCES public.applicants(id);


--
-- TOC entry 3019 (class 2606 OID 66605)
-- Name: applicant_contact_methods fk_applicant_contact_methods_contact_methods_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_contact_methods
    ADD CONSTRAINT fk_applicant_contact_methods_contact_methods_1 FOREIGN KEY (contact_method_id) REFERENCES public.contact_methods(id);


--
-- TOC entry 3020 (class 2606 OID 66610)
-- Name: applicant_disabilities fk_applicant_disabilities_applicants_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_disabilities
    ADD CONSTRAINT fk_applicant_disabilities_applicants_1 FOREIGN KEY (applicant_id) REFERENCES public.applicants(id) ON DELETE CASCADE;


--
-- TOC entry 3021 (class 2606 OID 66615)
-- Name: applicant_disabilities fk_applicant_disabilities_disabilities_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_disabilities
    ADD CONSTRAINT fk_applicant_disabilities_disabilities_1 FOREIGN KEY (disability_id) REFERENCES public.disabilities(id);


--
-- TOC entry 3022 (class 2606 OID 66620)
-- Name: applicant_diseases fk_applicant_diseases_applicants_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_diseases
    ADD CONSTRAINT fk_applicant_diseases_applicants_1 FOREIGN KEY (applicant_id) REFERENCES public.applicants(id) ON DELETE CASCADE;


--
-- TOC entry 3023 (class 2606 OID 66625)
-- Name: applicant_diseases fk_applicant_diseases_diseases_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_diseases
    ADD CONSTRAINT fk_applicant_diseases_diseases_1 FOREIGN KEY (disease_id) REFERENCES public.diseases(id);


--
-- TOC entry 3041 (class 2606 OID 90135)
-- Name: applicant_documents fk_applicant_documents_applicants_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_documents
    ADD CONSTRAINT fk_applicant_documents_applicants_1 FOREIGN KEY (applicant_id) REFERENCES public.applicants(id);


--
-- TOC entry 3040 (class 2606 OID 90130)
-- Name: applicant_documents fk_applicant_documents_document_types_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_documents
    ADD CONSTRAINT fk_applicant_documents_document_types_1 FOREIGN KEY (document_id) REFERENCES public.document_types(id);


--
-- TOC entry 3034 (class 2606 OID 66760)
-- Name: applicant_questionnaires fk_applicant_quretionnaire_applicants_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_questionnaires
    ADD CONSTRAINT fk_applicant_quretionnaire_applicants_1 FOREIGN KEY (applicant_id) REFERENCES public.applicants(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3035 (class 2606 OID 66765)
-- Name: applicant_questionnaires fk_applicant_quretionnaire_questionnaire_templates_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_questionnaires
    ADD CONSTRAINT fk_applicant_quretionnaire_questionnaire_templates_1 FOREIGN KEY (quiestionnaire_template_id) REFERENCES public.questionnaire_templates(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3024 (class 2606 OID 66640)
-- Name: applicant_statuses fk_applicant_statuses_applicants_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_statuses
    ADD CONSTRAINT fk_applicant_statuses_applicants_1 FOREIGN KEY (applicant_id) REFERENCES public.applicants(id);


--
-- TOC entry 3025 (class 2606 OID 66645)
-- Name: applicant_statuses fk_applicant_statuses_statuses_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_statuses
    ADD CONSTRAINT fk_applicant_statuses_statuses_1 FOREIGN KEY (status_id) REFERENCES public.statuses(id);


--
-- TOC entry 3026 (class 2606 OID 66650)
-- Name: applicants fk_applicants_applicant_relationships_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicants
    ADD CONSTRAINT fk_applicants_applicant_relationships_1 FOREIGN KEY (applicant_relationship) REFERENCES public.applicant_relationships(id);


--
-- TOC entry 3027 (class 2606 OID 66655)
-- Name: applicants fk_applicants_applicants_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicants
    ADD CONSTRAINT fk_applicants_applicants_1 FOREIGN KEY (parent_applicant) REFERENCES public.applicants(id);


--
-- TOC entry 3028 (class 2606 OID 66660)
-- Name: applicants fk_applicants_cities_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicants
    ADD CONSTRAINT fk_applicants_cities_1 FOREIGN KEY (city_id) REFERENCES public.cities(id);


--
-- TOC entry 3029 (class 2606 OID 66665)
-- Name: applicants fk_applicants_education_levels_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicants
    ADD CONSTRAINT fk_applicants_education_levels_1 FOREIGN KEY (education_level) REFERENCES public.education_levels(id);


--
-- TOC entry 3030 (class 2606 OID 66670)
-- Name: applicants fk_applicants_states_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicants
    ADD CONSTRAINT fk_applicants_states_1 FOREIGN KEY (state_id) REFERENCES public.states(id);


--
-- TOC entry 3031 (class 2606 OID 66675)
-- Name: cities fk_cities_states_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cities
    ADD CONSTRAINT fk_cities_states_1 FOREIGN KEY (state_id) REFERENCES public.states(id);


--
-- TOC entry 3032 (class 2606 OID 66720)
-- Name: questionnaire_template_questions fk_questionarire_templates; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire_template_questions
    ADD CONSTRAINT fk_questionarire_templates FOREIGN KEY (questionnaire_template_id) REFERENCES public.questionnaire_templates(id);


--
-- TOC entry 3033 (class 2606 OID 66685)
-- Name: questionnaire_templates fk_questionnaire_templates_questionnaire_types_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire_templates
    ADD CONSTRAINT fk_questionnaire_templates_questionnaire_types_1 FOREIGN KEY (questionnaire_type_id) REFERENCES public.questionnaire_types(id);


--
-- TOC entry 3017 (class 2606 OID 66715)
-- Name: applicant_answers fk_questionnaire_templete_question; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applicant_answers
    ADD CONSTRAINT fk_questionnaire_templete_question FOREIGN KEY (question_id) REFERENCES public.questionnaire_template_questions(id);


--
-- TOC entry 3036 (class 2606 OID 66900)
-- Name: model_has_permissions model_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- TOC entry 3037 (class 2606 OID 66911)
-- Name: model_has_roles model_has_roles_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


--
-- TOC entry 3038 (class 2606 OID 66921)
-- Name: role_has_permissions role_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- TOC entry 3039 (class 2606 OID 66926)
-- Name: role_has_permissions role_has_permissions_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


-- Completed on 2020-02-27 15:04:51

--
-- PostgreSQL database dump complete
--

