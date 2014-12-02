-- SELECT Tank.nom nom_tank,  Canon.nom nom_canon, Canon.penetration1 pene, Tank.tier_latin tier FROM Canon
-- INNER JOIN Tank ON Tank.nom = Canon.compatibilite
-- WHERE Canon.penetration1 > 75
-- ORDER BY Tank.nom;

SELECT Tank.nom nom_tank,  Canon.nom nom_canon, Max(Canon.penetration1) pene, Tank.tier_latin tier FROM Canon
INNER JOIN Tank ON Tank.nom = Canon.compatibilite
WHERE Canon.penetration1 > 75
	AND Tank.tier_chiffre BETWEEN '3' AND '4'
GROUP BY Tank.nom;


SELECT Tank.nom nom_tank,  Canon.nom nom_canon, Max(Canon.penetration1) pene, Tank.tier_latin tier FROM Lien_tank_canon
INNER JOIN Canon ON Lien_tank_canon.id_canon = Canon.id
INNER JOIN Tank ON Lien_tank_canon.id_tank = Tank.id
WHERE Canon.penetration1 > 80
 	AND Tank.tier_chiffre BETWEEN '3' AND '4'
	AND type_char NOT IN ('Canons automoteurs', 'Chasseurs de chars')
GROUP BY Tank.nom;

--	AND Tank.tier_chiffre BETWEEN '3' AND '4'
-- GROUP BY Tank.nom;
-- SELECT Tank.nom nom_tank,  Canon.nom nom_canon, Max(Canon.penetration1) pene, Tank.tier_latin tier FROM Canon

-- INNER JOIN Lien_tank_canon ON Lien_tank_canon.id_canon = Canon.id

-- INNER JOIN Lien_tank_canon ON Lien_tank_canon.id_canon = Tank.id

-- WHERE Canon.penetration1 > 75

-- 	AND Tank.tier_chiffre BETWEEN '3' AND '4'

-- GROUP BY Tank.nom;