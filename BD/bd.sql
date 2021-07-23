PGDMP                         y         	   poupeMais    13.3    13.3 B    2           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            3           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            4           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            5           1262    16394 	   poupeMais    DATABASE     k   CREATE DATABASE "poupeMais" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE "poupeMais";
                postgres    false            6           0    0    DATABASE "poupeMais"    COMMENT     y   COMMENT ON DATABASE "poupeMais" IS 'Banco de dados para o Sistema de Gestão de Gastos de uma Residência - Poupe Mais';
                   postgres    false    3125            |           1247    16586    cpf    DOMAIN     4   CREATE DOMAIN public.cpf AS character(11) NOT NULL;
    DROP DOMAIN public.cpf;
       public          postgres    false            �           1247    16598 	   data_desp    DOMAIN     �   CREATE DOMAIN public.data_desp AS character varying(10) NOT NULL
	CONSTRAINT data_desp_check CHECK (((VALUE)::text ~~ '%/%/%'::text));
    DROP DOMAIN public.data_desp;
       public          postgres    false            �           1247    16601    data_fim    DOMAIN     �   CREATE DOMAIN public.data_fim AS character varying(10) NOT NULL
	CONSTRAINT data_fim_check CHECK (((VALUE)::text ~~ '%/%/%'::text));
    DROP DOMAIN public.data_fim;
       public          postgres    false            �           1247    16595 	   data_nasc    DOMAIN     ~   CREATE DOMAIN public.data_nasc AS character varying(10)
	CONSTRAINT data_nasc_check CHECK (((VALUE)::text ~~ '%/%/%'::text));
    DROP DOMAIN public.data_nasc;
       public          postgres    false            y           1247    16584    login    DOMAIN     >   CREATE DOMAIN public.login AS character varying(15) NOT NULL;
    DROP DOMAIN public.login;
       public          postgres    false            �           1247    16591    nome    DOMAIN     =   CREATE DOMAIN public.nome AS character varying(20) NOT NULL;
    DROP DOMAIN public.nome;
       public          postgres    false            �           1247    16593 	   nome_meta    DOMAIN     B   CREATE DOMAIN public.nome_meta AS character varying(20) NOT NULL;
    DROP DOMAIN public.nome_meta;
       public          postgres    false                       1247    16588    valor    DOMAIN     {   CREATE DOMAIN public.valor AS double precision NOT NULL
	CONSTRAINT valor_check CHECK ((VALUE > (0.0)::double precision));
    DROP DOMAIN public.valor;
       public          postgres    false            �            1259    16687    alimentacao    TABLE     �   CREATE TABLE public.alimentacao (
    nome character varying NOT NULL,
    valor double precision,
    data_desp character varying,
    login character varying
);
    DROP TABLE public.alimentacao;
       public         heap    postgres    false            �            1259    16672    diversos    TABLE     �   CREATE TABLE public.diversos (
    nome character varying NOT NULL,
    valor double precision,
    data_desp character varying,
    login character varying
);
    DROP TABLE public.diversos;
       public         heap    postgres    false            �            1259    16642    educacao    TABLE     �   CREATE TABLE public.educacao (
    nome character varying NOT NULL,
    valor double precision,
    data_desp character varying,
    login character varying
);
    DROP TABLE public.educacao;
       public         heap    postgres    false            �            1259    16732    meta_curto_prazo    TABLE     �   CREATE TABLE public.meta_curto_prazo (
    nome_meta character varying NOT NULL,
    valor double precision,
    data_fim character varying,
    login character varying
);
 $   DROP TABLE public.meta_curto_prazo;
       public         heap    postgres    false            �            1259    16747    meta_longo_prazo    TABLE     �   CREATE TABLE public.meta_longo_prazo (
    nome_meta character varying NOT NULL,
    valor double precision,
    data_fim character varying,
    login character varying
);
 $   DROP TABLE public.meta_longo_prazo;
       public         heap    postgres    false            �            1259    16717    moradia    TABLE     �   CREATE TABLE public.moradia (
    nome character varying NOT NULL,
    valor double precision,
    data_desp character varying,
    login character varying
);
    DROP TABLE public.moradia;
       public         heap    postgres    false            �            1259    16611    pessoa    TABLE     �   CREATE TABLE public.pessoa (
    cpf character(1) NOT NULL,
    nome_pessoa character varying(50) NOT NULL,
    data_nasc character varying,
    parentesco character varying(15),
    login character varying
);
    DROP TABLE public.pessoa;
       public         heap    postgres    false            �            1259    16627    receita_individual    TABLE     �   CREATE TABLE public.receita_individual (
    nome character varying NOT NULL,
    valor double precision,
    cpf character(1)
);
 &   DROP TABLE public.receita_individual;
       public         heap    postgres    false            �            1259    16657    saude    TABLE     �   CREATE TABLE public.saude (
    nome character varying NOT NULL,
    valor double precision,
    data_desp character varying,
    login character varying
);
    DROP TABLE public.saude;
       public         heap    postgres    false            �            1259    16702 
   transporte    TABLE     �   CREATE TABLE public.transporte (
    nome character varying NOT NULL,
    valor double precision,
    data_desp character varying,
    login character varying
);
    DROP TABLE public.transporte;
       public         heap    postgres    false            �            1259    16603    usuario    TABLE     �   CREATE TABLE public.usuario (
    login character varying NOT NULL,
    senha character varying(15) NOT NULL,
    nome_familia character varying(15) NOT NULL,
    qtd_pessoas integer NOT NULL
);
    DROP TABLE public.usuario;
       public         heap    postgres    false            +          0    16687    alimentacao 
   TABLE DATA           D   COPY public.alimentacao (nome, valor, data_desp, login) FROM stdin;
    public          postgres    false    206   �M       *          0    16672    diversos 
   TABLE DATA           A   COPY public.diversos (nome, valor, data_desp, login) FROM stdin;
    public          postgres    false    205   �M       (          0    16642    educacao 
   TABLE DATA           A   COPY public.educacao (nome, valor, data_desp, login) FROM stdin;
    public          postgres    false    203   �M       .          0    16732    meta_curto_prazo 
   TABLE DATA           M   COPY public.meta_curto_prazo (nome_meta, valor, data_fim, login) FROM stdin;
    public          postgres    false    209   �M       /          0    16747    meta_longo_prazo 
   TABLE DATA           M   COPY public.meta_longo_prazo (nome_meta, valor, data_fim, login) FROM stdin;
    public          postgres    false    210   N       -          0    16717    moradia 
   TABLE DATA           @   COPY public.moradia (nome, valor, data_desp, login) FROM stdin;
    public          postgres    false    208   1N       &          0    16611    pessoa 
   TABLE DATA           P   COPY public.pessoa (cpf, nome_pessoa, data_nasc, parentesco, login) FROM stdin;
    public          postgres    false    201   NN       '          0    16627    receita_individual 
   TABLE DATA           >   COPY public.receita_individual (nome, valor, cpf) FROM stdin;
    public          postgres    false    202   kN       )          0    16657    saude 
   TABLE DATA           >   COPY public.saude (nome, valor, data_desp, login) FROM stdin;
    public          postgres    false    204   �N       ,          0    16702 
   transporte 
   TABLE DATA           C   COPY public.transporte (nome, valor, data_desp, login) FROM stdin;
    public          postgres    false    207   �N       %          0    16603    usuario 
   TABLE DATA           J   COPY public.usuario (login, senha, nome_familia, qtd_pessoas) FROM stdin;
    public          postgres    false    200   �N       �           2606    16696 !   alimentacao alimentacao_login_key 
   CONSTRAINT     ]   ALTER TABLE ONLY public.alimentacao
    ADD CONSTRAINT alimentacao_login_key UNIQUE (login);
 K   ALTER TABLE ONLY public.alimentacao DROP CONSTRAINT alimentacao_login_key;
       public            postgres    false    206            �           2606    16694    alimentacao alimentacao_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.alimentacao
    ADD CONSTRAINT alimentacao_pkey PRIMARY KEY (nome);
 F   ALTER TABLE ONLY public.alimentacao DROP CONSTRAINT alimentacao_pkey;
       public            postgres    false    206            �           2606    16681    diversos diversos_login_key 
   CONSTRAINT     W   ALTER TABLE ONLY public.diversos
    ADD CONSTRAINT diversos_login_key UNIQUE (login);
 E   ALTER TABLE ONLY public.diversos DROP CONSTRAINT diversos_login_key;
       public            postgres    false    205            �           2606    16679    diversos diversos_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.diversos
    ADD CONSTRAINT diversos_pkey PRIMARY KEY (nome);
 @   ALTER TABLE ONLY public.diversos DROP CONSTRAINT diversos_pkey;
       public            postgres    false    205            z           2606    16651    educacao educacao_login_key 
   CONSTRAINT     W   ALTER TABLE ONLY public.educacao
    ADD CONSTRAINT educacao_login_key UNIQUE (login);
 E   ALTER TABLE ONLY public.educacao DROP CONSTRAINT educacao_login_key;
       public            postgres    false    203            |           2606    16649    educacao educacao_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.educacao
    ADD CONSTRAINT educacao_pkey PRIMARY KEY (nome);
 @   ALTER TABLE ONLY public.educacao DROP CONSTRAINT educacao_pkey;
       public            postgres    false    203            �           2606    16741 +   meta_curto_prazo meta_curto_prazo_login_key 
   CONSTRAINT     g   ALTER TABLE ONLY public.meta_curto_prazo
    ADD CONSTRAINT meta_curto_prazo_login_key UNIQUE (login);
 U   ALTER TABLE ONLY public.meta_curto_prazo DROP CONSTRAINT meta_curto_prazo_login_key;
       public            postgres    false    209            �           2606    16739 &   meta_curto_prazo meta_curto_prazo_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.meta_curto_prazo
    ADD CONSTRAINT meta_curto_prazo_pkey PRIMARY KEY (nome_meta);
 P   ALTER TABLE ONLY public.meta_curto_prazo DROP CONSTRAINT meta_curto_prazo_pkey;
       public            postgres    false    209            �           2606    16756 +   meta_longo_prazo meta_longo_prazo_login_key 
   CONSTRAINT     g   ALTER TABLE ONLY public.meta_longo_prazo
    ADD CONSTRAINT meta_longo_prazo_login_key UNIQUE (login);
 U   ALTER TABLE ONLY public.meta_longo_prazo DROP CONSTRAINT meta_longo_prazo_login_key;
       public            postgres    false    210            �           2606    16754 &   meta_longo_prazo meta_longo_prazo_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.meta_longo_prazo
    ADD CONSTRAINT meta_longo_prazo_pkey PRIMARY KEY (nome_meta);
 P   ALTER TABLE ONLY public.meta_longo_prazo DROP CONSTRAINT meta_longo_prazo_pkey;
       public            postgres    false    210            �           2606    16726    moradia moradia_login_key 
   CONSTRAINT     U   ALTER TABLE ONLY public.moradia
    ADD CONSTRAINT moradia_login_key UNIQUE (login);
 C   ALTER TABLE ONLY public.moradia DROP CONSTRAINT moradia_login_key;
       public            postgres    false    208            �           2606    16724    moradia moradia_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.moradia
    ADD CONSTRAINT moradia_pkey PRIMARY KEY (nome);
 >   ALTER TABLE ONLY public.moradia DROP CONSTRAINT moradia_pkey;
       public            postgres    false    208            r           2606    16620    pessoa pessoa_login_key 
   CONSTRAINT     S   ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT pessoa_login_key UNIQUE (login);
 A   ALTER TABLE ONLY public.pessoa DROP CONSTRAINT pessoa_login_key;
       public            postgres    false    201            t           2606    16618    pessoa pessoa_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT pessoa_pkey PRIMARY KEY (cpf);
 <   ALTER TABLE ONLY public.pessoa DROP CONSTRAINT pessoa_pkey;
       public            postgres    false    201            v           2606    16636 -   receita_individual receita_individual_cpf_key 
   CONSTRAINT     g   ALTER TABLE ONLY public.receita_individual
    ADD CONSTRAINT receita_individual_cpf_key UNIQUE (cpf);
 W   ALTER TABLE ONLY public.receita_individual DROP CONSTRAINT receita_individual_cpf_key;
       public            postgres    false    202            x           2606    16634 *   receita_individual receita_individual_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.receita_individual
    ADD CONSTRAINT receita_individual_pkey PRIMARY KEY (nome);
 T   ALTER TABLE ONLY public.receita_individual DROP CONSTRAINT receita_individual_pkey;
       public            postgres    false    202            ~           2606    16666    saude saude_login_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.saude
    ADD CONSTRAINT saude_login_key UNIQUE (login);
 ?   ALTER TABLE ONLY public.saude DROP CONSTRAINT saude_login_key;
       public            postgres    false    204            �           2606    16664    saude saude_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.saude
    ADD CONSTRAINT saude_pkey PRIMARY KEY (nome);
 :   ALTER TABLE ONLY public.saude DROP CONSTRAINT saude_pkey;
       public            postgres    false    204            �           2606    16711    transporte transporte_login_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.transporte
    ADD CONSTRAINT transporte_login_key UNIQUE (login);
 I   ALTER TABLE ONLY public.transporte DROP CONSTRAINT transporte_login_key;
       public            postgres    false    207            �           2606    16709    transporte transporte_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.transporte
    ADD CONSTRAINT transporte_pkey PRIMARY KEY (nome);
 D   ALTER TABLE ONLY public.transporte DROP CONSTRAINT transporte_pkey;
       public            postgres    false    207            p           2606    16610    usuario usuario_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (login);
 >   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pkey;
       public            postgres    false    200            �           2606    16697 "   alimentacao alimentacao_login_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.alimentacao
    ADD CONSTRAINT alimentacao_login_fkey FOREIGN KEY (login) REFERENCES public.usuario(login);
 L   ALTER TABLE ONLY public.alimentacao DROP CONSTRAINT alimentacao_login_fkey;
       public          postgres    false    206    2928    200            �           2606    16682    diversos diversos_login_fkey    FK CONSTRAINT     ~   ALTER TABLE ONLY public.diversos
    ADD CONSTRAINT diversos_login_fkey FOREIGN KEY (login) REFERENCES public.usuario(login);
 F   ALTER TABLE ONLY public.diversos DROP CONSTRAINT diversos_login_fkey;
       public          postgres    false    205    200    2928            �           2606    16652    educacao educacao_login_fkey    FK CONSTRAINT     ~   ALTER TABLE ONLY public.educacao
    ADD CONSTRAINT educacao_login_fkey FOREIGN KEY (login) REFERENCES public.usuario(login);
 F   ALTER TABLE ONLY public.educacao DROP CONSTRAINT educacao_login_fkey;
       public          postgres    false    200    203    2928            �           2606    16742 ,   meta_curto_prazo meta_curto_prazo_login_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.meta_curto_prazo
    ADD CONSTRAINT meta_curto_prazo_login_fkey FOREIGN KEY (login) REFERENCES public.usuario(login);
 V   ALTER TABLE ONLY public.meta_curto_prazo DROP CONSTRAINT meta_curto_prazo_login_fkey;
       public          postgres    false    209    200    2928            �           2606    16757 ,   meta_longo_prazo meta_longo_prazo_login_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.meta_longo_prazo
    ADD CONSTRAINT meta_longo_prazo_login_fkey FOREIGN KEY (login) REFERENCES public.usuario(login);
 V   ALTER TABLE ONLY public.meta_longo_prazo DROP CONSTRAINT meta_longo_prazo_login_fkey;
       public          postgres    false    2928    200    210            �           2606    16727    moradia moradia_login_fkey    FK CONSTRAINT     |   ALTER TABLE ONLY public.moradia
    ADD CONSTRAINT moradia_login_fkey FOREIGN KEY (login) REFERENCES public.usuario(login);
 D   ALTER TABLE ONLY public.moradia DROP CONSTRAINT moradia_login_fkey;
       public          postgres    false    200    208    2928            �           2606    16621    pessoa pessoa_login_fkey    FK CONSTRAINT     z   ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT pessoa_login_fkey FOREIGN KEY (login) REFERENCES public.usuario(login);
 B   ALTER TABLE ONLY public.pessoa DROP CONSTRAINT pessoa_login_fkey;
       public          postgres    false    201    2928    200            �           2606    16637 .   receita_individual receita_individual_cpf_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.receita_individual
    ADD CONSTRAINT receita_individual_cpf_fkey FOREIGN KEY (cpf) REFERENCES public.pessoa(cpf);
 X   ALTER TABLE ONLY public.receita_individual DROP CONSTRAINT receita_individual_cpf_fkey;
       public          postgres    false    201    202    2932            �           2606    16667    saude saude_login_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.saude
    ADD CONSTRAINT saude_login_fkey FOREIGN KEY (login) REFERENCES public.usuario(login);
 @   ALTER TABLE ONLY public.saude DROP CONSTRAINT saude_login_fkey;
       public          postgres    false    204    200    2928            �           2606    16712     transporte transporte_login_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.transporte
    ADD CONSTRAINT transporte_login_fkey FOREIGN KEY (login) REFERENCES public.usuario(login);
 J   ALTER TABLE ONLY public.transporte DROP CONSTRAINT transporte_login_fkey;
       public          postgres    false    2928    200    207            +      x������ � �      *      x������ � �      (      x������ � �      .      x������ � �      /      x������ � �      -      x������ � �      &      x������ � �      '      x������ � �      )      x������ � �      ,      x������ � �      %      x������ � �     