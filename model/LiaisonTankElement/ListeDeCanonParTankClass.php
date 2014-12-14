<?php

/************************************************************/
/* Classe permettant de gérer la liste des canons d'un tank */
/************************************************************/

class ListeDeCanonParTank{
	//id du char possédant les canons :
	private $m_IdTank;
	
	//Nom du char possédant les canons :
	private $m_NomTank;
	
	//Liste des canons déblocable pour le tank : La liste comporte l'id comme clé, et, le nom du tank comme paramètre:
	private $m_ListeCanon;
	
	//Base de données à requêter :
	private $m_bdd;
	
	public function __construct($nouv_IdTank, $bdd){
	
		//Initialisation des données :
		$this->m_bdd = $bdd;
		$this->m_IdTank = $nouv_IdTank;
	
		try {
			//Collecte de la liste des canons du tank, depuis la base de données :
			$RequeteListeDesCanonsDuTank = $bdd->prepare('	SELECT canon.id AS IdCanon, canon.nom AS NomCanon, tank.nom AS NomTank
																						FROM tankcanonliaison AS TCL
																						INNER JOIN canon
																						ON TCL.id_canon = canon.id
																						INNER JOIN tank
																						ON TCL.id_tank = tank.id
																						WHERE TCL.id_Tank = ?
																						ORDER BY IdCanon');
																						
			$RequeteListeDesCanonsDuTank->execute(array($nouv_IdTank));
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
		$Canons = $RequeteListeDesCanonsDuTank->fetchAll();
		
		foreach($Canons as $Canon){
			$this->m_ListeCanon[$Canon['IdCanon']]= $Canon['NomCanon'];
		}
		
		//Ajout du nom du tank, à condition qu'un char corresponde à l'Id en entré:
		if(!empty($Canon['NomTank'])){
			$this->m_NomTank = $Canon['NomTank'];
		}
			
		$RequeteListeDesCanonsDuTank->closeCursor();
	}
	
	/******************/
	/*    Méthode     */
	/******************/
	
	
	public function getIdTank(){//Renvoie de l'id du tank
		return $this->m_IdTank;
	}
	
	//Renvoie le nom d'un canon à partir de son id :
	public function getNomCanon($m_IdCanon){
	
		return $this->m_ListeCanon[$m_IdCanon];
		
	}
	
	//Renvoie le nom d'un canon à partir de son id :
	public function getListeCanon(){
	
		return $this->m_ListeCanon;
		
	}
	
	//Fonction privée de collecte des canons : on ne veut pas laisser la possibilité de requêter comme on veut la base
	private function ListingCanonDuTank(){
		//On vide la liste des canons :
		$this->m_ListeCanon = array();
	
		//On récupère la liste des canons du char :
		$RequeteListeDesCanonsDuTank = $this->m_bdd->prepare('SELECT canon.id AS IdCanon, canon.nom AS NomCanon 
																					FROM tankcanonliaison AS TCL
																					INNER JOIN canon
																					ON TCL.id_canon = canon.id
																					WHERE TCL.id_tank = ?
																					ORDER BY IdCanon');
																					
		$RequeteListeDesCanonsDuTank->execute(array($this->m_IdTank));
		
		while($Canon = $RequeteListeDesCanonsDuTank->fetch()){
			$this->m_ListeCanon[$Canon['IdCanon']]= $Canon['NomCanon'];
		}
			
		$RequeteListeDesCanonsDuTank->closeCursor();
	}
	
	/* Méthodes d'ajout de canon */
	
	public function AjouterCanon($nouvIdCanon){
	
		$bdd = $this->m_bdd;
	
	
		$RequeteAjoutCanonListe = $bdd->prepare('INSERT IGNORE INTO tankcanonliaison(id_tank,id_canon) VALUES (?,?)'); // On ne veut pas de doublons sur cette table. On a donc implémenter une contrainte d'unicité du couple tank/canon. Pour ne pas avoir de problème de requête si le couple existe déjà, on a ajouté l'option IGNORE
		
		$RequeteAjoutCanonListe->execute(array($this->m_IdTank, $nouvIdCanon));
			
		$RequeteAjoutCanonListe->closeCursor();
	
		$this->ListingCanonDuTank();
	
	}
	/* Méthodes de suppresion d'un canon de la liste */
	
	
	public function SupprimerCanon($IdCanonASupprimer){
	
		$bdd = $this->m_bdd;
	
		$RequeteSuppressionCanonListe = $bdd->prepare('DELETE FROM tankcanonliaison WHERE id_canon = ? AND id_tank = ?');
		
		$RequeteSuppressionCanonListe->execute(array($IdCanonASupprimer, $this->m_IdTank));
			
		$RequeteSuppressionCanonListe->closeCursor();
	
		$this->ListingCanonDuTank();
	
	}
	
	public function AffichageInformationListe(){
			print_r($this->m_ListeCanon);
	}
	
}























