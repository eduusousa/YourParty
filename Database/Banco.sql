
CREATE TABLE tbCliente(
	idCliente INT PRIMARY KEY AUTO_INCREMENT
	, nomeCliente VARCHAR(100) NOT NULL
	, cpfCliente VARCHAR(14) NOT NULL
	, emailCliente VARCHAR(100) NOT NULL
	, senhaCliente VARCHAR(255) NOT NULL
	, fotoCliente VARCHAR (255) NOT NULL
);

CREATE TABLE tbFoneCliente(
	idFoneCliente INT PRIMARY KEY AUTO_INCREMENT
	, numeroFoneCliente VARCHAR(20)
	, idCliente INT 
	, FOREIGN KEY (idCliente) REFERENCES tbCliente(idCliente)
);

CREATE TABLE tbEmpresa(
	idEmpresa INT PRIMARY KEY AUTO_INCREMENT
	, nomeEmpresa VARCHAR(80) NOT NULL
	, servicoEmpresa VARCHAR(30) NOT NULL
	, cnpjEmpresa VARCHAR(14) NOT NULL
	, enderecoEmpresa VARCHAR(80) NOT NULL
	, numeroEmpresa VARCHAR(10) NOT NULL
	, cidadeEmpresa VARCHAR(80) NOT NULL
	, bairroEmpresa VARCHAR(80) NOT NULL
	, cepEmpresa VARCHAR(20) NOT NULL
	, estadoEmpresa VARCHAR(80) NOT NULL 
	, fotoEmpresa VARCHAR(200) NOT NULL
	, emailEmpresa VARCHAR (100) NOT NULL
	, senhaEmpresa VARCHAR (100) NOT NULL
);

CREATE TABLE tbServico(
	idServico INT PRIMARY KEY AUTO_INCREMENT
	, nomeServico VARCHAR(80) NOT NULL
);

CREATE TABLE tbCatalogoServico(
	idCatalogoServico INT PRIMARY KEY AUTO_INCREMENT
	, idEmpresa INT
	, idServico INT
	, FOREIGN KEY (idEmpresa) REFERENCES tbEmpresa(idEmpresa)
	, FOREIGN KEY (idServico) REFERENCES tbServico(idServico)
);

CREATE TABLE tbFoneEmpresa(
	idFoneEmpresa INT PRIMARY KEY AUTO_INCREMENT
	, numeroFoneEmpresa VARCHAR(20) NOT NULL
	, idEmpresa INT 
	, FOREIGN KEY (idEmpresa) REFERENCES tbEmpresa(idEmpresa)
);

CREATE TABLE tbBuffet(
	idBuffet INT PRIMARY KEY AUTO_INCREMENT
	, nomeBuffet VARCHAR(200) NOT NULL
	, descricaoBuffet VARCHAR(200) NOT NULL
	, valorBuffet DECIMAL(15, 2) NOT NULL
	, fotoBuffet VARCHAR(200) NOT NULL
	, idEmpresa INT 
	, FOREIGN KEY (idEmpresa) REFERENCES tbEmpresa(idEmpresa)
);

CREATE TABLE tbItemBuffet(
	idItemBuffet INT PRIMARY KEY AUTO_INCREMENT
	, nomeItemBuffet VARCHAR(300) NOT NULL
	, idBuffet INT 
	, FOREIGN KEY (idBuffet) REFERENCES tbBuffet(idBuffet)
);

CREATE TABLE tbDecoracao(
	idDecoracao INT PRIMARY KEY AUTO_INCREMENT
	,nomeDecoracao VARCHAR(200) NOT NULL
	,valorDecoracao DECIMAL(15, 2) NOT NULL
	, descDecoracao VARCHAR(300) NOT NULL
	,tipoDecoracao VARCHAR(60) NOT NULL
	,temaDecoracao VARCHAR(60) NOT NULL
	,fotoDecoracao VARCHAR(200) NOT NULL
	,idEmpresa INT 
	, FOREIGN KEY (idEmpresa) REFERENCES tbEmpresa(idEmpresa)
);

CREATE TABLE tbItemDecoracao (
	idItemDecoracao INT PRIMARY KEY AUTO_INCREMENT
	,nomeItemDecoracao VARCHAR(300) NOT NULL
	,idDecoracao INT 
	, FOREIGN KEY (idDecoracao) REFERENCES tbDecoracao(idDecoracao)
);

CREATE TABLE tbLocal(
	idLocal INT PRIMARY KEY AUTO_INCREMENT
	, nomeLocal VARCHAR(100) NOT NULL
	, valorLocal DECIMAL(15,2) NOT NULL
	,enderecoLocal VARCHAR(80) NOT NULL
	,numeroLocal VARCHAR(30) NOT NULL
	,cidadeLocal VARCHAR(30) NOT NULL
	,bairroLocal VARCHAR(30) NOT NULL
	,cepLocal VARCHAR(9) NOT NULL
	,estadoLocal VARCHAR(30) NOT NULL
	,fotoLocal VARCHAR(200) NOT NULL
	,idEmpresa INT 
	, FOREIGN KEY (idEmpresa) REFERENCES tbEmpresa(idEmpresa)
);

CREATE TABLE tbSeguranca (
	idSeguranca INT PRIMARY KEY AUTO_INCREMENT
	,descSeguranca VARCHAR(200) NOT NULL
	,valorSeguranca DECIMAL(15,2) NOT NULL
	,quantidadeSeguranca INT NOT NULL
	,fotoSeguranca VARCHAR(200) NOT NULL
	,idEmpresa INT 
	, FOREIGN KEY (idEmpresa) REFERENCES tbEmpresa(idEmpresa)
);

CREATE TABLE tbOrcamentoEvento(
	idOrcamentoEvento INT PRIMARY KEY AUTO_INCREMENT
	,valorOrcamentoEvento DECIMAL(15,2) NOT NULL
	,idCliente INT 
	, FOREIGN KEY (idCliente) REFERENCES tbCliente(idCliente)
);

CREATE TABLE tbItemOrcamento(
	idItemOrcamento INT PRIMARY KEY AUTO_INCREMENT
	,confirmaContrato INT
	,avaliacaoBuffet INT
	,avaliacaoDecoracao INT
	,avaliacaoLocal INT
	,avaliacaoSeguranca INT
	,idOrcamentoEvento INT 
	,idBuffet INT
	,idDecoracao INT
	,idSeguranca INT
	,idLocal INT
	, FOREIGN KEY (idOrcamentoEvento) REFERENCES tbOrcamentoEvento(idOrcamentoEvento)
	, FOREIGN KEY (idBuffet) REFERENCES tbBuffet(idBuffet)
	, FOREIGN KEY (idDecoracao) REFERENCES tbDecoracao(idDecoracao)
	, FOREIGN KEY (idSeguranca) REFERENCES tbSeguranca(idSeguranca)
	, FOREIGN KEY (idLocal) REFERENCES tbLocal(idLocal)
);

CREATE TABLE tbAdmin(
	idAdmin INT PRIMARY KEY AUTO_INCREMENT
	, nomeAdmin VARCHAR(50) NOT NULL
	, emailAdmin VARCHAR(100) NOT NULL
	, senhaAdmin VARCHAR(150) NOT NULL
);
