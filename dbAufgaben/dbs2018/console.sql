drop database if exists dbs2018;
create database dbs2018;
use dbs2018;

/* 20 Kunden */

create table Kunde
(
    Kunde_ID int PRIMARY KEY auto_increment,
    Firma    varchar(255),
    Strasse  varchar(255),
    Plz      varchar(255),
    Ort      varchar(255)
);
INSERT INTO Kunde (Firma, Strasse, Plz, Ort)
VALUES
    ('Mustermann GmbH', 'Musterstraße 123', '12345', 'Musterstadt'),
    ('Musterfirma AG', 'Hauptweg 456', '54321', 'Stadtbeispiel'),
    ('Beispiel & Co. KG', 'Testweg 789', '98765', 'Probestadt'),
    ('Testunternehmen UG', 'Beispielallee 12', '45678', 'Testort'),
    ('Max Mustermann GmbH', 'Musterweg 42', '13579', 'Musterhausen'),
    ('Kundenfirma AG', 'Hauptstraße 567', '98765', 'Stadtbeispiel'),
    ('Testfirma UG', 'Testgasse 101', '54321', 'Probestadt'),
    ('Beispielfirma GmbH', 'Beispielweg 99', '12345', 'Testort'),
    ('Musterunternehmen KG', 'Musterplatz 1', '98765', 'Musterhausen'),
    ('Stadtbeispiel GmbH', 'Hauptallee 55', '54321', 'Stadtbeispiel');

INSERT INTO Kunde (Kunde_ID, Firma, Strasse, Plz, Ort) VALUES

    (11, 'Celestial Creations', 'Astral Avenue 20', '67890', 'Himmelsstadt'),
    (12, 'Enchanted Emporium', 'Magic Meadows 30', '11111', 'Zauberstadt'),
    (13, 'Whimsical Wonders', 'Enchantment Road 40', '22222', 'Wunderland'),
    (14, 'Enigma Euphoria', 'Enchanted Alley 50', '33333', 'Rätseldorf'),
    (15, 'Mythical Marvels', 'Myth Street 60', '44444', 'Sagenstadt'),
    (16, 'Wanderlust Treasures', 'Adventure Avenue 70', '55555', 'Abenteuerburg'),
    (17, 'Dreamscape Delights', 'Dreamy Drive 80', '66666', 'Traumstadt'),
    (18, 'Serendipity Empyrean', 'Serendipity Square 90', '77777', 'Glückshafen'),
    (19, 'Wonderland Whimsy', 'Wonderland Lane 100', '88888', 'Wunderlandia'),
    (20, 'Aurora Artistry', 'Stardust Street 120', '99999', 'Funkelstadt');








/* 10 Hersteller */

create table Hersteller
(
    Hersteller_ID int PRIMARY KEY auto_increment,
    Firma         varchar(255)

);

INSERT INTO Hersteller (Firma) VALUES
                                   ('Acme Electronics'),
                                   ('Techtronics Inc.'),
                                   ('Globe Motors'),
                                   ('PowerTech Solutions'),
                                   ('Apex Appliances'),
                                   ('Precision Tools Ltd.'),
                                   ('MicroTech Innovations'),
                                   ('AquaTech Systems'),
                                   ('GreenEnergy Solutions'),
                                   ('GlobalPharma Pharmaceuticals');

/* 30 Rechnungen */


create table Rechnung
(
    Rechnung_ID    int PRIMARY KEY auto_increment,
    Kunden_ID      int,
    RechnungsDatum date,
    FOREIGN KEY (Kunden_ID) REFERENCES Kunde (Kunde_ID)
);

INSERT INTO Rechnung (Kunden_ID, RechnungsDatum)
VALUES
    (8, '2023-01-05'),
    (15, '2023-01-08'),
    (2, '2023-01-12'),
    (19, '2023-02-03'),
    (10, '2023-02-10'),
    (12, '2023-02-15'),
    (5, '2023-03-02'),
    (3, '2023-03-07'),
    (16, '2023-03-12'),
    (4, '2023-04-01'),
    (11, '2023-04-08'),
    (1, '2023-04-13'),
    (6, '2023-05-02'),
    (17, '2023-05-10'),
    (9, '2023-05-15'),
    (7, '2023-06-03'),
    (20, '2023-06-09'),
    (13, '2023-06-14'),
    (14, '2023-07-01'),
    (18, '2023-07-07'),
    (10, '2023-08-01'),
    (5, '2023-08-06'),
    (11, '2023-08-12'),
    (12, '2023-09-03'),
    (20, '2023-09-08'),
    (16, '2023-09-15'),
    (8, '2023-10-02'),
    (7, '2023-10-09'),
    (1, '2023-10-15'),
    (19, '2023-11-01')
    ;

/* 40 Artikel */

create table Artikel
(
    Artikel_ID    int PRIMARY KEY auto_increment,
    Hersteller_ID int,
    Bezeichnung   varchar(255),
    Listenpreis   decimal(10,2),
    FOREIGN KEY (Hersteller_ID) REFERENCES Hersteller (Hersteller_ID)
);

INSERT INTO Artikel (Hersteller_ID, Bezeichnung, Listenpreis)

VALUES (1, 'Paracetamol 500mg', 5.99),
       (1, 'Cetirizin 10mg', 7.99),
       (1, 'Lisinopril 10mg', 6.49),
       (1, 'Ibuprofen 400mg', 4.49),
       (2, 'Aspirin 100mg', 3.99),
       (2, 'Esomeprazole 40mg', 9.99),
       (2, 'Metoprolol 50mg', 8.49),
       (2, 'Loratadin 10mg', 6.99),
       (3, 'Omeprazol 20mg', 8.99),
       (3, 'Hydrochlorothiazide 25mg', 7.99),
       (3, 'Atorvastatin 10mg', 6.49),
       (3, 'Diclofenac 50mg', 5.49),
       (4, 'Ranitidin 150mg', 7.99),
       (4, 'Fluticasone Propionate 50mcg', 9.99),
       (4, 'Tiotropium Bromide 18mcg', 8.49),
       (4, 'Metformin 500mg', 6.49),
       (5, 'Azithromycin 250mg', 9.99),
       (5, 'Venlafaxine 75mg', 7.99),
       (5, 'Escitalopram 10mg', 6.49),
       (5, 'Amoxicillin 500mg', 8.49),
       (6, 'Levocetirizine 5mg', 7.99),
       (6, 'Budesonide 100mcg', 6.49),
       (6, 'Paracetamol 1000mg', 5.99),
       (6, 'Acetaminophen 325mg', 4.49),
       (7, 'Citalopram 20mg', 9.99),
       (7, 'Rabeprazole 20mg', 8.49),
       (7, 'Ibuprofen 200mg', 3.99),
       (7, 'Loratadin 10mg', 6.99),
       (8, 'Sertraline 50mg', 7.99),
       (8, 'Montelukast 10mg', 6.49),
       (8, 'Omeprazol 20mg', 8.99),
       (8, 'Naproxen 250mg', 5.49),
       (9, 'Alendronate 70mg', 9.99),
       (9, 'Celecoxib 200mg', 8.49),
       (9, 'Ranitidin 150mg', 7.99),
       (9, 'Metformin 500mg', 6.49),
       (10, 'Simvastatin 20mg', 9.99),
       (10, 'Doxycycline 100mg', 7.99),
       (10, 'Cyclobenzaprine 10mg', 6.49),
       (10, 'Amlodipin 5mg', 8.49);

/* 50 Positionen */


create table `Position`
(
    Rechnung_ID int,
    Artikel_ID  int,
    Menge int,
    Verkaufs_Einzelpreis  decimal(10,2),

    FOREIGN KEY (Rechnung_ID) REFERENCES Rechnung (Rechnung_ID),
    FOREIGN KEY (Artikel_ID) REFERENCES Artikel (Artikel_ID)

);

INSERT INTO `Position` (Rechnung_ID, Artikel_ID, Menge, Verkaufs_Einzelpreis)
VALUES
    (1, 25, 6, 10.50),
    (2, 10, 9, 20.75),
    (3, 5, 2, 15.99),
    (4, 30, 5, 8.50),
    (5, 20, 79, 12.25),
    (6, 15, 89, 17.50),
    (7, 35, 33, 22.99),
    (8, 3, 60, 9.75),
    (9, 28, 7, 14.50),
    (10, 18, 2, 18.25),
    (11, 12, 1, 23.99),
    (12, 38, 5, 11.75),
    (13, 7, 6, 16.50),
    (14, 23, 54, 21.25),
    (15, 13, 1, 13.99),
    (16, 33, 5, 19.75),
    (17, 8, 9, 24.50),
    (18, 29, 65, 10.25),
    (19, 19, 76, 15.99),
    (20, 39, 23, 20.75),
    (21, 4, 94, 17.50),
    (22, 24, 98, 22.99),
    (23, 14, 3, 9.75),
    (24, 34, 2, 14.50),
    (25, 9, 37, 18.25),
    (26, 21, 83, 23.99),
    (27, 2, 56, 11.75),
    (28, 36, 31, 16.50),
    (29, 17, 22, 21.25),
    (30, 11, 57, 13.99),
    (3, 32, 47, 19.75),
    (3, 6, 74, 24.50),
    (4, 27, 68, 10.25),
    (4, 37, 87, 15.99),
    (5, 16, 69, 20.75),
    (16, 1, 12, 17.50),
    (17, 22, 29, 22.99),
    (28, 40, 92, 9.75),
    (29, 26, 89, 14.50),
    (20, 31, 37, 18.25),
    (7, 20, 58, 23.99),
    (4, 15, 7, 11.75),
    (23, 10, 51, 16.50),
    (19, 35, 59, 21.25),
    (29, 5, 63, 13.99),
    (14, 9, 17, 19.75),
    (25, 2, 1, 24.50),
    (13, 28, 45, 10.25),
    (2, 19, 88, 15.99),
    (7, 39, 64, 20.75);





select k.Firma, k.Strasse, k.Plz, k.Ort
FROM Kunde k
         JOIN  Rechnung r ON k.Kunde_ID = r.Kunden_ID
         JOIN Position p ON r.Rechnung_ID = p.Rechnung_ID
GROUP BY k.Firma
ORDER BY sum(p.Menge * p.Verkaufs_Einzelpreis) desc limit 10;



SELECT firma, COUNT(r.rechnung_id) anz_rechng
FROM Rechnung r join Kunde k on r.Kunden_ID = k.Kunde_ID
    GROUP BY firma;



SELECT k.firma, r.RechnungsDatum #sum(Verkaufs_Einzelpreis * menge) as total
from Kunde k
         join Rechnung r on k.Kunde_ID = r.Kunden_ID
         join Position p on r.Rechnung_ID = p.Rechnung_ID
group by k.firma
order by k.Firma desc;



SELECT sum(Verkaufs_Einzelpreis * Menge) as Gesamtumsatz
from Position join Rechnung on Position.Rechnung_ID = Rechnung.Rechnung_ID where month(RechnungsDatum) = 6;



select * from Kunde where Plz between '5000' and '6000';








/* Aufgabe aa */
# select Kunde.Kunde_ID, Kunde.Firma, COUNT(Rechnung.Rechnung_ID) as Anzahl
# From Rechnung
# right join  Kunde
# on Kunde.Kunde_ID = Rechnung.Kunden_ID and MONTH(RechnungsDatum) = 9
# GROUP BY Kunde.Kunde_ID
# ORDER BY Anzahl DESC
# ;

/* Anzahl der Produkte pro Hersteller */
# SELECT Hersteller.Firma , COUNT(Artikel.Artikel_ID) as Anzahl
# From Hersteller
# left join Artikel on Hersteller.Hersteller_ID = Artikel.Hersteller_ID
# Group By Hersteller.Firma;
# /* Preise aller Produkte eines Herstellers */
# SELECT Artikel.Listenpreis, artikel.bezeichnung
# FROM artikel , hersteller
# where Artikel.Hersteller_ID = Hersteller.hersteller_ID
# and Hersteller.Firma = 'Acme Electronics';
#
#
# /* Aufgabe ab */
#
# update Artikel as a , Hersteller as h
# set a.Listenpreis = a.Listenpreis *1.045
# where h.Hersteller_ID = a.Hersteller_ID
# and h.Firma = 'Acme Electronics';
#
# /* Aufgabe ac*/
# select kunde.kunde_id, Kunde.Firma, a.Bezeichnung,
#        sum(p.menge * p.Verkaufs_Einzelpreis) as Umsatz
# from kunde
# left join Rechnung R on Kunde.Kunde_ID = R.Kunden_ID
# left join Position P on R.Rechnung_ID = P.Rechnung_ID
# left join artikel a on P.Artikel_ID = a.Artikel_ID
# group by Kunde.Kunde_ID, Kunde.Firma, a.Bezeichnung
# ;
#
#
# /*ba */
#
# create table Artikelgrruppe (
#     Artikelgruppe_ID int PRIMARY KEY auto_increment,
#     Artikelgruppenbezeichnung varchar(255)
# );
#
# Alter TABLE Artikel
# add COLUMN Artikelgruppe_id int,
#     add foreign key (Artikelgruppe_id)
#     references Artikelgrruppe(Artikelgruppe_ID);


/* gesammt summe aller Rechnungen*/
#
# SELECT R.Rechnung_id, k.Firma,  sum(P.Verkaufs_Einzelpreis * P.menge) as Summe
# from Rechnung as R
# left join Position P on R.Rechnung_ID = P.Rechnung_ID
# left join Kunde as K on R.Kunden_ID = K.Kunde_ID
# group by P.Rechnung_ID
# order by Summe desc
# ;
/* Adressen der 10 besten Kunden */
# SELECT k.Firma, k.Strasse, k.plz, k.ort
# from Kunde as k
# left join Rechnung r on k.Kunde_ID = r.Kunden_ID
# left join position p on r.Rechnung_ID = p.Rechnung_ID
# group by k.Firma
# order by sum(P.Verkaufs_Einzelpreis * P.menge) desc
# limit 10
# ;



/* Anzahl der Bestellungen aller Kunden*/
# SELECT k.firma , count(R.rechnung_id) as Anzahl
# from Kunde as k
# left join Rechnung R on k.Kunde_ID = R.Kunden_ID
# group by k.firma
# order by Anzahl desc ,k.Firma asc  ;


/* Alle Firmen in dem Plz bereich zwischen 30000 -39999*/
# SELECT k.firma, k.plz
# from Kunde as k
# where k.Plz between 50000 and 59999;