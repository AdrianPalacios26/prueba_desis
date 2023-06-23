Create Table Votacion(
Id_Votacion int not null,
Nombre_Completo nvarchar(50),
Alias nvarchar(50),
Rut nvarchar(10),
Email nvarchar(50),
Id_Region int,
Id_Comuna int,
Id_Candidato int,
Web char,
TV char,
Redes_sociales char,
Amigo char,
primary key (Id_Votacion));


create Table Region(
Id_Region int not null,
Nombre nvarchar(50),
primary key (Id_Region));


Create Table Comuna(
Id_Comuna int not null,
Nombre nvarchar(50),
Id_Region int,
primary key (Id_Comuna));


Create Table Candidato(
Id_Candidato int not null,
Nombre nvarchar(50),
primary key (Id_Candidato));


INSERT INTO Region (Id_Region, nombre) VALUES (1, 'Arica y Parinacota');
INSERT INTO Region (Id_Region, nombre) VALUES (2, 'Tarapacá');
INSERT INTO Region (Id_Region, nombre) VALUES (3, 'Antofagasta');
INSERT INTO Region (Id_Region, nombre) VALUES (4, 'Atacama');
INSERT INTO Region (Id_Region, nombre) VALUES (5, 'Coquimbo');
INSERT INTO Region (Id_Region, nombre) VALUES (6, 'Valparaíso');
INSERT INTO Region (Id_Region, nombre) VALUES (7, 'Metropolitana de Santiago');
INSERT INTO Region (Id_Region, nombre) VALUES (8, 'Libertador General Bernardo O''Higgins');
INSERT INTO Region (Id_Region, nombre) VALUES (9, 'Maule');
INSERT INTO Region (Id_Region, nombre) VALUES (10, 'Ñuble');
INSERT INTO Region (Id_Region, nombre) VALUES (11, 'Biobío');
INSERT INTO Region (Id_Region, nombre) VALUES (12, 'Araucanía');
INSERT INTO Region (Id_Region, nombre) VALUES (13, 'Los Ríos');
INSERT INTO Region (Id_Region, nombre) VALUES (14, 'Los Lagos');
INSERT INTO Region (Id_Region, nombre) VALUES (15, 'Aysén del General Carlos Ibáñez del Campo');
INSERT INTO Region (Id_Region, nombre) VALUES (16, 'Magallanes y de la Antártica Chilena');


-- Insertar las comunas de la Región Metropolitana de Santiago
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (1,'Santiago', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (2,'Providencia', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (3,'Ñuñoa', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (4,'Las Condes', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (5,'La Reina', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (6,'Peñalolén', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (7,'Maipú', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (8,'Puente Alto', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (9,'La Florida', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (10,'Macul', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (11,'Recoleta', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (12,'Huechuraba', 7);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (13,'La Pintana', 7);

-- Insertar las comunas de la Región de Valparaíso
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (14,'Valparaíso', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (15,'Viña del Mar', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (16,'Concón', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (17,'Quilpué', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (18,'Villa Alemana', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (19,'Casablanca', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (20,'Quillota', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (21,'Los Andes', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (22,'San Felipe', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (23,'La Ligua', 6);
INSERT INTO Comuna (Id_Comuna, Nombre, Id_Region) VALUES (24,'San Antonio', 6);





