CREATE DATABASE test_brm;
USE test_brm;

CREATE TABLE productos(
	id int AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	cantidad INT NOT NULL,
	lote VARCHAR(50) NOT NULL,
	fecha_v date NOT NULL,
	precio float(20,2) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO productos (nombre, cantidad, lote, fecha_v, precio) VALUES 
('Monitor',20,'0001','2020-07-10',80000),
('Teclado',50,'0002','2020-07-11',30000),
('Mouse',100,'0003','2020-07-13',20000);

CREATE TABLE clientes(
	id int AUTO_INCREMENT,
	nombre VARCHAR(100) NOT NULL,
	identidad VARCHAR(20) NOT NULL,
	numero_id VARCHAR(50) NOT NULL,
	celular VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO clientes (nombre, identidad, numero_id, celular) VALUES 
('Juan Maldonado','PEP','955948708101993','3125318122');

CREATE TABLE carrito(
	id int AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	cantidad INT NOT NULL,
	lote VARCHAR(50) NOT NULL,
	fecha_v date NOT NULL,
	precio float(20,2) NOT NULL,
	PRIMARY KEY (id)
);