/*CRIAÇÃO DE DOMÍNIOS*/
CREATE DOMAIN Login AS VARCHAR(15) NOT NULL; 
CREATE DOMAIN Valor AS FLOAT NOT NULL CHECK (value > 0.0);
CREATE DOMAIN Nome AS VARCHAR(20) NOT NULL;
CREATE DOMAIN Nome_Meta AS VARCHAR(20) NOT NULL;
CREATE DOMAIN Data_Nasc AS VARCHAR(10) CHECK(value LIKE '%/%/%');
CREATE DOMAIN Data_Desp AS VARCHAR(10) NOT NULL CHECK(value LIKE '%/%/%');
CREATE DOMAIN Data_Fim AS VARCHAR(10) NOT NULL CHECK(value LIKE '%/%/%');


/*CRIAÇÃO DE TABELAS*/
CREATE TABLE USUARIO
(Login VARCHAR,
 Senha VARCHAR(15) NOT NULL,
 Nome_Familia VARCHAR(15) NOT NULL,
 Qtd_Pessoas INT NOT NULL,
 PRIMARY KEY (Login));
 
CREATE TABLE PESSOA
(CPF CHAR,
 Nome_Pessoa VARCHAR(50) NOT NULL,
 Data_Nasc VARCHAR,
 Parentesco VARCHAR(15),
 Login VARCHAR,
 PRIMARY KEY (CPF),
 FOREIGN KEY (Login) REFERENCES USUARIO(Login));
 
CREATE TABLE RECEITA_INDIVIDUAL
(Nome VARCHAR,
 Codigo INT, 
 Valor FLOAT,
 CPF CHAR,
 PRIMARY KEY(Codigo),
 FOREIGN KEY (CPF) REFERENCES PESSOA(CPF));

CREATE TABLE EDUCACAO
(Nome VARCHAR,
 Codigo INT,
 Valor FLOAT,
 Data_Desp VARCHAR,
 Login VARCHAR,
 PRIMARY KEY(Codigo),
 FOREIGN KEY (Login) REFERENCES USUARIO(Login));

CREATE TABLE SAUDE
(Nome VARCHAR,
 Codigo INT,
 Valor FLOAT,
 Data_Desp VARCHAR,
 Login VARCHAR,
 PRIMARY KEY(Codigo),
 FOREIGN KEY (Login) REFERENCES USUARIO(Login));

CREATE TABLE DIVERSOS
(Nome VARCHAR,
 Codigo INT,
 Valor FLOAT,
 Data_Desp VARCHAR,
 Login VARCHAR,
 PRIMARY KEY(Codigo),
 FOREIGN KEY (Login) REFERENCES USUARIO(Login));

CREATE TABLE ALIMENTACAO
(Nome VARCHAR,
 Codigo INT,
 Valor FLOAT,
 Data_Desp VARCHAR,
 Login VARCHAR,
 PRIMARY KEY(Codigo),
 FOREIGN KEY (Login) REFERENCES USUARIO(Login));

CREATE TABLE TRANSPORTE
(Nome VARCHAR,
 Codigo INT,
 Valor FLOAT,
 Data_Desp VARCHAR,
 Login VARCHAR,
 PRIMARY KEY(Codigo),
 FOREIGN KEY (Login) REFERENCES USUARIO(Login));

CREATE TABLE MORADIA
(Nome VARCHAR,
 Codigo INT,
 Valor FLOAT,
 Data_Desp VARCHAR,
 Login VARCHAR,
 PRIMARY KEY(Codigo),
 FOREIGN KEY (Login) REFERENCES USUARIO(Login));
 
CREATE TABLE META_CURTO_PRAZO
(Nome_Meta VARCHAR,
 Codigo INT,
 Valor FLOAT,
 Data_Fim VARCHAR,
 Login VARCHAR,
 PRIMARY KEY(Codigo),
 FOREIGN KEY (Login) REFERENCES USUARIO(Login));
 
 CREATE TABLE META_LONGO_PRAZO
(Nome_Meta VARCHAR,
 Codigo INT,
 Valor FLOAT,
 Data_Fim VARCHAR,
 Login VARCHAR,
 PRIMARY KEY(Codigo),
 FOREIGN KEY (Login) REFERENCES USUARIO(Login));