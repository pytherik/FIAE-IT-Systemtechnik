DROP DATABASE IF EXISTS bett;

CREATE DATABASE bett;
USE bett;

CREATE TABLE Patient
(
    Pat_ID       INT PRIMARY KEY AUTO_INCREMENT,
    Pat_Name     VARCHAR(45),
    Pat_Vorname  VARCHAR(45),
    Pat_GebDatum DATE
);

INSERT INTO Patient
VALUES (NULL, 'Müller', 'Peter', '1966-02-06');
INSERT INTO Patient
VALUES (NULL, 'Trostan', 'Jannick', '1957-02-15');
INSERT INTO Patient
VALUES (NULL, 'Sardon', 'Sandra', '1988-03-31');
INSERT INTO Patient
VALUES (NULL, 'Grenzfeld', 'Thorsten', '1990-06-04');
INSERT INTO Patient
VALUES (NULL, 'Neuhaus', 'Anne', '1988-06-01');

CREATE TABLE Bett
(
    Bett_ID     INT PRIMARY KEY AUTO_INCREMENT,
    Bett_Nummer VARCHAR(45)
);

INSERT INTO Bett
VALUES (NULL, 00347783);
INSERT INTO Bett
VALUES (NULL, 00448637);
INSERT INTO Bett
VALUES (NULL, 00358999);
INSERT INTO Bett
VALUES (NULL, 07785688);
INSERT INTO Bett
VALUES (NULL, 55800987);


CREATE TABLE Station
(
    Stat_ID      INT PRIMARY KEY AUTO_INCREMENT,
    Stat_Station VARCHAR(45)
);

INSERT INTO Station
VALUES (NULL, 'Innere');
INSERT INTO Station
VALUES (NULL, 'Kardiologie');
INSERT INTO Station
VALUES (NULL, 'Onkologie');


CREATE TABLE Zimmer
(
    Z_ID           INT PRIMARY KEY AUTO_INCREMENT,
    Z_BettID       INT,
    Z_StatID       INT,
    Z_ZimmerNummer INT,
    FOREIGN KEY (Z_BettID) REFERENCES Bett (Bett_ID),
    FOREIGN KEY (Z_StatID) REFERENCES Station (Stat_ID)
);

INSERT INTO Zimmer
VALUES (NULL, 2, 1, 212);
INSERT INTO Zimmer
VALUES (NULL, 3, 1, 212);
INSERT INTO Zimmer
VALUES (NULL, 4, 1, 214);


CREATE TABLE Patient_Aufenthalt
(
    PatAuf_ID            INT PRIMARY KEY AUTO_INCREMENT,
    PatAuf_PatID         INT,
    PatAuf_ZID           INT,
    PatAuf_AufnahmeDatum DATE,
    PatAuf_EntlassDatum  DATE,
    FOREIGN KEY (PatAuf_PatID) REFERENCES Patient (Pat_ID),
    FOREIGN KEY (PatAuf_ZID) REFERENCES Zimmer (Z_ID)
);

INSERT INTO Patient_Aufenthalt
VALUES (NULL, 2, 2, '2020-02-07', '2020-02-24');
INSERT INTO Patient_Aufenthalt
VALUES (NULL, 1, 2, '2020-02-01', '2020-02-26');
INSERT INTO Patient_Aufenthalt
VALUES (NULL, 3, 2, '2020-02-26', '2020-02-28');
INSERT INTO Patient_Aufenthalt
VALUES (NULL, 2, 3, '2020-04-11', '2020-04-30');
INSERT INTO Patient_Aufenthalt
VALUES (NULL, 4, 3, '2020-05-01', '2020-05-08');
INSERT INTO Patient_Aufenthalt
VALUES (NULL, 2, 1, '2020-05-02', '2020-05-18');