<?php

class Tank{

	private $id;
	private $nom;
	private $premium;
	private $poids_chassis;
	private $limite_charge;
	private $monaie;
	private $vitesse_max;
	private $Nombre_equipage;
	private $Nombre_pilote;
	private $Nombre_tireur;
	private $Nombre_chargeur;
	private $Nombre_operateur_radio;
	private $hp_base;
	private $Blindage_avant;
	private $Blindage_flanc;
	private $Blindage_arriere;
	private $type_char;
	private $pays;
	private $prix;
	private $type_credit;
	private $tier_latin;
	private $tier_chiffre;
	private $idExistante;//Paramètre de développement, inutile pour la suite a priori
	
	public function __construct($nouvId, $bdd){
		//Initialisation des variables de l'instance:
		$this->id = $nouvId;
		$this->nom = 'N/A';
		$this->premium = 'N/A';
		$this->poids_chassis = 'N/A';
		$this->limite_charge = 'N/A';
		$this->monaie = 'N/A';
		$this->vitesse_max = 'N/A';
		$this->Nombre_equipage = 'N/A';
		$this->Nombre_pilote = 'N/A';
		$this->Nombre_tireur = 'N/A';
		$this->Nombre_chargeur = 'N/A';
		$this->Nombre_operateur_radio = 'N/A';
		$this->hp_base = 'N/A';
		$this->Blindage_avant = 'N/A';
		$this->Blindage_flanc = 'N/A';
		$this->Blindage_arriere = 'N/A';
		$this->type_char = 'N/A';
		$this->pays = 'N/A';
		$this->prix = 'N/A';
		$this->type_credit = 'N/A';
		$this->tier_latin = 'N/A';
		$this->tier_chiffre = 'N/A';
		$this->idExistante = 0;
		
		$req = $bdd->prepare('SELECT * FROM tank WHERE id=?');
		$req -> execute(array($nouvId));
		
		//Recherche d'un char correspondant, et, affectation des valeurs le cas échéant:
		while($tableauReponse = $req->fetch()){
			$this->nom = $tableauReponse['nom'];
			$this->premium = $tableauReponse['premium'];
			$this->poids_chassis = $tableauReponse['poids_chassis'];
			$this->limite_charge = $tableauReponse['limite_charge'];
			
			//Réellement utile avec le type de crédit après?
			$this->monaie = $tableauReponse['monaie'];
			
			$this->vitesse_max = $tableauReponse['vitesse_max'];
			$this->Nombre_equipage = $tableauReponse['Nombre_equipage'];
			$this->Nombre_pilote = $tableauReponse['Nombre_pilote'];
			$this->Nombre_tireur =$tableauReponse['Nombre_tireur'];
			$this->Nombre_chargeur = $tableauReponse['Nombre_chargeur'];
			$this->Nombre_operateur_radio = $tableauReponse['Nombre_operateur_radio'];
			$this->hp_base = $tableauReponse['hp_base'];
			$this->Blindage_avant = $tableauReponse['Blindage_avant'];
			$this->Blindage_flanc = $tableauReponse['Blindage_flanc'];
			$this->Blindage_arriere = $tableauReponse['Blindage_arriere'];
			$this->type_char = $tableauReponse['type_char'];
			$this->pays = $tableauReponse['pays_id'];
			$this->prix = $tableauReponse['prix'];
			$this->type_credit = $tableauReponse['type_credit'];
			$this->tier_latin = $tableauReponse['tier_latin'];
			$this->tier_chiffre = $tableauReponse['tier_chiffre'];
			$this->idExistante = 1;
		}
		
		//Fermeture de la requête:
		$req->closeCursor();
	}
	
	/**************/
	/*Fonction Get()*/
	/**************/
	
	public function getNom(){//Renvoie du nom du tank
		return $this->nom;
	}
	
	public function getId(){//Renvoie de l'id du tank
		return $this->id;
	}
	
	public function getPremium(){//Renvoie de l'id du tank
		return $this->premium;
	}
	
	public function getPoids_chassis(){//Renvoie de l'id du tank
		return $this->poids_chassis;
	}
	
	public function getMonaie(){//Renvoie de l'id du tank
		return $this->monaie;
	}
	
	public function getLimite_charge(){//Renvoie de l'id du tank
		return $this->limite_charge;
	}
	
	public function getPrix(){//Renvoie de l'id du tank
		return $this->prix;
	}	
	
	public function getType_credit(){//Renvoie de l'id du tank
		return $this->type_credit;
	}
	
	public function getHp_base(){//Renvoie de l'id du tank
		return $this->hp_base;
	}
	
	public function getType_char(){//Renvoie de l'id du tank
		return $this->type_char;
	}
	
	public function getPays(){//Renvoie de l'id du tank
		return $this->pays;
	}
	
	public function getTier_latin(){//Renvoie de l'id du tank
		return $this->tier_latin;
	}
	
	public function getNombre_equipage(){//Renvoie de l'id du tank
		return $this->Nombre_equipage;
	}
	
	public function getNombre_pilote(){//Renvoie de l'id du tank
		return $this->Nombre_pilote;
	}
	
	public function getNombre_tireur(){//Renvoie de l'id du tank
		return $this->Nombre_tireur;
	}
	
	public function getNombre_chargeur(){//Renvoie de l'id du tank
		return $this->Nombre_chargeur;
	}
	
	public function getNombre_operateur_radio(){//Renvoie de l'id du tank
		return $this->Nombre_operateur_radio;
	}
	
	public function getBlindage_avant(){//Renvoie de l'id du tank
		return $this->Blindage_avant;
	}
	
	public function getBlindage_flanc(){//Renvoie de l'id du tank
		return $this->Blindage_flanc;
	}
	
	public function getBlindage_arriere(){//Renvoie de l'id du tank
		return $this->Blindage_arriere;
	}
	
	public function getVitesse_max(){//Renvoie de l'id du tank
		return $this->vitesse_max;
	}
	
	public function getTier_chiffre(){//Renvoie de l'id du tank
		return $this->tier_chiffre;
	}
	
	public function getIdExistante(){
	//Plus tard, renverra false SI l'id ne correspond à aucune entrée de la base de données, et, à true sinon.
	//Pour le moment, renvoie false si id>10, pour les tests.
	
		$this->setIdExistante();
	
		return $this->idExistante;
	
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
			
			case('premium'):
				return $this->getPremium();
			break;
			
			case('poids_chassis'):
				return $this->getPoids_chassis();
			break;
			
			case('limite_charge'):
				return $this->getLimite_charge();
			break;
			
			case('monaie'):
				return $this->getMonaie();
			break;
			
			case('vitesse_max'):
				return $this->getVitesse_max();
			break;
			
			case('Nombre_equipage'):
				return $this->getNombre_equipage();
			break;	
			
			case('Nombre_pilote'):
				return $this->getNombre_pilote();
			break;		
			
			case('Nombre_tireur'):
				return $this->getNombre_tireur();
			break;		
			
			case('Nombre_chargeur'):
				return $this->getNombre_chargeur();
			break;		
			
			case('Nombre_operateur_radio'):
				return $this->getNombre_operateur_radio();
			break;		
			
			case('hp_base'):
				return $this->getHp_base();
			break;		
			
			case('Blindage_avant'):
				return $this->getBlindage_avant();
			break;		
			
			case('Blindage_flanc'):
				return $this->getBlindage_flanc();
			break;	
			
			case('Blindage_arriere'):
				return $this->getBlindage_arriere();
			break;		
			
			case('type_char'):
				return $this->getType_char();
			break;	
			
			case('pays'):
				return $this->getPays();
			break;	
			
			case('prix'):
				return $this->getPrix();
			break;	
			
			case('type_credit'):
				return $this->getType_credit();
			break;	
			
			case('tier_latin'):
				return $this->getTier_latin();
			break;	
			
			case('tier_chiffre'):
				return $this->getTier_chiffre();
			break;	
			
			case('idExistante'):
				return $this->getIdExistante();
			break;			
			
			default:
				return 'Pas de paramètre';
			break;
			
		}
	
	}
	
	//Fonction temporaire, à supprimer par la suite:
	private function setIdExistante(){
		if($this->id <=100 && $this->id >0){
			$this->idExistante = 1;
		}
		else{
			$this->idExistante = 0;
		}
		
	}
	
}

//Permet de renvoyer la liste complète de tous les chars existants:
function listeTank($bdd){
		
	$req = $bdd->prepare('SELECT * FROM tank');
	$req -> execute();
	
	while($tank = $req->fetch()){
		$listetank[$tank['id']] = new Tank($tank['id'], $bdd);
	
	}
	$req->closeCursor();
	
	return $listetank;
	
}

//Permet de renvoyer la liste des champs de la table tank de la base WoT. A modifier ultérieurement pour la récupérer depuis la base de donnée directement.
function listeChampTank(){

	return array(
	'nom',
	'premium',
	'poids_chassis',
	'limite_charge',
	'monaie',
	'vitesse_max',
	'Nombre_equipage',
	'Nombre_pilote',
	'Nombre_tireur',
	'Nombre_chargeur',
	'Nombre_operateur_radio',
	'hp_base',
	'Blindage_avant',
	'Blindage_flanc',
	'Blindage_arriere',
	'type_char',
	'pays',
	'prix',
	'type_credit',
	'tier_latin',
	'tier_chiffre',
	'idExistante');
}

/******Fonction de nettoyage juste pour les fonctions de requetage de la base ci-dessous*******/
function EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($texteANettoyer){
	
	$texteANettoyer = str_replace('recherche', '', $texteANettoyer);

	return $texteANettoyer;
}


/******Fonction pour vérifier que les entrées sont correctes *******/
function verificationParametre($tableauAVerifier){

	$resultat = '';

	//On scrute l'ensemble des paramètres du tableau pour vérifier sa validité:
	foreach($tableauAVerifier as $cle=>$parametre){
		
		if(empty($parametre) && EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle) != 'Nombre_tireur' && 
		EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle) != 'Nombre_chargeur' && 
		EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle) != 'Nombre_operateur_radio' &&
		EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle) != 'prix' ){
			if(empty($resultat)){
				$resultat= 'Attention, certains de vos paramètres sont absents: <br /> - '.EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle);
			 }
			 else{
				$resultat= $resultat.', <br /> -'.EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle);
			 }
		}
	}
	return $resultat;
}

/***********************************************************/
/*******************Ajout de char*****************************/
/***********************************************************/
function ajoutChar($bdd, $tablAjouter){//$bdd est la base à requêter

	//Vérification des paramètres d'entrée:
	$message =verificationParametre($tablAjouter);
	
	if(empty($message)){
				
		try{
			//Préparation de la requête
			$req = $bdd->prepare('INSERT INTO tank(nom, premium, poids_chassis,	limite_charge, monaie, vitesse_max,	Nombre_equipage,	Nombre_pilote,	
			Nombre_tireur,	Nombre_chargeur,	Nombre_operateur_radio,	hp_base, Blindage_avant,	Blindage_flanc,	Blindage_arriere,	type_char, pays_id,	
			prix,	type_credit,	tier_latin,	tier_chiffre) 
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
			
			//$req->execute($tablAjouter);
				
				$req->execute(array($tablAjouter['recherchenom'],$tablAjouter['recherchepremium'], floatval($tablAjouter['recherchepoids_chassis']),floatval($tablAjouter['recherchelimite_charge']),$tablAjouter['recherchemonaie'],floatval($tablAjouter['recherchevitesse_max']),
			intval($tablAjouter['rechercheNombre_equipage']), intval($tablAjouter['rechercheNombre_pilote']),intval($tablAjouter['rechercheNombre_tireur']), intval($tablAjouter['rechercheNombre_chargeur']), intval($tablAjouter['rechercheNombre_operateur_radio']),intval($tablAjouter['recherchehp_base']),
			intval($tablAjouter['rechercheBlindage_avant']), intval($tablAjouter['rechercheBlindage_flanc']),intval($tablAjouter['rechercheBlindage_arriere']), $tablAjouter['recherchetype_char'], max(1,intval($tablAjouter['recherchepays'])),intval($tablAjouter['rechercheprix']), $tablAjouter['recherchetype_credit'], 
			$tablAjouter['recherchetier_latin'],intval($tablAjouter['recherchetier_chiffre'])));
			$req->closeCursor();

			
			//On suppose la requête effectuée:
			$message = 'Requête terminée avec succès : Le char '.$tablAjouter['recherchenom'].' a bien été ajouté.';
		}
	
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
	}
	
	return $message;

}

/***********************************************************/
/*****************Suppression de char*************************/
/***********************************************************/
function suppressionChar($bdd, $tablAjouter, $indiceTankSupprimer){//$bdd est la base à requêter

	//Vérification des paramètres d'entrée:
	$message =verificationParametre($tablAjouter);
	
	$indiceTankSupprimer = intval($indiceTankSupprimer);

	try{
		$req = $bdd->prepare('DELETE FROM tank WHERE id = ?');
		
		//$req->execute($tablAjouter);
			
		$req->execute(array($indiceTankSupprimer));
		$req->closeCursor();
		
		$message = 'Le char '.$tablAjouter['recherchenom'].' a bien été supprimé';
		
		}
		
	catch (Exception $e){
	
		die('Erreur : ' . $e->getMessage());
				
	}
	
	
	return $message;
}


/**********************************************************/
/*****************Modification de char*************************/
/**********************************************************/

function modificationChar($bdd, $tablAjouter, $indiceTankModifier){//$bdd est la base à requêter

	//Vérification des paramètres d'entrée:
	$message =verificationParametre($tablAjouter);
	
	$indiceTankModifier = intval($indiceTankModifier);
	
try{
	
	$req = $bdd->prepare('	UPDATE  tank
										SET nom = ?, premium =?,	poids_chassis=?, limite_charge=?, monaie=?, vitesse_max=?,	Nombre_equipage=?,	Nombre_pilote=?,	
	Nombre_tireur=?,	Nombre_chargeur=?,	Nombre_operateur_radio=?,	hp_base=?, Blindage_avant=?,	Blindage_flanc=?,	Blindage_arriere=?,	type_char=?, pays_id=?,	
	prix=?,	type_credit=?,	tier_latin=?,	tier_chiffre=?
										WHERE id = ?
	');
	
	//$req->execute($tablAjouter);
		
		$req->execute(array($tablAjouter['recherchenom'],$tablAjouter['recherchepremium'], $tablAjouter['recherchepoids_chassis'],$tablAjouter['recherchelimite_charge'],$tablAjouter['recherchemonaie'],$tablAjouter['recherchevitesse_max'],
		$tablAjouter['rechercheNombre_equipage'], $tablAjouter['rechercheNombre_pilote'],$tablAjouter['rechercheNombre_tireur'], $tablAjouter['rechercheNombre_chargeur'], $tablAjouter['rechercheNombre_operateur_radio'],$tablAjouter['recherchehp_base'],
		$tablAjouter['rechercheBlindage_avant'], $tablAjouter['rechercheBlindage_flanc'],$tablAjouter['rechercheBlindage_arriere'], $tablAjouter['recherchetype_char'], $tablAjouter['recherchepays'],$tablAjouter['rechercheprix'], $tablAjouter['recherchetype_credit'], 
		$tablAjouter['recherchetier_latin'],$tablAjouter['recherchetier_chiffre'], $indiceTankModifier));
		$req->closeCursor();
			
		$message = 'Le char '.$tablAjouter['recherchenom'].' a bien été modifié.';
	
	}
	
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	return $message;


}
