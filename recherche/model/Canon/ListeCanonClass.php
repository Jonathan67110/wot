<?php

class ListeCanon{
	//Liste des canons de la base de données:
	Private $m_ListeCanon;
	
	//Base de données d'où est tirée la liste :
	Private $m_bbd;
	
	Function __construct($NouvBdd){
		
		$m_bbd = $NouvBdd;
		
		try{
			$RequeteListeTotaleCanons = $m_bbd->query('SELECT id, nom FROM Canon');
			
			while($Canon = $RequeteListeTotaleCanons->fetch()){
				$m_ListeCanon[$Canon['id']] = $Canon['nom'];
			}
			
			$RequeteListeTotaleCanons->closeCursor();
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
		$RequeteListeTotaleCanons->closeCursor();
		
	}
}