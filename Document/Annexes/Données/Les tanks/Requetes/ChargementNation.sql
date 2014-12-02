INSERT INTO Nation
VALUES(NULL, 'Russie'),
(NULL, 'Allemagne'),
(NULL, 'Japon'),
(NULL, 'Chine'),
(NULL,'Royaume-Unis'),
(NULL,'France'),
(NULL,'USA');

LOAD DATA LOCAL INFILE 'C://Users//Esekios2//Documents//SQL//wot//Canon.csv'
INTO TABLE Canon
FIELDS TERMINATED BY ';'
ENCLOSED BY '"'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(nom,calibre,nombre_obus,cadence_tir,temps_chargement_total,penetration1,penetration2,penetration3,degat_moyen1,degat_moyen2,degat_moyen3,dispersion,vitesse_visee,poids,tier,nation);


SHOW WARNINGS;

LOAD DATA LOCAL INFILE 'C://Users//Esekios2//Documents//SQL//wot//Moteur.csv'
INTO TABLE Moteur
FIELDS TERMINATED BY ';'
ENCLOSED BY '"'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(id,nom,puissance_moteur,probabilite_incendie,poids,tier,nation);

SHOW WARNINGS;

LOAD DATA LOCAL INFILE 'C://Users//Esekios2//Documents//SQL//wot//Radio.csv'
INTO TABLE Radio
FIELDS TERMINATED BY ';' ENCLOSED BY '"'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(id,nom,portee_radio,poids,tier,nation);

SHOW WARNINGS;

LOAD DATA LOCAL INFILE 'C://Users//Esekios2//Documents//SQL//wot//Suspension.csv'
INTO TABLE Suspension
FIELDS TERMINATED BY ';' ENCLOSED BY '"'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(id,nom,charge_max,vitesse_rotation,poids,tier,nation);

SHOW WARNINGS;