CREATE DATABASE Solicitacao;

use Solicitacao;
-- -----------------------------------------------
-- Não é possível criar um cliente "geral" 
-- É necessário definir os tipos de usuários
-- Há complexidade em definir os ids para cada tipo de usuário sem deixar campos nulos
-- -----------------------------------------------
-- -----------------------------------------------
-- CRIAÇÃO DA TABELA ALUNO
-- -----------------------------------------------
CREATE TABLE Estudante (
    cod_usuario CHAR(7) NOT NULL,
    email VARCHAR(100) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    celular CHAR(14) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado CHAR(2) NOT NULL,
    cep CHAR(10) NOT NULL,
    setor VARCHAR(50) NOT NULL,
    curso VARCHAR(50) NOT NULL,
    CONSTRAINT pk_cod_estud PRIMARY KEY (cod_usuario)
);

-- -----------------------------------------------
-- CRIAÇÃO DA TABELA PROFESSOR
-- -----------------------------------------------
CREATE TABLE Professor (
    cod_usuario CHAR(4) NOT NULL,
    email VARCHAR(100) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    celular CHAR(14) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado CHAR(2) NOT NULL,
	cep CHAR(10) NOT NULL,
    setor VARCHAR(50) NOT NULL,
    CONSTRAINT pk_cod_prof PRIMARY KEY (cod_usuario)
);

-- -----------------------------------------------
-- CRIAÇÃO DA TABELA TÉCNICO
-- -----------------------------------------------
CREATE TABLE Tecnico (
    cod_usuario CHAR(6) NOT NULL,
    email VARCHAR(100) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    celular CHAR(14) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado CHAR(2) NOT NULL,
    cep CHAR(10) NOT NULL,
    setor VARCHAR(50) NOT NULL,
    CONSTRAINT pk_cod_tec PRIMARY KEY (cod_usuario)
);
-- -----------------------------------------------
-- CRIAÇÃO DA TABELA PARA GERAR SOLICITAÇÕES ÚNICAS
-- -----------------------------------------------
CREATE TABLE Solicitacao (
    num_solicitacao INT(9) NOT NULL AUTO_INCREMENT,
    CONSTRAINT pk_num_sol PRIMARY KEY (num_solicitacao)
);

-- -----------------------------------------------
-- CRIAÇÃO DA TABELA PARA SERVIÇOS SOLICITADOS POR ALUNOS
-- -----------------------------------------------
CREATE TABLE SolicitacaoEstudante (
    cod_usuario CHAR(7) NOT NULL,
    servico TEXT NOT NULL,
    dataSolicitacao DATETIME NOT NULL,
    num_solicitacao INT(9) NOT NULL,
    CONSTRAINT pk_sol_Estd PRIMARY KEY (cod_usuario),
    CONSTRAINT fk_cod_estudante FOREIGN KEY (cod_usuario)
        REFERENCES Estudante (cod_usuario)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_num_sol_estud FOREIGN KEY (num_solicitacao)
        REFERENCES Solicitacao (num_solicitacao)
);

-- -----------------------------------------------
-- CRIAÇÃO DA TABELA PARA SERVIÇOS SOLICITADOS POR PROFESSORES
-- -----------------------------------------------
CREATE TABLE SolicitacaoProfessor (
    cod_usuario CHAR(4) NOT NULL,
    servico TEXT NOT NULL,
    dataSolicitacao DATETIME NOT NULL,
    num_solicitacao INT(9) NOT NULL,
    CONSTRAINT pk_sol_Prof PRIMARY KEY (cod_usuario),
    CONSTRAINT fk_cod_prof FOREIGN KEY (cod_usuario)
        REFERENCES Professor (cod_usuario)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_num_sol_prof FOREIGN KEY (num_solicitacao)
        REFERENCES Solicitacao (num_solicitacao)
);

-- -----------------------------------------------
-- CRIAÇÃO DA TABELA PARA SERVIÇOS SOLICITADOS POR TÉCNICOS
-- -----------------------------------------------
CREATE TABLE SolicitacaoTecnico (
    cod_usuario CHAR(6) NOT NULL,
    servico TEXT NOT NULL,
    dataSolicitacao DATETIME NOT NULL,
    num_solicitacao INT(9) NOT NULL,
    CONSTRAINT pk_sol_Tec PRIMARY KEY (cod_usuario),
    CONSTRAINT fk_cod_tec FOREIGN KEY (cod_usuario)
        REFERENCES Tecnico (cod_usuario)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_num_sol_prof FOREIGN KEY (num_solicitacao)
        REFERENCES Solicitacao (num_solicitacao)
);