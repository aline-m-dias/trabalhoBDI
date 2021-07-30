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
 
/*Inserindo usuários*/
INSERT INTO usuario (login,senha, nome_familia, qtd_pessoas)
VALUES ('João da Silva', '982114', 'Silva', 3 );
INSERT INTO usuario (login,senha, nome_familia, qtd_pessoas)
VALUES ('Maria Fernandes', '123654', 'Fernandes', 3 );
INSERT INTO usuario (login,senha, nome_familia, qtd_pessoas)
VALUES ('Eduardo Ferreira', '974563', 'Ferreira', 2 );
INSERT INTO usuario (login,senha, nome_familia, qtd_pessoas)
VALUES ('Ana Soares', '745612', 'Soares', 2 );

/*Atualização do tipo de CPF e criação do seu domínio*/
CREATE DOMAIN CPF AS CHARACTER VARYING(11) NOT NULL;
ALTER TABLE pessoa ALTER COLUMN cpf TYPE CHARACTER VARYING;
ALTER TABLE receita_individual ALTER COLUMN cpf TYPE CHARACTER VARYING;

/*Inserindo pessoas*/
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('14587620100', 'João  Moreira da Silva', '14/07/1986', 'pai', 'João da Silva');
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('15647895201', 'Maria Fernandes', '30/11/1980', 'mãe', 'Maria Fernandes');
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('74598563100', 'Eduardo Ferreira', '15/01/1990', 'filho', 'Eduardo Ferreira');
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('32145698712', 'Ana Soares', '19/02/2000', 'filha', 'Ana Soares');
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('14574567803', 'Carla Silva', '01/12/1986', 'Esposa', 'João da Silva');
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('14569870204', 'Marcos Silva', '15/04/2003', 'filho', 'João da Silva');
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('17876523505', 'Patricia Fernandes', '07/02/2000', 'filha', 'Maria Fernandes');
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('18956112506', 'Pedro Fernandes', '07/02/2000', 'esposo', 'Maria Fernandes');
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('65984531208', 'Aparecida Ferreira', '15/01/1990', 'mãe', 'Eduardo Ferreira');
INSERT INTO pessoa(cpf, nome_pessoa, data_nasc, parentesco, login)
VALUES ('85641236980', 'José Soares', '19/02/2000', 'pai', 'Ana Soares');

/*Inserindo receitas*/
INSERT INTO receita_individual(nome, codigo, valor, cpf)
VALUES ('Trabalho',00001, 2000.70, '14587620100');
INSERT INTO receita_individual(nome,codigo, valor, cpf)
VALUES ('Emprego',00002, 3030.79, '15647895201');
INSERT INTO receita_individual(nome,codigo, valor, cpf)
VALUES ('Trabalho',00003, 1520.00, '74598563100');
INSERT INTO receita_individual(nome,codigo, valor, cpf)
VALUES ('Caixa Loja',00004, 5080.80, '32145698712');
INSERT INTO receita_individual(nome,codigo, valor, cpf)
VALUES ('Caixa Loja',00005, 2500.00, '14574567803');
INSERT INTO receita_individual(nome,codigo, valor, cpf)
VALUES ('Trabalho',00006, 505.45, '14569870204');
INSERT INTO receita_individual(nome,codigo, valor, cpf)
VALUES ('Emprego formal',00007, 10000.00, '17876523505');
INSERT INTO receita_individual(nome,codigo, valor, cpf)
VALUES ('Emprego informal',00008, 5000.00, '18956112506');
INSERT INTO receita_individual(nome, codigo, valor, cpf)
VALUES ('Estagio',00009, 1500.00, '65984531208');
INSERT INTO receita_individual(nome, codigo, valor, cpf)
VALUES ('Estagio',00010, 1500.00, '85641236980');

/*Inserindo despesas educação*/
INSERT INTO educacao(nome, codigo, valor,data_desp, login)
VALUES ('Escola',00001,250, '25/07/2021','João da Silva');
INSERT INTO educacao(nome, codigo, valor,data_desp, login)
VALUES ('Faculdade',00002,500, '22/07/2021','Maria Fernandes');
INSERT INTO educacao(nome,codigo,valor,data_desp, login)
VALUES ('Escola',00003,1000,'20/07/2021','Eduardo Ferreira');
INSERT INTO educacao(nome,codigo,valor,data_desp, login)
VALUES ('Cursinho de inglês',00004,300, '05/07/2021','Ana Soares');

/*inserindo diversos*/
INSERT INTO diversos (nome,codigo,valor,data_desp, login)
VALUES ('Conserto carro',00001,250, '11/07/2021','João da Silva');
INSERT INTO diversos (nome,codigo,valor,data_desp, login)
VALUES ('Pintura da casa',00002,2020.23, '01/07/2021','João da Silva');
INSERT INTO diversos (nome,codigo,valor,data_desp, login)
VALUES ('Roupas',00003,247.20, '19/07/2021','João da Silva');

/*inserindo na tabela moradia*/
INSERT INTO moradia (nome,codigo,valor, data_desp, login)
VALUES ('Aluguel',00001,700, '01/07/2021', 'Eduardo Ferreira');
INSERT INTO moradia (nome,codigo,valor, data_desp, login)
VALUES ('Aluguel apartamento',00002,900, '01/07/2021', 'Maria Fernandes');

/*inserindo na tabela saude*/
INSERT INTO saude (nome,codigo,valor, data_desp, login)
VALUES ('Compra de remedios',00001,220.5, '03/07/2021', 'Maria Fernandes');
INSERT INTO saude (nome,codigo,valor, data_desp, login)
VALUES ('Cirurgia',00002,2540.50, '06/07/2021', 'Maria Fernandes');
INSERT INTO saude (nome,codigo,valor, data_desp, login)
VALUES ('Remedios',00003,100.47, '08/07/2021', 'João da Silva');
INSERT INTO saude (nome,codigo,valor, data_desp, login)
VALUES ('Farmacia',00004,220.5, '22/07/2021', 'Eduardo Ferreira');

/*inserido tabela transporte*/
INSERT INTO transporte (nome,codigo,valor, data_desp, login)
VALUES ('Passagem',00001, 50, '12/07/2021', 'João da Silva');
INSERT INTO transporte (nome,codigo,valor, data_desp, login)
VALUES ('Passagem',00002, 72.7, '05/07/2021', 'Ana Soares');

/*inserindo meta de curto prazo*/
INSERT INTO meta_curto_prazo (nome_meta,codigo,valor, data_fim, login)
VALUES ('Viagem',00001, '500', '31/12/2021', 'Eduardo Ferreira');
INSERT INTO meta_curto_prazo (nome_meta,codigo,valor, data_fim, login)
VALUES ('Viagem',00002, '1000', '31/10/2021', 'Maria Fernandes');

/*meta de longo prazo*/
INSERT INTO meta_longo_prazo (nome_meta,codigo,valor, data_fim, login)
VALUES ('Carro',00001, '30000', '31/12/2024', 'Eduardo Ferreira');
INSERT INTO meta_longo_prazo (nome_meta,codigo,valor, data_fim, login)
VALUES ('Casamento',00002, '15000', '15/08/2022', 'Maria Fernandes');
INSERT INTO meta_longo_prazo (nome_meta,codigo,valor, data_fim, login)
VALUES ('Viagem Disney',00003, '30000', '01/07/2022', 'Ana Soares');



SELECT * FROM meta_longo_prazo;
SELECT P.cpf, P.nome_pessoa FROM Pessoa P, Receita_individual R WHERE P.cpf = '18956112506' AND P.CPF = R.CPF;

