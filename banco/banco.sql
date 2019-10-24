-- CRIANDO E USANDO O BANCO
	CREATE DATABASE crudPOO;
	USE crudPOO;

-- CRIANDO AS TABELAS
	CREATE TABLE funcionario(
		idFuncionario INT PRIMARY KEY AUTO_INCREMENT,
        nomeFuncionario VARCHAR(100),
        sexo CHAR(1),
        cpf INT,
        observacoes VARCHAR(255),
		idSetores int);
        
	CREATE TABLE setor(
		idSetores int primary key auto_increment,
		nomeSetor varchar(50)
    );