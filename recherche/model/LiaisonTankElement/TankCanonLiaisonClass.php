<?php

include_once('recherche/Model/TierFonction/TierToFunction.php');//Contient des fonctions permettant de ne pas requêter la base. Les données sont en durs, mais, elles ont peu de chance de changer, d'où son emploi.
include_once('recherche/Model/TankClass.php');//Contient des fonctions permettant de ne pas requêter la base. Les données sont en durs, mais, elles ont peu de chance de changer, d'où son emploi.
include_once('recherche/Model/Canon/CanonClass.php');//Contient des fonctions permettant de ne pas requêter la base. Les données sont en durs, mais, elles ont peu de chance de changer, d'où son emploi.

class TankCanonLiaison{
	//id du char lié:
	private $m_IdTank;
	
	//id du canon lié au char :
	private $m_IdCanon;
	
	public function __construct($nouv_Id_Tank, $nouv_Id_Canon){
		//Initialisation des variables de l'instance:
		$this->m_id_tank = $nouv_Id_Tank;
		$this->m_IdCanon = $nouv_Id_Canon;
	}
	
	/**************/
	/*Fonction Get()*/
	
	
	public function getIdTank(){//Renvoie de l'id du tank
		return $this->m_IdTank;
	}
	
	public function getIdCanon(){//Renvoie de l'id du tank
		return $this->m_IdCanon;
	}
	
	public function InsertitionLiaisonTableTankCanonLiaison($bdd){
	
		$RequeteInsertionLiaisonDansTable = $bdd->prepare('INSERT INTO tankcanonliaison (id_Tank, id_Canon) Values(?, ?)');
		$RequeteInsertionLiaisonDansTable->execute(array($this->m_IdTank , $this->m_IdCanon);
		
		$RequeteInsertionLiaisonDansTable->closeCursor();
		
	}
	
	public function SuppressionLiaisonTableTankCanonLiaison($bdd){
	
		$RequeteInsertionLiaisonDansTable = $bdd->prepare('DELETE FROM tankcanonliaison WEHRE id_Tank = ? AND id_Canon = ?');
		$RequeteInsertionLiaisonDansTable->execute(array($this->m_IdTank , $this->m_IdCanon);
		
		$RequeteInsertionLiaisonDansTable->closeCursor();
		
	}
	
}