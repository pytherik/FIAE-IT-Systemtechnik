SHOW DATABASES;
DROP DATABASE IF EXISTS knolle;
CREATE DATABASE knolle;
USE knolle;

CREATE TABLE mitarbeiter
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    vorname  VARCHAR(45),
    nachname VARCHAR(45)
);

CREATE TABLE auto
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    kennzeichen VARCHAR(15),
    leistung    INT
);

CREATE TABLE ausleihe
(
    mitarbeiterId INT,
    autoId        INT,
    von           DATETIME,
    bis           DATETIME
);

SHOW TABLES;
DESCRIBE mitarbeiter; # oder anderen Tabellennamen

ALTER TABLE ausleihe
    ADD PRIMARY KEY (mitarbeiterId, autoId);
ALTER TABLE ausleihe
    ADD FOREIGN KEY (mitarbeiterId) REFERENCES mitarbeiter (id);
ALTER TABLE ausleihe
    ADD FOREIGN KEY (autoId) REFERENCES auto (id);

INSERT INTO mitarbeiter
VALUES (NULL, 'Hansi', 'Pampel'),
       (NULL, 'Speedy', 'Gonzales'),
       (NULL, 'Michael', 'Schuhmacher');

INSERT INTO auto
VALUES (NULL, 'B-EB 2906', 500),
       (NULL, 'B-LU 1532', 20);

INSERT INTO ausleihe
VALUES (1, 2, '2023-04-26 10:00', '2023-04-26 18:00'),
       (2, 1, '2023-01-02 7:13', '2023-04-18 4:32'),
       (3, 2, '2023-04-26 18:03', '2023-04-26 19:45'),
       (2, 2, '2023-04-27 5:25', '2023-04-27 10:00');

# Vorgehensweise bei SELECT Abfragen:
# 1. In welchen Tabellen stehen die benötigten Infos?
# 2. Welche Verbindung (Tabellen dazwischen) gibt es?
# 3. Frage die herausgefundenen Tabellen (2. + 3.) ab, und
# 4. schreibe die PK-FK Bedingungen in die WHERE clause.

# Abfrage mit kommaseparierten Tabellen
# Eindeutige Spalten in einer Abfrage bedürfen keiner zusätzlichen Tabellenangabe
# (mitarbeiter.vorname ~ vorname). Für mehrfach vorhandene Spalten empfiehlt sich ein Alias
# AS wird nicht benötigt um ein alias zu kennzeichnen.

# SELECT vorname Vorname, nachname Nachname, kennzeichen Kennzeichen, von, bis
# FROM mitarbeiter m, ausleihe, auto a
# WHERE m.id=mitarbeiterId
# AND a.id=autoId
# AND a.kennzeichen='B-LU 1532'
# AND '2023-04-26 18:33' BETWEEN von AND bis;

SELECT vorname Vorname, nachname Nachname, kennzeichen Kennzeichen, von, bis
FROM mitarbeiter m
         JOIN ausleihe ON m.id = mitarbeiterId
         JOIN auto a ON a.id = autoId
WHERE a.kennzeichen = 'B-LU 1532'
  AND '2023-04-26 18:33' BETWEEN von AND bis;

# Knolle betrifft Kennzeichen B-LU 1532, 2023-04-26 18:33

# Die Firmenleitung möchte wissen, welche Mitabrbeiter sich Autos ausleihen
# (mit Zeitraum) und welche Mitarbeiter sich kein Auto ausleihen

# Mitarbeiter hinzufügen der sich noch kein Auto geliehen hat
# mitarbeiterId = 4;
INSERT INTO mitarbeiter VALUES (NULL, 'Gitta', 'Gans');

SELECT m.vorname, m.nachname, von, bis
FROM mitarbeiter m
         JOIN ausleihe on m.id = mitarbeiterId
         JOIN auto a on a.id = autoId;

# Gitta fehlt, wir müssen einen doppelten LEFT JOIN verwenden

SELECT m.vorname, m.nachname, von, bis
FROM mitarbeiter m
         LEFT JOIN ausleihe on m.id = mitarbeiterId
         LEFT JOIN auto a on a.id = autoId;

