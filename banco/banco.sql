-- CRIANDO E USANDO O BANCO
	create DATABASE crudPOO;
	USE crudPOO;

-- CRIANDO AS TABELAS
-- drop table funcionario;
	CREATE TABLE funcionario(
		idFuncionario INT PRIMARY KEY AUTO_INCREMENT,
        nomeFuncionario VARCHAR(100),
        sexo CHAR(1),
        cpf INT,
        observacoes VARCHAR(255),
        idSetores int, 
        FOREIGN KEY (idSetores) REFERENCES setor (idSetores));

-- truncate setor;
-- drop table setor;
	CREATE TABLE setor(
		idSetores int primary key auto_increment,
		nomeSetor varchar(50));
				
		SELECT func.idFuncionario, func.nomeFuncionario, func.sexo, 
        func.cpf, func.observacoes, func.idSetores FROM funcionario as func JOIN setor 
        ON func.idSetores = setor.idSetores JOIN setor as setor ON setor.idSetores = idSetores;
    
    select * from funcionario;
    select * from setor;