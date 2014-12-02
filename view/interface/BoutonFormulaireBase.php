<?php	
		//Affiche les boutons selon l'indice en entrée:
		$indice = intval(str_replace('gestion','', $indice));
		
		if($indice == 0){
	?>
			<input type="submit" name="AjouterBouton" value="Ajouter" />
<?php
		}
		else{		
	?>
			<input type="submit" name="ModifierBouton" value="Modifier" />
			<input type="submit" name="SupprimerBouton" value="Supprimer" />
<?php
		}
	?>