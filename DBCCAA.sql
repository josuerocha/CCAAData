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
  tbl_Login_email_Login VARCHAR(200) NOT NULL,
  nome_Pessoa VARCHAR(200) NOT NULL,
  cpf_Pessoa VARCHAR(14) NOT NULL,
  endereco_Pessoa VARCHAR(300) NOT NULL,
  telefone_Pessoa VARCHAR(14) NULL,
  celular_Pessoa VARCHAR(14) NOT NULL,
  email_Pessoa VARCHAR(100) NOT NULL,
  dataNascimento_Pessoa DATE NOT NULL,
  sexo_Pessoa VARCHAR(1) NOT NULL,
  PRIMARY KEY(cod_Pessoa),
  INDEX tbl_Pessoa_FKIndex1(tbl_Login_email_Login),
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
  numero_Sala INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
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

CREATE TABLE `ccaa`.`tbl_Notas` (
  `cod_Notas` INT NOT NULL,
  `cod_Aluno` INT NULL,
  `mid_Aluno` FLOAT NULL,
  `final_Aluno` FLOAT NULL,
  `oral_Aluno` FLOAT NULL,
  `ano_Aluno` INT NULL,
  `semestre_Aluno` INT NULL,
  PRIMARY KEY (`cod_Notas`));

INSERT INTO `tbl_Login` (`email_Login`, `senha_Login`) VALUES ('root', 'e10adc3949ba59abbe56e057f20f883e');
