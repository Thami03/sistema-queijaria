drop database db_producaodequeijo;
create database db_producaodequeijo;

use db_producaodequeijo;
create table tb_usuario
(	usu_codigo int null auto_increment primary key,
	usu_nome varchar(100) not null,
    usu_email varchar(100) not null,
    usu_senha varchar(100) not null
);


create table tb_queijosproduzidos
(	que_codigo int null auto_increment primary key,
	que_usu_codigo int references tb_usuarios (usu_codigo),
    que_produto varchar(50) not null,
	que_dataproducao date not null,
    que_custo float not null,
    que_datafabricacao date not null,
    que_valorvenda decimal(8,2) not null,
    que_quantidade int not null
);

create table tb_vendas
(	ven_codigo int null auto_increment primary key,
	ven_datavenda date not null,
	ven_usu_codigo int references tb_usuarios (usu_codigo),
    ven_valorvenda decimal(8,2) not null, 
	ven_quantidade int not null,
    ven_que_codigo varchar(20) references tb_queijosproduzidos (que_codigo),
    ven_cliente varchar(200) not null,
	ven_pago  boolean default false 

);

create table tb_historico
(	his_codigo int null auto_increment primary key,
	his_datapagamento date not null,
    his_valor float not null,
    his_descricao varchar(50) not null
); 


create table tb_contas
(	con_codigo int not null auto_increment primary key,
	con_usu_codigo int references tb_usuarios (usu_codigo),
	con_datavencimento date not null,
    con_datapagamento date not null,
    con_valor decimal(8,2) not null,
    con_descricao varchar(200) not null,
	con_pago  boolean default false 
);


insert into tb_usuario
(usu_nome, usu_email, usu_senha)
values
('thami', 'thami@gmail.com', '123' ),
('iris', 'iris@gmail.com','123');

insert into tb_queijosproduzidos
(que_usu_codigo, que_produto, que_dataproducao, que_custo, que_datafabricacao, que_valorvenda,que_quantidade)
values
(1,'coalho','2020-02-02',10,'2020-02-03',15,0),
(1,'manteiga','2020-05-25',10,'2020-06-01',25,1);

insert into tb_contas

( con_usu_codigo, con_datavencimento,con_datapagamento,con_valor,con_descricao)
VALUES
(1,'2021-12-30','2021-04-25',10,'Conta de luz'),
(1,'2021-12-30','2021-04-25',10,'Conta de agua'),
(1,'2021-12-30','2021-04-25',10,'Feno');


select * from tb_queijosproduzidos where que_quantidade >0