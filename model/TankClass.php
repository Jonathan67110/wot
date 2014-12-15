<?php
include_once('model/TierFonction/TierToFunction.php');//Contient des fonctions permettant de ne pas requêter la base. Les données sont en durs, mais, elles ont peu de chance de changer, d'où son emploi.

class Tank{
	//Détermine l'id du tank:
	private $id;
	
	//Date de la mise à jour des données:
	private $m_DateMiseAJour;
	
	//Nom du char:
	private $nom;
	
	//Texte de présentation du char :
	private $Description;
	
	//Type d'accès au char : est-ce qu'il est vendu en boutique, au garage, donnée lors d'un évènement?
	private $premium;
	
	//Poids du chassis du char : dépends de la somme des poids des éléments du chars
	private $poids_chassis;
	
	//Limite de charge du char : dépend des suspensions
	private $limite_charge;
	
	//Type de monaie à utiliser pour acheter le char :
	private $monaie;
	
	//Vitesse maximale du char : dépend du type de moteur
	private $vitesse_max;
	
	//Nombre d'équipage au total :
	private $Nombre_equipage;
	
	//Nombre de pilote dans le char :
	private $Nombre_pilote;
	private $Nombre_tireur;
	private $Nombre_chargeur;
	private $Nombre_operateur_radio;
	
	//Points de vie du char, sans tenir compte de la modification apportée par la tourelle : il s'agit donc bien du nombre de points de vie moins ceux apportée par la tourelle, peu importe celle-ci
	private $hp_base;
	
	//Caractéristique de blindage :
	private $Blindage_avant;
	private $Blindage_flanc;
	private $Blindage_arriere;
	
	//Type de char : lourd, chasseur de char, moyen, léger, artillerie, ...
	private $type_char;
	
	//Nation du char:
	private $pays;
	
	//Coût du char, dans la monaie du char:
	private $prix;
	
	//Redondant avec la monnaie : A SUPPRIMER!
	private $type_credit;
	
	//tier du char, en chiffre latin
	private $tier_latin;
	
	//Tier du char en chiffre arabe:
	private $tier_chiffre;
	
	//Boolean qui informe si l'id du char existe dans la base de donnée du char:
	private $idExistante;//Paramètre de développement, inutile pour la suite a priori
	
	public function __construct($nouvId, $bdd){
		//Initialisation des variables de l'instance (Valeur par défaut) : 
		$this->id = $nouvId;
		$this->m_DateMiseAJour = 'N/A';
		$this->nom = 'N/A';
		$this->Description = 'N/A';
		$this->premium = 'N/A';
		$this->poids_chassis = 'N/A';
		$this->limite_charge = 'N/A';
		$this->monaie = 'N/A';
		$this->vitesse_max = 'N/A';
		$this->Nombre_equipage = 1;
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
		$this->tier_latin = 'I';
		$this->tier_chiffre = 1;
		$this->idExistante = 0;
		
		$RequeteTankCorrespondantANouvId = $bdd->prepare('SELECT * FROM tank WHERE id=?');
		$RequeteTankCorrespondantANouvId -> execute(array($nouvId));
		
		//Recherche d'un char correspondant, et, affectation des valeurs le cas échéant:
		while($tableauReponse = $RequeteTankCorrespondantANouvId->fetch()){
			$this->m_DateMiseAJour = $tableauReponse['datemiseajour'];
			$this->nom = $tableauReponse['nom'];
			$this->premium = $tableauReponse['premium'];
			$this->Description = $tableauReponse['Description'];
			$this->poids_chassis = $tableauReponse['poids_chassis'];
			$this->limite_charge = $tableauReponse['limite_charge'];
			$this->monaie = $tableauReponse['monaie'];
			$this->vitesse_max = $tableauReponse['vitesse_max'];
			$this->Nombre_pilote = $tableauReponse['Nombre_pilote'];
			$this->Nombre_tireur =$tableauReponse['Nombre_tireur'];
			$this->Nombre_chargeur = $tableauReponse['Nombre_chargeur'];
			$this->Nombre_operateur_radio = $tableauReponse['Nombre_operateur_radio'];
			$this->Nombre_equipage = $this->Nombre_pilote + $this->Nombre_tireur + $this->Nombre_chargeur + $this->Nombre_operateur_radio +1;
			$this->hp_base = $tableauReponse['hp_base'];
			$this->Blindage_avant = $tableauReponse['Blindage_avant'];
			$this->Blindage_flanc = $tableauReponse['Blindage_flanc'];
			$this->Blindage_arriere = $tableauReponse['Blindage_arriere'];
			$this->type_char = $tableauReponse['type_char'];
			$this->pays = $tableauReponse['pays_id'];
			$this->prix = $tableauReponse['prix'];
			$this->type_credit = $tableauReponse['type_credit'];
			
			
			/* La base de données n'étant pas fiable, il arrive que le tier en chiffre soit absent, ou le tier latin.
			En effet, les données collectées et insérer dans la base contiennent essentiellement 'tier' en chiffre latin.
			Aussi, on est obligé de le récupérer dans cerains cas, d'où la condition suivante :*/
			//=> Cette remarque devra être modifiées, car, on envisage de faire un contrôle sur le tier : on ne prendra en entrée qu'un chiffre, correspondant à l'id du tier. Lors de la modification et l'ajout, on fera un contrôle sur cet id... tout simplement.
			if(intval($tableauReponse['tier_chiffre']) > 0 && $tableauReponse['tier_latin'] != ""){
				//Les deux tier sont présents.	
				
				if(intval($tableauReponse['tier_chiffre']) != TierLatinToTierNumber($tableauReponse['tier_latin'])){
					//Les 2 tier ne sont pas identiques: on fait le choix de prendre le moins élevé différent de >= 1.
					$TierMin = max(1,min(intval($tableauReponse['tier_chiffre']),TierLatinToTierNumber($tableauReponse['tier_latin'])));
					$this->tier_latin = TierNumberToTierLatin($TierMin);
					$this->tier_chiffre = $TierMin;				
				}
				else{
					$this->tier_latin = $tableauReponse['tier_latin'];
					$this->tier_chiffre = $tableauReponse['tier_chiffre'];
				}
			}
			//Utilisation de la fonction TierLatinToTierNumber pour ne pas requêter la base de données sans cesse:
			elseif(intval($tableauReponse['tier_chiffre']) > 0 && $tableauReponse['tier_latin'] == ""){
				$this->tier_chiffre = $tableauReponse['tier_chiffre'];
				$this->tier_latin = TierNumberToTierLatin($tableauReponse['tier_chiffre']);
			}
			elseif(intval($tableauReponse['tier_chiffre']) == 0 && $tableauReponse['tier_latin'] != ""){
				$this->tier_latin = $tableauReponse['tier_latin'];
				$this->tier_chiffre = TierLatinToTierNumber($tableauReponse['tier_latin']);
			}
			else{
				$this->tier_chiffre = 1;
				$this->tier_latin = 'I';
			}
			//$this->idExistante = 1;
		}
		
		//Fermeture de la requête:
		$RequeteTankCorrespondantANouvId->closeCursor();
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
	
	public function getDateMiseAJour(){//Renvoie 
		return $this->m_DateMiseAJour;
	}
	
	public function getDescription(){//Renvoie 
		return $this->Description;
	}
	
	public function getPremium(){//Renvoie 
		return $this->premium;
	}
	
	public function getPoids_chassis(){//Renvoie 
		return $this->poids_chassis;
	}
	
	public function getMonaie(){//Renvoie 
		return $this->monaie;
	}
	
	public function getLimite_charge(){//Renvoie 
		return $this->limite_charge;
	}
	
	public function getPrix(){//Renvoie 
		return $this->prix;
	}	
	
	public function getType_credit(){//Renvoie 
		return $this->type_credit;
	}
	
	public function getHp_base(){//Renvoie 
		return $this->hp_base;
	}
	
	public function getType_char(){//Renvoie 
		return $this->type_char;
	}
	
	public function getPays(){//Renvoie 
		return $this->pays;
	}
	
	public function getTier_latin(){//Renvoie 
		return $this->tier_latin;
	}
	
	public function getNombre_equipage(){//Renvoie 
		return $this->Nombre_equipage;
	}
	
	public function getNombre_pilote(){//Renvoie 
		return $this->Nombre_pilote;
	}
	
	public function getNombre_tireur(){//Renvoie 
		return $this->Nombre_tireur;
	}
	
	public function getNombre_chargeur(){//Renvoie 
		return $this->Nombre_chargeur;
	}
	
	public function getNombre_operateur_radio(){//Renvoie 
		return $this->Nombre_operateur_radio;
	}
	
	public function getBlindage_avant(){//Renvoie le blindage avant
		return $this->Blindage_avant;
	}
	
	public function getBlindage_flanc(){//Renvoie le blindage de flanc
		return $this->Blindage_flanc;
	}
	
	public function getBlindage_arriere(){//Renvoie le blindage arrière
		return $this->Blindage_arriere;
	}
	
	public function getVitesse_max(){//Renvoie la vitesse
		return $this->vitesse_max;
	}
	
	public function getTier_chiffre(){//Renvoie l'id du tier d'un tank
		return max(1,$this->tier_chiffre);
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
			
			case('datemiseajour'):
				return $this->getDateMiseAJour();
			break;			
			
			case('nom'):
				return $this->getNom();
			break;
			
			case('Description'):
				return $this->getDescription();
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
