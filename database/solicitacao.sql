CREATE DATABASE solicitacao;

use solicitacao;
-- -----------------------------------------------
-- CRIAÇÃO DA TABELA USUARIO
-- -----------------------------------------------
CREATE TABLE Usuario(
    cod_usuario INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    celular CHAR(14) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado CHAR(2) NOT NULL,
    cep CHAR(10) NOT NULL,
    setor VARCHAR(50) NOT NULL,
    CONSTRAINT pk_cod_usuario PRIMARY KEY (cod_usuario)
);
-- -----------------------------------------------
-- CRIAÇÃO DA TABELA ALUNO
-- -----------------------------------------------
CREATE TABLE Estudante (
    cod_estudante CHAR(7) NOT NULL,
	cod_usuario INT NOT NULL,
    curso VARCHAR(50) NOT NULL,
    CONSTRAINT pk_cod_estud PRIMARY KEY (cod_usuario),
	CONSTRAINT fk_cod_user_estud FOREIGN KEY (cod_usuario)
        REFERENCES Usuario (cod_usuario)
        ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT uc_estud UNIQUE (cod_estudante)
);

-- -----------------------------------------------
-- CRIAÇÃO DA TABELA PROFESSOR
-- -----------------------------------------------
CREATE TABLE Professor (
    cod_professor CHAR(4) NOT NULL,
    cod_usuario INT NOT NULL,
    CONSTRAINT pk_cod_prof PRIMARY KEY (cod_usuario),
	CONSTRAINT fk_cod_user_prof FOREIGN KEY (cod_usuario)
        REFERENCES Usuario (cod_usuario)
        ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT uc_prof UNIQUE (cod_professor)
);

-- -----------------------------------------------
-- CRIAÇÃO DA TABELA TÉCNICO
-- -----------------------------------------------
CREATE TABLE Tecnico (
    cod_tecnico CHAR(6) NOT NULL,
	cod_usuario INT NOT NULL,
    CONSTRAINT pk_cod_tec PRIMARY KEY (cod_usuario),
	CONSTRAINT fk_cod_user_tec FOREIGN KEY (cod_usuario)
        REFERENCES Usuario (cod_usuario)
        ON DELETE CASCADE ON UPDATE CASCADE,
   	CONSTRAINT uc_tec UNIQUE (cod_tecnico)
);

-- -----------------------------------------------
-- CRIAÇÃO DA TABELA PARA SERVIÇOS SOLICITADOS POR TÉCNICOS
-- -----------------------------------------------
CREATE TABLE SolicitacaoUsuario (
    cod_solicitacao INT NOT NULL AUTO_INCREMENT,
    cod_usuario INT NOT NULL,
    servico TEXT NOT NULL,
    dataSolicitacao DATETIME NOT NULL,
    CONSTRAINT pk_id_solUser PRIMARY KEY (cod_solicitacao, cod_usuario),
    CONSTRAINT fk_cod_sol_user FOREIGN KEY (cod_usuario)
        REFERENCES Usuario (cod_usuario)
        ON DELETE CASCADE ON UPDATE CASCADE
);