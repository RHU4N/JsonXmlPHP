create database jsonApi;
use jsonApi;

CREATE TABLE salao (
  salao_id INT  NOT NULL   AUTO_INCREMENT,
  salao_nome VARCHAR(64)  NOT NULL  ,
  salao_endereco VARCHAR(64)  NOT NULL  ,
  salao_telefone INT(15) NOT NULL  ,
  salao_email VARCHAR(64)  NOT NULL    ,
PRIMARY KEY(salao_id));



CREATE TABLE servico (
  servico_id INT NOT NULL   AUTO_INCREMENT,
  servico_nome  VARCHAR(64)  NOT NULL  ,
  servico_valor VARCHAR(12)  NULL  ,
  fk_salao_id INT  NOT NULL    ,
PRIMARY KEY(servico_id)  ,
INDEX servico_FKIndex1(fk_salao_id),
  FOREIGN KEY(fk_salao_id)
    REFERENCES salao(salao_id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);

insert into salao(salao_nome,salao_endereco,salao_telefone,salao_email) values ('Cabelos e unhas','Rua amorim,239',1195678235,'cabeUnhas@gmail.com');
insert into servico(servico_nome,servico_valor,fk_salao_id) values ('unha de gel','R$124,90',1);

insert into salao(salao_nome,salao_endereco,salao_telefone,salao_email) values ('cabeleira leila','Rua poliglota,481',1195158235,'LeilaCabe@outlook.com'),('Cabelo Manicure sol','Rua lua,890',1195671345,'cabeManiSol@gmail.com'),('Cabeleiro cabelo arco-iris','Rua tutelin,491',1195671425,'arcoIrisCabelo@hotmail.com'),('tesoura maravilha','Rua amora santa,875',1195679805,'maravilhaTesoura43@outlook.com'),('tesoura arco-iris','avenida jorge fagundes,058',1190156235,'irisTesoura@gmail.com');

insert into servico(servico_nome,servico_valor,fk_salao_id) values ('descolorir cabelo','R$150',2),('corte customizado','R$75,35',3),('corte simples-masculino','R$35',4),('corte simples-feminino','R$65',5),('luzes','R$165,45',6),('corte cabelo','R$65',1),('hidratações','R$89,55',2),('pintura cabilar','R$99,65',3),('corte customizado','R$89,65',4),('luzes','R$165,45',5),('recuperação capilar','R$145,35',5),('cabelo arco-iris','R$165,45',6);
