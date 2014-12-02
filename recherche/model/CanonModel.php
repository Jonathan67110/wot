<?php
	//include_once('recherche/model/CanonClass.php');

	function listeCanon($bdd){
		
		$RequeteListeTotaleCanons = $bdd->query('SELECT id, nom FROM canon ORDER BY nom');
		
		while($Canon = $RequeteListeTotaleCanons->fetch()){
			$Canons[$Canon['id']] = $Canon['nom'];
		}
		
		$RequeteListeTotaleCanons->closeCursor();
	
		return $Canons;
	}
