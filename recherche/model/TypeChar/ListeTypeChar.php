<?php

class ListeCanon{
	//Liste des types de char de la base de données:
	Private $m_ListeTypeChar;
	
	//Base de données d'où est tirée la liste :
	Private $m_bbd;
	
	Function __construct($NouvBdd){
		
		$m_bbd = $NouvBdd;
		
		try{
			$RequeteListetypeChar = $m_bbd->query('SELECT id, type FROM type_char');
			
			$Canon = $RequeteListetypeChar->fetchAll();
			
			$RequeteListetypeChar->closeCursor();
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
		$RequeteListetypeChar->closeCursor();
		
	}
	
	/******************************/
	/* 	     Fonctions get		  */
	/******************************/
	
	public function getListeTypeChar(){
		return $m_ListeTypeChar;
	}
	
}