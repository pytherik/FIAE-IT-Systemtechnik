DROP DATABASE IF EXISTS flipchart;
CREATE DATABASE flipchart;
use flipchart;

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
    id     INT AUTO_INCREMENT PRIMARY KEY,
    answer VARCHAR(150)
);

CREATE TABLE frage_antwort
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    frage_id   INT,
    antwort_id INT,
    is_right   BOOL
);

INSERT INTO thema
VALUES (1, 'Musik'),
       (2, 'Computer'),
       (3, 'Literatur'),
       (4, 'Erdkunde'),
       (5, 'Kino'),
       (6, 'Natur');

INSERT INTO frage
VALUES (1, 'Wer war der Sänger von Queen?', 2),
       (2, 'Welches Instrument spielt Jimi Hendrix?', 2),
       (3, 'Wer ist der Komponist der "Jupiter"-Symphonie?', 2),
       (4, 'In welchem Jahrzehnt wurden die Beatles gegründet?', 2),
       (5, 'Welches Rockfestival wurde 1970 zum "größten Festival aller Zeiten"?', 2),

       (6, 'Was bedeutet das Akronym "CPU"?', 3),
       (7, 'Was sind Mojave, Big Sur und High Sierra?', 3),
       (8, 'Welches Unternehmen ist der größte Hersteller von PC-Mikroprozessoren?', 3),
       (9, 'Wer ist der Erfinder des World Wide Web?', 3),
       (10, 'Was bedeutet das Akronym "HTML"?', 3),

       (11, 'Wie heißt der berühmteste Roman von Franz Kafka?', 4),
       (12, 'Wer ist der Autor des Romans "Der Fänger im Roggen"?', 4),
       (13, 'Welcher Schriftsteller hat die Figur des "Sherlock Holmes" erfunden?', 4),
       (14, 'Wer ist der Autor des Romans "1985"?', 4),
       (15, 'Wer ist der Autor des Romans "Der Steppenwolf"?', 4),

       (16, 'Welcher Kontinent hat die meisten Länder?', 5),
       (17, 'Wie heißt der größte See der Welt?', 5),
       (18, 'In welchem Land befindet sich der Ayers Rock?', 5),
       (19, 'Wie heißt die Hauptstadt von Spanien?', 5),
       (20, 'Welche ist die größte Insel der Welt?', 5),

       (21, 'Wer spielt die weibliche Hauptrolle in der "Harry Potter"-Filmreihe?', 6),
       (22, 'Wie heißt der Schauspieler, der in "Zurück in die Zukunft" die Hauptrolle spielt?', 6),
       (23, 'In welchem Jahr wurde der erste James-Bond-Film veröffentlicht?', 6),
       (24, 'Wer spielte die Hauptrolle in dem Film "Forrest Gump"?', 6),
       (25, 'In welchem Jahr wurde der Film "Der Club der toten Dichter" veröffentlicht?', 6),

       (26, 'Was ist der größte Planet in unserem Sonnensystem?', 7),
       (27, 'Welcher ist der längste Fluss der Welt?', 7),
       (28, 'Wie nennt man das längste Gebirge der Welt?', 7),
       (29, 'Was ist das schnellste Landtier?', 7),
       (30, 'Wie heißt das größte Korallenriff der Welt?', 7);

INSERT INTO antwort
VALUES (1, 'Freddy Mercury'),
       (2, 'E-Gitarre'),
       (3, 'Wolfgang Amadeus Mozart'),
       (4, '60er Jahre'),
       (5, 'Woodstock'),

       (6, 'Central Processing Unit'),
       (7, 'macOS Betriebssysteme'),
       (8, 'Intel'),
       (9, 'Tim Berners-Lee'),
       (10, 'Hyper Text Markup Language'),

       (11, 'Der Prozess'),
       (12, 'J.D. Salinger'),
       (13, 'Sir Arthur Conan Doyle'),
       (14, 'Georges Orwell'),
       (15, 'Hermann Hesse'),

       (16, 'Afrika'),
       (17, 'Kaspische See'),
       (18, 'Australien'),
       (19, 'Madrid'),
       (20, 'Grönland'),

       (21, 'Emma Watson'),
       (22, 'Michael J. Fox'),
       (23, '1962'),
       (24, 'Dustin Hoffmann'),
       (25, '1989'),

       (26, 'Jupiter'),
       (27, 'Nil'),
       (28, 'Anden'),
       (29, 'Gepard'),
       (30, 'Great Barrier Reef');

INSERT INTO frage_antwort
VALUES (1, 1, 1, 1),
       (2, 2, 2, 1),
       (3, 3, 3, 1),
       (4, 4, 4, 1),
       (5, 5, 5, 1),
       (6, 6, 6, 1),
       (7, 7, 7, 1),
       (8, 8, 8, 1),
       (9, 9, 9, 1),
       (10, 10, 10, 1),
       (11, 11, 11, 1),
       (12, 12, 12, 1),
       (13, 13, 13, 1),
       (14, 14, 14, 1),
       (15, 15, 15, 1),
       (16, 16, 16, 1),
       (17, 17, 17, 1),
       (18, 18, 18, 1),
       (19, 19, 19, 1),
       (20, 20, 20, 1),
       (21, 21, 21, 1),
       (22, 22, 22, 1),
       (23, 23, 23, 1),
       (24, 24, 24, 1),
       (25, 25, 25, 1),
       (26, 26, 26, 1),
       (27, 27, 27, 1),
       (28, 28, 28, 1),
       (29, 29, 29, 1),
       (30, 30, 30, 1),
       (31, 1, 3, 0),
       (32, 2, 4, 0),
       (33, 3, 5, 0),
       (34, 4, 6, 0),
       (35, 5, 7, 0),
       (36, 6, 8, 0),
       (37, 7, 9, 0),
       (38, 8, 10, 0),
       (39, 9, 11, 0),
       (40, 10, 12, 0),
       (41, 11, 13, 0),
       (42, 12, 14, 0),
       (43, 13, 15, 0),
       (44, 14, 16, 0),
       (45, 15, 17, 0),
       (46, 16, 18, 0),
       (47, 17, 19, 0),
       (48, 18, 20, 0),
       (49, 19, 21, 0),
       (50, 20, 17, 0),
       (51, 21, 18, 0),
       (52, 22, 19, 0),
       (53, 23, 20, 0),
       (54, 24, 21, 0),
       (55, 25, 22, 0),
       (56, 26, 23, 0),
       (57, 27, 24, 0),
       (58, 28, 25, 0),
       (59, 29, 26, 0),
       (60, 30, 30, 0),
       (61, 1, 12, 0),
       (62, 2, 13, 0),
       (63, 3, 14, 0),
       (64, 4, 15, 0),
       (65, 5, 16, 0),
       (66, 6, 17, 0),
       (67, 7, 18, 0),
       (68, 8, 19, 0),
       (69, 9, 20, 0),
       (70, 10, 21, 0),
       (71, 11, 22, 0),
       (72, 12, 23, 0),
       (73, 13, 24, 0),
       (74, 14, 25, 0),
       (75, 15, 26, 0),
       (76, 16, 27, 0),
       (77, 17, 28, 0),
       (78, 18, 29, 0),
       (79, 19, 30, 0),
       (80, 20, 31, 0),
       (81, 21, 1, 0),
       (82, 22, 2, 0),
       (83, 23, 3, 0),
       (84, 24, 4, 0),
       (85, 25, 5, 0),
       (86, 26, 6, 0),
       (87, 27, 7, 0),
       (88, 28, 8, 0),
       (89, 29, 9, 0),
       (90, 30, 1, 0),
       (91, 1, 2, 0),
       (92, 2, 3, 0),
       (93, 3, 4, 0),
       (94, 4, 5, 0),
       (95, 5, 6, 0),
       (96, 6, 7, 0),
       (97, 7, 8, 0),
       (98, 8, 9, 0),
       (99, 9, 10, 0),
       (100, 10, 11, 0),
       (101, 11, 12, 0),
       (102, 12, 13, 0),
       (103, 13, 14, 0),
       (104, 14, 15, 0),
       (105, 15, 6, 0),
       (106, 16, 7, 0),
       (107, 17, 8, 0),
       (108, 18, 9, 0),
       (109, 19, 10, 0),
       (110, 20, 11, 0),
       (111, 21, 12, 0),
       (112, 22, 13, 0),
       (113, 23, 14, 0),
       (114, 24, 15, 0),
       (115, 25, 16, 0),
       (116, 26, 17, 0),
       (117, 27, 18, 0),
       (118, 28, 19, 0),
       (119, 29, 20, 0),
       (120, 30, 21, 0);

ALTER TABLE frage
    ADD FOREIGN KEY (thema_id) REFERENCES thema(id);

ALTER TABLE frage_antwort
    ADD FOREIGN KEY (frage_id) REFERENCES frage (id),
    ADD FOREIGN KEY (antwort_id) REFERENCES antwort (id);
