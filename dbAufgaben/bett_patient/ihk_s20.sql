DROP DATABASE IF EXISTS krankenhaus;
CREATE DATABASE krankenhaus;
USE krankenhaus;


CREATE TABLE Patient
(
    Pat_ID       INT PRIMARY KEY AUTO_INCREMENT,
    Pat_Name    VARCHAR(45),
    Pat_Vorname   VARCHAR(45),
    Pat_GebDatum DATE
);
CREATE TABLE Zimmer
(
    Z_ID              INT PRIMARY KEY AUTO_INCREMENT,
    Z_BettID         INT,
    Z_StatID         INT,
    Z_ZimmerNummer   INT
);

CREATE TABLE Bett
(
    Bett_ID          INT PRIMARY KEY AUTO_INCREMENT,
    Bett_Nummer      INT
);

CREATE TABLE Station
(
    Stat_ID          INT PRIMARY KEY AUTO_INCREMENT,
    Stat_Station     VARCHAR(45)
);

CREATE TABLE Patient_Aufenthalt
(
    PatAuf_ID         INT PRIMARY KEY AUTO_INCREMENT,
    PatAuf_PatID      INT,
    PatAuf_ZID        INT,
    PatAuf_AufnahmeDatum DATE,
    PatAuf_EntlassDatum DATE
);


INSERT INTO Patient (Pat_ID ,Pat_Name,Pat_Vorname,Pat_GebDatum) VALUES (NULL,'Mueller','Peter','1966-02-06');
INSERT INTO Patient (Pat_ID ,Pat_Name,Pat_Vorname,Pat_GebDatum) VALUES (NULL,'Trostan','Jannick','1957-02-15');
INSERT INTO Patient (Pat_ID ,Pat_Name,Pat_Vorname,Pat_GebDatum) VALUES (NULL,'Sardon','Sandra','1988-03-31');
INSERT INTO Patient (Pat_ID ,Pat_Name,Pat_Vorname,Pat_GebDatum) VALUES (NULL,'Grenzfeld','Thorsten','1990-06-04');
INSERT INTO Patient (Pat_ID ,Pat_Name,Pat_Vorname,Pat_GebDatum) VALUES (NULL,'Neuhaus','Anne','1988-06-01');

INSERT INTO Zimmer (Z_ID ,Z_BettID,Z_StatID,Z_ZimmerNummer) VALUES (NULL,2,1,212);
INSERT INTO Zimmer (Z_ID ,Z_BettID,Z_StatID,Z_ZimmerNummer) VALUES (NULL,3,1,212);
INSERT INTO Zimmer (Z_ID ,Z_BettID,Z_StatID,Z_ZimmerNummer) VALUES (NULL,4,1,214);


INSERT INTO Bett (Bett_ID ,Bett_Nummer) VALUES (NULL,00347783);
INSERT INTO Bett (Bett_ID ,Bett_Nummer) VALUES (NULL,00448637);
INSERT INTO Bett (Bett_ID ,Bett_Nummer) VALUES (NULL,00358999);
INSERT INTO Bett (Bett_ID ,Bett_Nummer) VALUES (NULL,07785688);
INSERT INTO Bett (Bett_ID ,Bett_Nummer) VALUES (NULL,55800987);


INSERT INTO Station (Stat_ID ,Stat_Station) VALUES (NULL,'Innere');
INSERT INTO Station (Stat_ID ,Stat_Station) VALUES (NULL,'Kardiologie');
INSERT INTO Station (Stat_ID ,Stat_Station) VALUES (NULL,'Onkologie');


INSERT INTO Patient_Aufenthalt (PatAuf_ID ,PatAuf_PatID,PatAuf_ZID,PatAuf_AufnahmeDatum,PatAuf_EntlassDatum) VALUES (NULL,2,2,'2020-02-07','2020-02-24');
INSERT INTO Patient_Aufenthalt (PatAuf_ID ,PatAuf_PatID,PatAuf_ZID,PatAuf_AufnahmeDatum,PatAuf_EntlassDatum) VALUES (NULL,1,2,'2020-02-01','2020-02-26');
INSERT INTO Patient_Aufenthalt (PatAuf_ID ,PatAuf_PatID,PatAuf_ZID,PatAuf_AufnahmeDatum,PatAuf_EntlassDatum) VALUES (NULL,3,2,'2020-02-26','2020-02-28');
INSERT INTO Patient_Aufenthalt (PatAuf_ID ,PatAuf_PatID,PatAuf_ZID,PatAuf_AufnahmeDatum,PatAuf_EntlassDatum) VALUES (NULL,2,3,'2020-04-11','2020-04-30');
INSERT INTO Patient_Aufenthalt (PatAuf_ID ,PatAuf_PatID,PatAuf_ZID,PatAuf_AufnahmeDatum,PatAuf_EntlassDatum) VALUES (NULL,4,3,'2020-05-01','2020-05-08');
INSERT INTO Patient_Aufenthalt (PatAuf_ID ,PatAuf_PatID,PatAuf_ZID,PatAuf_AufnahmeDatum,PatAuf_EntlassDatum) VALUES (NULL,1,2,'2020-05-02','2020-05-18');



# meine Lösung
SELECT Pat_Name, Pat_Vorname, Pat_GebDatum
FROM Patient
ORDER BY Pat_GebDatum DESC ,Pat_Name ASC ,Pat_Vorname DESC ;


# meine Lösung
SELECT PA.PatAuf_AufnahmeDatum, PA.PatAuf_EntlassDatum,DATEDIFF(PA.PatAuf_EntlassDatum,PA.PatAuf_AufnahmeDatum) AS Dauer,
       Z.Z_ZimmerNummer,S.Stat_Station,B.Bett_Nummer
FROM Patient_Aufenthalt PA
         INNER JOIN Zimmer Z ON PA.PatAuf_ZID=Z.Z_ID
         INNER JOIN Station S ON S.Stat_ID= Z.Z_StatID
         INNER JOIN Bett B ON B.Bett_ID= Z.Z_BettID
WHERE PatAuf_AufnahmeDatum >'2020-01-31' AND PatAuf_EntlassDatum < '2020-03-01' ;

# meine Lösung
SELECT B.Bett_Nummer
FROM bett B
WHERE B.Bett_ID NOT IN (
    SELECT B.Bett_ID
    FROM Patient_Aufenthalt PA
             INNER JOIN Zimmer Z ON PA.PatAuf_ZID=Z.Z_ID
             INNER JOIN Bett B ON B.Bett_ID= Z.Z_BettID
    WHERE '2020-04-21'  BETWEEN PA.PatAuf_AufnahmeDatum AND PA.PatAuf_EntlassDatum)
;




# IHK Lösung c
SELECT Bett_Nummer
FROM Bett
WHERE (SELECT COUNT(PatAuf_ID)
       FROM (Patient_Aufenthalt AS PatAuf
           Left JOIN Zimmer AS Z ON PatAuf.PatAuf_ZID = Z.Z_ID) WHERE Z.Z_BettID=Bett.Bett_ID
                                                                  AND ((PatAuf.PatAuf_EntlassDatum IS NULL)OR
                                                                       (DAY(PatAuf.PatAuf_EntlassDatum)<=21 AND MONTH(PatAuf.PatAuf_EntlassDatum)=4 AND YEAR(PatAuf.PatAuf_EntlassDatum)=2020)
        OR (MONTH(PatAuf.PatAuf_EntlassDatum)<4 AND YEAR(PatAuf.PatAuf_EntlassDatum)=2020 )
        OR (YEAR(PatAuf.PatAuf_EntlassDatum)<2020)
        )
      )=0;
























