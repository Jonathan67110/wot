INSERT INTO Nation
VALUES(NULL, 'Russie'),
(NULL, 'Allemagne'),
(NULL, 'Japon'),
(NULL, 'Chine'),
(NULL,'Royaume-Unis'),
(NULL,'France'),
(NULL,'USA');

INTO TABLE Nation 'C://Users//Esekios2//Documents//SQL//wot//Nation.csv'
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(nation);


LOAD DATA LOCAL INFILE 'C://Users//Esekios2//Documents//SQL//wot//Canon.csv'
INTO TABLE Canon
FIELDS TERMINATED BY ';'
ENCLOSED BY '"'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(nom,calibre,nombre_obus,cadence_tir,temps_chargement_total,penetration1,penetration2,penetration3,degat_moyen1,degat_moyen2,degat_moyen3,dispersion,vitesse_visee,poids,tier,nation);

INSERT INTO Canon
VALUES(NULL, '85 mm 64-85T',85,1,10.91,10.91,159,230,43,200,200,320,0.36,2.3,1700,8,'Chine'),
(NULL, '85 mm 64-85TG',85,1,10.91,10.91,172,230,43,200,200,320,0.34,2.3,1750,8,'Chine'),
(NULL, '100 mm 59-100T',100,1,6.74,6.74,181,241,50,250,250,330,0.39,2.7,2257,8,'Chine'),
(NULL, '100 mm 60-100T',100,1,7.06,7.06,189,244,50,250,250,330,0.36,2.3,2257,8,'Chine'),
(NULL, '57 mm Gun Type 97',57,1,20,20,29,55,28,75,75,95,0.46,2.3,150,2,'Chine'),
(NULL, '45 mm 20K',45,1,26.09,26.09,51,88,23,47,47,62,0.46,1.7,313,2,'Chine'),
(NULL, '47 mm Gun Type 1',47,1,20,20,81,130,25,70,70,90,0.44,2.3,411,4,'Chine'),
(NULL, '57 mm Gun Type 97',57,1,20,20,29,55,28,75,75,95,0.46,2.3,150,2,'Chine'),
(NULL, '37 mm APX SA18',37,1,24,24,29,46,18,30,30,36,0.54,2,100,1,'France'),
(NULL, '25 mm Canon Raccourci mle. 1934',25,1,35.29,35.29,46,68,NULL,27,27,NULL,0.43,1.5,71,2,'France'),
(NULL, '37 mm SA38',37,1,23.08,23.08,34,67,24,40,40,45,0.48,2,70,2,'France'),
(NULL, 'Obusier de 155 mm C mle. 1917',155,1,2.46,2.46,77,185,NULL,720,720,NULL,0.82,7,1220,5,'France'),
(NULL, 'Canon de 155 mm de 33 calibres',155,1,1.96,1.96,90,185,NULL,950,720,NULL,0.78,7,2675,6,'France'),
(NULL, 'Obusier de 155 mm mle. 1950',155,1,2.01,2.01,90,90,185,950,950,720,0.76,6.5,2675,7,'France'),
(NULL, 'Canon de 155 mm mle. 1917 G.P.F.',155,1,1.82,1.82,95,95,185,1250,1250,720,0.74,6,3989,8,'France'),
(NULL, '2 cm Kw.K. 30',20,10,0.21,3.9,23,46,NULL,11,11,NULL,0.59,1.7,70,1,'Allemagne'),
(NULL, '2 cm Kw.K. 38',20,10,0.13,3.9,23,46,NULL,11,11,NULL,0.57,1.6,70,1,'Allemagne'),
(NULL, '2 cm Flak 38',20,10,0.13,3.9,39,51,NULL,11,11,NULL,0.45,1.6,110,2,'Allemagne');

INSERT INTO Radio
VALUES(NULL,'R-113',730,80,10,'Russie'),
(NULL,'12RT',625,110,9,'Russie'),
(NULL,'10RK',440,100,7,'Russie'),
(NULL,'9RM',525,100,8,'Russie'),
(NULL,'9R',325,80,4,'Russie'),
(NULL,'10R',360,100,5,'Russie'),
(NULL,'A-220',600,40,9,'Chine'),
(NULL,'A-220A',750,40,10,'Chine'),
(NULL,'Type 94 Hei',350,90,4,'Chine'),
(NULL,'Type 96 Bo',425,50,6,'Chine'),
(NULL,'Type 3 Otsu',550,240,8,'Chine'),
(NULL,'ER 52',300,100,3,'France'),
(NULL,'ER 53',360,100,5,'France'),
(NULL,'SCR 508',400,100,6,'France'),
(NULL,'SCR 528F',750,80,10,'France'),
(NULL,'FuG 2',265,40,2,'Allemagne'),
(NULL,'FuG 7',415,70,6,'Allemagne'),
(NULL,'FuG Spr. 1',455,150,7,'Allemagne'),
(NULL,'FuG 5',310,50,3,'Allemagne'),
(NULL,'Fu.Spr.Ger"a"',700,150,8,'Allemagne'),
(NULL,'FuG 12',710,150,9,'Allemagne'),
(NULL,'WS No. 9',375,40,5,'Royaume-Unis'),
(NULL,'Drapeaux de signal',90,1,1,'USA'),
(NULL,'SCR 200',265,40,2,'USA'),
(NULL,'SCR 193',325,80,2,'USA'),
(NULL,'SCR 210',325,80,4,'USA'),
(NULL,'SCR 508',395,100,6,'USA'),
(NULL,'SCR 528',745,80,10,'USA'),
(NULL,'SCR 510',325,80,4,'USA'),
(NULL,'SCR 610',420,100,6,'USA'),
(NULL,'SCR 619',750,80,10,'USA'),
(NULL,'SCR 506',615,110,9,'USA'),
(NULL,'AN/VRC-3',745,160,10,'USA');

LOAD DATA LOCAL INFILE 'C://Users//Esekios2//Documents//SQL//wot//Radio.csv'
INTO TABLE Radio
FIELDS TERMINATED BY ';' ENCLOSED BY '"'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(id,nom,portee_radio,poids,tier,nation);

LOAD DATA LOCAL INFILE 'C://Users//Esekios2//Documents//SQL//wot//Moteur.csv'
INTO TABLE Moteur
FIELDS TERMINATED BY ';'
ENCLOSED BY '"'
LINES TERMINATED BY '\n' -- ou '\r\n' selon l'ordinateur et le programme utilisés pour créer le fichier
IGNORE 1 LINES
(id,nom,puissance_moteur,probabilite_incendie,poids,tier,nation);