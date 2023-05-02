DROP DATABASE IF EXISTS bustour;
CREATE DATABASE bustour;
USE bustour;

CREATE TABLE tour
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    kennzeichen VARCHAR(10),
    starttermin DATETIME,
    fahrer1Id   INT,
    fahrer2Id   INT
);

CREATE TABLE fahrer
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    vorname  VARCHAR(50),
    nachname VARCHAR(50)
);

CREATE TABLE fahrgast
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    vorname  VARCHAR(50),
    nachname VARCHAR(50)
);

INSERT INTO fahrer
VALUES (NULL, 'Rudi', 'Rasch'),
       (NULL, 'Luise', 'Lenker'),
       (NULL, 'Gabi', 'Gaslos'),
       (NULL, 'Kolja', 'Kurz'),
       (NULL, 'Peter', 'Panne'),
       (NULL, 'Stefan', 'Stau');

CREATE TABLE fahrgast_tour
(
    tourId     INT,
    fahrgastId INT
);


INSERT INTO tour
VALUES (NULL, 'B-BT 02', '2023-04-03 06:00', 2, 3),
       (NULL, 'B-BT 01', '2023-05-03 08:00', 1, 2),
       (NULL, 'B-BT 01', '2023-05-08 08:00', 4, 5);

ALTER TABLE fahrgast_tour
    ADD PRIMARY KEY (tourId, fahrgastId);
ALTER TABLE fahrgast_tour
    ADD FOREIGN KEY (tourId) REFERENCES tour (id);
ALTER TABLE fahrgast_tour
    ADD FOREIGN KEY (fahrgastId) REFERENCES fahrgast (id);

ALTER TABLE tour
ADD FOREIGN KEY (fahrer1Id) REFERENCES fahrer(id);
ALTER TABLE tour
ADD FOREIGN KEY (fahrer2Id) REFERENCES fahrer(id);

INSERT INTO fahrgast_tour
VALUES (1, 1),
       (1, 2),
       (2, 3),
       (2, 4),
       (3, 5),
       (3, 6);

CREATE TABLE fahrgast
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    vorname  VARCHAR(50),
    nachname VARCHAR(50),
    busId    INT
);

INSERT INTO fahrgast
VALUES (NULL, 'Hansi', 'Pampel'),
       (NULL, 'Donald', 'Falconer'),
       (NULL, 'Rakhi', 'Alekseev'),
       (NULL, 'Marjana', 'Möller'),
       (NULL, 'Iapetus', 'Maier'),
       (NULL, 'Kike', 'Krüger'),
       (NULL, 'Viktor', 'Krüger');

# Aufgabe: Erfasse Fahrgäste, Bus und Fahrer samt Bustour.
# Zu einer Bustour gehören 2 Fahrer, ein Starttermin, ein Bus und mehrere Fahrgäste.
# Fahrer haben Vor- und Nachnamen, Fahrgäste haben Vor- und Nachnamen, der Bus hat ein
# Kennzeichen.
# Abgefragt werden soll zu jedem Fahrgast, mit welchem Bus, welchen Fahrern und welchen
# Starttermin er gewählt hat.

SELECT concat(f1.vorname, ' ', f1.nachname) 'Fahrer 1',
       concat(f2.vorname, ' ', f2.nachname) 'Fahrer 2',
       concat(g.vorname, ' ', g.nachname) Fahrgast,
       t.kennzeichen, t.starttermin
FROM fahrgast g
    JOIN fahrgast_tour ft ON g.id=fahrgastId
    JOIN tour t ON t.id=tourId
    JOIN fahrer f1 ON fahrer1Id=f1.id
    JOIN fahrer f2 ON fahrer2Id=f2.id;
