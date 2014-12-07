-- -----------------------------------------------------------
-- Suppression de la table existante
-- -----------------------------------------------------------
Drop DATABASE wot;
-- -----------------------------------------------------------
-- Creation de la base
-- -----------------------------------------------------------
CREATE If NOT EXISTS DATABASE wot CHARACTER SET 'utf8';  
-- -----------------------------------------------------------
-- Sélection de la base wot ---------------------------------
-- -----------------------------------------------------------
USE wot; 
-- -----------------------------------------------------------
-- Création de la table 'Nation' ---------------------------
-- -----------------------------------------------------------
CREATE TABLE Nation -- Création de la table contenant les nations
(id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
pays VARCHAR(15) NOT NULL UNIQUE,
PRIMARY KEY (id) 
)
ENGINE=INNODB;
-- -----------------------------------------------------------
-- Remplissage de la table 'Nation' -------------------------
-- -----------------------------------------------------------
INSERT INTO Nation
VALUES(NULL, 'Russie'),
(NULL, 'Allemagne'),
(NULL, 'Japon'),
(NULL, 'Chine'),
(NULL,'Royaume-Unis'),
(NULL,'France'),
(NULL,'USA');
-- -----------------------------------------------------------
-- Création de la table 'Canons' ----------------------------
-- -----------------------------------------------------------
CREATE TABLE Canon
(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
nom	VARCHAR(100) NOT NULL,
calibre	VARCHAR(3),
nombre_total_obus_min	TINYINT UNSIGNED,
nombre_total_obus_max	TINYINT UNSIGNED,
nombre_total_obus_moy TINYINT UNSIGNED,
ratelier CHAR(1),
nombre_obus_ratelier TINYINT UNSIGNED,
cadence_tir_min	DECIMAL(5,2) UNSIGNED,
cadence_tir_max	DECIMAL(5,2) UNSIGNED,
cadence_tir_moy	DECIMAL(5,2) UNSIGNED,
temps_chargement_total DECIMAL(5,2) UNSIGNED, -- Temps de chargement de du barrilet complet, ou d'un obus si il n'y a pas de barillet
degat_moyen1 SMALLINT UNSIGNED,
degat_moyen2 SMALLINT UNSIGNED,
degat_moyen3 SMALLINT UNSIGNED,
penetration1 SMALLINT UNSIGNED,
penetration2 SMALLINT UNSIGNED,
penetration3 SMALLINT UNSIGNED,
dispersion_min DECIMAL(4,2) UNSIGNED,
dispersion_max DECIMAL(4,2) UNSIGNED,
dispersion_moyenne DECIMAL(4,2) UNSIGNED,
vitesse_vise_min DECIMAL(4,2) UNSIGNED,
vitesse_vise_max DECIMAL(4,2) UNSIGNED,
vitesse_vise_moy DECIMAL(4,2) UNSIGNED,
poids SMALLINT UNSIGNED,
tier_latin VARCHAR(4),
tier_chiffre TINYINT UNSIGNED,
pays VARCHAR(15),
compatibilite VARCHAR(250),
prix MEDIUMINT UNSIGNED,
type_credit VARCHAR(6),
experience  MEDIUMINT UNSIGNED,
PRIMARY KEY (id)
)
ENGINE=INNODB;
-- -----------------------------------------------------------
-- Remplissage de la table 'Canon' ---------------------------
-- -----------------------------------------------------------
LOCK TABLES Canon WRITE;
LOAD DATA LOCAL INFILE 'C://wot//Canon.csv'
INTO TABLE Canon
FIELDS TERMINATED BY ';'
ESCAPED BY ':'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(nom,
calibre,
nombre_total_obus_min,
nombre_total_obus_max,
nombre_total_obus_moy,
ratelier,
nombre_obus_ratelier,
cadence_tir_min,
cadence_tir_max,
cadence_tir_moy,
temps_chargement_total,
degat_moyen1,
degat_moyen2,
degat_moyen3,
penetration1,
penetration2,
penetration3,
dispersion_min,
dispersion_max,
dispersion_moyenne,
vitesse_vise_min,
vitesse_vise_max,
vitesse_vise_moy,
poids,
tier_latin,
pays,
compatibilite,
prix,
type_credit,
experience);

UNLOCK TABLES;

UPDATE Canon SET tier_chiffre = 8 WHERE tier_latin='VIII';
UPDATE Canon SET tier_chiffre = 7 WHERE tier_latin='VII';
UPDATE Canon SET tier_chiffre = 6 WHERE tier_latin='VI';
UPDATE Canon SET tier_chiffre = 4 WHERE tier_latin='IV';
UPDATE Canon SET tier_chiffre = 9 WHERE tier_latin='IX';
UPDATE Canon SET tier_chiffre = 10 WHERE tier_latin='X';
UPDATE Canon SET tier_chiffre = 5 WHERE tier_latin='V';
UPDATE Canon SET tier_chiffre = 3 WHERE tier_latin='III';
UPDATE Canon SET tier_chiffre = 2 WHERE tier_latin='II';
UPDATE Canon SET tier_chiffre = 1 WHERE tier_latin='I';

ALTER TABLE Canon
ADD COLUMN pays_id TINYINT UNSIGNED;

UPDATE Canon 
INNER JOIN Nation ON Canon.pays = Nation.pays
SET Canon.pays_id = Nation.id;

ALTER TABLE Canon
DROP COLUMN pays;

ALTER TABLE Canon
ADD CONSTRAINT fk_canon_pays_id FOREIGN KEY (pays_id) REFERENCES Nation(id);

SHOW WARNINGS;
-- --------------------------------------------------------
-- Création de la table 'Moteur' --------------------------
-- --------------------------------------------------------
CREATE TABLE Moteur
(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
nom	 VARCHAR(50) NOT NULL,
puissance SMALLINT UNSIGNED,
chance_incendie DECIMAL(3,2) UNSIGNED,
Type_moteur VARCHAR(9),
poids SMALLINT UNSIGNED,
tier_latin VARCHAR(4),
tier_chiffre TINYINT UNSIGNED,
pays VARCHAR(15),
compatibilite VARCHAR(250),
prix MEDIUMINT UNSIGNED,
type_credit VARCHAR(6),
experience  MEDIUMINT UNSIGNED,
PRIMARY KEY (id)
)
ENGINE=INNODB;

-- -----------------------------------------------------------
-- Remplissage de la table 'Moteur' ---------------------------
-- -----------------------------------------------------------
LOCK TABLES Moteur WRITE;
LOAD DATA LOCAL INFILE 'C://wot//Moteur.csv'
INTO TABLE Moteur
FIELDS TERMINATED BY ';'
ESCAPED BY ':'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(nom,
puissance,
chance_incendie,
Type_moteur,
poids,
tier_latin,
pays,
compatibilite,
prix,
type_credit,
experience);

UNLOCK TABLES;

UPDATE Moteur SET tier_chiffre = 8 WHERE tier_latin='VIII';
UPDATE Moteur SET tier_chiffre = 7 WHERE tier_latin='VII';
UPDATE Moteur SET tier_chiffre = 6 WHERE tier_latin='VI';
UPDATE Moteur SET tier_chiffre = 4 WHERE tier_latin='IV';
UPDATE Moteur SET tier_chiffre = 9 WHERE tier_latin='IX';
UPDATE Moteur SET tier_chiffre = 10 WHERE tier_latin='X';
UPDATE Moteur SET tier_chiffre = 5 WHERE tier_latin='V';
UPDATE Moteur SET tier_chiffre = 3 WHERE tier_latin='III';
UPDATE Moteur SET tier_chiffre = 2 WHERE tier_latin='II';
UPDATE Moteur SET tier_chiffre = 1 WHERE tier_latin='I';

ALTER TABLE Moteur
ADD COLUMN pays_id TINYINT UNSIGNED;

UPDATE Moteur 
INNER JOIN Nation ON Moteur.pays = Nation.pays
SET Moteur.pays_id = Nation.id;

ALTER TABLE Moteur
DROP COLUMN pays;

ALTER TABLE Moteur
ADD CONSTRAINT fk_Moteur_pays_id FOREIGN KEY (pays_id) REFERENCES Nation(id);

SHOW WARNINGS;

-- --------------------------------------------------------
-- Création de la table 'Radio' --------------------------
-- --------------------------------------------------------
CREATE TABLE Radio
(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
nom	 VARCHAR(50) NOT NULL,
portee_radio SMALLINT UNSIGNED NOT NULL,
poids SMALLINT UNSIGNED NOT NULL,
tier TINYINT UNSIGNED NOT NULL,
pays VARCHAR(15) NOT NULL,
PRIMARY KEY (id)
)
ENGINE=INNODB;
-- --------------------------------------------------------
-- Création de la table 'Suspension' --------------------------
-- --------------------------------------------------------
CREATE TABLE Suspension
(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
nom	 VARCHAR(50) NOT NULL,
charge_max SMALLINT UNSIGNED NOT NULL,
vitesse_rotation TINYINT UNSIGNED NOT NULL,
poids SMALLINT UNSIGNED NOT NULL,
tier TINYINT UNSIGNED NOT NULL,
pays VARCHAR(15) NOT NULL,
PRIMARY KEY (id)
)
ENGINE=INNODB;
-- --------------------------------------------------------
-- Création de la table 'Tourelle' --------------------------
-- --------------------------------------------------------
CREATE TABLE Tourelle
(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
nom	 VARCHAR(50) NOT NULL,
poids SMALLINT UNSIGNED NOT NULL,
tier TINYINT UNSIGNED NOT NULL,
pays VARCHAR(15) NOT NULL,
PRIMARY KEY (id)
)ENGINE=INNODB;
-- ------------------------------------------------------
-- Création de la table 'Tank' --------------------------
-- ------------------------------------------------------
CREATE TABLE Tank
(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
nom	 VARCHAR(50) NOT NULL,
premium VARCHAR(7),
poids_chassis MEDIUMINT UNSIGNED,
limite_charge MEDIUMINT UNSIGNED,
monaie TEXT,
vitesse_max MEDIUMINT UNSIGNED,
Nombre_equipage TINYINT UNSIGNED,
Nombre_pilote TINYINT UNSIGNED,
Nombre_tireur TINYINT UNSIGNED,
Nombre_chargeur TINYINT UNSIGNED,
Nombre_operateur_radio TINYINT UNSIGNED,
hp_base SMALLINT UNSIGNED,
Blindage_avant SMALLINT UNSIGNED,
Blindage_flanc SMALLINT UNSIGNED,
Blindage_arriere SMALLINT UNSIGNED,
type_char VARCHAR(18),
pays VARCHAR(15),
prix MEDIUMINT UNSIGNED,
type_credit VARCHAR(6),
tier_latin VARCHAR(4),
tier_chiffre TINYINT UNSIGNED,
PRIMARY KEY (id)
)
ENGINE=INNODB;

-- -----------------------------------------------------------
-- Remplissage de la table 'Tank' ---------------------------
-- -----------------------------------------------------------
-- SELECT 'Requête remplissage tank';
LOCK TABLES Tank WRITE;
LOAD DATA LOCAL INFILE 'C://wot//Tank.csv'
INTO TABLE Tank
FIELDS TERMINATED BY ';'
ESCAPED BY ':'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(nom,
hp_base,
poids_chassis,
limite_charge,
premium,
prix,
monaie,
vitesse_max,
Nombre_equipage,
Nombre_pilote,
Nombre_tireur,
Nombre_chargeur,
Nombre_operateur_radio,
Blindage_avant,
Blindage_flanc,
Blindage_arriere,
type_char,
pays,
experience,
tier_latin);

UNLOCK TABLES;

UPDATE Tank SET tier_chiffre = 8 WHERE tier_latin='VIII';
UPDATE Tank SET tier_chiffre = 7 WHERE tier_latin='VII';
UPDATE Tank SET tier_chiffre = 6 WHERE tier_latin='VI';
UPDATE Tank SET tier_chiffre = 4 WHERE tier_latin='IV';
UPDATE Tank SET tier_chiffre = 9 WHERE tier_latin='IX';
UPDATE Tank SET tier_chiffre = 10 WHERE tier_latin='X';
UPDATE Tank SET tier_chiffre = 5 WHERE tier_latin='V';
UPDATE Tank SET tier_chiffre = 3 WHERE tier_latin='III';
UPDATE Tank SET tier_chiffre = 2 WHERE tier_latin='II';
UPDATE Tank SET tier_chiffre = 1 WHERE tier_latin='I';

ALTER TABLE Tank
ADD COLUMN pays_id TINYINT UNSIGNED;

UPDATE Tank 
INNER JOIN Nation ON Tank.pays = Nation.pays
SET Tank.pays_id = Nation.id;

ALTER TABLE Tank
DROP COLUMN pays;

SELECT 'Ajout FK';

ALTER TABLE Tank
ADD CONSTRAINT fk_tank_pays_id FOREIGN KEY (pays_id) REFERENCES Nation(id);


SELECT Nation.pays, COUNT(Tank.pays_id) AS Nombre_Tank FROM Tank
INNER JOIN Nation ON Tank.pays_id = Nation.id
GROUP BY Tank.pays_id;

SELECT nom, tier_latin FROM Moteur;

SELECT * FROM Radio;

SELECT * FROM Suspension;

SOURCE 'C://wot//Table_liaison_tank_canon.sql';
SOURCE 'C://wot//Table_liaison_tank_moteur.sql';