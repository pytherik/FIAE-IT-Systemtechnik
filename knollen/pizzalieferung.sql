DROP DATABASE IF EXISTS pizzalieferung;
CREATE DATABASE pizzalieferung;
use pizzalieferung;

CREATE TABLE kunde
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    vorname VARCHAR(50),
    nachname VARCHAR(50),
    strNr VARCHAR(150),
    plzId INT
);

CREATE TABLE plz
(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    plz CHAR(5)
);

CREATE TABLE ort
(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    ort VARCHAR(100)
);

CREATE TABLE plz_ort
(
    plzId INT,
    ortId INT
);

ALTER TABLE kunde
    ADD FOREIGN KEY (plzId) REFERENCES plz(id);

ALTER TABLE plz_ort
ADD FOREIGN KEY (plzId) REFERENCES plz(id);
ALTER TABLE plz_ort
ADD FOREIGN KEY (ortId) REFERENCES ort(id);

CREATE TABLE pizza
(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    groesse VARCHAR(10),
    preis FLOAT
);

CREATE TABLE toppings
(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(50),
    preis FLOAT
);

CREATE TABLE pizza_toppings
(
    pizza_id INT,
    toppings_id INT
);

ALTER TABLE pizza_toppings
ADD FOREIGN KEY (pizza_id) REFERENCES pizza(id);
ALTER TABLE pizza_toppings
ADD FOREIGN KEY (toppings_id) REFERENCES toppings(id);

CREATE TABLE getraenke
(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(50),
    preis FLOAT,
    anzahl INT
);

CREATE TABLE bestellung
(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    kundeId INT,
    pizzaId INT,
    getraenkeId INT
);

ALTER TABLE bestellung
ADD FOREIGN KEY (kundeId) REFERENCES kunde(id);
ALTER TABLE bestellung
ADD FOREIGN KEY (pizzaId) REFERENCES pizza(id);
ALTER TABLE bestellung
ADD FOREIGN KEY (getraenkeId) REFERENCES getraenke(id);
