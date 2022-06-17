create table usuario(
id serial primary key,
username varchar(20) not null unique,
nome text not null,
senha varchar(50) not null
);

create table conta(
numero_conta serial not null primary key,
usuario varchar(20) not null,
saldo numeric not null,
foreign key(usuario) references usuario(username)
);

create table operacao(
cod_operacao serial not null primary key,
nome text not null,
descricao text not null
);

create table transacao(
cod_transacao serial not null primary key,
valor numeric not null,
operacao int not null,
conta_origem int not null,
conta_destino int,
data_transacao date not null,
foreign key(conta_origem) references conta(numero_conta),
foreign key(conta_destino) references conta(numero_conta)
);

create table auditoria(
cod_auditoria serial not null primary key,
usuario varchar(20) not null,
data_login date not null,
data_logout date not null,
foreign key(usuario) references usuario(username)
);

insert into operacao (nome, descricao) values ('Pix','Pagamento Pix'), ('Boleto','Pagamento Boleto'), ('Debito','Pagamento Debito'), ('Credito','Pagamento Credito'), ('Aplicacao','Aplicacao Poupanca'), ('Resgate','Resgate Poupanca'), ('Transferencia','Transferencia'); 

insert into usuario(username,nome,senha) values ('anaclaraspadari','Ana Clara Spadari',MD5('teste2468')), ('pedrootavioribeiro','Pedro Otavio Ribeiro',MD5('gu1t4rr15t4'));

insert into conta(usuario,saldo) values ('anaclaraspadari',1000), ('pedrootavioribeiro',2000);

insert into transacao(valor,operacao,conta_origem,conta_destino,data_transacao) values (20.0,4,(select cod_conta from conta where usuario = 'pedrootavioribeiro'),null,'2022-06-16');

drop table   usuario CASCADE;

select * from conta;

select * from usuario;

delete from auditoria;

delete from usuario;

delete from conta;

delete from transacao;
