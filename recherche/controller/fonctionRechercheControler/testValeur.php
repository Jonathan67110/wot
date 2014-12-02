<?php
	
	function idSuivant($bdd, $tanks, $indiceTank){
		/*L'algo de cette fonction est simple : 
		1) On initialise la variable de sortie à 0.
		2) On lance la boucle, et, on véfirie pour tous les éléments si ils ont l'id qu'on a entré au début
		3) si l'id est ok, on met un flag vrai, pour lui dire qu'on veut récupérer l'id du suivant, tout en récupérant dans le résultat final l'id de l'indice. Si c'était le dernier, on ne changera donc pas l'indice, sinon, on lance l'itération suivante. comme le flag est à vrai, on va réucpérer alors l'id du char suivant. Pour éviter des soucis, on remet le flag à false.
		*/
		$resultat = 0;
		
		$repereCharIndiceTrouve = false;//Flag qui va indiquer qu'on veut prendre la valeur suivante.
		
		//Scrutage de la table pour sélectionner le tank qui suit l'indice en entrée:)
		foreach($tanks as $tank){
			if($resultat == 0){
				$resultat = $tank->getId();
			}
			if($repereCharIndiceTrouve){//On ne prend l'id d'un autre char que l'actuel QUE si on a déjà trouvé le char actuel.
				$resultat = $tank->getId();//On prend l'id du char sur lequel on tombe ( qui est forcément le char suivant, puisqu'il est le suivant dans la liste)
				$repereCharIndiceTrouve = false;//On remet le flag à 0, puisqu'on veut éviter de rentrer dans cette condition
				return $resultat;//On fait un return ici, pour ne pas se taper toute la liste, et, augmenter légèrement les performances.
			}
			if($tank->getId() == $indiceTank){//On cherche l'indice du char actuel, car, on veut le char qui le suit.
				$resultat = $tank->getId();//On va mettre l'id du char actuel, au cas où c'est le dernier de la liste. Ainsi, au pis, on restera sur le dernier char de la liste.
				$repereCharIndiceTrouve = true;//Permet de dire qu'on a trouvé le char actuel, et que, du coup, on veut enregstrer le char suivant.
			}
		}		
		return $resultat;
	}
	
	// Foction perettant de sélectionner le char suvant d'une liste :
	function idPrecedent($bdd, $tanks, $indiceTank){

			$resultat = 0;
			
			//Flag qui définit si on a trouvé l'indice actuel. Cela va permettre de s'arrêter dans la recherche dès qu'on a trouvé l'indice actuel, et, donc, de renvoyer l'indice précédent.
			$repereCharIndiceTrouve = false;//A false, on prévient qu'on doit continuer à chercher, car, l'indice actuel n'a pas été trouvé.
			
			//Scrutage de la table pour sélectionner le tank qui précède l'indice en entrée
			foreach($tanks as $tank){
				if(!$repereCharIndiceTrouve && $tank->getId() != $indiceTank){
					$resultat = $tank->getId();
				}
				if($tank->getId() == $indiceTank){
					$repereCharIndiceTrouve = true;
				}
			}
			
			return $resultat;
	}
	
	function idSuivantMemeNation($bdd, $tanks, $indiceTank, $nationTank){
		$resultatTankSuivantDeMemeNation = idSuivant($bdd, $tanks, $indiceTank);
		
		while($nationTank >0 && $tanks[$resultatTankSuivantDeMemeNation]->getPays() != $nationTank && $tanks[$resultatTankSuivantDeMemeNation] != end($tanks) && $resultatTankSuivantDeMemeNation >0){
			$resultatTankSuivantDeMemeNation = idSuivant($bdd, $tanks, $resultatTankSuivantDeMemeNation);
		}
		
		return $resultatTankSuivantDeMemeNation;
	}