# JOIN Übungen
DROP DATABASE IF EXISTS firma;
CREATE DATABASE firma;
USE firma;

CREATE TABLE mitarbeiter
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    vorname     VARCHAR(45),
    nachname    VARCHAR(45),
    abteilungId INT
);

CREATE TABLE abteilung
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);
ALTER TABLE mitarbeiter
    ADD COLUMN vorgesetzterId int;


INSERT INTO mitarbeiter
VALUES (NULL, 'Peter', 'Pampel', 1, NULL),
       (NULL, 'Ipek', 'Gonzales', 2, 1),
       (NULL, 'Freya', 'Schuhmacher', NULL, 1),
       (NULL, 'Hansi', 'Heise', 1, 2);

INSERT INTO abteilung
VALUES (NULL, 'Verkauf'),
       (NULL, 'Personal');

# Ziel ist alle Mitarbeiter mit ihren Abteilungen auszugeben

SELECT *
FROM mitarbeiter
         JOIN abteilung ON abteilungId = abteilung.id;

# Michael fehlt, da es bei ihm keine abteilungId gibt, also ist bei ihm
# abteilungId=abteilung.id nicht erfüllt.
# Abhilfe schafft LEFT

SELECT *
FROM abteilung
         RIGHT JOIN mitarbeiter ON abteilungId = abteilung.id;

# Wir erstellen eine neue Abteilung. Sie hat noch keinen Mitarbeiter
INSERT INTO abteilung
VALUES (NULL, 'Marketing');

# Ausgabe soll sein alle Mitarbeiter und alle Abteilungen und
# wer zu welcher Abteilung gehört

# OUTER JOIN mit MySQL simulieren

(SELECT vorname, nachname, name
 FROM mitarbeiter
          RIGHT JOIN abteilung ON abteilungId = abteilung.id)
UNION
(SELECT vorname, nachname, 'keine Abteilung'
 FROM mitarbeiter
 WHERE abteilungId IS NULL);

# was passiert bei JOINS ohne Bedingung - auch CROSS JOIN genannt

SELECT *
FROM mitarbeiter
         JOIN abteilung;

# NATURAL JOIN verbindet Tabellen aufgrund von gleichen Spaltennamen
DROP TABLE IF EXISTS abteilung2;
CREATE TABLE abteilung2
(
    abteilungId INT,
    name        VARCHAR(50)
) AS (SELECT *
      FROM abteilung);

SELECT abteilungId
FROM abteilung2;
UPDATE abteilung2
SET abteilungId=id;
SELECT abteilungId
FROM abteilung2;

SELECT *
FROM abteilung2
         NATURAL JOIN mitarbeiter;


# abteilungId kommt in beiden Tabellen vor
SELECT *
from abteilung2
         NATURAL JOIN mitarbeiter;


# Aufgabe: gib den direkten Vorgesetzten von Ipek aus.
SELECT vorname, nachname
FROM mitarbeiter
WHERE id = (SELECT vorgesetzterId
            FROM mitarbeiter
            WHERE vorname = 'Ipek');

# Aufgabe: gib die direkten Untergebenen von Peter aus
SELECT vorname, nachname
FROM mitarbeiter
WHERE vorgesetzterId = (SELECT id
                        FROM mitarbeiter
                        WHERE vorname = 'Peter');
# Gib alle Mitarbeiter mit ihren direkten Vorgesetzten aus
# Tipp benutze 2 verschiedene Aliase für die Tabelle mitarbeiter


SELECT v.vorname 'Chef Vorname', v.nachname 'Chef Nachname', m.vorname 'MA Vorname', m.nachname 'MA Nachname'
FROM mitarbeiter m
         JOIN mitarbeiter v
WHERE m.vorgesetzterId = v.id;

SELECT concat(m.vorname, ' ', m.nachname) 'Mitarbeiter', concat(v.vorname, ' ', v.nachname) Chef
FROM mitarbeiter m
         LEFT JOIN mitarbeiter v
                   ON m.vorgesetzterId = v.id;

