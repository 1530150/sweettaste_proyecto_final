DROP DATABASE IF EXISTS sweettaste;

CREATE DATABASE sweettaste;
USE sweettaste;


CREATE TABLE persona(
	nombre varchar(30),
	apellido_paterno varchar(30),
	apellido_materno varchar(30),
	fecha_nacimiento varchar(20),
	calle varchar (50),
	num_ext varchar(10),
	colonia varchar(50),
	codigo_postal varchar(5),
	email varchar(50) PRIMARY KEY,
	telefono varchar(20)
);

INSERT INTO persona VALUES ("Cinthia Karina","Becerra","Hernández","28/12/1994","Cholula","738","México","87049","karina@gmail.com","834473821");
INSERT INTO persona VALUES ("Janeth","Limones","Estrada","26/10/1993","Juan Escutia","1238","Zarrabal","87042","janeth@gmail.com","8343213541");
INSERT INTO persona VALUES ("Jorge Luis","Carreón","Gonzales","24/05/1994","Uxmal","428","Los Andes","87044","jorge@gmail.com","834473821");
INSERT INTO persona VALUES ("Marco José","Peralta","Gómez","26/07/1995","Sierra Gorda","1181","Los Mares","87041","marco@gmail.com","83443252");
INSERT INTO persona VALUES ("José Ricardo","Estrada","Gonzales","21/08/1992","Hidalgo","128","Zacatecas","87040","ricky@gmail.com","834543321");
INSERT INTO persona VALUES ("Luis Manuel","Castillo","Domínguez","12/01/1994","Allende","932","Juan Escutia","87032","luis@gmail.com","834545412");
INSERT INTO persona VALUES ("Fabián Alejandro","Vázques","Soto","05/02/1991","Coahuila","821","Allende","87043","fabian@gmail.com","834439841");

CREATE TABLE usuario(
	email varchar(50) PRIMARY KEY,
	contrasena varchar(30),
	nivel int NOT NULL,
	FOREIGN KEY (email) REFERENCES persona(email)
);

INSERT INTO usuario VALUES ("karina@gmail.com","cinthia123",3);
INSERT INTO usuario VALUES ("janeth@gmail.com","janeth123",1);
INSERT INTO usuario VALUES ("jorge@gmail.com","jorge123",1);
INSERT INTO usuario VALUES ("ricky@gmail.com","ricky123",0);
INSERT INTO usuario VALUES ("fabian@gmail.com","fabian123",0);

CREATE TABLE productos(
	id int AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(30),
	tipo varchar(30),
	sabor varchar(30),
	complementos varchar(100),
	tamano varchar(50),
	precio int
);

INSERT INTO productos VALUES(NULL,"Flan cake","Pastel","Chocolate","Cerezas, nuez, chocolate","20 cm",180);
INSERT INTO productos VALUES(NULL,"Cup cake","Pastelito","Chocolate, Vainilla","Chantilli, chocolate, cereza","5 cm",10);
INSERT INTO productos VALUES(NULL,"Brownie","Pastelito","Chocolate","Nuez","5x7 cm",12);

CREATE TABLE recetas(
	id_producto int PRIMARY KEY,
	ingredientes varchar(1000),
	instrucciones varchar (1000),
	FOREIGN KEY (id_producto) REFERENCES productos(id)
);

INSERT INTO recetas VALUES(
	1,
	"<p>-1 tz azúcar</p>
	<p>-1 lata leche condensada</p>
	<p>-1 lata leche evaporada</p>
	<p>-1 caja harina para pastel sabor chocolate</p>
	<p>-3 huevos grandes</p>
	<p>-Aceite en aerosol</p>",
	"<p>Precalienta horno a 350° F. Mueve la rejilla del horno a la posición más baja. Rocía un molde con tubo central (molde bundt) de 10 pulgadas con el antiadherente. Llena una bandeja grande para hornear con agua hasta la mitad y colócala en el horno.</p>
<p>Pon el azúcar en una cacerola pequeña muy resistente a fuego medio bajo, mezclando frecuentemente, de 3 a 4 minutos o hasta que se disuelva y quede de color caramelo.</p>
<p>Pon el azúcar rápidamente en el molde bundt, esparciendo hasta cubrir toda la base.</p>
<p>Mixte las yemas del huevo, la leche condensada azucarada y la leche evaporada en un tazón grande hasta que estén bien mezclados.</p>
<p>Prepare la mezcla de pastel de acuerdo a las instrucciones del paquete.</p>
<p>Vierte la mezcla de los huevos y la leche sobre el caramelo.</p>
<p>Lentamente añade la mezcla del pastel sobre el flan.</p>
<p>Coloca el molde en la bandeja grande en el horno.</p>
<p>Hornea durante 50 a 60 minutos o hasta que al insertar un palito de madera en el centro salga limpio. Saque el molde del agua.</p>
<p>Poner a enfriar antes de voltear el pastel en un plato para servir.</p>"

);

CREATE TABLE pedidos(
	id int AUTO_INCREMENT PRIMARY KEY,
	estado int,
	producto int,
	cliente varchar(50),
	calle_entrega varchar (50),
	num_ext_entrega varchar(10),
	colonia_entrega varchar(50),
	fecha_entrega varchar(30),
	hora_entrega varchar(10),
    total int,
	FOREIGN KEY (producto) REFERENCES productos(id),
	FOREIGN KEY (cliente) REFERENCES persona(email)
);

INSERT INTO pedidos VALUES (NULL,0,1,"marco@gmail.com","Huasteco","214","Azteca","21/11/2017","17:30",180);
INSERT INTO pedidos VALUES (NULL,0,2,"luis@gmail.com","Huatlán","531","Allende","17/11/2017","14:30",10);
INSERT INTO pedidos VALUES (NULL,1,1,"marco@gmail.com","Huasteco","214","Azteca","03/11/2017","18:30",180);
INSERT INTO pedidos VALUES (NULL,1,3,"luis@gmail.com","Río Bravo","928","Hidalgo","09/11/2017","16:30",12);



CREATE TABLE distribuidores(
	nombre varchar(100),
	calle varchar (50),
	num_ext varchar(10),
	colonia varchar(50),
	email varchar(50) PRIMARY KEY,
	telefono varchar(20)
);

INSERT INTO distribuidores VALUES ("Karla Velázquez Mora", "Nicolás Bravo","421","Zona Centro","karlavaz329@gmail.com","3832981193");

CREATE TABLE ubicaciones(
	id int AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(100),
	calle varchar(50),
	num varchar(10),
	colonia varchar(50),
	codigo_postal varchar(10)
);

INSERT INTO ubicaciones VALUES (NULL,"Walmart Las Adelitas","Bulevar Adolfo López Mateos","50","Las Adelitas","87049");

CREATE TABLE equipo(
	id int AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(50),
	descripcion varchar(1000),
	fecha_adquisicion varchar(20),
	costo int
);

INSERT INTO equipo VALUES (NULL,"Horno","
Horno de convección para panadería de 3 bandejas, ideal para panaderia y puntos de venta de pan. De diseño muy actual y con la tecnología más avanzada, es una excelente inversión para su negocio, con una relación calidad-precio extremadamente excepcional.",
"12/06/2016",7000);

CREATE TABLE items(
	id int AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(50),
	marca varchar(50),
	presentacion varchar(100),
	costo int
);

INSERT INTO items VALUES (NULL,"Harina","Selecta","1 kg",14);
INSERT INTO items VALUES (NULL,"Aceite","Nutrioli","1 kg",20);