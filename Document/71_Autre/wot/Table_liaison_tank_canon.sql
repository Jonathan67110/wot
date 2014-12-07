-- ------------------------------------------------------
-- Création de la table 'Lien_tank_canon' ---------------
-- ------------------------------------------------------
DROP TABLE IF EXISTS Lien_tank_canon;

CREATE TABLE Lien_tank_canon
(id INT UNSIGNED NOT NULL AUTO_INCREMENT,
nom_pays VARCHAR(50) NOT NULL,
id_pays INT,
nom_canon VARCHAR(50) NOT NULL,
id_canon INT,
nom_tank VARCHAR(50) NOT NULL,
id_tank INT,
PRIMARY KEY (id)
)
ENGINE=INNODB;

-- ------------------------------------------------------
-- Création de la table 'Tampon' ------------------------
-- ------------------------------------------------------
DROP TABLE IF EXISTS Tampon;

CREATE TABLE Tampon
(id INT UNSIGNED NOT NULL AUTO_INCREMENT,
tamponnom_canon VARCHAR(50) NOT NULL,
tamponnom_pays VARCHAR(50) NOT NULL,
tamponnom_tank1 VARCHAR(50) NOT NULL,
tamponnom_tank2 VARCHAR(50),
tamponnom_tank3 VARCHAR(50),
tamponnom_tank4 VARCHAR(50),
tamponnom_tank5 VARCHAR(50),
tamponnom_tank6 VARCHAR(50),
tamponnom_tank7 VARCHAR(50),
tamponnom_tank8 VARCHAR(50),
tamponnom_tank9 VARCHAR(50),
tamponnom_tank10 VARCHAR(50),
tamponnom_tank11 VARCHAR(50),
tamponnom_tank12 VARCHAR(50),
tamponnom_tank13 VARCHAR(50),
tamponnom_tank14 VARCHAR(50),
tamponnom_tank15 VARCHAR(50),
tamponnom_tank16 VARCHAR(50),
tamponnom_tank17 VARCHAR(50),
tamponnom_tank18 VARCHAR(50),
tamponnom_tank19 VARCHAR(50),
tamponnom_tank20 VARCHAR(50),
PRIMARY KEY (id)
)
ENGINE=INNODB;

-- -----------------------------------------------------------
-- Remplissage de la table 'Tampon' --------------------------
-- -----------------------------------------------------------

LOCK TABLES Tampon WRITE;

LOAD DATA LOCAL INFILE 'C://Users//Esekios2//SQL//Lien_Tank_Canon.csv'
INTO TABLE Tampon
FIELDS TERMINATED BY ';'
ESCAPED BY ':'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(tamponnom_canon,
tamponnom_pays,
tamponnom_tank1,
tamponnom_tank2,
tamponnom_tank3,
tamponnom_tank4,
tamponnom_tank5,
tamponnom_tank6,
tamponnom_tank7,
tamponnom_tank8,
tamponnom_tank9,
tamponnom_tank10,
tamponnom_tank11,
tamponnom_tank12,
tamponnom_tank13,
tamponnom_tank14,
tamponnom_tank15,
tamponnom_tank16,
tamponnom_tank17,
tamponnom_tank18,
tamponnom_tank19,
tamponnom_tank20);

UNLOCK TABLES;

-- LOCK TABLES Lien_tank_canon AND Tampon WRITE;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank1 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank2 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank3 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank4 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank5 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank6 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank7 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank8 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank9 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank10 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank11 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank12 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank13 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank14 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank15 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank16 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank17 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank18 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank19 AS tt FROM Tampon;

INSERT INTO Lien_tank_canon(nom_pays, nom_canon, nom_tank)
SELECT tamponnom_pays AS tp, tamponnom_canon AS tc, tamponnom_tank20 AS tt FROM Tampon;

UPDATE Lien_tank_canon 
INNER JOIN Tank ON Lien_tank_canon.nom_tank = Tank.nom
SET Lien_tank_canon.id_tank = Tank.id;

DELETE FROM Lien_tank_canon
WHERE id_tank <=> NULL;

UPDATE Lien_tank_canon 
INNER JOIN Nation ON Lien_tank_canon.nom_pays = Nation.pays
SET Lien_tank_canon.id_pays = Nation.id;

UPDATE Lien_tank_canon 
INNER JOIN Canon ON Lien_tank_canon.nom_canon = Canon.nom
SET Lien_tank_canon.id_canon = Canon.id;


UNLOCK TABLES;





























UNLOCK TABLES;