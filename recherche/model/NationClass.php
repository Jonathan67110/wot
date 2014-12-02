<?php

class Nation{

	private $id;
	private $nomNation;
	
	public function __construct($nouvId, $bdd){
		//Initialisation des variables de l'instance:
		$this->id = $nouvId;
		$this->nomNation = '';
		
		$req = $bdd->prepare('SELECT pays FROM nation WHERE id=?');
		$req -> execute(array($nouvId));
		
		//Recherche d'un char correspondant, et, affectation des valeurs le cas échéant:
		while($tableauReponse = $req->fetch()){
			$this->nomNation = $tableauReponse['pays'];
		}
		
		//Fermeture de la requête:
		$req->closeCursor();
	}
	
	/**************/
	/*Fonction Get()*/
	/**************/
	
	public function getId(){//Renvoie du nom du tank
		return $this->id;
	}
	
	public function getNomNation(){//Renvoie de l'id du tank
		return $this->nomNation;
	}
	
}