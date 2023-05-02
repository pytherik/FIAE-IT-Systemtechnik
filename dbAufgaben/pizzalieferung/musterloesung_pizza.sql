DROP DATABASE IF EXISTS dbAufgaben;
CREATE DATABASE dbAufgaben;
USE dbAufgaben;

CREATE TABLE kunde
(
    id        INT AUTO_INCREMENT PRIMARY KEY,
    vorname   VARCHAR(45),
    nachname  VARCHAR(45),
    strasseNr VARCHAR(100),
    plz       VARCHAR(5),
    ort       VARCHAR(45)
);

CREATE TABLE pizzaBasis
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    groesse VARCHAR(10),
    preis   DECIMAL(4, 2)
);

CREATE TABLE topping
(
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(15),
    preis DECIMAL(4, 2)
);

CREATE TABLE getraenk
(
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(25),
    preis DECIMAL(4, 2)
);

CREATE TABLE lieferung
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    kundeId INT
);

CREATE TABLE pizza
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    pizzaBasisId INT,
    lieferungId  INT
);

CREATE TABLE pizza_topping
(
    pizzaId   INT,
    toppingId INT,
    anzahl    INT
);

CREATE TABLE getraenk_lieferung
(
    lieferungId INT,
    getraenkId  INT,
    anzahl      INT
);

INSERT INTO kunde (id, vorname, nachname, strasseNr, plz, ort)
VALUES (NULL, 'Liza ', 'Bolte ', 'Siegfried-Berger-Straße 12', '12557', 'Berlin'),
       (NULL, 'Zsuzsa ', 'Voss ', 'Katzengraben 3', '12555', 'Berlin'),
       (NULL, 'Oralia ', 'Mitschke ', 'Wohlauer Straße 4b', '12526', 'Berlin'),
       (NULL, 'Fiona ', 'Hardt ', 'Berghauser Straße 122', '12559', 'Berlin'),
       (NULL, 'Sakura ', 'Lutz ', 'Walther-Huth-Straße 43', '12487', 'Berlin'),
       (NULL, 'Manolo ', 'Schöne ', 'Am Falkenberg 16', '12524', 'Berlin'),
       (NULL, 'Raffael ', 'Schell ', 'Cimbernstraße 43', '12524', 'Berlin'),
       (NULL, 'Freimuth ', 'Köhler ', 'Kasinostraße 26', '12487', 'Berlin'),
       (NULL, 'Healani ', 'Beck ', 'Adlergestell 11', '12527', 'Berlin'),
       (NULL, 'Anian ', 'Hauptmann ', 'Markstädter Straße 67', '12555', 'Berlin');

INSERT INTO pizzaBasis (id, groesse, preis)
VALUES (NULL, 'klein', 4),
       (NULL, 'gross', 5);

INSERT INTO lieferung (id, kundeId)
VALUES (NULL, 1),
       (NULL, 1),
       (NULL, 2);

INSERT INTO pizza (id, pizzaBasisId, lieferungId)
VALUES (NULL, 1, 1),
       (NULL, 2, 1),
       (NULL, 1, 3);

INSERT INTO topping (id, name, preis)
VALUES (NULL, 'Salami', 1.5),
       (NULL, 'Champignons', 1),
       (NULL, 'Extra Käse', 1),
       (NULL, 'Trüffel', 4);

INSERT INTO getraenk (id, name, preis)
VALUES (NULL, 'Wasser', 1.5),
       (NULL, 'Bier', 2);

INSERT INTO pizza_topping (pizzaId, toppingId, anzahl)
VALUES (1, 1, 1),
       (1, 2, 1),
       (2, 1, 1),
       (2, 3, 2),
       (3, 1, 1);

INSERT INTO getraenk_lieferung (lieferungId, getraenkId, anzahl)
VALUES (1, 1, 1),
       (2, 2, 1);

ALTER TABLE lieferung
    ADD FOREIGN KEY (kundeId) REFERENCES kunde (id);

ALTER TABLE pizza
    ADD FOREIGN KEY (pizzaBasisId) REFERENCES pizzaBasis (id),
    ADD FOREIGN KEY (lieferungId) REFERENCES lieferung (id);

ALTER TABLE pizza_topping
    ADD FOREIGN KEY (toppingId) REFERENCES topping (id),
    ADD FOREIGN KEY (pizzaId) REFERENCES pizza (id);

ALTER TABLE getraenk_lieferung
    ADD FOREIGN KEY (getraenkId) REFERENCES getraenk (id),
    ADD FOREIGN KEY (lieferungId) REFERENCES lieferung (id);

ALTER TABLE pizza_topping
    ADD PRIMARY KEY (pizzaId, toppingId);

ALTER TABLE getraenk_lieferung
    ADD PRIMARY KEY (getraenkId, lieferungId);

CREATE VIEW v_lieferungskosten AS
SELECT SUM(anzahl * preis) Gesamtkosten
FROM lieferung l
         JOIN getraenk_lieferung gl ON l.id = lieferungId
         JOIN getraenk g ON g.id = getraenkId
WHERE l.id = 1
UNION
SELECT SUM(pt.anzahl * t.preis) Toppingpreis
FROM lieferung l
         JOIN pizza p ON lieferungId = l.id
         JOIN pizzaBasis pb ON pizzaBasisId = pb.id
         JOIN pizza_topping pt ON pizzaId = p.id
         JOIN topping t ON t.id = toppingId
WHERE l.id = 1
UNION
SELECT SUM(preis) Pizzagrundpreis
FROM lieferung l
         JOIN pizza p ON l.id = lieferungId
         JOIN pizzaBasis pb ON pizzaBasisId = pb.id
WHERE l.id = 1;

SELECT SUM(Gesamtkosten) Total
FROM v_lieferungskosten;

SELECT (SUM(pt.anzahl * t.preis) + SUM(DISTINCT pb.preis) + SUM(DISTINCT g.preis * gl.anzahl)) Total
FROM lieferung l
         JOIN pizza p ON p.lieferungId = l.id
         JOIN pizzaBasis pb ON pizzaBasisId = pb.id
         JOIN pizza_topping pt ON pizzaId = p.id
         JOIN topping t ON t.id = toppingId
         JOIN getraenk_lieferung gl ON l.id = gl.lieferungId
         JOIN getraenk g ON g.id = getraenkId
WHERE l.id = 1;
