DROP DATABASE IF EXISTS schulsystem;
CREATE DATABASE schulsystem;
use schulsystem;

CREATE TABLE bildungstraeger
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

CREATE TABLE schule
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    bildungstraeger_id INT
);

CREATE TABLE schulklasse
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    schule_id INT
);

CREATE TABLE schueler
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    vorname VARCHAR(50),
    nachname VARCHAR(50),
    schulklasse_id INT
);


INSERT INTO bildungstraeger VALUES
                                (NULL, 'BBQ'),
                                (NULL, 'Senat');

INSERT INTO schule VALUES
                       (NULL, 'Berlin', 1),
                       (NULL, 'Köln', 1),
                       (NULL, 'Gymnasium', 2),
                       (NULL, 'Hauptschule',2);

INSERT INTO schulklasse VALUES
                            (NULL, 'VFA', 1),
                            (NULL, 'FIAE', 1),
                            (NULL, 'FISI',2),
                            (NULL, 'DP', 2),
                            (NULL, '10a', 3),
                            (NULL, '11a', 3),
                            (NULL, '8b', 4),
                            (NULL, '9b', 4);

INSERT INTO schueler VALUES
                         (NULL, 'Norwin', 'Hegemann',1),
                         (NULL, 'Uranus', 'Hofstetter',1),
                         (NULL, 'Vilhelm', 'Puls',2),
                         (NULL, 'Juri', 'Neuhaus',2),
                         (NULL, 'Lena', 'Clemens',3),
                         (NULL, 'Kaui', 'Dahlmann',3),
                         (NULL, 'Sascha', 'Bracht',4),
                         (NULL, 'Steven', 'Nielsen',4),
                         (NULL, 'Erasmus', 'Fütterer',5),
                         (NULL, 'Ronny', 'Lampe',5),
                         (NULL, 'Maile', 'Ruf',6),
                         (NULL, 'Tamila', 'Siegert',6),
                         (NULL, 'Ubon', 'Meißner',7),
                         (NULL, 'Aleha', 'Lohse',7),
                         (NULL, 'Zaid', 'Keitel',8),
                         (NULL, 'Dag', 'Dohmen',8);

ALTER TABLE schule
    ADD FOREIGN KEY (bildungstraeger_id) REFERENCES bildungstraeger(id);
ALTER TABLE schulklasse
    ADD FOREIGN KEY (schule_id) REFERENCES schule(id);
ALTER TABLE schueler
    ADD FOREIGN KEY (schulklasse_id) REFERENCES schulklasse(id);
