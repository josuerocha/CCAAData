ALTER DATABASE `ccaa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE tbl_Avaliacao (
  cod_Avaliacao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_Pessoa_cod_Pessoa INTEGER UNSIGNED NOT NULL,
  tbl_Turma_cod_Turma INTEGER UNSIGNED NOT NULL,
  descricao_Avaliacao VARCHAR(200) NOT NULL,
  nota_Avaliacao FLOAT NOT NULL,
  data_Avaliacao DATE NOT NULL,
  PRIMARY KEY(cod_Avaliacao),
  INDEX tbl_Avaliacao_FKIndex1(tbl_Turma_cod_Turma),
  INDEX tbl_Avaliacao_FKIndex2(tbl_Pessoa_cod_Pessoa)
);

CREATE TABLE tbl_ContaPagar (
  cod_ContaPagar INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_TipoConta_cod_TipoConta INTEGER UNSIGNED NOT NULL,
  valor_ContaPagar FLOAT NOT NULL,
  dataVencimento_ContaPagar DATE NOT NULL,
  dataPagamento_ContaPagar DATE NULL,
  situacao_ContaPagar VARCHAR(200) NOT NULL,
  PRIMARY KEY(cod_ContaPagar),
  INDEX tbl_ContaPagar_FKIndex1(tbl_TipoConta_cod_TipoConta)
);

CREATE TABLE tbl_ContaReceber (
  cod_ContaReceber INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  aluno_ContaPagar INTEGER UNSIGNED NOT NULL,
  tbl_TipoConta_cod_TipoConta INTEGER UNSIGNED NOT NULL,
  valor_ContaReceber FLOAT NOT NULL,
  dataVencimento_ContaReceber DATE NOT NULL,
  dataPagamento_ContaReceber DATE NULL,
  situacao_ContaReceber VARCHAR(200) NOT NULL,
  PRIMARY KEY(cod_ContaReceber),
  INDEX tbl_ContaReceber_FKIndex1(tbl_TipoConta_cod_TipoConta)
);

CREATE TABLE tbl_EstornoContaPagar (
  cod_EstornoContaPagar INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_ContaPagar_cod_ContaPagar INTEGER UNSIGNED NOT NULL,
  descricao_EstornoContaReceber VARCHAR(200) NOT NULL,
  data_EstornoContaPagar DATE NOT NULL,
  valor_EstornoContaReceber FLOAT NOT NULL,
  PRIMARY KEY(cod_EstornoContaPagar),
  INDEX tbl_EstornoContaPagar_FKIndex1(tbl_ContaPagar_cod_ContaPagar)
);

CREATE TABLE tbl_EstornoContaReceber (
  cod_EstornoContaReceber INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_ContaReceber_cod_ContaReceber INTEGER UNSIGNED NOT NULL,
  descricao_EstornoContaReceber VARCHAR(200) NOT NULL,
  data_EstornoContaReceber DATE NOT NULL,
  valor_EstornoContaReceber FLOAT NOT NULL,
  PRIMARY KEY(cod_EstornoContaReceber),
  INDEX tbl_EstornoContaReceber_FKIndex1(tbl_ContaReceber_cod_ContaReceber)
);

CREATE TABLE tbl_Horario (
  cod_Horario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  horarioInicial_Horario TIME NOT NULL,
  horarioFinal_Horario TIME NOT NULL,
  data_Horario DATE NOT NULL,
  PRIMARY KEY(cod_Horario)
);

CREATE TABLE tbl_Idioma (
  cod_Idioma INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao_Idioma VARCHAR(200) NOT NULL,
  PRIMARY KEY(cod_Idioma)
);

CREATE TABLE tbl_Login (
  email_Login VARCHAR(200) NOT NULL,
  senha_Login VARCHAR(200) NOT NULL,
  isConfirmed_Login BOOL NOT NULL,
  chaveConfirmacao_Login VARCHAR(200) NOT NULL,
  PRIMARY KEY(email_Login)
);

CREATE TABLE tbl_Perfil (
  cod_Perfil INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  perfil_Perfil VARCHAR(50) NOT NULL,
  PRIMARY KEY(cod_Perfil)
);

CREATE TABLE tbl_Pessoa (
  cod_Pessoa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_Perfil_cod_Perfil INTEGER UNSIGNED NOT NULL,
  nome_Pessoa VARCHAR(200) NOT NULL,
  cpf_Pessoa VARCHAR(14) NOT NULL,
  endereco_Pessoa VARCHAR(300) NOT NULL,
  telefone_Pessoa VARCHAR(14) NULL,
  celular_Pessoa VARCHAR(14) NOT NULL,
  email_Pessoa VARCHAR(100) NOT NULL,
  dataNascimento_Pessoa DATE NOT NULL,
  sexo_Pessoa VARCHAR(10) NOT NULL,
  horaAula_Pessoa FLOAT NOT NULL,
  foto_Pessoa VARCHAR(100) NOT NULL,
  PRIMARY KEY(cod_Pessoa),
  INDEX tbl_Pessoa_FKIndex2(tbl_Perfil_cod_Perfil)
);

CREATE TABLE tbl_PresencaAluno (
  cod_PresencaAluno INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_Pessoa_cod_Pessoa INTEGER UNSIGNED NOT NULL,
  data_PresencaAluno DATE NOT NULL,
  situacao_PresencaAluno BOOL NOT NULL,
  PRIMARY KEY(cod_PresencaAluno),
  INDEX tbl_PresencaAluno_FKIndex1(tbl_Pessoa_cod_Pessoa)
);

CREATE TABLE tbl_PresencaAlunoTurma (
  tbl_PresencaAluno_cod_PresencaAluno INTEGER UNSIGNED NOT NULL,
  tbl_Turma_cod_Turma INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(tbl_PresencaAluno_cod_PresencaAluno, tbl_Turma_cod_Turma),
  INDEX tbl_PresencaAluno_has_tbl_Turma_FKIndex1(tbl_PresencaAluno_cod_PresencaAluno),
  INDEX tbl_PresencaAluno_has_tbl_Turma_FKIndex2(tbl_Turma_cod_Turma)
);

CREATE TABLE tbl_PresencaProfessor (
  cod_PresencaProfessor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_Pessoa_cod_Pessoa INTEGER UNSIGNED NOT NULL,
  situacao_PresencaProfessor BOOL NOT NULL,
  data_PresencaProfessor DATE NOT NULL,
  PRIMARY KEY(cod_PresencaProfessor),
  INDEX tbl_PresencaProfessor_FKIndex1(tbl_Pessoa_cod_Pessoa)
);

CREATE TABLE tbl_Sala (
  numero_Sala INTEGER UNSIGNED NOT NULL,
  descricao_Sala VARCHAR(200) NOT NULL,
  PRIMARY KEY(numero_Sala)
);

CREATE TABLE tbl_TipoConta (
  cod_TipoConta INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_TipoConta VARCHAR(200) NOT NULL,
  PRIMARY KEY(cod_TipoConta)
);

CREATE TABLE tbl_Trabalho (
  cod_Trabalho INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_Turma_cod_Turma INTEGER UNSIGNED NOT NULL,
  tbl_Pessoa_cod_Pessoa INTEGER UNSIGNED NOT NULL,
  descricao_Trabalho VARCHAR(200) NOT NULL,
  nota_Trabalho FLOAT NOT NULL,
  data_Trabalho DATE NOT NULL,
  PRIMARY KEY(cod_Trabalho),
  INDEX tbl_Trabalho_FKIndex1(tbl_Pessoa_cod_Pessoa),
  INDEX tbl_Trabalho_FKIndex2(tbl_Turma_cod_Turma)
);

CREATE TABLE tbl_Turma (
  cod_Turma INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_Sala_numero_Sala INTEGER UNSIGNED NOT NULL,
  tbl_Idioma_cod_Idioma INTEGER UNSIGNED NOT NULL,
  descricao_Turma VARCHAR(200) NOT NULL,
  PRIMARY KEY(cod_Turma),
  INDEX tbl_Turma_FKIndex1(tbl_Idioma_cod_Idioma),
  INDEX tbl_Turma_FKIndex2(tbl_Sala_numero_Sala)
);

CREATE TABLE tbl_Nota (
  cod_Nota INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cod_Aluno INT NOT NULL,
  disciplina_Nota VARCHAR(100) NOT NULL,
  mid_Nota FLOAT NOT NULL,
  final_Nota FLOAT NOT NULL,
  oral_Nota FLOAT NOT NULL,
  ano_Nota INT NOT NULL,
  semestre_Nota INT NOT NULL,
  situacao_Nota VARCHAR(100) NOT NULL,
  PRIMARY KEY (cod_Nota));

CREATE TABLE tbl_Observacao (
  cod_Observacao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cod_Aluno INT NOT NULL,
  descricao_Observacao VARCHAR(300) NOT NULL,
  PRIMARY KEY (cod_Observacao));

INSERT INTO tbl_Login (email_Login, senha_Login,isConfirmed_Login,chaveConfirmacao_Login) VALUES 
('root@email.com', 'e10adc3949ba59abbe56e057f20f883e',1,'confirmado');

INSERT INTO tbl_Sala(numero_Sala, descricao_Sala) VALUES
(1, 'Sala de aula em vídeo conferência'),
(2, 'Sala de aula regular - 10 pessoas'),
(3, 'Sala de aula regular - 10 pessoas'),
(4, 'Sala de aula regular - 15 pessoas');

INSERT INTO tbl_Perfil (cod_Perfil, perfil_Perfil) VALUES
(1,'Administrador'),
(2,'Coordenador(a)'),
(3,'Secretario(a)'),
(4,'Professor'),
(5,'Aluno'),
(6,'Tutor'),
(7,'Responsavel');

INSERT INTO tbl_TipoConta (cod_TipoConta,tipo_TipoConta) VALUES
(1,'Mensalidade'),
(2,'Agua'),
(3,'Luz'),
(4,'Gas');

INSERT INTO tbl_Pessoa (tbl_Perfil_cod_Perfil,nome_Pessoa,cpf_Pessoa,endereco_Pessoa,telefone_Pessoa,celular_Pessoa,email_Pessoa,dataNascimento_Pessoa,sexo_Pessoa,horaAula_Pessoa,foto_Pessoa) VALUES (5,'Chuck Norris', '111.111.111-75','40 RUA TRINTA E SETE02','(31)3849-5310','(31)99989-4466','chucknorris@me.com','2016-01-01','m','0','noimg.png'),
(4,'Josué Rocha', '111.111.111-75','40 RUA TRINTA E SETE02','(31)3849-5310','(31)99989-4466','josuerocha@me.com','2016-01-01','m','0','noimg.png'),
(4,'Wolmer', '111.111.111-75','40 Belo Horizonte','(31)3849-6464','(31)99989-4466','wolmer@hotmail.com','1900-01-01','m','0','noimg.png'),
(1,'Root', '111.111.111-75','40 RootLandia','(00)0000-0000','(00)00000-0000','root@email.com','1900-01-01','m','0','noimg.png');

