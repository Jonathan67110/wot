<?php

class Canon{

	//Détermine l'id du tank
	//Int
	private $m_id;
	
	//Nom du char:
	//String
	private $m_nom;
	
	//Calibre du canon en mm :
	//Int
	private $m_calibre;
	
	//Nombre d'obus maximal dans le râtelier :
	//Int
	private $m_nombre_total_obus_min;
	
	//Nombre d'obus minimal dans le râtelier :
	//Int
	private $m_nombre_total_obus_max;
	
	//Nombre d'obus moyen dans le râtelier :
	//Int
	private $m_nombre_total_obus_moy;
	
	//Canon avec ratelier?
	//Boolean. Facultatif
	private $m_ratelier;
	
	//Nombre d'obus dans le ratelier. Si pas de ratelier, 
	//Int
	private $m_nombre_obus_ratelier;
	
	//Cadence de tir minimal du canon
	//float
	private $m_cadence_tir_min;
	
	//Cadence de tir maximale du canon
	//float
	private $m_cadence_tir_max;
	
	//Cadence de tir moyenne:
	//float
	private $m_cadence_tir_moy;
	
	//Temps de reload moyen, avec un équipage à 100%
	//Float
	private $m_temps_chargement_total;
	
	//Dégâts moyen de l'obus standard
	//Int
	private $m_degat_moyen1;
	
	//Dégâts moyen du second obus, généralement du gold
	//Int
	private $m_degat_moyen2;
	
	//Dégâts standard du dernier obus, souvent, explosif
	//Int
	private $m_degat_moyen3;
	
	//Pénétration de l'obus n°1 :
	//Int
	private $m_penetration1;
	
	//Pénétration de l'obus n°2 :
	//Int
	private $m_penetration2;
	
	//Pénétration de l'obus n°3 :
	//Int
	private $m_penetration3;
	
	
	
	/*  Information recopiée du cahier des spécifications techniques et, de la base de données existante :
Obus par chargement	TINYINT UNSIGNED
Cadence de tir min	DECIMAL(5,2)
Cadence de tir max	DECIMAL(5,2)
Cadence de tir moyenne	DECIMAL(5,2)
Temps de chargement total	DECIMAL(5,2)
Obus 1	TINYINT
Obus 2	TINYINT
Obus 3	TINYINT
Dégâts munition 1	SMALLINT UNSIGNED
Dégâts munition 2	SMALLINT UNSIGNED
Dégâts munition 3	SMALLINT UNSIGNED
Penetration 1	SMALLINT UNSIGNED
Pénétration 2	SMALLINT UNSIGNED
Pénétration 3	SMALLINT UNSIGNED
Dispersion min	DECIMAL(4,2)
Dispersion max	DECIMAL(4,2)
Dispersion moy	DECIMAL(4,2)
Vitesse de vise min	DECIMAL(4,2)
Vitesse de vise max	DECIMAL(4,2)
Vitesse de vise moy	DECIMAL(4,2)
Poids	MEDIUMINT UNSIGNED
Tier	TINYINT UNSIGNED
Nation	TINYINT UNSIGNED
Compatibilité	TEXT
prix	MEDIUMINT UNSIGNED
Expérience	MEDIUMINT UNSIGNED

	
	19	dispersion_min	decimal(4,2)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	20	dispersion_max	decimal(4,2)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	21	dispersion_moyenne	decimal(4,2)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	22	vitesse_vise_min	decimal(4,2)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	23	vitesse_vise_max	decimal(4,2)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	24	vitesse_vise_moy	decimal(4,2)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	25	poids	smallint(5)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	26	tier_latin	varchar(4)	utf8_general_ci		Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	27	tier_chiffre	tinyint(3)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	28	compatibilite	varchar(250)	utf8_general_ci		Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	29	prix	mediumint(8)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	30	type_credit	varchar(6)	utf8_general_ci		Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	31	experience	mediumint(8)		UNSIGNED	Oui	NULL		Modifier Modifier	Supprimer Supprimer	
Primaire Primaire
Unique Unique
Index Index
Spatial Spatial
Texte entier Texte entier
Valeurs distinctes Valeurs distinctes
	32	pays_id	tinyint(3)	*/

	//Nation du char:
	private $m_pays;
	
	//Coût du char, dans la monaie du char:
	private $m_prix;
	
	//tier du char, en chiffre latin
	private $m_tier_latin;
	
	//Tier du char en chiffre arabe:
	private $m_tier_chiffre;
	
	//Expérience pour débloquer le canon :
	private $m_experience;
	
	public function __construct($nouvId, $bdd){
		//Initialisation des variables de l'instance:
		$this->m_id = $nouvId;
		$this->m_nom = 'N/A';
		$this->m_calibre = 'N/A';
		$this->m_pays = 'N/A';
		$this->m_prix = 'N/A';
		$this->m_tier_latin = 'N/A';
		$this->m_tier_chiffre = 'N/A';
		$this->m_experience = 'N/A';
		
		$req = $bdd->prepare('SELECT * FROM Canon WHERE id=?');
		$req -> execute(array($nouvId));
		
		//Recherche d'un char correspondant, et, affectation des valeurs le cas échéant:
		while($tableauReponse = $req->fetch()){
			$this->m_nom = $tableauReponse['nom'];
			$this->m_calibre =$tableauReponse['calibre'];
			$this->m_pays = $tableauReponse['pays_id'];
			$this->m_prix = $tableauReponse['prix'];
			$this->m_tier_latin = $tableauReponse['tier_latin'];
			$this->m_tier_chiffre = $tableauReponse['tier_chiffre'];
			$this->m_experience = $tableauReponse['experience'];
		}
		
		//Fermeture de la requête:
		$req->closeCursor();
	}
	
	/**************/
	/*Fonction Get()*/
	/**************/
	
	public function getNom(){//Renvoie du nom du tank
		return $this->m_nom;
	}
	
	public function getId(){//Renvoie de l'id du tank
		return $this->m_id;
	}
	
	public function getParametre($attribut){
	//Cette fonction permet de renvoyer n'importe quel attribut, si on lui envoie le bon nom d'attribut:
	
	//Méthode à utiliser avec BEAUCOUP de précaution.
		switch($attribut){
			case('id'):
				return $this->getId();
			break;
			
			case('nom'):
				return $this->getNom();
			break;
			
			default:
				return 'Pas de paramètre';
			break;
			
		}
	
	}
	
}