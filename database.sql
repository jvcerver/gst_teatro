drop database if exists teatro;
create database teatro;
use teatro;

create table obra 
	(ref int auto_increment primary key not null,
	nombre text not null,
	grupo text not null,
	uri text not null,
	descripcion text not null,
	f_inicio date not null,
	f_final date not null)
	engine = innodb;

create table pase
	(fecha date not null,
	hora time not null,
	primary key (fecha,hora))
	engine = innodb;
	
create table seccion
	(codigo int auto_increment primary key not null ,
	precio float not null,
	descripcion varchar(20) not null)
	engine = innodb;

create table butaca
	(fila int not null,
	numero int not null,
	seccion int not null,
	primary key (fila,numero,seccion),
	foreign key (seccion) references seccion (codigo)
	on delete cascade on update cascade)
	engine = innodb;

create table reserva
	(no_entrada int auto_increment primary key not null,
	dni text not null,
	fecha date not null,
	hora time not null,
	fila int not null,
	numero int not null,
	seccion int not null,
	index (fecha,hora),
	foreign key (fecha,hora) references pase (fecha,hora)
	on delete no action on update no action,
	index (fila,numero,seccion),
	foreign key (fila,numero,seccion) references butaca (fila,numero,seccion)
	on delete no action on update no action)
	engine = innodb;



INSERT INTO  `obra` (  `nombre` ,  `grupo` ,  `uri` ,  `descripcion` ,  `f_inicio` ,  `f_final` ) 
VALUES (
'el rey leon',  'producciones tetrales Disney',  'erl.jpg',  'musical', '2014-01-02', '2014-02-01');

INSERT INTO `pase`(`fecha`, `hora`) 
VALUES 
('2014-01-02','20:00'),
('2014-01-03','20:00'),
('2014-01-04','20:00'),
('2014-01-05','17:00'),
('2014-01-06','20:00'),
('2014-01-07','20:00'),
('2014-01-08','20:00'),
('2014-01-09','20:00'),
('2014-01-10','20:00'),
('2014-01-11','20:00'),
('2014-01-12','17:00'),
('2014-01-13','20:00'),
('2014-01-14','20:00'),
('2014-01-15','20:00'),
('2014-01-16','20:00'),
('2014-01-17','20:00'),
('2014-01-18','20:00'),
('2014-01-19','17:00'),
('2014-01-20','20:00'),
('2014-01-21','20:00'),
('2014-01-22','20:00'),
('2014-01-23','20:00'),
('2014-01-24','20:00'),
('2014-01-25','20:00'),
('2014-01-26','17:00'),
('2014-01-27','20:00'),
('2014-01-28','20:00'),
('2014-01-29','20:00'),
('2014-01-30','20:00'),
('2014-01-31','20:00');

INSERT INTO `seccion` (`precio`, `descripcion`) VALUES (50, 'Platea'),(40, 'Anfiteatro'),(30, 'Palco1'),(30, 'Palco2'),(30, 'Palco3'),(30, 'Palco4');
