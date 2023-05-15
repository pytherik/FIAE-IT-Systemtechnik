DROP DATABASE IF EXISTS flipchart;
CREATE DATABASE flipchart;
use flipchart;

CREATE TABLE lerner
(
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(50),
       dozent_id INT
);

CREATE TABLE dozent
(
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(50)
);

CREATE TABLE spiel
(
       id INT AUTO_INCREMENT PRIMARY KEY,
       lerner_id INT,
       anzahl_fragen INT,
       richtig_count INT,
       datum DATETIME
);

CREATE TABLE spiel_frage
(
       id INT AUTO_INCREMENT PRIMARY KEY,
       spiel_id INT,
       frage_id INT,
       is_right BOOL
);

CREATE TABLE frage
(
       id       INT AUTO_INCREMENT PRIMARY KEY,
       question VARCHAR(150),
       thema_id INT
);

CREATE TABLE thema
(
       id      INT AUTO_INCREMENT PRIMARY KEY,
       subject VARCHAR(50)
);

CREATE TABLE antwort
(
       id     INT PRIMARY KEY,
       answer VARCHAR(150)
);

CREATE TABLE frage_antwort
(
       id         INT AUTO_INCREMENT PRIMARY KEY,
       frage_id   INT,
       antwort_id INT,
       is_right   BOOL
);


INSERT INTO dozent VALUES
                          (NULL, 'Dr. Hallervorden'),
                          (NULL, 'Prof. Feinbein'),
                          (NULL, 'Dr. von Bödefeld');

INSERT INTO lerner VALUES
                          (NULL, 'Hansi', 1),
                          (NULL, 'Bibo', 1),
                          (NULL, 'Grobi', 2),
                          (NULL, 'Tiffy', 2),
                          (NULL, 'Samson', 3);

INSERT INTO spiel VALUES
       (NULL, 1, 10, 3, '2023-05-13 12:00');

INSERT INTO spiel_frage VALUES
                               (NULL, 1, 7, 1),
                               (NULL, 1, 3, 0),
                               (NULL, 1, 21, 0),
                               (NULL, 1, 14, 1),
                               (NULL, 1, 24, 0),
                               (NULL, 1, 11, 1),
                               (NULL, 1, 5, 0),
                               (NULL, 1, 16, 0),
                               (NULL, 1, 4, 0),
                               (NULL, 1, 22, 0);

INSERT INTO thema
VALUES (1, 'Musik'),
       (2, 'Computer'),
       (3, 'Literatur'),
       (4, 'Erdkunde'),
       (5, 'Kino'),
       (6, 'Natur');

INSERT INTO frage
VALUES (1, 'Wer war der Sänger von Queen?', 1),
       (2, 'Welches Instrument spielt Jimi Hendrix?', 1),
       (3, 'Wer ist der Komponist der "Jupiter"-Symphonie?', 1),
       (4, 'In welchem Jahrzehnt wurden die Beatles gegründet?', 1),
       (5, 'Welches Rockfestival wurde 1970 zum "größten Festival aller Zeiten"?', 1),

       (6, 'Was bedeutet das Akronym "CPU"?', 2),
       (7, 'Was sind Mojave, Big Sur und High Sierra?', 2),
       (8, 'Welches Unternehmen ist der größte Hersteller von PC-Mikroprozessoren?', 2),
       (9, 'Wer ist der Erfinder des World Wide Web?', 2),
       (10, 'Was bedeutet das Akronym "HTML"?', 2),

       (11, 'Wie heißt der berühmteste Roman von Franz Kafka?', 3),
       (12, 'Wer ist der Autor des Romans "Der Fänger im Roggen"?', 3),
       (13, 'Welcher Schriftsteller hat die Figur des "Sherlock Holmes" erfunden?', 3),
       (14, 'Wer ist der Autor des Romans "1985"?', 3),
       (15, 'Wer ist der Autor des Romans "Der Steppenwolf"?', 3),

       (16, 'Welcher Kontinent hat die meisten Länder?', 4),
       (17, 'Wie heißt der größte See der Welt?', 4),
       (18, 'In welchem Land befindet sich der Ayers Rock?', 4),
       (19, 'Wie heißt die Hauptstadt von Spanien?', 4),
       (20, 'Welche ist die größte Insel der Welt?', 4),

       (21, 'Wer spielt die weibliche Hauptrolle in der "Harry Potter"-Filmreihe?', 5),
       (22, 'Wie heißt der Schauspieler, der in "Zurück in die Zukunft" die Hauptrolle spielt?', 5),
       (23, 'In welchem Jahr wurde der erste James-Bond-Film veröffentlicht?', 5),
       (24, 'Wer spielte die Hauptrolle in dem Film "Forrest Gump"?', 5),
       (25, 'In welchem Jahr wurde der Film "Der Club der toten Dichter" veröffentlicht?', 5),

       (26, 'Was ist der größte Planet in unserem Sonnensystem?', 6),
       (27, 'Welcher ist der längste Fluss der Welt?', 6),
       (28, 'Wie nennt man das längste Gebirge der Welt?', 6),
       (29, 'Was ist das schnellste Landtier?', 6),
       (30, 'Wie heißt das größte Korallenriff der Welt?', 6);

INSERT INTO antwort VALUES

                           (11, 'Freddy Mercury'), #info Musik
                           (12, 'Bryan May'),
                           (13, 'Roger Waters'),
                           (14, 'Elton John'),
                           (21, 'Er spielt E-Gitarre'),
                           (22, 'Er singt'),
                           (23, 'Er spielt E-Bass'),
                           (24, 'Er spielt Drums'),
                           (31, 'Wolfgang Amadeus Mozart'),
                           (32, 'Johann Strauss'),
                           (33, 'Ludwig van Beethoven'),
                           (34, 'John Williams'),
                           (41, '60er Jahre'),
                           (42, '50er Jahre'),
                           (43, '70er Jahre'),
                           (44, '80er Jahre'),
                           (51, 'Woodstock'),
                           (52, 'Monterey'),
                           (53, 'Bizarre'),
                           (54, 'Rudstock'),

                           (61, 'Central Processing Unit'), #info Computer
                           (62, 'Central Progressing Unifier'),
                           (63, 'Crazy Pandas Ugly '),
                           (64, 'Cloud Programming Utility'),
                           (71, 'macOS Betriebssysteme'),
                           (72, 'Mittelamerikanische Wüsten'),
                           (73, 'Mexikanische Branntweine'),
                           (74, 'Tesla Auto Modelle'),
                           (81, 'Intel'),
                           (82, 'Sun Microsystems'),
                           (83, 'AMD'),
                           (84, 'Robotron'),
                           (91, 'Tim Berners-Lee'),
                           (92, 'Bill Gates'),
                           (93, 'Steve Jobs'),
                           (94, 'Alan Turing'),
                           (101, 'Hyper Text Markup Language'),
                           (102, 'Highly Transformable Mobile Layout'),
                           (103, 'Hyperactive Trouble Managing Library'),
                           (104, 'Half Time Mambo Loop'),

                           (111, 'Der Prozess'), #info Literatur
                           (112, 'Der Käfer'),
                           (113, 'Die Firma'),
                           (114, 'Also sprach Zaratustra'),
                           (121, 'J.D. Salinger'),
                           (122, 'John Irving'),
                           (123, 'Sylvia Plath'),
                           (124, 'Henry Miller'),
                           (131, 'Sir Arthur Conan Doyle'),
                           (132, 'Edgar Allen Poe'),
                           (133, 'William Shakespear'),
                           (134, 'Mary Shelley'),
                           (141, 'Georges Orwell'),
                           (142, 'Aldous Huxley'),
                           (143, 'Stanislaw Lem'),
                           (144, 'George Lukas'),
                           (151, 'Hermann Hesse'),
                           (152, 'Stefan Zweig'),
                           (153, 'Michel Houellebecq'),
                           (154, 'Elfriede Jelinek'),

                           (161, 'Afrika'), #info Erdkunde
                           (162, 'Asien'),
                           (163, 'Europa'),
                           (164, 'Amerika'),
                           (171, 'Kaspische See'),
                           (172, 'Baikalsee'),
                           (173, 'Viktoriasee'),
                           (174, 'Ostsee'),
                           (181, 'Australien'),
                           (182, 'Mexiko'),
                           (183, 'Schottland'),
                           (184, 'Pakistan'),
                           (191, 'Madrid'),
                           (192, 'Mailand'),
                           (193, 'Barcelona'),
                           (194, 'Mallorca'),
                           (201, 'Grönland'),
                           (202, 'Großbritannien'),
                           (203, 'Antarktis'),
                           (204, 'Imchen'),

                           (211, 'Emma Watson'), #info Kino
                           (212, 'Emma Stone'),
                           (213, 'Jennifer Lawrence'),
                           (214, 'Sarah Jessica Parker'),
                           (221, 'Michael J. Fox'),
                           (222, 'Robert Downey Jr.'),
                           (223, 'Brad Pitt'),
                           (224, 'Leonardo di Caprio'),
                           (231, '1962'),
                           (232, '1968'),
                           (233, '1957'),
                           (234, '1971'),
                           (241, 'Dustin Hoffmann'),
                           (242, 'Tom Hanks'),
                           (243, 'Johnny Depp'),
                           (244, 'Robert Redford'),
                           (251, '1989'),
                           (252, '1984'),
                           (253, '1995'),
                           (254, '2001'),

                           (261, 'Jupiter'), #info Natur
                           (262, 'Saturn'),
                           (263, 'Uranus'),
                           (264, 'Sonne'),
                           (271, 'Nil'),
                           (272, 'Amazonas'),
                           (273, 'Wolga'),
                           (274, 'Jangtse'),
                           (281, 'Anden'),
                           (282, 'Rocky Mountains'),
                           (283, 'Ural'),
                           (284, 'Alpen'),
                           (291, 'Gepard'),
                           (292, 'Antilope'),
                           (293, 'Leopard'),
                           (294, 'Gazelle'),
                           (301, 'Great Barrier Reef'),
                           (302, 'Red Sea Coral Reef'),
                           (303, 'Coral Triangle Reef'),
                           (304, 'Monster Superior Reef');

INSERT INTO frage_antwort VALUES
                                 (1, 1, 11, 1),
                                 (2, 1, 12, 0),
                                 (3, 1, 13, 0),
                                 (4, 1, 14, 0),
                                 (5, 2, 21, 1),
                                 (6, 2, 22, 0),
                                 (7, 2, 23, 0),
                                 (8, 2, 24, 0),
                                 (9, 3, 31, 1),
                                 (10, 3, 32, 0),
                                 (11, 3, 33, 0),
                                 (12, 3, 34, 0),
                                 (13, 4, 41, 1),
                                 (14, 4, 42, 0),
                                 (15, 4, 43, 0),
                                 (16, 4, 44, 0),
                                 (17, 5, 51, 1),
                                 (18, 5, 52, 0),
                                 (19, 5, 53, 0),
                                 (20, 5, 54, 0),
                                 (21, 6, 61, 1),
                                 (22, 6, 62, 0),
                                 (23, 6, 63, 0),
                                 (24, 6, 64, 0),
                                 (25, 7, 71, 1),
                                 (26, 7, 72, 0),
                                 (27, 7, 73, 0),
                                 (28, 7, 74, 0),
                                 (29, 8, 81, 1),
                                 (30, 8, 82, 0),
                                 (31, 8, 83, 0),
                                 (32, 8, 84, 0),
                                 (33, 9, 91, 1),
                                 (34, 9, 92, 0),
                                 (35, 9, 93, 0),
                                 (36, 9, 94, 0),
                                 (37, 10, 101, 1),
                                 (38, 10, 102, 0),
                                 (39, 10, 103, 0),
                                 (40, 10, 104, 0),
                                 (41, 11, 111, 1),
                                 (42, 11, 112, 0),
                                 (43, 11, 113, 0),
                                 (44, 11, 114, 0),
                                 (45, 12, 121, 1),
                                 (46, 12, 122, 0),
                                 (47, 12, 123, 0),
                                 (48, 12, 124, 0),
                                 (49, 13, 131, 1),
                                 (50, 13, 132, 0),
                                 (51, 13, 133, 0),
                                 (52, 13, 134, 0),
                                 (53, 14, 141, 1),
                                 (54, 14, 142, 0),
                                 (55, 14, 143, 0),
                                 (56, 14, 144, 0),
                                 (57, 15, 151, 1),
                                 (58, 15, 152, 0),
                                 (59, 15, 153, 0),
                                 (60, 15, 154, 0),
                                 (61, 16, 161, 1),
                                 (62, 16, 162, 0),
                                 (63, 16, 163, 0),
                                 (64, 16, 164, 0),
                                 (65, 17, 171, 1),
                                 (66, 17, 172, 0),
                                 (67, 17, 173, 0),
                                 (68, 17, 174, 0),
                                 (69, 18, 181, 1),
                                 (70, 18, 182, 0),
                                 (71, 18, 183, 0),
                                 (72, 18, 184, 0),
                                 (73, 19, 191, 1),
                                 (74, 19, 192, 0),
                                 (75, 19, 193, 0),
                                 (76, 19, 194, 0),
                                 (77, 20, 201, 1),
                                 (78, 20, 202, 0),
                                 (79, 20, 203, 0),
                                 (80, 20, 204, 0),
                                 (81, 21, 211, 1),
                                 (82, 21, 212, 0),
                                 (83, 21, 213, 0),
                                 (84, 21, 214, 0),
                                 (85, 22, 221, 1),
                                 (86, 22, 222, 0),
                                 (87, 22, 223, 0),
                                 (88, 22, 224, 0),
                                 (89, 23, 231, 1),
                                 (90, 23, 232, 0),
                                 (91, 23, 233, 0),
                                 (92, 23, 234, 0),
                                 (93, 24, 241, 1),
                                 (94, 24, 242, 0),
                                 (95, 24, 243, 0),
                                 (96, 24, 244, 0),
                                 (97, 25, 251, 1),
                                 (98, 25, 252, 0),
                                 (99, 25, 253, 0),
                                 (100, 25, 254, 0),
                                 (101, 26, 261, 1),
                                 (102, 26, 262, 0),
                                 (103, 26, 263, 0),
                                 (104, 26, 264, 0),
                                 (105, 27, 271, 1),
                                 (106, 27, 272, 0),
                                 (107, 27, 273, 0),
                                 (108, 27, 274, 0),
                                 (109, 28, 281, 1),
                                 (110, 28, 282, 0),
                                 (111, 28, 283, 0),
                                 (112, 28, 284, 0),
                                 (113, 29, 291, 1),
                                 (114, 29, 292, 0),
                                 (115, 29, 293, 0),
                                 (116, 29, 294, 0),
                                 (117, 30, 301, 1),
                                 (118, 30, 302, 0),
                                 (119, 30, 303, 0),
                                 (120, 30, 304, 0);


ALTER TABLE lerner
       ADD FOREIGN KEY (dozent_id) REFERENCES dozent(id);

ALTER TABLE spiel
       ADD FOREIGN KEY (lerner_id) REFERENCES lerner(id);

ALTER TABLE spiel_frage
       ADD FOREIGN KEY (spiel_id) REFERENCES spiel(id),
       ADD FOREIGN KEY (frage_id) REFERENCES frage(id);

ALTER TABLE frage
       ADD FOREIGN KEY (thema_id) REFERENCES thema(id);

ALTER TABLE frage_antwort
       ADD FOREIGN KEY (frage_id) REFERENCES frage (id),
       ADD FOREIGN KEY (antwort_id) REFERENCES antwort (id);

SELECT question Frage, answer Antwort, is_right Richtig
FROM thema t
            JOIN frage f ON t.id = f.thema_id
            JOIN frage_antwort fa on f.id = fa.frage_id
            JOIN antwort a on a.id = fa.antwort_id
WHERE is_right = 1;

SELECT question, answer, is_right
FROM frage f
            JOIN frage_antwort fa on f.id = fa.frage_id
            JOIN antwort a on fa.antwort_id = a.id
WHERE f.id = 5;