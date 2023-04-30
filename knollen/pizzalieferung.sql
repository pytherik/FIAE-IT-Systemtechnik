DROP DATABASE IF EXISTS pizzalieferung;
CREATE DATABASE pizzalieferung;
use pizzalieferung;

CREATE TABLE kunde
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    vorname  VARCHAR(50),
    nachname VARCHAR(50),
    strNr    VARCHAR(150),
    plz      CHAR(5),
    ortId    INT
);

INSERT INTO kunde
VALUES (NULL, 'Isabella', 'Palm', 'Genovevastraße', '12555', 9),
       (NULL, 'Tadeo', 'Metzger', 'Weststraße', '12487', 8),
       (NULL, 'Laura', 'Lindner', 'Grenzstraße', '12487', 8),
       (NULL, 'Caspar', 'Meinert', 'Heckenweg', '12527', 15),
       (NULL, 'Tinke', 'Runge', 'Buntzelstraße', '12526', 5),
       (NULL, 'Vally', 'Bünger', 'Sebaldweg', '12524', 3),
       (NULL, 'Gian', 'Scheer', 'Am Bauernwäldchen', '12559', 10),
       (NULL, 'Rufina', 'Reinke', 'Finkenweg', '12589', 14),
       (NULL, 'Jeffry', 'Teubner', 'Hallgarter Steig', '12559', 10),
       (NULL, 'Yakup', 'Fink', 'Mühlenweg', '12589', 14);

CREATE TABLE ort
(
    id  INT AUTO_INCREMENT PRIMARY KEY,
    ort VARCHAR(100)
);

INSERT INTO ort
VALUES (NULL, 'Adlershof'),
       (NULL, 'Alt-Treptow'),
       (NULL, 'Altglienicke'),
       (NULL, 'Baumschulenweg'),
       (NULL, 'Bohnsdorf'),
       (NULL, 'Friedrichshagen'),
       (NULL, 'Grünau'),
       (NULL, 'Johannisthal'),
       (NULL, 'Köpenick'),
       (NULL, 'Müggelheim'),
       (NULL, 'Niederschöneweide'),
       (NULL, 'Oberschöneweide'),
       (NULL, 'Plänterwald'),
       (NULL, 'Rahnsdorf'),
       (NULL, 'Schmöckwitz'),
       (NULL, 'Späthsfelde'),
       (NULL, 'Treptow'),
       (NULL, 'Wilhelmshagen');

CREATE TABLE pizza
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    sorteId INT
);

CREATE TABLE sorte
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    groesse VARCHAR(10),
    preis   FLOAT
);

INSERT INTO sorte
VALUES (NULL, 'klein', 4),
       (NULL, 'gross', 5);

INSERT INTO pizza
VALUES (NULL, 1);


CREATE TABLE toppings
(
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(50),
    preis FLOAT
);

INSERT INTO toppings
VALUES (NULL, 'Champignons', 1),
       (NULL, 'Salami', 1.5),
       (NULL, 'extra Käse', 1),
       (NULL, 'Trüffel', 4);

CREATE TABLE pizza_toppings
(
    pizza_Id    INT,
    toppings_Id INT
);

CREATE TABLE getraenke
(
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(50),
    preis FLOAT
);

INSERT INTO getraenke
VALUES (NULL, 'Wasser', 1.5),
       (NULL, 'Bier', 2);

CREATE TABLE bestellung
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    kundeId INT,
    uhrzeit DATETIME
);

INSERT INTO bestellung
VALUES (NULL, 6, '2023-04-29 11:00');


CREATE TABLE position
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    bestellungId INT,
    pizzaId      INT,
    getraenkeId  INT
);

INSERT INTO position
VALUES (NULL, 1, 1, 2);

INSERT INTO pizza_toppings
VALUES (1, 2),
       (1, 3),
       (1, 3);

ALTER TABLE kunde
    ADD FOREIGN KEY (ortId) REFERENCES ort (id);

ALTER TABLE pizza
    ADD FOREIGN KEY (sorteId) REFERENCES sorte (id);

ALTER TABLE pizza_toppings
    ADD FOREIGN KEY (pizza_Id) REFERENCES pizza (id);
ALTER TABLE pizza_toppings
    ADD FOREIGN KEY (toppings_Id) REFERENCES toppings (id);

ALTER TABLE bestellung
    ADD FOREIGN KEY (kundeId) REFERENCES kunde (id);

ALTER TABLE position
    ADD FOREIGN KEY (bestellungId) REFERENCES bestellung (id);
ALTER TABLE position
    ADD FOREIGN KEY (pizzaId) REFERENCES pizza (id);
ALTER TABLE position
    ADD FOREIGN KEY (getraenkeId) REFERENCES getraenke (id);


SELECT vorname,
       nachname,
       strNr,
       plz,
       ort,
       b.id   Bestellung,
       uhrzeit,
       pos.id Position,
       g.name,
       g.preis
FROM ort
         JOIN kunde ON ortId = ort.id
         JOIN bestellung b ON kundeId = kunde.id
         JOIN position pos ON bestellungId = b.id
         JOIN getraenke g ON getraenkeId = g.id
WHERE kunde.id = 1;


# SELECT vorname,
#        nachname,
#        strNr,
#        plz,
#        ort,
#        b.id   Bestellung,
#        uhrzeit,
#        pos.id Position,
#        g.name,
#        g.preis
# FROM ort
#          JOIN kunde ON ortId = ort.id
#          JOIN bestellung b ON kundeId = kunde.id
#          JOIN position pos ON bestellungId = b.id
#          JOIN getraenke g ON getraenkeId = g.id
# WHERE kunde.id = 1;
#
SELECT concat(vorname, ' ', nachname, ' ', strNr, ' ', plz, ' ', ort) Kunde,
       b.id                                                           Bestellung,
       uhrzeit,
       pos.id                                                         Position,
       s.groesse,
       s.preis,
       t.name,
       t.preis,
       g.name,
       g.preis,
       (SELECT SUM(t2.preis)
        FROM toppings t2
        JOIN pizza_toppings pt2 ON pt2.toppings_Id=t2.id
        WHERE pt2.pizza_Id=1) "Gesamt Toppings"

FROM ort
         JOIN kunde k ON ortId = ort.id
         JOIN bestellung b ON kundeId = k.id
         JOIN position pos ON bestellungId = b.id
         JOIN pizza p ON pizzaId = p.id
         JOIN sorte s ON sorteId = s.id
         JOIN pizza_toppings pt ON pt.pizza_Id = p.id
         JOIN toppings t on pt.toppings_Id = t.id
         JOIN getraenke g on getraenkeId = g.id
WHERE b.id = 1;

