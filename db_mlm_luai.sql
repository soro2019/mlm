PGDMP     !    !            	    x            db_mlm    10.14    10.14 �    O           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            P           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            Q           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            R           1262    16586    db_mlm    DATABASE     �   CREATE DATABASE db_mlm WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'French_France.1252' LC_CTYPE = 'French_France.1252';
    DROP DATABASE db_mlm;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            S           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            T           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    16587    articles    TABLE     �   CREATE TABLE public.articles (
    id integer NOT NULL,
    titre_article character(250),
    img_article character(100),
    description_article text,
    id_categorie integer,
    date_create integer
);
    DROP TABLE public.articles;
       public         postgres    false    3            �            1259    16593    articles_id_seq1    SEQUENCE     �   CREATE SEQUENCE public.articles_id_seq1
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.articles_id_seq1;
       public       postgres    false    3    196            U           0    0    articles_id_seq1    SEQUENCE OWNED BY     D   ALTER SEQUENCE public.articles_id_seq1 OWNED BY public.articles.id;
            public       postgres    false    197            �            1259    16595    categorie_article    TABLE     t   CREATE TABLE public.categorie_article (
    id integer NOT NULL,
    lib character(255),
    date_create integer
);
 %   DROP TABLE public.categorie_article;
       public         postgres    false    3            �            1259    16598    categorie_article_id_seq1    SEQUENCE     �   CREATE SEQUENCE public.categorie_article_id_seq1
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.categorie_article_id_seq1;
       public       postgres    false    3    198            V           0    0    categorie_article_id_seq1    SEQUENCE OWNED BY     V   ALTER SEQUENCE public.categorie_article_id_seq1 OWNED BY public.categorie_article.id;
            public       postgres    false    199            �            1259    24926    clones_matrice1    TABLE     �   CREATE TABLE public.clones_matrice1 (
    id bigint NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 #   DROP TABLE public.clones_matrice1;
       public         postgres    false    3            �            1259    24924    clones_matrice1_id_seq    SEQUENCE        CREATE SEQUENCE public.clones_matrice1_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.clones_matrice1_id_seq;
       public       postgres    false    3    238            W           0    0    clones_matrice1_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.clones_matrice1_id_seq OWNED BY public.clones_matrice1.id;
            public       postgres    false    237            �            1259    25007    clones_matrice10    TABLE     �   CREATE TABLE public.clones_matrice10 (
    id bigint DEFAULT nextval('public.clones_matrice1_id_seq'::regclass) NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 $   DROP TABLE public.clones_matrice10;
       public         postgres    false    237    3            �            1259    24935    clones_matrice2    TABLE     �   CREATE TABLE public.clones_matrice2 (
    id bigint DEFAULT nextval('public.clones_matrice1_id_seq'::regclass) NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 #   DROP TABLE public.clones_matrice2;
       public         postgres    false    237    3            �            1259    24944    clones_matrice3    TABLE     �   CREATE TABLE public.clones_matrice3 (
    id bigint DEFAULT nextval('public.clones_matrice1_id_seq'::regclass) NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 #   DROP TABLE public.clones_matrice3;
       public         postgres    false    237    3            �            1259    24953    clones_matrice4    TABLE     �   CREATE TABLE public.clones_matrice4 (
    id bigint DEFAULT nextval('public.clones_matrice1_id_seq'::regclass) NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 #   DROP TABLE public.clones_matrice4;
       public         postgres    false    237    3            �            1259    24962    clones_matrice5    TABLE     �   CREATE TABLE public.clones_matrice5 (
    id bigint DEFAULT nextval('public.clones_matrice1_id_seq'::regclass) NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 #   DROP TABLE public.clones_matrice5;
       public         postgres    false    237    3            �            1259    24971    clones_matrice6    TABLE     �   CREATE TABLE public.clones_matrice6 (
    id bigint DEFAULT nextval('public.clones_matrice1_id_seq'::regclass) NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 #   DROP TABLE public.clones_matrice6;
       public         postgres    false    237    3            �            1259    24980    clones_matrice7    TABLE     �   CREATE TABLE public.clones_matrice7 (
    id bigint DEFAULT nextval('public.clones_matrice1_id_seq'::regclass) NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 #   DROP TABLE public.clones_matrice7;
       public         postgres    false    237    3            �            1259    24989    clones_matrice8    TABLE     �   CREATE TABLE public.clones_matrice8 (
    id bigint DEFAULT nextval('public.clones_matrice1_id_seq'::regclass) NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 #   DROP TABLE public.clones_matrice8;
       public         postgres    false    237    3            �            1259    24998    clones_matrice9    TABLE     �   CREATE TABLE public.clones_matrice9 (
    id bigint DEFAULT nextval('public.clones_matrice1_id_seq'::regclass) NOT NULL,
    clone_pseudo character varying(255),
    reel_pseudo character varying(255),
    create_date bigint
);
 #   DROP TABLE public.clones_matrice9;
       public         postgres    false    237    3            �            1259    16600    comptes    TABLE     �   CREATE TABLE public.comptes (
    id integer NOT NULL,
    pseudo_propio character(100),
    typecompte integer,
    montant integer
);
    DROP TABLE public.comptes;
       public         postgres    false    3            �            1259    16603    comptes_id_seq    SEQUENCE     �   CREATE SEQUENCE public.comptes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.comptes_id_seq;
       public       postgres    false    3    200            X           0    0    comptes_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.comptes_id_seq OWNED BY public.comptes.id;
            public       postgres    false    201            �            1259    16605    groups    TABLE     �   CREATE TABLE public.groups (
    id integer NOT NULL,
    name character varying(20) NOT NULL,
    description character varying(100) NOT NULL,
    CONSTRAINT check_id CHECK ((id >= 0))
);
    DROP TABLE public.groups;
       public         postgres    false    3            �            1259    16609    groups_id_seq    SEQUENCE     �   CREATE SEQUENCE public.groups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.groups_id_seq;
       public       postgres    false    3    202            Y           0    0    groups_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.groups_id_seq OWNED BY public.groups.id;
            public       postgres    false    203            �            1259    16611    language    TABLE     �   CREATE TABLE public.language (
    id integer NOT NULL,
    phrase character(5000),
    english character(5000),
    french character(5000)
);
    DROP TABLE public.language;
       public         postgres    false    3            �            1259    16617    language_id_seq1    SEQUENCE     �   CREATE SEQUENCE public.language_id_seq1
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.language_id_seq1;
       public       postgres    false    3    204            Z           0    0    language_id_seq1    SEQUENCE OWNED BY     D   ALTER SEQUENCE public.language_id_seq1 OWNED BY public.language.id;
            public       postgres    false    205            �            1259    16619    language_list    TABLE     q   CREATE TABLE public.language_list (
    id integer NOT NULL,
    name character(255),
    form character(255)
);
 !   DROP TABLE public.language_list;
       public         postgres    false    3            �            1259    16625    language_list_id_seq1    SEQUENCE     �   CREATE SEQUENCE public.language_list_id_seq1
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.language_list_id_seq1;
       public       postgres    false    3    206            [           0    0    language_list_id_seq1    SEQUENCE OWNED BY     N   ALTER SEQUENCE public.language_list_id_seq1 OWNED BY public.language_list.id;
            public       postgres    false    207            �            1259    16627    login_attempts    TABLE     �   CREATE TABLE public.login_attempts (
    id integer NOT NULL,
    ip_address character varying(45),
    login character varying(100) NOT NULL,
    "time" integer,
    CONSTRAINT check_id CHECK ((id >= 0))
);
 "   DROP TABLE public.login_attempts;
       public         postgres    false    3            �            1259    16631    login_attempts_id_seq    SEQUENCE     �   CREATE SEQUENCE public.login_attempts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.login_attempts_id_seq;
       public       postgres    false    208    3            \           0    0    login_attempts_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.login_attempts_id_seq OWNED BY public.login_attempts.id;
            public       postgres    false    209            �            1259    24780    matrice1    TABLE     �   CREATE TABLE public.matrice1 (
    id bigint NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice1;
       public         postgres    false    3            �            1259    24778    matrice1_id_seq    SEQUENCE     x   CREATE SEQUENCE public.matrice1_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.matrice1_id_seq;
       public       postgres    false    3    227            ]           0    0    matrice1_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.matrice1_id_seq OWNED BY public.matrice1.id;
            public       postgres    false    226            �            1259    24840 	   matrice10    TABLE     *  CREATE TABLE public.matrice10 (
    id bigint DEFAULT nextval('public.matrice1_id_seq'::regclass) NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice10;
       public         postgres    false    226    3            �            1259    24790    matrice2    TABLE     )  CREATE TABLE public.matrice2 (
    id bigint DEFAULT nextval('public.matrice1_id_seq'::regclass) NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice2;
       public         postgres    false    226    3            �            1259    24798    matrice3    TABLE     )  CREATE TABLE public.matrice3 (
    id bigint DEFAULT nextval('public.matrice1_id_seq'::regclass) NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice3;
       public         postgres    false    226    3            �            1259    24804    matrice4    TABLE     )  CREATE TABLE public.matrice4 (
    id bigint DEFAULT nextval('public.matrice1_id_seq'::regclass) NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice4;
       public         postgres    false    226    3            �            1259    24810    matrice5    TABLE     )  CREATE TABLE public.matrice5 (
    id bigint DEFAULT nextval('public.matrice1_id_seq'::regclass) NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice5;
       public         postgres    false    226    3            �            1259    24816    matrice6    TABLE     )  CREATE TABLE public.matrice6 (
    id bigint DEFAULT nextval('public.matrice1_id_seq'::regclass) NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice6;
       public         postgres    false    226    3            �            1259    24822    matrice7    TABLE     )  CREATE TABLE public.matrice7 (
    id bigint DEFAULT nextval('public.matrice1_id_seq'::regclass) NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice7;
       public         postgres    false    226    3            �            1259    24828    matrice8    TABLE     )  CREATE TABLE public.matrice8 (
    id bigint DEFAULT nextval('public.matrice1_id_seq'::regclass) NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice8;
       public         postgres    false    226    3            �            1259    24834    matrice9    TABLE     )  CREATE TABLE public.matrice9 (
    id bigint DEFAULT nextval('public.matrice1_id_seq'::regclass) NOT NULL,
    pseudo_user character varying(100),
    "pseudo_filleulGauche" character varying(100),
    "pseudo_filleulDroit" character varying(100),
    date_migration bigint,
    clone smallint
);
    DROP TABLE public.matrice9;
       public         postgres    false    226    3            �            1259    16633    matrices    TABLE     �   CREATE TABLE public.matrices (
    id bigint NOT NULL,
    niveau integer,
    pseudo_user character(100),
    "pseudo_filleulGauche" character(100),
    "pseudo_filleulDroit" character(100),
    date integer
);
    DROP TABLE public.matrices;
       public         postgres    false    3            �            1259    16636    matrices_id_seq    SEQUENCE     x   CREATE SEQUENCE public.matrices_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.matrices_id_seq;
       public       postgres    false    3    210            ^           0    0    matrices_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.matrices_id_seq OWNED BY public.matrices.id;
            public       postgres    false    211            �            1259    16638 
   operations    TABLE     �   CREATE TABLE public.operations (
    id integer NOT NULL,
    comptdestinataire integer,
    typeoperation integer,
    comptereceveur integer,
    pseudodestinataire character(100),
    dateopration integer
);
    DROP TABLE public.operations;
       public         postgres    false    3            �            1259    16641    operations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.operations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.operations_id_seq;
       public       postgres    false    212    3            _           0    0    operations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.operations_id_seq OWNED BY public.operations.id;
            public       postgres    false    213            �            1259    16643    pays    TABLE     "  CREATE TABLE public.pays (
    id integer NOT NULL,
    name character(255),
    "Formal_Name" character(255),
    "Type" character(255),
    "Sub_Type" character(255),
    "Sovereignty" character(255),
    "Capital" character(255),
    "ISO_4217_Currency_Code" character(255),
    "ISO_4217_Currency_Name" character(255),
    "ITU-T_Telephone_Code" character(255),
    "ISO_3166_1_2_Letter_Code" character(255),
    "ISO_3166_1_3_Letter_Code" character(255),
    "ISO_3166_1_Number" character(255),
    "IANA_Country_Code_TLD" character(255)
);
    DROP TABLE public.pays;
       public         postgres    false    3            �            1259    16649    pays_id_seq1    SEQUENCE     �   CREATE SEQUENCE public.pays_id_seq1
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.pays_id_seq1;
       public       postgres    false    214    3            `           0    0    pays_id_seq1    SEQUENCE OWNED BY     <   ALTER SEQUENCE public.pays_id_seq1 OWNED BY public.pays.id;
            public       postgres    false    215            �            1259    16651    produits    TABLE     �   CREATE TABLE public.produits (
    id bigint NOT NULL,
    name character(500),
    prix_vente integer,
    image character(100),
    status "char",
    date_insert integer
);
    DROP TABLE public.produits;
       public         postgres    false    3            �            1259    16657    produits_id_seq    SEQUENCE     x   CREATE SEQUENCE public.produits_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.produits_id_seq;
       public       postgres    false    216    3            a           0    0    produits_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.produits_id_seq OWNED BY public.produits.id;
            public       postgres    false    217            �            1259    16659 
   typecompte    TABLE     X   CREATE TABLE public.typecompte (
    id integer NOT NULL,
    libelle character(100)
);
    DROP TABLE public.typecompte;
       public         postgres    false    3            �            1259    16662    typecompte_id_seq    SEQUENCE     �   CREATE SEQUENCE public.typecompte_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.typecompte_id_seq;
       public       postgres    false    3    218            b           0    0    typecompte_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.typecompte_id_seq OWNED BY public.typecompte.id;
            public       postgres    false    219            �            1259    16664    typeoperation    TABLE     W   CREATE TABLE public.typeoperation (
    id integer NOT NULL,
    lib character(255)
);
 !   DROP TABLE public.typeoperation;
       public         postgres    false    3            �            1259    16667    typeoperation_id_seq    SEQUENCE     �   CREATE SEQUENCE public.typeoperation_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.typeoperation_id_seq;
       public       postgres    false    3    220            c           0    0    typeoperation_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.typeoperation_id_seq OWNED BY public.typeoperation.id;
            public       postgres    false    221            �            1259    16669    users    TABLE     A  CREATE TABLE public.users (
    id integer NOT NULL,
    ip_address character varying(45),
    username character varying(100),
    password character varying(255) NOT NULL,
    email character varying(254) NOT NULL,
    activation_selector character varying(255),
    activation_code character varying(255),
    forgotten_password_selector character varying(255),
    forgotten_password_code character varying(255),
    forgotten_password_time integer,
    remember_selector character varying(255),
    remember_code character varying(255),
    created_on integer NOT NULL,
    last_login integer,
    active integer,
    first_name character varying(50),
    last_name character varying(50),
    company character varying(100),
    phone character varying(20),
    pseudo character varying(250),
    pseudo_parrain character varying(250),
    pays integer,
    ville character varying(250),
    region character varying(250),
    code_postal character varying(250),
    social_reseau character varying(2048),
    salt character(255),
    img_profil character(100),
    genre "char",
    date_naissance date,
    "Lieu_naissance" character varying(5000),
    niveau integer,
    nbperson_accede_lien integer,
    nbperson_inscrit_via_lien integer,
    CONSTRAINT check_active CHECK ((active >= 0)),
    CONSTRAINT check_id CHECK ((id >= 0))
);
    DROP TABLE public.users;
       public         postgres    false    3            �            1259    16677    users_groups    TABLE     9  CREATE TABLE public.users_groups (
    id integer NOT NULL,
    user_id integer NOT NULL,
    group_id integer NOT NULL,
    CONSTRAINT users_groups_check_group_id CHECK ((group_id >= 0)),
    CONSTRAINT users_groups_check_id CHECK ((id >= 0)),
    CONSTRAINT users_groups_check_user_id CHECK ((user_id >= 0))
);
     DROP TABLE public.users_groups;
       public         postgres    false    3            �            1259    16683    users_groups_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_groups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.users_groups_id_seq;
       public       postgres    false    3    223            d           0    0    users_groups_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.users_groups_id_seq OWNED BY public.users_groups.id;
            public       postgres    false    224            �            1259    16685    users_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    3    222            e           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       postgres    false    225            &           2604    16687    articles id    DEFAULT     k   ALTER TABLE ONLY public.articles ALTER COLUMN id SET DEFAULT nextval('public.articles_id_seq1'::regclass);
 :   ALTER TABLE public.articles ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    197    196            '           2604    16688    categorie_article id    DEFAULT     }   ALTER TABLE ONLY public.categorie_article ALTER COLUMN id SET DEFAULT nextval('public.categorie_article_id_seq1'::regclass);
 C   ALTER TABLE public.categorie_article ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    199    198            F           2604    24929    clones_matrice1 id    DEFAULT     x   ALTER TABLE ONLY public.clones_matrice1 ALTER COLUMN id SET DEFAULT nextval('public.clones_matrice1_id_seq'::regclass);
 A   ALTER TABLE public.clones_matrice1 ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    237    238    238            (           2604    16689 
   comptes id    DEFAULT     h   ALTER TABLE ONLY public.comptes ALTER COLUMN id SET DEFAULT nextval('public.comptes_id_seq'::regclass);
 9   ALTER TABLE public.comptes ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    201    200            )           2604    16690 	   groups id    DEFAULT     f   ALTER TABLE ONLY public.groups ALTER COLUMN id SET DEFAULT nextval('public.groups_id_seq'::regclass);
 8   ALTER TABLE public.groups ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    203    202            +           2604    16691    language id    DEFAULT     k   ALTER TABLE ONLY public.language ALTER COLUMN id SET DEFAULT nextval('public.language_id_seq1'::regclass);
 :   ALTER TABLE public.language ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    205    204            ,           2604    16692    language_list id    DEFAULT     u   ALTER TABLE ONLY public.language_list ALTER COLUMN id SET DEFAULT nextval('public.language_list_id_seq1'::regclass);
 ?   ALTER TABLE public.language_list ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    207    206            -           2604    16693    login_attempts id    DEFAULT     v   ALTER TABLE ONLY public.login_attempts ALTER COLUMN id SET DEFAULT nextval('public.login_attempts_id_seq'::regclass);
 @   ALTER TABLE public.login_attempts ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    209    208            <           2604    24783    matrice1 id    DEFAULT     j   ALTER TABLE ONLY public.matrice1 ALTER COLUMN id SET DEFAULT nextval('public.matrice1_id_seq'::regclass);
 :   ALTER TABLE public.matrice1 ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    227    226    227            /           2604    16694    matrices id    DEFAULT     j   ALTER TABLE ONLY public.matrices ALTER COLUMN id SET DEFAULT nextval('public.matrices_id_seq'::regclass);
 :   ALTER TABLE public.matrices ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    211    210            0           2604    16695    operations id    DEFAULT     n   ALTER TABLE ONLY public.operations ALTER COLUMN id SET DEFAULT nextval('public.operations_id_seq'::regclass);
 <   ALTER TABLE public.operations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    213    212            1           2604    16696    pays id    DEFAULT     c   ALTER TABLE ONLY public.pays ALTER COLUMN id SET DEFAULT nextval('public.pays_id_seq1'::regclass);
 6   ALTER TABLE public.pays ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    215    214            2           2604    16697    produits id    DEFAULT     j   ALTER TABLE ONLY public.produits ALTER COLUMN id SET DEFAULT nextval('public.produits_id_seq'::regclass);
 :   ALTER TABLE public.produits ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    217    216            3           2604    16698    typecompte id    DEFAULT     n   ALTER TABLE ONLY public.typecompte ALTER COLUMN id SET DEFAULT nextval('public.typecompte_id_seq'::regclass);
 <   ALTER TABLE public.typecompte ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    219    218            4           2604    16699    typeoperation id    DEFAULT     t   ALTER TABLE ONLY public.typeoperation ALTER COLUMN id SET DEFAULT nextval('public.typeoperation_id_seq'::regclass);
 ?   ALTER TABLE public.typeoperation ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    221    220            5           2604    16700    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    225    222            8           2604    16701    users_groups id    DEFAULT     r   ALTER TABLE ONLY public.users_groups ALTER COLUMN id SET DEFAULT nextval('public.users_groups_id_seq'::regclass);
 >   ALTER TABLE public.users_groups ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    224    223                      0    16587    articles 
   TABLE DATA               r   COPY public.articles (id, titre_article, img_article, description_article, id_categorie, date_create) FROM stdin;
    public       postgres    false    196   6�                 0    16595    categorie_article 
   TABLE DATA               A   COPY public.categorie_article (id, lib, date_create) FROM stdin;
    public       postgres    false    198   ��       C          0    24926    clones_matrice1 
   TABLE DATA               U   COPY public.clones_matrice1 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    238   5�       L          0    25007    clones_matrice10 
   TABLE DATA               V   COPY public.clones_matrice10 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    247   ��       D          0    24935    clones_matrice2 
   TABLE DATA               U   COPY public.clones_matrice2 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    239   ��       E          0    24944    clones_matrice3 
   TABLE DATA               U   COPY public.clones_matrice3 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    240   ��       F          0    24953    clones_matrice4 
   TABLE DATA               U   COPY public.clones_matrice4 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    241   ��       G          0    24962    clones_matrice5 
   TABLE DATA               U   COPY public.clones_matrice5 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    242   �       H          0    24971    clones_matrice6 
   TABLE DATA               U   COPY public.clones_matrice6 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    243   3�       I          0    24980    clones_matrice7 
   TABLE DATA               U   COPY public.clones_matrice7 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    244   P�       J          0    24989    clones_matrice8 
   TABLE DATA               U   COPY public.clones_matrice8 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    245   m�       K          0    24998    clones_matrice9 
   TABLE DATA               U   COPY public.clones_matrice9 (id, clone_pseudo, reel_pseudo, create_date) FROM stdin;
    public       postgres    false    246   ��                 0    16600    comptes 
   TABLE DATA               I   COPY public.comptes (id, pseudo_propio, typecompte, montant) FROM stdin;
    public       postgres    false    200   ��                 0    16605    groups 
   TABLE DATA               7   COPY public.groups (id, name, description) FROM stdin;
    public       postgres    false    202   R�       !          0    16611    language 
   TABLE DATA               ?   COPY public.language (id, phrase, english, french) FROM stdin;
    public       postgres    false    204   ��       #          0    16619    language_list 
   TABLE DATA               7   COPY public.language_list (id, name, form) FROM stdin;
    public       postgres    false    206   ��       %          0    16627    login_attempts 
   TABLE DATA               G   COPY public.login_attempts (id, ip_address, login, "time") FROM stdin;
    public       postgres    false    208   �       8          0    24780    matrice1 
   TABLE DATA               y   COPY public.matrice1 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    227   2�       A          0    24840 	   matrice10 
   TABLE DATA               z   COPY public.matrice10 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    236   M�       9          0    24790    matrice2 
   TABLE DATA               y   COPY public.matrice2 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    228   j�       :          0    24798    matrice3 
   TABLE DATA               y   COPY public.matrice3 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    229   ��       ;          0    24804    matrice4 
   TABLE DATA               y   COPY public.matrice4 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    230   ��       <          0    24810    matrice5 
   TABLE DATA               y   COPY public.matrice5 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    231   �       =          0    24816    matrice6 
   TABLE DATA               y   COPY public.matrice6 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    232   .�       >          0    24822    matrice7 
   TABLE DATA               y   COPY public.matrice7 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    233   K�       ?          0    24828    matrice8 
   TABLE DATA               y   COPY public.matrice8 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    234   h�       @          0    24834    matrice9 
   TABLE DATA               y   COPY public.matrice9 (id, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date_migration, clone) FROM stdin;
    public       postgres    false    235   ��       '          0    16633    matrices 
   TABLE DATA               p   COPY public.matrices (id, niveau, pseudo_user, "pseudo_filleulGauche", "pseudo_filleulDroit", date) FROM stdin;
    public       postgres    false    210   ��       )          0    16638 
   operations 
   TABLE DATA               |   COPY public.operations (id, comptdestinataire, typeoperation, comptereceveur, pseudodestinataire, dateopration) FROM stdin;
    public       postgres    false    212   <�       +          0    16643    pays 
   TABLE DATA                 COPY public.pays (id, name, "Formal_Name", "Type", "Sub_Type", "Sovereignty", "Capital", "ISO_4217_Currency_Code", "ISO_4217_Currency_Name", "ITU-T_Telephone_Code", "ISO_3166_1_2_Letter_Code", "ISO_3166_1_3_Letter_Code", "ISO_3166_1_Number", "IANA_Country_Code_TLD") FROM stdin;
    public       postgres    false    214   Y�       -          0    16651    produits 
   TABLE DATA               T   COPY public.produits (id, name, prix_vente, image, status, date_insert) FROM stdin;
    public       postgres    false    216   fC      /          0    16659 
   typecompte 
   TABLE DATA               1   COPY public.typecompte (id, libelle) FROM stdin;
    public       postgres    false    218   �C      1          0    16664    typeoperation 
   TABLE DATA               0   COPY public.typeoperation (id, lib) FROM stdin;
    public       postgres    false    220   D      3          0    16669    users 
   TABLE DATA               �  COPY public.users (id, ip_address, username, password, email, activation_selector, activation_code, forgotten_password_selector, forgotten_password_code, forgotten_password_time, remember_selector, remember_code, created_on, last_login, active, first_name, last_name, company, phone, pseudo, pseudo_parrain, pays, ville, region, code_postal, social_reseau, salt, img_profil, genre, date_naissance, "Lieu_naissance", niveau, nbperson_accede_lien, nbperson_inscrit_via_lien) FROM stdin;
    public       postgres    false    222   �D      4          0    16677    users_groups 
   TABLE DATA               =   COPY public.users_groups (id, user_id, group_id) FROM stdin;
    public       postgres    false    223   �K      f           0    0    articles_id_seq1    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.articles_id_seq1', 1, false);
            public       postgres    false    197            g           0    0    categorie_article_id_seq1    SEQUENCE SET     H   SELECT pg_catalog.setval('public.categorie_article_id_seq1', 1, false);
            public       postgres    false    199            h           0    0    clones_matrice1_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.clones_matrice1_id_seq', 7, true);
            public       postgres    false    237            i           0    0    comptes_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.comptes_id_seq', 84, true);
            public       postgres    false    201            j           0    0    groups_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.groups_id_seq', 1, false);
            public       postgres    false    203            k           0    0    language_id_seq1    SEQUENCE SET     @   SELECT pg_catalog.setval('public.language_id_seq1', 231, true);
            public       postgres    false    205            l           0    0    language_list_id_seq1    SEQUENCE SET     D   SELECT pg_catalog.setval('public.language_list_id_seq1', 1, false);
            public       postgres    false    207            m           0    0    login_attempts_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.login_attempts_id_seq', 2, true);
            public       postgres    false    209            n           0    0    matrice1_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.matrice1_id_seq', 47, true);
            public       postgres    false    226            o           0    0    matrices_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.matrices_id_seq', 6, true);
            public       postgres    false    211            p           0    0    operations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.operations_id_seq', 1, false);
            public       postgres    false    213            q           0    0    pays_id_seq1    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.pays_id_seq1', 1, false);
            public       postgres    false    215            r           0    0    produits_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.produits_id_seq', 3, true);
            public       postgres    false    217            s           0    0    typecompte_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.typecompte_id_seq', 3, true);
            public       postgres    false    219            t           0    0    typeoperation_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.typeoperation_id_seq', 12, true);
            public       postgres    false    221            u           0    0    users_groups_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.users_groups_id_seq', 57, true);
            public       postgres    false    224            v           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 57, true);
            public       postgres    false    225            Q           2606    16703    articles articles_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.articles DROP CONSTRAINT articles_pkey;
       public         postgres    false    196            S           2606    16705 (   categorie_article categorie_article_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.categorie_article
    ADD CONSTRAINT categorie_article_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.categorie_article DROP CONSTRAINT categorie_article_pkey;
       public         postgres    false    198            �           2606    25015 &   clones_matrice10 clones_matrice10_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.clones_matrice10
    ADD CONSTRAINT clones_matrice10_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.clones_matrice10 DROP CONSTRAINT clones_matrice10_pkey;
       public         postgres    false    247            �           2606    24934 $   clones_matrice1 clones_matrice1_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.clones_matrice1
    ADD CONSTRAINT clones_matrice1_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.clones_matrice1 DROP CONSTRAINT clones_matrice1_pkey;
       public         postgres    false    238            �           2606    24943 $   clones_matrice2 clones_matrice2_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.clones_matrice2
    ADD CONSTRAINT clones_matrice2_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.clones_matrice2 DROP CONSTRAINT clones_matrice2_pkey;
       public         postgres    false    239            �           2606    24952 $   clones_matrice3 clones_matrice3_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.clones_matrice3
    ADD CONSTRAINT clones_matrice3_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.clones_matrice3 DROP CONSTRAINT clones_matrice3_pkey;
       public         postgres    false    240            �           2606    24961 $   clones_matrice4 clones_matrice4_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.clones_matrice4
    ADD CONSTRAINT clones_matrice4_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.clones_matrice4 DROP CONSTRAINT clones_matrice4_pkey;
       public         postgres    false    241            �           2606    24970 $   clones_matrice5 clones_matrice5_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.clones_matrice5
    ADD CONSTRAINT clones_matrice5_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.clones_matrice5 DROP CONSTRAINT clones_matrice5_pkey;
       public         postgres    false    242            �           2606    24979 $   clones_matrice6 clones_matrice6_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.clones_matrice6
    ADD CONSTRAINT clones_matrice6_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.clones_matrice6 DROP CONSTRAINT clones_matrice6_pkey;
       public         postgres    false    243            �           2606    24988 $   clones_matrice7 clones_matrice7_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.clones_matrice7
    ADD CONSTRAINT clones_matrice7_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.clones_matrice7 DROP CONSTRAINT clones_matrice7_pkey;
       public         postgres    false    244            �           2606    24997 $   clones_matrice8 clones_matrice8_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.clones_matrice8
    ADD CONSTRAINT clones_matrice8_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.clones_matrice8 DROP CONSTRAINT clones_matrice8_pkey;
       public         postgres    false    245            �           2606    25006 $   clones_matrice9 clones_matrice9_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.clones_matrice9
    ADD CONSTRAINT clones_matrice9_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.clones_matrice9 DROP CONSTRAINT clones_matrice9_pkey;
       public         postgres    false    246            U           2606    16707    comptes comptes_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.comptes
    ADD CONSTRAINT comptes_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.comptes DROP CONSTRAINT comptes_pkey;
       public         postgres    false    200            W           2606    16709    groups groups_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.groups DROP CONSTRAINT groups_pkey;
       public         postgres    false    202            [           2606    16711     language_list language_list_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.language_list
    ADD CONSTRAINT language_list_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.language_list DROP CONSTRAINT language_list_pkey;
       public         postgres    false    206            Y           2606    16713    language language_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.language
    ADD CONSTRAINT language_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.language DROP CONSTRAINT language_pkey;
       public         postgres    false    204            ]           2606    16715 "   login_attempts login_attempts_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.login_attempts
    ADD CONSTRAINT login_attempts_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.login_attempts DROP CONSTRAINT login_attempts_pkey;
       public         postgres    false    208            �           2606    24845    matrice10 matrice10_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.matrice10
    ADD CONSTRAINT matrice10_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.matrice10 DROP CONSTRAINT matrice10_pkey;
       public         postgres    false    236            y           2606    24785    matrice1 matrice1_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrice1
    ADD CONSTRAINT matrice1_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrice1 DROP CONSTRAINT matrice1_pkey;
       public         postgres    false    227            {           2606    24795    matrice2 matrice2_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrice2
    ADD CONSTRAINT matrice2_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrice2 DROP CONSTRAINT matrice2_pkey;
       public         postgres    false    228            }           2606    24803    matrice3 matrice3_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrice3
    ADD CONSTRAINT matrice3_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrice3 DROP CONSTRAINT matrice3_pkey;
       public         postgres    false    229                       2606    24809    matrice4 matrice4_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrice4
    ADD CONSTRAINT matrice4_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrice4 DROP CONSTRAINT matrice4_pkey;
       public         postgres    false    230            �           2606    24815    matrice5 matrice5_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrice5
    ADD CONSTRAINT matrice5_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrice5 DROP CONSTRAINT matrice5_pkey;
       public         postgres    false    231            �           2606    24821    matrice6 matrice6_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrice6
    ADD CONSTRAINT matrice6_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrice6 DROP CONSTRAINT matrice6_pkey;
       public         postgres    false    232            �           2606    24827    matrice7 matrice7_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrice7
    ADD CONSTRAINT matrice7_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrice7 DROP CONSTRAINT matrice7_pkey;
       public         postgres    false    233            �           2606    24833    matrice8 matrice8_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrice8
    ADD CONSTRAINT matrice8_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrice8 DROP CONSTRAINT matrice8_pkey;
       public         postgres    false    234            �           2606    24839    matrice9 matrice9_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrice9
    ADD CONSTRAINT matrice9_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrice9 DROP CONSTRAINT matrice9_pkey;
       public         postgres    false    235            _           2606    16717    matrices matrices_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matrices
    ADD CONSTRAINT matrices_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matrices DROP CONSTRAINT matrices_pkey;
       public         postgres    false    210            a           2606    16719    operations operations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.operations
    ADD CONSTRAINT operations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.operations DROP CONSTRAINT operations_pkey;
       public         postgres    false    212            c           2606    16721    pays pays_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.pays
    ADD CONSTRAINT pays_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.pays DROP CONSTRAINT pays_pkey;
       public         postgres    false    214            e           2606    16723    produits produits_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.produits
    ADD CONSTRAINT produits_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.produits DROP CONSTRAINT produits_pkey;
       public         postgres    false    216            g           2606    16725    typecompte typecompte_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.typecompte
    ADD CONSTRAINT typecompte_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.typecompte DROP CONSTRAINT typecompte_pkey;
       public         postgres    false    218            i           2606    16727     typeoperation typeoperation_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.typeoperation
    ADD CONSTRAINT typeoperation_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.typeoperation DROP CONSTRAINT typeoperation_pkey;
       public         postgres    false    220            k           2606    16729    users uc_activation_selector 
   CONSTRAINT     f   ALTER TABLE ONLY public.users
    ADD CONSTRAINT uc_activation_selector UNIQUE (activation_selector);
 F   ALTER TABLE ONLY public.users DROP CONSTRAINT uc_activation_selector;
       public         postgres    false    222            m           2606    16731    users uc_email 
   CONSTRAINT     J   ALTER TABLE ONLY public.users
    ADD CONSTRAINT uc_email UNIQUE (email);
 8   ALTER TABLE ONLY public.users DROP CONSTRAINT uc_email;
       public         postgres    false    222            o           2606    16733 $   users uc_forgotten_password_selector 
   CONSTRAINT     v   ALTER TABLE ONLY public.users
    ADD CONSTRAINT uc_forgotten_password_selector UNIQUE (forgotten_password_selector);
 N   ALTER TABLE ONLY public.users DROP CONSTRAINT uc_forgotten_password_selector;
       public         postgres    false    222            q           2606    16735    users uc_remember_selector 
   CONSTRAINT     b   ALTER TABLE ONLY public.users
    ADD CONSTRAINT uc_remember_selector UNIQUE (remember_selector);
 D   ALTER TABLE ONLY public.users DROP CONSTRAINT uc_remember_selector;
       public         postgres    false    222            u           2606    16737    users_groups uc_users_groups 
   CONSTRAINT     d   ALTER TABLE ONLY public.users_groups
    ADD CONSTRAINT uc_users_groups UNIQUE (user_id, group_id);
 F   ALTER TABLE ONLY public.users_groups DROP CONSTRAINT uc_users_groups;
       public         postgres    false    223    223            w           2606    16739    users_groups users_groups_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.users_groups
    ADD CONSTRAINT users_groups_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.users_groups DROP CONSTRAINT users_groups_pkey;
       public         postgres    false    223            s           2606    16741    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    222               �   x���;�0E��^���"9�۲�4�i{�(�'�X��@BY�Spۙ��Αo�^"�W�mԅG�#�~ �n�"Ah��}���{��\
�@�����8�������P�Jej���G��u������j�����>��Z�~&�         L   x�3�tL.)M��,9�RaDNCK3sC#.#N�����+�R�S�]�Ø3<5)3/1�hdrX��qqq 7�pm      C   ]   x�5�A
�  ϻ�	7�տQh��~({�9��Qޓ�ZΜb5��c{����Ύ:��U�R��aOY�G��Ag�d��q���(o      L      x������ � �      D      x������ � �      E      x������ � �      F      x������ � �      G      x������ � �      H      x������ � �      I      x������ � �      J      x������ � �      K      x������ � �         �  x���[jAE���Q8�P��\�#D�Al���c�2C��'�aq94�s?ݯ����s�������[bR�jn��o����֙�Lj�~n��_���iM�����<�g���03-�%�����۞�2lLK��i�pp��s�1p�1��	4̠a�ݐ!�2��q����o8���=Ӛ�)��[�0E�%�Ĵd��J�-�%�ʴd����-v�%����a^�Q�[�0�5sdZ2L�ah�v�Z�dؘ�;Ӓ���@�1�ӰD�K��d��ڍfݒaeZ2lLK�k7�uK��iM���4�k7�uk�ȴd����noܒaaZ2�LK�4�����}���C�-0�i�"Ӓ�ڍ`���3ӒaaZ2��a;h88��9�8�ACh7d��4��ض��P�\         6   x�3�LL����t���%E�%�E\F����IE���y�E�9
�ũE\1z\\\ �K�      !      x����nǡ����ST�� �	9��=�e-,E+99X ��5SC�=�=�<�/3�1/�"��u��^l8���@@�~�����$,�����*�    �    O |[�[�����5r    ��,��W��>.��MS�M�����    `Z�8    x�eS�UN����MUJ���&�=    ���<�I��g��f�����   �4�������"�W��>�Mӗ��6�Tb_Ǻ�o�B    ����?�u��˜���    `j��Ux�p�|��
    �C��_��v&    �!ȝ�T�t�ۮ�r    p0�"w��E�o��K\}��M)�6]Iq��ɞ^   �޾���_�~���_o�������Twq�b�o6���+�6�V    ������6Ǧ�1���VW)ΛE�?&W���rS���O����tC���    �_�}�;���joS��<����{�y��.wi�    ��/r�����p    �(�E�"�u    ��]^�W�z�-���n�]����M��o�O�U�<�~6;?~�W   ���C�;�f��   �úq�    S�D    <�����^6e�U    8�����N��y��]|��.�7c   �I�����C|]�e^��7   �t	q    ��˦���7�    ����,|��4}7�    �6!    �@�r��7u�~�M=�    ����ix��՟��7/^={���o�^    �^~��U��q    ��8    O�hv�����ū��    ���=���    ��3/�   ������_��~=�    ���6�Աߌ�    &-���yɛ��T    8���e�Kӕ7U)U�cj��G   �����%���n�s;�    �$'�    �	ͮ�-�M��{    Lէ۩:    �q    ��f�-�Z�Զ)�u�Wc�   ���t;�S��9n�I    0=N�   �8:=yhqu��mK)v��j�ݼo���4��^�yե���    ~��O�/ou�~�J�1w�����    �8    O���:<����������؛    `�B�Í    �D    <��������Mw���Mնi�U    0=ϧVm�cSc�   ��r"    ����ix���\֩�[U    d��kT   �`��   �'ptzަy_r�ێ=    �l_�>�=    �,��m��   ��;�]���庝�\|    &��7u�7c�    �Is"    ����q��f��   ��	q    ���y��j�    0iGW�a�!nJ��+G�    �`�__}�stu�����.���r}3�0    ��}����黱�    ��=���Nu7%��|H    b_�N�˦�%�����    ӵ/r�_�j���19    x|�"w^V]��Oƞ    �P�N���*�9�EU�q^m���j�q    09�yݕ1ױ{����i�{    L�?��[�8_�7��   ��::�oR��e�%    0m�߫��c�    ��s"    ����Ex�ًWo��y����k    `���_��~=�    �4'�    �	��BI7��J��{    L�    O 亝����    ����N�7�M����|S�?oƞ    �$�   �oS|��u�w�����>]W-i�e    0!Ggg�?}���]�{������cO   �I�    �	����?�z��ٷ����N}����7/�<{    L���y��!�cO   �I�    �	ܽ�:�N    ���"|Ք�����ml�b�I    0IB    <����"݇����*�c�   ��9:���fC���ҏ�����n�Y    09B    <��충ľ�u�ߦ���f�����    `R�ήԦ.��f    �    O ��ms��\�r[u��㢏�_>�
    �ӎN���/��n[��<ϩ�Twy��������궪����O�>�ݶ����:�y�+vw��[������ic��MY�g�v��    ���o���W��]��2wqY�u�ާX-�
�,���NݏM�����*U�C�K]����f�j~���/��ؿ    �kp,    ����ux�,��í�:nJ�̫�g   �䄿������8�p    px�"w^��SoϚ���*    <�}����m����^W�T�    ���E�4�p    px�"w�?#    оȝ�����    p`�"w�/;�L�w��    ���E�2�j�c�   �����𺤺Y����ؓ    `��E�:�.�mݬ۱   ��=$����u�};    l_�N�4�"    ��/r��UR�    ���E�4|Yu).R��ܶU=W�    ���������6��Y������/�xr}9�ݿ���   ��ھȝ�orꝑ   ���������j��i5�(    ��}���T�    ������Z��
    ��/r��M��M=�    ���"wy�5�_7mW��    ʾȝ�o�*m�7u��m���g�^�y������MWR���    �S�En^��ݶ4w���mW���<����f�>��������������    �f�(w����]�|?�"    ��}�;����.��   ����yx���M{    Lܾ�]��Uns���n�*���j���j�}�i�    0�"wަy_r�    о�]��uI7��J*q�ڸny��U���{&    L�C��:/��]Iq�6}V�    �0�E�$���MY?���m�ݶTw��    �G�or���n��m7�:��>�������������	    S�or�ῧ���y�    f_���7�����W�*�9Ŷ����m����.�r�ۦ��J��X�]I]u�/c�>    �/o����qS�e^9&    �/r�G�b��:��%��    �q=����J��8{    LؾȝE�t�I    0a�"w��uU�}D    i_�.����f�ۖ��V���.��^>�    ����U��Tu�L����R��8    x|�"w��rIq�Y5_�U���j5�<    ���"wr||wq��nRɾ&    3$���eS׻mj�&����i�ru    ���f�eS�ץYf�U   �`�$w����n�{    L����˪�mKN�6���}�r}3�<    ���ɝ�/�k�.��ױn��T�qS�.����    �aHr��O]���    7$����]v"    kHrW�YS/wے�yjǞ    �54���ż��ݫ��    ̾ɝ���fӔ.vi���?���   ����I���1�    ��!����f����q��M�̋Tw��eֱw   �TM�4��+pMW��M���    ����BZWy5�    ��!ɝ������    ֐�.B�(�mE9    8�!�]����j7�Y�2    1$��Ц����w    ���$wn���X7�8o֛U���    �Or�� �   ��I��>�    �5$�Yؔ��   ��I�4,�.ź�m[�s/�   �AI�,�r�%9    8�!ɝ��T%    kHr�}�^Kr    pXC���$�   ��I�*̛E������ث    `��$wn�j�    �>ɝ��nrS�=    �mHr'a�Ա�6U�أ    `��$7�e���]�|Q    ߐ�Nú�J��x2�&    ��!ɝIn6�&    ��!ɝI�t�M    0aC���\W�<��    &mHr�aS}hǞ    S7$���Nm\��*�+i    dHr�a�,�2�2�$    ��}�;;/S�5�M��   �C��I����ˇ�W   ���,�I].�   �AI�4|[��]&U    hHrg�����Խ��   ��I�|��^Է��rۦu����   ��I�"|�ٔ�6���k�W   �0 $  �$w^�T7�   ��I�*�l��*ߦ�{    Lא�×��9�6n�ҥ��%�������{    �H�M��8|Yu).>��pc�   ����I�K�K��؃    `چ$7_̻�Z�n�{    L���N÷�+i�=    0qC�;�����g���x��\�    44�������    ��6$��𬩗�mI��A9    8�!�]>��KqU��/�    �&w�-U�.S�ژ�.�Z�   �G7$��Nm�7�M��   ���'���n�)�2��    �5$���iS�h�    �6$�YX�R�Tڸ�J��*���껦�v[WY   ��M�4,��\��=    �jHrg��e�9    0uC�;ռ�U�v۱G   ��M�"�����o�����6��   �M�2̛z�ۖT��ث    `��&w��5    kHr������\a    �>�]���j;�,    ���ɝ�uS�UNu\���J�r]�8+    �jHr��)�2�b��.�7N�   �!I�4�zٔu�妎m_�ݩ�eN�j�    <�!ɝ�e*�T�    �6$������ڙ8    8�!�]�MIu��9    8�!�]�j���*w��,    34����n�6���7�Y�b�(�mSL�*�bj���m����.�r�ۦ?��    ~��.wJ�q�_�   ���'���0o֛.�uՕ<��    � �$wJ�rIe�E    0iC����Tu�L�    А�N�W�5u��U    8�!ɝ�j�)�mnsS�N�   �aI�<��:��6U�أ    `��$w6M_�ݶ�m�y�S������%�?����mUw��ǟ},�m{��֩����n��v���y۴1�˦��.7���    �KC����&�l�M��ػ    `��$w�m۬v���g��u��mKsw��m?���}S���.~�����.�r�ۦ?��K    ��ϐ�C5_u1׹��j�]    0Q�$w}�U.)�>��    �p�$w֩��f�-�3,s]������     �f�r�Е�n��two�v��i�q    0=C�;�;'�V7�d)    fHrga���n�ڸI���sZ��Y   ��64��n���4��Y    8�!�]�v���%w��أ    `ʆ(w�U�ۖ�Vm\W�����f�y    09C��
�wMߥ�:�M��>n�ҥ��ū    �8�$w�O]���    ���f�����.;    �5$�����MS�إ��:��Ks    ���$7�ꇱ�    ��I�4l�U��O�-R�7�2/R������c�   ����YX��������Z�v�i    0IC�;릎e�mSՏ�
    �khra�S}wmuS�R庺��    <�!�]��{�qq�K�wc�   ����UX�]�W�"    �44��0O�O�>Ǧ�b5�ﶋ�6V}t�    �>ʝ���U�u;/�s\    bHr'���U��Sr�S�ێ=    &hhr�OM���S��T�2    04�Ӑ�eS�U��:�}��|�    xC�;�+y��    8�!ɝ��Sqe�-���^    �54���4���Z���ۦ+)nJ��s)��ZG�    ��64��p��C*c/   �I��Ux8צ~ь=    �jHr�I�Z�Զ)�u�Wc�   ���'��qH?}?��?{    Lѐ�NN���z�-�݋�n��m7�:��6�c�y^u���9    ��7T��C�[7�o�n��#�    ���$w�M��e�J�    �P�$w�*�9�EU�q^m���j�u    09C�;m��%w��؛    `ʆ&w��r��K.�   ��I�2��5�S   �����Ó���.r�o����T֩�{�!.>K�e�w}*q��.�f�ۖ��M=��    �C���f��m�Sgk��    �Or�ǡ�?'����C�r    pC�;	�ݶmV��o�7m�MLm?��w�����c�   �)x�r������1 @      #   4   x�3�L+J�K�P� ���v.C�Լ�������h'(������ ���      %      x������ � �      8     x�e�aj!��a�Qc�=�BYڡl��0�����Ib�Y�I^��0{[��z7�n�|����\^�>르�כy,��e@�����$�$����t��o�U�D�_?�CO�*��t���#,d��;�.�:��6`7p^$$*�|��:�֤H�h�~��4 ���M]���Đ�ӹ?oKӡ�鐄��qZ�������q�LMr���,�P
��A�$ �#1�Ju@�{���g��,UZ�|�ˋ�����[      A      x������ � �      9   ]   x�36�LL/�,.���!C3sCK ��Ȕ�8�U���,gh�YZ�Z���Q��_�R	UclinRcbF��������"F��� J!�      :      x������ � �      ;      x������ � �      <      x������ � �      =      x������ � �      >      x������ � �      ?      x������ � �      @      x������ � �      '   �   x�����0�s<T1�MX�pAjUQ�"%ʁ�k�pj�����]-Ｍ[g9���L����ڭ�)��f��y1;7=�E�b@ ���z�=y`��O]J�m�"��Hz��<Q�J�dx�FcD�?�&��1� ~,���      )      x������ � �      +      x���v"I�篍��ˬ3-Z�g����(���̍�� ����Zy��/��o�O�����{fg������ꮺ07�g��f5�}_�Ul�L���2���,�i�2$�,��e��[�����D�z���<��m��ί�m��ӯ��R�n]�Q���6AT������������.m��*!��9 J�)э���A�!0�/<<3V�P|I���m�������z�)m��x�K� *^��������b�1י�W�b�ߡh��m��48՛daU�H\f�w����l�M����~;��ARtjbe����5�0�iD���I� )���&���˟�6H�Ҡ^�L�}����Dk�٪�d��b��s�����z��O:�`>�����F�I�Yni#E�vK�IQ:��_A;��ciDEU���AR�&�*�;�_T��������G���X����w��>��'��6�+$y�K� *����_�Q1#��J�983�\�����yt����?&��<����S"�I��Q�jK!(F!iDE��(Į�e\I� �J�zv�dP��<�_��"�sp��'���4��A�z7Si$E�"��	��AWƸ�csp�D8	��t�7�M��ʥx��\p�Wm�=D��7E�1x>ت����z�y�K� *�`hP�&m�������J�zy�Ya�ߋ��l6I��U���������*�k���D�[p��h�s@�V�Q������/%��6H�R;ށ0
���rB���dt�Z��	�=Э�\���	�b�v 5�{&d�6H�R�Q臨se~�^�A��w��9$��7�jc#��WF�7��};��ART��*�&���`�6*�K0[�1P�_J#��>���ϐ���T����ԗF �F�d��/m�������<�AxA;�J��@�*��}%�x�L6��]�A� a�� �F�\��0�X�n�6����	���c�F5�{����6H�Rk0ǫH-u�鉗�58N� \���Z��r0���5�3�?�N�H����	�����	��c�U�5��P�53�J<��Z�\�,y�J�?�N�C_6��F����	���hP���|.m��*��h>rT,���]u���;i[�D'_�oo�7 l���mdv�_�Q����_�A�0�������W&�m(\*�t��}F8OSA�@���;����:����?��AR�Do�;;�˪�:��O\/��g��&�5O+�N��� ���1r� ���M���@���M��� 1�s��^U��p�f��Ur���/���6H�έ��Vȉ°+m���䣴	���3�n��14	3���AR��N�y�	{U �
���f�]ö����Ax�ʣ̂U����e�Э3���������8��I�{�ᲇ*g��|�A� �
&�g�A-7&6ifUf��_#�2iT��o����4_X|��/�BE�I[��%:��~8���ǘ5����&��׏]&ۂ�&�˷S%�Hcf?w�_h�S��{㰠/�}b�����pgAo,m��h�,rGU�w��6H����	���K��
Ԇo�
���X��,��
���z�����j��$[�����D�I�$�����Ea�?K� *^?t$@m���������:�꧉�-������l��Ń𾉖JM�Ur :�����
�����&t�����&�����M�p������f���%b�+�RV{7���
�����;V�R�`��	NxG<`���+�A��X�]��AR���M�0���P��kU���� n.�����]�p��c%:`�#}/m����� 6�6AT�~�8Վ����W�6H����{ v�RħB���^�j��I�J i�n���d��Bt������:M�.Ẑߥm�T%�8��%ly���(�/<���f�[��(�\B���&�{�KiDE'����1t-a(�y�Jإ��̓%����XDWx��[Ǽ&:^K$"^`����Vȉ:��x�K� *^?v�Z�F�z�y��U�;�6IP˅Ka@_x.@��Jr���5R�/=���ױ3�}ht���k!x�������k±ZB%AK�e��e�Y��7B��{ ���U�iD���~2Y��d��_�X0d�������WIQ8_x�UX�UR�?�I� ):K����Nֱ����M�'��Zz��0t�J�N}& ����ݚ��_f`�'E��rܪqAA�])ׇ��.)
� �5�/ȱ{��_����*'E�|�A� ����h�1�� ��O�f��1��>���/���T�7�M?�z�p�� ��,��̨U|Pˍ�M�����G�4��x|R�VYeR��"�2iT�K�I/�?,�&�6H�&�����	�v�_�QQ��Tk�W ��fn9��_��N��ip� �7^8Eڴ?E�w���01��_}��AR�5/
�b��*R���K9�v �0��A�a�/����O�d3�},S������U�!}�eQ��g���aOUp�_�Q���3�m�a�?���&�	lKq��M�(���G������C����6H����	�b�v �0x�;�n�]�x��%8՛d��"��l��ſ��������ӵJ�����?X�n��[�~���������Q�Q��AR��Z̡0���A�	c?�k?��?���~�T�&���à_E��{ �»�].m��|�x�~0�H� *FahP��9b�FƩҨ1
��
n脍Wu�p�� ��9"���`��o��6H�x-�d������гf��/�m��:� �;]2p ���.�cu����}d"Ti�����B���6I��I~g���E_�}F:#b��Cs�[?���z�Nx��H&p \��MT�,��2��p����깴1b�������a�2�m1`��xF���kݚ����<#ܠ~>�>J ���_�{�BԿ�-Ԥ�5�_˹�/m��x�'�6H�A�F��ȥm�T�Ѥ����h��^Ta<_xލY6�$ź8����p���/����L����	����׺�5��ţ���4Z���뗶hr�Y���X����~ ��H,r} 5B�J�o�&���&m��(<��`�)m��*�6��x�이)RrmTW�d�r���� \�p?a��Jc����!8�$����t�����&��N��� �8a��=�Tit��'y��n�T ��~�ӏ�qލг(Į���/m��x�Н#(l���.H� �J�K����H�c�r��7I��U������o�T+ܒy��=_��H���v�N�N������m��5tƞ4�<~��T֗��UȒ]�4]�Itz��d�w��Ԏ:��@�ˀ�.�J�'����	���C�0� x7�%���`���Z&���Ru �/< �{n2������(rR��Ů8�����E�A�LVc� _���l��ͤ����%�r���{1e ��Eg��0x-�	n�K� *^?t1����J�IU�u:������2�O*g��|�A��4�?���g��;(M��k��G��0/�M�m�T�٠���*K�QQ0�M�QJ�Ua<_x.@x�"5�M	ӗ�o� |9Ha:%L�ߥM��� ��\�Ax�7i$Ui6�̚�" �ۢ�9
�t���{�FY���Etvs%m���J�}����5i$��_�Q���;���3��:,p ܢ�4Kb����0�/< <SQdb́�;ϰ{�m��~�n�nΠg����3i$� �]T�`�~Y�f�β�I�X�w :�KmU��M��*c$.��;w��]Fx�4iЛ��������lv"m����X��M��04��_H� )a��_�8��P�١s�u��S)#��uP��2�T�L����Ax�X.��$����,��X��Fk\�iD��/�    h`߈T�cWkv�c}ҦH��� \����Rߡ��tv]$Ig9r����M��Q���֏�F l�?���z����w����@�~/֘���{�(k. �@��A�D�O����>e���5���:,p \���C?)֯S�������&�����o��>�Fr ́n��o�xFx�\� 2n�F�%��!�T�|��Y�< |��y$m��h0�V�Jqo)�-��_�Q���A������������4Љ]��+�@��w���&2�$D���������>��ݦ����/m��x���6H��v�|uv�Ui5��FŏҦH�}Z�a|�Ax��62�B�F�F��4"�Sp>=���AR��K#�`�~Y�V�kC�@�*g��|�Ax�Gx� ,��b*m������a��6�n��E�v�3�ki$Ui�h`�F�q��HǇc4��Ax��ZǸm#|F<#\�.�d���n�}i$���� �5��@8VK�l�� ς�L	ex�E��𘐾��ߋ�ϔ8j@����w,� fA��(� �ת�:4�~6*��ru �/< ����ߥm����짂�A�cdv�_�Q���;GP�qHu�=e��e0�=��_@���'���/��|+]���CQ6�m��iDE��ju��_]�>�fU��{>:1i�ri��|��P�� �k� ���!�r�A���>K� *�[��A�A�IU�5�G�n�~r�l�U����6b�� �+�(����30��W�A��f�4⫴	���-�����ކ:U�!](�7�)e�}�A� �Ib�#�M��ۈ��l m��h����$5��{����6AT��Ki$E�:v X]c���t����*���;�A��w���*_�������-���p5���f���W��%�n��7B��c�5�U�^�v�.�x���	�@��w5��Rmu���-x�pb]�<TQz�����&���	0��F�q���t�Б�a�ȕ@���яw?Խ���GFt9J� )�����cQ������-�֏}#To��F�k�_Ti��#��x�� \��~Nu��]^AO���|��v���[�6AT��=̭�4�	}%� ^�v ��:E�'�a4_x.@���S6��ˢ�Sx6
w�<��bn�K� *^?t$@�x�����J�C�V!t�Fj�\b�x�?�[�|濊.o�A����\F�D��iD��Ga�Ҡ���8�:�����W ��»�rj�^*ب�.�N�ѩ���3���%�q��`�������J�A�ءytN]< �=���
�Yni#E�f]�I�噴	�b/ֆ.�a;�˪tjt�Z�qo�h.#
�»2Ym�TEz#m���r�r��k}���u�A��]��@��F/���8�2ST�ز�����bɃ�X�[xI>#�����ƿ����.g=i$E��{1�>��:}Te�O�}u���&^�Y�Z@����I���Q�ݔ6BP���M}�A;�Y�R��u�N�N�Yp�hڳ������81D'_�m�}��?��xCՏiD��>��.���J� �J�I��A�P�Zo�K�-����q���{�������5xR��<6|��6AT�~���1���4���Ou�N3P(������J$��7�R9��x��Emid��_�QѰ� �cw���Oi$U�i��G\x�x�� ��5��M栓f�Ax��;�D��W҆��&vC�!x��viD�{�W�����*��5s��2@��|�AxW#��z ��D�[����b�v�ᥴ	���c�F�]��_�C��_T�ti�X����M����`��m���4~��Ub�uP�ۿI���(�g/V,m��< <yL�գBM	�p�Y�I�g؞���Į��?����m�5��K#��u��@�����$����zߒ���:ɁK��ƃ0���V��iDEC��r5�@�z�{8��0P�=u_�a:�.��,~/�����I��iD���~,ۨ��?H� �J7��]=���p���Qǋyށ��I�w�N�)�p �X.��N]���@�Q����F4j�}S�A�w�t�4RI*m����_��
�A�؃p�ߨl�O�Q�Fph�k������Y�~�F���5�XIhY�n�A0�7�^(��p�7f����E�O#i$�~�m���У�x�K� *^?t$@���m�T�ۤ������n�:�()�W� �+����,D��g�4I�x)m�����iD���#B�e�K� �J�� �&�v�VFt����*�6�6FL4��g����Ea�4�Dޭ�4"�����>�A�M#3���@��<_xށp��,�E4��>P#��g������0��Qo�����;���
�V+F�daTd����\�8�Y5>��Zkޟ�<�&�Y�M"ؤ ����0x�����諴	�b�v �0x���Q�IU�]a�Xg:N3m +�ibM�0[���q����]���J�"'�_�K� ):�*{p(j�ui$E#�ˣ�3i$� �Vq�@N���1�p��U�z-��6�����Ӣ�䰅R4��	�L�~�E����@	��[i$E����F�OŃ��k4���7�$��=�i`U�N��z�s�'ႄ�>�W��[�*���b=�-��M�w�#ht��"m������5�}+$�X-�2�ʃ���'ႄ�w����D�!x���.�w��6H����	����w����m`�:1	י��j���A����|�I� �^����Ϛ{�� ��M�{�(��f�B�^�c�1��ShP�	^���݋I��$��r�W$�O»�%��l�Ϣ�g��bt�JL�Mi$��_�Q����2	����<H� )&�fA)RA@I�<�?ÜwB0�7��"�2i�2s���#_���~\E�$Ϭ��U�A-7&6)�w���&����h��T��ī��}8A-謐���&���=Z�a�}��N((`��`p�G9����iQ4_x��X��^�?��p��<*Ԉ��Fa���&��Ƨ��F����^�I1	�`]������|�I� ��Qw�E�;їk�R��n�Rw�Gϭ�@ |�vuI� )&�#�6�+	���~�D�����[�Z��މ�Ml���c��xK���2̉I��$l�5s@p�F*^"U8�H8[� �����?��������iE@MS^�Z]����	���cG����������j�� �5�l����p97�O�	_%��[��34��͵����|�����u�Q��0t��[?zN��n (H��'a�a��+C�pA�f�(��G ��Y�ɷl���:���|����wD{�W7�c�j!�����^86�^�T��A �$��� ���\I� )����w���)a���M�Ϡ�$�^�wi$�$\��Y�$֨Mu�\/�U���r�8>�$��	����"_'_'�=f�|,m���|
� jv�{�T�o�m��p��I�L��?�����x��$\�pmR+�+"�b��iԏ����$0�����7��u�Ki$�$�d���Ěxa�*2�㎆���IxW�������	�!w)H�-m��hܗ6AT�~����)�p7���[�VIP����'�����Je���4��~>=�W��I�!&��[�BW����m�� ���nbi$�0�v0��X�@��
�|�Ix�>a�J�Y��D>-���`���g�&��I�L�]i$�$�/��#d��p�I�&ܻQ�x�L6;�s�'ႄo�\av�-D�t� ��V��&(���0t��[?v$�<Fo� �ډI��$�Sm��o9��*'�O��1k�<Ê�E�o�ϧ�:3eP��S��~43�&m��h|� &a��_����AR�ZxL�G    o�>��v�~���ϖk�����%O»1k�q�h��A��x<��AR4|D��۔6AT���M�;'\��	�^�	ט6f�f���'ႄ?�x�N4�)�B�� o���I�
�:�
P��b.����b��sY%��+��'ႄ�*��_�R�֓02	���$�u뇞�L�|�p���$\�+�U��q�o$<��Pe덊�`����j}�M��`;�P��*{5�6AT�~��*�;��[i$�0�`���FL��=:l������I� ��&ʹ]�M�A-7&6ifUf��oE����u�!�+�F�?��|i*��__���7���$�n���"���X�,H��$�|�ʱ��=�i��jQEd	�E9]}�>��ȡ�Bn�K� *^?4S�	�`D� Т+�PV�rк�r�(�/<	�{i�X�{Ytu�=v���e2������-x�K� *^?��]&a�����ARL�m&��M��&a8_x���2j���}�>��ARtnU<����TzЖ[?v�P��=_����e1	wv$��?�Pt��ڪ(���1|�IxW*;�@|�o��W�6H����ȟXǾ�H� *^?t31&a�^Z+i$�$ܥ��>(�l���1DWx.H�:��]]��W�	rV��)a���M�<'�F��@>�����t�Q���v�ie*v�,��O»:�<] Ϛ�k�IC7��`@�6	\C�p�Ǿj���#�Ic�MԝI34 |]��ژE�:�'��.v��+�"�����[�B�����&��&=hP�^�E�Y�I8d�hK}'*0�/<	�r�:�w:A�9�۩��E��=ii�Y�Q�d� &a��)�탴�b�3	�j��X�	��pA���h�;��ARt��y��7���y�K� *^?xuDz�
�0�_P�p�`������&�hy�$Fq�'�	'6Ɖ����d!��oG�&~�_�*j��sb����L��u��-x�z�I��%�x�;��	���Z��:aΝ�_�O�A�_}���L�$�U�Q����:Ʈ�n���1	�h�-XilIe��'ႄG�6�gط���u�{;/m��x�K� *^?����1v?����/�I�M����vkb�J�#�	gk��Ó�Ӵe�0M.&�6H�&:En�I���	���/m��x�#i$�$�^���ARL��$��A�G�s�x��$\��geS��|�&#��(ɀ��n�K� *�\C;�Z5�.j�wbL���P���+�_�S��RH������J��pv�};z�[�p�<�&3iDE�hP+D��+8n��*n��s�LGx.H�4Y��F�~�a�0���6v����]�~p{�W��|�9��M�Q���C1`�� �9�keu
��5v��H��-��Y!���M��V�IQ�=g��зBC���������\/�UZ3)O»GcI�H�Keon��K���l���GK�_�Q����6H�I��$�p�WB�2#�$\��� 2	<�'ႄ�f�"؎��-�|.m���ܪ�D�,
��Ia���&���]!�$�h�⦁���4U�hh�,-��+}o Zh�D�`fa8ox�UG�4ՙ�l�{ї������$� �DG�rB����p�+m���z�u�JL��=	��f��/�}���J3k0	�!��0�n"�Ш/m��x��0�/���/�
l�a���\*�MX�%���/w��*͒���� <v����8~�?�oc׈T��a��0�I s�;�A��U9�S<	$��b&����S�p��G�9�4�m��iD��K� )�t�Ӣ�=���$�a����&�l�Pz7�O�	~��#�G���E�A�~����p5�H� )&�.3@̒�.j&���!:՛d�N-�2c�œ��7�h:C���[�0�u�w#�W"n�i$�$�	VQ���T�5���	zV�!
�e���/�+<	$|c�r-m��h�ma�ja��B��r�n�K-���x��p��:�+�c�\��O»�����T@_�}WY�7#�5i$ES�^Z�3h0	cG�����NL�!��J���W$�O»��:ZY�[���f
^ab�H���&��s��I��xu��uѯ>�Nk֙�kE�e��zE�p��$\��'�����}��|��v��(l`������+���߈$ܠ��֪`���((�0�/<	$|n��m'�'�h$m���+��(�c�IN���[����bF�U�ZL�M&�x��	���$�O»�x���h: �� ��тn'����	���c��hcG��t%m����[4��{u|/\�����<	��]�4R������6H����c��މ�/样?������G,:���ARL��u�K¥�0�/<	$<�����B�!?Y}����饴	�b���>��a6�6H�I�C�$J6I\����8O��r�a���H8�/@�_  ] �nK� )���&���#h��1�si$�0�eܨ*X���''+�4����;���	�tm��Ĩ%S6�����&���=t���ؙ�j�|1�0�:f̳u��n���w�x��$\����]/�j�1�I3W>z��A_mu0s�>Dz�JJ���u�;����ę6���K�9�oҋ�w���Os&�(�Ί��/m��x���U�5�(U� ϛb��t�j����]@Wx����\�բ�բЭ���q�� B�
�H�1	�4�&��4&�S�I.���¨ȤYPJ�ky.H��j�����_���.g�v�G���ew��*&���-�^���h4�&a��
�M5���6AT�~�8��_ �F�Zu��K��=P�:"[� �����͒|#m��hz
�V�&I�\Aa�+m��{�[?x�:z�0�_A�&akb��g���|�IxW'���(k�w�4��F��	�.t�0�iDES��v�N8���
n��A�4샑R�0�+<	���j�b�˃��*b���f����@��h�z�(���~�c�ފ�:�6H����	���gh0	c��j�S�I1	���5S��)b*�0�+<	�f�f��n�D��4=�.���M��}����З�n�K� *&ahP��`5;��bn3	�짶`��g���i�O���.�@��'���]m�>�W��v�s�b�y�/���]���M����CA�.��6H�I�C�G�;Z�[��������'ႄO�F����M�bwQB1�mեm��iD���n��	?J� )&�.��sg��aJ/� }�IxG�y�V�l�Ϣ�G膪n�d�Z$8�b��>J� *^?vuT������i$U������*�M�ml2��@��O����tLU���w>M���=���7p���ܔ�AR���M���p{��0���v�fk��/�P�/�]�IxW'���]�]�f'�6H�?�u&m���]&����	���c�p��N��u��ff�أ�Nݨ�3�fA���Os�u8c��>p�{�'�]N�D�w��f{� |?�V�Nr�DЭ�N�B��L���³�EҶH�I�N�d�9M`�b��N5�s����G	�<�ע/׾w�7�P���Tg�#����m����iW3�°BL�&�xQ��J����$\��U~�*J��}�;���w�
ޗ�Y�jc��f� ��>m|�W3�t�#�&ͬ��R-���,�+�q�w�/<	�-'6;J�M���4y�f�:�:��B���_�Q���Cjw�����3	G�-��I1�$����Ǿ:���] m��hvN�&��vNl����B;�I�:0��"&�63��Ӹm��9a<_x.H��)�Ix=Z�F��w���Sbn�K� *&ahP��v5�$�)Hx�c�y/r�a���t�Rs�zKB��X�I�XŰ~P���6�����!��[JW����b�2ޫ(�6EL�`�<���<C��E�[�;r�j��    �쓴	���-���5���AR�Z�nW*^�����}�I� ��lU����n_�m���4�Į��u;����9�.�j���W�I�F�wV��^�Ӣ�0h4r\H�=�iCta�AM�%��?"��f!^��`�s>l+���sb�66�^=�����Xf!������$\T����t���;/0v�p��ۮI� )���&��z7��v��ع_�p���:���������j�'�d�ɦ�z��l�m\Z����ȓ�~�V�L���D��I�����NQ���6AT�~�0����N�I1	7�H�� �d�^��� ��hk(������5�B(��<'�h:#\�iD��.�N�:���ߋ���tk�U�������aTQPz=�O�	��8��f���t�7E�_o�m�Mt����DM����}�y����;M��_�`��$ܢ۟s}��V�u�<_x��R��ι St�:)FS�°Q���I� *^?tyuZ�9��6H�I�M�T����l��}�I� �Ib��O��}o��	�k�J�jc��'�+������f{�W��	w�`*�&CL�ӎ������I� a��$:;y�[��z�+m���t��[?6	���/��As@;1	w铎��\�f�N���+k�J�a�x.H���Z(�W���vt�+ m���L��iD�뿒�AR�i��6H�I��/�R��'����&M��Q�I�2�xœpA�*N@{	;ѧ+���#֜������&���?��AR�F��q��4�1	���h`/��}�I� ᩊ�{O����3������u[mi$��_�Q���I������G�s�,&ᐾ��w�h��}�Ix7Y#O��'(�6J� )>��������A�~��N<'������$\�of3W�0 zV���|�Ix_a�[����g����a�.m��x�K� *^?tR��5�s?�m��p�z��	�	}Q��}A�dI ��O���:��V
��-vN�`����n�)m��h �n���6H�#A�'�T]��$ܤ����/��bf�<��7i���H����E�<	�'k����f>'��t�sb3���3��A�a7O�j��nѕZ%6N��ʪ��[K�'���?�1�<	�rުX�i9f�zcp��b�P��_��g���A'ũ^�6ATTU�3�m�Jl��6��[��uT�Yn�L�.%Ł|�I� �+�HR����hv�U�I��X��EG�c䆪ԇ��n�i$E�.��H5^T3�;1&���Y�:�lrot�afU�Ɔ��Q����8'�Rݗ�l�ky�UG0	�����s�M��.�=�A�O �[�~�9s��l��6H�a�K�d�"���RY@_x|j���&EM�5kEv��M��`@S�gCn���Ĩ}�L�G�����a0���u���������.3�ޭM|ϡ��A"*:�hp6��EB��#e����  ],�;�0'�[b�Q/]o�;��fF��2u��w]%�$�ikM��Ǣ��3�tO��GiSDDgϴ�U�l$Q/O3� H��Z�Hh��w+m��x�Si$Eu�Ġ{=�K� )桐�kk�l����/mԟ�2�9���!h��u0�Y���Y��<ztw���E]?���p��V��V�u���	���c�ܮ�������K� )����OI|j���~{�)�_�*�s���|}�i���U>�1��ߗ6AT�~�i��E�@�3�?�@������V ����X?���@�1���y�����!_7�B+�|J�����	�K>*���y��硧&��^?v~�^oH� )�����8j�.�ߓ�����Cx��<�y���&^�YK"$G�~G�Ʈ��:�6AT�~�;�f<��K� )���t�����2�9ȥ��Àin����5i�g$Ћ�ܛ�tnU���"CWI�р�������v�_�
9Q��=p�
�T���:�I�l �)ƬI� ):|0���I=�o�*]�k�j� 8��ݍ�O�c���. 
|D���y�k�>�J� )���������	�F{�~ҥ�zL2`�@�̵�SQ��9z���1����c���$��g�P��n��Ɲ�y���m�ΤM��@�6�(��c&m��*a혦��Yp�q�ZGz���u���:�i����]�?����c�f�h0�6AT4A;��5�@u���AR��1���E|�1�?|�c ����f����|�c i$�c I� )��}41�Z��j����W�sk4�F)�o|�c �������x�1zt��b�z�� j��ۂ����鳊"���gyV��=P����>y��2|�c �h�2�\�!���=�g(�g����A;�:m���'B���n��L�6.��g�2.���$��G� �!>z��@G���U�-��'���~O_��^&Πa(��(laW�U3tlR?2ۭ�ndΘ��a!M�4�ij�S�ӿC�@t8C;?�f����HТ�$��$8y$8̑AʍP��^!��'isD����!�=Q��`~/m��	��O���[�O� �����{mc��{3��4Y����A1U��V�L�����`����o��6H�N�(RV�1Q�����?�6ATԿ�v �:�q Uw�6H�À]���ć�|%ߍ�r�a |P��ARtu+m������l��ƨ�'qХYr�#���0�����I���:��?��AR�nc_U3��xxL�\�8ՠЉ2�y0�;����a@�&q ���M����īe��^逸�δ&�E0B��
4Ir� x'j@�D��/m��x�_�m�u���Ԫ������F�i�����.���� ���I���ˠBt9�a�`��_�Q����m���EqU�w��À�>���h����U�3|�c �hwr�#����㙏�|+���&��׏~^��i����ԋW��"�.)�*�O�@fk|RQ��?������W!Ga9L�KiD���I� )j��TQ��A�0�A'�n�%j�� ��jc��7��c��؇�a@���A���M��Mv��&���0�I'~&]��Ҩ8�^h�+�0���a����ђ6FRty-m��x��C�:���U�'�6H�y�C}��Q1�)�C���yh����̕���_}Z:-Z�.���/m����:/L�:t@�;,�y%�t����o�S ���M�Utob��&m��|�� �0`���B�E�C�V��d��z����	����(�w�m�U���ί��̭�2�l�|���.}�ԛ�a� �����D�IQ�o��+Y��8����O�͎�ɇ>@&��&ɳ��!B�-SЋ�Z�-S�SiD�뿑�AR�a�^1��8ib��2�u�|���j�f�/x�W�|��0�#Ф� j���[������/sDt��AГ�'at��6����.�.&�b'��&���4��s����0�A��F��aT���fk���)���X��d�|�<7�?�;�)�(�w�m�UW���7���I��ޥ
��Y$�;>�ߒG��H0����~�M�N�9��Q���9�f}iD��Ǟ.������6H�À]%6[kce��Z�O6�$~�*��A�=p��|�><=�@�Le�=n�"W �U�����|�j!�i]�뿂v 5;��A��V�IqԦI�m�7f9V��>�1xs�(��@�1пԎڝvQQ;������c�[?t�Hj��c�-�_P�@�m�5f���$xOE�� <g��@�%pς��&j��_ �c ��Ձnك~��>K��c x꿨6�i�+�W /*�@x��1����c��Rd��B>����ȉp�J� *^?vT����ʥm�T%l��N3��e����@����܁ &;���4��� �  a���,0�Yt���a+��=p6v���8�����{f�a7�v{�W5b!����;���DF�A/Δ]df����@t�w�s���W@��zf�~�6GTԛa7˩!�����I� )F�.�$i��{$�w�W�!����$m��<��#�Gi$U	��4�"��q�&���H���*�
t�G�Cy$�H m��	j�{����/� x$�H���#�^	<H� )F��N�40��� �H�a[�ö<<�#�Gi$U	[5�ޫh�,\z`/�38�I���S8�ʣ$^=je��]]�m�mki+�D���	���GiD���~r�n4�m�U��6H�I8�^��qjD <	��[��`�L�:� ͈��c�ؕΒ�� �^`Oa�$9^�ċ(Ď�>��7�v�C����j�ܑb`�k��K�n��3m7&ֈg��)}��)�7��6H�O�&�4�Gi=�����vK�l���+i��,����HB�WQzZL�<���V�?��;��אꝚ����/m��h�H� )�t��u��~�G�&�L�-��H;p=	�H��4�0P?U0ͬ�>rM����&m��<	�M�U:�6����o���}�[��o�FE�Z��W�E�#h��Z��l�_D]�)5	Co��3i$Ea�)m����N��J�l�XY���1��_^��蕫�L�H.�/�|����έ� �D�͎���z�$��x5�أ
��u1����7���i��F�1 �=��%>�1"�?��g�G�:6��0��@a{H��5�[�����V�#m���jq����:ԃ���,�;�p�������5z�6p1�N���I������}�6AT�a���$��.m�����Գ��q`�I8����Z[Ø9�k��:�f0@��د�����J�!%
����>K� *�@;������b~��AR��u\b�^��(�H0�Iؓ0����`��$�L��nW�I���6AT�����bƾ�*��Н*a�.�x�_ u���V/�����)�^���a�0 �S�׸#�]x1<�6CRt�D����4���/��K��c�����w�6H�À��BA6��i�~X�a �'�| ��w>]Pe
t���@�E�kiDEc���h`7��n�_�(�se\��!�(h7=@�ea34Kl�V� Aϛ��!t:��6���P��~(wN��7���~����4�Z���$�I�]p��w��A���j��fD�Sy�'a����H�Q���T?'���� ��[��u0ȍB���:�/�� �@��z_=���}�H��.6ΥMn�@���6H�c���6H�c�&r��Q�o11���%>�1tt��Tʹ���c ��M� �i���v �k�����������V�����+#����dzL3�����D�~M�X����p��Z�(�2�6*2h��N}�(�QG�:r1}��6AT�~�H�����i$U	�6�0�t�G�;�D`��W!���S04�j�l����E7�Z���l'��a�O}����"m���}�� �9	;q�z�	à6�88Q�z�q���|��mMz�lQS"���]1Ir�� NTob�P�#��O%�w�D�i�OJ' ��@ �@��'�n��戊�}[J�NM�I�b�F�Cq ����T���?����?��6B���IQE*�Sџ��T|�?����4�&�T,U���5H{�g��ۥ'f��`�L�:� �������ܮ�ҖȈ��R0 z��m&f=iD��v��uz�Ic�|P�pl��S$>E�S$>E��O��I�hѕ�Wi�Po���OE*�Sq/*�S1l�i��ͣUA/K"�qM�T���?����?��6��Y�i�@1�b�OE*�S�I�"z���T���d�Y���T���?������cE>�
N7*n�F���OE*�Sџ�{�Sџ��Z�T*�����      -   O   x�3�(�O)�,Q0T#pp��qr����[r���@�n�pa$cxB0h׍�Nc������ �<��      /   8   x�3��M,)�LNU�%�2�t��+-��%@k�9=��R�K2��SsS�JhdM� �.e      1   �   x�喽�!�k�)���{-�O`����w��a3��/�4�FI�(�s�1j�Q,E])0U��S���F!��%}��M׉�R ό-r�	�ZBs�����<7����� �(\I`�6����%֝u�|"�b����|o'`�܁���:���ߐ�a֘X����� �Dm�ڼ�z)�� `�`�1	�TZO�L���u�=p�W���      3   �  x���ٲ�J������Qw�HH��*q@��87L*�� ��t��X�vm��QFkJ�D�??V��+ŏo���.�����2ɑoD�g�8nі夤�w�=w�����{ղ�&�&�Li!�4��PѶ�C�8]Q7�!����sͲ,�䍉��B>����@E���c|��ݍ/$�|��;r�o8�f+a*��Z[0�QU^P��Cͺ�ǜ�@̷XS� ��/������ڀ�!����O��]��t�.�/���4R~����\�p�{ {�nZBn��ކ~<uVC��Vm���!փNO�Ìc<���qR���xZC�V�XӍ��|p6�V82܍��:K!E�'��H�w���#G;͉9}�gd�s�Z���iZ��$��il�Ӟ��))���"�ʝ��M�TpkG+ս�_��1����^t$��Q2>��=���.h�^z=t�:1�Z2���B�7�Ob�w5���4�RhF0�6VB3�;1r7��,�ar���!^q$��L����Ӻ$i��喭�������|�E�&tg&�Rʊ5�tɧ���i�r�m�h���"�{۫#)p����CD�,�jD�w�˩]��:�I�V�J�ՋCeW*iA��5��K�Ի��~���0;I�O)�ZL��=����9�ɗ~uu$�0č���>K!��
��}	�(ǸA�-)p�x�m��@�B����F����Cf%2"/K�+R�՞��SJ��d��aG��<�B�+%E���|H	�R/-W�Q�<�F�F��q����rZ�Z�U{.e��9.
e&T�4�F[ύ��.�1�b��]
+��[ٵ8A���{,A�4�!2g�Wy�]����HG`�Y���&�k�g:�ΐI"�	��5х�\��D�u��b���@]
�չ�3+�&"�AIs��1R�g�W)�+f��^�#�^�M=R��r���KJU��`��z&�9ϣ�$��9�pO)1���Y�	�������{�%�S܍���;K�HI0�����|��}`�f�g����\2������#�C����ڒ���,(]�Փ	�wv���gwͯpg�EՍ��Ϩ���)��,�I�dR�ܯɇ (��x,�0ɽ�7S,q��Ϩo{f�����X��������[j;r�$s3d䓭�޾��J�?u'Yz%�Z���1�-q��]����|�N�_�^�'E�q�:WΗa6m���C�ȩq^w��,�����\�%�Y��ϱ	��>ꢜ�ʖT�4��>�-GQ7�C�K�s��~��>�����TN�A��q zP����K�H��^k�%�6s�B����5
�N j��4-��%���ܘ)���K�ħм����u�i���j�YK# ����@�2�s�:F)�A�T�w�QF�M���_s�Ǥ��/H �x�#����$������q��~������l�w�$z������ߊ�M�k��e���/��#�c�?ppl���_޷��mUF����q1��]$�~����`����Zk�P�
��\��z��>��w��2��p>ө2J�Ҩ.��XpNo�_7��Sc�?� ���ײ	��!�<љ�̺��n����cX�0K<�xux.�:�r?�z��z���-��� M��^�OQ�����&�΀������)�I��p@ݘ���,ds,����5�?�/_���j,      4   U   x����P���0E��y�.��J ^�i�.1L�M�9��
c/�~0���҅�c/JN7ʎʎ��^��6����=lr�OU��/     