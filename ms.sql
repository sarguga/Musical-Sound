create database ms;
use ms;

create table Ciudad(
id int auto_increment primary key,
ciudad varchar (255));

create table Genero(
id int auto_increment primary key,
genero varchar (255));

create table Usuario(
id int auto_increment primary key unique,
user varchar (255) unique,
pass varchar (255),
nombre varchar (255),
email varchar (255) unique,
telefono varchar (9),
tipo_usu int,
ciudad int, 
foreign key (ciudad) references Ciudad(id)
);

create table Grupo(
id_grupo int auto_increment primary key,
num_integrantes int,
id_genero int,
foreign key (id_grupo) references Usuario (id),
foreign key (id_genero) references Genero (id)
);

create table Pub(
id_pub int auto_increment primary key,
aforo int,
direccion varchar (255),
foreign key (id_pub) references Usuario (id)
);

create table Fan(
id_fan int auto_increment primary key,
apellido varchar (255),
fecha_nac date,
sexo varchar (1),
foreign key (id_fan) references Usuario (id)
);

create table Concierto(
id int auto_increment primary key,
nombre varchar (255),
fecha date,
estado int,
id_genero int,
id_grupo int,
id_pub int,
foreign key (id_grupo) references Grupo (id_grupo),
foreign key (id_genero) references Genero (id),
foreign key (id_pub) references Pub (id_pub));

create table Inscripcion(
id_grupo int,
id_concierto int,
estado_inscripcion int,
primary key (id_grupo, id_concierto),
foreign key (id_grupo) references Grupo (id_grupo),
foreign key (id_concierto) references Concierto (id));

create table Votacion_Concierto(
id_fan int,
foreign key (id_fan) references Fan (id_fan),
puntuacion int,
id_concierto int,
foreign key (id_concierto) references Concierto (id),
primary key (id_fan, id_concierto)
);

create table Votacion_Grupo(
id_fan int,
foreign key (id_fan) references Fan (id_fan),
puntuacion int,
id_grupo int,
foreign key (id_grupo) references Grupo (id_grupo),
primary key (id_fan, id_grupo)
);

create table Votacion_Pub(
id_fan int,
foreign key (id_fan) references Fan (id_fan),
puntuacion int,
id_pub int,
foreign key (id_pub) references Pub (id_pub),
primary key (id_fan, id_pub)
);

insert into Ciudad(ciudad)values('Barcelona');
insert into Ciudad(ciudad)values('Bilbao');
insert into Ciudad(ciudad)values('Madrid');
insert into Ciudad(ciudad)values('Sevilla');

insert into Genero(genero)values('Heavy');
insert into Genero(genero)values('Rock');
insert into Genero(genero)values('Pop');
insert into Genero(genero)values('Punk');

select * from grupo;


/*select c.nombre as 'concierto', u.nombre as 'pub', g.genero, c.fecha, a.ciudad from concierto c, usuario u, genero g, ciudad a 
where c.id_pub=u.id and g.id=c.id_genero and a.id=u.id and c.id_pub=1 and c.estado=1 order by g.genero;

/*select c.nombre as 'C', u.nombre as 'L', g.genero, c.fecha, a.ciudad from Concierto c, Usuario u, Ciudad a, Genero g 
where c.id=u.id and c.id=1 and g.id=c.id_genero and a.id=u.id and c.estado=1;
select u.nombre as 'G' from Concierto c, usuario u where u.id=c.id_grupo and c.id_grupo=2;

select * from concierto;
select * from usuario;

select * from usuario inner join ciudad on usuario.id=ciudad.id inner join pub on pub.id_pub=usuario.id;*/

